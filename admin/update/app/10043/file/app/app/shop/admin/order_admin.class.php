<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::sys_class('app');

class order_admin extends app {
	public $order;
	public function __construct() {
		parent::__construct();
		global $_M;
		$this->order = 	load::own_class('admin/class/sys_order', 'new');
		$this->converse = 	load::own_class('admin/class/sys_converse', 'new');
		//$this->order->auto_change_state($list);
	}
	//获取订单列表
	public function dojson_order_list(){
		global $_M;
        $search = $_M['form']['state']!=''?"and state = '{$_M['form']['state']}'":'';
        if($_M['form']['state'] < 0){
            $search ="and state < 0";
        }
        $search.= $_M['form']['keyword']?"and (orderid like '%{$_M['form']['keyword']}%' || username like '%{$_M['form']['keyword']}%')":'';
		$stime = $_M['form']['fromtime'] ? strtotime($_M['form']['fromtime'].' 00:00:00') : 0;
		$etime = $_M['form']['totime'] ? strtotime($_M['form']['totime'].' 23:59:59') : time();
		$search.=" AND rtime BETWEEN {$stime} AND {$etime}";
		$order = " rtime DESC ";
		$data = $this->order->json_order_list($search, $order);
		foreach($data as $key=>$val){
			$list = array();
			$goods = $this->order->get_goods_list($val['id']);
			$content = '';
			$count = count($goods);
			$counttxt = $count>1?"{$_M['word']['app_shop_order_count_tips1']} {$count} {$_M['word']['app_shop_order_count_tips2']}":'';
			foreach($goods as $val_goods){
				$val_goods['puprice'] = load::own_class('web/class/web_func', 'new')->price_str($val_goods['puprice']);

				$goods_img = thumb($val_goods['img'],$_M['config']['met_productimg_x'],$_M['config']['met_productimg_y']);
				$content = "
					<div class=\"media\">
						<div class=\"media-left\">
							<img data-original=\"{$goods_img}\" class=\"media-object\" />
						</div>
						<div class=\"media-body\">
						  <h4 class=\"media-heading\">
							{$val_goods['pname']}
							<div>{$val_goods['puprice']}<p>( {$val_goods['pamount']} {$_M['word']['app_shop_order_item']} )</p></div>
						  </h4>
						  <div>{$val_goods['splist_value_str']} {$val_goods['message']}</div>
						</div>
					</div>
				";
				if($counttxt) $content.="<div class=\"m-t-5\">{$counttxt}</div>";
				break;
			}
			$val['invoice_info_html'] = $val['invoice']?"<span class=\"label label-primary\">{$_M['word']['app_shop_order_invoice']}</span>":'';
			$list[] = "
				<div class=\"slidepanel_box\" data-url=\"{$_M['url']['own_form']}&a=docheck&id={$val[id]}\">
					<span class=\"tag tag-outline tag-default\">{$_M['word']['app_shop_order_no']} : {$val['orderid']}</span>
					{$val['invoice_info_html']}
					{$content}
				</div>
			";
			$list[] = $val['username'];
			$list[] = $val['rtime_str'];
			$list[] = $val['state_str'];
			$list[] = $val['tprice_str'];
			$rarray[] = $list;
		}

		for ($i = -1; $i <= 4; $i++) {
			$this->order->table->rarray["state"][$i] = $this->order->get_order_total("and state = '{$i}'");
		}
		$this->order->json_return($rarray);
	}

