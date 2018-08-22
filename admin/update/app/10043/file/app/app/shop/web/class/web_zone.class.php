<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

class web_zone {

    public function getZoneList($zid = 0)
    {
        global $_M;
        $zonelist = self::getTree($this->getzone(),$zid);
        return $zonelist;
    }

    static public function getTree($category,$parent_id = 0,$level=0){
        $arr=array();
        foreach($category as $k=>$v){
            if($v['pid']==$parent_id){
                $v['level']=$level;
                $v['children']=self::getTree($category,$v['id'],$level+1);
                $arr[]=$v;
            }
        }
        return $arr;
    }

    public function getSubzone($zid)
    {
        global $_M;
        $zonelist = $this->getzone();
        $sublit= $this->getChildren($zonelist, $zid);
        return $sublit;
    }

    static public function getChildren($data,$pid){
        $arr=array();
        foreach ($data as $v) {
            if ($v['pid']==$pid) {
                $arr[]=$v;
                $arr=array_merge($arr,self::getChildren($data,$v['id']));
            }
        }
        return $arr;
    }

    public function getzone()
    {
        global $_M;
        $query = "SELECT `id`,`name`,`pid`,`lang` FROM {$_M['table']['shopv2_zone']} WHERE `lang` = '{$_M['lang']}' ORDER BY `id`";
        $list = DB::get_all($query);
        return $list;
    }

    public function getZoneById($zid)
    {
        global $_M;
        $query = "SELECT `id`,`name`,`pid`,`lang` FROM {$_M['table']['shopv2_zone']} WHERE `id` ={$zid} AND `lang` = '{$_M['lang']}'";
        $zone = DB::get_one();
        return $zone;
    }

}
?>