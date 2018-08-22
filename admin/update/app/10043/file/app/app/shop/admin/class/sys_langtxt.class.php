<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

class sys_langtxt {
    public $site;

	public function get_langtxt_array($site = 0){
		global $_M;
        $this->site = $site;

		$query = "SELECT * FROM {$_M['table']['language']} WHERE app = '10043' AND site = '{$this->site}' AND lang='{$_M[lang]}'";

		$data = DB::get_all($query);
		if(!$data) {
		    if($site==0){
                $this->lang_insert('app_shop_original', '原价');
                $this->lang_insert('app_shop_stock', '库存');
                $this->lang_insert('app_shop_piece', '件');
                $this->lang_insert('app_shop_purchase', '每人限购');
                $this->lang_insert('app_shop_number', '数量');
                $this->lang_insert('app_shop_buyimmediately', '立即购买');
                $this->lang_insert('app_shop_tocart', '加入购物车');
                $this->lang_insert('app_shop_details', '商品详情');
                $this->lang_insert('app_shop_recommend', '热门推荐');
                $this->lang_insert('app_shop_emptycart', '购物车中还没有商品，赶紧选购吧！');
                $this->lang_insert('app_shop_register', '注册');
                $this->lang_insert('app_shop_login', '登录');
                $this->lang_insert('app_shop_personal', '个人中心');
                $this->lang_insert('app_shop_myorder', '我的订单');
                $this->lang_insert('app_shop_settings', '账户设置');
                $this->lang_insert('app_shop_out', '退出');
                $this->lang_insert('app_shop_cart', '购物车');
                $this->lang_insert('app_shop_commodity', '商品');
                $this->lang_insert('app_shop_intotal', '共');
                $this->lang_insert('app_shop_gosettlement', '去购物车结算');
                $this->lang_insert('app_shop_tocartok', '已成功加入购物车！');
                $this->lang_insert('app_shop_continue', '继续购物');
                $this->lang_insert('app_shop_moregoods', '购买该商品的用户还购买了');
                $this->lang_insert('app_shop_checkall', '全选');
                $this->lang_insert('app_shop_total', '合计');
                $this->lang_insert('app_shop_gosettlementabbr', '去结算');
                $this->lang_insert('app_shop_goshopping', '马上去购物');
                $this->lang_insert('app_shop_ok', '确定');
                $this->lang_insert('app_shop_cancel', '取消');
                $this->lang_insert('app_shop_deleteok', '确定要删除吗?');
                $this->lang_insert('app_shop_price', '单价');
                $this->lang_insert('app_shop_subtotal', '小计');
                $this->lang_insert('app_shop_operation', '操作');
                $this->lang_insert('app_shop_errorrefresh', '数据错误，请重新刷新页面！');
                $this->lang_insert('app_shop_oos', '缺货');
                $this->lang_insert('app_shop_address', '收货地址');
                $this->lang_insert('app_shop_addto', '添加');
                $this->lang_insert('app_shop_paymentmod', '支付方式');
                $this->lang_insert('app_shop_paymentonline', '在线支付');
                $this->lang_insert('app_shop_paymentcod', '货到付款');
                $this->lang_insert('app_shop_delivery', '配送方式');
                $this->lang_insert('app_shop_invoice', '发票');
                $this->lang_insert('app_shop_unwanted', '不需要');
                $this->lang_insert('app_shop_need', '需要');
                $this->lang_insert('app_shop_invoicecontent', '发票内容');
                $this->lang_insert('app_shop_return', '返回');
                $this->lang_insert('app_shop_message', '给商家留言，选填');
                $this->lang_insert('app_shop_placeorder', '提交订单');
                $this->lang_insert('app_shop_pleaseaddress', '请设置收获地址');
                $this->lang_insert('app_shop_freefreight', '免运费');
                $this->lang_insert('app_shop_ordersuccess', '订单提交成功！去付款咯~');
                $this->lang_insert('app_shop_please', '请在');
                $this->lang_insert('app_shop_pleasepayment', '内完成支付, 超时后将取消订单');
                $this->lang_insert('app_shop_ordernumber', '订单号');
                $this->lang_insert('app_shop_orderdetails', '订单详情');
                $this->lang_insert('app_shop_receiving', '收货信息');
                $this->lang_insert('app_shop_paytotal', '应付总额');
                $this->lang_insert('app_shop_paymod', '选择以下支付方式付款');
                $this->lang_insert('app_shop_paybalance', '余额支付');
                $this->lang_insert('app_shop_loginpassword', '登录密码');
                $this->lang_insert('app_shop_allvalidorders', '全部有效订单');
                $this->lang_insert('app_shop_bepaid', '待支付');
                $this->lang_insert('app_shop_receipt', '待收货');
                $this->lang_insert('app_shop_closed', '已关闭');
                $this->lang_insert('app_shop_commodityname', '商品名称');
                $this->lang_insert('app_shop_moreorder', '查看更多订单');
                $this->lang_insert('app_shop_orderamount', '订单金额');
                $this->lang_insert('app_shop_topay', '去付款');
                $this->lang_insert('app_shop_noorders', '没有符合条件的订单');
                $this->lang_insert('app_shop_cancelorder', '取消订单');
                $this->lang_insert('app_shop_placeorderabbr', '下单');
                $this->lang_insert('app_shop_payment', '付款');
                $this->lang_insert('app_shop_deliver', '发货');
                $this->lang_insert('app_shop_complete', '完成');
                $this->lang_insert('app_shop_nologistics', '无需物流');
                $this->lang_insert('app_shop_logisticsinfo', '物流信息');
                $this->lang_insert('app_shop_express', '快递配送');
                $this->lang_insert('app_shop_messageabbr', '买家留言');
                $this->lang_insert('app_shop_freight', '运费');
                $this->lang_insert('app_shop_discount', '优惠');
                $this->lang_insert('app_shop_modifyprice', '涨价/减免');
                $this->lang_insert('app_shop_paid', '实付金额');
                $this->lang_insert('app_shop_cancelorderok', '确定要取消订单吗?');
                $this->lang_insert('app_shop_consigneename', '收货人姓名');
                $this->lang_insert('app_shop_consigneetel', '收货人电话');
                $this->lang_insert('app_shop_consigneeaddress', '详细地址');
                $this->lang_insert('app_shop_save', '保存');
                $this->lang_insert('app_shop_balance', '账户余额');
                $this->lang_insert('app_shop_allorders', '查看所有订单');
                $this->lang_insert('app_shop_consumer', '消费明细');
                $this->lang_insert('app_shop_modifyinfo', '修改个人信息');
                $this->lang_insert('app_shop_accountrecharge', '账户充值');
                $this->lang_insert('app_shop_time', '时间');
                $this->lang_insert('app_shop_money', '金额');
                $this->lang_insert('app_shop_reason', '事由');
                $this->lang_insert('app_shop_rechargemoney', '充值金额');
                $this->lang_insert('app_shop_ordercenter', '订单中心');
                $this->lang_insert('app_shop_error', '数据错误');
                $this->lang_insert('app_shop_saveok', '保存成功');
                $this->lang_insert('app_shop_delok', '删除成功');
                $this->lang_insert('app_shop_success', '操作成功');
                $this->lang_insert('app_shop_lowstocks', '您订购的商品库存不足！');
                $this->lang_insert('app_shop_lowpurchase', '您订购的商品超过限购！');
                $this->lang_insert('app_shop_del', '删除');
                $this->lang_insert('app_shop_noaccess', '您无权限查看此订单');
                $this->lang_insert('app_shop_nosckpce', '您所订购的商品缺货或者超过订购限额');
                $this->lang_insert('app_shop_precmoney', '请输入充值金额！');
                $this->lang_insert('app_shop_payok', '付款成功！');
                $this->lang_insert('app_shop_passno', '密码错误');
                $this->lang_insert('app_shop_errornopay', '系统出错，无法付款！');
                $this->lang_insert('app_shop_noopaccess', '您没有权限操作此订单');
                $this->lang_insert('app_shop_order', '订单');
                $this->lang_insert('app_shop_topaynow', '立即付款');
                $this->lang_insert('app_shop_invoicehead', '请输入发票抬头');
                $this->lang_insert('app_shop_scanpayment', '微信扫码支付');
                $this->lang_insert('app_shop_beingpaid', '正在支付...');
                $this->lang_insert('app_shop_paidok', '支付成功');
                $this->lang_insert('app_shop_paiderror', '支付失败');
                // 新加字段（新商城框架）
                $this->lang_insert('app_shop_morediscount', '查看更多优惠券');
                $this->lang_insert('app_shop_notusediscount', '不使用优惠');
                $this->lang_insert('app_shop_discountname', '优惠券名');
                $this->lang_insert('app_shop_received', '已领取');
                $this->lang_insert('app_shop_receive', '待领取');
                $this->lang_insert('app_shop_used', '已使用');
                $this->lang_insert('app_shop_overtime', '已过期');
                $this->lang_insert('app_shop_nodiscounts', '没有符合条件的优惠券');
                $this->lang_insert('app_shop_selectgoods_use', '这些商品可使用本优惠券');
                $this->lang_insert('app_shop_receivelimit', '每人限领');
                $this->lang_insert('app_shop_sheet', '张');
                $this->lang_insert('app_shop_immediate_receive', '立即领取');
                $this->lang_insert('app_shop_immediate_use', '立即使用');
                $this->lang_insert('app_shop_receive_fail', '领取失败');
                $this->lang_insert('app_shop_canuser', '可以使用');
                $this->lang_insert('app_shop_receiveok', '领取成功！');
                $this->lang_insert('app_shop_favorite_add', '加入收藏');
                $this->lang_insert('app_shop_favorited', '已收藏');
                $this->lang_insert('app_shop_favorite_expired', '已失效');
                $this->lang_insert('app_shop_nofavorites', '没有收藏');
                $this->lang_insert('app_shop_favorite_ok', '收藏成功');
                $this->lang_insert('app_shop_favorite_fail', '收藏失败');
                $this->lang_insert('app_shop_guest_login', '以游客身份继续');
                $this->lang_insert('app_shop_doreceipt', '确认收货');
                $this->lang_insert('app_shop_doreceipt_if', '确认收货吗？');
                $this->lang_insert('app_shop_allusers', '所有会员');
                $this->lang_insert('app_shop_exceeduser', '以上可以领取');
                $this->lang_insert('app_shop_userange', '使用范围');
                $this->lang_insert('app_shop_allgoods', '全部商品');
                $this->lang_insert('app_shop_selectgoods', '指定商品');
                $this->lang_insert('app_shop_express_noopen', '快递查询功能未开启');
                $this->lang_insert('app_shop_finance_in', '入款');
                $this->lang_insert('app_shop_finance_out', '扣款');
                $this->lang_insert('app_shop_goods_noquery', '暂未开放查询功能');
                $this->lang_insert('app_shop_company_pay', '公司转账');
                $this->lang_insert('app_shop_normal_invoice', '普通发票');
                $this->lang_insert('app_shop_online_invoice', '电子发票');
                $this->lang_insert('app_shop_tax_invoice', '增值税发票');
                $this->lang_insert('app_shop_nogoods', '缺货退款');
                $this->lang_insert('app_shop_refund', '退款中');
                $this->lang_insert('app_shop_bedeliver', '待发货');
                $this->lang_insert('app_shop_over_deliver', '已发货');
                $this->lang_insert('app_shop_order_over', '已完成');
                $this->lang_insert('app_shop_order_achieve', '满');
                $this->lang_insert('app_shop_order_reduce', '减');
                $this->lang_insert('app_shop_period_validity', '有效期');
                $this->lang_insert('app_shop_usetime', '使用时间');
                $this->lang_insert('app_shop_discountvalue', '面值');
                $this->lang_insert('app_shop_to', '至');
                $this->lang_insert('app_shop_hour', '小时');
                $this->lang_insert('app_shop_minute', '分钟');
                $this->lang_insert('app_shop_online', '在线订购');
                $this->lang_insert('app_shop_havepay', '此订单已经付款或关闭支付！');
                $this->lang_insert('app_shop_payinsufficient', '您的余额不足，点击此链接充值！');
                $this->lang_insert('app_shop_receiveemail', '接收邮箱');
                $this->lang_insert('app_shop_receiveemail_prompt', '用于接收账号信息');
                $this->lang_insert('app_shop_instructions', '使用说明');
                $this->lang_insert('app_shop_clickview', '点击查看');
                $this->lang_insert('app_shop_searchfail', '查询失败，请联系管理员！');
                $this->lang_insert('app_shop_needlogin', '请先登录');
                $this->lang_insert('app_shop_buy', '购买');
                $this->lang_insert('app_shop_myfavorite', '我的收藏');
                $this->lang_insert('app_shop_mydiscount', '我的优惠券');
                $this->lang_insert('app_shop_logistics_schedule', '物流进度');
                $this->lang_insert('app_shop_choosepara', '请选择完整选项');
                $this->lang_insert('app_shop_lowstocks_min', '库存不足');
                $this->lang_insert('app_shop_creditcode', '请输入信用代码');
                $this->lang_insert('app_shop_payinterface_error', '支付接口错误，请联系网站管理员');
            } else {

            }
		}
		return $data;
	}

