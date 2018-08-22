<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
?>
<div class="page">
	<div class="page-content">
		<div class="panel m-b-0">
			<div class="panel-body">
				<form action="{$_M['url']['own_form']}a=dosavefreight" class="zone-form">
					<input type="hidden" name="id" value="{$_M['form']['id']}">
					<div class="form-group">
						<input type="text" name="name" value="{$data['freight']['name']}" placeholder="{$word.app_shop_freight_temp_name}" required class="form-control" data-fv-notempty-message="{$_M['word']['js41']}">
					</div>
					<div class="form-group m-b-10">
						<div class="table-responsive">
							<table class="table m-b-0 editor-region">
								<thead>
									<tr>
										<th width="230">{$word.app_shop_freight_distribution_area}</th>
										<th>{$word.app_shop_freight_first_piece}</th>
										<th>{$word.app_shop_freight_freight}</th>
										<th>{$word.app_shop_freight_continued}</th>
										<th>{$word.app_shop_freight_renew}</th>
									</tr>
								</thead>
								<tbody></tbody>
								<tfoot>
									<th colspan="5">
										<button type='button' data-target=".quyuselect" data-toggle="modal" class="btn btn-outline btn-success btn-sm newquyuselect">{$word.app_shop_freight_add_distribution_area}</button>
									</th>
								</tfoot>
							</table>
						</div>
					</div>
					<div>
						<button type="submit" class="btn btn-primary m-r-10 editor-btn">{$word.app_shop_save}</button>
						<button type='button' class="btn btn-default slidePanel-close editor-btn">{$word.app_shop_cancel}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>