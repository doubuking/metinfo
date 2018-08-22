<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::sys_class('app');

class price_admin extends app {
    public $appno;

    public function __construct() {
        parent::__construct();
        $this->appno = 10043;
        global $_M;
    }

    public function doindex(){
        global $_M;
        $data = array();
        $group = load::mod_class('user/sys_group', 'new');
        $glist = $group->get_group_list();

        $guest = array();
        $guest[0]['name'] = $_M['word']['app_shop_guest'];
        $guest[0]['id'] = 0;
        $guest[0]['lang'] = 'cn';

        $group_list = array_merge($guest, $glist);

        $query = "SELECT * FROM {$_M['table']['shopv2_group_discount']} WHERE lang='{$_M['lang']}'";
        $group_discount = DB::get_all($query);

        $grouplist = array();
        foreach ($group_list as $val){
            foreach ($group_discount as $v){
                if( $val['id'] == $v['groupid']){
                    $val['gdiscount'] = $v['gdiscount'];
                }
            }
            $grouplist[] = $val;
        }

        $data['grouplist'] = $grouplist;
        require_once $this->show('app/set_price',$data);
    }

    public function doeditor(){
        global $_M;
        $price = array();

        foreach ($_M['form'] as $key => $val) {
            if(strstr($key,'group_id_')){
                $groupid = str_replace("group_id_", '', $key);
                $groupid = $groupid ? $groupid : 0;
                $gdiscount = $val;

                $query = "SELECT * FROM {$_M['table']['shopv2_group_discount']} WHERE groupid='{$groupid}'  AND lang='{$_M['lang']}'";
                if(!DB::get_one($query)){
                    $query = "INSERT INTO {$_M['table']['shopv2_group_discount']} SET groupid='{$groupid}' , gdiscount ='{$gdiscount}' , lang='{$_M['lang']}'";
                    DB::query($query);
                }else{
                    $query = "UPDATE {$_M['table']['shopv2_group_discount']} SET gdiscount ='{$gdiscount}' WHERE groupid='{$groupid}'" ;
                    DB::query($query);
                }
            }
        }

        $configlist = array();
        $configlist[] = 'shopv2_price_str_prefix';
        $configlist[] = 'shopv2_price_str_suffix';
        $configlist[] = 'shopv2_price_set';         //价格默认设置方式
        appconfigsave($configlist,$this->appno);
        setcookie("TestCookie",implode(',',$configlist));
        $this->ajax_success($_M['word']['app_shop_saveok']);

    }

    public function insert_data($table ,$name, $value, $lang = ''){
        global $_M;
        foreach($_M['langlist']['admin'] as $key=>$val){
            $query = "SELECT * FROM {$_M['table']['language']} WHERE name='{$name}' AND lang='{$val['mark']}' AND app='10043'";
            if(!DB::get_one($query)){
                $query = "INSERT INTO {$_M['table']['language']} SET name='{$name}',value='{$value}',site='1',no_order=0,array=0,app='10043',lang='{$val['mark']}'";
                DB::query($query);
            }
        }
    }

    //错误
    public function ajax_error($error){
        global $_M;
        $retun = array();
        $retun['error'] = $error;
        echo jsonencode($retun);
        die();
    }
    //成功
    public function ajax_success($success){
        global $_M;
        $retun = array();
        $retun['success'] = $success;
        echo jsonencode($retun);
        die();
    }


}