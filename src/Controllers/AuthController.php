<?php

namespace App\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\{
    User,
    LoginIp,
    InviteCode,
    EmailVerify
};
use App\Utils\{
    GA,
    Hash,
    Check,
    Tools,
    Radius,
    Geetest,
    TelegramSessionManager
};
use App\Services\{
    Auth,
    Mail,
    Config,
    MetronSetting
};
use voku\helper\AntiXSS;
use Exception;

/**
 *  AuthController
 */
class AuthController extends BaseController
{
    public function login($request, $response)
    {
        if ($this->user->isLogin) {
            return $response->withStatus(302)->withHeader('Location', '/user');
        }
        $GtSdk = null;
        $recaptcha_sitekey = null;
        if ($_ENV['enable_login_captcha'] === true) {
            switch ($_ENV['captcha_provider']) {
                case 'recaptcha':
                    $recaptcha_sitekey = $_ENV['recaptcha_sitekey'];
                    break;
                case 'geetest':
                    $uid = time() . random_int(1, 10000);
                    $GtSdk = Geetest::get($uid);
                    break;
            }
        }

        if ($_ENV['enable_telegram'] === true) {
            $login_text = TelegramSessionManager::add_login_session();
            $login = explode('|', $login_text);
            $login_token = $login[0];
            $login_number = $login[1];
        } else {
            $login_token = '';
            $login_number = '';
        }

        return $this->view()
            ->assign('geetest_html', $GtSdk)
            ->assign('login_token', $login_token)
            ->assign('login_number', $login_number)
            ->assign('telegram_bot', $_ENV['telegram_bot'])
            ->assign('base_url', $_ENV['baseUrl'])
            ->assign('recaptcha_sitekey', $recaptcha_sitekey)
            ->display('auth/login.tpl');
    }

    public function getCaptcha($request, $response, $args)
    {
        $GtSdk = null;
        $recaptcha_sitekey = null;
        if ($_ENV['captcha_provider'] != '') {
            switch ($_ENV['captcha_provider']) {
                case 'recaptcha':
                    $recaptcha_sitekey = $_ENV['recaptcha_sitekey'];
                    $res['recaptchaKey'] = $recaptcha_sitekey;
                    break;
                case 'geetest':
                    $uid = time() . random_int(1, 10000);
                    $GtSdk = Geetest::get($uid);
                    $res['GtSdk'] = $GtSdk;
                    break;
            }
        }

        $res['respon'] = 1;
        return $response->getBody()->write(json_encode($res));
    }

    public function loginHandle($request, $response, $args)
    {
        // $data = $request->post('sdf');
        $email = $request->getParam('email');
        $email = trim($email);
        $email = strtolower($email);
        $passwd = $request->getParam('passwd');
        $code = $request->getParam('code');
        $rememberMe = $request->getParam('remember_me');

        if ($_ENV['enable_login_captcha'] === true) {
            switch ($_ENV['captcha_provider']) {
                case 'recaptcha':
                    $recaptcha = $request->getParam('recaptcha');
                    if ($recaptcha == '') {
                        $ret = false;
                    } else {
                        $json = file_get_contents('https://recaptcha.net/recaptcha/api/siteverify?secret=' . $_ENV['recaptcha_secret'] . '&response=' . $recaptcha);
                        $ret = json_decode($json)->success;
                    }
                    break;
                case 'geetest':
                    $ret = Geetest::verify($request->getParam('geetest_challenge'), $request->getParam('geetest_validate'), $request->getParam('geetest_seccode'));
                    break;
            }
            if (!$ret) {
                $res['ret'] = 0;
                $res['msg'] = 'Please click the button to verify';
                return $response->getBody()->write(json_encode($res));
            }
        }

        // Handle Login
        $user = User::where('email', '=', $email)->first();
        if ($user == null) {
            $rs['ret'] = 0;
            $rs['msg'] = 'Email not found';
            return $response->getBody()->write(json_encode($rs));
        }

        if (!Hash::checkPassword($user->pass, $passwd)) {
            $rs['ret'] = 0;
            $rs['msg'] = 'E-mail or password is incorrect';


            $loginIP = new LoginIp();
            $loginIP->ip = $_SERVER['REMOTE_ADDR'];
            $loginIP->userid = $user->id;
            $loginIP->datetime = time();
            $loginIP->type = 1;
            $loginIP->save();

            return $response->getBody()->write(json_encode($rs));
        }

        $time = 3600 * 24;
        if ($rememberMe) {
            $time = 3600 * 24 * ($_ENV['rememberMeDuration'] ?: 7);
        }

        if ($user->ga_enable == 1) {
            $ga = new GA();
            $rcode = $ga->verifyCode($user->ga_token, $code);

            if (!$code) {
                $res['ret'] = 2;
                $res['msg'] = 'Two-step verification has been enabled for this account, please enter a 6-digit dynamic code';
                return $response->getBody()->write(json_encode($res));
            }
            if (!$rcode) {
                $res['ret'] = 0;
                $res['msg'] = 'The two-step verification code is wrong. If you lost the generator or set this option by mistake, you can try to reset the password to cancel this option';
                return $response->getBody()->write(json_encode($res));
            }
        }

        Auth::login($user->id, $time);
        $rs['ret'] = 1;
        $rs['msg'] = 'Login successful';

        $loginIP = new LoginIp();
        $loginIP->ip = $_SERVER['REMOTE_ADDR'];
        $loginIP->userid = $user->id;
        $loginIP->datetime = time();
        $loginIP->type = 0;
        $loginIP->save();

        return $response->getBody()->write(json_encode($rs));
    }

