<!--<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

require $this->template('ui/head');
$list['is_activity']?$open='checked':$close='checked';
$list['isfree']?$isfreeopen='checked':$isfreeclose='checked';
echo <<<EOT
-->

<link rel="stylesheet" href="{$_M[url][own_tem]}css/metinfo.css?{$jsrand}" xmlns="http://www.w3.org/1999/html"/>
<form method="POST" class="ui-from article_add" name="myform" action="{$_M[url][own_form]}a={$a}" target="_self">
	<input type="hidden" name='id' value="{$_M['form']['id']}" />
	<input type="hidden" name="addtime_l" value="{$list['addtime']}">
	<input type="hidden" name="imgurl_l" value="{$list['imgurl']}">
	<input type="hidden" name="imgurls_l" value="{$list['imgurls']}">
	<input type="hidden" name="no_order" value="{$list['no_order']}">
	<input type="hidden" name="class1_select" value="{$_M['form']['class1_select']}">
	<input type="hidden" name="class2_select" value="{$_M['form']['class2_select']}">
	<input type="hidden" name="class3_select" value="{$_M['form']['class3_select']}">
	<input type="hidden" name="com_ok" value="0">
	<input type="hidden" name="top_ok" value="0">
	<input type="hidden" name="displaytype" value="0">
	<input type="hidden" name="turnurl" value="{$turnurl}">
    <div class="v52fmbx">
		<dl>
			<dt><em class="required">*</em>{$_M[word][allcategory]}</dt>
			<dd class="ftype_select-linkage">
					<div class="fbox pull-left" data-selectdburl="{$_M[url][own_form]}a=docolumnjson&type=1">
						<select name="class1" class="prov" data-required="1" data-checked="{$list[class1]}"></select>
						<select name="class2" class="city" data-required="1" data-checked="{$list[class2]}"></select>
						<select name="class3" class="dist" data-required="1" data-checked="{$list[class3]}"></select>
					</div>
				<span class="tips pull-left" style="margin-left:20px;"><a href="{$_M[url][adminurl]}n=column&c=index&a=doindex&anyid=25" target="_blank">{$_M[word][admin_colunmmanage_v6]}</a></span>
			</dd>
		</dl>
		<dl>
			<dt><em class="required">*</em>{$_M[word][articletitle]}</dt>
			<dd class="ftype_input">
				<div class="fbox">
					<input type="text" name="title" value="{$list[title]}" data-required="1" />
				</div>
			</dd>
		</dl>
		<h3 class="v52fmbx_hr">{$_M[word][contentinfo]}</h3>
		<dl>
			<dd class="ftype_ckeditor">
				<div class="fbox">
					<textarea name="content" data-ckeditor-y="500">{$list[content]}</textarea>
				</div>
			</dd>
		</dl>
		<h3 class="v52fmbx_hr clearfix">SEO{$_M[word][unitytxt_39]}<button type='button' class='btn btn-default btn-sm showmoreset-btn'>{$_M[word][click_enter]}</button></h3>
		<div class='showmoreset-content'>
			<dl>
				<dt>{$_M[word][managertyp5]}{$_M[word][columnmtitle]}</dt>
				<dd class="ftype_input">
					<div class="fbox">
						<input type="text" name="ctitle" value="{$list[ctitle]}" />
					</div>
					<span class="tips">{$_M[word][tips6_v6]}</span>
				</dd>
			</dl>
			<dl>
				<dt>{$_M[word][keywords]}</dt>
				<dd class="ftype_input">
					<div class="fbox">
						<input type="text" name="keywords" value="{$list[keywords]}" />
					</div>
					<span class="tips">{$_M[word][setseoTip1]}</span>
				</dd>
			</dl>
			<dl>
				<dt>{$_M[word][desctext]}</dt>
				<dd class="ftype_textarea">
					<div class="fbox">
						<textarea name="description">{$list[description]}</textarea>
					</div>
					<span class="tips">{$_M[word][tips1_v6]}</span>
				</dd>
			</dl>
			<dl>
				<dt><abbr title="{$_M[word][tips2_v6]}">{$_M[word][tag]}</abbr></dt>
				<dd class="ftype_tags">
					<div class="fbox">
						<input name="tag" type="hidden" data-label="|" value="{$list[tag]}">
					</div>
					<span class="tips">{$_M[word][tips3_v6]}</span>
				</dd>
			</dl>
			<dl>
				<dt>{$_M[word][columnhtmlname]}</dt>
				<dd class="ftype_input">
					<div class="fbox">
						<input type="text" name="filename" data-ajaxcheck-url="{$_M[url][own_form]}a=docheck_filename&id={$_M['form']['id']}" style="width:200px;" value="{$list[filename]}" />
					</div>
					<span class="tips">{$_M[word][js74]}</span>
				</dd>
			</dl>
		</div>
		<h3 class="v52fmbx_hr clearfix">{$_M[word][unitytxt_15]}<button type='button' class='btn btn-default btn-sm showmoreset-btn'>{$_M[word][click_enter]}</button></h3>
		<div class='showmoreset-content'>
		<dl>
			<dt>{$_M[word][modpublish]}</dt>
			<dd class="ftype_input">
				<div class="fbox">
					<input type="text" name="issue" style="width:100px;" value="{$list[issue]}" />
				</div>
			</dd>
		</dl>
		<dl>
			<dt>{$_M[word][js79]}</dt>
			<dd class="ftype_input">
				<div class="fbox">
					<input type="text" name="hits" style="width:100px;" value="{$list[hits]}" />
				</div>
			</dd>
		</dl>
		<dl>
			<dt>{$_M[word][linkto]}</dt>
			<dd class="ftype_input">
				<div class="fbox">
					<input type="text" name="links" value="{$list[links]}" />
				</div>
				<span class="tips">{$_M[word][tips4_v6]}</span>
			</dd>
		</dl>
		<dl>
			<dt>{$_M[word][webaccess]}</dt>
			<dd class="ftype_select">
				<div class="fbox">
					{$access_option}
				</div>
			</dd>
		</dl>
		<dl>
			<dt>{$_M[word][smstips64]} </dt>
			<dd class="ftype_checkbox ftype_transverse">
				<div class="fbox">
					<label><input name="displaytype" type="checkbox" value="1" data-checked="{$list[displaytype]}">{$_M[word][displaytype]}</label>
					<label><input name="com_ok" type="checkbox" value="1" data-checked="{$list[com_ok]}">{$_M[word][recom]}</label>
					<label><input name="top_ok" type="checkbox" value="1" data-checked="{$list[top_ok]}">{$_M[word][top]}</label>
				</div>
			</dd>
		</dl>
		<dl>
			<dt>{$_M[word][updatetime]}</dt>
			<dd class="ftype_day">
				<div class="fbox">
					<input type="input" name="updatetime" data-day-type = "2" value="{$list[updatetime]}">
				</div>
			</dd>
		</dl>
		
		<dl>
            <dt>活动开关</dt>
            <dd class="ftype_radio ftype_transverse">
                <div class="fbox">
                    <label><input name="is_activity" type="radio" value="0" {$isfreeclose} >关</label>
                    <label><input name="is_activity" type="radio" value="1" {$isfreeopen} >开</label>
                </div>
                <span class="tips"></span>
            </dd>
        </dl>
		
		<dl>
			<dt>活动开始时间</dt>
			<dd class="ftype_day">
				<div class="fbox">
					<input type="input" name="starttime" data-day-type = "2" value="{$list[starttime]}">
				</div>
			</dd>
			<dt>活动结束时间</dt>
			<dd class="ftype_day">
				<div class="fbox">
					<input type="input" name="endtime" data-day-type = "2" value="{$list[endtime]}">
				</div>
			</dd>
		</dl>
