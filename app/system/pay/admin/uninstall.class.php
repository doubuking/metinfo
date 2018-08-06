<?php
defined('IN_MET') or exit ('No permission');

load::sys_func('file');

class uninstall{

    public function dodel() {
        global $_M;
        $no = 10080;

        /**
         * 删数据
         */
        $query = "DELETE FROM {$_M['table']['app_plugin']} WHERE no='{$no}'";
        DB::query($query);
        $query = "DELETE FROM {$_M['table']['applist']} WHERE no='{$no}'";
        DB::query($query);
        $query = "DELETE FROM {$_M['table']['language']} WHERE app='{$no}'";
        DB::query($query);
        /*$query = "DELETE FROM {$_M['table']['admin_column']} WHERE name='lang_payapi'";
        DB::query($query);*/
        $query = "DELETE FROM {$_M['table']['ifmember_left']} WHERE no='{$no}'";
        DB::query($query);
        $query = "DELETE FROM {$_M['table']['app_config']} WHERE no='{$no}'";
        DB::query($query);

        /**
         * 删表
         */
        $query = "DROP TABLE {$_M['table']['pay_config']}";
        DB::query($query);
        $query = "DROP TABLE {$_M['table']['pay_api']}";
        DB::query($query);
        $query = "DROP TABLE {$_M['table']['pay_order']}";
        DB::query($query);
        $query = "DROP TABLE {$_M['table']['pay_finance']}";
        DB::query($query);
        $query = "DROP TABLE {$_M['table']['pay_balance']}";
        DB::query($query);

        /*
		 *删除、注销表名
		 */
        del_table('pay_config|pay_api|pay_order|pay_finance|pay_balance');

        /**
         * 删文件
         */
        deldir(PATH_WEB.'pay');
        deldir(PATH_WEB.'app/system/pay');
    }

    public function config_del($name){
        global $_M;
        $query = "DELETE FROM {$_M['table']['config']} WHERE name='{$name}'";
        DB::query($query);
    }
}