	//订单概况
	public function doindex(){
		global $_M;

		$this->order_stat = load::own_class('admin/class/sys_order_stat', 'new');
		$this->order->auto_statistics();

		$last  = $this->order_stat->last;
		$data['first'] = $this->order_stat->first;
		/*订单数*/
		$data['order_per'] = floor(($data['first']['sum']['order_number']-$last['sum']['order_number'])/$last['sum']['order_number']*100);
		if($data['order_per']==0){
			$order_i   = 'hide';
		}else{
			$order_i   = $data['order_per']>0?'text-danger wb-triangle-up':'text-success wb-triangle-down';
			if($data['order_per']>0)$data['order_per'] = '+'.$data['order_per'];
		}
		/*收入*/
		$data['income_per'] = floor(($data['first']['sum']['income']-$last['sum']['income'])/$last['sum']['income']*100);
		if($data['income_per']==0){
			$data['income_i'] = 'hide';
		}else{
			$data['income_i'] = $data['income_per']>0?'text-danger wb-triangle-up':'text-success wb-triangle-down';
			if($data['income_per']>0)$data['income_per'] = '+'.$data['income_per'];
		}
		$data['income_price'] = load::own_class('web/class/web_func', 'new')->price_str($data['first']['sum']['income']);
		/*下单人数*/
		$data['order_user_per'] = floor(($data['first']['sum']['order_user']-$last['sum']['order_user'])/$last['sum']['order_user']*100);
		if($data['order_user_per']==0){
			$order_user_i = 'hide';
		}else{
			$order_user_i = $data['order_user_per']>0?'text-danger wb-triangle-up':'text-success wb-triangle-down';
			if($data['order_user_per']>0)$data['order_user_per'] = '+'.$data['order_user_per'];
		}
		/**/
		$dayslotjson['order'] = $this->order_stat->dayslotorder();
		$dayslotjson['income'] = $this->order_stat->dayslotincome();
		$dayslotjson['weekorder'] = $this->order_stat->weekslotorder();
		$dayslotjson['weekincome'] = $this->order_stat->weekslotincome();
		$dayslotjson['monthorder'] = $this->order_stat->monthslotorder();
		$dayslotjson['monthincome'] = $this->order_stat->monthslotincome();
		$monthdays = array();
		for($i=0;$i<date('t',time());$i++){
			$monthdays[]=$i+1;
		}
		$dayslotjson['monthdays'] = $monthdays;
		$data['dayslotjson'] = jsonencode($dayslotjson);

		require_once $this->show('app/order_index',$data);
	}
	//订单列表页
	public function dolist(){
		global $_M;

		$data['start_time'] = date('Y-m-d',strtotime('-1 month'));
		$data['end_time'] = date('Y-m-d',time());
		require_once $this->show('app/order_list',$data);
	}
	//订单编辑页
	public function docheck(){
		global $_M;
		$order = $this->order->get_order_by_id($_M['form']['id']);
        $order = $this->order->analysis($order);
		$data['goods'] = $this->order->get_goods_list($order['id']);
        $data['converse'] = $this->dogetconverselist($order['id']);
        $order['state']=intval($order['state']);
		if($order['state']==2 || $order['state']==-1){
			if($order['stime']){
				if($order['cinfo']){
					$is_wuliu = 1;
				}else{
					$is_wuliu = 0;
				}
			}else{
				$is_wuliu = 1;
			}
			if($order['cinfo']){
				$order['cinfo_str'] = $order['cinfo'];
			}else{
				$order['cinfo_str'] = $_M['word']['app_shop_order_select_logistics'];
			}
		}
		if(!is_array($order['address'])) $is_wuliu = 0;
		$data['d_user_c'] = $is_wuliu;
		$data['order']=$order;
		require_once $this->show('app/order_editor',$data);
	}
	//修改价格
	public function doeditorsave_price(){
		global $_M;
		$info['id'] = $_M['form']['id'];
		$info['cprice'] = $_M['form']['cprice'];
		if($_M['form']['pk']==1){
			$info['cprice'] = floatval($_M['form']['value']);
		}
		$order = $this->order->get_order_by_id($_M['form']['id']);
		$info['tprice'] = $order['price'] + $order['discount'] + $order['freight'] + $info['cprice'];
		//修改几个后更新订单号
        $info['orderid'] = $this->order->get_rid();
		if($info['id'])$this->order->save_order($info);
		$this->ajax_success($_M['word']['app_shop_order_price_modifyok']);
	}
	//关闭订单
	public function doeditor_close(){
		global $_M;
		$info['id'] = $_M['form']['id'];
		$info['state'] = 0;
		$info['ctime'] = time();
		if($info['id'])$this->order->save_order($info);
		$this->ajax_success($_M['word']['app_shop_order_order_closed']);
	}
	//订单完成
	public function docomplete_order(){
		global $_M;
		$info['id'] = $_M['form']['id'];
		$info['state'] = 4;
		if($info['id'])$this->order->save_order($info);
		$this->ajax_success($_M['word']['app_shop_operatorok']);
	}
	//备注
	public function doeditorsave_remark(){
		global $_M;
		$info['id'] = $_M['form']['id'];
		$info['remark'] = $_M['form']['remark'];
		if($_M['form']['pk']==1){
			$info['remark'] = $_M['form']['value'];
		}
		if($info['id'])$this->order->save_order($info);
		$this->ajax_success($_M['word']['app_shop_order_comment_modifyok']);
	}
	//发货
	public function doeditorsave_send(){
		global $_M;
		$info['id'] = $_M['form']['id'];
		$info['stime'] = time();
		$info['state'] = 3;
		if($_M['form']['is_wuliu'] == 1){
			$info['oinfo'] = $_M['form']['oinfo'];
			$info['cinfo'] = $_M['form']['cinfo'];
			$info['cinfo_diy'] = $_M['form']['cinfo_diy'];
		}else{
			$info['oinfo'] = "";
			$info['cinfo'] = "";
			$info['cinfo_diy'] = "";
		}
		$order_class = load::own_class('admin/class/sys_order', 'new');
		$goods_class = load::own_class('web/class/web_goods', 'new');
		$order = $order_class->get_order_by_id($info['id']);
        if (intval($order['restate']) === 1) {
            $info['restate'] = 2;
        }

		if(!$order['oinfo']){
			$order['oinfo'] = $info['oinfo'];
		}

		if(!$order['cinfo']){
			$order['cinfo'] = $info['cinfo'];
		}

		if(!$order['cinfo_diy']){
            $order['cinfo_diy'] = $info['cinfo_diy'];
        }


		if($order['paytype'] !=1){
			if(!$order_class->is_order_pay($order)){
				$this->ajax_error($_M['word']['app_shop_order_error_tips1']);
			}
			$goods = $order_class->get_goods_list($info['id']);
			foreach($goods as $key=>$val){
				$goods_class->goods_stock($val['pid'], $val['para'], 0-$val['pamount']);
			}
			load::own_class('web/class/web_shop_user', 'new')->change_goods_list($order['uid'], $goods);
		}
		if($info['id'])$this->order->save_order($info);
		load::own_class('web/class/web_remind', 'new')->user_send($order);
		$this->ajax_success($_M['word']['app_shop_order_sendok']);
	}

