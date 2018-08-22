<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
?>
<ul class="nav nav-tabs nav-tabs-line">
	<li class='nav-item'><a class="nav-link {$set_nav[1]}" href="{$_M['url']['own_name']}c=set&a=doindex">{$word.app_shop_set_basic_setting}</a></li>
	<li class='nav-item'><a class="nav-link {$set_nav[2]}" href="{$_M['url']['own_name']}c=set&a=doset_pay">{$word.app_shop_set_pay_setting}</a></li>
	<li class='nav-item'><a class="nav-link {$set_nav[3]}" href="{$_M['url']['own_name']}c=freight_admin&a=doindex">{$word.app_shop_set_temp_freight_setting}</a></li>
	<li class='nav-item'><a class="nav-link {$set_nav[4]}" href="{$_M['url']['own_name']}c=price_admin&a=doindex">{$word.app_shop_set_price_setting}</a></li>
	<li class='nav-item'><a class="nav-link {$set_nav[5]}" href="{$_M['url']['own_name']}c=discount_admin&a=do_discount_set">{$word.app_shop_set_discount_setting}</a></li>
</ul>