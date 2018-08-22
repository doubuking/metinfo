<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::own_class('web/class/web_zone');
class sys_zone extends web_zone {
    public function save_zone_key(){
        return array('id', 'pid', 'level', 'name', 'national', 'provincial', 'city', 'county', 'lang');
    }

    public function editzone($zid, $zname)
    {
        global $_M;
        $query = "UPDATE {$_M['table']['shopv2_zone']} SET name='{$zname}' WHERE id='{$zid}'";
        DB::query($query);
    }

    public function addzone($pid = 0, $zname = '', $value='')
    {
        global $_M;
        $sql = "`pid`='{$pid}' ,`name`='{$zname}'";
        $query = "INSERT INTO {$_M['table']['shopv2_zone']} SET {$sql},`lang`='{$_M['lang']}'";
        DB::query($query);
        return DB::insert_id();
    }

    public function addzonearr($pid = 0, $znamearr = '')
    {
        global $_M;
        $insertrow = array();
        foreach ($znamearr as $i=>$name) {
            if($name){
                $sql = "`pid`='{$pid}' ,`name`='{$name}'";
                $query = "INSERT INTO {$_M['table']['shopv2_zone']} SET {$sql},`lang`='{$_M['lang']}'";
                DB::query($query);
                $insertrow[$i]['id'] =  DB::insert_id();
                $insertrow[$i]['name'] =  $name;
            }

        }
        return $insertrow;
    }

    public function delzone($zid)
    {
        global $_M;
        $sublist= $this->getSubzone($zid);

        $subidstr = "({$zid}";
        foreach ($sublist as $zone) {
            $subidstr .= ",{$zone['id']}";
        }
        $subidstr .= ")";
        $query = "DELETE FROM {$_M['table']['shopv2_zone']} WHERE `id` IN {$subidstr}";
        DB::query($query);
    }


}

?>