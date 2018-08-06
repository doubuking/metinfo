<?php
defined('IN_MET') or exit ('No permission');

load::sys_class('admin');

class index extends admin {
    public function __construct() {
        global $_M;
        parent::__construct();
    }

    //应用后台入口
    public function doindex() {
        global $_M;
        require $this->template('own/index');
    }
    
    //处理
    public function dohandle(){
        global $_M;
        load::sys_func('file');
        $str    = deldir(PATH_WEB.'cache/',1)?$_M['word']['cleaner_yw002']:$_M['word']['cleaner_yw003'];
        turnover($_M['url']['own_form'].'a=doindex',$str);
    }
}
?>