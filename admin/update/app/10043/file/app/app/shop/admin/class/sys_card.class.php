<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

class sys_card {
    public $flag_card;

    public function __construct()
    {
        if (!$this->flag_card) {
            $this->clearn_card();
        }
    }

    public function get_card_by_pid($pid,$splist_id='0'){
        global $_M;
        $query = "SELECT * FROM {$_M['table']['shopv2_card']} WHERE pid = '{$pid}' AND state = 1 AND splist_id = '{$splist_id}' AND lang = '{$_M['lang']}'";
        $card = DB::get_all($query);
        $cardstr = '';
        foreach ($card as $val){
            $cardstr .= $val['card'];
            $cardstr .= PHP_EOL;
        }
        return trim( $cardstr,PHP_EOL);
    }

    public function get_card_info($pid,$splist_id = 0){
        global $_M;
        #$query = "SELECT * FROM {$_M['table']['shopv2_card']} WHERE pid = '{$pid}' AND splist_id = '{$splist_id}' AND lang = '{$_M['lang']}'";
        //总数
        $where = "pid = '{$pid}' AND splist_id = '{$splist_id}' AND lang = '{$_M['lang']}'";
        $total_num = DB::counter($_M['table']['shopv2_card'],$where);

        //已发放
        $where = "pid = '{$pid}' AND ( state = 2 OR  state = 3) AND splist_id = '{$splist_id}' AND lang = '{$_M['lang']}'";
        $issued_num1 = DB::counter($_M['table']['shopv2_card'],$where);

        //已使用
        $where = "pid = '{$pid}' AND  state = 3 AND splist_id = '{$splist_id}' AND lang = '{$_M['lang']}'";
        $issued_num2 = DB::counter($_M['table']['shopv2_card'],$where);

        //可发放
        $Available_num = $total_num - $issued_num1;

        $info['total_num'] = $total_num;
        $info['issued_num1'] = $issued_num1;
        $info['issued_num2'] = $issued_num2;
        $info['Available_num'] = $Available_num;
        $info['infostr'] = implode(" / ",$info);

        return $info;
    }

    public function get_one_card($cid)
    {
        global $_M;
        $query = "SELECT * FROM {$_M['table']['shopv2_card']} WHERE id = '{$cid}'";
        $card = DB::get_one($query);
        if ($card) {
            return $card;
        } else {
            return false;
        }
    }

    public function add_cards($form){
        global $_M;
        $addtime = time();
        $splistid = $form['splist_id'];
        $card_values = preg_replace("/\'/", "''", $_M['form']['card_values']);
        $card_values = explode(PHP_EOL, trim($card_values));

        /*$query = "DELETE FROM {$_M['table']['shopv2_card']}
                      WHERE pid = '{$form['pid']}'
                      AND splist_id = '{$splistid}' 
                      AND state = 1 
                      AND lang = '{$_M['lang']}'";
        DB::query($query);*/

        foreach ($card_values as $card) {
            $query = "INSERT INTO {$_M['table']['shopv2_card']} SET
            pid        = '{$form['pid']}',
            splist_id  = '{$splistid}',
            card  = '{$card}',
            state  = '1',
            addtime  = '{$addtime}',
            lang  = '{$_M['lang']}'
            ";
            DB::query($query);
        }
    }

    public function save_card($form)
    {
        global $_M;
        $card = $form['card'];
        $addtime = time();
        $query = "UPDATE {$_M['table']['shopv2_card']} SET
              card  = '{$card}',
              addtime  = '{$addtime}'
              WHERE id = '{$form['card_id']}' 
              AND lang  = '{$_M['lang']}';
            ";
        DB::query($query);
    }

    public function del_card($cid)
    {
        global $_M;
        $query = "DELETE FROM {$_M['table']['shopv2_card']} WHERE id = '$cid'";
        DB::query($query);
        return;
    }


    //清除失效card
    public function clearn_card()
    {
        global $_M;
        //产品不存在时删除card
        $query = "SELECT `pid` FROM {$_M['table']['shopv2_product']}";
        $res = DB::get_all($query);
        foreach ($res as $id) {
            $pids[] = $id['pid'];
        }
        $sql = ' ('.implode(',', $pids).') ';
        $query = "DELETE FROM {$_M['table']['shopv2_card']} WHERE pid NOT IN {$sql} AND state = 1";
        DB::query($query);

        //产品规格不存在是删除card
        $query = "SELECT `id` FROM {$_M['table']['shopv2_goods_splist']}";
        $res = DB::get_all($query);
        foreach ($res as $spid) {
            $spids[] = $spid['id'];
        }
        $sql = ' ( 0,'. implode(',', $spids).') ';
        $query = "DELETE FROM {$_M['table']['shopv2_card']} WHERE splist_id NOT IN {$sql} AND state = 1";
        DB::query($query);

        $this->flag_card = 1;
    }

}