<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');


class pay_op {
    public $payparams;
    public $key;
    public $validity;

    public function __construct()
    {
        global $_M;
        $this->payparams = array();
        $this->key = '848068e8fdde035d979196339b9a55b6';
        $this->validity = '';
    }

    public function getPayConfig($config){
        global $_M;
        $query = "SELECT `name`,`value` FROM {$_M['table']['pay_config']} WHERE name='{$config}' AND lang = '{$_M['lang']}';";
        $pay_config = DB::get_one($query);
        if ($pay_config) {
            return $pay_config['value'];
        }else{
            return '';
        }
    }

    /**
     * 获取用户消费记录
     * @param $user 用户信息
     * @param $type 类型 1充值 2消费
     * @return array 消费记录
     */
    public function get_record($user ,$type)
    {
        global $_M;
        $web_finance = load::mod_class('pay/web/finance', 'new');
        $record_list = $web_finance->get_record_by_uid($user ,$type);
        return $record_list;
    }

    /**
     * 创建支付请求表单
     * @param $payparams
     * @param string $reqUrl
     * @return string
     */
    public function createPayForm($payparams='') {
        global $_M;
        $this->setPayParams($payparams);
        $reqUrl = "{$_M['url']['site']}pay/dopay.php?lang={$_M['lang']}";
        // <body onload="javascript:document.pay_form.submit();">
        $html = <<<eot
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        </head>
        <body onload="javascript:document.pay_form.submit();">
            <form id="pay_form" name="pay_form" action="{$reqUrl}" method="post">
    
eot;
        foreach ( $this->payparams as $key => $value ) {
            $value = base64_encode($value);
            $html .= "    <input type=\"hidden\" name=\"{$key}\" id=\"{$key}\" value=\"{$value}\" />\n";
            //$html .= "    <input type=\"input\" name=\"{$key}\" id=\"{$key}\" value=\"{$value}\" />\n";
        }
        $html .= <<<eot
    <!--<input type="submit" type="hidden">-->
    </form>
</body>
</html>
eot;
        return $html;
    }

    public function getPayParams()
    {
        global $_M;
        return array('body','subject','no','out_trade_no','attach','goods_tag','product_id','total_fee','callback_url','sys_callback');
    }

    public function setPayParams($data)
    {
        global $_M;
        foreach ($data as $key => $para) {
            if (in_array($key, $this->getPayParams())) {
                $this->payparams[$key] = $para;
            }
        }
        return $this->payparams;

    }

    public function getRid(){
        $rid = date('YmdHis').random(5, 1);
        return $rid;
    }

    public function price_str($price){
        global $_M;
        $pricestr = load::mod_class('pay/pay_common', 'new')->price_str($price);
        return $pricestr;
    }

    /**
     * 获取订单支付类型
     * @param $paytype int 支付类型
     */
    public function getPayTypeName($paytype){
        global $_M;
        switch ($paytype) {
            case 0://账户余额支付
                #return '账户余额支付';
                return $_M['word']['pay_pay_type0']?$_M['word']['pay_pay_type0']:'账户余额支付';
                break;
            case 1://微信扫码支付
                #return '微信扫码支付';
                return $_M['word']['pay_pay_type1']?$_M['word']['pay_pay_type1']:'微信扫码支付';
                break;
            case 2://支付宝WAP支付
                #return '支付宝WAP支付';
                return $_M['word']['pay_pay_type2']?$_M['word']['pay_pay_type2']:'支付宝WAP支付';
                break;
            case 3://支付宝支付
                #return '支付宝网页支付';
                return $_M['word']['pay_pay_type3']?$_M['word']['pay_pay_type3']:'支付宝网页支付';
                break;
            case 4://网银支付
                #return '银联b2c支付';
                return $_M['word']['pay_pay_type4']?$_M['word']['pay_pay_type4']:'银联b2c支付';
                break;
            case 5://PayPal支付
                #return 'PayPal支付';
                return $_M['word']['pay_pay_type5']?$_M['word']['pay_pay_type5']:'PayPal支付';
                break;
            case 6://微信H5-JsApiPay支付
                #return '微信公众号付';
                return $_M['word']['pay_pay_type6']?$_M['word']['pay_pay_type6']:'微信公众号付';
                break;
            case 7://微信H5支付
                #return '微信H5支付';
                return $_M['word']['pay_pay_type7']?$_M['word']['pay_pay_type7']:'微信H5支付';
                break;
            case 9://银联b2b
                #return '银联b2b支付';
                return $_M['word']['pay_pay_type9']?$_M['word']['pay_pay_type9']:'银联b2b支付';
                break;
            default:
                break;
        }
    }

    /**
     * url字符串解密
     * @param $code
     * @return array|bool|string
     */
    public function de_code($code) {
        global $_M;
        if($code=='')return false;
        $code = str_replace(' ', '+', urldecode($code));
        list($true_code, $time, $str, $is_array_flag,$lang) = explode('$M$', $code);
        $_M['lang'] = $lang;
        $c1 = substr($true_code, 0, 7);
        $c2 = substr($true_code, 9, 2);
        $c3 = substr($true_code, 13, 11);
        $c4 = substr($true_code, 26, 5);
        $c5 = substr($true_code, 33, 7);
        $true_code = $c1.$c2.$c3.$c4.$c5;
        if(md5($str.$this->key.$time) == $true_code){
            if($is_array_flag == 1){
                return jsondecode(base64_decode($str));
            }else{
                return base64_decode($str);
            }
        }else{
            return false;
        }
    }

    /**
     * url字符串加密
     * @param $str
     * @return string
     */
    public function en_code($str){
        global $_M;
        $time = time();
        $lang = $_M['lang'];

        if(is_array($str)){
            $str = base64_encode(jsonencode($str));
            $is_array_flag = 1;
        }else{
            $str = base64_encode($str);
            $is_array_flag = 0;
        }
        $true_code = md5($str.$this->key.$time);
        $r1 = random(2, 5);
        $r2 = random(2, 5);
        $r3 = random(2, 5);
        $r4 = random(2, 5);

        $c1 = substr($true_code, 0, 7);
        $c2 = substr($true_code, 7, 2);
        $c3 = substr($true_code, 9, 11);
        $c4 = substr($true_code, 20, 5);
        $c5 = substr($true_code, 25, 9);
        $re_code = "{$c1}{$r1}{$c2}{$r2}{$c3}{$r3}{$c4}{$r4}{$c5}".'$M$'."{$time}".'$M$'."{$str}".'$M$'.$is_array_flag.'$M$'.$lang;
        return urlencode($re_code);
    }
}