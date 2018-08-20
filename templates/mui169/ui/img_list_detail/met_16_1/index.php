<?php defined('IN_MET') or exit('No permission'); ?>
<?php $sidebar=strlen($ui[has][sidebar]);?>
<main class="$uicss page-content border-top1" m-id='{$ui.mid}'>
	<div class="container">
		<div class="row">
			<if value="$_M['form']['pageset']">
	            <if value="$sidebar">
	            <div class="col-md-9 met-showimg-body" boxmh-mh m-id='{$ui.mid}'>
	            <else/>
	                <div class="met-showimg-body col-md-10 offset-md-1" boxmh-mh m-id='{$ui.mid}'>
	            </if>
	            <else/>
	            <if value="$ui[has][sidebar]">
	            <div class="col-md-9 met-showimg-body" boxmh-mh m-id='{$ui.mid}'>
	            <else/>
	                <div class="met-showimg-body col-md-10 offset-md-1" boxmh-mh m-id='{$ui.mid}'>
	            </if>
	        </if>
		<section class="details-title border-bottom1">
			<h1 class='m-t-10 m-b-5'>{$data.title}</h1>
			<div class="info">
				<span><i class="icon wb-time m-r-5" aria-hidden="true"></i>{$data.updatetime}</span>
				<span><i class="icon wb-eye m-r-5" aria-hidden="true"></i>{$data.hits}</span>
			</div>
		</section>
		<section class='met-showimg-con'>
			<div class='met-showimg-list fngallery cover text-xs-center' id="met-imgs-slick"  m-type="displayimgs">
				<list data="$data['displayimgs']" name="$v">
				<div class='slick-slide'>
					<a href='{$v.img}' data-size='{$v.x}x{$v.y}' data-med='{$v.img}' data-med-size='{$v.x}x{$v.y}' class='lg-item-box' data-src='{$v.img}' data-exthumbimage="{$v.img|thumb:60,60}" data-sub-html='{$v.title}'>
						<img <if value="$v['_index'] gt 0">data-lazy<else/>src</if>="{$v.img|thumb:$c['met_imgdetail_x'],$c['met_imgdetail_y']}" class='img-fluid' alt='{$v.title}' height="200" />
					</a>
				</div>
				</list>
			</div>
		</section>
		<ul class="img-paralist paralist blocks-100 blocks-sm-2 blocks-md-3 blocks-xl-4">
			<list data="$data['para']" name='$para'>
			<if value="$para['value']">
				<li><span>{$para.name}：</span>{$para.value}</li>
			</if>
			</list>
		</ul>
		<section class="met-editor clearfix m-t-20">{$data.content}</section>
		<list data="$data[taglist]" name="$tag"></list>
		<if value="$ui['tag_ok'] && $sub">
	        <div class="tags">
	            <span>{$data.tagname}</span>
	            <list data="$data[taglist]" name="$tag" num="$ui[tag_num]">
	                <a href="{$tag.url}" title="{$tag.name}">{$tag.name}</a>
	            </list>
	        </div>
	    </if>
	<pagination/>
	</div>
<if value="$_M['form']['pageset']">
    <if value="!$sidebar">
            </div>
            </div>
        </main>
    </if>
<else/>
    <if value="!$ui[has][sidebar]">
        </div>
    </div>
</main>
    </if>
</if>