<!--
EOT;
if($_M['config']['met_webhtm']){
	$list['addtype'] = 1;
	$disabled = 'disabled';
	$tips = '<span class="tips">{$_M[word][tips5_v6]}</span>';
}
echo <<<EOT
-->
		<dl>
			<dt>{$_M[word][addtime]}</dt>
			<dd class="ftype_day">
					<div class="form-inline" style="margin-bottom:10px;">
					<div class="radio">
						<label>
							<input type="radio" name="addtype" value="1" data-checked="{$list[addtype]}">
							{$_M[word][releasenow]}
						</label>
					</div>
				</div>
				<div class="form-inline" style="margin-bottom:10px;">
					<div class="radio">
						<label>
							<input type="radio" name="addtype" value="2" {$disabled} >
							{$_M[word][timedrelease]}
						</label>
					</div>
					<div class="form-group" style="margin-left:10px;">
						<div class="fbox">
							<input type="input" name="addtime" data-day-type = "2" {$disabled} value="{$list[addtime]}">
						</div>
					</div>
				</div>
				{$tips}
			</dd>
		</dl>
		</div>
		
		
		<h3 class="v52fmbx_hr clearfix">付费设置<button type='button' onclick="showorhiden(this)" class='btn btn-default btn-sm showmoresets-btn' style="float: right;">{$_M[word][click_enter]}</button></h3>
		<div class='showmoresets-content' style="display: none">
		
		<dl>
            <dt>是否付费报名</dt>
            <dd class="ftype_radio ftype_transverse">
                <div class="fbox">
                    <label><input name="isfree" type="radio" value="0" {$close} >否</label>
                    <label><input name="isfree" type="radio" value="1" {$open} >是</label>
                </div>
                <span class="tips"></span>
            </dd>
        </dl>
		
		<dl>
			<dt>报名费</dt>
			<dd class="ftype_input">
				<div class="fbox">
					<input type="text" name="cost" style="width:100px;" value="{$list[cost]}" />
				</div>
			</dd>
		</dl>

		<dl class="quotasdiv">
			<dt>添加免费名额</dt>
			<dd class="ftype_select">
				<div class="fbox">
					<label for="" >{$quotas_option}</label>
					<labe><a href="javascript:void(0)" onclick="addQuotas(this)">添加</a></labe>
				</div>
			    
			</dd>
	
		</dl>
		{$quitaList}

		</div>
		
		
		<h3 class="v52fmbx_hr clearfix">活动日程<button type='button' onclick="showorhiden(this)" class='btn btn-default btn-sm showmoresets-btn' style="float: right;">{$_M[word][click_enter]}</button></h3>
		<div class='showmoresets-content' style="display: none">
		
		<dl>
            <dd class="ftype_ckeditor">
				<div class="fbox">
					<textarea name="schedule" data-ckeditor-y="500">{$list[schedule]}</textarea>
				</div>
			</dd>
        </dl>

		</div>
		
		
		<h3 class="v52fmbx_hr clearfix">嘉宾<button type='button' onclick="showorhiden(this)" class='btn btn-default btn-sm showmoresets-btn' style="float: right;">{$_M[word][click_enter]}</button></h3>
		<div class='showmoresets-content' style="display: none">
		
		<dl>
            <dd class="ftype_ckeditor">
				<div class="fbox">
					<textarea name="guest" data-ckeditor-y="500">{$list[guest]}</textarea>
				</div>
			</dd>
        </dl>

		</div>
		
		
		<h3 class="v52fmbx_hr clearfix">赞助商<button type='button' onclick="showorhiden(this)" class='btn btn-default btn-sm showmoresets-btn' style="float: right;">{$_M[word][click_enter]}</button></h3>
		<div class='showmoresets-content' style="display: none">
		
		<dl>
            <dd class="ftype_ckeditor">
				<div class="fbox">
					<textarea name="sponsor" data-ckeditor-y="500">{$list[sponsor]}</textarea>
				</div>
			</dd>
        </dl>

		</div>
		
		
		
		
		<h3 class="v52fmbx_hr clearfix">会场交通<button type='button' onclick="showorhiden(this)" class='btn btn-default btn-sm showmoresets-btn' style="float: right;">{$_M[word][click_enter]}</button></h3>
		<div class='showmoresets-content' style="display: none">
		
		<dl>
            <dd class="ftype_ckeditor">
				<div class="fbox">
					<textarea name="conference_traffic" data-ckeditor-y="500">{$list[conference_traffic]}</textarea>
				</div>
			</dd>
        </dl>
		</div>
		
		
		
		<h3 class="v52fmbx_hr clearfix">活动纪要<button type='button' onclick="showorhiden(this)" class='btn btn-default btn-sm showmoresets-btn' style="float: right;">{$_M[word][click_enter]}</button></h3>
		<div class='showmoresets-content' style="display: none">
		
		<dl>
            <dd class="ftype_ckeditor">
				<div class="fbox">
					<textarea name="event_summary" data-ckeditor-y="500">{$list[event_summary]}</textarea>
				</div>
			</dd>
        </dl>

		</div>
		
		
		
		<h3 class="v52fmbx_hr clearfix">活动照片<button type='button' onclick="showorhiden(this)" class='btn btn-default btn-sm showmoresets-btn' style="float: right;">{$_M[word][click_enter]}</button></h3>
		<div class='showmoresets-content' style="display: none">
		
		<dl>
            <dd class="ftype_ckeditor">
				<div class="fbox">
					<textarea name="active_photo" data-ckeditor-y="500">{$list[active_photo]}</textarea>
				</div>
			</dd>
        </dl>
		
		

		</div>
		
		
		
		
		
		<dl>
			<dt>{$_M[word][coverimg]}</dt>
			<dd class="ftype_upload">
				<div class="fbox">
					<input
						name="imgurl"
						type="text"
						data-upload-type="doupimg"
						value="{$list[imgurl]}"
					/>
				</div>
				<span class="tips">{$_M[word][tips7_v6]}</span>
			</dd>
		</dl>
    </div>
	<div class="met_affix_save bg-success">
		<button type="submit" class="btn btn-success" onclick='return news_submit();'>{$_M[word][Submit]}</button>
	</div>
</form>
<script >


function addQuotas(e) {
    var quotas = $("[name='quotas'] :checked");
    var str = '		<dl >'+
			'<dt>'+quotas.text()+'</dt>'+
			'<dd class="ftype_input">'+
				'<div class="fbox">'+
					'<labe><input type="text" name="quotascost['+quotas.val()+']" style="width:100px;" value="" /></labe>'+
					'<labe><a href="javascript:void(0)" onclick="deldiv(this)"">删除</a></labe>'+
				'</div>'+
			'</dd>'+
		'</dl>';
    $('.quotasdiv').after(str)
    
}


function showorhiden(e) {
  $(e).parent().next(".showmoresets-content").toggle();
  if($(e).text() == '展开更多设置'){
      $(e).text('隐藏设置');
  }else {
      $(e).text('展开更多设置');
  }
  
}

function deldiv(e) {
  $(e).parents('dl').remove();
}

</script>
<!--
EOT;
require $this->template('ui/foot');
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>



