<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$data['page_title'] =$_M['word']['app_shop_mydiscount'].$data['page_title'];
?>
<include file="sys_web/head"/>
<link href="{$_M['url']['own_tem']}css/shop.css?{$met_file_version}" rel='stylesheet' type='text/css'>
<div class="page bg-pagebg1">
	<div class="container">
		<div class="page-content row">
			<include file="user_sidebar"/>
			<div class="col-lg-9">
				<div class="panel m-b-0" boxmh-mh>
					<div class="panel-body shop-discount">
						<div>
							<ul class="nav nav-tabs nav-tabs-line shop-discount-state">
								<li class='nav-item'><a class="nav-link" href data-toggle="tab" data-state="0">{$_M['word']['app_shop_received']}</a></li>
								<li class='nav-item'><a class="nav-link" href="#state1" data-toggle="tab" data-state="1">{$_M['word']['app_shop_receive']}</a></li>
								<li class='nav-item'><a class="nav-link" href='#state2' data-toggle="tab" data-state="2">{$_M['word']['app_shop_used']}</a></li>
								<li class='nav-item'><a class="nav-link" href="#state3" data-toggle="tab" data-state="3">{$_M['word']['app_shop_overtime']}</a></li>
							</ul>
						</div>
						<!--<div class="shop-discount-keyword m-t-20">
							<div class="form-group">
								<div class="input-search">
									<button type="submit" class="input-search-btn"><i class="icon wb-search" aria-hidden="true"></i></button>
									<input type="text" class="form-control" name="keyword" data-table-search="true" placeholder="{$_M['word']['app_shop_discountname']}">
								</div>
							</div>
						</div>-->
						<ul class="shop-discount-list blocks-100 blocks-sm-2 blocks-xl-3 m-t-20" data-scale='{$c.met_productimg_y}x{$c.met_productimg_y}'>
							<div class="h-200 vertical-align text-xs-center"><div class="loader vertical-align-middle loader-default"></div></div>
						</ul>
						<!--<div>
							<button type="button" class="btn btn-primary btn-block btn-squared" hidden id="shop-discount-more"><i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>{$_M['word']['app_shop_morediscount']}</button>
						</div>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
var discount_json_url = '{$_M['url']['shop_discount_my']}',
    discount_receive_url = '{$_M['url']['shop_discount_receive']}';
</script>
<include file="sys_web/foot"/>