<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$data['page_title'] =$_M['word']['pay_accountrecharge'].$data['page_title'];
?>
<include file="sys_web/head"/>
<div class="page bg-pagebg1">
    <div class="container">
        <div class="page-content row">
            <include file='user_sidebar'/>
            <div class="col-lg-9">
                <div class="panel m-b-0" boxmh-mh>
                    <div class="panel-body shop-pay-recharge">
                        <form method="POST" class="met-form-validation pay-recharge" action="{$_M['url']['dopayrecharge']}">
                            <div class="form-group">
                                <label class="control-label">{$word.pay_balance} : </label>
                                <span class="tag tag-lg tag-success radius0" style="line-height:inherit;">{$data.balance.balance_str}</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{$word.pay_amount}</label><br>
                                <input type="text" class="form-control w-200 inline-block" name="price" autocomplete="off" required="" data-fv-notempty-message="{$word.pay_input_amoun}" data-fv-greaterthan="true" data-fv-greaterthan-value="0.1" data-fv-field="price">
                            </div>
                            <div>{$data.pay_charger_tips1}</div>
                            <div class="form-group m-b-0">
                                <button type="submit" class="btn btn-primary btn-squared">{$word.pay_dopay}</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<include file="sys_web/foot"/>