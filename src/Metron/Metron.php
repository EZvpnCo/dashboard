<?php

namespace App\Metron;

use App\Services\MetronSetting;
use App\Models\{Link, Code, Node, Shop, User, Bought, Coupon, Ticket, Paylist, Payback};
use App\Utils\QQWry;

class Metron
{
    /**
     * SSR 节点单独配置生成单端口用户
     */
    public static function node_Config($userDiff, $node)
    {
        $userDiff->id += 1;
        $userDiff->is_multi_user = 2;
        $userDiff->disconnect_ip = null;
        $userDiff->forbidden_port = ""; //25,26,465,587
        $userDiff->forbidden_ip = ""; //127.0.0.0/8,::1/128
        $userDiff->obfs_param = "";
        $userDiff->obfs = $node->obfs;
        $userDiff->protocol_param = "";
        $userDiff->protocol = $node->protocol;
        $userDiff->node_speedlimit = 0;
        $userDiff->method = $node->method;
        $userDiff->port = $node->port;
        $userDiff->u = 0;
        $userDiff->d = 0;
        $userDiff->passwd = $node->passwd;
        $userDiff->email = "single port user";
        return $userDiff;
    }

    /**
     * 处理用户其他购买套餐 usedd
     */
    public static function bought_usedd($user, $key, $to)
    {
        $used = Bought::where('userid', $user->id)->where('usedd', $key)->get();
        foreach ($used as $use_del) {
            $use_del->usedd = $to;
            $use_del->save();
        }
        return 0;
    }

    /**
     *  获取商品信息
     *  price           价格
     *
     *  bandwidth       流量GB
     *  expire          账号有效期
     *  class           等级
     *  class_expire    等级有效期天数
     *  reset           每多少天重置
     *  reset_exp       多少天内重置
     *  reset_value     重置流量为多少 G
     *  speedlimit      端口限速
     *  connector       IP限制
     *
     *  traffic_package{
     *      class {
     *          min,
     *          max,
     *      }
     * }
     */
    public function getShopInfo($shopid)
    {
        $shop = Shop::find($shopid);

        if ($shop === null) {
            return 0;
        }

        $shopinfo = json_decode($shop->content, true);
        $shopinfo['name'] = $shop->name;
        $shopinfo['price'] = $shop->price;
        return $shopinfo;
    }

