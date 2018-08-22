<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::own_class('web/class/web_shop_base');

class pay extends web_shop_base{

	public $pay;
	public $cart;
	public function __construct() {
		global $_M;
		parent::__construct();
		$this->cart = load::own_class('web/class/web_cart', 'new');
		//$this->pay = load::own_class('web/class/web_pay', 'new');
	}

	public function doindex() {
		global $_M;
        $func = load::own_class('web/class/web_func', 'new');

		if(!get_met_cookie('id') && !$_M['form']['guest']){
			if($_M['form']['ajax']){
				$this->response($_M['url']['shop_choose']."&cidlist={$_M['form']['cidlist']}",$_M['word']['memberLogin'],-1);
			}else{
					header("Location: {$_M['url']['shop_choose']}&cidlist={$_M['form']['cidlist']}");die;
			}
		}
		$this->input['addr_de'] = 0;
		$pgoods = $this->get_pay($_M['form']['cidlist']);

		if(!$pgoods){
			if($_M['form']['ajax']){
				$this->response($_M['url']['product'],$_M['word']['app_shop_emptycart']);
			}else{
				okinfo($_M['url']['product'],$_M['word']['app_shop_emptycart']);
			}
		}
		$this->input['logistic'] = 0;
		foreach($pgoods as $val){
			if($val['logistic'])$this->input['logistic'] = 1;
			// 获取该商品已购买数量
			$order_amount = load::own_class('web/class/web_order','new')->get_order_amount(get_met_cookie('id'),$val['pid']);

			// 如果此次购买数量加上已购买数量超过了限购
			if($val['purchase'] > 0 && $order_amount + $val['amount'] > $val['purchase'] ){
				$this->response($_M['url']['shop_cart'],$_M['word']['app_shop_lowpurchase']."【{$val['name']}】");
			}

            if ($val['lnvoice']) {
                $this->input['goods_lnvoice'] = 1;
            }

            if ($val['logistic'] != 0) {
                $this->input['goods_logistic'] = 1;
            }
		}
		$this->input['freight_type_str'] = $this->input['logistic']?"{$_M['word']['app_shop_express']}（<span id=\"pay-freight\"></span>）":$_M['word']['app_shop_nologistics'];
		$this->input['freight_type_str'] = "{$_M['word']['app_shop_express']}（<span id=\"pay-freight\"></span>）";
		$addr_display = $this->is_consignee_display($pgoods) ? "data-dis='1'":"style='display:none;' data-dis='0'";
		$submit_disable = $this->is_stock_display($pgoods) ? "":"disabled='disabled'";
		$invoice = $this->is_invoice($pgoods);
		if(count($invoice) == count($pgoods) || count($invoice) == 0){
			$invoice_div = 0;
		}else{
			$invoice_div = 1;
		}


		if(!$this->is_purchase($pgoods)){
			if($_M['form']['ajax']){
				$this->response($_M['url']['shop_cart'], $_M['word']['app_shop_lowpurchase']);
			}else{
				okinfo($_M['url']['shop_cart'], $_M['word']['app_shop_lowpurchase']);
			}
		}
		if($submit_disable != ''){
			if($_M['form']['ajax']){
				$this->response($_M['url']['shop_cart'], $_M['word']['app_shop_lowstocks']);
			}else{
				okinfo($_M['url']['shop_cart'], $_M['word']['app_shop_lowpurchase']);
			}
		}

		if($_M['form']['ajax']){
			$this->response($_M['url']['shop_pay']."&cidlist={$_M['form']['cidlist']}", '',1);
		}
		$total_price = $this->total_price($pgoods);

		$discount_class = load::own_class('web/class/web_discount', 'new');
		$discounts = $discount_class->get_dis_by_price_uid(get_met_cookie('id'),$total_price);

		$discounts = $discount_class->analysis_array($discounts);

		$re  = array();
		$did = array();
		foreach($discounts as $key => $val){

			if($discount_class->is_ues_discount(get_met_cookie('id'), $val, $pgoods)){
				if(!in_array($val['did'], $did)){
					$re[] = $val;
				}
				array_push($did, $val['did']);
			}
		}
        $this->input['discounts'] = $re;

        //折扣信息显示
        $cprice = $discount_class->amount_discount($pgoods, $total_price);
        $discount_info = $discount_class->amount_discount_info;
        $dis_info = '';
        if($discount_info['amount_discount']['dprice']){
            $dprice1_str = $func->price_str(0 - $discount_info['amount_discount']['dprice']);
            $dis_info .= $_M['word']['app_shop_order_free_tips1'] . $discount_info['amount_discount']['amount'] . $_M['word']['app_shop_order_free_tips2'] . $dprice1_str;
        }
        if($discount_info['static_discount']['dprice']){
            $dis_info .= '<br>';
            $dprice2_str = $func->price_str(0 - $discount_info['static_discount']['dprice']);
            #$dis_info .= $_M['word']['app_shop_order_free'] . '<div class="col-sm-3 red-600 text-xs-right">'.$dprice2_str.'</div>' ;
            $dis_info .= $_M['word']['app_shop_order_free'] .$dprice2_str ;
		}

        $this->input['dis_info'] = $dis_info;

        $session = load::sys_class('session', 'new');
		if($session->get('generate_user') && $_M['user']['email'] == '' && preg_match("/yk\d{8}/", $_M['user']['username'])){
			$this->input['need_email'] = true;
		}else{
			$this->input['need_email'] = false;
			$session->set('generate_user',null);
		}
		$shopv2_html_base_pay_index_form = load::plugin('doshopv2_html_base_pay_index_form', 1, array($html=>''));//加载插件
		$this->input['cidlist']=$_M['form']['cidlist'];
		$this->input['pgoods']=$pgoods;
		require_once $this->view('app/shop_pay_index',$this->input);
		die();
	}

