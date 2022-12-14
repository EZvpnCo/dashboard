<?php

namespace App\Metron;

use App\Models\{User, Code, Shop, Bought, Payback, Paytake};
use App\Services\{Mail, Config, MetronSetting};
use App\Utils\{GA, Hash, Check, Tools};
use App\Metron\{MtAuth, Metron};
use Exception;
use Ramsey\Uuid\Uuid;

class MtAgent extends \App\Controllers\BaseController
{
    public function pages($request, $response, $args)
    {
        if (MtAuth::Auth()['agent'] !== 1) {
            die('No Agent authorization');
        }

        $user       = $this->user;
        $backs      = Payback::where('ref_by', $user->id)->orderBy('datetime', 'desc');

        # 累计数据
        $back_sum   = $backs->sum('ref_get');       # 累计返利
        $user_num   = User::where('ref_by', $user->id)->count();

        # 最新3条返利
        $back_logs  = $backs->limit(3)->get();
        $back_news  = [];
        foreach ($back_logs as $back_log) {
            $log_user = User::where('id', $back_log->userid)->first();
            if ($log_user === null) {
                $back_news[] = [
                    'name' => 'The user has logged out',
                    'email' => 'The user has logged out',
                    'avatar' => '',
                    'time' => date('Y-m-d H:i:s', $back_log->datetime),
                    'ref_get' => $back_log->ref_get,
                ];
            } else {
                $back_news[] = [
                    'name'      => $log_user->user_name,
                    'email'     => $log_user->email,
                    'avatar'    => $log_user->getGravatarAttribute(),
                    'time'      => date('Y-m-d H:i:s', $back_log->datetime),
                    'ref_get'   => $back_log->ref_get,
                ];
            }
        }

        # 今日数据
        $unix_time  = strtotime(date('Y-m-d', time()));
        $today_back = $backs->where('datetime', '>', $unix_time)->sum('ref_get') ?? 0;
        $today_user = User::where('ref_by', $user->id)->whereDate('reg_date', '=', date('Y-m-d'))->count();

        # 提现中金额
        if (!$take_total = Paytake::where('userid', $user->id)->where('type', 2)->where('status', 0)->sum('total')) {
            $take_total = 0;
        }

        return $this->view()
            ->assign('back_sum', $back_sum)
            ->assign('user_num', $user_num)
            ->assign('back_news', $back_news)
            ->assign('today_back', $today_back)
            ->assign('today_user', $today_user)
            ->assign('take_total', $take_total)
            ->display('user/agent/index.tpl');
    }

    public function edit_user($request, $response, $args)
    {
        $user = $this->user;
        if ($user == null || !$user->isLogin || $user->agent < 1) {
            return 0;
        }

        $id = $args['id'];
        $edituser = User::find($id);
        if ($edituser->ref_by !== $user->id) {
            return 'You do not have permission to operate this user';
        }

        $edituser_config = $edituser->config;
        if ($edituser_config['form_agent_create'] !== true) {
            return 'You do not have permission to operate users registered through the invitation link or invitation code';
        }

        $shops = Shop::where('status', 1)->orderBy('name')->get();
        $email = explode('@', $edituser->email);
        $email = [$email[0], '@' . $email[1]];
        return $this->view()
            ->assign('shops', $shops)
            ->assign('email', $email)
            ->assign('edituser', $edituser)
            ->assign('subInfo', \App\Controllers\LinkController::getSubinfo($edituser, 0))
            ->display('user/agent/edit_user.tpl');
    }

