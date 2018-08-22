/*!
 * M['weburl']           网站网址
 * M['lang']             网站语言
 * M['tem']              模板目录路径
 * M['user_name']        页面登录用户名
 * met_prevarrow,
   met_nextarrow         slick插件翻页按钮自定义html
 * M['device_type']      客户端判断（d：PC端，t：平板端，m：手机端）
 * M['n']                当前模块名称
 * M['c']                当前类
 * M['a']                当前方法
 * M['langtxt']          当前语言文字
 * M['langset']          当前后台语言
 * M['anyid']            当前模块id
 * M['met_editor']       当前系统编辑器名称
 * M['met_keywords']     页面关键词
 * M['url']['admin']     后台文件夹路径
 * M['url']['static']
 * M['url']['static_vendor']
 * M['url']['static2']
 * M['url']['static2_vendor']
 * M['url']['static2_plugin']
 * M['url']['uiv2']      模板框架v2路径
 * M['url']['uiv2_css']
 * M['url']['uiv2_js']
 * M['url']['app']       应用文件夹路径
 * M['url']['pub']       后台模块公用文件夹路径
 * M['url']['epl']       后台模块公用示例文件夹路径
 * M['url']['ui']        应用前后台公用UI文件app/system/include/piblic/ui/里面
 * M['url']['own_form']  当前页面程序地址
 * M['url']['own_name']  当前模块地址
 * M['url']['own']       当前模块后台路径
 * M['url']['own_tem']   当前页面模板路径
 * M['url']['api']       app站点地址
 * M['url']['editor']    当前编辑器应用文件夹路径
 */
$(function(){
	M['plugin']['chartist']=[
		M['url']['static2_vendor']+'chartist/chartist.min.css',
	    M['url']['static2_vendor']+'chartist/chartist.min.js',
	    M['url']['static2_vendor']+'chartist-plugin-tooltip/chartist-plugin-tooltip.min.css',
	    M['url']['static2_vendor']+'chartist-plugin-tooltip/chartist-plugin-tooltip.min.js'
	];
	M['plugin']['glyphicons']=M['url']['static2']+'fonts/glyphicons/glyphicons.min.css';
	M['plugin']['slidepanel']=[
		M['url']['static2_vendor']+'slidepanel/slidePanel.min.css',
	    M['url']['static2_vendor']+'slidepanel/jquery-slidePanel.min.js',
	    M['url']['static2_plugin']+'slidepanel.min.js'
	];
	M['plugin']['x_editable']=[
		M['url']['static2_vendor']+'x-editable/x-editable.min.css',
	    M['url']['static2_vendor']+'x-editable/bootstrap-editable.min.js',
	    M['url']['static2_vendor']+'x-editable/address.min.js'
	];
	M['plugin']['webuipopover']=[
		M['url']['static2_vendor']+'webui-popover/webui-popover.min.css',
	    M['url']['static2_vendor']+'webui-popover/jquery.webui-popover.min.js'
	];
	M['plugin']['datepicker']=[
		M['url']['static2_vendor']+'bootstrap-datepicker/bootstrap-datepicker.min.css',
	    M['url']['static2_vendor']+'bootstrap-datepicker/bootstrap-datepicker.min.js',
	    M['url']['static2_plugin']+'bootstrap-datepicker.min.js'
	];
	M['plugin']['select2']=[
		M['url']['static2_vendor']+'select2/select2.min.css',
	    M['url']['static2_vendor']+'select2/select2.full.min.js'
	];
	M['plugin']['clockpicker']=[
		M['url']['static2_vendor']+'clockpicker/clockpicker.min.css',
	    M['url']['static2_vendor']+'clockpicker/bootstrap-clockpicker.min.js',
	    M['url']['static2_plugin']+'clockpicker.min.js'
	];
	M['plugin']['switchery']=[
		M['url']['static2_vendor']+'switchery/switchery.min.css',
	    M['url']['static2_vendor']+'switchery/switchery.min.js',
	    M['url']['static2_plugin']+'switchery.min.js'
	];
	M['plugin']['asspinner']=[
		M['url']['static2_vendor']+'asspinner/asSpinner.min.css',
	    M['url']['static2_vendor']+'asspinner/jquery-asSpinner.min.js',
	    M['url']['static2_plugin']+'asspinner.min.js'
	];
	M['plugin']['multi-select']=[
		M['url']['static2_vendor']+'multi-select/multi-select.min.css',
	    M['url']['static2_vendor']+'multi-select/jquery.multi-select.min.js'
	];
	if($('.order-index').length) $.include(M['url']['own_tem']+'js/order_index.js');
	if($('#order-list').length){
		$.include(M['plugin']['glyphicons']);
		$.include(M['plugin']['slidepanel']);
		$.include(M['plugin']['asscrollable']);
		$.include(M['plugin']['x_editable']);
		$.include(M['plugin']['alertify']);
		$.include(M['plugin']['webuipopover']);
		$.include(M['plugin']['datepicker'],'','siterun');
		$.include(M['url']['own_tem']+'js/order_list.js');
	}
	if($('.finance-list').length){
		$.include(M['plugin']['datepicker'],'','siterun');
		$.include(M['url']['own_tem']+'js/finance_list.js');
	}
	if($('.discount-list').length) $.include(M['url']['own_tem']+'js/discount_list.js');
	if($('.discount-editor').length){
		$.include(M['plugin']['datepicker']);
		$.include(M['plugin']['clockpicker'],'','siterun');
		$.include(M['url']['own_tem']+'js/discount_editor.js');
	}
	if($('.shopset-form').length) $.include(M['plugin']['asspinner']);
	if($('.freight-list').length){
		$.include(M['plugin']['glyphicons']);
		$.include(M['plugin']['slidepanel']);
		$.include(M['plugin']['asscrollable']);
		$.include(M['plugin']['alertify']);
		$.include(M['plugin']['multi-select']);
		$.include(M['plugin']['x_editable']);
		$.include(M['url']['own_tem']+'js/freight.js');
	}
	if($('.remind-user,#set-pay-form,.discount-set,.shopset-form').length) $.include(M['plugin']['switchery'],'','siterun');
	if($('#shopset-buy,.shopset-form,.langtxt-form,.remind-user,.remind-admin,#set-pay-form,.card-save,.autosent-form,.discount-set,.set-price').length) $.include(M['url']['own_tem']+'js/set.js');
	if($('.spec-list').length){
		$.include(M['plugin']['alertify']);
		$.include(M['url']['own_tem']+'js/specification.js');
	}
	if($('.card-list,.addcards-list').length) $.include(M['url']['own_tem']+'js/auto_sent.js');
	// 移动端导航名称
	Breakpoints.on('xs',{
        enter:function(){
        	var $shop_admin_nav=$('.shop-admin-nav');
    		$shop_admin_nav.find('>.btn').html($shop_admin_nav.find('.dropdown-menu .dropdown-item.active').text());
    	}
	})
})
// ajax请求返回后通用处理
function metAjaxFun(result,false_fun,true_fun){
	$.include(M['plugin']['alertify'],function(){
	    if(result.error){
	        alertify.error(result.error);
	        if(typeof false_fun =='function') false_fun();
	    }else if(result.success){
	        alertify.success(result.success);
	        if(typeof true_fun =='function'){
	            true_fun();
	        }else{
	            // setTimeout(function(){
	            //     location.reload();
	            // },500)
	        }
	    }
    });
}