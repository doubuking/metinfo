<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
?>
<div class="shoppro-discount row" hidden>
    <label class='col-sm-2'>{$word.app_shop_discount}</label>
    <div class='shoppro-discount-body col-sm-10'>
        <div class='shoppro-discount-list inline-block' data-state='0'></div>
        <div class='shoppro-discount-list inline-block' data-state='1'></div>
        <a href="{$url.shop_discount}#state_1" target='_blank' class="btn btn-default btn-outline btn-xs">{$word.app_shop_morediscount}</a>
    </div>
</div>
<div class="modal modal-fade-in-scale-up modal-danger" id="discount-received-modal" aria-hidden="true" aria-labelledby="discount-received-modal" role="dialog" tabindex="-1">
    <button type="button" class="close font-size-40" style='position:fixed;top: 0;right: 20px;' data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <div class="modal-dialog modal-center modal-sm">
        <div class="modal-content">
            <div class="pricing-list border-none text-xs-left m-b-0">
                <div class="pricing-header radius0">
                    <div class="pricing-title p-x-30 p-t-30 p-b-0 font-size-20 font-weight-300"></div>
                    <div class="pricing-price p-y-10 p-x-30 font-size-50 font-weight-300">
                        <span class="pricing-currency font-size-30">{$c.shopv2_price_str_prefix}</span>
                        <span class="pricing-amount"></span>
                    </div>
                    <div class="pricing-tips p-x-30 p-b-30">
                        <p class="m-b-0 pricing-par">{$word.app_shop_order}{$word.app_shop_order_achieve} {$c.shopv2_price_str_prefix}<strong class='font-size-16'></strong> {$word.app_shop_canuser}</p>
                        <p class="m-b-0 pricing-time">{$word.app_shop_period_validity}：<span></span></p>
                        <p class="m-b-0 pricing-inst">{$word.app_shop_instructions}：<span></span></p>
                    </div>
                </div>
                <div class="pricing-footer p-30 text-xs-center bg-blue-grey-100 radius0">
                    <a class="btn btn-lg btn-squared ladda-button" href='javascript:;' data-id="" data-timeout='200' data-style="slide-right" data-plugin="ladda">
                        <span class="ladda-label"><i class="icon wb-arrow-right" aria-hidden="true"></i><font class='btn-text'></font></span>
                    </a>
                </div>
            </div>
            <div class='discount-received-success p-x-20 p-y-30 bg-white' style='display:none;'>
                <div class="row m-0">
                    <i class="icon pe-cash pull-xs-left font-size-60" aria-hidden="true"></i>
                    <div class='row pull-xs-left m-l-20 m-r-50'>
                        <h4 class="media-heading font-size-16"></h4>
                        <p class="font-size-20 green-800 m-b-0">{$word.app_shop_receiveok}</p>
                    </div>
                </div>
                <div class="m-t-20 discount-received-success-btn">
                    <a class="btn btn-default btn-squared font-size-16" href="{$url.shop_discount}#state_1" target="_blank">{$word.app_shop_morediscount}</a>
                    <a class="btn btn-danger btn-squared m-l-10 font-size-16 btn-use" href='javascript:;'>{$word.app_shop_immediate_use}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
var discount_json_url = '{$url.shop_discount_my}',
    discount_listjson_url = '{$url.shop_discount}&a=dodiscount_list',
    discount_receive_url = '{$url.shop_discount_receive}',
    discount_getdisinto_url='{$url.shop_discount_my}&a=dogetdisinto';
</script>