    public function edit_user_save($request, $response, $args)
    {
        $user = $this->user;
        if ($user == null || !$user->isLogin || $user->agent < 1) {
            $res['ret'] = -1;
            return $response->getBody()->write(json_encode($res));
        }

        $id       = $args['id'];
        $edituser = User::find($id);
        if ($edituser->ref_by !== $user->id) {
            $res['ret'] = 0;
            $res['msg'] = 'You are not authorized to operate this user';
            return $response->getBody()->write(json_encode($res));
        }

        $edituser_config = $edituser->config;
        if ($edituser_config['form_agent_create'] !== true) {
            $res['ret'] = 0;
            $res['msg'] = 'You do not have permission to operate users who registered via invite link or invite code';
            return $response->getBody()->write(json_encode($res));
        }

        $mode      = $request->getParam('mode');
        $name      = $request->getParam('name');
        $email     = trim($request->getParam('email'));
        $email     = strtolower($email);
        $suffix    = trim($request->getParam('email_suffix'));
        $password  = $request->getParam('password');
        $enable    = (int) $request->getParam('enable');
        $shopid    = (int) $request->getParam('shopid');

        switch ($mode) {
            case 'edit_user':
                # nickname check
                if (MetronSetting::get('change_username') !== true) {
                    return $response->getBody()->write(json_encode(['ret' => 0, 'msg' => 'Administrator settings prohibit modification of nickname']));
                }
                if ($name == '') {
                    $res['ret'] = 0;
                    $res['msg'] = 'Nickname is not allowed to be blank';
                    return $response->getBody()->write(json_encode($res));
                }

                /*
                 $regname = '/^[0-9a-zA-Z_\x{4e00}-\x{9fa5}]+$/u';
                 if (!preg_match($regname,$name)){
                     $res['ret'] = 0;
                     $res['msg'] = 'Nicknames only support combinations of Chinese, numbers, letters and underscores';
                     return $response->getBody()->write(json_encode($res));
                 }*/
                if (strlen($name) > 24) {
                    $res['ret'] = 0;
                    $res['msg'] = 'Nickname is too long';
                    return $response->getBody()->write(json_encode($res));
                }

                # check mailbox
                if ($edituser->email != $email) {
                    if (MetronSetting::get('change_usermail') !== true) {
                        return $response->getBody()->write(json_encode(['ret' => 0, 'msg' => 'Administrator settings forbid modification of mailbox']));
                    }
                    if ($email == '') {
                        return $response->getBody()->write(json_encode(['ret' => 0, 'msg' => 'Email is not filled']));
                    }
                    if (MetronSetting::get('register_restricted_email') === true) {
                        if (!in_array($suffix, MetronSetting::get('list_of_available_mailboxes'))) {
                            $res['ret'] = 0;
                            $res['msg'] = 'Forbidden email suffixes';
                            return $response->getBody()->write(json_encode($res));
                        }
                        $email .= $suffix;
                    }
                    if (!Check::isEmailLegal($email)) {
                        return $response->getBody()->write(json_encode(['ret' => 0, 'msg' => 'Email is invalid']));
                    }
                    $checkemail = User::where('email', '=', $email)->first();
                    if ($checkemail != null) {
                        return $response->getBody()->write(json_encode(['ret' => 0, 'msg' => 'This mailbox already exists']));
                    }
                }
                # check password
                if ($password != '') {
                    if (strlen($password) < 8) {
                        $res['ret'] = 0;
                        $res['msg'] = 'The password needs to be more than 8 characters';
                        return $response->getBody()->write(json_encode($res));
                    }
                    $edituser->pass = Hash::passwordHash($password);
                    $edituser->save();
                    $edituser->clean_link();
                }

                $edituser->user_name = $name;
                $edituser->email = $email;
                $edituser->enable = $enable;
                if (!$edituser->save()) {
                    $res['ret'] = 0;
                    $res['msg'] = 'Failed to save';
                    return $response->getBody()->write(json_encode($res));
                }
                $res['ret'] = 1;
                $res['msg'] = 'Saved successfully';
                return $response->getBody()->write(json_encode($res));
            case 'buy_shop':
                # Open package
                if ($shopid > 0) {
                    $shop = Shop::find($shopid);
                    if ($shop != null) {
                        if ($user->money < $shop->price) {
                            $res['ret'] = 0;
                            $res['msg'] = 'Package activation failed because your wallet balance is insufficient!';
                            return $response->getBody()->write(json_encode($res));
                        }
                        $user->money = bcsub($user->money, $shop->price, 2);
                        $user->save();

                        Metron::bought_usedd($edituser, 1, 0);
                        $bought           = new Bought();
                        $bought->userid   = $edituser->id;
                        $bought->shopid   = $shop->id;
                        $bought->datetime = time();
                        $bought->renew    = 0;
                        $bought->coupon   = '';
                        $bought->price    = $shop->price;
                        $bought->usedd    = 1;
                        $bought->save();
                        $shop->buy($edituser);

                        Metron::add_payback($user, $edituser, $shop->price);
                        $res['ret'] = 1;
                        $res['msg'] = 'Package opened successfully';
                        return $response->getBody()->write(json_encode($res));
                    } else {
                        $res['ret'] = 0;
                        $res['msg'] = 'Package activation failed because the package does not exist!';
                        return $response->getBody()->write(json_encode($res));
                    }
                } else {
                    $res['ret'] = 1;
                    $res['msg'] = 'There is no need to save if the package is not activated';
                    return $response->getBody()->write(json_encode($res));
                }
                break;
            case 'reset_link':
                $edituser->clean_link();
                $res['ret'] = 1;
                $res['msg'] = 'Reset succeeded';
                return $response->getBody()->write(json_encode($res));
        }

        $res['ret'] = 0;
        $res['msg'] = 'Unknown error';
        return $response->getBody()->write(json_encode($res));
    }

