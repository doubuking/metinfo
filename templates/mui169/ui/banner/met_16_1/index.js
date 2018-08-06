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
    init: function() {
        var $metbanner=METUI['$uicss'],
        metbanner_slide='.$uicss .slick-slide';
    if($metbanner.length){
        var img = METUI['$uicss'].find('.cover-image').eq(0);
       img.imageloadFun(function(){
            var slide = METUI['$uicss'].find('.slick-slide'),
                    bh = img.data('height').split('|');
                    for (var i = 0; i<bh.length;i++) {
                        if(bh[i]==0){
                            bh[i]='auto';
                        }
                    }
                Breakpoints.on('md lg', {
                    enter: function() {
                        METUI['$uicss'].find('.cover-image').height(bh[0]);
                    }
                })
                Breakpoints.on('sm', {
                    enter: function() {
                        METUI['$uicss'].find('.cover-image').height(bh[1]);
                    }
                })
                Breakpoints.on('xs', {
                    enter: function() {
                        METUI['$uicss'].find('.cover-image').height(bh[2]);
                    }
                })
            // 开始轮播
            var metbanner_swipe=slick_arrows=true;
            if(device_type=='d' && !Breakpoints.is('xs')) metbanner_swipe=false;
            if(Breakpoints.is('xs')) slick_arrows=false;
            if($(metbanner_slide).length>1){
                $metbanner.slick({
                    autoplay:true,
                    dots:true,
                    arrows:slick_arrows,
                    autoplaySpeed:4000,
                    swipe:metbanner_swipe,
                    prevArrow:met_prevarrow,
                    nextArrow:met_nextarrow,
                    pauseOnHover: false,
                    lazyLoad: 'ondemand',
                    cssEase: 'linear',
                }).on('setPosition',function(event,slick){
                    METUI['$uicss'].find('.cover-image').css('display', 'block');
                    $(metbanner_slide+' .banner-text').hide();
                    $(metbanner_slide+'.slick-active .banner-text').show();
                });
            }
        })
    }
    }
};
var banner=metui(METUI_FUN['$uicss']);

