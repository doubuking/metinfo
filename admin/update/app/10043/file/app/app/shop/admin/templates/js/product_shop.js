define(function(require, exports, module) {

	var $ = jQuery = require('jquery');
	var common = require('common');
	$(".ui-from").keypress(function(e) {
	  if (e.which == 13) {
		return false;
	  }
	});
	//增加规格
	function addstandard(spec){
		if($(".standard .panel").length<3){
			if(!$.isArray(spec)){
				if($('.standard .panel-heading[data-spec_id="'+spec+'"]').length){
					require.async(siteurl+'app/system/include/static2/vendor/alertify/alertify.js',function(a){
						alertify.error(METLANG.app_shop_goods_tips1);
					});
					return false;
				}
				var paraku = $.parseJSON($('textarea[name="paraku"]').val());
				$.each(paraku, function(index, val) {
					if(val.id==spec){
						spec=val;
						return false;
					}
				});
			}
			var html='<div class="panel panel-default">'+
					'<div class="panel-heading" data-title="'+spec.name+'" data-spec_id="'+spec.id+'">'+spec.name+'<span class="close" hidden>×</span></div>'+
					'<div class="panel-body">'+
						'<div class="option-list"></div>'+
						'<div class="dropdown" style="display: inline-block;">'+
						  	'<a href="javascript:;" class="dropdown-toggle option-list-add" data-toggle="dropdown">+'+METLANG.app_shop_goods_toadd+'</a>'+
						  	'<ul class="dropdown-menu">'+
						  		'<li class="parakulist"></li>'+
						  		'<li role="presentation" class="divider"></li>'+
						  		'<li><a href="javascript:;" data-toggle="modal" data-target=".specification-modal" class="para-set">'+METLANG.app_shop_goods_tips2+'</a></li></ul>'+
						'</div>'+
					'</div>'+
				'</div>';
			$(".para-add").before(html);
		}else{
			alert(METLANG.app_shop_goods_tips3);
		}
	}
	// 刷新规格库
	$('.paraku-refresh').click(function(event) {
		event.preventDefault();
		var $self=$(this);
		$self.addClass('met-laoding');
		$.ajax({
		   	url: $self.data('url'),
		   	type: "POST",
		   	dataType:'json',
		   	data:{ajax:1},
		   	success: function(result){
		   		$self.removeClass('met-laoding');
		   		require.async(siteurl+'app/system/include/static2/vendor/alertify/alertify.js',function(a){
		   			if(result.success){
		   				alertify.success(result.success);
						$('textarea[name="paraku"]').val(JSON.stringify(result.data));
						var html='';
						$.each(result.data, function(index, val) {
							html+='<a href="javascript:;" data-spec_id="'+val.id+'">'+val.name+'</a>';
						});
						$('.product_shop .para-add .existing').html(html);
			   		}else{
			   			alertify.error(result.error);
			   		}
				});
		   	}
		});
	});
	// 添加规格
	$(document).on('click','.existing a',function(){
		addstandard($(this).data('spec_id'));
	});
	// 删除规格
	$(document).on('click','dd.standard .panel-heading span.close',function(){
		$(this).parents('.panel:eq(0)').remove();
		paraChangeFun();
	});
	// 添加规格值-弹出规格值下拉框
	$(document).on('click', '.option-list-add', function(event) {
		var $option_list=$(this).parents('.dropdown').prev('.option-list');
			paraku = $('textarea[name="paraku"]').val(),
			spec_id=$(this).parents('.panel:eq(0)').find('.panel-heading').data('spec_id'),
			html=parakulist='';
		if(paraku!=''){
			var obj = $.parseJSON(paraku);
			$.each(obj, function(i, item){
				if(item.id==spec_id && item.value){
					$.each(item.value, function(index, val) {
						if(val['value']!='' && !$option_list.find('.option[data-id="'+val['vid']+'"]').length) parakulist += '<a href="javascript:;" data-vid="'+val['vid']+'" data-value="'+val['value']+'">'+val['value']
															// +'<button type="button" class="close"><span aria-hidden="true">×</span></button>'
															+'</a>';
					});
				}
			});
		}
		html=parakulist;
		$(this).next('.dropdown-menu').find('.parakulist').data('spec_id',spec_id).html(html);
	});
	// 规格增加值
	function addparaoption(obj,body){
		body.append('<span class="option" data-value="'+obj.data('value')+'" data-id="'+obj.data('vid')+'">'+obj.data('value')+'<span class="close" hidden>×</span></span>');
		paraChangeFun();
	}
	$(document).on('click','dd.standard .parakulist a',function(e){
		var body = $(this).parents(".panel-body:eq(0)").find(".option-list");
		addparaoption($(this),body);
	});
	//删除规格值
	$(document).on('click','dd.standard .option-list span.option span.close',function(){
		$(this).parent().remove();
		paraChangeFun();
	});
	// 库存数据更新后shop_plist更新
	$(document).on('change', '.stock [name]', function(event) {
		exports.standard_option();
	});
	// 商品库存
	function tdmore(s1,s2,s3,k){
		return '<td><input type="text" name="sku_price_'+s1+'_'+s2+'_'+s3+'" data-id="price" data-custom="valisnum($(this))" data-errortxt="'+METLANG.app_shop_goods_tips4+'" class="form-control"></td>'+
		'<td><input type="text" name="stock_num_'+s1+'_'+s2+'_'+s3+'" data-id="stock" class="form-control" data-required="1" data-errortxt="'+METLANG.app_shop_goods_tips4+'"></td>'+
		'<td class="text-center"><span class="sales">'+k+'</span><input type="hidden" name="sales_'+s1+'_'+s2+'_'+s3+'" value="'+k+'" data-id="sales"></td>'+
		'<td class="ftype_upload"><div class="fbox"><input name="para_img_'+s1+'_'+s2+'_'+s3+'" type="text" data-upload-type="doupimg" value="" data-id="para_img"/></div></td>';
	}
	function tablesynchro(){
		$('.stock dd').html(
			'<table class="table">'+
				  '<thead>'+
					'<tr>'+
					  '<th style="width:120px;">'+METLANG.app_shop_goods_table_row1+'</th>'+
					  '<th style="width:100px;">'+METLANG.app_shop_goods_table_row2+'</th>'+
					  '<th class="text-center">'+METLANG.app_shop_goods_table_row3+'</th>'+
					  '<th>'+METLANG.app_shop_goods_table_row4+'</th>'+
					'</tr>'+
				  '</thead>'+
				  '<tbody>'+
				  '</tbody>'+
				  '<tfoot>'+
				  '</tfoot>'+
			'</table>'
		);
		var list = $('dd.standard .panel'),
			table=$('.stock .table'),
			list1_value,list2_value,list3_value;
		if(list.length){
			$("input[name='price']").val('');
			$("input[name='stock']").val('').attr('readonly',true);
			$("dl.stock").removeAttr('hidden');
			list.each(function(i){
				var title = $(this).find(".panel-heading").data('title');
				if(i==0)list1_value = $(this).find('.option-list span.option');
				if(i==1)list2_value = $(this).find('.option-list span.option');
				if(i==2)list3_value = $(this).find('.option-list span.option');
				table.find("thead tr th:eq("+i+")").before('<th>'+title+'</th>');
			});
			var thlenth = table.find("thead tr th").length - 4,html='';
			//一级
			list1_value.each(function(s1){
				var vl_1 = $(this).data('value'),
					vl_1_id=parseInt($(this).data('id')),
					rowspan1,rowspan2;
				rowspan1 = list3_value&&list3_value.length?list3_value.length*list2_value.length:(list2_value&&list2_value.length?list2_value.length:1);
				rowspan2 = list3_value&&list3_value.length?list3_value.length:1;
				//二级
				if(list2_value&&list2_value.length){
					list2_value.each(function(s2){
						var vl_2 =  $(this).data('value'),
							vl_2_id =  parseInt($(this).data('id')),
							qz2='';
						if(s2==0){
							qz2 = '<td rowspan="'+rowspan1+'">'+vl_1+'</td>';
						}
						//三级
						if(list3_value&&list3_value.length){
							list3_value.each(function(s3){
								var vl_3 =  $(this).data('value'),
									vl_3_id =  parseInt($(this).data('id')),
									qz3='',
									met_standard=[vl_1_id,vl_2_id,vl_3_id];
									met_standard.sort();
									met_standard=JSON.stringify(met_standard);
								var input = '<input type="hidden" name="met_standard" value="'+met_standard+'">';
								if(s3==0){
									qz3 = qz2 + '<td rowspan="'+rowspan2+'">'+vl_2+'</td>';
								}
								html += '<tr>' + qz3 + '<td rowspan="1">'+vl_3+input+'</td>'+tdmore(s1,s2,s3,0);
							});
						}else{
							var met_standard=[vl_1_id,vl_2_id];
							met_standard.sort();
							met_standard=JSON.stringify(met_standard);
							var input = '<input type="hidden" name="met_standard" value="'+met_standard+'">';
							var qz3 = list.length>2?'<td rowspan="1"></td>':'';
							html += '<tr>' + qz2 + '<td rowspan="1">'+vl_2+input+'</td>'+qz3+tdmore(s1,s2,'',0);
						}
					});
				}else{
					var met_standard=[vl_1_id];
					met_standard=JSON.stringify(met_standard);
					var input = '<input type="hidden" name="met_standard" value="'+met_standard+'">';
					var qz2 = list.length>1?'<td rowspan="1"></td>':'';
					var qz3 = list.length>2?'<td rowspan="1"></td>':'';
					html += '<tr><td rowspan="1">'+vl_1+input+'</td>'+qz2+qz3+tdmore(s1,'','',0);
				}
			});
			var tfoot = '<tr>'+
					'<td colspan="7">'+
					'批量设置：'+
					'<a href="javascript:;" data-toggle="priceall">'+METLANG.app_shop_goods_price+'</a>'+
					'<a href="javascript:;" data-toggle="stockall" style="margin-left:5px;">'+METLANG.app_shop_goods_stock+'</a>'+
					'</td>'+
					'</tr>';
			table.find("tbody").html(html);
			table.find("tfoot").html(tfoot);
			//批量设置
			$('.stock a[data-toggle="priceall"],.stock a[data-toggle="stockall"]').popover({
				content:function(){
					return '<div class="form-inline">'+
						'<div class="form-group">'+
							'<input type="text" class="form-control input-sm" style="width:80px;">'+
						'</div>'+
						'<button type="button" class="btn btn-primary btn-sm" data-type="'+$(this).data('toggle')+'" style="margin-left:5px;">'+METLANG.app_shop_ok+'</button>'+
						'<button type="button" class="btn btn-default btn-sm" style="margin-left:5px;">'+METLANG.app_shop_cancel+'</button>'+
					'</div>';
				},
				html:true,
				placement:'bottom'
			});
		}else{
			$("input[name='price']").removeAttr('readonly');
			$("input[name='stock']").removeAttr('readonly');
			$("dl.stock").attr({hidden:''});
		}
	}
	//价格
	function price_focusout(my,price){
		if(my.val()!=''||price){
			if(price || price=='0')
			{
				var price = price;
			}else{
				var price = parseFloat(my.val());
			}
		var input = $('input[data-id="price"]'),price;
			my.val(price.toFixed(2));
			input.each(function(){
				var v = parseFloat($(this).val());
				price = v<price?v:price;
			});
			price = price.toFixed(2);
			$('input[name="price"]').val(price);
		}
	}
	$(document).on('focusout','input[data-id="price"]',function(){
		if($(this).val()!='')price_focusout($(this));
	});
	//库存
	function stock_focusout(val){
		var input = $('input[data-id="stock"]'),stock = 0;
		if(val||val=='0'){
			input.val(val);
			stock = input.length*val;
		}else{
			input.each(function(){
				if($(this).val()!='')stock = parseInt(stock + parseInt($(this).val()));
			});
		}
		$('input[name="stock"]').val(stock);
	}
	$(document).on('focusout','input[data-id="stock"]',function(){
		if($(this).val()!='')stock_focusout();
	});
	$(document).on('click','dl.stock tfoot button.btn-default',function(){
		$('dl.stock tfoot a[data-toggle]').popover('hide');
	});
	//批量设置
	$(document).on('click','dl.stock tfoot button.btn-primary',function(){
		var type = $(this).data('type'),val = $(this).parent().find("input").val();
		if(val!=''&&!isNaN(val)){
			if( type == 'priceall' )price_focusout($('input[data-id="price"]'),parseFloat(val));
			if( type == 'stockall' )stock_focusout(parseInt(val));
			$('dl.stock tfoot a[data-toggle]').popover('hide');
		}
	});
	/*价格*/
	function moneychange(my){
		if(my.val()!=''){
			var price = parseFloat(my.val());
				price = price.toFixed(2);
			my.val(price);
		}
	}
	$(document).on('focusout',"input[name='price'],input[name='original'],input[name='freight']",function(){
		moneychange($(this));
	});
	/*物流*/
	$(document).on('focus',"input[name='freight']",function(){
		$("input[name='freight_type'][value='2']").attr('checked',true);
	});
	$(document).on('change',"select[name='freight_mould']",function(){
		$("input[name='freight_type'][value='1']").attr('checked',true);
	});
	function refresh_freight_mould(my,type){
		my.addClass('met-laoding');
		$.ajax({
		   url: my.attr('href'),
		   type: "POST",
		   success: function(msg){
				$("select[name='freight_mould']").html(msg);
				my.removeClass('met-laoding');
				if(type)common.defaultoption(my.parent());
		   }
		});
	}
	$(document).on('click',".refresh_freight_mould",function(){
		refresh_freight_mould($(this));
		return false;
	});
	refresh_freight_mould($(".refresh_freight_mould"),1);
	/*留言*/
	var message_html = $("textarea[name='message_html']").val();
	$(".add_message").click(function(){
		$(this).before(message_html);
	});
	$(document).on('click','dd.message_list a.delete',function(){
		$(this).parents(".form-inline").remove();
	});
	function messagelist(){
		var messagelist = $("input[name='message_list']"),messagejson={};
		if(messagelist.length){
			messagelist.each(function(i){
				var name = $(this).val(),
					form=$(this).parents(".form-inline"),
					line=form.find("input[name='message_line']:checked").length?1:0,
					required=form.find("input[name='message_required']:checked").length?1:0;
				var	DateOption = { 'name':name, 'line':line, 'required':required};
				if(name!='')messagejson[i] = DateOption;
			});
			messagejson = JSON.stringify(messagejson, null, 2 );
			$("textarea[name='shop_message']").val(messagejson);
		}else{
			$("textarea[name='shop_message']").val('');
		}
	}
	// 规格初始化
	function paralist_ini(){
		var shop_paralist = $('textarea[name="shop_paralist"]').val();
		if(shop_paralist!=''){
			var obj = $.parseJSON(shop_paralist);
			if(obj.length){
				$.each(obj, function(i, item){
					addstandard(item.spec);
					var values = item.values,
						body = $("dd.standard .panel-heading[data-title='"+item.spec.name+"']").next().find(".option-list");
					$.each(values, function(index, val) {
						if(val!='') body.append('<span class="option" data-value="'+val['value']+'" data-id="'+val['id']+'">'+val['value']+'<span class="close" hidden>×</span></span>');
					});
				});
				tablesynchro();
			}
		}
	}
	// 当前商品规格对应的库存表格数据更新
	function plist_ini(){
		var shop_plist = $('textarea[name="shop_plist"]').val();
		if(shop_plist!=''){
			var obj = $.parseJSON(shop_plist);
			$.each(obj, function(i, item){
				var standard_valuelist=[];
				$.each(item.valuelist, function(s, val){
					standard_valuelist.push(parseInt(val.value_id));
				})
				standard_valuelist.sort();
				standard_valuelist=JSON.stringify(standard_valuelist);
				var d = $("input[name='met_standard'][value='"+standard_valuelist+"']");
				if(d.length){
					var price = d.parents('tr').find("input[data-id='price']"),
						sales = d.parents('tr').find("input[data-id='sales']"),
						salesspan = d.parents('tr').find("span.sales"),
						stock = d.parents('tr').find("input[data-id='stock']"),
						img = d.parents('tr').find("input[data-id='para_img']"),
						prices = parseFloat(item.price);
					prices = prices.toFixed(2);
					if(item.price!='') price.val(prices);
					sales.val(item.sales);
					salesspan.html(item.sales);
					stock.val(item.stock);
					img.val(item.para_img);
				}
			});
		}
		if($("dl.stock .table input[data-id='price']").length){
			price_focusout($('input[data-id="price"]:eq(0)'));
			stock_focusout();
		}
		if($('.product_shop .stock .table .ftype_upload').length && $('input[name=imgurl]').next('.picture-list').length){
			require.async('epl/upload/own.js',function(a){
				a.func($('.product_shop .stock .table'));
			});
		}
	}
	// 留言初始化
	function message_ini(){
		var shop_message = $("textarea[name='shop_message']").val();
		if(shop_message!=''){
			var obj = $.parseJSON(shop_message);
			$.each(obj, function(i, item){
				if(item.name!=''){
					$(".add_message").before(message_html);
					var d = $(".add_message").prev(),
						message = d.find("input[name='message_list']"),
						message_line=d.find("input[name='message_line']"),
						message_required=d.find("input[name='message_required']");
						message.val(item.name);
						if(item.line==1)message_line.attr('checked',true);
						if(item.required==1)message_required.attr('checked',true);
				}
			});
		}
	}
	// 当前商品规格数据shop_paralist更新
	function standard(){
		var paralist=$("dd.standard .panel");
		if(paralist.length){
			var parajson = [];
			paralist.each(function(i){
				var spec_id = $(this).find('.panel-heading').data('spec_id'),
					spec_name=$(this).find('.panel-heading').data('title'),
					$options=$(this).find(".option-list .option"),
					values=[];
				if($options.length){
					$options.each(function(index,val){
						var index_values={'id':$(this).data('id'),'spec_id':spec_id,'value':$(this).data('value'),'lang':lang};
						values.push(index_values);
					});
					var	DateOption = {'spec':{'id':spec_id,'name':spec_name,'lang':lang},'values':values};
					parajson.push(DateOption);
				}
			});
			parajson = JSON.stringify(parajson, null, 2 );
			$('textarea[name="shop_paralist"]').val(parajson);
		}else{
			$('textarea[name="shop_paralist"]').val('');
		}
	}
	/*当前商品规格对应数据shop_plist更新*/
	exports.standard_option=function(){
		var lists = $("input[name='met_standard']"),json=[];
		if(lists.length){
			var pid=$('.product_add input[name=id]').val(),
				shop_plist=$.parseJSON($('textarea[name="shop_plist"]').val()),
				shop_paralist=$.parseJSON($('textarea[name="shop_paralist"]').val());
			lists.each(function(i){
				var stock = $(this).parents('tr').find('input[data-id="stock"]').val(),
					sales = $(this).parents('tr').find('input[data-id="sales"]').val(),
					price = $(this).parents('tr').find('input[data-id="price"]').val(),
					para_img = $(this).parents('tr').find('input[data-id="para_img"]').val(),
					DateOption = {pid:pid,'price':price, 'stock':stock, 'sales':sales,'para_img':para_img,'lang':lang},
					valuelist=[],
					valuelist_array=$.parseJSON($(this).val());
				$.each(valuelist_array, function(index, val) {
					// 获取当前规格值在本商品规格组中的数据
					var vid_in_paralist='';
					$.each(shop_paralist[index]['values'], function(s, items) {
						if(items.id==val) vid_in_paralist=items;
					});
					// 组合商品规格数据值
					var value={'spec_id':shop_paralist[index]['spec']['id'].toString(),'specn':shop_paralist[index]['spec']['name'],'value_id':val.toString(),'specv':vid_in_paralist['value']};
					valuelist.push(value);
				});
				DateOption.valuelist=valuelist;
				for (var k in shop_plist) {
					if(JSON.stringify(shop_plist[k]['valuelist'])==JSON.stringify(valuelist)) DateOption.id=shop_plist[k]['id'];
				}
				if(typeof DateOption.id =='undefined') DateOption.id='';
				json.push(DateOption);
			});
			json = JSON.stringify(json, null, 2 );
			$('textarea[name="shop_plist"]').val(json);
		}else{
			$('textarea[name="shop_plist"]').val('');
		}
	}
	// 规格改变后通用处理
	function paraChangeFun(){
		tablesynchro();
		plist_ini();
		standard();
		exports.standard_option();
	}
	// 规格管理窗口加载页面
	$(document).on('show.bs.modal', '.specification-modal', function(event) {
		if(!$('iframe',this).attr('src')) $('iframe',this).attr({src:$('iframe',this).data('src')});
	});
	// 初始化
	paralist_ini();
	plist_ini();
	message_ini();
	// 保存时处理
	$(document).on('submit','.product_add',function(){
		standard();
		exports.standard_option();
		messagelist();
	});
});