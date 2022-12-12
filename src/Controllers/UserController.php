<?php

namespace App\Controllers;

use App\Services\{
    Auth,
    Mail,
    Config,
    Payment,
    MetronSetting
};
use App\Models\{
    Ip,
    Ann,
    Code,
    Node,
    Shop,
    User,
    Token,
    Relay,
    Bought,
    Coupon,
    Ticket,
    Payback,
    BlockIp,
    LoginIp,
    UnblockIp,
    Speedtest,
    DetectLog,
    DetectRule,
    TrafficLog,
    InviteCode,
    UserSubscribeLog
};
use App\Utils\{
    GA,
    Pay,
    URL,
    Hash,
    QQWry,
    Tools,
    Radius,
    Cookie,
    Geetest,
    Telegram,
    ClientProfiles,
    DatatablesHelper,
    TelegramSessionManager
};
use App\Metron\{Metron, MtAuth, MtTelegram};
use Ramsey\Uuid\Uuid;
use voku\helper\AntiXSS;
use Exception;

/**
 *  HomeController
 */
class UserController extends BaseController
{
    public function index($request, $response, $args)
    {
        $ssr_sub_token = LinkController::GenerateSSRSubCode($this->user->id, 0);

        $GtSdk = null;
        $recaptcha_sitekey = null;
        if ($_ENV['enable_checkin_captcha'] == true) {
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

        $Ann = Ann::orderBy('date', 'desc')->first();

        if ($_ENV['subscribe_client_url'] != '') {
            $getClient = new Token();
            for ($i = 0; $i < 10; $i++) {
                $token = $this->user->id . Tools::genRandomChar(16);
                $Elink = Token::where('token', '=', $token)->first();
                if ($Elink == null) {
                    $getClient->token = $token;
                    break;
                }
            }
            $getClient->user_id     = $this->user->id;
            $getClient->create_time = time();
            $getClient->expire_time = time() + 10 * 60;
            $getClient->save();
        } else {
            $token = '';
        }

        if (!$paybacks_sum = Payback::where("ref_by", $this->user->id)->sum('ref_get')) {
            $paybacks_sum = 0;
        }
        $class_left_days = floor((strtotime($this->user->class_expire) - time()) / 86400) + 1;
        return $this->view()
            ->assign('class_left_days', $class_left_days)
            ->assign('paybacks_sum', $paybacks_sum)
            ->assign('ssr_sub_token', $ssr_sub_token)
            ->assign('display_ios_class', $_ENV['display_ios_class'])
            ->assign('display_ios_topup', $_ENV['display_ios_topup'])
            ->assign('ios_account', $_ENV['ios_account'])
            ->assign('ios_password', $_ENV['ios_password'])
            ->assign('ann', $Ann)
            ->assign('geetest_html', $GtSdk)
            ->assign('mergeSub', $_ENV['mergeSub'])
            ->assign('subUrl', $_ENV['subUrl'])
            ->registerClass('URL', URL::class)
            ->assign('recaptcha_sitekey', $recaptcha_sitekey)
            ->assign('subInfo', LinkController::getSubinfo($this->user, 0))
            ->assign('getClient', $token)
            ->display('user/index.tpl');
    }

    public function lookingglass($request, $response, $args)
    {
        $Speedtest = Speedtest::where('datetime', '>', time() - $_ENV['Speedtest_duration'] * 3600)->orderBy('datetime', 'desc')->get();

        return $this->view()->assign('speedtest', $Speedtest)->assign('hour', $_ENV['Speedtest_duration'])->display('user/lookingglass.tpl');
    }

    public function code($request, $response, $args)
    {
        $pageNum = $request->getQueryParams()['page'] ?? 1;
        $codes = Code::where('type', '<>', '-2')->where('userid', '=', $this->user->id)->orderBy('id', 'desc')->paginate(15, ['*'], 'page', $pageNum);
        $codes->setPath('/user/code');
        return $this->view()
            ->assign('codes', $codes)
            ->assign('pmw', Payment::purchaseHTML())
            ->display('user/code.tpl');
    }

    public function orderDelete($request, $response, $args)
    {
    }

    public function donate($request, $response, $args)
    {
        if ($_ENV['enable_donate'] != true) {
            exit(0);
        }

        $pageNum = $request->getQueryParams()['page'] ?? 1;
        $codes = Code::where(
            static function ($query) {
                $query->where('type', '=', -1)
                    ->orWhere('type', '=', -2);
            }
        )->where('isused', 1)->orderBy('id', 'desc')->paginate(15, ['*'], 'page', $pageNum);
        $codes->setPath('/user/donate');
        return $this->view()->assign('codes', $codes)->assign('total_in', Code::where('isused', 1)->where('type', -1)->sum('number'))->assign('total_out', Code::where('isused', 1)->where('type', -2)->sum('number'))->display('user/donate.tpl');
    }

    public function isHTTPS()
    {
        define('HTTPS', false);
        if (defined('HTTPS') && HTTPS) {
            return true;
        }
        if (!isset($_SERVER)) {
            return false;
        }
        if (!isset($_SERVER['HTTPS'])) {
            return false;
        }
        if ($_SERVER['HTTPS'] === 1) {  //Apache
            return true;
        }

        if ($_SERVER['HTTPS'] === 'on') { //IIS
            return true;
        }

        if ($_SERVER['SERVER_PORT'] == 443) { //其他
            return true;
        }
        return false;
    }

    public function code_check($request, $response, $args)
    {
        $time = $request->getQueryParams()['time'];
        $codes = Code::where('userid', '=', $this->user->id)->where('usedatetime', '>', date('Y-m-d H:i:s', $time))->first();
        if ($codes != null && strpos($codes->code, '充值') !== false) {
            $res['ret'] = 1;
            return $response->getBody()->write(json_encode($res));
        }

        $res['ret'] = 0;
        return $response->getBody()->write(json_encode($res));
    }

    public function codepost($request, $response, $args)
    {
        $code = $request->getParam('code');
        $code = trim($code);
        $user = $this->user;

        if ($code == '') {
            $res['ret'] = 0;
            $res['msg'] = 'Illegal input';
            return $response->getBody()->write(json_encode($res));
        }

        $codeq = Code::where('code', '=', $code)->where('isused', '=', 0)->first();
        if ($codeq == null) {
            $res['ret'] = 0;
            $res['msg'] = 'This recharge code is wrong';
            return $response->getBody()->write(json_encode($res));
        }

        $codeq->isused = 1;
        $codeq->usedatetime = date('Y-m-d H:i:s');
        $codeq->userid = $user->id;
        $codeq->save();

        if ($codeq->type == -1) {
            $user->money += $codeq->number;
            $user->save();

            if ($user->ref_by != '' && $user->ref_by != 0 && $user->ref_by != null) {
                Metron::add_payback(User::find($user->ref_by), $user, $codeq->number);
                /*
                $gift_user = User::where('id', '=', $user->ref_by)->first();
                $gift_user->money += ($codeq->number * ($_ENV['code_payback'] / 100));
                $gift_user->save();

                $Payback = new Payback();
                $Payback->total = $codeq->number;
                $Payback->userid = $this->user->id;
                $Payback->ref_by = $this->user->ref_by;
                $Payback->ref_get = $codeq->number * ($_ENV['code_payback'] / 100);
                $Payback->datetime = time();
                $Payback->save();
		*/
            }

            $res['ret'] = 1;
            $res['msg'] = 'The recharge is successful, the recharge amount is' . $codeq->number . 'yuan. ';

            if ($_ENV['enable_donate'] == true) {
                if ($this->user->is_hide == 1) {
                    Telegram::Send('Sister, sister, an old man who does not want to be named donated to us' . $codeq->number . 'Yuan~');
                } else {
                    Telegram::Send('Sister, sister,' . $this->user->user_name . 'The old man donated to us' . $codeq->number . 'Yuan~');
                }
            }

            return $response->getBody()->write(json_encode($res));
        }

        if ($codeq->type == 10001) {
            $user->transfer_enable += $codeq->number * 1024 * 1024 * 1024;
            $user->save();
        }

        if ($codeq->type == 10002) {
            if (time() > strtotime($user->expire_in)) {
                $user->expire_in = date('Y-m-d H:i:s', time() + $codeq->number * 86400);
            } else {
                $user->expire_in = date('Y-m-d H:i:s', strtotime($user->expire_in) + $codeq->number * 86400);
            }
            $user->save();
        }

        if ($codeq->type >= 1 && $codeq->type <= 10000) {
            if ($user->class == 0 || $user->class != $codeq->type) {
                $user->class_expire = date('Y-m-d H:i:s', time());
                $user->save();
            }
            $user->class_expire = date('Y-m-d H:i:s', strtotime($user->class_expire) + $codeq->number * 86400);
            $user->class = $codeq->type;
            $user->save();
        }
    }

    public function GaCheck($request, $response, $args)
    {
        $code = $request->getParam('code');
        $user = $this->user;


        if ($code == '') {
            $res['ret'] = 0;
            $res['msg'] = 'Dynamic code cannot be empty';
            return $response->getBody()->write(json_encode($res));
        }

        $ga = new GA();
        $rcode = $ga->verifyCode($user->ga_token, $code);
        if (!$rcode) {
            $res['ret'] = 0;
            $res['msg'] = 'Dynamic code error';
            return $response->getBody()->write(json_encode($res));
        }

        // Enable user two-step verification
        $user->ga_enable = 1;
        $user->save();

        $res['ret'] = 1;
        $res['msg'] = 'Successfully turned on two-step verification';
        return $response->getBody()->write(json_encode($res));
    }

    public function GaSet($request, $response, $args)
    {
        $enable = $request->getParam('enable');
        $user = $this->user;

        if ($enable == '') {
            $res['ret'] = 0;
            $res['msg'] = 'Invalid option';
            return $response->getBody()->write(json_encode($res));
        }

        // Turn off two-step verification and need to confirm the account password
        $passwd = $request->getParam('passwd');
        if (!Hash::checkPassword($user->pass, $passwd)) {
            $res['ret'] = 0;
            $res['msg'] = 'Password error';
            return $this->echoJson($response, $res);
        }

        $user->ga_enable = $enable;
        $user->save();


        $res['ret'] = 1;
        $res['msg'] = 'Two-step verification turned off';
        return $response->getBody()->write(json_encode($res));
    }

    public function ResetPort($request, $response, $args)
    {
        $user = $this->user;
        $temp = $user->ResetPort();
        $res['msg'] = $temp['msg'];
        $res['ret'] = ($temp['ok'] === true ? 1 : 0);
        return $response->getBody()->write(json_encode($res));
    }

    public function SpecifyPort($request, $response, $args)
    {
        $user = $this->user;
        $port = $request->getParam('port');
        $temp = $user->SpecifyPort($port);
        $res['msg'] = $temp['msg'];
        $res['ret'] = ($temp['ok'] === true ? 1 : 0);
        return $response->getBody()->write(json_encode($res));
    }

    public function GaReset($request, $response, $args)
    {
        $user = $this->user;
        $ga = new GA();
        $secret = $ga->createSecret();

        $user->ga_token = $secret;
        $user->save();
        return $response->withStatus(302)->withHeader('Location', '/user/edit');
    }

    public function profile($request, $response, $args)
    {
        $pageNum = $request->getQueryParams()['page'] ?? 1;
        $paybacks = Payback::where('ref_by', $this->user->id)->orderBy('datetime', 'desc')->paginate(15, ['*'], 'page', $pageNum);
        $paybacks->setPath('/user/profile');

        $iplocation = new QQWry();

        $userip = array();

        $total = Ip::where('datetime', '>=', time() - 300)->where('userid', '=', $this->user->id)->get();

        $totallogin = LoginIp::where('userid', '=', $this->user->id)->where('type', '=', 0)->orderBy('datetime', 'desc')->take(10)->get();

        $userloginip = array();

        foreach ($totallogin as $single) {
            //if(isset($useripcount[$single->userid]))
            {
                if (!isset($userloginip[$single->ip])) {
                    //$useripcount[$single->userid]=$useripcount[$single->userid]+1;
                    $location = $iplocation->getlocation($single->ip);
                    $userloginip[$single->ip] = iconv('gbk', 'utf-8//IGNORE', $location['country'] . $location['area']);
                }
            }
        }

        foreach ($total as $single) {
            //if(isset($useripcount[$single->userid]))
            {
                $single->ip = Tools::getRealIp($single->ip);
                $is_node = Node::where('node_ip', $single->ip)->first();
                if ($is_node) {
                    continue;
                }


                if (!isset($userip[$single->ip])) {
                    //$useripcount[$single->userid]=$useripcount[$single->userid]+1;
                    $location = $iplocation->getlocation($single->ip);
                    $userip[$single->ip] = iconv('gbk', 'utf-8//IGNORE', $location['country'] . $location['area']);
                }
            }
        }

        //$boughts = Bought::where('userid', $this->user->id)->orderBy('id', 'desc')->get();

        $bind_token = TelegramSessionManager::add_bind_session($this->user);
        if ($request->getParam('json') == 1) {
            $res['userip']      = $userip;
            $res['userloginip'] = $userloginip;
            $res['paybacks']    = $paybacks;
            $res['ret']         = 1;
            return $response->getBody()->write(json_encode($res));
        };

        return $this->view()->assign('bind_token', $bind_token)->assign('telegram_bot', $_ENV['telegram_bot'])->assign('userip', $userip)->assign('userloginip', $userloginip)->assign('paybacks', $paybacks)->display('user/profile.tpl');
    }

    public function announcement($request, $response, $args)
    {
        $Anns = Ann::orderBy('date', 'desc')->get();

        if ($request->getParam('json') == 1) {
            $res['Anns']      = $Anns;
            $res['ret']         = 1;
            return $this->echoJson($response, $res);
        };

        return $this->view()->assign('anns', $Anns)->display('user/announcement.tpl');
    }

    public function tutorial($request, $response, $args)
    {
        $opts = $request->getQueryParams();
        if ($opts['os'] == 'faq') {
            return $this->view()->display('user/tutorial/faq.tpl');
        }
        $opts['os'] = str_replace(' ', '', $opts['os']);
        $opts['client'] = str_replace(' ', '', $opts['client']);
        if ($opts['os'] != '' && $opts['client'] != '') {
            $url = 'user/tutorial/' . $opts['os'] . '/' . $opts['client'] . '.tpl';
            return $this->view()
                ->assign('subInfo', LinkController::getSubinfo($this->user, 0))
                ->assign('mergeSub', Config::get('mergeSub'))
                ->assign('subUrl', Config::get('subUrl'))
                ->assign('user', $this->user)
                ->registerClass('URL', URL::class)
                ->assign('baseUrl', Config::get('baseUrl'))
                ->display($url);
        } else {
            return $this->view()->display('user/help/home.tpl');
        }
    }

    public function edit($request, $response, $args)
    {
        $themes = Tools::getDir(BASE_PATH . '/resources/views');

        $BIP = BlockIp::where('ip', $_SERVER['REMOTE_ADDR'])->first();
        if ($BIP == null) {
            $Block = 'IP: ' . $_SERVER['REMOTE_ADDR'] . ' 没有被封';
            $isBlock = 0;
        } else {
            $Block = 'IP: ' . $_SERVER['REMOTE_ADDR'] . ' 已被封';
            $isBlock = 1;
        }

        $bind_token = TelegramSessionManager::add_bind_session($this->user);

        $config_service = new Config();

        return $this->view()
            ->assign('user', $this->user)
            ->assign('themes', $themes)
            ->assign('isBlock', $isBlock)
            ->assign('Block', $Block)
            ->assign('bind_token', $bind_token)
            ->assign('telegram_bot', $_ENV['telegram_bot'])
            ->assign('config_service', $config_service)
            ->registerClass('URL', URL::class)
            ->display('user/edit.tpl');
    }

    public function invite($request, $response, $args)
    {
        $code = InviteCode::where('user_id', $this->user->id)->first();
        if ($code == null) {
            $this->user->addInviteCode();
            $code = InviteCode::where('user_id', $this->user->id)->first();
        }

        $pageNum = $request->getQueryParams()['page'] ?? 1;
        $paybacks = Payback::where('ref_by', $this->user->id)->orderBy('id', 'desc')->paginate(15, ['*'], 'page', $pageNum);
        if (!$paybacks_sum = Payback::where('ref_by', $this->user->id)->sum('ref_get')) {
            $paybacks_sum = 0;
        }
        $paybacks->setPath('/user/invite');

        return $this->view()
            ->assign('code', $code)
            ->assign('paybacks', $paybacks)
            ->assign('paybacks_sum', $paybacks_sum)
            ->display('user/invite.tpl');
    }

    public function buyInvite($request, $response, $args)
    {
        $price = $_ENV['invite_price'];
        $num = $request->getParam('num');
        $num = trim($num);

        if (!Tools::isInt($num) || $price < 0 || $num <= 0) {
            $res['ret'] = 0;
            $res['msg'] = 'Illegal request';
            return $response->getBody()->write(json_encode($res));
        }

        $amount = $price * $num;

        $user = $this->user;

        if (!$user->isLogin) {
            $res['ret'] = -1;
            return $response->getBody()->write(json_encode($res));
        }

        if ($user->money < $amount) {
            $res['ret'] = 0;
            $res['msg'] = 'Insufficient balance, the total price is ' . $amount . ' yuan. ';
            return $response->getBody()->write(json_encode($res));
        }
        $user->invite_num += $num;
        $user->money -= $amount;
        $user->save();
        $res['invite_num'] = $user->invite_num;
        $res['ret'] = 1;
        $res['msg'] = 'Invitations added successfully';
        return $response->getBody()->write(json_encode($res));
    }

    public function customInvite($request, $response, $args)
    {
        $price = $_ENV['custom_invite_price'];
        $customcode = $request->getParam('customcode');
        $customcode = trim($customcode);

        if (!Tools::is_validate($customcode) || $price < 0 || $customcode == '' || strlen($customcode) > 32) {
            $res['ret'] = 0;
            $res['msg'] = 'Illegal request, the invitation link suffix cannot contain special symbols and the length cannot exceed 32 characters';
            return $response->getBody()->write(json_encode($res));
        }

        if (InviteCode::where('code', $customcode)->count() != 0) {
            $res['ret'] = 0;
            $res['msg'] = 'This suffix has been registered';
            return $response->getBody()->write(json_encode($res));
        }

        $user = $this->user;

        if (!$user->isLogin) {
            $res['ret'] = -1;
            return $response->getBody()->write(json_encode($res));
        }

        if ($user->money < $price) {
            $res['ret'] = 0;
            $res['msg'] = 'Insufficient balance, the total price is ' . $price . ' yuan. ';
            return $response->getBody()->write(json_encode($res));
        }
        $code = InviteCode::where('user_id', $user->id)->first();
        $code->code = $customcode;
        $user->money -= $price;
        $user->save();
        $code->save();
        $res['ret'] = 1;
        $res['msg'] = 'Customization succeeded';
        return $response->getBody()->write(json_encode($res));
    }

    public function sys()
    {
        return $this->view()->assign('ana', '')->display('user/sys.tpl');
    }

    public function updatePassword($request, $response, $args)
    {
        $oldpwd = $request->getParam('oldpwd');
        $pwd = $request->getParam('pwd');
        $repwd = $request->getParam('repwd');
        $user = $this->user;
        if (!Hash::checkPassword($user->pass, $oldpwd)) {
            $res['ret'] = 0;
            $res['msg'] = 'The old password is wrong';
            return $response->getBody()->write(json_encode($res));
        }
        if ($pwd != $repwd) {
            $res['ret'] = 0;
            $res['msg'] = 'Two inputs do not match';
            return $response->getBody()->write(json_encode($res));
        }

        if (strlen($pwd) < 8) {
            $res['ret'] = 0;
            $res['msg'] = 'The password is too short';
            return $response->getBody()->write(json_encode($res));
        }
        $hashPwd = Hash::passwordHash($pwd);
        $user->pass = $hashPwd;
        $user->save();

        $user->clean_link();

        $res['ret'] = 1;
        $res['msg'] = 'Modified successfully';
        return $this->echoJson($response, $res);
    }

    public function updateHide($request, $response, $args)
    {
        $hide = $request->getParam('hide');
        $user = $this->user;
        $user->is_hide = $hide;
        $user->save();

        $res['ret'] = 1;
        $res['msg'] = 'Modified successfully';
        return $this->echoJson($response, $res);
    }

    public function Unblock($request, $response, $args)
    {
        $user = $this->user;
        $BIP = BlockIp::where('ip', $_SERVER['REMOTE_ADDR'])->get();
        foreach ($BIP as $bi) {
            $bi->delete();
        }

        $UIP = new UnblockIp();
        $UIP->userid = $user->id;
        $UIP->ip = $_SERVER['REMOTE_ADDR'];
        $UIP->datetime = time();
        $UIP->save();

        $res['ret'] = 1;
        $res['msg'] = $_SERVER['REMOTE_ADDR'];
        return $this->echoJson($response, $res);
    }

    public function shop($request, $response, $args)
    {
        $shops = Shop::where('status', 1)->orderBy('name')->get();
        return $this->view()->assign('shops', $shops)->display('user/shop.tpl');
    }

    public function CouponCheck($request, $response, $args)
    {
        $coupon = $request->getParam('coupon');
        $coupon = trim($coupon);

        $user = $this->user;

        if (!$user->isLogin) {
            $res['ret'] = -1;
            return $response->getBody()->write(json_encode($res));
        }

        $shop = $request->getParam('shop');

        $shop = Shop::where('id', $shop)->where('status', 1)->first();

        if ($shop == null) {
            $res['ret'] = 0;
            $res['msg'] = 'Illegal request';
            return $response->getBody()->write(json_encode($res));
        }

        if ($shop->limitamount() != 0 && $shop->limitamount('can') <= 0) {
            $res['ret'] = 0;
            $res['msg'] = 'The product has reached the purchase limit';
            return $response->getBody()->write(json_encode($res));
        }

        if ($coupon == '') {
            $res['ret'] = 1;
            $res['name'] = $shop->name;
            $res['credit'] = '0 %';
            $res['total'] = $shop->price;
            $res['money'] = $user->money;
            if ($res['total'] > $res['money']) {
                $res['need'] = bcsub($res['total'], $res['money'], 2);
            } else {
                $res['need'] = 0;
            }
            return $response->getBody()->write(json_encode($res));
        }

        $coupon = Coupon::where('code', $coupon)->first();

        if ($coupon == null) {
            $res['ret'] = 0;
            $res['msg'] = 'Discount code invalid';
            return $response->getBody()->write(json_encode($res));
        }
        // Coupon code time expired
        if ($coupon->expire < time()) {
            $res['ret'] = 0;
            $res['msg'] = 'Promo code has expired';
            return $response->getBody()->write(json_encode($res));
        }
        if ($coupon->order($shop->id) == false) {
            $res['ret'] = 0;
            $res['msg'] = 'This discount code cannot be used for this product';
            return $response->getBody()->write(json_encode($res));
        }

        $use_limit = $coupon->onetime;
        if ($use_limit > 0) {
            $use_count = Bought::where('userid', $user->id)->where('coupon', $coupon->code)->count();
            if ($use_count >= $use_limit) {
                $res['ret'] = 0;
                $res['msg'] = 'The coupon code has been exhausted';
                return $response->getBody()->write(json_encode($res));
            }
        }

        $res['ret']     = 1;
        $res['name']    = $shop->name;
        $res['credit']  = $coupon->credit . ' %';
        $res['total']   = round($shop->price * ((100 - $coupon->credit) / 100), 2);
        $res['money']   = $user->money;
        $res['need']    = 0;
        if ($res['total'] > $res['money']) {
            $res['need'] = bcsub($res['total'], $res['money'], 2);
        } else {
            $res['need'] = 0;
        }
        return $response->getBody()->write(json_encode($res));
    }

    public function buy_traffic_package($request, $response, $args)
    {
        $user = $this->user;
        $shop = $request->getParam('shop');
        $shop = Shop::where('id', $shop)->where('status', 1)->first();
        $price = $shop->price;

        if ($shop == null || $shop->traffic_package() == 0) {
            $res['ret'] = 0;
            $res['msg'] = 'Illegal request';
            return $response->getBody()->write(json_encode($res));
        }

        $content = json_decode($shop->content);

        if ($user->class < $content->traffic_package->class->min || $user->class > $content->traffic_package->class->max) {
            $res['ret'] = 0;
            $res['msg'] = 'Your current membership level cannot purchase this traffic package';
            return $response->getBody()->write(json_encode($res));
        }

        if (!$user->isLogin) {
            $res['ret'] = -1;
            return $response->getBody()->write(json_encode($res));
        }

        if (bccomp($user->money, $price, 2) == -1) {
            $res['ret'] = 0;
            $res['msg'] = 'Meow Meow~ The current balance is insufficient, and the total price is ' . $price . 'yuan. </br><a href="/user/code">Click to enter the recharge interface</a>';
            return $response->getBody()->write(json_encode($res));
        }

        $user->money = bcsub($user->money, $price, 2);
        $user->save();

        $bought = new Bought();
        $bought->userid = $user->id;
        $bought->shopid = $shop->id;
        $bought->datetime = time();
        $bought->renew = 0;
        $bought->coupon = 0;
        $bought->price = $price;
        $bought->save();

        $shop->buy($user);

        $res['ret'] = 1;
        $res['msg'] = 'Purchase successful';

        return $response->getBody()->write(json_encode($res));
    }

    public function buy($request, $response, $args)
    {
        $user = $this->user;
        $coupon = $request->getParam('coupon');
        $coupon = trim($coupon);
        $code = $coupon;
        $shop = $request->getParam('shop');
        $disableothers = $request->getParam('disableothers');
        $autorenew = $request->getParam('autorenew');

        $shop = Shop::where('id', $shop)->where('status', 1)->first();

        if ($shop == null) {
            $res['ret'] = 0;
            $res['msg'] = 'Illegal request';
            return $response->getBody()->write(json_encode($res));
        }

        if ($coupon == '') {
            $credit = 0;
        } else {
            $coupon = Coupon::where('code', $coupon)->first();

            if ($coupon == null) {
                $credit = 0;
            } else {
                $credit = $coupon->credit;
            }

            if ($coupon->order($shop->id) == false) {
                $res['ret'] = 0;
                $res['msg'] = 'This discount code cannot be used for this product';
                return $response->getBody()->write(json_encode($res));
            }

            if ($coupon->expire < time()) {
                $res['ret'] = 0;
                $res['msg'] = 'This discount code has expired';
                return $response->getBody()->write(json_encode($res));
            }

            $use_limit = $coupon->onetime;
            if ($use_limit > 0) {
                $use_count = Bought::where('userid', $user->id)->where('coupon', $coupon->code)->count();
                if ($use_count >= $use_limit) {
                    $res['ret'] = 0;
                    $res['msg'] = 'The coupon code has been exhausted';
                    return $response->getBody()->write(json_encode($res));
                }
            }
        }

        $price = $shop->price * ((100 - $credit) / 100);
        $user = $this->user;

        if (!$user->isLogin) {
            $res['ret'] = -1;
            return $response->getBody()->write(json_encode($res));
        }

        if (bccomp($user->money, $price, 2) == -1) {
            $res['ret'] = 0;
            $res['msg'] = 'Meow Meow~ The current balance is insufficient, and the total price is ' . $price . 'yuan. </br><a href="/user/code">Click to enter the recharge interface</a>';
            return $response->getBody()->write(json_encode($res));
        }

        $user->money = bcsub($user->money, $price, 2);
        $user->save();

        if ($disableothers == 1) {
            $boughts = Bought::where('userid', $user->id)->get();
            foreach ($boughts as $disable_bought) {
                $disable_bought->renew = 0;
                $disable_bought->save();
            }
        }

        Metron::bought_usedd($user, 1, 0);
        $bought = new Bought();
        $bought->userid = $user->id;
        $bought->shopid = $shop->id;
        $bought->datetime = time();
        if ($autorenew == 0 || $shop->auto_renew == 0) {
            $bought->renew = 0;
        } else {
            $bought->renew = time() + $shop->auto_renew * 86400;
        }

        $bought->coupon = $code;
        $bought->price = $price;
        $bought->usedd = 1;
        $bought->save();

        $shop->buy($user);

        $res['ret'] = 1;
        $res['msg'] = 'Purchase successful';

        return $response->getBody()->write(json_encode($res));
    }

    public function bought($request, $response, $args)
    {
        $pageNum = $request->getQueryParams()['page'] ?? 1;
        $shops = Bought::where('userid', $this->user->id)->orderBy('id', 'desc')->paginate(15, ['*'], 'page', $pageNum);
        $shops->setPath('/user/bought');
        if ($request->getParam('json') == 1) {
            $res['ret'] = 1;
            foreach ($shops as $shop) {
                $shop->datetime = $shop->datetime();
                $shop->name = $shop->shop()->name;
                $shop->content = $shop->shop()->content();
            };
            $res['shops'] = $shops;
            return $response->getBody()->write(json_encode($res));
        };
        return $this->view()->assign('shops', $shops)->display('user/bought.tpl');
    }

    public function deleteBoughtGet($request, $response, $args)
    {
        $id = $request->getParam('id');
        $shop = Bought::where('id', $id)->where('userid', $this->user->id)->first();

        if ($shop == null) {
            $rs['ret'] = 0;
            $rs['msg'] = 'Failed to turn off automatic renewal, the order does not exist. ';
            return $response->getBody()->write(json_encode($rs));
        }

        if ($this->user->id == $shop->userid) {
            $shop->renew = 0;
        }

        if (!$shop->save()) {
            $rs['ret'] = 0;
            $rs['msg'] = 'Failed to close auto-renewal';
            return $response->getBody()->write(json_encode($rs));
        }
        $rs['ret'] = 1;
        $rs['msg'] = 'Turn off auto-renewal successfully';
        return $response->getBody()->write(json_encode($rs));
    }

    public function updateWechat($request, $response, $args)
    {
        $type = $request->getParam('imtype');
        $wechat = $request->getParam('wechat');
        $wechat = trim($wechat);

        $user = $this->user;

        if ($user->telegram_id != 0) {
            $res['ret'] = 0;
            $res['msg'] = 'You are bound to Telegram, so this item cannot be modified. ';
            return $response->getBody()->write(json_encode($res));
        }

        if ($wechat == '' || $type == '') {
            $res['ret'] = 0;
            $res['msg'] = 'Illegal input';
            return $response->getBody()->write(json_encode($res));
        }

        $user1 = User::where('im_value', $wechat)->where('im_type', $type)->first();
        if ($user1 != null) {
            $res['ret'] = 0;
            $res['msg'] = 'This contact has already been registered';
            return $response->getBody()->write(json_encode($res));
        }

        $user->im_type = $type;
        $antiXss = new AntiXSS();
        $user->im_value = $antiXss->xss_clean($wechat);
        $user->save();

        $res['ret'] = 1;
        $res['msg'] = 'Modified successfully';
        return $this->echoJson($response, $res);
    }

    public function updateSSR($request, $response, $args)
    {
        $protocol = $request->getParam('protocol');
        $obfs = $request->getParam('obfs');
        $obfs_param = $request->getParam('obfs_param');
        $obfs_param = trim($obfs_param);

        $user = $this->user;

        if ($obfs == '' || $protocol == '') {
            $res['ret'] = 0;
            $res['msg'] = 'Illegal input';
            return $response->getBody()->write(json_encode($res));
        }

        if (!Tools::is_param_validate('obfs', $obfs)) {
            $res['ret'] = 0;
            $res['msg'] = 'Invalid obfuscation';
            return $response->getBody()->write(json_encode($res));
        }

        if (!Tools::is_param_validate('protocol', $protocol)) {
            $res['ret'] = 0;
            $res['msg'] = 'Protocol invalid';
            return $response->getBody()->write(json_encode($res));
        }

        $antiXss = new AntiXSS();

        $user->protocol = $antiXss->xss_clean($protocol);
        $user->obfs = $antiXss->xss_clean($obfs);
        $user->obfs_param = $antiXss->xss_clean($obfs_param);

        if (!Tools::checkNoneProtocol($user)) {
            $res['ret'] = 0;
            $res['msg'] = 'The system detects that your current encryption method is none, but the protocol you are about to set to is not in the following protocols<br>' . implode(',', Config::getSupportParam('allow_none_protocol')) . '<br>, please modify your encryption method first, and then modify the settings here. ';
            return $this->echoJson($response, $res);
        }

        if (!URL::SSCanConnect($user) && !URL::SSRCanConnect($user)) {
            $res['ret'] = 0;
            $res['msg'] = 'After you set this way, no client can connect, so the system rejects your setting, please check your setting before proceeding. ';
            return $this->echoJson($response, $res);
        }

        $user->save();

        if (!URL::SSCanConnect($user)) {
            $res['ret'] = 1;
            $res['msg'] = 'The setting is successful, but your current protocol, obfuscation, and encryption settings will cause the original Shadowsocks client to fail to connect, please change to the ShadowsocksR client by yourself. ';
            return $this->echoJson($response, $res);
        }

        if (!URL::SSRCanConnect($user)) {
            $res['ret'] = 1;
            $res['msg'] = 'The setting is successful, but your current protocol, obfuscation, and encryption settings will cause the ShadowsocksR client to fail to connect, please change to the Shadowsocks client by yourself. ';
            return $this->echoJson($response, $res);
        }

        $res['ret'] = 1;
        $res['msg'] = 'The setting is successful, you can freely choose the client to connect. ';
        return $this->echoJson($response, $res);
    }

    public function updateTheme($request, $response, $args)
    {
        $theme = $request->getParam('theme');

        $user = $this->user;

        if ($theme == '') {
            $res['ret'] = 0;
            $res['msg'] = 'Illegal input';
            return $response->getBody()->write(json_encode($res));
        }

        $user->theme = filter_var($theme, FILTER_SANITIZE_STRING);
        $user->save();

        $res['ret'] = 1;
        $res['msg'] = 'Setting succeeded';
        return $this->echoJson($response, $res);
    }

    public function updateMail($request, $response, $args)
    {
        $value = (int) $request->getParam('mail');
        if (in_array($value, [0, 1, 2])) {
            $user = $this->user;
            if ($value == 2 && $_ENV['enable_telegram'] === false) {
                $res['ret'] = 0;
                $res['msg'] = 'Modification failed, currently unable to use Telegram to receive daily reports';
                return $this->echoJson($response, $res);
            }
            $user->sendDailyMail = $value;
            $user->save();
            $res['ret'] = 1;
            $res['msg'] = 'Modified successfully';
        } else {
            $res['ret'] = 0;
            $res['msg'] = 'Illegal input';
        }
        return $this->echoJson($response, $res);
    }

    public function PacSet($request, $response, $args)
    {
        $pac = $request->getParam('pac');

        $user = $this->user;

        if ($pac == '') {
            $res['ret'] = 0;
            $res['msg'] = 'Enter cannot be empty';
            return $response->getBody()->write(json_encode($res));
        }

        $user->pac = $pac;
        $user->save();

        $res['ret'] = 1;
        $res['msg'] = 'Modified successfully';
        return $this->echoJson($response, $res);
    }

    public function updateSsPwd($request, $response, $args)
    {
        $user = $this->user;
        $pwd = Tools::genRandomChar(16);
        $current_timestamp = time();
        $new_uuid = Uuid::uuid3(Uuid::NAMESPACE_DNS, $user->email . '|' . $current_timestamp);
        $otheruuid = User::where('uuid', $new_uuid)->first();

        if ($pwd == '') {
            $res['ret'] = 0;
            $res['msg'] = 'Password cannot be empty';
            return $response->withJson($res);
        }
        if (!Tools::is_validate($pwd)) {
            $res['ret'] = 0;
            $res['msg'] = 'Invalid password';
            return $response->withJson($res);
        }
        if ($otheruuid != null) {
            $res['ret'] = 0;
            $res['msg'] = 'There are some problems, please try again later';
            return $response->withJson($res);
        }

        $user->uuid = $new_uuid;
        $user->save();
        $user->updateSsPwd($pwd);
        $res['ret'] = 1;

        Radius::Add($user, $pwd);

        return $this->echoJson($response, $res);
    }

    public function updateMethod($request, $response, $args)
    {
        $user = Auth::getUser();
        $method = $request->getParam('method');
        $method = strtolower($method);

        if ($method == '') {
            $res['ret'] = 0;
            $res['msg'] = 'Illegal input';
            return $response->getBody()->write(json_encode($res));
        }

        if (!Tools::is_param_validate('method', $method)) {
            $res['ret'] = 0;
            $res['msg'] = 'Encryption invalid';
            return $response->getBody()->write(json_encode($res));
        }

        $user->method = $method;

        if (!Tools::checkNoneProtocol($user)) {
            $res['ret'] = 0;
            $res['msg'] = 'The system detected that the encryption method you are about to set is none, but your protocol is not in the following protocol<br>' . implode(',', Config::getSupportParam('allow_none_protocol')) . '<br>, please modify your agreement first, and then modify the settings here. ';
            return $this->echoJson($response, $res);
        }

        if (!URL::SSCanConnect($user) && !URL::SSRCanConnect($user)) {
            $res['ret'] = 0;
            $res['msg'] = 'After you set this way, no client can connect, so the system rejects your setting, please check your setting before proceeding. ';
            return $this->echoJson($response, $res);
        }

        $user->updateMethod($method);

        if (!URL::SSCanConnect($user)) {
            $res['ret'] = 1;
            $res['msg'] = 'The setting is successful, but your current protocol, obfuscation, and encryption settings will cause the original Shadowsocks client to fail to connect, please change to the ShadowsocksR client by yourself. ';
            return $this->echoJson($response, $res);
        }

        if (!URL::SSRCanConnect($user)) {
            $res['ret'] = 1;
            $res['msg'] = 'The setting is successful, but your current protocol, obfuscation, and encryption settings will cause the ShadowsocksR client to fail to connect, please change to the Shadowsocks client by yourself. ';
            return $this->echoJson($response, $res);
        }

        $res['ret'] = 1;
        $res['msg'] = 'The setting is successful, you can freely choose two clients to connect. ';
        return $this->echoJson($response, $res);
    }

    public function logout($request, $response, $args)
    {
        Auth::logout();
        return $response->withStatus(302)->withHeader('Location', '/');
    }

    public function doCheckIn($request, $response, $args)
    {
        if ($_ENV['enable_checkin_captcha'] == true) {
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
                $res['msg'] = 'The system cannot accept your verification result, please refresh the page and try again. ';
                return $response->getBody()->write(json_encode($res));
            }
        }

        if (strtotime($this->user->expire_in) < time()) {
            $res['ret'] = 0;
            $res['msg'] = 'Your account has expired and cannot be signed in. ';
            return $response->getBody()->write(json_encode($res));
        }

        $checkin = $this->user->checkin();
        if ($checkin['ok'] === false) {
            $res['ret'] = 0;
            $res['msg'] = $checkin['msg'];
            return $this->echoJson($response, $res);
        }

        $res['msg'] = $checkin['msg'];
        $res['unflowtraffic'] = $this->user->transfer_enable;
        $res['traffic'] = Tools::flowAutoShow($this->user->transfer_enable);
        $res['trafficInfo'] = array(
            'todayUsedTraffic' => $this->user->TodayusedTraffic(),
            'lastUsedTraffic' => $this->user->LastusedTraffic(),
            'unUsedTraffic' => $this->user->unusedTraffic(),
        );
        $res['ret'] = 1;
        return $this->echoJson($response, $res);
    }

