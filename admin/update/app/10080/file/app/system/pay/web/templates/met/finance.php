<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$data['page_title'] =$_M['word']['pay_consumption_detail'].$data['page_title'];
?>
<include file="sys_web/head"/>
<div class="page bg-pagebg1">
    <div class="container">
        <div class="page-content row">
            <include file='user_sidebar'/>
            <div class="col-lg-9">
                <div class="panel m-b-0" boxmh-mh>
                    <div class='panel-body shop-finance'>
                        <div class="clearfix">
                            <div class="pull-xs-left">
                                <label class="control-label">{$word.pay_balance} : </label>
                                <span class="tag tag-lg tag-success radius0" style="line-height:inherit;">{$data.balance.balance_str} </span>
                            </div>
                            <a href="{$_M['url']['recharge']}" class="btn btn-outline btn-success addr-btn btn-squared pull-xs-right">{$word.pay_recharge}</a>
                        </div>
                        <table class="dataTable table table-bordered table-hover table-striped w-full m-t-10" cellspacing="0" id="finance-list" data-table-ajaxurl="{$_M['url']['own_form']}a=dotable_list_json" data-table-pagelength='20' data-plugin="selectable">
                            <thead>
                                <tr>
                                    <th width="160">{$word.pay_time}</th>
                                    <th>{$word.pay_price}</th>
                                    <th>{$word.pay_balance}</th>
                                    <th>{$word.pay_reason}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<include file="sys_web/foot"/>