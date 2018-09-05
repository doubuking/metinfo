<?php defined('IN_MET') or exit('No permission'); ?>
<?php $met_page = "shownews";?>
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


        <?php
            $id = 22;
            $style = "met_16_1";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
<?php $sidebar=strlen($ui[has][sidebar]);
?>

<main class="news_list_detail_met_16_1 met-shownews animsition">
    <div class="container">
        <div class="row">
                <?php if($_M['form']['pageset']){ ?>
                    <?php if($sidebar){ ?>
                    <div class="col-md-9 met-shownews-body" m-id='<?php echo $ui['mid'];?>'>
                        <div class="row">
                            <?php }else{ ?>
                            <div class="met-shownews-body col-md-10 offset-md-1" m-id='<?php echo $ui['mid'];?>'>
                                <div class="row">
                <?php } ?>
                <?php }else{ ?>
                    <?php if($ui[has][sidebar]){ ?>
                    <div class="col-md-9 met-shownews-body" m-id='<?php echo $ui['mid'];?>'>
                        <div class="row">
                            <?php }else{ ?>
                            <div class="met-shownews-body col-md-10 offset-md-1" m-id='<?php echo $ui['mid'];?>'>
                                <div class="row">
                <?php } ?>
            <?php } ?>
            <section class="details-title border-bottom1">
<!--                <h1><?php echo $data['starttime'];?></h1>-->
                <h1 class='m-t-10 m-b-5'><?php echo $data['title'];?></h1>
                <div class="info font-weight-300">
                    <span><?php echo $data['updatetime'];?></span>
                    <span><?php echo $data['issue'];?></span>
                    <span>
								<i class="icon wb-eye m-r-5" aria-hidden="true"></i>
								<?php echo $data['hits'];?>
							</span>

                    <div class="tag">
                        <span><?php echo $data['tagname'];?></span>
                                <?php
            $sub = count($data[taglist]);
            $num = $ui[tag_num];
            if(!is_array($data[taglist])){
                $data[taglist] = explode('|',$data[taglist]);
            }
            foreach ($data[taglist] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($data[taglist])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $tag = $val;
            ?>
                            <a href="<?php echo $tag['url'];?>" title="<?php echo $tag['name'];?>"><?php echo $tag['name'];?></a>
                        <?php }?>
                    </div>
                </div>

                <div class="find_nav">
                <div class=" font-weight-1 find_nav_left" style="height: 46px" id="met-nav-collapse">
                    <ul class="nav navbar-nav navlist find_nav_list" style="">
                        <li class="nav-item">
                            <a href="javascript:void(0)" title="活动介绍" class="nav-link active">活动介绍</a>
                        </li>
                        <li class="nav-item m-l-30">
                            <a href="javascript:void(0)" title="活动日程" class="nav-link " >活动日程</a>
                        </li>
                        <li class="nav-item dropdown m-l-30">
                            <a  href="javascript:void(0)" title="嘉  宾" class="nav-link " >嘉  宾</a>
                        </li>
                        <li class="nav-item dropdown m-l-30">
                            <a  href="javascript:void(0)" title="赞助商" class="nav-link " >赞助商</a>

                        </li>
                        <li class="nav-item dropdown m-l-30">
                            <a  href="javascript:void(0)" title="会场交通" class="nav-link " >会场交通</a>

                        </li>
                        <li class="nav-item dropdown m-l-30">
                            <a  href="javascript:void(0)" title="活动纪要" class="nav-link " >活动纪要</a>

                        </li>
                        <li class="nav-item dropdown m-l-30">
                            <a  href="javascript:void(0)" title="活动照片" class="nav-link " >活动照片</a>

                        </li>
                    </ul>
                </div>
                </div>


            </section>

            <div class="tab-box">
                <section class="met-editor clearfix active">
                    <?php echo $data['content'];?>
                </section>
                <section class="met-editor clearfix">
                    <?php echo $data['schedule'];?>
                </section>


                <section class="met-editor clearfix">
                    <?php echo $data['guest'];?>
                </section>

                <section class="met-editor clearfix">
                    <?php echo $data['sponsor'];?>
                </section>

                <section class="met-editor clearfix">
                    <?php echo $data['conference_traffic'];?>
                </section>

                <section class="met-editor clearfix">
                    <?php echo $data['event_summary'];?>
                </section>

                <section class="met-editor clearfix">
                    <?php echo $data['active_photo'];?>
                </section>


            </div>



                    <div class='met-page p-y-30 border-top1'>
    <div class="container p-t-30 ">
    <ul class="pagination block blocks-2"'>
        <li class='page-item m-b-0 <?php echo $data['preinfo']['disable'];?>'>
            <a href='<?php if($data['preinfo']['url']){?><?php echo $data['preinfo']['url'];?><?php }else{?>javascript:;<?php }?>' title="<?php echo $data['preinfo']['title'];?>" class='page-link text-truncate'>
                <?php echo $word['PagePre'];?>
                <span aria-hidden="true" class='hidden-xs-down'>: <?php if($data['preinfo']['title']){?><?php echo $data['preinfo']['title'];?><?php }else{?><?php echo $word['Noinfo'];?><?php }?></span>
            </a>
        </li>
        <li class='page-item m-b-0 <?php echo $data['nextinfo']['disable'];?>'>
            <a href='<?php if($data['nextinfo']['url']){?><?php echo $data['nextinfo']['url'];?><?php }else{?>javascript:;<?php }?>' title="<?php echo $data['nextinfo']['title'];?>" class='page-link pull-xs-right text-truncate'>
                <?php echo $word['PageNext'];?>
                <span aria-hidden="true" class='hidden-xs-down'>: <?php if($data['nextinfo']['title']){?><?php echo $data['nextinfo']['title'];?><?php }else{?><?php echo $word['Noinfo'];?><?php }?></span>
            </a>
        </li>
    </ul>
