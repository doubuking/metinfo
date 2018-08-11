<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

define ('TEM_INSTALL_VER', '1.000');

class install {
	function dosql(){
		global $_M;		
		
$sql = array (
  0 => 'pos =\'0\',no_order=\'1\',type=\'1\',style=\'3\',selectd=\'\',name =\'\',value=\'\',defaultvalue=\'\',valueinfo =\'报名表单\',tips=\'\'',
  1 => 'pos =\'0\',no_order=\'2\',type=\'2\',style=\'3\',selectd=\'\',name =\'name\',value=\'\',defaultvalue=\'\',valueinfo =\'名称\',tips=\'请输入名称\'',
  2 => 'pos =\'0\',no_order=\'3\',type=\'2\',style=\'3\',selectd=\'\',name =\'phone\',value=\'\',defaultvalue=\'\',valueinfo =\'手机号\',tips=\'请输入手机号\'',
);
$no='mui169';
$devices='0';
		$re['sql'] = $sql;
		$re['no'] = $no;
		$re['devices'] = $devices;
		return $re;
	}
}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>