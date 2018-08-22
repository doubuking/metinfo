<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title = $_M['word']['app_shop_discount_coupon'] ;
$active[5] = 'active';
?>
<include file="app/head"/>
<div class="page-content">
	<div class="panel m-b-0">
		<div class="panel-body">
			<input type="hidden" name="state" data-table-search="true">
			<ul class="nav nav-tabs nav-tabs-line discount-state-seach">
				<li class='nav-item'><a class="nav-link" data-toggle="tab" href data-state>{$word.app_shop_all}</a></li>
				<li class='nav-item'><a class="nav-link" data-toggle="tab" href="#state1" data-state="1">{$word.app_shop_discount_not_begining}</a></li>
				<li class='nav-item'><a class="nav-link" data-toggle="tab" href="#state2" data-state="2">{$word.app_shop_discount_runing}</a></li>
				<li class='nav-item'><a class="nav-link" data-toggle="tab" href="#state3" data-state="3">{$word.app_shop_discount_end}</a></li>
			</ul>
			<div class="row m-t-20">
				<div class="col-xs-5 col-sm-4 col-md-6 col-xl-8">
					<a href="{$_M['url']['own_form']}a=doadd" class="btn btn-success btn-outline"><i class="fa fa-plus-circle"></i> {$word.app_shop_discount_add}</a>
				</div>
				<div class="col-xs-7 col-sm-8 col-md-6 col-xl-4">
					<div class="form-group m-b-0">
						<div class="input-search">
							<i class="input-search-icon wb-search" aria-hidden="true"></i>
							<input type="text" name="keyword" placeholder="{$word.app_shop_discount_name}" data-table-search="true" class="form-control discount-keyword">
						</div>
					</div>
				</div>
			</div>
			<table class="dataTable table table-hover table-striped w-full m-t-20 discount-list" data-plugin="selectable" data-row-selectable="true" data-ajaxurl="{$_M['url']['own_form']}a=dojson_discount_list" data-table-delurl="{$_M['url']['own_form']}a=dodel">
				<thead>
					<tr>
						<th><span class="checkbox-custom checkbox-primary"><input type="checkbox" class="selectable-all" value=""><label></label></span></th>
						<th width="150">{$word.app_shop_discount_name}</th>
						<th>{$word.app_shop_discount_price}</th>
						<th>{$word.app_shop_discount_restriction}</th>
						<th>{$word.app_shop_discount_term_of_validity}</th>
						<th>{$word.app_shop_discount_table_title1}</th>
						<th>{$word.app_shop_discount_state}</th>
						<th>{$word.app_shop_operator}</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="8"><div class="h-100 vertical-align text-xs-center"><div class="loader vertical-align-middle loader-default"></div></div></td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<th><span class="checkbox-custom checkbox-primary"><input type="checkbox" class="selectable-all" value=""><label></label></span></th>
						<th colspan="7">
							<button type="submit" class="btn btn-primary discount-del">{$_M['word']['delete']}</button>
						</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
</div>
<include file="sys_admin/foot_v2"/>