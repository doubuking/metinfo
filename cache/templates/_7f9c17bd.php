<?php defined('IN_MET') or exit('No permission'); ?>
<div class="$uicss met-index-body" m-id="<?php echo $ui['mid'];?>">
	<div class="container">
		    <?php if($ui['title']){ ?>
	        <h2 class="title invisible" data-plugin="appear" data-animate="slide-top" data-repeat="false">
	          <?php echo $ui['title'];?>
	        </h2>
      	<?php } ?>
		<div class="row header_news_panel">

			<!-- 左侧 -->
			<div class="col-md-7 col-sm-7 tab-content tab-content_mob-p0">

				<?php
    $cid=$ui['select'];

    $num = $ui['right_list_num'];
    $module = "";
    $type = $ui['type'];
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
					<div role="tabpanel" class="tab-pane fade     <?php if($v[_index]==0){ ?> in active<?php } ?>">
						<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>>
							<img src="<?php echo thumb($v['imgurl'],$ui[img_x],$ui[img_y]);?>" alt="<?php echo $v['imgurl'];?>" class="tab-pane__img">
						</a>
						<div class="header_news_text tab-pane__block">
							<a class="tab-pane__title" href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>><?php echo met_substr($v['title'],0,$ui['desc_num']);?>...</a>
							</p>
						</div>
					</div>
				<?php endforeach;?>

			</div>

			<!-- 右侧 -->
			<div class="col-md-4 col-sm-4 col-xs-12 news-tabs" >

				<ul class="news-tabs__nav nav nav-tabs shadow_text" role="tablist">

					<?php
    $cid=$ui['select'];

    $num = $ui['right_list_num'];
    $module = "";
    $type = $ui['type'];
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
						<li role="presentation"   >
							<a href="javascript:void(0);" index="<?php echo $v['_index'];?>"  role="tab" class="my-icon     <?php if($v[_index]==0){ ?>active<?php } ?>">
								<span class="time">
									<span class="day"><?php echo $v['original_updatetime'];?></span>
                                </span>
                                
                                	    <?php if($ui['right_desc']){ ?>
                                		<span class="description">
                                			<?php echo met_substr($v['description'],0,$ui['subtitlenum']);?>...
                                		</span>
                                	<?php }else{ ?>
	                                	<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>>
	                                		<span class="description">
											<?php echo met_substr($v['description'],0,$ui['subtitlenum']);?>...
											</span>
										</a>
									<?php } ?>
								
							</a>
						</li>
					<?php endforeach;?>
					
				</ul>

			</div>

			
		</div>
		<?php
    $type=strtolower(trim('current'));
    $cid=$ui['select'];
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
            <?php echo $ui['more'];?>
                <i class="fa fa-angle-right"></i>
            </a>
        <?php endforeach;?>
	</div>
</div>
