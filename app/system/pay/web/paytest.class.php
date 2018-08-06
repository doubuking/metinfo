<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
load::sys_class('web');

class paytest extends web {
    public function __construct() {
        global $_M;
        parent::__construct();
    }

    public function doinex (){
        global $_M;
        $orderid = date('YmdHis').random(5, 1);;
        $goodsname = 'testgoods' . random(3);

        echo <<<EOT
<html>
<head>
<h1>paytest</h1>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body >
    <!--<form id="pay_form"  action="http://met6.com/pay/paytest.php" method="post">-->
    <form id="pay_form"  action="{$_M['url']['site']}pay/dopay.php" method="post">
    
    <h4>商品描述(必须)  body</h4>
    <input type="input" name="body" id="body" value="{$goodsname}" />
    <h4>商品名称(必须) subject</h4>
    <input type="input" name="subject" id="subject" value="{$goodsname}" />
    <h4>订单编号(必须) out_trade_no</h4>
    <input type="input" name="out_trade_no" id="out_trade_no" value="{$orderid}" />
    <h4>附加数据 attach</h4>
    <input type="input" name="attach" id="attach" value="" />
    <h4>商品标记 goods_tag</h4>
    <input type="input" name="goods_tag" id="goods_tag" value="" />
    <h4>产品编号 product_id</h4>
    <input type="input" name="product_id" id="product_id" value="" />
    <h4>订单金额(必须) total_fee</h4>
    <input type="input" name="total_fee" id="total_fee" value="0.01" />
    <h4>应用编号(必须) no</h4>
    <input type="input" name="no" id="no" value="10086110" />
    <h4>用户id (必须) uid</h4>
    <input type="input" name="uid" id="uid" value="10086" />
    <h4>跳转地址 (必须) callback_url</h4>
    <input type="input" name="callback_url" id="callback_url" value="{$_M['url']['site']}pay/finance.php" />
    <br/>
    <input type="submit" type="提交订单">
    
    </form>
</body>
</html>
EOT;



    }

    /*public function dopaytest(){
        global $_M;
        $data['body'] = $_M['form']['body'];
        $data['subject'] = $_M['form']['subject'];
        $data['out_trade_no'] = $_M['form']['out_trade_no'];
        $data['product_id'] = $_M['form']['product_id'];
        $data['no'] = $_M['form']['no'];
        $data['total_fee'] = $_M['form']['total_fee'];
        dump($data);


        $strcode = load::mod_class('pay/web/include/class/interface_pay', 'new')->data_encode($data);
        $pay_list = load::mod_class('pay/web/include/class/interface_pay', 'new')->get_pay_list();
        foreach($pay_list as $key=>$val){
            $pay_list[$key]['url'] = "{$val['url']}&strcode={$strcode}";
        }
        echo <<<EOT
<html>
<head>
<h1>paytest</h1>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body >
EOT;
        foreach ($pay_list as $key => $bal) {
            echo "<a href = '{$pay_list[$key]["url"] }'>{$key}</a><br>";
        }
echo <<<EOT
</body>
</html>
EOT;
        #$this->template("tem/index");

    }*/
}
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>