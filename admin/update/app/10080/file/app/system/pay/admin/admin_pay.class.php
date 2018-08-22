<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
load::sys_class('app');
load::sys_func('file');
load::sys_func('array');
//支付接口参数方法
require_once PATH_WEB.'app/system/pay/admin/function/payment.func.php';
class admin_pay extends app {
    public $appno;

    public function __construct() {
        global $_M;
        parent::__construct();
        $this->appno = 10080;
        nav::set_nav(1, $_M['word']['pay_financialdeta'], $_M['url']['own_form'] . 'a=dofinancelist');
        nav::set_nav(2, $_M['word']['pay_management'], $_M['url']['own_form'] . 'a=dopaylist');
        nav::set_nav(3, $_M['word']['payapi'], $_M['url']['own_form'] . 'a=dowxpay');
        $_M['pay_nav']=array(
            array('id'=>1,'name'=>$_M['word']['pay_wxpay'],'url'=>$_M['url']['own_form'].'a=dowxpay'),
            array('id'=>2,'name'=>$_M['word']['pay_alipay'],'url'=>$_M['url']['own_form'].'a=doalipay'),
            array('id'=>3,'name'=>$_M['word']['pay_upayb2c'],'url'=>$_M['url']['own_form'].'a=dounionpay'),
            array('id'=>4,'name'=>$_M['word']['pay_upayb2b'],'url'=>$_M['url']['own_form'].'a=dounionpayb2b'),
            array('id'=>5,'name'=>'PayPal','url'=>$_M['url']['own_form'].'a=dopaypal'),
        );
        #nav::set_nav(3, '财付通', $_M['url']['own_form'] . '&a=dotenpay');
    }

    /**
     * 财务记录列表
     */
    public function dofinancelist() {
        global $_M;
        nav::select_nav(1);
        require $this->show('app/finance');
    }

    /**
     * 财务列表数据
     */
    public function dojson_finance_list(){
        global $_M;
        #dump($_M['form']);
        $finance = load::mod_class("pay/admin/include/class/sys_finance.class.php",'new');

        $fromtime = $_M['form']['fromtime'];
        $totime   = $_M['form']['totime'];
        if($fromtime&&$totime){
            $fromtime = $fromtime.' 00:00:00';
            $fromtime = strtotime($fromtime);
            $totime = $totime.' 23:59:59';
            $totime = strtotime($totime);
            $search.= "and (addtime >= '{$fromtime}' && addtime<= '{$totime}') ";
        }
        $search.= $_M['form']['type']?"and type = '{$_M['form']['type']}' ":"";
        $search.= $_M['form']['username']?"and username = '{$_M['form']['username']}' ":"";
        $order = 'addtime DESC,id DESC';

        $data = $finance->json_finance_list($search, $order);
        foreach($data as $key=>$val){
            $list = array();
            $list[] = date("Y-m-d H:i:s" ,$val['addtime']);
            if($val['type'] == 1){
                $list[] = "<span class=\"tag tag-danger\">+".$finance->price_str($val['price'])."</span>";
                $list[] = '';
            }else{
                $list[] = '';
                $list[] = "<span class=\"tag tag-success\">-".$finance->price_str($val['price'])."</span>";
            }
            $list[] = $finance->price_str($val['balance']);
            $list[] = $val['username'];
            if(str_length($val['reason'], 1) >100){
                #$list[] = strcut($val['reason'], 0, 100)."...<a class=\"detailed\" data-info=\"{$val['reason']}\" data-toggle=\"modal\" data-target=\".bs-example-modal-sm\" href=\"#\">详细</a>";
                $list[] = $val['reason'];
            }else{
                $list[] = $val['reason'];
            }
            $list[] = $val['adminname'];
            $rarray[] = $list;
        }

        $finance->json_return($rarray);
    }

