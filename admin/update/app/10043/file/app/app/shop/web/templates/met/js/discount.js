$(function(){
    if($('.shop-discount-list').length){//优惠券列表页
        // 通过锚点获取所需优惠券状态
        var hash=location.hash?location.hash:'#state_0';
        hash=hash.replace('#state_','');
        $('.shop-discount-state a[data-state="'+hash+'"]').addClass('active');
        // 渲染优惠券数据
        discountList();
        // 加载更多优惠券
        // $("#shop-discount-more").click(function(){
        //     discountList();
        // })
        // 切换优惠券类型
        $(".shop-discount-state a").click(function(){
            // $('input[name="keyword"]').val('');
            setTimeout(function(){
                discountList();
            },0)
            location.hash='state_'+$(this).data('state');
        })
        var discount_img_scale=$('.shop-discount-list').data('scale');
        // 优惠券使用范围-点击展开指定商品
        $(document).on('click', '.avalible-list-show', function() {
            var this_modal=$(this).data('target');
            if(!$(this_modal).length){
                var html='',
                    modal_class=this_modal.substring(1),
                    modal_title=$(this).parents('.pricing-list').find('.pricing-title').html();
                $.each($(this).data('avalible'),function(index,val){
                    var original=index>5?'data-original':'src';
                    html+='<li>'
                        +'<div class="card card-shadow text-xs-center">'
                            +'<figure class="card-img-top overlay overlay-hover">'
                                +'<img class="overlay-figure overlay-scale" '+original+'="'+val.img+'" alt="'+val.title+'" height="100">'
                                +'<a href="'+val.url+'" title="'+val.title+'" target="_blank" class="overlay-panel hidden-xl-up"></a>'
                                +'<figcaption class="overlay-panel overlay-background overlay-fade vertical-align overlay-icon hidden-lg-down">'
                                    +'<a href="'+val.url+'" title="'+val.title+'" target="_blank" class="icon wb-search vertical-align-middle"></a>'
                                +'</figcaption>'
                            +'</figure>'
                            +'<div class="card-block p-10 bg-blue-grey-100">'
                                +'<h4 class="card-title m-b-0 font-size-14"><a href="'+val.url+'" title="'+val.title+'" target="_blank">'+val.title+'</a></h4>'
                                +'<p class="m-b-0 red-600">'+val.price+'</p>'
                            +'</div>'
                        +'</div>'
                    +'</li>';
                });
                var avalible_list_modal='<div class="modal fade '+modal_class+'">'
                    +'<div class="modal-dialog modal-lg">'
                        +'<div class="modal-content cover">'
                            +'<div class="modal-header">'
                                +'<button class="close" data-dismiss="modal" aria-label="Close">'
                                    +'<span aria-hidden="true">&times;</span>'
                                +'</button>'
                                +'<div class="m-b-10 font-size-18">'+modal_title+'</div>'
                                +'<p class="m-b-0 grey-600">'+METLANG.app_shop_selectgoods_use+'</p>'
                            +'</div>'
                            +'<div class="modal-body bg-pagebg1">'
                                +'<ul class="goods-list blocks-2 blocks-sm-3 blocks-lg-4 blocks-xxl-5" data-scale="'+discount_img_scale+'">'+html
                                +'</ul>'
                            +'</div>'
                        +'</div>'
                    +'</div>'
                +'</div>';
                $('.shop-discount').append(avalible_list_modal);
                setTimeout(function(){
                    $(this_modal+' .goods-list').imageSize();
                    if($(this_modal+' [data-original]').length){
                        if(typeof $.fn.lazyload =='undefined'){
                            $.include(M['plugin']['lazyload'],function(){
                                $(this_modal+' [data-original]').lazyload({container:this_modal});
                            });
                        }else{
                            $(this_modal+' [data-original]').lazyload({container:this_modal});
                        }
                    }
                },200)
            }
            $(this_modal).modal();
        });
        // 优惠券点击立即使用（优惠券使用范围为指定商品时）
        $(document).on('click','.btn-received[href="javascript:;"]',function(){
            $(this).parents('.pricing-list').find('.avalible-list-show').click();
        });
    }else if($('.shoppro-discount').length){// 商品详情页、购物车页面
        discountListDetail();// 优惠券加载
        // 获取优惠打折信息
        $.ajax({
            url: discount_getdisinto_url,
            type: 'POST',
            dataType:'json',
            success: function(json) {
                if(json){
                    var html='';
                    if(json.discount_amount){
                        $.each(json.discount_amount, function(index, val) {
                            html+='<span class="tag tag-danger tag-outline tag-sm m-r-5 m-b-5">'+METLANG.app_shop_disc_man+' '+index+' '+METLANG.app_shop_disc_jian+' '+val+' '+METLANG.app_shop_disc_zhe+'</span>';
                        });
                    }
                    if(json.discount_static) html+='<span class="tag tag-danger tag-outline tag-sm">'+METLANG.app_shop_disc_orderfree+' '+json.discount_static+' '+price_suffix+'</span>';
                    if(html){
                        html='<div>'+html+'</div>';
                        $('.shoppro-discount-body').append(html);
                        $('.shoppro-discount').removeAttr('hidden');
                    }
                }
            }
        });
        // 领取优惠券弹窗
        var $discount_receive_modal=$('#discount-received-modal'),
            $discount_modal=$discount_receive_modal.find('.pricing-list');
        if($discount_receive_modal.parents('.modal').length){// 兼容详情页时尚模式商品信息弹窗
            var discount_receive_modal_clone=$discount_receive_modal.clone();
            $('body').append(discount_receive_modal_clone);
            $discount_receive_modal.remove();
        }
        $(document).on('click', '.shoppro-discount-list .btn', function() {
            var self_json=$(this).data('content-json'),
                $discount_modal_btn=$discount_modal.find('.btn');
            $discount_modal.find('.pricing-title').html($('span',this).html());
            $discount_modal.find('.pricing-amount').html(self_json.par);
            $discount_modal.find('.pricing-par strong').html(self_json.r_price);
            $discount_modal.find('.pricing-time span').html(self_json.s_time_str+' '+METLANG.app_shop_to+' '+self_json.e_time_str);
            // $discount_modal.find('.pricing-range span').html(self_json.one_user_have);
            if(self_json.instructions){
                $discount_modal.find('.pricing-inst span').html(self_json.instructions).show();
            }else{
                $discount_modal.find('.pricing-inst').html('').hide();
            }
            if(self_json.state){
                $discount_modal.find('.pricing-header').addClass('bg-orange-600').removeClass('bg-red-600');
                $discount_modal_btn.addClass('btn-warning btn-receive').removeClass('btn-danger').find('.btn-text').html(METLANG.app_shop_immediate_receive);
            }else{
                $discount_modal.find('.pricing-header').addClass('bg-red-600').removeClass('bg-orange-600');
                $discount_modal_btn.removeClass('btn-warning btn-receive').addClass('btn-danger').find('.btn-text').html(METLANG.app_shop_immediate_use);
            }
            $discount_modal_btn.attr({'data-id':$(this).data('id')});
            $discount_modal.show();

            $('.discount-received-success').hide().find('.media-heading').html($('span',this).html());

            $discount_receive_modal.modal();
        });
        // 优惠券弹窗立即使用
        $(document).on('click', '#discount-received-modal .pricing-list .btn:not(.btn-receive),#discount-received-modal .btn-use', function() {
            $('#discount-received-modal').modal('hide');
        });
    }
    //优惠券领取
    $(document).on('click', '.btn-receive', function() {
        var $self=$(this);
        if(is_login){
            $.ajax({
                url: discount_receive_url,
                data:{id:$self.attr('data-id')},
                type: 'POST',
                dataType:'json',
                success: function(result) {
                    result.status=parseInt(result.status);
                    if(result.status){
                        if($('.shop-discount-state').length){
                            // 待领取列表页
                            discountList();
                            alertify.success(METLANG.app_shop_receiveok);
                            setTimeout(function(){
                                location.reload();
                            },500)
                        }else{
                            discountListDetail(true);// 产品详情页
                        }
                    }else{
                        alertify.error(result.info);
                    }
                }
            });
        }else{
            alertify.okBtn(METLANG.app_shop_ok).cancelBtn(METLANG.app_shop_cancel).confirm(METLANG.app_shop_needlogin, function (ev) {
                location=M['weburl']+'member/login.php?lang='+M['lang'];
            });
        }
    });
});
// 列表页渲染优惠券数据
function discountList(){
    // var $morebtn = $('#shop-discount-more');
    var $discount_list=$('.shop-discount-list');
    // $morebtn.attr('disabled','disabled');
    discountJson(function(json){
        if(json.length){
            var html = '',
                state=$(".shop-discount-state a.active").data('state');
            $.each(json,function(i,item){
                item.all_goods=parseInt(item.all_goods);
                item.avalible_list_str=JSON.stringify(item.avalible_list);
                item.goods_list=item.all_goods?METLANG.app_shop_allgoods:"<a href='javascript:;' title='"+METLANG.app_shop_clickview+"' class='avalible-list-show' data-toggle='modal' data-target='.avalible-list-modal-"+item.id+"' data-avalible='"+item.avalible_list_str+"'>"+METLANG.app_shop_selectgoods+"</a>";
                item.btn_href='javascript:;';
                switch(state){
                    case 0:
                        item.bg='bg-red-600';
                        item.btn='danger btn-received';
                        item.btn_text=METLANG.app_shop_immediate_use;
                        if(item.all_goods) item.btn_href=M['weburl']+'product/index.php?lang='+M['lang'];
                        break;
                    case 1:
                        item.bg='bg-orange-600';
                        item.btn='warning btn-receive ladda-button';
                        item.btn_text=METLANG.app_shop_immediate_receive;
                        break;
                    case 2:
                        item.bg='bg-grey-400';
                        item.btn=' bg-grey-400 disabled';
                        item.btn_text=METLANG.app_shop_used;
                        break;
                    case 3:
                        item.bg='bg-grey-400';
                        item.btn=' bg-grey-400 disabled';
                        item.btn_text=METLANG.app_shop_overtime;
                        break;
                }
                html+='<li>'
                    +'<div class="pricing-list text-xs-left m-b-0">'
                        +'<div class="pricing-header '+item.bg+'">'
                            +'<div class="pricing-title p-x-15 p-t-15 p-b-0 font-size-18 font-weight-300">'+item.name+'</div>'
                            +'<div class="pricing-price p-y-10 p-x-15 font-size-40 font-weight-300">'
                                +'<span class="pricing-currency font-size-30">'+price_prefix+'</span>'
                                +'<span class="pricing-amount"> '+item.par+'</span>'
                            +'</div>'
                            +'<div class="pricing-tips p-x-15 p-b-15">'
                                +'<p class="m-b-0">'+METLANG.app_shop_order+METLANG.app_shop_order_achieve+' <strong>'+item.r_price_str+'</strong> '+METLANG.app_shop_canuser+'</p>'
                                +'<p class="m-b-0">'+METLANG.app_shop_period_validity+'：'+item.s_time_str+' &nbsp; '+METLANG.app_shop_to+' &nbsp; '+item.e_time_str+'</p>';
                if(item.usetime_str) html+='<p class="m-b-0">'+METLANG.app_shop_usetime+'：'+item.usetime_str+'</p>';
                            html+='</div>'
                        +'</div>';
                if(state<=1){
                    html+='<ul class="pricing-features">'
                            +'<li class="p-y-5 p-x-0">'+METLANG.app_shop_receivelimit+' <strong>'+item.one_user_have+'</strong> '+METLANG.app_shop_sheet+'</li>'
                            +'<li class="p-y-5 p-x-0">'+METLANG.app_shop_userange+'：'+item.goods_list+'</li>'
                            +'<li class="p-y-5 p-x-0"><strong>*</strong> '+METLANG.app_shop_instructions+'：'+item.instructions+'</li>'
                        +'</ul>';
                }
                html+='<div class="pricing-footer p-15 text-xs-center bg-blue-grey-100">'
                            +'<a class="btn btn-squared btn-'+item.btn+'" href="'+item.btn_href+'" target="_blank" data-id="'+item.id+'" data-style="slide-right" data-plugin="ladda">'
                                +'<span class="ladda-label">'+item.btn_text+'</span>'
                            +'</a>'
                        +'</div>'
                    +'</div>'
                +'</li>';
            });
            $discount_list.html(html);
            if($('.btn-receive.ladda-button').length){
                if(typeof Ladda =='undefined'){
                    $.include(M['plugin']['ladda'],function(){
                        Ladda.bind('.btn-receive.ladda-button',{timeout:200});
                    });
                }else{
                    Ladda.bind('.btn-receive.ladda-button',{timeout:200});
                }
            }
            // $morebtn.removeAttr('disabled');
            // window.page = parseInt(json.page) + 1;
            // if(json.endnum<=json.page){
                // $morebtn.attr({hidden:''});
            // }else{
            //     $morebtn.removeAttr('hidden');
            // }
        }else{
            $discount_list.html('<div class="h-200 vertical-align text-xs-center animation-fade"><div class="vertical-align-middle font-size-18 blue-grey-500">'+METLANG.app_shop_nodiscounts+'</div></div>');
            // $morebtn.attr({hidden:''});
        }
    });
}
// 列表页获取优惠券数据
function discountJson(func){
    $.ajax({
        url: discount_json_url,
        data: {state:$('.shop-discount-state li a.active').data('state')},
        type: 'POST',
        dataType:'json',
        success: function(json) {
            func(json);
        }
    });
}
// 详情页优惠券加载
function discountListDetail(is_receive){
    for (var i = 0; i < 2; i++) {
        var discount_url=i?discount_listjson_url:discount_json_url,
            discount_data={pid:$('.product-favorite').data('pid')};
        if(!i) discount_data.state=i;
        discountJsonD(discount_url,discount_data,i);
    }
    if(is_receive) $('#discount-received-modal .pricing-list').hide().next('.discount-received-success').fadeIn();
}
// 详情页渲染优惠券数据
function discountJsonD(url,data,state){
    $.ajax({
        url: url,
        data: data,
        type: 'POST',
        dataType:'json',
        success: function(json) {
            if(json.length){
                var html = '',
                    price_str_prefix=$('#discount-received-modal .pricing-list .pricing-currency').html();
                if(state==0) var idnum=[];
                $.each(json,function(i,item){
                    if(idnum){
                        if(!idnum[item.id]) idnum[item.id]=0;
                        idnum[item.id]++;
                        if(idnum[item.id]>1) return true;
                    }
                    switch(state){
                        case 0:
                            item.btn='danger';
                            item.btn_txt='';
                            break;
                        case 1:
                            item.btn='warning';
                            item.btn_txt=' &nbsp;'+METLANG.app_shop_receive;
                            break;
                    }
                    item.content_json={
                        state:state,
                        r_price:item.r_price,
                        par:item.par,
                        s_time_str:item.s_time_str,
                        e_time_str:item.e_time_str,
                        one_user_have:item.one_user_have,
                        instructions:item.instructions
                    };
                    item.content_json=JSON.stringify(item.content_json);
                    if(M['device_type']=='d'){
                        item.content="<div class='p-10 blue-grey-500'>"+METLANG.app_shop_discountvalue+"：<span class='red-600 font-size-12'>"+price_str_prefix+"</span>"+"<strong class='red-600 font-size-18'>"+item.par+"</strong><br />"+METLANG.app_shop_order+METLANG.app_shop_order_achieve+" <span class='font-size-12'>"+price_str_prefix+"</span><strong class='font-size-16'>"+item.r_price+"</strong> "+METLANG.app_shop_canuser+"<br />"+METLANG.app_shop_period_validity+"："+item.s_time_str+" "+METLANG.app_shop_to+"<br />"+item.e_time_str+"<br />"+METLANG.app_shop_receivelimit+" "+item.one_user_have+" "+METLANG.app_shop_sheet;
                        if(item.instructions) item.content+="<br />"+METLANG.app_shop_instructions+"："+item.instructions;
                        item.content+="</div>";
                    }else{
                        item.content='';
                    }
                    html+='<a href="javascript:;" class="btn btn-'+item.btn+' btn-outline btn-xs" data-id="'+item.id+'" data-trigger="hover" data-animation="pop" data-placement="bottom" data-width="220" data-content="'+item.content+'" data-content-json=\''+item.content_json+'\'><span class="inline-block pull-xs-left text-truncate">'+item.name+'</span>'+item.btn_txt+'</a>';
                });
                $('.shoppro-discount-list[data-state='+state+']').html(html);
                if(M['device_type']=='d') $('.shoppro-discount-list[data-state='+state+'] .btn').webuiPopover({padding:0});
                if(idnum){
                    $.each(idnum,function(i,item){
                        if(item>1) $('.shoppro-discount-list .btn-danger[data-id='+i+']').append(' &nbsp; '+item+METLANG.app_shop_sheet);
                    })
                }
                $('.shoppro-discount').removeAttr('hidden');
            }else{
                $('.shoppro-discount-list[data-state='+state+']').html('');
            }
        }
    });
}