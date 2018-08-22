<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title = $_M['word']['app_shop_discount_sale'];
$active[7]=$set_nav[5]='active';
?>
<include file="app/head"/>
<div class="page-content">
    <div class="panel m-b-0">
        <div class="panel-body">
            <include file="app/set_nav"/>
            <form action="{$_M['url']['own_form']}a=do_discount_editor" class="form-horizontal row m-t-20 discount-set">
                <div class="form-group">
                    <label class="col-sm-3 col-lg-2 form-control-label">{$word.app_shop_discount_sale_goods_num}</label>
                    <div class="col-sm-9 col-lg-10">
                        <div class="m-t-5">
                            <input type="checkbox" name="shopv2_discount_type_1" value='{$c.shopv2_discount_type_1}' data-plugin="switchery" hidden data-checked='1'>
                        </div>
                        <table class="table table-bordered table-hover table-striped m-t-10 w-300">
                            <thead>
                                <tr>
                                    <th>{$word.app_shop_discount_amount}</th>
                                    <th>{$word.app_shop_discount_discount}</th>
                                    <th>
                                        <button type="button" class='btn btn-primary btn-sm btn-add-pdiscount' table-addlist>{$word.app_shop_addto}</button>
                                        <textarea table-addlist-data hidden>
                                            <tr>
                                                <td class='form-group'>
                                                    <input type="input" name="pnum_new_" class="form-control" placeholder="{$word.app_shop_not_null_tips}" required data-fv-notEmpty-message='{$word.app_shop_not_null_tips}'>
                                                </td>
                                                <td class='form-group'>
                                                    <input type="input" name="pdiscount_new_" class="form-control" placeholder="{$word.app_shop_not_null_tips}" required data-fv-notEmpty-message='{$word.app_shop_not_null_tips}'>
                                                </td>
                                                <td><button type="button" class='btn btn-primary btn-sm' table-del>{$word.app_shop_del}</button></td>
                                            </tr>
                                        </textarea>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['discount_plan'] as $key => $val) { ?>
                                <tr>
                                    <td class='form-group'>
                                        <input type="input" name="pnum_{$key}" class="form-control" placeholder="{$word.app_shop_not_null_tips}" required data-fv-notEmpty-message='{$word.app_shop_not_null_tips}' value="{$key}">
                                    </td>
                                    <td class='form-group'>
                                        <input type="input" name="pdiscount_{$key}" class="form-control" placeholder="{$word.app_shop_not_null_tips}" required data-fv-notEmpty-message='{$word.app_shop_not_null_tips}' value="{$val}">
                                    </td>
                                    <td><button type="button" class='btn btn-primary btn-sm' table-del>{$word.app_shop_del}</button></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-lg-2 form-control-label">{$word.app_shop_discount_sale_static}</label>
                    <div class="col-sm-9 col-lg-10">
                        <div class="m-t-5">
                            <input type="checkbox" name="shopv2_discount_type_2" value='{$c.shopv2_discount_type_2}' data-plugin="switchery" hidden data-checked='1'>
                        </div>
                        <label class="form-control-label">{$word.app_shop_discount_order_free}</label>
                        <input type="input" name="shopv2_discount_static" class="form-control inline-block w-100" placeholder="" value="{$_M['config']['shopv2_discount_static']}">
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
