<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

class web_card {
    /**
     * @param $good     商品信息
     * @param $splist   规格信息
     * @param $order    订单信息
     */
    public function send_card($goods , $splist='', $order)
    {
        global $_M;
        $cards = $this->get_card($goods['pid'], $splist['id']);

        for ($i = 0; $i < $goods['pamount']; $i++) {
            $granttime = time();
            $uid = $order['uid'];
            $query = "UPDATE {$_M['table']['shopv2_card']} SET  state = 2 ,granttime = '{$granttime}' ,uid = '{$uid}' ,orderid = '{$order['id']}'  WHERE id = '{$cards[$i]['id']}' AND lang='{$_M['lang']}';";
            DB::query($query);
        }
    }

    /**
     * @param $order_id     订单DI
     * @return array
     */
    public function get_card_by_orderid($order_id, $pid ,$splistid = ''){
        global $_M;
        $splistid = $splistid ? $splistid : 0;
        $query = "SELECT * FROM {$_M['table']['shopv2_card']} WHERE orderid = {$order_id} AND pid = '{$pid}' AND splist_id = {$splistid} AND lang = '{$_M['lang']}'";
        $cards = DB::get_all($query);
        return $cards;
    }


    public function view_card($cid, $oid, $uid)
    {
        global $_M;
        $query = "UPDATE {$_M['table']['shopv2_card']} SET  state = 3 WHERE id = '{$cid}' AND uid = '{$uid}' AND orderid = '{$oid}' AND  state = 2 ";
        DB::query($query);

        $query = "SELECT * FROM {$_M['table']['shopv2_card']} WHERE state = 3 AND id = '{$cid}'";
        $card = DB::get_one($query);
        return $card;
    }

    /**
     * @param $splistid  规格ID
     * @param $pid      产品ID
     * @return array
     */
    public function get_card($pid, $splistid = 0)
    {
        global $_M;
        $splistid = $splistid ? $splistid : 0;
        $query = "SELECT * FROM {$_M['table']['shopv2_card']} WHERE state = 1 AND splist_id='{$splistid}' AND pid = '{$pid}' AND lang = '{$_M['lang']}'";
        $cards = DB::get_all($query);
        return $cards;
    }

    /**
     * 统计可用数量
     * @param $splistid  规格ID
     * @param $pid      产品ID
     * @return array
     */
    public function count_card($pid, $splistid = '')
    {
        global $_M;
        $splistid = $splistid ? $splistid : 0;
        $where = "WHERE state = 1 AND splist_id='{$splistid}' AND pid = '{$pid}' AND lang = '{$_M['lang']}'";
        $res = DB::counter($_M['table']['shopv2_card'],$where);
        return $res;
    }



}
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>