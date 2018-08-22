<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::own_class('web/class/web_shop_base');
load::own_class('web/class/pager');
load::own_class('web/class/web_finance');
class order extends web_shop_base{

	public $order;

	public function __construct() {
		global $_M;
		parent::__construct();
		$this->order = load::own_class('web/class/web_order', 'new');
		$this->converse = load::own_class('web/class/web_converse', 'new');
        $this->shop_finance = load::own_class('web/class/web_finance', 'new');
        $this->sys_finance = load::mod_class('pay/web/finance.class.php', 'new');
        $_M['config']['own_order']=2;
	}

	public function doindex() {
		global $_M;
		if($_M['form']['ajaxjson']){
			if($_M['form']['state']!=''){
				if($_M['form']['state']=='all'){
					$search .= " and state > 0 ";
				}else{
					if($_M['form']['state']==3){
						$search .= " and (state = '2' or state = '3') ";
					}elseif ($_M['form']['state']<0){
                        $search .= " and (state < '0') ";
					}else{
						$search .= " and state = '{$_M['form']['state']}' ";
					}
				}
			}
			if($_M['form']['keyword']!=''){
				$search .= " and (orderid = '{$_M['form']['keyword']}' or search like '%{$_M['form']['keyword']}%')";
			}
			$search .= " and uid = '".get_met_cookie('id')."' ";
			$order = 'rtime DESC ';
			$pagelength = 8;
			$_M['form']['page'] = $_M['form']['page'] ? $_M['form']['page'] : 1;
			$orders = $this->order->get_order_list($search, $order, ($_M['form']['page']-1)*$pagelength, $pagelength);
            if($orders === false||!count($orders)){
                $json['error'] = 1;
                echo jsonencode(json);
                die();
            }
            $orders = $this->order->analysis_array($orders);
            $_M['url']['order_page'] = "{$_M['url']['shop_order']}&page=[page]";
            $page = new pager($_M['url']['order_page'], $_M['form']['page'], $this->order->get_order_total($search), $pagelength);
            //$page_html = $page->get_html();
            foreach($orders as $key=>$val){
                $goods_list = $this->order->get_goods_list($val['id']);
                $orders[$key]['goods_list'] = $goods_list;
                $orders[$key]['docheck_url'] = "{$_M['url']['shop_order']}&a=docheck&id={$val['id']}";
            }
            $json['success'] = 1;
            $json['page'] 	 = $_M['form']['page'];
            $json['endnum']  = $page->pages;
            $json['order']   = $orders;
            echo jsonencode($json);
			die();
		}
		$statesearch = " and uid = '".get_met_cookie('id')."' ";
		$this->input['state1'] = $this->order->get_order_total("and state = 1 {$statesearch}");
		$this->input['state3'] = $this->order->get_order_total("and (state = '2' or state = '3') {$statesearch}");
		$this->input['state_1'] = $this->order->get_order_total("and state = -1 {$statesearch}");
		$this->input['state_0'] = $this->order->get_order_total("and state = 0 {$statesearch}");
		$this->input['price_reason'] = explode('|',$_M['config']['shopv2_price_reason']);
        $this->input['refund_reason'] = explode('|',$_M['config']['shopv2_refund_reason']);
		require_once $this->view('app/shop_order',$this->input);
		die();
	}

	/*
	 * 订单详情
	 */
	public function docheck(){
		global $_M;
		$order = $this->order->get_order_by_user_id($_M['form']['id']);
        $order['auto_order'] = load::own_class('web/class/web_order', 'new')->is_auto_sent_order($order['id']);
        $order['mix_order']  = load::own_class('web/class/web_order', 'new')->check_order_goods($order['id']);

		if($order['uid'] != get_met_cookie('id')){
			okinfo($_M['url']['shop_order'], $_M['word']['app_shop_noaccess']);
			die();
		}
		$this->input['order'] = $this->order->analysis($order);
		$this->input['order']['state']=intval($this->input['order']['state']);
        $this->input['converse'] = $this->dogetconverselist($order['id']);
        $this->input['goods_list'] = $this->order->get_goods_list($order['id']);
        $this->input['price_reason'] = explode('|',$_M['config']['shopv2_price_reason']);
        $this->input['refund_reason'] = explode('|',$_M['config']['shopv2_refund_reason']);
        require_once $this->view('app/shop_order_check',$this->input);
	}

