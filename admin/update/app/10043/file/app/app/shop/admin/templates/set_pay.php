<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title = $_M['word']['app_shop_set_pay_setting'];
$active[7]=$set_nav[2]='active';
?>
<include file="app/head"/>
<div class="page-content">
	<div class="panel m-b-0">
		<div class="panel-body">
			<include file="app/set_nav"/>
			<form action="{$_M['url']['own_form']}a=doeditor&action=pay" id="set-pay-form" class="form-horizontal row m-t-20">
				<div class="form-group m-b-0">
					<label class="col-sm-3 col-lg-2 form-control-label">{$word.app_shop_paymentonline}</label>
					<div class='col-sm-9 col-lg-10'>
						<div class="m-t-5">
							<input type="checkbox" data-plugin="switchery" name="shopv2_onlinepay" hidden value="{$c.shopv2_onlinepay}" data-checked='1'>
						</div>
						<p class="m-t-10 m-b-0">{$word.app_shop_set_shop_tips15}</p>
						<p class="m-t-10 m-b-0"><a href="{$_M['url']['adminurl']}&n=pay&c=admin_pay&a=dopaylist" target="_blank">{$word.app_shop_set_payapi_setting} <i class="icon fa-share-square-o" aria-hidden="true"></i></a></p>
					</div>
				</div>
				<hr>
				<div class="form-group">
					<div class="m-t-5">
						<label class="col-sm-3 col-lg-2 form-control-label">{$word.app_shop_paymentcod}</label>
					</div>
					<div class='col-sm-9 col-lg-10'>
						<input type="checkbox" data-plugin="switchery" name="shopv2_deliverypay" hidden value="{$c.shopv2_deliverypay}" data-checked='1'>
						<p class="m-t-10 m-b-0">{$word.app_shop_set_shop_tips16}</p>
					</div>
				</div>
				<div class="form-group m-b-0">
					<label class="col-sm-3 col-lg-2 form-control-label"></label>
					<div class='col-sm-9 col-lg-10'>
						<button type="submit" class="btn btn-primary">{$word.app_shop_save}</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<include file="sys_admin/foot_v2"/>