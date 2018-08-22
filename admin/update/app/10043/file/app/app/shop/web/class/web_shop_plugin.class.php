<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');


/**
 * 插件
 */

class web_shop_plugin {
		public function url() {
		global $_M;
		$lang_hz="?lang={$_M['lang']}";
		$_M['url']['shop'] =  $_M['url']['site'].'shop/';
		$_M['url']['pay'] =  $_M['url']['site'].'pay/';
		if(M_NAME=='product' || M_NAME=='shop'){
			$_M['url']['own_form'] = $_M['url']['shop'].M_CLASS.".php{$lang_hz}&";
			$_M['url']['own_tem'] = $_M['url']['own'].'web/templates/met/';
		}
		$_M['url']['shop_ui'] =  $_M['url']['own'].'web/templates/met/';
		$_M['url']['product'] =  $_M['url']['site']."product/index.php{$lang_hz}";

		$_M['url']['shop_pay'] = $_M['url']['shop']."pay.php{$lang_hz}";
		$_M['url']['shop_choose'] = $_M['url']['shop_pay']."&a=dochoose";
		$_M['url']['shop_pay_payali'] = $_M['url']['shop']."ali_payto.php{$lang_hz}";
		$_M['url']['shop_pay_weixin'] = $_M['url']['shop']."wx_pay.php{$lang_hz}";
		$_M['url']['shop_pay_payment'] = $_M['url']['shop_pay']."&a=dopayment";
		$_M['url']['shop_pay_payorder'] = $_M['url']['shop_pay']."&a=dopayorder";
		$_M['url']['shop_pay_placeorder'] = $_M['url']['shop_pay']."&a=doplaceorder";
		$_M['url']['shop_recharge_index'] = $_M['url']['shop_pay']."&a=dorecharge";
		$_M['url']['shop_recharge_pay'] = $_M['url']['shop_pay']."&a=dopayrecharge";
		$_M['url']['shop_ajax_total'] = $_M['url']['shop_pay']."&a=do_ajax_total";
		$_M['url']['shop_buy_ok'] = $_M['url']['shop_pay']."&a=do_buy_ok";
		#$_M['url']['shop_finance'] = $_M['url']['shop']."finance.php{$lang_hz}";
		$_M['url']['shop_finance'] = $_M['url']['pay']."finance.php{$lang_hz}";

		$_M['url']['shop_order'] = $_M['url']['shop']."order.php{$lang_hz}";
		$_M['url']['shop_order_check'] = $_M['url']['shop_order']."&a=docheck";
		$_M['url']['shop_order_close'] = $_M['url']['shop_order']."&a=doorder_close";
		$_M['url']['shop_doreceipt']=$_M['url']['shop_order']."&a=doreceipt";// 增加url（新商城模板）
		$_M['url']['shop_refund']=$_M['url']['shop_order'].'&a=dorefund';
		$_M['url']['converse_add']=$_M['url']['shop_order'].'&a=doconverse_add';
		$_M['url']['shop_logistics']=$_M['url']['shop_order'].'&a=dotrack';

		$_M['url']['shop_cart'] = $_M['url']['shop']."cart.php{$lang_hz}";
		$_M['url']['shop_cart_jsonlist'] = $_M['url']['shop_cart']."&a=dojson_cart_list";
		$_M['url']['shop_cart_modify'] = $_M['url']['shop_cart']."&a=domodify";
		$_M['url']['shop_cart_del'] = $_M['url']['shop_cart']."&a=dodel";

		$_M['url']['shop_tocart'] = $_M['url']['shop_cart']."&a=dotocart";
		$_M['url']['shop_tocart_now'] = $_M['url']['shop_cart']."&a=dotocart&action=buynow";

		$_M['url']['shop_profile'] = $_M['url']['shop']."profile.php{$lang_hz}";

		$_M['url']['shop_address'] = $_M['url']['shop']."address.php{$lang_hz}";
		$_M['url']['shop_addr_index'] = $_M['url']['shop_address']."&a=do_address_zone";
		$_M['url']['shop_addr_editor'] = $_M['url']['shop_address']."&a=do_address_editor";
		$_M['url']['shop_addr_del'] = $_M['url']['shop_address']."&a=do_address_del";
		$_M['url']['shop_addr_de'] = $_M['url']['shop_address']."&a=do_address_de";

		//会员模块URL
		$_M['url']['shop_member_login'] = $_M['url']['site']."member/login.php{$lang_hz}";
		$_M['url']['shop_member_login_out'] = $_M['url']['shop_member_login']."&a=dologout";
		$_M['url']['login_other'] = $_M['url']['shop_member_login']."&a=doother";// 社会化登录
		$_M['url']['shop_member_reg'] = $_M['url']['site']."member/register_include.php{$lang_hz}";
		$_M['url']['shop_member_getpassword'] = $_M['url']['site']."member/getpassword.php{$lang_hz}";
		$_M['url']['shop_member_base'] = $_M['url']['site']."member/basic.php{$lang_hz}";
		// 增加url（新商城模板）
		$_M['url']['shop_discount'] = $_M['url']['shop']."discount.php{$lang_hz}";
		$_M['url']['shop_discount_receive'] = $_M['url']['shop_discount']."&a=doreceive";
		$_M['url']['shop_discount_my'] = $_M['url']['shop_discount']."&a=domydiscount";

		$_M['url']['shop_favorite'] = $_M['url']['shop']."favorite.php{$lang_hz}";
		$_M['url']['shop_favorite_my'] = $_M['url']['shop_favorite']."&a=domyfavorite";
		$_M['url']['shop_favorite_do'] = $_M['url']['shop_favorite']."&a=dofavorite";

		//$_M['url']['shop_searchlist'] = "index.php{$lang_hz}&class1={$_M['config_shop']['class1']}&no_order={$_M['form']['no_order']}";
		//if($_M['form']['no_order'] == '')$_M['form']['no_order'] = 'sales_desc';
		if(!$_M['config']['met_pseudo']){
			$_M['url']['shop_searchlist'] = "index.php{$lang_hz}&searchlist=";
			$_M['url']['shop_searchs'] = "index.php{$lang_hz}&searchs=";

			$_M['url']['shop_no_order'] = "index.php{$lang_hz}&no_order={$_M['form']['no_order']}";

			$_M['url']['shop_no_order_by_sales'] = $_M['url']['shop_order']."sales_desc/index.php{$lang_hz}&no_order=sales_desc";

			$_M['url']['shop_no_order_by_time'] = $_M['url']['shop_order']."time_desc/index.php{$lang_hz}&no_order=time_desc";
		}else{
			if(0){
				$_M['url']['shop_searchlist'] = "tag-{$_M['lang']}-";
				$_M['url']['shop_searchs'] = "searchs-{$_M['lang']}-";

				$_M['url']['shop_no_order'] = "no_order-{$_M['lang']}-{$_M['form']['no_order']}";

				$_M['url']['shop_no_order_by_sales'] = "no_order-{$_M['lang']}-sales_desc";
				$_M['url']['shop_no_order_by_time'] = "no_order-{$_M['lang']}-time_desc";
			}else{
				$_M['url']['shop_searchlist'] = $_M['url']['product']."tag/";
				$_M['url']['shop_searchs'] = $_M['url']['product']."searchs/";

				$_M['url']['shop_no_order'] = $_M['url']['product']."no_order/";

				$_M['url']['shop_no_order_by_sales'] = $_M['url']['product']."no_order/sales_desc";
				$_M['url']['shop_no_order_by_time'] = $_M['url']['product']."no_order/time_desc";


			}
		}

		/*
		if($_M['form']['no_order']){
			$no_order = explode('|' ,$_M['form']['no_order']);
			if($no_order[0] == 'sales'){
				if($no_order[1] == 'asc'){
					$order['sales'] = 'sales|desc';
				}else{
					$order['sales'] = 'sales|asc';
				}
				$order['price'] = 'price|asc';
			}else if($no_order[0] == 'price'){
				if($no_order[1] == 'asc'){
					$order['price'] = 'price|desc';
				}else{
					$order['price'] = 'price|asc';
				}
				$order['sales'] = 'sales|asc';
			}else {
				$order['price'] = 'price|asc';
				$order['sales'] = 'sales|desc';
			}
		}else{
			$order['price'] = 'price|asc';
			$order['sales'] = 'sales|desc';
		}
		*/
		/*
		$_M['url']['shop_orderby_sales'] = "index.php{$lang_hz}&class1={$_M['config_shop']['class1']}&searchlist={$_M['form']['searchlist']}&no_order={$order['sales']}";
		$_M['url']['shop_orderby_price'] = "index.php{$lang_hz}&class1={$_M['config_shop']['class1']}&searchlist={$_M['form']['searchlist']}&no_order={$order['price']}";
		$_M['url']['shop_orderby_com'] = "index.php{$lang_hz}&class1={$_M['config_shop']['class1']}&searchlist={$_M['form']['searchlist']}&no_order=";
		*/
	}

	public function user_login_info() {
		global $_M;
		$username = get_met_cookie('username');
		if(!$username)$username = get_met_cookie('metinfo_member_name');
		if($username){
			$userinfo[0]['info'] = $username;
			$userinfo[0]['url'] = $_M['url']['member_base'];
		}else{
			$userinfo[0]['info'] = $_M['word']['login'];
			$userinfo[0]['url'] = $_M['url']['member_login'];
			$userinfo[1]['info'] = $_M['word']['memberRegister'];
			$userinfo[1]['url'] = $_M['url']['member_reg'];
		}
		return $userinfo;
	}

}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>
