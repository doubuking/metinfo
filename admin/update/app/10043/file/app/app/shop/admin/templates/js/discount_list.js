/**
 * 优惠券列表页
 */
$(function(){
	if($('.discount-state-seach').length){
		// 通过锚点获取所需优惠券状态
 		var hash=location.hash?location.hash:'',
 			$hash=$('.discount-state-seach a[href="'+hash+'"]');
	 	$hash.addClass('active');
	 	if(hash) $('input[name=state]').val($hash.data('state'));
 		window.datatable=[];
 		datatable[0]=$('.discount-list').DataTable(datatableOption($('.discount-list')));
		//数据筛选
		$('input[data-table-search]').on('change keyup',function(){
			datatable[0].ajax.reload();
		})
		//优惠劵状态查询
		$('.discount-state-seach a').click(function(){
			$('input[name=keyword]').val('');
			$('input[name=state]').val($(this).data('state'));
			datatable[0].ajax.reload();
			location.hash=$(this).attr('href');
		});
		//优惠券删除
		$('.discount-del').click(function(){
			var $discount_list = $('.discount-list'),
				allid = '',
				num=0;
			$('input[name=id]', $discount_list).each(function(){
				if($(this).val() && $(this).is(':checked')){
					if(num>0) allid+=',';
					allid += $(this).val();
					num++;
				}
			});
			$.include(M['plugin']['alertify'],function(){
				if(allid){
					alertify.okBtn(METLANG.app_shop_ok).cancelBtn(METLANG.app_shop_cancel).confirm(METLANG.app_shop_deleteok, function (ev) {
						$.ajax({
							url: $discount_list.data('table-delurl'),
							type: 'POST',
							dataType:'json',
							data:{allid:allid},
							success: function(result) {
								metAjaxFun(result,'',function(){
									datatable[0].ajax.reload();
									$('input[type=checkbox]', $discount_list).removeAttr('checked');
								});
							}
						});
					});
				}else{
					alertify.error(METLANG.app_shop_js_tips1);
				}
			});
		})
	}
});