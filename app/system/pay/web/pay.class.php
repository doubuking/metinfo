<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
/**
 * 支付基类
 * 集成支付：微信、财付通、支付宝、网银、PayPal
 */
ini_set('date.timezone','Asia/Shanghai');
load::sys_class('web');
load::sys_func('admin');
load::sys_func('str');
load::sys_func('array');
class pay extends web{

    protected $uid;

    public function __construct() {
        global $_M;
        //定义一些可以预定义的变量值
        parent::__construct();
        $this->uid = get_met_cookie('id') ? : 0;
    }

    /**
     * 支付接口订单查询
     */
    public function doquery() {
        global $_M;
        $pay_type   = $_M['form']['paytype'];
        $return     = $_M['form']['return'];
        switch ($pay_type) {
            case 1://微信订单查询
                $wxpay  = load::mod_class('pay/web/wxpay.class.php', 'new');
                $pay    = $wxpay->wxpayQuery();
                if ($return==1) {
                    $this->ordercheck($pay);
                }else{
                    echo json_encode($pay);
                }
                break;
            case 2://支付宝订单查询
                $pay = $this->alipayQuery();
                break;
            case 3://支付宝订单查询
                $pay = $this->alipayQuery();
                break;
            case 4://网银订单查询
                $pay = $this->unionpayQuery();
                break;
            case 5://PayPal订单查询
                $pay = $this->paypalQuery();
                break;
            case 7://微信H5订单查询
                $wxpay  = load::mod_class('pay/web/wxpay.class.php', 'new');
                $pay    = $wxpay->wxpayQuery();
                if ($return) {
                    $this->ordercheck($pay);
                }else{
                    echo json_encode($pay);
                }
                break;
            default:
                break;
        }
    }

    /**
     * 创建订单存储至数据库
     */
    public function CreateOrder($date) {
        global $_M;
        //根据订单号进行重复订单查询
        if(!$order = $this->GetOeder($date['out_trade_no'])) {//订单不存在且订单数据不为空时进行订单信息存储，并返回订单号
            $date['order_time']   = date("YmdHis");
            $query = "INSERT INTO {$_M['table']['pay_order']} SET 
                    `no`={$date['no']},
                    `callback_url`='{$date['callback_url']}',
                    `sys_callback`='{$date['sys_callback']}',
                    `out_trade_no`='{$date['out_trade_no']}',
                    `subject`='{$date['subject']}',
                    `product_id`='{$date['product_id']}',
                    `body`='{$date['body']}',
                    `goods_tag`='{$date['goods_tag']}',
                    `attach`='{$date['attach']}',
                    `show_url`='{$date['show_url']}',
                    `total_fee`='{$date['total_fee']}',
                    `order_time`='{$date['order_time']}',
                    `pay_time`='',
                    `pay_type`='',
                    `callback`='0',
                    `status`='0',
                    `uid`={$this->uid},
                    `lang`='{$_M['lang']}',
                    `balance`='{$date['balance']}'";
            if(DB::query($query)){
                return DB::insert_id();
           }else{
                return false;
           }
        }
    }
    /**
     * 异步通知 处理
     */
    public function doNotify() {
        global $_M;
        #file_get_contents(__DIR__ . '/notify.txt', var_export($_POST,true));
        //=======【微信异步通知验证】=============
        $xml   = $GLOBALS['HTTP_RAW_POST_DATA'];
        if(!$xml){
            $xml = file_get_contents("php://input");
            #file_get_contents(__DIR__ . '/notify.txt', var_export($xml,true));
        }
        $array = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        if($array && $array['out_trade_no']) {
            $date = $this->GetOeder($array['out_trade_no']);
                 $this->doNotify_wxpay($date);
        }

        //========获取去回调信息中的订单号=======
        $out_trade_no = $_M['form']['out_trade_no'];
        if(!$out_trade_no && isset($_POST['orderId'])){
            //获取银联回调订单号
            $out_trade_no = $_POST['orderId'];
        }
        if($_POST['remark1' ])
        {
            $out_trade_no = trim($_POST['remark1']);
        }

        if($out_trade_no) {
            $date = $this->GetOeder($out_trade_no);
            //=======【支付宝网页支付接口异步通知验证】=============
            if($date['pay_type'] === '3') {
                $private_key = file_get_contents(__DIR__.'/alipay_new/merchant_private_key.txt');
                $public_key = file_get_contents(__DIR__.'/alipay_new/alipay_public_key.txt');
                if(version_compare(phpversion(), '5.5.0') >= 0 && $public_key && $public_key){
                    $this->doNotify_alipaypage($date);
                }
                //支付宝老接口
                $this->doNotify_alipay($date);
            }
            //=======【支付宝wap支付异步通知验证】=============
            if($date['pay_type'] === '2') {
                $this->doNotify_alipaywap($date);
            }
            //=======【银联b2c异步通知验证】=============
            if($date['pay_type'] === '4') {
                $this->doNotify_unionpay($date);
            }
            //=======【银联b2b异步通知验证】=============
            if($date['pay_type'] === '9') {
                $this->doNotify_unionpayb2b($date);
            }
            //=======【paypal支付验证】 20171103 =============
            if($date['pay_type'] === '5') {
                $this->doNotify_paypal($date);
            }
        }
    }