    /**
     * 计算套餐返还的信息
     */
    public function getConversionInfo($user, $bought)
    {
        $shopinfo = $this->getShopInfo($bought->shopid);
        $code = Code::where('code', '#' . $bought->id . ' - 套餐折算')->value('id');
        if ($code != null) {
            $res = ['ret' => 2, 'msg' => 'The package has been discounted'];
            return $res;
        }

        if (isset($shopinfo['traffic_package'])) { /* is the traffic package */
            # Traffic package can only be refunded on the same day
            if (time() >= strtotime(date('Y-m-d', $bought->datetime)) + 86400) {
                $res = ['ret' => 0, 'msg' => 'The traffic package can only be redeemed on the day of purchase'];
                return $res;
            }
            # use up traffic
            $shopflow = $shopinfo['bandwidth'] * 1024 * 1024 * 1024; // package traffic
            $usedflow = ($user->transfer_enable - ($user->u + $user->d) >= $shopflow ? 0 : ($user->transfer_enable - ($user->u + $user->d) <= 0 ? $shopflow : $shopflow - ($user->transfer_enable - ($user->u + $user->d)))); // traffic used
            $band_bi = round($usedflow / $shopflow * 100, 2); // percentage used
            /* conversion ratio */
            $ratio = [
                'name' => 'traffic package',
                'type' => 'use traffic',
                'ppt' => bcsub(100, $band_bi, 2),
                'time' => [
                    'used' => 0,
                    'used_gs' => 0,
                ],
                'flow' => [
                    'used' => $shopflow - $usedflow,
                    'used_gb' => ($shopflow - $usedflow) / 1024 / 1024 / 1024,
                ],
            ];
        } else {                                    /* 是常规套餐 */
            /*if ($bought->used === 0 ){
                 $res = ['ret' => 0, 'msg' => 'The package has expired, the balance cannot be converted'];
                 return $res;
             }*/
            /* The user level is different from the package, it may be modified by the management */
            if ($shopinfo['class'] != $user->class) {
                $res = ['ret' => 0, 'msg' => 'Your level does not match the package level, please contact the management'];
                return $res;
            }

            # 1. Use up time
            $shoptime = $shopinfo['class_expire'] * 86400; // product level duration
            $usedtime = time() - $bought->datetime; // how long it took
            $usertime = strtotime($user->class_expire) - time(); // The remaining time of the user
            if ($usedtime >= $shoptime) {
                $res = ['ret' => 0, 'msg' => 'The package has expired and cannot be converted'];
                return $res;
            }
            if ($usertime < $shoptime - $usedtime) {
                $res = ['ret' => 0, 'msg' => 'The membership duration is abnormal and cannot be converted'];
                return $res;
            }
            $time_bi = round($usedtime / $shoptime * 100, 2); // percentage used

            # 2. Use up traffic
            $user_transfer = $user->transfer_enable - ($user->u + $user->d); # User's current remaining traffic
            $shop_bandwidth = $shopinfo['bandwidth'] * 1024 * 1024 * 1024; # Package first month traffic

            if (
                $shopinfo['reset'] != 0 && $shopinfo['reset_value'] != 0 && $shopinfo['reset_exp'] != 0
            ) {
                $is_reset = 1;
                # Package has reset property
                $day_flow = ($shopinfo['reset_value'] * 1024 * 1024 * 1024) / $shopinfo['reset']; # Calculate the daily flow value of the product
                $reset_cycle = floor($shopinfo['class_expire'] / $shopinfo['reset']); # Calculate how many reset cycles the product has (remove decimal places)
                $used_cycle = floor($usedtime / ($shopinfo['reset'] * 86400)); # Calculate how many cycles are used (remove decimal places)
                $shop_reset_value = $shopinfo['reset_value'] * 1024 * 1024 * 1024; # package cycle traffic
                $shop_transfer = ($reset_cycle <= 1 ? $shop_bandwidth : ($reset_cycle - 1) * $shop_reset_value + $shop_bandwidth); # Package total traffic

                if ($used_cycle <= 0) {
                    # first reset cycle
                    $usedflow = ($user_transfer >= $shop_bandwidth ? 0 : ($user_transfer <= 0 ? $shop_bandwidth : $shop_bandwidth - $user_transfer));
                    $kouchu_flow = $shop_bandwidth - $usedflow; # deduct flow
                } elseif ($used_cycle > 0) {
                    # After a cycle
                    $cycle_flow = ($user_transfer >= $shop_reset_value ? 0 : ($user_transfer <= 0 ? $shop_reset_value : $shop_reset_value - $user_transfer)); # Current cycle uses flow
                    $usedflow = ($used_cycle === 1 ? $usedflow + $shop_bandwidth : ($used_cycle - 1) * $shop_reset_value + $shop_bandwidth); # Flow used for all cycles
                    $kouchu_flow = $shop_reset_value - $cycle_flow; # deduct flow
                }
                $band_bi = round($usedflow / $shop_transfer * 100, 2); # Percentage used
            } else {
                $is_reset = 0;
                # 套餐没有重置属性
                $shop_transfer  = $shopinfo['bandwidth'] * 1024 * 1024 * 1024;
                $usedflow       = ($user_transfer >= $shop_transfer ? 0 : ($user_transfer <= 0 ? $shop_transfer : $shop_transfer - $user_transfer));             // 用掉的流量
                $kouchu_flow    = $shop_bandwidth - $usedflow;                  # 扣除流量
                $band_bi        = round($usedflow / $shop_transfer * 100, 2);  # 用掉的百分比
            }

            # 折算模式
            $mode = MetronSetting::get('shop_conversion_mode');
            if ($mode == 'auto') {
                $mode_type = ($time_bi * 100 >= $band_bi * 100 ? 'Usage duration' : 'Used traffic');
                $mode_ppt = bcsub(100, ($time_bi * 100 >= $band_bi * 100 ? $time_bi : $band_bi), 2); # remaining percentage
            } else if ($mode == 'time') {
                $mode_type = 'Usage duration';
                $mode_ppt = bcsub(100, $time_bi, 2);
            } else if ($mode == 'flow') {
                $mode_type = 'Use Traffic';
                $mode_ppt = bcsub(100, $band_bi, 2);
            }
            $ratio = [
                'name' => 'regular package',
                'type' => $mode_type, # calculation mode
                'ppt' => $mode_ppt, # remaining percentage
                'reset' => [
                    'is_reset' => $is_reset,
                    'reset_cycle' => ($used_cycle ?: 0),
                    'used_cycle' => ($used_cycle ?: 0),
                ],
                'time' => [
                    'used' => $shoptime - $usedtime,
                    'used_gs' => round(($shoptime - $usedtime) / 86400, 2),
                ],
                'flow' => [
                    'used' => $kouchu_flow,
                    'used_gb' => round($kouchu_flow / 1024 / 1024 / 1024, 2),
                ],
                'used_bi' => [
                    'time' => $time_bi,
                    'band' => $band_bi
                ],
            ];
        }

        /* refund amount */
        $money_a = bcmul($bought->price, $ratio['ppt'] / 100, 2);
        /* Handling fee ratio */
        $hdpr = MetronSetting::get('shop_formalities');
        /* Fee amount */
        $hdfe = $hdpr > 0 ? bcmul($money_a, bcdiv($hdpr, 100, 10), 2) : 0;

        $res = [
            'ret' => 1,
            'ratio' => $ratio,
            'name' => $shopinfo['name'], # product name
            'money_a' => $money_a, # refund amount
            'hdpr' => $hdpr, # handling fee rate
            'hdfe' => $hdfe, # handling fee
            'money' => bcsub($money_a, $hdfe, 2), # actual return
        ];
        return $res;
    }