    /**
     * 余额变更
     */
    public function doaddfinance(){
        global $_M;
            $finance = load::mod_class("pay/admin/include/class/sys_finance.class.php",'new');
        if($finance->addfinance($_M['form']['type'], $_M['form']['username'], $_M['form']['price'], $_M['form']['reason'])){
            $res = $finance->para('type');
            $success=$res[$_M['form']['type']].$_M['word']['jsok'];
            $this->ajax_success($success);
        }else{
            if($finance->errorcode == 'nobalance'){
                $this->ajax_error($_M['word']['pay_nobalance']);
            }else if($finance->errorcode == 'nouser'){
                $this->ajax_error($_M['word']['pay_nouser']);
            }else{
                $this->ajax_error($finance->errorcode);
            }
        }
    }
    //错误
    public function ajax_error($error){
        global $_M;
        $retun = array();
        $retun['error'] = $error;
        echo jsonencode($retun);
        die();
    }
    //成功
    public function ajax_success($success){
        global $_M;
        $retun = array();
        $retun['success'] = $success;
        echo jsonencode($retun);
        die();
    }


    /**
     * 综合设置
     */
    public function dopaylist() {
        global $_M;
        nav::select_nav(2);
        $data = array();
        $data['payment_open'] = $this->GetPaymentConfig('payment_open');//支付开关状态
        $data['payment_type'] = $this->GetPaymentConfig('payment_type');//支付接口类型
        $data['pay_price_str_prefix'] = $this->GetPaymentConfig('pay_price_str_prefix');//货币前缀
        $data['pay_price_str_suffix'] = $this->GetPaymentConfig('pay_price_str_suffix');//货币后缀
        $data['pay_charger_tips1'] = $this->GetPaymentConfig('pay_charger_tips1');            //会员中心支付提示
        require $this->show('app/paylist',$data);
    }

    public function dosavepaymentconfig() {
        global $_M;
        $this->SetPaymentConfig('payment_open', $_M['form']['payment_open']);
        $this->SetPaymentConfig('payment_type', $_M['form']['payment_type']);
        $this->SetPaymentConfig('pay_price_str_prefix', $_M['form']['pay_price_str_prefix']);
        $this->SetPaymentConfig('pay_price_str_suffix', $_M['form']['pay_price_str_suffix']);
        $this->SetPaymentConfig('pay_charger_tips1', $_M['form']['pay_charger_tips1']);
        $message = $_M['word']['jsok'];

        $payconfig[] = 'payment_open';
        appconfigsave($payconfig,$this->appno);   //支付接口开关

        //商城货币符号同步设置
        $_M['form']['shopv2_price_str_prefix'] = $_M['form']['pay_price_str_prefix'];
        $_M['form']['shopv2_price_str_suffix'] = $_M['form']['pay_price_str_suffix'];
        $_M['form']['shopv2_onlinepay'] = $_M['form']['payment_open'];
        $configlist[] = 'shopv2_price_str_prefix';
        $configlist[] = 'shopv2_price_str_suffix';
        $configlist[] = 'shopv2_onlinepay';
        appconfigsave($configlist,10043);   //商城
        //用户中心左侧导航开关
        if($_M['form']['payment_open']==1){
            $query = "UPDATE {$_M['table']['ifmember_left']} SET effect = 1 WHERE no = '{$this->appno}' AND lang = '{$_M['lang']}'";
            DB::query($query);
        }else{
            $query = "UPDATE {$_M['table']['ifmember_left']} SET effect = 0 WHERE no = '{$this->appno}' AND lang = '{$_M['lang']}'";
            DB::query($query);
        }

        turnover("{$_M['url']['own_form']}a=dopaylist", "{$message}");
    }

