<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$pearl[1]=$pearl[2]=$pearl[3]=$pearl[4]='current';
if($data['order']['state']==1){
	$pearl[4] = 'disabled';
	$pearl[3] = 'disabled';
	$pearl[2] = 'disabled';
}
if($data['order']['state']==2){
	$pearl[4] = 'disabled';
	$pearl[3] = 'disabled';
}
if($data['order']['state']==3){
	$pearl[4] = 'disabled';
}
if($data['order']['state']<1){
	$hbg=' bg-grey-400';
	$close_color=' white';
}else{
	$close_color=' grey-500';
}
if($data['order']['state']==-2) $hbg=' bg-blue-grey-600';
?>
<header class="slidePanel-header overlay metshop_oder_header p-20{$hbg}">
	<button class="btn btn-pure slidePanel-close icon wb-close{$close_color} metshop_oder_close" aria-hidden="true"></button>
	<?php if($data['order']['state']>0){ ?>
	<div class="pearls m-b-0">
		<div class="pearl {$pearl[1]} col-xs-3">
			<div class="pearl-icon"><i class="icon wb-clipboard" aria-hidden="true"></i></div>
			<p class="pearl-title">{$word.app_shop_order_plac_order}<br><span class='font-size-12 grey-500'>{$data['order']['rtime_str']}</span></p>
		</div>
		<div class="pearl {$pearl[2]} col-xs-3">
			<div class="pearl-icon"><i class="icon wb-payment" aria-hidden="true"></i></div>
			<p class="pearl-title">{$word.app_shop_order_pay}<br><span class='font-size-12 grey-500'>{$data['order']['ptime_str']}</span></p>
		</div>
		<div class="pearl {$pearl[3]} col-xs-3">
			<div class="pearl-icon"><i class="icon wb-map" aria-hidden="true"></i></div>
			<p class="pearl-title">{$word.app_shop_order_deliver}<br><span class='font-size-12 grey-500'>{$data['order']['stime_str']}</span></p>
		</div>
		<div class="pearl {$pearl[4]} col-xs-3">
			<div class="pearl-icon"><i class="icon wb-check" aria-hidden="true"></i></div>
			<p class="pearl-title">{$word.app_shop_order_complete}</p>
		</div>
	</div>
	<?php }else{ ?>
	<h1 class="text-xs-center">{$data['order']['state_txt']}</h1>
	<?php } ?>
