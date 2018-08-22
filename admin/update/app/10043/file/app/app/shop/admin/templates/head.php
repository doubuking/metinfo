<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title.= $_M['word']['app_shop_head_shop_module'];
$head_no=$foot_no=1;
$_M['body_class'].=" site-menubar-fold site-menubar-keep";
?>
<include file="sys_admin/head_v2"/>
<div class="hidden-md-up navbar-fixed-top bg-white">
    <div class='dropdown shop-admin-nav'>
        <button type="button" class="btn btn-dark btn-block btn-squared dropdown-toggle bg-blue-grey-800" data-toggle="dropdown"></button>
        <div class="dropdown-menu animate animate-reverse w-full" role="menu">
            <a href="{$url.own_name}c=order_admin&a=doindex" title='{$word.app_shop_head_order_survey}' class="dropdown-item {$active[1]}"><i class="site-menu-icon icon wb-pie-chart"></i>{$word.app_shop_head_order_survey}</a>
            <a href="{$url.own_name}c=order_admin&a=dolist" title='{$word.app_shop_head_order_all}' class="dropdown-item {$active[2]}"><i class="site-menu-icon icon wb-order"></i>{$word.app_shop_head_order_all}</a>
            <a href="{$url.own_name}c=goods_admin&a=domanage" title='{$word.app_shop_head_goods_manager}' class="dropdown-item {$active[3]}"><i class="site-menu-icon icon wb-shopping-cart"></i>{$word.app_shop_head_goods_manager}</a>
            <a href="{$_M['url']['adminurl']}anyid=44&n=pay&c=admin_pay&a=dofinancelist" title='{$word.app_shop_head_financial_details}' class="dropdown-item {$active[4]}" target="_blank"><i class="site-menu-icon icon wb-payment"></i>{$word.app_shop_head_financial_details}</a>
            <a href="{$url.own_name}c=discount_admin&a=dolist" title='{$word.app_shop_head_coupon}' class="dropdown-item {$active[5]}"><i class="site-menu-icon icon wb-bookmark"></i>{$word.app_shop_head_coupon}</a>
            <a href="{$url.own_name}c=set&a=doremind_user" title='{$word.app_shop_head_order_reminding}' class="dropdown-item {$active[6]}"><i class="site-menu-icon icon wb-bell"></i>{$word.app_shop_head_order_reminding}</a>
            <a href="{$url.own_name}c=set&a=doindex" title='{$word.app_shop_head_set}' class="dropdown-item {$active[7]}"><i class="site-menu-icon icon wb-settings"></i>{$word.app_shop_head_set}</a>
            <a href="{$url.own_name}c=help&a=doindex" title='{$word.app_shop_head_help}' class="dropdown-item {$active[8]}"><i class="site-menu-icon icon wb-help-circle"></i>{$word.app_shop_head_help}</a>
        </div>
    </div>
</div>
<div class="site-menubar">
    <div class="site-menubar-body text-xs-center">
        <ul class="site-menu p-t-10">
            <h2 class="site-menu-title" hidden>{$word.app_shop_head_order}</h2>
            <li class="site-menu-item {$active[1]}">
                <a href="{$url.own_name}c=order_admin&a=doindex" class='p-y-10'>
                    <i class="site-menu-icon icon wb-pie-chart font-size-20"></i>
                    <span class="font-size-12">{$word.app_shop_head_order_survey}</span>
                </a>
            </li>
            <li class="site-menu-item {$active[2]}">
                <a href="{$url.own_name}c=order_admin&a=dolist" class='p-y-10'>
                    <i class="site-menu-icon icon wb-order font-size-20"></i>
                    <span class="font-size-12">{$word.app_shop_head_order_all}</span>
                </a>
            </li>
            <li class="site-menu-item {$active[3]}">
                <a href="{$url.own_name}c=goods_admin&a=domanage" class='p-y-10'>
                    <i class="site-menu-icon icon wb-shopping-cart font-size-20"></i>
                    <span class="font-size-12">{$word.app_shop_head_goods_manager}</span>
                </a>
            </li>
            <li class="site-menu-item {$active[4]}">
                <a href="{$_M['url']['adminurl']}anyid=44&n=pay&c=admin_pay&a=dofinancelist" target="_blank" class='p-y-10'>
                    <i class="site-menu-icon icon wb-payment font-size-20"></i>
                    <span class="font-size-12">{$word.app_shop_head_financial_details}</span>
                </a>
            </li>
        </ul>
        <ul class="site-menu site-menu-bottom p-b-10">
            <h2 class="site-menu-title" hidden>{$word.app_shop_head_application}</h2>
            <li class="site-menu-item {$active[5]}">
                <a href="{$url.own_name}c=discount_admin&a=dolist" class='p-y-10'>
                    <i class="site-menu-icon icon wb-bookmark font-size-20"></i>
                    <span class="font-size-12">{$word.app_shop_head_coupon}</span>
                </a>
            </li>
            <li class="site-menu-item {$active[6]}">
                <a href="{$url.own_name}c=set&a=doremind_user" class='p-y-10'>
                    <i class="site-menu-icon icon wb-bell font-size-20"></i>
                    <span class="font-size-12">{$word.app_shop_head_order_reminding}</span>
                </a>
            </li>
            <li class="site-menu-item {$active[7]}">
                <a href="{$url.own_name}c=set&a=doindex" class='p-y-10'>
                    <i class="site-menu-icon icon wb-settings font-size-20"></i>
                    <span class="font-size-12">{$word.app_shop_head_set}</span>
                </a>
            </li>
            <li class="site-menu-item {$active[8]}">
                <a href="http://help.metinfo.cn/faq/shop.html" class='p-y-10' target='_blank'>
                    <i class="site-menu-icon icon wb-help-circle font-size-20"></i>
                    <span class="font-size-12">{$word.app_shop_head_help}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="page {$_M['page_class']}">