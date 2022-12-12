<?php

namespace App\Metron;

use App\Services\{Mail, Config, MetronSetting};
use App\Models\{User, EmailVerify};
use App\Utils\{Tools, Check};

class MtEmail
{
    /**
     * 发送邮箱验证码
     */
    public function sendEmailCode($email, $user = null)
    {
        if (!$this->checkEmailSuffix($email)) {
            return ['ret' => 0, 'msg' => 'Unsupported email suffix'];
        }

        if ($user->email == $email) {
            return ['ret' => 0, 'msg' => 'Email address has not been changed'];
        }
        if ($email == '') {
            return ['ret' => 0, 'msg' => 'Email address not filled'];
        }

        if (!Check::isEmailLegal($email)) {
            return ['ret' => 0, 'msg' => 'Invalid email'];
        }

        $user = User::where('email', '=', $email)->first();
        if ($user != null) {
            return ['ret' => 0, 'msg' => 'This mailbox already exists'];
        }

        $ipcount = EmailVerify::where('ip', '=', $_SERVER['REMOTE_ADDR'])->where('expire_in', '>', time())->count();
        if ($ipcount >= (int) Config::getconfig('Register.string.Email_verify_iplimit')) {
            return ['ret' => 0, 'msg' => 'Too many requests from this IP'];
        }

        $mailcount = EmailVerify::where('email', '=', $email)->where('expire_in', '>', time())->count();
        if ($mailcount >= 3) {
            return ['ret' => 0, 'msg' => 'This email has been requested too many times'];
        }

        $code = Tools::genRandomNum(6);
        $ev = new EmailVerify();
        $ev->expire_in = time() + (int) Config::getconfig('Register.string.Email_verify_ttl');
        $ev->ip = $_SERVER['REMOTE_ADDR'];
        $ev->email = $email;
        $ev->code = $code;
        $ev->save();

        $subject = $_ENV['appName'] . '- verification email';

        try {
            Mail::send($email, $subject, 'auth/verify.tpl', [
                'code' => $code, 'expire' => date('Y-m-d H:i:s', time() + (int) Config::getconfig('Register.string.Email_verify_ttl'))
            ], [
                //BASE_PATH.'/public/assets/email/styles.css'
            ]);
        } catch (Exception $e) {
            return ['ret' => 0, 'msg' => 'Email sending failed, please contact the site administrator.'];
        }

        $res['ret'] = 1;
        $res['msg'] = 'The verification code has been sent successfully, please check your email.';
        return $res;
    }

    /**
     * 检测邮箱后缀
     */
    public function checkEmailSuffix($email)
    {
        // 注册邮箱黑名单
        $email_postfix = '@' . (explode("@", $email)[1]);
        if (in_array($email_postfix, MetronSetting::get('disable_mailbox_list')) === true) {
            return false;
        }
        // 注册邮箱白名单
        if (MetronSetting::get('register_restricted_email') === true) {
            if (in_array($email_postfix, MetronSetting::get('list_of_available_mailboxes')) === false) {
                return false;
            }
        }
        return true;
    }
}