    /**
     * 新建客户 页面
     */
    public function add_user($request, $response, $args)
    {
        $user = $this->user;
        if ($user == null || !$user->isLogin || $user->agent < 1) {
            return 0;
        }

        $shop_plan = MetronSetting::get('shop_plan');
        foreach ($shop_plan as $shop_a) {
            foreach ($shop_a as $shop_b) {
            }
        }
        $shops = Shop::where('status', 1)->orderBy('name')->get();

        return $this->view()->assign('shops', $shops)->display('user/agent/add_user.tpl');
    }

    /**
     * 新建客户 POST
     */
    public function add_user_save($request, $response, $args)
    {
        $user = $this->user;
        if ($user == null || !$user->isLogin || $user->agent < 1) {
            $res['ret'] = -1;
            return $response->getBody()->write(json_encode($res));
        }

        $email     = trim($request->getParam('email'));
        $email     = strtolower($email);
        $suffix    = trim($request->getParam('email_suffix'));

        if (MetronSetting::get('register_restricted_email') === true) {
            if (!in_array($suffix, MetronSetting::get('list_of_available_mailboxes'))) {
                $res['ret'] = 0;
                $res['msg'] = 'Prohibited email suffixes';
                return $response->getBody()->write(json_encode($res));
            }
            $email .= $suffix;
        }
        if (!Check::isEmailLegal($email)) {
            return $response->getBody()->write(json_encode(['ret' => 0, 'msg' => '邮箱无效']));
        }
        if (!Check::isGmailSmall($email)) {
            $res['ret'] = 0;
            $res['msg'] = 'Do not use Gmail virtual mailbox with + sign';
            return $response->getBody()->write(json_encode($res));
        }

        $newuser = User::where('email', $email)->first();
        if ($newuser != null) {
            $res['ret'] = 0;
            $res['msg'] = 'Email has been registered';
            return $response->getBody()->write(json_encode($res));
        }

        $current_timestamp             = time();
        $newuser                       = new User();
        $pass                          = Tools::genRandomChar();
        $newuser->user_name            = $email;
        $newuser->email                = $email;
        $newuser->pass                 = Hash::passwordHash($pass);
        $newuser->passwd               = Tools::genRandomChar(16);
        $newuser->uuid                 = Uuid::uuid3(Uuid::NAMESPACE_DNS, $email . '|' . $current_timestamp);
        $newuser->port                 = Tools::getAvPort();
        $newuser->t                    = 0;
        $newuser->u                    = 0;
        $newuser->d                    = 0;
        $newuser->method               = Config::getconfig('Register.string.defaultMethod');
        $newuser->protocol             = Config::getconfig('Register.string.defaultProtocol');
        $newuser->protocol_param       = Config::getconfig('Register.string.defaultProtocol_param');
        $newuser->obfs                 = Config::getconfig('Register.string.defaultObfs');
        $newuser->obfs_param           = Config::getconfig('Register.string.defaultObfs_param');
        $newuser->forbidden_ip         = $_ENV['reg_forbidden_ip'];
        $newuser->forbidden_port       = $_ENV['reg_forbidden_port'];
        $newuser->im_type              = 2;
        $newuser->im_value             = $email;
        $newuser->transfer_enable      = Tools::toGB((int) Config::getconfig('Register.string.defaultTraffic'));
        $newuser->invite_num           = (int) Config::getconfig('Register.string.defaultInviteNum');
        $newuser->auto_reset_day       = $_ENV['reg_auto_reset_day'];
        $newuser->auto_reset_bandwidth = $_ENV['reg_auto_reset_bandwidth'];
        $newuser->money                = 0;
        $newuser->class_expire         = date('Y-m-d H:i:s', time() + (int) Config::getconfig('Register.string.defaultClass_expire') * 3600);
        $newuser->class                = (int) Config::getconfig('Register.string.defaultClass');
        $newuser->node_connector       = (int) Config::getconfig('Register.string.defaultConn');
        $newuser->node_speedlimit      = (int) Config::getconfig('Register.string.defaultSpeedlimit');
        $newuser->expire_in            = date('Y-m-d H:i:s', time() + (int) Config::getconfig('Register.string.defaultExpire_in') * 86400);
        $newuser->reg_date             = date('Y-m-d H:i:s');
        $newuser->reg_ip               = $_SERVER['REMOTE_ADDR'];
        $newuser->plan                 = 'A';
        $newuser->theme                = $_ENV['theme'];

        # 是代理商新建
        $newuser->ref_by                    = $user->id;
        $newuserconfig['form_agent_create'] = true;
        $newuser->config                    = $newuserconfig;

        # 注册分组
        $groups = explode(',', $_ENV['random_group']);
        $newuser->node_group = $groups[array_rand($groups)];

        # 二步验证
        $ga = new GA();
        $secret = $ga->createSecret();
        $newuser->ga_token = $secret;
        $newuser->ga_enable = 0;

        if ($newuser->save()) {
            $res['ret']         = 1;
            $res['msg'] = 'New user registered successfully' . PHP_EOL . 'Username: ' . $email . PHP_EOL . ' Random initial password: ' . $pass;
            $res['email_error'] = 'success';
            if ($shop_id > 0) {
                $shop = Shop::find($shop_id);
                if ($shop != null) {
                    $bought           = new Bought();
                    $bought->userid   = $newuser->id;
                    $bought->shopid   = $shop->id;
                    $bought->datetime = time();
                    $bought->renew    = 0;
                    $bought->coupon   = '';
                    $bought->price    = $shop->price;
                    $bought->save();
                    $shop->buy($newuser);
                } else {
                    $res['msg'] .= '<br/>But the package addition failed because the package does not exist';
                }
            }
            /*
             $newuser->addMoneyLog($newuser->money);
             $subject = $_ENV['appName'] . '-New User Registration Notification';
             $to = $newuser->email;
             $text = 'Hello, the administrator has created an account for you, username: ' . $email . ', login password: ' . $pass . ', thank you for your support. ';
             try {
                 Mail::send($to, $subject, 'newuser.tpl', [
                     'user' => $newuser, 'text' => $text,
                 ], []);
             } catch (Exception $e) {
                 $res['email_error'] = $e->getMessage();
             }
             */
            return $response->getBody()->write(json_encode($res));
        }
        $res['ret'] = 0;
        $res['msg'] = 'unknown mistake';
        return $response->getBody()->write(json_encode($res));
    }

