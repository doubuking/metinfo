/**
 * 订单列表
 */
$(function(){
	// 面板初始化
	var options = $.extend({},Plugin.getDefaults("slidePanel"),{
		template: function(options){
			return '<div class="' + options.classes.base + ' ' + options.classes.base + '-' + options.direction + '">' +
			'<div class="' + options.classes.base + '-scrollable"><div>' +
			'<div class="' + options.classes.content + '"></div>' +
			'</div></div>' +
			'<div class="' + options.classes.base + '-handler"></div>' +
			'</div>';
		},
		beforeLoad:function(){
			if($('.logistics-list').length) $('.logistics-list').asScrollable('destory');
			if($('.btn-logistics-track').length) $('.btn-logistics-track').webuiPopover('destroy');
		},
		afterLoad: function(){// 加载完成执行
			// 滚轴
			this.$panel.find('.' + this.options.classes.base + '-scrollable').asScrollable({
				namespace: 'scrollable',
				contentSelector: '>',
				containerSelector: '>'
			});
			// 订单编辑事件
			order_edit(options);
		},
		beforeHide:function(){
			if($('.logistics-list').length) $('.logistics-list').asScrollable('destory');
			if($('.btn-logistics-track').length) $('.btn-logistics-track').webuiPopover('destroy');
		},
		contentFilter: function(t, e) {// 处理返回的数据
            if(t.indexOf('DOCTYPE')>=0){// 如果此时未登录返回登录页面
            	var slidepanel_h=$('.slidePanel-scrollable').height();
            	return '<div class="vertical-align text-xs-center" style="height:'+slidepanel_h+'px;"><div class="vertical-align-middle font-size-20">'+METLANG.app_shop_login_tips1+' <a href="'+M['url']['basepath']+'" target="_blank">'+METLANG.app_shop_login_tips2+'</a>'+METLANG.app_shop_login_tips3+'</div></div>';
            }else{
            	return t;
            }
        }
	});
	var $input_date=$('.moreseach .input-daterange input');
	$input_date.val('');// 时间筛选参数还原
	// 通过锚点获取所需优惠券状态
	var hash=location.hash?location.hash:'';
	hash=hash.replace('#state_','');
	$hash=$('#order-state-seach a[data-state="'+hash+'"]');
 	$hash.addClass('active');
 	if(hash) $('input[name="state"]').val($hash.data('state'));
	window.datatable=[];
	datatable[0]=$('#order-list').DataTable(datatableOption($('#order-list')));
	// 订单列表页
	// 去除 tabindex
	$(document).on( 'init.dt',function (e,settings,json){
		orderStateNum();// 订单导航栏状态数量更新
		var api = new $.fn.dataTable.Api( settings );
		api.on( 'draw.dt',function ( e,settings,json ){
			orderStateNum();// 订单导航栏状态数量更新
		});
	});
	// 表格列表点击展开面板
	var mouse_x=mouse_y='';
    $(document).on('mousedown','table.table tbody tr',function(){
       	mouse_x=event.screenX;
       	mouse_y=event.screenY;
       	$self=$(this);
    }).mouseup(function(){
        var mouse_x1=event.screenX,
        	mouse_y1=event.screenY;
        if(mouse_x1==mouse_x && mouse_y1==mouse_y){
        	if($self.find(".slidepanel_box").length){
				$self.addClass('active').siblings('tr').removeClass('active');
				loadPanel(options,$self.find(".slidepanel_box").data("url"));
			}
        }
    });
	// 订单状态查询
	$('#order-state-seach a').click(function(){
		$('input[name="state"]').val($(this).attr('data-state'));
		datatable[0].ajax.reload();
		$.slidePanel.hide();
		location.hash=$(this).attr('data-state')!=''?'state_'+$(this).data('state'):'';
	});
	// 数据筛选
	$(document).on('change',"[data-table-search]",function(){
		$input_date.each(function(index, el) {
			if($(this).val()!='') $(this).attr({'data-value':$(this).val()});
		});
		$.slidePanel.hide();
	})
	// 筛选列表首次展开初始化
	$('.btn-moreseach').one('click',function(){
		$('.export-list label').each(function(index){
			var id='export-option'+index;
			$(this).wrapAll('<li class="list-inline-item m-0 m-t-5"><div class="checkbox-custom checkbox-primary m-0"></div></li>').before('<input type="checkbox">').attr({for:id}).prev('input').attr({id:id,name:'export-option',checked:true}).val(index);
		});
		exportOptionComb();
	});
	// 时间段筛选
	$('.btn-moreseach').click(function(){
		if($('.moreseach').is(':visible')){
			$input_date.val('');
		}else{
			$input_date.each(function(index, el) {
				$(this).val($(this).attr('data-value'));
			});
		}
		datatable[0].ajax.reload();
	});
	// 导出选项值更新
	$(document).on('change',".export-list li input[name=export-option]",function(){
		exportOptionComb();
	})

	// 订单详情页
	// 备注
	$(document).on('click','.edit-remark-btn',function(e){
		e.stopPropagation();
		e.preventDefault();
		$('.edit-remark').editable('toggle');
		$(this).hide();
	});
	// 备注按钮显示隐藏
	$(document).on('click','.edit-remark',function(){
		$('.edit-remark-btn').hide();
		return false;
	});
	$(document).on('click',function(e){
	    if ($(e.target).closest(".editableform").length == 0){
	    	if($('.editableform').length) $('.edit-remark-btn').show();
	    }
	})
	$(document).on('click','.editable-submit,.editable-cancel',function(){
		setTimeout(function(){
			if($('.edit-remark-btn').is(':hidden')) $('.edit-remark-btn').show();
		},200)
	});
	// 改价
	$(document).on('click','.edit-price-btn',function(e){
		e.stopPropagation();
		e.preventDefault();
		$('.edit-price').click();
	});
	// 改价弹窗
	$(document).on('submit', '#price-editable', function(event) {
		event.preventDefault();
		var url=$(this).attr('action'),
			$editable_input=$('.editable-input input',this),
			value=$editable_input.attr('value'),
			values=$editable_input.val();
		if(values){
			if(value!=values){
				$.ajax({
					url: url,
					type: 'POST',
					dataType: 'json',
					data: {cprice: values},
					success: function(result){
						ajax_success(result,options);
					}
				})
			}
			$('.edit-price').click();
		}else{
			$editable_input.focus();
		}
	});
	$(document).on('click', '#price-editable .editable-clear-x', function() {
		$('#price-editable .editable-input input').val('').focus();
		$(this).hide();
	});
	$(document).on('input', '#price-editable .editable-input input', function() {
		if($(this).val()){
			$('#price-editable .editable-clear-x').show();
		}else{
			$('#price-editable .editable-clear-x').hide();
		}
	});
	$(document).on('click','body',function(e) {
		var _target = $(e.target);
	    if (_target.closest(".price-popover").length == 0 && _target.closest(".edit-price").length == 0) {
	        if($('.price-popover').is(':visible')) $('.edit-price').click();
	    }
	})
	// 关闭订单、订单完成、退款完成、拒绝退换货
	$(document).on('click','.edit-close-btn,.complete-btn,.refuse-refund-btn,.refund-complete-btn',function(e){
		var url = $(this).data('url');
        alertify.okBtn(METLANG.app_shop_ok).cancelBtn(METLANG.app_shop_cancel).confirm($(this).data('confirm'),function (ev){
			$.post(url,function(result){
				ajax_success(result,options);
			},'json');
		});
	});
	// 是否需要物流
	$(document).on('change','input[name="is_wuliu"]',function(e){
		wuliu($(this).val());
	});
});
// 订单编辑
function order_edit(options){
	$('.metshop-oder-page input[data-checked]').metRadioCheckboxChecked();
	// 底部按钮框位置绝对定位
	$('.metshop-oder-page').parent().next('.metshop-oder-page-btn').remove();
	if($('.metshop-oder-page-btn .btn').length){
		$('.metshop-oder-page').parent().after($('.metshop-oder-page-btn'));
	}else{
		$('.metshop-oder-page>.page-content').removeClass('p-b-50');
		$('.metshop-oder-page-btn').remove();
	}
	// 备注
	var $remark = $('.edit-remark');
	$remark.editable({
		url: $remark.data('url'),
		type: 'textarea',
		pk: 1,
		name: 'remark',
		emptytext:'',
		mode:'inline',
		ajaxOptions: {
			dataType: 'json'
		},
		success: function(result,newValue){
			alertify.success(result.success);
			$('.edit-remark-btn').show();
			// datatable.row().draw(false);
		}
	});
	// 改价
	if($('.edit-price-btn').length){
		var price = $('.edit-price'),
			value = $('.edit-price').html();
			value_1 = value.replace("-","");
			value_1 = value_1.substr(0,1);
			if(isNaN(value_1)){
				value = value.replace(/\s+/g,"");
				value = value.substr(1);
			}else{
				value = parseFloat(value);
			}
		price.addClass("editable editable-click").popover({
			content:function(){
				return '<form class="form-inline editableform" id="price-editable" action="'+price.data('url')+'">'
						+'<div class="control-group form-group">'
							+'<div>'
								+'<div class="editable-input" style="position: relative;">'
									+'<input type="text" class="form-control input-sm" value="'+value+'" style="height: 32px;padding-right: 24px;">'
									+'<span class="editable-clear-x" style="cursor: pointer;"></span>'
								+'</div>'
								+'<div class="editable-buttons">'
									+'<button type="submit" class="btn btn-primary btn-sm editable-submit"> <i class="glyphicon glyphicon-ok"></i>'
									+'</button>'
									+'<button class="btn btn-default btn-sm editable-cancel"> <i class="glyphicon glyphicon-remove"></i>'
									+'</button>'
								+'</div>'
							+'</div>'
						+'</div>'
					+'</form>';
			},
			html:true,
			placement:'top',
			title:METLANG.app_shop_js_tips2,
			template:'<div class="popover editable-container editable-popup price-popover" role="tooltip"><div class="popover-arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
		}).on('show.bs.popover', function () {
			setTimeout(function(){
				$('#price-editable .editable-input input').focus();
			},0)
		});
	}
	// 发货
	if($("#edit-send").length){
		// 加载物流公司数据
		$.get(M['url']['own_tem']+'js/logistics_company_'+M['lang']+'.json', function(json) {
			if(json){
				var html='';
				$.each(json, function(index, val) {
					html+='<optgroup label="'+index+'">';
					$.each(val, function(index1, val1) {
						html+='<option value="'+val1+'">'+val1+'</option>';
					})
					html+='</optgroup>';
				});
				if(html) $('#send-info-body select[name="cinfo"]').append(html);
				// 选择物流及发货提交验证
				$.include(M['plugin']['select2'],function(){
					$('[data-plugin=select2]').select2({width: "style"});
					wuliu($('input[name="is_wuliu"]:checked').val());
					var edit_send_validate=$('#edit-send').validation();
					edit_send_validate.success(function(e,form){
						if(!form.find('[name="cinfo"]:eq(1)').val()) form.find('[name="cinfo"]:eq(1)').val(form.find('[name="cinfo"]:eq(0)').val());
						edit_send_validate.formDataAjax(e,function(result,form){
							if(result.error){
								alertify.error(result.error);
								$("#edit-send-submit").removeAttr("disabled").removeClass("disabled");
							}else if(result.success){
								ajax_success(result,options);
							}
						})
						return false;
					},false);
				});
			}
		});
	}
	logisticsShow('.btn-logistics-track');
	// 商家留言
	var refund_validate=$('.refund-info').validation();
	refund_validate.success(function(result,form){
		if(result.error){
			alertify.error(result.error);
		}else if(result.success){
			ajax_success(result,options);
		}
	});
	// 商家买家留言沟通滚动条
	if($('.slidePanel .comments').length){
		$('.slidePanel .comments').asScrollable({
			namespace: "scrollable",
			contentSelector: '>',
			containerSelector: '>'
		});
		$('.slidePanel .reason-detail-imgs [data-original]').lazyload({container:'.reason-detail-imgs [data-role="container"]'});
	}
}
// 处理成功刷新表格和面板
function ajax_success(result,options){
	alertify.success(result.success);
	loadPanel(options);
	datatable[0].row().draw(false);
}
// 是否需要物流
function wuliu(val){
	if(val==1){
		$('#send-info-body').collapse('show');
	}else{
		$('#send-info-body').collapse('hide');
		$('#edit-send-submit').removeAttr('disabled');
		$('#edit-send-submit').removeClass('disabled');
	}
}
// 订单导航栏状态数量更新
function orderStateNum(){
	var state_array=datatable[0].ajax.json().state;
	$('#order-state-seach a').each(function(index, el) {
		state=$(this).data('state');
		$('span',this).html('（'+state_array[state]+'）');
	});
}
// 加载面板
function loadPanel(options,url){
	var url = url?url:$(".metshop-oder-page-btn").data('gourl');
	$.slidePanel.show({
		url: url,
		settings: {
			cache: false
		}
	},options);
}
// 导出选项组合
function exportOptionComb(){
	// 导出选项组成字符串
	var export_val='';
	$('.export-list li input[name=export-option]').each(function(){
		if($(this).is(':checked')){
			export_val+=String($(this).val())+',';
		}
	});
	export_val=export_val.substring(0,export_val.length-1);
	$('.moreseach input[name=export]').val(export_val);
}
// 展开物流信息
function logisticsShow(obj){
	var webuip_w=500,
		ajax_ok=true,
		logisticsListGotop=function(){
			if($('.logistics-list').length) $('.logistics-tracks-popover .scrollable-bar-handle').css({transform:'translate3d(0, 0, 0)'});
		};
	Breakpoints.on('xs',{
        enter:function(){
        	webuip_w=$('.metshop-oder-page .panel').width();
    	}
	})
	$(obj).webuiPopover({
		onShow: function() {
			if(ajax_ok){
				$.ajax({
					url: $(obj).attr('href'),
					type: 'POST',
					data:{order_id:$('#orderid').text(),tracking_no:$('#oinfo').text()},
					dataType: 'json',
					success: function(data){
						var html='<div class="logistics-list" data-plugin="scrollable"><div data-role="container"><div data-role="content">',
							status=parseInt(data.status);
						if(status){
							html+='<div class="font-size-20 text-xs-center" style="height:380px;line-height:380px;">';
							switch (status){
					            case 201:
					                html+=data.msg;
					                break;
					            case 202:
					            	var dobuy_url=$(obj).data('dobuy');
					                html+=METLANG.app_shop_freight_package_tips1+' <a href="'+dobuy_url+'" class="red-600" target="_blank">'+METLANG.app_shop_freight_package_tips2+'</a>';
					                break;
				                case 205:
					                html+=data.msg;
					                break;
				                case 207:
					                html+=data.msg;
									break;
								default:
									html+=data.msg;
									break;
					        }
					        html+='</div>';
					    }else{
				        	$.each(data.result.list,function(index,val){
								html+='<li><p>'+val.status+'<br /><span>'+val.time+'</span></p></li>';
							});
				        }
				        html+='</div></div></div>';
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
				})
			}else{
				logisticsListGotop();
			}
		},
		container:'.btn-logistics-parent',
		width:webuip_w
	});
}
