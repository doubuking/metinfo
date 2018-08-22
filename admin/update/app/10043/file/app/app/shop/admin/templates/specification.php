<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title = $_M['word']['app_shop_spce_setting'];
$foot_no=1;
?>
<include file='sys_admin/head_v2'/>
<form method="POST" action="javascript:;" class='spec-list-form'>
    <div class="metadmin-fmbx paraku-table">
        <h3 class='example-title'>{$word.app_shop_spce_management}</h3>
    </div>
    <table class="table table-bordered table-hover table-striped w-full spec-list" data-plugin="selectable" data-editspec-url="{$_M['url']['own_form']}a=doeditspec" data-addspec-url="{$_M['url']['own_form']}a=doaddspec" data-delspec-url="{$_M['url']['own_form']}a=dodelspec" data-addspecv-url="{$_M['url']['own_form']}a=doaddspecv" data-editspecv-url="{$_M['url']['own_form']}a=doeditspecv" data-delpecv-url="{$_M['url']['own_form']}a=dodelpecv" data-delspec-url="{$_M['url']['own_form']}a=dodelspec" style='border-top: 0;'>
        <thead>
            <tr>
                <th width="250">{$word.app_shop_spce_name}</th>
                <th>{$word.app_shop_spce_value}</th>
                <th width="250">{$word.app_shop_operator}</th>
            </tr>
        </thead>
        <tbody>
        	<list data="$data['spcelist']" name='$v' num='100'>
			<tr>
                <td class='form-group'><input type="hidden" name="id" value="{$v.id}"><input type="text" name="name" value="{$v.name}" placeholder="{$word.app_shop_spce_tips1}" required class="form-control"></td>
                <td class='spec-value-list'>
                	<if value="$v['value']">
                    <?php
                    foreach ($v['value'] as $s) {
                    ?>
                        <div class="w-150 inline-block form-group m-b-0 spec-value-item">
                            <input type="text" name="value" value="{$s.value}" data-vid='{$s.vid}' placeholder="{$word.app_shop_spce_tips2}" required class="form-control">
                            <i class="icon wb-close font-size-12 del-specv" role="button"></i>
                        </div>

                    <?php
                    }
                    ?>
					</if>
                </td>
                <td>
	                <button type="button" class='btn btn-primary btn-sm add-specv'>{$word.app_shop_spce_value_add}</button>
	                <button type="button" class='btn btn-default btn-sm m-l-5 del-spec'>{$word.app_shop_del}</button>
                </td>
			</tr>
			</list>
        </tbody>
        <tfoot>
			<tr class='fixed-b-l bg-blue-grey-100 w-full addlist'>
				<td colspan='3' class='p-x-20' style="border: none;">
					<button type="button" class='btn btn-success btn-sm m-l-5' table-addlist>{$word.app_shop_spce_add}</button>
					<span class='text-help red-600'>{$word.app_shop_spce_tips3}</span>
                	<textarea table-addlist-data hidden>
	                	<tr>
			                <td class='form-group'><input type="hidden" name="id"><input type="text" name="name" value="spec_holder" placeholder="{$word.app_shop_spce_tips1}" required class="form-control"></td>
			                <td class='form-group spec-value-list'></td>
			                <td>
				                <button type="button" class='btn btn-primary btn-sm add-specv'>{$word.app_shop_spce_value_add}</button>
				                <button type="button" class='btn btn-default btn-sm m-l-5 del-spec'>{$word.app_shop_del}</button>
			                </td>
						</tr>
					</textarea>
				</td>
			</tr>
        </tfoot>
    </table>
</form>
<include file='sys_admin/foot_v2'/>