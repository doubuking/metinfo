<?php defined('IN_MET') or exit('No permission'); ?>
<?php $sidebar=strlen($ui[has][sidebar]);?>
<main class="$uicss met-show-body panel panel-body m-b-0 
	<if value="$ui['bg_type']">
		bgcolor
	<else/>
		bgpic
	</if>" boxmh-mh m-id='{$ui.mid}'>
<if value="$ui['container']">
	<div class="container-fluid">
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
		{$data.content}
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
				            </div>
				        </div>
				       </main>
				    </if>
				</if>
		<!-- /sidebar -->

	
<else/>
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
				<section class="met-editor clearfix">
					<if value="$data['content']">
					{$data.content}
					<else/>
					<div class='h-100 text-xs-center font-size-20 vertical-align'>{$lang.nodata}</div>
					</if>
				</section>
			    <if value="$ui.radio_ok">
				    <div>
					    <if value="$ui['title'] neq '0'">
						    <h3 class="title">{$ui.title}</h3>
						</if>
						<section class="met-feedback animsition">
				        	<tag action="feedback.form" cid="$ui[id]"></tag>
				        </section>
					</div>
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
				            </div>
				        </div>
				       </main>
				    </if>
				</if>
			<!-- /sidebar -->	
</if>