    public function qrcode_loginHandle($request, $response, $args)
    {
        // $data = $request->post('sdf');
        $token = $request->getParam('token');
        $number = $request->getParam('number');

        $ret = TelegramSessionManager::step2_verify_login_session($token, $number);
        if (!$ret) {
            $res['ret'] = 0;
            $res['msg'] = 'This token cannot be used.';
            return $response->getBody()->write(json_encode($res));
        }


        // Handle Login
        $user = User::where('id', '=', $ret)->first();
        // @todo
        $time = 3600 * 24;

        Auth::login($user->id, $time);
        $rs['ret'] = 1;
        $rs['msg'] = 'Login successful';

        $this->logUserIp($user->id, $_SERVER['REMOTE_ADDR']);

        return $response->getBody()->write(json_encode($rs));
    }

    private function logUserIp($id, $ip)
    {
        $loginip = new LoginIp();
        $loginip->ip = $ip;
        $loginip->userid = $id;
        $loginip->datetime = time();
        $loginip->type = 0;
        $loginip->save();
    }

    public function register($request, $response, $next)
    {
        $ary = $request->getQueryParams();
        $code = '';
        if (isset($ary['code'])) {
            $antiXss = new AntiXSS();
            $code = $antiXss->xss_clean($ary['code']);
        }

        $GtSdk = null;
        $recaptcha_sitekey = null;
        if ($_ENV['enable_reg_captcha'] === true) {
            switch ($_ENV['captcha_provider']) {
                case 'recaptcha':
                    $recaptcha_sitekey = $_ENV['recaptcha_sitekey'];
                    break;
                case 'geetest':
                    $uid = time() . random_int(1, 10000);
                    $GtSdk = Geetest::get($uid);
                    break;
            }
        }

        if ($_ENV['enable_telegram'] === true) {
            $login_text = TelegramSessionManager::add_login_session();
            $login = explode('|', $login_text);
            $login_token = $login[0];
            $login_number = $login[1];
        } else {
            $login_token = '';
            $login_number = '';
        }

        return $this->view()
            ->assign('geetest_html', $GtSdk)
            ->assign('enable_email_verify', Config::getconfig('Register.bool.Enable_email_verify'))
            ->assign('code', $code)
            ->assign('recaptcha_sitekey', $recaptcha_sitekey)
            ->assign('telegram_bot', $_ENV['telegram_bot'])
            ->assign('base_url', $_ENV['baseUrl'])
            ->assign('login_token', $login_token)
            ->assign('login_number', $login_number)
            ->display('auth/register.tpl');
    }