    //微信支付详细参数设置  接口启用
    public function dowxpay() {
        global $_M;
        nav::select_nav(3);
        $paytype = "1";

        $data = array();
        $data['paytype'] = $paytype;
        $data['app_id'] = $this->GetAPI($paytype, 'app_id');
        $data['app_mchid'] = $this->GetAPI($paytype, 'app_mchid');
        $data['app_key'] = $this->GetAPI($paytype, 'app_key');
        $data['app_secert'] = $this->GetAPI($paytype, 'app_secert');
        $data['apiclient_cert'] = $this->GetAPI($paytype, 'apiclient_cert');
        $data['apiclient_key'] = $this->GetAPI($paytype, 'apiclient_key');
        $data['proxy_host'] = $this->GetAPI($paytype, 'proxy_host');
        $data['proxy_port'] = $this->GetAPI($paytype, 'proxy_port');
        $data['report_lev'] = $this->GetAPI($paytype, 'report_lev');
        $data['message'] = $_M['word']['jsok'];

        require $this->show('app/wxpay',$data);
       #require $this->template('own/wxpay');
    }
    public function dosavewxpay() {
        global $_M;
        $wxpay_config['app_id'] = $_M['form']['app_id'];
        $wxpay_config['app_mchid'] = $_M['form']['app_mchid'];
        $wxpay_config['app_key'] = $_M['form']['app_key'];
        $wxpay_config['app_secert'] = $_M['form']['app_secert'];
        $wxpay_config['apiclient_cert'] = $_M['form']['apiclient_cert'];
        $wxpay_config['apiclient_key'] = $_M['form']['apiclient_key'];
        $wxpay_config['proxy_host'] = $_M['form']['proxy_host'];
        $wxpay_config['proxy_port'] = $_M['form']['proxy_port'];
        $wxpay_config['report_lev'] = $_M['form']['report_lev'];
        $this->SetAPI($_M['form']['type'], 'app_id', $wxpay_config['app_id']);
        $this->SetAPI($_M['form']['type'], 'app_mchid', $wxpay_config['app_mchid']);
        $this->SetAPI($_M['form']['type'], 'app_key', $wxpay_config['app_key']);
        $this->SetAPI($_M['form']['type'], 'app_secert', $wxpay_config['app_secert']);
        $this->SetAPI($_M['form']['type'], 'apiclient_cert', $wxpay_config['apiclient_cert']);
        $this->SetAPI($_M['form']['type'], 'apiclient_key', $wxpay_config['apiclient_key']);
        $this->SetAPI($_M['form']['type'], 'proxy_host', $wxpay_config['proxy_host']);
        $this->SetAPI($_M['form']['type'], 'proxy_port', $wxpay_config['proxy_port']);
        $this->SetAPI($_M['form']['type'], 'report_lev', $wxpay_config['report_lev']);
        $this->CreatWxPayConfig($wxpay_config);
        $paytype = $_M['form']['type'];
        $message =$_M['word']['jsok'];
        turnover("{$_M['url']['own_form']}a=dowxpay", "{$message}");
    }
    /**
     * 【微信】重写配置文件
     */
    protected function CreatWxPayConfig($wxpay_config) {
        global $_M;
        $file = PATH_WEB . $this->ChangeStrType("app/system/pay/web/wxpay/WxPay.Config_{$_M['lang']}.php");
        makefile($file);
        $myfile = fopen($file, "w") or die("Unable to open file!");
        $code = "<?php\n";
        fwrite($myfile, $code);
        $code = "class WxPayConfig {\n";
        fwrite($myfile, $code);
        $code = "const APPID = '{$wxpay_config['app_id']}';\n";
        fwrite($myfile, $code);
        $code = "const MCHID = '{$wxpay_config['app_mchid']}';\n";
        fwrite($myfile, $code);
        $code = "const KEY = '{$wxpay_config['app_key']}';\n";
        fwrite($myfile, $code);
        $code = "const APPSECRET = '{$wxpay_config['app_secert']}';\n";
        fwrite($myfile, $code);
        $code = "const SSLCERT_PATH = '';\n";
        fwrite($myfile, $code);
        $code = "const SSLKEY_PATH = '';\n";
        fwrite($myfile, $code);
        $code = "const CURL_PROXY_HOST = '{$wxpay_config['proxy_host']}';\n";
        fwrite($myfile, $code);
        $code = "const CURL_PROXY_PORT = '{$wxpay_config['proxy_port']}';\n";
        fwrite($myfile, $code);
        $code = "const REPORT_LEVENL = '{$wxpay_config['report_lev']}';\n";
        fwrite($myfile, $code);
        $code = "}";
        fwrite($myfile, $code);
        fclose($myfile);
    }