	public function get_pay($pidlist) {
		$cart = $this->cart->cart_list();
        $cart = $this->cart->analysis_array($cart);
		$cidlist = '-'.$pidlist.'-';
		$pgoods = array();
		foreach($cart as $key=>$val){
			if(stripos($cidlist, '-'.$val['id'].'-') !== false)$pgoods[] = $val;
		}
		$price = load::own_class('web/class/web_func', 'new')->price_plugin($pgoods);
		$pgoods = load::own_class('web/class/web_func', 'new')->price_plugin_data($pgoods, $price);
		$pgoods = load::plugin('doshopv2_pay_goods', 1, array('pgoods'=>$pgoods));
		return $pgoods;
	}

	public function is_consignee_display($p) {
		foreach($p as $key=>$val){
			if($val['logistic'])return true;
		}
		return false;
	}

	public function is_stock_display($p) {
		foreach($p as $key=>$val){
			if($val['buy_ok'] == 0)return false;
		}
		return true;
	}

	public function is_invoice($p){
		$array = array();
		foreach($p as $key=>$val){
			if($val['lnvoice'] == 1)$array[] = $val;
		}
		return $array;

	}

	public function is_purchase($p){
		$purchase_list = load::own_class('web/class/web_goods', 'new')->purchase_list($p);
		foreach($p as $key=>$val){
			$cart_now[$val['pid']] += $val['amount'];
		}
		foreach($purchase_list as $key=>$val){
			if($cart_now[$key] > $val){
				return false;
			}
		}
		return true;
	}

	public function total_price($p) {
		$price = load::own_class('web/class/web_func', 'new')->price_plugin($p);
		$total_price = $price['goods']['total'];
		return $total_price;
	}

