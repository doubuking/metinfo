<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::sys_func('str');
load::sys_func('array');
class web_order {

	public $lang;
	public $state;
    public $web_func;
    public $web_goods;

	public function __construct() {
		global $_M;
		$this->lang = $_M['lang'];
        $this->web_func = load::own_class('web/class/web_func', 'new');
        $this->web_goods = load::own_class('web/class/web_goods', 'new');
        $this->auto_change_state();
    }

	public function get_order_list($where, $order, $limit_start, $limit_num){
		global $_M;
		$where = "lang = '{$this->lang}' AND type=1 {$where}";
		if($limit_start==''&&!$limit_num){
			return DB::get_all("SELECT * FROM {$_M['table']['shopv2_order']} WHERE {$where} ORDER BY {$order}");
		}else{
			return DB::get_data($_M['table']['shopv2_order'], $where, $order, $limit_start, $limit_num);
		}
	}

	public function get_order_total($where){
		global $_M;
		$where = "lang = '{$this->lang}' AND type=1 {$where}";
		return DB::counter($_M['table']['shopv2_order'], $where);
	}

	/**
	 * 当前用户当前商品已购买总数
	 * @DateTime 2017-08-30
	 * @param    int   $uid 当前登录用户id
	 * @param    int   $pid 当前商品pid
	 * @return   int   已购买总数
	 */
	public function get_order_amount($uid,$pid){
		global $_M;
		$query = "SELECT sum(a.pamount) as total FROM {$_M['table']['shopv2_order_goods']} a LEFT JOIN {$_M['table']['shopv2_order']} b ON a.rid = b.id WHERE b.uid = {$uid} AND a.pid = {$pid}";
		$res = DB::get_one($query);
		if($res){
			return $res['total'];
		}else{
			return 0;
		}
	}

	public function get_order_by_id($id){
		global $_M;
		$query = "SELECT * FROM {$_M['table']['shopv2_order']} WHERE id='{$id}'";
		$list = DB::get_one($query);
		return $list;
	}

	public function get_order_by_user_id($id){
		$order = $this->get_order_by_id($id);
		if($order['uid'] == get_met_cookie('id')){
			return $order;
		}else{
			return false;
		}
	}

	public function get_order_by_rid($rid){
		global $_M;
		$query = "SELECT * FROM {$_M['table']['shopv2_order']} WHERE orderid='{$rid}'";
		$list =  DB::get_one($query);
		return $list;
	}

	public function json_order_list($where, $order){
		global $_M;
		$this->table = load::sys_class('tabledata', 'new');
		$where = "lang='{$_M['lang']}' AND type=1 {$where}";
		$data = $this->table->getdata($_M['table']['shopv2_order'], '*', $where, $order);
		$data = $this->analysis_array($data);
		return $data;
	}

	public function json_return($data){
		$this->table->rdata($data);
	}

	public function get_pay_type($paytype){
        global $_M;
		switch($paytype){
			case 1:
				return $_M['word']['app_shop_paymentonline'];
			break;
			case 2:
				return $_M['word']['app_shop_paymentcod'];
			break;
			case 3:
				return $_M['word']['app_shop_company_pay'];
			break;
		}
		return "unknow";
	}

	public function get_invoice_type($paytype){
		global $_M;
		switch($paytype){
			case 1:
				return $_M['word']['app_shop_normal_invoice'];
			break;
			case 2:
				return $_M['word']['app_shop_online_invoice'];
			break;
			case 3:
				return $_M['word']['app_shop_tax_invoice'];
			break;
		}
	}

	public function analysis_array($data){
		foreach($data as $key=>$val){
			$data[$key] = $this->analysis($val);
		}
		return $data;
	}

