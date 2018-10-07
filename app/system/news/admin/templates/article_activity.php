<!--<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

require $this->template('ui/head');
echo <<<EOT
-->
<link rel="stylesheet" href="{$_M[url][own_tem]}css/metinfo.css?{$jsrand}" />
<form method="POST" class="ui-from" name="myform" action="{$_M[url][own_form]}a=dolistsave&sub_type=editor" target="_self">
<div class="v52fmbx product_index">
	<div class="v52fmbx-table-top">
		<div class="ui-float-left">
		</div>
		<div class="ui-float-right">
			<div class="ui-table-search">
				<i class="fa fa-search"></i>
				<input name="keyword" data-table-search="1" type="text" value="" class="ui-input" placeholder="{$_M[word][search]}">
			</div>
		</div>
		<div class="ui-float-right">
			<div class="ftype_select-linkage">
				
					<select name="class1_select" class="prov" data-table-search="1" data-checked="" data-required='1'>
					<option value="0"  >姓名</option>
					<option value="1" >电话</option>
					<option value="2">邮箱</option>
					<option value="3">公司名称</option>
                    </select>
				
			</div>
		</div>
	</div>
	<input id="class1id" name="class1" data-table-search="1" value="{$list[class1]}" class="ui-input" type="hidden" />
	<input id="class2id" name="class2" data-table-search="1" value="{$list[class2]}" class="ui-input" type="hidden" />
	<input id="class3id" name="class3" data-table-search="1" value="{$list[class3]}" class="ui-input" type="hidden" />
	<table class="display dataTable ui-table" data-table-ajaxurl="{$_M[url][own_form]}a=dojson_activity_list&act_id={$_M[form][id]}&class1={$list[class1]}&class2={$list[class2]}&class3={$list[class3]}"  data-table-pageLength="20">
		<thead>
			<tr>
				<th width="20" data-table-columnclass="met-center">编号</th>
				<th width="120">
					名字
				</th>
				<th data-table-columnclass="met-center" width="120">
				电话
				</th>
				<th data-table-columnclass="met-center" width="180">
				邮箱
				</th>
				<th data-table-columnclass="met-center" width="180">
				公司名称
				</th>
				<th width="120">
					{$_M[word][state]}
				</th>
				<th data-table-columnclass="met-center" width="160">报名时间</th>
				<th width="40">操作</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
		<tfoot>
			
		</tfoot>
	</table>
</div>
</form>
<script >
    function changstatus(e) {
        if(confirm('确定要更改吗')){
            $.ajax({
             type: "POST",
             url: "{$_M[url][own_form]}a=dochangestatus",
             data: {'select_id':$(e).attr('data-id')},
             success: function(data){
                  if(data=='ok'){
                      $(e).parent().prev().prev().html('已付款');
                  }
             }
         });
        }
    }
</script>
<!--
EOT;
require $this->template('ui/foot');
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>

