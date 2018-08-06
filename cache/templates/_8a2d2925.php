<?php defined('IN_MET') or exit('No permission'); ?>
<div class="$uicss met-index-body" style="background:url(<?php echo $ui['bgpic'];?>)center no-repeat;background-size:cover;" m-id='<?php echo $ui['mid'];?>'>
      <div class="container">
            <h2 class="invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false"><?php echo $ui['title'];?></h2>
            <p class="desc invisible animation-delay-200" data-plugin="appear" data-animate="slide-bottom" data-repeat="false"><?php echo $ui['desc'];?></p>
            <div class="about-video">
                  <div class="about-text">
                        <div class="svg-title">
                        <?php echo $ui['vtitle'];?>
                        </div>
                        <div class="svg-subtitle">
                        <?php echo $ui['vsubtitle'];?>
                        </div>
                        <div class="video_url" hidden><?php echo $ui['url'];?></div>
                        <div class="video-play"></div>
                        <a href="<?php echo $ui['btn_url'];?>" target="_blank" class="btn btn-primary btn-lg video-btn"><?php echo $ui['btn'];?></a>
                  </div>
                  <div class="video-mask">
                      <video  id="index-video" poster="<?php echo $ui['poster'];?>" loop muted="true">
                      </video>
                      <img src="<?php echo $ui['poster'];?>" alt="" >
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