	public function analysis($list){
		global $_M;
		$list['paytype_str'] = $this->get_pay_type($list['paytype']);
		switch($list['state']){
			// 缺货退款
			case -2:
				$list['state_str'] = "<span class='tag tag-dark'>{$_M['word']['app_shop_nogoods']}</span>";
				$list['state_txt'] = $_M['word']['app_shop_nogoods'];
			break;
			// 退款中 退换货
			case -1:
				$list['state_str'] = '<span class="tag tag-danger">'.$_M['word']['app_shop_app_shop_refund'].'</span>';
				$list['state_txt'] = $_M['word']['app_shop_order_refunding'];
			break;
			// 已关闭
			case 0:
				$list['state_str'] = '<span class="tag tag-default">'.$_M['word']['app_shop_closed'].'</span>';
				$list['state_txt'] = $_M['word']['app_shop_closed'];
			break;
			case 1:
				$list['state_str'] = '<span class="tag tag-warning">'.$_M['word']['app_shop_bepaid'].'</span>';
				$list['state_txt'] = $_M['word']['app_shop_bepaid'];
			break;
			// 待发货
			case 2:
				if($list['paytype'] == 1){
					$list['state_str'] = '<span class="tag tag-danger">'.$_M['word']['app_shop_bedeliver'].'</span>';
					$list['state_txt'] = $_M['word']['app_shop_bedeliver'];
				}else if($list['paytype'] == 2){
					$list['state_str'] = '<span class="tag tag-danger">'.$_M['word']['app_shop_paymentcod'].'</span>';
					$list['state_txt'] = $_M['word']['app_shop_paymentcod'];
					if(!defined('IN_ADMIN')){
						$list['state_str'] = '<span class="tag tag-danger">'.$_M['word']['app_shop_bedeliver'].'</span>';
						$list['state_txt'] = $_M['word']['app_shop_bedeliver'];
					}
				}else if($list['paytype'] == 3){
					// 公司转账
					$list['state_str'] = '<span class="tag tag-danger">'.$_M['word']['app_shop_company_pay'].'</span>';
					$list['state_txt'] = $_M['word']['app_shop_company_pay'];
				}else if($list['paytype']==='0'){
					//货到付款
                    $list['state_str'] = '<span class="tag tag-danger">'.$_M['word']['app_shop_bedeliver'].'</span>';
                    $list['state_txt'] = $_M['word']['app_shop_bedeliver'];
				}
			break;
			// 已发货
			case 3:
				$list['state_str'] = '<span class="tag tag-primary">'.$_M['word']['app_shop_over_deliver'].'</span>';
				$list['state_txt'] = $_M['word']['app_shop_over_deliver'];
			break;
			case 4:
				$list['state_str'] = '<span class="tag tag-success">'.$_M['word']['app_shop_order_over'].'</span>';
				$list['state_txt'] = $_M['word']['app_shop_order_over'];
			break;
		}
		$list['rtime_str'] = date("Y-m-d H:i:s", $list['rtime']);
		$list['ptime_str'] = $list['ptime'] ? date("Y-m-d H:i:s", $list['ptime']):"";
		$list['stime_str'] = $list['stime'] ? date("Y-m-d H:i:s", $list['stime']):"";
		/*
		$list['logistics_str'] = "{$list['cinfo']}{$list['oinfo']}<span class=\"dropdown\">
						  <button class=\"btn btn-default dropdown-toggle express\" type=\"button\" id=\"dropdownMenu1\"  aria-haspopup=\"false\" aria-expanded=\"true\" data-info=\"{$list['cinfo']}|{$list['oinfo']}\">
							查看详细
						  </button>
						  <ul class=\"dropdown-menu div_express\" aria-labelledby=\"dropdownMenu1s\" style=\"width:500px;margin:5px 0px 0px 4px\">
							加载中。。。。
						  </ul>
						</span>";
		*/
		if($list['reason']){
            $reason = jsondecode($list['reason']);
            $list['refund_reason'] = $reason['refund_reason'];
            $list['cancel_reason'] = $reason['cancel_reason'];
            $list['refund_detail'] = $reason['detail'];
            $list['imgs'] = explode('|', $list['imgs']);
		}
		if($list['cinfo']){
			$list['logistics_str'] = "<span>{$list['cinfo']}：{$list['oinfo']}</span>";
		}else{
			$list['logistics_str'] = "";
		}
		if($list['paytype'] == 1){
			$list['paytype_str'] = $_M['word']['app_shop_paymentonline'];
		}else{
			$list['paytype_str'] = $_M['word']['app_shop_paymentcod'];
		}
		$list['tprice_str'] = $this->web_func->price_str($list['tprice']);
		$list['price_str'] = $this->web_func->price_str($list['price']);
		$list['cprice_str'] = $this->web_func->price_str($list['cprice']);
		$list['discount_str'] = $this->web_func->price_str($list['discount']);
		$list['freight_str'] = $this->web_func->price_str($list['freight']);

		$address = jsondecode($list['address']);
		if($address){
			$list['address'] = $address;
			$list['address_str'] = "{$list['address'][0]} {$list['address'][2]} {$list['address'][1]}";
		}else{
			$list['address_str'] = $_M['word']['app_shop_nologistics'];
		}
		if($list['invoice'] == '0'){
			$list['invoice_info'] = array();
			$list['invoice_str'] = "<span class=\"order-invoice\">{$_M['word']['app_shop_unwanted']}{$_M['word']['app_shop_invoice']}</span>";
		}else{
			if($list['invoice_info']){
				$invoice_info = jsondecode($list['invoice_info']);
				$list['invoice_type'] = $invoice_info[0];
				$invoice_info[0] = $this->get_invoice_type($invoice_info[0]);
				$list['invoice_info'] = $invoice_info;
			}
		}
		if($_M['config']['shopv2_order_auto_close']){
			$list['countdown'] = $list['rtime']+($_M['config']['shopv2_order_auto_close_time']*60);
            $list['countdown'] = $this->gettime(time(),$list['countdown']);
		}
		return $list;
	}

