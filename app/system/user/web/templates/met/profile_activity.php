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
                                    查看
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
<include file="sys_web/foot"/>