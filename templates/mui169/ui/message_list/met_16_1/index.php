<?php defined('IN_MET') or exit('No permission'); ?>
<tag action='message.list' num="$c['met_message_list']"></tag>
<if value='$sub'>
<section class="$uicss animsition"  m-id='{$ui.mid}' m-type='nocontent'>
    <div class="container">
        <div class="row">
<div class="<if value='!$ui[has][message_form]'>col-md-10 offset-md-1<else/>col-md-8</if>  met-message-body panel panel-body m-b-0" boxmh-mh m-id='noset' m-type='message_list'>
<div class="row">
	<ul class="list-group list-group-dividered list-group-full met-pager-ajax met-message-list">
		<include file='ui_ajax/message'/>
	</ul>
	<div class='m-t-20 text-xs-center hidden-sm-down' m-type="nosysdata">
        <pager/>
    </div>
    <div class="met_pager met-pager-ajax-link hidden-md-up" data-plugin="appear" data-animate="slide-bottom" data-repeat="false" m-type="nosysdata">
        <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn" data-plugin="ladda" data-style="slide-left" data-url="" data-page="1">
            <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
        </button>
    </div>
</div>
</div>
<if value='!$ui[has][message_form]'>
</div>
        </div>
    </section>
</if>
</if>