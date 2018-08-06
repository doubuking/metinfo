(function($) {
    $.fn.hoverDelay = function(options) {
        var defaults = {
            // 鼠标经过的延时时间
            hoverDuring: 300,
            // 鼠标移出的延时时间
            outDuring: 100,
            // 鼠标经过执行的方法
            hoverEvent: function() {
                // 设置为空函数，绑定的时候由使用者定义
                $.noop();
            },
            // 鼠标移出执行的方法
            outEvent: function() {
                $.noop();
            }
        };
        var sets = $.extend(defaults, options || {});
        var hoverTimer, outTimer;
        return $(this).each(function() {
            // 保存当前上下文的this对象
            var $this = $(this)
            $this.hover(function() {
                clearTimeout(outTimer);
                hoverTimer = setTimeout(function() {
                    // 调用替换
                    sets.hoverEvent.apply($this);
                }, sets.hoverDuring);
            }, function() {
                clearTimeout(hoverTimer);
                outTimer = setTimeout(function() {
                    sets.outEvent.apply($this);
                }, sets.outDuring);
            });
        });
    }
})(jQuery);
METUI_FUN['$uicss'] = {
    name: '$uicss',
    init: function() {
        /*导航点击处理*/
        var aLink = METUI['$uicss'].find('.dropdown a.nav-link');
        aLink.click(function() {
            if (!Breakpoints.is('xs') && !Breakpoints.is('sm')) {
                if ($(this).data("hover") && $(this).attr('target') === '_blank') {
                    window.open($(this).attr('href'))
                } else {
                    window.location.href = $(this).attr('href');
                }
            }
        });
        if (device_type !== 'm') {
            if ($(".navlist .dropdown").find('[data-hover]').length) {
                $(".navlist .dropdown").hoverDelay({
                    // 自定义，outEvent同
                    hoverEvent: function() {
                        $(this).addClass('open');

                    },
                    outEvent: function() {
                        $(this).removeClass('open');
                    }
                });
            }
        }
    },
    shadow: function() {
        /*顶部固定边框阴影处理*/
        var fixed = METUI['$uicss'].parent();
        if (fixed) {
            $(window).scroll(function() {
                if (fixed.offset().top > 1) {
                    fixed.addClass("navbar-shadow");
                } else {
                    fixed.removeClass("navbar-shadow");
                }
            });
        }
    },
    animate: function() {
        /*动画*/
        var li = METUI['$uicss'].find('.nav-item');
        li.each(function(index, el) {
            var navlist2 = $(this).find('.navlist-2');
            $(this).on('mouseenter', navlist2, function(event) {
                var x = TweenMax.staggerTo(navlist2, 0.1, {
                    autoAlpha: 1,
                    y: 0,
                    ease: Power3.easeInOut,
                }, 0.02);
            });
            $(this).on('mouseleave', navlist2, function(event) {
                var x = TweenMax.staggerTo(navlist2, 0.1, {
                    autoAlpha: 0,
                    y: -10,
                    ease: Power3.easeInOut,
                }, 0.02);
            });
        });
    },
    mousewheel: function() {
        var sm = $('.secondmenu');
        if (sm.length) {
            sm.mousewheel(function(event, delta, deltaX, deltaY) {
                var dY = Math.ceil($(this).position().top - deltaY * -120);
                if (dY > 0) dY = 0;
                $(this).css({
                    'transform': 'translateY(' + dY + 'px)',
                    'transition': '0s'
                });
                event.stopPropagation();
                event.preventDefault();
            }).mouseleave(function() {
                $(this).removeAttr('style');
            });
        }
    },
    dropdown: function() {
        /*下拉菜单动画修复*/
        var dropdownSubmenu = METUI['$uicss'].find('.navlist .dropdown-submenu');
        dropdownSubmenu.hover(
            function() {
                $(this).parent('.dropdown-menu').addClass('overflow-visible');
            },
            function() {
                $(this).parent('.dropdown-menu').removeClass('overflow-visible');
            }
        );
    },
    cntotc: function() {
        //简体繁体互换
        var b = $('.$uicss .btn-cntotc');
        b.on('click', function(event) {
            var lang = $(this).attr('data-tolang');
            if (lang == 'tc') {
                $('body').s2t();
                $(this).attr('data-tolang', 'cn');
                $(this).text('简体');
            } else if (lang == 'cn') {
                $('body').t2s();
                $(this).attr('data-tolang', 'tc');
                $(this).text('繁體');
            }
        });
    },
    navmore: function() {
        // 导航顶级栏目过多时换行处理
        $met_navlist = METUI['$uicss'].find('.navlist');
        if (!Breakpoints.is('xs') && $met_navlist.position().top > 20) {
            $head = $('.met-head').height();
            if ($('body').hasClass('met-navfixed')) {
                $('body').addClass('met-navfixed-navclamp');
                $(".met-navfixed-navclamp").css("padding-top", $head);
            }
        } else {
            if ($('body').hasClass('met-navfixed')) $('body').removeClass('met-navfixed-navclamp');
        }
    }
};
var x = new metui(METUI_FUN['$uicss']);