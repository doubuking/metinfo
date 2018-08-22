<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title = $_M['word']['app_shop_goods_manager'];
$active[3] = 'active';
$_M['page_class']=$_M['html_class']=$_M['body_class']='h-100p';
?>
<include file="app/head"/>
<iframe src="{$_M['url']['adminurl']}anyid=29&n=product&c=product_admin&a=doindex&module=3&class1={$data.cid}&pageset=1" frameborder="0" width='100%' height='100%' class='pull-xs-left'></iframe>
</div>
<include file="sys_admin/foot_v2"/>