	public function gettime($time_s,$time_n){
        global $_M;
        $strtime = '';
		$time = $time_n-$time_s;
		if($time >= 86400){
			return $strtime = date('Y-m-d H:i:s',$time_n);
		}
		if($time >= 3600){
            $app_shop_hour = $_M['word']['app_shop_hour'];
            #$strtime .= intval($time/3600).$_M['word']['app_shop_hour'];
            $strtime .= intval($time/3600).$app_shop_hour;
            $time = $time % 3600;
        }else{
            $strtime .= '';
        }
        if($time >= 60){
            $app_shpo_minute = $_M['word']['app_shop_minute'];
			#$strtime .= intval($time/60).$_M['word']['app_shpo_minute'];
			$strtime .= intval($time/60).$app_shpo_minute;
			$time = $time % 60;
		}else{
			$strtime .= '';
		}
		return $strtime;
	}

	public function save_order($info){
		global $_M;
		$keys = $this->save_order_key();
		$sql = '';

		foreach($keys as $key=>$val){
			if(isset($info[$val]) && $val!='id')$sql .= "{$val}='{$info[$val]}',";
		}
		$sql = trim($sql, ',');
		if($info['id']){
			$query = "UPDATE  {$_M['table']['shopv2_order']} SET {$sql} WHERE id='{$info['id']}'";
            DB::query($query);
		} else {
			$query = "INSERT INTO {$_M['table']['shopv2_order']} SET {$sql},lang = '{$this->lang}'";
			DB::query($query);
		}
	}

	public function save_goods($info){
		global $_M;
		$keys = $this->save_goods_key();
		$sql = '';

		foreach($keys as $key=>$val){
			if(isset($info[$val]) && $val!='id')$sql .= "{$val}='{$info[$val]}',";
		}
		$sql = trim($sql, ',');
		if($info['id']){
				//$query = "UPDATE  {$_M['table']['shopv2_order_goods']} SET {$sql} WHERE id='{$info['id']}'";
				//DB::query($query);
		} else {
				$query = "INSERT INTO {$_M['table']['shopv2_order_goods']} SET {$sql}";
				DB::query($query);
		}
	}
	public function save_order_key(){
		return array('id', 'orderid', 'type', 'uid', 'username', 'state', 'restate', 'tel', 'email', 'message', 'address', 'price', 'cprice', 'tprice', 'discount','discount_info', 'freight', 'cinfo_diy', 'cinfo', 'oinfo', 'paytype', 'payinfo', 'invoice', 'invoice_info', 'remark', 'rtime', 'ptime', 'stime', 'ctime', 'search', 'reason', 'imgs');
	}

