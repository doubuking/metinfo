/**
 * 规格库设置
 */
$(function(){
	var $spec_list=$('.spec-list'),
		addlist_h=$('.addlist').height();
	$('.spec-list').parents('body').css({'padding-bottom':addlist_h});
	// 表格数据保存提交
	// validate[0].success(function(e,form){
	// 	var spec_list={};
 //        $('.spec-list tbody tr').each(function(index, el) {
 //            var list={};
 //            $('[name]',this).each(function(i, val) {
 //            	var name=$(this).attr('name'),
 //            		value=$(this).val();
 //            	if(name=='value'){
 //            		value={};
 //            		value['vid']=$(this).data('vid');
 //            		value['value']=$(this).val();
 //            		value['spec_id']=list['id'];
 //            	}
 //                if(typeof list[name] =='undefined'){
 //                    list[name]=value;
 //                }else{
 //                    if(name=='value'){
 //                    	if(typeof list[name]['vid'] !='undefined'){
 //                    		var old_list_name=list[name];
 //                    		list[name]={};
 //                    		list[name][old_list_name['vid']]=old_list_name;
 //                		}
 //                    	list[name][value['vid']]=value;
 //                    }
 //                }
 //                list['lang']=M['lang'];
 //            });
 //            spec_list[list['id']]=list;
 //        });
 //        $.ajax({
 //            url: form.attr('action'),
 //            type: "POST",
 //            dataType:'json',
 //            data:{spec_list:spec_list},
 //            success: function(result){
 //                console.log(result);
 //            }
 //        });
 //        return false;
	// },false);
	// 添加规格
	$(document).on('click', '.spec-list [table-addlist]', function(event) {
		var $new_tr=$spec_list.find('tbody tr:last-child'),
			new_tr_top=$(window).height()+$(window).scrollTop()-$new_tr.offset().top-addlist_h;
		if($spec_list.find('tbody tr input[name="name"][value="spec_holder"]').filter(function(index){return $(this).val()=='';}).length){
			$new_tr.prev().find('input[name="name"]').focus();
			$new_tr.remove();
			alertify.error(METLANG.app_shop_spce_tips1);
			return false;
		}
		$new_tr.find('input[name="name"]').focus();
		$('.spec-list-form').data('formValidation').addField('name');
		if(new_tr_top<=30) $(window).scrollTop($new_tr.offset().top);
		$.ajax({
            url: $spec_list.data('addspec-url'),
            type: "POST",
            dataType:'json',
            data:{spec_name:$new_tr.find('input[name="name"]').val()},
            success: function(result){
                metAjaxFun(result,function(){
                	$new_tr.remove();
                },function(){
                	$new_tr.find('input[name="id"]').val(result.data);
                	$new_tr.find('input[name="name"]').val('');
                });
            }
        });
	});
	// 编辑规格
	$(document).on('change', '.spec-list tbody input[name="name"]', function(event) {
		$.ajax({
            url: $spec_list.data('editspec-url'),
            type: "POST",
            dataType:'json',
            data:{spec_id:$(this).parents('tr').find('[name="id"]').val(),spec_name:$(this).val()},
            success: function(result){
                metAjaxFun(result);
            }
        });
	});
	// 删除规格
	$(document).on('click', '.spec-list tbody .del-spec', function(event) {
		var $parents_tr=$(this).parents('tr');
        alertify.okBtn(METLANG.app_shop_ok).cancelBtn(METLANG.app_shop_cancel).confirm(METLANG.app_shop_spec_tips1, function (ev) {
			$.ajax({
	            url: $spec_list.data('delspec-url'),
	            type: "POST",
	            dataType:'json',
	            data:{spec_id:$parents_tr.find('[name="id"]').val()},
	            success: function(result){
	                metAjaxFun(result,'',function(){
	                	$parents_tr.remove();
	                });
	            }
	        });
        })
	});
	// 添加规格值
	$(document).on('click', '.spec-list tbody .add-specv', function(event) {
		var $spec_value=$(this).parents('tr').find('.spec-value-list'),
			$spec_value_null=$spec_list.find('.spec-value-item:last-child input[name="value"][value="specv_holder"]').filter(function(index){return $(this).val()=='';}),
			html=' <div class="w-150 inline-block form-group m-b-0 spec-value-item">'
					+'<input type="text" name="value" placeholder="'+METLANG.app_shop_spec_input_tips1+'" value="specv_holder" required class="form-control">'
					+'<i class="icon wb-close font-size-12 del-specv" role="button"></i>'
				+'</div>';
		if($spec_value_null.length){
			$spec_value_null.focus();
			alertify.error(METLANG.app_shop_spec_input_tips1);
			return false;
		}
		$spec_value.append(html);
		var $new_specv=$spec_value.find('.spec-value-item:last-child input[name="value"]');
		$new_specv.focus();
		$('.spec-list-form').data('formValidation').addField('value');
		$.ajax({
            url: $spec_list.data('addspecv-url'),
            type: "POST",
            dataType:'json',
            data:{spec_id:$(this).parents('tr').find('[name="id"]').val(),specv_value:$new_specv.val()},
            success: function(result){
                metAjaxFun(result,function(){
                	$new_specv.parent().remove();
                },function(){
                	$new_specv.attr({'data-vid':result.data}).val('');
                });
            }
        });
	})
	// 编辑规格值
	$(document).on('change', '.spec-list tbody .spec-value-list input[name="value"]', function(event) {
		$.ajax({
            url: $spec_list.data('editspecv-url'),
            type: "POST",
            dataType:'json',
            data:{specv_id:$(this).attr('data-vid'),specv_value:$(this).val()},
            success: function(result){
                metAjaxFun(result);
            }
        });
	})
	// 删除规格值
	$(document).on('click', '.spec-list tbody .del-specv', function(event) {
		var $self=$(this);
        alertify.okBtn(METLANG.app_shop_ok).cancelBtn(METLANG.app_shop_cancel).confirm(METLANG.app_shop_deleteok, function (ev) {
			$.ajax({
	            url: $spec_list.data('delpecv-url'),
	            type: "POST",
	            dataType:'json',
	            data:{specv_id:$self.prev('input[name="value"]').attr('data-vid')},
	            success: function(result){
	                metAjaxFun(result,'',function(){
	                	$self.parent().remove();
	                });
	            }
	        });
        })
	});
})