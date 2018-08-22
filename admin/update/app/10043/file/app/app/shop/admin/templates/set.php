<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title = $_M['word']['app_shop_set_basic_setting'];
$active[7]=$set_nav[1]='active';
?>
<include file="app/head"/>
<div class="page-content">
	<div class="panel m-b-50">
		<div class="panel-body">
			<include file="app/set_nav"/>
			<form action="{$_M['url']['own_form']}a=doeditor&action=set" class="form-horizontal m-t-20 shopset-form">
				<div class="form-group row">
					<label class="col-sm-3 col-lg-2 form-control-label">{$word.app_shop_set_shop_switch}</label>
					<div class="col-sm-9 col-lg-10 m-t-5">
						<input type="checkbox" data-plugin="switchery" name="shopv2_open" hidden value='{$c.shopv2_open}' data-checked='1'>
						<p class="m-t-10 m-b-0">{$word.app_shop_set_shop_tips1}</p>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label class="col-sm-3 col-lg-2 form-control-label">{$word.app_shop_set_logistics_tracking}</label>
					<div class="col-sm-9 col-lg-10 m-t-5">
						<input type="checkbox" data-plugin="switchery" name="shopv2_logistics_open"{$data.logistics_disabled} value='{$c.shopv2_logistics_open}' data-checked='1'>
						<?php if(!$data['express_number']){ ?>
						<p class="m-t-10 logistics_open_tips"><span class="red-600">{$word.app_shop_set_shop_tips2}</span>{$word.app_shop_set_shop_tips3}</p>
						<?php } ?>
						<p class="m-t-10">{$word.app_shop_set_shop_tips4}</p>
						<p class="m-t-10">{$word.app_shop_set_shop_tips5}：<span class='blue-600'>{$data.express_number}</span> {$word.app_shop_set_second}<a href="{$_M['url']['own_form']}&a=dobuy" target='_blank' class='btn btn-xs btn-danger m-l-20' style='position:relative;top:-2px;'>{$word.app_shop_set_shop_tips6}</a></p>
						<div class="well m-b-0">
                            {$word.app_shop_set_shop_tips7}
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<label class="col-sm-3 col-lg-2 form-control-label">{$word.app_shop_set_guest_mod}</label>
					<div class="col-sm-9 col-lg-10 m-t-5">
						<input type="checkbox" data-plugin="switchery" name="shopv2_guest_open" hidden value='{$c.shopv2_guest_open}' data-checked='1'>
						<p class="m-b-0 m-t-10">{$word.app_shop_set_shop_tips8}</p>
					</div>
				</div>
				<hr>
                <div class="form-group row">
					<label class="col-sm-3 col-lg-2 form-control-label">{$word.app_shopv2_para_search}</label>
					<div class="col-sm-9 col-lg-10 m-t-5">
						<input type="checkbox" data-plugin="switchery" name="shopv2_para" hidden value='{$c.shopv2_para}' data-checked='1'>
						<p class="m-b-0 m-t-10">{$word.app_shopv2_para_search_tips}</p>
					</div>
				</div>
				<hr>
                <div class="form-group row">
                    <label class="col-sm-3 col-lg-2 form-control-label">{$word.app_shop_set_cancel_order}</label>
                    <div class="col-sm-9 col-lg-10 m-t-5">
                        <input type="checkbox" data-plugin="switchery" name="shopv2_price_refund" hidden value="{$c.shopv2_price_refund}" data-checked='1'>
                        <p class="m-b-0 m-t-10">{$word.app_shop_set_shop_tips9}</p>
                        <hr>
                        <p>{$word.app_shop_set_shop_tips10}</p>
                        <input type="text" name="shopv2_price_reason" value="{$_M['config']['shopv2_price_reason']}" data-plugin='tokenfield' data-delimiter='|' placeholder=""/>
                	</div>
				</div>
				<hr>
                <div class="form-group row">
                	<label class="col-sm-3 col-lg-2 form-control-label">{$word.app_shop_set_refund_order}</label>
                	<div class="col-sm-9 col-lg-10 m-t-5">
                        <input type="checkbox" data-plugin="switchery" name="shopv2_return_goods" hidden value="{$c.shopv2_return_goods}" data-checked='1'>
                        <hr>
                        <p">{$word.app_shop_set_shop_tips11}</p>
                        <input type="text" name="shopv2_refund_reason" value="{$_M['config']['shopv2_refund_reason']}" data-plugin='tokenfield' data-delimiter='|' placeholder=""/>
                        <hr>
                        <p>{$word.app_shop_set_refund_hints}</p>
                        <textarea name="shopv2_refund_tips" data-plugin='editor' data-editor-y='200' hidden>{$_M['config']['shopv2_refund_tips']}</textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-3 col-lg-2 form-control-label">{$word.app_shop_set_stock_type}</label>
                    <div class="col-sm-9 col-lg-10 m-t-5">
                        <div class="col-sm-9 col-lg-10">
                            <input type="checkbox" data-plugin="switchery" name="shopv2_stock_type" hidden value="{$c.shopv2_stock_type}" data-checked='1'>
                            <p class="m-b-0 m-t-10">{$word.app_shop_set_shop_tips12}</p>
                        </div>
                    </div>
                </div>
                <hr>
				<div class="example-wrap m-b-0">
					<h4 class="example-title">{$word.app_shop_set_show_goods_order}</h4>
					<hr>
					<div class="example">
						<?php if(!file_exists(PATH_WEB."templates/".$_M['config']['met_skin_user'].'/shop_showproduct.php')){// 没有商城页面的模板，调用商城默认模板，在此设置推荐商品规则 ?>
						<div class="form-group row">
							<label class="col-sm-3 col-lg-2 form-control-label">{$word.app_shop_set_goods_detail}</label>
							<div class="col-sm-9 col-lg-10">
								<div class='clearfix m-t-5'>
									<p class='m-b-0'>{$word.app_shop_set_goods_select}</p>
									<div class="radio-custom radio-primary pull-sm-left m-r-20">
									  	<input type="radio" name="shopv2_recommend" id='shopv2_recommend0' value="all" data-checked='{$c.shopv2_recommend}'>
								      	<label for="shopv2_recommend0">{$word.app_shop_set_goods_all_goods}</label>
								    </div>
									<div class="radio-custom radio-primary pull-sm-left m-r-20">
									  	<input type="radio" name="shopv2_recommend" id='shopv2_recommend1' value="com">
								      	<label for="shopv2_recommend1">{$word.app_shop_set_shop_com_goods}</label>
								    </div>
								    <div class="radio-custom radio-primary pull-sm-left">
									  	<input type="radio" name="shopv2_recommend" id='shopv2_recommend2' value="all">
								      	<label for="shopv2_recommend2">{$word.app_shop_set_module_com_goods}</label>
								    </div>
								</div>
								<hr>
								<div class='clearfix'>
									<p class='m-b-0'>{$word.app_shop_set_sort_rule}</p>
									<div class="radio-custom radio-primary pull-sm-left m-r-20">
									  	<input type="radio" name="shopv2_recommend_order" id='shopv2_recommend_order0' value='0' data-checked='{$c.shopv2_recommend_order}' {$data['recommend_order_check'][0]}>
								      	<label for="shopv2_recommend_order0">{$word.app_shop_set_order_by_module}</label>
								    </div>
									<div class="radio-custom radio-primary pull-sm-left m-r-20">
									  	<input type="radio" name="shopv2_recommend_order" id='shopv2_recommend_order1' value="3">
								      	<label for="shopv2_recommend_order1">{$word.app_shop_set_order_by_hits}</label>
								    </div>
									<div class="radio-custom radio-primary pull-sm-left">
									  	<input type="radio" name="shopv2_recommend_order" id='shopv2_recommend_order2' value="1">
								      	<label for="shopv2_recommend_order2">{$word.app_shop_set_order_by_update_time}</label>
								    </div>
								</div>
								<hr>
							    <div>
							    	<input type="text" name="shopv2_recommend_num" value="{$_M['config']['shopv2_recommend_num']}" required class="form-control inline-block w-50 m-r-10" data-fv-notempty-message="{$_M['word']['js41']}" data-fv-greaterthan="true" data-fv-greaterthan-value="1">
							    	<span>{$word.app_shop_set_show_goods_amount}</span>
							    </div>
							</div>
						</div>
						<hr>
						<?php } ?>
						<div class="form-group row m-b-0">
							<label class="col-sm-3 col-lg-2 form-control-label">{$word.app_shop_set_show_cart_page}</label>
							<div class="col-sm-9 col-lg-10">
								<div class='clearfix m-t-5'>
									<p class='m-b-0'>{$word.app_shop_set_goods_select}</p>
									<div class="radio-custom radio-primary pull-sm-left m-r-20">
									  	<input type="radio" name="shopv2_moregoods" id='shopv2_moregoods0' value="0" data-checked='{$c.shopv2_moregoods}'>
								      	<label for="shopv2_moregoods0">{$word.app_shop_set_shop_all_goods}</label>
								    </div>
									<div class="radio-custom radio-primary pull-sm-left m-r-20">
									  	<input type="radio" name="shopv2_moregoods" id='shopv2_moregoods1' value="com">
								      	<label for="shopv2_moregoods1">{$word.app_shop_set_shop_com_goods}</label>
								    </div>
							    </div>
							    <hr>
								<div class='clearfix'>
									<p class='m-b-0'>{$word.app_shop_set_sort_rule}</p>
									<div class="radio-custom radio-primary pull-sm-left m-r-20">
									  	<input type="radio" name="shopv2_moregoods_order" id='shopv2_moregoods_order0' value='0' data-checked='{$c.shopv2_moregoods_order}'>
								      	<label for="shopv2_moregoods_order0">{$word.app_shop_set_order_by_module}</label>
								    </div>
									<div class="radio-custom radio-primary pull-sm-left m-r-20">
									  	<input type="radio" name="shopv2_moregoods_order" id='shopv2_moregoods_order1' value="3">
								      	<label for="shopv2_moregoods_order1">{$word.app_shop_set_order_by_hits}</label>
								    </div>
									<div class="radio-custom radio-primary pull-sm-left">
									  	<input type="radio" name="shopv2_moregoods_order" id='shopv2_moregoods_order2' value="1">
								      	<label for="shopv2_moregoods_order2">{$word.app_shop_set_order_by_update_time}</label>
								    </div>
								</div>
								<hr>
							    <div>
							    	<input type="text" name="shopv2_moregoods_num" value="{$_M['config']['shopv2_moregoods_num']}" required class="form-control inline-block w-50 m-r-10" data-fv-notempty-message="{$_M['word']['js41']}" data-fv-greaterthan="true" data-fv-greaterthan-value="1">
							    	<span>{$word.app_shop_set_show_goods_amount}</span>
							    </div>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="example-wrap m-b-0">
					<h4 class="example-title">{$word.app_shop_set_order_state_auto}</h4>
					<hr>
					<div class="example">
						<div class="form-group row">
							<label class="col-sm-3 col-lg-2 form-control-label">{$word.app_shop_set_order_auto_close}</label>
							<div class="col-sm-9 col-lg-10 m-t-5">
								<input type="checkbox" data-plugin="switchery" name="shopv2_order_auto_close" hidden value="{$c.shopv2_order_auto_close}" data-checked='1'>
								<div class='m-t-10'>
									<input type="text" class="form-control" style="width:80px;" data-plugin="asSpinner" name="shopv2_order_auto_close_time" autocomplete="off" value="{$_M['config']['shopv2_order_auto_close_time']}">
									<p class="m-t-10 m-b-0">{$word.app_shop_set_order_auto_close_tips}</p>
								</div>
							</div>
						</div>
						<hr>
						<div class="form-group row">
							<label class="col-sm-3 col-lg-2 form-control-label">{$word.app_shop_set_order_auto_complete}</label>
							<div class="col-sm-9 col-lg-10 m-t-5">
								<input type="checkbox" data-plugin="switchery" name="shopv2_order_auto_ok" hidden value="{$c.shopv2_order_auto_ok}" data-checked='1'>
								<div class="m-t-10">
									<input type="text" class="form-control" style="width:80px;" data-plugin="asSpinner" name="shopv2_order_auto_ok_time" autocomplete="off" value="{$_M['config']['shopv2_order_auto_ok_time']}">
									<p class="m-t-10 m-b-0">{$word.app_shop_set_order_auto_complete_tips}</p>
								</div>
							</div>
						</div>
						<hr>
						<div class="form-group row m-b-0">
							<label class="col-sm-3 col-lg-2 form-control-label">{$word.app_shop_set_order_auto_delete}</label>
							<div class="col-sm-9 col-lg-10 m-t-5">
								<input type="checkbox" data-plugin="switchery" name="shopv2_order_auto_del" hidden value="{$c.shopv2_order_auto_del}" data-checked='1'>
								<div class="m-t-10">
									<input type="text" class="form-control" style="width:80px;" data-plugin="asSpinner" name="shopv2_order_auto_del_time" autocomplete="off" value="{$_M['config']['shopv2_order_auto_del_time']}">
									<p class="m-t-10 m-b-0">{$word.app_shop_set_order_auto_delete_tips}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>
				<div class="example-wrap m-b-0">
					<h4 class="example-title">{$word.app_shop_set_invoice_setting}</h4>
					<hr>
					<div class="example">
						<div class="form-group row">
							<label class="col-sm-3 col-lg-2 form-control-label">{$word.app_shop_set_plain_invoice}</label>
							<div class="col-sm-9 col-lg-10 m-t-5">
								<input type="checkbox" data-plugin="switchery" name="shopv2_gi" hidden value="{$c.shopv2_gi}" data-checked='1'>
								<p class="m-t-10 m-b-0">{$word.app_shop_set_invoice_able}</p>
							</div>
						</div>
						<hr>
						<div class="form-group row m-b-0">
							<label class="col-sm-3 col-lg-2 form-control-label">{$word.app_shop_set_invoice_content}</label>
							<div class="col-sm-9 col-lg-10">
								<input type="text" name="shopv2_invoice" class="form-control" value="{$_M['config']['shopv2_invoice']}" data-plugin="tokenfield" data-delimiter="|">
								<p class="m-t-10 m-b-0">{$word.app_shop_set_shop_tips13}</p>
							</div>
						</div>
					</div>
				</div>
				<div class="form-save-fixed fixed-b-l w-full">
					<div class="page-content p-y-0 bg-blue-100">
						<div class="panel-body p-y-10">
							<div class="row">
								<label class="col-sm-3 col-lg-2 form-control-label hidden-xs-down"></label>
								<div class="col-sm-9 col-lg-10">
									<button type="submit" class="btn btn-primary">{$word.app_shop_save}</button>
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
<include file="sys_admin/foot_v2"/>
