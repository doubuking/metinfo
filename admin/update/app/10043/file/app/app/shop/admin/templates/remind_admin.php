<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title = $_M['word']['app_shop_remind_title'];
$active[6]=$remind_nav[2]='active';
?>
<include file="app/head"/>
<div class="page-content">
	<div class="panel m-b-0">
		<div class="panel-body">
			<include file="app/remind_nav"/>
			<div class="col-md-8 col-lg-6 row m-t-20">
				<div class="well p-10">{$word.app_shop_remind_tips1}</div>
				<form action="{$_M['url']['own_form']}a=doeditor&action=remind_admin" class="form-horizontal row remind-admin">
					<div class="example-wrap m-b-0">
						<div class="example">
							<div class="form-group">
								<label class="col-sm-3 form-control-label">{$word.app_shop_remind_phone_number}</label>
								<div class="col-sm-9">
									<input type="text" name="shopv2_admintel" placeholder="{$word.app_shop_remind_tips1}" value="{$_M['config']['shopv2_admintel']}" class="form-control" data-plugin="tokenfield">
									<p class="m-t-10 m-b-0">{$word.app_shop_remind_tips3}</p>
								</div>
							</div>
							<div class="form-group m-b-0">
								<label class="col-sm-3 form-control-label">{$word.app_shop_remind_mail}</label>
								<div class="col-sm-9">
									<input type="text" name="shopv2_adminemail" value="{$_M['config']['shopv2_adminemail']}" placeholder="{$word.app_shop_remind_tips1}" class="form-control" data-plugin="tokenfield">
									<p class="m-t-10 m-b-0">{$word.app_shop_remind_tips4}</p>
								</div>
							</div>
					  	</div>
					</div>
					<div>
						<div class="col-sm-3"></div>
						<div class="col-sm-9"><button type="sumbit" class="btn btn-primary">{$word.app_shop_save}</button></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<include file="sys_admin/foot_v2"/>