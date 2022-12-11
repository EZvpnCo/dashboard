<?php

namespace App\Utils\Telegram;

use App\Models\Bought;

class Reply
{
    /**
     * 用户的流量使用讯息
     *
     * @param \App\Models\User $user
     *
     * @return string
     */
    public static function getUserTrafficInfo($user)
    {
        $text = [
            'Your current traffic status：',
            '',
            'Used today' . $user->TodayusedTrafficPercent() . '% ：' . $user->TodayusedTraffic(),
            'Used before' . $user->LastusedTrafficPercent() . '% ：' . $user->LastusedTraffic(),
            'Remaining' . $user->unusedTrafficPercent() . '% ：' . $user->unusedTraffic(),
        ];
        return implode(PHP_EOL, $text);
    }

    /**
     * 用户基本讯息
     *
     * @param \App\Models\User $user
     *
     * @return string
     */
    public static function getUserInfo($user)
    {
        $text = [
            'Balance：' . $user->money,
            'Devices：' . ($user->node_connector != 0 ? $user->online_ip_count() . ' / ' . $user->node_connector : $user->online_ip_count() . ' / unlimited'),
            'Speed：' . ($user->node_speedlimit != 0 ? $user->node_speedlimit . 'Mbps' : 'unlimited'),
            'Last used：' . $user->lastSsTime(),
            'Expiration：' . $user->class_expire,
        ];
        return implode(PHP_EOL, $text);
    }

    /**
     * 获取用户或管理的尊称
     *
     * @param \App\Models\User $user
     *
     * @return string
     */
    public static function getUserTitle($user)
    {
        if ($user->class > 0) {
            $text = 'Dear VIP ' . $user->class . ' Hello：';
        } else {
            $text = 'Dear users, Hello：';
        }
        return $text;
    }

    /**
     * [admin]获取用户购买记录
     *
     * @param \App\Models\User $user
     *
     * @return array
     */
    public static function getUserBoughts($user)
    {
        $boughts = Bought::where('userid', $user->id)->orderBy('id', 'desc')->get();
        $data = [];
        foreach ($boughts as $bought) {
            $shop = $bought->shop();
            if ($shop == null) {
                $bought->delete();
                continue;
            }
            if ($bought->valid()) {
                $strArray = [];
                $strArray[] = ' - Commodity package name：' . $shop->name;
                $strArray[] = ' - Package purchase time：' . $bought->datetime();
                $strArray[] = ' - Package auto-renewal：' . ($bought->renew == 0 ? 'No automatic renewal' : $bought->renew_date());
                $strArray[] = ' - Next flow reset：' . $bought->reset_time();
                $strArray[] = ' - Package expiration time：' . $bought->exp_time();
                $strArray[] = '';
                $data[] = implode(PHP_EOL, $strArray);
            }
        }
        return $data;
    }

    /**
     * [admin]获取用户信息
     *
     * @param \App\Models\User $user
     * @param int              $ChatID
     *
     * @return string
     */
    public static function getUserInfoFromAdmin($user, $ChatID)
    {
        $strArray = [
            '#' . $user->id . ' ' . $user->user_name . ' User information for',
            '',
            'Email：' . TelegramTools::getUserEmail($user->email, $ChatID),
            'Balance：' . $user->money,
            'Status：' . ((int) $user->enable == 1 ? 'enabled' : 'disabled'),
            'Level：' . $user->class,
            'Remaining traffic：' . $user->unusedTraffic(),
            'Level： expires：' . $user->class_expire,
            'Account expires：' . $user->expire_in,
            'Package Details：'
        ];
        $boughts = self::getUserBoughts($user);
        if (count($boughts) != 0) {
            $strArray = array_merge($strArray, $boughts);
        } else {
            $strArray[] = ' - The user does not have a valid package.';
        }
        return implode(PHP_EOL, $strArray);
    }
}