    /**
     *  开始返还操作
     */
    public function PackageConversion_OK($user, $bought)
    {
        $info = $this->getConversionInfo($user, $bought);
        if ($info['ret'] !== 1) {
            return $info;
        }
        /* Add Code table */
        $codeq = new Code();
        $codeq->code = '#' . $bought->id . '- package discount';
        $codeq->isused = 1;
        $codeq->type = 2;
        $codeq->number = $info['money'];
        $codeq->usedatetime = date('Y-m-d H:i:s');
        $codeq->userid = $user->id;
        if (!$codeq->save()) {
            $res = ['ret' => 0, 'msg' => 'Failed to create record'];
            return $res;
        }
        /* Process Bought table */
        $bought->renew = 0;
        $bought->usedd = 0; // cancel takes effect
        $bought->save();

        /* 处理 User */
        $user->money            = bcadd($user->money, $info['money'], 2);
        $shengyu                = $user->transfer_enable - ($user->u + $user->d);
        $user->transfer_enable  = $user->transfer_enable - $info['ratio']['flow']['used'] - ($user->u + $user->d);
        if ($user->transfer_enable < 2 * 1024 * 1024 * 1024) {
            $user->transfer_enable = 2 * 1024 * 1024 * 1024;
        }
        $user->u = 0;
        $user->d = 0;
        $user->last_day_t = 0;
        if ($info['ratio']['name'] == 'regular package') {
            $user->class_expire = date('Y-m-d H:i:s', (strtotime($user->class_expire) - $info['ratio']['time']['used']));
            if ((int) strtotime($user->class_expire) <= time()) {
                $user->class = 0;
            }
        }
        if ($user->save()) {
            $res = ['ret' => 1, 'msg' => $info['money'] . 'has been returned to balance' . PHP_EOL . 'And deduct the level duration' . $info['ratio']['time']['used_gs'] . 'sky,' . $info['ratio']['flow']['used_gb'] . 'GB traffic'];
            return $res;
        }
    }

