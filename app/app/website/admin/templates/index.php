<!--<?php
defined('IN_MET') or exit('No permission');
require_once $this -> template('ui/head');
echo <<<EOT
-->

<form method="POST" class="ui-from" name="myform" action="{$_M[url][own_form]}a=doset" target="_self">
    <div class="v52fmbx">
        <h3 class="v52fmbx_hr">关闭网站<span class="tips">显示网站建设中。</span></h3>
    <dl>
            <dt>强制访问首页</dt>
            <dt><a href="{$_M['config']['met_weburl']}index.php?lang=cn&metopen=1" class="ui-addlist metwindow" target="_blank">简体中文</a></dt>

            <dt><a href="{$_M['config']['met_weburl']}index.php?lang=en&metopen=1" class="ui-addlist metwindow" target="_blank">English</a></dt>

            <dt><a href="{$_M['config']['met_weburl']}index.php?lang=tc&metopen=1" class="ui-addlist metwindow" target="_blank">繁体中文</a></dt>
    </dl>
    <dl>

            <dt>关闭网站</dt>
            <dd class="ftype_radio ftype_transverse">
                <div class="fbox" >
                    <label ><input name="met_website" type="radio" value="0" data-checked="{$_M['config']['met_website']}">是</label>
                    <label><input name="met_website" type="radio" value="1">否</label>
               
                </div>
   
            </dd>
        </dl> 
        
<!--网站关闭显示内容-->
        <dl>
            <dt>显示内容</dt>
            <dd class="ftype_ckeditor">
                <div class="fbox">
                    <textarea name="met_website_content" data-ckeditor-type="1">{$_M['config']['met_website_content']}</textarea>
                </div>
  
            </dd>
        </dl>
     
        <dl class="noborder">
            <dt>&nbsp;</dt>
            <dd>
                <input type="submit" name="submit123" value="保存" class="submit" />
            </dd>
        </dl>

    </div>
</form>
<!--
EOT;
require_once $this -> template('ui/foot');
?>