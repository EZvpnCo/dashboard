<?php

namespace App\Utils\Telegram;

use App\Models\{TelegramTasks, User};
use App\Utils\Tools;

class TelegramTools
{
    /**
     * 搜索用户
     *
     * @param string $value  搜索值
     * @param string $method 查找列
     *
     * @return \App\Models\User
     */
    public static function getUser($value, $method = 'telegram_id')
    {
        return User::where($method, $value)->first();
    }

    /**
     * Sends a POST request to Telegram Bot API.
     * 伪异步，无结果返回.
     *
     * @param array $params
     *
     * @return string
     */
    public static function SendPost($Method, $Params)
    {
        $URL = 'https://api.telegram.org/bot' . $_ENV['telegram_token'] . '/' . $Method;
        $POSTData = json_encode($Params);
        $C = curl_init();
        curl_setopt($C, CURLOPT_URL, $URL);
        curl_setopt($C, CURLOPT_POST, 1);
        curl_setopt($C, CURLOPT_HTTPHEADER, ['Content-Type:application/json; charset=utf-8']);
        curl_setopt($C, CURLOPT_POSTFIELDS, $POSTData);
        curl_setopt($C, CURLOPT_TIMEOUT, 1);
        curl_exec($C);
        curl_close($C);
    }

    /**
     * 用户识别搜索字段
     *
     * @return array
     */
    public static function getUserSearchMethods()
    {
        return [
            'id'    => [],
            'email' => $_ENV['remark_user_search_email'],
            'port'  => $_ENV['remark_user_search_port'],
        ];
    }

    /**
     * 操作字段
     *
     * @return array
     */
    public static function getUserActionOption()
    {
        return [
            'is_admin'          => $_ENV['remark_user_option_is_admin'],
            'enable'            => $_ENV['remark_user_option_enable'],
            'money'             => $_ENV['remark_user_option_money'],
            'port'              => $_ENV['remark_user_option_port'],
            'transfer_enable'   => $_ENV['remark_user_option_transfer_enable'],
            'passwd'            => $_ENV['remark_user_option_passwd'],
            'method'            => $_ENV['remark_user_option_method'],
            'protocol'          => $_ENV['remark_user_option_protocol'],
            'protocol_param'    => $_ENV['remark_user_option_protocol_param'],
            'obfs'              => $_ENV['remark_user_option_obfs'],
            'obfs_param'        => $_ENV['remark_user_option_obfs_param'],
            'invite_num'        => $_ENV['remark_user_option_invite_num'],
            'node_group'        => $_ENV['remark_user_option_node_group'],
            'class'             => $_ENV['remark_user_option_class'],
            'class_expire'      => $_ENV['remark_user_option_class_expire'],
            'expire_in'         => $_ENV['remark_user_option_expire_in'],
            'node_speedlimit'   => $_ENV['remark_user_option_node_speedlimit'],
            'node_connector'    => $_ENV['remark_user_option_node_connector'],
        ];
    }

