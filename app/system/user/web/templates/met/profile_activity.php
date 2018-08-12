<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$data['page_title']=$_M['word']['memberIndex9'].$data['page_title'];
?>
<include file="sys_web/head"/>
<div class="page bg-pagebg1 met-member member-profile">
	<div class="container">
		<div class="page-content row">
			<include file='app/sidebar'/>
			<div class="col-lg-9">
				<div class="panel panel-default m-b-0">
					<div class='panel-body met-member-index met-member-profile'>
					  	<div class="panel-heading p-y-10 p-x-15">已报名的活动</div>
					  	<div class="basic">
                            <div class="row">
                                <div class="col-xs-2 col-sm-2">
                                    活动名
                                </div>
                                <div class="col-xs-3 col-sm-3">
                                    活动开始时间
                                </div>
                                <div class="col-xs-3 col-sm-3">
                                    活动结束时间
                                </div>
                                <div class="col-xs-2 col-sm-2">
                                    状态
                                </div>
                                <div class="col-xs-2 col-sm-2">
                                    查看
                                </div>
                            </div>
                            <list data="$data.result" name="$val">
							<div class="row">
								<div class="col-xs-2 col-sm-2">
									{$val.title}
								</div>
								<div class="col-xs-3 col-sm-3">
									{$val.starttime}
								</div>
                                <div class="col-xs-3 col-sm-3">
                                    {$val.endtime}
                                </div>
                                <div class="col-xs-2 col-sm-2">
                                    <if value="$val['status'] eq 1">
                                        已付款
                                    <else/>
                                        未付款
                                    </if>
                                </div>
                                <div class="col-xs-2 col-sm-2">
                                    <div class="card-body-footer m-t-0">
                                        <a class="btn btn-outline btn-squared btn-primary met-job-cvbtn" onclick="poPup(this)" href="javascript:;" data-toggle="modal" data-target="#met-job-cv" data-jobid="{$val.id}" data-cvurl="cv.php?lang=cn&selected">查看参会人员</a>
                                    </div>
                                </div>
							</div>
                            </list>
					  	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!--弹窗-->


<div class="modal fade modal-primary" id="met-job-cv" aria-hidden="true" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">参加人员</h4>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>姓名</th>
                        <th>手机号</th>
                        <th>邮箱</th>
                    </tr>
                    </thead>
                    <tbody id="tbodytop">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function poPup(e) {
        $.ajax({
            type: "GET",
            url: "{$_M['url']['profile_safety_participants']}",
            data: {'id':e.getAttribute('data-jobid')},
            dataType: "json",
            success: function(data){
                $('#tbodytop').html('');
                var str = '';
                for (i=0;i<data.length;i++){
                    str += '<tr><td>'+data[i].name+'</td><td>'+data[i].phone+'</td><td>'+data[i].email+'</td></tr>';
                }
                $('#tbodytop').html(str);
            }
        });
    }
</script>
<include file="sys_web/foot"/>