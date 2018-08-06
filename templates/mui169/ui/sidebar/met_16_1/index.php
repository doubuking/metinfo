<?php defined('IN_MET') or exit('No permission'); ?>
<if value="$data[index_num] neq 7">
<div class="col-md-3">
	<div class="row">
<aside class="$uicss met-sidebar panel panel-body m-b-0" boxmh-h m-id='{$ui.mid}' m-type='nocontent'>
	<form class='sidebar-search' method='get' action="{$c.met_weburl}search/search.php">
		<input type='hidden' name='lang' value='{$data.lang}' />
		<input type='hidden' name='class1' value='{$data.class1}' />
		<div class="form-group">
			<div class="input-search">
				<button type="submit" class="input-search-btn">
					<i class="icon wb-search" aria-hidden="true"></i>
				</button>
				<input type="text" class="form-control" name="searchword" placeholder="{$ui.sidebar_search_placeholder}">
			</div>
		</div>
	</form>
	<if value="$ui['sidebar_column_ok']">
	<ul class="sidebar-column list-icons">
		<tag action='category' cid="$data['class1']">
		<li>
			<a href="{$m.url}" title="{$m.name}" class="<if value='$data[classnow] eq $m[id]'>
					active
					</if>" {$m.urlnew}>{$m.name}</a>
		</li>
		<tag action='category' cid="$m['id']" type='son' num="$ui['sidebar_column_num']" class='active'>
		<li>
			<if value="$m['sub'] && $ui['sidebar_column3_ok']">
			<a href="javascript:;" title="{$m.name}" class='{$m.class}' {$m.urlnew} data-toggle="collapse" data-target=".sidebar-column3-{$m._index}">{$m.name}<i class="wb-chevron-right-mini"></i></a>
	        <div class="sidebar-column3-{$m._index} collapse" aria-expanded="false">
	            <ul class="m-t-5 p-l-20">
	                <li><a href="{$m.url}" {$m.urlnew} title="{$ui.all}" class="{$m.class}">{$ui.all}</a></li>
					<tag action='category' cid="$m['id']" type='son' class='active'>
	                <li><a href="{$m.url}" {$m.urlnew} title="{$m.name}" class='{$m.class}'>{$m.name}</a></li>
					</tag>
	            </ul>
	        </div>
			<else/>
			<a href="{$m.url}" title="{$m.name}" class='{$m.class}'>{$m.name}</a>
	        </if>
		</li>
		</tag>
		</tag>
	</ul>
	</if>
	<if value="$ui['sidebar_newslist_ok']">
	<div class="sidebar-news-list recommend">
		<h3 class='font-size-16 m-0'>{$ui.sidebar_newslist_title}</h3>
		<ul class="list-group list-group-bordered m-t-10 m-b-0">
			<tag action='list' cid="$data['class1']" num="$ui['sidebar_newslist_num']">
			<li class="list-group-item">
				<a href="{$v.url}" title="{$v.title}" {$g.urlnew}>{$v.title}</a>
			</li>
			</tag>
		</ul>
	</div>
	</if>
	<if value="$ui['sidebar_piclist_ok']">
	<div class='sidebar-piclist'>
		<h3 class='m-0 font-size-16 font-weight-300'>{$ui.sidebar_piclist_title}</h3>
		<ul class='blocks-2 blocks-md-3 blocks-lg-100 m-t-20 text-xs-center imagesize sidebar-piclist-ul' data-scale='0.75117370892019'>
			<tag action='list' cid="$ui['sidebar_piclist_id']" num="$ui['sidebar_piclist_num']">
			<li class='masonry-child'>
				<a href='{$v.url}' title='{$v.title}' class='block m-b-0' target='_blank'>
					<img data-original="{$v.imgurl|thumb:$v['img_x'],$v['img_y']}" class='cover-image' alt='{$v.title}' height='100'></a>
				<h4 class='m-t-10 m-b-0 font-size-14'>
					<a href='{$v.url}' title='{$v.title}' target='_blank'>{$v.title}</a>
				</h4>
				<p class='m-b-0 red-600'>价格-没有数据</p>
			</li>
			</tag>
		</ul>
	</div>
	</if>
</aside>
</div>
</div>
</if>
		</div>
    </div>
</main>