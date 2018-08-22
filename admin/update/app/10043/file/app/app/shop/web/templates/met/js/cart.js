/*
购物车页面
 */
$(function(){
	var matchmedia_result = window.matchMedia("(min-width: 768px)");
	sizeChange(matchmedia_result);
	matchmedia_result.addListener(sizeChange);
	// 勾选商品
	$(document).on('change',".cart-list .selectable-item",function(){
		cartTotalAjax('','','cache');
	})
	// 商品数量调整
	$(document).on('change',"[data-plugin=touchSpin]",function(){
		cartTotalAjax($(this).data('id'), $(this).val());
	})
	// 删除商品
	$(document).on('click',".cart-remove",function(e){
		e.preventDefault();
		var $self = $(this);
		alertify.okBtn(METLANG.app_shop_ok).cancelBtn(METLANG.app_shop_cancel).confirm(METLANG.app_shop_deleteok, function (ev) {
			$.ajax({
				url: $self.attr('href'),
				type: 'POST',
				dataType:'json',
				success: function(result) {
					metAjaxFun(result,'',function(){
						var tr = matchmedia_result.matches?$self.parents('tr'):$self.parents('.cart-mobile');
						tr.remove();
						if($('.cart-list tbody tr,.cart-list .cart-mobile').length){
							cartTotalAjax();
						}else{
							setTimeout(function(){
								$('.cart-total,.cart-body').remove();
								$('.cart-not').removeAttr('hidden');
							},300)
						}
					});
				}
			});
		});
	})
	// 去结算
	$(document).on('click',".cart-tocheck",function(e){
		var cidlist='',
			num=0;
		$("input[name=cartitem]").each(function(){
			if(!$(this).hasClass('disabled') && $(this).prop("checked")){
				if(num>0) cidlist+='-';
				cidlist+= $(this).val();
				num++;
			}
		});
		$.ajax({
			url: $(this).data('url'),
			type: 'POST',
			dataType: 'json',
			data: {cidlist:cidlist,ajax:1},
			success:function(result){
				result.status=parseInt(result.status);
				if(result.status>0){
					location=result.url;
				}else if(result.status<0){
					alertify.okBtn(METLANG.app_shop_ok).cancelBtn(METLANG.app_shop_cancel).confirm(METLANG.app_shop_needlogin,function(){
						location=result.url;
					});
				}else{
					alertify.okBtn(METLANG.app_shop_ok).alert(result.msg);
				}
			}
		})
	})
});
// 不同设备处理
function sizeChange(matchmedia_result) {
	if (matchmedia_result.matches) {
		pcLoadCart();
	}else{
		mobileLoadCart();
	}
}
// 刷新价格数据
function cartTotalAjax(id, amount,cache){
	if(cache=='cache'){
		cartTotal(cartdata);
	}else{
		$.ajax({
			url: totalurl,
			type: "GET",
			data: {id:id,amount:amount},
			cache: false,
			dataType: "jsonp",
			success: function(data) {
				if(data.message == 'ok'){
					window.cartdata = data.price;
					if(amount){
						$.each(data.price.goods, function(index, val) {
							if(index==id){
								var $item=$('.cart-list .selectable-item[name="cartitem"][value="'+id+'"]');
								if(parseInt(val.buy_ok)){
									if(typeof $item.attr('disabled') !='undefined'){
										$item.removeAttr('disabled').attr({checked:true}).next('label').html('');
									}
								}else{
									if($item.is(':checked')){
										$item.attr({disabled:'',checked:false}).next('label').html(METLANG.app_shop_oos);
									}
								}
								cartTotal(data.price);
								return;
							}
						});
					}else{
						cartTotal(data.price);
					}
				}else{
					alertify.error(METLANG.app_shop_errorrefresh);
				}
			}
		});
	}
}
// 价格计算
function cartTotal(data){
	var total = 0,num=0;
	$('.cart-tocheck').addClass('disabled');
	$('.subtotal').each(function(){
		var id = $(this).data('id');
		$(this).html(data.goods[id].subtotal);
		if($('.cart-list .selectable-item[name="cartitem"][value="'+id+'"]:checked').length){
			data.goods[id].amount=parseInt(data.goods[id].amount);
			total+=parseFloat(data.goods[id].price)*data.goods[id].amount;
			num+=data.goods[id].amount;
		}
	});
	if(num) $('.cart-tocheck').removeClass('disabled');
	$('.cart-goodnum').html(num);
	$('.total-val').html('<span class="font-size-16">'+price_prefix+'</span>'+total.toFixed(2));
	$('.cart-loader').remove();
	$('.cart-total').removeAttr('hidden');
	$('.cart-list').parent().removeAttr('hidden');
}
// 数据获取完成后渲染器
function cartRenderer(html){
	$(".cart-list").html(html);
	if($('[data-plugin=touchSpin]').length) $('[data-plugin=touchSpin]').TouchSpin();
	cartTotalAjax();
}
// 公共字符处理
function cartCheck(id,buy_ok){
	var check = buy_ok==0?'disabled':'checked',txt = buy_ok==0?METLANG.app_shop_oos:'';
	return '<div class="checkbox-custom checkbox-danger m-y-0 inline-block vertical-align-middle">'+
				'<input type="checkbox" class="selectable-item" name="cartitem" value="'+id+'" '+check+'>'+
				'<label>'+txt+'</label>'+
			'</div>';
}
// 平板&电脑端加载商品数据
function pcLoadCart(){
	$.loadCartJson(function(json){
		var list='',
			html = '<div class="table-responsive">'+
						'<table class="table table-hover table-striped">'+
							'<thead>'+
								'<tr>'+
									'<th class="text-xs-center w-100">'+
										'<div class="checkbox-custom checkbox-danger">'+
											'<input type="checkbox" class="selectable-all" checked>'+
											'<label></label>'+
										'</div>'+
									'</th>'+
									'<th class="w-300">'+METLANG.app_shop_commodity+'</th>'+
									'<th class="text-xs-center">'+METLANG.app_shop_price+'</th>'+
									'<th class="text-xs-center w-150">'+METLANG.app_shop_number+'</th>'+
									'<th class="text-xs-center">'+METLANG.app_shop_subtotal+'</th>'+
									'<th class="text-xs-center w-100">'+METLANG.app_shop_operation+'</th>'+
								'</tr>'+
							'</thead><tbody>';
		$.each(json, function(i, item){
			item.shopmax = item.purchase>0?item.purchase:item.stock;
			item.purchase_text=item.purchase>0?METLANG.app_shop_purchase+item.purchase+METLANG.app_shop_piece:'';
			list += '<tr class="text-xs-center">'+
						'<td>'+cartCheck(item.id,item.buy_ok)+'</td>'+
						'<td class="text-xs-left"><div class="media">'+
							'<div class="media-left">'+
								'<a class="avatar text-middle" target="_blank" href="'+item.url+'">'+
									'<img class="img-responsive" src="'+item.img+'" alt="">'+
								'</a>'+
							'</div>'+
							'<div class="media-body">'+
								'<h4 class="media-heading">'+
									'<a target="_blank" href="'+item.url+'">'+
										item.name+
									'</a>'+
								'</h4>';
			if(item.splist_value_str) list+='<p class="m-b-0">'+item.splist_value_str+'</p>';
							list+='</div>'+
						'</div></td>'+
						'<td>'+item.price_str+'</td>'+
						'<td><div class="buynum">'+
							'<input type="text" class="form-control input-sm text-xs-center buynum-input" data-min="1" data-max="'+item.shopmax+'" data-plugin="touchSpin" data-id="'+item.id+'" name="buynum" autocomplete="off" value="'+item.amount+'">';
			if(item.purchase_text) list+='<p class="m-b-0 orange-600">'+item.purchase_text+'</p>';
						list+='</div></td>'+
						'<td><span class="red-600 subtotal" data-id="'+item.id+'">'+item.subtotal+'</span></td>'+
						'<td><a href="'+delurl+'&id='+item.id+'" class="cart-remove"><i class="icon wb-trash" aria-hidden="true"></i></a></td>'+
					'</tr>';
		})
		html+=list+'</tbody></table>'+'</div>';
		cartRenderer(html);
	});
}
// 手机端加载商品数据
function mobileLoadCart(){
	$.loadCartJson(function(json){
		var html='';
		$.each(json, function(i, item){
			item.shopmax = item.purchase>0?item.purchase:item.stock;
			item.purchase_text=item.purchase>0?METLANG.app_shop_purchase+item.purchase+METLANG.app_shop_piece:'';
			html += '<div class="clearfix cart-mobile">'+
						'<div class="col-xs-1 p-0 vertical-align" style="height:70px;">'+
							cartCheck(item.id,item.buy_ok)+
						'</div>'+
						'<div class="col-xs-11 p-0">'+
							'<div class="media p-l-5">'+
								'<div class="media-left p-r-10" style="display:table-cell;">'+
									'<a href="'+item.url+'" target="_blank" class="vertical-align-middle">'+
										'<img class="img-fluid" src="'+item.img+'" alt="">'+
									'</a>'+
								'</div>'+
								'<div class="media-body">'+
									'<h4 class="media-heading">'+
										'<a target="_blank" href="'+item.url+'">'+item.name+'</a>'+
									'</h4>';
									if(item.splist_value_str) html+='<p class="m-b-0">'+item.splist_value_str+'</p>';
									html+='<div class="clearfix">'+
										'<p class="red-600 pull-xs-left text-xs-right m-b-0 m-t-5 subtotal" data-id="'+item.id+'">'+item.subtotal+'</p>'+
										'<a href="'+delurl+'&id='+item.id+'" class="pull-xs-right cart-remove"><i class="icon wb-trash" aria-hidden="true"></i></a>'+
										'<div class="inline-block m-r-10 pull-xs-right buynum">'+
											'<input type="text" class="form-control input-sm text-xs-center p-x-0 buynum-input" data-min="1" data-max="'+item.shopmax+'" data-plugin="touchSpin" data-id="'+item.id+'" name="buynum" autocomplete="off" value="'+item.amount+'">'+
										'</div>'+
									'</div>';
			if(item.purchase_text) html+='<p class="m-b-0 orange-600 shop-purchase">'+item.purchase_text+'</p>';
								html+='</div>'+
							'</div>'+
						'</div>'+
					'</div>';
		})
		cartRenderer(html);
	})
}