<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
?>
<div class="m-t-50 text-xs-center moregoods">
	<h2 class='font-size-24 blue-grey-400 text-shadow-none'>{$_M['word']['app_shop_moregoods']}</h2>
	<ul class="blocks-2 blocks-md-2 blocks-lg-4 blocks-xxl-4 m-0 m-t-30 imagesize masonry moregoods-list" data-scale='{$c.met_productimg_y}x{$c.met_productimg_x}'>
		<tag action='list' cid="$c['shop_column']['id']" num="$c['shopv2_moregoods_num']" type="$c['shopv2_moregoods']" order="$c['shopv2_moregoods_order']">
		<li class='masonry-child'>
			<div class="card card-shadow radius0 invisible" data-plugin="appear" data-animate="fade" data-repeat="false">
				<figure class="card-header cover radius0">
					<a href="{$v.url}" title="{$v.title}" target='_blank'>
						<img class="cover-image" data-original="{$v.imgurl|thumb:$c['met_productimg_x'],$c['met_productimg_y']}" style='height:300px;' alt="{$v.title}">
					</a>
				</figure>
				<h4 class="card-title m-0 text-shadow-none font-size-16 font-weight-300">
					<a href="{$v.url}" title="{$v.title}" target='_blank'>{$v.title}</a>
					<p class="red-600 m-b-0 m-t-5 font-size-14">{$v.price_str}</p>
				</h4>
			</div>
		</li>
		</tag>
	</ul>
</div>