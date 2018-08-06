<?php defined('IN_MET') or exit('No permission'); ?>
<div class="$uicss met-index-body text-xs-center <if value="$ui['bg_type'] eq 1">bgcolor<else/>bgpic</if>" m-id='{$ui.mid}'>
	<div class="<if value='$ui[ifwidth]'>container<else/>container-fluid</if>">
		<if value="$ui['title']">
			<h2 class="m-t-0 font-weight-300 invisible" data-plugin="appear" data-animate="slide-top" data-repeat="false">{$ui.title}</h2>
		</if>
		<if value="$ui['desc']">
			<p class="desc m-b-0 font-weight-300 invisible" data-plugin="appear" data-animate="fade" data-repeat="false">{$ui.desc}</p>
		</if>
		<ul class="
			<if value="$ui['column_xs'] eq 1">
			block-xs-100
			<else/>
			blocks-xs-{$ui.column_xs}
			</if>
		 	blocks-md-{$ui.column_md} blocks-lg-{$ui.column_lg} blocks-xxl-{$ui.column_xxl} index-service-list">
			<tag action='category' cid="$ui['id']" type='son'>
			<if value="$m[_index] lt $ui['num']">
				<li class="invisible" data-plugin="appear" data-animate="slide-bottom50" data-repeat="false">
					<if value="$ui['link_ok']">
					<a href="{$m.url}" title="{$m.name}" {$m.urlnew}>
					</if>
						<if value="$ui['home_service_type']">
	                        <i class="{$m.icon}" aria-hidden="true"></i>
	                        <else/>
	                        <img data-original="{$m.columnimg}" alt="{$m.name}">
	                    </if>
						<h3 class='m-t-20 m-b-5 font-weight-300'>{$m.name}</h3>
						<if value="$ui['desc_ok']">
						<p class='m-b-0 font-weight-300'>{$m.description}</p>
						</if>
					<if value="$ui['link_ok']">
					</a>
					</if>
				</li>
			</if>
			</tag>
		</ul>
		<if value="$ui[bottom_ok]">
			<div class="news-bg">
	        	<div class="bg">
	        		<img src="{$ui.bottom_bg}" alt="">
	        	</div>
	        </div>
	    </if>
	</div>
</div>