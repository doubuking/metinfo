<?php defined('IN_MET') or exit('No permission'); ?>
<main class="$uicss met-job animsition">
    <div class="container">
        <div class="row">
        <if value="$ui[has][sidebar]">
            <div class="col-md-9 met-shownews-body" m-id='{$ui.mid}'>
        <else/>
            <div class="col-md-10 offset-md-1 met-shownews-body" m-id='{$ui.mid}'>
        </if>
            <div class="card card-article card-shadow">
                <div class="card-body">
                    <h3 class="card-title">
                        {$data.position}
                    </h3>
                    <p class="card-metas">
                        <span class="m-r-5">{$data.addtime}</span>
                        <span class="m-r-5"><i class="icon wb-map margin-right-5" aria-hidden="true"></i>{$data.place}</span>
                        <span class="m-r-5"><i class="icon wb-user margin-right-5" aria-hidden="true"></i>{$data.count}</span>
                        <span class="m-r-5"><i class="icon wb-payment margin-right-5" aria-hidden="true"></i>{$data.deal}</span>
                    </p>
                    <hr>
                    <div class="met-editor lazyload clearfix">{$data.content}</div>
                    <hr>
                    <div class="card-body-footer m-t-0">
                        <a class="btn btn-outline btn-squared btn-primary met-job-cvbtn" href="javascript:;" data-toggle="modal" data-target="#met-job-cv" data-jobid="{$data.id}" data-cvurl="cv.php?lang=cn&selected">{$ui.cvtitle}</a>
                    </div>
                </div>
            </div>
            </div>
<if value="!$ui[has][sidebar]">
        </div>
    </div>
    <div class="modal fade modal-primary" id="met-job-cv" aria-hidden="true" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">{$ui.cvtitle}</h4>
                </div>
                <div class="modal-body">
                    <tag action='job.form'></tag>
                </div>
            </div>
        </div>
    </div>
</main>
</if>