    //微信异步通知验证
    public function doNotify_wxpay($date) {
        $wxpay = load::mod_class('pay/web/wxpay.class.php', 'new');
        if($wxpay->donotify($date['out_trade_no'])) {
            $this->UpadteOrder($date['pay_type'],$date['out_trade_no']);
        }
    }

    //支付宝异步通知验证
    public function doNotify_alipay($date) {
        global $_M;
        $alipay = load::mod_class('pay/web/alipay.class.php', 'new');
        if($alipay->donotify()&&!$date['status']&&($_M['form']['trade_status']==='TRADE_SUCCESS'||$_M['form']['trade_status']==='TRADE_FINISHED')) {
            $this->UpadteOrder($date['pay_type'],$date['out_trade_no']);
        }
    }
    //支付宝开放平台wappay 新
    public function doNotify_alipaywap($date){
        global $_M;
        $alipaynew = load::mod_class('pay/web/alipaynew.class.php', 'new');
        if ($alipaynew->donotifyWapPay() && !$date['status'] && ($_M['form']['trade_status']==='TRADE_SUCCESS' || $_M['form']['trade_status']==='TRADE_FINISHED')) {
            $this->UpadteOrder($date['pay_type'],$date['out_trade_no']);
        }
    }
    //支付宝开放平台pagepay 新
    public function doNotify_alipaypage($date){
        global $_M;
        $alipaynew = load::mod_class('pay/web/alipaynew.class.php', 'new');
        if ($alipaynew->donotifyPagePay() && !$date['status'] && ($_M['form']['trade_status']==='TRADE_SUCCESS' || $_M['form']['trade_status']==='TRADE_FINISHED')) {
            $this->UpadteOrder($date['pay_type'],$date['out_trade_no']);
        }
    }

    //银联b2c异步通知验证
    public function doNotify_unionpay($date) {
        $unionpay = load::mod_class('pay/web/unionpay.class.php', 'new');
        if($unionpay->donotify($date)) {
            $this->UpadteOrder($date['pay_type'],$date['out_trade_no']);
        }
    }

    //银联b2b异步通知验证
    public function doNotify_unionpayb2b($date) {
        $unionpayb2b = load::mod_class('pay/web/unionpayb2b.class.php', 'new');
        if($unionpayb2b->donotify($date)) {
            $this->UpadteOrder($date['pay_type'],$date['out_trade_no']);
        }
    }

    //paypal同步通知
    public function doNotify_paypal($date){
        global $_M;
        $this->UpadteOrder($date['pay_type'],$date['out_trade_no']);
        header("Location:{$_M['url']['site']}shop/order.php");
    }

