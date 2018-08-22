<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$data['page_title'] = $_M['word']['app_shop_tocart'].$data['page_title'];
?>
<include file="sys_web/head"/>
<link href="{$_M['url']['own_tem']}css/shop.css?{$met_file_version}" rel='stylesheet' type='text/css'>
<div class="page bg-pagebg1">
	<div class="container">
		<div class="page-content row">
			<div class="panel m-b-0">
				<div class="panel-body tocar-info">
					<div class="hidden-md-up h-10"></div>
					<div class="row">
						<div class="col-md-6">
							<div class="media">
							  <div class="media-left">
								  <a href="{$data['tocart']['url']}" title='{$data['tocart']['name']}' target='_blank'><img class="media-object" src="{$data.tocart.img|thumb:$c['met_productimg_y'],$c['met_productimg_x']}" alt="{$data['tocart']['name']}"></a>
							  </div>
							  <div class="media-body">
							  	<div class="hidden-md-up h-10"></div>
								<h4 class="media-heading font-size-16"><a href="{$data['tocart']['url']}" title='{$data['tocart']['name']}' target='_blank'>{$data['tocart']['name']}</a> &nbsp; {$data['tocart']['splist_value_str']} &nbsp; {$_M['word']['app_shop_number']}：{$data['tocart']['amount']} {$_M['word'][app_shop_piece]}</h4>
								<p class="font-size-20 green-800 m-b-0">{$_M['word']['app_shop_tocartok']}</p>
							  </div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="text-md-right tocar-btn-body">
								<a class="btn btn-default btn-lg btn-squared m-r-20" href="javascript:window.history.back()">{$_M['word']['app_shop_continue']}</a>
								<a class="btn btn-danger btn-lg btn-squared" href="{$_M['url']['shop_cart']}">{$_M['word']['app_shop_gosettlement']}</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<include file="app/module/shop_moregoods"/>
		</div>
	</div>
</div>
<include file="sys_web/foot"/>