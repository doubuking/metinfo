<?php defined('IN_MET') or exit('No permission'); ?>
<?php $sidebar=strlen($ui[has][sidebar]);?>
<main class="$uicss page-content" m-id='{$ui.mid}'>
    <div class="container">
        <!-- sidebar -->
        <if value="$_M['form']['pageset']">
        <if value="$sidebar">
            <div class="col-md-9 met-news-body col-xs-12" style="float:{$ui.polr};{$lrp}">
                <div class="row">
        </if>
        <else/>
            <if value="$ui[has][sidebar]">
                <div class="col-md-9 met-news-body col-xs-12"  style="float:{$ui.polr};{$lrp}">
                    <div class="row">
            </if>
        </if>
         <!-- /sidebar -->
                
                    <tag action='job.list' num="$c['met_job_list']" cid="$data['classnow']"></tag>
                    <if value="$sub">
                        <div class="met-job-list met-pager-ajax" >
                        	<include file='ui_ajax/job'/>
                        </div>
                        <div class='m-t-20 text-xs-center hidden-sm-down' m-type="nosysdata">
                            <pager/>
                        </div>
                        <div class="met_pager met-pager-ajax-link hidden-md-up" data-plugin="appear" data-animate="slide-bottom" data-repeat="false" m-type="nosysdata">
                            <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn" data-plugin="ladda" data-style="slide-left" data-url="" data-page="1">
                                <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
                            </button>
                        </div>
                    <else/>
                        <div class='h-100 text-xs-center font-size-20 vertical-align' >{$ui.nodata}</div>
                    </if>
            <!-- sidebar -->
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
                            
                       </main>
                    </if>
                </if>
        <!-- /sidebar -->       
			
	

	<if value="$sub">
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
    </if>

