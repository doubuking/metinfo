// 商城公共
window.is_login=M['user_name']!=''?true:false,
    $topcart=$("#topcart-body");
$(function(){
    // 右上角购物车
    if($topcart.length){
        loadTopcart();
        // 删除商品
        $topcart.on('click','.topcart-remove',function(e){
            e.preventDefault();
            $(this).parents('.list-group-item').append('<div class="p-y-15 vertical-align text-xs-center cart-loader"><div class="loader vertical-align-middle loader-default"></div></div>').find('.media').hide();
            $.ajax({
                url:$(this).attr('href'),
                type:'POST',
                dataType:'json',
                success:function(result){
                    metAjaxFun(result,function(){
                        $topcart.find('.cart-loader').remove();
                        $topcart.find('.media').show();
                    },function(){
                        setTimeout(function(){
                            var $topcart_dropdown=$topcart.parents('.scrollable');
                            if($topcart.find('.list-group-item').length>1) $topcart.find('.cart-loader').parents('.list-group-item').remove();
                            loadTopcart('new');
                            $topcart_dropdown.asScrollable('update');
                            $topcart_dropdown.asScrollable('unStyle');
                        },300)
                    });
                }
            });
        });
    }
    $('.topcart-btn').click(function() {
        if(!$topcart.is(':visible')) $topcart.parent('.scrollable-container').height('');
    });
    // 会员登录表单验证
    if($('.login-member form').length){
        setTimeout(function(){
            var login_member_form_index=$('.login-member form').index('form');
            validate[login_member_form_index].success(function(result,form){
                if(result.status){
                    $('.summary-errors').remove();
                    location = result.msg;
                }else{
                    $('.summary-errors').html(result.msg).removeAttr('hidden');
                }
            })
        },500)
    }
    // 以游客身份结算
    $('.login-guest-btn').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('href'),
            type: 'POST',
            dataType:'json',
            success: function(result) {
                if(result.error){
                    $('.summary-errors').removeAttr('hidden').find('p').html(result.error);
                }else if(result.success){
                    location = result.success;
                }
            }
        });
    });
    // 购物车页面的更多产品
    var $masonry=$('.masonry');
    if($masonry.find('.masonry-child').length>1){
        if(typeof $.fn.masonry =='undefined'){
            $.include(M['plugin']['masonry'],function(){
                $masonry.masonry({itemSelector:".masonry-child"});
            });
        }else{
            setTimeout(function(){
                $masonry.masonry({itemSelector:".masonry-child"});
            },300)
        }
    }
    // 订单列表、优惠券列表选项卡固定在头部
    var $shop_navtab=$('.shop-discount-state,.shop-order-state');
    if($shop_navtab.length){
        Breakpoints.on('xs sm md',{
            enter:function(){
                var shop_navtab_h=$shop_navtab.height(),
                    shop_navtab_p_t=$shop_navtab.parent().offset().top;
                $shop_navtab.parent().height(shop_navtab_h);
                $(window).scroll(function(event) {
                    if($(this).scrollTop()>$shop_navtab.parent().offset().top+shop_navtab_h){
                        $shop_navtab.addClass('met-fixed animation-slide-top w-full bg-white p-x-25');
                    }else{
                        $shop_navtab.removeClass('met-fixed animation-slide-top w-full bg-white p-x-25');
                    }
                });
                $shop_navtab.find('a').click(function() {
                    if($(window).scrollTop()>shop_navtab_p_t) $(window).scrollTop(shop_navtab_p_t);
                });
            }
        })
    }
    // 其他页面加载文件（metv6、老模板、UI模板shop页面）
    if(M['plugin'] || $('script[src*="js/app.js"]').length){
        var interval_appload=setInterval(function(){
                if(M['plugin']){
                    clearInterval(interval_appload);
                    if(typeof alertify =='undefined') $.include(M['plugin']['alertify']);
                    if(($topcart.length || $('.btn-logistics-track,.order-converse,.reason-detail-imgs').length) && typeof $.fn.asscrollable =='undefined') $.include(M['plugin']['asscrollable'],'','siterun');
                    if($('.met-showproduct').length){
                        if($('script[src*="js/basic_web.js"]').length){// 老模板调用商城默认页面
                            M['plugin']['tablesaw']=[
                                M['url']['static2_vendor']+'filament-tablesaw/tablesaw.min.css',
                                M['url']['static2_vendor']+'filament-tablesaw/tablesaw.min.js'
                            ];
                            M['plugin']['slick']=[
                                M['url']['uiv2']+'static/fonts/iconfont/iconfont.css',
                                M['url']['uiv2_plugin']+'slick/slick.min.css',
                                M['url']['uiv2_plugin']+'slick/slick-theme.min.css',
                                M['url']['uiv2_plugin']+'slick/slick.min.js'
                            ];
                            M['plugin']['swiper']=[
                                M['url']['uiv2_plugin']+'swiper/swiper-3.3.1.min.css',
                                M['url']['uiv2_plugin']+'swiper/swiper-3.3.1.jquery.min.js'
                            ];
                            M['plugin']['lightGallery']=[
                                M['url']['uiv2_plugin']+'lightGallery/css/lightgallery.min.css',
                                M['url']['uiv2_plugin']+'lightGallery/js/lightgallery.min.js',
                                M['url']['uiv2_plugin']+'lightGallery/js/lg-fullscreen.min.js',
                                M['url']['uiv2_plugin']+'lightGallery/js/lg-thumbnail.min.js',
                                M['url']['uiv2_plugin']+'lightGallery/js/lg-zoom.min.js'
                            ];
                            M['plugin']['photoswipe']=[
                                M['url']['uiv2_plugin']+'PhotoSwipe/photoswipe.min.css',
                                M['url']['uiv2_plugin']+'PhotoSwipe/default-skin/default-skin.min.css',
                                M['url']['uiv2_plugin']+'PhotoSwipe/photoswipe.min.js',
                                M['url']['uiv2_plugin']+'PhotoSwipe/photoswipe-ui-default.min.js',
                                M['url']['uiv2_plugin']+'PhotoSwipe/photoswipe-plugin.js'
                            ];
                            if($(".met-editor table").length) $.include(M['plugin']['tablesaw']);
                            $.include(M['plugin']['masonry']);
                            if($('#met-imgs-slick .slick-slide').length>1) $.include(M['plugin']['slick']);
                            $.include(M['plugin']['swiper']);
                            if(M['device_type']=='m'){
                                $.include(M['plugin']['photoswipe']);
                            }else{
                                $.include(M['plugin']['lightGallery']);
                            }
                            $.include([
                                M['url']['uiv2_js']+'editor.js',// 编辑器
                                M['url']['uiv2_js']+'img_slick.js',// 展示图片轮播图
                                M['url']['uiv2_js']+'product.js',// 产品模块
                            ]);
                        }
                        $.include(M['url']['own_tem']+'js/shop_showproduct.js');
                    }
                    if($('.shoppro-discount').length){
                        $.include(M['url']['static2']+'fonts/7-stroke/7-stroke.min.css');
                        if(typeof $.fn.webuiPopover =='undefined') $.include(M['plugin']['webui-popover']);
                        $.include(M['url']['own_tem']+'js/discount.js');
                    }
                    if($('.moregoods-list .masonry-child').length && typeof $.fn.appear =='undefined') $.include(M['plugin']['appear'],function(){
                        $('.moregoods-list .masonry-child [data-original]').trigger('scroll');
                    },'siterun');
                    if($('.cart-list').length){
                        $.include(M['plugin']['touchspin']);
                        $.include(M['url']['own_tem']+'js/cart.js');
                    }
                    if($('#addr-edit-modal').length) $.include(M['url']['own_tem']+'js/address.js');
                    if($('.shop-address').length) $.include(M['url']['own_tem']+'js/address_set.js');
                    if($('.pay-form').length){
                        M['plugin']['labelauty']=[
                             M['url']['static2_vendor']+'jquery-labelauty/jquery-labelauty.min.css',
                             M['url']['static2_vendor']+'jquery-labelauty/jquery-labelauty.min.js'
                        ];
                        $.include(M['plugin']['labelauty'],'','siterun');
                        $.include(M['url']['own_tem']+'js/pay.js');
                    }
                    if($('.shop-order,.shop-order-check').length && typeof $.fn.webuiPopover =='undefined') $.include(M['plugin']['webui-popover'],'','siterun');
                    if($('.shop-order').length) $.include(M['url']['own_tem']+'js/order.js');
                    if($('.shop-order-check').length) $.include(M['url']['own_tem']+'js/order_check.js');
                    if($('.shop-favorite').length) $.include(M['url']['own_tem']+'js/favorite.js');
                    if($('.shop-discount').length) $.include(M['url']['own_tem']+'js/discount.js');
                }
            },10);
    }
});
// 右上角购物车
function loadTopcart(d){
    if(!d) $topcart.html('<div class="h-100 vertical-align text-xs-center cart-loader"><div class="loader vertical-align-middle loader-default"></div></div>');
    $.loadCartJson(function(json){
        var html = '',
            num=0;
        $.each(json, function(i, item){
            item.shopmax = item.purchase>0?item.purchase:item.stock;
            html += '<div class="list-group-item" role="menuitem">'+
                        '<div class="media">'+
                            '<div class="media-left p-r-10">'+
                                '<a class="avatar text-middle" target="_blank" href="'+item.url+'">'+
                                    '<img class="img-responsive" src="'+item.img+'" alt="">'+
                                '</a>'+
                            '</div>'+
                            '<div class="media-body">'+
                                '<div class="pull-xs-right text-xs-right">'+
                                    '<span>'+item.price_str+' x '+item.amount+'</span>'+
                                    '<p><a href="'+delurl+'&id='+item.id+'" class="topcart-remove"><i class="icon wb-trash" aria-hidden="true"></i></a></p>'+
                                '</div>'+
                                '<h6 class="media-heading">'+
                                    '<a target="_blank" href="'+item.url+'">'+
                                        item.name+
                                    '</a>'+
                                '</h6>'+
                                '<p>'+item.para_str+'</p>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
            num++;
        })
        if(html==''){
            html='<div class="h-100 text-xs-center vertical-align"><div class="vertical-align-middle">'+METLANG.app_shop_emptycart+'</div></div>';
            $('.dropdown-menu-footer').hide();
        }else{
            $('.dropdown-menu-footer').show();
            topcartTotal(json);
        }
        $('.topcart-goodnum').html(num).removeAttr('hidden');
        if(d&&!num || !d) $topcart.html(html);
    },d);
}
// 购物车价格
function topcartTotal(json){
    $.ajax({
        url: totalurl,
        type: "GET",
        cache: false,
        dataType: "jsonp",
        success: function(data) {
            if(data.message == 'ok'){
                $('.topcart-total').html(data.price.goods.total_str);
            }
        }
    });
}
$.extend({
    // 购物车数据
    loadCartJson:function(func,d){
        $.ajax({
            url: jsonurl,
            type: 'POST',
            dataType:'json',
            success: function(json) {
                func(json);
            }
        });
    }
});
// ajax请求返回后通用处理
function metAjaxFun(result,false_fun,true_fun){
    if(result.error){
        alertify.error(result.error);
        if(typeof false_fun =='function') false_fun();
    }else if(result.success){
        alertify.success(result.success);
        if(typeof true_fun =='function'){
            true_fun();
        }else{
            setTimeout(function(){
                location.reload();
            },500)
        }
    }
}