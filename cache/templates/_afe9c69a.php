<?php defined('IN_MET') or exit('No permission'); ?>
<section id="feature" class="$uicss     <?php if($ui[bgtype]){ ?>imgbg<?php }else{ ?>bgcolor<?php } ?>" m-id='<?php echo $ui['mid'];?>'>
  <div class="container">
    <div class="row">
      <div class="col-lg-6     <?php if(!$ui[position]){ ?>fl_right<?php } ?>">
        <img class="cover-image" src="    <?php if($ui[ifsuolve]){ ?><?php echo thumb($ui['imgurl'],$ui['img_x'],$ui['img_y']);?><?php }else{ ?><?php echo $ui['imgurl'];?><?php } ?>" alt="">
      </div>
      <div class="col-lg-6 col-md-offset-6     <?php if($ui[position]){ ?>right<?php } ?>">
        <h2><?php echo $ui['title'];?></h2>
            <?php if($ui[desc]){ ?>
        <p><?php echo $ui['desc'];?></p>
        <?php } ?>
            <?php if($ui[desc_two]){ ?>
        <div class="contentdiv">
          <p><?php echo $ui['desc_two'];?></p>
        </div>
        <?php } ?>
            <?php if($ui[desc_thirdcolor]){ ?>
        <p><?php echo $ui['desc_thirdcolor'];?></p>
        <?php } ?>
        <a href="<?php echo $ui['link'];?>" title="<?php echo $ui['title'];?>" target="_blank" class="btn btn-view-works"><?php echo $ui['moretxt'];?></a>
      </div>
    </div>
  </div>
</section>