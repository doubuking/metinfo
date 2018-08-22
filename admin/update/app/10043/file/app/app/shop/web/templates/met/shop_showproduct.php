<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$template_css_filemtime = filemtime(PATH_WEB.'public/ui/v2/static/css/template.css');
$shop_showproduct_css_filemtime = filemtime(PATH_WEB.'app/app/shop/web/templates/met/css/shop_showproduct.css');
?>
<include file="sys_web/head"/>
<if value="$c['metinfover'] neq 'v2'">
<link href="{$_M['url']['ui_v2']}static/css/template.css?{$template_css_filemtime}" rel='stylesheet' type='text/css'>
</if>
<link href="{$_M['url']['own_tem']}css/shop_showproduct.css?{$shop_showproduct_css_filemtime}" rel='stylesheet' type='text/css'>
<?php if($_M['config']['metinfover']!='v2'){ ?>
<tag action="category" type="current" cid="$data['class1']">
<if value="$m['sub']">
<div class="met-position pattern-show border-none bg-blue-grey-100">
	<div class="container">
		<div class="row">
			<ol class="breadcrumb p-10 m-b-0">
				<li class='breadcrumb-item'>
					<a href="{$c.index_url}" title="{$word.home}" class='icon wb-home'>{$word.home}</a>
				</li>
				<location>
				<if value="$v">
				<tag action='category' cid="$v['id']" type='current'>
                <if value="$m['sub']">
                <li class="breadcrumb-item dropdown">
                    <a href="{$v.url}" title="{$v.name}" class="dropdown-toggle" data-toggle="dropdown">{$v.name}</a>
                    <div class="dropdown-menu animate animate-reverse">
                        <a href="{$v.url}" title="{$lang.all}" class='dropdown-item'>{$lang.all}</a>
                        <tag action='category' cid="$v['id']" type='son' class="active">
                        <a href="{$m.url}" title="{$m.name}" class='dropdown-item {$m.class}'>{$m.name}</a>
                        </tag>
                    </div>
                </li>
                <else/>
                <li class='breadcrumb-item'>
                    <a href="{$v.url}" title="{$v.name}">{$v.name}</a>
                </li>
                </if>
                </tag>
                </if>
                </location>
			</ol>
		</div>
	</div>
</div>
</if>
</tag>
<?php } ?>
<main class="page met-showproduct pagetype1">
	<div class="met-showproduct-head page-content bg-white">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
	                <div class="row">
						<list data="$data['displayimgs']" name="$s" num='20'></list>
						<div class='met-showproduct-list fngallery cover text-xs-center shop-default<if value="$s['sub'] gt 1">slick-dotted</if>' id='met-imgs-slick' m-id='noset' m-type="displayimgs"><!--fngallery：启用lightGallery插件的类名-->
						    <list data="$data['displayimgs']" name="$s" num='20'>
						    <div class='slick-slide'>
						    	<a href='{$s.img}' data-size='{$s.x}x{$s.y}' data-med='{$s.img}' data-med-size='{$s.x}x{$s.y}' class='lg-item-box' data-src='{$s.img}' data-exthumbimage="{$s.img|thumb:60,60}" data-sub-html='{$s.title}'><!--类名lg-item-box之前为initPhotoSwipeFromDOM插件所用参数；之后为lightGallery插件所用参数，lg-item-box：lightGallery插件对应的类名-->
						            <img <if value="$s['_index'] gt 0">data-lazy<else/>src</if>="{$s.img|thumb:$c['met_productdetail_x'],$c['met_productdetail_y']}" data-src='{$s.img|thumb:$c['met_productdetail_x'],$c['met_productdetail_y']}' class='img-fluid' alt='{$s.title}' />
						        </a>
						    </div>
						    </list>
						</div>
	                </div>
				</div>
				<div class="col-lg-5">
                    <div class="product-intro">
    				    <h1 class='m-t-0 font-size-24'>{$data['title']}</h1>
						<?php if($data['description']){ ?>
                    	<p class="description">{$data['description']}</p>
						<?php } ?>
						<include file="ui_v2/module/shop/shop_option_ui"/>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="met-showproduct-body page-content">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 pull-lg-right">
					<div class="row">
						<div class="panel panel-body m-b-0 product-detail" boxmh-mh >
                            <ul class="nav nav-tabs nav-tabs-line met-showproduct-navtabs">
                                <list data="$data['contents']" name="$s">
                                <li class="nav-item">
                                    <a
                                    class='nav-link
                                    <if value="$s['_first']">
                                    active
                                    </if>
                                    ' data-toggle="tab" href="#product-content{$s._index}" data-get="product-content{$s._index}">{$s.title}</a>
                                </li>
                                </list>
                            </ul>
                            <article class="tab-content m-t-20">
                                <list data="$data['contents']" name="$s">
                                <section class="tab-pane met-editor p-0 clearfix animation-fade<if value="$s['_first']">active</if>" id="product-content{$s._index}">
                                <if value="$s['_first']">
                                <if value="$data['para']">
                                <ul class="product-para paralist blocks-100 blocks-sm-2 blocks-md-3 blocks-lg-4 m-b-10">
                                    <list data="$data['para']" name="$para" num='100'>
                                    <if value="$para['value']">
                                    <li>
                                        <span>{$para.name}：</span>
                                        {$para.value}
                                    </li>
                                    </if>
                                    </list>
                                </ul>
                                </if>
                                <if value="$data['para_url']">
		                        <div class='m-b-10'>
		                            <list data="$data['para_url']" name="$v" num='100'>
		                            <if value="$v['value']">
		                            <a href="{$v.value}" class="btn btn-danger m-r-20" target="_blank">{$v.name}</a>
		                            </if>
		                            </list>
		                        </div>
		                        </if>
                                </if>
                                {$s.content}
                                </section>
                                </list>
                            </article>
                            <if value="$data['taglist']">
                            <div class="met-tag m-t-10">
                                <span>{$data.tagname}</span>
                                <list data="$data['taglist']" name="$tag" num="20">
                                    <a href="{$tag.url}" title="{$tag.name}">{$tag.name}</a>
                                </list>
                            </div>
                            </if>
                        </div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="row">
						<aside class="panel panel-body m-b-0 product-hot met-sidebar leftsidebar" boxmh-h>
							<div class='sidebar-piclist'>
								<h3 class='m-0 font-size-16 font-weight-300'>{$word.app_shop_recommend}</h3>
								<ul class='blocks-2 blocks-md-3 blocks-lg-100 m-t-20 text-xs-center imagesize sidebar-piclist-ul' data-scale='{$c.met_productimg_y}x{$c.met_productimg_x}'>
									<tag action='list' cid="$data['shopv2_recommend_id']" num="$c['shopv2_recommend_num']" type="$c['shopv2_recommend']" order="$c['shopv2_recommend_order']">
									<li class='masonry-child'>
										<a href='{$v.url}' title='{$v.title}' class='block m-b-0' target='_blank'>
							                <img data-original="{$v.imgurl|thumb:$c['met_productimg_x'],$c['met_productimg_y']}" class='cover-image' alt='{$v.title}' height='100'></a>
							            <h4 class='m-t-10 m-b-0 font-size-14'>
							                <a href='{$v.url}' title='{$v.title}' target='_blank'>{$v.title}</a>
							            </h4>
										<p class='m-b-0 red-600'>{$v.price_str}</p>
									</li>
									</tag>
								</ul>
							</div>
						</aside>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<include file="sys_web/foot"/>