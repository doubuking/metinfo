<?php defined('IN_MET') or exit('No permission'); ?>
<tag action='category' cid="$data['classnow']" type='current'>
<?php
$ui['listhide']=explode('|', $ui['listhide']);
$ui['detailhide']=explode('|', $ui['detailhide']);
if($data['name']){
    foreach ($ui['listhide'] as $val) {
        if($val==$data['name']){
            $hide=0;
            break;
        }else{
            $hide=1;
        }
    }
}
if($data['title']){
    foreach ($ui['detailhide'] as $val) {
        if($val==$m['name']){
            $hide=0;
            break;
        }else{
            $hide=1;
        }
    }
}
?>
</tag>
<if value="$hide">
<tag action="banner.list"></tag>
<if value="$sub || $data['classnow'] eq 10001">
<div class="$uicss page-bg" data-height='' style='' m-id='{$ui.mid}' m-type='banner'>
    <tag action='banner.list' >
    <div class="slick-slide">
        <img class="cover-image" src="{$v.img_path}" srcset='{$v.img_path|thumb:767} 767w,{$v.img_path}' sizes="(max-width: 767px) 767px" alt="{$v.img_title}" data-height='{$v.height}|{$v.height_t}|{$v.height_m}' >
        <if value="$v['img_title']">
        <div class="banner-text p-{$v.img_text_position}" met-imgmask>
            <div class='container'>
                <div class='banner-text-con'>
                    <div>
                        <h4 class="animation-slide-top font-weight-500" style="color:{$v.img_title_color}">{$v.img_title}</h4>
                        <p class="animation-slide-bottom" style='color:{$v.img_des_color}'>{$v.img_des}</p>
                    </div>
                </div>
            </div>
        </div>
        </if>
        <if value="$v['img_link']">
        <a href="{$v.img_link}" title="{$v.img_des}" target='_blank' met-imgmask></a>
        </if>
    </div>
    </tag>
</div>
<else/>
    <tag action='category' type="current" cid="$data['class1']">
        <div class="$uicss-ny vertical-align text-xs-center" m-id='{$ui.mid}' m-type='banner'>
            <if value="$m[module] eq 1">
                <h1 class="vertical-align-middle">{$m[name]}</h1>
                <else/>
                <h2 class="vertical-align-middle">{$m[name]}</h2>
            </if>
        </div>
    </tag>
</if>
</if>