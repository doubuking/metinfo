<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title = $_M['word']['app_shop_remind_user_title'];
$active[6]=$remind_nav[1]='active';
?>
<include file="app/head"/>
<div class="page-content">
	<div class="panel m-b-50">
		<div class="panel-body">
			<include file="app/remind_nav"/>
			<div class="col-lg-10 col-xl-8 col-xxl-6 row m-t-20">
				<div class="well p-10">{$word.app_shop_remind_tips4}<br/>{$word.app_shop_remind_tips6}<br/>{$word.app_shop_remind_tips7}</div>
				<div class="well p-10">{$word.app_shop_remind_tips8}<br/>{rid} {$word.app_shop_remind_ordernum}<br/>{user} {$word.app_shop_remind_suername}<br/>{logistics} {$word.app_shop_remind_logistics}<br/>{odd} {$word.app_shop_remind_courier_number}</div>
				<form action="{$_M['url']['own_form']}a=doeditor&action=doremind_user" class="form-horizontal m-t-40 remind-user shop-remind">
					<div class="example-wrap m-b-20">
						<h4 class="example-title">{$word.app_shop_remind_ordered}</h4>
						<hr>
						<div class="example">
							<div class="form-group row">
								<label class="col-xs-6 col-sm-4 col-md-3 form-control-label">{$word.app_shop_remind_short_message_reminding}</label>
								<div class="col-xs-6 col-sm-8 col-md-9 m-t-5">
									<input type="checkbox" id="btn-place-order" name="shopv2_is_usmsv1" data-plugin="switchery" value="{$c.shopv2_is_usmsv1}" data-checked='1' hidden/>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label class="col-sm-4 col-md-3 form-control-label">{$word.app_shop_remind_message_set}</label>
								<div class="col-sm-8 col-md-9">
									<textarea name="shopv2_usmsv1" rows="4" class="form-control">{$_M['config']['shopv2_usmsv1']}</textarea>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label class="col-xs-6 col-sm-4 col-md-3 form-control-label">{$word.app_shop_remind_short_mail_reminding}</label>
								<div class="col-xs-6 col-sm-8 col-md-9 m-t-5">
									<input type="checkbox" id="btn-place-order" name="shopv2_is_uemailv1" data-plugin="switchery" value="{$c.shopv2_is_uemailv1}" data-checked='1' hidden/>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label class="col-xs-6 col-sm-4 col-md-3 form-control-label">{$word.app_shop_remind_mail_set}</label>
								<div class="col-xs-6 col-sm-8 col-md-9">
									<button type='button' class="btn btn-outline btn-primary btn-sm" data-toggle="collapse" data-target="#btn-email-place-order" aria-expanded="false">{$word.app_shop_setting}</button>
								</div>
							</div>
							<hr>
							<div class="collapse" id="btn-email-place-order">
								<div class="form-group row">
									<label class="col-sm-4 col-md-3 form-control-label">{$word.app_shop_remind_mail_title}</label>
									<div class="col-sm-8 col-md-9">
									 <input type="text" class="form-control" placeholder="{$word.app_shop_remind_mail_title}" name="shopv2_uemailtv1" value="{$_M['config']['shopv2_uemailtv1']}" />
									</div>
								</div>
								<hr>
								<div class="form-group row">
									<label class="col-sm-4 col-md-3 form-control-label">{$word.app_shop_remind_mail_content}</label>
									<div class="col-sm-8 col-md-9">
									 <textarea name="shopv2_uemailcv1" rows="1" data-plugin='editor' data-editor-y='200' id="editor-email-place-order">{$_M['config']['shopv2_uemailcv1']}</textarea>
									</div>
								</div>
								<hr>
							</div>
						</div>
					</div>
					<div class="example-wrap m-b-20">
						<h4 class="example-title">{$word.app_shop_remind_payed}</h4>
						<hr>
						<div class="example">
							<div class="form-group row">
								<label class="col-xs-6 col-sm-4 col-md-3 form-control-label">{$word.app_shop_remind_reminding}</label>
								<div class="col-xs-6 col-sm-8 col-md-9 m-t-5">
									<input type="checkbox" id="btn-place-order" name="shopv2_is_usmsv2" data-plugin="switchery" value="{$c.shopv2_is_usmsv2}" data-checked='1' hidden/>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label class="col-sm-4 col-md-3 form-control-label">{$word.app_shop_remind_message_set}</label>
								<div class="col-sm-8 col-md-9">
									<textarea name="shopv2_usmsv2" rows="4" class="form-control">{$_M['config']['shopv2_usmsv2']}</textarea>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label class="col-xs-6 col-sm-4 col-md-3 form-control-label">{$word.app_shop_remind_short_mail_reminding}</label>
								<div class="col-xs-6 col-sm-8 col-md-9 m-t-5">
									<input type="checkbox" id="btn-place-order" name="shopv2_is_uemailv2" data-plugin="switchery" value="{$c.shopv2_is_uemailv2}" data-checked='1' hidden/>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label class="col-xs-6 col-sm-4 col-md-3 form-control-label">{$word.app_shop_remind_mail_set}</label>
								<div class="col-xs-6 col-sm-8 col-md-9">
									<button type='button' class="btn btn-outline btn-primary btn-sm" data-toggle="collapse" data-target="#btn-email-pay" aria-expanded="false">{$word.app_shop_setting}</button>
								</div>
							</div>
							<hr>
							<div class="collapse" id="btn-email-pay">
								<div class="form-group row">
									<label class="col-sm-4 col-md-3 form-control-label"></label>
									<div class="col-sm-8 col-md-9">
									 <input type="text" class="form-control" placeholder="{$word.app_shop_remind_mail_title}" name="shopv2_uemailtv2" value="{$_M['config']['shopv2_uemailtv2']}">
									</div>
								</div>
								<hr>
								<div class="form-group row">
									<label class="col-sm-4 col-md-3 form-control-label">{$word.app_shop_remind_mail_content}</label>
									<div class="col-sm-8 col-md-9">
									 <textarea name="shopv2_uemailcv2" rows="1" data-plugin='editor' data-editor-y='200' id="editor-email-pay">{$_M['config']['shopv2_uemailcv2']}</textarea>
									</div>
								</div>
								<hr>
							</div>
						</div>
					</div>
					<div class="example-wrap m-b-20">
						<h4 class="example-title">{$word.app_shop_remind_send}</h4>
						<hr>
						<div class="example">
							<div class="form-group row">
								<label class="col-xs-6 col-sm-4 col-md-3 form-control-label">{$word.app_shop_remind_reminding}</label>
								<div class="col-xs-6 col-sm-8 col-md-9 m-t-5">
									<input type="checkbox" id="btn-place-order" name="shopv2_is_usmsv3" data-plugin="switchery" value="{$c.shopv2_is_usmsv3}" data-checked='1' hidden/>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label class="col-sm-4 col-md-3 form-control-label">{$word.app_shop_remind_message_set}</label>
								<div class="col-sm-8 col-md-9">
									<textarea name="shopv2_usmsv3" rows="4" class="form-control">{$_M['config']['shopv2_usmsv3']}</textarea>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label class="col-xs-6 col-sm-4 col-md-3 form-control-label">{$word.app_shop_remind_short_mail_reminding}</label>
								<div class="col-xs-6 col-sm-8 col-md-9 m-t-5">
									<input type="checkbox" id="btn-place-order" name="shopv2_is_uemailv3" data-plugin="switchery" value="{$c.shopv2_is_uemailv3}" data-checked='1' hidden/>
								</div>
							</div>
							<hr>
							<div class="form-group row">
								<label class="col-xs-6 col-sm-4 col-md-3 form-control-label">{$word.app_shop_remind_mail_set}</label>
								<div class="col-xs-6 col-sm-8 col-md-9">
									<button type='button' class="btn btn-outline btn-primary btn-sm"  data-toggle="collapse" data-target="#btn-email-deliver-goods" aria-expanded="false">{$word.app_shop_setting}</button>
								</div>
							</div>
							<hr>
							<div class="collapse" id="btn-email-deliver-goods">
								<div class="form-group row">
									<label class="col-sm-4 col-md-3 form-control-label">{$word.app_shop_remind_mail_title}</label>
									<div class="col-sm-8 col-md-9">
									  	<input type="text" class="form-control" placeholder="{$word.app_shop_remind_mail_title}" name="shopv2_uemailtv3" value="{$_M['config']['shopv2_uemailtv3']}">
									</div>
								</div>
								<hr>
								<div class="form-group row m-b-0">
									<label class="col-sm-4 col-md-3 form-control-label">{$word.app_shop_remind_mail_content}</label>
									<div class="col-sm-8 col-md-9">
									 	<textarea name="shopv2_uemailcv3" rows="1" data-plugin='editor' data-editor-y='200' id="editor-email-deliver-goods">{$_M['config']['shopv2_uemailcv3']}</textarea>
									</div>
								</div>
							</div>
					  	</div>
					</div>
					<div class="form-save-fixed fixed-b-l w-full">
						<div class="page-content p-y-0 bg-blue-100">
							<div class="panel-body p-y-10">
								<div class="row col-lg-10 col-xl-8 col-xxl-6">
									<div class="row">
										<label class="col-sm-4 col-md-3 form-control-label hidden-xs-down"></label>
										<div class="col-sm-8 col-md-9">
											<button type="submit" class="btn btn-primary">{$word.app_shop_save}</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<include file="sys_admin/foot_v2"/>