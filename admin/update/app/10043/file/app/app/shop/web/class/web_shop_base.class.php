<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::sys_class('web');
/**
 * 产品模块
 */

class web_shop_base extends web {

    public function __construct() {
        global $_M;
        parent::__construct();
        $this->de_construct();
        $this->get_engine();
        $this->check();
        $query = "SELECT * FROM {$_M['table']['column']} WHERE module='3' AND lang='{$_M['lang']}'";
        $_M['config']['shop_column']=DB::get_one($query);
        $_M['config']['app_no']=10043;
        $member = load::mod_class('column/column_database','new')->get_column_by_foldername('member');
        $this->add_input('classnow',$this->input_class($member[0]['id']));
    }

    public function de_construct() {
        global $_M;
        $_M['config_shop']['class1'] = $_M['form']['class1'];
        //$_M['config']['met_webhtm'] = 0;
        if($_M['form']['no_order'] || $_M['form']['searchlist']){
            //$_M['config']['met_pseudo'] = 0;
        }
        $shopuser =  load::own_class('web/class/web_shop_user', 'new')->get_user_by_username($_M['user']['username']);
        if($_M['user']['username']){
            $_M['user']['balance'] = $shopuser['balance'];
            $_M['user']['balance_str'] = load::own_class('web/class/web_func', 'new')->price_str($_M['user']['balance']);
        }
        $this->seo();
        $this->tem_dir();
        $this->load_config($_M['lang']);
    }

    public function seo() {
        global $_M;

        $php_self = explode('/', PHP_SELF);
        if($php_self[count($php_self)-2] == 'shop'){
            $_M['config']['met_title'] = $_M['config']['met_webname']."-{$_M['word']['app_shop_online']}";
        }
    }

    public function url() {
        load::own_class('web/class/web_shop_plugin', 'new')->url();
    }

    public function user_login_info() {
        return load::own_class('web/class/web_shop_plugin', 'new')->user_login_info();
    }
    protected function template($path){
        global $_M,$metinfover,$shop_tem;
        $flag=$_M['custom_template']['sys_content']?1:0;
        // 路径提取优化（新商城框架v3）
        $dir = explode('/',$path);
        $postion = $dir[0];
        $file = substr(strstr($path, '/'),1);
        if ($postion == 'own') $sys_content = PATH_OWN_FILE."templates/{$file}.php";
        if ($postion == 'ui') {
            if(file_exists(PATH_SYS."include/public/ui/web/{$file}.php")){
                return PATH_SYS."include/public/ui/web/{$file}.php";
            }else{
                if($metinfover){
                    return PATH_WEB."public/ui/{$metinfover}/{$file}.php";
                }else{
                    return PATH_WEB."public/ui/met/{$file}.html";
                }
            }
        }
        if($postion == 'tem'){
            if(($file == 'shop_showproduct' || $file == 'shop_product') && ($metinfover == 'v2' || ($_M['config']['metinfover'] == 'v1' && file_exists(PATH_TEM.'min/config.php')))){
                $this->get_engine();
                $sys_content = PATH_SHOP_TEM."{$file}.php";
            }
            !file_exists($sys_content) && $sys_content = PATH_APP_FILE."web/templates/met/{$file}.php";
            !file_exists($sys_content) && $sys_content = $this->template("ui/{$file}");
        }
        $_M['custom_template']['sys_content']=$sys_content;
        if($flag){
            return $sys_content;
        }else{
            return $this->template('ui/compatible');
        }
    }
    protected function get_engine(){
        global $_M;
        $str = file_get_contents(PATH_WEB."templates/".$_M['config']['met_skin_user'].'/metinfo.inc.php');
        if(stristr($str, 'metinfover')){
            if(stristr($str, 'v1')) $_M['config']['metinfover'] = 'v1';
            if(stristr($str, 'v2')) $_M['config']['metinfover'] = 'v2';// 增加$metinfover判断（新模板框架v2）
        }else{
            $_M['config']['metinfover'] = '';
        }
    }

    protected function tem_dir(){
        global $_M;
        $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
        $uachar = "/(nokia|sony|ericsson|mot|samsung|sgh|lg|philips|panasonic|alcatel|lenovo|cldc|midp|mobile|wap|Android|ucweb)/i";
        if($ua != '' && preg_match($uachar, $ua) && $_M['config']['met_wap']){// 只有手机端开启了手机模板才调用手机模板
            $_M['config']['met_skin_user'] = $_M['config']['wap_skin_user'];
        }else{
            $_M['config']['met_skin_user'] = $_M['config']['met_skin_user'];
        }
        //$_M['config']['met_skin_user'] = 'shopv2';
        define('PATH_SHOP_TEM', PATH_WEB."templates/".$_M['config']['met_skin_user'].'/');//模板根目录
    }

    protected function load_config($lang) {
        global $_M;
        $query = "SELECT * FROM {$_M['config']['tablepre']}config WHERE lang='{$lang}'";
        $result = DB::query($query);
        while ($list_config = DB::fetch_array($result)) {
            //$list_config['value'] = str_replace('"', '&#34;', str_replace("'", '&#39;',$list_config['value']));
            $list_config['value'] = str_replace('&#34;', '"', str_replace("&#39;", "'",$list_config['value']));
            $_M['config'][$list_config['name']] = $list_config['value'];
        }
    }

    public function response($url,$msg='',$status=0) {
        global $_M;
        $info = array();
        $info['status'] = $status;
        $info['url'] = $url;
        $info['msg'] = $msg;
        echo jsonencode($info);die;
    }

    public function check() {
        global $_M;
        $user = $this->get_login_user_info();
        if(!$user){
            okinfo($_M['url']['site'].'member/login.php?gourl='.$_M['form']['gourl']);
        }
    }
}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>