    /**
     * 返利申请提现
     */
    public function take_total($request, $response, $args)
    {
        $user = $this->user;
        if ($user == null || !$user->isLogin) {
            $res['ret'] = -1;
            return $response->getBody()->write(json_encode($res));
        }

        $total = trim($request->getParam('total')); # amount
        $type = (int) trim($request->getParam('type')); # 1: balance transfer 2: cash withdrawal

        if (!is_numeric($total)) {
            $res['ret'] = 0;
            $res['msg'] = 'Illegal amount';
            return $response->getBody()->write(json_encode($res));
        }

        if ($total > $user->back_money) {
            $res['ret'] = 0;
            $res['msg'] = 'Insufficient withdrawal balance';
            return $response->getBody()->write(json_encode($res));
        }

        # withdraw
        if ($type === 2) {
            # Check if there is a withdrawal account
            if (!$user->config['take_account']['acc'] || !$user->config['take_account']['type']) {
                $res['ret'] = 0;
                $res['msg'] = 'You have not set up a cash withdrawal account';
                return $response->getBody()->write(json_encode($res));
            }
            $take_back_total = MetronSetting::get('take_back_total');
            if ($take_back_total !== 0 && $total < $take_back_total) {
                $res['ret'] = 0;
                $res['msg'] = 'The withdrawal amount must be greater than ' . $take_back_total . 'yuan';
                return $response->getBody()->write(json_encode($res));
            }
        }

        # create withdrawal record
        $paytake = new Paytake();
        $paytake->userid = $user->id;
        $paytake->type = $type;
        $paytake->total = $total;
        $paytake->status = ($type === 1 ? 1 : 0);
        $paytake->datetime = time();
        if (!$paytake->save()) {
            $res['ret'] = 0;
            $res['msg'] = 'Failed to create withdrawal application, please contact customer service';
            return $response->getBody()->write(json_encode($res));
        }

        # Deduct user rebate balance
        $user->back_money = bcsub($user->back_money, $total, 2);

        # transfer balance
        if ($type === 1) {
            if ($total <= 0) {
                $paytake->delete();
                $res['ret'] = 0;
                $res['msg'] = 'The withdrawal amount must be greater than 0 yuan';
                return $response->getBody()->write(json_encode($res));
            }
            # go to balance directly create code record and increase balance
            $code = new Code();
            $code->code = '#' . $paytake->id . ' - ' . 'Rebate to balance';
            $code->type = 3;
            $code->number = $total;
            $code->isused = 1;
            $code->userid = $user->id;
            $code->usedatetime = date('Y-m-d H:i:s', time());
            if (!$code->save()) {
                $res['ret'] = 0;
                $res['msg'] = 'Failed to create code record, please contact customer service';
                return $response->getBody()->write(json_encode($res));
            }
            $user->money = bcadd($user->money, $total, 2);
        }

        if (!$user->save()) {
            $res['ret'] = 0;
            $res['msg'] = 'An error occurred, please contact customer service';
            return $response->getBody()->write(json_encode($res));
        }

        $res['ret'] = 1;
        $res['msg'] = ($type === 1 ? 'Withdrawal to account balance' : 'Withdrawal application successful');
        return $response->getBody()->write(json_encode($res));
    }

