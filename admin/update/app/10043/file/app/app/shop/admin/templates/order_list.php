<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title = $_M['word']['app_shop_order_order_all'];
$active[2] = 'active';
?>
<include file="app/head"/>
<div class="page-content">
	<div class="panel m-b-0">
		<div class="panel-body">
			<input type="hidden" name="state" data-table-search="true">
			<ul class="nav nav-tabs nav-tabs-line" id="order-state-seach">
				<li class='nav-item'><a class='nav-link' data-toggle="tab" href='javascript:;' data-state="">{$word.app_shop_all}</a></li>
				<li class='nav-item'><a class='nav-link' data-toggle="tab" href="javascript:;" data-state="1">{$word.app_shop_order_pending_papy}<span></span></a></li>
				<li class='nav-item'><a class='nav-link' data-toggle="tab" href="javascript:;" data-state="2">{$word.app_shop_order_pending_delivery}<span></span></a></li>
				<li class='nav-item'><a class='nav-link' data-toggle="tab" href="javascript:;" data-state="3">{$word.app_shop_order_already_shipped}<span></span></a></li>
				<li class='nav-item'><a class='nav-link' data-toggle="tab" href="javascript:;" data-state="4">{$word.app_shop_order_conplete}<span></span></a></li>
				<li class='nav-item'><a class='nav-link' data-toggle="tab" href="javascript:;" data-state="-1">{$word.app_shop_order_refund}<span></span></a></li>
				<li class='nav-item'><a class='nav-link' data-toggle="tab" href="javascript:;" data-state="0">{$word.app_shop_order_closed}<span></span></a></li>
			</ul>
			<div class="row m-t-20">
				<div class="col-sm-8 col-md-6 col-xl-4">
					<div class="form-group m-0">
						<div class="input-search">
							<i class="input-search-icon wb-search"></i>
							<input type="text" class="form-control" name="keyword" data-table-search="true" placeholder="{$word.app_shop_order_order_no_usernaem}">
						</div>
					</div>
				</div>
				<div class="col-sm-4 col-md-6 col-xl-8 text-sm-right">
					<button class="btn btn-default btn-outline btn-moreseach" data-toggle="collapse" data-target=".moreseach" aria-expanded="false" aria-controls="moreseach"><i class="wb-search m-r-5"></i>{$word.app_shop_order_screening_exporting}</button>
				</div>
			</div>
			<div class="collapse moreseach">
				<div class="well m-t-10 m-b-0">
					<form action="{$_M['url']['own_form']}&a=doexport" method="POST">
						<div class="row">
							<div class="col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3">
								<div class="form-group form-inline input-daterange">
									<div class="input-group">
										<span class="input-group-addon"><i class="icon wb-calendar"></i></span>
										<input type="text" name="fromtime" value="{$data.start_time}" data-value="{$data.start_time}" class="form-control" data-table-search="true" data-plugin='datepicker'>
									</div>
									<div class="input-group">
										<span class="input-group-addon">{$word.app_shop_order_to}</span>
										<input type="text" name="totime" value="{$data.end_time}" data-value="{$data.end_time}" class="form-control" data-table-search="true" data-plugin='datepicker'>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
                            {$word.app_shop_order_export_option}：
							<input type="hidden" name='export'>
							<ul class='export-list list-inline m-t-5 blocks-xs-2 blocks-sm-4 blocks-md-5 blocks-lg-6'>
								<label>{$word.app_shop_order_no}</label>
								<label>{$word.app_shop_order_goods_name}</label>
								<label>{$word.app_shop_order_number}</label>
								<label>{$word.app_shop_order_username}</label>
								<label>{$word.app_shop_order_order_time}</label>
								<label>{$word.app_shop_order_order_state}</label>
								<label>{$word.app_shop_order_real_payment}</label>
								<label>{$word.app_shop_order_pay_type}</label>
								<label>{$word.app_shop_order_receiving_address}</label>
								<label>{$word.app_shop_order_buyer_message}</label>
								<label>{$word.app_shop_order_business_notes}</label>
							</ul>
						</div>
						<div>
							<button type="submit" class="btn btn-primary btn-export">{$word.app_shop_order_exporting}</button>
						</div>
					</form>
				</div>
			</div>
			<table class="table table-hover table-striped w-full m-t-10 dataTable" id="order-list" data-ajaxurl="{$_M['url']['own_form']}&a=dojson_order_list">
				<thead>
					<tr>
						<th width="400">{$word.app_shop_order_goods}</th>
						<th data-table-columnclass="text-xs-center">{$word.app_shop_order_username}</th>
						<th data-table-columnclass="text-xs-center">{$word.app_shop_order_order_time}</th>
						<th data-table-columnclass="text-xs-center">{$word.app_shop_order_order_state}</th>
						<th data-table-columnclass="text-xs-center">{$word.app_shop_order_real_payment}</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="5"><div class="h-200 vertical-align text-xs-center"><div class="loader vertical-align-middle loader-default"></div></div></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
<include file="sys_admin/foot_v2"/>