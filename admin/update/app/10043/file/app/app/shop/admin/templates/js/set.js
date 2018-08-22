/**
 * 设置
 */
$(function(){
	// 表单保存
	if($('form').length){
		validate[0].success(function(result,form){
			$.include(M['plugin']['alertify'],function(){
				metAjaxFun(result);
			});
		});
	}
	// 基本设置
	if($('.shopset-form').length){
		// 物流跟踪开启
		var btn_logistics_open='.shopset-form input[name=shopv2_logistics_open]',
			$logistics_open_tips=$('.logistics_open_tips');
		$(document).on('click',btn_logistics_open+'+.switchery',function() {
			if($(btn_logistics_open).data('disabled')) $logistics_open_tips.removeAttr('hidden');
		});
	}
	// 物流套餐页面
	var secret_key=$('input[name=secret_key]').val(),
		app_api=$('input[name=app_api]').val(),
		$shopset_buy_btn=$('#shopset-buy .btn');
	if(secret_key && app_api){
		// 获取会员数据
		$.ajax({
			url: app_api+'a=domember_obtain',
			type: "GET",
			data: 'user_key=' + secret_key,
			cache: false,
			dataType: "jsonp",
			success: function(data) {
				if(data.user_id){
					$('.user_id').html(data.user_id);
					$('.money').html(data.money);
				}
			}
		});
		// 物流套餐购买
		if($shopset_buy_btn.length){
			$shopset_buy_btn.click(function() {
				var $self=$(this);
				$.include(M['plugin']['alertify'],function(){
					alertify.okBtn(METLANG.app_shop_ok).cancelBtn(METLANG.app_shop_cancel).confirm(METLANG.app_shop_freight_tips1, function (ev) {
						$.ajax({
							url: $('#shopset-buy').data('url'),
							type: "POST",
							data: {type:$self.parents('tr').data('type')},
							dataType: "json",
							success: function(result) {
								metAjaxFun(result,'',function(){
									if(result.user_id) $('.money').html(result.money);
									setTimeout(function() {
										location.reload();
									},500)
								});
							}
						});
					})
				});
			});
		}
	}
	// 前台文字设置
	if($('.langtxt-form').length){
        // 文字搜索
        var $langtxt_search=$('.input-search');
        if($langtxt_search.length){
            // 移动端搜索框位置固定头部
            var $langtxt_search_group=$('.langtxt-search-group'),
                nav_h=$('.shop-admin-nav').height(),
                langtxt_p_t=$langtxt_search_group.parent().offset().top+43-nav_h,
                searchGroupScroll=function(){
                    if($(window).scrollTop()>langtxt_p_t){
                        $langtxt_search_group.addClass('met-fixed animation-slide-top w-full bg-white p-x-20 p-y-5').css({top:nav_h});
                    }else{
                        $langtxt_search_group.removeClass('met-fixed animation-slide-top w-full bg-white p-x-20 p-y-5').css({top:''});
                    }
                };
            searchGroupScroll();
            $(window).scroll(function() {
                searchGroupScroll();
            });
            // 移动端文字搜索
            var langtxt_search=[],
                langtxtSearch=function(){
                    var $input_search=$('.langtxt-search'),
                        search_text=$input_search.val();
                    langtxt_search['result']=[];
                    langtxt_search['active']=0;
                    if(search_text){
                        $('.langtxt-form input[type=text]').each(function(index, el) {
                            if($(this).val().search(search_text)>=0){
                                langtxt_search['result'].push($(this).parents('.form-group').index()-1);
                            }
                        });
                        langtxt_search['result_l']=langtxt_search['result'].length;
                        if(langtxt_search['result_l']){
                            if(langtxt_search['result_l']>1){
                                $input_search.addClass('search-text-switch p-r-100');
                            }else{
                                $input_search.removeClass('search-text-switch p-r-100');
                            }
                            searchScroll();
                        }else{
                            $.include(M['plugin']['alertify'],function(){
                                alertify.error(METLANG.app_shop_freight_tips2);
                            });
                            $input_search.removeClass('search-text-switch p-r-100');
                        }
                    }else{
                        $input_search.removeClass('search-text-switch p-r-100');
                    }
                },
                searchScroll=function(){
                    var $result_active=$('.langtxt-form .form-group:eq('+langtxt_search['result'][langtxt_search['active']]+')'),
                        scroll_t=$result_active.offset().top-nav_h-46,
                        index=langtxt_search['active']+1;
                    $('html,body').animate({scrollTop:scroll_t},300);
                    $result_active.find('input[type=text]').focus();
                    $('.search-switch span').html(index+'/'+langtxt_search['result_l']);
                };
            // 输入点击搜索
            $('.langtxt-search').on('search',function() {
                langtxtSearch();
            });
            $langtxt_search_group.find('.input-search-btn').click(function() {
                langtxtSearch();
            });
            // 搜索结果切换
            $('.langtxt-search-prev').click(function() {
                if(langtxt_search['active']){
                    langtxt_search['active']--;
                }else{
                    langtxt_search['active']=langtxt_search['result_l']-1;
                }
                searchScroll();
            });
            $('.langtxt-search-next').click(function() {
                if(langtxt_search['active']==langtxt_search['result_l']-1){
                    langtxt_search['active']=0;
                }else{
                    langtxt_search['active']++;
                }
                searchScroll();
            });
        }
    }
    // 价格设置切换显示价格默认设置方式
    $('input[name="shopv2_price_set"]').click(function() {
        if(parseInt($(this).val())){
            $('#more-collapse').collapse('show');
        }else{
            $('#more-collapse').collapse('hide');
        }
    });
    // 添加优惠折扣
    $('.btn-add-pdiscount').click(function() {
        var $table=$(this).parents('table');
        setTimeout(function(){
            $table.find('tbody tr:last-child [name]').each(function(index, el) {
                $(this).attr({name:$(this).attr('name')+$(this).parents('tr').index()});
            });
        })
    });
});
/**
 * 支付设置
 */
if($('#set-pay-form').length){
	$(function(){
		paytypeok();
		$(document).on('change','input[name=shopv2_onlinepay],input[name=shopv2_deliverypay]',function(){
			paytypeok();
		})
	});
	function paytypeok(){
		if(!$('input[name="shopv2_onlinepay"]:checked').length && !$('input[name="shopv2_deliverypay"]:checked').length){
			$.include(M['plugin']['alertify'],function(){
				alertify.error(METLANG.app_shop_freight_tips3);
			});
			$('#set-pay-form button[type=submit]').attr({disabled:true});
		}else{
			$('#set-pay-form button[type=submit]').removeAttr('disabled');
		}
	}
}