    /**
     * 提现账号设置
     */
    public function take_account_setting($request, $response, $args)
    {
        $user = $this->user;
        if ($user == null || !$user->isLogin) {
            $res['ret'] = -1;
            return $response->getBody()->write(json_encode($res));
        }

        $acc = trim($request->getParam('acc')); # Account
        $type = trim($request->getParam('type')); # type

        if (MtAuth::Auth()['agent'] !== 1) {
            $res['ret'] = 0;
            $res['msg'] = 'No Agent authorization';
            return $response->getBody()->write(json_encode($res));
        }
        if (!in_array($type, MetronSetting::get('take_account_type'))) {
            $res['ret'] = 0;
            $res['msg'] = 'This account type does not support withdrawal';
            return $response->getBody()->write(json_encode($res));
        }
        if (!$acc) {
            $res['ret'] = 0;
            $res['msg'] = 'Withdrawal account cannot be left blank';
            return $response->getBody()->write(json_encode($res));
        }

        $config = $user->config;
        $config['take_account']['type'] = $type;
        $config['take_account']['acc'] = $acc;
        $user->config = $config;

        if (!$user->save()) {
            $res['ret'] = 0;
            $res['msg'] = 'An error occurred, please contact customer service';
            return $response->getBody()->write(json_encode($res));
        }

        $res['ret'] = 1;
        $res['msg'] = 'Saved successfully';
        return $response->getBody()->write(json_encode($res));
    }