	public function total_freight(&$p, $add, $invoice = 0) {
		$price = 0;
        $web_freight = load::own_class('web/class/web_freight', 'new');

        $freight_mould = array();
        $static_freight = 0;
        $type = 2;
        foreach ($p as $val){
            if(!in_array($val['freight_mould'],$freight_mould)){
                $freight_mould[] = $val['freight_mould'];
            }

            if($type == 1){
            	//取最高运费
                if($val['freight'] && $static_freight <= $val['freight']){
                    $static_freight = $val['freight'];
                }
            }elseif ($type == 2){
            	//运费叠加
                if($val['freight']){
                    $static_freight = $static_freight + $val['freight'];
                }
            }

        }
        $freight_list = array();
        foreach ($freight_mould as $k=>$mod) {
            foreach ($p as $key=>$val) {
                if ($val['freight_mould'] == $mod) {
                    $freight_list[$k]['amount'] += $freight_list[$k]['amount'] + $val['amount'];
                    $freight_list[$k]['freight_mould'] = $mod;
                }
            }
        }
        foreach($freight_list as $key=>$val){
            if($val['freight_mould']){
                $val['freight'] = $web_freight->get_freight($val['freight_mould'], $val['amount'], $add);
            }
            $freight_list[$key]['freight'] = $val['freight'] ? $val['freight'] : 0;
            $price += $val['freight'];
        }

        $price = $price + $static_freight;

		/*foreach($p as $key=>$val){
			if($val['freight_mould']){
				$val['freight'] = $web_freight->get_freight($val['freight_mould'], $val['amount'], $add);
			}
			$p[$key]['freight'] = $val['freight'] ? $val['freight'] : 0;
			$price += $val['freight'];
		}*/
		if($invoice == 1 && $price == 0){
			$price = $web_freight->get_invoice_freight($add);
		}
		return $price;
	}

	/*订单结算*/

	/*充值*/

	/*public function dorecharge(){
		global $_M;
		require_once $this->view('app/shop_recharge_index',$this->input);
	}

	public function dopayrecharge(){
		global $_M;
		$web_order = load::own_class('web/class/web_order', 'new');
		if($_M['form']['price']){
			$price = array();
			$price['tprice'] = $_M['form']['price'];
			if(floatval($price['tprice']) <= 0){
				okinfo($_M['url']['shop_recharge_index'], $_M['word']['app_shop_precmoney']);
			}
			$order = $web_order->analysis($web_order->insert_order('2', $price));
		}else{
			$order = $web_order->analysis($web_order->get_order_by_user_id($_M['form']['id']));
		}
		if($order['state'] != 1){
			okinfo($_M['url']['shop_order'], $_M['word']['app_shop_havepay']);
		}
		$pay_list = load::mod_class('pay/web/include/class/interface_pay', 'new')->get_pay_list();

		foreach($pay_list as $key=>$val){
			$pay_list[$key]['url'] = "{$_M['url']['shop_pay_payment']}&id={$order[id]}&type={$key}";
		}
		if($pay_list['weixin']['url']){
			$pay_list['weixin']['check_url'] = $pay_list['weixin']['check_url'].$order['orderid'];
		}
		if($pay_list['weixin_h5']['url']){
			$pay_list['weixin_h5']['check_url'] = $pay_list['weixin_h5']['check_url'].$order['orderid'];
		}
		$this->input['order']=$order;
		$this->input['pay_list']=$pay_list;
		require_once $this->view('app/shop_recharge_pay',$this->input);
	}*/
	///*充值*/

    public function dopayment($order)
    {
        global $_M;
        $web_order = load::own_class('web/class/web_order', 'new');
        $web_goods = load::own_class('web/class/web_goods', 'new');

        if ($order['state'] != 1) {
            $this->ajax_error($_M['word']['app_shop_havepay']);
        }

        if (!$web_order->is_order_pay($order)) {
            $this->ajax_error($_M['word']['app_shop_nosckpce']);
        }

		$goods_list = $web_order->get_goods_list($order['id']);
        //类型 1为购买
        $goods_str = '';
        $goods_id = '';
        foreach ($goods_list as $key => $val) {
            $goods_str .= "{$val['pname']}";
            $goods_str .= " [{$val['splist_value_str']}] ";
            $goods_str .= "*{$val['pamount']} ";
            $goods_id .= "{$val['id']},";
        }
        $goods_id = trim($goods_id, ',');

        if (str_length($_M['config']['met_webname']) > '60') {
            $bodytop = '';
        } else {
            $bodytop = $_M['config']['met_webname'];
        }

        $data['body'] = "{$bodytop}{$_M['word']['app_shop_order']}-{$order['orderid']}";
        $data['subject'] = $goods_str;
        $data['out_trade_no'] = $order['orderid'];
        $data['product_id'] = $goods_id;
        $data['no'] = 10043;
        $data['total_fee'] = $order['tprice'];
        $data['callback_url'] = $_M['url']['shop_order_check'] . '&id=' . $order['id'];

        $payclass = load::mod_class('pay/class/pay_op', 'new');
        $payhtml = $payclass->createPayForm($data);
        echo $payhtml;

    }

