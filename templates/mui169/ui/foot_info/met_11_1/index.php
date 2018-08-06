<?php defined('IN_MET') or exit('No permission'); ?>
<footer class='$uicss p-y-20' m-id='{$ui.mid}' m-type="foot">
    <div class="container text-xs-center">
        <if value="$c['met_footright']">
        <p class="m-b-0">{$c.met_footright}</p>
        </if>
        <if value="$c['met_footaddress']">
        <p class="m-b-0">{$c.met_footaddress}</p>
        </if>
        <if value="$c['met_foottel']">
        <p class="m-b-0">{$c.met_foottel}</p>
        </if>
        <if value="$c['met_footother']">
        <p class="m-b-0">{$c.met_footother}</p>
        </if>
        <if value="$c['met_foottext']">
        <p class="m-b-0">{$c.met_foottext}</p>
        </if>
        <div class="powered_by_metinfo">
            Powered&nbsp;by&nbsp;
            <a href="http://www.MetInfo.cn/#copyright" target="_blank" title="$lang_Info1">MetInfo</a>
            &nbsp;{$c.metcms_v}
        </div>
<!--简繁体切换-->
                    <if value="$c['met_ch_lang'] && $ui['simplified']">
                    <div class="met-langlist met-s2t" m-id="lang" m-type="lang">
                    <if value="$data[lang] eq cn ">
                        <button type="button" class="btn btn-outline btn-default btn-squared btn-lang btn-cntotc" data-tolang='tc'>繁体</button>
                        <elseif value="$data[lang] eq zh"/>
                        <button type="button" class="btn btn-outline btn-default btn-squared btn-lang btn-cntotc" data-tolang='cn'>简体</button>
                    </if>
                    </div>
                </if>
<!--简繁体切换-->
<!--多语言-->
        <if value="$c['met_lang_mark'] && $ui['langlist']">
        <div class="met-langlist vertical-align" m-id="lang" m-type="lang">
            <div class="inline-block dropup">
                <lang>
               <if value="$data['lang'] eq $v['mark']">
                <button type="button" data-toggle="dropdown" class="btn dropdown-toggle btn-lang">
                    <if value="$ui['foot_langlist_icon']">
                   <img src="{$v.flag}" alt="{$v.name}" style="max-width:100%;">
                    </if>
                    <span >{$v.name}</span>
                </button>
                </if>
                </lang>
                <ul class="dropdown-menu dropdown-menu-right" id="met-langlist-dropdown" role="menu">
                    <lang>   
                    <a href="{$v.met_weburl}" title="{$v.name}" class='dropdown-item'>
                        <if value="$ui['foot_langlist_icon']">
                       <img src="{$v.flag}" alt="{$v.name}" style="max-width:100%;">
                        </if>
                        {$v.name}
                    </a>
            </lang>
            </ul>
            </div>
        </div>
        </if>
<!--多语言-->
    </div>
</footer>