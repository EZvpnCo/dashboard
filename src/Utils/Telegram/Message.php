<?php

namespace App\Utils\Telegram;

use App\Services\Config;
use App\Utils\TelegramSessionManager;

class Message
{
    /**
     * Bot
     */
    protected $bot;

    /**
     * 触发用户
     */
    protected $User;

    /**
     * 触发用户TG信息
     */
    protected $triggerUser;

    /**
     * 消息会话 ID
     */
    protected $ChatID;

    /**
     * 触发源信息
     */
    protected $Message;

    /**
     * 触发源信息 ID
     */
    protected $MessageID;

    /**
     * @param \Telegram\Bot\Api             $bot
     * @param \Telegram\Bot\Objects\Message $Message
     */
    public function __construct($bot, $Message)
    {
        $this->bot         = $bot;
        $this->triggerUser = [
            'id'       => $Message->getFrom()->getId(),
            'name'     => $Message->getFrom()->getFirstName() . ' ' . $Message->getFrom()->getLastName(),
            'username' => $Message->getFrom()->getUsername(),
        ];
        $this->User        = TelegramTools::getUser($this->triggerUser['id']);
        $this->ChatID      = $Message->getChat()->getId();
        $this->Message     = $Message;
        $this->MessageID   = $Message->getMessageId();

        if ($this->Message->getText() != null) {
            // 消息内容
            $MessageData = trim($this->Message->getText());
            if ($this->ChatID > 0) {
                // 私聊
                if ($this->User != null) {
                    if (is_numeric($MessageData) && strlen($MessageData) == 6) {
                        $uid = TelegramSessionManager::verify_login_number($MessageData, $this->User->id);
                        if ($uid != 0) {
                            $text = 'Login verification successful, email：' . $this->User->email;
                        } else {
                            $text = 'Login verification failed, invalid number';
                        }
                        $bot->sendMessage(
                            [
                                'chat_id'    => $this->ChatID,
                                'text'       => $text,
                                'parse_mode' => 'Markdown',
                            ]
                        );
                    }
                } else {
                    if (strlen($MessageData) == 16) {
                        $Uid = TelegramSessionManager::verify_bind_session($MessageData);
                        if ($Uid == 0) {
                            $text = 'The binding failed, after inspection, it was found that：【' . $MessageData . '】is valid for 10 minutes, you can try again after refreshing the **Profile Edit** page on our website.';
                        } else {
                            $BinsUser              = TelegramTools::getUser($Uid, 'id');
                            $BinsUser->telegram_id = $this->triggerUser['id'];
                            $BinsUser->im_type     = 4;
                            $BinsUser->im_value    = $this->triggerUser['username'];
                            $BinsUser->save();
                            if ($BinsUser->is_admin >= 1) {
                                $text = 'Dear **Administrator** Hello, congratulations on the successful binding.' . PHP_EOL . 'The current bound email address is：' . $BinsUser->email;
                            } else {
                                if ($BinsUser->class >= 1) {
                                    $text = 'Dear **VIP ' . $BinsUser->class . '** Hello user.' . PHP_EOL . 'Congratulations on your successful binding，The current bound email address is：' . $BinsUser->email;
                                } else {
                                    $text = 'The binding is successful, your email is：' . $BinsUser->email;
                                }
                            }
                        }
                        $this->bot->sendMessage(
                            [
                                'chat_id'    => $this->ChatID,
                                'text'       => $text,
                                'parse_mode' => 'Markdown',
                            ]
                        );
                    }
                }
            }
            return;
        }

        if ($this->Message->getNewChatParticipant() != null) {
            self::NewChatParticipant();
        }
    }

    /**
     *
     * 回复讯息 | 默认已添加 chat_id 和 message_id
     *
     * @param array $sendMessage
     */
    public function replyWithMessage(array $sendMessage): void
    {
        $sendMessage = array_merge(
            [
                'chat_id'    => $this->ChatID,
                'message_id' => $this->MessageID,
            ],
            $sendMessage
        );
        $this->bot->sendMessage($sendMessage);
    }

    /**
     * 入群检测
     */
    public function NewChatParticipant(): void
    {
        $NewChatMember = $this->Message->getNewChatParticipant();
        $Member = [
            'id'       => $NewChatMember->getId(),
            'name'     => $NewChatMember->getFirstName() . ' ' . $NewChatMember->getLastName(),
            'username' => $NewChatMember->getUsername(),
        ];
        if ($NewChatMember->getUsername() == $_ENV['telegram_bot']) {
            // 机器人加入新群组
            if ($_ENV['allow_to_join_new_groups'] !== true && !in_array($this->ChatID, $_ENV['group_id_allowed_to_join'])) {
                // 退群
                $this->replyWithMessage(
                    [
                        'text' => 'No date, uncle, we don\'t make a date.'
                    ]
                );
                TelegramTools::SendPost(
                    'kickChatMember',
                    [
                        'chat_id'   => $this->ChatID,
                        'user_id'   => $Member['id'],
                    ]
                );
                if (count($_ENV['telegram_admins']) >= 1) {
                    foreach ($_ENV['telegram_admins'] as $id) {
                        $this->bot->sendMessage(
                            [
                                'text'      => 'Bot left a group based on your settings.' . PHP_EOL . PHP_EOL . 'Group name:' . $this->Message->getChat()->getTitle(),
                                'chat_id'   => $id
                            ]
                        );
                    }
                }
            } else {
                $this->replyWithMessage(
                    [
                        'text' => 'Hello friends, thank you for invite'
                    ]
                );
            }
        } else {
            // 新成员加入群组
            $NewUser = TelegramTools::getUser($Member['id']);
            $deNewChatMember = json_decode($NewChatMember, true);
            if (
                Config::getconfig('Telegram.bool.group_bound_user') === true
                &&
                $this->ChatID == $_ENV['telegram_chatid']
                &&
                $NewUser == null
                &&
                $deNewChatMember['is_bot'] == false
            ) {
                $this->replyWithMessage(
                    [
                        'text' => '由于 ' . $Member['name'] . ' Unbound accounts will be removed.'
                    ]
                );
                TelegramTools::SendPost(
                    'kickChatMember',
                    [
                        'chat_id'   => $this->ChatID,
                        'user_id'   => $Member['id'],
                    ]
                );
                return;
            }
            if ($_ENV['enable_welcome_message'] === true) {
                $text = ($NewUser->class >= 1 ? 'Welcome VIPs' . $NewUser->class . ' User ' . $Member['name'] . 'Back to organization.' : 'Welcome ' . $Member['name']);
                $this->replyWithMessage(
                    [
                        'text' => $text
                    ]
                );
            }
        }
    }
}
