<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

class sys_finance {

    public $lang;
    public $errorcode;

    public function __construct() {
        global $_M;
        $this->lang = $_M['lang'];
    }

    public function get_finance_list($where, $order, $limit_start, $limit_num){
        global $_M;
        $where = "lang = '{$this->lang}' {$where}";
        return DB::get_data($_M['table']['pay_finance'], $where, $order, $limit_start, $limit_num);
    }

    public function get_finance_total($where){
        global $_M;
        $where = "lang = '{$this->lang}' {$where}";
        return DB::counter($_M['table']['pay_finance'], $where);
    }

    public function json_finance_list($where, $order){
        global $_M;
        $this->table = load::sys_class('tabledata', 'new');
        $where = "lang = '{$this->lang}' {$where}";
        $data = $this->table->getdata($_M['table']['pay_finance'], '*', $where, $order);
        $data = $this->analysis_array($data);
        return $data;
    }

    public function json_return($data){
        $this->table->rdata($data);
    }

    public function get_finance_by_id($id){
        global $_M;
        $query = "SELECT * FROM {$_M['table']['pay_finance']} WHERE id = '{$id}'";
        $data = DB::get_one($query);
        return $data;
    }

    public function analysis_array($data){
        foreach($data as $key=>$val){
            $data[$key] = $this->analysis($val);
        }
        return $data;
    }

    public function analysis($data){
        $para = $this->para('type');
        $data['type_str'] = $para[$data['type']];
        if($data['type'] == 1){
            $data['price_str'] = '+'.$this->price_str($data['price']);
        }else{
            $data['price_str'] = '-'.$this->price_str($data['price']);
        }
        $data['balance_str'] = $this->price_str($data['balance']);
        $data['reason_html'] = $data['reason'];
        $data['addtime_str'] = date("Y-m-d H:i:s" ,$data['addtime']);
        return $data;
    }

    public function para($para){
        global $_M;
        if($para == 'type'){
            // 1为入款 2为扣款
            return array(1=>$_M['word']['pay_finance_in'], 2=>$_M['word']['pay_finance_out']);
        }
    }

    public function addfinance($type, $username, $price, $reason){
        global $_M;
        $addtime = time();
        $adminuesr = $this->get_op_user();
        $user = load::sys_class('user', 'new')->get_user_by_username($username);
        if(!$user){
            $this->errorcode = 'nouser';
            return false;
        }
        $balance = load::mod_class("pay/admin/include/class/sys_balance.class.php",'new')->modify_user_balance($type, $user['id'], $price);
        if($balance !== false){
            $query = "INSERT INTO {$_M['table']['pay_finance']} SET uid='{$user['id']}',username='{$username}',type='{$type}',reason='{$reason}',price='{$price}',balance='{$balance}',addtime='{$addtime}',adminname='{$adminuesr}',lang='{$this->lang}'";
            DB::query($query);
            return true;
        }else{
            $this->errorcode = "add finance failed";
            return false;
        }
    }

    public function get_op_user(){
        return 'system';
    }

    /*public function price_str($price){
        global $_M;
        $price = $price ? number_format($price, 2, '.', ''): '0.00';
        $price = $_M['word']['pay_mico'].$price.$_M['word']['pay_yuan'];
        return $price;
    }*/

    public function price_str($price){
        global $_M;
        $pricestr = load::mod_class('pay/pay_common', 'new')->price_str($price);
        return $pricestr;
    }

}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>