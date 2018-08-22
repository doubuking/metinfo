<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title=$_M['word']['app_shop_vgoods_set'];
$head_no=$foot_no=1;
?>
<include file="sys_admin/head_v2"/>
<div class="panel m-b-0">
    <div class="panel-body">
        <h2 class='m-t-0 font-size-20'>{$data.goods.title}</h2>
        <table class="table table-bordered table-hover table-striped w-full m-t-20 addcards-list">
            <thead>
                <tr>
                    <th>{$word.app_shop_card_table_row1}</th>
                    <th width="250">{$word.app_shop_card_table_row2}</th>
                    <th width="150">{$word.app_shop_operator}</th>
                </tr>
            </thead>
            <tbody>
                <list data="$data['good_splist']" name="$splist" >
                <tr>
                    <td>{$splist.valueliststr}</td>
                    <td>{$splist.card_info.infostr}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm btn-addcards" data-splist_id='{$splist.id}' data-toggle="modal" data-target='.auto-sent-add-modal'>{$word.app_shop_addto}</button>
                        <a href="{$_M['url']['own_form']}a=docard_list&pid={$data.pid}&splistid={$splist.id}&paraname={$splist.paraname}" class='btn btn-primary btn-outline btn-sm m-l-5'>{$word.app_shop_menager}</a>
                    </td>
                </tr>
                </list>
            </tbody>
        </table>
    </div>
</div>
<div class="modal modal-primary fade auto-sent-add-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">{$word.app_shop_card_add_card}</h4>
            </div>
            <form action="{$_M['url']['own_form']}a=doaddcards" method="POST" class="addcards-form">
                <div class="modal-body">
                    <input type="hidden" name="pid" value="{$data.goods.id}">
                    <input type="hidden" name="splist_id">
                    <div class="form-group m-b-0">
                        <textarea name="card_values" rows="10" placeholder="{$word.app_shop_card_tips1}" required class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type='button' class="btn btn-default modal-close" data-dismiss="modal">{$word.app_shop_cancel}</button>
                    <button type="submit" class="btn btn-primary">{$word.app_shop_addto}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<include file="sys_admin/foot_v2"/>