<?php defined('IN_MET') or exit('No permission'); ?>
<if value="$c['shopv2_open']">
<div class="shop-product-intro grey-500">
    <div class="p-20 bg-grey-100 red-600 price">
        <span class='font-size-18'>{$c.shopv2_price_str_prefix}</span> <span id="price" class="font-size-30">{$data.price_str_number_format}</span>
        <if value="$data['original']">
        <del class='m-l-20'>{$word.app_shop_original}{$data.original_str}</del>
        </if>
    </div>
    <include file="app/module/shop_discount_receive"/>
    <if value="$data['selectpara']">
    <div class="shop-product-para">
        <list data="$data['selectpara']" name="$p" num='20'>
        <div class="row m-t-15">
            <label class='form-control-label col-sm-2'>{$p.spec.name}</label>
            <div class="selectpara-list col-sm-10">
                <list data="$p['values']" name="$v" num='100'>
                <a href="javascript:;" title='{$v.value}' data-id="{$v.id}" class="selectpara text-truncate btn btn-squared btn-outline btn-default m-r-10">{$v.value}</a>
                 </list>
            </div>
        </div>
        </list>
    </div>
    </if>
    <div class="row m-t-15">
        <label class='form-control-label col-sm-2'>{$word.app_shop_number}</label>
        <div class="col-sm-10">
            <div class="w-150 inline-block m-r-10">
                <input type="text" class="form-control text-xs-center" data-min="{$data.shopmin}" data-max="{$data.shopmax}" data-plugin="touchSpin" name="buynum" id="buynum" autocomplete="off" value="{$data.shopmin}">
            </div>
            <if value="$data['stock_show'] || $data['purchase']">
            <div class='m-t-5 stock-purchase'>
                <if value="$data['stock_show']">
                <div class='inline-block m-r-10'>{$word.app_shop_stock} <span id='stock-num' data-stock='{$data.stock}'>{$data.stock}</span> {$word.app_shop_piece}</div>
                </if>
                <if value="$data['purchase']">
                <span class="tag tag-round tag-default m-r-10">{$word.app_shop_purchase}{$data.purchase}{$word.app_shop_piece}</span>
                </if>
            </div>
            </if>
        </div>
    </div>
    <div class="m-t-20 clearfix cart-favorite">
        <a href="{$data.favorite_href}" data-pid='{$data.pid}' class='btn btn-squared btn-lg
        <if value="$data['is_favorite']">
        btn-success
        <else/>
        btn-warning
        </if>
        pull-sm-right product-favorite'>
            <i class="icon
            <if value="$data['is_favorite']">
            fa-heart
            <else/>
            fa-heart-o
            </if>
            m-r-5"></i>
            <span>
            <if value="$data['is_favorite']">
            {$word.app_shop_favorited}
            <else/>
            {$word.app_shop_favorite_add}
            </if>
            </span>
        </a>
        <a href="{$url.shop_tocart}&pid={$data.pid}" class="btn btn-lg btn-squared btn-danger m-r-20 product-tocart"><i class="icon fa-cart-plus m-r-5 font-size-20" aria-hidden="true"></i>{$word.app_shop_tocart}</a>
    </div>
</div>
<script>
var stockjson = {$data.stockjson};
</script>
</if>