</div>
</div>

                <?php if($_M['form']['pageset']){ ?>
                    <?php if($sidebar){ ?>
        </div>
    </div>
    <?php }else{ ?>
    </div>
    </div>
</main>
<?php } ?>
<?php }else{ ?>
    <?php if($ui[has][sidebar]){ ?>
    </div>
    </div>
    <?php }else{ ?>
    </div>
    </div>
    </main>
<?php } ?>
<?php } ?>
    <?php if($data['is_activity']==1){ ?>
<div class=" button-news">
    <a class="btn btn-outline btn-squared btn-primary met-job-cvbtn" href="javascript:;" data-toggle="modal" data-target="#met-job-cv" data-jobid="<?php echo $data['id'];?>" data-cvurl="cv.php?lang=cn&selected">立即报名</a>
</div>
<?php } ?>
<div class="modal fade modal-primary" id="met-job-cv" aria-hidden="true" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title"><?php echo $word['Attendants'];?></h4>
                <h5 style="cursor: pointer" onclick="addform()"><?php echo $word['Addattendants'];?></h5>
            </div>
            <div class="modal-body">
                <form method="POST" onsubmit="return check(this)" class="met-form met-form-validation" enctype="multipart/form-data" action="<?php echo $url['site'];?>activity/savavity.php?action=add&lang=<?php echo $M['lang'];?> ">
                    <input type="hidden" name="lang" value="<?php echo $_M['lang'];?>">
                    <input type="hidden" name="activity_id" value="<?php echo $_M['activity_id'];?>">
                    <div class="form-groups" >


                            <div>
                                <span><?php echo $word['Attendantsinfo'];?></span>
                            </div>
                            <div class="form-group">
                                <input name="name[]" class="form-control" required type="text" placeholder="<?php echo $word['Name'];?> ">
                                <span class="error"  style="display:none"></span>
                            </div>
                            <div class="form-group">
                                <input name="phone[]" class="form-control" onblur="validatemobile(this)" required type="text" placeholder="<?php echo $word['Phone'];?> ">
                                <span class="error"  style="display:none"></span>
                            </div>
                            <div class="form-group">
                                <input name="email[]" class="form-control" onblur="validateemail(this)" required type="email" placeholder="<?php echo $word['Email'];?>">
                                <span class="error"  style="display:none"></span>
                            </div>



                    </div>

                    <div class="form-group" id="formBefro"><div class="input-group input-group-icon">
                            <input name="code" type="text" class="form-control input-codeimg" placeholder="<?php echo $word['memberImgCode'];?>" required="" data-fv-message="<?php echo $word['Empty'];?>">
                            <span class="input-group-addon p-5">
					<img src="<?php echo $url['site'];?>app/system/entrance.php?m=include&c=ajax_pin&a=dogetpin" onclick="reImg();" id="getcode" title="<?php echo $word['memberTip1'];?>" align="absmiddle" role="button" >
					</span>
                        </div>
                    </div>

                    <div class="form-group m-b-0">

                        <button type="submit"  class="btn btn-primary btn-block btn-squared"><?php echo $word['Signup'];?></button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>
    reImg();
    function reImg() {
        var img = document.getElementById("getcode");
        img.src =img.src + "& rnd=" + Math.random();
    }
    var num = 2;
    function addform() {
        var fromStr = '<div>'+
            '<div>'+
            '<span><?php echo $word['Attendantsinfo'];?></span><span style="float: right;cursor: pointer" title="删除" onclick="deldiv(this)">X</span>'+
            '</div>'+
            '<div class="form-groups">'+
            '<div class="form-group"><input name="name[]"  required class="form-control" type="text" placeholder="<?php echo $word['Name'];?> "><span class="error"  style="display:none"></span></div>'+
            '<div class="form-group"><input name="phone[]" required class="form-control" onblur="validatemobile(this)" type="text" placeholder="<?php echo $word['Phone'];?> "><span class="error"  style="display:none"></span></div>'+
            '<div class="form-group"><input name="email[]" required  class="form-control" onblur="validateemail(this)" type="email" placeholder="<?php echo $word['Email'];?>"><span class="error"  style="display:none"></span></div>'+
            '</div>';

        $("#formBefro").before(fromStr);
        num++;
    }
    //删除元素
    function deldiv(e) {
        $(e).parent().parent().remove();
    }
    var valimobile = false;
    var valiphone = false;

    function check(from) {

        $("form :input").blur();

        console.log(valimobile);
        console.log(valiphone);
        if(valimobile && valiphone){
            return true
        }
        return false;


    }


    function validatemobile(e)
    {
        var mobile = e.value;
        if(mobile.length==0)
        {
            $(e).next(".error").text('手机号码不能为空！').show();
            valimobile = false;
            return false;
        }
        if(mobile.length!=11)
        {
            $(e).next(".error").text('请输入有效的手机号码，需是11位！').show();
            valimobile = false;
            return false;
        }

        var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
        if(!myreg.test(mobile))
        {
            $(e).next(".error").text('请输入有效的手机号码！').show();
            valimobile = false;
            return false;
        }

        $(e).next(".error").hide();
        valimobile = true;
        return true;
    }

    function validateemail(e){
        var obj = e.value;
        //对电子邮件的验证
        var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        if(!myreg.test(obj))
        {
            $(e).next(".error").text('请输入有效的邮箱').show();
            valiphone = false;
            return false;
        }
        $(e).next(".error").hide();
        valiphone = true;
        return true;
    }







