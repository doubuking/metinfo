/**
 * 运费模板
 */
$(function(){
	// 面板初始化
	var options = $.extend({}, Plugin.getDefaults("slidePanel"), {
		template: function(options) {
			return '<div class="' + options.classes.base + ' ' + options.classes.base + '-' + options.direction + '">' +
			'<div class="' + options.classes.base + '-scrollable"><div>' +
			'<div class="' + options.classes.content + '"></div>' +
			'</div></div>' +
			'<div class="' + options.classes.base + '-handler"></div>' +
			'</div>';
		},
		afterLoad: function() {// 加载完成执行
			// 滚轴
			this.$panel.find('.' + this.options.classes.base + '-scrollable').asScrollable({
				namespace: 'scrollable',
				contentSelector: '>',
				containerSelector: '>'
			});
			zoneListAjaxFun(function(){
				freightEdit(options);// 编辑事件
			},true);
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

	// 设置地区-加载地区列表
	$(document).on('show.bs.modal', '.zone-editor', function(e) {
		zoneListHtml();
	});
	// 展开地区列表
	$(document).on('click', '.zone-editor .sitemap-list li>a', function(event) {
		if(!$(event.target).closest('.zone-btn .icon,.zone-btn .zone-add,.zone-btn .editable-container').length){
			if(parseInt($(this).data('zone_type'))){
				$(this).parents('.zone-editor .sitemap-list>li').siblings('li').find('ul').stop().slideUp();
				if($(this).next('ul').length){
					$(this).next('ul').stop().slideToggle();
				}else if($(this).parent('li').next('.sitemap-list-sub').length){
					$(this).parent('li').siblings('li').next('ul').stop().slideUp();
					$(this).parent('li').next('.sitemap-list-sub').stop().slideToggle();
				}
			}else if($(this).parent('li').siblings().length){
				$(this).parents('.sitemap-list').siblings('.sitemap-list').find('>li:gt(0)').slideUp().find('ul').slideUp();
				$(this).parent('li').siblings().slideToggle().find('ul').slideUp();
			}
		}
	});
	// 刷新地区列表
	$(document).on('click', '.zone-refresh', function(event) {
		metAlert(METLANG.app_shop_freight_tips4,0);
		$('.zone-editor .zone-loader').show();
		$('.zone-editor .zone-list').hide();
		$.ajax({
			url: $(this).data('url'),
			type: 'POST',
			dataType:'json',
			success: function(result) {
				metAlert(' ',10);
				metAjaxFun(result,'',function(){
					window.MET_ZONE=result.data;
					$('.freight-zone').attr({'data-update':1});
					zoneListHtml();
				})
			}
		})
	});
	// 编辑地区名称
	$(document).on('click', '.zone-editor .sitemap-list .zone-edit', function(event) {
		if(!$(this).hasClass('editable')){
			var $self=$(this);
			$(this).zoneEditor();
			setTimeout(function(){
				$self.editable('toggle');
			},0)
		}
	});
	// 添加国家、子地区弹框
	var $zone_add_modal=$('.zone-add-modal');
	$(document).on('click', '.zone-editor .sitemap-list li .zone-add,.zone-editor .zone-add-country', function(event) {
		var $add='',
			$parents_a=$(this).parents('a').eq(0),
			zone_type=$(this).hasClass('zone-add')?parseInt($parents_a.attr('data-zone_type')):parseInt($(this).attr('data-zone_type')),
			modal_title=(zone_type+1)?'【'+$parents_a.find('.zone-name').text()+'】'+METLANG.app_shop_freight_tips5:METLANG.app_shop_freight_country;
		$zone_add_modal.find('.modal-title span').html(modal_title);
		$zone_add_modal.modal().find('[name="znamearr"]').attr({'data-zone_type':zone_type}).val('');
		$zone_add_modal.find('[name="pid"]').val($(this).data('id'));
	});
	// 添加子地区提交显示提示
	$zone_add_modal.find('button[type="submit"]').click(function(event) {
		metAlert(METLANG.app_shop_freight_tips6,0);
	});
	// 添加子地区提交后处理
	validate[0].success(function(result,form){
		metAlert(' ',10);
		if(result.success){
			alertify.success(result.success);
			$zone_add_modal.modal('hide');
			var $znamearr=$zone_add_modal.find('[name="znamearr"]'),
				zone_type=parseInt($znamearr.attr('data-zone_type'))+1,
				pid=parseInt($zone_add_modal.find('[name="pid"]').val()),
				$zone_add=pid?$('.zone-editor .sitemap-list li .zone-add[data-id="'+pid+'"]'):$('.zone-editor .zone-add-country'),
				html='';
			$.each(result.data.insert_id, function(index, val) {
				var prev=zone_type?false:true,
					end=zone_type?false:true;
				html+=zoneSonsAdd(val,zone_type,prev,end);
			});
			if(html){
				zone_type--;
				if(pid){// 添加国家下的子地区
					var $parents_a=$zone_add.parents('a').eq(0),
						$parents=zone_type==1?$parents_a:$zone_add.parents('li').eq(0);
					if(zone_type && !$parents.next('ul').length){
						var $next_ul=zone_type==1?'<ul></ul>':'<ul class="sitemap-list-sub"></ul>';
						$parents.after($next_ul);
					}
					if(zone_type){
						$parents.next('ul').append(html);
					}else{
						$parents.parents('.sitemap-list').append(html);
					}
					// 触发下级地区展开
					var $next_show=zone_type?$parents.next('ul'):$parents.next('li');
					if(!$next_show.is(':visible')){
						$parents_a.click();
					}else if(!zone_type){
						$parents.parents('.sitemap-list').find('>li:last-child').show();
					}
					if(!$parents_a.find('>.wb-chevron-down').length) $parents_a.prepend('<i class="icon wb-chevron-down m-r-10" title="'+METLANG.app_shop_show_open+'"></i>');
					var $new_zone=zone_type?$parents.next('ul').find('>li:last-child'):$parents.parents('.sitemap-list').find('>li:last-child');
				}else{// 添加国家
					$('.zone-editor .zone-list').append(html);
					var $new_zone=$('.zone-editor .zone-list .sitemap-list:last-child');
				}
				setTimeout(function(){
					if($new_zone.offset().top>=$(window).height()+$('.zone-editor').scrollTop()-10) $('.zone-editor').scrollTop($new_zone.offset().top-50);
				},500)
			}
			// 地区列表json需要更新
			$('.freight-zone').attr({'data-update':1});
		}else if(result.error){
			alertify.error(result.error);
		}
	});
	// 推荐地区框关闭后body添加modal-open
	$(document).on('hidden.bs.modal', '.zone-add-modal', function(event) {
		$('body').addClass('modal-open');
	})
	// 删除地区
	$(document).on('click', '.zone-editor .sitemap-list li .zone-del', function(event) {
		var $self=$(this);
        alertify.okBtn(METLANG.app_shop_ok).cancelBtn(METLANG.app_shop_cancel).confirm(METLANG.app_shop_freight_tips7,function (ev){
			metAlert(METLANG.app_shop_deling,0);
			$.ajax({
				url: $('.zone-editor').data('del-url'),
				type: 'POST',
				dataType:'json',
				data:{zid:$self.attr('data-id')},
				success: function(result) {
					metAlert(' ',10);
					if(result.success){
						alertify.success(result.success);
						$self.parents('li').eq(0).remove();
						var zone_type=parseInt($self.parents('a').eq(0).data('zone_type')),
							$remove;
						if(!zone_type){
							$remove=$self.parents('.sitemap-list');
						}else if(zone_type<3){
							$remove=$self.parents('a').eq(0).next('ul');
						}else{
							$remove=$self.parents('li').eq(0).next('ul');
						}
						$remove.remove();
						// 地区列表json需要更新
						$('.freight-zone').attr({'data-update':1});
					}else if(result.error){
						alertify.error(result.error);
					}
				}
			})
		})
	})

	// 新增运费模板
	$('.freight-id').click(function() {
		loadPanel(options,$(this).data('url'));
	});
	// 编辑运费模板
	$(document).on('click', 'a.freight-edit', function(e) {
		e.preventDefault();
		var url=$('.freight-list').data('editor-url')+'&id='+$(this).data('id');
		loadPanel(options,url);
	});
	// 删除运费模板
	$(document).on('click', 'a.freight-del', function(e) {
		e.preventDefault();
		var id = $(this).data('id');
        alertify.okBtn(METLANG.app_shop_ok).cancelBtn(METLANG.app_shop_cancel).confirm(METLANG.app_shop_freight_tips8, function (ev) {
			$.ajax({
				url: $('.freight-list').data('del-url'),
				type: 'POST',
				dataType:'json',
				data:{id:id},
				success: function(result) {
					metAjaxFun(result,'',function(){
						showFreightList();
					});
				}
			});
		});
	});
	// 展开运费模板列表
	$(document).on('show.bs.collapse', '.freight-list .collapse', function(e) {
		var collapse = $(e.target),id = collapse.data('id');
		if(!collapse.data('zone')){
			collapse.find("tbody").html('<div class="loader loader-default"></div>');
			loadZoneList(id,function(json){
				var html = '';
				zoneListAjaxFun(function(){
					$.each(json, function(i, item){
						html += regionHtml(editZone(item.zone,true,true),item.first,item.freight,item.addp,item.renew);
					});
					collapse.find("tbody").html(html);
					collapse.attr("data-zone","true");
				},true);
			});
		}
	});
	showFreightList();
	// 配送区域增删改查
	// 新增
	$(document).on('click', '.newquyuselect', function(e) {
		addSelectoption();
	});
	// 全选
	$(document).on('click', '#selectall', function(e) {
		$('.multiselect-zone').multiSelect('select_all');
	});
	// 清除
	$(document).on('click', '#deselectall', function(e) {
		$('.multiselect-zone').multiSelect('deselect_all');
	});
	// 保存
	$('.quyuselect button[type=submit]').click(function(event) {
		var zone = $('.multiselect-zone').val();
		if(zone){
			if($('input[name=zoneid]').val()!=''){
				var put = $(".editor-region tbody td .zoneinput[data-id='"+$('input[name=zoneid]').val()+"']");
				put.val(JSON.stringify(editZone(zone,'','',true)));
				put.prev('span').html(editZone(zone,true));
			}else{
				addregion(zone,1,0,1,0);
			}
			$(".quyuselect").modal('hide');
		}
	});
	// 选择器
	$('[data-plugin=multiSelect]').multiSelect({
		selectableHeader:'<p>'+METLANG.app_shop_select_able+'</p>',
		selectionHeader:'<p>'+METLANG.app_shop_selected+'</p>',
		selectableFooter:'<a href="javascript:void(0)" class="btn btn-squared btn-block btn-primary" id="selectall">'+METLANG.app_shop_select_all+'</a>',
		selectionFooter:'<a href="javascript:void(0)" class="btn btn-squared btn-block btn-primary" id="deselectall">'+METLANG.app_shop_clear+'</a>'
	});
	// 编辑
	$(document).on('click', '.editor-region .region-edit', function(e) {
		var put= $(this).parents('td').find('.zoneinput'),
			id = put.data('id'),
			op = $.parseJSON(put.val());
		$(".quyuselect").modal('show');
		addSelectoption(id,op);
	});
	// 删除
	$(document).on('click', '.editor-region .region-del', function(e) {
		var tr = $(this).parents('tr');
        alertify.okBtn(METLANG.app_shop_ok).cancelBtn(METLANG.app_shop_cancel).confirm(METLANG.app_shop_deleteok, function (ev) {
			tr.remove();
		});
	});
});
// 新增区域
function addregion(zone,first,freight,addp,renew){
	if(typeof(regionnum) == "undefined") window.regionnum = 0;
	var zone = typeof zone =='string'?editZone(zone,'',true):editZone(zone),
		first = '<input type="text" name="first[]" class="form-control" value="'+first+'">',
		freight = '<input type="text" name="freight[]" class="form-control" value="'+freight+'">',
		addp = '<input type="text" name="addp[]" class="form-control" value="'+addp+'">',
		renew = '<input type="text" name="renew[]" class="form-control" value="'+renew+'">';
		$(".editor-region tbody").append(regionHtml(zone,first,freight,addp,renew));
		regionnum++;
}
// 可编辑的
function editZone(zone,get_zone_html,zone_is_json_str,get_zone_array){
	var zone_html='',
		zone_array={};
	if(zone_is_json_str){
		zone_array=$.parseJSON(zone);
	}else{
		$.each(zone, function(index, val) {
			var vals=val.split('-');
			vals[0]=parseInt(vals[0]);
			vals[1]=parseInt(vals[1]);
			if(typeof zone_array[vals[0]] == 'undefined') zone_array[vals[0]]=[];
			zone_array[vals[0]].push(vals[1]);
		})
	}
	if(get_zone_array) return zone_array;
	$.each(zone_array, function(index, val) {
		$.each(MET_ZONE, function(i, item) {
			if(item.id==index){
				zone_html+=item.name+'：';
				$.each(val, function(j, value) {
					$.each(item.children, function(s, values) {
						if(values.id==value){
							zone_html+=j?'，'+values.name:values.name;
							return false;
						}
					})
				})
				zone_html+='。';
				return false;
			}
		});
	});
	if(get_zone_html){
		return zone_html;
	}else{
		return '<div class="pull-xs-right"><a href="javascript:void(0)" class="icon wb-edit region-edit m-l-10"></a>'+'<a href="javascript:void(0)" class="icon wb-close region-del m-l-10"></a></div>'+'<span>'+zone_html+'</span><textarea hidden name="zone[]" data-id="'+regionnum+'" class="zoneinput">'+JSON.stringify(zone_array)+'</textarea>';
	}
}
// 获取区域选项
function addSelectoption(id,zone_val){
	// 运费模板加载选择地区列表
	var $multiselect_zone = $('.multiselect-zone'),
		nozone = '';
	// 同一模板下添加新的运费时排除已设置运费的配送区域
	$(".editor-region tbody .zoneinput").each(function(){
		var this_nozone=$.parseJSON($(this).val());
		if(nozone){
			for (var index in this_nozone) {
				if (nozone[index]) {
					for (var i in this_nozone[index]) {
						if ($.inArray(this_nozone[index][i], nozone[index])<0) nozone[index].push(this_nozone[index][i]);
					}
				}else{
					nozone[index]=this_nozone[index];
				}
			}
		}else{
			nozone=this_nozone;
		}
	});
	// 加载可选择的配送区域
	var html = '';
	$.each(MET_ZONE, function(i, item){
		html+='<optgroup label="'+item.name+'">';
		$.each(item.children, function(s, value){
			var is_add = true;
			if(nozone){
				$.each(nozone[item.id], function(index, val) {
					if (val==value.id) {
						is_add = false;
						return false;
					}
				})
			}
			if(is_add) html+='<option value="'+item.id+'-'+value.id+'">'+value.name+'</option>';
		})
        html+='</optgroup>';
	});
	$multiselect_zone.html(html);
	if(html.indexOf('option')==-1){
		alertify.error('已无可选区域');
		$(".quyuselect").modal('hide');
	}else{
		$multiselect_zone.multiSelect('refresh');
		$(".quyuselect input[name=zoneid]").val('');
		// 选中已添加的配送区域
		if(zone_val){
			$(".quyuselect input[name=zoneid]").val(id);
			var zone_val_array=[];
			$.each(zone_val, function(index1, val1) {
				$.each(val1, function(index2, val2) {
					zone_val_array.push(index1+'-'+val2);
				})
			})
			$multiselect_zone.multiSelect('select', zone_val_array);
		}
	}
}
// 区域html
function regionHtml(zone,first,freight,addp,renew){
	return '<tr>'+
				'<td>'+zone+'</td>'+
				'<td>'+first+'</td>'+
				'<td>'+freight+'</td>'+
				'<td>'+addp+'</td>'+
				'<td>'+renew+'</td>'+
			'</tr>';
}
// 编辑页
function freightEdit(options){
	// 载入区域列表
	var id = $(".zone-form input[name='id']").val();
	if(id!=''){
		$(".editor-region tbody").html('<div class="loader loader-default"></div>');
		loadZoneList(id,function(json){
			$(".editor-region tbody").html('');
			$.each(json, function(i, item){
				addregion(item.zone,item.first,item.freight,item.addp,item.renew);
			});
		});
	}
	// 保存运费模板
	var zone_form_validate=$('.zone-form').validation();
	zone_form_validate.success(function(e,form){
		if($("[name='zone[]']").length){
			zone_form_validate.formDataAjax(e,function(result,form){
				metAjaxFun(result,'',function(){
					showFreightList();
					$.slidePanel.hide();
				});
			});
		}else{
			alertify.error(METLANG.app_shop_freight_set_distr_area);
			$(".editor-btn").removeAttr("disabled").removeClass("disabled");
		}
		return false;
	},false);
}
// 共用方法
// 加载面板
function loadPanel(options,url){
	var url = url;
	$.slidePanel.show({
		url: url,
		settings: {
			cache: false
		}
	}, options);
}
// 刷新运费列表
function showFreightList(){
	$(".freight-list").html('<div class="loader loader-default"></div>');
	$.ajax({
		url: M['url']['own_form'] + 'a=dojson_freight_list',
		cache: false,
		type: 'POST',
		dataType:'json',
		success: function(json) {
			var html = '';
			$.each(json, function(i, item){
				html += '<li class="list-group-item">'+
							'<div class="freight-action">'+
								'<a class="icon wb-edit freight-edit" data-id="'+item.id+'"></a>'+
								'<a class="icon wb-close freight-del" data-id="'+item.id+'"></a>'+
							'</div>'+
							'<h3 class="list-title bg-blue-grey-100" data-toggle="collapse" onselectstart="return false;" style="-moz-user-select:none;" data-target="#freight_'+item.id+'">'+
							item.name+
							'</h3>'+
							'<div class="collapse" id="freight_'+item.id+'" data-id="'+item.id+'">'+
								'<div class="well m-b-0">'+
									'<div class="table-responsive">'+
										'<table class="table">'+
											'<thead><tr>'+
											'<th>'+METLANG.app_shop_freight_table_row1+'</th><th>'+METLANG.app_shop_freight_table_row2+'</th><th>'+METLANG.app_shop_freight_table_row3+'</th><th>'+METLANG.app_shop_freight_table_row4+'</th><th>'+METLANG.app_shop_freight_table_row5+'</th>'+
											'</tr></thead>'+
											'<tbody></tbody>'+
										'</table>'+
									'</div>'+
								'</div>'+
							'</div>'+
						'</li>';
			});
			$(".freight-list").html(html);
		}
	});
}
// 规则数据
function loadZoneList(id,func){
	$.ajax({
		url: M['url']['own_form'] + 'a=dojson_zone_list',
		cache: false,
		type: 'POST',
		dataType:'json',
		data:{id:id},
		success: function(json) {
			func(json);
		}
	});
}
// 修改、添加地区
$.fn.zoneEditor=function(){
	var $self=$(this),
		$zone_name=$(this).parents('a').eq(0).find('.zone-name');
	$self.editable({
		url: $('.zone-editor').data('editor-url'),
		mode:'inline',
		pk:1,
		value:$zone_name.text(),
		params: function(params) {
			params.zid=$self.attr('data-id');
		    params.zname=params.value;
		    return params;
		},
		ajaxOptions: {
			dataType: 'json'
		},
		success: function(result) {
			if(result.success){
				alertify.success(result.success);
			}else if(result.error){
				alertify.error(result.error);
			}
			setTimeout(function(){
				$zone_name.text($self.text());
				$self.html('');
				$('.freight-zone').attr({'data-update':1});
			},0)
		}
	});
	$self.html('');
};
// 加载地区列表后回调
function zoneListAjaxFun(func,ajax_true){
	if(typeof MET_ZONE =='undefined' || (ajax_true && parseInt($('.freight-zone').attr('data-update')))){
		$.ajax({
			url: $('.freight-zone').data('url'),
			type: 'POST',
			dataType:'json',
			success: function(result) {
				window.MET_ZONE=result;
				$('.freight-zone').attr({'data-update':0});
				if(typeof func =='function') func();
			}
		});
	}else{
		if(typeof func =='function') func();
	}
}
// 添加地区html
function zoneSonsAdd(item,zone_type,prev,end){
	var zone_type=typeof zone_type !='undefined'?zone_type:parseInt(item.level),
		a_class=zone_type?'':' bg-blue-grey-300',
		zone_name_class=zone_type?'':' font-size-20',
		ul_class=zone_type?(zone_type==3?'sitemap-list-sub':''):'sitemap-list m-t-10 m-b-0',
		html='';
	if(prev) html+='<ul class="'+ul_class+'">';
	html+='<li>'
			+'<a class="block'+a_class+'" data-zone_type="'+zone_type+'">';
	if(typeof item.children !='undefined' && item.children.length) html+='<i class="icon wb-chevron-down m-r-10" title="'+METLANG.app_shop_show_open+'"></i>';
			html+='<span class="zone-name'+zone_name_class+'">'+item.name+'</span>'
				+'<div class="zone-btn">'
					+'<i class="icon wb-pencil m-l-5 p-x-5 zone-edit" title="'+METLANG.app_shop_show_modify+'" data-id="'+item.id+'"></i>';
	if(zone_type<3) html+='<i class="icon wb-plus p-x-5 zone-add" title="'+METLANG.app_shop_freight_add_subarea+'" data-id="'+item.id+'"></i>'
				html+='<i class="icon wb-close p-x-5 zone-del" title="'+METLANG.app_shop_del+'" data-id="'+item.id+'"></i>'
				+'</div>'
			+'</a>';
	if(zone_type!=1 || end) html+='</li>';
	if(end) html+='</ul>';

	return html;
}
// 渲染地区列表
function zoneListHtml(){
	if(!$('.zone-editor .zone-list .sitemap-list').length || parseInt($('.freight-zone').attr('data-update'))){
		$('.freight-zone').attr({'data-update':0});
		$('.zone-editor .zone-loader').show();
		$('.zone-editor .zone-list').hide();
		zoneListAjaxFun(function(){
			// 加载地区列表
			var html='';
			$.each(MET_ZONE, function(index0, val0) {
				html+='<ul class="sitemap-list m-t-10 m-b-0">'
						+zoneSonsAdd(val0);
				if(val0['children'].length){
					$.each(val0['children'], function(index1, val1) {
						html+=zoneSonsAdd(val1);
						if(val1['children'].length){
							html+='<ul>';
							$.each(val1['children'], function(index2, val2) {
								html+=zoneSonsAdd(val2);
								if(val2['children'].length){
									html+='<ul class="sitemap-list-sub">';
									$.each(val2['children'], function(index3, val3) {
										html+=zoneSonsAdd(val3);
									})
									html+='</ul>';
								}
							})
							html+='</ul>';
						}
						html+='</li>';
					})
				}
				html+='</ul>';
			})
			$('.zone-editor .zone-loader').hide();
			$('.zone-editor .zone-list').html(html).show();
		})
	}
}