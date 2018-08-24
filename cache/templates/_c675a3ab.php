<?php defined('IN_MET') or exit('No permission'); ?>
<div class="$uicss met-index-body text-xs-center     <?php if($ui['bg_type']==1){ ?>bgcolor<?php }else{ ?>bgpic<?php } ?>     <?php if($ui[ifdisplay]&&!$_M['form']['pageset']){ ?>conceal<?php }else{ ?>display<?php } ?>" m-id='<?php echo $ui['mid'];?>'>
	<div class="    <?php if($ui[ifwidth]){ ?>container<?php }else{ ?>container-fluid<?php } ?>">
		    <?php if($ui['title']){ ?>
			<h2 class="m-t-0 font-weight-300 invisible" data-plugin="appear" data-animate="slide-top" data-repeat="false"><?php echo $ui['title'];?></h2>
		<?php } ?>
		    <?php if($ui['desc']){ ?>
			<p class="desc m-b-0 font-weight-300 invisible" data-plugin="appear" data-animate="fade" data-repeat="false"><?php echo $ui['desc'];?></p>
		<?php } ?>
		<ul class="
			    <?php if($ui['column_xs']==1){ ?>
			block-xs-100
			<?php }else{ ?>
			blocks-xs-<?php echo $ui['column_xs'];?>
			<?php } ?>
		 	blocks-md-<?php echo $ui['column_md'];?> blocks-lg-<?php echo $ui['column_lg'];?> blocks-xxl-<?php echo $ui['column_xxl'];?> index-service-list">
			<?php
    $type=strtolower(trim('son'));
    $cid=$ui['id'];
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
			    <?php if($m[_index]<$ui['num']){ ?>
				<li class="invisible     <?php if(!$ui[iconiftop]){ ?>donttop<?php }else{ ?><?php } ?>" data-plugin="appear" data-animate="slide-bottom50" data-repeat="false">
					    <?php if($ui['link_ok']){ ?>
					<a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" <?php echo $m['urlnew'];?>>
					<?php } ?>
						    <?php if($ui['home_service_type']){ ?>
	                        <i class="<?php echo $m['icon'];?>" aria-hidden="true"></i>
	                        <?php }else{ ?>
	                        <img data-original="<?php echo $m['columnimg'];?>" alt="<?php echo $m['name'];?>">
	                    <?php } ?>
						<h3 class='m-t-20 m-b-5 font-weight-300'><?php echo $m['name'];?></h3>
						    <?php if($ui['desc_ok']){ ?>
						<p class='m-b-0 font-weight-300'><?php echo met_substr($m['description'],0,$ui['long']);?></p>
						<?php } ?>
					    <?php if($ui['link_ok']){ ?>
					</a>
					<?php } ?>
				</li>
			<?php } ?>
			<?php endforeach;?>
		</ul>
		    <?php if($ui[bottom_ok]){ ?>
			<div class="news-bg">
	        	<div class="bg">
	        		<img src="<?php echo $ui['bottom_bg'];?>" alt="">
	        	</div>
	        </div>
	    <?php } ?>
	</div>
</div>