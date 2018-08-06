<?php defined('IN_MET') or exit('No permission'); ?>
    <footer class="$uicss  text-xs-center" m-id='{$ui.mid}' m-type="foot_nav">
    <div class="container">
        <div class="row">
            <tag action='category' type='foot'>
            <if value="$m['_index'] lt 4">
            <div class="col-lg-2 col-md-3 col-xs-6 list">
                <h4 class='font-size-16 m-t-0'>
                    <a href="{$m.url}"  title="{$m.name}">{$m.name}</a>
                </h4>
                <if value="$m['sub']">
                <ul class='ulstyle m-b-0'>
                    <tag action='category' cid="$m['id']" type='son'>
                    <li>
                        <a href="{$m.url}"  title="{$m.name}" target='_self'>{$m.name}</a>
                    </li>
                    </tag>
                </ul>
                </if>
            </div>
            </if>
            </tag>
            <div class="col-lg-4 col-md-12 col-xs-12 info">
                <if value="$ui['footinfo_tel']">
                <em class='font-size-26'><a href="tel:{$ui.footinfo_tel}">{$ui.footinfo_tel}</a></em>
                </if>
                <if value="$ui['footinfo_dsc']">
                <p>{$ui.footinfo_dsc}</p>
                </if>
                <if value="$ui['footinfo_wx']">
                <a id="met-weixin" data-plugin="webuiPopover" data-trigger="hover" data-animation="pop" data-placement='top' data-width='155' data-padding='0' data-content="<div class='text-xs-center'>
                    <img src='{$ui.footinfo_wx}' alt='{$c.met_webname}' width='150' height='150' id='met-weixin-img'></div>
                ">
                    <i class="fa fa-weixin"></i>
                </a>
                </if>
                <if value="$ui['footinfo_qq']">
                <a href="http://wpa.qq.com/msgrd?v=3&uin={$ui.footinfo_qq}&site=qq&menu=yes" rel="nofollow" target="_blank">
                    <i class="fa fa-qq"></i>
                </a>
                </if>
                <if value="$ui['footinfo_sina']">
                <a href="{$ui.footinfo_sina}" rel="nofollow" target="_blank">
                    <i class="fa fa-weibo "></i>
                </a>
                </if>
            </div>
        </div>
    </div>
</footer>