    /**
     * 待定
     *
     * @return mixed
     */
    public static function OperationUser($User, $useOptionMethod, $value, $ChatID)
    {
        $Email = self::getUserEmail($User->email, $ChatID);
        $old = $User->$useOptionMethod;
        $useOptionMethodName = self::getUserActionOption()[$useOptionMethod][0];
        switch ($useOptionMethod) {
                // ##############
            case 'enable':
            case 'is_admin':
                $strArray = [
                    '// Supported writing',
                    '// [enabled|yes] - literally',
                    '// [disable|no] - literally',
                ];
                if (strpos($value, ' ') !== false) {
                    return [
                        'ok'  => false,
                        'msg' => 'Error handling, unsupported writing method.' . PHP_EOL . PHP_EOL . self::StrArrayToCode($strArray),
                    ];
                }
                if (in_array($value, ['enabled', 'yes'])) {
                    $User->$useOptionMethod = 1;
                    $new = 'enabled';
                } elseif (in_array($value, ['disabled', 'no'])) {
                    $User->$useOptionMethod = 0;
                    $new = 'disabled';
                } else {
                    return [
                        'ok'  => false,
                        'msg' => 'Error handling, unsupported writing method.' . PHP_EOL . PHP_EOL . self::StrArrayToCode($strArray),
                    ];
                }
                $old = ($old ? 'enabled' : 'disabled');
                break;
                // ##############
            case 'port':
                // 支持正整数或 0 随机选择
                if (!is_numeric($value) || strpos($value, '-') === 0) {
                    return [
                        'ok'  => false,
                        'msg' => 'Provided port is non-numeric, specify 0 for random reset.',
                    ];
                }
                if ((int) $value === 0) {
                    $value = Tools::getAvPort();
                }
                $temp = $User->setPort($value);
                if ($temp['ok'] === false) {
                    $strArray = [
                        'Target users：' . $Email,
                        'Item to be modified：' . $useOptionMethodName . '[' . $useOptionMethod . ']',
                        'The current value is：' . $old,
                        'want to change to：' . $value,
                        'error details：' . $temp['msg'],
                    ];
                    return [
                        'ok'  => false,
                        'msg' => self::StrArrayToCode($strArray),
                    ];
                }
                $new = $User->$useOptionMethod;
                $User->$useOptionMethod = $new;
                break;
                // ##############
            case 'transfer_enable':
                $strArray = [
                    '// Supported writing, does not support unit b, case insensitive',
                    '// supported units：kb | mb | gb | tb | pb',
                    '//  2kb —— Designated as the value flow',
                    '// +2kb —— increase traffic',
                    '// -2kb —— reduce traffic',
                    '// *2   —— Multiply with the current traffic, does not support filling in the unit',
                    '// /2   —— Divide by the current traffic, does not support filling in the unit',
                ];
                if (strpos($value, ' ') !== false) {
                    return [
                        'ok'  => false,
                        'msg' => 'Processing error, unsupported writing.' . PHP_EOL . PHP_EOL . self::StrArrayToCode($strArray),
                    ];
                }
                $new = self::TrafficMethod($User->$useOptionMethod, $value);
                if ($new === null) {
                    return [
                        'ok'  => false,
                        'msg' => 'Processing error, unsupported writing.' . PHP_EOL . PHP_EOL . self::StrArrayToCode($strArray),
                    ];
                }
                $User->$useOptionMethod = $new;
                $old = Tools::flowAutoShow($old);
                $new = Tools::flowAutoShow($new);
                break;
                // ##############
            case 'expire_in':
            case 'class_expire':
                $strArray = [
                    '// Supported writing methods, unit: day',
                    '// Use days setting cannot contain spaces',
                    '//  2 —— Set the number of days based on the current time',
                    '// +2 —— increase the number of days',
                    '// -2 —— reduce the number of days',
                    '// Specify a date with a space between the date and time',
                    '// 2020-02-30 —— Specified date',
                    '// 2020-02-30 08:00:00 —— The specified date is accurate to the second',
                ];
                if (
                    strpos($value, '+') === 0
                    ||
                    strpos($value, '-') === 0
                ) {
                    $operator = substr($value, 0, 1);
                    $number = substr($value, 1);
                    if (is_numeric($number)) {
                        $number *= 86400;
                        $old_time = strtotime($old);
                        $new = ($operator == '+' ? $old_time + $number : $old_time - $number);
                        $new = date('Y-m-d H:i:s', $new);
                    } else {
                        if (strtotime($value) === false) {
                            return [
                                'ok'  => false,
                                'msg' => 'Processing error, unsupported writing.' . PHP_EOL . PHP_EOL . self::StrArrayToCode($strArray),
                            ];
                        }
                        $new = strtotime($value);
                        $new = date('Y-m-d H:i:s', $new);
                    }
                } else {
                    $number = $value;
                    if (is_numeric($value)) {
                        $number *= 86400;
                        $new = time() + $number;
                        $new = date('Y-m-d H:i:s', $new);
                    } else {
                        if (strtotime($value) === false) {
                            return [
                                'ok'  => false,
                                'msg' => 'Processing error, unsupported writing.' . PHP_EOL . PHP_EOL . self::StrArrayToCode($strArray),
                            ];
                        }
                        $new = strtotime($value);
                        $new = date('Y-m-d H:i:s', $new);
                    }
                }
                $User->$useOptionMethod = $new;
                break;
                // ##############
            case 'obfs':
            case 'method':
            case 'protocol':
                // 支持系统中存在的协议、混淆、加密，且受可行性限制
                $MethodClass = 'set' . ucfirst($useOptionMethod);
                $temp = $User->$MethodClass($value);
                if ($temp['ok'] === true) {
                    $strArray = [
                        'Target user:' . $Email,
                        'Modified item:' . $useOptionMethodName . '[' . $useOptionMethod . ']',
                        'Value before modification:' . $old,
                        'Modified value:' . $User->$useOptionMethod,
                        'Modify remarks:' . $temp['msg'],
                    ];
                } else {
                    $strArray = [
                        'Target user:' . $Email,
                        'Item to modify:' . $useOptionMethodName . '[' . $useOptionMethod . ']',
                        'The current value is:' . $old,
                        'To be changed to:' . $value,
                        'Error details:' . $temp['msg'],
                    ];
                }
                return [
                    'ok' => $temp['ok'],
                    'msg' => self::StrArrayToCode($strArray),
                ];
                break;
                // ##############
            case 'passwd':
            case 'obfs_param':
            case 'protocol_param':
                // 参数值中不允许有空格
                if (strpos($value, ' ') !== false) {
                    return [
                        'ok' => false,
                        'msg' => 'Processing error, the protocol contains characters such as spaces.',
                    ];
                }
                $new = $value;
                $User->$useOptionMethod = $new;
                break;
                // ##############
            case 'money':
                $strArray = [
                    '// There is no space allowed in the parameter value, the result will contain 2 decimal places',
                    '// +2 - increase balance',
                    '// -2 - reduce balance',
                    '// *2——Multiply with the current balance',
                    '// /2 - divide by current balance',
                ];
                $value = explode(' ', $value)[0];
                $new = self::ComputingMethod($User->$useOptionMethod, $value, true);
                if ($new === null) {
                    return [
                        'ok' => false,
                        'msg' => 'Processing error, unsupported writing method.' . PHP_EOL . PHP_EOL . self::StrArrayToCode($strArray),
                    ];
                }
                $User->$useOptionMethod = $new;
                break;
                // ##############
            case 'class':
            case 'invite_num':
            case 'node_group':
            case 'node_connector':
            case 'node_speedlimit':
                $strArray = [
                    '// Spaces are not allowed in the parameter value',
                    '// +2 - increase value',
                    '// -2 - decrease value',
                    '// *2——Multiply with the current value',
                    '// /2 - divide by the current value',
                ];
                $value = explode(' ', $value)[0];
                $new = self::ComputingMethod($User->$useOptionMethod, $value, false);
                if ($new === null) {
                    return [
                        'ok' => false,
                        'msg' => 'Processing error, unsupported writing method.' . PHP_EOL . PHP_EOL . self::StrArrayToCode($strArray),
                    ];
                }
                $User->$useOptionMethod = $new;
                break;
                // ##############
            default:
                return [
                    'ok' => false,
                    'msg' => 'Not yet supported.',
                ];
                break;
        }
        if ($User->save()) {
            if ($useOptionMethod == 'money') {
                $User->addMoneyLog($new - $old);
            }
            $strArray = [
                'Target user:' . $Email,
                'Modified item:' . $useOptionMethodName . '[' . $useOptionMethod . ']',
                'Before modification:' . $old,
                'Modified to:' . $new,
            ];
            return [
                'ok'  => true,
                'msg' => self::StrArrayToCode($strArray),
            ];
        } else {
            return [
                'ok'  => false,
                'msg' => 'Save error',
            ];
        }
    }