	public function save_goods_key(){
		return array('pid', 'pname', 'pamount', 'puprice', 'rid', 'para', 'splist_id', 'message', 'freight', 'price', 'auto_sent');
	}

    /**
     * @param $id	orderid
     * @param $orderid
     * @return array
     */
	public function get_goods_list($id){
		global $_M;
        $web_cards = load::own_class('web/class/web_card', 'new');
        $web_cart = load::own_class('web/class/web_cart', 'new');
		$query = "SELECT * FROM {$_M['table']['shopv2_order_goods']} WHERE rid = '{$id}'";
		$goods_list = DB::get_all($query);
		foreach($goods_list as $key=>$val){
			$query = "SELECT * FROM {$_M['table']['product']} WHERE id = '{$val['pid']}'";
			$product_list = DB::get_one($query);
			$goods_list[$key]['url'] = $this->web_goods->get_show_product_url($val['pid'], $product_list['class1']);
            $goods_list[$key]['auto_sent'] = $val['auto_sent'];
            $valuelist = explode(',', $val['para']);
            $splist 			= $this->web_goods->get_splist_by_spec($val['pid'],$valuelist);
            $splist_value 	= $this->web_goods->analysis_spec_valuelist($valuelist);
            $splist_value_str = $this->web_goods->get_spec_valuelist_str($splist_value);

            $goods_list[$key]['splist_value_str'] = $splist_value_str;
            if($splist && $splist['para_img'] != ''){
				$goods_list[$key]['img'] = $splist['para_img'];
			}else{
				$goods_list[$key]['img'] = $product_list['imgurl'];
			}

			$goods_list[$key]['img'] = thumb($goods_list[$key]['img'],$_M['config']['met_productimg_x'],$_M['config']['met_productimg_y']);
			$goods_list[$key]['puprice_str'] = $this->web_func->price_str($val['puprice']);
			$goods_list[$key]['freight_str'] = $this->web_func->price_str($val['freight']);
			$goods_list[$key]['price_str'] = $this->web_func->price_str($val['price']);

			if($val['message']){
				$meassge = @jsondecode($val['message']);
				$goods_list[$key]['message_array'] = $meassge;
				$goods_list[$key]['message']='';
				if($meassge){
					$html = '<ul class="goods-message-list">';
					foreach($meassge as $keymessage=>$valmessage){
							$html .= "<li>{$valmessage[title]}：{$valmessage[info]}</li>";
					}
					$html .= '</ul>';
					$goods_list[$key]['message'] = $html;
				}
			}else{
				$goods_list[$key]['message'] = '<ul class="addr-list"></ul>';
			}

			//获取自动发发货码
            if ($val['auto_sent']) {
                $cards = $web_cards->get_card_by_orderid($val['rid'],$val['pid'],$goods_list[$key]['splist_id']);
                $goods_list[$key]['cards'] = $cards;
            }
		}
		return $goods_list;
	}

    /**
	 *  检测测订单商品是否有自动发货商品
     * @param $id
     * @return bool
     */
    public function is_auto_sent_order($id)
    {
		global $_M;
        $query = "SELECT * FROM {$_M['table']['shopv2_order_goods']} WHERE rid = '{$id}'";
        $goods_list = DB::get_all($query);
        $is_auto_sent = false;
        foreach($goods_list as $key=>$val){
            if ($val['auto_sent']) {
                $is_auto_sent = true;
            }
		}
        return $is_auto_sent;
    }