    /*
     * 支付接口——财付通  未启用
     */
   /* public function dotenpay() {
        global $_M;
        nav::select_nav(3);
        $paytype = "2";
        $tem_partner = $this->GetAPI($paytype, 'tem_partner');
        $tem_key = $this->GetAPI($paytype, 'tem_key');
        require $this->template('own/tenpay');
    }
    public function dosavetempay() {
        global $_M;
        $this->SetAPI($_M['form']['type'], 'tem_partner', $_M['form']['tem_partner']);
        $this->SetAPI($_M['form']['type'], 'tem_key', $_M['form']['tem_key']);
        $paytype = $_M['form']['type'];
        $message = $_M['word']['jsok'];
        turnover("{$_M['url']['own_form']}a=dotenpay", "{$message}");
    }*/


    /*
     * 支付接口——支付宝  接口启用
     */
    public function doalipay() {
        global $_M;
        nav::select_nav(3);
        $paytype = "3";

        $data = array();
        $data['paytype'] = $paytype;
        $data['phpver'] = phpversion();
        $data['phpvercheck'] = version_compare( phpversion(),5.5) >= 0 ? 0 : 1;
        $data['openssl_sign'] = function_exists("openssl_sign") ? 0 : 1;
        if ($data['phpvercheck'] || $data['openssl_sign']) {
            $data['set_tips_show'] = 1;
        }
        $data['app_partner'] = $this->GetAPI($paytype, 'app_partner');
        $data['app_seller_email'] = $this->GetAPI($paytype, 'app_seller_email');
        $data['app_key'] = $this->GetAPI($paytype, 'app_key');
        $data['app_id'] = $this->GetAPI($paytype, 'app_id');
        $private_key_path = PATH_WEB . $this->ChangeStrType("app/system/pay/web/alipay_new/merchant_private_key_{$_M['lang']}.txt");
        $data['private_key'] = file_get_contents($private_key_path);
        $public_key_path = PATH_WEB . $this->ChangeStrType("app/system/pay/web/alipay_new/alipay_public_key_{$_M['lang']}.txt");
        $data['public_key'] = file_get_contents($public_key_path);

        require $this->show('app/alipay',$data);
        #require $this->template('own/alipay');
    }

    public function dosavealipay() {
        global $_M;
        $this->SetAPI($_M['form']['type'], 'app_partner', $_M['form']['app_partner']);
        $this->SetAPI($_M['form']['type'], 'app_seller_email', $_M['form']['app_seller_email']);
        $this->SetAPI($_M['form']['type'], 'app_key', $_M['form']['app_key']);
        $this->SetAPI($_M['form']['type'], 'app_id', $_M['form']['app_id']);
        $this->CreatPprivateKey($_M['form']['private_key']);
        $this->CreatPublicKey($_M['form']['public_key']);
        $paytype = $_M['form']['type'];
        $message = $_M['word']['jsok'];
        turnover("{$_M['url']['own_form']}a=doalipay", "{$message}");
    }
    /**
     * 支付宝商户密钥
     */
    protected function CreatPprivateKey($private_key)
    {
        global $_M;
        delfile("app/system/pay/web/alipay_new/merchant_private_key_{$_M['lang']}.txt");
        if(!$private_key){
            return;
        }
        $file = PATH_WEB . $this->ChangeStrType("app/system/pay/web/alipay_new/merchant_private_key_{$_M['lang']}.txt");
        file_put_contents($file, $private_key);
    }
    /**
     * 支付宝公钥
     */
    protected function CreatPublicKey($public_key)
    {
        global $_M;
        delfile("app/system/pay/web/alipay_new/alipay_public_key_{$_M['lang']}.txt");
        if(!$public_key){
            return;
        }
        $file = PATH_WEB . $this->ChangeStrType("app/system/pay/web/alipay_new/alipay_public_key_{$_M['lang']}.txt");
        file_put_contents($file, $public_key);
    }