    public function sendVerify($request, $response, $next)
    {
        if (Config::getconfig('Register.bool.Enable_email_verify')) {
            $email = $request->getParam('email');
            $email = trim($email);

            if ($email == '') {
                $res['ret'] = 0;
                $res['msg'] = 'Email address required';
                return $response->getBody()->write(json_encode($res));
            }

            // check email format
            if (!Check::isEmailLegal($email)) {
                $res['ret'] = 0;
                $res['msg'] = 'Invalid email address';
                return $response->getBody()->write(json_encode($res));
            }
            // 注册邮箱黑名单
            $email_postfix = '@' . (explode("@", $email)[1]);
            if (in_array($email_postfix, MetronSetting::get('disable_mailbox_list')) === true) {
                $res['ret'] = 0;
                $res['msg'] = 'Prohibited email suffixes';
                return $response->getBody()->write(json_encode($res));
            }
            // 注册邮箱白名单
            if (MetronSetting::get('register_restricted_email') === true) {
                if (in_array($email_postfix, MetronSetting::get('list_of_available_mailboxes')) === false) {
                    $res['ret'] = 0;
                    $res['msg'] = 'Illegal request';
                    return $response->getBody()->write(json_encode($res));
                }
            }
            if (!Check::isGmailSmall($email)) {
                $res['ret'] = 0;
                $res['msg'] = 'The use of Gmail virtual mailboxes with a + sign is prohibited';
                return $response->getBody()->write(json_encode($res));
            }

            $user = User::where('email', '=', $email)->first();
            if ($user != null) {
                $res['ret'] = 0;
                $res['msg'] = 'This email is already registered';
                return $response->getBody()->write(json_encode($res));
            }

            $ipcount = EmailVerify::where('ip', '=', $_SERVER['REMOTE_ADDR'])->where('expire_in', '>', time())->count();
            if ($ipcount >= (int) Config::getconfig('Register.string.Email_verify_iplimit')) {
                $res['ret'] = 0;
                $res['msg'] = 'Too many requests from this IP';
                return $response->getBody()->write(json_encode($res));
            }

            $mailcount = EmailVerify::where('email', '=', $email)->where('expire_in', '>', time())->count();
            if ($mailcount >= 3) {
                $res['ret'] = 0;
                $res['msg'] = 'This email has been requested too many times';
                return $response->getBody()->write(json_encode($res));
            }

            $code = Tools::genRandomNum(6);

            $ev = new EmailVerify();
            $ev->expire_in = time() + (int) Config::getconfig('Register.string.Email_verify_ttl');
            $ev->ip = $_SERVER['REMOTE_ADDR'];
            $ev->email = $email;
            $ev->code = $code;
            $ev->save();

            $subject = $_ENV['appName'] . '- Verification email';

            try {
                Mail::send($email, $subject, 'auth/verify.tpl', [
                    'code' => $code, 'expire' => date('Y-m-d H:i:s', time() + (int) Config::getconfig('Register.string.Email_verify_ttl'))
                ], [
                    //BASE_PATH.'/public/assets/email/styles.css'
                ]);
            } catch (Exception $e) {
                $res['ret'] = 1;
                $res['msg'] = 'Email sending failed, please contact the site administrator.';
                return $response->getBody()->write(json_encode($res));
            }

            $res['ret'] = 1;
            $res['msg'] = 'The verification code has been sent successfully, please check your email.';
            return $response->getBody()->write(json_encode($res));
        }
        $res['ret'] = 0;
        return $response->getBody()->write(json_encode($res));
    }