	public function dopayment_old(){
		global $_M;

		if($_M['form']['id']){
			$order = load::own_class('web/class/web_order', 'new')->get_order_by_user_id($_M['form']['id']);
		}else{

		}
		if($order['state'] != 1){
			$this->ajax_error($_M['word']['app_shop_havepay']);
		}

		if(!load::own_class('web/class/web_order', 'new')->is_order_pay($order)){
			$this->ajax_error($_M['word']['app_shop_nosckpce']);
		}

		if($_M['form']['type'] != 'balance'){
			$goods_list =load::own_class('web/class/web_order', 'new')->get_goods_list($order['id']);
			//类型 1为购买
			if($order['type'] == 1){

				foreach($goods_list as $key=>$val){
					$goods_str.= "{$val['pname']}";
					$goods_str.= "*{$val['pamount']} ";
					$goods_id.= "{$val['id']},";
				}
				$goods_id = trim($goods_id, ',');
			}else{
				// 充值
				$goods_str = "{$_M['word']['app_shop_accountrecharge']}";
				$goods_id = 0;
			}

			if(str_length($_M['config']['met_webname']) > '60'){
				$bodytop = '';
			}else{
				$bodytop = $_M['config']['met_webname'];
			}
			$data['body'] = "{$bodytop}{$_M['word']['app_shop_order']}-{$order['orderid']}";
			$data['subject'] = $goods_str;
			$data['out_trade_no'] = $order['orderid'];
			$data['product_id'] = $goods_id;
			$data['no'] = 10043;
			$data['total_fee'] = $order['tprice'];

			if($order['type'] == 1){
				// $_M['url']['shop']."order.php?a=docheck&lang=".$_M['lang'].'&id='.$order['id']
				$data['return_url'] = $_M['url']['shop_order_check'].'&id='.$order['id'];
			}else{
				$data['return_url'] = $_M['url']['shop_finance'];
			}
			$strcode = load::mod_class('pay/web/include/class/interface_pay', 'new')->data_encode($data);
			$pay_list = load::mod_class('pay/web/include/class/interface_pay', 'new')->get_pay_list();
			foreach($pay_list as $key=>$val){
				$pay_list[$key]['url'] = "{$val['url']}&strcode={$strcode}";
			}
			$this->ajax_success($pay_list[$_M['form']['type']]['url']);
		}else{
			if(md5($_M['form']['password']) == get_met_cookie('password')){
				if(load::own_class('web/class/web_order', 'new')->order_pay($order['orderid'], "balance")){
					//okinfo($_M['url']['shop_order_check']."&id={$order['id']}", $_M['word']['app_shop_payok']);
					$this->ajax_success($_M['url']['shop_order_check']."&id={$order['id']}");
				}else{
					$this->ajax_error($_M['word']['app_shop_payinsufficient']);
				}
			}else{
				$this->ajax_error($_M['word']['app_shop_passno']);
			}

		}

		$this->ajax_error($_M['word']['app_shop_errornopay']);
	}

