<?php defined('IN_MET') or exit('No permission'); ?>
<tag action='category' cid="$data[releclass1]" type='son'>
<if value="$m['_first']">
<div class="$uicss <if value='$ui[container]'>container</if> border-bottom1" m-id='{$ui.mid}' m-type='nocontent'>
	<div class="">
		<div class="subcolumn-nav text-xs-center">
			<ul class="$uicss-ul m-b-0 p-y-10 p-x-0 ulstyle">
				<tag action='category' cid="$data[releclass1]">
				<if value="$m[module] neq 1">
					<li>
						<a href="{$m.url}"  title="{$ui.all}"
						<if value="$data['classnow'] eq $m['id']">
						class="active"
						</if>
						>{$ui.all}</a>
					</li>
				<else/>
					<if value="$m[isshow]">
						<li>
							<a href="{$m.url}"  title="{$m.name}"
							<if value="$data['classnow'] eq $m['id']">
							class="active"
							</if>
							>{$m.name}</a>
						</li>
					</if>
				</if>
				<tag action='category' cid="$m['id']" type='son' class="active">
				<if value="$m['sub']">
				<li class="dropdown">
					<a href="{$m.url}" title="{$m.name}" class="dropdown-toggle {$m.class}" data-toggle="dropdown">{$m.name}</a>
					<div class="dropdown-menu animate">
						<if value="$m['module'] neq 1">
							<a href="{$m.url}"  title="{$ui.all}" class='dropdown-item {$m.class}'>{$ui.all}</a>
						</if>
						<tag action='category' cid="$m['id']" type='son' class="active">
						<a href="{$m.url}" title="{$m.name}" class='dropdown-item {$m.class}'>{$m.name}</a>
						</tag>
					</div>
				</li>
				<else/>
				<li>
					<a href="{$m.url}" title="{$m.name}" class='{$m.class}'>{$m.name}</a>
				</li>
				</if>
				</tag>
				</tag>
			</ul>
		</div>
		<if value="$ui['product_search'] && $data['module'] eq 3">
		<tag action='search.option' type="page" order="1"></tag>
		<div class="product-search">
			<form method="get" action="{$search['form']['action']}">
				<input type="hidden" name='lang' value="{$data.lang}">
				<input type="hidden" name='class1' value="{$data.class1}">
				<input type="hidden" name='class2' value="{$data.class2}">
				<input type="hidden" name='class3' value="{$data.class3}">
				<input type="hidden" name='search' value="search">
				<input type="hidden" name='order' value="com">
				<div class="form-group">
					<div class="input-search">
						<button type="submit" class="input-search-btn">
							<i class="icon wb-search" aria-hidden="true"></i>
						</button>
						<input
							type="text"
							class="form-control"
							name="content"
							value="{$search['form']['content']}"
							placeholder="{$ui.product_placeholder}"
						>
					</div>
				</div>
			</form>
		</div>
		</if>
	</div>
</div>
</if>
</tag>