    public function register_helper($name, $email, $passwd, $code, $imtype, $imvalue, $telegram_id)
    {
        if (Config::getconfig('Register.string.Mode') === 'close') {
            $res['ret'] = 0;
            $res['msg'] = 'Registration is not open.';
            return $res;
        }

        if ($name) {
            if (empty($name)) {
                $res['ret'] = 0;
                $res['msg'] = 'Username can not be blank';
                return $res;
            }
            $regname = '#[^\x{4e00}-\x{9fa5}A-Za-z0-9]#u';
            if (preg_match($regname, $name)) {
                $res['ret'] = 0;
                $res['msg'] = 'Username cannot contain symbols';
                return $res;
            }
            if (strlen($name) > 15) {
                $res['ret'] = 0;
                $res['msg'] = 'Username is too long';
                return $res;
            }
        } else {
            $name = $email;
        }


        if (User::where("reg_ip", $_SERVER['REMOTE_ADDR'])->count() >= 5) {
            $res['ret'] = 0;
            $res['msg'] = 'You created multi account with this ip';
            return $res;
        }


        $c = InviteCode::where('code', $code)->first();
        if ($c == null) {
            if (Config::getconfig('Register.string.Mode') === 'invite' && MetronSetting::get('register_code') === true) {
                $res['ret'] = 0;
                $res['msg'] = 'The invitation code is invalid';
                return $res;
            }
        } elseif ($c->user_id != 0) {
            $gift_user = User::where('id', '=', $c->user_id)->first();
            if ($gift_user == null) {
                $res['ret'] = 0;
                $res['msg'] = 'Inviter does not exist';
                return $res;
            }

            if ($gift_user->class == 0) {
                $res['ret'] = 0;
                $res['msg'] = 'The inviter is not a VIP';
                return $res;
            }

            if ($gift_user->invite_num == 0) {
                $res['ret'] = 0;
                $res['msg'] = 'The number of invitations available to the inviter is 0';
                return $res;
            }
        }

        // do reg user
        $user                       = new User();

        $antiXss                    = new AntiXSS();

        $user->user_name            = $antiXss->xss_clean($name);
        $user->email                = $email;
        $user->pass                 = Hash::passwordHash($passwd);
        $user->passwd               = Tools::genRandomChar(16);
        $user->port                 = Tools::getAvPort();
        $user->t                    = 0;
        $user->u                    = 0;
        $user->d                    = 0;
        $user->method               = Config::getconfig('Register.string.defaultMethod');
        $user->protocol             = Config::getconfig('Register.string.defaultProtocol');
        $user->protocol_param       = Config::getconfig('Register.string.defaultProtocol_param');
        $user->obfs                 = Config::getconfig('Register.string.defaultObfs');
        $user->obfs_param           = Config::getconfig('Register.string.defaultObfs_param');
        $user->forbidden_ip         = $_ENV['reg_forbidden_ip'];
        $user->forbidden_port       = $_ENV['reg_forbidden_port'];
        $user->im_type              = $imtype;
        $user->im_value             = $antiXss->xss_clean($imvalue);
        $user->transfer_enable      = Tools::toGB((int) Config::getconfig('Register.string.defaultTraffic'));
        $user->invite_num           = (int) Config::getconfig('Register.string.defaultInviteNum');
        $user->auto_reset_day       = $_ENV['reg_auto_reset_day'];
        $user->auto_reset_bandwidth = $_ENV['reg_auto_reset_bandwidth'];
        $user->money                = 0;
        $user->sendDailyMail        = Config::getconfig('Register.bool.send_dailyEmail');

        //dumplin：填写邀请人，写入邀请奖励
        $user->ref_by = 0;
        if (($c != null) && $c->user_id != 0) {
            $gift_user = User::where('id', '=', $c->user_id)->first();
            $user->ref_by = $c->user_id;
            $user->money = (int) Config::getconfig('Register.string.defaultInvite_get_money');
            $gift_user->transfer_enable += $_ENV['invite_gift'] * 1024 * 1024 * 1024;
            --$gift_user->invite_num;
            $gift_user->save();
        }
        if ($telegram_id) {
            $user->telegram_id = $telegram_id;
        }

        $user->class_expire     = date('Y-m-d H:i:s', time() + (int) Config::getconfig('Register.string.defaultClass_expire') * 3600);
        $user->class            = (int) Config::getconfig('Register.string.defaultClass');
        $user->node_connector   = (int) Config::getconfig('Register.string.defaultConn');
        $user->node_speedlimit  = (int) Config::getconfig('Register.string.defaultSpeedlimit');
        $user->expire_in        = date('Y-m-d H:i:s', time() + (int) Config::getconfig('Register.string.defaultExpire_in') * 86400);
        $user->reg_date         = date('Y-m-d H:i:s');
        $user->reg_ip           = $_SERVER['REMOTE_ADDR'];
        $user->plan             = 'A';
        $user->theme            = $_ENV['theme'];
        $user->uuid             = Uuid::uuid3(Uuid::NAMESPACE_DNS, ($user->passwd) . $_ENV['key'])->toString();
        $groups                 = explode(',', $_ENV['random_group']);

        $user->node_group       = $groups[array_rand($groups)];

        $ga = new GA();
        $secret = $ga->createSecret();

        $user->ga_token = $secret;
        $user->ga_enable = 0;
        if (MetronSetting::get('c_rebate') === true) {
            $user->c_rebate     = 1;
        }

        if ($user->save()) {
            if (Config::getconfig('Register.bool.Enable_email_verify')) {
                EmailVerify::where('email', '=', $email)->delete();
            }
            Auth::login($user->id, 3600);
            $this->logUserIp($user->id, $_SERVER['REMOTE_ADDR']);

            $res['ret'] = 1;
            $res['msg'] = 'Registration success! Now you can login';

            Radius::Add($user, $user->passwd);
            return $res;
        }
        $res['ret'] = 0;
        $res['msg'] = 'Unknown error';
        return $res;
    }

