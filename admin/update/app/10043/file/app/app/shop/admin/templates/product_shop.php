<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
echo <<<EOT
-->
<link rel="stylesheet" href="{$_M['url']['own']}admin/templates/css/product_shop.css?{$met_file_version}">
<div class="panel panel-default product_shop" data-url="{$_M['url']['own']}admin/templates/js/product_shop.js?{$met_file_version}">
	<textarea hidden name="paraku">{$list['speclist']}</textarea>
	<textarea hidden name="shop_paralist">{$list['paralist2']}</textarea>
	<textarea hidden name="shop_plist">{$list['plist2']}</textarea>
	<textarea hidden name="shop_message">{$list['message']}</textarea>
    <div class="panel-heading" role="tab">
		<h4 class="panel-title">{$_M['word']['app_shop_product_table_title']}</h4>
    </div>
	<dl>
		<dt>{$_M['word']['app_shop_product_goods_specification']}</dt>
		<dd class="standard">
			<div class="btn-group para-add">
			  	<button type='button' class="btn btn-default dropdown-toggle" data-toggle="dropdown">{$_M['word']['app_shop_product_select_spec']}</button>
			  	<ul class="dropdown-menu" role="menu">
				    <li role="presentation" hidden>
						<div class="form-inline" style="margin:0px 10px;">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="{$_M['word']['app_shop_product_input_spec_name']}">
							</div>
							<button type='button' class="btn btn-primary" style="margin-left:5px;">{$_M['word']['app_shop_ok']}</button>
							<button type='button' class="btn btn-default" style="margin-left:5px;">{$_M['word']['app_shop_cancel']}</button>
						</div>
					</li>
				 	<li role="presentation" class="divider" hidden></li>
					<li role="presentation" class="existing">
<!--
EOT;
foreach($list['paraku'] as $key=>$val){
echo <<<EOT
-->
						<a href="javascript:;" data-spec_id="{$val['id']}">{$val['name']}</a>
<!--
EOT;
}
echo <<<EOT
-->
					</li>
					<li role="presentation" class="divider"></li>
					<li><a href="javascript:;" data-toggle="modal" data-target=".specification-modal" class='para-set'>{$_M['word']['app_shop_spec_more']}</a></li>
			  	</ul>
			</div>
			<button type='button' data-toggle="modal" data-target=".specification-modal" class='btn btn-primary' style="margin-left:10px;">{$_M['word']['app_shop_spec_setting']}</button>
		  	<button type='button' class='btn btn-default btn-warning paraku-refresh' data-url="{$_M['url']['adminurl']}anyid=44&n=shop&c=specification_admin&a=dogetspeclist" style="margin-left:10px;">{$_M['word']['app_shop_spec_refresh']}</button>
		  	<span class='tips'>{$_M['word']['app_shop_product_tips1']}</span>
		</dd>
	</dl>
	<dl class="stock" hidden>
		<dt>{$_M['word']['app_shop_product_goods_stock']}</dt>
		<dd>
		</dd>
	</dl>
	<dl>
		<dt>{$_M['word']['app_shop_product_price']}</dt>
		<dd>
			<div class="fbox">
				<div class="form-inline">
					<div class="form-group">
						<div class="input-group">
						  <!--<span class="input-group-addon">{$_M['config']['shopv2_price_str_prefix']}</span>-->
						  <input type="text" class="form-control" name="price" value="{$list[price]}" style="width:100px;" data-required="1" >
						</div>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="original" value="{$list[original]}" placeholder="{$_M['word']['app_shop_product_original_price']}" style="width:100px;" >
					</div>
				</div>
			</div>
		</dd>
	</dl>
	<dl>
		<dt>{$_M['word']['app_shop_product_stock']}</dt>
		<dd>
			<div class="form-inline">
				<div class="form-group">
					<input type="text" name="stock" class="form-control" value="{$list[stock]}" style="width:100px;" data-required="1" />
				</div>
				<div class="checkbox" style="margin-left:10px;">
					<label>
						<input type="checkbox" name="stock_show" value="1" data-checked="{$list[stock_show]}">
						{$_M['word']['app_shop_product_show_goods_stock']}
					</label>
				</div>
			</div>
		</dd>
	</dl>
