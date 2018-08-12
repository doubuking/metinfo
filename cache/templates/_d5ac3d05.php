<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$data['page_title']=$_M['word']['accsafe'].$data['page_title'];
?>
<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
?>
<?php
global $metinfover;
// 模板引擎
$metinfover                  = "v2";
$template_type                  = "ui";
// 栏目可用字段
$metadmin[categorynamemark]  = 1; // 栏目修饰名称
$metadmin[categoryimage]     = 1; // 栏目图片
$metadmin[categorymarkimage] = 0; // 栏目标识图片

?>
<?php $met_page=$template_type=='ui'?'index':''; ?>
<?php $met_page = "$met_page";?>
<?php
$metinfover_v2=$c["metinfover"]=="v2"?true:false;
$met_file_version=str_replace(".","",$c["metcms_v"]).$c["met_patch"];
$lang_json_file_ok=file_exists(PATH_WEB."cache/lang_json_".$_M["lang"].".js");
if(!$lang_json_file_ok){
    echo "<meta http-equiv='refresh' content='0'/>";
}
$html_hidden=$lang_json_file_ok?"":"hidden";
if(!$data["module"] || $data["module"]==10){
    $nofollow=1;
}
$user_name=$_M["user"]?$_M["user"]["username"]:"";
?>
<!DOCTYPE HTML>
<html class="<?php echo $html_class;?>" <?php echo $html_hidden;?>>
<head>
<meta charset="utf-8">
<?php if($nofollow){ ?>
<meta name="robots" content="noindex,nofllow" />
<?php } ?>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0,minimal-ui">
<meta name="format-detection" content="telephone=no">
<title><?php echo $data['page_title'];?></title>
<meta name="description" content="<?php echo $data['page_description'];?>">
<meta name="keywords" content="<?php echo $data['page_keywords'];?>">
<meta name="generator" content="MetInfo <?php echo $c['metcms_v'];?>" data-variable="<?php echo $c['met_weburl'];?>|<?php echo $data['lang'];?>|<?php echo $data['synchronous'];?>|<?php echo $c['met_skin_user'];?>|<?php echo $data['module'];?>|<?php echo $data['classnow'];?>|<?php echo $data['id'];?>" data-user_name="<?php echo $user_name;?>">
<link href="<?php echo $c['met_weburl'];?>favicon.ico" rel="shortcut icon" type="image/x-icon">
<?php
if($lang_json_file_ok){
    $basic_css_name=$metinfover_v2?"":"_web";
    $isLteIe9=strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 9")!==false || strpos($_SERVER["HTTP_USER_AGENT"],"MSIE 8")!==false;
    if($isLteIe9){
?>
<link href="<?php echo $url['site'];?>app/system/include/static2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $url['site'];?>app/system/include/static2/css/bootstrap-extend.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $url['site'];?>app/system/include/static2/assets/css/site.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $url['site'];?>public/ui/v2/static/css/basic<?php echo $basic_css_name;?>-lteie9-1.css?<?php echo $met_file_version;?>" rel="stylesheet" type="text/css">
<?php }else{ ?>
<link rel="stylesheet" type="text/css" href="<?php echo $url['site'];?>public/ui/v2/static/css/basic<?php echo $basic_css_name;?>.css?<?php echo $met_file_version;?>">
<?php
    }
    if($metinfover_v2){
        if(file_exists(PATH_TEM."cache/common.css")){
            $common_css_time = filemtime(PATH_TEM."cache/common.css");
?>
<link rel="stylesheet" type="text/css" href="<?php echo $c['met_weburl'];?>templates/<?php echo $c['met_skin_user'];?>/cache/common.css?<?php echo $common_css_time;?>">
<?php
        }
        if($met_page){
            if($met_page == 404) $met_page = "show";
            $page_css_time = filemtime(PATH_TEM."cache/".$met_page."_".$_M["lang"].".css");
?>
<link rel="stylesheet" type="text/css" href="<?php echo $c['met_weburl'];?>templates/<?php echo $c['met_skin_user'];?>/cache/<?php echo $met_page;?>_<?php echo $_M["lang"];?>.css?<?php echo $page_css_time;?>">
<?php
        }
    }
    if(is_mobile() && $c["met_headstat_mobile"]){
?>
<?php echo $c['met_headstat_mobile'];?>

<?php }else if(!is_mobile() && $c["met_headstat"]){?>
<?php echo $c['met_headstat'];?>

<?php
    }
    if($_M["html_plugin"]["head_script"]){
?>
<?php echo $_M["html_plugin"]["head_script"];?>

<?php } ?>
<style>
body{
<?php if($g["bodybgimg"]){ ?>
    background-image: url(<?php echo $g['bodybgimg'];?>) !important;background-position: center;background-repeat: no-repeat;
<?php } ?>
    background-color:<?php echo $g['bodybgcolor'];?> !important;font-family:<?php echo $g['met_font'];?> !important;}
</style>
<!--[if lte IE 9]>
<script src="<?php echo $_M["url"]["site"];?>public/ui/v2/static/js/lteie9.js"></script>
<![endif]-->
</head>
<!--[if lte IE 8]>
<div class="text-xs-center m-b-0 bg-blue-grey-100 alert">
    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
        <span aria-hidden="true">×</span>
    </button>
    <?php echo $word['browserupdatetips'];?>
</div>
<![endif]-->
<body>
<?php } ?>
        <?php
            $id = 1;
            $style = "met_11_1";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
    <?php if($ui['nav_fixed']){ ?>
<body class="met-navfixed">
<?php } ?>
    <?php if($ui['nav_fixed']){ ?>
<header class='met-head navbar-fixed-top' m-id='<?php echo $ui['mid'];?>' m-type="head_nav">
<?php }else{ ?>
<header class='met-head' m-id='<?php echo $ui['mid'];?>' m-type="head_nav">
<?php } ?>
    <nav class="navbar navbar-default box-shadow-none head_nav_met_11_1">
        <div class="container">
            <div class="row">
                <h1 hidden><?php echo $c['met_webname'];?></h1>
                <div class="navbar-header pull-xs-left">
                    <a href="<?php echo $c['index_url'];?>" class="met-logo vertical-align block pull-xs-left p-y-5" title="<?php echo $c['met_webname'];?>">
                        <div class="vertical-align-middle">
                            <img src="<?php echo $c['met_logo'];?>" alt="<?php echo $c['met_webname'];?>"></div>
                    </a>
                </div>
                <button type="button" class="navbar-toggler hamburger hamburger-close collapsed p-x-5 met-nav-toggler" data-target="#met-nav-collapse" data-toggle="collapse">
                    <span class="sr-only"></span>
                    <span class="hamburger-bar"></span>
                </button>