	//补充退换货信息
    public function doeditor_refund_info(){
        global $_M;
       /* $info['id'] = $_M['form']['id'];
        $info['state'] = -1;
        $info['ctime'] = time();
        if($info['id'])$this->order->save_order($info);
       */
        $this->doconverse_add();
        $this->ajax_success($_M['word']['app_shop_saveok']);
    }

    //拒绝退货
    public function dodeny_refund()
    {
        global $_M;
        $info['id'] = $_M['form']['id'];
        $info['state'] = 3;
        $info['restate'] = 3;
        $info['ctime'] = time();
        if($info['id'])$this->order->save_order($info);
        $this->ajax_success($_M['word']['app_shop_saveok']);

    }

    //退款完成
    public function doerefund(){
        global $_M;
        $info['id'] = $_M['form']['id'];
        #$info['state'] = -3;
        $info['state'] = 0;
        $info['restate'] = 0;
        $info['ctime'] = time();
        if($info['id'])$this->order->save_order($info);
        $this->ajax_success($_M['word']['app_shop_saveok']);
    }

	public function dogetconverselist($oid = ''){
	    global $_M;
        $orderid = $oid ? $oid : $_M['form']['id'];
        $order = $this->order->get_order_by_id($orderid);
        $converse = $this->converse->get_converse_list($order);
        return $converse;
    }


    //回复退换货留言
	public function doconverse_add(){
        global $_M;
        #$_M['form']['content'] = '请提供退货商品物流信息' . time();
        #dump($_M['form']);

        $order = $this->order->get_order_by_id($_M['form']['id']);
        $form = $_M['form'];

        $this->converse->converseadd($order['id'],$form);
    }

