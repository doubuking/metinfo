<?php defined('IN_MET') or exit('No permission'); ?>
<?php $sidebar=strlen($ui[has][sidebar]);?>
<main class="$uicss met-show-body panel panel-body m-b-0 
	    <?php if($ui['bg_type']){ ?>
		bgcolor
	<?php }else{ ?>
		bgpic
	<?php } ?>" boxmh-mh m-id='<?php echo $ui['mid'];?>'>
    <?php if($ui['container']){ ?>
	<div class="container-fluid">
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
		<?php echo $data['content'];?>
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

	
<?php }else{ ?>
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
				<section class="met-editor clearfix">
					    <?php if($data['content']){ ?>
					<?php echo $data['content'];?>
					<?php }else{ ?>
					<div class='h-100 text-xs-center font-size-20 vertical-align'><?php echo $lang['nodata'];?></div>
					<?php } ?>
				</section>
			        <?php if($ui['radio_ok']){ ?>
				    <div>
					        <?php if($ui['title']<>'0'){ ?>
						    <h3 class="title"><?php echo $ui['title'];?></h3>
						<?php } ?>
						<section class="met-feedback animsition">
				        	<?php
    $cid= $ui[id];
    $cid= $cid ? $cid : $data['classnow'];
    $fdtitle=$data['name'];
    $result = load::sys_class('label', 'new')->get('feedback')->get_module_form_html($cid,$fdtitle);
    echo $result;
?>
				        </section>
					</div>
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
				            </div>
				        </div>
				       </main>
				    <?php } ?>
				<?php } ?>
			<!-- /sidebar -->	
<?php } ?>


