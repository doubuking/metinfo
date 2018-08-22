<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

#load::own_class('web/class/web_zone');
class sys_specification   {
    public function __construct()
    {
        global $_M;
    }

    public function getSpeclist()
    {
        global $_M;
        $query = "SELECT * FROM {$_M['table']['shopv2_goods_spec']} WHERE `name`!='spec_holder' AND lang='{$_M['lang']}' ;";
        #die($query);
        $specs = DB::get_all($query);
        $specsarr = array();
        foreach ($specs as $key=>$spec) {
            $query = "SELECT * FROM {$_M['table']['shopv2_goods_spec_value']} WHERE spec_id='{$spec['id']}' AND lang='{$_M['lang']}' AND `value`!='specv_holder';";
            $spec_values = DB::get_all($query);
            foreach ($spec_values as $itme) {
                $value['vid'] = $itme['id'];
                $value['value'] = $itme['value'];
                $value['spec_id'] = $itme['spec_id'];
                $spec['value'][$itme['id']] = $value;
            }
            $specsarr[$spec['id']] = $spec;
        }
        return $specsarr;
    }

    //规格
    public function editspec($spec_id, $spec_name)
    {
        global $_M;
        if (!$spec_id || !$spec_name) {
            return false;
        }
        $query = "UPDATE {$_M['table']['shopv2_goods_spec']} SET `name`='{$spec_name}' WHERE id='{$spec_id}'";
        DB::get_one($query);
        if (!DB::errno()) {
            return true;
        }else{
            return false;
        }
    }

    public function addspecarr($spec_value_list)
    {
        $value_list = jsondecode($spec_value_list);
        foreach ($value_list as $item) {
            $spec_id = $this->addspec($item['spec_name']);
            if ($spec_id) {
                $this->addspecvarr($item['spec_values']);
            }
        }

        if (!DB::errno()) {
            return true;
        } else {
            return false;
        }
    }

    public function addspec($spec_name)
    {
        global $_M;
        if (!$spec_name) {
            return false;
        }

        $sql = "DELETE FROM {$_M['table']['shopv2_goods_spec']} WHERE `name`='spec_holder' ";
        DB::query($sql);

        $query = "SELECT * FROM {$_M['table']['shopv2_goods_spec']} WHERE `name`='{$spec_name}' AND lang='{$_M['lang']}'";
        if (!$spec = DB::get_one($query)) {
            $query = "INSERT INTO {$_M['table']['shopv2_goods_spec']} SET `name`='{$spec_name}', lang='{$_M['lang']}'";
            DB::query($query);
            return DB::insert_id();
        } else {
            return false;
        }
    }

    public function delspec($spec_id)
    {
        global $_M;
        $query = "DELETE FROM {$_M['table']['shopv2_goods_spec']} WHERE id='{$spec_id}' AND lang='{$_M['lang']}'";
        DB::query($query);
        $query = "DELETE FROM {$_M['table']['shopv2_goods_spec_value']} WHERE spec_id='{$spec_id}' AND lang='{$_M['lang']}'";
        DB::query($query);

        if (!DB::errno()) {
            return true;
        } else {
            return false;
        }
    }

    //规格值
    public function getSpecvlist($specv_id)
    {
        global $_M;
        $query = "SELECT * FROM {$_M['table']['shopv2_goods_spec_value']} WHERE `name`!='specv_holder' AND `id`='{$specv_id}' AND lang='{$_M['lang']}'";
        return DB::get_one($query);
    }

    public function editspecv($specv_id ,$specv_value)
    {
        global $_M;
        if (!$specv_id || !$specv_value) {
            return false;
        }
        $query = "UPDATE {$_M['table']['shopv2_goods_spec_value']} SET `value`='{$specv_value}' WHERE id='{$specv_id}'";
        DB::get_one($query);
        if (!DB::errno()) {
            return true;
        }else{
            return false;
        }
    }

    public function addspecvarr($spec_id, $specv_values)
    {
        global $_M;
        $i = 0;
        foreach ($specv_values as $specv_value) {
            $this->addspecv($spec_id, $specv_value);
            $i++;
        }
        return $i;
    }

    public function addspecv($spec_id, $specv_value)
    {
        global $_M;
        if (!$spec_id || !$specv_value) {
            return false;
        }
        
        $sql = "DELETE FROM {$_M['table']['shopv2_goods_spec_value']} WHERE `value`='specv_holder' ";
        DB::query($sql);

        $query = "SELECT * FROM {$_M['table']['shopv2_goods_spec_value']} WHERE `value`='{$specv_value}' AND spec_id='{$spec_id}' AND lang='{$_M['lang']}'";
        if (!$specv = DB::get_one($query)) {
            $query = "INSERT INTO {$_M['table']['shopv2_goods_spec_value']} SET `spec_id`='{$spec_id}', `value`='{$specv_value}', lang='{$_M['lang']}'";
            DB::query($query);
            return DB::insert_id();
        } else {
            return false;
        }
    }

    public function dlespecarr($specv_ids)
    {
        global $_M;
        $i = 0;
        foreach ($specv_ids as $specv_id) {
            $this->delspecv($specv_id);
            $i++;
        }
        return $i;

    }

    public function delspecv($specv_id)
    {
        global $_M;
        $query = "DELETE FROM {$_M['table']['shopv2_goods_spec_value']} WHERE id='{$specv_id}' AND lang='{$_M['lang']}'";
        DB::query($query);

        if (!DB::errno()) {
            return true;
        } else {
            return false;
        }
    }

}