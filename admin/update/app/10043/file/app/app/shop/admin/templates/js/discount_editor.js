/**
 * 优惠券详情页
 */
var $select_goods=$("input[name=select_goods]"),
	$goods_list=$("input[name=goods_list]");
$(function(){
	if($('.discount-editor').length){
		// 发放总量验证
		$('input[name=one_user_have]').on('change keyup', function(e) {
            $('.discount-editor').data('formValidation').updateOption('amount', 'greaterThan', 'value', $('[name=one_user_have]').val())//更新发放总量最小值
            .revalidateField('amount');//重新验证
        });
		// 切换显示编辑商品按钮
		$('input[name=all_goods]').click(function() {
			if($(this).val()==0){
				$('.btn-goods-list').collapse('show');
			}else{
				$('.btn-goods-list').collapse('hide');
				$goods_list.val('');
				$select_goods.val('');
			}
		});
		// 弹出编辑商品
		$('.add-goods-btn').click(function() {
			if(typeof datatable != 'undefined'){
				datatable[0].ajax.reload();
			}else{
				window.datatable=[];
				datatable[0]=$('.select-goods').DataTable(datatableOption($('.select-goods')));
			}
		});
		// 切换编辑商品状态
		$('.select-goods-state-seach li a').click(function() {
			$('input[name=keyword]').val('');
			$('input[name=state]').val($(this).data('state'));
			datatable[0].ajax.reload();
		});
		// 搜素编辑商品
		$('input[name=keyword]').on('change keyup',function() {
			$('input[name=state]').val('');
			datatable[0].ajax.reload();
		});
		//保存商品
		$('.save-goods').click(function(){
			saveSelectGoods();
			$.include(M['plugin']['alertify'],function(){
				alertify.success(METLANG.app_shop_save_success_tips1);
			});
		});
		// 关闭编辑商品弹窗时恢复原来的值
		$('.select-goods-content .modal-close,.select-goods-content .close').click(function() {
			$select_goods.val($select_goods.data('value'));
			$goods_list.val($select_goods.data('value'));
		});
		$(document).on('click', '.add-goods .pagination .paginate_button:not(.disabled)', function(event) {
			saveSelectGoods();
		});
		//选中、取消商品
		$(document).on('click','.add-goods .select',function(){
			if($(this).attr('data-select')){
				$(this).removeAttr('data-select').html(METLANG.app_shop_select);
			}else{
				$(this).attr({'data-select':true}).html(METLANG.app_shop_selected);
			}
		});
		// 全部选择、全部取消商品
		$('.add-goods-allcheck').click(function() {
			$('.add-goods .select').attr({'data-select':true}).html(METLANG.app_shop_selected);
		});
		$('.add-goods-allcancel').click(function() {
			$('.add-goods .select').removeAttr('data-select').html(METLANG.app_shop_select);
		});
	}
});
// 暂存指定商品id
function saveSelectGoods() {
	var select_goods_val=['add','del'],
		self_val=$select_goods.val()!=''?$select_goods.val().split(','):'';
	select_goods_val['add']=[];
	select_goods_val['del']=[];
	// 当前排序页面的选取总值
	$('.add-goods .select').each(function(index, el) {
		if($(this).attr('data-select')){
			select_goods_val['add'].push($(this).data('id'));
		}else{
			select_goods_val['del'].push($(this).data('id'));
		}
	});
	// 删除未选取的商品
	if(select_goods_val['del'].length){
		$.each(self_val, function(index1, val1) {
			$.each(select_goods_val['del'], function(index2, val2) {
				if(val1==val2){
					delete self_val[index1];
					return false;
				}
			});
		});
		self_val=$.grep(self_val, function(n) {return $.trim(n).length > 0;});// 去除空元素
	}
	// 增加已选取的商品
	if(select_goods_val['add'].length){
		var addval=[];
		$.each(select_goods_val['add'], function(index1, val1) {
			var pushok=true;
			$.each(self_val, function(index2, val2) {
				if(val1==val2){
					pushok=false;
					return false;
				}
			});
			if(pushok) addval.push(val1);
		});
		if(addval.length) self_val=self_val.concat(addval);
	}
	self_val=self_val.toString();
	if(self_val!=$select_goods.val()){
		$select_goods.val(self_val);
		$goods_list.val(self_val);
	}
}