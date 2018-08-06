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
/**
 * isotopeNum 分类筛选动画(可控制默认选项对应的显示数量)
 * @param  {Element} isotopeNav 切换列表的选项卡
 */
METUI_FUN['$uicss'] = {
    name:'$uicss',
    appear: function() {
        var _svgt = METUI['$uicss'].find(".svg-title"),
            _svgst = METUI['$uicss'].find(".svg-subtitle"),
            _video = METUI['$uicss'].find("#index-video"),
            _vplay = METUI['$uicss'].find('.video-play'),
            _vbtn = METUI['$uicss'].find('.video-btn'),
            _fullvideo = METUI['$uicss'].find('.about-full-video'),
            _cvideo=METUI['$uicss'].find(".video_url video");
            if(_cvideo.length){
                var _url=_cvideo.attr("data-metvideo"),
                    _url = _url.substring(_url.indexOf('http')),
                    _maxVideo = METUI['$uicss'].find('#fullvideo'),
                    _closeVideo = METUI['$uicss'].find('.video-close');

                _video.attr("src",_url);//获取视频地址
                _maxVideo.attr("src",_url);
                    _vplay.on('click', function(event) {
                    event.preventDefault();
                    _fullvideo.addClass('is-start').removeClass('is-end');
                    _maxVideo.trigger('play');
                });
                _closeVideo.on('click', function(event) {
                    event.preventDefault();
                    _fullvideo.addClass('is-end').removeClass('is-start');
                    _maxVideo.trigger('pause');
                });
                var controller = new ScrollMagic.Controller();
                var sceneVideo = new ScrollMagic.Scene({
                    triggerElement: '.about-video',
                    duration: 500
                })
                sceneVideo.on("enter", function(event) {
                    _svgt.animate(1.3, function() {
                        TweenLite.to(_svgt, 1.3, {
                            autoAlpha: 1,
                            y: 0
                        })
                    });
                    _svgst.animate(1.3, function() {
                        TweenLite.to(_svgst, 1.3, {
                            autoAlpha: 1,
                            delay: 0.9,
                            y: 0
                        })
                    });
                    _vplay.animate(1.3, function() {
                        TweenLite.to(_vplay, 1.3, {
                            autoAlpha: 0.7,
                            delay: 0.9
                        })
                    });
                    _vbtn.animate(1.3, function() {
                        TweenLite.to(_vbtn, 1.3, {
                            autoAlpha: 1,
                            delay: 0.9
                        })
                    });
                    _video.trigger("play");
                });
                sceneVideo.on("leave", function(event) {
                    _svgt.animate(1.3, function() {
                        TweenLite.to(_svgt, 1.3, {
                            autoAlpha: 0,
                            y: 40
                        })
                    });
                    _svgst.animate(1.3, function() {
                        TweenLite.to(_svgst, 1.3, {
                            autoAlpha: 0,
                            delay: 0.9,
                            y: 40
                        })
                    });
                    _vplay.animate(1.3, function() {
                        TweenLite.to(_vplay, 1.3, {
                            autoAlpha: 0,
                            delay: 0.9
                        })
                    });
                    _vbtn.animate(1.3, function() {
                        TweenLite.to(_vbtn, 1.3, {
                            autoAlpha: 0,
                            delay: 0.9
                        })
                    });
                    _video.trigger("pause");
                });
                controller.addScene([
                    sceneVideo
                ]);
            }
        }
            
};
var x = new metui(METUI_FUN['$uicss']);