	public function doguest_order()
	{
		global $_M;

		if(!get_met_cookie('id')) {
			$cart = $this->cart->cart_list();

			$uid = load::own_class('web/class/web_shop_user', 'new')->reg_guest();
			if($uid){
				$cartObj = load::own_class('web/class/web_cart', 'new');
				$cartObj->user = $uid;
				$cidlist = "";
				foreach ($cart as $key => $v) {
					unset($v['id']);
					$cid = $cartObj->save_cart($v);
					$cidlist.=$cid."-";
				}
				$url = $_M['url']['shop_pay']."&cidlist=".$cidlist;
				setcookie('cart','',time()-3600,'/');
				$this->ajax_success($url);
			}else{
				$this->ajax_error('generate error');
			}

		}
	}

	public function dologin()
	{
		global $_M;

		$this->userclass = load::sys_class('user','new');
		$user = $this->userclass->login_by_password($_M['form']['username'],  $_M['form']['password']);
		if($user){

			$this->userclass->set_login_record($user);
			$cookieObj = load::own_class('web/class/web_cart', 'new');
			$cidlist = $cookieObj->move_cookie($user['id']);

			$url = $_M['url']['shop_pay']."&cidlist=".$cidlist;
			echo json_encode(array('status'=>1,'msg'=>$url));die;
		}else{
			echo json_encode(array('status'=>0,'msg'=>$_M['word']['membererror1']));die;
		}

	}


