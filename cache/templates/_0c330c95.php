<?php defined('IN_MET') or exit('No permission');?>
<section class="$uicss met-index-body" m-id="<?php echo $ui['mid'];?>">
    <div class="container">
          <?php if($ui['picturetitle']){ ?>
        <h2 class="title invisible" data-plugin="appear" data-animate="slide-top" data-repeat="false">
          <?php echo $ui['picturetitle'];?>
        </h2>
      <?php } ?>
        <?php $img=strstr($ui['titlebottompicture'],"upload"); ?>
        <p class="desc animation-fade appear-no-repeat editable-click" data-plugin="appear" data-animate="fade" data-repeat="false" met-id="1757" met-table="ui_config" met-field="uip_value">
              <?php if($img){ ?>
            <img src="<?php echo $ui['titlebottompicture'];?>">
          <?php } ?>
        </p>
        <div class="carousel slide scale" data-ride="carousel">
            <div class="carousel-inner">
                <?php
    $cid=$ui['picturecolumn'];

    $num = $ui['picturenum'];
    $module = "";
    $type = $ui['picturecom'];
    $order = 'no_order asc';
    $para = "";
    if(!$module){
        if(!$cid){
            $value = $m['classnow'];
        }else{
            $value = $cid;
        }
    }else{
        $value = $module;
    }

    $result = load::sys_class('label', 'new')->get('tag')->get_list($value, $num, $type, $order, $para);
    $sub = count($result);
    foreach($result as $index=>$v):
        $id = $v['id'];
        $v['sub'] = $sub;
        $v['_index']= $index;
        $v['_first']= $index==0 ? true:false;
        $v['_last']=$index==(count($result)-1)?true:false;
        $$v = $v;
?>

                </div>
                <div class="carousel-item     <?php if($v[_index]==0){ ?>active<?php } ?>">
                  <div class="col-xs-12 col-sm-3">
                    <div class="team-member text-center">
                      <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" target="_blank">
                        <img class="img-responsive" src="<?php echo thumb($v['imgurl'],$ui[img_x],$ui[img_y]);?>" alt="<?php echo $v['imgurl'];?>" />
                        <h3><?php echo met_substr($v['title'],0,$ui['desc_num']);?>...</h3>
                      </a>
                    </div>
                  </div>
                 <?php endforeach;?>
               </div>
            </div>




        </div>
    </div> 
</section>