<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
?>
<div class="modal fade modal-primary" id="addr-edit-modal">
	<div class="modal-dialog modal-center modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">{$_M['word']['app_shop_address']}</h4>
			</div>
			<form action="{$_M['url']['shop_addr_editor']}" class="addr-edit-form">
				<input type="hidden" name="id">
				<input type="hidden" name="zone_code">
				<input type="hidden" name="zone_coun">
				<input type="hidden" name="zone_p">
				<input type="hidden" name="zone_c">
				<input type="hidden" name="zone_d">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" name="name" placeholder="{$_M['word']['app_shop_consigneename']}" required data-fv-notempty-message="{$_M['word']['noempty']}">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="tel" placeholder="{$_M['word']['app_shop_consigneetel']}" required data-fv-notempty-message="{$_M['word']['noempty']}">
					</div>
					<div class="form-group select-linkage shop-address-select" data-plugin='select-linkage' data-select-url='{$url.site}app/app/shop/admin/templates/js/zone_{$data.lang}.js?mtime={$data.zonemtime}'>
						<select class="form-control country" data-name="zone_coun" required data-fv-notempty-message="{$_M['word']['noempty']}"></select>
						<select class="form-control prov m-t-10" data-name="zone_p" required data-fv-notempty-message="{$_M['word']['noempty']}"></select>
						<select class="form-control city m-t-10" data-name="zone_c" required data-fv-notempty-message="{$_M['word']['noempty']}"></select>
						<select class="form-control dist m-t-10" data-name="zone_d" required data-fv-notempty-message="{$_M['word']['noempty']}"></select>
					</div>
					<div class="form-group m-b-0">
						<textarea class="form-control" rows="3" name="zone_a" placeholder="{$_M['word']['app_shop_consigneeaddress']}" required data-fv-notempty-message="{$_M['word']['noempty']}"></textarea>
					</div>
				</div>
				<div class="modal-footer text-xs-left">
					<button type="submit" class="btn btn-primary btn-squared">{$_M['word']['app_shop_save']}</button>
					<button type="button" class="btn btn-default btn-squared" data-dismiss="modal">{$_M['word']['app_shop_cancel']}</button>
				</div>
			</form>
		</div>
	</div>
</div>