<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved. 

defined('IN_MET') or exit('No permission');

load::sys_func('array');

class web_cart {

	public $lang;
	public $user;
	public $action;
	public $cookie_cart;
    public $web_goods;
    public $web_func;

	public function __construct() {
		global $_M;
		$this->lang = $_M['lang'];
		$this->user = get_met_cookie('id');
		$this->cookie_cart = $this->cart_cookie_list() ? : array();

        $this->web_goods = load::own_class('web/class/web_goods', 'new');
        $this->web_func = load::own_class('web/class/web_func', 'new');
		
	}
	
	public function json_cart_list($where, $order){
		global $_M;
		if(!get_met_cookie('id')) {

			$data =  $this->cart_cookie_list();
		}else{
			$this->table = load::sys_class('tabledata', 'new');
			$where = "lang = '{$this->lang}' {$where}";
			$query = "SELECT * FROM {$_M['table']['shopv2_cart']} WHERE {$where} {$order}";
			$data = DB::get_all($query);
		}
        $data = $this->analysis_array($data);
        return $data;
	}
	
	public function cart_list(){
		global $_M;
		if(!get_met_cookie('id')) {
			return $this->cart_cookie_list();
		}
		$where = "WHERE lang = '{$this->lang}' AND uid = '{$this->user}'";
		if(!$order)$order = "ORDER BY id ASC";
		$query = "SELECT * FROM {$_M['table']['shopv2_cart']} {$where} {$order}";
		return DB::get_all($query);
	}
	
	public function json_return($data){
		$this->table->rdata($data);
	}
	
	public function analysis_array($data){
		foreach($data as $key=>$val){
			$data[$key] = $this->analysis($val);
		}
		return $data;
	}
	
	/*public function get_para_img($pid,$para_str)
	{
		global $_M;
		$query = "SELECT para_img FROM {$_M['table']['shopv2_plist']} WHERE pid = {$pid} AND valuelist = '{$para_str}'";
		return DB::get_one($query);
	}*/

    public function get_para_img($pid, $valuelist)
    {
        global $_M;
        $splist = $this->get_splist($pid, $valuelist);
        return $splist['para_img'];
    }

    public function get_splist($pid, $valuelist)
    {
        global $_M;
        $splist = $this->web_goods->get_splist_by_spec($pid, $valuelist);
        return $splist;
    }

    public function get_spec_valuelist($valuelist)
    {
        global $_M;
        $spec_valuelist = $this->web_goods->analysis_spec_valuelist($valuelist);
        return $spec_valuelist;
    }

