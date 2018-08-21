<?php defined('IN_MET') or exit('No permission'); ?>
<?php $sidebar=strlen($ui[has][sidebar]);?>
<main class="$uicss met-download animsition" m-id='<?php echo $ui['mid'];?>'>
    <div class="container">
        <div class="row">
        <div class="met-download-list">
<?php
    $cid = $data[classnow];
    if($cid == 0){
        $cid = $data['classnow'];
    }
    $num = $c['met_download_list'];
    $order = "no_order";
    $result = load::sys_class('label', 'new')->get('download')->get_list_page($cid, $data['page']);
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
            <div class="met-download-list col-md-9">
                <div class="row">
            <?php }else{ ?>
            <div class="met-download-list">
                <div class="row">
            <?php } ?>
            <?php }else{ ?>
                <?php if($ui[has][sidebar]){ ?>
            <div class="met-download-list col-md-9">
                <div class="row">
            <?php }else{ ?>
            <div class="met-download-list">
                <div class="row">
            <?php } ?>
        <?php } ?>
                <ul class="list-group list-group-dividered list-group-full met-pager-ajax ">
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
            </div>
            <?php }else{ ?>
            <div class='h-100 text-xs-center font-size-20 vertical-align' m-id='<?php echo $ui['mid'];?>'><?php echo $g['nodata'];?></div>
<?php } ?>
    <?php if($_M['form']['pageset']){ ?>
        <?php if(!$sidebar){ ?>
                </div>
            </div>
        </main>
    <?php } ?>
<?php }else{ ?>
        <?php if(!$ui[has][sidebar]){ ?>
        </div>
    </div>
</main>
    <?php } ?>
<?php } ?>