    /*
     * 银联——网关支付接口  接口启用
     */
    public function dounionpay() {
        global $_M;
        nav::select_nav(3);
        $paytype = "4";

        $data = array();
        $data['paytype'] = $paytype;
        $data['merid'] = $this->GetAPI($paytype, 'merid');
        $data['sign_cert_path'] = $this->GetAPI($paytype, 'sign_cert_path');
        $data['sign_cert_pwd'] = $this->GetAPI($paytype, 'sign_cert_pwd');
        $data['encrypt_cert_path'] = $this->GetAPI($paytype, 'encrypt_cert_path');
        $data['unipay_test'] = $this->GetAPI($paytype, 'unipay_test');
        $data['log_level'] = $this->GetAPI($paytype, 'log_level');

        require $this->show('app/unionpay',$data);
        #require $this->template('own/unionpay');
    }

    public function dosaveunionpay() {
        global $_M;
        $unionpay_config['merid'] = $_M['form']['merid'];
        $unionpay_config['sign_cert_path'] = $_M['form']['sign_cert_path'];
        $unionpay_config['sign_cert_pwd'] = $_M['form']['sign_cert_pwd'];
        $unionpay_config['encrypt_cert_path'] = $_M['form']['encrypt_cert_path'];
        $unionpay_config['unipay_test'] = $_M['form']['unipay_test'];
        $unionpay_config['log_level'] = $_M['form']['log_level'];
        $this->SetAPI($_M['form']['type'], 'merid', $unionpay_config['merid']);
        $this->SetAPI($_M['form']['type'], 'sign_cert_path', $unionpay_config['sign_cert_path']);
        $this->SetAPI($_M['form']['type'], 'sign_cert_pwd', $unionpay_config['sign_cert_pwd']);
        $this->SetAPI($_M['form']['type'], 'encrypt_cert_path', $unionpay_config['encrypt_cert_path']);
        $this->SetAPI($_M['form']['type'], 'unipay_test', $unionpay_config['unipay_test']);
        $this->SetAPI($_M['form']['type'], 'log_level', $unionpay_config['log_level']);
        $this->CreatUnionPayConfig($unionpay_config);
        $paytype = $_M['form']['type'];
        $message = $_M['word']['jsok'];
        turnover("{$_M['url']['own_form']}a=dounionpay", "{$message}");
    }
    /**
     * 【银联】重写配置文件
     */
    protected function CreatUnionPayConfig($unionpay_config) {
        global $_M;
        $log_level = $unionpay_config['log_level'] ? 'PhpLog::DEBUG' : 'PhpLog::OFF';
        $file = PATH_WEB . $this->ChangeStrType("app/system/pay/web/unionpay/USERConfig_{$_M['lang']}.php");
        makefile($file);
        $myfile = fopen($file, "w") or die("Unable to open file!");
        $code = "<?php\n";
        fwrite($myfile, $code);
        $code = "const MERID_CONFIG = '{$unionpay_config['merid']}';\n";
        fwrite($myfile, $code);
        $code = "const SDK_SIGN_CERT_PWD = '{$unionpay_config['sign_cert_pwd']}';\n";
        fwrite($myfile, $code);
        $code = "const SDK_LOG_LEVEL = {$log_level};\n";
        fwrite($myfile, $code);
        $code = "const SDK_SIGN_CERT_PATH = '" . str_replace("\\", "/", PATH_WEB) . str_replace("\\", "/", substr($unionpay_config['sign_cert_path'], 3)) . "';\n";
        fwrite($myfile, $code);
        $code = "const SDK_ENCRYPT_CERT_PATH = '" . str_replace("\\", "/", PATH_WEB) . str_replace("\\", "/", substr($unionpay_config['encrypt_cert_path'], 3)) . "';\n";
        fwrite($myfile, $code);
        $code = "const SDK_VERIFY_CERT_DIR = '" . str_replace("\\", "/", PATH_WEB) . "upload/file/';\n";
        fwrite($myfile, $code);
        $code = "const SDK_FILE_DOWN_PATH = '" . str_replace("\\", "/", PATH_WEB) . "app/system/pay/web/unionpay/file/';\n";
        fwrite($myfile, $code);
        $code = "const SDK_LOG_FILE_PATH = '" . str_replace("\\", "/", PATH_WEB) . "app/system/pay/web/unionpay/logs/';\n";
        fwrite($myfile, $code);
        $code = "const SDK_FRONT_NOTIFY_URL = '" . $_M['url']['site'] . "pay/return.php';\n";
        fwrite($myfile, $code);
        $code = "const SDK_BACK_NOTIFY_URL = '" . $_M['url']['site'] . "pay/notify.php';\n";
        fwrite($myfile, $code);
        $code = "const UNIPAY_TEST = '{$unionpay_config['unipay_test']}';\n";
        fwrite($myfile, $code);
        $code = "?>";
        fwrite($myfile, $code);
        fclose($myfile);
    }