	public function doexport() {
		global $_M;
		$_M['form']['length'] = 10000;
		$_M['form']['start'] = 0;
		$search = $_M['form']['state']!=''?"and state = '{$_M['form']['state']}'":'';
		$search.= $_M['form']['keyword']?"and (orderid like '%{$_M['form']['keyword']}%' || username like '%{$_M['form']['keyword']}%')":'';

		$stime = $_M['form']['fromtime'] ? strtotime($_M['form']['fromtime'].' 00:00:00') : 0;
		$etime = $_M['form']['totime'] ? strtotime($_M['form']['totime'].' 23:59:59') : time();

		$search.=" AND rtime BETWEEN {$stime} AND {$etime}";
		$order = " rtime DESC ";
		$data = $this->order->json_order_list($search, $order);

		$orderstatearr = array(
		    $_M['word']['app_shop_order_order_state0'],
            $_M['word']['app_shop_order_order_state1'],
            $_M['word']['app_shop_order_order_state2'],
            $_M['word']['app_shop_order_order_state3'],
            $_M['word']['app_shop_order_order_state4'],
            $_M['word']['app_shop_order_order_state5'],
            $_M['word']['app_shop_order_order_state6'],
            $_M['word']['app_shop_order_order_paymethod1'],
            $_M['word']['app_shop_order_order_paymethod2'],
            $_M['word']['app_shop_order_order_paymethod3']
        );

		foreach ($data as $k => $v) {
			$data[$k]['orderid'] = $_M['word']['app_shop_order_no'].$v['orderid'];
			$goods = $this->order->get_goods_list($v['id']);

			foreach ($goods as $key => $g) {
				$data[$k]['goods_name'] .= $g['pname']."*".$g['pamount']." ";
			}

			switch ($v['state']) {
				case -2:
				#$data[$k]['state'] = '缺货退款/Out of stock refund';
				$data[$k]['state'] = $orderstatearr[6];
				break;
			case -1:
				#$data[$k]['state'] = '退款中/Refunds';
                $data[$k]['state'] = $orderstatearr[5];
				break;
			case 0:
				#$data[$k]['state'] = '已关闭/Closed';
                $data[$k]['state'] = $orderstatearr[0];
				break;
			case 1:
				#$data[$k]['state'] = '待付款/Pending payment';
                $data[$k]['state'] = $orderstatearr[1];
				break;
			case 2:
				if($data[$k]['paytype'] == 1){
					#$data[$k]['state'] = '待发货/Pending delivery';
                    $data[$k]['state'] = $orderstatearr[2];
				}else if($data[$k]['paytype'] == 2){
					#$data[$k]['state'] = '货到付款/Cash on Delivery';
                    $data[$k]['state'] = $orderstatearr[7];
					if(!defined('IN_ADMIN')){
						#$data[$k]['state'] = '待发货/Pending delivery';
                        $data[$k]['state'] = $orderstatearr[2];
					}
				}else if($data[$k]['paytype'] == 3){
					#$data[$k]['state'] = '公司转账/Company transfer';
                    $data[$k]['state'] = $orderstatearr[8];
				}
				break;
			case 3:
				#$data[$k]['state'] = '已发货/Already shipped';
                $data[$k]['state'] = $orderstatearr[3];
				break;
			case 4:
				#$data[$k]['state'] = '已完成/Completed';
                $data[$k]['state'] = $orderstatearr[4];
				break;
			}

			$data[$k]['rtime'] = date('Y-m-d H:i:s',$v['rtime']);

		}
		##$title_array = array('订单编号','商品名*件数','会员名','下单时间','状态','实付金额','付款方式','收货地址','买家留言','商家备注');
		$title_array = array(
            $_M['word']['app_shop_order_no'],
            $_M['word']['app_shop_order_xport_row1'],
            $_M['word']['app_shop_order_xport_row2'],
            $_M['word']['app_shop_order_xport_row3'],
            $_M['word']['app_shop_order_xport_row4'],
            $_M['word']['app_shop_order_xport_row5'],
            $_M['word']['app_shop_order_xport_row6'],
            $_M['word']['app_shop_order_xport_row7'],
            $_M['word']['app_shop_order_xport_row8']
        );

		$field_array = array('orderid','goods_name','username','rtime','state','price','paytype_str','address_str','message','remark');

		$title = explode(',', $_M['form']['export']);

		foreach ($title as $key => $value) {

			$title[$key] = $title_array[$value];
			$field[$key] = $field_array[$value];
		}
		load::own_class('include/export');

		$export = new export($title,$field,$data);
		$export->doexport();
	}


	public function dotrack() {
		global $_M;
		$express = load::own_class('web/class/web_express','new');
		$info = $express->get($_M['form']['order_id'],$_M['form']['tracking_no']);
		echo urldecode($info);die;
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

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>