<?php defined('IN_MET') or exit('No permission'); ?>
<?php $sidebar=strlen($ui[has][sidebar]);?>
<main class="$uicss met-shownews animsition">
	<div class="container">
		<div class="row">
		    <?php if($_M['form']['pageset']){ ?>
                <?php if($sidebar){ ?>
            <div class="col-md-9 met-shownews-body" m-id='<?php echo $ui['mid'];?>'>
                <div class="row">
            <?php }else{ ?>
                <div class="met-shownews-body col-md-10 offset-md-1" m-id='<?php echo $ui['mid'];?>'>
                    <div class="row">
            <?php } ?>
            <?php }else{ ?>
                <?php if($ui[has][sidebar]){ ?>
            <div class="col-md-9 met-shownews-body" m-id='<?php echo $ui['mid'];?>'>
                <div class="row">
            <?php }else{ ?>
                <div class="met-shownews-body col-md-10 offset-md-1" m-id='<?php echo $ui['mid'];?>'>
                    <div class="row">
            <?php } ?>
        <?php } ?>
					<section class="details-title border-bottom1">
                        <h1><?php echo $data['starttime'];?></h1>
                        <h1><?php echo $data['aaa'];?></h1>
						<h1 class='m-t-10 m-b-5'><?php echo $data['title'];?></h1>
						<div class="info font-weight-300">
							<span><?php echo $data['updatetime'];?></span>
							<span><?php echo $data['issue'];?></span>
							<span>
								<i class="icon wb-eye m-r-5" aria-hidden="true"></i>
								<?php echo $data['hits'];?>
							</span>
						</div>
					</section>
					<section class="met-editor clearfix">
						<?php echo $data['content'];?>
					</section>
					<div class="tag">
						<span><?php echo $data['tagname'];?></span>
						        <?php
            $sub = count($data[taglist]);
            $num = $ui[tag_num];
            if(!is_array($data[taglist])){
                $data[taglist] = explode('|',$data[taglist]);
            }
            foreach ($data[taglist] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($data[taglist])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $tag = $val;
            ?>
							<a href="<?php echo $tag['url'];?>" title="<?php echo $tag['name'];?>"><?php echo $tag['name'];?></a>
						<?php }?>
					</div>
					        <div class='met-page p-y-30 border-top1'>
    <div class="container p-t-30 ">
    <ul class="pagination block blocks-2"'>
        <li class='page-item m-b-0 <?php echo $data['preinfo']['disable'];?>'>
            <a href='<?php if($data['preinfo']['url']){?><?php echo $data['preinfo']['url'];?><?php }else{?>javascript:;<?php }?>' title="<?php echo $data['preinfo']['title'];?>" class='page-link text-truncate'>
                <?php echo $word['PagePre'];?>
                <span aria-hidden="true" class='hidden-xs-down'>: <?php if($data['preinfo']['title']){?><?php echo $data['preinfo']['title'];?><?php }else{?><?php echo $word['Noinfo'];?><?php }?></span>
            </a>
        </li>
        <li class='page-item m-b-0 <?php echo $data['nextinfo']['disable'];?>'>
            <a href='<?php if($data['nextinfo']['url']){?><?php echo $data['nextinfo']['url'];?><?php }else{?>javascript:;<?php }?>' title="<?php echo $data['nextinfo']['title'];?>" class='page-link pull-xs-right text-truncate'>
                <?php echo $word['PageNext'];?>
                <span aria-hidden="true" class='hidden-xs-down'>: <?php if($data['nextinfo']['title']){?><?php echo $data['nextinfo']['title'];?><?php }else{?><?php echo $word['Noinfo'];?><?php }?></span>
            </a>
        </li>
    </ul>
</div>
</div>
				
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
<div class="card-body-footer m-t-0">
    <a class="btn btn-outline btn-squared btn-primary met-job-cvbtn" href="javascript:;" data-toggle="modal" data-target="#met-job-cv" data-jobid="<?php echo $data['id'];?>" data-cvurl="cv.php?lang=cn&selected">立即报名</a>
</div>
<div class="modal fade modal-primary" id="met-job-cv" aria-hidden="true" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">参加人员</h4>
                <h5 style="cursor: pointer" onclick="addform()">添加参会人员</h5>
            </div>
            <div class="modal-body">
                <form method="POST" class="met-form met-form-validation" enctype="multipart/form-data" action="<?php echo $url['site'];?>activity/savavity.php?action=add&lang=<?php echo $M['lang'];?> ">
                    <input type="hidden" name="lang" value="<?php echo $_M['lang'];?>">
                    <input type="hidden" name="activity_id" value="<?php echo $_M['activity_id'];?>">
                    <div class="form-groups" >
                    <h5>参会人员信息</h5>
                    <div class="form-group"><input name="name[]" class="form-control" type="text" placeholder="<?php echo $word['Name'];?> "></div>
                    <div class="form-group"><input name="phone[]" class="form-control" type="text" placeholder="<?php echo $word['Phone'];?> "></div>
                    <div class="form-group"><input name="email[]" class="form-control" type="text" placeholder="<?php echo $word['Email'];?>"></div>
                    </div>

                    <div class="form-group" id="formBefro"><div class="input-group input-group-icon">
                            <input name="code" type="text" class="form-control input-codeimg" placeholder="<?php echo $word['memberImgCode'];?>" required="" data-fv-message="<?php echo $word['Empty'];?>">
                            <span class="input-group-addon p-5">
					<img src="<?php echo $url['site'];?>app/system/entrance.php?m=include&c=ajax_pin&a=dogetpin" onclick="reImg();" id="getcode" title="<?php echo $word['memberTip1'];?>" align="absmiddle" role="button" >
					</span>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <button type="submit" class="btn btn-primary btn-block btn-squared">立即报名</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function reImg() {
        var img = document.getElementById("getcode");
        img.src =img.src + "& rnd=" + Math.random();
    }
    var num = 2;
    function addform() {
        var fromStr = '<input type="hidden" name="lang" value="cn">'+
            '<h5>参会人员信息 '+num+'</h5>'+
            '<div class="form-groups">'+
            '<div class="form-group"><input name="name[]" class="form-control" type="text" placeholder="<?php echo $word['Name'];?> "></div>'+
            '<div class="form-group"><input name="phone[]" class="form-control" type="text" placeholder="<?php echo $word['Phone'];?> "></div>'+
            '<div class="form-group"><input name="email[]" class="form-control" type="text" placeholder="<?php echo $word['Email'];?>"></div>'+
            '</div>';

        $("#formBefro").before(fromStr);
        num++;
    }
    
</script>