    /**
     *  提前重置流量 计算信息
     */
    public function getAdvanceResetFlow($user)
    {
        $bought = Bought::where('userid', $user->id)->where('usedd', 1)->first();
        if ($bought == null) {
            return ['ret' => 0, 'msg' => 'You do not have a valid package'];
        }

        /* 套餐是否有重置属性 */
        $shopinfo = $this->getShopInfo($bought->shopid);
        if ($shopinfo['reset'] == 0 || $shopinfo['reset_exp'] == 0 || $shopinfo['reset_value'] == 0) {
            return ['ret' => 0, 'msg' => 'Your package does not have traffic reset attribute'];
        }

        $next_restart = strtotime($user->valid_use_loop());     // 下次重置的Unix时间
        $time = $next_restart - time();     // 距离重置还有多久
        if ($time > $shopinfo['reset'] * 86400) {
            $time = $shopinfo['reset'] * 86400;
        }
        if ((int) strtotime($user->class_expire) - time() < $time) {
            return ['ret' => 0, 'msg' => 'Your remaining membership time has been lower than the reset period'];
        }
        $bi = round($time / ($shopinfo['reset'] * 86400), 10);
        $add_flow = bcmul($shopinfo['reset_value'] * 1024 * 1024 * 1024, $bi);

        $res = [
            'ret' => 1,
            'info' => [
                'bi' => $bi,
                'sub_time' => $time,
                'sub_time_day' => round($time / 86400, 2),
                'add_flow' => $add_flow,
                'add_flow_gib' => round($add_flow / 1024 / 1024 / 1024, 2),
            ],
        ];
        return $res;
    }

    /**
     *  执行提前重置流量
     */
    public function setAdvanceResetFlow($user)
    {
        $info = $this->getAdvanceResetFlow($user);

        $user->transfer_enable += $info['info']['add_flow'];
        $user->class_expire = date('Y-m-d H:i:s', (strtotime($user->class_expire) - $info['info']['sub_time']));

        if ($user->save()) {
            return ['ret' => 1, 'msg' => 'you got ' . $info['info']['add_flow_gib'] . 'GB traffic, reduced ' . $info['info']['sub_time_day'] . 'days membership duration'];
        }
    }

    /**
     * 使用 MetronPay 聚合支付时, 商店购买套餐支付回调后自动购买套餐函数
     */
    public static function metronpay_buyshop($pid = 0)
    {
        $ps            = Paylist::where('tradeno', $pid)->first();
        $shopinfo      = json_decode($ps->shop, true);
        if ($shopinfo['id'] == 0) {
            $res['ret'] = 0;
            $res['msg'] = 'No items to buy';
            return $res;
        }
        if (isset($shopinfo['status']) && $shopinfo['status'] == 1) {
            $res['ret'] = 0;
            $res['msg'] = 'The order item has been purchased';
            return $res;
        }
        $shop          = $shopinfo['id'];
        $coupon        = isset($shopinfo['coupon']) ? $shopinfo['coupon'] : '';
        $coupon        = trim($coupon);
        $code          = $coupon;
        $disableothers = $shopinfo['disableothers'];
        $autorenew     = isset($shopinfo['autorenew']) ? $shopinfo['autorenew'] : 0;
        $user          = User::find($ps->userid);
        $shop          = Shop::where('id', $shop)->where('status', 1)->first();

        if ($shop == null) {
            $res['ret'] = 0;
            $res['msg'] = 'Illegal request';

            $shopinfo['status'] = 'Illegal request';
            $ps->shop = json_encode($shopinfo, JSON_UNESCAPED_UNICODE);
            $ps->save();
            return $res;
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

                $shopinfo['status'] = 'Promo code not applicable for this item';
                $ps->shop = json_encode($shopinfo, JSON_UNESCAPED_UNICODE);
                $ps->save();
                return $res;
            }

            if ($coupon->expire < time()) {
                $res['ret'] = 0;
                $res['msg'] = 'This discount code has expired';

                $shopinfo['status'] = 'This coupon code has expired';
                $ps->shop = json_encode($shopinfo, JSON_UNESCAPED_UNICODE);
                $ps->save();
                return $res;
            }
        }

