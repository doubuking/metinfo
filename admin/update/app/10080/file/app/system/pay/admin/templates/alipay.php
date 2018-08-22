<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title=$_M['word']['pay_alipay'];
$_M['pay_nav'][1]['active']='active';
?>
<include file='sys_admin/head_v2'/>
<include file='app/pay_nav'/>
<form method="POST" action="{$_M[url][own_form]}a=dosavealipay&type={$data.paytype}" target="_self" enctype="multipart/form-data">
    <div class="metadmin-fmbx">
        <h3 class="example-title">{$word.pay_alipay_openset_tips1}</h3>
        <if value="$data['set_tips_show'] eq 1">
            <dl>
                <dd class="alert dark alert-primary radius0">
                    {$word.pay_alipay_tisps4}
                    <if value="$data['phpvercheck'] eq 1">
                        {$word.pay_alipay_openset_tips2}{$data.phpver}{$word.pay_alipay_openset_tips3}
                    </if>
                    <if value="$data['openssl_sign'] eq 1">
                        {$word.pay_alipay_openset_tips4}
                    </if>
                </dd>
            </dl>
        </if>
        <dl>
            <dt><label class='form-control-label'>APPID</label></dt>
            <dd class="form-group">
                <input type="text" name="app_id" value="{$data.app_id}" class="form-control">
            </dd>
        </dl>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_alipay_private_key}</label></dt>
            <dd class="form-group">
                <textarea name="private_key" rows="5" placeholder='{$word.pat_alipay_private_key}' class='form-control m-r-10' data-fv-callback='true' data-fv-callback-callback='custom' data-fv-callback-message=''>{$data.private_key}</textarea>
                <span class="text-help">
                    <a href="https://openhome.alipay.com/platform/keyManage.htm" target="_blank">{$word.pay_alipay_tips6}</a>
                    <br>
                    <a href="https://docs.open.alipay.com/291/106097/" target="_blank">{$word.pay_alipay_tips7}</a>
                </span>
            </dd>
        </dl>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_public_key}</label></dt>
            <dd class="form-group">
                <textarea name="public_key" rows="5" placeholder='{$word.public_key}' class='form-control m-r-10' data-fv-callback='true' data-fv-callback-callback='custom' data-fv-callback-message="">{$data.public_key}</textarea>
                <span class="text-help">
                    <a href="https://openhome.alipay.com/platform/keyManage.htm" target="_blank">{$word.pay_alipay_tips8}</a>
                </span>
            </dd>
        </dl>
        <h3 class="example-title">{$word.pay_alipay_oldapiset}</h3>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_alipay_app_partner}</label></dt>
            <dd class="form-group">
                <input type="text" name="app_partner" value="{$data.app_partner}" class="form-control m-r-10">
                <span class="text-help">{$word.pay_alipay_tips1}</span>
            </dd>
        </dl>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_alipay_app_seller_email}</label></dt>
            <dd class="form-group">
                <input type="text" name="app_seller_email" value="{$data.app_seller_email}" class="form-control m-r-10">
                <span class="text-help">{$word.pay_alipay_tips2}</span>
            </dd>
        </dl>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_alipay_app_key}</label></dt>
            <dd class="form-group">
                <input type="text" name="app_key" value="{$data.app_key}" class="form-control m-r-10">
                <span class="text-help">{$word.pay_alipay_tips3}</span>
            </dd>
        </dl>
        <!--
        <h3 class="v52fmbx_hr">证书路径设置</h3>
        <dl>
            <dt>证书</dt>
            <dd class="ftype_upload">
                <div class="fbox">
                    <input name="app_cacert" type="text" data-upload-type="doupfile" value="{$app_cacert}"/>
                </div>
            </dd>
        </dl>
        -->
        <dl>
            <dt></dt>
            <dd>
                <input type="submit" value="{$_M['word']['Submit']}" class="btn btn-primary">
            </dd>
        </dl>
    </div>
</form>
<include file='sys_admin/foot_v2'/>