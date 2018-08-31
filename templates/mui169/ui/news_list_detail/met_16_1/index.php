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

            </section>
            <section class="met-editor clearfix">
                {$data.content}
            </section>

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
<div class="card-body-footer m-t-0">
    <a class="btn btn-outline btn-squared btn-primary met-job-cvbtn" href="javascript:;" data-toggle="modal" data-target="#met-job-cv" data-jobid="{$data.id}" data-cvurl="cv.php?lang=cn&selected">立即报名</a>
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
                <form method="POST" class="met-form met-form-validation" enctype="multipart/form-data" action="{$url.site}activity/savavity.php?action=add&lang={$M['lang']} ">
                    <input type="hidden" name="lang" value="{$_M['lang']}">
                    <input type="hidden" name="activity_id" value="{$_M['activity_id']}">
                    <div class="form-groups" >
                        <h5>{$word.Attendantsinfo}</h5>
                        <div class="form-group"><input name="name[]" class="form-control" type="text" placeholder="{$word.Name} "></div>
                        <div class="form-group"><input name="phone[]" class="form-control" type="text" placeholder="{$word.Phone} "></div>
                        <div class="form-group"><input name="email[]" class="form-control" type="text" placeholder="{$word.Email}"></div>
                    </div>

                    <div class="form-group" id="formBefro"><div class="input-group input-group-icon">
                            <input name="code" type="text" class="form-control input-codeimg" placeholder="{$word.memberImgCode}" required="" data-fv-message="{$word.Empty}">
                            <span class="input-group-addon p-5">
					<img src="{$url.site}app/system/entrance.php?m=include&c=ajax_pin&a=dogetpin" onclick="reImg();" id="getcode" title="{$word.memberTip1}" align="absmiddle" role="button" >
					</span>
                        </div>
                    </div>

                    <div class="form-group m-b-0">

                        <button type="submit" class="btn btn-primary btn-block btn-squared">{$word.Signup}</button>

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
            '<h5>{$word.Attendants} '+num+'</h5>'+
            '<div class="form-groups">'+
            '<div class="form-group"><input name="name[]" class="form-control" type="text" placeholder="{$word.Name} "></div>'+
            '<div class="form-group"><input name="phone[]" class="form-control" type="text" placeholder="{$word.Phone} "></div>'+
            '<div class="form-group"><input name="email[]" class="form-control" type="text" placeholder="{$word.Email}"></div>'+
            '</div>';

        $("#formBefro").before(fromStr);
        num++;
    }

</script>