    /*
     * 银联——B2B付接口  接口启用
     */
    public function dounionpayb2b() {
        global $_M;
        nav::select_nav(3);
        $paytype = "9";

        $data = array();
        $data['paytype'] = $paytype;
        $data['merid_b2b'] = $this->GetAPI($paytype, 'merid_b2b');
        $data['sign_cert_path_b2b'] = $this->GetAPI($paytype, 'sign_cert_path_b2b');
        $data['sign_cert_pwd_b2b'] = $this->GetAPI($paytype, 'sign_cert_pwd_b2b');
        $data['encrypt_cert_path_b2b'] = $this->GetAPI($paytype, 'encrypt_cert_path_b2b');
        $data['unipay_test_b2b'] = $this->GetAPI($paytype, 'unipay_test_b2b');
        $data['log_level'] = $this->GetAPI($paytype, 'log_level');

        require $this->show('app/unionpayb2b',$data);
        #require $this->template('own/unionpayb2b');
    }
    public function dosaveunionpayb2b() {
        global $_M;
        $unionpay_config['merid_b2b'] = $_M['form']['merid_b2b'];
        $unionpay_config['sign_cert_path_b2b'] = $_M['form']['sign_cert_path_b2b'];
        $unionpay_config['sign_cert_pwd_b2b'] = $_M['form']['sign_cert_pwd_b2b'];
        $unionpay_config['encrypt_cert_path_b2b'] = $_M['form']['encrypt_cert_path_b2b'];
        $unionpay_config['unipay_test_b2b'] = $_M['form']['unipay_test_b2b'];
        $unionpay_config['log_level'] = $_M['form']['log_level'];
        $this->SetAPI($_M['form']['type'], 'merid_b2b', $unionpay_config['merid_b2b']);
        $this->SetAPI($_M['form']['type'], 'sign_cert_path_b2b', $unionpay_config['sign_cert_path_b2b']);
        $this->SetAPI($_M['form']['type'], 'sign_cert_pwd_b2b', $unionpay_config['sign_cert_pwd_b2b']);
        $this->SetAPI($_M['form']['type'], 'encrypt_cert_path_b2b', $unionpay_config['encrypt_cert_path_b2b']);
        $this->SetAPI($_M['form']['type'], 'unipay_test_b2b', $unionpay_config['unipay_test_b2b']);
        $this->SetAPI($_M['form']['type'], 'log_level_b2b', $unionpay_config['log_level_b2b']);
        $this->CreatUnionPayConfigb2b($unionpay_config);
        $paytype = $_M['form']['type'];
        $message = $_M['word']['jsok'];
        turnover("{$_M['url']['own_form']}a=dounionpayb2b", "{$message}");
    }
    /**
     * 【银联】重写配置文件
     */
    protected function CreatUnionPayConfigb2b($unionpay_config) {
        global $_M;
        $log_level = $unionpay_config['log_level_b2b'] ? 'PhpLog::DEBUG' : 'PhpLog::OFF';
        $file = PATH_WEB . $this->ChangeStrType("app/system/pay/web/unionpayb2b/USERConfig_{$_M['lang']}.php");
        makefile($file);
        $myfile = fopen($file, "w") or die("Unable to open file!");
        $code = "<?php\n";
        fwrite($myfile, $code);
        $code = "const MERID_CONFIG = '{$unionpay_config['merid_b2b']}';\n";
        fwrite($myfile, $code);
        $code = "const SDK_SIGN_CERT_PWD = '{$unionpay_config['sign_cert_pwd_b2b']}';\n";
        fwrite($myfile, $code);
        $code = "const SDK_LOG_LEVEL = {$log_level};\n";
        fwrite($myfile, $code);
        $code = "const SDK_SIGN_CERT_PATH = '" . str_replace("\\", "/", PATH_WEB) . str_replace("\\", "/", substr($unionpay_config['sign_cert_path_b2b'], 3)) . "';\n";
        fwrite($myfile, $code);
        $code = "const SDK_ENCRYPT_CERT_PATH = '" . str_replace("\\", "/", PATH_WEB) . str_replace("\\", "/", substr($unionpay_config['encrypt_cert_path_b2b'], 3)) . "';\n";
        fwrite($myfile, $code);
        $code = "const SDK_VERIFY_CERT_DIR = '" . str_replace("\\", "/", PATH_WEB) . "upload/file/';\n";
        fwrite($myfile, $code);
        $code = "const SDK_FILE_DOWN_PATH = '" . str_replace("\\", "/", PATH_WEB) . "app/system/pay/web/unionpayb2b/file/';\n";
        fwrite($myfile, $code);
        $code = "const SDK_LOG_FILE_PATH = '" . str_replace("\\", "/", PATH_WEB) . "app/system/pay/web/unionpayb2b/logs/';\n";
        fwrite($myfile, $code);
        $code = "const SDK_FRONT_NOTIFY_URL = '" . $_M['url']['site'] . "pay/return.php';\n";
        fwrite($myfile, $code);
        $code = "const SDK_BACK_NOTIFY_URL = '" . $_M['url']['site'] . "pay/notify.php';\n";
        fwrite($myfile, $code);
        $code = "const UNIPAY_TEST_B2B = '{$unionpay_config['unipay_test_b2b']}';\n";
        fwrite($myfile, $code);
        $code = "?>";
        fwrite($myfile, $code);
        fclose($myfile);
    }