</div>
<div class="panel panel-default product_shop_logistics">
    <div class="panel-heading" role="tab">
		<h4 class="panel-title">{$_M['word']['app_shop_product_logistics_other']}</h4>
    </div>
	<div id="logistics">
		<dl>
			<dt>{$_M['word']['app_shop_product_freight_set']}</dt>
			<dd>
				<div class="form-inline" style="margin-bottom:10px;">
					<div class="radio">
						<label>
							<input type="radio" name="freight_type" value="2" data-checked="{$list[freight_type]}">
							{$_M['word']['app_shop_product_unified_freight']}
						</label>
					</div>
					<div class="form-group" style="margin-left:10px;">
						<div class="input-group">
						  <!--<span class="input-group-addon">{$_M['config']['shopv2_price_str_prefix']}</span>-->
						  <input type="text" class="form-control input-sm" name="freight" value="{$list[freight]}" style="width:100px;" >
						</div>
					</div>
				</div>
				<div class="form-inline" style="margin-bottom:10px;">
					<div class="radio">
						<label>
							<input type="radio" name="freight_type" value="1" >
							{$_M['word']['app_shop_product_temp_freight']}
						</label>
					</div>
					<div class="form-group" style="margin-left:10px;">
						<select name="freight_mould" data-checked="{$list[freight_mould]}"></select>
						<a href="{$_M['url']['adminurl']}anyid=44&n=shop&c=freight_admin&a=doindex" target="_blank" style="margin-left:10px;">{$_M['word']['app_shop_product_create']}</a>
						<a href="{$_M['url']['adminurl']}anyid=44&n=shop&c=freight_admin&a=dorefresh_discount_list" class="refresh_freight_mould" style="margin-left:10px;">{$_M['word']['']}{$_M['word']['app_shop_product_refresh']}</a>
					</div>
				</div>
				<div class="form-inline">
					<div class="radio">
						<label>
							<input type="radio" name="freight_type" value="0">
							{$_M['word']['app_shop_product_not_logistics']}
						</label>
					</div>
					<div class="form-group" style="margin-left:10px;">
						<span class="tips">{$_M['word']['app_shop_product_tips2']}</span>
						<span class="tips">{$_M['word']['app_shop_product_message_set']}</span>
					</div>
				</div>
			</dd>
		</dl>
		<dl>
			<dt>{$_M['word']['app_shop_product_restrictions']}</dt>
			<dd class="ftype_input">
				<div class="fbox">
					<input type="text" name="purchase" value="{$list[purchase]}" style="width:100px;" />
				</div>
				<span class="tips">{$_M['word']['app_shop_product_tips3']}</span>
			</dd>
		</dl>
		<dl>
			<dt>{$_M['word']['app_shop_product_message_set']}</dt>
			<dd class="message_list">
				<p><a href="javascript:;" class="add_message">{$_M['word']['app_shop_product_add_field']}</a></p>
				<textarea name="message_html" hidden>
					<div class="form-inline" style="margin-bottom:10px;">
						<div class="form-group">
							<input type="text" name="message_list" placeholder="{$_M['word']['app_shop_product_field_name']}" class="form-control input-sm" value="" style="width:100px;" />
						</div>
						<div class="checkbox" style="margin-left:10px;">
							<label>
								<input type="checkbox" name="message_line" value="1">
								{$_M['word']['app_shop_product_multiline']}
							</label>
						</div>
						<div class="checkbox" style="margin-left:10px;">
							<label>
								<input type="checkbox" name="message_required" value="1">
								{$_M['word']['app_shop_product_required']}
							</label>
						</div>
						<div class="form-group" style="margin-left:10px;">
							<a href="javascript:;" class="delete">{$_M['word']['delete']}</a>
						</div>
					</div>
				</textarea>
			</dd>
		</dl>
		<dl class='hide'>
			<dt>{$_M['word']['app_shop_product_user_discount']}</dt>
			<dd class="ftype_checkbox">
				<div class="fbox">
					<label><input name="user_discount" type="checkbox" value="1" data-checked="{$list['user_discount']}">{$_M['word']['app_shop_product_not_discount']}</label>
				</div>
			</dd>
		</dl>
		<dl hidden>
			<dt>{$_M['word']['app_shop_product_invoice']}</dt>
			<dd class="ftype_radio ftype_transverse">
				<div class="fbox">
					<label><input name="lnvoice" type="radio" value="0" data-checked="{$list['lnvoice']}">{$_M['word']['app_shop_product_not_exist']}</label>
					<label><input name="lnvoice" type="radio" value="1">{$_M['word']['app_shop_product_exist']}</label>
				</div>
				<span class="tips">{$_M['word']['app_shop_product_tips4']}</span>
			</dd>
		</dl>
		<dl hidden>
			<dt>{$_M['word']['app_shop_product_vgoods_delivery']}</dt>
			<dd class="ftype_radio ftype_transverse">
				<div class="fbox">
					<label><input name="auto_sent" type="radio" value="1" data-checked="{$list['auto_sent']}">{$_M['word']['open']}</label>
					<label><input name="auto_sent" type="radio" value="0">{$_M['word']['close']}</label>
				</div>
				<span class="tips">{$_M['word']['app_shop_product_vgoods_delivery_open']}</span>
			</dd>
		</dl>
	</div>
</div>
<!--规格设置弹框-->
<div class="modal fade specification-modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title clearfix">{$_M['word']['app_shop_spce_management']}<span class='red pull-right' style='font-size:16px;margin-top:2px;'>{$_M['word']['app_shop_product_tips5']}</span></h4>
			</div>
			<div class="modal-body" style='padding: 0;'>
				<iframe data-src="{$_M['url']['adminurl']}anyid=44&n=shop&c=specification_admin&a=doindex&pageset=1" frameborder="0" width='100%' height='700'></iframe>
			</div>
		</div>
	</div>
</div>
<script>
function valisnum(my){
	var t = false;
	if(!isNaN(my.val())&&my.val()!=''){
		t = true;
	}
	return t;
}
</script>
<!--
EOT;
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (https://www.metinfo.cn). All rights reserved.
?>