    /**
	 * 检测是否为混合订单（实体/虚拟）
     * @param $id 订单ID
     * @return bool
     */
    public function check_order_goods($id)
    {
        global $_M;
        $query = "SELECT * FROM {$_M['table']['shopv2_order_goods']} WHERE rid = '{$id}'";
        $goods_list = DB::get_all($query);
        $mix_1 = 0;
        $mix_2 = 0;
        $i = 0;
        foreach($goods_list as $key=>$val){
            if ($val['auto_sent']) {
                $mix_1 = $mix_1+1;
            }else{
                $mix_2 = $mix_2-1;
			}
            $i++;
        }
        if ($mix_1 === $i || $mix_2+$i===0) {
        	//不是混合订单
            return false;
        }else{
        	//是混合订单
            return true;
		}
    }

	public function insert_order($type, $price, $goods, $paytype, $invoice, $message, $address){
        global $_M;
		if($type == 1){
			$info['orderid'] = $this->get_rid();
			$info['type'] = 1;
			$info['uid'] = get_met_cookie('id');
			$info['username'] = get_met_cookie('username');
			$info['state'] = 1;
			$info['price'] = $price['price'];
			$info['cprice'] = $price['cprice'];
			$info['tprice'] = $price['tprice'];

			$info['discount'] = $price['discount'];
			$info['discount_info'] = $price['discount_info'];
			if($info['discount']){
				$info_dis['id'] = $price['discount_id'];
				$info_dis['usetime'] = time();
				load::own_class('web/class/web_discount', 'new')->save_coupon($info_dis);
			}
			$info['freight'] = $price['freight'];
			$info['message'] = $message;
			$info['paytype'] = $paytype;
			if($info['paytype'] != 1){
				$info['state'] = 2;
			}
			if(jsondecode($invoice)){
				$info['invoice'] = 1;
				$info['invoice_info'] = $invoice;
			}else{
				$info['invoice'] = 0;
				$info['invoice_info'] = '';
			}
			$info['tel'] = $address['tel'];
			$info['email'] = $address['email'];
			$info['address'] = $address['address'];
			$info['rtime'] = time();
            $info['ctime'] = time();
			$this->save_order($info);
			$order = $this->get_order_by_rid($info['orderid']);
			$search = "";
			foreach($goods as $key=>$val){
				if($val['amount'] < 0){
					$val['amount'] = 1;
				}
				$ginfo['pid'] 		= $val['pid'];
				$ginfo['pname'] 	= $val['name'];
				$ginfo['pamount'] 	= $val['amount'];
				$ginfo['puprice'] 	= $val['price'];
				$ginfo['rid'] 		= $order['id'];
				$ginfo['para'] 		= $val['para_str'];
				$ginfo['splist_id'] = $val['splist_id'];
				$ginfo['message'] 	= $val['message_input'];
				$ginfo['freight'] 	= $val['freight'];
                $ginfo['auto_sent'] = $val['auto_sent'];
				$ginfo['price'] 	= $val['price'] * $val['amount'] + $val['freight'];
				$search .= $ginfo['pname'].'|';
				$this->save_goods($ginfo);
			}
			$search_array['id'] = $order['id'];
			$order['search'] = $search_array['search'] = $search;
			$this->save_order($search_array);
			// 如果是货到付款 提醒管理员  提醒用户
			if($paytype == 2) {
				load::own_class('web/class/web_remind', 'new')->user_pay($order);
				load::own_class('web/class/web_remind', 'new')->admin($order);
			}
			return $this->get_order_by_rid($info['orderid']);
		}
		if($type == 2){
			$info['orderid'] = $this->get_rid();
			$info['paytype'] = 1;
			$info['type'] = 2;
			$info['uid'] = get_met_cookie('id');
			$info['username'] = get_met_cookie('username');
			$info['state'] = 1;
			$info['tprice'] = $price['tprice'];
			$info['discount'] = 0;
			$info['freight'] = 0;
			$info['rtime'] = time();
			$info['ctime'] = time();
			$this->save_order($info);
			return $this->get_order_by_rid($info['orderid']);
		}
	}

