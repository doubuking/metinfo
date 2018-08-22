<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$data['page_title'] = $_M['word']['app_shop_personal'].$data['page_title'];
?>
<include file="sys_web/head"/>
<link href="{$_M['url']['own_tem']}css/shop.css?{$met_file_version}" rel='stylesheet' type='text/css'>
<div class="page bg-pagebg1">
	<div class="container">
		<div class="page-content row">
			<include file="user_sidebar"/>
			<div class="col-lg-9 shop-profile">
				<div class="card m-b-0">
					<div class="card-header bg-blue-600 text-xs-center p-30 p-b-15">
						<a class="avatar avatar-100 img-bordered m-b-10 bg-white" href="{$_M['url']['profile']}" title='{$_M['user']['username']}'>
							<img src="{$_M['user']['head']}" alt="{$_M['user']['username']}">
						</a>
						<div class="font-size-20 white">{$_M['user']['username']}</div>
						<div class="grey-300 font-size-14 m-b-20">{$_M['user'][group_name]}</div>
					</div>
					<div class="card-content">
						<div class="row p-y-20 text-xs-center">
							<div class='col-xs-4 col-sm-4 offset-xs-2 offset-sm-1'>
								<div class="counter">
									<span class="counter-number cyan-600"><a href="{$_M['url']['shop_order']}#state_1">{$data.state1}</a></span>
									<div class="counter-label">{$_M['word']['app_shop_bepaid']}</div>
								</div>
							</div>
							<div class='col-xs-4 col-sm-2'>
								<div class="counter">
									<span class="counter-number cyan-600"><a href="{$_M['url']['shop_order']}#state_3">{$data.state3}</a></span>
									<div class="counter-label">{$_M['word']['app_shop_receipt']}</div>
								</div>
							</div>
							<div class='col-xs-12 col-sm-4'>
								<div class="counter">
									<span class="counter-number cyan-600"><a href="{$_M['url']['finance']}">{$_M['user']['balance_str']}</a></span>
									<div class="counter-label">{$_M['word']['app_shop_balance']}</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-content">
					<ul class="list-group list-group-bordered m-b-0">
						<a href="{$_M['url']['shop_order']}" class="list-group-item p-y-15">
							<i class="icon wb-order" aria-hidden="true"></i>{$_M['word']['app_shop_allorders']}<span class="site-menu-arrow"></span>
						</a>
						<a href="{$_M['url']['shop_favorite']}" class="list-group-item p-y-15">
							<i class="icon wb-heart" aria-hidden="true"></i>{$_M['word']['app_shop_myfavorite']}<span class="site-menu-arrow"></span>
						</a>
						<a href="{$_M['url']['shop_discount']}" class="list-group-item p-y-15">
							<i class="icon wb-bookmark" aria-hidden="true"></i>{$_M['word']['app_shop_mydiscount']}<span class="site-menu-arrow"></span>
						</a>
						<a href="{$_M['url']['shop_address']}" class="list-group-item p-y-15">
							<i class="icon wb-map" aria-hidden="true"></i>{$_M['word']['app_shop_address']}<span class="site-menu-arrow"></span>
						</a>
						<a href="{$_M['url']['shop_finance']}" class="list-group-item p-y-15">
							<i class="icon wb-payment" aria-hidden="true"></i>{$_M['word']['app_shop_consumer']}<span class="site-menu-arrow"></span>
						</a>
						<a href="{$_M['url']['shop_member_base']}&nojump=1" class="list-group-item p-y-15">
							<i class="icon wb-edit" aria-hidden="true"></i>{$_M['word']['app_shop_modifyinfo']}<span class="site-menu-arrow"></span>
						</a>
					</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<include file="sys_web/foot"/>