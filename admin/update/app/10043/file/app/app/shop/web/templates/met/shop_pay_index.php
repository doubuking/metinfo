<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$data['page_title'] = $_M['word']['app_shop_placeorder'].$data['page_title'];
?>
<include file="sys_web/head"/>
<link href="{$_M['url']['own_tem']}css/shop.css?{$met_file_version}" rel='stylesheet' type='text/css'>
<div class="page bg-pagebg1">
	<div class="container">
		<div class="page-content row">
			<div class="panel m-b-0">
				<div class="panel-body pay-body">
					<form action="{$_M['url']['shop_pay_placeorder']}" method='post' class="pay-form">
						<input name="cidlist" type="hidden" value="{$data.cidlist}">
						<?php if($data['need_email']){ ?>
						<div class="example-wrap">
							<div class="example">
								<div class="form-group clearfix m-b-0">
									<label class="pull-xs-left example-title control-label w-150 m-t-5 m-b-15">{$_M['word']['app_shop_receiveemail']}</label>
									<div class="pull-xs-left">
										<input type="text" class="form-control w-250 pull-xs-left" name="email" placeholder='{$_M['word']['app_shop_receiveemail_prompt']}' required data-fv-notempty-message="{$_M['word']['Prompt_email']}" data-fv-emailAddress="true">
									</div>
								</div>
							</div>
						</div>
						<hr>
						<?php
						}
						if(($data['logistic']||$_M['config']['shopv2_gi']) && $data['goods_logistic']){
						?>
						<div class="example-wrap">
							<input name="addressid" id="addressid" type="hidden" value="{$data.addr_de}">
							<div class="example">
								<div class="form-group clearfix m-b-0">
									<label class="pull-xs-left example-title control-label w-150 m-t-5 m-b-15">{$_M['word']['app_shop_address']}</label>
									<div class="pull-xs-left">
										<button type="button" class="btn btn-outline btn-success btn-squared addr-btn">{$_M['word']['app_shop_addto']}{$_M['word']['app_shop_address']}</button>
									</div>
								</div>
								<ul class="blocks-100 blocks-sm-2 blocks-md-3 m-b-0 text-xs-center addr-body">
									<div class="loader vertical-align-middle loader-default m-l-30"></div>
								</ul>
							</div>
						</div>
						<hr>
						<?php } ?>
						<div class="example-wrap">
							<div class="example">
								<div class="form-group">
									<label class="pull-sm-left example-title control-label w-150 m-t-5">{$_M['word']['app_shop_paymentmod']}</label>
									<div class="pull-sm-left pay-set-body">
										<if value="$c['shopv2_onlinepay']">
										<div class="pull-xs-left">
											<input type="radio" name="paytype" value="1" data-plugin="labelauty" data-labelauty="{$_M['word']['app_shop_paymentonline']}" <if value="$c['shopv2_onlinepay']">checked</if>/>
										</div>
										</if>
										<if value="$c['shopv2_deliverypay']">
										<div class="pull-xs-left">
											<input type="radio" name="paytype" value="2" data-plugin="labelauty" data-labelauty="{$_M['word']['app_shop_paymentcod']}" <if value="!$c['shopv2_onlinepay']">checked</if>/>
										</div>
										</if>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<?php if($data['logistic']||$_M['config']['shopv2_gi']){ ?>
						<div class="example-wrap">
							<div class="example">
								<div class="form-group">
									<label class="pull-xs-left example-title control-label w-150 m-b-0">{$_M['word']['app_shop_delivery']}</label>
									<div class="pull-xs-left red-600 m-t-5">
										{$data.freight_type_str}
									</div>
								</div>
							</div>
						</div>
						<hr>
						<?php
						}
						// 发票
						if($_M['config']['shopv2_gi'] && $data['goods_lnvoice']){
						?>
						<input name="invoice_type" type="hidden" value="1">
						<div class="example-wrap">
							<div class="example">
								<div class="form-group">
									<label class="pull-sm-left example-title control-label w-150">{$_M['word']['app_shop_invoice']}</label>
									<div class="pull-sm-left pay-set-body">
										<div class="clearfix">
											<div class="pull-xs-left">
												<input type="radio" name="invoice_is" value="0" data-plugin="labelauty" data-labelauty="{$_M['word']['app_shop_unwanted']}" checked/>
											</div>

											<div class="pull-xs-left">
												<input type="radio" name="invoice_is" value="1" data-plugin="labelauty" data-labelauty="{$_M['word']['app_shop_need']}" />
											</div>
										</div>
										<div class="collapse" id="invoice-body">
											<div class="well m-t-20 m-b-0">
												<div class="form-group m-b-10">
													<input type="text" class="form-control" name="invoice_title" required placeholder="{$_M['word']['app_shop_invoicehead']}" data-fv-notempty-message="{$_M['word']['app_shop_invoicehead']}">
												</div>
												<div class="form-group m-b-0">
													<input type="text" class="form-control" name="invoice_credit_code" required placeholder="{$_M['word']['app_shop_creditcode']}" data-fv-notempty-message="{$_M['word']['app_shop_creditcode']}">
												</div>
												<?php
												if($_M['config']['shopv2_invoice']){
													$invoice_c = explode('|', $_M['config']['shopv2_invoice']);
													$invoice_mt=count($invoice_c)>1?' m-t-10':'';
												?>
												<div class="form-group clearfix m-t-10 m-b-0">
													<label class="control-label pull-xs-left m-b-0 m-r-10{$invoice_mt}">{$_M['word']['app_shop_invoicecontent']} : </label>
													<div class="pull-xs-left">
													<?php
													if(count($invoice_c)>1){
														$invoice_html = '<select class="form-control" name="invoice_con">';
														foreach($invoice_c as $key=>$val){
															if($val) $invoice_html.= '<option value="'.$val.'">'.$val.'</option>';
														}
														$invoice_html.= '</select>';
													}else{
														$invoice_html = $invoice_c[0];
													}
													?>
														{$invoice_html}
													</div>
												</div>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<?php } ?>
						<div class="example-wrap">
							<h3 class="example-title">{$_M['word']['app_shop_commodity']}</h3>
							<div class="example bg-blue-grey-100">
								<?php
								// 订单商品
								foreach($data['pgoods'] as $val){
									$val['img']=str_replace($_M['url'][site],'',$val['img']);
								?>
								<div class="pay-goods-body">
									<div class="row">
										<div class="col-sm-6 col-xs-8">
											<div class="media media-xs">
												<div class="media-left">
													<a href="{$val['url']}" title='{$val['name']}' target="_blank">
														<img class="media-object" src="{$val.img|thumb:$c['met_productimg_y'],$c['met_productimg_x']}" alt="{$val['name']}">
													</a>
												</div>
												<div class="media-body">
													<h4 class="media-heading"><a href="{$val['url']}" title='{$val['name']}' target="_blank">{$val['name']}</a></h4>
													{$val['splist_value_str']}
												</div>
											</div>
										</div>
										<div class="col-sm-3 col-xs-4 text-nowrap text-xs-right">
											{$val['price_str']} <span class="p-num">x {$val['amount']}</span>
										</div>
										<div class="col-sm-3 red-600 text-xs-right">
											{$val['subtotal']}
										</div>
									</div>
									<?php
									foreach($val['message'] as $key=>$msg){
										$msg['required'] = $msg['required']?' required data-fv-notempty-message="'.$_M['word']['MessageInfo4'].'"':'';
										if($msg['line']){
									?>
									<div class="form-group m-t-15 m-b-0 p-message">
										<textarea class="form-control" rows="3" name="msg_{$val['id']}_{$val['pid']}_{$key}" placeholder="{$msg['name']}"{$msg['required']}></textarea>
									</div>
										<?php }else{ ?>
									<div class="form-group m-t-15 m-b-0 p-message">
										<input placeholder="{$msg['name']}" class="form-control" name="msg_{$val['id']}_{$val['pid']}_{$key}"{$msg['required']}>
									</div>
									<?php
										}
									}
									?>
								</div>
								<?php } ?>
							</div>
							<div class="message form-group m-b-0">
								<textarea class="form-control" rows="3" name="message" placeholder="{$_M['word']['app_shop_message']}"></textarea>
							</div>
						</div>
                        <hr>
                        <?php
                        if($data['dis_info']){
                        ?>
                        <div class="m-t-40 m-b-0">
                            {$data.dis_info}
                        </div>
						<hr>
                        <?php
                        }
                        ?>
						<?php if($data['discounts']){ ?>
						<div class="example-wrap m-t-40 m-b-0">
							<h3 class="example-title">{$_M['word']['app_shop_discount']}</h3>
							<div class="example m-b-0 blocks-2 blocks-sm-3 blocks-lg-4 blocks-xl-5 pay-discount-body">
								<input type="hidden" name='discount' value='{$data['discounts'][0]['id']}'>
								<?php
								foreach ($data['discounts'] as $key=> $value) {
									if($val['instructions']) $value['instructions']=$_M['word']['app_shop_instructions'].' : '.$value['instructions'];
									$val['checked']=$key?'':'checked';
								?>
								<li>
									<input type="radio" name='discountval' value='{$value[id]}' data-plugin="labelauty" data-labelauty="
										<span class='font-size-16'>{$_M['word']['app_shop_order_achieve']} {$value['r_price']} {$_M['word']['app_shop_order_reduce']} {$value['par']}</span>
										<hr class='m-y-5'>
										<div class='blue-grey-400'>{$_M['word']['app_shop_period_validity']}{$_M['word']['app_shop_to']} {$value['e_time_str']}
										</div>
									" {$val['checked']}/>
								</li>
								<?php } ?>
								<li>
									<input type="radio" name='discountval' value='' data-plugin="labelauty" data-labelauty="
										<div class='font-size-16' style='height:44px;padding-top:16px;padding-bottom:16px;'>{$_M['word']['app_shop_notusediscount']}</div>
									"/>
								</li>
							</div>
						</div>
						<hr>
						<?php } ?>
						<div class="pay-submit">
							<div class="row">
								<div class="col-xl-8 col-md-6 text-xs-right" style='line-height: 1.8;'>
									{$_M['word']['app_shop_intotal']} <span id="pay-amount" class="red-600"></span> {$_M['word']['app_shop_piece']}{$_M['word']['app_shop_commodity']}，{$_M['word']['app_shop_total']} : <span id="pay-total" class="red-600"></span>
								</div>
								<div class="col-xl-4 col-md-6 text-xs-right">
									<a class="btn btn-lg btn-squared btn-default p-x-30 m-r-10" href='{$_M['url']['shop_cart']}'>{$_M['word']['app_shop_return']}{$_M['word']['app_shop_cart']}</a>
									<input type="submit" value='{$_M['word']['app_shop_placeorder']}' class="btn btn-lg btn-squared btn-danger p-x-30">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
var addrlisturl  = '{$_M['url']['shop_addr_index']}',
	addrdelurl = '{$_M['url']['shop_addr_del']}',
	shop_ajax_total = '{$_M['url']['shop_ajax_total']}';
</script>
<include file="app/module/shop_address_modal"/>
<include file="sys_web/foot"/>