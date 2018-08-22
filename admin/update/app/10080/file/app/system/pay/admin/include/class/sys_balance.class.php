<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

class sys_balance {
    public $errorcode;
    public function __construct() {
        global $_M;
        $this->lang = $_M['lang'];
    }

    /**
     * * @param $type 财务类型 1入款|2扣款
     * @param $uid  用户ID
     * @param $price 金额
     * @return bool|mixed
     */

    public function modify_user_balance($type, $uid, $price){
        global $_M;
        $user = load::sys_class('user', 'new')->get_user_by_id($uid);
        if(!$user){
            $this->errorcode = 'nouser';
            return false;
        }
        $user_balance = $this->getBalance($user);
        if($type == 1){
            $user_balance['balance'] = $user_balance['balance'] + $price;
        }else{
            if($user_balance['balance'] >= $price){
                $user_balance['balance'] = $user_balance['balance'] - $price;
            }else{
                $this->errorcode = 'nobalance';
                return false;
            }
        }
        $query = "UPDATE {$_M['table']['pay_balance']} SET balance='{$user_balance['balance']}' WHERE uid='{$user['id']}' AND lang='{$user['lang']}'";
        DB::query($query);
        return $user_balance['balance'];
    }

    /**
     * @param $user 用户信息
     * @return array|bool|mixed|返回执行sql执行后的结果
     */

    public function getBalance($user)
    {
        global $_M;
        $query = "SELECT * FROM {$_M['table']['pay_balance']} WHERE uid = '{$user['id']}'";
        $balance = DB::get_one($query);
        if (!$balance) {
            $query = "INSERT INTO {$_M['table']['pay_balance']} SET uid='{$user['id']}',username='{$user['username']}',balance='0',lang='{$user['lang']}'";
            DB::query($query);
            if (!$insertid = DB::insert_id()) {
                return false;
            }
            $balance['id']          = $insertid;
            $balance['uid']         = $user['id'];
            $balance['username']    = $user['username'];
            $balance['goods_list']  = '';
            $balance['balance']     = 0;
        }

        return $balance;
    }


}