<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::sys_class('app');

class set extends app {
    public $appno;

	public function __construct() {
		parent::__construct();
        $this->appno = 10043;
		global $_M;
	}

    public function doindex(){
        global $_M;
        $this->input['logistics_disabled']=$this->check_express_number()?'':' disabled';
        $this->input['express_number']=$this->check_express_number();
        require_once $this->show('app/set',$this->input);
    }

	public function doset_pay(){
		global $_M;
		require_once $this->show('app/set_pay');
	}

	public function doremind_admin(){
		global $_M;
		require_once $this->show('app/remind_admin');
	}

	public function doremind_user(){
		global $_M;
		require_once $this->show('app/remind_user');
	}

	public function dobuy(){
		global $_M;
		$url = $_M['url']['app_api']."a=domember_obtain&user_key={$_M['config']['met_secret_key']}";
		$user = json_decode(file_get_contents($url),true);
		if(isset($user['error'])){
			header("location:{$_M['url']['own_form']}a=dologin");die;
		}else{
			$url_fai = "{$_M['url']['own_form']}a=dologin";
            $this->input['url_sec_login'] = urlencode($url_fai);
			require_once $this->show('app/set_buy',$this->input);
		}
	}

	public function dologin()
	{
		global $_M;
        $this->input['url_sec'] = "{$_M['url']['own_form']}a=doset_login";
        $this->input['url_fai'] = "{$_M['url']['own_form']}a=dobuy";

		require_once $this->show('app/set_login',$this->input);
	}

	public function doset_login() {
		global $_M;
		if($_M['form']['key']) {
			$query = "UPDATE {$_M['table']['config']} SET value='{$_M['form']['key']}' WHERE  name='met_secret_key' and lang = 'metinfo'";
			$result = DB::query($query);
			turnover($_M['url']['own_form']."a=dobuy");
		}

	}

	public function dopay(){
		global $_M;
		$url = $_M['url']['api'] ."n=shop&c=exp&a=dobuy";
		$express_key = $_M['config']['shopv2_express_key'] ? $_M['config']['shopv2_express_key'] : "";
		$post = array('express_key'=>$express_key,'user_key'=>$_M['config']['met_secret_key'],'type'=>$_M['form']['type']);
		$data = $this->curl($url,$post);

		if($data['status'] == 1) {
			load::own_class('web/class/web_express', 'new')->create_express_key(trim($data['msg']));
			$this->ajax_success($_M['word']['app_shop_order_buyok']);
		}else{
			$this->ajax_error($data['msg']);
		}
	}

	public function check_express_number()
	{
		global $_M;
		$url = $_M['url']['api'] ."n=shop&c=exp&a=docheck";
		$post = array('express_key'=>$_M['config']['shopv2_express_key'],'user_key'=>$_M['config']['met_secret_key']);
		$data = $this->curl($url,$post);
		if($data['status'] == 1){
			return $data['msg'];
		}else{
			return 0;
		}
	}