    public function kill($request, $response, $args)
    {
        return $this->view()->display('user/kill.tpl');
    }

    public function handleKill($request, $response, $args)
    {
        $user = Auth::getUser();

        $email = $user->email;

        $passwd = $request->getParam('passwd');
        // check passwd
        $res = array();
        if (!Hash::checkPassword($user->pass, $passwd)) {
            $res['ret'] = 0;
            $res['msg'] = 'Password error';
            return $this->echoJson($response, $res);
        }

        if ($_ENV['enable_kill'] == true) {
            Auth::logout();
            $user->kill_user();
            $res['ret'] = 1;
            $res['msg'] = 'Your account has been removed from our system. Welcome next time!';
        } else {
            $res['ret'] = 0;
            $res['msg'] = 'The administrator does not allow deletion, please contact the administrator if you need to delete. ';
        }
        return $this->echoJson($response, $res);
    }

    public function trafficLog($request, $response, $args)
    {
        $traffic = TrafficLog::where('user_id', $this->user->id)->where('log_time', '>', time() - 3 * 86400)->orderBy('id', 'desc')->get();

        if ($request->getParam('json') == 1) {
            $res['ret'] = 1;
            foreach ($traffic as $trafficdata) {
                $trafficdata->total_used = $trafficdata->totalUsedRaw();
                $trafficdata->name = $trafficdata->node()->name;
            }
            $res['traffic'] = $traffic;

            return $this->echoJson($response, $res);
        }

        return $this->view()->assign('logs', $traffic)->display('user/trafficlog.tpl');
    }

