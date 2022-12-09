<?php

namespace App\Utils\Telegram\Commands;

use App\Models\User;
use App\Utils\Telegram\TelegramTools;
use App\Utils\TelegramSessionManager;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

/**
 * Class StratCommand.
 */
class StartCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = 'start';

    /**
     * @var string Command Description
     */
    protected $description = '[Group/Private chat] Bot initial command.';

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {
        $Update = $this->getUpdate();
        $Message = $Update->getMessage();

        // 消息会话 ID
        $ChatID = $Message->getChat()->getId();

        if ($ChatID > 0) {
            // 私人会话

            // 发送 '输入中' 会话状态
            $this->replyWithChatAction(['action' => Actions::TYPING]);

            // 触发用户
            $SendUser = [
                'id'       => $Message->getFrom()->getId(),
                'name'     => $Message->getFrom()->getFirstName() . ' ' . $Message->getFrom()->getLastName(),
                'username' => $Message->getFrom()->getUsername(),
            ];
            // 消息内容
            $MessageText = trim($arguments);
            if (
                $MessageText != ''
                && TelegramTools::getUser($SendUser['id']) == null
                && strlen($MessageText) == 16
            ) {
                // 新用户绑定
                return $this->bindingAccount($SendUser, $MessageText);
            }
            // 回送信息
            $this->replyWithMessage(
                [
                    'text'       => 'Send /help for help',
                    'parse_mode' => 'Markdown',
                ]
            );
        } else {
            // 群组

            if ($_ENV['enable_delete_user_cmd'] === true) {
                TelegramTools::DeleteMessage([
                    'chatid'      => $ChatID,
                    'messageid'   => $Message->getMessageId(),
                ]);
            }

            if ($_ENV['telegram_group_quiet'] === true) {
                // 群组中不回应
                return;
            }

            // 发送 '输入中' 会话状态
            $this->replyWithChatAction(['action' => Actions::TYPING]);
            // 回送信息
            $response = $this->replyWithMessage(
                [
                    'text' => 'Meow meow meow.',
                ]
            );
            // 消息删除任务
            TelegramTools::DeleteMessage([
                'chatid'      => $ChatID,
                'messageid'   => $response->getMessageId(),
            ]);
        }
    }

    public function bindingAccount($SendUser, $MessageText)
    {
        $Uid = TelegramSessionManager::verify_bind_session($MessageText);
        if ($Uid == 0) {
            $text = 'The binding failed, after inspection, it was found that：【' . $MessageText . '】is valid for 10 minutes, you can try again after refreshing the **Profile Edit** page on our website.';
        } else {
            $BinsUser              = User::where('id', $Uid)->first();
            $BinsUser->telegram_id = $SendUser['id'];
            $BinsUser->im_type     = 4;
            $BinsUser->im_value    = $SendUser['username'];
            $BinsUser->save();
            if ($BinsUser->is_admin >= 1) {
                $text = 'Dear **Administrator** Hello, congratulations on the successful binding。' . PHP_EOL . 'The current bound email address is：' . $BinsUser->email;
            } else {
                if ($BinsUser->class >= 1) {
                    $text = 'Dear **VIP ' . $BinsUser->class . '** Hello user.' . PHP_EOL . 'Congratulations on your successful binding, the current bound email address is：' . $BinsUser->email;
                } else {
                    $text = 'The binding is successful, your email is：' . $BinsUser->email;
                }
            }
        }
        // 回送信息
        $this->replyWithMessage(
            [
                'text'       => $text,
                'parse_mode' => 'Markdown',
            ]
        );
    }
}