	/*
	 * 查看发货码
	 */
    public function doview_card()
    {
        global $_M;
        $web_card = load::own_class('web/class/web_card', 'new');
        $cid = $_M['form']['cid'];
        $oid = $_M['form']['oid'];
        $uid = $_M['user']['id'];

        $card = $web_card->view_card($cid, $oid, $uid);

        if($card){
            $this->ajax_success($_M['word']['app_shop_card_gain_success'], $card);
        }else{
            $this->ajax_error($_M['word']['app_shop_card_gain_fail']);
        }

    }


	//关闭订单
	public function doorder_close(){
		global $_M;
		$info['id'] = $_M['form']['id'];
		$info['state'] = 0;
        $reason = array('cancel_reason' => $_M['form']['cancel_reason'],'refund_reason' => $_M['form']['refund_reason'], 'detail' => $_M['form']['detail']);
		$info['reason'] = jsonencode($reason);

        $order = $this->order->get_order_by_id($_M['form']['id']);
        $user = load::sys_class('user', 'new')->get_user_by_id($order['uid']);
        $reason = "<span class=\"tag tag-default\">{$_M['word']['app_shop_refund']}：{$order['orderid']}</span>";

		//订单状态已支付未发货 state = 2
        if ($_M['config']['shopv2_price_refund'] && $order['state'] == 2) {
            $is_auto_sent = load::own_class('web/class/web_order', 'new')->is_auto_sent_order($order['id']);
            if (!$is_auto_sent) {
                //货款退回到账户余额
                #$this->shop_finance->addfinance('1',$user['username'],$order['tprice'],$reason);
                //新制支付接口
                $this->sys_finance->addfinance('1',10043,$order['uid'],$order['tprice'],$reason);
            }else{
                $this->ajax_success($_M['word']['app_shop_refund_tips1']);
			}
        }
        if($info['id'])$this->order->save_order($info);

        //恢复库存
        if ($_M['config']['shopv2_stock_type']) {
            $modify_order = $this->order->get_order_by_id($info['id']);
            $this->order->restore_stock($modify_order);
        }

        $this->ajax_success($_M['word']['app_shop_success']);
	}

	public function dotrack() {
		global $_M;
		$express = load::own_class('web/class/web_express','new');
		$info = $express->get($_M['form']['order_id'],$_M['form']['tracking_no']);
		echo urldecode($info);die;
	}

	//申请退换货
	public function dorefund(){
        global $_M;
        $sys_upfile = load::sys_class('upfile', 'new');
        if ($_FILES) {
            foreach ($_FILES as $key => $value) {
                if($value['tmp_name']){
                    $ret = $sys_upfile->uploadarr($key);//上传文件
                    foreach ($ret as $k =>$val ){
                        if ($val['error'] == 0) {
                            $upfile[$key][]=$val[path];
                        }
                    }
                }
            }
        }

        $info['imgs'] = implode('|', $upfile['file']);
        $info['id'] = $_M['form']['id'];
        $reason = array('refund_reason' => $_M['form']['refund_reason'],'cancel_reason' => $_M['form']['cancel_reason'], 'detail' => $_M['form']['detail']);
        $info['reason'] = jsonencode($reason);
        $info['state'] = -1;
        $info['restate'] = 1;
        if($info['id']) $this->order->save_order($info);
        if($_M['form']['content']) $this->doconverse_add();
        $this->ajax_success($_M['word']['app_shop_success']);

	}

	//对话列表
    public function dogetconverselist($oid = ''){
        global $_M;
        $orderid = $oid ? $oid : $_M['form']['id'];
        $order = $this->order->get_order_by_id($orderid);
        $converse = $this->converse->get_converse_list($order);
        return $converse;
    }

    //发言
    public function doconverse_add(){
        global $_M;
        $order = $this->order->get_order_by_id($_M['form']['id']);
        $form = $_M['form'];
        if($this->converse->converseadd($order['id'],$form,$order['uid'])){
        	$this->ajax_success($_M['word']['app_shop_success']);
		}else{
			$this->ajax_error($_M['word']['app_shop_error']);
		}

    }

	public function doreceipt(){
		global $_M;
		$oid  = $_M['form']['id'];
		$receipt = $this->order->receipt_goods($oid);
		if($receipt['status']){
			$this->ajax_success($receipt['msg']);
		}else{
			$this->ajax_error($receipt['msg']);
		}
	}
	//错误
	public function ajax_error($error, $data=''){
		global $_M;
		$retun = array();
		$retun['error'] = $error;
        $retun['data'] = $data;
		echo jsonencode($retun);
		die();
	}
	//成功
	public function ajax_success($success, $data=''){
		global $_M;
		$retun = array();
		$retun['success'] = $success;
		$retun['data'] = $data;
		echo jsonencode($retun);
		die();
	}


    public function dotest(){
        global $_M;
        $this->order->restore_stock();
    }

}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>
