<?php defined('IN_MET') or exit('No permission'); ?>
<tag action='link.list'></tag>
<if value="$sub">
    <footer class="$uicss text-xs-center" m-id='{$ui.mid}' m-type="link">
        <div class="container p-y-15">
            <ul class="breadcrumb p-0 link-img m-0">
                <li class='breadcrumb-item'>{$ui.footlink_title} :</li>
                <tag action='link.list'>
                    <li class='breadcrumb-item <if value="$ui[split]">split</if>'>
                        <a href="{$v.weburl}" title="{$v.webname}" target="_blank">
                            <if value="$v.link_type eq 1">
                                <img data-original="{$v.weblogo}" alt="{$v.webname}" height='40'>
                            <else/>
                                <span>{$v.webname}</span>
                            </if>
                        </a>
                    </li>
                </tag>
            </ul>
        </div>
    </footer>
</if>