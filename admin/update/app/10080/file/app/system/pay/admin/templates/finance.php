<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title=$_M['word']['pay_financialdeta'];
?>
<include file='sys_admin/head_v2'/>
<div class="bars">
    <div class="btn-group" role="group">
        <button class="btn btn-outline btn-default font-weight-unset" data-target="#finance-deposit" data-toggle="modal">
            <i class="icon wb-plus m-r-5" aria-hidden="true"></i>{$word.pay_finance_in}
        </button>
        <button class="btn btn-outline btn-default font-weight-unset" data-target="#finance-debit" data-toggle="modal">
            <i class="icon wb-minus m-r-5" aria-hidden="true"></i>{$word.pay_finance_out}
        </button>
        <button class="btn btn-default btn-outline" data-toggle="collapse" data-target="#moreseach" aria-expanded="false" aria-controls="moreseach">
            <i class="wb-search m-r-5" aria-hidden="true"></i>{$word.pay_screen}
        </button>
    </div>
</div>
<div class="collapse" id="moreseach" aria-expanded="true">
    <div class="well m-b-0 m-t-10">
        <div class="row">
            <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3">
                <div class="form-group form-inline input-daterange clearfix">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon wb-calendar"></i></span>
                        <input type="text" name="fromtime" class="form-control" data-table-search="true" data-plugin='datepicker'>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">{$word.pay_till}</span>
                        <input type="text" name="totime" class="form-control" data-table-search="true" data-plugin='datepicker'>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="w-100">
                <select name="type" data-table-search="true" class="form-control">
                    <option value="">{$word.type}</option>
                    <option value="1">{$word.pay_finance_in}</option>
                    <option value="2">{$word.pay_finance_out}</option>
                </select>
            </div>
        </div>
        <div class="form-group m-b-0">
            <input type="text" class="form-control" style='max-width: 300px;' name="username" data-table-search="true" placeholder="{$word.pay_membername}">
        </div>
    </div>
</div>
<table class="table table-hover table-bordered dataTable table-striped w-full m-t-10" id="finance-list" data-table-ajaxurl="{$_M['url']['own_form']}a=dojson_finance_list" data-table-pagelength='20'>
    <thead>
        <tr>
            <th width="160">{$word.time}</th>
            <th>{$word.pay_finance_in}</th>
            <th>{$word.pay_finance_out}</th>
            <th>{$word.balance}</th>
            <th>{$word.pay_membername}</th>
            <th>{$word.pay_reason}</th>
            <th width="150">{$word.pay_opuser}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="7"><div class="h-200 vertical-align text-xs-center"><div class="loader vertical-align-middle loader-default"></div></div></td>
        </tr>
    </tbody>
</table>
<div class="modal fade modal-danger" id="finance-deposit" aria-hidden="true" aria-labelledby="finance-deposit" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-center modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type='button' class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">{$word.pay_finance_in}</h4>
            </div>
            <form action="{$_M[url][own_form]}a=doaddfinance" class="finance-form">
                <div class="modal-body">
                    <input type="hidden" name="type" value="1">
                    <div class="form-group">
                        <input type="text" name="price" placeholder="{$word.pay_price}" required class="form-control" data-fv-notempty-message="{$_M['word']['js41']}" data-fv-greaterthan="true" data-fv-greaterthan-value="0.1">
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" placeholder="{$word.pay_membername}" required class="form-control" data-fv-notempty-message="{$_M['word']['js41']}">
                    </div>
                    <div class="form-group m-b-0">
                        <textarea name="reason" rows="3" placeholder="{$word.pay_reason}" required class="form-control" data-fv-notempty-message="{$_M['word']['js41']}"></textarea>
                    </div>
                </div>
                <div class='modal-footer text-xs-left'>
                    <button type="sbumit" class="btn btn-danger">{$word.confirm}</button>
                    <button type='button' class="btn btn-default" data-dismiss="modal">{$word.cancel}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade modal-success" id="finance-debit" aria-hidden="true" aria-labelledby="finance-debit" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-center modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type='button' class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">{$word.pay_finance_out}</h4>
            </div>
            <form action="{$_M[url][own_form]}a=doaddfinance" class="finance-form">
                <div class="modal-body">
                    <input type="hidden" name="type" value="2">
                    <div class="form-group">
                        <input type="text" name="price" placeholder="{$word.pay_price}" required class="form-control" data-fv-notempty-message="{$_M['word']['js41']}" data-fv-greaterthan="true" data-fv-greaterthan-value="0.1">
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" placeholder="{$word.pay_membername}" required class="form-control" data-fv-notempty-message="{$_M['word']['js41']}">
                    </div>
                    <div class="form-group m-b-0">
                        <textarea rows="3" name="reason" placeholder="{$word.pay_reason}" required class="form-control" data-fv-notempty-message="{$_M['word']['js41']}"></textarea>
                    </div>
                </div>
                <div class='modal-footer text-xs-left'>
                    <button type="sbumit" class="btn btn-success">{$word.confirm}</button>
                    <button type='button' class="btn btn-default" data-dismiss="modal">{$word.cancel}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<include file='sys_admin/foot_v2'/>