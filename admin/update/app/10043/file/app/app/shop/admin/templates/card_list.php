<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title=$_M['word']['app_shop_vgoods_info'];
$head_no=$foot_no=1;
?>
<include file="sys_admin/head_v2"/>
<div class="panel m-b-0">
    <div class="panel-body">
        <div class="clearfix">
            <h2 class='m-0 font-size-20 pull-xs-left'>{$data.paraname}</h2>
            <a href="{$url.own_form}a=do_set_card&pid={$_M['form']['pid']}&pageset=1" class='font-size-16 pull-xs-right'>{$word.app_shop_back}</a>
        </div>
        <table class="dataTable table table-bordered table-hover table-striped w-full m-t-20 card-list" data-table-ajaxurl="{$_M['url']['own_form']}a=dotable_list_json&pid={$data.pid}&splistid={$data.splistid}" data-editor-url="{$_M['url']['own_form']}a=dosavecard" data-table-pagelength='20' data-plugin="selectable">
            <thead>
                <tr>
                    <th width="400">{$word.app_shop_serial_number}</th>
                    <th width="80" data-table-columnclass="text-xs-center">
                        <select name="state" data-table-search class="form-control">
                            <option value=''>{$word.app_shop_grantable}</option>
                            <option value="1">{$word.app_shop_card_table_row3}</option>
                            <option value="2">{$word.app_shop_card_table_row4}</option>
                            <option value="3">{$word.app_shop_card_table_row5}</option>
                        </select>
                    </th>
                    <th width="150" data-table-columnclass="text-xs-center">{$word.app_shop_addtime}</th>
                    <th width="150" data-table-columnclass="text-xs-center">{$word.app_shop_granttime}</th>
                    <th width="300">{$word.app_shop_grant_user}</th>
                    <th>{$word.app_shop_operator}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6"><div class="h-100 vertical-align text-xs-center"><div class="loader vertical-align-middle loader-default"></div></div></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<include file="sys_admin/foot_v2"/>