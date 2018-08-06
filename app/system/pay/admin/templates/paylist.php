<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title=$_M['word']['pay_management'];
?>
<include file='sys_admin/head_v2'/>
<form method="POST" action="{$_M[url][own_form]}a=dosavepaymentconfig" target="_self" enctype="multipart/form-data">
    <div class="metadmin-fmbx">
        <dl>
            <dt><label class='form-control-label'>{$word.pay_payswitch}</label></dt>
            <dd>
                <div class="radio-custom radio-primary radio-inline">
                    <input name="payment_open" type="radio" value="1" id='radio1' data-checked="{$data.payment_open}"/>
                    <label for="radio1">{$word.open}</label>
                </div>
                <div class="radio-custom radio-primary radio-inline">
                    <input name="payment_open" type="radio" value="0" id='radio0'/>
                    <label for="radio0">{$word.close}</label>
                </div>
            </dd>
        </dl>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_apimanage}</label></dt>
            <dd>
                <div class="checkbox-custom checkbox-primary checkbox-inline">
                    <input name="payment_type" type="checkbox" id='checkbox1' value="1" data-checked="{$data.payment_type}">
                    <label for='checkbox1'>{$word.pay_wxscan}</label>
                </div>
                <div class="checkbox-custom checkbox-primary checkbox-inline">
                    <input name="payment_type" type="checkbox" id='checkbox6' value="6">
                    <label for='checkbox6'>{$word.pay_wxJsApiPay}</label>
                </div>
                <div class="checkbox-custom checkbox-primary checkbox-inline">
                    <input name="payment_type" type="checkbox" id='checkbox7' value="7">
                    <label for='checkbox7'>{$word.pay_wxh5}<span style="color: red">({$word.pay_new})</span></label>
                </div>
                <div class="checkbox-custom checkbox-primary checkbox-inline">
                    <input name="payment_type" type="checkbox" id='checkbox2' value="2">
                    <label for='checkbox2'>{$word.pay_alipaywappay}<span style="color: red">({$word.pay_new})</span></label>
                </div>
                <div class="checkbox-custom checkbox-primary checkbox-inline">
                    <input name="payment_type" type="checkbox" id='checkbox3' value="3">
                    <label for='checkbox3'>{$word.pay_alipay}</label>
                </div>
                <div class="checkbox-custom checkbox-primary checkbox-inline">
                    <input name="payment_type" type="checkbox" id='checkbox4' value="4">
                    <label for='checkbox4'>{$word.pay_upayb2c}</label></div>
                <div class="checkbox-custom checkbox-primary checkbox-inline">
                    <input name="payment_type" type="checkbox" id='checkbox9' value="9">
                    <label for='checkbox9'>{$word.pay_upayb2b}<span style="color: red">({$word.pay_new})</span></label>
                </div>
                <div class="checkbox-custom checkbox-primary checkbox-inline">
                    <input name="payment_type" type="checkbox" id='checkbox5' value="5">
                    <label for='checkbox5'>PayPal</label>
                </div>
            </dd>
        </dl>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_coinprefix}</label></dt>
            <dd class="form-group">
                <input type="text" name="pay_price_str_prefix" class="form-control w-100 m-r-10" value="{$data.pay_price_str_prefix}">
            </dd>
        </dl>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_coinsuffix}</label></dt>
            <dd class="form-group">
                <input type="text" name="pay_price_str_suffix" class="form-control w-100 m-r-10" value="{$data.pay_price_str_suffix}">
            </dd>
        </dl>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_tips1}</label></dt>
            <dd class="form-group">
                <textarea name="pay_charger_tips1" data-plugin='editor' data-editor-y='100' hidden>{$data.pay_charger_tips1}</textarea>
            </dd>
        </dl>
        <dl>
            <dt></dt>
            <dd>
                <input type="submit" value="{$_M['word']['Submitall']}" class="btn btn-primary">
            </dd>
        </dl>
    </div>
</form>
<include file='sys_admin/foot_v2'/>