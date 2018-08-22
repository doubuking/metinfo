<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$data['page_title'] =$_M['word']['app_shop_myorder'].$data['page_title'];
?>
<include file="sys_web/head"/>
<link href="{$_M['url']['own_tem']}css/shop.css?{$met_file_version}" rel='stylesheet' type='text/css'>
<div class="page bg-pagebg1">
	<div class="container">
		<div class="page-content row">
			<include file="user_sidebar"/>
			<div class="col-lg-9">
				<div class="panel m-b-0" boxmh-mh>
					<div class="panel-body shop-order">
						<div>
							<ul class="nav nav-tabs nav-tabs-line m-b-0 shop-order-state">
								<li class='nav-item'><a class="nav-link" data-toggle="tab" href='javascript:;' data-state="all">{$_M['word']['app_shop_allvalidorders']}</a></li>
								<li class='nav-item'><a class="nav-link" data-toggle="tab" href="javascript:;" data-state="1">{$_M['word']['app_shop_bepaid']}（{$data.state1}）</a></li>
								<li class='nav-item'><a class="nav-link" data-toggle="tab" href="javascript:;" data-state="3">{$_M['word']['app_shop_receipt']}（{$data.state3}）</a></li>
								<li class='nav-item'><a class="nav-link" data-toggle="tab" href="javascript:;" data-state="-1">{$word.app_shop_order_refunding}（{$data['state_1']}）</a></li>
								<li class='nav-item'><a class="nav-link" data-toggle="tab" href="javascript:;" data-state="0">{$_M['word']['app_shop_closed']}（{$data.state_0}）</a></li>
							</ul>
						</div>
						<div class="shop-order-keyword m-y-20">
							<div class="form-group">
								<div class="input-search">
									<button type="submit" class="input-search-btn"><i class="icon wb-search" aria-hidden="true"></i></button>
									<input type="text" class="form-control" name="keyword" placeholder="{$_M['word']['app_shop_ordernumber']}、{$_M['word']['app_shop_commodityname']}">
								</div>
							</div>
						</div>
						<div class="shop-order-list" data-scale='{$c.met_productimg_y}x{$c.met_productimg_y}' data-shopv2_price_refund='{$c.shopv2_price_refund}' data-shopv2_return_goods='{$c.shopv2_return_goods}' data-auto-sent-code-url="{$url.own_form}a=doview_card">
							<div class="h-200 vertical-align text-xs-center"><div class="loader vertical-align-middle loader-default"></div></div>
						</div>
						<div class="shop-order-more-btn">
							<button type="button" class="btn btn-primary btn-block btn-squared" hidden id="shop-order-more"><i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>{$_M['word']['app_shop_moreorder']}</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<if value="$c['shopv2_price_refund']">
<div class="modal fade modal-warning price-refund-modal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>×</span>
				</button>
				<h4 class="modal-title">{$word.app_shop_cancelorder}</h4>
			</div>
			<form method="post" action="{$url.shop_order_close}" class='order-cancel'>
				<div class="modal-body">
					<input type="hidden" name='id'>
	                <div class="form-group">
	                    <select name="cancel_reason" class='form-control' required>
	                    	<option value>{$word.app_shop_select_cancel_reason}</option>
	                    	<list data="$data['price_reason']" name="$s">
	                		<option value="{$s}">{$s}</option>
	                    	</list>
	                    </select>
	                </div>
	                <div class="form-group m-b-0">
	            		<textarea name="detail" rows='3' placeholder="{$word.app_shop_reason_detail}" class='form-control'></textarea>
	                </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">{$word.app_shop_cancel}</button>
					<button type="submit" class="btn btn-primary">{$word.submit}</button>
				</div>
			</form>
		</div>
	</div>
</div>
</if>
<if value="$c['shopv2_return_goods']">
<div class="modal fade modal-warning return-goods-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>×</span>
				</button>
				<h4 class="modal-title">{$word.app_shop_order_refund}</h4>
			</div>
			<form method="post" action="{$url.shop_refund}" enctype="multipart/form-data" class='order-refund'>
				<div class="modal-body">
					<input type="hidden" name='id'>
					<div class="met-editor p-0">{$c.shopv2_refund_tips}</div>
	                <div class="form-group m-t-10">
	                    <select name="refund_reason" class='form-control' required>
                        	<option value>{$word.app_shop_refund_reason}</option>
                        	<list data="$data['refund_reason']" name="$s">
                    		<option value="{$s}">{$s}</option>
                        	</list>
                        </select>
	                </div>
	                <div class="form-group">
	            		<textarea name="detail" rows='3' placeholder="{$word.app_shop_reason_detail}" class='form-control'></textarea>
	                </div>
	                <div class='form-group m-b-0'>
	                    <div class='input-group input-group-file'>
	                        <input type='text' name='file' placeholder="{$word.app_shop_img_upload}" readonly class='form-control'>
	                        <span class='input-group-btn'>
	                        	<span class="btn btn-primary btn-file">
 									<i class="icon wb-upload" aria-hidden="true"></i>
	                            	<input type='file' name='file[]' multiple accept='image/*'>
                            	</span>
	                        </span>
	                    </div>
	                </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">{$word.app_shop_cancel}</button>
					<button type="submit" class="btn btn-primary">{$word.submit}</button>
				</div>
			</form>
		</div>
	</div>
</div>
</if>
<script>
var order_json_url = '{$_M['url']['shop_order']}&ajaxjson=1',
	payorder_url = '{$_M['url']['shop_pay_payorder']}',
	doreceipt_url = '{$_M['url']['shop_doreceipt']}';
</script>
<include file="sys_web/foot"/>