    /**
     * ajax 数据表
     */
    public function ajax_datatable($request, $response, $args)
    {
        $name = $args['name']; # get table name
        $user = $this->user; # get user
        $getMeta = $request->getQueryParams(); # Get all request data
        $page = isset($getMeta['pagination']['page']) ? $getMeta['pagination']['page'] : 1; # Get the current page number
        $sort = isset($getMeta['sort']['sort']) ? $getMeta['sort']['sort'] : 'desc'; # get sorting method
        $field = isset($getMeta['sort']['field']) ? $getMeta['sort']['field'] : 'reg_date'; # get the sort field
        $perpage = isset($getMeta['pagination']['perpage']) ? $getMeta['pagination']['perpage'] : 10; # get the number per page
        $querydata = isset($getMeta['query'][0]) ? $getMeta['query'][0] : ""; # filter data

        if ($user == null || !$user->isLogin || $user->agent < 1) {
            return 0;
        }

        switch ($name) {
            case 'agent_user':
                # 所有
                $users = User::query()->where('ref_by', '=', $user->id);

                if ($field === 'unusedTraffic') {
                    # 根据剩余流量排序
                    $users = $users->orderByRaw('transfer_enable - u - d ' . $sort);
                } else {
                    $users = $users->orderBy($field, $sort);
                }

                # 按等级筛选
                if (isset($getMeta['query']['class'])) {
                    $users = $users->where('class', $getMeta['query']['class']);
                }

                # 搜索
                if (!empty($querydata)) {
                    $users = $users->where(function ($query) use ($querydata) {
                        $query->where('id', 'LIKE', '%' . $querydata . '%')->orwhere('user_name', 'LIKE', '%' . $querydata . '%')->orwhere('email', 'LIKE', '%' . $querydata . '%');
                    });
                }

                $total = $users->count();
                $logs  = [];
                $data  = [];
                # 每页数量
                if ($perpage != -1) {
                    $logs = $users->skip(($page - 1) * $perpage)->limit($perpage)->get();
                } else {
                    $logs = $users->get();
                }
                foreach ($logs as $log) {
                    /*
                    # 用户累计充值
                    if (!$number = Code::where('userid', '=', $log->id)->sum('number')) {
                        $number = 0;
                    }
                    # 通过该用户获得的返利
                    if (!$backprice = Payback::where('userid', '=', $log->id)->sum('ref_get')) {
                        $backprice = 0;
                    }*/
                    $dataarr['id']                   = $log->id;
                    $dataarr['user_name']            = $log->user_name;
                    $dataarr['email']                = $log->email;
                    $dataarr['money']                = $log->money;
                    $dataarr['unusedTraffic']        = $log->unusedTraffic();
                    $dataarr['class']                = MetronSetting::get('user_level')[$log->class];
                    $dataarr['class_expire']         = $log->class_expire;
                    $dataarr['reg_date']             = $log->reg_date;
                    //$dataarr['accumulated_recharge'] = $number . ' 元';
                    //$dataarr['get_rebates']          = $backprice . ' 元';
                    $dataarr['ref_by']               = $log->ref_by;
                    $data[]                          = $dataarr;
                }
                break;
            case 'amount_records':
                $time_a = strtotime(date('Y-m-d', $_SERVER['REQUEST_TIME'])) + 86400;
                $time_b = $time_a + 86400;
                $datas = [];
                for ($i = 0; $i < 7; $i++) {
                    $time_a -= 86400;
                    $time_b -= 86400;
                    $total   = Payback::where('ref_by', $user->id)->where('datetime', '>', $time_a)->where('datetime', '<', $time_b)->sum('ref_get');
                    $datas[] = [
                        'time'  => date('Y-m-d', $time_a),
                        'total' => $total ?? 0,
                    ];
                }
                return $response->getBody()->write(json_encode(array_reverse($datas)));
            case 'agent_take_log':
                $paytakes = Paytake::where('userid', $user->id)->orderBy($field, $sort);
                # 按状态筛选
                if (isset($getMeta['query']['status'])) {
                    $paytakes = $paytakes->where('status', $getMeta['query']['status']);
                }

                $total = $paytakes->count();
                $logs  = [];
                $data  = [];
                # 每页数量
                if ($perpage != -1) {
                    $paytakes = $paytakes->skip(($page - 1) * $perpage)->limit($perpage)->get();
                } else {
                    $paytakes = $paytakes->get();
                }
                foreach ($paytakes as $paytake) {
                    $dataarr['id']          = $paytake->id;
                    $dataarr['type']        = $paytake->type;
                    $dataarr['total']       = $paytake->total;
                    $dataarr['status']      = $paytake->status;
                    $dataarr['datetime']    = $paytake->datetime;
                    $data[]                 = $dataarr;
                }
                break;
            default:
                return 0;
        }

        $meta = [
            "page"      => $page,                       # 当前页码
            "pages"     => ceil($total / $perpage),     # 总页数
            "perpage"   => $perpage,                    # 每页数量
            "total"     => $total,                      # 总数量
            "sort"      => $sort,                       # 排序方式
            "field"     => $field,                      # 排序字段
        ];
        $res  = ['meta' => $meta, 'data' => $data];
        return $response->getBody()->write(json_encode($res));
    }

    /**
     * 删除用户
     */
    public function delete($request, $response, $args)
    {
        $user = $this->user;

        if ($user == null || !$user->isLogin || $user->agent < 1) {
            $res['ret'] = 0;
            $res['msg'] = 'Illegal operation';
            return $response->getBody()->write(json_encode($res));
        }

        $id = $request->getParam('id');
        $delluser = User::find($id);

        if ($delluser->ref_by !== $user->id) {
            $res['ret'] = 0;
            $res['msg'] = 'You are not authorized to operate this user';
            return $response->getBody()->write(json_encode($res));
        }

        $delluser_config = $delluser->config;
        if ($delluser_config['form_agent_create'] !== true) {
            $res['ret'] = 0;
            $res['msg'] = 'You do not have permission to operate users who registered via invite link or invite code';
            return $response->getBody()->write(json_encode($res));
        }

        if (!$delluser->kill_user()) {
            $res['ret'] = 0;
            $res['msg'] = 'Delete failed';
            return $response->getBody()->write(json_encode($res));
        }

        $res['ret'] = 1;
        $res['msg'] = 'Deleted successfully';
        return $response->getBody()->write(json_encode($res));
    }
}