	/*订单下单*/
	public function doplaceorder(){
		global $_M;
        $web_goods = load::own_class('web/class/web_goods', 'new');
        $web_order = load::own_class('web/class/web_order', 'new');
        $web_remind = load::own_class('web/class/web_remind', 'new');

        if(!$_M['form']['paytype']){
            $this->ajax_error($_M['word']['app_shop_pay_type_off']);
        }
		load::plugin('doshopv2_placeorde_start');

		$pgoods = $this->get_pay($_M['form']['cidlist']);
		if(!$this->is_stock_display($pgoods)){
			$this->ajax_error($_M['word']['app_shop_lowstocks']);
		}
		if(!$this->is_purchase($pgoods)){
			$this->ajax_error($_M['word']['app_shop_lowpurchase']);
		}
		if($_M['form']['discount']){
            $discount_class = load::own_class('web/class/web_discount', 'new');
            $dis = $discount_class->get_coupon_by_id($_M['form']['discount']);
			if(!$discount_class->is_ues_discount(get_met_cookie('id'), $dis, $pgoods)){
				$this->ajax_error($_M['word']['app_shop_nodiscounts']);//没有符合条件的优惠券
				$dis = array();
			}
		}else{
			$dis = array();
		}

		if($this->is_stock_display($pgoods) && $pgoods){
			//地址处理
			if($this->is_consignee_display($pgoods) || $_M['form']['invoice_is']){
				$add = load::own_class('web/class/web_address', 'new')->get_address_by_id($_M['form']['addressid']);
				$address['tel'] = $add['tel'] ? $add['tel'] : get_met_cookie('tel');
				$address['email'] = $add['email'] ? $add['email'] : get_met_cookie('email');
				$address['address'] = jsonencode(array($add['name'], "{$add['zone_p']} {$add['zone_c']} {$add['zone_d']} {$add['zone_a']}", $add['tel'], $add['fixed'], $add['email']));
			}else{
				$address['tel'] = get_met_cookie('tel');
				$address['email'] = get_met_cookie('email');
				$address['address'] = '';
			}

			$session = load::sys_class('session','new');
			$userclass = load::sys_class('user','new');
			if($session->get('generate_user') && $_M['form']['email']){

				$generate_user = $session->get('generate_user');
				$userclass->editor_uesr_email($generate_user['uid'], $_M['form']['email']);
				$jmail = load::sys_class('jmail', 'new');
				$body = "<p>{$_M['word']['app_shop_email_content1']}{$_M['config']['met_webname']}{$_M['word']['app_shop_email_content2']}{$_M['config']['met_webname']}{$_M['word']['app_shop_email_content3']}。</p>";
				$body .= "<p>{$_M['word']['app_shop_email_content4']}：{$_M['url']['site']}member/login.php?lang={$_M['lang']}</p>";
				$body .= "<p>{$_M['word']['app_shop_email_content5']}：{$generate_user['username']}</p>";
				$body .= "<p>{$_M['word']['app_shop_email_content6']}：{$generate_user['password']}</p>";
				$send = $jmail->send_email($_M['form']['email'], $_M['word']['app_shop_email_title'], $body);
				$session->set('generate_user',null);
			}

			//购买商品
			foreach($pgoods as $key=>$val){
				$pgoods[$key]['message_input']  = '';
				$lists = array();
				foreach($val['message'] as $keymessage=>$valmessage){
					$keyword = "msg_{$val['id']}_{$val['pid']}_{$keymessage}";
					$list = array();
					$list['title'] = $valmessage['name'];
					$list['info'] = $_M['form'][$keyword];
					$lists[] = $list;
				}
				$pgoods[$key]['message_input'] = jsonencode($lists);
			}

			//各种价格
			$price['price'] = $this->total_price($pgoods);
			$price['cprice'] = 0;
			if($dis['par']){
				$price['discount_id'] = $dis['id'];
				$price['discount'] = 0 - $dis['par'];
				$price['discount_info'] = $dis['name'];
			}else{
				$price['discount_id'] = 0;
				$price['discount'] = 0;
				$price['discount_info'] = '';
			}

            //多件商品打折优惠
            $web_discount = load::own_class('web/class/web_discount', 'new');
			$cprice1  = $web_discount->amount_discount($pgoods,$price['price']);
            $discount_info = $web_discount->amount_discount_info;

			$price['cprice'] = $price['cprice'] + $cprice1;

            //运费
            $price['freight'] = $this->total_freight($pgoods, $add, $_M['form']['invoice_is']);
			$price['tprice'] = $price['price'] + $price['freight'] + $price['discount'] + $price['cprice'];
            $price['tprice'] = $price['tprice'] < 0 ? 0 : $price['tprice'];
			//付款方式
			$paytype = $_M['form']['paytype'];
			$message = $_M['form']['message'];
			//发票
			if($_M['form']['invoice_is']){
				$invoice[] = $_M['form']['invoice_type'];
				$invoice[] = $_M['form']['invoice_title'];
				$invoice[] = $_M['form']['invoice_credit_code'];
				$invoice[] = $_M['form']['invoice_con'];
			}else{
				$invoice = '';
			}
			$invoice = jsonencode($invoice);

			foreach($pgoods as $key=>$val){
				if ($val['para_str']) {
					$valuelist = explode(',', $val['para_str']);
					$splist = $web_goods->get_splist_by_spec($val['pid'], $valuelist);
				}

                $pgoods[$key]['splist_id'] = $splist['id'];

                //库存变更
				if($_M['config']['shopv2_stock_type']) {
					$web_goods->goods_stock($val['pid'], $splist, 0 - $val['amount']);
				}
			}

			$order = $web_order->insert_order('1', $price, $pgoods, $paytype, $invoice, $message, $address);

			$clear = $this->cart->clear_cart($_M['form']['cidlist']);
            $web_remind->user_nopay($order);	//邮件通知
            $web_remind->admin($order);			//邮件通知
			load::plugin('doshopv2_placeorde_end', 0, array('order'=>$order));
			if($paytype == 1){
				//在线支付
				$this->ajax_success($_M['url']['shop_pay_payorder']."&id={$order['id']}");
			}else{
				//其他途径支付
				$this->ajax_success($_M['url']['shop_order']);
			}
		}else{
			$this->ajax_error($_M['word']['app_shop_lowstocks']);
		}
	}
	public function dopayorder(){
		global $_M;
		$orderid = $_M['form']['id'];
		$order = load::own_class('web/class/web_order', 'new')->get_order_by_user_id($_M['form']['id']);
        $this->input['order'] = load::own_class('web/class/web_order', 'new')->analysis($order);
        if(!$order['id']){
            okinfo($_M['url']['shop_order'], $_M['word']['app_shop_noopaccess']);
        }
        if($order['state'] != 1){
            okinfo($_M['url']['shop_order'], $_M['word']['app_shop_havepay']);
        }

        if(!load::own_class('web/class/web_order', 'new')->is_order_pay($order)){
            okinfo($_M['url']['shop_order'], $_M['word']['app_shop_nosckpce']);
        }
        $goods_list = load::own_class('web/class/web_order', 'new')->get_goods_list($order['id']);

        $this->input['goods_list'] = $goods_list;
        $this->input['user_have_balance'] = $_M['user']['balance'] >= $order['price']?1:0;
        foreach($goods_list as $key=>$val){
            $goods_str.= "{$val['pname']}";
            $goods_str.= "*{$val['pamount']} ";
        }

        $this->dopayment($order);
        die();


        /*$this->input['pay_list'] = load::mod_class('pay/web/include/class/interface_pay', 'new')->get_pay_list();
        foreach($this->input['pay_list'] as $key=>$val){
            $this->input['pay_list'][$key]['url'] = "{$_M['url']['shop_pay_payment']}&id={$order[id]}&type={$key}";
        }
        if($this->input['pay_list']['weixin']['url']){
            $this->input['pay_list']['weixin']['check_url'] = $this->input['pay_list']['weixin']['check_url'].$order['orderid'];
        }
        if($this->input['pay_list']['weixin_h5']['url']){
            $this->input['pay_list']['weixin_h5']['check_url'] = $this->input['pay_list']['weixin_h5']['check_url'].$order['orderid'];
        }

        require_once $this->view('app/shop_pay_order',$this->input);*/
	}

