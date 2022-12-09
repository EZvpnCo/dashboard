<?php

namespace App\Utils;

use App\Models\User;
use App\Services\Config;
use App\Controllers\LinkController;
use App\Controllers\AuthController;
use TelegramBot\Api\Client;
use TelegramBot\Api\Exception;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;

class TelegramProcess
{
    private static $all_rss = [
        'clean_link' => '重置订阅',
        '?mu=0' => 'SSR普通订阅',
        '?mu=1' => 'SSR单端口订阅',
        '?mu=3' => 'SS/SSD订阅',
        '?mu=2' => 'V2ray订阅',
        '?mu=4' => 'Clash订阅'
    ];

    private static function callback_bind_method($bot, $callback)
    {
        $callback_data = $callback->getData();
        $message = $callback->getMessage();
        $reply_to = $message->getMessageId();
        $user = User::where('telegram_id', $callback->getFrom()->getId())->first();
        $reply_message = '？？？';
        if ($user != null) {
            switch (true) {
                case (strpos($callback_data, 'mu')):
                    $ssr_sub_token = LinkController::GenerateSSRSubCode($user->id, 0);
                    $subUrl = $_ENV['subUrl'];
                    $reply_message = self::$all_rss[$callback_data] . ': ' . $subUrl . $ssr_sub_token . $callback_data . PHP_EOL;
                    break;
                case ($callback_data == 'clean_link'):
                    $user->clean_link();
                    $reply_message = 'Link reset successful';
                    break;
            }
            $bot->sendMessage($message->getChat()->getId(), $reply_message, $parseMode = null, $disablePreview = false, $replyToMessageId = $reply_to);
        }
    }

    private static function needbind_method($bot, $message, $command, $user, $reply_to = null)
    {
        $reply = [
            'message' => '？？？',
            'markup' => null,
        ];
        if ($user != null) {
            switch ($command) {
                case 'traffic':
                    $reply['message'] = 'Your current traffic status：
Used today ' . $user->TodayusedTraffic() . ' ' . number_format(($user->u + $user->d - $user->last_day_t) / $user->transfer_enable * 100, 2) . '%
Used before today ' . $user->LastusedTraffic() . ' ' . number_format($user->last_day_t / $user->transfer_enable * 100, 2) . '%
Unused ' . $user->unusedTraffic() . ' ' . number_format(($user->transfer_enable - ($user->u + $user->d)) / $user->transfer_enable * 100, 2) . '%';
                    break;
                case 'checkin':
                    if (!$user->isAbleToCheckin()) {
                        $reply['message'] = 'You have signed in today！';
                        break;
                    }
                    $traffic = random_int($_ENV['checkinMin'], $_ENV['checkinMax']);
                    $user->transfer_enable += Tools::toMB($traffic);
                    $user->last_check_in_time = time();
                    $user->save();
                    $reply['message'] = 'Sign in successfully! Won ' . $traffic . ' MB flow！';
                    break;
                case 'prpr':
                    $prpr = array('⁄(⁄ ⁄•⁄ω⁄•⁄ ⁄)⁄', '(≧ ﹏ ≦)', '(*/ω＼*)', 'ヽ(*。>Д<)o゜', '(つ ﹏ ⊂)', '( >  < )');
                    $reply['message'] = $prpr[random_int(0, 5)];
                    break;
                case 'rss':
                    $reply['message'] = 'Click the button below to get the corresponding subscription: ';
                    $keys = [];
                    foreach (self::$all_rss as $key => $value) {
                        $keys[] = [['text' => $value, 'callback_data' => $key]];
                    }
                    $reply['markup'] = new InlineKeyboardMarkup(
                        $keys
                    );
                    break;
            }
        } else {
            $reply['message'] = 'You have not bound the account of this site, you can enter the "data editing" of the website and bind your account at the bottom right';
        }

        return $reply;
    }


