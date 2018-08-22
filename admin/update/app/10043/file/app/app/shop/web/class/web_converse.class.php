<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::sys_func('str');
load::sys_func('array');

class web_converse{
    public function __construct()
    {

    }

    public function get_converse_list($order){
        global $_M;
        $query = "SELECT * FROM {$_M['table']['shopv2_converse']} WHERE order_id = '{$order['id']}' AND lang='{$_M['lang']}' ORDER BY addtime DESC ";
        $converse = DB::get_all($query);
        $converse_list = array();
        foreach ($converse as $key=>$val) {
            $converse_list[$key]['content'] = $val['content'];
            $converse_list[$key]['time'] = date("Y/m/d H:i:s",$val['addtime']);
            $converse_list[$key]['content'] = $val['content'];
            $converse_list[$key]['img'] = $val['img']?explode("|",$val['img']):'';
            $converse_list[$key]['user_type'] = $val['user_type'];

            if($val['user_type']==1){
                $converse_list[$key]['p_name'] = $order['username'];
            }else{
                $converse_list[$key]['p_name'] = $val['admin_name'] ? $val['admin_name'] : $_M['word']['app_shop_adminstrator'];
            }
        }
        return $converse_list;
    }

    public function converseadd($oid,$form,$uid){
        global $_M;
        $addtime = time();
        $query = "INSERT INTO {$_M['table']['shopv2_converse']} SET order_id='{$oid}' ,user_id='{$uid}',admin_name='',user_type='1',content='{$form['content']}',img='{$form['img']}',addtime='{$addtime}',lang='{$_M['lang']}'";
        DB::query($query);
        return DB::insert_id();

    }
}





?>