    /**
     * 获取用户邮箱
     *
     * @param string $email  邮箱
     * @param int    $ChatID 会话 ID
     *
     * @return string
     */
    public static function getUserEmail($email, $ChatID)
    {
        if ($_ENV['enable_user_email_group_show'] === true || $ChatID > 0) {
            return $email;
        }
        $a = strpos($email, '@');
        if ($a === false) {
            return $email;
        }
        $string = substr($email, $a);
        return ($a === 1 ? '*' . $string : substr($email, 0, 1) . str_pad('', $a - 1, '*') . $string);
    }

    /**
     * 分割字符串
     *
     * @param string $Str       源字符串
     * @param string $Delimiter 分割定界符
     * @param int    $Quantity  最大返回数量
     *
     * @return array
     */
    public static function StrExplode($Str, $Delimiter, $Quantity = 10)
    {
        $return = [];
        $Str = trim($Str);
        for ($x = 0; $x <= 10; $x++) {
            if (strpos($Str, $Delimiter) !== false && count($return) < $Quantity - 1) {
                $temp = substr($Str, 0, strpos($Str, $Delimiter));
                $return[] = $temp;
                $Str = trim(substr($Str, strlen($temp)));
            } else {
                $return[] = $Str;
                break;
            }
        }
        return $return;
    }