    public static function telegram_process($bot, $message, $command)
    {
        $user = User::where('telegram_id', $message->getFrom()->getId())->first();
        $reply_to = $message->getMessageId();
        $reply = [
            'message' => '？？？',
            'markup' => null,
        ];
        if ($message->getChat()->getId() > 0) {
            //个人
            $bot->sendChatAction($message->getChat()->getId(), 'typing');

            switch ($command) {
                case 'ping':
                    $reply['message'] = 'Pong! Your ID is: ' . $message->getChat()->getId() . '!';
                    break;
                case 'traffic':
                case 'checkin':
                case 'prpr':
                case 'rss':
                    $reply = self::needbind_method($bot, $message, $command, $user, $reply_to);
                    break;
                case 'help':
                    $reply['message'] = 'Command list：
						/ping  Get groupID
						/traffic Query traffic
						/checkin Check in
						/help Get help information
						/rss Get Node Subscription';
                    if ($user == null) {
                        $reply['message'] .= PHP_EOL . 'You have not bound the account of this site, you can enter the "data editing" of the website and bind your account at the bottom right';
                    }
                    break;
                default:
                    if ($message->getPhoto() == null) {
                        if (!is_numeric($message->getText()) || strlen($message->getText()) != 6) {
                            $reply['message'] = Tuling::chat($message->getFrom()->getId(), $message->getText());
                            break;
                        }

                        if ($user == null) {
                            $telegram_id = $message->getFrom()->getId();
                            $username = $message->getFrom()->getUsername();

                            $email = Tools::genRandomChar(6) . '.' . $telegram_id . '@telegram.org';
                            $passwd = Tools::genRandomChar(18); // Random Password
                            $imtype = 4; // Telegram
                            $imvalue = $username;
                            $name = $username;
                            if (!$name) {
                                $name = 'telegram.' . $telegram_id;
                            }
                            $code = 0; // TODO: Refer Code
                            $res = AuthController::register_helper($name, $email, $passwd, $code, $imtype, $imvalue, $telegram_id);

                            if ($res['ret'] == 0) {
                                $reply['message'] = $res['msg'];
                                break;
                            }
                            $user = User::where('telegram_id', $telegram_id)->first();
                        }
                        if ($user != null) {
                            $uid = TelegramSessionManager::verify_login_number($message->getText(), $user->id);
                            if ($uid != 0) {
                                $reply['message'] = 'Login verification successful, email：' . $user->email;
                            } else {
                                $reply['message'] = 'Login verification failed, invalid number';
                            }
                            break;
                        }

                        $reply['message'] = 'Login verification failed, you have not bound this site account';
                        break;
                    }

                    $bot->sendMessage($message->getChat()->getId(), 'Please wait while decoding 。。。');
                    $bot->sendChatAction($message->getChat()->getId(), 'typing');
                    $photos = $message->getPhoto();

                    $photo_size_array = array();
                    $photo_id_array = array();
                    $photo_id_list_array = array();

                    foreach ($photos as $photo) {
                        $file = $bot->getFile($photo->getFileId());
                        $real_id = substr($file->getFileId(), 0, 36);
                        if (!isset($photo_size_array[$real_id])) {
                            $photo_size_array[$real_id] = 0;
                        }

                        if ($photo_size_array[$real_id] >= $file->getFileSize()) {
                            continue;
                        }

                        $photo_size_array[$real_id] = $file->getFileSize();
                        $photo_id_array[$real_id] = $file->getFileId();
                        if (!isset($photo_id_list_array[$real_id])) {
                            $photo_id_list_array[$real_id] = array();
                        }

                        $photo_id_list_array[$real_id][] = $file->getFileId();
                    }

                    foreach ($photo_id_array as $key => $value) {
                        $file = $bot->getFile($value);
                        $qrcode_text = QRcode::decode('https://api.telegram.org/file/bot' . $_ENV['telegram_token'] . '/' . $file->getFilePath());

                        if ($qrcode_text == null) {
                            foreach ($photo_id_list_array[$key] as $fail_key => $fail_value) {
                                $fail_file = $bot->getFile($fail_value);
                                $qrcode_text = QRcode::decode('https://api.telegram.org/file/bot' . $_ENV['telegram_token'] . '/' . $fail_file->getFilePath());
                                if ($qrcode_text != null) {
                                    break;
                                }
                            }
                        }

                        if (strpos($qrcode_text, 'mod://bind/') === 0 && strlen($qrcode_text) == 27) {
                            $uid = TelegramSessionManager::verify_bind_session(substr($qrcode_text, 11));
                            if ($uid == 0) {
                                $reply['message'] = 'Binding failed, the QR code is invalid：' . substr($qrcode_text, 11) . 'The QR code is valid for 10 minutes, please try to refresh the "Profile Editing" page of the website to update the QR code';
                                continue;
                            }
                            $user = User::where('id', $uid)->first();
                            $user->telegram_id = $message->getFrom()->getId();
                            $user->im_type = 4;
                            $user->im_value = $message->getFrom()->getUsername();
                            $user->save();
                            $reply['message'] = 'The binding is successful, email：' . $user->email;
                            break;
                        }

                        if (strpos($qrcode_text, 'mod://login/') === 0 && strlen($qrcode_text) == 28) {
                            if ($user == null) {
                                $reply['message'] = 'Login verification failed, you have not bound this site account' . substr($qrcode_text, 12);
                                break;
                            }

                            $uid = TelegramSessionManager::verify_login_session(substr($qrcode_text, 12), $user->id);
                            if ($uid != 0) {
                                $reply['message'] = 'Login verification successful, email：' . $user->email;
                            } else {
                                $reply['message'] = 'Login verification failed, the QR code is invalid' . substr($qrcode_text, 12);
                            }
                            break;
                        }

                        break;
                    }
            }
        } else {
            //群组
            if ($_ENV['telegram_group_quiet'] == true) {
                return;
            }
            $bot->sendChatAction($message->getChat()->getId(), 'typing');

            switch ($command) {
                case 'ping':
                    $reply['message'] = 'Pong! The ID of this group is ' . $message->getChat()->getId() . '!';
                    break;
                case 'traffic':
                case 'checkin':
                case 'prpr':
                    $reply = self::needbind_method($bot, $message, $command, $user, $reply_to);
                    break;
                case 'rss':
                    $reply['message'] = 'Please privately chat with the robot to use this command';
                    break;
                case 'help':
                    $reply['message'] = 'Command list：
						/ping  Get groupID
						/traffic Query traffic
						/checkin Check in
						/help Get help information
						/rss Get Node Subscription';
                    if ($user == null) {
                        $reply['message'] .= PHP_EOL . 'You have not bound the account of this site, you can enter the "data editing" of the website and bind your account at the bottom right';
                    }
                    break;
                default:
                    if ($message->getText() != null) {
                        if ($message->getChat()->getId() == $_ENV['telegram_chatid']) {
                            $reply['message'] = Tuling::chat($message->getFrom()->getId(), $message->getText());
                        } else {
                            $reply['message'] = 'No date, uncle, we don\'t have a date';
                        }
                    }
                    if ($message->getNewChatMember() != null && $_ENV['enable_welcome_message'] == true) {
                        $reply['message'] = 'Welcome ' . $message->getNewChatMember()->getFirstName() . ' ' . $message->getNewChatMember()->getLastName();
                    } else {
                        $reply['message'] = null;
                    }
            }
        }

        $bot->sendMessage($message->getChat()->getId(), $reply['message'], $parseMode = null, $disablePreview = false, $replyToMessageId = $reply_to, $replyMarkup = $reply['markup']);
        $bot->sendChatAction($message->getChat()->getId(), '');
    }

    public static function process()
    {
        try {
            $bot = new Client($_ENV['telegram_token']);
            // or initialize with botan.io tracker api key
            // $bot = new \TelegramBot\Api\Client('YOUR_BOT_API_TOKEN', 'YOUR_BOTAN_TRACKER_API_KEY');

            $command_list = array('ping', 'traffic', 'help', 'prpr', 'checkin', 'rss');
            foreach ($command_list as $command) {
                $bot->command($command, static function ($message) use ($bot, $command) {
                    TelegramProcess::telegram_process($bot, $message, $command);
                });
            }

            $bot->on($bot->getEvent(static function ($message) use ($bot) {
                TelegramProcess::telegram_process($bot, $message, '');
            }), static function () {
                return true;
            });

            $bot->on($bot->getCallbackQueryEvent(function ($callback) use ($bot) {
                TelegramProcess::callback_bind_method($bot, $callback);
            }), function () {
                return true;
            });

            $bot->run();
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}
