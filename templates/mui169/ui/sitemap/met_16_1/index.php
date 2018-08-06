<?php defined('IN_MET') or exit('No permission'); ?>
<main class="$uicss page-content" m-id='{$ui.mid}'>
<div class="container met-sitemap-body panel panel-body m-b-0">
<ul class="sitemap-list m-0 ulstyle blue-grey-500">
	<tag action='category' type='head'>
	<li>
		<a href='{$m.url}' title='{$m.name}' target='_self'>
			<i class="icon wb-menu m-r-10" aria-hidden="true"></i>
			{$m.name}
		</a>
		<if value="$m['sub']">
		<ul>
			<tag action='category' cid="$m['id']"  type='son'>
			<li>
				<a href='{$m.url}' title='{$m.name}' target='_self'>
					<i class="icon wb-link pull-xs-right"></i>
					<span>{$m.name}</span>
				</a>
			</li>
			<if value="$m['sub']">
			<ul class="sitemap-list-sub">
				<tag action='category' cid="$m['id']" type='son'>
				<li>
					<a href='{$m.url}' title='{$m.name}' target='_self'>{$m.name}</a>
				</li>
				</tag>
			</ul>
			</if>
			</tag>
		</ul>
		</if>
	</li>
	</tag>
</ul>
</div>
</main>