<?php defined('IN_MET') or exit('No permission'); ?>
    <footer class="$uicss  text-xs-center" m-id='<?php echo $ui['mid'];?>' m-type="foot_nav">
    <div class="container">
        <div class="row">
            <?php
    $type=strtolower(trim('foot'));
    $cid=0;
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id']){
            $m['class']="";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            unset($m['class']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
                <?php if($m['_index']<4){ ?>
            <div class="col-lg-2 col-md-3 col-xs-6 list">
                <h4 class='font-size-16 m-t-0'>
                    <a href="<?php echo $m['url'];?>"  title="<?php echo $m['name'];?>"><?php echo $m['name'];?></a>
                </h4>
                    <?php if($m['sub']){ ?>
                <ul class='ulstyle m-b-0'>
                    <?php
    $type=strtolower(trim('son'));
    $cid=$m['id'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id']){
            $m['class']="";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            unset($m['class']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
                    <li>
                        <a href="<?php echo $m['url'];?>"  title="<?php echo $m['name'];?>" target='_self'><?php echo $m['name'];?></a>
                    </li>
                    <?php endforeach;?>
                </ul>
                <?php } ?>
            </div>
            <?php } ?>
            <?php endforeach;?>
            <div class="col-lg-4 col-md-12 col-xs-12 info">
                    <?php if($ui['footinfo_tel']){ ?>
                <em class='font-size-26'><a href="tel:<?php echo $ui['footinfo_tel'];?>"><?php echo $ui['footinfo_tel'];?></a></em>
                <?php } ?>
                    <?php if($ui['footinfo_dsc']){ ?>
                <p><?php echo $ui['footinfo_dsc'];?></p>
                <?php } ?>
                    <?php if($ui['footinfo_wx']){ ?>
                <a id="met-weixin" data-plugin="webuiPopover" data-trigger="hover" data-animation="pop" data-placement='top' data-width='155' data-padding='0' data-content="<div class='text-xs-center'>
                    <img src='<?php echo $ui['footinfo_wx'];?>' alt='<?php echo $c['met_webname'];?>' width='150' height='150' id='met-weixin-img'></div>
                ">
                    <i class="fa fa-weixin"></i>
                </a>
                <?php } ?>
                    <?php if($ui['footinfo_qq']){ ?>
                <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $ui['footinfo_qq'];?>&site=qq&menu=yes" rel="nofollow" target="_blank">
                    <i class="fa fa-qq"></i>
                </a>
                <?php } ?>
                    <?php if($ui['footinfo_sina']){ ?>
                <a href="<?php echo $ui['footinfo_sina'];?>" rel="nofollow" target="_blank">
                    <i class="fa fa-weibo "></i>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</footer>