    public function registerHandle($request, $response)
    {
        if (Config::getconfig('Register.string.Mode') === 'close') {
            $res['ret'] = 0;
            $res['msg'] = 'Registration is not open.';
            return $response->getBody()->write(json_encode($res));
        }

        $name = $request->getParam('name');
        $email = $request->getParam('email');
        $email = trim($email);
        $email = strtolower($email);
        $passwd = $request->getParam('passwd');
        $repasswd = $request->getParam('repasswd');
        $code = $request->getParam('code');
        $code = trim($code);
        $imtype = $request->getParam('imtype');
        $emailcode = $request->getParam('emailcode');
        $emailcode = trim($emailcode);

        // 前端传入参数为wechat, 后续作为 im_value使用，变量改名为 im_value
        $imvalue = $request->getParam('wechat');
        $imvalue = trim($imvalue);

        if ($_ENV['enable_reg_captcha'] === true) {
            switch ($_ENV['captcha_provider']) {
                case 'recaptcha':
                    $recaptcha = $request->getParam('recaptcha');
                    if ($recaptcha == '') {
                        $ret = false;
                    } else {
                        $json = file_get_contents('https://recaptcha.net/recaptcha/api/siteverify?secret=' . $_ENV['recaptcha_secret'] . '&response=' . $recaptcha);
                        $ret = json_decode($json)->success;
                    }
                    break;
                case 'geetest':
                    $ret = Geetest::verify($request->getParam('geetest_challenge'), $request->getParam('geetest_validate'), $request->getParam('geetest_seccode'));
                    break;
            }
            if (!$ret) {
                $res['ret'] = 0;
                $res['msg'] = 'Please click the button to verify';
                return $response->getBody()->write(json_encode($res));
            }
        }

        // check email format
        if (!Check::isEmailLegal($email)) {
            $res['ret'] = 0;
            $res['msg'] = 'Invalid email address';
            return $response->getBody()->write(json_encode($res));
        }
        // 注册邮箱黑名单
        $email_postfix = '@' . (explode("@", $email)[1]);
        if (in_array($email_postfix, MetronSetting::get('disable_mailbox_list')) === true) {
            $res['ret'] = 0;
            $res['msg'] = 'Prohibited email suffixes';
            return $response->getBody()->write(json_encode($res));
        }
        // 注册邮箱白名单
        if (MetronSetting::get('register_restricted_email') === true) {
            if (in_array($email_postfix, MetronSetting::get('list_of_available_mailboxes')) === false) {
                $res['ret'] = 0;
                $res['msg'] = 'Illegal request';
                return $response->getBody()->write(json_encode($res));
            }
        }
        if (!Check::isGmailSmall($email)) {
            $res['ret'] = 0;
            $res['msg'] = 'The use of Gmail virtual mailboxes with a + sign is prohibited';
            return $response->getBody()->write(json_encode($res));
        }
        // check email
        $user = User::where('email', $email)->first();
        if ($user != null) {
            $res['ret'] = 0;
            $res['msg'] = 'Email has been already registered';
            return $response->getBody()->write(json_encode($res));
        }

        if (Config::getconfig('Register.bool.Enable_email_verify')) {
            $mailcount = EmailVerify::where('email', '=', $email)->where('code', '=', $emailcode)->where('expire_in', '>', time())->first();
            if ($mailcount == null) {
                $res['ret'] = 0;
                $res['msg'] = 'Your email verification code is incorrect';
                return $response->getBody()->write(json_encode($res));
            }
        }

        // check pwd length
        if (strlen($passwd) < 8) {
            $res['ret'] = 0;
            $res['msg'] = 'Password should be greater than 8 characters';
            return $response->getBody()->write(json_encode($res));
        }

        // check pwd re
        if ($passwd != $repasswd) {
            $res['ret'] = 0;
            $res['msg'] = 'The two passwords entered do not match';
            return $response->getBody()->write(json_encode($res));
        }


        $res = $this->register_helper($name, $email, $passwd, $code, $imtype, $imvalue, 0);
        return $response->getBody()->write(json_encode($res));
    }