<!-- 会员注册登录 -->
                    <?php if($c[met_member_register]&&$ui[member]){ ?>
                <button type="button" class="navbar-toggler collapsed m-0 p-x-5 met-head-user-toggler" data-target="#met-head-user-collapse" data-toggle="collapse"> <i class="icon wb-user-circle" aria-hidden="true"></i>
                </button>
                <div class="collapse navbar-collapse navbar-collapse-toolbar pull-md-right p-0" id='met-head-user-collapse' m-id='member' m-type='member'>
                    <?php if($user){ ?>
                        <?php if($c['shopv2_open']){ ?>
                        <ul class="navbar-nav vertical-align p-l-0 m-b-0 met-head-user met-head-shop" m-id="member" m-type="member">
                            <li class="dropdown inline-block text-xs-center vertical-align-middle animation-fade p-r-15">
                                <a
                                    href="javascript:;"
                                    class="navbar-avatar dropdown-toggle"
                                    data-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                <span class="avatar m-r-5"><img src="<?php echo $user['head'];?>" alt="<?php echo $user['username'];?>"/></span>
                                    <?php echo $user['username'];?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right animate" role="menu">
                                    <li role="presentation">
                                        <a href="<?php echo $url['shop_profile'];?>" class="dropdown-item" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> <?php echo $word['app_shop_personal'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $url['shop_order'];?>" class="dropdown-item" role="menuitem"><i class="icon wb-order" aria-hidden="true"></i> <?php echo $word['app_shop_myorder'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $url['shop_favorite'];?>" class="dropdown-item" role="menuitem"><i class="icon wb-heart" aria-hidden="true"></i> <?php echo $word['app_shop_myfavorite'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $url['shop_discount'];?>" class="dropdown-item" role="menuitem"><i class="icon wb-bookmark" aria-hidden="true"></i> <?php echo $word['app_shop_mydiscount'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $url['shop_member_base'];?>&nojump=1" class="dropdown-item" target="_blank" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> <?php echo $word['app_shop_settings'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $url['shop_member_login_out'];?>" class="dropdown-item" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> <?php echo $word['app_shop_out'];?></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown inline-block shop_cart text-xs-center vertical-align-middle animation-fade">
                                <a
                                    href="javascript:void(0)"
                                    title="<?php echo $word['app_shop_cart'];?>"
                                    data-toggle="dropdown"
                                    aria-expanded="false"
                                    data-animation="slide-bottom10"
                                    role="button"
                                >
                                    <i class="icon wb-shopping-cart" aria-hidden="true"></i>
                                    <?php echo $word['app_shop_cart'];?>
                                    <span class="tag tag-pill tag-danger up hide topcart-goodnum"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media topcartremove animation-slide-bottom10" role="menu">
                                    <li class="dropdown-menu-header">
                                        <h5><?php echo $word['app_shop_cart'];?></h5>
                                        <span class="label label-round label-danger"><?php echo $word['app_shop_intotal'];?> <span class="topcart-goodnum"></span> <?php echo $word['app_shop_piece'];?><?php echo $word['app_shop_commodity'];?></span>
                                    </li>
                                    <li class="list-group dropdown-scrollable" role="presentation">
                                        <div data-role="container">
                                            <div data-role="content" id="topcart-body"></div>
                                        </div>
                                    </li>
                                    <li class="dropdown-menu-footer" role="presentation">
                                        <div class="dropdown-menu-footer-btn">
                                            <a href="<?php echo $url['shop_cart'];?>" class="btn btn-squared btn-danger margin-bottom-5 margin-right-10"><?php echo $word['app_shop_gosettlement'];?></a>
                                        </div>
                                        <span class="red-600 font-size-18 topcarttotal"></span>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <?php }else{ ?>
                        <ul class="navbar-nav vertical-align p-l-0 m-b-0 met-head-user" m-id="member" m-type="member">
                            <li class="dropdown text-xs-center vertical-align-middle animation-slide-top">
                                <a
                                    href="javascript:;"
                                    class="navbar-avatar dropdown-toggle"
                                    data-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                <span class="avatar m-r-5"><img src="<?php echo $user['head'];?>" alt="<?php echo $user['username'];?>"/></span>
                                    <?php echo $user['username'];?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right animate">
                                    <li role="presentation">
                                        <a href="<?php echo $c['met_weburl'];?>member/basic.php?lang=<?php echo $_M[lang];?>" class="dropdown-item" title='<?php echo $word['memberIndex9'];?>' role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> <?php echo $word['memberIndex9'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $c['met_weburl'];?>member/basic.php?lang=<?php echo $_M[lang];?>&a=dosafety" class="dropdown-item" title='<?php echo $word['accsafe'];?>' role="menuitem"><i class="icon wb-lock" aria-hidden="true"></i> <?php echo $word['accsafe'];?></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="<?php echo $c['met_weburl'];?>member/login.php?lang=<?php echo $_M[lang];?>&a=dologout" class="dropdown-item" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> <?php echo $word['memberIndex10'];?></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <?php } ?>
                    <?php }else{ ?>
                    <ul class="navbar-nav vertical-align p-l-0 m-b-0 met-head-user" m-id="member" m-type="member">
                        <li class=" text-xs-center vertical-align-middle animation-fade">
                            <a href="<?php echo $c['met_weburl'];?>member/login.php?lang=<?php echo $_M[lang];?>" class="btn btn-squared btn-primary btn-outline m-r-10"><?php echo $word['login'];?></a>
                            <a href="<?php echo $c['met_weburl'];?>member/register_include.php?lang=<?php echo $_M[lang];?>" class="btn btn-squared btn-success"><?php echo $word['register'];?></a>
                        </li>
                    </ul>
                <?php } ?>
                </div>
                <?php } ?>

                <!-- 会员注册登录 -->
                <div class="collapse navbar-collapse navbar-collapse-toolbar pull-md-right p-0" id="met-nav-collapse">
                    <ul class="nav navbar-nav navlist">
                        <li class='nav-item'>
                            <a <?php echo $m['urlnew'];?> href="<?php echo $c['index_url'];?>" title="<?php echo $word['home'];?>" class="nav-link
                                <?php if($data['classnow']==10001){ ?>
                            active
                            <?php } ?>
                            "><?php echo $word['home'];?></a>
                        </li>
                        <?php
    $type=strtolower(trim('head'));
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
            $m['class']="active";
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
                            <?php if($ui['navdropdown_ok'] && $m['sub']){ ?>
                        <li class="nav-item dropdown m-l-<?php echo $ui['nav_ml'];?>">
                                <?php if($ui['navdropdown_type']){ ?>
                            <a
                                <?php echo $m['urlnew'];?>
                                href="<?php echo $m['url'];?>"
                                title="<?php echo $m['name'];?>"
                                class="nav-link dropdown-toggle <?php echo $m['class'];?>"
                                data-toggle="dropdown" data-hover="dropdown"
                            >
                            <?php }else{ ?>
                            <a
                                <?php echo $m['urlnew'];?>
                                href="<?php echo $m['url'];?>"
                                title="<?php echo $m['name'];?>"
                                class="nav-link dropdown-toggle <?php echo $m['class'];?>"
                                data-toggle="dropdown"
                            >
                            <?php } ?>
                            <?php echo $m['name'];?><i class="fa fa-angle-down"></i></a>
                                <?php if($ui['navbullet_ok']){ ?>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-bullet secondmenu">
                            <?php }else{ ?>
                            <div class="dropdown-menu dropdown-menu-right secondmenu">
                            <?php } ?>
                                <a href="<?php echo $m['url'];?>"  title="<?php echo $ui['all'];?>" class='navlist-2 dropdown-item nav-parent hidden-lg-up <?php echo $m['class'];?>'><?php echo $ui['all'];?></a>
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
            $m['class']="active";
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
                                    <?php if($m['sub']){ ?>
                                <div class="dropdown-item dropdown-submenu ">
                                    <a href="<?php echo $m['url'];?>" class="dropdown-item <?php echo $m['class'];?> navlist-2" <?php echo $m['urlnew'];?>>
                                    <?php echo $m['name'];?>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                                    <div class="dropdown-menu animate">
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
            $m['class']="active";
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
                                            <a href="<?php echo $m['url'];?>" class="dropdown-item <?php echo $m['class'];?>" <?php echo $m['urlnew'];?>><?php echo $m['name'];?></a>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <a href="<?php echo $m['url'];?>"  title="<?php echo $m['name'];?>" class='dropdown-item <?php echo $m['class'];?> navlist-2' <?php echo $m['urlnew'];?>><?php echo $m['name'];?></a>
                                <?php } ?>
                                <?php endforeach;?>
                            </div>
                        </li>
                        <?php }else{ ?>
                        <li class='nav-item m-l-<?php echo $ui['nav_ml'];?>'>
                            <a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" class="nav-link <?php echo $m['class'];?>" <?php echo $m['urlnew'];?>><?php echo $m['name'];?></a>
                        </li>
                        <?php } ?>
                        <?php endforeach;?>
<!--简繁体切换-->
                        <?php if($c['met_ch_lang'] && $ui['simplified']){ ?>
                        <?php if($data[lang]==cn ){ ?>
                        <li class="met-langlist met-s2t  nav-item m-l-15" m-id="lang" m-type="lang">
                        <button type="button" class="btn btn-outline btn-default btn-squared btn-lang btn-cntotc" data-tolang='tc'>繁体</button>
                        <?php }else if($data[lang]==tc){ ?>
                        <button type="button" class="btn btn-outline btn-default btn-squared btn-lang btn-cntotc" data-tolang='cn'>简体</button>
                    </li>
                    <?php } ?>
                <?php } ?>
<!--简繁体切换-->
<!--多语言-->
            <?php if($ui['langlist'] && $c['met_lang_mark']){ ?>
        <li class="met-langlist nav-item m-l-15" m-id="lang" m-type="lang">
            <div class="inline-block">
                <?php
    $language = load::sys_class('label', 'new')->get('language')->get_lang();
    $sub = count($language);
    $i = 0;
    foreach($language as $index=>$v):

        $v['_index']   = $index;
        $v['_first']   = $i == 0 ? true:false;

        $v['_last']    = $index == (count($language)-1) ? true : false;
        $v['sub'] = $sub;
        $i++;
?>
                     <?php if($data['lang']==$v['mark']){ ?>
                <button type="button" data-toggle="dropdown" class="btn btn-outline btn-default btn-squared dropdown-toggle btn-lang">
                        <?php if($ui['langlist_icon']){ ?>
                       <img src="<?php echo $v['flag'];?>" alt="<?php echo $v['name'];?>" style="max-width:100%;">
                    <?php } ?>
                    <span ><?php echo $v['name'];?></span>
                </button>
                <?php } ?>
            <?php endforeach;?>
                <ul class="dropdown-menu dropdown-menu-right animate animate-reverse" id="met-langlist-dropdown" role="menu">
                    <?php
    $language = load::sys_class('label', 'new')->get('language')->get_lang();
    $sub = count($language);
    $i = 0;
    foreach($language as $index=>$v):

        $v['_index']   = $index;
        $v['_first']   = $i == 0 ? true:false;

        $v['_last']    = $index == (count($language)-1) ? true : false;
        $v['sub'] = $sub;
        $i++;
?>
                    <a href="<?php echo $v['met_weburl'];?>" title="<?php echo $v['name'];?>" class='dropdown-item'>
                            <?php if($ui['langlist_icon']){ ?>
                                <img src="<?php echo $v['flag'];?>" alt="<?php echo $v['name'];?>" style="max-width:100%;">
                        <?php } ?>
                        <?php echo $v['name'];?>
                    </a>
                <?php endforeach;?>
                </ul>
            </div>
        </li>
        <?php } ?>
<!--多语言-->
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

        <?php
            $id = 2;
            $style = "met_16_1";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
<?php
    $type=strtolower(trim('current'));
    $cid=$data['classnow'];
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
<?php
$ui['listhide']=explode('|', $ui['listhide']);
$ui['detailhide']=explode('|', $ui['detailhide']);
if($data['name']){
    foreach ($ui['listhide'] as $val) {
        if($val==$data['name']){
            $hide=0;
            break;
        }else{
            $hide=1;
        }
    }
}
if($data['title']){
    foreach ($ui['detailhide'] as $val) {
        if($val==$m['name']){
            $hide=0;
            break;
        }else{
            $hide=1;
        }
    }
}
?>
<?php endforeach;?>
    <?php if($hide){ ?>
<?php 
    $banner = load::sys_class('label', 'new')->get('banner')->get_column_banner($data['classnow']);
    $sub = count($banner['img']);
    foreach($banner['img'] as $index=>$v):
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
        $v['type'] = $banner['config']['type'];
        $v['y'] = $banner['config']['y'];
        $v['sub'] = $sub;
?><?php endforeach;?>
    <?php if($sub || $data['classnow']==10001){ ?>
<div class="banner_met_16_1 page-bg" data-height='' style='' m-id='<?php echo $ui['mid'];?>' m-type='banner'>
    <?php 
    $banner = load::sys_class('label', 'new')->get('banner')->get_column_banner($data['classnow']);
    $sub = count($banner['img']);
    foreach($banner['img'] as $index=>$v):
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
        $v['type'] = $banner['config']['type'];
        $v['y'] = $banner['config']['y'];
        $v['sub'] = $sub;
?>
    <div class="slick-slide">
        <img class="cover-image" src="<?php echo $v['img_path'];?>" srcset='<?php echo thumb($v['img_path'],767);?> 767w,<?php echo $v['img_path'];?>' sizes="(max-width: 767px) 767px" alt="<?php echo $v['img_title'];?>" data-height='<?php echo $v['height'];?>|<?php echo $v['height_t'];?>|<?php echo $v['height_m'];?>' >
            <?php if($v['img_title']){ ?>
        <div class="banner-text p-<?php echo $v['img_text_position'];?>" met-imgmask>
            <div class='container'>
                <div class='banner-text-con'>
                    <div>
                        <h4 class="animation-slide-top font-weight-500" style="color:<?php echo $v['img_title_color'];?>"><?php echo $v['img_title'];?></h4>
                        <p class="animation-slide-bottom" style='color:<?php echo $v['img_des_color'];?>'><?php echo $v['img_des'];?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
            <?php if($v['img_link']){ ?>
        <a href="<?php echo $v['img_link'];?>" title="<?php echo $v['img_des'];?>" target='_blank' met-imgmask></a>
        <?php } ?>
    </div>
    <?php endforeach;?>
</div>
<?php }else{ ?>
    <?php
    $type=strtolower(trim('current'));
    $cid=$data['class1'];
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
        <div class="banner_met_16_1-ny vertical-align text-xs-center" m-id='<?php echo $ui['mid'];?>' m-type='banner'>
                <?php if($m[module]==1){ ?>
                <h1 class="vertical-align-middle"><?php echo $m[name];?></h1>
                <?php }else{ ?>
                <h2 class="vertical-align-middle"><?php echo $m[name];?></h2>
            <?php } ?>
        </div>
    <?php endforeach;?>
<?php } ?>
<?php } ?>

<?php if(file_exists(PATH_OWN_FILE."templates/met/css/metinfo.css")){ ?>
<link href="<?php echo $_M['url']['own_tem'];?>css/metinfo.css?<?php echo $met_file_version;?>" rel='stylesheet' type='text/css'>
<?php } ?>
<div class="page bg-pagebg1 member-profile met-member">
    <div class="container">
        <div class="page-content row">
            <?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
if(!$_M['config']['own_active']) $_M['config']['own_active']=array($_M['config']['app_no'].'_'.$_M['config']['own_order']=>'active');
?>
<div class="col-lg-3">
    <div class='dropdown m-b-15 hidden-lg-up met-sidebar-nav-mobile'>
        <button type="button" class="btn btn-primary btn-block dropdown-toggle met-sidebar-nav-active-name" data-toggle="dropdown"></button>
        <div class="dropdown-menu animate animate-reverse w-full" role="menu">
            <a class="dropdown-item <?php echo $_M['config']['own_active']['0_1'];?>" href="<?php echo $_M['url']['profile'];?>" title="<?php echo $_M['word']['memberIndex9'];?>"><?php echo $_M['word']['memberIndex9'];?></a>
            <a class="dropdown-item <?php echo $_M['config']['own_active']['0_2'];?>" href="<?php echo $_M['url']['profile_safety'];?>" title="<?php echo $_M['word']['accsafe'];?>"><?php echo $_M['word']['accsafe'];?></a>
            <?php
            foreach($_M['html']['app_sidebar'] as $key=>$val){
                $val['active']=$_M['config']['own_active'][$val['no'].'_'.$val['own_order']];
                $val['target']=$val['target']?' target="_blank"':'';
            ?>
            <a class="dropdown-item <?php echo $val['active'];?>" href="<?php echo $val['url'];?>" title="<?php echo $val['title'];?>"<?php echo $val['target'];?>><?php echo $val['title'];?></a>
            <?php } ?>
        </div>
    </div>
	<div class="panel row m-r-0 m-b-0 hidden-md-down" boxmh-h>
        <div class="panel-body">
            <h2 class="m-l-30 font-size-18 font-weight-unset"><?php echo $_M['word']['memberIndex3'];?></h2>
    		<ul class="list-group m-l-15 met-sidebar-nav">
    			<li class="list-group-item <?php echo $_M['config']['own_active']['0_1'];?>"><a href="<?php echo $_M['url']['profile'];?>" title="<?php echo $_M['word']['memberIndex9'];?>"><?php echo $_M['word']['memberIndex9'];?></a></li>
    			<li class="list-group-item <?php echo $_M['config']['own_active']['0_2'];?>"><a href="<?php echo $_M['url']['profile_safety'];?>" title="<?php echo $_M['word']['accsafe'];?>"><?php echo $_M['word']['accsafe'];?></a></li>
                <a class="dropdown-item <?php echo $_M['config']['own_active']['0_3'];?>" href="<?php echo $_M['url']['profile_safety_activity'];?>" title="报名的活动">报名的活动</a>
                <?php
                foreach($_M['html']['app_sidebar'] as $key=>$val){
                    $val['active']=$_M['config']['own_active'][$val['no'].'_'.$val['own_order']];
                    $val['target']=$val['target']?' target="_blank"':'';
                ?>
                <li class="list-group-item <?php echo $val['active'];?>"><a href="<?php echo $val['url'];?>" title="<?php echo $val['title'];?>"<?php echo $val['target'];?>><?php echo $val['title'];?></a></li>
                <?php } ?>
            </ul>
        </div>
	</div>
</div>
            <div class="col-lg-9">
                <div class="panel panel-default m-b-0" boxmh-mh>
                    <div class='panel-body met-member-safety met-member-profile'>
                        <div class="media">
                            <div class="media-left media-middle"><i class="fa fa-unlock-alt"></i></div>
                            <div class="media-body">
                                <div class="row m-x-0">
                                    <div class="col-xs-8 col-sm-9 col-md-10">
                                        <h4 class="media-heading"><?php echo $_M['word']['accpassword'];?></h4>
                                        <?php echo $_M['word']['accsaftips1'];?>
                                    </div>
                                    <div class="col-xs-4 col-sm-3 col-md-2 text-xs-center">
                                        <button type="button" class="btn btn-primary btn-outline btn-squared" data-toggle="modal" data-target=".safety-modal-pass"><?php echo $_M['word']['modify'];?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left media-middle"><i class="fa fa-envelope"></i></div>
                            <div class="media-body">
                                <div class="row m-x-0">
                                    <div class="col-xs-8 col-sm-9 col-md-10">
                                        <h4 class="media-heading">
                                            <?php echo $_M['word']['accemail'];?>
                                            <span class="tag tag-outline tag-warning"><?php echo $_M['profile_safety']['emailtxt'];?></span>
                                        </h4>
                                        <?php echo $_M['word']['accsaftips2'];?>
                                    </div>
                                    <div class="col-xs-4 col-sm-3 col-md-2 text-xs-center">
                                        <button type="button" class="btn btn-primary btn-outline btn-squared <?php echo $_M['profile_safety']['emailclass'];?>" <?php echo $_M['profile_safety']['disabled'];?> data-target=".safety-modal-<?php echo $_M['profile_safety']['emailclass'];?>" data-toggle="modal" data-mailedit="<?php echo $_M['url']['emailedit'];?>" data-mailadd="<?php echo $_M['url']['profile_safety_emailadd'];?>"><?php echo $_M['profile_safety']['emailbut'];?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left media-middle"><i class="fa fa-mobile"></i></div>
                            <div class="media-body">
                                <div class="row m-x-0">
                                    <div class="col-xs-8 col-sm-9 col-md-10">
                                        <h4 class="media-heading">
                                            <?php echo $_M['word']['acctel'];?>
                                            <span class="tag tag-outline tag-warning"><?php echo $_M['profile_safety']['teltxt'];?></span>
                                        </h4>
                                        <?php echo $_M['word']['accsaftips3'];?>
                                    </div>
                                    <div class="col-xs-4 col-sm-3 col-md-2 text-xs-center">
                                        <button type="button" class="btn btn-primary btn-outline btn-squared <?php echo $_M['profile_safety']['telclass'];?>" data-target=".safety-modal-<?php echo $_M['profile_safety']['telclass'];?>" data-toggle="modal"><?php echo $_M['profile_safety']['telbut'];?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--实名认证-->
                            <?php if($_M['config']['met_member_idvalidate']==1){ ?>
                        <div class="media">
                            <div class="media-left media-middle"><i class="fa fa-user"></i></div>
                            <div class="media-body">
                                <div class="row m-x-0">
                                    <div class="col-xs-8 col-sm-9 col-md-10">
                                        <h4 class="media-heading">
                                            <?php echo $_M['word']['rnvalidate'];?>
                                            <span class="tag tag-outline tag-warning"><?php echo $_M['profile_safety']['idvalitxt'];?></span>
                                        </h4>
                                        <?php echo $_M['word']['accsaftips4'];?>
                                    </div>
                                    <div class="col-xs-4 col-sm-3 col-md-2 text-xs-center">
                                        <button type="button" class="btn btn-primary btn-outline btn-squared <?php echo $_M['profile_safety']['idvaliclass'];?>" data-target=".safety-modal-<?php echo $_M['profile_safety']['idvaliclass'];?>" data-toggle="modal"><?php echo $_M['profile_safety']['idvalibut'];?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade safety-modal-idvalview">
        <div class="modal-dialog modal-sm modal-center modal-primary">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo $_M['word']['rnvalidate'];?></h4>
                </div>
                <div class="modal-body">
                    <div class="col-xs-8 col-sm-9 col-md-10">
                        <h4 class="media-heading"><?php echo $_M['word']['realname'];?>：</h4>
                        <?php echo $_M['user']['realidinfo']['realname'];?>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-8 col-sm-9 col-md-10">
                            <h4 class="media-heading"><?php echo $_M['word']['idcode'];?>：</h4>
                            <?php echo $_M['user']['realidinfo']['idcode'];?>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-xs-8 col-sm-9 col-md-10">
                            <h4 class="media-heading"><?php echo $_M['word']['telnum'];?>：</h4>
                            <?php echo $_M['user']['realidinfo']['phone'];?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--修改密码-->
    <div class="modal fade safety-modal-pass">
        <div class="modal-dialog modal-sm modal-center modal-primary">
            <div class="modal-content">
                <form method="post" action="<?php echo $_M['url']['pass_save'];?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $_M['word']['modifypassword'];?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-unlock-alt"></i>
                                </span>
                                <input type="password" name="oldpassword" class="form-control" placeholder="<?php echo $_M['word']['oldpassword'];?>" required
                                data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>"
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-unlock-alt"></i>
                                </span>
                                <input type="password" name="password" required class="form-control" placeholder="<?php echo $_M['word']['newpassword'];?>"
                                data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>"
                                data-fv-identical="true"
                                data-fv-identical-field="confirmpassword"
                                data-fv-identical-message="<?php echo $_M['word']['passwordsame'];?>"
                                data-fv-stringlength="true"
                                data-fv-stringlength-min="3"
                                data-fv-stringlength-max="30"
                                data-fv-stringlength-message="<?php echo $_M['word']['passwordcheck'];?>"
                                >
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-unlock-alt"></i>
                                </span>
                                <input type="password" name="confirmpassword" required data-password="password" class="form-control" placeholder="<?php echo $_M['word']['renewpassword'];?>"
                                data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>"
                                data-fv-identical="true"
                                data-fv-identical-field="password"
                                data-fv-identical-message="<?php echo $_M['word']['passwordsame'];?>"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-squared"><?php echo $_M['word']['confirm'];?></button>
                        <button type="button" class="btn btn-default btn-squared" data-dismiss="modal"><?php echo $_M['word']['cancel'];?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--邮箱绑定-->
    <div class="modal fade safety-modal-emailadd">
        <div class="modal-dialog modal-sm modal-center modal-primary">
            <div class="modal-content">
                <form method="post" action="<?php echo $_M['url']['profile_safety_emailadd'];?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $_M['word']['accemail'];?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group m-b-0">
                            <input type="email" name="email" required class="form-control" placeholder="<?php echo $_M['word']['emailaddress'];?>"
                            data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>"
                            data-fv-emailAddress-message="<?php echo $_M['word']['emailvildtips3'];?>"
                            >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-squared"><?php echo $_M['word']['confirm'];?></button>
                        <button type="button" class="btn btn-default btn-squared" data-dismiss="modal"><?php echo $_M['word']['cancel'];?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--手机号码绑定-->
    <div class="modal fade safety-modal-teladd">
        <div class="modal-dialog modal-sm modal-center modal-primary">
            <div class="modal-content">
                <form method="post" action="<?php echo $_M['url']['profile_safety_teladd'];?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $_M['word']['acctel'];?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" name="tel" required class="form-control" placeholder="<?php echo $_M['word']['telnum'];?>"
                            data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>"
                            data-fv-remote="true"
                            data-fv-remote-url="<?php echo $_M['url']['profile_safety_telok'];?>"
                            data-fv-remote-message="<?php echo $_M['word']['teluse'];?>"
                            data-fv-phone="true"
                            data-fv-phone-message="<?php echo $_M['word']['telok'];?>"
                            >
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon"><i class="fa fa-shield"></i></span>
                                <input type="text" name="code" required class="form-control" placeholder="<?php echo $_M['word']['memberImgCode'];?>" data-fv-notempty-message="<?php echo $_M['word']['inputcode'];?>">
                                <div class="input-group-addon p-5 login-code-img">
                                    <img src="<?php echo $_M[url][entrance];?>?m=include&c=ajax_pin&a=dogetpin" title="<?php echo $_M['word']['memberTip1'];?>" id='getcode' align="absmiddle" role="button">
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="input-group input-group-icon">
                                <input type="text" name="phonecode" required class="form-control" placeholder="<?php echo $_M['word']['memberImgCode'];?>" data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>">
                                <div class="input-group-addon p-0">
                                    <button type="button" data-url="<?php echo $_M['url']['profile_safety_telvalid'];?>" class="btn btn-success btn-squared w-full phone-code" data-retxt="<?php echo $_M['word']['resend'];?>">
                                        <?php echo $_M['word']['getmemberImgCode'];?>
                                        <span class="badge"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-squared"><?php echo $_M['word']['confirm'];?></button>
                        <button type="button" class="btn btn-default btn-squared" data-dismiss="modal"><?php echo $_M['word']['cancel'];?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- 手机号码修改 -->
    <div class="modal fade safety-modal-teledit">
        <div class="modal-dialog modal-sm modal-center modal-primary">
            <div class="modal-content">
                <form method="post" action="<?php echo $_M['url']['profile_safety_teledit'];?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $_M['word']['modifyacctel'];?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group"><?php echo $_M['profile_safety']['teltxt'];?></div>
                        <div class="form-group m-b-0">
                            <div class="input-group input-group-icon">
                                <input type="text" name="code" required class="form-control" placeholder="<?php echo $_M['word']['memberImgCode'];?>" data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>">
                                <div class="input-group-addon p-0">
                                    <button type="button" data-url="<?php echo $_M['url']['profile_safety_teledit'];?>" class="btn btn-success btn-squared w-full phone-code" data-retxt="<?php echo $_M['word']['resend'];?>">
                                        <?php echo $_M['word']['getmemberImgCode'];?>
                                        <span class="badge"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-squared"><?php echo $_M['word']['confirm'];?></button>
                        <button type="button" class="btn btn-default btn-squared" data-dismiss="modal"><?php echo $_M['word']['cancel'];?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--实名认证-->
    <div class="modal fade safety-modal-idvaliadd">
        <div class="modal-dialog modal-sm modal-center modal-primary">
            <div class="modal-content">
                <form method="post" action="<?php echo $_M['url']['profile_safety_idvalid'];?>">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo $_M['word']['rnvalidate'];?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="input" name="realname" required class="form-control" placeholder="<?php echo $_M['word']['realname'];?>" data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>">
                        </div>
                        <div class="form-group">
                            <input type="input" name="idcode" required class="form-control" placeholder="<?php echo $_M['word']['idcode'];?>" data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>"
                            >
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" required class="form-control" placeholder="<?php echo $_M['word']['telnum'];?>" data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>">
                        </div>
                        <div class="form-group m-b-0">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon"><i class="fa fa-shield"></i></span>
                                <input type="text" name="code" required class="form-control" placeholder="<?php echo $_M['word']['memberImgCode'];?>" data-fv-notempty-message="<?php echo $_M['word']['noempty'];?>">
                                <div class="input-group-addon p-5 login-code-img">
                                    <img src="<?php echo $_M[url][entrance];?>?m=include&c=ajax_pin&a=dogetpin" title="<?php echo $_M['word']['memberTip1'];?>" id='getcode' align="absmiddle" role="button">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-squared"><?php echo $_M['word']['confirm'];?></button>
                        <button type="button" class="btn btn-default btn-squared" data-dismiss="modal"><?php echo $_M['word']['cancel'];?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
 ?>
<script>
var MET=[];
MET['url']=[];
MET['langtxt'] = {
	"jsx15":"<?php echo $_M['word']['jsx15'];?>",
	"js35":"<?php echo $_M['word']['js35'];?>",
	"jsx17":"<?php echo $_M['word']['jsx17'];?>",
	"formerror1":"<?php echo $_M['word']['formerror1'];?>",
	"formerror2":"<?php echo $_M['word']['formerror2'];?>",
	"formerror3":"<?php echo $_M['word']['formerror3'];?>",
	"formerror4":"<?php echo $_M['word']['formerror4'];?>",
	"formerror5":"<?php echo $_M['word']['formerror5'];?>",
	"formerror6":"<?php echo $_M['word']['formerror6'];?>",
	"formerror7":"<?php echo $_M['word']['formerror7'];?>",
	"formerror8":"<?php echo $_M['word']['formerror8'];?>",
	"js46":"<?php echo $_M['word']['js46'];?>",
	"js23":"<?php echo $_M['word']['js23'];?>",
	"checkupdatetips":"<?php echo $_M['word']['checkupdatetips'];?>",
	"detection":"<?php echo $_M['word']['detection'];?>",
	"try_again":"<?php echo $_M['word']['try_again'];?>",
	"fileOK":"<?php echo $_M['word']['fileOK'];?>",
};
MET['met_editor']="<?php echo $_M['config']['met_editor'];?>";
MET['met_keywords']="<?php echo $_M['config']['met_keywords'];?>";
MET['url']['ui']="<?php echo $_M['url']['ui'];?>";
MET['url']['own']="<?php echo $_M['url']['own'];?>";
MET['url']['own_tem']="<?php echo $_M['url']['own_tem'];?>";
MET['url']['api']="<?php echo $_M['url']['api'];?>";
</script>

        <?php
            $id = 3;
            $style = "met_11_1";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
    <footer class="foot_nav_met_11_1  text-xs-center" m-id='<?php echo $ui['mid'];?>' m-type="foot_nav">
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

        <?php
            $id = 4;
            $style = "met_11_1";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
<footer class='foot_info_met_11_1 p-y-20' m-id='<?php echo $ui['mid'];?>' m-type="foot">
    <div class="container text-xs-center">
            <?php if($c['met_footright']){ ?>
        <p class="m-b-0"><?php echo $c['met_footright'];?></p>
        <?php } ?>
            <?php if($c['met_footaddress']){ ?>
        <p class="m-b-0"><?php echo $c['met_footaddress'];?></p>
        <?php } ?>
            <?php if($c['met_foottel']){ ?>
        <p class="m-b-0"><?php echo $c['met_foottel'];?></p>
        <?php } ?>
            <?php if($c['met_footother']){ ?>
        <p class="m-b-0"><?php echo $c['met_footother'];?></p>
        <?php } ?>
            <?php if($c['met_foottext']){ ?>
        <p class="m-b-0"><?php echo $c['met_foottext'];?></p>
        <?php } ?>
        <div class="powered_by_metinfo">
            Powered&nbsp;by&nbsp;
            <a href="http://www.MetInfo.cn/#copyright" target="_blank" title="$lang_Info1">MetInfo</a>
            &nbsp;<?php echo $c['metcms_v'];?>
        </div>
<!--简繁体切换-->
                        <?php if($c['met_ch_lang'] && $ui['simplified']){ ?>
                    <div class="met-langlist met-s2t" m-id="lang" m-type="lang">
                        <?php if($data[lang]==cn ){ ?>
                        <button type="button" class="btn btn-outline btn-default btn-squared btn-lang btn-cntotc" data-tolang='tc'>繁体</button>
                        <?php }else if($data[lang]==zh){ ?>
                        <button type="button" class="btn btn-outline btn-default btn-squared btn-lang btn-cntotc" data-tolang='cn'>简体</button>
                    <?php } ?>
                    </div>
                <?php } ?>
<!--简繁体切换-->
<!--多语言-->
            <?php if($c['met_lang_mark'] && $ui['langlist']){ ?>
        <div class="met-langlist vertical-align" m-id="lang" m-type="lang">
            <div class="inline-block dropup">
                <?php
    $language = load::sys_class('label', 'new')->get('language')->get_lang();
    $sub = count($language);
    $i = 0;
    foreach($language as $index=>$v):

        $v['_index']   = $index;
        $v['_first']   = $i == 0 ? true:false;

        $v['_last']    = $index == (count($language)-1) ? true : false;
        $v['sub'] = $sub;
        $i++;
?>
                   <?php if($data['lang']==$v['mark']){ ?>
                <button type="button" data-toggle="dropdown" class="btn dropdown-toggle btn-lang">
                        <?php if($ui['foot_langlist_icon']){ ?>
                   <img src="<?php echo $v['flag'];?>" alt="<?php echo $v['name'];?>" style="max-width:100%;">
                    <?php } ?>
                    <span ><?php echo $v['name'];?></span>
                </button>
                <?php } ?>
                <?php endforeach;?>
                <ul class="dropdown-menu dropdown-menu-right" id="met-langlist-dropdown" role="menu">
                    <?php
    $language = load::sys_class('label', 'new')->get('language')->get_lang();
    $sub = count($language);
    $i = 0;
    foreach($language as $index=>$v):

        $v['_index']   = $index;
        $v['_first']   = $i == 0 ? true:false;

        $v['_last']    = $index == (count($language)-1) ? true : false;
        $v['sub'] = $sub;
        $i++;
?>   
                    <a href="<?php echo $v['met_weburl'];?>" title="<?php echo $v['name'];?>" class='dropdown-item'>
                            <?php if($ui['foot_langlist_icon']){ ?>
                       <img src="<?php echo $v['flag'];?>" alt="<?php echo $v['name'];?>" style="max-width:100%;">
                        <?php } ?>
                        <?php echo $v['name'];?>
                    </a>
            <?php endforeach;?>
            </ul>
            </div>
        </div>
        <?php } ?>
<!--多语言-->
    </div>
</footer>

        <?php
            $id = 5;
            $style = "met_16_1";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
<button type="button" class="btn btn-icon btn-primary btn-squared back_top_met_16_1 met-scroll-top" hidden m-id='<?php echo $ui['mid'];?>' m-type='nocontent'>
	<i class="icon wb-chevron-up" aria-hidden="true"></i>
</button>

<?php if($lang_json_file_ok){ ?>
<input type="hidden" name="met_lazyloadbg" value="<?php echo $g['lazyloadbg'];?>">
<?php if($c["shopv2_open"]){ ?>
<script>
var jsonurl="<?php echo $url['shop_cart_jsonlist'];?>",
    totalurl="<?php echo $url['shop_cart_modify'];?>",
    delurl="<?php echo $url['shop_cart_del'];?>",
    price_prefix="<?php echo $c['shopv2_price_str_prefix'];?>",
    price_suffix="<?php echo $c['shopv2_price_str_suffix'];?>";
</script>
<?php
    }
}
$basic_js_name=$metinfover_v2?"":"_web";
?>
<script src="<?php echo $c['met_weburl'];?>public/ui/v2/static/js/basic<?php echo $basic_js_name;?>.js?<?php echo $met_file_version;?>"></script>
<?php
if($lang_json_file_ok){
    if($metinfover_v2){
        if(file_exists(PATH_TEM."cache/common.js")){
            $common_js_time = filemtime(PATH_TEM."cache/common.js");
?>
<script src="<?php echo $c['met_weburl'];?>templates/<?php echo $c['met_skin_user'];?>/cache/common.js?<?php echo $common_js_time;?>"></script>
<?php
        }
        if($met_page){
            $page_js_time = filemtime(PATH_TEM."cache/".$met_page."_".$_M["lang"].".js");
?>
<script src="<?php echo $c['met_weburl'];?>templates/<?php echo $c['met_skin_user'];?>/cache/<?php echo $met_page;?>_<?php echo $_M["lang"];?>.js?<?php echo $page_js_time;?>"></script>
<?php
        }
    }
    $met_lang_time = filemtime(PATH_WEB."cache/lang_json_".$data["lang"].".js");
?>
<script src="<?php echo $c['met_weburl'];?>cache/lang_json_<?php echo $data['lang'];?>.js?<?php echo $met_lang_time;?>"></script>
<?php
    if($c["shopv2_open"]){
?>
<script src="<?php echo $c['met_weburl'];?>app/app/shop/web/templates/met/js/own.js?<?php echo $met_file_version;?>"></script>
<?php
    }
    if(is_mobile() && $c["met_footstat_mobile"]){
?>
<?php echo $c['met_footstat_mobile'];?>

<?php }else if(!is_mobile() && $c["met_footstat"]){?>
<?php echo $c['met_footstat'];?>

<?php
    }
    if($_M["html_plugin"]["foot_script"]){
?>
<?php echo $_M["html_plugin"]["foot_script"];?>

<?php
    }
}
?>
</body>
</html>
<script src="<?php echo $_M['url']['site'];?>public/ui/v2/static/js/app.js?<?php echo $met_file_version;?>"></script>
<?php if(file_exists(PATH_OWN_FILE."templates/met/js/own.js") && !((M_NAME=='product' || M_NAME=='shop') && $_M['config']['shopv2_open'])){ ?>
<script src="<?php echo $_M['url']['own_tem'];?>js/own.js?<?php echo $met_file_version;?>"></script><?php } ?>