    public function detect_index($request, $response, $args)
    {
        $pageNum = $request->getQueryParams()['page'] ?? 1;
        $logs = DetectRule::paginate(15, ['*'], 'page', $pageNum);

        if ($request->getParam('json') == 1) {
            $res['ret'] = 1;
            $res['logs'] = $logs;
            return $this->echoJson($response, $res);
        }

        return $this->view()->assign('rules', $logs)->display('user/detect_index.tpl');
    }

    public function detect_log($request, $response, $args)
    {
        $pageNum = $request->getQueryParams()['page'] ?? 1;
        $logs = DetectLog::orderBy('id', 'desc')->where('user_id', $this->user->id)->paginate(15, ['*'], 'page', $pageNum);

        if ($request->getParam('json') == 1) {
            $res['ret'] = 1;
            foreach ($logs as $log) {
                $log->node_name = $log->Node()->name;
                $log->detect_rule_name = $log->DetectRule()->name;
                $log->detect_rule_text = $log->DetectRule()->text;
                $log->detect_rule_regex = $log->DetectRule()->regex;
                $log->detect_rule_type = $log->DetectRule()->type;
                $log->detect_rule_date = date('Y-m-d H:i:s', $log->datetime);
            }
            $res['logs'] = $logs;
            return $this->echoJson($response, $res);
        }

        return $this->view()->assign('logs', $logs)->display('user/detect_log.tpl');
    }

