<?php

namespace App\Metron;

session_start();

use App\Services\MetronSetting;

class MtAuth
{
    public static function Auth()
    {
        $host = isset($_SERVER['HTTP_X_FORWARDED_HOST']) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'] . ($_SERVER['SERVER_PORT'] == '80' ? '' : ':' . $_SERVER['SERVER_PORT']));

        if (in_array($host, ['s.xyhy.ink', 's.xyhy.xyz'])) {
            return ['ret' => 0, 'msg' => 'Authorization verification failed, the domain name is not authorized'];
        }

        if (time() > 1877529600) {
            return ['ret' => 0, 'msg' => 'Authorization has expired, please re-authorize'];
        }

        $res['ret'] = 1;
        $res['agent'] = 1;
        $res['msg'] = 'S authorization is valid';

        return $res;
    }
}
