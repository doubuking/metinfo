<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title = $_M['word']['app_shop_freight_reftemp_set'];
$active[7]=$set_nav[3]='active';
?>
<include file="app/head"/>
<div class="page-content">
	<div class="panel m-b-0">
		<div class="panel-body">
			<include file="app/set_nav"/>
			<div class="btn-group m-t-20" role="group">
				<button type='button' data-url="{$_M['url']['own_form']}a=docheck" class="btn btn-outline btn-success freight-id">{$word.app_shop_freight_add_ftemp}</button>
				<button type='button' data-url="{$_M['url']['own_form']}a=do_fzone_list" class="btn btn-outline btn-primary freight-zone" data-toggle="modal" data-target=".zone-editor">{$word.app_shop_freight_add_area}</button>
			</div>
			<ul class="list-group list-group-gap m-b-0 freight-list" data-editor-url="{$_M['url']['own_form']}a=docheck" data-del-url='{$_M['url']['own_form']}a=dodel'>
			</ul>
		</div>
	</div>
</div>
<div class="modal fade modal-success quyuselect">
	<div class="modal-dialog modal-center">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">{$word.app_shop_freight_select_area}</h4>
			</div>
			<div class="modal-body">
				<div class="form-group m-b-0">
					<input type="hidden" name="zoneid">
					<select name="multiselect_zone" required class="form-control multiselect-zone" multiple="multiple" data-plugin="multiSelect" data-fv-message="{$word.app_shop_freight_select_area}">
					</select>
				</div>
			</div>
			<div class='modal-footer text-xs-left'>
				<button type="submit" class="btn btn-success">{$word.app_shop_ok}</button>
				<button type='button' class="btn btn-default" data-dismiss="modal">{$word.app_shop_cancel}</button>
				<p class="red-600 m-t-10 m-b-0">{$word.app_shop_freight_tips9}</p>
			</div>
		</div>
	</div>
</div>
<div class="modal fade modal-success zone-editor" data-editor-url="{$_M['url']['own_form']}a=doeditzone" data-del-url="{$_M['url']['own_form']}a=dodelfzone">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">{$word.app_shop_freight_add_area}</h4>
			</div>
			<div class="modal-body">
				<div class="clearfix">
					<button type="button" class="btn btn-info zone-add-country" data-zone_type="-1" data-id="0">{$word.app_shop_freight_add_country}</button>
					<button type="button" class="btn btn-default pull-right zone-refresh" data-url="{$_M['url']['own_form']}a=dorefreshzonecache">{$word.app_shop_freight_refresh_area}</button>
				</div>
				<div class="zone-list"></div>
				<div class="h-500 vertical-align text-xs-center zone-loader"><div class="loader vertical-align-middle loader-default"></div></div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade modal-primary zone-add-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">{$word.app_shop_freight_add}<span></span></h4>
			</div>
			<form action="{$_M['url']['own_form']}a=doaddfzonearr">
				<input type="hidden" name="pid"/>
				<div class="modal-body form-group m-b-0">
					<textarea name="znamearr" rows="15" required placeholder="{$word.app_shop_freight_tips10}" class="form-control"></textarea>
				</div>
				<div class="modal-footer">
					<button type='button' class="btn btn-default" data-dismiss="modal">{$word.app_shop_cancel}</button>
					<button type="submit" class="btn btn-primary">{$word.app_shop_save}</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
<include file="sys_admin/foot_v2"/>