    public function disable($request, $response, $args)
    {
        return $this->view()->display('user/disable.tpl');
    }

    public function telegram_reset($request, $response, $args)
    {
        $user = $this->user;
        $user->TelegramReset();
        return $response->withStatus(302)->withHeader('Location', '/user/profile');
    }

    public function resetURL($request, $response, $args)
    {
        $user = $this->user;
        $user->clean_link();
        return $response->withStatus(302)->withHeader('Location', '/user');
    }

    public function resetInviteURL($request, $response, $args)
    {
        $user = $this->user;
        $user->clear_inviteCodes();
        return $response->withStatus(302)->withHeader('Location', '/user/setting/invite');
    }

    public function backtoadmin($request, $response, $args)
    {
        $userid = Cookie::get('uid');
        $adminid = Cookie::get('old_uid');
        $user = User::find($userid);
        $admin = User::find($adminid);

        if (!$admin->is_admin || !$user) {
            Cookie::set([
                'uid' => null,
                'email' => null,
                'key' => null,
                'ip' => null,
                'expire_in' => null,
                'old_uid' => null,
                'old_email' => null,
                'old_key' => null,
                'old_ip' => null,
                'old_expire_in' => null,
                'old_local' => null
            ], time() - 1000);
        }
        $expire_in = Cookie::get('old_expire_in');
        $local = Cookie::get('old_local');
        Cookie::set([
            'uid' => Cookie::get('old_uid'),
            'email' => Cookie::get('old_email'),
            'key' => Cookie::get('old_key'),
            'ip' => Cookie::get('old_ip'),
            'expire_in' => $expire_in,
            'old_uid' => null,
            'old_email' => null,
            'old_key' => null,
            'old_ip' => null,
            'old_expire_in' => null,
            'old_local' => null
        ], $expire_in);
        return $response->withStatus(302)->withHeader('Location', $local);
    }