    /**
     * 同步通知 处理
     */
    public function doReturn() {
        global $_M;
        $out_trade_no = $_M['form']['out_trade_no'] ? : ($_POST['orderId']?:($_POST['remark1']?trim($_POST['remark1']):''));
        $date         = $this->GetOeder($out_trade_no);
       /* var_dump($out_trade_no);
        dump($date);*/
        $title        = $_M['word']['pay_paymentok_title'];
        $this->UpadteOrderReturnType($out_trade_no);                                 //接收到同步通知后根据订单号更改【同步通知】状态
        $return_url   = $date['callback_url']?:$this->template('own/return');   //获取自定义同步通知返回地址，为自定义则使用默认地址

        //微信同步通知知验证
        if($date['pay_type']==='1' || $date['pay_type']==='6') {
            $this->doReturn_wxpay($date,$return_url);
        }
        //支付宝网页支付接口同步通知验证
        if($date['pay_type'] === '2'){
            $this->doReturn_alipaywap($date);
        }
        //支付宝网页支付接口同步通知验证
        if($date['pay_type'] === '3') {
            if($this->checkalipay()){
                $this->doReturn_alipaypage($date,$return_url);
            }else{
                //老接口
                $this->doReturn_alipay($date,$return_url);
            }
        }
        //银联b2c同步通知验证
        if($date['pay_type'] === '4'){
            $this->doReturn_unionpay($date);
        }
        //银联b2b同步通知验证
        if($date['pay_type'] === '9'){
            $this->doReturn_unionpayb2b($date);
        }
        //paypal同步通知验证
        if($date['pay_type'] === '5'){
            $this->doReturn_paypal($date);
        }
    }

    /**
     * 微信同步通知
     * @param $date 订单数据
     * @param $return_url  默认条状页面
     */
    public function doReturn_wxpay($date,$return_url)
    {
        $wxpay = load::mod_class('pay/web/wxpay.class.php', 'new');
        if($wxpay->OrderQuery($date['out_trade_no'])) {
            if(!$date['status']){
                $this->UpadteOrder($date['pay_type'],$date['out_trade_no']);
            }
            $this->docallback($date['callback_url']);
        }
    }

    /**
     * 支付宝同步通知
     * @param $date
     */
    public function doReturn_alipay($date)
    {
        $alipay = load::mod_class('pay/web/alipay.class.php', 'new');                   //alipay同步通知验证【使用异步回调】
        if($alipay->doreturn()&&($_GET['trade_status']==='TRADE_SUCCESS'||$_GET['trade_status']==='TRADE_FINISHED')) {
            if(!$date['status']){
                $this->UpadteOrder($date['pay_type'],$date['out_trade_no']);
            }
            $this->docallback($date['callback_url']);
        }
    }

    /**
     * 支付宝电脑网页支付同步通知 新
     * @param $date
     */
    public function doReturn_alipaypage($date)
    {
        $alipaynew = load::mod_class('pay/web/alipaynew.class.php', 'new');                   //alipay同步通知验证【使用异步回调】
        if($alipaynew->doreturnPagePay()) {
            if(!$date['status']){
                $this->UpadteOrder($date['pay_type'],$date['out_trade_no']);
            }
            $this->docallback($date['callback_url']);
        }
    }

    /**
     * 支付宝wap支付同步通知 新
     * @param $date
     */
    public function doReturn_alipaywap($date)
    {
        $alipaynew = load::mod_class('pay/web/alipaynew.class.php', 'new');                   //alipay同步通知验证【使用异步回调】
        if($alipaynew->doreturnWapPay()) {
            if(!$date['status']){
                $this->UpadteOrder($date['pay_type'],$date['out_trade_no']);
            }
            $this->docallback($date['callback_url']);
        }
    }

    /**
     * paypal同步通知验证
     * @param $date
     */
    public function doReturn_paypal($date)
    {
        $paypal = load::mod_class('pay/web/paypal.class.php', 'new');                       //paypa同步通知验证
        if($_GET['token'] && $paypal->doreturn($_GET['token'])){
            #$payerid = $paypal->doreturn($_GET['token']);
            if(!$date['status']){
                $this->UpadteOrder($date['pay_type'],$date['out_trade_no']);
            }
            $this->docallback($date['callback_url']);
            }
        }

    /**
     * 银联b2c同步通知验证
     * @param $date
     */
    public function doReturn_unionpay($date)
    {
        $unionpay = load::mod_class('pay/web/unionpay.class.php', 'new');               //银联b2c同步通知验证【使用异步回调】
        if($unionpay->donotify($date)) {
            if(!$date['status']){
                $this->UpadteOrder($date['pay_type'],$date['out_trade_no']);
            }
            $this->docallback($date['callback_url']);
        }
    }