    /**
     * 查找字符串是否是某个方法的别名
     *
     * @param array  $MethodGroup 方法别名的数组
     * @param string $Search      被搜索的字符串
     *
     * @return string
     */
    public static function getOptionMethod($MethodGroup, $Search)
    {
        $useMethod = '';
        foreach ($MethodGroup as $MethodName => $Remarks) {
            if (strlen($MethodName) === strlen($Search)) {
                if (stripos($MethodName, $Search) === 0) {
                    $useMethod = $MethodName;
                    break;
                }
            }
            if (count($Remarks) >= 1) {
                foreach ($Remarks as $Remark) {
                    if (strlen($Remark) === strlen($Search) && stripos($Remark, $Search) === 0) {
                        $useMethod = $MethodName;
                        break 2;
                    }
                }
            }
        }
        return $useMethod;
    }

    /**
     * 使用 $Value 给定的运算式与 $Source 计算结果
     *
     * @param string $Source         源数值
     * @param string $Value          运算式含增改数值
     * @param bool   $FloatingNumber 是否格式化为浮点数
     *
     * @return string|null
     */
    public static function ComputingMethod($Source, $Value, $FloatingNumber = false)
    {
        if (
            (strpos($Value, '+') === 0
                ||
                strpos($Value, '-') === 0
                ||
                strpos($Value, '*') === 0
                ||
                strpos($Value, '/') === 0)
            &&
            is_numeric(substr($Value, 1))
        ) {
            $Source = eval('return $Source ' . substr($Value, 0, 1) . '= ' . substr($Value, 1) . ';');
        } else {
            if (is_numeric($Value)) {
                $Source = $Value;
            } else {
                $Source = null;
            }
        }
        if ($Source !== null) {
            $Source = ($FloatingNumber === false
                ? number_format($Source, 0, '.', '')
                : number_format($Source, 2, '.', ''));
        }
        return $Source;
    }

    /**
     * 使用 $Value 给定的运算式及流量单位与 $Source 计算结果
     *
     * @param string $Source 源数值
     * @param string $Value  运算式含增改数值
     *
     * @return int|null
     */
    public static function TrafficMethod($Source, $Value)
    {
        if (
            strpos($Value, '+') === 0
            ||
            strpos($Value, '-') === 0
            ||
            strpos($Value, '*') === 0
            ||
            strpos($Value, '/') === 0
        ) {
            $operator = substr($Value, 0, 1);
            if (!in_array($operator, ['*', '/'])) {
                $number = Tools::flowAutoShowZ(substr($Value, 1));
            } else {
                $number = substr($Value, 1, strlen($Value) - 1);
                if (!is_numeric($number)) return null;
            }
            if ($number === null) {
                return null;
            }
            $Source = eval('return $Source ' . $operator . '= ' . $number . ';');
        } else {
            if (is_numeric($Value)) {
                if ((int) $Value === 0) {
                    $Source = 0;
                } else {
                    $Source = Tools::flowAutoShowZ($Value . 'KB');
                }
            } else {
                $Source = Tools::flowAutoShowZ($Value);
            }
        }
        return $Source;
    }

    /**
     * 字符串数组转 TG HTML 等宽字符串
     *
     * @param array $strArray 字符串数组
     *
     * @return string
     */
    public static function StrArrayToCode($strArray)
    {
        return implode(
            PHP_EOL,
            array_map(
                function ($item) {
                    return ('<code>' . $item . '</code>');
                },
                $strArray
            )
        );
    }

    /**
     * 删除消息
     *
     * <code>
     * $Params = [
     *   'chatid'      => '',
     *   'messageid'   => '',
     *   'executetime' => '',
     * ];
     * </code>
     *
     * @return void
     */
    public static function DeleteMessage($Params)
    {
        if (isset($Params['executetime']) && is_numeric($Params['executetime'])) {
            $executetime = $Params['executetime'];
        } else {
            $executetime = $_ENV['delete_message_time'];
        }
        if ($executetime != 0) {
            $executetime += time();
            $task = new TelegramTasks();
            $task->type          = 1;
            $task->chatid        = $Params['chatid'];
            $task->messageid     = $Params['messageid'];
            $task->executetime   = $executetime;
            $task->datetime      = time();
            $task->save();
        }
    }

    /**
     * 储存 /setuser 操作产生的 messageid
     *
     * <code>
     * $Params = [
     *   'chatid'      => '',
     *   'messageid'   => '',
     *   'userid'      => '',
     * ];
     * </code>
     *
     * @return void
     */
    public static function FindUserSave($Params)
    {
        $task = new TelegramTasks();
        $task->type          = 2;
        $task->chatid        = $Params['chatid'];
        $task->messageid     = $Params['messageid'];
        $task->executetime   = 0;
        $task->userid        = $Params['userid'];
        $task->datetime      = time();
        $task->save();
    }
}