    public function getUserAllURL($request, $response, $args)
    {
        $user = $this->user;
        $type = $request->getQueryParams()["type"];
        $return = '';
        switch ($type) {
            case 'ss':
                $return .= URL::get_NewAllUrl($user, ['type' => 'ss']) . PHP_EOL;
                break;
            case 'ssr':
                $return .= URL::get_NewAllUrl($user, ['type' => 'ssr']) . PHP_EOL;
                break;
            case 'ssd':
                $return .= LinkController::getSSD($user, 1, [], ['type' => 'ss']) . PHP_EOL;
                break;
            case 'v2ray':
                $return .= URL::get_NewAllUrl($user, ['type' => 'vmess']) . PHP_EOL;
                break;
            default:
                $return .= 'Don\'t make trouble, Wukong! ';
                break;
        }
        $response = $response->withHeader('Content-type', ' application/octet-stream; charset=utf-8')
            ->withHeader('Cache-Control', 'no-store, no-cache, must-revalidate')
            ->withHeader('Content-Disposition', ' attachment; filename=node.txt');

        return $response->write($return);
    }

    /**
     * 订阅记录
     *
     * @param Request  $request
     * @param Response $response
     * @param array    $args
     */
    public function subscribe_log($request, $response, $args)
    {
        if ($_ENV['subscribeLog_show'] === false) {
            return $response->withStatus(302)->withHeader('Location', '/user');
        }
        $pageNum = $request->getQueryParams()['page'] ?? 1;
        $logs = UserSubscribeLog::orderBy('id', 'desc')->where('user_id', $this->user->id)->paginate(15, ['*'], 'page', $pageNum);
        $iplocation = new QQWry();
        $logs->setPath('/user/subscribe_log');

        if (($request->getParam('json') == 1)) {
            $res['ret'] = 1;
            $res['logs'] = $logs;
            foreach ($logs as $log) {
                $location = $iplocation->getlocation($log->request_ip);
                $log->country = iconv("gbk", "utf-8//IGNORE", $location['country']);
                $log->area = iconv("gbk", "utf-8//IGNORE", $location['area']);
            }
            $res['subscribeLog_keep_days'] = $_ENV['subscribeLog_keep_days'];
            return $this->echoJson($response, $res);
        }

        return $this->view()->assign('logs', $logs)->assign('iplocation', $iplocation)->fetch('user/subscribe_log.tpl');
    }

