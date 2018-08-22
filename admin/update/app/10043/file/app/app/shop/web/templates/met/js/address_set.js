/*收货地址*/
$(function(){
	// 加载收货地址
	if($('.shop-address .addr-body').length) refreshAddr();
	// 添加收货地址
	$(document).on('click',".shop-address .addr-btn",function(){
		addrModal();
	})
	// 编辑收货地址
	$(document).on('click',".shop-address .addr-body .addr-set-edit",function(){
		addrModal($(this).parents('a.addr-list'));
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
	// 删除收货地址
	$(document).on('click',".shop-address .addr-body .addr-set-del",function(){
		var $self = $(this);
		alertify.okBtn(METLANG.app_shop_ok).cancelBtn(METLANG.app_shop_cancel).confirm(METLANG.app_shop_deleteok,function (ev) {
			$.ajax({
				url: $self.data('url'),
				type: 'POST',
				dataType:'json',
				success: function(result) {
					metAjaxFun(result,'',function(){
						refreshAddr();
					});
				}
			});
		});
	})
});
// 刷新收货地址
function refreshAddr(){
	loadAddrJson(function(json){
		var html = '',
			$addr_body = $(".addr-body");
		$.each(json, function(i, item){
			html += '<li>'+
						'<a class="list-group-item addr-list" href="javascript:;" '+
							'data-id="'+item.id+'" '+
							'data-name="'+item.name+'" '+
							'data-tel="'+item.tel+'" '+
							'data-zone_code="'+item.zone_code+'" '+
							'data-zone_a="'+item.zone_a+'"'+
							'>'+
							'<div class="addr-set btn-group btn-group-xs" >'+
								'<button type="button" class="btn btn-outline btn-default addr-set-edit"><i class="icon wb-edit m-0" aria-hidden="true"></i></button>'+
								'<button type="button" class="btn btn-outline btn-default addr-set-del" data-url="'+addrdelurl+'&id='+item.id+'"><i class="icon wb-trash m-0" aria-hidden="true"></i></button>'+
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
		$addr_body.html('');
		if(html==''){
			addrModal();
			$addr_body.html('<div class="font-size-16 red-600">'+METLANG.app_shop_no_address+'</div>');
		}else{
			$addr_body.html(html).removeClass('text-xs-center');
		}
	});
}