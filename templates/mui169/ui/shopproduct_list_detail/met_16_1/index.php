<?php defined('IN_MET') or exit('No permission'); ?>
<if value="$ui['product_pagetype'] eq 1">
<!-- 标准模式 -->
<main class="$uicss page met-showproduct pagetype1" m-id='{$ui.mid}'>
    <div class="met-showproduct-head page-content block-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <list data="$data['displayimgs']" name="$s"></list>
                    <div class='met-showproduct-list fngallery cover text-xs-center<if value="$sub gt 1">slick-dotted</if>' id='met-imgs-slick' m-id='noset' m-type="displayimgs">
                        <!--fngallery：启用lightGallery插件的类名-->
                        <list data="$data['displayimgs']" name="$s">
                        <div class='slick-slide'>
                            <a href='{$s.img}' data-size='{$s.x}x{$s.y}' data-med='{$s.img}' data-med-size='{$s.x}x{$s.y}' class='lg-item-box' data-src='{$s.img}' data-exthumbimage="{$s.img|thumb:60,60}" data-sub-html='{$s.title}'>
                                <!--类名lg-item-box之前为initPhotoSwipeFromDOM插件所用参数；之后为lightGallery插件所用参数，lg-item-box：lightGallery插件对应的类名-->
                                <img
                                <if value="$s['_index'] gt 0">data-lazy<else/>src</if>
                                ="{$s.img|thumb:$c['met_productdetail_x'],$c['met_productdetail_y']}" data-src="{$s.img|thumb:$c['met_productdetail_x'],$c['met_productdetail_y']}" class='img-fluid' alt='{$s.title}' />
                            </a>
                        </div>
                        </list>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="product-intro">
                        <h1 class='m-t-0 font-size-24'>{$data.title}</h1>
                        <if value="$data['description']">
                        <p class='description'>{$data.description}</p>
                        </if>
                        <include file='ui_v2/module/shop/shop_option_ui.php'/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="met-showproduct-body page-content">
        <div class="container">
            <div class="row">
                <if value="$ui[product_sidebar_piclist_ok]">
            <!-- 内容选项卡 -->
                <div class="col-lg-9 <if value='$ui[compos] eq 1'>pull-lg-right</if>">
                 <else/>
                <div class="col-lg-12">
                </if>
                    <div class="row">
                        <div class="panel panel-body m-b-0 product-detail" boxmh-mh >
                            <ul class="nav nav-tabs nav-tabs-line m-b-20 met-showproduct-navtabs">
                                <list data="$data['contents']" name="$s">
                                <if value="$s[content]">
                                    <li class="nav-item">
                                        <a
                                        class='nav-link
                                        <if value="$s['_first']">
                                        active
                                        </if>
                                        ' data-toggle="tab" href="#product-content{$s._index}" data-get="product-details">{$s.title}</a>
                                    </li>
                                </if>
                                </list>
                            </ul>
                            <article class="tab-content">
                                <list data="$data['contents']" name="$s">
                                <if value="$s['_first']">
                                    <section class="tab-pane met-editor clearfix animation-fade active " id="product-content{$s._index}">
                                    <if value="$data['para']">
                                        <ul class="product-para paralist blocks-100 blocks-sm-2 blocks-md-3 blocks-lg-2 m-x-0 <list data='$data[para]' name='$para'><if value='!$para[value] || !($s[_index] egt $ui[para_num])'>noboder</if></list>">
                                            <list data="$data['para']" name="$para">
                                                <if value='$para[value] && $s[_index] egt $ui[para_num]'>
                                                    <li class="p-x-0 p-r-15 m-b-15">
                                                        <span>{$para.name}：</span>
                                                        {$para.value}
                                                    </li>
                                                </if>
                                            </list>
                                        </ul>
                                    </if>
                                    {$s.content}
                                    </section>
                                    <else/>
                                    <section class="tab-pane met-editor clearfix animation-fade " id="product-content{$s._index}">
                                        {$s.content} 
                                    </section>
                                </if>
                                </list>
                                <if value="$ui['tag_ok']">
                                    <div class="tag">
                                        <span>{$data.tagname}</span>
                                        <list data="$data[taglist]" name="$tag" num="$ui[tag_num]">
                                            <a href="{$tag.url}" title="{$tag.name}">{$tag.name}</a>
                                        </list>
                                    </div>
                                </if>
                            </article>
                        </div>
                    </div>
                </div>
                <!-- 内容选项卡 -->
                <!-- 产品侧栏 -->
                <if value="$ui[product_sidebar_piclist_ok]">
                <div class="col-lg-3 <if value='$ui[compos] eq 0'>pull-lg-right</if>">
                    <div class="row">
                        <aside class="panel panel-body m-b-0 product-hot met-sidebar <if value='$ui[compos] eq 1'>leftsidebar<else/>rightsidebar</if>" boxmh-h>
                            <div class='sidebar-piclist'>
                                <h3 class='m-0 font-size-16 font-weight-300'>{$ui.product_sidebar_piclist_title}</h3>
                                <ul class='blocks-2 blocks-md-3 blocks-lg-100 m-t-20 text-xs-center imagesize sidebar-piclist-ul' data-scale='{$v.img_y}x{$v.img_x}'>
                                    <tag action='list' cid="$data['class1']" num="$ui['product_sidebar_piclist_num']" type="$ui['product_sidebar_piclist_type']">
                                    <li class='masonry-child'>
                                        <a href='{$v.url}' title='{$v.title}' class='block m-b-0' target='_blank'>
                                            <img src="{$v.imgurl|thumb:$v['img_x'],$v['img_y']}" class='cover-image' alt='{$v.title}' height='100'></a>
                                        <h4 class='m-t-10 m-b-0 font-size-14 text-md-center'>
                                            <a href='{$v.url}' title='{$v.title}' target='_blank'>{$v.title}</a>
                                        </h4>
                                    </li>
                                    </tag>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
                <!-- 产品侧栏 -->
                </if>
            </div>
        </div>
    </div>
