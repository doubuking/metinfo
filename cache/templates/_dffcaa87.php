<?php defined('IN_MET') or exit('No permission'); ?>
<?php
    $result = load::sys_class('label', 'new')->get('link')->get_link_list();
    $sub = count($result);
     foreach($result as $index=>$v):
        $v['sub']      = $sub;
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
        $v['nofollow'] = $v['nofollow'] ? "rel='nofollow'" : '';
?><?php endforeach;?>
    <?php if($sub){ ?>
    <footer class="$uicss text-xs-center" m-id='<?php echo $ui['mid'];?>' m-type="link">
        <div class="container p-y-15">
            <ul class="breadcrumb p-0 link-img m-0">
                <li class='breadcrumb-item'><?php echo $ui['footlink_title'];?> :</li>
                <?php
    $result = load::sys_class('label', 'new')->get('link')->get_link_list();
    $sub = count($result);
     foreach($result as $index=>$v):
        $v['sub']      = $sub;
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
        $v['nofollow'] = $v['nofollow'] ? "rel='nofollow'" : '';
?>
                    <li class='breadcrumb-item     <?php if($ui[split]){ ?>split<?php } ?>'>
                        <a href="<?php echo $v['weburl'];?>" title="<?php echo $v['webname'];?>" target="_blank">
                                <?php if($v['link_type']==1){ ?>
                                <img data-original="<?php echo $v['weblogo'];?>" alt="<?php echo $v['webname'];?>" height='40'>
                            <?php }else{ ?>
                                <span><?php echo $v['webname'];?></span>
                            <?php } ?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </footer>
<?php } ?>