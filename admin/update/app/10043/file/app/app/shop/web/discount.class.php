<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::own_class('web/class/web_shop_base');

class discount extends web_shop_base{

	public $discount;

	public function __construct() {
		global $_M;
		parent::__construct();
		$this->discount = load::own_class('web/class/web_discount', 'new');
		$_M['config']['own_order']=4;
	}

	public function doindex() {
		global $_M;
		load::own_class('web/class/web_shop_base','new')->check();
		require_once $this->view('app/shop_discount',$this->input);
	}

	public function doreceive(){
		global $_M;
		load::own_class('web/class/web_shop_base','new')->check();
		$discount = $this->discount->get_discount_by_id($_M['form']['id']);

		$res = $this->discount->receive($discount['id'], get_met_cookie('id'));

		echo jsonencode($res);
		die();
	}

	public function domydiscount() {
		global $_M;
		load::own_class('web/class/web_shop_base','new')->check();
		$discounts = $this->discount->get_discount_by_state($_M['form']['state'],$_M['form']['pid']);

		$discounts = $this->discount->analysis_array($discounts);
		foreach($discounts as $key=>$val){
			if($val['usetime'])$discounts[$key]['usetime_str'] = date('Y-m-d H:i:s', $val['usetime']);

		}
		echo jsonencode($discounts);die;
	}

	public function dogetdisinto()
	{
		global $_M;
        $disinto = $this->discount->get_discount_info();

        echo jsonencode($disinto);
        die();
	}

	public function dodiscount_list()
	{
		global $_M;

		$discounts = $this->discount->avalible_discounts(intval($_M['form']['pid']));
		$discounts = $this->discount->analysis_array($discounts);
		echo jsonencode($discounts);die;
	}

	public function check()
	{

	}
}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>
