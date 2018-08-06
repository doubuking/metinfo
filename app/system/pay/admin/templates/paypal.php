<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title='PayPal';
$_M['pay_nav'][4]['active']='active';
?>
<include file='sys_admin/head_v2'/>
<include file='app/pay_nav'/>
<form method="POST" action="{$_M[url][own_form]}a=dosavepaypal&type={$data.paytype}" target="_self" enctype="multipart/form-data">
    <div class="metadmin-fmbx">
        <h3 class="example-title">{$word.pay_aipmodset}</h3>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_aiptype}</label></dt>
            <dd>
                <div class="radio-custom radio-primary radio-inline">
                    <input name="open" type="radio" value="1" id='radio1' data-checked="{$data.open}">
                    <label for='radio1'>{$word.pay_paypal_sandbox}</label>
                </div>
                <div class="radio-custom radio-primary radio-inline">
                    <input name="open" type="radio" value="2" id='radio2'>
                    <label for='radio2'>{$word.pay_paypal_live}</label>
                </div>
            </dd>
        </dl>
        <h3 class="example-title">{$word.pay_paypal_liveset}</h3>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_paypal_usermail}</label></dt>
            <dd class="form-group">
                <input type="text" name="user" class="form-control" value="{$data.user}">
            </dd>
        </dl>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_paypal_pass}</label></dt>
            <dd class="form-group">
                <input type="text" name="password" class="form-control" value="{$data.password}">
            </dd>
        </dl>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_paypal_signature}</label></dt>
            <dd class="form-group">
                <input type="text" name="signature" class="form-control" value="{$data.signature}">
            </dd>
        </dl>
        <h3 class="example-title">{$word.pay_paypal_sanboxset}</h3>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_paypal_usermail}</label></dt>
            <dd class="form-group">
                <input type="text" name="user_sandbox" class="form-control" value="{$data.user_sandbox}">
            </dd>
        </dl>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_paypal_pass}</label></dt>
            <dd class="form-group">
                <input type="text" name="password_sandbox" class="form-control" value="{$data.password_sandbox}">
            </dd>
        </dl>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_paypal_signature}</label></dt>
            <dd class="form-group">
                <input type="text" name="signature_sandbox" class="form-control" value="{$data.signature_sandbox}">
            </dd>
        </dl>
        <dl>
            <dt> </dt>
            <dd>
                <input type="submit" value="{$word.Submit}" class="btn btn-primary">
            </dd>
        </dl>
    </div>
</form>
<include file='sys_admin/foot_v2'/>