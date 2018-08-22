<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
load::mod_class('pay/web/pay');
class alipaynew extends pay {

    public $alipay_config;

    public function __construct() {
        global $_M;

        parent::__construct();

        //应用ID,您的APPID。
        $this->alipay_config['app_id']                  = $this->GetAPI('3', 'app_id');                 //APP_ID
        //商户私钥，您的原始格式RSA私钥
        $this->alipay_config['merchant_private_key']    = file_get_contents(__DIR__."/alipay_new/merchant_private_key_{$_M['lang']}.txt");
        //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
        $this->alipay_config['alipay_public_key']       = file_get_contents(__DIR__."/alipay_new/alipay_public_key_{$_M['lang']}.txt");
        //签名方式
        $this->alipay_config['sign_type']               = 'RSA2';
        //编码格式
        $this->alipay_config['charset']                 = 'UTF-8';
        //支付宝网关
        $this->alipay_config['gatewayUrl']              = "https://openapi.alipay.com/gateway.do";
        //超時時間
        $this->alipay_config['timeout_express']         = "1m";
        //异步通知地址
        $this->alipay_config['notify_url']              = $_M['url']['pay_notify'];
        //同步跳转
        $this->alipay_config['return_url']              = $_M['url']['pay_return'];
    }

    //电脑网页支付
    public function alipayPagepay($data){
        global $_M;
        require_once(__DIR__."/alipay_new/pagepay/service/AlipayTradeService.php");
        require_once(__DIR__."/alipay_new/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php");

        //构造要请求的参数数组，无需改动
        $parameter = array(
            "charset"           => $this->alipay_config['charset'],             //编码格式UTF-8
            "timeout_express"   => $this->alipay_config['timeout_express'],     //订单超时
            "out_trade_no"	    => $data["out_trade_no"],   //商户订单号
            "subject"	        => $data["subject"],        //订单名称
            "total_fee"	        => $data["total_fee"],      //付款金额
            "body"              => $data["body"],           //商品描述
        );
        //建立请求
        $payRequestBuilder = new AlipayTradePagePayContentBuilder();
        $payRequestBuilder->setBody($parameter['body']);
        $payRequestBuilder->setSubject($parameter['subject']);
        $payRequestBuilder->setOutTradeNo($parameter['out_trade_no']);
        $payRequestBuilder->setTotalAmount($parameter['total_fee']);

        $aop = new AlipayTradeService($this->alipay_config);

        /**
         * pagePay 电脑网站支付请求
         * @param $builder 业务参数，使用buildmodel中的对象生成。
         * @param $return_url 同步跳转地址，公网可以访问
         * @param $notify_url 异步通知地址，公网可以访问
         * @return $response 支付宝返回的信息
         */
        $response = $aop->pagePay($payRequestBuilder,$this->alipay_config['return_url'],$this->alipay_config['notify_url']);

        //输出表单
        var_dump($response);
    }
    /**
     * 支付宝支付wap
     * @param String(64)   out_trade_no      商户网站唯一订单号（支付宝合作商户网站唯一订单号）
     * @param String(256)  subject           商品名称（商品的标题/交易标题/订单标题/订单关键字等，该参数最长为128个汉字）
     * @param String(4)    payment_type      支付类型，默认值为：1（商品购买）——1|商品购买、2|捐赠、3|电子卡券
     * @param Number       total_fee         交易金额（该笔订单的资金总额，单位为RMB-Yuan。取值范围为[0.01，100000000.00]，精确到小数点后两位）
     * @param String(190)  notify_url        服务器异步通知页面路径,支付宝服务器主动通知商户网站里指定的页面http路径。
     * @param String(200)  return_url        页面跳转同步通知页面路径,支付宝处理完请求后，当前页面自动跳转到商户网站里指定页面的http路径。
     * @param String(1000) body              商品描述,对一笔交易的具体描述信息。如果是多种商品，请将商品描述字符串累加传给body。
     * @param String(400)  show_url          商品展示网址,收银台页面上，商品展示的超链接。
     * @param String       anti_phishing_key 防钓鱼时间戳,通过时间戳查询接口获取的加密支付宝系统时间戳.如果已申请开通防钓鱼时间戳验证，则此字段必填。
     * @param String(15)   exter_invoke_ip   客户端IP,用户在创建交易时，该用户当前所使用机器的IP。如果商户申请后台开通防钓鱼IP地址检查选项，此字段必填，校验用。
     */
    public function alipayWap($data) {
        global $_M;
        require_once(__DIR__."/alipay_new/wappay/service/AlipayTradeService.php");
        require_once(__DIR__."/alipay_new/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php");

        //构造要请求的参数数组，无需改动
        $parameter = array(
            "charset"           => $this->alipay_config['charset'],             //编码格式UTF-8
            "timeout_express"   => $this->alipay_config['timeout_express'],     //订单超时
            "out_trade_no"	    => $data["out_trade_no"],   //商户订单号
            "subject"	        => $data["subject"],        //订单名称
            "total_fee"	        => $data["total_fee"],      //付款金额
            "body"              => $data["body"],           //商品描述
        );
        //建立请求
        $payRequestBuilder = new AlipayTradeWapPayContentBuilder();
        $payRequestBuilder->setBody($parameter['body']);
        $payRequestBuilder->setSubject($parameter['subject']);
        $payRequestBuilder->setOutTradeNo($parameter['out_trade_no']);
        $payRequestBuilder->setTotalAmount($parameter['total_fee']);
        $payRequestBuilder->setTimeExpress($parameter['timeout_express']);

        $payResponse = new AlipayTradeService($this->alipay_config);
        $result=$payResponse->wapPay($payRequestBuilder,$this->alipay_config['return_url'],$this->alipay_config['notify_url']);

        return ;

    }


    /**
     * 支付宝异步通知验证 wappay
     */
    public function donotifyWapPay() {
        require_once __DIR__.'/alipay_new/wappay/service/AlipayTradeService.php';

        $arr=$_POST;
        $alipaySevice = new AlipayTradeService($this->alipay_config);
        $alipaySevice->writeLog(var_export($_POST,true));
        //计算得出通知验证结果
        $result = $alipaySevice->check($arr);
        if($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 支付宝同步通知验证wap支付
     */
    public function doreturnWapPay() {
        //计算得出通知验证结果
        require_once __DIR__.'/alipay_new/wappay/service/AlipayTradeService.php';

        $arr=$_GET;
        $alipaySevice = new AlipayTradeService($this->alipay_config);
        $result = $alipaySevice->check($arr);
        if($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 支付宝异步通知验证
     */
    public function donotifyPagePay() {
        require_once __DIR__.'/alipay_new/pagepay/service/AlipayTradeService.php';

        $arr=$_POST;
        $alipaySevice = new AlipayTradeService($this->alipay_config);
        $alipaySevice->writeLog(var_export($_POST,true));
        //计算得出通知验证结果
        $result = $alipaySevice->check($arr);
        if($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * 支付宝同步通知验证电脑网页支付
     */
    public function doreturnPagePay() {
        //计算得出通知验证结果
        require_once __DIR__.'/alipay_new/pagepay/service/AlipayTradeService.php';

        $arr=$_GET;
        $alipaySevice = new AlipayTradeService($this->alipay_config);
        $result = $alipaySevice->check($arr);
        if($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>