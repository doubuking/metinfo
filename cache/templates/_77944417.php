<?php defined('IN_MET') or exit('No permission');
dump($result);
?>
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
			<a class="btn btn-outline btn-primary btn-squared pull-xs-right" href="<?php echo $v['downloadurl'];?>"  title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>><?php echo $ui['download'];?></a>
                <?php if($v['dowload_password']<>''){ ?>
			<a class="btn btn-outline btn-primary btn-squared pull-xs-right" data-toggle="modal" data-target="#met-job-cv" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>>密码下载</a>
            <?php } ?>
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

<div class="modal fade modal-primary" id="met-job-cv" aria-hidden="true" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title"><?php echo $word['Attendants'];?></h4>
                <h5 style="cursor: pointer" onclick="addform()"><?php echo $word['Addattendants'];?></h5>
            </div>
            <div class="modal-body">
                <form method="POST" onsubmit="return check(this)" class="met-form met-form-validation" enctype="multipart/form-data" action="<?php echo $url['site'];?>activity/savavity.php?action=add&lang=<?php echo $M['lang'];?> ">

                    <div class="form-groups" >


                        <div>
                            <span>请输入下载密码</span>
                        </div>
                        <div class="form-group">
                            <input name="download_password" class="form-control" required type="text" placeholder="下载密码 ">
                            <span class="error"  style="display:none"></span>
                        </div>




                    </div>

                    <div class="form-group" id="formBefro"><div class="input-group input-group-icon">
                            <input name="code" type="text" class="form-control input-codeimg" placeholder="<?php echo $word['memberImgCode'];?>" required="" data-fv-message="<?php echo $word['Empty'];?>">
                            <span class="input-group-addon p-5">
					<img src="<?php echo $url['site'];?>app/system/entrance.php?m=include&c=ajax_pin&a=dogetpin" onclick="reImg();" id="getcode" title="<?php echo $word['memberTip1'];?>" align="absmiddle" role="button" >
					</span>
                        </div>
                    </div>

                    <div class="form-group m-b-0">

                        <button type="submit"  class="btn btn-primary btn-block btn-squared"><?php echo $word['Signup'];?></button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function down(e) {
        confirm('请输入密码');
    }
</script>