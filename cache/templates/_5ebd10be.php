<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
$met_title=$_M['word']['pay_wxpay'];
$_M['pay_nav'][0]['active']='active';
?>
<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
// 判断来源页面是否有pageset=1 ，如果有而本页url没有pageset=1，则本页加上pageset=1跳转
if(strpos($_SERVER['HTTP_REFERER'], 'pageset=1')!==false && !$_M['form']['pageset'] && !$_M['form']['nopageset'] && strpos($_SERVER['HTTP_REFERER'], 'nopageset=1')===false){
    echo '<script>
        var newurl=location.href;
        if(location.search!=""){
            newurl+="&pageset=1";
        }else{
            newurl+="?pageset=1";
        }
        location.href=newurl;
    </script>';
    die;
}
if($_M['word']['metinfo']){
    $met_title.='-'.$_M['word']['metinfo'];
}
$met_file_version=str_replace('.','',$_M['config']['metcms_v']).$_M['config']['met_patch'];
?>
<!DOCTYPE HTML>
<html class="<?php echo $_M['html_class'];?>">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta name="robots" content="noindex,nofllow">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0,minimal-ui">
<meta name="format-detection" content="telephone=no">
<title><?php echo $met_title;?></title>
<meta name="generator" content="MetInfo <?php echo $_M['config']['metcms_v'];?>" data-variable="<?php echo $_M['url']['site'];?>|<?php echo $_M['lang'];?>|<?php echo $_M['config']['met_skin_user'];?>||||" data-m_type="<?php echo $_M['config']['m_type'];?>">
<link href="<?php echo $_M['url']['site'];?>favicon.ico" rel="shortcut icon" type="image/x-icon">
<link href="<?php echo $_M['url']['site'];?>public/ui/v2/static/css/basic_admin.css?<?php echo $met_file_version;?>" rel='stylesheet' type='text/css'>
<?php if(file_exists(PATH_OWN_FILE."templates/css/metinfo.css")){ ?>
<link href="<?php echo $_M['url']['own_tem'];?>css/metinfo.css?<?php echo $met_file_version;?>" rel='stylesheet' type='text/css'>
<?php } ?>
<!--['if lte IE 9']>
<script src="<?php echo $_M['url']['site'];?>public/ui/v2/static/js/lteie9.js"></script>
<!['endif']-->
</head>
<!--['if lte IE 8']>
<div class="text-xs-center m-b-0 bg-blue-grey-100 alert">
    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
        <span aria-hidden="true">×</span>
    </button>
    <?php echo $_M['word']['browserupdatetips'];?>
