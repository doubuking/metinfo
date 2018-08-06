<?php
defined('IN_MET') or exit ('No permission');
load::sys_class('admin');
class install {

    public function __construct()
    {
        $this->appNo=10001;
        $this->new_ver='1.0.1';
    }
    /**
     * 更新版本号
     * @param  [type] $ver [版本号]
     * @return [type]      []
     */
    public function update($ver) {
        global $_M;
        $no = '10001';
        $query = "UPDATE {$_M['table']['applist']} SET ver = '{$ver}' WHERE m_name = 'website'";
        DB::query($query);
    }

    /**
     * 安装应用
     * @return [type] [description]
     */
    public function dosql() {

        global $_M;
        $my = DB::get_one("SELECT * FROM {$_M['table']['applist']} WHERE m_name = 'website'");

        if($my) {

           $this->update($this->new_ver);
        } else {
            // 多语言
            foreach ($_M['langlist']['admin'] as $key => $value) {

                $query = "INSERT INTO `{$_M['table']['config']}` (`id`, `name`, `value`, `mobile_value`, `columnid`, `flashid`, `lang`) VALUES
                ('', 'met_website', '0', '0', '0','0','{$value['mark']}');";
                DB::query($query);// 增加配置信息

                $query = "INSERT INTO `{$_M['table']['config']}` (`id`, `name`, `value`, `mobile_value`, `columnid`, `flashid`, `lang`) VALUES
                ('', 'met_website_content', '网站建设中……', '网站建设中……', '0','0','{$value['mark']}');";
                DB::query($query);// 插入默认内容
            }

            $time = time();
            $query = "INSERT INTO `{$_M['table']['applist']}` (`id`, `no`, `ver`, `m_name`, `m_class`, `m_action`, `appname`, `info`, `addtime`, `updatetime`) VALUES
            ('', {$this->appNo}, '{$this->new_ver}', 'website', 'website', 'doindex', '网站关闭', '让网站前台页面显示“网站正在建设中”或自定义文字、图片，网站还没有配置完成或网站维护期间可以用到该功能。', {$time}, {$time});";
            DB::query($query);  //应用注册

            //插入插件
            $query = "INSERT INTO `{$_M['table']['app_plugin']}` (`id`, `no_order`, `no`, `m_name`, `m_action`, `effect`) VALUES
            ('', 0, {$this->appNo}, 'website', 'doweb', 1);";
            DB::query($query);
        }
    }
}
?>