$(function(){
	// 订单关闭
	$(document).on('click',".shop-order-close",function(e){
		e.preventDefault();
		var $self = $(this);
		alertify.okBtn(METLANG.app_shop_ok).cancelBtn(METLANG.app_shop_cancel).confirm(METLANG.app_shop_cancelorderok, function (ev) {
			$.ajax({
				url: $self.attr('href'),
				type: 'POST',
				dataType:'json',
				success: function(result) {
					metAjaxFun(result);
				}
			});
		});
	})
	// 付款后未发货时取消订单、申请退换货、退换货回复
	if($('.order-cancel,.refund-reason,.refund-info').length){
		$('.order-cancel,.refund-reason,.refund-info').each(function(index, el) {
			var form_index=$(this).index('form');
			validate[form_index].success(function(result,form){
				metAjaxFun(result);
			});
		});
	}
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
	    			metAjaxFun(result);
	    		}
	    	})
    	})
    });
    // 退换货原因图片
    $('.reason-detail-imgs [data-src]').each(function(index, el) {
    	$(this).attr({'data-original':$(this).data('src')}).removeAttr('data-src');
    });
    $('.reason-detail-imgs [data-original]').lazyload({container:'.reason-detail-imgs [data-role="container"]'});
	//展开物流跟踪信息
	var $btn_logistics=$('.btn-logistics-track');
	if($btn_logistics.length){
		var webuip_w=500,
			ajax_ok=true,
			logisticsListGotop=function(){
				if($('.logistics-list').length) $('.logistics-tracks-popover .scrollable-bar-handle').css({transform:'translate3d(0, 0, 0)'});
			};
		Breakpoints.on('xs',{
	        enter:function(){
	        	webuip_w=$('.order-info').parent().width();
	    	}
		})
		$btn_logistics.webuiPopover({
			onShow: function() {
				if(ajax_ok){
					$.ajax({
						url: $btn_logistics.attr('href'),
						type: 'POST',
						data:{order_id:$('#orderid').text(),tracking_no:$('#oinfo').text()},
						dataType: 'json',
						success: function(data) {
							var html='',
								status=parseInt(data.status);
							if(status){
								html+='<div class="font-size-20 text-xs-center" style="height:380px;line-height:380px;">'+METLANG.app_shop_searchfail+'</div>';
						    }else{
					        	$.each(data.result.list, function(index, val) {
									html+='<li><p>'+val.status+'<br /><span>'+val.time+'</span></p></li>';
								});
								html+='<div class="logistics-list" data-plugin="scrollable"><div data-role="container" style="height:380px;"><div data-role="content">'+html+'</div></div></div>';
					        }
							$('.webui-popover .webui-popover-content').addClass('logistics-tracks-popover blue-grey-400').html(html);
							if(!status){
								$('.logistics-list').asScrollable({
									namespace: "scrollable",
									contentSelector: '>',
									containerSelector: '>'
								});
							}
							logisticsListGotop();
							ajax_ok=false;
						}
					});
				}else{
					logisticsListGotop();
				}
			},
			container:'.btn-logistics-parent',
			width:webuip_w
		});
	}
	// 提取发货码
   	$(document).on('click', '.btn-auto-sent-code', function(event) {
   		if(!$(this).attr('data-target')){
   			$('.btn-auto-sent-code').webuiPopover();
   			$(this).click();
   			if(parseInt($(this).data('state'))==2){
   				$.ajax({
					url: $('.order-goods').data('auto-sent-code-url'),
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
