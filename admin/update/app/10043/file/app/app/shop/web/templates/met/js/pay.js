$(function(){
	// 选择器
	if(!$('.addr-body').length)ajaxTotal();
	// 订单表单页面提交验证
	var pay_form_index=$('.pay-form').index('form');
	validate[pay_form_index].success(function(e,form){
		if($("#addressid").val()==''||$("#addressid").val()==0){
			alertify.error(METLANG.app_shop_pleaseaddress);
			refreshAddr();
		}else{
			validate[pay_form_index].formDataAjax(e,function(result,form){
				if(result.error){
					alertify.error(result.error);
				}else if(result.success){
					location = result.success;
				}
			});
		}
		return false;
	},false);
	// 是否开票
	$(document).on('change','input[name="invoice_is"]',function(){
		if($(this).val()==1){
			$('#invoice-body').collapse('show');
		}else{
			$('#invoice-body').collapse('hide');
			$(this).attr("data-fv-notempty",false);
			$(".disabled").removeAttr("disabled").removeClass("disabled");
		}
	})
	// 选中收货地址
	$(document).on('click',".addr-list",function(){
		addressId($(this));
	})
	// 选中优惠券
	$(document).on('click',".pay-discount-body li label",function(){
		$('input[name="discount"]').val($(this).prev('input[type="radio"]').val());
		ajaxTotal();
	})
});
// 选中订单收货地址
function addressId(dom){
	if(dom){
		$('.addr-body .addr-list').removeClass('hover');
		dom.addClass('hover');
	}else{
		dom = $('.addr-body .addr-list.hover');
	}
	$("#addressid").val(dom.data('id'));
	ajaxTotal();
}
// 计算总价格
function ajaxTotal(){
	$.ajax({
		url: shop_ajax_total,
		data:{
			cidlist:$('input[name="cidlist"]').val(),
			addressid:$('input[name="addressid"]').val(),
			invoice_is:$('input[name="invoice_is"]').val(),
			discount:$('input[name="discount"]').val()
		},
		type: 'POST',
		dataType:'json',
		cache: false,
		success: function(data) {
			var freight = data.freight==0?METLANG.app_shop_freefreight:data.freight_str;
			$('#pay-freight').html(freight);
			$('#pay-amount').html(data.amount);
			$('#pay-total').html(data.tprice_str);
		}
	});
}
// 收货地址
$(function(){
	if($('.addr-body').length) refreshAddr();
	//编辑
	$(document).on('click','.addr-set-edit',function(){
		addrModal($(this).parents('a.addr-list'));
	})
	// 添加地址按钮
	$(document).on('click','.addr-btn',function(){
		addrModal();
	})
	// 保存收货地址
	var addr_edit_form_index=$('.addr-edit-form').index('form');
	validate[addr_edit_form_index].success(function(e,form){
		var zone_code='';
		form.find('.select-linkage select').each(function(index, el) {
			zone_code+=index?','+$(this).val():$(this).val();
			form.find('input[name="'+$(this).data('name')+'"]').val($(this).find('option[value="'+$(this).val()+'"]').data('val'));
		});
		form.find('[name="zone_code"]').val(zone_code);
		validate[addr_edit_form_index].formDataAjax(e,function(result,form){
			metAjaxFun(result,'',function(){
				$('#addr-edit-modal').modal('hide');
				refreshAddr(form.find('input[name="id"]').val());
			});
		})
		return false;
	},false);
})
// 刷新收货地址
function refreshAddr(id){
	loadAddrJson(function(json){
		var html = '',deok,body = $('.addr-body');
		$.each(json, function(i, item){
			deok = item.de==1&&!id?'hover':'';
			if(id&&id==item.id) deok = 'hover';
			html += '<li class="m-t-10 m-b-0">'+
						'<a class="list-group-item addr-list '+deok+'" href="javascript:void(0)" '+
							'data-id="'+item.id+'" '+
							'data-name="'+item.name+'" '+
							'data-tel="'+item.tel+'" '+
							'data-zone_code="'+item.zone_code+'" '+
							'data-zone_a="'+item.zone_a+'"'+
							'>'+
							'<div class="addr-set btn-group btn-group-xs" >'+
								'<button type="button" class="btn btn-outline btn-default addr-set-edit"><i class="icon wb-edit m-0" aria-hidden="true"></i></button>'+
							'</div>'+
							'<h4 class="list-group-item-heading">'+
								item.name+
							'</h4>'+
							'<p class="list-group-item-text m-b-5 addr-info">'+
								item.tel+
							'</p>'+
							'<p class="list-group-item-text addr-info">'+
								item.zone_coun+' '+item.zone_p+' '+item.zone_c+' '+item.zone_d+' '+item.zone_a
							'</p>'+
						'</a>'+
					'</li>';
		})
		body.html('');
		if(html==''){
			addrModal();
			body.html('<div class="font-size-16 red-600">'+METLANG.app_shop_no_address+'</div>');
		}else{
			body.html(html).removeClass('text-xs-center');
			addressId();
		}
	});
}