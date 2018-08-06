<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title=$_M['word']['pay_wxpay'];
$_M['pay_nav'][0]['active']='active';
?>
<include file='sys_admin/head_v2'/>
<include file='app/pay_nav'/>
<form method="POST" action="{$_M[url][own_form]}a=dosavewxpay&type={$data.paytype}" target="_self" enctype="multipart/form-data">
    <div class="metadmin-fmbx">
        <h3 class="example-title">{$word.pay_basiccongi}</h3>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_wxapp_id}</label></dt>
            <dd class="form-group">
                <input type="text" name="app_id" class="form-control m-r-10" value="{$data.app_id}">
                <span class="text-help">{$word.pay_wxtips6}</span>
            </dd>
        </dl>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_wxapp_mchid}</label></dt>
            <dd class="form-group">
                <input type="text" name="app_mchid" class="form-control m-r-10" value="{$data.app_mchid}">
                <span class="text-help">{$word.pay_wxtips1}</span>
            </dd>
        </dl>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_wxapp_key}</label></dt>
            <dd class="form-group">
                <input type="text" name="app_key" class="form-control m-r-10" value="{$data.app_key}">
                <span class="text-help">{$word.pay_wxtips2}</span>
            </dd>
        </dl>
        <dl>
            <dt><label class='form-control-label'>{$word.pay_wxapp_secert}</label></dt>
            <dd class="form-group">
                <input type="text" name="app_secert" class="form-control m-r-10" value="{$data.app_secert}">
                <span class="text-help">{$word.pay_wxtips3}</span>
            </dd>
        </dl>
        <dl>
            <dd class="alert dark alert-primary radius0">
                {$word.pay_wxtips4} <a href="https://pay.weixin.qq.com/wiki/doc/api/jsapi.php?chapter=7_3" title="{$word.pay_weixin_help_title}" target="_blank">{$word.pay_course}</a>{$word.pay_wxtips5}"{$_M['url']['site']}shop/，{$_M['url']['site']}pay/"
            </dd>
        </dl>
        <!--
        <h3 class="v52fmbx_hr">证书路径设置</h3>
        <dl>
            <dd class="ftype_description">
                证书路径,注意应该填写绝对路径（仅退款、撤销订单时需要，可登录商户平台下载，API证书下载地址：https://pay.weixin.qq.com/index.php/account/api_cert，下载之前需要安装商户操作证书）<br />
                上传证书前，请先至“安全=>安全与效率”中添加“pem”为“允许上传的文件格式”
            </dd>
        </dl>
        <dl>
            <dt>证书</dt>
            <dd class="ftype_upload">
                <input name="apiclient_cert" type="text" data-upload-type="doupfile" value="{$data.apiclient_cert}"/>
            </dd>
        </dl>
        <dl>
            <dt>证书密钥</dt>
            <dd class="ftype_upload">
                <input name="apiclient_key" type="text" data-upload-type="doupfile" value="{$data.apiclient_key}"/>
            </dd>
        </dl>
        <h3 class="v52fmbx_hr">curl代理设置</h3>
        <dl>
            <dd class="ftype_description">
                这里设置代理机器，只有需要代理的时候才设置，不需要代理，请设置为0.0.0.0和0.本例程通过curl使用HTTP POST方法，此处可修改代理服务器，默认CURL_PROXY_HOST=0.0.0.0和CURL_PROXY_PORT=0，此时不开启代理（如有需要才设置）
            </dd>
        </dl>
        <dl>
            <dt>代理主机</dt>
            <dd class="form-group">
                <input type="text" name="proxy_host" value="{$data.proxy_host}">
            </dd>
        </dl>
        <dl>
            <dt>代理端口</dt>
            <dd class="form-group">
                <input type="text" name="proxy_port" value="{$data.proxy_port}">
            </dd>
        </dl>
        <h3 class="v52fmbx_hr">上报信息配置</h3>
        <dl>
            <dd class="ftype_description">
                接口调用上报等级，默认紧错误上报（注意：上报超时间为【1s】，上报无论成败【永不抛出异常】，不会影响接口调用流程），开启上报之后，方便微信监控请求调用的质量，建议至少开启错误上报。
            </dd>
        </dl>
        <dl>
            <dt>上报等级</dt>
            <dd class="ftype_radio ftype_transverse">
                    <label><input name="report_lev" type="radio" value="0" data-checked="{$data.report_lev}">关闭上报</label>
                    <label><input name="report_lev" type="radio" value="1">仅错误出错上报</label>
                    <label><input name="report_lev" type="radio" value="2">全量上报</label>
            </dd>
        </dl>
        -->
        <dl>
            <dt></dt>
            <dd>
                <input type="submit" value="{$word.Submit}" class="btn btn-primary">
            </dd>
        </dl>
    </div>
</form>
<include file='sys_admin/foot_v2'/>