	public function get_rid(){
		$rid = date('YmdHis').random(5, 1);
		return $rid;
	}

	public function order_pay($rid, $payinfo, $price = 0){
		global $_M;
		$order = $this->get_order_by_rid($rid);

		if(bccomp($order['tprice'], $price) !== 0){
			return false;
		}

        $is_autosent = $this->is_auto_sent_order($order['id']);
		if($order['type'] == 1 && $order['state'] == 1){
			$info['id'] =  $order['id'];
			$info['state'] = 2;

            $mix_order = $this->check_order_goods($order['id']);
            if ($is_autosent && !$mix_order) {
                $info['state'] = 3;
            }
			$info['payinfo'] = $payinfo;
			$info['ptime'] = time();

			//财务记录
			/*if($payinfo != 'balance'){
				load::own_class('web/class/web_finance', 'new')->addfinance(1, $order['username'], $price, "{$_M['word']['app_shop_accountrecharge']}「{$payinfo}」 <span class=\"tag tag-default\">{$_M['word']['app_shop_order']}：{$rid}</span>");
			}
			if(!load::own_class('web/class/web_finance', 'new')->addfinance(2, $order['username'], $price, "<span class=\"tag tag-default\">{$_M['word']['app_shop_order']}：{$rid}</span>")){
				return false;
			}*/

			$this->save_order($info);
            $goods_list = $this->get_goods_list($order['id']);

            //库存变更
            if(!$_M['config']['shopv2_stock_type']){
                foreach($goods_list as $key=>$val){
                    if ($val['para']) {
                        $valuelist = explode(',', $val['para']);
                        $val['splist'] = $this->web_goods->get_splist_by_spec($val['pid'], $valuelist);
                    }
                        $this->web_goods->goods_stock($val['pid'], $val['splist'], 0-$val['pamount']);
                }
            }

            //自动发卡
            foreach ($goods_list as $value) {
                if($value['auto_sent']){
                    if ($value['splist_id']) {
                        $splist = $this->web_goods->get_splist_by_id($value['splist_id']);
                    }

                    load::own_class('web/class/web_card', 'new')->send_card($value, $splist, $order);
                }
            }

			load::own_class('web/class/web_shop_user', 'new')->change_goods_list($order['uid'], $goods_list);

			load::own_class('web/class/web_remind', 'new')->user_pay($order);
			load::own_class('web/class/web_remind', 'new')->admin($order);
		}

		//老账户充值
		/*if($order['type'] == 2 && $order['state'] == 1){
			if($payinfo == 'balance'){
				return false;
			}
			$info['id'] =  $order['id'];
			$info['state'] = 4;
			$info['payinfo'] = $payinfo;
			$info['ptime'] = time();
			$info['stime'] = time();
			$this->save_order($info);
			load::own_class('web/class/web_finance', 'new')->addfinance(1, $order['username'], $price, "{$_M['word']['app_shop_accountrecharge']}「{$payinfo}」 <span class=\"tag tag-default\">{$_M['word']['app_shop_order']}：{$rid}</span>");
		}*/
		return true;
	}

	public function is_order_pay($order){
		$goods = $this->get_goods_list($order['id']);
		$goodslist = array();
		foreach($goods as $key=>$val){
			$goodslist[$val['pid']] = $val['pamount'];
			$goods_data[$val['pid']] = $this->web_goods->get_goods_by_pid($val['pid'], 0, 0, 1, 0);

			$info['pid'] = $val['pid'];
			$info['para_str'] = $val['para'];
			$info['amount'] = $val['pamount'];
			$stock_data[$val['pid']] = $info;
		}
		$purchase_list = $this->web_goods->purchase_list($goods_data, $order['uid']);
		foreach($purchase_list as $key=>$val){
			if($goodslist[$key] > $val){
				return false;
			}
		}
		$stock = $this->web_goods->stock_list_array($stock_data, $goods_data);
        foreach($stock as $key=>$val){
            if($val['buy_ok'] == 0)return false;
        }
        /*dump($stock);
        die ;*/
		return true;
	}

