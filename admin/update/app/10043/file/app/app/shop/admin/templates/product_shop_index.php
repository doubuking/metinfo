<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
require $this->template('ui/head');
echo <<<EOT
-->
<link rel="stylesheet" href="{$_M['url']['own_tem']}css/metinfo.css?{$met_file_version}" />
<form method="POST" class="ui-from" name="myform" action="{$_M['url']['own_form']}a=dolistsave" target="_self">
	<div class="v52fmbx product_index">
		<div class="v52fmbx-table-top">
			<div class="ui-float-left">
				<a class="btn btn-danger" href="{$_M['url']['own_form']}a=doadd&class1_select={$list['class1']}&class2_select={$list['class2']}&class3_select={$list['class3']}" role="button">{$_M['word']['app_shop_product_publish']}</a>
			</div>
			<div class="ui-float-right">
				<div class="ui-table-search">
					<i class="fa fa-search"></i>
					<input name="keyword" data-table-search="1" type="text" value="" class="ui-input" placeholder="{$_M['word']['app_shop_product_search']}">
				</div>
			</div>
			<div class="ui-float-right">
				<div class="ftype_select-linkage">
					<div class="fbox" data-selectdburl="{$_M['url']['own_form']}a=docolumnjson">
						<select name="class1_select" class="prov" data-table-search="1" data-checked="{$list['class1']}"></select>
						<select name="class2_select" class="city" data-table-search="1" data-checked="{$list['class2']}"></select>
						<select name="class3_select" class="dist" data-table-search="1" data-checked="{$list['class3']}"></select>
					</div>
				</div>
			</div>
		</div>
		<input id="class1id" name="class1" data-table-search="1" value="{$list['class1']}" class="ui-input" type="hidden" />
		<input id="class2id" name="class2" data-table-search="1" value="{$list['class2']}" class="ui-input" type="hidden" />
		<input id="class3id" name="class3" data-table-search="1" value="{$list['class3']}" class="ui-input" type="hidden" />
		<table class="display dataTable ui-table" id='shopproduct-list' data-table-ajaxurl="{$_M['url']['own_form']}a=dojson_list&class1={$list['class1']}&class2={$list['class2']}&class3={$list['class3']}" data-table-pageLength="20">
			<thead>
				<tr>
					<th width="20" data-table-columnclass="met-center"><input name="id" data-table-chckall="id" type="checkbox" value="" /></th>
					<th width="300">
						{$_M['word']['app_shop_product_product']}
						<a href="javascript:;" class="orderby-link">{$_M['word']['app_shop_product_price']}</a>
						<input name="orderby_price" data-table-search="1" type="hidden">
					</th>
					<th data-table-columnclass="met-center" width="70">
					<a href="javascript:;" class="orderby-link">{$_M['word']['app_shop_product_hits']}</a>
					<input name="orderby_hits" data-table-search="1" type="hidden">
					</th>
					<th data-table-columnclass="met-center" width="70">
						<a href="javascript:;" class="orderby-link">{$_M['word']['app_shop_product_stock']}</a>
						<input name="orderby_stock" data-table-search="1" type="hidden">
					</th>
					<th data-table-columnclass="met-center" width="70">
						<a href="javascript:;" class="orderby-link">{$_M['word']['app_shop_product_total_sales']}</a>
						<input name="orderby_sales" data-table-search="1" type="hidden">
					</th>
					<th data-table-columnclass="met-center" width="160">
					<a href="javascript:;" class="orderby-link">{$_M['word']['app_shop_product_update_time']}</a>
					<input name="orderby_updatetime" data-table-search="1" type="hidden">
					</th>
					<th width="120">
						<select name="search_type" data-table-search="1">
							<option value="">{$_M['word']['app_shop_product_search_option1']}</option>
							<option value="1">{$_M['word']['app_shop_product_search_option2']}</option>
							<option value="2">{$_M['word']['app_shop_product_search_option3']}</option>
							<option value="4">{$_M['word']['app_shop_product_search_option4']}</option>
						</select>
					</th>
					<th data-table-columnclass="met-center" width="40"><abbr title="{$_M['word']['app_shop_product_order_by_tips1']}">{$_M['word']['app_shop_product_order_by']}</abbr></th>
					<th>{$_M['word']['app_shop_operator']}</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
			<tfoot>
				<tr>
					<th><input name="id" type="checkbox" data-table-chckall="id" value=""></th>
					<th colspan="8" class="formsubmit" style="text-align:left!important;">
<!--
EOT;
require $this->template('tem/mod_batchoption');
echo <<<EOT
-->
					</th>
				</tr>
			</tfoot>
		</table>
	</div>
</form>
<!--发货码设置弹框-->
<div class="modal fade auto-sent-modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title clearfix">{$_M['word']['app_shop_set_shipping_code']}</h4>
			</div>
			<div class="modal-body" style='padding: 0;'>
				<iframe data-src="{$_M['url']['adminurl']}n=shop&c=card_admin&a=do_set_card&pageset=1&pid=" frameborder="0" width='100%' height='700' class='pull-left'></iframe>
			</div>
		</div>
	</div>
</div>
<!--
EOT;
require $this->template('ui/foot');
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (https://www.metinfo.cn). All rights reserved.
?>