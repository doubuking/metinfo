<?php defined('IN_MET') or exit('No permission'); ?>
        <?php
            $sub = count($result);
            $num = 30;
            if(!is_array($result)){
                $result = explode('|',$result);
            }
            foreach ($result as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($result)-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $v = $val;
            ?>
<li class="list-group-item">
	<div class="media">
		<div class="media-left p-r-5 p-l-10 hidden-xs-down">
			<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>">
				<i class="icon fa-file-archive-o blue-grey-400"></i>
			</a>
		</div>
		<div class="media-body">
			<a class="btn btn-outline btn-primary btn-squared pull-xs-right" href="<?php echo $v['downloadurl'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>><?php echo $ui['download'];?></a>
			<h4 class="media-heading font-size-16">
				<a class="name" href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" target='_self'><?php echo $v['title'];?></a>
			</h4>
			<small class='font-size-14 blue-grey-500'>
				<span><?php echo $v['filesize'];?> kb</span>
				<span class="m-l-10"><?php echo $v['updatetime'];?></span>
			</small>
		</div>
	</div>
</li>
<?php }?>