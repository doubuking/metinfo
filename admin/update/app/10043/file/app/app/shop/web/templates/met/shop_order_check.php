<?php
$data['page_title']=$_M['word']['app_shop_orderdetails'].$data['page_title'];
$pearl[1]=$pearl[2]=$pearl[3]=$pearl[4]='current';
switch ($data['order']['state']) {
	case -1:
		$icon_class="fa-reply blue-blue-grey-600";
		break;
	case 0:
		$icon_class="fa-ban blue-grey-400";
		break;
	case 1:
		$icon_class="wb-payment orange-600";
		$pearl[2]=$pearl[3]=$pearl[4]='disabled';
		break;
	case 2:
		$icon_class="fa-truck blue-600 m-r-15";
		$pearl[3]=$pearl[4]='disabled';
		break;
	case 3:
		$icon_class="fa-gift blue-600 m-r-15";
		$pearl[4]='disabled';
		break;
	case 4:
		$icon_class="wb-check-circle green-600";
		break;
}
?>
<include file="sys_web/head"/>
<link href="{$_M['url']['own_tem']}css/shop.css?{$met_file_version}" rel='stylesheet' type='text/css'>
<div class="page bg-pagebg1">
	<div class="container">
		<div class="page-content row">
			<include file="user_sidebar"/>
			<div class="col-lg-9">
				<div class="panel">
					<div class="panel-body shop-order-check">
						<div class="row order-state-{$data['order']['state']}">
							<div class="col-sm-4 shop-order-type">
								<h3 class="state_txt font-size-20">
									<i class='icon {$icon_class}' aria-hidden='true' style='font-size:38px;'></i>
									<span>{$data['order']['state_txt']}</span>
								</h3>
								<?php if($data['order']['countdown']&&$data['order']['state']==1){ ?>
								{$_M['word']['app_shop_please']} <span class="red-600">{$data['order']['countdown']}</span> {$_M['word']['pp_shop_pleasepayment']}
								<?php } ?>
							</div>
							<?php if($data['order']['state']>0){ ?>
							<div class="col-sm-8 text-xs-right shop-order-type-btn">
								<?php if($data['order']['state']==1){ ?>
								<a href="{$_M['url']['shop_order_close']}&id={$data['order']['id']}" class="btn btn-warning btn-squared shop-order-close">{$_M['word']['app_shop_cancelorder']}</a>
								<?php $topaynow_url=$data['order']['type']==1?$_M['url']['shop_pay_payorder']:$_M['url']['shop_recharge_pay']; ?>
								<a href="{$topaynow_url}&id={$data.order.id}" class="btn btn-danger btn-squared">{$word.app_shop_topaynow}</a>
								<?php
                                }else if($data['order']['state']==2){
                                	if($_M['config']['shopv2_price_refund'] && !$data['order']['auto_ordrer'] && !$data['order']['mix_order']){
                                ?>
                                <button type='button' class="btn btn-warning btn-squared shop-order-cancel" data-toggle="collapse" data-target="#order-cancel-collapse">{$word.app_shop_order_cancel}</button>
                                <?php
                                	}
                            	}else if($data['order']['state']==3){
                                    if ($_M['config']['shopv2_return_goods']) {
                                ?>
                                <button type='button' class="btn btn-warning btn-squared" data-toggle="collapse" data-target="#refund-reason-collapse">{$word.app_shop_order_refund}</button>
                                <?php
                                    }
                                ?>
								<a href="{$_M['url']['shop_doreceipt']}&id={$data['order']['id']}" class="btn btn-danger btn-squared btn-doreceipt">{$word.app_shop_doreceipt}</a>
								<?php
								}
								if($data['order']['state']==2){
									if($_M['config']['shopv2_price_refund'] && !$data['order']['auto_ordrer'] && !$data['order']['mix_order']){
								?>
								<br>
								<div class='m-t-10 w-full pull-xs-right'>
									<div class="collapse" id="order-cancel-collapse">
			                            <div class="well m-b-0"">
			                                <form method="post" action="{$url.shop_order_close}&id={$data.order.id}" class='order-cancel'>
			                                    <div class="form-group">
			                                        <select name="cancel_reason" class='form-control' required>
			                                        	<option value>{$word.app_shop_select_cancel_reason}</option>
			                                        	<list data="$data['price_reason']" name="$s">
		                                        		<option value="{$s}">{$s}</option>
			                                        	</list>
			                                        </select>
			                                    </div>
			                                    <div class="form-group">
		                                    		<textarea name="detail" rows='3' placeholder="{$word.app_shop_reason_detail}" class='form-control'></textarea>
			                                    </div>
			                                    <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#order-cancel-collapse">{$word.app_shop_cancel}</button>
		                                        <button type="submit" class="btn btn-primary m-l-5">{$word.submit}</button>
			                                </form>
			                            </div>
	                        		</div>
                        		</div>
                        		<?php
                    				}
                    			}else if($data['order']['state']>1){
                				?>
                				<br>
								<div class='m-t-10 w-full pull-xs-right'>
									<div class="collapse" id="refund-reason-collapse">
			                            <div class="well m-b-0"">
			                                <form method="post" action="{$url.shop_refund}&id={$data.order.id}" class='refund-reason'>
			                                	<div class="met-editor p-0">{$c.shopv2_refund_tips}</div>
			                                    <div class="form-group">
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
			                                    <div class='form-group'>
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
			                                    <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#refund-reason-collapse">{$word.app_shop_cancel}</button>
		                                        <button type="submit" class="btn btn-primary m-l-5">{$word.submit}</button>
			                                </form>
			                            </div>
	                        		</div>
                        		</div>
                        		<?php } ?>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php if($data['order']['state']>0){ ?>
				<div class="panel">
					<div class="panel-body row p-b-20">
						<div class="pearls blocks-4">
							<li class="pearl m-b-0 {$pearl[1]}">
								<div class="pearl-icon"><i class="icon wb-clipboard" aria-hidden="true"></i></div>
								<span class="pearl-title">{$_M['word']['app_shop_placeorderabbr']}<p class="blue-grey-400 hidden-sm-down m-b-0">{$data['order']['rtime_str']}</p></span>
							</li>
							<li class="pearl m-b-0 {$pearl[2]}">
								<div class="pearl-icon"><i class="icon wb-payment" aria-hidden="true"></i></div>
								<span class="pearl-title">{$_M['word']['app_shop_payment']}<p class="blue-grey-400 hidden-sm-down m-b-0">{$data['order']['ptime_str']}</p></span>
							</li>
							<li class="pearl m-b-0 {$pearl[3]}">
								<div class="pearl-icon"><i class="icon wb-map" aria-hidden="true"></i></div>
								<span class="pearl-title">{$_M['word']['app_shop_deliver']}<p class="blue-grey-400 hidden-sm-down m-b-0">{$data['order']['stime_str']}</p></span>
							</li>
							<li class="pearl m-b-0 {$pearl[4]}">
								<div class="pearl-icon"><i class="icon wb-check" aria-hidden="true"></i></div>
								<span class="pearl-title">{$_M['word']['app_shop_complete']}</span>
							</li>
						</div>
					</div>
				</div>
				<?php } ?>
				<div class="panel">
					<div class="panel-body order-goods" data-auto-sent-code-url="{$url.own_form}a=doview_card">
						<div class="table-responsive text-xs-center">
							<table class="table table-striped m-b-0">
								<thead>
									<tr>
										<th width="300">{$_M['word']['app_shop_commodityname']}</th>
										<th class='text-xs-center'>{$_M['word']['app_shop_price']}</th>
										<th class='text-xs-center'>{$_M['word']['app_shop_number']}</th>
										<th class='text-xs-center'>{$_M['word']['app_shop_freight']}</th>
										<th class='text-xs-center'>{$_M['word']['app_shop_subtotal']}</th>
									</tr>
								</thead>
								<tbody>
									<list data="$data['goods_list']" name="$v">
									<tr>
										<td class='text-xs-left'>
											<div class="media media-xs">
												<div class="media-left">
													<a href="{$v['url']}" title="{$v['pname']}" target="_blank">
														<img src="{$v.img|thumb:$c['met_productimg_y'],$c['met_productimg_x']}" class="media-object" />
													</a>
												</div>
												<div class="media-body">
													<h4 class="media-heading">
														<a href="{$v['url']}" title="{$v['pname']}" target="_blank" class="font-size-14">{$v['pname']}</a>
													</h4>
													<div class="grey-500">{$v['splist_value_str']}<br>{$v['message']}</div>
													<if value="$v['cards']">
													<div class="">
														<list data="$v['cards']" name="$s">
                                                        <if value="$s['state'] eq 2">
                                                        <button type="button" class="btn btn-info btn-squared btn-xs btn-auto-sent-code" data-cid="{$s.id}" data-oid="{$s.orderid}" data-state="{$s.state}" data-animation="pop" data-placement="bottom" data-width="300" data-content='<div class="text-xs-center">发货码：<span class="red-600">{$s.card}</span></div>'>提取发货码</button>
                                                        </if>
                                                        <if value="$s['state'] eq 3">
                                                        <span class='tag tag-danger'>{$s.card}</span>
                                                        </if>
														</list>
													</div>
													</if>
												</div>
											</div>
										</td>
										<td>{$v['puprice']}</td>
										<td>{$v['pamount']}</td>
										<td>{$v['freight']}</td>
										<td>{$v['price']}</td>
									</tr>
									</list>
			                    </tbody>
		                    </table>
	                    </div>
					</div>
				</div>
				<div class="panel">
					<div class="panel-body order-info">
						<?php
						if($data['order']['state']==3){
							$wuliuinfo = $data['order']['cinfo']||$data['order']['cinfo_diy']?($data['order']['cinfo_diy']?$data['order']['cinfo_diy']:$data['order']['cinfo'])." <span id='oinfo' class='m-r-10'>".$data['order']['oinfo']."</span>":$_M['word']['app_shop_order_not_logistics'];
						?>
						<div class='row'>
							<div class="col-xs-4 col-md-3 col-xl-2 text-sm-right order-info-name">{$_M['word']['app_shop_logisticsinfo']} : </div>
							<div class="col-xs-8 col-md-9 col-xl-10 green-600">
								{$wuliuinfo}
								<?php if($_M['config']['shopv2_logistics_open'] && $data['order']['cinfo']){ ?>
								<div class="p-t-5 hidden-sm-up"></div>
								<div class='btn-logistics-parent inline-block' style='position:relative;'>
									<a href="{$_M['url']['shop_logistics']}" class="btn-logistics-track tag tag-outline tag-primary" data-animation="pop" data-height="400" data-placement="bottom" data-content="<div class='vertical-align text-xs-center logistics-loader' style='height:380px;'><div class='loader vertical-align-middle loader-default'></div></div>"><i class="icon fa-map-marker"></i> {$_M['word']['app_shop_logistics_schedule']}</a>
								</div>
								<?php } ?>
							</div>
						</div>
						<hr />
						<?php } ?>
						<div class="row">
							<div class="col-xs-4 col-md-3 col-xl-2 text-sm-right order-info-name">{$_M['word']['app_shop_ordernumber']} : </div>
							<div class="col-xs-8 col-md-9 col-xl-10" id='orderid'>{$data['order']['orderid']}</div>
						</div>
						<div class='row m-t-10'>
							<div class="col-xs-4 col-md-3 col-xl-2 text-sm-right order-info-name">{$_M['word']['app_shop_paymentmod']} : </div>
							<div class="col-xs-8 col-md-9 col-xl-10">{$data['order']['paytype_str']}</div>
						</div>
						<hr />
						<div class="row m-t-10">
							<div class="col-xs-4 col-md-3 col-xl-2 text-sm-right order-info-name">{$_M['word']['app_shop_delivery']} : </div>
							<div class="col-xs-8 col-md-9 col-xl-10">{$_M['word']['app_shop_express']}</div>
						</div>
						<div class='row m-t-10'>
							<div class="col-xs-4 col-md-3 col-xl-2 text-sm-right order-info-name">{$_M['word']['app_shop_receiving']} : </div>
							<div class="col-xs-8 col-md-9 col-xl-10">{$data['order']['address_str']}</div>
						</div>
						<?php if($data['order']['invoice']){ ?>
						<hr />
						<div class="row m-t-10">
							<div class="col-xs-4 col-md-3 col-xl-2 text-sm-right order-info-name">{$_M['word']['app_shop_invoice']} : </div>
							<div class="col-xs-8 col-md-9 col-xl-10">{$data['order'][invoice_info][0]} {$data['order']['invoice_info'][1]} {$data['order']['invoice_info'][2]} {$data['order']['invoice_info'][3]}</div>
						</div>
						<?php } ?>
						<hr />
						<div class='row m-t-10'>
							<div class="col-xs-4 col-md-3 col-xl-2 text-sm-right order-info-name">{$_M['word']['app_shop_messageabbr']} : </div>
							<div class="col-xs-8 col-md-9 col-xl-10">{$data['order']['message']}</div>
						</div>
                        <?php if($data['order']['cancel_reason']){ ?>
                    	<hr />
                        <div class='row m-t-10'>
                            <div class="col-xs-4 col-md-3 col-xl-2 text-sm-right order-info-name">{$_M['word']['app_shop_cancel_reason']} : </div>
                            <div class="col-xs-8 col-md-9 col-xl-10">{$data['order']['cancel_reason']}</div>
                        </div>
                        <div class='row m-t-10'>
                            <div class="col-xs-4 col-md-3 col-xl-2 text-sm-right order-info-name">{$_M['word']['app_shop_reason_detail']} : </div>
                            <div class="col-xs-8 col-md-9 col-xl-10">{$data['order']['refund_detail']}</div>
                        </div>
                        <?php }else if($data['order']['refund_reason']){ ?>
                    	<hr />
                        <div class='row m-t-10'>
                            <div class="col-xs-4 col-md-3 col-xl-2 text-sm-right order-info-name">{$_M['word']['app_shop_refund_reason']} : </div>
                            <div class="col-xs-8 col-md-9 col-xl-10">{$data['order']['refund_reason']}</div>
                        </div>
                        <div class='row m-t-10'>
                            <div class="col-xs-4 col-md-3 col-xl-2 text-sm-right order-info-name">{$_M['word']['app_shop_reason_detail']} : </div>
                            <div class="col-xs-8 col-md-9 col-xl-10">
                            	<div class='comments cover reason-detail-imgs' data-plugin="scrollable">
									<div data-role="container">
										<div data-role="content">
					                    	{$data.order.refund_detail}
					                    	<if value="$data['order']['imgs']">
					                    	<div class='met-editor p-0'>
					                    		<list data="$data['order']['imgs']" name="$v" num='10'>
						                    	<p class='m-b-0 m-t-5'><a href="{$v}" title="{$word.app_shop_click_show_detail}" target='_blank'><img data-src="{$v}" data-lazyload height='200'></a></p>
						                    	</list>
					                    	</div>
					                    	</if>
		                    			</div>
		                    		</div>
		                    	</div>
                            </div>
                        </div>
						<div class="row m-t-10">
							<div class="col-xs-4 col-md-3 col-xl-2 text-sm-right order-info-name">{$_M['word']['app_shop_refund_converse']} :</div>
							<div class="col-xs-8 col-md-9 col-xl-10">
                                <if value="$data['order']['restate'] eq 1">

                                <form action="{$_M['url']['converse_add']}&id={$data['order'][id]}" method="post" class='refund-info form-group m-b-0'>
									<textarea name="content" rows="3" class='form-control' required data-fv-notempty-message="{$_M['word']['js41']}"></textarea>
		                        	<button type="submit" class='btn btn-primary m-t-10'>{$_M['word']['app_shop_echo']}</button>
								</form>
                                </if>
								<if value="$data['converse']">
								<div class='comments m-t-10 order-converse cover' data-plugin="scrollable">
									<div data-role="container">
										<div data-role="content">
											<list data="$data['converse']" name="$s" num='100'>
											<div class="comment media p-y-10">
												<div class="media-left p-r-10">
													<i class="icon<if value="$s['p_name'] eq 'admin'">fa-user-secret grey-400<else/>wb-user blue-600</if> font-size-20" aria-hidden="true"></i>
												</div>
												<div class="comment-body media-body">
													<span class="comment-author" href="javascript:void(0)">{$s.p_name}</span>
													<div class="comment-meta">
														<span class="date">{$s.time}</span>
													</div>
													<div class="comment-content">
														{$s.content}
														<if value="$s['img']">
														<list data="$s['img']" name="$v" num='20'>
														<img src="{$v}">
														</list>
														</if>
													</div>
												</div>
											</div>
											</list>
										</div>
									</div>
								</div>
								</if>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="panel m-b-0">
					<div class="panel-body">
						<div class="table-responsive text-xs-center">
							<table class="table table-striped m-b-0">
								<thead>
									<tr>
										<th class='text-xs-center'>{$_M['word']['app_shop_orderamount']}</th>
										<th></th>
										<th class='text-xs-center'>{$_M['word']['app_shop_freight']}</th>
										<th></th>
										<th class='text-xs-center'>{$_M['word']['app_shop_discount']}</th>
										<th></th>
										<th class='text-xs-center'>{$_M['word']['app_shop_modifyprice']}</th>
										<th></th>
										<th class='text-xs-center'>{$_M['word']['app_shop_paid']}</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><span class="tag tag-default">{$data['order']['price_str']}</span></td>
										<td>+</td>
										<td><span class="tag tag-default">{$data['order']['freight_str']}</span></td>
										<td>+</td>
										<td><span class="tag tag-default">{$data['order']['discount_str']}{$data['order']['discount_info']}</span></td>
										<td>+</td>
										<td><span class="tag tag-default"><span id="edit_price" data-url="{$_M['url']['own_form']}a=doeditorsave_price&id={$data['order']['id']}">{$data['order']['cprice_str']}</span></span></td>
										<td>=</td>
										<td><span class="tag tag-default">{$data['order']['tprice_str']}</span></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<include file="sys_web/foot"/>