</script>


        <?php
            $id = 23;
            $style = "met_16_1";
            if(!isset($ui_compile)){
                load::sys_class('view/ui_compile');
                $ui_compile = new ui_compile();
            }
            $ui = $ui_compile->list_local_config($id);
            $ui['has'] =$ui_compile->list_page_config($met_page);
            ?>
    <?php if($data[index_num]<>7){ ?>
<div class="col-md-3">
	<div class="row">
<aside class="sidebar_met_16_1 met-sidebar panel panel-body m-b-0" boxmh-h m-id='<?php echo $ui['mid'];?>' m-type='nocontent'>
	<form class='sidebar-search' method='get' action="<?php echo $c['met_weburl'];?>search/search.php">
		<input type='hidden' name='lang' value='<?php echo $data['lang'];?>' />
		<input type='hidden' name='class1' value='<?php echo $data['class1'];?>' />
		<div class="form-group">
			<div class="input-search">
				<button type="submit" class="input-search-btn">
					<i class="icon wb-search" aria-hidden="true"></i>
				</button>
				<input type="text" class="form-control" name="searchword" placeholder="<?php echo $ui['sidebar_search_placeholder'];?>">
			</div>
		</div>
	</form>
	    <?php if($ui['sidebar_column_ok']){ ?>
	<ul class="sidebar-column list-icons">
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
		<li>
			<a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" class="    <?php if($data[classnow]==$m[id]){ ?>
					active
					<?php } ?>" <?php echo $m['urlnew'];?>><?php echo $m['name'];?></a>
		</li>
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
		<li>
			    <?php if($m['sub'] && $ui['sidebar_column3_ok']){ ?>
			<a href="javascript:;" title="<?php echo $m['name'];?>" class='<?php echo $m['class'];?>' <?php echo $m['urlnew'];?> data-toggle="collapse" data-target=".sidebar-column3-<?php echo $m['_index'];?>"><?php echo $m['name'];?><i class="wb-chevron-right-mini"></i></a>
	        <div class="sidebar-column3-<?php echo $m['_index'];?> collapse" aria-expanded="false">
	            <ul class="m-t-5 p-l-20">
	                <li><a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?> title="<?php echo $ui['all'];?>" class="<?php echo $m['class'];?>"><?php echo $ui['all'];?></a></li>
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
	                <li><a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?> title="<?php echo $m['name'];?>" class='<?php echo $m['class'];?>'><?php echo $m['name'];?></a></li>
					<?php endforeach;?>
	            </ul>
	        </div>
			<?php }else{ ?>
			<a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" class='<?php echo $m['class'];?>'><?php echo $m['name'];?></a>
	        <?php } ?>
		</li>
		<?php endforeach;?>
		<?php endforeach;?>
	</ul>
	<?php } ?>
	    <?php if($ui['sidebar_newslist_ok']){ ?>
	<div class="sidebar-news-list recommend">
		<h3 class='font-size-16 m-0'><?php echo $ui['sidebar_newslist_title'];?></h3>
		<ul class="list-group list-group-bordered m-t-10 m-b-0">
			<?php
    $cid=$data['class1'];

    $num = $ui['sidebar_newslist_num'];
    $module = "";
    $type = all;
    $order = 'no_order asc';
    $para = "";
    if(!$module){
        if(!$cid){
            $value = $m['classnow'];
        }else{
            $value = $cid;
        }
    }else{
        $value = $module;
    }

    $result = load::sys_class('label', 'new')->get('tag')->get_list($value, $num, $type, $order, $para);
    $sub = count($result);
    foreach($result as $index=>$v):
        $id = $v['id'];
        $v['sub'] = $sub;
        $v['_index']= $index;
        $v['_first']= $index==0 ? true:false;
        $v['_last']=$index==(count($result)-1)?true:false;
        $$v = $v;
?>
			<li class="list-group-item">
				<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>><?php echo $v['title'];?></a>
			</li>
			<?php endforeach;?>
		</ul>
	</div>
	<?php } ?>
	    <?php if($ui['sidebar_piclist_ok']){ ?>
	<div class='sidebar-piclist'>
		<h3 class='m-0 font-size-16 font-weight-300'><?php echo $ui['sidebar_piclist_title'];?></h3>
		<ul class='blocks-2 blocks-md-3 blocks-lg-100 m-t-20 text-xs-center imagesize sidebar-piclist-ul' data-scale='0.75117370892019'>
			<?php
    $cid=$ui['sidebar_piclist_id'];

    $num = $ui['sidebar_piclist_num'];
    $module = "";
    $type = all;
    $order = 'no_order asc';
    $para = "";
    if(!$module){
        if(!$cid){
            $value = $m['classnow'];
        }else{
            $value = $cid;
        }
    }else{
        $value = $module;
    }

    $result = load::sys_class('label', 'new')->get('tag')->get_list($value, $num, $type, $order, $para);
    $sub = count($result);
    foreach($result as $index=>$v):
        $id = $v['id'];
        $v['sub'] = $sub;
        $v['_index']= $index;
        $v['_first']= $index==0 ? true:false;
        $v['_last']=$index==(count($result)-1)?true:false;
        $$v = $v;
?>
			<li class='masonry-child'>
				<a href='<?php echo $v['url'];?>' title='<?php echo $v['title'];?>' class='block m-b-0' target='_blank'>
					<img data-original="<?php echo thumb($v['imgurl'],$v['img_x'],$v['img_y']);?>" class='cover-image' alt='<?php echo $v['title'];?>' height='100'></a>
				<h4 class='m-t-10 m-b-0 font-size-14'>
					<a href='<?php echo $v['url'];?>' title='<?php echo $v['title'];?>' target='_blank'><?php echo $v['title'];?></a>
				</h4>
				<p class='m-b-0 red-600'>价格-没有数据</p>
			</li>
			<?php endforeach;?>
		</ul>
	</div>
	<?php } ?>
</aside>
</div>
</div>
<?php } ?>
		</div>
    </div>
</main>

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