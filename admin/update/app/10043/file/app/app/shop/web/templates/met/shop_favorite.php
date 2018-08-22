<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$data['page_title'] =$_M['word']['app_shop_myfavorite'].$data['page_title'];
?>
<include file="sys_web/head"/>
<link href="{$_M['url']['own_tem']}css/shop.css?{$met_file_version}" rel='stylesheet' type='text/css'>
<div class="page bg-pagebg1">
	<div class="container">
		<div class="page-content row">
			<include file="user_sidebar"/>
			<div class="col-lg-9">
				<div class="panel m-b-0" boxmh-mh>
					<div class="panel-body shop-favorite">
						<div>
							<ul class="nav nav-tabs nav-tabs-line shop-favorite-state">
								<li class='nav-item'><a class="nav-link" href data-toggle="tab" data-state="0">{$_M['word']['app_shop_favorited']}</a></li>
								<!--<li class='nav-item'><a class="nav-link" href="#state1" data-toggle="tab" data-state="1">{$_M['word']['app_shop_favorite_expired']}</a></li>-->
							</ul>
						</div>
						<!--<div class="shop-favorite-keyword m-t-20">
							<div class="form-group">
								<div class="input-search">
									<button type="submit" class="input-search-btn"><i class="icon wb-search" aria-hidden="true"></i></button>
									<input type="text" class="form-control" name="keyword" data-table-search="true" placeholder="{$_M['word']['app_shop_favorite_search']}">
								</div>
							</div>
						</div>-->
						<ul class="shop-favorite-list blocks-2 blocks-sm-3 blocks-md-4 blocks-xxl-5 m-t-20" data-scale='{$c.met_productimg_y}x{$c.met_productimg_y}' data-ajax-url="{$_M['url']['shop_favorite_my']}" data-do-url="{$_M['url']['shop_favorite_do']}">
							<div class="h-200 vertical-align text-xs-center favorite-loader"><div class="loader vertical-align-middle loader-default"></div></div>
						</ul>
						<!--<div>
							<button type="button" class="btn btn-primary btn-block btn-squared" hidden id="shop-favorite-more"><i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>{$_M['word']['app_shop_morefavorite']}</button>
						</div>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<include file="sys_web/foot"/>