    /**
     * 获取包含订阅信息的客户端压缩档
     *
     * @param Request  $request
     * @param Response $response
     * @param array    $args
     */
    public function getPcClient($request, $response, $args)
    {
        $zipArc = new \ZipArchive();
        $user_token = LinkController::GenerateSSRSubCode($this->user->id, 0);
        $type = trim($request->getQueryParams()['type']);
        // 临时文件存放路径
        $temp_file_path = BASE_PATH . '/storage/';
        // 客户端文件存放路径
        $client_path = BASE_PATH . '/resources/clients/';
        switch ($type) {
            case 'ss-win':
                $user_config_file_name = 'gui-config.json';
                $content = ClientProfiles::getSSPcConf($this->user);
                break;
            case 'ssd-win':
                $user_config_file_name = 'gui-config.json';
                $content = ClientProfiles::getSSDPcConf($this->user);
                break;
            case 'ssr-win':
                $user_config_file_name = 'gui-config.json';
                $content = ClientProfiles::getSSRPcConf($this->user);
                break;
            case 'v2rayn-win':
                $user_config_file_name = 'guiNConfig.json';
                $content = ClientProfiles::getV2RayNPcConf($this->user);
                break;
            default:
                return 'gg';
        }
        $temp_file_path .= $type . '_' . $user_token . '.zip';
        $client_path .= $type . '/';
        // 文件存在则先删除
        if (is_file($temp_file_path)) {
            unlink($temp_file_path);
        }
        // 超链接文件内容
        $site_url_content = '[InternetShortcut]' . PHP_EOL . 'URL=' . $_ENV['baseUrl'];
        // 创建 zip 并添加内容
        $zipArc->open($temp_file_path, \ZipArchive::CREATE);
        $zipArc->addFromString($user_config_file_name, $content);
        $zipArc->addFromString('Click to visit_' . $_ENV['appName'] . '.url', $site_url_content);
        Tools::folderToZip($client_path, $zipArc, strlen($client_path));
        $zipArc->close();

        $newResponse = $response->withHeader('Content-type', ' application/octet-stream')->withHeader('Content-Disposition', ' attachment; filename=' . $type . '.zip');
        $newResponse->write(file_get_contents($temp_file_path));
        unlink($temp_file_path);

        return $newResponse;
    }

