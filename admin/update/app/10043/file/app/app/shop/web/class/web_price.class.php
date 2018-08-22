<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

class web_price {

    public $lang;

    public function __construct() {
        global $_M;
        $this->lang = $_M['lang'];
        $this->user = get_met_cookie('id');
    }

    /**
     * 获取商品会员组价格
     * @param $oprice 商品原价
     * @return string
     */
    public function get_group_price($oprice)
    {
        global $_M;
        if ($_M['config']['shopv2_price_set'] == 0) {
            return $oprice;
        } elseif ($_M['config']['shopv2_price_set'] == 1) {
            $user = $_M['user'];

            if (!$user) {
                $query = "SELECT * FROM {$_M['table']['shopv2_group_discount']} WHERE groupid = 0";
                $group_discount = DB::get_one($query);
                $gdiscount = $group_discount['gdiscount'] ? $group_discount['gdiscount'] : 1;
            }else{
                $query = "SELECT * FROM {$_M['table']['shopv2_group_discount']}";
                $group_discount = DB::get_all($query);
                foreach ($group_discount as $val) {
                    if ($user['groupid'] == $val['groupid']) {
                        $gdiscount = $val['gdiscount'];
                    }
                }
            }
            $gprice = $oprice * $gdiscount;
            $gprice = number_format($gprice, 2, '.', '');
            return $gprice;
        }
    }

}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>