    public function logout($request, $response, $next)
    {
        Auth::logout();
        return $response->withStatus(302)->withHeader('Location', '/auth/login');
    }

    public function qrcode_check($request, $response, $args)
    {
        $token = $request->getParam('token');
        $number = $request->getParam('number');
        $user = Auth::getUser();
        if ($user->isLogin) {
            $res['ret'] = 0;
            return $response->getBody()->write(json_encode($res));
        }

        if ($_ENV['enable_telegram'] === true) {
            $ret = TelegramSessionManager::check_login_session($token, $number);
            $res['ret'] = $ret;
            return $response->getBody()->write(json_encode($res));
        }

        $res['ret'] = 0;
        return $response->getBody()->write(json_encode($res));
    }

    public function telegram_oauth($request, $response, $args)
    {
        if ($_ENV['enable_telegram'] === true) {
            $auth_data = $request->getQueryParams();
            if ($this->telegram_oauth_check($auth_data) === true) { // Looks good, proceed.
                $telegram_id = $auth_data['id'];
                $user = User::where('telegram_id', $telegram_id)->first(); // Welcome Back :)
                if ($user == null) {
                    return $this->view()->assign('title', 'You need to register your email first and then bind Telegram to log in with authorization')->assign('message', 'Sorry for the inconvenience, please try again')->assign('redirect', '/auth/login')->display('telegram_error.tpl');
                }
                Auth::login($user->id, 3600);
                $this->logUserIp($user->id, $_SERVER['REMOTE_ADDR']);

                // 登陆成功！
                return $this->view()->assign('title', 'Login successful')->assign('message', 'heading to dashboard')->assign('redirect', '/user')->display('telegram_success.tpl');
            }
            // 验证失败
            return $this->view()->assign('title', 'Login timeout or illegally constructed information')->assign('message', 'Sorry for the inconvenience, please try again')->assign('redirect', '/auth/login')->display('telegram_error.tpl');
        }
        return $response->withRedirect('/404');
    }

    private function telegram_oauth_check($auth_data)
    {
        $check_hash = $auth_data['hash'];
        $bot_token = $_ENV['telegram_token'];
        unset($auth_data['hash']);
        $data_check_arr = [];
        foreach ($auth_data as $key => $value) {
            $data_check_arr[] = $key . '=' . $value;
        }
        sort($data_check_arr);
        $data_check_string = implode("\n", $data_check_arr);
        $secret_key = hash('sha256', $bot_token, true);
        $hash = hash_hmac('sha256', $data_check_string, $secret_key);
        if (strcmp($hash, $check_hash) !== 0) {
            return false; // Bad Data :(
        }

        if ((time() - $auth_data['auth_date']) > 300) { // Expire @ 5mins
            return false;
        }

        return true; // Good to Go
    }
}