    /*
    * 支付接口——PayPal
    */
    public function dopaypal() {
        global $_M;
        nav::select_nav(3);
        $paytype = "5";

        $paypal_config = $this->GetAPI($paytype, 'paypal_config');
        $paypal_config  = jsondecode($paypal_config);
        $paypal_config['paytype'] = 5;

        require $this->show('app/paypal',$paypal_config);
    }

    public function dosavepaypal() {
        global $_M;

        $paypal_config = array(
            'open'              =>$_M['form']['open'],
            'user'              =>$_M['form']['user'],
            'password'          =>$_M['form']['password'],
            'signature'         =>$_M['form']['signature'],
            'user_sandbox'      =>$_M['form']['user_sandbox'],
            'password_sandbox'  =>$_M['form']['password_sandbox'],
            'signature_sandbox' =>$_M['form']['signature_sandbox'],
            'paytype'           =>$_M['form']['type']
        );
        $this->SetAPI($paypal_config['paytype'], 'paypal_config', jsonencode($paypal_config));
        turnover("{$_M['url']['own_form']}a=dopaypal", "{$_M['word']['success']}");
    }

    /**
     * 网银在线——京东  【停用】
     */
    public function dojdpay() {
        global $_M;
        nav::select_nav(3);

        $query = pay_config_query('jdpay_config', $_M['form']['lang']);         //查询接口参数
        $jdpay_config  = jsondecode($query['value']);

        require $this->template('own/jdpay');
    }
    public function dosavejdpay() {
        global $_M;
        $jdpay_config = array(
            'jd_mid'            =>$_M['form']['jd_mid'],                        //商户编号
            'jd_key'            =>$_M['form']['jd_key'],                        //商户密钥
            'jd_payment_type'   =>$_M['form']['jd_payment_type'],               //收款支付类型
            //储蓄卡授权代码
            'banklist_cash'     =>"1025|1051|104|103|3407|3230|3080|313|314|309|305|312|307|311|310|3061|326|335|342|343|316|302|324|336|3341|344|317|401|402|403|404",
            //信用卡授权代码
            'banklist_credit'   =>"1027|1054|106|1031|3011|3231|308|3131|3141|3091|3051|3121|3071|3112|306|3261|303|3241|334|3101|4031",
            'paytype'           =>'7'
        );

        $query = pay_config_query('jdpay_config', $_M['form']['lang']);         //查询接口参数
        if($query)
        {
            pay_config_modify('jdpay_config', jsonencode($jdpay_config));       //修改接口参数
        }
        if(!$query)
        {
            pay_config_save('jdpay_config', jsonencode($jdpay_config));         //存储接口参数JSON格式数据
        }

        turnover("{$_M['url']['own_form']}a=dojdpay", "{$_M['word']['success']}");
    }



