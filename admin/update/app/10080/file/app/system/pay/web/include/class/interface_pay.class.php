<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');
load::mod_class('pay/web/include/class/mcode_shop');

class interface_pay {
    public function data_decode($data) {
        global $_M;
        $mocde = new mcode_shop($_M['config']['met_webkeys']);
        return $mocde->de_code($data);
    }

    public function data_encode($data) {
        global $_M;
        $mocde = new mcode_shop($_M['config']['met_webkeys']);
        return $mocde->en_code($data);
    }

//获取支付接口类型列表
    /*
     * type 1 微信扫码支付
     * type 2 支付宝手机web_H5支付
     * type 3 支付宝支付
     * type 4 银联b2c支付
     * type 5 Paypal支付
     * type 6 微信公众号支付
     * type 7 微信手机web_H5支付
     * type 9 网银b2b支付

     */
    public function get_pay_list() {
        global $_M;
        $return = array();
        $query = "SELECT * FROM {$_M['table'][pay_config]} WHERE name='payment_type' and lang='{$_M['lang']}'";
        $payment_type = DB::get_one($query);
        $pay_list = explode('#@met@#', $payment_type['value']);
        $url = "{$_M['url']['site']}pay/app.php?paytype=";
        if($this->is_weixin()){
            //微信内页
            #if(strstr($payment_type['value'], '6')){//微信公众号支付\
            if(in_array(6,$pay_list)){//微信公众号支付\
                $openId = $this->weixinopenId();
                $return['weixin_h5']['have'] = 1;
                $return['weixin_h5']['url'] = $url.'6';
                $return['weixin_h5']['check_url'] = "{$_M['url']['site']}pay/orderquery.php?paytype=1&out_trade_no=";
            }
        }else if($this->is_mobile()){
            //手机WEB 支付宝 微信WEB_H5 Paypal
            /*if(strstr($payment_type['value'], '3')){//支付宝
                $return['alipay']['have'] = 1;
                $return['alipay']['url'] = $url.'3';
            }*/

            if(in_array(2,$pay_list)){//支付宝wap支付
                $return['alipaywap']['have'] = 1;
                $return['alipaywap']['url'] = $url.'2';
            }

            if(in_array(7,$pay_list)){//微信手机WEB_H5
                $return['weixin_web_h5']['have'] = 1;
                $return['weixin_web_h5']['url'] = $url.'7';
                $return['weixin_web_h5']['check_url'] = "{$_M['url']['site']}pay/orderquery.php?paytype=7&out_trade_no=";
            }

            if(in_array(5,$pay_list)){//Paypal
                $return['paypal']['have'] = 1;
                $return['paypal']['url'] = $url.'5';
            }
        }else{
            //PC_WEB  微信扫码支付 支付宝 Paypal 银联b2c 银联b2b
            if(in_array(1,$pay_list)){//微信扫码
                $return['weixin']['have'] = 1;
                $return['weixin']['url'] = $url.'1';
                $return['weixin']['check_url'] = "{$_M['url']['site']}pay/orderquery.php?paytype=1&out_trade_no=";
            }

            if(in_array(3,$pay_list)){//支付宝
                $return['alipay']['have'] = 1;
                $return['alipay']['url'] = $url.'3';
            }

            if(in_array(5,$pay_list)){//Paypal
                $return['paypal']['have'] = 1;
                $return['paypal']['url'] = $url.'5';
            }

            if(in_array(4,$pay_list)){//银联b2c
                $return['upay']['have'] = 1;
                $return['upay']['url'] = $url.'4';
            }

            if(in_array(9,$pay_list)){//银联b2b
                $return['upayb2b']['have'] = 1;
                $return['upayb2b']['url'] = $url.'9';
            }

        }
        return $return;
    }

    function is_weixin(){
        if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
            return true;
        }
        return false;
    }

    function is_mobile(){
        $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
        if($_SERVER['HTTP_USER_AGENT']){
            $uachar = "/(nokia|sony|ericsson|mot|samsung|sgh|lg|philips|panasonic|alcatel|lenovo|cldc|midp|mobile|wap|Android|ucweb)/i";
            if(preg_match($uachar, $ua)){
                return true;
            }
        }
        return false;
    }

    public function weixinopenId() {
        global $_M;
        if(!$_M['form']['openId']){
            $wxpay = load::mod_class('pay/web/wxpay.class.php', 'new');                 //加载微信支付处理类
            $openId = $wxpay->GetOpen_ID();
            met_setcookie('openId', $openId);
            return $openId;
        }

    }
}
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>