    /**
     * 银联b2b同步通知验证
     * @param $date
     */
    public function doReturn_unionpayb2b($date)
    {
        $unionpayb2b = load::mod_class('pay/web/unionpayb2b.class.php', 'new');           //银联b2b同步通知验证【使用异步回调】
        if($unionpayb2b->donotify($date)) {
            if(!$date['status']){
                $this->UpadteOrder($date['pay_type'],$date['out_trade_no']);
            }
            $this->docallback($date['callback_url']);
        }
    }

    /**
     * 根据订单号out_trade_no更新订单【支付状态】
     * @param $pay_type int 支付方式
     * @param $out_trade_no 商户唯一点单号
     */
    public function UpadteOrder($pay_type,$out_trade_no) {
        global $_M;
        $pay_time = date("YmdHis");

        //更新订单状态
        $query  = "UPDATE {$_M['table']['pay_order']} SET pay_time='{$pay_time}',pay_type='{$pay_type}',status='1' WHERE out_trade_no='{$out_trade_no}'";
        DB::query($query);

        //订单信息
        $order = $this->GetOeder($out_trade_no);
        $order['pay_type_name'] = $this->getPayTypeName($pay_type);
        $_M['lang'] = $order['lang'];

        //写入财务信息
        $finance = load::mod_class('pay/web/finance.class.php', 'new');
        if($order['balance'] == '1'){
            //系统账户充值
            $finance->addfinance(1, $order['no'], $order['uid'], $order['total_fee'], "{$_M['word']['pay_recharge']}「{$order['pay_type_name']}」 <span class=\"tag tag-default\">{$_M['word']['pay_order']}：{$order['out_trade_no']}</span>");
        }elseif ($order['balance'] == '2'){
            //账户余额消费
            if(!$finance->addfinance(2, $order['no'], $order['uid'], $order['total_fee'], "<span class=\"tag tag-default\">{$_M['word']['pay_payment']}{$_M['word']['pay_order']}：{$order['out_trade_no']}</span>")){
                return false;
            }
        }else{
            $finance->addfinance(1, $order['no'], $order['uid'], $order['total_fee'], "{$_M['word']['pay_recharge']}「{$order['pay_type_name']}」 <span class=\"tag tag-default\">{$_M['word']['pay_order']}：{$order['out_trade_no']}</span>");
            if(!$finance->addfinance(2, $order['no'], $order['uid'], $order['total_fee'], "<span class=\"tag tag-default\">{$_M['word']['pay_payment']}{$_M['word']['pay_order']}：{$order['out_trade_no']}</span>")){
                return false;
            }
        }

        //应用回调处理
        $this->toapp($order['out_trade_no']);

        //系统回调处理
        $this->tosys($order['out_trade_no']);
    }
    /**
     * 应用订单处理
     * @param $out_trade_no 商户唯一订单号
     */
    public function toapp($out_trade_no) {
        global $_M;
        $order = $this->GetOeder($out_trade_no);
        load::plugin('dopay', 0, array('pay'=>$order ));//加载插件

    }

    /**
     * @param $out_trade_no 商户唯一订单号
     */
    public function tosys($out_trade_no){
        global $_M;
        $order = $this->GetOeder($out_trade_no);
        //应用编号100以内为系统预留编号
        if ($order['no'] <= 100) {
            $data['codestr'] = load::mod_class('pay/pay_op', 'new')->en_code($order);
            $this->curl($order['sys_callback'],$data,0);
        }
    }

    /*
     * callback跳转页面
     */
    public function docallback($callback_url = '',$ajax = ''){
        global $_M;
        $this->load_url_unique();
        $out_trade_no = $_M['form']['out_trade_no'];
        $order = $this->GetOeder($out_trade_no);
        $callbackurl = $callback_url ? $callback_url : $order['callback_url'];
        $callbackurl = $callbackurl ? $callbackurl : $_M['url']['site'];

        if(!$ajax){
            if(version_compare($_M['config']['metcms_v'], '6.0.0') > 0){
                $this->input['callback'] = $callbackurl;
                if($order['statue']==1){
                    require $this->view('app/payok',$this->input);
                }else{
                    header("Location:{$callbackurl}");
                }
            }{
                header("Location:{$callbackurl}");
            }
        }else{
            $retun = array();
            $retun['success'] = $callbackurl;
            $retun['code'] = $_M['word']['pay_paysuccess'];
            echo jsonencode($retun);
            die();
        }
    }

