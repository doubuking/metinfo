<!--<?php
defined('IN_MET') or exit('No permission');
require $this->template('ui/head');
echo <<<EOT
-->
<form method="POST" class="ui-from" name="myform" action="{$_M['url']['own_form']}a=dohandle" target="_self">
    <div class="v52fmbx">
        <h3 class="v52fmbx_hr">{$_M['word']['cleaner_info']}</h3>
        <dl class="noborder">
            <dd>
                <input type="submit" name="submit" value="{$_M['word']['cleaner_yw001']}" class="submit">
            </dd>
        </dl>
    </div>
</form>
<!--
EOT;
require $this->template('ui/foot');
?>