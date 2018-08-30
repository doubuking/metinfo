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

    <?php
    $type=strtolower(trim('current'));
    $cid=$ui['picturecolumn'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id']){
            $m['class']="";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            unset($m['class']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
        <a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" <?php echo $m['urlnew'];?> class="btn-more">
            <?php echo $word['fliptext1'];?>
            <i class="fa fa-angle-right"></i>
        </a>
    <?php endforeach;?>
    </div> 
</section>