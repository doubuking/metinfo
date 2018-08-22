<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved. 

defined('IN_MET') or exit('No permission');

class web_freight {
	public $lang;
	public function __construct() {
		global $_M;
		$this->lang = $_M['lang'];
	}
	public function get_freight($freight_mould, $amount, $add){
		global $_M;
        $zone_code = explode(',',$add['zone_code']);
        $zone_code_coun = $zone_code[0];
        $zone_code_p    = $zone_code[1];

        $query = "SELECT * FROM {$_M['table']['shopv2_logistics_zone']} WHERE lid='{$freight_mould}'";
        $logistics_zone = DB::get_all($query);
        foreach ($logistics_zone as $item) {
            $lzone = jsondecode($item['zone']);
            if (in_array($zone_code_p, $lzone[$zone_code_coun])) {
                $f = $item;
            }
        }
		$price = $f['freight'];
		$ceil = ceil(($amount -  $f['first'])/ $f['addp']);
		if($ceil >= 1){
			$price += $ceil * $f['renew'];
		}
		return $price;
	}

	public function get_invoice_freight($add){
		global $_M;
        #return 0;
		if($_M['config']['invoice_freight_type'] == 1){
			return $_M['config']['invoice_freight'];
		}else{
			/*$query = "SELECT * FROM {$_M['table']['shopv2_logistics_zone']} WHERE zone like '%{$add['zone_p']}%' AND lid='{$_M['config']['invoice_freight_mould']}'";
			$f = DB::get_one($query);
				return $f['freight'];*/

            $zone_code = explode(',',$add['zone_code']);
            $zone_code_coun = $zone_code[0];
            $zone_code_p    = $zone_code[1];

            $query = "SELECT * FROM {$_M['table']['shopv2_logistics_zone']} WHERE lid='{$_M['config']['invoice_freight_mould']}'";
            $logistics_zone = DB::get_all($query);
            foreach ($logistics_zone as $item) {
                $lzone = jsondecode($item['zone']);
                if (in_array($zone_code_p, $lzone[$zone_code_coun])) {
                    $f = $item;
                    return $f['freight'];
                }
            }
            return 0;
		}

	}

	
}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>