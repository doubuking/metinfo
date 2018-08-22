<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::sys_class('app');

class help extends app {

	public function __construct() {
		parent::__construct();
		global $_M;
	}

	public function doindex(){
		global $_M;
		require_once $this->show('app/help');
	}

}
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>