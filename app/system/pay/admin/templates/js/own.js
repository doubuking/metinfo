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
    if($('#finance-list').length){
        M['plugin']['datepicker']=[
            M['url']['static2_vendor']+'bootstrap-datepicker/bootstrap-datepicker.min.css',
            M['url']['static2_vendor']+'bootstrap-datepicker/bootstrap-datepicker.min.js',
            M['url']['static2_plugin']+'bootstrap-datepicker.min.js'
        ];
        $.include(M['plugin']['datepicker'],function(){
            $('.btn[data-target*="#finance-"]').one('click', function(event) {
                var index=$($(this).data('target')+' .finance-form').index('form');
                validate[index].success(function(result,form){
                    $.include(M['plugin']['alertify'],function(){
                        if(result.error){
                            alertify.error(result.error);
                        }else if(result.success){
                            alertify.success(result.success);
                            datatable[0].ajax.reload();
                            form.parents('.modal').modal('hide');
                        }
                    });
                });
            });
        },'siterun');
    }
});