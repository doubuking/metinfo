<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$data['page_title'] =$_M['word']['app_shop_address'].$data['page_title'];
?>
<include file="sys_web/head"/>
<link href="{$_M['url']['own_tem']}css/shop.css?{$met_file_version}" rel='stylesheet' type='text/css'>
<div class="page bg-pagebg1">
	<div class="container">
		<div class="page-content row">
			<include file="user_sidebar"/>
			<div class="col-lg-9 shop-address">
				<div class="panel m-b-0" boxmh-mh>
					<div class="panel-body">
						<button type="button" class="btn btn-success addr-btn btn-squared">{$_M['word']['app_shop_addto']}{$_M['word']['app_shop_address']}</button>
						<ul class="blocks-100 blocks-sm-2 blocks-md-3 m-t-20 text-xs-center addr-body">
							<div class="loader vertical-align-middle loader-default m-l-30"></div>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
var addrlisturl  = '{$_M['url']['shop_addr_index']}',
	addrdelurl = '{$_M['url']['shop_addr_del']}';
</script>
<include file="app/module/shop_address_modal"/>
<include file="sys_web/foot"/>