<?php defined('IN_MET') or exit('No permission'); ?>
<section id="feature" class="$uicss <if value='$ui[bgtype]'>imgbg<else/>bgcolor</if>" m-id='{$ui.mid}'>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 <if value='!$ui[position]'>fl_right</if>">
        <img class="cover-image" src="<if value='$ui[ifsuolve]'>{$ui.imgurl|thumb:$ui['img_x'],$ui['img_y']}<else/>{$ui.imgurl}</if>" alt="">
      </div>
      <div class="col-lg-6 col-md-offset-6 <if value='$ui[position]'>right</if>">
        <h2>{$ui.title}</h2>
        <if value="$ui[desc]">
        <p>{$ui.desc}</p>
        </if>
        <if value="$ui[desc_two]">
        <div class="contentdiv">
          <p>{$ui.desc_two}</p>
        </div>
        </if>
        <if value="$ui[desc_thirdcolor]">
        <p>{$ui.desc_thirdcolor}</p>
        </if>
        <a href="{$ui.link}" title="{$ui.title}" target="_blank" class="btn btn-view-works">{$ui.moretxt}</a>
      </div>
    </div>
  </div>
</section>