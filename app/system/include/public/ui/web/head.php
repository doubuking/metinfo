<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
?>
<include file="metinfo.inc.php"/>
<?php $met_page=$template_type=='ui'?'index':''; ?>
<include file="head" page="$met_page"/>
<?php if(file_exists(PATH_OWN_FILE."templates/met/css/metinfo.css")){ ?>
<link href="{$_M['url']['own_tem']}css/metinfo.css?{$met_file_version}" rel='stylesheet' type='text/css'>
<?php } ?>