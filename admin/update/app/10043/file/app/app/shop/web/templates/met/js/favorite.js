$(function(){
    // 通过锚点获取所需收藏状态
    var hash=location.hash?location.hash:'';
    $('.shop-favorite-state a[href="'+hash+'"]').addClass('active');
    // 渲染收藏数据
    favoriteList();
    // 加载更多收藏、搜索收藏
    // $("#shop-favorite-more,.shop-favorite-keyword .input-search-btn").click(function(){
    //     var search=$(this).hasClass('input-search-btn')?true:false;
    //     favoriteList(search);
    // })
    // 切换收藏类型
    $(".shop-favorite-state a").click(function(){
        // $('input[name="keyword"]').val('');
        setTimeout(function(){
             favoriteList(true);
        },0)
        location.hash=$(this).attr('href');
    })
    // 删除收藏
    $(document).on('click','.favorite-remove',function(e){
        e.preventDefault();
        var $self = $(this);
        alertify.okBtn(METLANG.app_shop_ok).cancelBtn(METLANG.app_shop_cancel).confirm(METLANG.app_shop_deleteok, function (ev) {
            $.ajax({
                url: $('.shop-favorite-list').data('do-url'),
                type: 'POST',
                dataType:'json',
                data:{pid:$self.data('pid')},
                success: function(result) {
                    if(result.status){
                        location.reload();
                    }else{
                        alertify.error(result.error);
                    }
                }
            });
        });
    });
});
function favoriteList(search){
    // var $morebtn = $('#shop-favorite-more');
    var $favorite_list=$('.shop-favorite-list');
    // if(search) window.page = null;
    // $favorite_list.html('<div class="h-200 vertical-align text-xs-center favorite-loader"><div class="loader vertical-align-middle loader-default"></div></div>');
    // $morebtn.attr('disabled','disabled');
    favoriteJson(function(json){
        if(json.status==1 && json.data.length){
            var html = window.page>1?'<hr>':'',
                state=$(".shop-favorite-state a.active").data('state');
            $.each(json.data,function(i,item){
                var original=i>4?'data-original':'src';
                item.price=state?METLANG.app_shop_avorite_expired:item.price;
                item.price_class=state?'grey-400':'red-600';
                html += '<li>'
                    +'<div class="card card-shadow text-xs-center">'
                        +'<figure class="card-img-top overlay overlay-hover">'
                            +'<img class="overlay-figure overlay-scale" '+original+'="'+item.img+'" alt="'+item.title+'">'
                            +'<div class="overlay-panel vertical-align hidden-xl-up">'
                                +'<a href="'+item.url+'" title="'+item.title+'" target="_blank" class="btn btn-xs btn-danger btn-squared vertical-align-middle">'+METLANG.app_shop_buy+'</a>'
                                +'<a href="javascript:;" data-pid="'+item.pid+'" class="btn btn-xs btn-default btn-squared pos-t-f favorite-remove">X</a>'
                            +'</div>'
                            +'<figcaption class="overlay-panel overlay-background overlay-fade vertical-align hidden-lg-down">'
                                +'<a href="'+item.url+'" title="'+item.title+'" target="_blank" class="btn btn-xs btn-danger btn-squared vertical-align-middle m-r-5">'+METLANG.app_shop_buy+'</a>'
                                +'<a href="javascript:;" data-pid="'+item.pid+'" class="btn btn-xs btn-default btn-squared vertical-align-middle favorite-remove">'+METLANG.app_shop_del+'</a>'
                            +'</figcaption>'
                        +'</figure>'
                        +'<div class="card-block p-10 bg-blue-grey-100">'
                            +'<h4 class="card-title m-b-0 font-size-14"><a href="'+item.url+'" title="'+item.title+'" target="_blank">'+item.title+'</a></h4>'
                            +'<p class="m-b-0 '+item.price_class+'">'+item.price+'</p>'
                        +'</div>'
                    +'</div>'
                +'</li>';
            });
            $('.shop-favorite-list .favorite-loader').remove();
            if(search){
                $favorite_list.html(html);
            }else{
                $favorite_list.append(html);
            }
            $favorite_list.imageSize();
            if($('.shop-favorite-list [data-original]').length){
                if(typeof $.fn.lazyload =='undefined'){
                    $.include(M['plugin']['lazyload'],function(){
                        $favorite_list.find('[data-original]').lazyload();
                    });
                }else{
                    $favorite_list.find('[data-original]').lazyload();
                }
            }
            // $morebtn.removeAttr('disabled');
            // window.page = parseInt(json.page) + 1;
            // if(json.endnum<=json.page){
            //     $morebtn.attr({hidden:''});
            // }else{
            //     $morebtn.removeAttr('hidden');
            // }
        }else{
            // $('.shop-favorite-list .favorite-loader').remove();
            $favorite_list.html('<div class="h-200 vertical-align text-xs-center favorite-null animation-fade"><div class="vertical-align-middle font-size-18 blue-grey-500">'+METLANG.app_shop_nofavorites+'</div></div>');
            // $morebtn.attr({hidden:''});
        }
    });
}
function favoriteJson(func){
    var search = '&state='+$('.shop-favorite-state li a.active').data('state');
    // if($('input[name="keyword"]').val()!='') search+='&keyword='+$('input[name="keyword"]').val();
    // if(window.page>1)search+='&page='+window.page;
    $.ajax({
        url: $('.shop-favorite-list').data('ajax-url'),
        data: search,
        type: 'POST',
        dataType:'json',
        success: function(json) {
            func(json);
        }
    });
}