<?php defined('IN_MET') or exit('No permission');?>
<section class="$uicss met-index-body" m-id="{$ui.mid}">
    <div class="container">
      <if value="$ui['picturetitle']">
        <h2 class="title invisible" data-plugin="appear" data-animate="slide-top" data-repeat="false">
          {$ui.picturetitle}
        </h2>
      </if>
        <?php $img=strstr($ui['titlebottompicture'],"upload"); ?>
        <p class="desc animation-fade appear-no-repeat editable-click" data-plugin="appear" data-animate="fade" data-repeat="false" met-id="1757" met-table="ui_config" met-field="uip_value">
          <if value="$img">
            <img src="{$ui.titlebottompicture}">
          </if>
        </p>
        <div class="carousel slide scale" data-ride="carousel">
            <div class="carousel-inner">
                <tag action="list" cid="$ui['picturecolumn']" num="$ui['picturenum']" type="$ui['picturecom']" >

                </div>
                <div class="carousel-item <if value='$v[_index] eq 0'>active</if>">
                  <div class="col-xs-12 col-sm-3">
                    <div class="team-member text-center">
                      <a href="{$v.url}" title="{$v.title}" target="_blank">
                        <img class="img-responsive" src="{$v.imgurl|thumb:$ui[img_x],$ui[img_y]}" alt="{$v.imgurl}" />
                        <h3>{$v.title|met_substr:0,$ui['desc_num']}...</h3>
                      </a>
                    </div>
                  </div>
                 </tag>
               </div>
            </div>


        </div>

    <tag action="category" type="current" cid="$ui['picturecolumn']" >
        <a href="{$m.url}" title="{$m.name}" {$m.urlnew} class="btn-more">
            {$word.fliptext1}
            <i class="fa fa-angle-right"></i>
        </a>
    </tag>
    </div> 
</section>