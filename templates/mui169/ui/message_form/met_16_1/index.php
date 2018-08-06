<?php defined('IN_MET') or exit('No permission'); ?>
<tag action='message.list' num="$c['met_message_list']"></tag>
<if value='!$ui[has][message_list] || !$sub'>
<section class="$uicss animsition"  m-id='{$ui.mid}' m-type='nocontent'>
    <div class="container">
        <div class="row">
</if>
        <tag action='message.list' num="$c['met_message_list']"></tag>
        <if value='$ui[has][message_list] && $sub'>
        <div class="col-md-4 p-l-30 message_form" m-id='{$ui.mid}' m-type='nocontent'>
        <else/>
        <div class="col-md-8 col-lg-6 offset-md-2 offset-lg-3 message_form message-list-no" m-id='{$ui.mid}' m-type='message_form'>
        </if>
        	<div class="row">
        		<div class="met-message-submit panel panel-body m-b-0" boxmh-h>
        			<tag action='message.form'></tag>
        		</div>
        	</div>
        </div>

            </div>
        </div>
    </section>