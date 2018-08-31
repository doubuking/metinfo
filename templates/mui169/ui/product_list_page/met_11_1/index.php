<?php defined('IN_MET') or exit('No permission'); ?>
<?php $sidebar=strlen($ui[has][sidebar]);?>
<main class="$uicss" m-id='{$ui.mid}'>
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
    <!-- 内容 -->
    
        <ul class="$uicss-list blocks <if value="$ui['column_xs'] eq 1">
        blocks-100
        <else/>
        blocks-xs-{$ui.column_xs}
        </if>
        blocks-md-{$ui.column_md} blocks-lg-{$ui.column_lg} blocks-xxl-{$ui.column_xxl} ulstyle met-pager-ajax imagesize" id="met-grid" data-scale='{$c.met_productimg_y}x{$c.met_productimg_x}'>
        <if value="$c[met_product_page] eq 1 && $data['sub']">
<!--展示下级栏目-->
            <tag action="category" type="son" cid="$data['classnow']"> 
                <li class='p-r-15  item' >
                    <div class="card ">
                        <figure class="overlay overlay-hover">
                        <img class="overlay-figure" src="{$m.columnimg|thumb:$c['met_productimg_x'],$c['met_productimg_y']}" alt="{$m.name}">
                        <figcaption class="overlay-panel overlay-background overlay-fade overlay-icon">
                          <a class="fa fa-search" href="{$m.url}" {m.urlnew}></a>
                        </figcaption>
                        </figure>
                        <h4 class="card-title p-y-20 p-l-0 font-szie-16 ">
                            <a href="{$m.url}" title="{$m.title}" class="block text-truncate" {m.urlnew}>{$m.name}</a>
                            <p class="keyword">{$m.keywords}</p>
                        </h4>
                    </div>
                </li>
            </tag>
<!--展示下级栏目-->
        <else/>
            <tag action='product.list' num="$c['met_product_list']" cid="$data['classnow']"></tag>
                <if value="$sub">
<!--展示内容-->
                    <list data="$result" name="$p">
                        <if value="$ui['list_style'] eq 1">
    <!--标准-->
                            <li class='p-r-15  item' >
                                <div class="card ">
                                    <figure class="overlay overlay-hover">
                                    <img class="overlay-figure" src="{$p.imgurl|thumb:$c['met_productimg_x'],$c['met_productimg_y']}" alt="{$p.title}">
                                    <a href="{$p.url}" {$g.urlnew} class="overlay-panel overlay-background overlay-fade overlay-icon">
                                      <i class="fa fa-search"></i>
                                    </a>
                                    </figure>
                                    <h4 class="card-title p-y-20 font-szie-16 ">
                                        <a href="{$p.url}" title="{$p.title}" class="block text-truncate" {$g.urlnew}>{$p.title}</a>
                                        <p class="keyword">{$p.keywords}</p>
                                        <p class="price m-b-0 m-t-5">{$p.price_str}</p>
                                    </h4>
                                </div>
                            </li>
<!--标准-->
                        <else/>
<!--橱窗-->
                            <li class='p-r-15  item' >
                            <div class="card ">
                                <figure class="overlay overlay-hover">
                                <img class="overlay-figure" src="{$p.imgurl|thumb:$c['met_productimg_x'],$c['met_productimg_y']}" alt="{$p.title}">
                                <a href="{$p.url}" {$g.urlnew} class="overlay-panel overlay-background overlay-fade overlay-icon">
                                  <i class="fa fa-search"></i>
                                </a>
                                </figure>
                                <h4 class="card-title p-y-20 font-szie-16 ">
                                {$p.title}
                                <p class="keyword">{$p.keywords}</p>
                                <list data="$v['para']"  name='$para'>
                                    <if value="$sub">
                                <p class="card-text">{$para.name}&nbsp;:&nbsp;{$para.value}</p>
                                    </if>
                                </list>
                                
                                <p class="desc">{$p.description}</p>
                                <p class="price m-b-0 m-t-5">{$p.price_str}</p>
                                <a href="{$p.url}" title="{$p.title}" class="btn btn-default" {$g.urlnew}>{$word.Detail}</a>
                                </h4>
                            </div>
                            </li>
<!--橱窗-->
                        </if>
                    </list>
<!--展示内容-->
                <else/>
                    <div class='h-100 text-xs-center font-size-20 vertical-align' m-id='{$ui.mid}'>{$ui.nodata}</div>
                </if>
            </if>
        </ul>
    

    <if value="$c[met_product_page] eq 1 && $data['sub']">
    <else/>
<!--分页-->
        <div class='m-t-20 text-xs-center hidden-sm-down'  m-type='noset'>
            <pager/>
        </div>
        <div class="met-pager-ajax-link hidden-md-up" data-plugin="appear" data-animate="slide-bottom" data-repeat="false" m-id='{$ui.mid}'>
            <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn" data-plugin="ladda" data-style="slide-left">
                <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
                {$ui.page_ajax_next}
            </button>
        </div>
<!--分页-->
    </if>
    <!-- /内容 -->

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