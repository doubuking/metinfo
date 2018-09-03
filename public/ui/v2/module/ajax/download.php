<?php defined('IN_MET') or exit('No permission');
dump($result);
?>
<list data="$result" name="$v">
<li class="list-group-item">
	<div class="media">
		<div class="media-left p-r-5 p-l-10 hidden-xs-down">
			<a href="{$v.url}" title="{$v.title}">
				<i class="icon fa-file-archive-o blue-grey-400"></i>
			</a>
		</div>
		<div class="media-body">
			<a class="btn btn-outline btn-primary btn-squared pull-xs-right" href="{$v.downloadurl}"  title="{$v.title}" {$g.urlnew}>{$ui.download}</a>
            <if value="$v['dowload_password'] neq ''">
			<a class="btn btn-outline btn-primary btn-squared pull-xs-right" data-toggle="modal" data-target="#met-job-cv" title="{$v.title}" {$g.urlnew}>密码下载</a>
            </if>
			<h4 class="media-heading font-size-16">
				<a class="name" href="{$v.url}" title="{$v.title}" target='_self'>{$v.title}</a>
			</h4>
			<small class='font-size-14 blue-grey-500'>
				<span>{$v.filesize} kb</span>
				<span class="m-l-10">{$v.updatetime}</span>
			</small>
		</div>
	</div>
</li>
</list>

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
    function down(e) {
        confirm('请输入密码');
    }
</script>