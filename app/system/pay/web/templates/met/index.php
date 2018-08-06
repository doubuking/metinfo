<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$data['page_title'] =$_M['word']['pay_order_pay'];
?>
<include file="sys_web/head"/>
<div class="page bg-pagebg1">
    <div class="container">
        <div class="page-content row">
            <div class="panel">
                <div class="panel-body row pay-order-top">
                    <div class="col-lg-2 col-md-2 text-xs-center">
                        <i class="icon wb-check-circle font-size-80 green-400" aria-hidden="true"></i>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <h1 class='text-xs-center text-md-left'>{$word.pay_ordersuccess}</h1>
                        <if value="$data['order']['countdown']">
                        <p>{$word.pay_please} <span class="red-600">{$data.order.countdown}</span> {$word.pay_pleasepayment}</p>
                        </if>
                        <p>{$word.pay_ordernumber} : <span class="m-r-20 red-600">{$data.order.out_trade_no}</span>
                            <br class='hidden-sm-up'>
                            {$word.pay_subject} : <span class="m-r-20 red-600">{$data.order.subject}</span>
                            <br class='hidden-sm-up'>
                            <!--<a href="javascript:void(0)" class="grey-600 dropdown-toggle" data-toggle="collapse" data-target="#order-info">{$word.pay_orderdetails}[订单详情]</a>-->
                        </p>
                        <!--<div class="collapse" id="order-info">
                            <div class="well m-b-0">
                                <div>{$word.pay_receiving}[收货信息] : {$data.order.address_str.}</div>
                                <div class="m-t-10 clearfix">
                                    <div class='pull-md-left m-r-5'>{$word.pay_commodity}[商品] :</div>
                                    <div class='pull-md-left'>

                                        <lista data="$data.goods_list" name="$good">
                                        <span class='m-r-10'>{$good.pname}-{$good.para}</span>

                                            <span class='m-r-10'>{$good.pname}-{$good.para}</span>
                                        </lista>
                                    </div>
                                </div>

                                <if value="$data['order']['invoice_info']">
                                <p class="m-b-0 m-t-10">{$word.pay_invoice}[发票] : {$data.order.invoice_info.0} {$data.order.invoice_info.1} {$data.order.invoice_info.2} {$data.order.invoice_info.3}</p>
                                </if>

                            </div>
                        </div>-->
                    </div>
                    <div class="col-lg-3 col-md-4 text-md-right font-size-20 pay-order-price">
                        {$word.pay_paytotal} :
                       <span class="red-600 font-size-24">{$data.order.total_fee_str}</span>
                    </div>
                </div>
            </div>
            <div class="panel m-b-0">
                <div class="panel-body">
                    <if value="$data['payment_open']">
                        <h2 class="panel-title p-0">{$word.pay_paymod}</h2>
                    <else/>
                        <h2 class="panel-title p-0">{$word.pay_clse_tips}</h2>
                    </if>
                    <hr class='m-b-20'>
                    <ul class="blocks-xs-2 blocks-sm-3 blocks-md-4 blocks-lg-5 blocks-xl-6 pay-order-mode-body">
                        <if value="$data['pay_list']['alipay']">
                        <li class="text-xs-center pay-order-zhifubao" data-toggle="modal" data-target="#pay-order-modal">
                            <a class="block cover pay-online"  href="{$data.pay_list.alipay.url}" " target="_blank">
                            <img src="{$_M[url][own_tem]}img/payOnline_zfb.png" class='img-fluid inline-block'/></a>
                        </li>
                        </if>
                        <if value="$data['pay_list']['alipaywap']">
                            <li class="text-xs-center pay-order-zhifubao" data-toggle="modal" data-target="#pay-order-modal">
                                <a class="block cover pay-online"  href="{$data.pay_list.alipaywap.url}" " target="_blank">
                                <img src="{$_M[url][own_tem]}img/payOnline_zfb.png" class='img-fluid inline-block'/></a>
                            </li>
                        </if>
                        <if value="$data['pay_list']['tenpay']">
                        <li class="text-xs-center pay-order-zhifubao" data-toggle="modal" data-target="#pay-order-modal">
                             <a class="block cover pay-online"  href="{$data.pay_list.tenpay.url}"  target="_blank"><img src="{$_M[url][own_tem]}img/tenpay.png" class='img-fluid inline-block'/></a>
                        </li>
                        </if>
                        <if value="$data['pay_list']['weixin']">
                        <li class="text-xs-center pay-order-weixin">
                            <a class="block cover pay-online payment-weixin" href="{$data.pay_list.weixin.url}" data-url="{$data.pay_list.weixin.url}" target="_blank" data-check_url="{$data.pay_list.weixin.check_url}">
                            <img src="{$_M[url][own_tem]}img/weixinpay.png" class='img-fluid inline-block'/></a>
                        </li>
                        <!-- Modal -->
                        <div class="modal fade modal-primary" id="payment-weixin-modal" aria-hidden="true" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-center modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title">{$word.pay_scanpayment}</h4>
                                    </div>
                                    <div class="modal-body text-xs-center">

                                    </div>
                                </div>
                            </div>
                        </div>
                        </if>
                        <if value="$data['pay_list']['weixin_h5']">
                        <li class="text-xs-center pay-order-weixin">
                            <a class="block cover pay-online payment-weixin-h5" href="{$data.pay_list.weixin_h5.url}" data-url="{$data.pay_list.weixin_h5.url}" data-check_url="{$data.pay_list.weixin_h5.check_url}">
                            <img src="{$_M[url][own_tem]}img/weixinpay.png" class='img-fluid inline-block'/></a>
                        </li>
                        <!-- End Modal -->
                        <!-- Modal -->
                        <div class="modal fade modal-primary" id="payment-weixin-h5-modal" aria-hidden="true" role="dialog" tabindex="-1">
                            <div class="modal-dialog modal-center modal-sm">
                                <div class="h-100 vertical-align text-xs-center order-loader"><div class="loader vertical-align-middle loader-default"></div></div>
                            </div>
                        </div>
                        <!-- End Modal -->
                        </if>
                        <!--微信H5-->
                        <if value="$data['pay_list']['weixin_web_h5']">
                        <li class="text-xs-center pay-order-weixin-web-h5" data-toggle="modal" data-target="#pay-order-modal">
                            <a class="block cover pay-online payment-weixin-web-h5"  href="{$data.pay_list.weixin_web_h5.url}" data-url="{$data.pay_list.weixin_web_h5.url}" data-check_url="{$data.pay_list.weixin_web_h5.check_url}" target="_blank">
                            <img src="{$_M[url][own_tem]}img/weixinpayH5.png" class='img-fluid inline-block'/></a>
                        </li>
                        </if>
                        <!--银联b2c-->
                        <if value="$data['pay_list']['upay']">
                        <li class="text-xs-center pay-order-union" data-toggle="modal" data-target="#pay-order-modal">
                            <a class="block cover pay-online" href="{$data.pay_list.upay.url}" target="_blank">
                            <img src="{$_M[url][own_tem]}img/unionpay.png" class='img-fluid inline-block'/></a>
                        </li>
                        </if>
                        <!--银联b2b-->
                        <if value="$data['pay_list']['upayb2b']">
                        <li class="text-xs-center pay-order-unionb2b" data-toggle="modal" data-target="#pay-order-modal">
                            <a class="block cover pay-online" href="{$data.pay_list.upayb2b.url}"  target="_blank">
                            <img src="{$_M[url][own_tem]}img/unionpayb2b.png" class='img-fluid inline-block'/></a>
                        </li>
                        </if>
                        <!--paypal-->
                        <if value="$data['pay_list']['paypal']">
                        <li class="text-xs-center pay-order-union" data-toggle="modal" data-target="#pay-order-modal">
                            <a class="block cover pay-online" href="{$data.pay_list.paypal.url}" data-url="{$data.pay_list.paypal.url}" target="_blank">
                            <img src="{$_M[url][own_tem]}img/paypal.png" class='img-fluid inline-block'/></a>
                        </li>
                        </if>
                    </ul>
                    <!--
                    <php
                    $disabled = $user_have_balance?'':' disabled';
                    $balanceinput = $user_have_balance?'data-target="#balanceinput"':'';
                    $hide = $user_have_balance?' hidden':'';
                    $validation=$user_have_balance?' class="met-form-validation"':'';
                    ?>
                    -->
                    <!--余额支付ss-->
                    <if value="$data['payment_open']">
                        <if value="$data['order']['no'] neq 10080">
                            <if value="$data['balance']['user_have_balance']">
                                <a class="btn btn-lg btn-outline btn-default btn-squared m-b-10 pay-oder-balance" data-toggle="collapse" data-target="#balanceinput">
                                    {$word.pay_balancepay}
                                    <span class="red-600">
                                        {$data.balance.balance_str}
                                    </span>
                                </a>
                                <br>
                                <div class="collapse" id="balanceinput">
                                    <div class="well m-b-0"">
                                        <form method="post" action="{$data.balance.url}" class="met-form-validation" id="pay-balance">
                                            <input name="id" type="hidden" value="{$order[id]}">
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control" placeholder="{$word.memberPassword}" required data-fv-notempty-message="{$word.memberPassword}">
                                            </div>
                                            <div class="form-group m-b-0">
                                                <button type="submit" class="btn btn-primary">{$word.pay_ok}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <else />
                                <a href="{$_M['url']['recharge']}" target="_blank" class="btn btn-lg btn-outline btn-default btn-squared font-size-14 red-600">{$word.pay_recharge}</a>
                            </if>
                        </if>
                    </if>
                    <!--//余额支付-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade modal-default" id="pay-order-modal" aria-hidden="true" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-center modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">{$word.pay_beingpaid}</h4>
            </div>
            <div class="modal-body text-xs-center p-y-0 blue-grey-300">
                <i class="icon wb-payment" aria-hidden="true" style="font-size:200px;"></i>
            </div>
            <div class="modal-footer text-xs-center">
                <a class="btn btn-block btn-lg btn-success btn-squared m-b-20" href="{$_M['url']['callback']}&out_trade_no={$data.order.out_trade_no}">{$word.pay_paidok}</a>
                <a class="btn btn-block btn-lg btn-danger btn-squared white" data-dismiss="modal" aria-label="Close">{$word.pay_paiderror}</a>
            </div>
        </div>
    </div>
</div>
<script>
var paidokurl = '{$_M['url']['callback']}&out_trade_no={$data['order']['out_trade_no']}';
</script>
<include file="sys_web/foot"/>