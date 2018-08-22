<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');


class web_favorite {

	public $uid;
	public $lang;
	public function __construct() {
		global $_M;
		$this->uid = get_met_cookie('id');
		$this->lang = $_M['lang'];
	}
	public function add_delete_favorite($pid) {
		global $_M;
		$time = time();
		$data = array();
		$data['code'] = 0;
		$has = $this->is_favorite($pid);
		if(!$this->uid) {
				$data['msg'] = $_M['word']['please_login'];
				return $data;
			}
		if($has){//如果存在 取消收藏
			$query = "DELETE FROM {$_M['table']['shopv2_favorite']} WHERE id = {$has['id']}";
			DB::query($query);
			$data['msg'] = $_M['word']['app_shop_cancel'].$_M['word']['app_shop_favorite_ok'];
			$data['code'] = 1;
			return $data;
		}
		if(load::own_class('web/class/web_goods', 'new')->get_goods_by_pid($pid, 1, 0, 1, 0)) { //有没有此产品 有就加入收藏
			$query = "INSERT INTO {$_M['table']['shopv2_favorite']} SET uid = {$this->uid},pid = {$pid}, lang='{$this->lang}',addtime = {$time}";

			if(DB::query($query)) {
				$data['msg'] = $_M['word']['app_shop_favorite_ok'];//收藏成功
				$data['code'] = 1;
				return $data;
			}else{
				$data['msg'] = $_M['word']['app_shop_favorite_fail'];
				return $data;
			}
		}

		$data['msg'] = $_M['word']['app_shop_error'];
		return $data;

	}



	public function is_favorite($pid) {
		global $_M;
		$query = "SELECT * FROM {$_M['table']['shopv2_favorite']} WHERE uid = {$this->uid} AND pid = {$pid} AND lang = '{$this->lang}'";
		return DB::get_one($query);
	}

	public function list_favorite()
	{
		global $_M;
		$query = "SELECT * FROM {$_M['table']['shopv2_favorite']} WHERE uid = {$this->uid} AND lang = '{$this->lang}'";
		$favorites = DB::get_all($query);
		$data = array();
		foreach ($favorites as $key => $v) {
			$goods = load::own_class('web/class/web_goods', 'new')->get_goods_by_pid($v['pid'], 1, 0, 1, 0);

			$data[$key] = $v;
			$data[$key]['img'] = $goods['imgurl'];
			$data[$key]['title'] = $goods['title'];
			$data[$key]['price'] = load::own_class('web/class/web_func', 'new')->price_str($goods['price']);
			$data[$key]['url'] = load::own_class('web/class/web_goods', 'new')->get_show_product_url($goods['id'], $goods['class1']);
		}
		return $data;
	}
}