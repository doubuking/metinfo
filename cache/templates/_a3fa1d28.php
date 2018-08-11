<?php defined('IN_MET') or exit('No permission'); ?>
<?php $sidebar=strlen($ui[has][sidebar]);?>
<main class="$uicss met-news">
    <div class="container">
        <div class="row">
     <?php if($data[index_num]==7 && $data[sub]){ ?>
<!--展示下级栏目-->
            <div class="$uicss"  m-id='<?php echo $ui['mid'];?>'>
                <ul class="service-list blocks-100 blocks-sm-2 blocks-md-3 blocks-xlg-4  clearfix">
                <?php
    $type=strtolower(trim('son'));
    $cid=$data[classnow];
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
                <li class="item">
                <a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" <?php echo $m['urlnew'];?>>
                <img src="<?php echo $m['columnimg'];?>" alt="<?php echo $m['name'];?>"/>
                <h4><?php echo $m['name'];?></h4>
                <p><?php echo $m['description'];?></p>
                </a>
                </li>
                <?php endforeach;?>
                </ul>
            </div>
    <?php }else{ ?>
            <?php
    $cid = $data[classnow];
    if($cid == 0){
        $cid = $data['classnow'];
    }
    $num = $c['met_news_list'];
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
?><?php endforeach;?>
                <?php if($sub){ ?>
                        <?php if($_M['form']['pageset']){ ?>
                            <?php if($sidebar){ ?>
                        <div class="col-md-9 met-news-body">
                            <div class="row">
                        <?php } ?>
                        <?php }else{ ?>
                            <?php if($ui[has][sidebar]){ ?>
                        <div class="col-md-9 met-news-body">
                            <div class="row">
                        <?php } ?>
                    <?php } ?>
                    <div class="met-news-list">
                        <ul class="ulstyle met-pager-ajax imagesize" data-scale='<?php echo $c['met_newsimg_y'];?>x<?php echo $c['met_newsimg_x'];?>' m-id='<?php echo $ui['mid'];?>'>
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
                        </ul>
                        <div class='m-t-20 text-xs-center hidden-sm-down' m-type="nosysdata">
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
                        <div class="met_pager met-pager-ajax-link hidden-md-up" data-plugin="appear" data-animate="slide-bottom" data-repeat="false" m-type="nosysdata">
                            <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn" data-plugin="ladda" data-style="slide-left" data-url="" data-page="1">
                                <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
        <?php }else{ ?>
                    <div class='h-100 text-xs-center font-size-20 vertical-align' m-id='<?php echo $ui['mid'];?>'><?php echo $ui['nodata'];?></div>
        <?php } ?>
<?php } ?>
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