    /*
     * 订单状态查询
     */
    public function ordercheck($pay)
    {
        global $_M;
        $out_trade_no = $_M['form']['out_trade_no'];
        $order = $this->GetOeder($out_trade_no);
        if($pay['trade_state']=='SUCCESS'){
            $data['callback'] = $order['callback_url'];
            require $this->view('app/payok',$data);
        }else{
            $this->docallback();
        }
        die();

    }

    /**
     * 根据订单号out_trade_no更新订单【开始时间】、【支付类型】
     */
    public function UpadteOrderPaymentType($pay_type,$balance,$out_trade_no) {
        global $_M;
        $pay_time = date("YmdHis");
        $query    = "UPDATE {$_M['table']['pay_order']} SET pay_time='{$pay_time}',pay_type='{$pay_type}',balance='{$balance}' WHERE out_trade_no='{$out_trade_no}'";
        DB::query($query);
    }

    /*public function UpdataOrderBalanceState($balanceState,$out_trade_no){
        global $_M;
        $query = "UPDATE {$_M['table']['pay_order']} SET balance='{$balanceState}'WHERE out_trade_no='{$out_trade_no}';";

    }*/
    /**
     * 根据订单号out_trade_no更新订单【同步通知状态】
     * 1|已接收到通知
     * 0|默认为未接收到通知
     */
    public function UpadteOrderReturnType($out_trade_no) {
        global $_M;
        $query    = "UPDATE {$_M['table']['pay_order']} SET callback='1' WHERE out_trade_no='{$out_trade_no}' AND uid={$this->uid}";
        DB::query($query);
    }
    /**
     * 根据订单号out_trade_no获取订单支付状态
	 *  TRUE|已支付
	 * FALSE|未支付
     */
    public function CheckOrderPayStatus($out_trade_no) {
        $order = $this->GetOeder($out_trade_no);
        if($order['status']) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    /**
     * 根据out_trade_no查询订单
     * 返回订单信息
     */
    public function GetOeder($out_trade_no) {
        global $_M;
        if($out_trade_no) {
            $query = "SELECT * FROM {$_M['table']['pay_order']} WHERE out_trade_no='{$out_trade_no}' ";
            $array = DB::get_one($query);
            return $array;
        } else {
            return FALSE;
        }
    }
    /**
     * 根据接口类型获取接口参数
     */
    public function GetAPI($type, $name) {
        global $_M;
        if($type&&$name) {
            $table = $_M['config']['tablepre'].'pay_api';
            $query = "SELECT value FROM {$table} WHERE name='{$name}'AND paytype='{$type}';";
            $arr   = DB::get_one($query);
            $value = $arr['value'];
        }else{
            $value = 'Fail!';
        }
        return $value;
    }
    /**
     * 获取接口开关
     */
    public function GetPayOpen() {
        global $_M;
        $table = $_M['config']['tablepre'].'pay_config';
        $query = "SELECT value FROM {$table} WHERE name='payment_open'";
        $arr   = DB::get_one($query);
        $value = $arr['value'];
        return $value;
    }
    /**
     * 获取已开启的支付接口
     */
    public function GetPaymentList() {
        global $_M;
        $table = $_M['config']['tablepre'].'pay_config';
        $query = "SELECT value FROM {$table} WHERE name='payment_type'";
        $arr   = DB::get_one($query);
        $value = stringto_array($arr['value'],'|');
        return $value;
    }

    /**
     * 获取订单支付类型
     * @param $paytype int 支付类型
     */
    public function getPayTypeName($paytype){
        global $_M;
        switch ($paytype) {
            case 0://账户余额支付
                return $_M['word']['pay_pay_type0']?$_M['word']['pay_pay_type0']:'账户余额支付';
                break;
            case 1://微信扫码支付
                return $_M['word']['pay_pay_type1']?$_M['word']['pay_pay_type1']:'微信扫码支付';
                break;
            case 2://支付宝WAP支付
                return $_M['word']['pay_pay_type2']?$_M['word']['pay_pay_type2']:'支付宝WAP支付';
                break;
            case 3://支付宝支付
                return $_M['word']['pay_pay_type3']?$_M['word']['pay_pay_type3']:'支付宝网页支付';
                break;
            case 4://网银支付
                return $_M['word']['pay_pay_type4']?$_M['word']['pay_pay_type4']:'银联b2c支付';
                break;
            case 5://PayPal支付
                return $_M['word']['pay_pay_type5']?$_M['word']['pay_pay_type5']:'PayPal支付';
                break;
            case 6://微信H5-JsApiPay支付
                return $_M['word']['pay_pay_type6']?$_M['word']['pay_pay_type6']:'微信公众号付';
                break;
            case 7://微信H5支付
                return $_M['word']['pay_pay_type7']?$_M['word']['pay_pay_type7']:'微信H5支付';
                break;
            case 9://银联b2b
                return $_M['word']['pay_pay_type9']?$_M['word']['pay_pay_type9']:'银联b2b支付';
                break;
            default:
                break;
        }
    }

    /**
     * 检测用户信息
     * @return bool
     */

    public function check() {
        global $_M;
        $user = $this->get_login_user_info();
        if(!$user){
            okinfo($_M['url']['site'].'member/login.php');
            return false;
        }
        return $user;
    }

    /**
     * ajax成功
     * @param $success
     * @param $code 自定义信息
     */
    public function ajax_success($success,$code){
        global $_M;
        $retun = array();
        $retun['success'] = $success;
        $retun['code'] = $code;
        echo jsonencode($retun);
        die();
    }

    /**ajax失败
     * @param $error
     * @param $code 自定义信息
     */
    public function ajax_error($error, $code){
        global $_M;
        $retun = array();
        $retun['error'] = $error;
        $retun['code'] = $code;
        echo jsonencode($retun);
        die();
    }

    /**
     * @param $error 错误信息
     * @param $errno 错误代码
     */
    public function error($error,$errno){
        $json =array(
            'error' => $error,
            'errno' => $errno
        );
        echo jsonencode($json);
    }

    /**
     * 生成订单ID
     * @return string
     */
    public function get_rid(){
        $rid = date('YmdHis').random(5, 1);
        return $rid;
    }

    /**
     * 显示价格
     * @param $price
     * @return mixed
     */
    public function price_str($price){
        global $_M;
        $pricestr = load::mod_class('pay/pay_common', 'new')->price_str($price);
        return $pricestr;
    }

    //支付宝接宝检测
    public function checkalipay(){
        global $_M;
        $private_key = file_get_contents(__DIR__."/alipay_new/merchant_private_key_{$_M['lang']}.txt");
        $public_key = file_get_contents(__DIR__."/alipay_new/alipay_public_key_{$_M['lang']}.txt");
        if(version_compare(phpversion(), '5.5.0') >= 0 && $public_key && $public_key){
            //new API
            return true;
        }else{
            //old API
            return false;
        }
    }

    /**
      * 重写web类的load_url_unique方法，获取前台特有URL
      */
    protected function load_url_unique() {
        global $_M;
        parent::load_url_unique();
        $_M['url']['own_func'] = $_M['url']['own'].'include/function/';
        $_M['url']['own_class'] = $_M['url']['own'].'include/class/';
        $_M['url']['pay_notify'] = $_M['url']['site'].'pay/notify.php';
        $_M['url']['pay_return'] = $_M['url']['site'].'pay/return.php';

        $_M['url']['order_query'] = $_M['url']['site']."pay/orderquery.php?lang={$_M['lang']}&";
        $_M['url']['order_check'] = $_M['url']['site']."pay/ordercheck.php?lang={$_M['lang']}&";
        $_M['url']['callback'] = $_M['url']['site']."pay/callback.php?lang={$_M['lang']}";
    }

    public function curl($url,$data,$showpage = 1) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_TIMEOUT, 8);
        #curl_setopt($ch, CURLOPT_RETURNTRANSFER, $showpage);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        $result = curl_exec($ch);
        //echo $result;
        return $result;
    }
}
?>