    /**
     * 支付接口参数设定
     */
    public function SetAPI($type, $name, $value) {
        global $_M;
        $table = $_M['config']['tablepre'] . 'pay_api';
        $query = "SELECT id FROM {$table} WHERE name='{$name}'AND paytype='{$type}' AND lang='{$_M['lang']}';";
        $array = DB::get_one($query);
        if (!$array && $type && $name && $value != '') {
            $query = "INSERT INTO {$table} SET name='{$name}',paytype='{$type}',value='{$value}', lang='{$_M['lang']}';";
            DB::query($query);
            $result = "Save Success!";
        } else if ($array && $type && $name ) {
            $query = "UPDATE {$table} SET value='{$value}' WHERE  name='{$name}'AND paytype='{$type}' AND lang='{$_M['lang']}';";
            DB::query($query);
            $result = "Update Success!";
        } else {
            $result = "Fail!";
        }
        return $result;
    }

    /**
     * 支付接口参数获取
     */
    protected function GetAPI($type, $name) {
        global $_M;
        if ($type && $name) {
            $table = $_M['config']['tablepre'] . 'pay_api';
            $query = "SELECT value FROM {$table} WHERE name='{$name}'AND paytype='{$type}' AND lang='{$_M['lang']}';";
            $arr = DB::get_one($query);
            $value = $arr['value'];
        } else {
            $value = 'Fail!';
        }
        return $value;
    }
    /**
     * 支付插件参数配置
     */
    protected function SetPaymentConfig($name, $value) {
        global $_M;
        $table = $_M['config']['tablepre'] . 'pay_config';
        $query = "SELECT id FROM {$table} WHERE name='{$name}' AND lang='{$_M['lang']}' AND lang='{$_M['lang']}';";
        $array = DB::get_one($query);
        if (!$array && $name && $value != '') {
            $query = "INSERT INTO {$table} SET name='{$name}',value='{$value}',mobile_value='0',columnid='0',flashid='0',lang='{$_M['lang']}'";
            DB::query($query);
            $result = "Save Success!";
        } else if ($array && $name ) {
            $query = "UPDATE {$table} SET value='{$value}' WHERE  name='{$name}' AND lang='{$_M['lang']}'";
            DB::query($query);
            $result = "Update Success!";
        } else {
            $result = "Fail!";
        }
        return $result;
    }

    /**
     * 支付插件参数获取
     */
    protected function GetPaymentConfig($name) {
        global $_M;
        if ($name != '') {
            $table = $_M['config']['tablepre'] . 'pay_config';
            $query = "SELECT value FROM {$table} WHERE name='{$name}' and lang='{$_M['lang']}'";
            $arr = DB::get_one($query);
            $value = $arr['value'];
        } else {
            $value = 'Fail!';
        }
        return $value;
    }

    /*
     *功能   根据服务器系统类型判断更改字符串编码类型
     */
    public function ChangeStrType($str) {
        global $_M;
        $system = php_uname('s');
        if(is_strinclude($system,'win')) {
            $str = str_replace('/', '\\', $str);
            $str = iconv("UTF-8", "GBK", $str);	//WINDOWS系统下 文件名转码，解决中文名UTF-8编码无法删除的问题
        }
        return $str;
    }
}

?>