<?php defined('IN_MET') or exit('No permission'); ?>
<?php $sidebar=strlen($ui[has][sidebar]);
?>
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
<!--                <h1><?php echo $data['starttime'];?></h1>-->
                <h1 class='m-t-10 m-b-5'><?php echo $data['title'];?></h1>
                <div class="info font-weight-300">
                    <span><?php echo $data['updatetime'];?></span>
                    <span><?php echo $data['issue'];?></span>
                    <span>
								<i class="icon wb-eye m-r-5" aria-hidden="true"></i>
								<?php echo $data['hits'];?>
							</span>

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
                </div>

            </section>
            <section class="met-editor clearfix">
                <?php echo $data['content'];?>
            </section>

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
    <?php if($data['is_activity']==1){ ?>
<div class="card-body-footer m-t-0">
    <a class="btn btn-outline btn-squared btn-primary met-job-cvbtn" href="javascript:;" data-toggle="modal" data-target="#met-job-cv" data-jobid="<?php echo $data['id'];?>" data-cvurl="cv.php?lang=cn&selected">立即报名</a>
</div>
<?php } ?>
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
                    <input type="hidden" name="lang" value="<?php echo $_M['lang'];?>">
                    <input type="hidden" name="activity_id" value="<?php echo $_M['activity_id'];?>">
                    <div class="form-groups" >


                            <div>
                                <span><?php echo $word['Attendantsinfo'];?></span>
                            </div>
                            <div class="form-group">
                                <input name="name[]" class="form-control" required type="text" placeholder="<?php echo $word['Name'];?> ">
                                <span class="error"  style="display:none"></span>
                            </div>
                            <div class="form-group">
                                <input name="phone[]" class="form-control" onblur="validatemobile(this)" required type="text" placeholder="<?php echo $word['Phone'];?> ">
                                <span class="error"  style="display:none">有问题</span>
                            </div>
                            <div class="form-group">
                                <input name="email[]" class="form-control" onblur="validateemail(this)" required type="email" placeholder="<?php echo $word['Email'];?>">
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
    function reImg() {
        var img = document.getElementById("getcode");
        img.src =img.src + "& rnd=" + Math.random();
    }
    var num = 2;
    function addform() {
        var fromStr = '<div>'+
            '<div>'+
            '<span><?php echo $word['Attendantsinfo'];?></span><span style="float: right;cursor: pointer" title="删除" onclick="deldiv(this)">X</span>'+
            '</div>'+
            '<div class="form-groups">'+
            '<div class="form-group"><input name="name[]"  required class="form-control" type="text" placeholder="<?php echo $word['Name'];?> "><span class="error"  style="display:none"></span></div>'+
            '<div class="form-group"><input name="phone[]" required class="form-control" onblur="validatemobile(this)" type="text" placeholder="<?php echo $word['Phone'];?> "><span class="error"  style="display:none"></span></div>'+
            '<div class="form-group"><input name="email[]" required  class="form-control" onblur="validateemail(this)" type="email" placeholder="<?php echo $word['Email'];?>"><span class="error"  style="display:none"></span></div>'+
            '</div>';

        $("#formBefro").before(fromStr);
        num++;
    }
    //删除元素
    function deldiv(e) {
        $(e).parent().parent().remove();
    }
    var valimobile = false;
    var valiphone = false;

    function check(from) {
//        alert(111);
        $("form :input").blur();

        console.log(valimobile);
        console.log(valiphone);
        if(valimobile && valiphone){
            return true
        }
        return false;

//        var aa= $(form).childrens().find('.form-group .form-control').attr(name="phone[]");
//         validatemobile(aa)
//
//        var bb= $(form).childrens().find('.form-group .form-control').attr(name='email[]');
//
//        validateemail(bb);
//
//        return false;
    }


    function validatemobile(e)
    {
        var mobile = e.value;
        if(mobile.length==0)
        {
            $(e).next(".error").text('手机号码不能为空！').show();
            valimobile = false;
            return false;
        }
        if(mobile.length!=11)
        {
            $(e).next(".error").text('请输入有效的手机号码，需是11位！').show();
            valimobile = false;
            return false;
        }

        var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
        if(!myreg.test(mobile))
        {
            $(e).next(".error").text('请输入有效的手机号码！').show();
            valimobile = false;
            return false;
        }

        $(e).next(".error").hide();
        valimobile = true;
        return true;
    }

    function validateemail(e){
        var obj = e.value;
        //对电子邮件的验证
        var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        if(!myreg.test(obj))
        {
            $(e).next(".error").text('请输入有效的邮箱').show();
            valiphone = false;
            return false;
        }
        $(e).next(".error").hide();
        valiphone = true;
        return true;
    }



</script>
