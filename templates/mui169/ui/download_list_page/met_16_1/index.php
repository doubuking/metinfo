<?php defined('IN_MET') or exit('No permission'); ?>
<?php $sidebar=strlen($ui[has][sidebar]);?>
<main class="$uicss met-download animsition" m-id='{$ui.mid}'>
    <div class="container">
        <div class="row">
        <div class="met-download-list">
<tag action='download.list' num="$c['met_download_list']" cid="$data[classnow]"></tag>
<if value="$sub">
        <if value="$_M['form']['pageset']">
            <if value="$sidebar">
            <div class="met-download-list col-md-9">
                <div class="row">
            <else/>
            <div class="met-download-list">
                <div class="row">
            </if>
            <else/>
            <if value="$ui[has][sidebar]">
            <div class="met-download-list col-md-9">
                <div class="row">
            <else/>
            <div class="met-download-list">
                <div class="row">
            </if>
        </if>
                <ul class="list-group list-group-dividered list-group-full met-pager-ajax ">
                	<include file='ui_ajax/download'/>
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
            <else/>
            <div class='h-100 text-xs-center font-size-20 vertical-align' m-id='{$ui.mid}'>{$g.nodata}</div>
</if>
<if value="$_M['form']['pageset']">
    <if value="!$sidebar">
                </div>
            </div>
        </main>
    </if>
<else/>
    <if value="!$ui[has][sidebar]">
        </div>
    </div>
</main>
    </if>
</if>