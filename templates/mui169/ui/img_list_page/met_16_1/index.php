<?php defined('IN_MET') or exit('No permission'); ?>
<?php $sidebar=strlen($ui[has][sidebar]);?>
<main class="$uicss">
    <div class="<if value="$ui[style]">container-fliud<else/>container</if>">
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
        <div class="mycontent">
            <tag action='img.list' num="$c['met_img_list']"></tag>
            <if value="$sub">
                <ul class="<if value="$ui['img_column_xs'] eq 1">
                            blocks-100
                            <else/>
                            blocks-xs-{$ui.img_column_xs}
                            </if>
                            blocks-md-{$ui.img_column_sm} blocks-lg-{$ui.img_column_md} blocks-xxl-{$ui.img_column_xlg}  no-space met-pager-ajax imagesize met-img-list" data-scale='{$c.met_imgs_y}x{$c.met_imgs_x}' m-id='{$ui.mid}'>
                    <include file='ui_ajax/img'/>
                </ul>
                <if value="!$c['met_img_page'] || !$data['sub']">
                <div class='m-t-20 text-xs-center hidden-sm-down' m-type="nosysdata">
                    <pager/>
                </div>
                <div class="met_pager met-pager-ajax-link hidden-md-up" data-plugin="appear" data-animate="slide-bottom" data-repeat="false" m-type="nosysdata">
                    <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn" data-plugin="ladda" data-style="slide-left" data-url="" data-page="1">
                        <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
                    </button>
                </div>
                </if>
            <else/>
                <div class='h-100 text-xs-center font-size-20 vertical-align' m-id='{$ui.mid}'>{$g.nodata}</div>
            </if>
        </div>
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
<!--     </div>
</main> -->
