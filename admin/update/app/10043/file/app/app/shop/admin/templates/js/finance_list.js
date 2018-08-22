/**
 * 财务明细
 */
$(function(){
	// 加载数据
	if($('.finance-list').length){
		window.datatable=[];
		datatable[0]=$('.finance-list').DataTable(datatableOption($('.finance-list')));
	}
	// 入款扣款
	$('.btn[data-target=".finance-deposit"],.btn[data-target=".finance-debit"]').one('click', function(event) {
		var index=$($(this).data('target')+' .finance-form').index('form');
		validate[index].success(function(result,form){
			$.include(M['plugin']['alertify'],function(){
				metAjaxFun(result,'',function(){
					datatable[0].ajax.reload();
					form.parents('.modal').modal('hide');
				});
			});
		});
	});
});