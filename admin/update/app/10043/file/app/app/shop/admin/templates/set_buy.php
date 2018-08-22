<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title = $_M['word']['app_shop_set_logistics_package'];
$active[7] = 'active';
?>
<include file="app/head"/>
<div class="page-content">
    <div class="panel m-b-0">
        <div class="panel-body">
            <input type="hidden" name="secret_key" value="{$_M['config']['met_secret_key']}">
            <input type="hidden" name="app_api" value="{$_M['url']['app_api']}">
            <div class="col-lg-9 col-xl-7 col-xxl-6 row">
                <div class="shopset-buy-top row p-b-10">
                    <div class="col-md-2">
                        <h1 class='m-0 font-size-16'>{$word.app_shop_set_logistics_package}</h1>
                    </div>
                    <div class="col-md-10">
                        <ul class="memberinfo ulstyle pull-md-right">
                            <li class="inline-block p-x-10 blue-grey-600"><span class="user_id"></span></li>
                            <li class="inline-block p-x-10 blue-grey-600"><span class="money"></span> {$_M['word']['smstips9']}</li>
                            <li class="inline-block p-x-10"><a href="{$_M['url']['adminurl']}anyid=65&n=appstore&c=member&a=dorecharge" target='_blank'>{$_M['word']['smsrecharge']}</a></li>
                            <li class="inline-block p-x-10"><a href="https://account.metinfo.cn/" target='_blank'>{$_M['word']['account_Settings']}</a></li>
                            <li class="inline-block p-x-10"><a href="{$_M['url']['app_api']}a=dologout&user_key={$_M['config']['met_secret_key']}&url_sec={$data.url_sec_login}&return_type=jump">{$_M['word']['indexloginout']}</a></li>
                        </ul>
                    </div>
                </div>
                <table class="table m-t-20 m-b-0" id="shopset-buy" data-url="{$_M['url']['own_form']}a=dopay">
                    <thead>
                        <tr>
                            <th>{$word.app_shop_set_logistics_table_title1}</th>
                            <th>{$word.app_shop_set_logistics_table_title2}</th>
                            <th>{$word.app_shop_operator}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-type='10'>
                            <td>￥ 10.00</td>
                            <td>1000</td>
                            <td><button class='btn btn-danger'>{$word.app_shop_buy}</button></td>
                        </tr>
                        <tr data-type='50'>
                            <td>￥ 50.00</td>
                            <td>5000</td>
                            <td><button class='btn btn-danger'>{$word.app_shop_buy}</button></td>
                        </tr>
                        <tr data-type='100'>
                            <td>￥ 100.00</td>
                            <td>10000</td>
                            <td><button class='btn btn-danger'>{$word.app_shop_buy}</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<include file="sys_admin/foot_v2"/>