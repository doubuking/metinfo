<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title = $_M['word']['app_shop_set_account_login'];
$active[7] = 'active';
?>
<include file="app/head"/>
<div class="page-content">
    <div class="panel m-b-0">
        <div class="panel-body">
            <input id="secret_key" type="hidden" value="{$_M['config']['met_secret_key']}">
            <form method="POST" class="shopset-login" action="{$_M['url']['app_api']}a=dologin&domain={$_M['url']['site']}&user_id={$_M['form']['user_id']}&user_pass={$_M['form']['user_pass']}&admin_url={$_M['url']['site_admin']}&return_type=jump">
                <h1 class='m-t-20 m-b-30 font-size-20'>{$_M['word']['application_market']}</h1>
                <input type="hidden" name="url_sec" value="{$data.url_sec}">
                <input type="hidden" name="url_fai" value="{$data.url_fai}">
                <div class="form-group">
                    <input type="text" name="user_id" placeholder="{$_M['word']['loginusename']}" required class='form-control inline-block w-300 m-r-20' data-fv-notempty-message="{$_M['word']['enter_user']}">
                    <span class='m-t-10 inline-block'>{$word.app_shop_set_shop_tips14}</span>
                </div>
                <div class="form-group">
                    <input type="password" name="user_pass" placeholder="{$_M['word']['loginpassword']}" required class='form-control inline-block w-300' data-fv-notempty-message="{$_M['word']['Prompt_password']}">
                </div>
                <div class="form-group">
                    {$_M['word']['website_manually']}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{$_M['word']['landing']}</button>
                    <a href="{$_M['url']['adminurl']}anyid=65&n=appstore&c=member&a=doregister" class='m-l-20' hidden style='position:relative;top:2px;'>{$_M['word']['registration']}</a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<include file="sys_admin/foot_v2"/>