</main>
<!-- 标准模式 -->
<else/>
<!-- 时尚模式 -->
<div class="$uicss met-showproduct pagetype2 animsition" id="content-1" m-id="{$ui.mid}">
<div class="modal fade modal-primary" id="shop-fashion-option" aria-hidden="true" aria-labelledby="shop-fashion-option"
role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
                <h4 class="modal-title">{$ui.shop_modal_title}</h4>
            </div>
            <div class="modal-body">
                <div class="product-intro">
                        <h1 class='m-t-0 font-size-24'>{$data.title}</h1>
                        <if value="$data['description']">
                        <p class='description'>{$data.description}</p>
                        </if>
                        <include file='ui_v2/module/shop/shop_option_ui.php'/>
                    </div>
            </div>
        </div>
    </div>
</div>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <ul class="nav navbar-toolbar pull-xs-right shop-btn-body">
                <li>
                    <div class="h-50 vertical-align">
                        <div class="vertical-align-middle">
                            <button 
                                type="button" 
                                class="btn btn-block btn-danger btn-squared shop-btn"
                                data-target="#shop-fashion-option" 
                                data-toggle="modal"
                            >{$word.app_shop_buyimmediately}</button>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-target="#navbar-showproduct-pagetype2"
                data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="icon wb-chevron-down" aria-hidden="true"></i>
                </button>
                <h1 class="navbar-brand">{$data.title}</h1>
            </div>
            <div class="collapse navbar-collapse navbar-collapse-toolbar" id="navbar-showproduct-pagetype2">
                <ul class="nav navbar-toolbar navbar-right met-showproduct-navtabs">
                    <list data="$data['contents']" name="$s">
                        <if value="$s[content]">
                            <li class="nav-item">
                                <a class='nav-link' href="#content{$s._index}" data-get="product-details">{$s.title}</a>
                            </li>
                        </if>
                    </list>
                    <if value="$data['para']">
                        <li class="nav-item"><a class='nav-link' href="#contenti">{$ui.specpara}</a></li>
                    </if>
                </ul>
            </div>
        </div>
    </nav>
    <div class="section">
        <list data="$data['displayimgs']" name="$s"></list>
        <?php dump($sub); ?>
        <div class='met-showproduct-list text-center fngallery <if value="$sub gt 1">slick-dotted</if>' id='met-imgs-slick' m-id="noset" m-type="displayimgs"><!--兼容商城V3-->
                <list data="$data['displayimgs']" name="$s">
                <div class='slick-slide'>
                    <a href='{$s.img}' data-size='{$s.x}x{$s.y}' data-med='{$s.img}' data-med-size='{$s.x}x{$s.y}' class='lg-item-box' data-src='{$s.img}' data-exthumbimage="{$s.img|thumb:60,60}" data-sub-html='{$s.title}'>
                        <!--类名lg-item-box之前为initPhotoSwipeFromDOM插件所用参数；之后为lightGallery插件所用参数，lg-item-box：lightGallery插件对应的类名-->
                        <img
                        <if value="$s['_index'] gt 0">data-lazy<else/>src</if>
                        ="{$s.img|thumb:$c['met_productdetail_x'],$c['met_productdetail_y']}" class='img-fluid' alt='{$s.title}' />
                    </a>
                </div>
                </list>
        </div>
    </div>
    <list data="$data['contents']" name="$s">
        <if value="$s[content]">
            <div class="content content{$s._index}" id="content{$s._index}">
                <div class="container">
                    <div class="row">
                        <div class="met-editor lazyload clearfix">
                            {$s.content}
                        </div>
                    </div>
                </div>
            </div>
        </if>
    </list>
    <if value="$data['para']">
        <div class="content contenti" id="contenti">
        <div class="container">
            <ul class="product-para paralist blocks-100 blocks-sm-2 blocks-md-3 blocks-lg-2">
                <list data="$data['para']" name="$s">
                <li class="p-x-0 m-b-15">
                    <span>{$s.name}：</span>
                    {$s.value}
                </li>
                </list>
            </ul>
        </div>
    </div>
    </if>
     <div class="content">
        <div class="container">
            <if value="$ui['tag_ok']">
                <div class="tag">
                    <span>{$data.tagname}</span>
                    <list data="$data[taglist]" name="$tag" num="$ui[tag_num]">
                        <a href="{$tag.url}" title="{$tag.name}">{$tag.name}</a>
                    </list>
                </div>
            </if>
        </div>
    </div>
</div>
<!-- 时尚模式 -->
</if>