<?php
defined('IN_MET') or exit('No permission');

class uninstall{

    /**
     * 卸载应用
     * @return [type] [description]
     */
    public function dodel(){
        global $_M;
        $no = '10001';
        $delApp = "DELETE FROM {$_M['table']['applist']} WHERE m_name = 'website'"; 
        $delplugin = "DELETE FROM {$_M['table']['app_plugin']} WHERE m_name = 'website'";
        $delconfig = "DELETE FROM {$_M['table']['config']} WHERE name='met_website' OR name = 'met_website_content'";
        // 删除老版本应用数据
        $delold = "DELETE FROM {$_M['table']['app']} WHERE file = 'website'";    
        DB::query($delApp);
        DB::query($delplugin);
        DB::query($delconfig);
        DB::query($delold);
        load::sys_func('file');
        deldir(PATH_WEB.'/app/app/website');
         turnover("{$_M['url']['own_form']}a=doindex","卸载成功");//提示信息
    }
}
?>