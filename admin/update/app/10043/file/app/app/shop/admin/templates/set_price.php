<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title = $_M['word']['app_shop_set_price_setting'];
$active[7]=$set_nav[4]='active';
?>
<include file="app/head"/>
<div class="page-content">
    <div class="panel m-b-0">
        <div class="panel-body">
            <include file="app/set_nav"/>
            <form action="{$_M['url']['own_form']}a=doeditor&action=price" class="form-horizontal row m-t-20 set-price">
                <!--<div class="form-group m-b-0">
                    <label class="col-sm-3 col-lg-2 form-control-label">价格小数点位数</label>
                    <div class="col-sm-9 col-lg-10">
                        <input type="input" name="shopv2_price_decimal" class="form-control w-150" value="{$_M['config']['shopv2_price_decimal']}" placeholder="小数点位数" required>
                    </div>
                </div>
                <hr>-->
                <div class="form-group">
                    <label class="col-sm-3 col-lg-2 form-control-label">{$word.app_shop_set_price_default_setting}</label>
                    <div class='col-sm-9 col-lg-10'>
                        <div class="clearfix">
                            <div class="radio-custom radio-primary radio-inline">
                                <input type="radio" name="shopv2_price_set" id='shopv2_price_set0' value="0" data-checked="{$c.shopv2_price_set}">
                                <label for="shopv2_price_set0">{$word.app_shop_set_price_unified_price}</label>
                            </div>
                            <div class="radio-custom radio-primary radio-inline">
                                <input type="radio" name="shopv2_price_set" id='shopv2_price_set1' value="1">
                                <label for="shopv2_price_set1">{$word.app_shop_set_price_by_group}<a href="{$_M['url']['adminurl']}anyid=73&n=user&c=admin_group&a=doindex" title="{$word.app_shop_set_group_setting}" target="_blank" class="m-l-20">{$word.app_shop_set_group_setting}</a></label>
                            </div>
                        </div>
                        <div id="more-collapse" class='collapse<if value="$c['shopv2_price_set']">in</if>'>
                            <div class='m-t-10'>
                                <list data="$data['grouplist']" name="$val" num='20'>
                                <div class='inline-block m-t-10 m-r-20'>
                                    <label class='form-control-label'>{$val.name}：</label>
                                    <div class='form-group inline-block w-100 m-b-0'>
                                        <input type="input" name="group_id_{$val.id}" class="form-control" placeholder="{$word.app_shop_set_price_setting_example}" value="{$val.gdiscount}">
                                    </div>
                                    {$word.app_shop_set_price_zhe}
                                </div>
                                </list>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-b-0"">
                    <div class="col-md-3 col-lg-2"></div>
                    <div class="col-md-9 col-lg-10">
                        <button type="submit" class="btn btn-primary">{$word.app_shop_save}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<include file="sys_admin/foot_v2"/>