	public function auto_change_state(){
		global $_M;
		if($_M['config']['shopv2_order_auto_close']){
			$rtime = time()-$_M['config']['shopv2_order_auto_close_time']*60;
			$now = time();
            $query = "SELECT * FROM {$_M['table']['shopv2_order']} WHERE state='1' and rtime<'{$rtime}' AND type=1;";
            $auto_close_order = DB::get_all($query);
            $query = "UPDATE {$_M['table']['shopv2_order']} SET state='0',ctime='{$now}' WHERE state='1' and rtime<'{$rtime}' AND type=1";
            DB::get_all($query);
            if ($auto_close_order && $_M['config']['shopv2_stock_type']) {
                $this->restore_stock_array($auto_close_order);
            }
		}

		if($_M['config']['shopv2_order_auto_ok']){
			$stime = time()-$_M['config']['shopv2_order_auto_ok_time']*86400;
			$query = "UPDATE {$_M['table']['shopv2_order']} SET state='4' WHERE state='3' and stime<'{$stime}' AND type=1";
			DB::query($query);
		}

		if($_M['config']['shopv2_order_auto_del']){
			$ctime = time()-$_M['config']['shopv2_order_auto_del_time']*86400;
			$query = "SELECT * FROM {$_M['table']['shopv2_order']} WHERE state='0' and ctime<'{$ctime}' AND type=1";
			$orders = DB::get_all($query);
			foreach($orders as $key=>$val){
				$query = "DELETE FROM {$_M['table']['shopv2_order_goods']} WHERE rid='{$val[id]}'";
				DB::query($query);
			}
			$query = "DELETE FROM {$_M['table']['shopv2_order']} WHERE state='0' and ctime<'{$ctime}' AND type=1";
			DB::query($query);
		}

		$time = time()-86400;
		$query = "DELETE FROM {$_M['table']['shopv2_order']} WHERE state='1' and rtime<'{$time}' AND type=2";
		DB::query($query);
	}


	/*
	 * 恢复库存数量
     * @param $orders 订单列表
	 */
	public function restore_stock_array($orders)
	{
        global $_M;
        foreach ($orders as $order) {
            $this->restore_stock($order);
		}
	}

    /**
	 * 恢复库存数量
     * @param $orders 订单
     */
	public function restore_stock($order)
	{
		global $_M;
		$query = "SELECT `id`,`pid`,`para`,`pamount` FROM {$_M['table']['shopv2_order_goods']} WHERE rid='{$order['id']}'";
		$goods =  DB::get_all($query);

		foreach($goods as $key=>$val){
			if ($val['para']) {
				$valuelist = explode(',', $val['para']);
				$splist = $this->web_goods->get_splist_by_spec($val['pid'], $valuelist);
				$this->web_goods->goods_stock($val['pid'], $splist, $val['pamount']);
			}else{
				$prodct = $this->web_goods->get_goods_by_pid($val['pid'], 0, 0, 1, 0);
				$splist = '';
				$this->web_goods->goods_stock($val['pid'], $splist, $val['pamount']);
			}
		}
	}

	public function receipt_goods($oid)
	{
		global $_M;
		$order = $this->get_order_by_user_id($oid);
		$uid = get_met_cookie('id');

		if($order){
			$query = "UPDATE {$_M['table']['shopv2_order']} SET state = 4 WHERE uid = {$uid} AND id = {$oid}";
			if(DB::query($query)){
				return array('status'=>1,'msg'=>$_M['word']['app_shop_success']);
			}else{
				return array('status'=>0,'msg'=>mysqli_error());
			}
		}else{
			return array('status'=>0,'msg'=>$_M['word']['app_shop_error']);
		}

	}

}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>
