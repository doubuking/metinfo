METUI_FUN['$uicss'] = {
    name: '$uicss',
    init: function() {
        if (METUI['$uicss'].hasClass('pagetype2')) {
            var navbar = METUI['$uicss'].find('.navbar'),
                navbar_t = navbar.offset().top,
                wh = $(window).height(),
                a = navbar.find('.navbar-right li a');
                $(window).scroll(function() {
                    var st = $(this).scrollTop();
                    //标题工具栏固定
                    if($("body").hasClass('met-navfixed')){
                        if (st > navbar_t) {
                            navbar.addClass('navbar-fixed-top animation-slide-top');
                            $("header").removeClass('navbar-fixed-top');
                        } else {
                            navbar.removeClass('navbar-fixed-top animation-slide-top');
                            $("header").addClass('navbar-fixed-top');
                        }
                    }else{
                        if (st > navbar_t) {
                            navbar.addClass('navbar-fixed-top animation-slide-top');
                        } else {
                            navbar.removeClass('navbar-fixed-top animation-slide-top');

                        }
                    }
                    
                    //选项卡自动选中
                    a.each(function() {
                        var topsize = pro_topsize($(this));
                        //30为区域上下内边距，根据需要调整
                        if (st >= (topsize - 30)) pro_active($(this));
                    });
                });
            //选项卡点击事件
            a.on('click',function(e) {
                e.preventDefault();
                var thisobj = $(this);
                var scrollTopInt = setTimeout(function() {
                        var w_scroll = $(window).scrollTop();
                        if (w_scroll == pro_topsize(thisobj) || w_scroll + wh >= $(document).height()) {
                            pro_active(thisobj);
                            clearInterval(scrollTopInt);
                        }
                        $('html,body').animate({
                            scrollTop: pro_topsize(thisobj)
                        }, 300, "linear"); //页面滑动到指定位置
                    }, 300)
            })
            /*选项卡滚动条（移动端）*/
            METUI['$uicss'].find(' .navbar .navbar-toggle').one("click", function() {
                setTimeout(function() {
                    $(this).navtabSwiper();
                }, 0)
            });
            /*选中选项卡*/
            function pro_active(dom) {
                navbar.find('.navbar-right li').removeClass('active');
                dom.parent('li').addClass('active');
            }
            /*获取选项卡内容距离顶部的位置*/
            function pro_topsize(dom) {
                var href=dom.attr('href');
                 var oftop = $(href).offset().top;
                  var topsize = oftop - 100;
                   
                if (navbar.hasClass('navbar-fixed-top')) {
                    topsize = topsize + 50;
                } else {
                    if (Breakpoints.is('xs')) {
                        topsize = topsize - navbar.find(".navbar-collapse-toolbar").height();
                    }
                }
                if (topsize < 0) topsize = 10;
                return topsize;
            }
        }
    }
};
var x = new metui(METUI_FUN['$uicss']);