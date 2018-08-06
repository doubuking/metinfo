/*own.js*/
/*!
 * M['weburl']      网站网址
 * M['lang']        网站语言
 * M['tem']         模板目录路径
 * M['classnow']    当前栏目ID
 * M['id']          当前页面ID
 * M['module']      当前页面所属模块
 * default_placeholder 开发者自定义默认图片延迟加载方式，'base64'：灰色背景；自定义背景图片路径；'blur'：图片高斯模糊；默认为'blur'
 * met_prevarrow,met_nextarrow slick插件翻页按钮自定义html
 * device_type       客户端判断（d：PC端，t：平板端，m：手机端）
 */
METUI_FUN['$uicss'] = {
    name:'$uicss',
    init:function (){
        if(device_type!='d') $('body').wrapInner('<div class="cover"></div>');
        // 内页子栏目导航水平滚动
        var $metcolumn_nav=METUI['$uicss'].find('ul');
        if($metcolumn_nav.length){
            Breakpoints.on('xs',{
                enter:function(){
                    $metcolumn_nav.navtabSwiper();
                }
            })
        }
    }
};
var x = new metui(METUI_FUN['$uicss']);