	public function do_ajax_total(){
		global $_M;
        $func = load::own_class('web/class/web_func', 'new');
        $web_discount = load::own_class('web/class/web_discount', 'new');


        $pgoods = $this->get_pay($_M['form']['cidlist']);
        $amount = 0;
        foreach($pgoods as $val){

            $amount = $amount+$val['amount'];
        }
        $price['amount'] = $amount;

        $price['price'] = $this->total_price($pgoods);
		$dis = $web_discount->get_dis_by_price_did($_M['form']['discount'],$price['price']);

        $price['cprice'] = 0;

        if($dis['par']){
			$price['discount_id'] = $dis['id'];
			$price['discount'] = 0 - $dis['par'];
			$price['discount_info'] = $dis['name'];
		}else{
			$price['discount_id'] = 0;
			$price['discount'] = 0;
			$price['discount_info'] = '';
		}

        //固定折扣  数量折扣
        $price['cprice'] = $web_discount->amount_discount($pgoods, $price['price']);
        $discount_info = $web_discount->amount_discount_info;

        $add = load::own_class('web/class/web_address', 'new')->get_address_by_id($_M['form']['addressid']);
		$price['freight'] = $this->total_freight($pgoods, $add, $_M['form']['invoice_is']);
		$price['tprice'] = $price['price'] + $price['freight'] + $price['discount'] + $price['cprice'];

        $price['price_str'] = $func->price_str($price['price']);			//原价
        $price['freight_str'] = $func->price_str($price['freight']);		//运费
        $price['discount_str'] = $func->price_str($price['discount']);		//优惠券
        $price['cprice_str'] = $func->price_str($price['cprice']);			//折扣
        $price['tprice_str'] = $func->price_str($price['tprice']);			//订单总价
        #$price = load::plugin('doshopv2_order_total', 1, array('price'=>$price));
        echo jsonencode($price);
		die();
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

	public function response($url,$msg='',$status=0) {
		global $_M;
		$info = array();
		$info['status'] = $status;
		$info['url'] = $url;
		$info['msg'] = $msg;
		echo jsonencode($info);die;
	}
	public function check(){}

	public function dochoose()
	{
		global $_M;
		if(get_met_cookie('id')){
			header("location:{$_M['url']['shop_pay']}");die;
		}else{
			require_once $this->view('app/shop_login_choose',$this->input);
		}

	}

}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>
