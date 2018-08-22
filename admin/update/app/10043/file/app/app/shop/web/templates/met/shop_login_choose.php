<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$data['page_title'] = $_M['word']['app_shop_placeorder'].$data['page_title'];
$loginbg = $_M['config']['met_member_bgimage']?"background:url(".$_M['config']['met_member_bgimage'].") center / cover no-repeat;":'';
?>
<include file="sys_web/head"/>
<link href="{$_M['url']['own_tem']}css/shop.css?{$met_file_version}" rel='stylesheet' type='text/css'>
<style>
.login-index{background:{$c.met_member_bgcolor};{$loginbg}}
</style>
<div class="p-y-50 login-choose">
    <div class="container">
        <div class="login-member">
            <form method="post" action="{$_M['url']['shop_pay']}&a=dologin" class='met-form'>
                <div class="summary-errors alert alert-danger alert-dismissible p-10 text-xs-center" hidden></div>
                <div class="form-group">
                    <input type="text" name="username" required class="form-control" placeholder="{$_M['word']['logintips']}" data-fv-notempty-message="{$_M['word']['memberRegisterName']}">
                </div>
                <div class="form-group">
                    <input type="password" name="password" required class="form-control" placeholder="{$_M['word']['password']}" data-fv-notempty-message="{$_M['word']['memberPassword']}">
                </div>
                <div class="form-group text-xs-right login_link"><a href="{$_M['url']['shop_member_getpassword']}?lang={$_M['lang']}">{$_M['word']['memberForget']}</a></div>
                <button type="submit" class="btn btn-lg btn-primary btn-squared btn-block">{$_M['word']['memberGo']}</button>
            </form>
            <?php if($_M['config']['met_qq_open']||$_M['config']['met_weixin_open']||$_M['config']['met_weibo_open']){ ?>
            <div class="login_type m-t-20 text-xs-center">
                <p>{$_M['word']['otherlogin']}</p>
                <ul class="blocks-3 m-0">
                    <?php if($_M['config']['met_qq_open']){ ?>
                    <li class='m-b-0'><a title="QQ{$_M['word']['login']}" href="{$_M['url']['login_other']}&type=qq"><i class="fa fa-qq font-size-30"></i></a></li>
                    <?php
                        }
                        if($_M['config']['met_weixin_open'] && !(!is_weixin_client() && is_mobile_client())){
                    ?>
                    <li class='m-b-0'><a href="{$_M['url']['login_other']}&type=weixin"><i class="fa fa-weixin light-green-600 font-size-30"></i></a></li>
                    <?php
                        }
                        if($_M['config']['met_weibo_open']){
                    ?>
                    <li class='m-b-0'><a href="{$_M['url']['login_other']}&type=weibo"><i class="fa fa-weibo red-600 font-size-30"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
            <?php
            }
            if($_M['config']['met_member_register']){
            ?>
            <a class="btn btn-lg btn-info btn-block btn-squared m-t-20" href="{$_M['url']['site']}member/register_include.php?lang={$_M['lang']}">{$_M['word']['logintips1']}</a>
            <?php
            }
            if($_M['config']['shopv2_guest_open']){
            ?>
            <a href='{$_M['url']['shop_pay']}&a=doguest_order' class="btn btn-lg btn-default btn-block btn-squared m-t-15 login-guest-btn">{$_M['word']['app_shop_guest_login']}</a>
            <?php } ?>
        </div>
    </div>
</div>
<include file="sys_web/foot"/>