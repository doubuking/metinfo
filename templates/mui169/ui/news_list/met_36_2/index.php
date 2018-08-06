<?php defined('IN_MET') or exit('No permission'); ?>
<div class="$uicss met-index-body" m-id="{$ui.mid}">
	<div class="container">
		<if value="$ui['title']">
	        <h2 class="title invisible" data-plugin="appear" data-animate="slide-top" data-repeat="false">
	          {$ui.title}
	        </h2>
      	</if>
		<div class="row header_news_panel">

			<!-- 左侧 -->
			<div class="col-md-7 col-sm-7 tab-content tab-content_mob-p0">

				<tag action="list" cid="$ui['select']" num="$ui['right_list_num']" type="$ui['type']" >	
					<div role="tabpanel" class="tab-pane fade <if value='$v[_index] eq 0'> in active</if>">
						<a href="{$v.url}" title="{$v.title}" {$g.urlnew}>
							<img src="{$v.imgurl|thumb:$ui[img_x],$ui[img_y]}" alt="{$v.imgurl}" class="tab-pane__img">
						</a>
						<div class="header_news_text tab-pane__block">
							<a class="tab-pane__title" href="{$v.url}" title="{$v.title}" {$g.urlnew}>{$v.title|met_substr:0,$ui['desc_num']}...</a>
							</p>
						</div>
					</div>
				</tag>

			</div>

			<!-- 右侧 -->
			<div class="col-md-4 col-sm-4 col-xs-12 news-tabs" >

				<ul class="news-tabs__nav nav nav-tabs shadow_text" role="tablist">

					<tag action="list" cid="$ui['select']" num="$ui['right_list_num']" type="$ui['type']" >	
						<li role="presentation"   >
							<a href="javascript:void(0);" index="{$v._index}"  role="tab" class="<if value='$v[_index] eq 0'>active</if>">
								<span class="time">
									<span class="day">{$v.original_updatetime}</span>
                                </span>
                                <span class="description">
									{$v.description|met_substr:0,$ui['subtitlenum']}...
								</span>
							</a>
						</li>
					</tag>
					
				</ul>

			</div>

			
		</div>
		<tag action="category" type="current" cid="$ui['select']" >
            <a href="{$m.url}" title="{$m.name}" {$m.urlnew} class="btn-more">
            {$ui.more}
                <i class="fa fa-angle-right"></i>
            </a>
        </tag>
	</div>
</div>
