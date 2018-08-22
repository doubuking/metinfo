<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$data['page_title'] = $_M['word']['app_shop_cart'].$data['page_title'];
?>
<include file="sys_web/head"/>
<link href="{$_M['url']['own_tem']}css/shop.css?{$met_file_version}" rel='stylesheet' type='text/css'>
<div class="page bg-pagebg1">
	<div class="container">
		<div class="page-content row shop-cart">
			<?php
			if($data['cartnum']){
				$cart_not_hidden=' hidden';
			?>
			<div data-plugin="selectable" data-selectable="selectable">
				<div class="panel cart-body">
					<div class="panel-body">
						<div class="h-200 vertical-align text-xs-center cart-loader">
							<div class="loader vertical-align-middle loader-default"></div>
						</div>
						<div hidden>
							<include file="app/module/shop_discount_receive"/>
							<div class="cart-list animation-fade" data-scale='{$c.met_productimg_y}x{$c.met_productimg_x}'>
							</div>
						</div>
					</div>
				</div>
				<div class="panel cart-total p-0 animation-fade" hidden>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6 cart-all text-md-center">
								<div class="checkbox-custom checkbox-danger w-100 cartall">
									<input type="checkbox" class="selectable-all" id="cartall" checked>
									<label for="cartall">{$_M['word']['app_shop_checkall']}</label>
								</div>
							</div>
							<div class="col-lg-7 col-md-6 col-sm-6 col-xs-6 text-xs-right" style='line-height:2;'>
								<span class="hidden-sm-down">{$_M['word']['app_shop_intotal']} <span class="cart-goodnum">{$data.goodnum}</span> {$_M['word']['app_shop_piece']}{$_M['word']['app_shop_commodity']}， </span>
								{$_M['word']['app_shop_total']} :
								<span class="total-val red-600"></span>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 text-xs-right">
								<a data-url="{$_M['url']['shop_pay']}" class="btn btn-lg btn-squared btn-danger white p-x-30 disabled cart-tocheck">{$_M['word']['app_shop_gosettlementabbr']}</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
			<div class="panel p-y-50 text-xs-center cart-not"{$cart_not_hidden}>
				<div class="container">
					<div class="row">
						<div class="col-lg-4 text-lg-right iconbox">
							<i class="icon wb-shopping-cart blue-grey-300 animation-slide-top50" aria-hidden="true"></i>
						</div>
						<div class="col-lg-8 text-lg-left animation-fade txt">
							<p class='cart-not-title m-t-0 m-b-20 blue-grey-400'>{$_M['word']['app_shop_emptycart']}</p>
							<a href="{$_M['url']['product']}" class="btn btn-lg btn-squared btn-outline btn-danger">{$_M['word']['app_shop_goshopping']}</a>
						</div>
					</div>
				</div>
			</div>
			<include file="app/module/shop_moregoods"/>
		</div>
	</div>
</div>
<include file="sys_web/foot"/>