/**
 * 商品详情页
 */
var $shop_buy_tocart=$('.shop-product-intro .product-tocart,.shop-product-intro .product-buynow');
$(function(){
	// 产品详情页
	var $shop_product_intro=$(".shop-product-intro");
	if($shop_product_intro.length){
		if(!M['plugin']) $('[data-plugin="touchSpin"]').TouchSpin();// 数量调整
		// 立即购买 && 加入购物车
		$(document).on('click', '.shop-product-intro .product-tocart,.shop-product-intro .product-buynow', function(e) {
			e.preventDefault();
			var has_selectpara=true;
			$shop_product_intro.find('.selectpara-list').each(function(){
				if($('.selectpara.btn-danger',this).length==0){
					has_selectpara=false;
					return false;
				}
			});
			if(has_selectpara){
				var url = $(this).attr('href')+'&option='+shopParaVal()+'&num='+$("#buynum").val();
				location = url;
			}else{
				alertify.error(METLANG.app_shop_choosepara);
				Breakpoints.on('xs',{
            		enter:function(){
            			var product_para_top=$('.shop-product-para').offset().top;
						if($('body.met-navfixed').length) product_para_top-=$('.met-nav').height();
						$('html,body').animate({scrollTop:product_para_top});
        			}
    			})
			}
		});
		// 选择选项
		$shop_product_intro.find('.selectpara-list .selectpara').click(function(){
			$(this).toggleClass('btn-danger').siblings().removeClass('btn-danger');
			stockPrice();// 计算价格
		});
		// 商品收藏
		var $shop_collect=$('.product-favorite');
		$shop_collect.click(function(e){
			e.preventDefault();
			if(is_login){
				$.ajax({
					url: $(this).attr('href'),
					type: 'POST',
					dataType:'json',
					data:{pid:$(this).data('pid')},
					success: function(result) {
						if(result.status){
							if(result.msg==METLANG.app_shop_favorite_ok){
								$shop_collect.removeClass('btn-warning').addClass('btn-success').find('span').html(METLANG.app_shop_favorited);
				            	$shop_collect.find('i').removeClass('fa-heart-o').addClass('fa-heart');
							}else{
								$shop_collect.removeClass('btn-success').addClass('btn-warning').find('span').html(METLANG.app_shop_favorite_add);
				                $shop_collect.find('i').removeClass('fa-heart').addClass('fa-heart-o');
							}
						}else{
							alertify.error(result.error);
						}
					}
				});
			}else{
				alertify.okBtn(METLANG.app_shop_ok).cancelBtn(METLANG.app_shop_cancel).confirm(METLANG.app_shop_needlogin, function (ev) {
					location=$shop_collect.attr('href');
				});
			}
		});
		// 如果展示图片img没有data-src参数，则加上data-src参数
		var $met_imgs_slick=$('#met-imgs-slick');
		$met_imgs_slick.find('.slick-slide img').each(function(index, el) {
			if(!$(this).data('src')){
				var data_src=$(this).data('lazy')||$(this).attr('src');
				$(this).attr({'data-src':data_src});
			}
		});
		// 展示图片点击复原
        var metimgsRecover=function(delay){
            var $img_current=$met_imgs_slick.find('.slick-current img').length?$met_imgs_slick.find('.slick-current img'):$met_imgs_slick.find('.slick-slide img'),
                delay=delay||0;
            setTimeout(function(){
                if($img_current.attr('src')!=$img_current.data('src')) $img_current.attr({src:$img_current.data('src')});
                if($met_imgs_slick.find('.slick-img-cover').length) $met_imgs_slick.find('.slick-img-cover').remove();
            },delay)
        };
		$met_imgs_slick.find('.slick-dots li').click(function() {
            if($(this).attr('aria-hidden')=='false') $(this).addClass('slick-active');
            metimgsRecover();
        });
        $met_imgs_slick.on('beforeChange', function(){// 此方法依赖slick插件
            metimgsRecover(500);
        })
        // 默认选中规格组第一个规格
        $shop_product_intro.find('.selectpara-list').each(function(index, el) {
			$('.selectpara:eq(0)',this).addClass('btn-danger');
		});
		stockPrice();
        // 手机端布局
		Breakpoints.on('xs',{
            enter:function(){
            	var cart_favorite_h=$('.cart-favorite').height();
            	$('body').css({'padding-bottom':cart_favorite_h});
            	$('.met-scroll-top').css({bottom:cart_favorite_h+10});
        	}
    	})
	}
});
// 获取选项
function shopParaVal(){
	var str='';
	$('.shop-product-intro .selectpara-list .selectpara.btn-danger').each(function(index){
		if(index>0) str+=',';
		str+=$(this).data('id');
	});
	return str;
}
// 字符串转json字符串
function stringToJsonStr(str,delimiter){
	delimiter=delimiter||',';
	if(str.indexOf(delimiter)>=0){
		str=str.split(delimiter);
	}else{
		str=[str];
	}
	str.sort();
	str=JSON.stringify(str);
	return str;
}
// 计算价格、库存不足时禁止加入购物车、规格图片切换
function stockPrice(){
	var para_list_str=shopParaVal(),
		$stock_num=$('#stock-num'),
		$buynum=$('#buynum'),
		para_list=stringToJsonStr(para_list_str),
		para_img='';
	$shop_buy_tocart.removeClass('disabled btn-dark');
	$('.shop-product-intro .stock-no').hide();
	$.each(stockjson,function(i,item){
		item.para_list=[];
		$.each(item.paralist, function(index, val) {
			item.para_list.push(val.value_id[0]);
		});
		item.para_list.sort();
		item.para_list=JSON.stringify(item.para_list);
		if(item.para_list==para_list){
			var stock_max=item.stock;
			// 计算价格
			$("#price").html(parseFloat(item.price).toFixed(2));
			$stock_num.html(item.stock);
			if(item.stock>$buynum.data('max')) stock_max=$buynum.data('max');
			$buynum.trigger("touchspin.updatesettings",{min:1,max:stock_max});
			// 库存不足时禁止加入购物车
			if(item.stock==0){
				$buynum.val(0);
				$buynum.trigger("touchspin.updatesettings",{min:0});
				$shop_buy_tocart.addClass('disabled btn-dark');
				var $stock_no='<span class="red-600 stock-no">'+METLANG.app_shop_lowstocks_min+'</span>';
				if($('.shop-product-intro .stock-no').length){
					$('.shop-product-intro .stock-no').show();
				}else if($('.shop-product-intro .stock-purchase').length){
					$('.shop-product-intro .stock-purchase').append($stock_no);
				}else{
					$buynum.parents('.input-group').parent().after($stock_no);
				}
			}
			para_img=item.para_img;
		}else if(!para_list_str){
			$stock_num.html($stock_num.data('stock'));
		}
	});
	// 规格图片切换
	var $met_imgs_slick=$('#met-imgs-slick'),
		$img_current=$met_imgs_slick.find('.slick-current img').length?$met_imgs_slick.find('.slick-current img'):$met_imgs_slick.find('.slick-slide img'),
		img_current_src=$img_current.attr('src'),
		img_current_datasrc=$img_current.data('src');
	if(para_img && img_current_datasrc.indexOf(para_img)<0 && (para_img.indexOf('.jpg')>0 || para_img.indexOf('.png')>0 || para_img.indexOf('.bmp')>0 || para_img.indexOf('.gif')>0)){
		$img_current.attr({src:para_img}).parents('.slick-slide').after('<div class="slick-img-cover w-full"></div>');
		$met_imgs_slick.find('.slick-dots .slick-active').removeClass('slick-active');
	}else{
		if(img_current_src!=img_current_datasrc) $img_current.attr({src:img_current_datasrc});
		if($met_imgs_slick.find('.slick-img-cover').length) $met_imgs_slick.find('.slick-img-cover').remove();
		$met_imgs_slick.find('.slick-dots li:eq(0)').click();
	}
}