    /**
     * 从使用同数据库的其他面板下载客户端[内置节点]
     *
     * @param Request  $request
     * @param Response $response
     * @param array    $args
     */
    public function getClientfromToken($request, $response, $args)
    {
        $token = $args['token'];
        $Etoken = Token::where('token', '=', $token)->where('create_time', '>', time() - 60 * 10)->first();
        if ($Etoken == null) {
            return 'The download link is invalid, please refresh the page and click again.';
        }
        $user = User::find($Etoken->user_id);
        if ($user == null) {
            return null;
        }
        $this->user = $user;
        return $this->getPcClient($request, $response, $args);
    }

    public function settingPages($request, $response, $args)
    {
        $mt = MtAuth::Auth();
        if (!$mt['ret']) {
            return $mt['msg'];
        }

        $user = $this->user;
        $page = $args['page'];
        switch ($page) {
            case 'logs':
                return $this->view()->display('user/settings/logs.tpl');
            case 'traffic_log':
                return $this->view()->display('user/settings/traffic_log.tpl');
            case 'profile':
                $emailExplode    = explode('@', $user->email);
                $email_suffix    = '@' . $emailExplode[1];
                $email_whitelist = MetronSetting::get('list_of_available_mailboxes');
                if (!in_array($email_suffix, $email_whitelist)) {
                    array_push($email_whitelist, $email_suffix);
                }
                return $this->view()->assign('email_name', $emailExplode[0])->assign('email_suffix', $email_suffix)->assign('email_whitelist', $email_whitelist)->display('user/settings/profile.tpl');
            case 'safe':
                return $this->view()->display('user/settings/safe.tpl');
            case 'detect':
                return $this->view()->display('user/settings/detect.tpl');
            case 'sublink':
                return $this->view()->display('user/settings/sublink.tpl');
            case 'relay':
                $source_nodes = Node::where(static function ($query) use ($user) {
                    $query->Where('node_group', '=', $user->node_group)
                        ->orWhere('node_group', '=', 0);
                })->where('type', 1)->where(static function ($query) {
                    $query->Where('sort', 10);
                })->where('node_class', '<=', $user->class)->orderBy('name')->get();

                $dist_nodes = Node::where(static function ($query) use ($user) {
                    $query->Where('node_group', '=', $user->node_group)->orWhere('node_group', '=', 0);
                })->where('type', 1)->where(static function ($query) {
                    $query->Where('sort', 0)->orWhere('sort', 10);
                })->where('node_class', '<=', $user->class)->orderBy('name')->get();

                $ports_raw = Node::where(static function ($query) use ($user) {
                    $query->Where('node_group', '=', $user->node_group)->orWhere('node_group', '=', 0);
                })->where('type', 1)->where('sort', 9)->where('node_class', '<=', $user->class)->orderBy('name')->get();

                $ports = [];
                foreach ($ports_raw as $port_raw) {
                    $mu_user = User::where('port', $port_raw->server)->first();
                    if ($mu_user->is_multi_user == 1) {
                        $ports[] = $port_raw->server;
                    }
                }

                $ports[] = $user->port;
                $ports   = array_unique($ports);

                $is_relay_able = Tools::is_protocol_relay($user);
                return $this->view()->assign('source_nodes', $source_nodes)->assign('dist_nodes', $dist_nodes)->assign('ports', $ports)->assign('is_relay_able', $is_relay_able)->display('user/settings/relay.tpl');
            case 'invite':
                $code = InviteCode::where('user_id', $this->user->id)->first();
                if ($code == null) {
                    $user->addInviteCode();
                    $code = InviteCode::where('user_id', $this->user->id)->first();
                }
                if (!$paybacks_sum = Payback::where("ref_by", $user->id)->sum('ref_get')) {
                    $paybacks_sum = 0;
                }
                return $this->view()->assign('code', $code)->assign('paybacks_sum', $paybacks_sum)->display('user/settings/invite.tpl');
            case 'telegram':
                $bind_token = TelegramSessionManager::add_bind_session($user);
                return $this->view()->assign('bind_token', $bind_token)->assign('telegram_bot', $_ENV['telegram_bot'])->display('user/settings/telegram.tpl');
            default:
                return 0;
        }
    }
}
