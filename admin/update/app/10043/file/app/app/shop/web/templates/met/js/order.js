$(function(){
	// 通过锚点获取所需订单状态
    var hash=location.hash?location.hash:'#state_all';
    hash=hash.replace('#state_','');
    var $hash=$('.shop-order-state a[data-state="'+hash+'"]');
    $hash.addClass('active');
    // 渲染订单数据
	orderList(true);
	// 切换订单类型
    $(".shop-order-state a").click(function(){
        $('input[name="keyword"]').val('');
        setTimeout(function(){
            orderList(true);
        },0)
        location.hash='state_'+$(this).data('state');
    })
	// 加载更多订单
	$("#shop-order-more").click(function(){
        orderList();
    })
    // 搜索订单
	$('.shop-order-keyword [name="keyword"]').change(function(event) {
		orderList(true);
	});
    // 确认收货
    $(document).on('click', '.btn-doreceipt', function(e) {
    	e.preventDefault();
    	var $self = $(this);
    	alertify.okBtn(METLANG.app_shop_ok).cancelBtn(METLANG.app_shop_cancel).confirm(METLANG.app_shop_doreceipt_if, function (ev) {
	    	$.ajax({
	    		url: $self.attr('href'),
	    		type: 'POST',
	    		dataType: 'json',
	    		success:function(result) {
	    			metAjaxFun(result,'',function(){
	    				$('input[name="keyword"]').val('');
                    	setTimeout(function(){
                    		location.reload();
                    	},500)
	    			});
	    		}
	    	})
    	})
    });
    // 取消订单、申请退换货
   	$(document).on('click', '.btn-cancel-order,.btn-return-goods', function(event) {
   		var $modal=$($(this).data('target'));
   		$modal.find('[name="id"]').val($(this).data('id'));
   		$modal.find('textarea').val('');
   		$modal.find('select option:eq(0)').attr({selected:true});
   	});
   	if($('.order-cancel,.order-refund').length){
   		$('.order-cancel,.order-refund').each(function(index, el) {
   			var $self=$(this),
   				order_cancel_index=$(this).index('form');
	   		validate[order_cancel_index].success(function(result,form){
	   			metAjaxFun(result,'',function(){
	   				form.parents('.modal').modal('hide');
					$('input[name="keyword"]').val('');
	            	setTimeout(function(){
	            		location.hash='state_'+($self.hasClass('order-cancel')?'0':'-1');
	            		location.reload();
	            	},500)
				});
	   		})
   		});
   	}
   	// 提取发货码
   	$(document).on('click', '.btn-auto-sent-code', function(event) {
   		if(!$(this).attr('data-target')){
   			$('.btn-auto-sent-code').webuiPopover();
   			$(this).click();
   			if(parseInt($(this).data('state'))==2){
   				$.ajax({
					url: $('.shop-order-list').data('auto-sent-code-url'),
					data: {cid:$(this).data('cid'),oid:$(this).data('oid')},
					type: 'POST',
					dataType:'json',
					success: function(json) {
						console.log(json);
					}
				});
   			}
   		}
   	});
});
// 渲染订单数据
function orderList(search){
	var $morebtn = $('#shop-order-more'),
		$order_list=$('.shop-order-list');
	if(search) window.page = null;
	$morebtn.attr('disabled','disabled');
	orderJson(function(json){
		if(json.success==1 && json.order.length){
			var html = '';
			$.each(json.order, function(i, item){
				item.state=parseInt(item.state);
				var original=i>3?'data-original':'src';
				switch(parseInt(item.state)){
					case -1:
						item.title_class='blue-grey-600';
						break;
					case 0:
						item.title_class='blue-grey-400';
						break;
					case 1:
						item.title_class='red-600';
						break;
					case 2:
						item.title_class='orange-600';
						break;
					case 3:
						item.title_class='green-600';
						break;
				}
				html += '<div class="shop-order-item page-'+json.page+'">'+
							'<div class="clearfix shop-order-top">'+
								'<div class="col-md-8 col-sm-8 ting">'+
									'<h4 class="font-size-22 '+item.title_class+'">'+item.state_txt+'</h4>'+
									'<span class="m-l-5 blue-grey-700">'+METLANG.app_shop_ordernumber+' : '+item.orderid+'</span>'+
									'<span class="m-l-5 blue-grey-500">'+item.rtime_str+'</span>'+
									'<span class="m-l-5 grey-700">'+item.paytype_str+'</span>'+
								'</div>'+
								'<div class="col-md-4 col-sm-4 ting text-sm-right">'+
									METLANG.app_shop_orderamount+' ：<span class="price font-size-26 red-600">'+item.tprice_str+'</span>'+
								'</div>'+
							'</div>'+
							'<div class="clearfix shop-order-bottom">'+
								'<div class="col-sm-6 col-xl-7">';
				if(item.goods_list){
					$.each(item.goods_list, function(k, val){
						val.auto_sent=parseInt(val.auto_sent);
						val.auto_sent_str='';
						if(val.auto_sent){
							val.auto_sent_str+='<div>';
							$.each(val.cards, function(index, card) {
								val.auto_sent_str+='<button type="button" class="btn btn-info btn-squared btn-xs m-r-5 btn-auto-sent-code" data-cid="'+card.id+'" data-oid="'+card.orderid+'" data-state="'+card.state+'" data-animation="pop" data-placement="bottom" data-width="300" data-content=\'<div class="text-xs-center">'+METLANG.app_shop_order_card+'：<span class="red-600">'+card.card+'</span></div>\'>'+METLANG.app_shop_order_extracting_code+'</button>';
							});
							val.auto_sent_str+='</div>';
						}
							html += '<div class="media media-xs m-t-10">'+
										'<div class="media-left">'+
											'<a href="'+val.url+'" target="_blank">'+
												'<img class="media-object" '+original+'="'+val.img+'" alt="'+val.pname+'">'+
											'</a>'+
										'</div>'+
										'<div class="media-body">'+
											'<h4 class="media-heading font-size-14"><a href="'+val.url+'" target="_blank">'+val.pname+' &nbsp; '+val.splist_value_str+'</a></h4>'+
											'<p class="m-b-5">'+val.puprice_str+' x '+val.pamount+'</p>'+val.auto_sent_str+
										'</div>'+
									'</div>';
					})
				}
						html += '</div>'+
								'<div class="col-sm-6 col-xl-5 text-xs-right">';
							html +='<a href="'+item.docheck_url+'" class="btn btn-outline btn-default btn-squared m-t-10">'+METLANG.app_shop_orderdetails+'</a>';
						if(item.state==2 && $order_list.data('shopv2_price_refund')) html += '<button type="button" class="btn btn-warning btn-squared m-l-5 m-t-10 btn-cancel-order" data-toggle="modal" data-target=".price-refund-modal" data-id="'+item.id+'">'+METLANG.app_shop_cancelorder+'</button>';
						if(item.state==1) html += '<a href="'+payorder_url+'&id='+item.id+'" target="_blank" class="btn btn-danger btn-squared m-l-5 m-t-10">'+METLANG.app_shop_topaynow+'</a>';
						if(item.state==3 && $order_list.data('shopv2_return_goods')) html += '<button type="button" class="btn btn-warning btn-squared m-l-5 m-t-10 btn-return-goods" data-toggle="modal" data-target=".return-goods-modal" data-id="'+item.id+'">'+METLANG.app_shop_order_refund+'</button>'
									+'<a href="'+doreceipt_url+'&id='+item.id+'" class="btn btn-danger btn-squared m-l-5 m-t-10 btn-doreceipt">'+METLANG.app_shop_doreceipt+'</a>';
						html +='</div>'+
							'</div>'+
						'</div>';
			});
			// 插入订单列表数据
			if(search){
				$order_list.html(html);
			}else{
				$order_list.append(html);
			}
			// 列表图片延迟加载
			var $original=$order_list.find('.page-'+json.page+' [data-original]');
			if($original.length){
                if(typeof $.fn.lazyload =='undefined'){
                    $.include(M['plugin']['lazyload'],function(){
                        $original.lazyload();
                    });
                }else{
                    $original.lazyload();
                }
            }
            // 加载更多订单按钮
			window.page = parseInt(json.page) + 1;
			$morebtn.removeAttr('disabled');
			if(json.endnum>json.page){
				$morebtn.removeAttr('hidden');
			}else{
				$morebtn.attr({hidden:''});
			}
		}else{
			$order_list.html('<div class="h-200 vertical-align text-xs-center"><div class="vertical-align-middle font-size-18 blue-grey-500">'+METLANG.app_shop_noorders+'</div></div>');
			$morebtn.attr({hidden:''});
		}
	});
}
// 获取订单数据
function orderJson(func){
	var search = '&state='+$('.shop-order-state li a.active').data('state');
	if($('input[name="keyword"]').val()!='') search+='&keyword='+$('input[name="keyword"]').val();
	if(window.page>1) search+='&page='+window.page;
	$.ajax({
		url: order_json_url,
		data: search,
		type: 'POST',
		dataType:'json',
		success: function(json) {
			func(json);
		}
	});
}