	public function lang_insert($name, $value){
		global $_M;
		$lang = $_M['lang'];
			$query = "SELECT * FROM {$_M['table']['language']} WHERE name='{$name}' AND lang='{$lang}' AND site = '{$this->site}' AND app='10043'";
        if(!DB::get_one($query)){
            $query = "INSERT INTO {$_M['table']['language']} SET name='{$name}',value='{$value}',site='{$this->site}',no_order=0,array=0,app='10043',lang='{$lang}'";
            DB::query($query);
			}
	}

	public function save_langtxt($form){
		global $_M;
        $site = $_M['form']['site'] ? $_M['form']['site'] : 0;
		$langtxt_array = $this->get_langtxt_array($site);
		foreach($langtxt_array as $val){
			$value = $form[$val['name']];
			if($value){
				if($val['name'] != $value){
					$query = "UPDATE {$_M['table']['language']} SET value='{$value}' ,site = '{$site}' WHERE id='{$val['id']}' and app = '10043' and lang='{$_M['lang']}'";
					DB::query($query);
				}
			}
		}

		$langs = array();
		unset($langtxt_array);
		$lang_array = $this->get_langtxt_array();

		foreach ($lang_array as $key => $v) {
			$langs[$v['name']] = $v['value'];
		}

		$lang_file = PATH_APP_FILE."lang/shop_lang_{$_M['lang']}.js";

		$file = file_put_contents($lang_file, "window.SHOPLANG = ".jsonencode($langs));
	}

}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>