        $price = $shop->price * ((100 - $credit) / 100);

        if (bccomp($user->money, $price, 2) == -1) {
            $res['ret'] = 0;
            $res['msg'] = 'Insufficient balance, the total price is ' . $price . 'yuan; your balance is ' . $user->money . 'yuan';

            $shopinfo['status'] = 'Insufficient balance';
            $ps->shop = json_encode($shopinfo, JSON_UNESCAPED_UNICODE);
            $ps->save();
            return $res;
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

        $used = Bought::where('userid', $user->id)->where('usedd', 1)->get();
        foreach ($used as $use_del) {
            $use_del->usedd = 0;
            $use_del->save();
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
        $bought->usedd  = 1;
        $bought->save();

        $shop->buy($user);
        $shopinfo['status'] = 1;
        $ps->shop = json_encode($shopinfo);
        $ps->save();

        $res['ret'] = 1;
        $res['msg'] = 'successful purchase';

        return $res;
    }

    /**
     *  获取用户节点筛选规则
     */
    public static function getNodeFilter($token = null, $user = null)
    {
        if ($token) {
            $link = Link::where('type', 11)->where('token', $token)->first();
        } else if ($user) {
            $link = Link::where('type', 11)->where('userid', $user->id)->first();
        }

        return $link->filter != null ? json_decode($link->filter, true) : false;
    }

    /**
     * 限制地区访问
     */
    public static function Restricted_access()
    {
        # 排除路径
        $parms = MetronSetting::get('Restricted_parm');
        foreach ($parms as $parm) {
            if (strstr($_SERVER["REQUEST_URI"], $parm)) {
                $diqu = [
                    'ok'    => true,
                    'info'  => [
                        'ip'    => $_SERVER['REMOTE_ADDR'],
                    ],
                ];
                return $diqu;
            }
        }

        # 限制地区
        $iplocation = new QQWry();
        $location = $iplocation->getlocation($_SERVER['REMOTE_ADDR']);
        $area = iconv('gbk', 'utf-8//IGNORE', $location['country'] . $location['area']);
        $diqu = [
            'ok'    => true,
            'info'  => [
                'ip'    => $_SERVER['REMOTE_ADDR'],
                'addr'  => $area,
            ],
            'match' => false
        ];
        $zh_CN = MetronSetting::get('Restricted_area');
        foreach ($zh_CN as $cn) {
            if (strstr($area, $cn)) {
                $diqu['ok']     = false;
                $diqu['match']  = $cn;
                return $diqu;
            }
        }
        return $diqu;
    }

    /**
     * 返利
     * $form_user  邀请人
     * $to_user    被邀请人
     */
    public static function add_payback($form_user, $to_user, $price)
    {
        $check_gift = Payback::where('userid', '=', $to_user->id)->where('ref_by', '=', $form_user->id)->first();

        # 返利比例不为 0
        if ($form_user->rebate !== 0) {
            # 如果用户循环返利 || 用户不是循环循环 和 config 所有用户循环 || 用户不是循环 和 是第一次返利
            if (($form_user->c_rebate === 1) || ($form_user->c_rebate === 0 && MetronSetting::get('c_rebate') === true) || ($form_user->c_rebate === 0 && $check_gift == null)) {
                # 如果用户比例 大于 0
                if ($form_user->rebate > 0) {
                    $ref_money = bcmul($price, ($form_user->rebate / 100), 2);
                    # 如果用户比例小于 0
                } else if ($form_user->rebate < 0) {
                    $ref_money = bcmul($price, ($_ENV['code_payback'] / 100), 2);
                }
                $form_user->back_money += $ref_money;
                $form_user->save();

                $Payback = new Payback();
                $Payback->total = $price;
                $Payback->userid = $to_user->id;
                $Payback->ref_by = $form_user->id;
                $Payback->ref_get = $ref_money;
                $Payback->datetime = time();
                $Payback->save();
            }
        }
    }
}
