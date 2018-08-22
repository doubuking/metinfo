<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
?>
<ul class="nav nav-tabs nav-tabs-line m-b-10">
	<list data="$_M['pay_nav']" name="$v">
	<li class='nav-item'><a class="nav-link {$v['active']}" href="{$v.url}">{$v.name}</a></li>
	</list>
</ul>
<div class="alert alert-danger">{$word.pay_tips2}</div>