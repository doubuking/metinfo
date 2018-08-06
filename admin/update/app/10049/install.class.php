<?php
defined('IN_MET') or exit ('No permission');

load::sys_class('admin');
load::sys_class('nav.class.php');
load::sys_func('file');

//手动安装时，或者发给客户自己手动安装时请将标记 ① ② 的注释去掉

class install // //标记①
{
    private $no;    //应用NO值
    private $m_name = 'cleaner';    //应用文件
    private $ver = '1.0';    //应用版本号
    
    public function __construct() {
        global $_M;
        // //标记②
    }
 
    //安装主方法
    public function dosql() {
        global $_M;
        $where  = "m_name='{$this->m_name}'";
        if($this->sqlone('applist',$where) != false){
            return '请勿重复安装';
            exit;
        }
        do{
            $this->no = 10049;
            $stall = $this->sqlone('applist');
        } while ($stall != false);

        //开始执行程序[需要的东西可以在下面执行了]
        $this->appsql();
        //再执行自定义的一些表SQL
        //$this->zdysql();
        //安装其他
        $this->mydefault();
        
    }

    //自定义SQL
    private function zdysql() {
        global $_M;
    }
    //执行APP相关的表数据插入
    private function appsql() {
        global $_M;
        
        //注册应用
        $field  = "no='{$this->no}',ver='{$this->ver}',m_name='{$this->m_name}',m_class='index',m_action='doindex',appname='\$_M[''word''][''cleaner_name'']',info='\$_M[''word''][''cleaner_info'']',addtime='1473590889',updatetime=''";
        $this->addsql('applist',$field);
    }

    //全局默认参数
    private function mydefault() {
        global $_M;
        //安装语言包
        $cl = $this->langsql();
        
    }

    //公共查询方法
    private function sqlone($tname,$where = '') {
        global $_M;
        $table  = $_M['table'][$tname];
        if(!$where){
            $where  = "no='{$this->no}'";
        }
        return DB::get_one("select * from {$table} where {$where}");
    }

    //公共查询方法
    private function sqlall($tname,$where = '') {
        global $_M;
        $table  = $_M['table'][$tname];
        if(!$where){
            $where  = "no='{$this->no}'";
        }
        return DB::get_all("select * from {$table} where {$where}");
    }

    //公共写入方法
    private function addsql($tname,$field = '') {
        global $_M;
        $table  = $_M['table'][$tname];
        DB::query("INSERT INTO {$table} SET {$field}");
    }

    #云网开发工具生成
    private function langsql() {
        global $_M;
        $file  = PATH_ALL_APP.$this->m_name.'/lang/'.$this->m_name.'.sql';
        $_sql = file_get_contents($file);
        $_arr = explode("#;#;", $_sql);
        foreach ($_arr as $val) {
            $val    = str_replace("{\$_M['config']['tablepre']}", $_M['config']['tablepre'], $val);
            $val    = str_replace("{\$this->no}", $this->no, $val);
            DB::query($val);
        }
    }

}
?>