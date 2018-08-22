<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::sys_class('app');

class card_admin extends app {
    public function __construct() {
        parent::__construct();
        $this->goods = load::own_class('admin/class/sys_goods', 'new');
        $this->shopgoods = load::app_class('shop/admin/class/sys_goods', 'new');
        $this->card = load::own_class('admin/class/sys_card', 'new');
        $this->table = load::sys_class('tabledata', 'new');
        $this->user = load::sys_class('user', 'new');
        global $_M;
    }

    public function doindex(){
        global $_M;

    }

    public function do_set_card(){
        global $_M;
        $goods       = $this->goods->get_sys_product($_M['form']['pid']);
        $shopgoods   =$this->shopgoods->get_product($_M['form']['pid']);
        #$plist      = $this->goods->get_plist($_M['form']['pid']);
        $gsplist     = $this->goods->get_goods_splist($_M['form']['pid']);
        if($gsplist){
            foreach ($gsplist as $key=>$splist) {
                $splist_str = $this->goods->get_spec_valuelist_str($splist['valuelist']);
                $good_splist[$key]['id'] = $splist['id'];
                $good_splist[$key]['card'] = $this->card->get_card_by_pid($_M['form']['pid'], $splist['id']);
                $good_splist[$key]['card_info'] = $this->card->get_card_info($_M['form']['pid'], $splist['id']);
                $good_splist[$key]['valueliststr'] = $splist_str;
                $good_splist[$key]['paraname'] = urlencode($goods['title'] . '__' . $splist_str);
            }
        }else{
            $card= $this->card->get_card_by_pid($_M['form']['pid']);
            $splist['id'] = 0;
            $splist['valueliststr'] =  $goods['title'];
            $splist['card_info'] = $this->card->get_card_info($_M['form']['pid'], $splist['id']);
            $good_splist[] = $splist;
        }

        /*dump($good_splist);
        diE();*/

        $data['goods']      = $goods;
        $data['shopgood']   = $shopgoods;
        $data['good_splist']= $good_splist;
        $data['pid']        = $_M['form']['pid'];
        require_once $this->show('app/card_set',$data);
    }

    public function doaddcards(){
        global $_M;
        $form = $_M['form'];
        $pid = $_M['form']['pid'];

        $this->card->add_cards($form);
        $this->ajax_success($_M['word']['app_shop_saveok']);
    }

    public function doeditor()
    {
        global $_M;
        $data['pid']=$_M['form']['pid'];
        $data['splistid']=$_M['form']['splistid'];
        $data['card'] = $this->card->get_one_card($_M['form']['cardid']);

        require_once $this->show('app/card_editor',$data);
    }

    public function dosavecard()
    {
        global $_M;
        $this->card->save_card($_M['form']);
        $this->ajax_success($_M['word']['app_shop_saveok']);
    }

    public function dodeletecard()
    {
        global $_M;
        if ($_M['form']['cardid']) {
            $cardid = $_M['form']['cardid'];
        }
        $this->card->del_card($cardid);

        $this->ajax_success($_M['word']['physicaldelok']);
    }

    public function docard_list(){
        global $_M;
        $data['pid'] = $_M['form']['pid'];
        $data['splistid'] = $_M['form']['splistid'];
        $data['paraname'] = urldecode($_M['form']['paraname']);
        require_once $this->show('app/card_list',$data);

    }


    public function dotable_list_json()
    {
        global $_M;
        // dump($_M[form]);die;
        $size = $_M['form']['length'];
        $offset = $_M['form']['start'];
        $offset = $offset ? $offset * $size - 1 : $offset;
        $where = '';
        $where = "lang = '{$_M['lang']}'";


        if($_M['form']['pid']!==''){
            $where .= " AND pid = '{$_M['form']['pid']}'";
        }

        if($_M['form']['splistid']!==''){
            $where .= " AND splist_id = '{$_M['form']['splistid']}'";
        }
        if($_M['form']['state']!==''){
            $where .= " AND state = '{$_M['form']['state']}'";
        }
        $order = "id DESC ";
        $card = $this->table->getdata($_M['table']['shopv2_card'], $field = '*', $where, $order);

        foreach ($card as $value) {
            $addtime = date("Y-m-d h:i", $value['addtime']);
            $granttime = $value['granttime'] ? date("Y-m-d h:i", $value['granttime']) : '-';
            $user = $this->user->get_user_by_id($value['uid']);
            $username = $user['username'] ? $user['username'] : '-';
            $operate = '';
            $card_str="<span class='card-value'>{$value['card']}</span>";
            if ($value['state'] == 1) {
                $state = $_M['word']['app_shop_card_table_row3'];
                $operate = "<button type='button' data-url='{$_M['url']['own_form']}a=dodeletecard&cardid={$value['id']}' class='btn btn-primary btn-sm card-del'>{$_M['word']['delete']}</button>";
                $card_str.="<div class='pull-right blue-600' style='cursor: pointer;'><i class='icon wb-pencil p-x-5 card-editor' title='{$_M['word']['app_shop_card_title_modify']}' data-id='{$value['id']}'></i></div>";
            } elseif ($value['state'] == 2) {
                $state = $_M['word']['app_shop_card_table_row4'];
            } elseif ($value['state'] == 3 && $value['uid']) {
                $state = $_M['word']['app_shop_card_table_row5'];
            }

            $list = array(
                $card_str,
                $state,
                $addtime,
                $granttime,
                $username,
                $operate
            );
            $rarray[] = $list;
        }
        $this->table->rdata($rarray);
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