	public function doeditor(){
		global $_M;
		$a = '';
		if($_M['form']['action'] == 'pay'){
			$configlist = array();
			$_M['form']['shopv2_onlinepay'] 	= $_M['form']['shopv2_onlinepay']?$_M['form']['shopv2_onlinepay']:0;
			$_M['form']['shopv2_deliverypay'] 	= $_M['form']['shopv2_deliverypay']?$_M['form']['shopv2_deliverypay']:0;
			$configlist[] = 'shopv2_onlinepay';
			$configlist[] = 'shopv2_deliverypay';
		}

		if($_M['form']['action'] == 'remind_admin'){
			$configlist = array();
			$configlist[] = 'shopv2_adminemail';
			$configlist[] = 'shopv2_admintel';
		}

		if($_M['form']['action'] == 'doremind_user'){
			$configlist = array();
			if($_M['form']['shopv2_is_uemailv1'] != 1)$_M['form']['shopv2_is_uemailv1'] = 0;
			if($_M['form']['shopv2_is_uemailv2'] != 1)$_M['form']['shopv2_is_uemailv2'] = 0;
			if($_M['form']['shopv2_is_uemailv3'] != 1)$_M['form']['shopv2_is_uemailv3'] = 0;
			if($_M['form']['shopv2_is_usmsv1'] != 1)$_M['form']['shopv2_is_usmsv1'] = 0;
			if($_M['form']['shopv2_is_usmsv2'] != 1)$_M['form']['shopv2_is_usmsv2'] = 0;
			if($_M['form']['shopv2_is_usmsv3'] != 1)$_M['form']['shopv2_is_usmsv3'] = 0;

			$configlist[] = 'shopv2_is_uemailv1';
			$configlist[] = 'shopv2_is_uemailv2';
			$configlist[] = 'shopv2_is_uemailv3';
			$configlist[] = 'shopv2_is_usmsv1';
			$configlist[] = 'shopv2_is_usmsv2';
			$configlist[] = 'shopv2_is_usmsv3';

			$configlist[] = 'shopv2_usmsv1';
			$configlist[] = 'shopv2_uemailtv1';
			$configlist[] = 'shopv2_uemailcv1';
			$configlist[] = 'shopv2_usmsv2';
			$configlist[] = 'shopv2_uemailtv2';
			$configlist[] = 'shopv2_uemailcv2';
			$configlist[] = 'shopv2_usmsv3';
			$configlist[] = 'shopv2_uemailtv3';
			$configlist[] = 'shopv2_uemailcv3';
		}

		if($_M['form']['action'] == 'set') {
            $configlist = array();
            $configlist[] = 'shopv2_open';
            $configlist[] = 'shopv2_order_end';
            if ($_M['form']['shopv2_open'] == 1) {
                //开启插件和用户中心左侧导航栏
                $query = "UPDATE {$_M['table']['app_plugin']} SET effect=1 WHERE m_name = 'shop'";
                DB::query($query);
                $query = "UPDATE {$_M['table']['ifmember_left']} SET effect=1 WHERE no = '{$this->appno}' AND lang = '{$_M['lang']}'";
                DB::query($query);
                $query = "SELECT * FROM {$_M['table']['product']} WHERE lang='{$_M['lang']}'";
                $result = DB::query($query);
                while ($list = DB::fetch_array($result)) {
                    if (!load::own_class('admin/class/sys_goods', 'new')->get_product($list['id'])) {
                        load::own_class('admin/class/sys_goods', 'new')->insert_product_sql($list['id'], '', 0, 0, 1, 0, 0, 0, 0, 0, '', 1, 0);
                    }
                }
            } else {
                //关闭插件和用户中心左侧导航栏
                $_M['form']['shopv2_open'] = 0;
                $query = "UPDATE {$_M['table']['app_plugin']} SET effect=1 WHERE m_name = 'shop'";
                DB::query($query);
                $query = "UPDATE {$_M['table']['ifmember_left']} SET effect=0 WHERE no = '{$this->appno}' AND lang = '{$_M['lang']}'";
                DB::query($query);
            }


            $_M['form']['shopv2_gi'] = $_M['form']['shopv2_gi'] ? $_M['form']['shopv2_gi'] : 0;
            //$_M['form']['shopv2_vat'] 		= $_M['form']['shopv2_vat']?$_M['form']['shopv2_vat']:0;
            $_M['form']['shopv2_invoice'] = str_replace(" ", "", $_M['form']['shopv2_invoice']);
            $configlist[] = 'shopv2_gi';
            $configlist[] = 'shopv2_vat';
            $configlist[] = 'shopv2_ei';
            $configlist[] = 'shopv2_invoice';
            /*
            $configlist[] = 'shopv2_invoice_freight_type';
            $_M['form']['shopv2_invoice_freight_type'] = $_M['form']['freight_type'];
            $configlist[] = 'shopv2_invoice_freight';
            $_M['form']['shopv2_invoice_freight'] = $_M['form']['freight'];
            $configlist[] = 'shopv2_invoice_freight_mould';
            $_M['form']['shopv2_invoice_freight_mould'] = $_M['form']['freight_mould'];
            */

            $_M['form']['shopv2_para'] = $_M['form']['shopv2_para'] ? $_M['form']['shopv2_para'] : 0;
            $_M['form']['shopv2_logistics_open'] = $_M['form']['shopv2_logistics_open'] ? $_M['form']['shopv2_logistics_open'] : 0;
            $_M['form']['shopv2_guest_open'] = $_M['form']['shopv2_guest_open'] ? $_M['form']['shopv2_guest_open'] : 0;
            $_M['form']['shopv2_price_refund'] = $_M['form']['shopv2_price_refund'] ? $_M['form']['shopv2_price_refund'] : 0;
            $_M['form']['shopv2_return_goods'] = $_M['form']['shopv2_return_goods'] ? $_M['form']['shopv2_return_goods'] : 0;
            $_M['form']['shopv2_stock_type'] = $_M['form']['shopv2_stock_type'] ? $_M['form']['shopv2_stock_type'] : 0;
            $_M['form']['shopv2_order_auto_close'] = $_M['form']['shopv2_order_auto_close'] ? $_M['form']['shopv2_order_auto_close'] : 0;
            $_M['form']['shopv2_order_auto_ok'] = $_M['form']['shopv2_order_auto_ok'] ? $_M['form']['shopv2_order_auto_ok'] : 0;
            $_M['form']['shopv2_order_auto_del'] = $_M['form']['shopv2_order_auto_del'] ? $_M['form']['shopv2_order_auto_del'] : 0;
            $configlist[] = 'shopv2_logistics_open';
            $configlist[] = 'shopv2_guest_open';
            $configlist[] = 'shopv2_order_auto_close';
            $configlist[] = 'shopv2_order_auto_close_time';
            $configlist[] = 'shopv2_order_auto_ok';
            $configlist[] = 'shopv2_order_auto_ok_time';
            $configlist[] = 'shopv2_order_auto_del';
            $configlist[] = 'shopv2_order_del_ok_time';
            $configlist[] = 'shopv2_price_str_prefix';
            $configlist[] = 'shopv2_price_str_suffix';
            $configlist[] = 'shopv2_recommend';
            $configlist[] = 'shopv2_recommend_order';
            $configlist[] = 'shopv2_recommend_num';
            $configlist[] = 'shopv2_moregoods';
            $configlist[] = 'shopv2_moregoods_order';
            $configlist[] = 'shopv2_moregoods_num';
            $configlist[] = 'shopv2_order_auto_del_time';
            $configlist[] = 'shopv2_price_refund';
            $configlist[] = 'shopv2_return_goods';
            $configlist[] = 'shopv2_price_reason';
            $configlist[] = 'shopv2_stock_type';
            $configlist[] = 'shopv2_refund_tips';
            $configlist[] = 'shopv2_refund_reason';
            $configlist[] = 'shopv2_para';
        }

		appconfigsave($configlist,$this->appno);/*保存系统配置*/
		setcookie("TestCookie",implode(',',$configlist));
		$this->ajax_success($_M['word']['app_shop_saveok']);
	}

	public function curl($url,$post)
	{
		global $_M;
		$curlHandle = curl_init();
		curl_setopt($curlHandle, CURLOPT_URL, $url);
		curl_setopt($curlHandle, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
		curl_setopt($curlHandle, CURLOPT_REFERER, $_M['config']['met_weburl']);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT, 5);
		curl_setopt($curlHandle, CURLOPT_POST, 1);
		curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $post);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, FALSE);
		$result = curl_exec($curlHandle);
		curl_close($curlHandle);
		return json_decode($result,true);
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
}
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>