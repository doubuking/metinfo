<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title=$data['discount']['id']?$data['discount']['name'].'-'.$_M['word']['app_shop_discount_edit']:$_M['word']['app_shop_add_edit'];
$active[5] = 'active';
?>
<include file="app/head"/>
<div class="page-content">
	<div class="panel m-b-0">
		<div class="panel-body">
			<div class="row col-md-10 col-lg-8 col-xl-6 col-xxl-4">
	        	<form method="POST" action="{$_M['url']['own_form']}a={$data['action']}" class="form-horizontal row discount-editor">
			  		<input name="id" type="hidden" value="{$data['discount']['id']}"/>
					<!--基本信息-->
					<div class="form-group">
						<label class="col-xs-4 form-control-label">{$word.app_shop_discount_name}</label>
						<div class="col-xs-8">
							<input type="text" name="name" value="{$data['discount']['name']}" required class="form-control" data-fv-notempty-message="{$_M['word']['js41']}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 form-control-label">{$word.app_shop_discount_price}</label>
						<div class="col-xs-8">
							<div class="input-group">
							 	<span class="input-group-addon">{$_M['config']['shopv2_price_str_prefix']}</span>
								<input type="text" name="par" value="{$data['discount']['par']}" required class="form-control" data-fv-notempty-message="{$_M['word']['js41']}" data-fv-greaterthan="true" data-fv-greaterthan-value="0.1">
							</div>
						</div>
					</div>
					<!--使用规则-->
					<div class="form-group">
						<label class="col-sm-4 form-control-label">{$word.app_shop_discount_condition}</label>
						<div class="col-sm-8">
							<div class="input-group">
						        <span class="input-group-addon">{$word.app_shop_discount_use_tips1} {$_M['config']['shopv2_price_str_prefix']}</span>
								<input type="text" name="r_price" value="{$data['discount']['r_price']}" class="form-control" required data-fv-notempty-message="{$_M['word']['js41']}" data-fv-greaterthan="true" data-fv-greaterthan-value="0.1">
								<span class="input-group-addon">{$word.app_shop_discount_use_tips2}</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 form-control-label">{$word.app_shop_discount_suer_limit}</label>
						<div class="col-sm-8">
							<select class="form-control" name="ugid" data-checked="{$data['discount']['ugid']}">
								<option value="0">{$word.app_shop_discount_suerable}</option>
								<list data="$data['group']" name="$val" num="100">
								<option value="{$val.access}">{$val.name}{$word.app_shop_discount_suerable1}</option>
								</list>
							</select>
						</div>
			      	</div>
					<div class="form-group">
						<label class="col-xs-4 form-control-label">{$word.app_shop_discount_total_amount}</label>
						<div class="col-xs-8">
							<div class="input-group">
								<input type="text" name="amount" value="{$data['discount']['amount']}" required class="form-control" data-fv-notempty-message="{$_M['word']['js41']}" data-fv-integer="true" data-fv-greaterthan="true" data-fv-greaterthan-value="{$data['discount']['one_user_have']}" data-fv-greaterthan-message="{$word.app_shop_discount_tips1}">
								<span class="input-group-addon">{$word.app_shop_discount_zhang}</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 form-control-label">{$word.app_shop_discount_limit_collar}</label>
						<div class="col-xs-8">
							<div class="input-group">
								<input type="text" name="one_user_have" value="{$data['discount']['one_user_have']}" required class="form-control" data-fv-notempty-message="{$_M['word']['js41']}" data-fv-integer="true" data-fv-greaterthan="true" data-fv-greaterthan-value="1">
								<span class="input-group-addon">{$word.app_shop_discount_zhang}</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 form-control-label">{$word.app_shop_discount_begin_time}</label>
						<div class="col-sm-8">
							<div class="input-group">
						        <span class="input-group-addon">
						          <i class="icon wb-calendar" aria-hidden="true"></i>
						        </span>
						        <input type="text" name="s_time_1" value="{$data['discount']['s_time_1']}" class="form-control datepair-date datepair-start" data-plugin="datepicker">
						        <span class="input-group-addon">
						          <i class="icon wb-time" aria-hidden="true"></i>
						        </span>
								<input type="text" name="s_time_2" value="{$data['discount']['s_time_2']}" class="form-control datepair-time datepair-start" data-plugin="clockpicker" data-placement='left'/>
					      	</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 form-control-label">{$word.app_shop_discount_end_time}</label>
						<div class="col-sm-8">
							<div class="input-group">
						        <span class="input-group-addon">
						          <i class="icon wb-calendar" aria-hidden="true"></i>
						        </span>
						        <input type="text" name="e_time_1" value="{$data['discount']['e_time_1']}" class="form-control datepair-date datepair-end" data-plugin="datepicker"/>
						        <span class="input-group-addon">
						          <i class="icon wb-time" aria-hidden="true"></i>
						        </span>
						        <input type="text" name="e_time_2" value="{$data['discount']['e_time_2']}" class="form-control datepair-time datepair-end" data-plugin="clockpicker" data-placement='left'/>
						      </div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 form-control-label">{$word.app_shop_discount_include_good}</label>
						<div class="col-xs-8">
							<div class="radio-custom radio-primary pull-sm-left m-r-20">
							  	<input type="radio" name="all_goods" id='all_goods1' value="1" data-checked='{$data.discount.all_goods}' hidden>
						      	<label for='all_goods1'>{$word.app_shop_discount_all_good}</label>
						    </div>
							<div class="radio-custom radio-primary pull-sm-left m-r-20">
							  	<input type="radio" name="all_goods" id='all_goods0' value="0">
						      	<label for='all_goods0'>{$word.app_shop_discount_appoint_good}</label>
						    </div>
							<?php if(!$data['discount']['all_goods']) $btn_goods_list_class=' in'; ?>
						    <div class="collapse{$btn_goods_list_class} pull-sm-left btn-goods-list">
							    <button type='button' class="btn btn-success add-goods-btn" data-toggle="modal" data-target=".bs-example-modal-lg">{$word.app_shop_discount_goods_editor}</button>
								<input type="hidden" name="goods_list" value="{$data['discount']['goods_list']}" />
						    </div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-4 form-control-label">{$word.app_shop_discount_use_script}</label>
						<div class="col-xs-8">
							<textarea class="form-control" name="instructions" rows="5">{$data['discount']['instructions']}</textarea>
						</div>
					</div>
					<div>
						<label class="col-xs-4 form-control-label"></label>
						<div class="col-xs-8">
							<button type="submit" class="btn btn-primary">{$word.app_shop_save}</button>
							<a class="btn btn-sm btn-white" href="javascript:history.go(-1);">{$word.app_shop_back}</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="modal fade bs-example-modal-lg">
	<div class="modal-dialog modal-lg">
		<div class="modal-content select-goods-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">{$word.app_shop_discount_select_goods}</h4>
			</div>
			<div class="modal-body add-goods" style='margin-top: -20px;'>
				<div class="row">
					<div class="col-sm-6">
						<ul class="nav nav-tabs nav-tabs-line select-goods-state-seach" style='margin-bottom: -2px;'>
							<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="javascript:;" data-state="0">{$word.app_shop_all}</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="javascript:;" data-state="1">{$word.app_shop_discount_selected}</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="javascript:;" data-state="-1">{$word.app_shop_discount_unselected}</a></li>
						</ul>
					</div>
					<div class="col-sm-6">
						<div class="form-group input-search select-goods-keyword-search">
							<i class="input-search-icon wb-search" aria-hidden="true"></i>
							<input type="text" class="form-control" name="keyword" data-table-search="true" placeholder="{$word.app_shop_discount_goods_name}">
						</div>
					</div>
				</div>
				<table class="dataTable table table-hover table-striped w-full select-goods" data-table-pagelength='10' data-ajaxurl="{$_M['url']['own_form']}a=dojson_discount_goods">
					<input type="hidden" name="select_goods" data-table-search="true" value="{$data['discount']['goods_list']}" data-value="{$data['discount']['goods_list']}"/>
					<input type="hidden" name="state" data-table-search="true" value="0" />
					<input type="hidden" name="did" data-table-search="true" value="{$data['discount']['id']}" />
					<thead>
						<tr>
							<th>{$word.app_shop_discount_goods}</th>
							<th data-table-columnclass="met-center">{$word.app_shop_discount_create_time}</th>
							<th>{$word.app_shop_operator}</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="3"><div class="h-200 vertical-align text-xs-center"><div class="loader vertical-align-middle loader-default"></div></div></td>
						</tr>
					</tbody>
					<tfoot>
					<tr>
						<th></th>
						<th><button type='button' class='btn btn-outline btn-sm btn-primary hidden-md-up pull-xs-right add-goods-allcheck'>{$word.app_shop_discount_select_all}</button></th>
						<th class='select-goods-control'>
							<button type='button' class='btn btn-outline btn-sm btn-primary m-r-10 hidden-sm-down add-goods-allcheck'>{$word.app_shop_discount_select_all}</button>
							<button type='button' class='btn btn-outline btn-sm btn-primary add-goods-allcancel'>{$word.app_shop_discount_unselect_all}</button>
						</th>
					</tr>
				</tfoot>
				</table>
			</div>
			<div class='modal-footer' style='margin-top: -10px;'>
				<button type='button' class="btn btn-default modal-close" data-dismiss="modal">{$word.app_shop_close}</button>
				<button type='button' class="btn btn-primary m-l-10 save-goods" data-dismiss="modal">{$word.app_shop_save}</button>
			</div>
		</div>
	</div>
</div>
</div>
<include file="sys_admin/foot_v2"/>