</header>
<div class="page metshop-oder-page">
	<div class="page-content p-b-50">
		<div class="panel">
			<div class="panel-body">
				<?php
				if($data['order']['state']==3 || $data['order']['state']==4 || $data['order']['state']<1){
					$wuliuinfo = $data['order']['cinfo']||$data['order']['cinfo_diy']?($data['order']['cinfo_diy']?$data['order']['cinfo_diy']:$data['order']['cinfo'])." <span id='oinfo' class='m-r-10'>".$data['order']['oinfo']."</span>":$_M['word']['app_shop_order_not_logistics'];
				?>
				<div class="row">
					<div class="col-xs-4 col-sm-3 col-xl-2 text-success">{$word.app_shop_order_logistics_info} : </div>
					<div class="col-xs-8 col-sm-9 col-xl-10 text-success">
						<div class='pull-xs-left'>{$wuliuinfo}</div>
						<?php if($_M['config']['shopv2_logistics_open'] && $data['order']['cinfo']){ ?>
						<div class="pull-xs-left w-full p-t-5 hidden-sm-up"></div>
						<div class='pull-xs-left btn-logistics-parent' style='position:relative;top:-2px;'>
							<a href="{$_M['url']['own_form']}a=dotrack" class="btn btn-outline btn-primary btn-xs btn-logistics-track" data-dobuy="{$_M['url']['own_name']}c=set&a=dobuy" data-animation="pop" data-placement="bottom" data-content="<div class='vertical-align text-xs-center logistics-loader' style='height:380px;'><div class='loader vertical-align-middle loader-default'></div></div>"><i class="icon fa-map-marker"></i> {$word.app_shop_order_logistics_progress}</a>
						</div>
						<?php } ?>
					</div>
				</div>
				<hr class='m-b-0 m-t-10' />
				<?php } ?>
				<div class="row m-t-10">
					<div class="col-xs-4 col-sm-3 col-xl-2">{$word.app_shop_order_no} : </div>
					<div class="col-xs-8 col-sm-9 col-xl-10" id='orderid'>{$data['order']['orderid']}</div>
				</div>
				<div class="row m-t-10">
					<div class="col-xs-4 col-sm-3 col-xl-2">{$word.app_shop_order_pay_type} : </div>
					<div class="col-xs-8 col-sm-9 col-xl-10">{$data['order']['paytype_str']}</div>
				</div>
				<div class="row m-t-10">
					<div class="col-xs-4 col-sm-3 col-xl-2">{$word.app_shop_order_buyer} : </div>
					<div class="col-xs-8 col-sm-9 col-xl-10">{$data['order']['username']}</div>
				</div>
				<hr class='m-b-0 m-t-10' />
				<div class="row m-t-10">
					<div class="col-xs-4 col-sm-3 col-xl-2">{$word.app_shop_order_distribution_mode} : </div>
					<div class="col-xs-8 col-sm-9 col-xl-10">{$word.app_shop_order_express_delivery}</div>
				</div>
				<div class="row m-t-10">
					<div class="col-xs-4 col-sm-3 col-xl-2">{$word.app_shop_order_address_info} : </div>
					<div class="col-xs-8 col-sm-9 col-xl-10">{$data['order']['address_str']}</div>
				</div>
				<?php if($data['order']['invoice']){ ?>
				<div class="row m-t-10">
					<div class="col-xs-4 col-sm-3 col-xl-2">{$word.app_shop_order_invoice_info} : </div>
					<div class="col-xs-8 col-sm-9 col-xl-10">{$data['order'][invoice_info][0]} {$data['order']['invoice_info'][1]} {$data['order']['invoice_info'][2]} {$data['order']['invoice_info'][3]}</div>
				</div>
				<?php } ?>
				<hr class='m-b-0 m-t-10' />
				<div class="row m-t-10">
					<div class="col-xs-4 col-sm-3 col-xl-2">{$word.app_shop_order_buyer_message} : </div>
					<div class="col-xs-8 col-sm-9 col-xl-10">{$data['order']['message']}</div>
				</div>
				<div class="row m-t-10">
					<div class="col-xs-4 col-sm-3 col-xl-2">{$word.app_shop_order_business_notes} : </div>
					<div class="col-xs-8 col-sm-9 col-xl-10">
						<span class="edit-remark" data-url="{$_M['url']['own_form']}a=doeditorsave_remark&id={$data['order']['id']}" data-rows="3">{$data['order']['remark']}</span>
						<button class="btn btn-success btn-xs edit-remark-btn"><i class="icon wb-pencil" aria-hidden="true"></i></button>
					</div>
				</div>
				<?php if($data['order']['cancel_reason']){ ?>
				<hr class='m-b-0 m-t-10' />
                <div class='row m-t-10'>
                    <div class="col-xs-4 col-md-3 col-xl-2">{$word.app_shop_order_cancel_reason} : </div>
                    <div class="col-xs-8 col-md-9 col-xl-10">{$data.order.cancel_reason}</div>
                </div>
                <div class='row m-t-10'>
                    <div class="col-xs-4 col-md-3 col-xl-2">{$word.app_shop_order_reason_detail} : </div>
                    <div class="col-xs-8 col-md-9 col-xl-10">{$data.order.refund_detail}</div>
                </div>
                <?php }else if($data['order']['refund_reason']){ ?>
            	<hr class='m-b-0 m-t-10' />
                <div class='row m-t-10'>
                    <div class="col-xs-4 col-md-3 col-xl-2">{$word.app_shop_order_refund_reason} : </div>
                    <div class="col-xs-8 col-md-9 col-xl-10">{$data.order.refund_reason}</div>
                </div>
                <div class='row m-t-10'>
                    <div class="col-xs-4 col-md-3 col-xl-2">{$word.app_shop_order_reason_detail} : </div>
                    <div class="col-xs-8 col-md-9 col-xl-10 ">
                    	<div class='comments cover reason-detail-imgs' data-plugin="scrollable">
							<div data-role="container">
								<div data-role="content">
			                    	{$data.order.refund_detail}
			                    	<if value="$data['order']['imgs']">
			                    	<div class='met-editor p-0'>
			                    		<list data="$data['order']['imgs']" name="$v" num='10'>
				                    	<p class='m-b-0 m-t-5'><a href="{$v}" title="{$word.app_shop_order_click_show_detail}" target='_blank'><img data-original="{$v}" height='200'></a></p>
				                    	</list>
			                    	</div>
			                    	</if>
                    			</div>
                    		</div>
                    	</div>
                	</div>
                </div>
				<div class="row m-t-10">
					<div class="col-xs-4 col-sm-3 col-xl-2">{$word.app_shop_order_return_message_record} : </div>
					<div class="col-xs-8 col-sm-9 col-xl-10">
						<form action="{$url.own_form}a=doeditor_refund_info&id={$data.order.id}" method="post" class='refund-info form-group m-b-0'>
							<textarea name="content" rows="3" class='form-control' required data-fv-notempty-message="{$word.js41}"></textarea>
                        	<button type="submit" class='btn btn-primary m-t-10'>{$word.app_shop_order_reply}</button>
						</form>
						<if value="$data['converse']">
						<div class='comments cover m-t-10' data-plugin="scrollable">
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
				<?php
				}
				if($data['order']['countdown']&&$data['order']['state']==1){
				?>
				<hr/>
				<div class="m-t-10">{$word.app_shop_order_close_tips1} <span class="red-600">{$data['order']['countdown']}</span> {$word.app_shop_order_close_tips2}</div>
				<?php } ?>
			</div>
		</div>
		<div class="panel">
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped m-b-0">
	                    <thead>
	                      <tr>
	                        <th width="300">{$word.app_shop_order_goods_name}</th>
	                        <th class="text-xs-center">{$word.app_shop_order_unit_price}</th>
	                        <th class="text-xs-center">{$word.app_shop_order_amount}</th>
	                        <th class="text-xs-center">{$word.app_shop_order_freight}</th>
	                        <th class="text-xs-center">{$word.app_shop_order_subtotal}</th>
	                      </tr>
	                    </thead>
	                    <tbody>
							<?php foreach($data['goods'] as $key=>$val){ ?>
							<tr>
								<td>
									<div class="media">
										<div class="media-left">
										  <a target="_blank" href="{$val['url']}" title="{$word.app_shop_order_view_goods_detail}">
											<img src="{$val.img|thumb:80,60}" class="media-object" />
										  </a>
										</div>
										<div class="media-body">
										  <h4 class="media-heading">
											<a target="_blank" href="{$val['url']}" title="{$word.app_shop_order_view_goods_detail}">{$val['pname']}</a>
										  </h4>
										  <if value="$val['splist_value_str']">
										  <div>{$val['splist_value_str']}</div>
										  </if>
										  <if value="$val['message']">
										  <div>{$val['message']}</div>
										  </if>
										</div>
									</div>
								</td>
								<td class="text-xs-center">{$val['puprice']}</td>
								<td class="text-xs-center">{$val['pamount']}</td>
								<td class="text-xs-center">{$val['freight']}</td>
								<td class="text-xs-center">{$val['price']}</td>
							</tr>
							<?php } ?>
	                    </tbody>
	              	</table>
				</div>
			</div>
		</div>
		<div class="panel">
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped m-b-0">
						<thead>
							<tr>
								<th class="text-xs-center">{$word.app_shop_order_amount_price}</th>
								<th class="text-xs-center"></th>
								<th class="text-xs-center">{$word.app_shop_order_freight}</th>
								<th class="text-xs-center"></th>
								<th class="text-xs-center">{$word.app_shop_order_discount}</th>
								<th class="text-xs-center"></th>
								<th class="text-xs-center">{$word.app_shop_order_price_rise_down}</th>
								<th class="text-xs-center"></th>
								<th class="text-xs-center">{$word.app_shop_order_real_payment}</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-xs-center"><span class="tag tag-default">{$data['order']['price_str']}</span></td>
								<td class="text-xs-center">+</td>
								<td class="text-xs-center"><span class="tag tag-default">{$data['order']['freight_str']}</span></td>
								<td class="text-xs-center">+</td>
								<td class="text-xs-center"><span class="tag tag-default">{$data['order']['discount_str']}{$data['order']['discount_info']}</span></td>
								<td class="text-xs-center">+</td>
								<td class="text-xs-center"><span class="tag tag-default"><span class="edit-price" data-url="{$_M['url']['own_form']}a=doeditorsave_price&id={$data['order']['id']}">{$data['order']['cprice_str']}</span></span></td>
								<td class="text-xs-center">=</td>
								<td class="text-xs-center"><span class="tag tag-default">{$data['order']['tprice_str']}</span></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php if($data['order']['state']==2 || $data['order']['state']==-1){ ?>
		<div class="panel">
			<div class="panel-body">
				<form action="{$_M['url']['own_form']}a=doeditorsave_send&id={$data['order']['id']}" id="edit-send">
					<div class="form-group">
	                    <div>
	                        <div class="radio-custom radio-primary radio-inline">
	                            <input type="radio" id="inputBasicMale" name="is_wuliu" value="1" data-checked="{$data['d_user_c']}">
	                            <label for="inputBasicMale">{$word.app_shop_order_need_logistics}</label>
	                        </div>
	                        <div class="radio-custom radio-primary radio-inline">
	                            <input type="radio" id="inputBasicFemale" name="is_wuliu" value="0">
	                            <label for="inputBasicFemale">{$word.app_shop_order_not_logistics}</label>
	                        </div>
	                    </div>
	                </div>
					<div class="collapse" id="send-info-body">
						<div class="well">
							<div class="form-group">
								<label class="form-control-label">{$word.app_shop_order_receiving_address}</label>
								<div>{$data['order']['address_str']}</div>
							</div>
							<div class="form-group">
								<label class="form-control-label">{$word.app_shop_order_logistics_company}</label>
							  	<select name="cinfo" class="form-control" data-plugin="select2" data-placeholder="{$word.app_shop_order_logistics_company}">
									<option></option>
							  	</select>
							</div>
							<div class="form-group m-b-0">
								<label class="form-control-label">{$word.app_shop_order_logistics_tips2}</label>
								<input type="text" name="cinfo_diy" placeholder="{$word.app_shop_order_logistics_tips1}" autocomplete="off" class="form-control">
							</div>
							<div class="form-group">
								<label class="form-control-label">{$word.app_shop_order_logistics_no}</label>
								<input type="text" name="oinfo" placeholder="{$word.app_shop_order_logistics_tips3}" autocomplete="off" required class="form-control" data-fv-notempty-message="{$_M['word']['js41']}">
							</div>
						</div>
					</div>
					<button type="submit" id="edit-send-submit" class="btn btn-primary">{$word.app_shop_order_deliver}</button>
				</form>
			</div>
		</div>
		<?php } ?>
		<div class="w-full p-y-10 bg-white text-xs-center metshop-oder-page-btn" data-gourl="{$_M['url']['own_form']}&a=docheck&id={$data['order'][id]}">
			<?php if($data['order']['state']==1){ ?>
			<button class="btn btn-primary m-x-5 edit-price-btn">{$word.app_shop_order_price_modify}</button>
			<?php
			}
			if($data['order']['state']>0 && $data['order']['state']!=4){
			?>
			<button class="btn btn-danger m-x-5 edit-close-btn" data-url="{$_M['url']['own_form']}a=doeditor_close&id={$data['order'][id]}" data-confirm='{$word.app_shop_order_closeok}'>{$word.app_shop_order_close}</button>
			<?php
			}
			if($data['order']['state']==3){
			?>
			<button class="btn btn-success m-x-5 complete-btn" data-url="{$_M['url']['own_form']}a=docomplete_order&id={$data['order'][id]}" data-confirm='{$word.app_shop_order_complateok}'>{$word.app_shop_order_complete}</button>
			<?php
			}
			if($data['order']['state']==-1 || $data['order']['state']==-2){
			?>
			<button class="btn btn-warning m-x-5 refuse-refund-btn" data-url="{$_M['url']['own_form']}a=dodeny_refund&id={$data['order'][id]}" data-confirm='{$word.app_shop_order_refund_denyok}'>{$word.app_shop_order_deny_refund}</button>
		    <button class="btn btn-success m-x-5 refund-complete-btn" data-url="{$_M['url']['own_form']}a=doerefund&id={$data['order'][id]}" data-confirm='{$word.app_shop_order_refund_conplateok}<br>{$word.app_shop_order_refund_conplate_tips}'>{$word.app_shop_order_refunds}</button>
			<?php } ?>
		</div>
	</div>
</div>