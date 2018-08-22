<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title= $_M['word']['app_shop_head_order_survey'];
$active[1] = 'active';
?>
<include file="app/head"/>
<div class="page-content ">
    <div class="row order-index">
        <div class="col-md-4 info-panel">
            <div class="card card-shadow">
                <div class="card-content bg-white p-20">
                    <button class="btn btn-floating btn-sm btn-danger"> <i class="icon fa-dollar"></i>
                    </button>
                    <span class="m-l-15 font-weight-400">{$word.app_shop_order_income}</span>
                    <div class="content-text text-xs-center m-b-0"> <i class="icon {$data.income_i} font-size-20"></i>
                        <span class="font-size-40 font-weight-100">{$data.income_price}</span>
                        <p class="blue-grey-400 font-weight-100 m-0" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="{$word.app_shop_order_income_tips1} {$last['sum']['income']}">{$data.income_per}% {$word.app_shop_order_income_tips2}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 info-panel">
            <div class="card card-shadow">
                <div class="card-content bg-white p-20">
                    <button class="btn btn-floating btn-sm btn-warning">
                        <i class="icon wb-shopping-cart"></i>
                    </button>
                    <span class="m-l-15 font-weight-400">{$word.app_shop_order_count}</span>
                    <div class="content-text text-xs-center m-b-0">
                        <i class="icon {$order_i} font-size-20"></i>
                        <span class="font-size-40 font-weight-100">{$data['first']['sum']['order_number']}</span>
                        <p class="blue-grey-400 font-weight-100 m-0" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="{$word.app_shop_order_income_tips1} {$last['sum']['order_number']}">{$data.order_per}% {$word.app_shop_order_income_tips2}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 info-panel">
            <div class="card card-shadow">
                <div class="card-content bg-white p-20">
                    <button class="btn btn-floating btn-sm btn-primary">
                        <i class="icon wb-user"></i>
                    </button>
                    <span class="m-l-15 font-weight-400">{$word.app_shop_order_plac_order_user_num}</span>
                    <div class="content-text text-xs-center m-b-0">
                        <i class="icon {$order_user_i} font-size-20"></i>
                        <span class="font-size-40 font-weight-100">{$data['first']['sum']['order_user']}</span>
                        <p class="blue-grey-400 font-weight-100 m-0" data-toggle="tooltip" data-placement="top" data-trigger="hover" data-original-title="{$word.app_shop_order_income_tips1} {$last['sum']['order_user']}">{$data.order_user_per}% {$word.app_shop_order_income_tips2}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End First Row -->
        <!-- second Row -->
        <div class="col-xs-12" id="ecommerceChartView">
            <div class="card card-shadow m-0">
                <div class="card-header p-20 bg-white">
                    <div class="radio-custom radio-primary radio-inline">
                        <input type="radio" id="checkincome" class="checkchartist" value="income" name="checkchartist" checked>
                        <label for="checkincome">{$word.app_shop_order_income}</label>
                    </div>
                    <div class="radio-custom radio-primary radio-inline">
                        <input type="radio" id="checkorder" class="checkchartist" value="order" name="checkchartist">
                        <label for="checkorder">{$word.app_shop_order_count}</label>
                    </div>
                    <ul class="nav nav-pills nav-pills-rounded chart-action" data-plugin="nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#scoreLineToDay">{$word.app_shop_order_today}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#scoreLineToWeek">{$word.app_shop_order_week}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#scoreLineToMonth">{$word.app_shop_order_month}</a>
                        </li>
                    </ul>
                </div>
                <div class="card-content tab-content bg-white p-20">
                    <div class="ct-chart tab-pane active h-300" id="scoreLineToDay"></div>
                    <div class="ct-chart tab-pane h-300" id="scoreLineToWeek"></div>
                    <div class="ct-chart tab-pane h-300" id="scoreLineToMonth"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
var dayslotjson = {$data.dayslotjson};
</script>
</div>
<include file="sys_admin/foot_v2"/>