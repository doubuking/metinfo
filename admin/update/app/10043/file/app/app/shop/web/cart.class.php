<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::own_class('web/class/web_shop_base');

class cart extends web_shop_base{

    public $cart;
    public function __construct() {
        global $_M;
        parent::__construct();
        $this->cart = load::own_class('web/class/web_cart', 'new');
    }

    public function doindex() {
        global $_M;
        // 页面数据
        $cart = $this->cart->cart_list();
        $this->input['cartnum'] = count($cart);
        $this->input['moregoods_type']=intval($_M['config']['shopv2_moregoods'])?'com':'all';
        $this->input['goodnum']=$_M['form']['goodnum'];
        require_once $this->view('app/shop_cart',$this->input);
    }

    public function dotocart(){
        global $_M;
        $num = $_M['form']['num'];
        $pid = $_M['form']['pid'];
        $para_str = $_M['form']['option'];  //规格值组成的数组[1,3]

        $info['pid'] = $pid;
        $info['para_str'] = $para_str ?explode(',', $para_str) : '' ;
        $info['amount'] = $num;

        $stock = load::own_class('web/class/web_goods', 'new')->stock_list($info);

        $data['buy_ok'] = $stock['buy_ok'];
        $data['stock'] = $stock['stock'];

        if($data['buy_ok'] == 0){
            okinfo(-1,$_M['word']['app_shop_lowstocks']);
        }
        $data = array();
        $data[$info['pid']]['pid'] = $info['pid'];
        $purchase = load::own_class('web/class/web_goods', 'new')->purchase_list($data);

        if($num > $purchase[$info['pid']]){
            okinfo(-1,$_M['word']['app_shop_lowpurchase']);
        }

        $total = $this->cart->get_total_by_pid($pid);

        if($total){
            $min_amount = min($stock['stock'], $purchase[$info['pid']]);
            if($min_amount - $total < $num){
                okinfo(-1,$_M['word']['app_shop_lowpurchase']);
            }
        }

        $id = $this->cart->tocrat($pid, $para_str, $num);

        if($_M['form']['action'] == 'buynow'){
            header("Location: {$_M['url']['shop_pay']}&cidlist={$id}");
        }else{
            header("Location: {$_M['url']['shop_cart']}&a=domycart&id={$id}");

        }

    }

     public function domycart()
    {
        global $_M;
        $id = $_M['form']['id'];
        if(intval($id) < 0){
            okinfo(-1,$_M['word']['app_shop_lowstocks']);
        }
        load::plugin('doshopv2_tocart_afert', 0, array('id'=>$id));//加载插件
        $cart = $this->cart->get_cart_by_id($id);
        if(!$cart){
            okinfo(-1,$_M['word']['app_shop_emptycart']);
        }
        // 页面数据
        $this->input['tocart'] = $this->cart->analysis($cart);
        $this->input['moregoods_type']=intval($_M['config']['shopv2_moregoods'])?'com':'all';
        require_once $this->view('app/shop_tocart',$this->input);
    }

    public function dojson_cart_list() {
        global $_M;
        $search .= " and uid = '".get_met_cookie('id')."' ";
        $order = '';
        $data = $this->cart->json_cart_list($search, $order);
        $data = load::plugin('doshopv2_cart', 1, array('cart'=>$data));//加载插件
        echo jsonencode($data);
    }

    public function domodify() {
        global $_M;
        if($_M['form']['id'] || is_numeric($_M['form']['id'])){
            $info['id'] = $_M['form']['id'];
            $info['amount'] = $_M['form']['amount']>0?$_M['form']['amount']:1;
            $cart = $this->cart->get_cart_by_id($info['id']);
            $goods = load::own_class('web/class/web_goods', 'new')->get_goods_by_pid($cart['pid'],0,0,1);
            $shopmax = $goods['purchase']?$goods['purchase']:$goods['stock'];

            $purchase = load::own_class('web/class/web_goods', 'new')->purchase_list($goods);

            if($purchase[$cart['pid']]){
                $shopmax = $purchase[$cart['pid']];
            }

            if($info['amount']>$shopmax){
                $info['amount'] = $shopmax;
            }

            $this->cart->save_cart($info);
            if(!get_met_cookie('id')){
                $cart = $this->cart->cookie_cart;
            }else{
                $cart = $this->cart->cart_list();
            }

        }else{
            $cart = $this->cart->cart_list();
        }

        $cart = $this->cart->analysis_array($cart);

        $price = load::own_class('web/class/web_func', 'new')->price_plugin($cart);
        $return['message'] = 'ok';
        $return['price'] = $price;

        jsoncallback($return);
    }

    public function dodel() {
        global $_M;
        $this->cart->del_cart($_M['form']['id']);
        $this->ajax_success($_M['word']['app_shop_delok']);
    }

    //错误
    public function ajax_error($error, $data){
        global $_M;
        $retun = array();
        $retun['error'] = $error;
        $retun['data'] = $data;
        echo jsonencode($retun);
        die();
    }
    //成功
    public function ajax_success($success, $data){
        global $_M;
        $retun = array();
        $retun['success'] = $success;
        $retun['data'] = $data;
        echo jsonencode($retun);
        die();
    }



    public function check()
    {

    }
}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>