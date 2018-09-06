<?php defined('IN_MET') or exit('No permission'); ?>
<?php $sidebar=strlen($ui[has][sidebar]);
?>

<main class="$uicss met-shownews animsition">
    <div class="container">
        <div class="row">
            <if value="$_M['form']['pageset']">
                <if value="$sidebar">
                    <div class="col-md-9 met-shownews-body" m-id='{$ui.mid}'>
                        <div class="row">
                            <else/>
                            <div class="met-shownews-body col-md-10 offset-md-1" m-id='{$ui.mid}'>
                                <div class="row">
                </if>
                <else/>
                <if value="$ui[has][sidebar]">
                    <div class="col-md-9 met-shownews-body" m-id='{$ui.mid}'>
                        <div class="row">
                            <else/>
                            <div class="met-shownews-body col-md-10 offset-md-1" m-id='{$ui.mid}'>
                                <div class="row">
                </if>
            </if>
            <section class="details-title border-bottom1">
<!--                <h1>{$data.starttime}</h1>-->
                <h1 class='m-t-10 m-b-5'>{$data.title}</h1>
                <div class="info font-weight-300">
                    <span>{$data.updatetime}</span>
                    <span>{$data.issue}</span>
                    <span>
								<i class="icon wb-eye m-r-5" aria-hidden="true"></i>
								{$data.hits}
							</span>

                    <div class="tag">
                        <span>{$data.tagname}</span>
                        <list data="$data[taglist]" name="$tag" num="$ui[tag_num]">
                            <a href="{$tag.url}" title="{$tag.name}">{$tag.name}</a>
                        </list>
                    </div>
                </div>
                <if value="$data['is_activity'] eq 1">
                <div class="find_nav">
                <div class=" font-weight-1 find_nav_left" style="height: 46px" id="met-nav-collapse">
                    <ul class="nav navbar-nav navlist find_nav_list" style="">
                        <li class="nav-item">
                            <a href="javascript:void(0)" title="活动介绍" class="nav-link active">活动介绍</a>
                        </li>
                        <li class="nav-item m-l-30">
                            <a href="javascript:void(0)" title="活动日程" class="nav-link " >活动日程</a>
                        </li>
                        <li class="nav-item dropdown m-l-30">
                            <a  href="javascript:void(0)" title="嘉  宾" class="nav-link " >嘉  宾</a>
                        </li>
                        <li class="nav-item dropdown m-l-30">
                            <a  href="javascript:void(0)" title="赞助商" class="nav-link " >赞助商</a>

                        </li>
                        <li class="nav-item dropdown m-l-30">
                            <a  href="javascript:void(0)" title="会场交通" class="nav-link " >会场交通</a>

                        </li>
                        <li class="nav-item dropdown m-l-30">
                            <a  href="javascript:void(0)" title="活动纪要" class="nav-link " >活动纪要</a>

                        </li>
                        <li class="nav-item dropdown m-l-30">
                            <a  href="javascript:void(0)" title="活动照片" class="nav-link " >活动照片</a>

                        </li>
                    </ul>
                </div>
                </div>
                </if>

            </section>

            <div class="tab-box">
                <section class="met-editor clearfix active">
                    {$data.content}
                </section>
                <section class="met-editor clearfix">
                    {$data.schedule}
                </section>


                <section class="met-editor clearfix">
                    {$data.guest}
                </section>

                <section class="met-editor clearfix">
                    {$data.sponsor}
                </section>

                <section class="met-editor clearfix">
                    {$data.conference_traffic}
                </section>

                <section class="met-editor clearfix">
                    {$data.event_summary}
                </section>

                <section class="met-editor clearfix">
                    {$data.active_photo}
                </section>


            </div>



            <pagination/>

            <if value="$_M['form']['pageset']">
                <if value="$sidebar">
        </div>
    </div>
    <else/>
    </div>
    </div>
</main>
</if>
<else/>
<if value="$ui[has][sidebar]">
    </div>
    </div>
    <else/>
    </div>
    </div>
    </main>
</if>
</if>
<if value="$data['is_activity'] eq 1">
<div class=" button-news ">
    <a class="btn btn-outline btn-squared btn-primary met-job-cvbtn pushjoin" href="javascript:;" data-toggle="modal" data-target="#met-job-cv" data-jobid="{$data.id}" data-cvurl="cv.php?lang=cn&selected">立即报名</a>
</div>
</if>
<div class="modal fade modal-primary" id="met-job-cv" aria-hidden="true" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">{$word.Attendants}</h4>
                <h5 style="cursor: pointer" onclick="addform()">{$word.Addattendants}</h5>
            </div>
            <div class="modal-body">
                <form method="POST" onsubmit="return check(this)" class="met-form met-form-validation" enctype="multipart/form-data" action="{$url.site}activity/savavity.php?action=add&lang={$M['lang']} ">
                    <input type="hidden" name="lang" value="{$_M['lang']}">
                    <input type="hidden" name="activity_id" value="{$_M['activity_id']}">
                    <div class="form-groups" >


                            <div>
                                <span>{$word.Attendantsinfo}</span>
                            </div>
                            <div class="form-group">
                                <input name="name[]" class="form-control" required type="text" placeholder="{$word.Name} ">
                                <span class="error"  style="display:none"></span>
                            </div>
                            <div class="form-group">
                                <input name="phone[]" class="form-control" onblur="validatemobile(this)" required type="text" placeholder="{$word.Phone} ">
                                <span class="error"  style="display:none"></span>
                            </div>
                            <div class="form-group">
                                <input name="email[]" class="form-control" onblur="validateemail(this)" required type="email" placeholder="{$word.Email}">
                                <span class="error"  style="display:none"></span>
                            </div>



                    </div>

                    <div class="form-group" id="formBefro"><div class="input-group input-group-icon">
                            <input name="code" type="text" class="form-control input-codeimg" placeholder="{$word.memberImgCode}" required="" data-fv-message="{$word.Empty}">
                            <span class="input-group-addon p-5">
					<img src="{$url.site}app/system/entrance.php?m=include&c=ajax_pin&a=dogetpin" onclick="reImg();" id="getcode" title="{$word.memberTip1}" align="absmiddle" role="button" >
					</span>
                        </div>
                    </div>

                    <div class="form-group m-b-0">

                        <button type="submit"  class="btn btn-primary btn-block btn-squared">{$word.Signup}</button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>
    reImg();
    function reImg() {
        var img = document.getElementById("getcode");
        img.src =img.src + "& rnd=" + Math.random();
    }
    var num = 2;
    function addform() {
        var fromStr = '<div>'+
            '<div>'+
            '<span>{$word.Attendantsinfo}</span><span style="float: right;cursor: pointer" title="删除" onclick="deldiv(this)">X</span>'+
            '</div>'+
            '<div class="form-groups">'+
            '<div class="form-group"><input name="name[]"  required class="form-control" type="text" placeholder="{$word.Name} "><span class="error"  style="display:none"></span></div>'+
            '<div class="form-group"><input name="phone[]" required class="form-control" onblur="validatemobile(this)" type="text" placeholder="{$word.Phone} "><span class="error"  style="display:none"></span></div>'+
            '<div class="form-group"><input name="email[]" required  class="form-control" onblur="validateemail(this)" type="email" placeholder="{$word.Email}"><span class="error"  style="display:none"></span></div>'+
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

        $("form :input").blur();

        console.log(valimobile);
        console.log(valiphone);
        if(valimobile && valiphone){
            return true
        }
        return false;


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
