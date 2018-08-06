<?php defined('IN_MET') or exit('No permission'); ?>
<div class="$uicss met-index-body" style="background:url({$ui.bgpic})center no-repeat;background-size:cover;" m-id='{$ui.mid}'>
      <div class="container">
            <h2 class="invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">{$ui.title}</h2>
            <p class="desc invisible animation-delay-200" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">{$ui.desc}</p>
            <div class="about-video">
                  <div class="about-text">
                        <div class="svg-title">
                        {$ui.vtitle}
                        </div>
                        <div class="svg-subtitle">
                        {$ui.vsubtitle}
                        </div>
                        <div class="video_url" hidden>{$ui.url}</div>
                        <div class="video-play"></div>
                        <a href="{$ui.btn_url}" target="_blank" class="btn btn-primary btn-lg video-btn">{$ui.btn}</a>
                  </div>
                  <div class="video-mask">
                      <video  id="index-video" poster="{$ui.poster}" loop muted="true">
                      </video>
                      <img src="{$ui.poster}" alt="" >
                  </div>
            </div>
      </div>
      <div class="about-full-video is-end">
            <div class="video-close">
                  <i class="icon pe-close"></i>
            </div>
            <div class="res-16v9">
                <video class="full-video" id="fullvideo" controls >
                </video>
            </div>
      </div>
</div>