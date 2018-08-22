<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::sys_class('app');

class goods_admin extends app {
	public function __construct() {
		parent::__construct();
	}

	public function domanage(){
		global $_M;
        $query = "SELECT * from {$_M['table']['column']} WHERE `bigclass`=0 AND `module`=3 and `lang`='{$_M['lang']}'";
        $cid = DB::get_one($query);
        $data['cid'] = $cid['id'];
		require_once $this->show('app/goods_manage',$data);
	}
}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>