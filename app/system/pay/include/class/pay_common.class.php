<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved. 

defined('IN_MET') or exit('No permission');

load::sys_class('web');

/**
 * 
 */
class pay_common{
	/**
	  * 初始化
	  */
	public function __construct() {
		global $_M;
	}
	
    /**
     * 生成32位“12时间数字+随机18位数字”的纯数字字符串
     * return 所生成的数字字符串
     */
    public static function get_num_str() {
        global $_M;
        $time = date("YmdHms",time());          //生成14为时间数字字符串
        for($i=0; $i<18;$i++) {                 //循环生成18位随机数字字符串
            $str .= mt_rand(0,9);
        }
        $num_str = $time.$str;
        return $num_str;
    }

    public function price_str($price){
        global $_M;
        $query = "SELECT * FROM {$_M['table']['pay_config']} WHERE name='pay_price_str_prefix' AND lang='{$_M['lang']}'";
        $res = DB::get_one($query);
        $pay_price_str_prefix = $res['value'];

        $query = "SELECT * FROM {$_M['table']['pay_config']} WHERE name='pay_price_str_suffix' AND lang='{$_M['lang']}'";
        $res = DB::get_one($query);
        $pay_price_str_suffix = $res['value'];

        $price = $price ? number_format($price, 2, '.', ''): '0.00';
        $price = $pay_price_str_prefix.$price.$pay_price_str_suffix;
        return $price;
    }


    /**
     * 支付插件参数获取
     */
    public function GetPayConfig($name) {
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

}
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>