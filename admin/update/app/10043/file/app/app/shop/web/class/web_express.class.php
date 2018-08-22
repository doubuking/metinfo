<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved. 

defined('IN_MET') or exit('No permission');
/**
 * 物流信息查询
 */
class web_express {

	/**
	 * 后台订单或前台订单调用此方法
	 * @DateTime 2017-03-09
	 * @param  string  $order_id 订单号
	 * @param  string  $tracking_no 快递单号
	 * @return string  返回快递单跟踪信息
	 */
	public function get($order_id, $tracking_no) {
		global $_M;
		if(!$_M['config']['shopv2_logistics_open']) {
			return json_encode(array('msg' => urlencode($_M['word']['app_shop_express_noopen']), 'status'=>200));
		}
		if(!$data = $this->get_local($tracking_no)) {
			return  $this->add($order_id, $tracking_no);
		}
		if(time() - $data['updatetime'] > 3600) {
			return  $this->update($tracking_no);
		}
		return $data['information'];
	}

	/**
	 * 获取本地缓存数据库的物流信息
	 * @DateTime 2017-03-09
	 * @param   string  $tracking_no 快递单号
	 * @return  array | boolean	当前物流单号的数据
	 */
	public function get_local($tracking_no) {
		global $_M;
		$query = "SELECT * FROM {$_M['table']['shopv2_tracking']} WHERE tracking_no = '{$tracking_no}'";
		return DB::get_one($query);
	}

	/**
	 * 获取线上最新物流信息
	 * @DateTime 2017-03-09
	 * @param   string  $tracking_no 快递单号
	 * @return  string	当前物流单号线上的数据
	 */
	public function get_online($tracking_no)
	{
		global $_M;
		$post = array('tracking_no'=>$tracking_no,'express_key'=>$_M['config']['shopv2_express_key']);
		$url = "http://app.metinfo.cn/index.php?n=shop&c=exp&a=doexpress";
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_TIMEOUT, 6);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        return $result;
	}

	/**
	 * 添加物流信息到本地数据库
	 * @DateTime 2017-03-09
	 */
	public function add($order_id,$tracking_no) {
		global $_M;
		$information = $this->get_online($tracking_no);
		$time = time();
		$query = "INSERT INTO {$_M['table']['shopv2_tracking']} SET order_id = '{$order_id}',tracking_no='{$tracking_no}',information = '{$information}',addtime={$time},updatetime = {$time}";
		DB::query($query);
		return $information;
	}

	/**
	 * 更新本地数据库物流信息
	 * @DateTime 2017-03-09
	 */
	public function update($tracking_no)
	{
		global $_M;
		$information = $this->get_online($tracking_no);
		$time = time();
		$query = "UPDATE {$_M['table']['shopv2_tracking']} SET information = '{$information}',updatetime = {$time} WHERE tracking_no = '{$tracking_no}'";
		DB::query($query);
		return $information;
	}

	public function  create_express_key($express_key)
	{	
		global $_M;
		#$query = "SELECT * FROM {$_M['table']['app_config']} WHERE name='shopv2_express_key'";

		if(!$_M['config']['shopv2_express_key'])
		{
			$query = "INSERT INTO {$_M['table']['app_config']} SET name='shopv2_express_key',value='{$express_key}',lang='metinfo'";
			DB::query($query);
		}else{
			$query = "UPDATE {$_M['table']['app_config']} SET value='{$express_key}' WHERE name='shopv2_express_key'";
			DB::query($query);
		}
		
	}

}