</div>
<!['endif']-->
<body class="<?php echo $_M['body_class'];?>">
<?php
if(!$head_no){
    $privilege = background_privilege();
    if(!$_M['form']['pageset']){
        $met_agents_metmsg=$_M['config']['met_agents_metmsg']?'':'hidden';
        $msecount = DB::counter($_M['table']['infoprompt'], "WHERE lang='".$_M['lang']."' and see_ok='0'", "*");
        $navigation=$privilege['navigation'];
        $arrlanguage=explode('|', $navigation);
        if(in_array('metinfo',$arrlanguage) || in_array('1002',$arrlanguage)){
            $langprivelage=1;
        }else{
            $langprivelage=0;
        }
        if($_M['form']['iframeurl']){
            function get($str){
                $data = array();
                $parameter = explode('&',end(explode('?',$str)));
                foreach($parameter as $val){
                    $tmp = explode('=',$val);
                    $data[$tmp['0']] = $tmp['1'];
                }
                return $data;
            }
            $str = $_M['form']['iframeurl'];
            $data = get($str);
            $_M['form']['anyid'] = $data['anyid'];
            $_M['form']['n'] = $data['n'];
        }
        $lang_name=$_M['langlist']['web'][$_M['lang']]['name'];
        $adminnav = get_adminnav();
        $adminapp = load::mod_class('myapp/class/getapp', 'new');
        $adminapplist = $adminapp->get_app();
        if($_M['form']['anyid'] == '44'){
            foreach ($adminapplist as $key => $val) {
                if ($val['m_name'] == $_M['form']['n']) {
                    $nav_3 = $val;
                    $nav_3 ['name'] = get_word($val['appname']);
                    break;
                }
            }
            if(!$nav_3) $nav_3 = $adminnav[$_M['form']['anyid']];
        } else {
            $nav_3 = $adminnav[$_M['form']['anyid']];
        }
        if(!$_M['form']['anyid']) $weizhi = '<li class="breadcrumb-item">'.$_M['word']['background_page'].'</li>';
        if($adminnav[$adminnav[$_M['form']['anyid']]['bigclass']]['name']){
            if($_M['form']['anyid'] == 44 && M_NAME!='myapp') $adminnav[$adminnav[$_M['form']['anyid']]['bigclass']]['name'] = '<a href="'.$adminnav['44']['url'].'">'.$adminnav['44']['name'].'</a>';
            $fenlei='<li class="breadcrumb-item">'.$adminnav[$adminnav[$_M['form']['anyid']]['bigclass']]['name'].'</li>';
        }
        $weizhi = '<li class="breadcrumb-item"><a href="'.$nav_3['url'].'">'.$nav_3['name'].'</a></li>';
?>
<header class="metadmin-haed navbar h-50">
    <div class="container-fluid h-100p">
        <div class="h-100p vertical-align pull-xs-left hidden-md-down">
            <div class="breadcrumb m-b-0 p-0 vertical-align-middle">
                <li class='breadcrumb-item'><?php echo $lang_name;?></li>
                <?php echo $fenlei;?>
                <?php echo $weizhi;?>
            </div>
        </div>
        <div class="metadmin-haed-right pull-xs-right h-100p vertical-align">
            <div class="vertical-align-middle">
                <?php
                if($_M['url']['help_tutorials_helpid'] && $_M['langset']=='cn'){
                    $_M['url']['help_tutorials_url'].=$_M['url']['help_tutorials_helpid'];
                ?>
                <div class="btn-group" hidden>
                    <a href='<?php echo $_M['url']['help_tutorials_url'];?>' target="_blank" class="btn btn-warning">
                        <i class="fa fa-question"></i>
                        <span class="hidden-sm-down"><?php echo $_M['word']['help1'];?></span>
                    </a>
                </div>
                <?php
                }
                $power = admin_information();
                if($power['admin_group'] == '10000' || $power['admin_group'] == '3'){
                ?>
                <div class="btn-group" <?php echo $met_agents_metmsg;?>>
                    <button class="btn btn-default" data-toggle="modal" data-target="#functionEncy">
                        <i class="fa fa-pie-chart"></i>
                        <span class="hidden-sm-down"><?php echo $_M['word']['funcCollection'];?></span>
                    </button>
                </div>
                <?php } ?>
                <div class="btn-group" <?php echo $met_agents_metmsg;?>>
                    <a href="https://www.metinfo.cn/bangzhu/index.php?ver=metcms" class="btn btn-default" target="_blank">
                        <i class="fa fa-life-ring"></i>
                        <span class="hidden-sm-down"><?php echo $_M['word']['indexbbs'];?></span>
                    </a>
                </div>
                <div class="btn-group" <?php echo $met_agents_metmsg;?>>
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-bookmark"></i>
                        <span class="hidden-sm-down"><?php echo $_M['word']['indexcode'];?></span>
                    </button>
                    <ul class="dropdown-menu animate animate-reverse dropdown-menu-right text-xs-center">
                        <?php
                        if($_M['config']['met_agents_type'] < 2) {
                        $auth = load::mod_class('system/class/auth', 'new');
                        $otherinfoauth = $auth->have_auth();
                            if(!$otherinfoauth) {
                        ?>
                        <li class="dropdown-item">
                            <a href="https://www.metinfo.cn/web/product.htm" target="_blank" class='block'><?php echo $_M['word']['sys_authorization2'];?></a>
                        </li>
                        <li class="dropdown-item">
                            <a class="btn btn-primary" href='<?php echo $_M['url']['adminurl'];?>&n=system&c=authcode&a=doindex'><?php echo $_M['word']['sys_authorization1'];?></a>
                        </li>
                        <?php }else{ ?>
                        <li class="dropdown-item">
                            <button class="btn btn-info" type="submit"><?php echo $otherinfoauth['info1'];?></button>
                        </li>
                        <li class="dropdown-item">
                            <a class="nobo block" href="<?php echo $_M['url']['adminurl'];?>&n=system&c=authcode&a=doindex"><?php echo $_M['word']['entry_authorization'];?></a>
                        </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="btn-group">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-globe"></i>
                        <span class="hidden-sm-down"><?php echo $lang_name;?></span>
                    </button>
                    <ul class="dropdown-menu animate animate-reverse dropdown-menu-right" role="menu">
                        <?php
                        foreach($_M['user']['langok'] as $key=>$val){
                        	$url_now ='http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
                        	if(!strstr($url_now, "lang=")) {
                        	    $val['url'] = $_M['url']['site_admin']."index.php?lang=".$val['mark'];
                        	} else {
                        	    $val['url'] = str_replace(array("lang=".$_M['lang'], "lang%3D".$_M['lang']), array("lang=".$val['mark'], "lang%3D".$val['mark']), $url_now);
                        	}
                        	if(strstr($_M['config']['met_weburl'],'https')){
                        	    $val['url']=str_replace('http','https',$val['url']);
                        	}
                        ?>
                        <li class="dropdown-item"><a href="<?php echo $val['url'];?>&switch=1" class='block'><?php echo $val['name'];?></a></li>
                        <?php } ?>
                        <li class="dropdown-item">
                            <a href='<?php echo $url['adminurl'];?>anyid=10&n=language&c=language_admin&a=dolangadd' class="btn btn-success"><i class="fa fa-plus"></i><?php echo $_M['word']['added'];?><?php echo $_M['word']['langweb'];?></a>
                        </li>
                    </ul>
                </div>
                <?php if(!$_M['config']['met_agents_switch']){ ?>
                <div class="btn-group">
                    <a class="btn btn-default" href='<?php echo $_M['url']['adminurl'];?>n=system&c=news&a=doindex'>
                        <i class="fa fa-bell-o"></i>
                        <span class="tag tag-pill up tag-danger bg-red-600"><?php echo $msecount;?></span>
                    </a>
                </div>
                <?php } ?>
                <div class="btn-group">
                    <button class="btn btn-default dropdown-toggle" type="button" id="adminuser" data-toggle="dropdown" aria-expanded="true">
                        <?php echo $_M['user']['admin_name'];?>
                    </button>
                    <ul class="dropdown-menu animate animate-reverse dropdown-menu-right" role="menu" aria-labelledby="adminuser">
                        <li class="dropdown-item"><a href="<?php echo $_M['url']['adminurl'];?>n=admin&c=admin_admin&a=doeditor_info"><?php echo $_M['word']['modify_information'];?></a></li>
                        <li class="dropdown-item"><a target="_top" href="<?php echo $_M['url']['adminurl'];?>n=login&c=login&a=dologinout"><?php echo $_M['word']['indexloginout'];?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="modal fade" id="functionEncy" tabindex="-1" role="dialog" aria-labelledby="functionEncy">
    <div class="modal-dialog modal-lg modal-primary" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><?php echo $_M['word']['funcCollection'];?></h4>
            </div>
            <div class="modal-body">
				<div class="function_ency-content text-xs-center">
    <div class="list-group clearfix">
        <div class="list-group-item text-xs-left bg-grey-200"><?php echo $_M['word']['websiteSet'];?></div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=29&n=manage&c=index&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['indexcontent'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=25&n=column&c=index&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['columumanage'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=29&n=manage&c=index&a=domodule&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['systemModule'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=18&n=theme&c=theme&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['appearanceSetting'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=57&n=webset&c=webset&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['basicInfoSet'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=10&n=language&c=language_admin&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['multilingual'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=57&n=webset&c=webset&a=doemailset&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['mailSetting'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=57&n=webset&c=webset&a=dothirdparty&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['thirdCode'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=11&n=imgmanager&c=imgmanager&a=dowatermark&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['watermarkThumbnail'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=71&n=online&c=online&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['customerService'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=18&n=banner&c=banner_admin&a=domanage&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['indexflash'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=29&n=recycle&c=recycle&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['recycleBin'];?></a>
        </div>
    </div>
    <div class="list-group clearfix">
        <div class="list-group-item text-xs-left bg-grey-200"><?php echo $_M['word']['securityTools'];?></div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=75&n=update&c=about&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['checkupdate'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=12&n=safe&c=index&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['safety_efficiency'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=13&n=databack&c=index&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['data_processing'];?></a>
        </div>
    </div>
    <div class="list-group clearfix">
        <div class="list-group-item text-xs-left bg-grey-200"><?php echo $_M['word']['searchEngineOptimization'];?></div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=37&n=seo&c=seo&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['seoSetting'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=37&n=seo&c=seo&a=dourl&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['pseudostatic'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=&n=html&c=html&a=doset&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['indexhtmset'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=37&n=seo&c=seo&a=doanchor&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['anchor_text'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=37&n=seo&c=seo&a=dositemap&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['htmsitemap'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=39&n=link&c=link_admin&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['indexlink'];?></a>
        </div>
    </div>
    <div class="list-group clearfix">
        <div class="list-group-item text-xs-left bg-grey-200"><?php echo $_M['word']['indexuser'];?></div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=73&n=user&c=admin_user&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['memberist'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=73&n=user&c=admin_set&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['memberfunc'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=73&n=user&c=admin_set&a=doopen&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['thirdPartyLogin'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=47&n=admin&c=admin_admin&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['metadmin'];?></a>
        </div>
    </div>
    <div class="list-group clearfix">
        <div class="list-group-item text-xs-left bg-grey-200"><?php echo $_M['word']['appAndPlugin'];?></div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=65&n=appstore&c=appstore&a=doappstore&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['metShop'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=44&n=myapp&c=myapp&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['myapp'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>n=system&c=authcode&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['commercialAuthorizationCode'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="http://help.metinfo.cn" target="_blank" class="block"><?php echo $_M['word']['indexbbs'];?></a>
        </div>
    </div>
    <div class="list-group clearfix m-b-0">
        <div class="list-group-item text-xs-left bg-grey-200"><?php echo $_M['word']['systips13'];?></div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['site_admin'];?>app/wap/wap.php?anyid=77&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['mobileSetting'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=70&n=theme&c=theme&a=doindex&mobile=1&nopageset=1" target="_blank"  target="_blank" class="block"><?php echo $_M['word']['mobileVersion'];?></a>
        </div>
    </div>
</div>
			</div>
        	<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $_M['word']['close'];?></button>
            </div>
    	</div>
	</div>
</div>
<?php }else if(M_ACTION=='dofunction_ency'){ ?>
<div class="function_ency-content text-xs-center">
    <div class="list-group clearfix">
        <div class="list-group-item text-xs-left bg-grey-200"><?php echo $_M['word']['websiteSet'];?></div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=29&n=manage&c=index&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['indexcontent'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=25&n=column&c=index&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['columumanage'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=29&n=manage&c=index&a=domodule&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['systemModule'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=18&n=theme&c=theme&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['appearanceSetting'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=57&n=webset&c=webset&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['basicInfoSet'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=10&n=language&c=language_admin&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['multilingual'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=57&n=webset&c=webset&a=doemailset&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['mailSetting'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=57&n=webset&c=webset&a=dothirdparty&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['thirdCode'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=11&n=imgmanager&c=imgmanager&a=dowatermark&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['watermarkThumbnail'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=71&n=online&c=online&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['customerService'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=18&n=banner&c=banner_admin&a=domanage&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['indexflash'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=29&n=recycle&c=recycle&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['recycleBin'];?></a>
        </div>
    </div>
    <div class="list-group clearfix">
        <div class="list-group-item text-xs-left bg-grey-200"><?php echo $_M['word']['securityTools'];?></div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=75&n=update&c=about&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['checkupdate'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=12&n=safe&c=index&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['safety_efficiency'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=13&n=databack&c=index&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['data_processing'];?></a>
        </div>
    </div>
    <div class="list-group clearfix">
        <div class="list-group-item text-xs-left bg-grey-200"><?php echo $_M['word']['searchEngineOptimization'];?></div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=37&n=seo&c=seo&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['seoSetting'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=37&n=seo&c=seo&a=dourl&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['pseudostatic'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=&n=html&c=html&a=doset&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['indexhtmset'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=37&n=seo&c=seo&a=doanchor&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['anchor_text'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=37&n=seo&c=seo&a=dositemap&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['htmsitemap'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=39&n=link&c=link_admin&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['indexlink'];?></a>
        </div>
    </div>
    <div class="list-group clearfix">
        <div class="list-group-item text-xs-left bg-grey-200"><?php echo $_M['word']['indexuser'];?></div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=73&n=user&c=admin_user&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['memberist'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=73&n=user&c=admin_set&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['memberfunc'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=73&n=user&c=admin_set&a=doopen&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['thirdPartyLogin'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=47&n=admin&c=admin_admin&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['metadmin'];?></a>
        </div>
    </div>
    <div class="list-group clearfix">
        <div class="list-group-item text-xs-left bg-grey-200"><?php echo $_M['word']['appAndPlugin'];?></div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=65&n=appstore&c=appstore&a=doappstore&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['metShop'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=44&n=myapp&c=myapp&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['myapp'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>n=system&c=authcode&a=doindex&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['commercialAuthorizationCode'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="http://help.metinfo.cn" target="_blank" class="block"><?php echo $_M['word']['indexbbs'];?></a>
        </div>
    </div>
    <div class="list-group clearfix m-b-0">
        <div class="list-group-item text-xs-left bg-grey-200"><?php echo $_M['word']['systips13'];?></div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['site_admin'];?>app/wap/wap.php?anyid=77&nopageset=1" target="_blank" class="block"><?php echo $_M['word']['mobileSetting'];?></a>
        </div>
        <div class="list-group-item col-xs-4 col-sm-3 col-md-2">
            <a href="<?php echo $_M['url']['adminurl'];?>anyid=70&n=theme&c=theme&a=doindex&mobile=1&nopageset=1" target="_blank"  target="_blank" class="block"><?php echo $_M['word']['mobileVersion'];?></a>
        </div>
    </div>
</div>
<?php
    }
    if($_M['form']['pageset'] && $_M['url']['help_tutorials_helpid'] && $_M['langset']=='cn'){
        $_M['url']['help_tutorials_url'].=$_M['url']['help_tutorials_helpid'];
?>
<a href='<?php echo $_M['url']['help_tutorials_url'];?>' target="_blank" class="btn btn-icon btn-warning btn-squared btn-xs met-help-tutorials" hidden>
    <i class="fa fa-question"></i>
    <span class="hidden-sm-down"><?php echo $_M['word']['help1'];?></span>
</a>
<?php
    }
    if(M_ACTION!='dofunction_ency'){
?>
<div class="metadmin-main container-fluid m-y-10">
    <?php
        $navlist = nav::get_nav();
        if($navlist){
    ?>
    <ul class="stat-list nav nav-tabs m-b-10 border-none">
        <?php
            foreach($navlist as $key => $val){
                $val['classnow']=$val['classnow']?'active':'';
        ?>
        <li class="nav-item"><a class='nav-link <?php echo $val['classnow'];?>' title="<?php echo $val['title'];?>" href="<?php echo $val['url'];?>" target="<?php echo $val['target'];?>"><?php echo $val['title'];?></a></li>
        <?php } ?>
    </ul>
<?php
        }
    }
}
?>
<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (https://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
?>
<ul class="nav nav-tabs nav-tabs-line m-b-10">
	        <?php
            $sub = count($_M['pay_nav']);
            $num = 30;
            if(!is_array($_M['pay_nav'])){
                $_M['pay_nav'] = explode('|',$_M['pay_nav']);
            }
            foreach ($_M['pay_nav'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($_M['pay_nav'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $v = $val;
            ?>
	<li class='nav-item'><a class="nav-link <?php echo $v['active'];?>" href="<?php echo $v['url'];?>"><?php echo $v['name'];?></a></li>
	<?php }?>
</ul>
<div class="alert alert-danger"><?php echo $word['pay_tips2'];?></div>
<form method="POST" action="<?php echo $_M[url][own_form];?>a=dosavewxpay&type=<?php echo $data['paytype'];?>" target="_self" enctype="multipart/form-data">
    <div class="metadmin-fmbx">
        <h3 class="example-title"><?php echo $word['pay_basiccongi'];?></h3>
        <dl>
            <dt><label class='form-control-label'><?php echo $word['pay_wxapp_id'];?></label></dt>
            <dd class="form-group">
                <input type="text" name="app_id" class="form-control m-r-10" value="<?php echo $data['app_id'];?>">
                <span class="text-help"><?php echo $word['pay_wxtips6'];?></span>
            </dd>
        </dl>
        <dl>
            <dt><label class='form-control-label'><?php echo $word['pay_wxapp_mchid'];?></label></dt>
            <dd class="form-group">
                <input type="text" name="app_mchid" class="form-control m-r-10" value="<?php echo $data['app_mchid'];?>">
                <span class="text-help"><?php echo $word['pay_wxtips1'];?></span>
            </dd>
        </dl>
        <dl>
            <dt><label class='form-control-label'><?php echo $word['pay_wxapp_key'];?></label></dt>
            <dd class="form-group">
                <input type="text" name="app_key" class="form-control m-r-10" value="<?php echo $data['app_key'];?>">
                <span class="text-help"><?php echo $word['pay_wxtips2'];?></span>
            </dd>
        </dl>
        <dl>
            <dt><label class='form-control-label'><?php echo $word['pay_wxapp_secert'];?></label></dt>
            <dd class="form-group">
                <input type="text" name="app_secert" class="form-control m-r-10" value="<?php echo $data['app_secert'];?>">
                <span class="text-help"><?php echo $word['pay_wxtips3'];?></span>
            </dd>
        </dl>
        <dl>
            <dd class="alert dark alert-primary radius0">
                <?php echo $word['pay_wxtips4'];?> <a href="https://pay.weixin.qq.com/wiki/doc/api/jsapi.php?chapter=7_3" title="<?php echo $word['pay_weixin_help_title'];?>" target="_blank"><?php echo $word['pay_course'];?></a><?php echo $word['pay_wxtips5'];?>"<?php echo $_M['url']['site'];?>shop/，<?php echo $_M['url']['site'];?>pay/"
            </dd>
        </dl>
        <!--
        <h3 class="v52fmbx_hr">证书路径设置</h3>
        <dl>
            <dd class="ftype_description">
                证书路径,注意应该填写绝对路径（仅退款、撤销订单时需要，可登录商户平台下载，API证书下载地址：https://pay.weixin.qq.com/index.php/account/api_cert，下载之前需要安装商户操作证书）<br />
                上传证书前，请先至“安全=>安全与效率”中添加“pem”为“允许上传的文件格式”
            </dd>
        </dl>
        <dl>
            <dt>证书</dt>
            <dd class="ftype_upload">
                <input name="apiclient_cert" type="text" data-upload-type="doupfile" value="<?php echo $data['apiclient_cert'];?>"/>
            </dd>
        </dl>
        <dl>
            <dt>证书密钥</dt>
            <dd class="ftype_upload">
                <input name="apiclient_key" type="text" data-upload-type="doupfile" value="<?php echo $data['apiclient_key'];?>"/>
            </dd>
        </dl>
        <h3 class="v52fmbx_hr">curl代理设置</h3>
        <dl>
            <dd class="ftype_description">
                这里设置代理机器，只有需要代理的时候才设置，不需要代理，请设置为0.0.0.0和0.本例程通过curl使用HTTP POST方法，此处可修改代理服务器，默认CURL_PROXY_HOST=0.0.0.0和CURL_PROXY_PORT=0，此时不开启代理（如有需要才设置）
            </dd>
        </dl>
        <dl>
            <dt>代理主机</dt>
            <dd class="form-group">
                <input type="text" name="proxy_host" value="<?php echo $data['proxy_host'];?>">
            </dd>
        </dl>
        <dl>
            <dt>代理端口</dt>
            <dd class="form-group">
                <input type="text" name="proxy_port" value="<?php echo $data['proxy_port'];?>">
            </dd>
        </dl>
        <h3 class="v52fmbx_hr">上报信息配置</h3>
        <dl>
            <dd class="ftype_description">
                接口调用上报等级，默认紧错误上报（注意：上报超时间为【1s】，上报无论成败【永不抛出异常】，不会影响接口调用流程），开启上报之后，方便微信监控请求调用的质量，建议至少开启错误上报。
            </dd>
        </dl>
        <dl>
            <dt>上报等级</dt>
            <dd class="ftype_radio ftype_transverse">
                    <label><input name="report_lev" type="radio" value="0" data-checked="<?php echo $data['report_lev'];?>">关闭上报</label>
                    <label><input name="report_lev" type="radio" value="1">仅错误出错上报</label>
                    <label><input name="report_lev" type="radio" value="2">全量上报</label>
            </dd>
        </dl>
        -->
        <dl>
            <dt></dt>
            <dd>
                <input type="submit" value="<?php echo $word['Submit'];?>" class="btn btn-primary">
            </dd>
        </dl>
    </div>
</form>
<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
if(!$foot_no){
	$foot = str_replace('$metcms_v',$_M['config']['metcms_v'], $_M['config']['met_agents_copyright_foot']);
	$foot = str_replace('$m_now_year',date('Y',time()), $foot);
?>
</div>
<footer class="metadmin-foot container-fluid m-t-10 grey-600"><?php echo $foot;?></footer>
<?php } ?>
<button type="button" class="btn btn-icon btn-primary btn-squared met-scroll-top" hidden><i class="icon wb-chevron-up" aria-hidden="true"></i></button>
</body>
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
	"try_again":"<?php echo $_M['word']['try_again'];?>"
};
MET['langset']="<?php echo $_M['langset'];?>";
MET['anyid']="<?php echo $_M['form']['anyid'];?>";
MET['met_editor']="<?php echo $_M['config']['met_editor'];?>";
MET['met_keywords']="<?php echo $_M['config']['met_keywords'];?>";
MET['url']['basepath']="<?php echo $_M['url']['site_admin'];?>";
MET['url']['ui']="<?php echo $_M['url']['ui'];?>";
MET['url']['own_form']="<?php echo $_M['url']['own_form'];?>";
MET['url']['own_name']="<?php echo $_M['url']['own_name'];?>";
MET['url']['own']="<?php echo $_M['url']['own'];?>";
MET['url']['own_tem']="<?php echo $_M['url']['own_tem'];?>";
MET['url']['api']="<?php echo $_M['url']['api'];?>";
</script>
<script src="<?php echo $_M['url']['site'];?>public/ui/v2/static/js/basic_admin.js?<?php echo $met_file_version;?>"></script>
<script src="<?php echo $_M['url']['site'];?>cache/lang_json_admin_<?php echo $_M['langset'];?>.js?<?php echo $met_file_version;?>"></script>
<?php if(file_exists(PATH_OWN_FILE."templates/js/own.js")){ ?>
<script src="<?php echo $_M['url']['own_tem'];?>js/own.js?<?php echo $met_file_version;?>"></script>
<?php } ?>
</html>