	public function analysis($data){
		global $_M;
		$goods = $this->web_goods->get_goods_by_pid($data['pid'], 1, 0, 1, 1);
		$data['purchase'] 		= 	$goods['purchase'] ? : 0;
		$data['freight'] 		= 	$goods['freight'] ;
		$data['lnvoice'] 		= 	$goods['lnvoice'] ;
		$data['freight_mould']  = 	$goods['freight_mould'] ;
		$data['auto_sent']      = 	$goods['auto_sent'] ;
		$data['name'] 			= 	$goods['title'];
		//临时处理URL
		$data['url'] 			= 	$this->web_goods->get_show_product_url($data['pid'], $goods['class1']);
		//新规格处理方式

		/*if($data['para_str']){
			//$plist 			= 	$web_goods->get_plist_by_para($data['pid'], $data['para_str']); //老
			$splist 			= 	$web_goods->get_splist_by_spec($data['pid'], $data['para_str']);
			$data['price']      = 	$splist['price'];
		}

        $para = $this->get_para_img($goods['id'],$data['para_str']);
        if($para && $para['para_img'] != ''){
            $data['img'] = $_M['url']['site'].str_replace('../', '', $para['para_img']);
        }else{
            $data['img'] 			= 	$_M['url']['site'].str_replace('../', '', $goods['imgurl']);
        }
		*/

        if($data['para_str']){
            $valuelist = explode(',',$data['para_str']);
            $splist 		= 	$this->get_splist($data['pid'], $valuelist);
            $data['price']  = 	$splist['price'];
            $data['spec_valuelist'] = $this->get_spec_valuelist($valuelist);
            $data['splist_value_str'] = $this->web_goods->get_spec_valuelist_str($data['spec_valuelist']);;
        }else{
            $data['splist_value_str'] = '';
            $data['price']  = 	$goods['price'];
		}
        if($splist && $splist['para_img'] != ''){
            $data['img'] = $_M['url']['site'].str_replace('../', '', $splist['para_img']);
        }else{
            $data['img'] = 	$_M['url']['site'].str_replace('../', '', $goods['imgurl']);
        }

		$data['price_str']  = 	$this->web_func->price_str($data['price']);
		$data['subtotal']   = 	$this->web_func->price_str($data['price'] * $data['amount']);
		$data['logistic']   = 	$goods['logistic'];
		$info['pid'] 		=   $data['pid'];
        $info['para_str']   =   $data['para_str'] ? explode(',', $data['para_str']) : null;
        $info['amount'] 	=   $data['amount'];
		$stock = $this->web_goods->stock_list($info, $goods);
		$data['buy_ok'] = $stock['buy_ok'];
		$data['stock']  = $stock['stock'];
		$message = $goods['message'] ? jsondecode($goods['message']) : '';
		$data['message'] = $message;
		$data['message_html'] = '<div class="p-message form-horizontal">';
		foreach($message as $key => $val){
			$val['required'] = $val['required'] ? 'required' : '';
			if($val['line']){
				$data['message_html'] .= "
					<div class=\"form-group\">
						<div class=\"col-sm-12 {$val['required']}\">
							<textarea class=\"form-control\" rows=\"3\" name=\"msg_{$data['id']}_{$goods['pid']}_{$key}\" placeholder=\"{$val[name]}\"></textarea>
						</div>
					</div>";
			}else{
				$data['message_html'] .= "
				<div class=\"form-group\">
					<div class=\"col-sm-12 {$val['required']}\">
						<input placeholder=\"{$val[name]}\" class=\"form-control\" name=\"msg_{$data['id']}_{$goods['pid']}_{$key}\">
					</div>
				</div>";
			}
		}
		$data['message_html'] .= '</div>';
        #dump($data);
        return $data;
	}
	
	public function save_cart($info){
		global $_M;
		if(!$_M['user']) {
			return $this->save_cookie_cart($info);
		}
		$this->user = $_M['user']['id'];
		$keys = $this->save_cart_key();
		$sql = '';
		
		foreach($keys as $key=>$val){
			if(isset($info[$val]) && $val!='id')$sql .= "{$val}='{$info[$val]}',";
		}
		$sql = trim($sql, ',');
		if($info['id']){
				$query = "UPDATE  {$_M['table']['shopv2_cart']} SET {$sql} WHERE id='{$info['id']}' AND uid = '{$this->user}'";
				DB::query($query);
				return $info['id'];
		} else {
				if($info['amount'] && $info['pid']){
					$query = "INSERT INTO {$_M['table']['shopv2_cart']} SET {$sql},uid = '{$this->user}',lang = '{$this->lang}'";
					DB::query($query);
					return DB::insert_id();
				}
		}
	}

	public function save_cart_key(){
		return array('para_str', 'amount', 'pid');
	}
		
	public function del_cart($id){
		global $_M;
		if(!get_met_cookie('id')){
			return $this->del_cookie_cart($id);
		}
		$query = "DELETE  FROM {$_M['table']['shopv2_cart']} WHERE id = '{$id}'";
		return DB::query($query);
	}
	
	public function get_cart_by_para($pid, $para_str){
		global $_M;
		if(!get_met_cookie('id')) {
			return $this->get_cookie_cart_by_para($pid,$para_str);
		}
		$query = "SELECT * FROM {$_M['table']['shopv2_cart']} WHERE pid = '{$pid}' AND para_str = '{$para_str}' AND uid = '{$this->user}' AND lang = '{$this->lang}'";
		return DB::get_one($query);
	}

	public function get_total_by_pid($pid)
	{
		global $_M;
		if(!get_met_cookie('id')) {
			return $this->get_cookie_total_by_pid($pid);
		}

		$query = "SELECT sum(amount) as total FROM {$_M['table']['shopv2_cart']} WHERE pid = '{$pid}' AND uid = '{$this->user}' AND lang = '{$this->lang}'";
		$res = DB::get_one($query);
		if($res){
			return $res['total'];
		}else{
			return false;
		}
	}
	
