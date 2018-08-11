<?php defined('IN_MET') or exit('No permission'); ?>
<section class="$uicss" m-id='<?php echo $ui['mid'];?>'>
<div class="animsition">
    <div class="container">
        
            <!-- sidebar -->
                <?php if($_M['form']['pageset']){ ?>
                    <?php if($sidebar){ ?>
                    <div class="col-md-9 met-news-body col-xs-12" style="float:<?php echo $ui['polr'];?>;<?php echo $lrp;?>">
                        <div class="row">
                <?php } ?>
            <?php }else{ ?>
                    <?php if($ui[has][sidebar]){ ?>
                    <div class="col-md-9 met-news-body col-xs-12"  style="float:<?php echo $ui['polr'];?>;<?php echo $lrp;?>">
                        <div class="row">
                <?php } ?>
            <?php } ?>
            <!-- /sidebar -->
            <!-- 内容 -->
            <div class="less-page-content">
                <ul class="$uicss-list blocks     <?php if($ui['column_xs']==1){ ?>
                blocks-100
                <?php }else{ ?>
                blocks-xs-<?php echo $ui['column_xs'];?>
                <?php } ?>
                blocks-md-<?php echo $ui['column_md'];?> blocks-lg-<?php echo $ui['column_lg'];?> blocks-xxl-<?php echo $ui['column_xxl'];?> ulstyle met-pager-ajax imagesize" id="met-grid" data-scale='<?php echo $c['met_productimg_y'];?>x<?php echo $c['met_productimg_x'];?>'>
                    <?php if($c[met_product_page]==1 && $data['sub']){ ?>
    <!--展示下级栏目-->
                    <?php
    $type=strtolower(trim('son'));
    $cid=$data['classnow'];
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
                        <li class='p-r-15  item' >
                            <div class="card ">
                                <figure class="overlay overlay-hover">
                                <img class="overlay-figure" src="<?php echo thumb($m['columnimg'],$c['met_productimg_x'],$c['met_productimg_y']);?>" alt="<?php echo $m['name'];?>">
                                <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                                  <a class="fa fa-search" href="<?php echo $m['url'];?>" {m.urlnew}></a>
                                </figcaption>
                                </figure>
                                <h4 class="card-title p-y-20 p-l-0 font-szie-16 ">
                                    <a href="<?php echo $m['url'];?>" title="<?php echo $m['title'];?>" class="block text-truncate" {m.urlnew}><?php echo $m['name'];?></a>
                                    <p class="keyword"><?php echo $m['keywords'];?></p>
                                </h4>
                            </div>
                        </li>
                    <?php endforeach;?>
    <!--展示下级栏目-->
                <?php }else{ ?>
                    <?php
    $cid = 0;
    if($cid == 0){
        $cid = $data['classnow'];
    }
    $num = $c['met_product_list'];
    $order = "no_order";
    $result = load::sys_class('label', 'new')->get('product')->get_list_page($cid, $data['page']);
    $sub = count($result);
     foreach($result as $index=>$v):
        $v['sub']      = $sub;
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
?><?php endforeach;?>
                            <?php if($sub){ ?>
    <!--展示内容-->
                            <?php
    $cid = 0;
    if($cid == 0){
        $cid = $data['classnow'];
    }
    $num = $c['met_product_list'];
    $order = "no_order";
    $result = load::sys_class('label', 'new')->get('product')->get_list_page($cid, $data['page']);
    $sub = count($result);
     foreach($result as $index=>$v):
        $v['sub']      = $sub;
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
?>
                                    <?php if($ui['list_style']==1){ ?>
            <!--标准-->
                                    <li class='p-r-15  item' >
                                        <div class="card ">
                                            <figure class="overlay overlay-hover">
                                            <img class="overlay-figure" src="<?php echo thumb($v['imgurl'],$c['met_productimg_x'],$c['met_productimg_y']);?>" alt="<?php echo $v['title'];?>">
                                            <a href="<?php echo $v['url'];?>" <?php echo $g['urlnew'];?> class="overlay-panel overlay-background overlay-fade overlay-icon">
                                              <i class="fa fa-search"></i>
                                            </a>
                                            </figure>
                                            <h4 class="card-title p-y-20 font-szie-16 ">
                                                <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" class="block text-truncate" <?php echo $g['urlnew'];?>><?php echo $v['title'];?></a>
                                                <p class="keyword"><?php echo $v['keywords'];?></p>
                                                <p class="price m-b-0 m-t-5"><?php echo $v['price_str'];?></p>
                                            </h4>
                                        </div>
                                    </li>
        <!--标准-->
                                <?php }else{ ?>
        <!--橱窗-->
                                    <li class='p-r-15  item' >
                                    <div class="card ">
                                        <figure class="overlay overlay-hover">
                                        <img class="overlay-figure" src="<?php echo thumb($v['imgurl'],$c['met_productimg_x'],$c['met_productimg_y']);?>" alt="<?php echo $v['title'];?>">
                                        <a href="<?php echo $v['url'];?>" <?php echo $g['urlnew'];?> class="overlay-panel overlay-background overlay-fade overlay-icon">
                                          <i class="fa fa-search"></i>
                                        </a>
                                        </figure>
                                        <h4 class="card-title p-y-20 font-szie-16 ">
                                        <?php echo $v['title'];?>
                                        <p class="keyword"><?php echo $v['keywords'];?></p>
                                                <?php
            $sub = count($v['para']);
            $num = 30;
            if(!is_array($v['para'])){
                $v['para'] = explode('|',$v['para']);
            }
            foreach ($v['para'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($v['para'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $para = $val;
            ?>
                                                <?php if($sub){ ?>
                                        <p class="card-text"><?php echo $para['name'];?>&nbsp;:&nbsp;<?php echo $para['value'];?></p>
                                            <?php } ?>
                                        <?php }?>
                                        <p class="desc"><?php echo $v['description'];?></p>
                                        <p class="price m-b-0 m-t-5"><?php echo $v['price_str'];?></p>
                                        <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" class="btn btn-default" <?php echo $g['urlnew'];?>><?php echo $word['Detail'];?></a>
                                        </h4>
                                    </div>
                                    </li>
        <!--橱窗-->
                                <?php } ?>
                            <?php endforeach;?>
    <!--展示内容-->
                        <?php }else{ ?>
                            <div class='h-100 text-xs-center font-size-20 vertical-align' m-id='<?php echo $ui['mid'];?>'><?php echo $ui['nodata'];?></div>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>

                <?php if($c[met_product_page]==1 && $data['sub']){ ?>
                <?php }else{ ?>
<!--分页-->
                    <div class='m-t-20 text-xs-center hidden-sm-down'  m-type='noset'>
                             <?php
     if(!$data['classnow']){
        $data['classnow'] = 2;
     }

     if(!$data['page']){
        $data['page'] = 1;
     }
      $result = load::sys_class('label', 'new')->get('tag')->get_page_html($data['classnow'],$data['page']);

       echo $result;

     ?>
                    </div>
                    <div class="met-pager-ajax-link hidden-md-up" data-plugin="appear" data-animate="slide-bottom" data-repeat="false" m-id='<?php echo $ui['mid'];?>'>
                        <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn" data-plugin="ladda" data-style="slide-left">
                            <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
                            <?php echo $ui['page_ajax_next'];?>
                        </button>
                    </div>
<!--分页-->
            <?php } ?>
            <!-- /内容 -->

 <!-- sidebar -->
                    <?php if($_M['form']['pageset']){ ?>
                        <?php if($sidebar){ ?>
                            </div>
                        </div>
                    <?php }else{ ?>
                                </div>
                         </div>
                       </main>
                    <?php } ?>
                <?php }else{ ?>
                        <?php if($ui[has][sidebar]){ ?>
                            </div>
                        </div>
                    <?php }else{ ?>
                            </div>
                        </div>
                       </main>
                    <?php } ?>
                <?php } ?>
        <!-- /sidebar -->
