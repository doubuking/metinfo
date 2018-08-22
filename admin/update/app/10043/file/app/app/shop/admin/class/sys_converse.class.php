<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::own_class('web/class/web_converse');

class sys_converse extends web_converse{
    public function __construct()
    {
        parent::__construct();
    }

    public function converseadd($oid,$form,$user_id = ''){
        global $_M;
        $addtime = time();
        $query = "INSERT INTO {$_M['table']['shopv2_converse']} SET order_id='{$oid}' ,admin_name='{$_M['user']['admin_name']}',user_type='2',content='{$form['content']}',img='{$form['img']}',addtime='{$addtime}',lang='{$_M['lang']}'";
        DB::query($query);
        return DB::insert_id();

    }
}





?>