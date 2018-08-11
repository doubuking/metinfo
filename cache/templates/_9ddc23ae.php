<?php defined('IN_MET') or exit('No permission'); ?>
    <?php if($ui['news_headlines'] && $ui['news_listtype']<>3){ ?>
<!--头条-->
	    <?php if(!$data[page] && !$data[class2]){ ?>
	<div class="news-headlines imagesize" data-scale='<?php echo $ui['news_headlines_y'];?>x<?php echo $ui['news_headlines_x'];?>'>
		<div class="news-headlines-slick cover">
		<?php
    $cid = 0;
    if($cid == 0){
        $cid = $data['classnow'];
    }
    $num = $ui[news_headlines_num];
    $order = "no_order";
    $news = load::sys_class('label', 'new')->get('news');
    $news->page_num = $num;
    $result = $news->get_list_page($cid, $data['page']);
    $sub = count($result);
     foreach($result as $index=>$v):
        $v['sub']      = $sub;
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
?>
			<div class='slick-slide'>
				<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>>
					<img class="cover-image"     <?php if($v['_index']>0){ ?>data-lazy<?php }else{ ?>src<?php } ?>="<?php echo thumb($v['imgurl'],$ui['news_headlines_x'],$ui['news_headlines_y']);?>" data-srcset="<?php echo thumb($v['imgurl'],450,450*$ui['news_headlines_y']/$ui['news_headlines_x']);?> 450w,<?php echo thumb($v['imgurl'],$ui['news_headlines_x'],$ui['news_headlines_y']);?>" sizes='(max-width:479px) 450px' alt="<?php echo $v['title'];?>">
					<div class="headlines-text text-xs-center">
						<h3><?php echo $v['title'];?></h3>
					</div>
				</a>
			</div>
		<?php endforeach;?>
		</div>
	</div>
	<?php } ?>
<?php } ?>
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
    <?php if($ui['news_listtype']==1){ ?>
<!-- 极简模式 -->
    <?php if(($ui['news_headlines'] && !$data[page] && !$data[class2] && $v['_index']>=$ui[news_headlines_num]) || ($ui['news_headlines'] && !$data[page] && $data[class2]) || $data[page] || !$ui['news_headlines']){ ?>
	<li class='border-bottom1'>
		<h4>
			<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>><?php echo $v['title'];?></a>
		</h4>
		<p class="des font-weight-300"><?php echo $v['description'];?></p>
		<p class="info font-weight-300">
			<span><?php echo $v['updatetime'];?></span>
			<span><?php echo $v['issue'];?></span>
			<span><i class="icon wb-eye m-r-5 font-weight-300" aria-hidden="true"></i><?php echo $v['hits'];?></span>
		</p>
	</li>
<?php } ?>
<?php } ?>
    <?php if($ui['news_listtype']==2){ ?>
<!-- 图文模式 -->
    <?php if(($ui['news_headlines'] && !$data[page] && !$data[class2] && $v['_index']>=$ui[news_headlines_num]) || ($ui['news_headlines'] && !$data[page] && $data[class2]) || $data[page] || !$ui['news_headlines']){ ?>
	<li class="media media-lg border-bottom1">
		<div class="media-left">
			<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>>
				<img class="media-object"     <?php if($v['_index']>($ui['news_headlines']?2+$ui['news_headlines_num']:3) || $data['page']>1){ ?>data-original<?php }else{ ?>src<?php } ?>="<?php echo thumb($v['imgurl'],$c['met_newsimg_x'],$c['met_newsimg_y']);?>" alt="<?php echo $v['title'];?>" height='100'>
			</a>
		</div>
		<div class="media-body">
			<h4>
				<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>><?php echo $v['title'];?></a>
			</h4>
			<p class="des font-weight-300">
				<?php echo $v['description'];?>
			</p>
			<p class="info font-weight-300">
				<span><?php echo $v['updatetime'];?></span>
				<span><?php echo $v['issue'];?></span>
				<span>
					<i class="icon wb-eye m-r-5 font-weight-300" aria-hidden="true"></i>
					<?php echo $v['hits'];?>
				</span>
			</p>
		</div>
	</li>
<?php } ?>
<?php } ?>
    <?php if($ui['news_listtype']==3){ ?>
<!-- 橱窗模式 -->
<div class="card card-shadow">
	<div class="card-header p-0">
		<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>>
			<img class="cover-image"     <?php if($v['_index']>3 || $data['page']>1){ ?>data-original<?php }else{ ?>src<?php } ?>="<?php echo thumb($v['imgurl'],$ui['news_ccimg_x'],$ui['news_ccimg_y']);?>" data-srcset='<?php echo thumb($v['imgurl'],400);?> 400w,<?php echo thumb($v['imgurl'],$ui['news_ccimg_x'],$ui['news_ccimg_y']);?>' sizes='(max-width:479px) 400px' alt="<?php echo $v['title'];?>" height='100'>
		</a>
	</div>
	<div class="card-body">
		<h4 class="card-title">
			<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>><?php echo $v['title'];?></a>
		</h4>
		<p class="card-metas font-size-12 font-weight-300">
			<span><?php echo $v['updatetime'];?></span>
			<span><?php echo $v['issue'];?></span>
			<span><i class="icon wb-eye m-r-5 font-weight-300" aria-hidden="true"></i><?php echo $v['hits'];?></span>
		</p>
		<p class="m-b-0 font-weight-300"><?php echo $v['description'];?></p>
	</div>
</div>
<?php } ?>
<?php }?>