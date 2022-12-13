<?php


namespace App\Services;

use App\Models\PasswordReset;
use App\Utils\Tools;
use Exception;

/***
 * Class Password
 * @package App\Services
 */
class Password
{
    /**
     * @param $email string
     * @return bool
     */
    public static function sendResetEmail($email)
    {
        $pwdRst = new PasswordReset();
        $pwdRst->email = $email;
        $pwdRst->init_time = time();
        $pwdRst->expire_time = time() + 3600 * 24; // @todo
        $pwdRst->token = Tools::genRandomChar(64);
        if (!$pwdRst->save()) {
            return "oooo";
        }
        $subject = $_ENV['appName'] . ' - Reset Password';
        $resetUrl = $_ENV['baseUrl'] . '/password/token/' . $pwdRst->token;
        try {
            $result = Mail::send(
                $email,
                $subject,
                'password/reset.tpl',
                ['resetUrl' => $resetUrl],
                [
                    //BASE_PATH.'/public/assets/email/styles.css'
                ]
            );
        } catch (Exception $e) {
            return "mmm";
        }
        return $result;
    }

    public static function resetBy($token, $password)
    {
    }
}
