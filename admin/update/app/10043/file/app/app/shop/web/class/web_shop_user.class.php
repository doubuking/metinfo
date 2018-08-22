<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved. 

defined('IN_MET') or exit('No permission');

class web_shop_user {
	public $errorcode;
	public function __construct() {
		global $_M;
		$this->lang = $_M['lang'];
	}
	
	/*public function modify_user_balance($type, $username, $price){
		global $_M;
		$shop_user = $this->get_user_by_username($username);
		if(!$shop_user){
			$this->errorcode = 'nouser';
			return false;
		}
		if($type == 1){
			$shop_user['balance'] = $shop_user['balance'] + $price;
		}else{
			if($shop_user['balance'] >= $price){
				$shop_user['balance'] = $shop_user['balance'] - $price;
			}else{
				$this->errorcode = 'nobalance';
				return false;
			}
		}
		$query = "UPDATE {$_M['table']['shopv2_user']} SET balance='{$shop_user['balance']}' WHERE username='{$username}' AND lang='{$_M['lang']}'";
		DB::query($query);
		return $shop_user['balance'];
	}*/
	
	public function change_goods_list($uid, $goods){
		global $_M;
		$shop_user = $this->get_user_by_uid($uid);
		$cart_list = array();
		foreach($goods as $key=>$val){
			$cart_list[$val['pid']] += $val['pamount'];
		}
		$goods_list = jsondecode($shop_user['goods_list']);
		foreach($cart_list as $key=>$val){
			$goods_list[$key] = $goods_list[$key] + $val;
		}
		if($goods_list)$goods_string = jsonencode($goods_list);
		
		$query = "UPDATE {$_M['table']['shopv2_user']} SET goods_list='{$goods_string}' WHERE uid='{$uid}' AND lang='{$_M['lang']}'";
		DB::query($query);
	}
	
	public function get_user_goods_list($uid){
		global $_M;
		$shop_user = $this->get_user_by_uid($uid);
		return jsondecode($shop_user['goods_list']);
	}
	
	public function get_user_by_username($username){
		global $_M;
		$query = "SELECT * FROM {$_M['table']['shopv2_user']} WHERE username='{$username}' AND lang='{$_M['lang']}'";
		$shop_user = DB::get_one($query);
        $balance = load::mod_class('pay/web/finance','new')->getBalance($_M['user']);
        $shop_user['balance'] = $balance['balance'];
		if(!$shop_user){
			$user = load::sys_class('user', 'new')->get_user_by_username($username);
			if($user){
				$query = "INSERT INTO {$_M['table']['shopv2_user']} SET uid='{$user[id]}',username='{$username}',balance='0',lang='{$_M['lang']}'";
				DB::query($query);
				$shop_user['uid'] = $user['id'];
				$shop_user['username'] = $username;
				$shop_user['goods_list'] = '';
				$shop_user['balance'] = 0;
			}else{
				$this->errorcode = 'nouser';
				return false;
			}
		}
		return $shop_user;
	}
	
	public function get_user_by_uid($uid){
	    global $_M;
		$query = "SELECT * FROM {$_M['table']['shopv2_user']} WHERE uid='{$uid}' AND lang='{$_M['lang']}'";
        $balance = load::mod_class('pay/web/finance','new')->getBalance($_M['user']);
        $shop_user['balance'] = $balance['balance'];
		if(!$shop_user){
			$user = load::sys_class('user', 'new')->get_user_by_id($uid);
			if($user){
				$query = "INSERT INTO {$_M['table']['shopv2_user']} SET uid='{$user[id]}',username='{$user['username']}',balance='0',lang='{$_M['lang']}'";
				DB::query($query);
				$shop_user['uid'] = $user['id'];
				$shop_user['username'] = $user['username'];
				$shop_user['goods_list'] = '';
				$shop_user['balance'] = 0;
			}else{
				$this->errorcode = 'nouser';
				return false;
			}
		}
		return $shop_user;
	}

	public function reg_guest($info) {
		global $_M;
		$session = load::sys_class('session', 'new');

		$user = load::sys_class('user', 'new');

		if(!$session->get('generate_user')){
			
			$username = "yk".mt_rand(10000000,99999999);
			$chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
			$password ="";
			for ( $i = 0; $i < 8; $i++ )  {  
				$password .= substr($chars, mt_rand(0, strlen($chars)-1), 1);  
			} 

			$uid = $user->register($username, $password, "", '', "", 1, 1, 'cookie');
			$session->set('generate_user',array('username'=>$username,'password'=>$password,'uid'=>$uid));
			$user->login_by_password($username,$password);
			return $uid;
		}else{
			$cur_user = $session->get('generate_user');

			$user->login_by_password($cur_user['username'],$cur_user['password']);
			return $cur_user['uid'];
		}
		
	}
}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>