<?php

namespace App\Services\Gateway;

use App\Services\View;
use App\Services\Auth;
use App\Services\Config;
use App\Models\Paylist;

class NowPayment extends AbstractPayment
{

    private $apiKey;
    private $gatewayUri;

    /**
     * signature initialization
     * @param merKey signature key
     */

    public function __construct()
    {
        $apiUrl = Config::get('nowpayment_api_url');
        $this->apiKey = Config::get('nowpayment_api_key');
        $this->gatewayUri = "{$apiUrl}/v1/invoice";
    }


    /**
     * @name    Prepare signature/verification string
     */
    public function prepareSign($data)
    {
        ksort($data);
        return http_build_query($data);
    }

    /**
     * @name    generate signature
     * @param sourceData
     * @return    signature data
     */
    public function sign($data)
    {
        return strtolower(md5($data . $this->apiKey));
    }

    /*
    * @name verification signature
    * @param signData signature data
    * @param sourceData original data
    * @return
    */
    public function verify($data, $signature)
    {
        unset($data['sign']);
        $mySign = $this->sign($this->prepareSign($data));
        return $mySign === $signature;
    }

    public function post($data)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->gatewayUri);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_ENCODING, '');
        curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
        curl_setopt($curl, CURLOPT_TIMEOUT, 0);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'x-api-key: ' . $this->apiKey,
            'Content-Type: application/json'
        ]);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

        $data = curl_exec($curl);
        curl_close($curl);

        return $data;
    }

    public function MetronPay($type, $price, $buyshop, $paylist_id = 0)
    {
        if ($paylist_id == 0 && $price <= 0) {
            return ['errcode' => -1, 'errmsg' => 'illegal amount'];
        }
        $user = Auth::getUser();
        if ($paylist_id == 0) {
            $pl = new Paylist();
            $pl->userid = $user->id;
            $pl->total = $price;
            if ($buyshop['id'] != 0) $pl->shop = json_encode($buyshop);
            $pl->datetime = time();
            $pl->tradeno = self::generateGuid();
            $pl->save();
        } else {
            $pl = Paylist::find($paylist_id);
            if ($pl->status === 1) {
                return ['errcode' => -1, 'errmsg' => "The order has been completed"];
            }
        }

        $data['price_amount'] = (int)($price);
        $data['price_currency'] = "usd";
        $data['pay_currency'] = "usdt";
        $data['order_id'] = $pl->tradeno;
        $data['order_description'] = ":)";
        $data['is_fixed_rate'] = true;
        $data['is_fee_paid_by_user'] = true;
        $data['success_url'] = Config::get('baseUrl') . '/user/payment/return?tradeno=' . $pl->tradeno;
        $data['ipn_callback_url'] = Config::get('baseUrl') . '/payment/notify/bobpay';


        $result = json_decode($this->post($data), true);
        if (!$result['id']) {
            return [
                'errcode' => -1,
                'msg' => 'Payment gateway processing failed'
            ];
        }
        $result['pid'] = $pl->tradeno;
        return [
            'url' => $result['invoice_url'],
            'errcode' => 0,
            'pid' => $pl->tradeno
        ];
    }


    public function purchase($request, $response, $args)
    {
        $price = $request->getParam('amount');
        if ($price <= 0) {
            return json_encode(['code' => -1, 'msg' => 'illegal amount.']);
        }
        $user = Auth::getUser();
        $pl = new Paylist();
        $pl->userid = $user->id;
        $pl->total = $price;
        $pl->tradeno = self::generateGuid();
        $pl->save();


        $data['price_amount'] = (int)($price);
        $data['price_currency'] = "usd";
        $data['order_id'] = $pl->tradeno;
        $data['order_description'] = "EZvpn :)";
        $data['is_fixed_rate'] = true;
        $data['is_fee_paid_by_user'] = true;
        $data['success_url'] = Config::get('baseUrl') . '/user/payment/return?tradeno=' . $pl->tradeno;
        $data['ipn_callback_url'] = Config::get('baseUrl') . '/payment/notify/bobpay';


        $result = json_decode($this->post($data), true);
        return die(json_encode($result));
        if (!isset($result['id'])) {
            return json_encode([
                'code' => -1,
                'msg' => 'Payment gateway processing failed'
            ]);
        }
        $result['pid'] = $pl->tradeno;
        return json_encode([
            'url' => $result['invoice_url'],
            'code' => 0,
            'pid' => $pl->tradeno
        ]);
    }

    public function notify($request, $response, $args)
    {
        if (!$this->verify($request->getParams(), $request->getParam('sign'))) {
            die('FAIL');
        }
        $this->postPayment($request->getParam('out_trade_no'), 'BobPay');
        die('SUCCESS');
    }

    public function getPurchaseHTML()
    {
    }

    public function getReturnHTML($request, $response, $args)
    {
        header('Location:/user/code');
    }

    public function getStatus($request, $response, $args)
    {
        $return = [];
        $p = Paylist::where('tradeno', $_POST['pid'])->first();
        $return['ret'] = 1;
        $return['result'] = $p->status;
        return json_encode($return);
    }
}
