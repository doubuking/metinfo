/**
 * 自动发货设置
 */
$(function(){
	// 添加发货码
	$(document).on('click', '.addcards-list .btn-addcards', function(event) {
		$('.addcards-form [name="splist_id"]').val($(this).data('splist_id'));
	})
	// 添加发货码添加
	if($('.addcards-form').length){
		validate[0].success(function(result,form){
			$.include(M['plugin']['alertify'],function(){
				metAjaxFun(result,'',function(){
					$('.auto-sent-add-modal').modal('hide');
					setTimeout(function(){
						location.reload();
					},500)
				});
			});
		});
	}
	// 发货码编辑
	$(document).on('click', '.card-list .card-editor', function(event) {
		if(!$(this).hasClass('editable')){
			var $self=$(this);
				$card_value=$(this).parents('td').find('.card-value');
			$.include(M['plugin']['glyphicons']);
			$.include(M['plugin']['x_editable'],function(){
				$self.editable({
					url: $('.card-list').data('editor-url'),
					mode:'inline',
					pk:1,
					value:$card_value.text(),
					params: function(params) {
						params.card_id=$self.data('id');
					    params.card=params.value;
					    return params;
					},
					ajaxOptions: {
						dataType: 'json'
					},
					success: function(result) {
						metAjaxFun(result,'',function(){
							setTimeout(function(){
								$card_value.text($self.text());
								$self.html('');
							},0)
						});
					}
				});
				$self.html('');
				setTimeout(function(){
					$self.editable('toggle');
				},0)
			});
		}
	});
	// 删除虚拟商品信息
	$(document).on('click', '.card-list .card-del', function(event) {
		event.preventDefault();
		var $self=$(this);
		$.include(M['plugin']['alertify'],function(){
			alertify.okBtn(METLANG.app_shop_ok).cancelBtn(METLANG.app_shop_cancel).confirm(METLANG.app_shop_deleteok,function (ev){
				$.ajax({
					url: $self.data('url'),
					type: 'POST',
					dataType: 'json',
					success: function(result){
						metAjaxFun(result,'',function(){
							setTimeout(function(){
								window.location.reload();
							},1000)
						});
					}
				})
			})
		});
	});
});