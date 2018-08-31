<?php defined('IN_MET') or exit('No permission'); ?>
    <?php if($data[index_num]<>7){ ?>
<div class="col-md-3">
	<div class="row">
<aside class="$uicss met-sidebar panel panel-body m-b-0" boxmh-h m-id='<?php echo $ui['mid'];?>' m-type='nocontent'>
	<form class='sidebar-search' method='get' action="<?php echo $c['met_weburl'];?>search/search.php">
		<input type='hidden' name='lang' value='<?php echo $data['lang'];?>' />
		<input type='hidden' name='class1' value='<?php echo $data['class1'];?>' />
		<div class="form-group">
			<div class="input-search">
				<button type="submit" class="input-search-btn">
					<i class="icon wb-search" aria-hidden="true"></i>
				</button>
				<input type="text" class="form-control" name="searchword" placeholder="<?php echo $ui['sidebar_search_placeholder'];?>">
			</div>
		</div>
	</form>
	    <?php if($ui['sidebar_column_ok']){ ?>
	<ul class="sidebar-column list-icons">
		<?php
    $type=strtolower(trim('current'));
    $cid=$data['class1'];
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
		<li>
			<a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" class="    <?php if($data[classnow]==$m[id]){ ?>
					active
					<?php } ?>" <?php echo $m['urlnew'];?>><?php echo $m['name'];?></a>
		</li>
		<?php
    $type=strtolower(trim('son'));
    $cid=$m['id'];
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
            $m['class']="active";
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
		<li>
			    <?php if($m['sub'] && $ui['sidebar_column3_ok']){ ?>
			<a href="javascript:;" title="<?php echo $m['name'];?>" class='<?php echo $m['class'];?>' <?php echo $m['urlnew'];?> data-toggle="collapse" data-target=".sidebar-column3-<?php echo $m['_index'];?>"><?php echo $m['name'];?><i class="wb-chevron-right-mini"></i></a>
	        <div class="sidebar-column3-<?php echo $m['_index'];?> collapse" aria-expanded="false">
	            <ul class="m-t-5 p-l-20">
	                <li><a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?> title="<?php echo $ui['all'];?>" class="<?php echo $m['class'];?>"><?php echo $ui['all'];?></a></li>
					<?php
    $type=strtolower(trim('son'));
    $cid=$m['id'];
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
            $m['class']="active";
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
	                <li><a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?> title="<?php echo $m['name'];?>" class='<?php echo $m['class'];?>'><?php echo $m['name'];?></a></li>
					<?php endforeach;?>
	            </ul>
	        </div>
			<?php }else{ ?>
			<a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" class='<?php echo $m['class'];?>'><?php echo $m['name'];?></a>
	        <?php } ?>
		</li>
		<?php endforeach;?>
		<?php endforeach;?>
	</ul>
	<?php } ?>
	    <?php if($ui['sidebar_newslist_ok']){ ?>
	<div class="sidebar-news-list recommend">
		<h3 class='font-size-16 m-0'><?php echo $ui['sidebar_newslist_title'];?></h3>
		<ul class="list-group list-group-bordered m-t-10 m-b-0">
			<?php
    $cid=$data['class1'];

    $num = $ui['sidebar_newslist_num'];
    $module = "";
    $type = all;
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
			<li class="list-group-item">
				<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>><?php echo $v['title'];?></a>
			</li>
			<?php endforeach;?>
		</ul>
	</div>
	<?php } ?>
	    <?php if($ui['sidebar_piclist_ok']){ ?>
	<div class='sidebar-piclist'>
		<h3 class='m-0 font-size-16 font-weight-300'><?php echo $ui['sidebar_piclist_title'];?></h3>
		<ul class='blocks-2 blocks-md-3 blocks-lg-100 m-t-20 text-xs-center imagesize sidebar-piclist-ul' data-scale='0.75117370892019'>
			<?php
    $cid=$ui['sidebar_piclist_id'];

    $num = $ui['sidebar_piclist_num'];
    $module = "";
    $type = all;
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
			<li class='masonry-child'>
				<a href='<?php echo $v['url'];?>' title='<?php echo $v['title'];?>' class='block m-b-0' target='_blank'>
					<img data-original="<?php echo thumb($v['imgurl'],$v['img_x'],$v['img_y']);?>" class='cover-image' alt='<?php echo $v['title'];?>' height='100'></a>
				<h4 class='m-t-10 m-b-0 font-size-14'>
					<a href='<?php echo $v['url'];?>' title='<?php echo $v['title'];?>' target='_blank'><?php echo $v['title'];?></a>
				</h4>
				<p class='m-b-0 red-600'>价格-没有数据</p>
			</li>
			<?php endforeach;?>
		</ul>
	</div>
	<?php } ?>
</aside>
</div>
</div>
<?php } ?>
		</div>
    </div>
</main>