	public function get_cookie_total_by_pid($pid)
	{
		global $_M;
		$total = 0;
		foreach ($this->cookie_cart as $key => $v) {
 			if($v['pid'] == $pid) {
				$total += $v['amount'];
			}
		}
		return $total;
	}
	public function get_cart_by_id($id){
		global $_M;
		if(!get_met_cookie('id')) {
			return $this->get_cookie_cart_by_id($id);
		}
		$query = "SELECT * FROM {$_M['table']['shopv2_cart']} WHERE id = '{$id}' AND uid = '{$this->user}' AND lang = '{$this->lang}'";
		return DB::get_one($query);
	}
	
	public function tocrat($pid, $para_str, $amount){
		if(!get_met_cookie('id')) {
			return $this->to_cookie_crat($pid, $para_str, $amount);
		}
		if($amount < 0){
			$amount = 1;
		}
		$goods = $this->get_cart_by_para($pid, $para_str);
		if($goods){
			$info['id'] = $goods['id'];
			$info['amount'] = $amount + $goods['amount'];
			return $this->save_cart($info);
		}else{
			$info['pid'] = $pid;
			$info['para_str'] = $para_str;
			$info['amount'] = $amount;
			return $this->save_cart($info);
		}

	}
	
	public function clear_cart($cidlist){
		global $_M;
		$cid = str_replace('-', ',', $cidlist);

		if(!get_met_cookie('id')) {
			return setcookie('cart',"",time()-3600,'/');
		}

		$query = "DELETE FROM {$_M['table']['shopv2_cart']} WHERE uid = '{$this->user}' AND id in({$cid}) AND lang = '{$this->lang}'";
		return DB::query($query);
	}


	public function cart_cookie_list()
	{
        //json_dencode 报错
		global $_M;
        $cart = base64_decode($_COOKIE['cart']);
        return(json_decode($cart,TRUE)) ;
	}

	public function save_cookie_cart($info)
	{
		global $_M;
		if($info['id'] || is_numeric($info['id'])) {

			foreach ($this->cookie_cart as $key => $v) {
				if($v['id'] == $info['id'])
				{
					$this->cookie_cart[$key]['amount'] = $info['amount'];
				}
			}

            #
			$this->set_cookie('cart',$this->cookie_cart);
			return $info['id'];
		}else{
			$info['id'] = count($this->cookie_cart) == 0 ? 0 : count($this->cookie_cart)+1;

			$cid = array_push($this->cookie_cart, $info);

			$this->set_cookie('cart',$this->cookie_cart);
			return $info['id'];
		}
	}

	public function get_cookie_cart_by_para($pid,$para)
	{
		foreach ($this->cookie_cart as $key => $v) {
 			if($v['pid'] == $pid && $v['para_str'] == $para) {
				return $v;
			}
		}
	}

	public function get_cookie_cart_by_id($id)
	{
		foreach ($this->cookie_cart as $key => $v) {
			if($v['id'] == $id) {
				return $v;
			}
		}
	}

	public function to_cookie_crat($pid, $para_str, $amount){

		if($amount < 0){
			$amount = 1;
		}
		$goods = $this->get_cookie_cart_by_para($pid, $para_str);

		if($goods){
			$info['id'] = $goods['id'];
			$info['amount'] = $amount + $goods['amount'];
			return $this->save_cookie_cart($info);
		}else{
			$info['pid'] = $pid;
			$info['para_str'] = $para_str;
			$info['amount'] = $amount;
			return $this->save_cookie_cart($info);
		}

	}

	public function del_cookie_cart($id){
		global $_M;

		$cart = array();
		foreach ($this->cookie_cart as $key => $v) {
			
			if($v['id'] != $id) {
				$cart[] = $v;
			}
		}
		if(empty($cart)){
			setcookie('cart','',time()-3600,'/');
		}else{
			$this->set_cookie('cart',$cart);
		}
		
	}

	public function set_cookie($name,$data)
	{
		global $_M;
		if(empty($data) || !is_array($data)) {
			return false;
		}
        $cart = json_encode($data);
        $cart = base64_encode($cart);
		setcookie($name,$cart,time()+3600*24*30,'/');
		return $data;
	}

	

	public function move_cookie($uid) {
		global $_M;
		$cart = $this->cart_cookie_list();

		$cidlist = "";
		foreach ($cart as $key => $v) {
			unset($v['id']);
			$cid = $this->save_cart($v);
			$cidlist.= $cid."-";
		}
		setcookie('cart',"",time()-3600,'/');
		return $cidlist;
	}

}
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>