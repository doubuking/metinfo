<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::sys_class('app');

class specification_admin extends app {
    public $spec;
    public function __construct() {
        parent::__construct();
        $this->spec = load::own_class('admin/class/sys_specification', 'new');
    }

    public function doindex(){
        global $_M;
        $data['spcelist'] = $this->spec->getSpeclist();
        require_once $this->show('app/specification',$data);
    }

    public function dogetspeclist()
    {
        global $_M;
        $speclist = $this->spec->getSpeclist();

        if($_M['form']['ajax']){
            $this->ajax_return($speclist);
        }else{
            return $speclist;
        }
    }

    public function doeditspec()
    {
        global $_M;
        $res = $this->spec->editspec($_M['form']['spec_id'], $_M['form']['spec_name']);
        $this->ajax_return($res);
    }

    public function doaddspecarr()
    {
        global $_M;
        $res = $this->spec->addspecarr($_M['fomr']['spec_value_list']);
        $this->ajax_return($res);
    }

    public function doaddspec()
    {
        global $_M;
        $res = $this->spec->addspec($_M['form']['spec_name']);
        if ($_M['form']['spec_name'] === 'specadd') {
            $this->ajax_success();
        }
        $this->ajax_return($res);
    }

    public function dodelspec()
    {
        global $_M;
        $res = $this->spec->delspec($_M['form']['spec_id']);
        $this->ajax_return($res);
    }


    //规格值
    public function dogetspecvlist()
    {
        global $_M;
        $specvlist = $this->spec->getSpecvlist();

        return $this->json_return($specvlist);
    }

    public function doeditspecv()
    {
        global $_M;
        $res = $this->spec->editspecv($_M['form']['specv_id'], $_M['form']['specv_value']);
        $this->ajax_return($res);
    }

    public function doaddspvarr()
    {
        global $_M;
        $res = $this->spec->addspecvarr($_M['form']['spec_id'], $_M['form']['specv_values']);
        $this->ajax_return($res);
    }

    public function doaddspecv()
    {
        global $_M;
        $res = $this->spec->addspecv($_M['form']['spec_id'], $_M['form']['specv_value']);
        $this->ajax_return($res);
    }

    public function dodelpecvarr()
    {
        global $_M;
        $res = $this->spec->dlespecarr($_M['form']['specv_ids']);
        $this->ajax_return($res);
    }

    public function dodelpecv()
    {
        global $_M;
        $res = $this->spec->delspecv($_M['form']['specv_id']);
        $this->ajax_return($res);
    }


    public function json_return($data)
    {
        global $_M;
        return jsonencode($data);
    }

    public function ajax_return($res='')
    {
        global $_M;
        if ($res!==false) {
            $this->ajax_success($_M['word']['opsuccess'], $res);
        } else {
            $this->ajax_error($_M['word']['opfailed'], $res);
        }
    }

    //错误
    public function ajax_error($error ,$data){
        global $_M;
        $retun = array();
        $retun['error'] = $error;
        $retun['data']  = $data;
        echo jsonencode($retun);
        die();
    }
    //成功
    public function ajax_success($success, $data){
        global $_M;
        $retun = array();
        $retun['success'] = $success;
        $retun['data']    = $data;
        echo jsonencode($retun);
        die();
    }
}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>