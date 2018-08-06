<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

class install {

    public function dosql(){
        global $_M;
        $dir = dirname(__FILE__);
        require_once  $dir.'/set.class.php';
        $set = new set();
        $re = $set->dosql();
        $skin_name = $re['no'];
        load::app_class('met_template/admin/class/UI');
        $UI = new UI($skin_name);
        $import = $UI->import_ui();
        $res = $UI->download_all_ui();
    }
}


# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>