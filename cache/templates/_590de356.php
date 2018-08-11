<?php defined('IN_MET') or exit('No permission'); ?>
<?php $sidebar=strlen($ui[has][sidebar]);?>
<main class="$uicss page-content" m-id='<?php echo $ui['mid'];?>'>
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
                
                    <?php
    $cid = 0;
    if($cid == 0){
        $cid = $data['classnow'];
    }

    $num = $c['met_job_list'];
    $order = "no_order";
    $result = load::sys_class('label', 'new')->get('job')->get_list_page($cid, $data['page']);
    $sub = count($result);

     foreach($result as $index=>$v):
        $v['sub']      = $sub;
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == ($sub-1) ? true : false;
?><?php endforeach;?>
                        <?php if($sub){ ?>
                        <div class="met-job-list met-pager-ajax" >
                        	<?php defined('IN_MET') or exit('No permission'); ?>
<main class="$uicss met-download animsition" m-id='<?php echo $ui['mid'];?>'>
    <div class="container">
        <div class="row">
        <?php
    $cid = 0;
    if($cid == 0){
        $cid = $data['classnow'];
    }

    $num = $c['met_job_list'];
    $order = "no_order";
    $result = load::sys_class('label', 'new')->get('job')->get_list_page($cid, $data['page']);
    $sub = count($result);

     foreach($result as $index=>$v):
        $v['sub']      = $sub;
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == ($sub-1) ? true : false;
?>
			<div class="card card-shadow">
				<h4 class='card-title p-0 font-size-24'><?php echo $v['position'];?></h4>
				<p class="card-metas font-size-12 blue-grey-400">
					<span class='m-r-10'><?php echo $v['addtime'];?></span>
					<span class='m-r-10'>
						<i class="icon wb-map m-r-5" aria-hidden="true"></i>
						<?php echo $v['place'];?>
					</span>
					<span class='m-r-10'>
						<i class="icon wb-user m-r-5" aria-hidden="true"></i>
						<?php echo $v['count'];?>
					</span>
					<span>
						<i class="icon wb-payment m-r-5" aria-hidden="true"></i>
						<?php echo $v['deal'];?>
					</span>
				</p>
				<hr>
				<div class="met-editor clearfix">
					<?php echo $v['content'];?>
				</div>
				<hr>
				<div class="card-body-footer m-t-0">
					<a class="btn btn-outline btn-squared btn-primary met-job-cvbtn" href="javascript:;" data-toggle="modal" data-target="#met-job-cv" data-jobid="<?php echo $v['id'];?>" data-cvurl="cv.php?lang=cn&selected"><?php echo $ui['cvtitle'];?></a>
				</div>
			</div>
		<?php endforeach;?>
		</div>
	</div>
</main>
                        </div>
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
                    <?php }else{ ?>
                        <div class='h-100 text-xs-center font-size-20 vertical-align' ><?php echo $ui['nodata'];?></div>
                    <?php } ?>
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
                            
                       </main>
                    <?php } ?>
                <?php } ?>
        <!-- /sidebar -->       
			
	

	    <?php if($sub){ ?>
        <div class="modal fade modal-primary" id="met-job-cv" aria-hidden="true" role="dialog" tabindex="-1">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        					<span aria-hidden="true">×</span>
        				</button>
        				<h4 class="modal-title"><?php echo $ui['cvtitle'];?></h4>
        			</div>
        			<div class="modal-body">
        				
<?php

    $result = load::sys_class('label', 'new')->get('job')->get_module_form_html  ();

    echo $result;
?>
        			</div>
        		</div>
        	</div>
        </div>
    <?php } ?>

