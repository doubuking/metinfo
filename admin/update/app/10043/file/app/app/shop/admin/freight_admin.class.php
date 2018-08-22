<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::sys_class('app');

class freight_admin extends app {
	public $freight;
	public $zone;

	public function __construct() {
		parent::__construct();
		global $_M;
		$this->freight = load::own_class('admin/class/sys_freight', 'new');
		$this->zone = load::own_class('admin/class/sys_zone', 'new');
	}

	public function dojson_freight_list(){
		global $_M;
		$data = $this->freight->get_freight_all();
		echo jsonencode($data);
		die();
	}

	public function dojson_zone_list(){
		global $_M;
		$data = $this->freight->get_zone_all($_M['form']['id']);
		echo jsonencode($data);
		die();
	}


	public function doindex(){
		global $_M;
		require_once $this->show('app/freight_index');
	}

	public function docheck(){
		global $_M;
		$data['freight'] = $this->freight->get_freight_by_id($_M['form']['id']);
		require_once $this->show('app/freight_editor',$data);
	}

	public function dosavefreight(){
		global $_M;
		$info = array();
		$info['id'] = $_M['form']['id'];
		$info['name'] = $_M['form']['name'];
		$this->freight->save_freight($info);
		if($info['id']){
			$lid = $info['id'];
			$this->freight->del_zone($lid);
		}else{
			$lid = DB::insert_id();
		}
		foreach($_M['form']['zone'] as $key=>$val){
			$info = array();
			$info['lid'] = $lid;
			$info['zone'] = $_M['form']['zone'][$key];
			$info['first'] = $_M['form']['first'][$key];
			$info['freight'] = $_M['form']['freight'][$key];
			$info['addp'] = $_M['form']['addp'][$key];
			$info['renew'] = $_M['form']['renew'][$key];
			$this->freight->save_zone($info);
		}
		$this->ajax_success($_M['word']['app_shop_saveok']);
	}

	/*获取运费模板*/
	function dorefresh_discount_list(){
		global $_M;
		$list = $this->freight->get_freight_all();
		$re = "<option value=\"0\">{$_M['word']['app_shop_freight_pselect']}</option>";
		foreach($list as $val){
			$re.= "<option value=\"{$val[id]}\">{$val[name]}</option>";
		}
		echo $re;
	}

	//添加地区信息
    public function dofzonelist()
    {
        global $_M;
        require_once $this->show('app/freight_zonelist');
    }

    public function do_fzone_list()
    {
	    global $_M;
        $zid = $_M['form']['zid'] ? $_M['form']['zid'] : 0;

        if (file_exists(__DIR__ . "/templates/js/zone_{$_M['lang']}.js")) {
            $zonelist = file_get_contents(__DIR__ . "/templates/js/zone_{$_M['lang']}.js");
        }else{
            $zonelist = $this->createzonecache();
        }

        echo $zonelist;
        die();
    }

    public function doeditzone()
    {
        global $_M;
        $zid = $_M['form']['zid'];
        $zname = $_M['form']['zname'];
        $this->zone->editzone($zid, $zname);
        if (!DB::error()) {
            $this->createzonecache();
            $this->ajax_success($_M['word']['opsuccess']);
        }else{
            $this->ajax_error($_M['word']['opfailed']);
        }
    }

    public function doaddfzone()
    {
        global $_M;
        $pid = $_M['form']['pid'] ? $_M['form']['pid'] : 0;
        $zname = $_M['form']['zname'];
        $insert_id = $this->zone->addzone($pid,$zname);
        if (!DB::error()) {
            $this->createzonecache();
            $data = array('insert_id' => $insert_id);
            $this->ajax_success($_M['word']['opsuccess'], $data);
        }else{
            $this->ajax_error($_M['word']['opfailed']);
        }
    }

    public function doaddfzonearr(){
	    global $_M;
	    $pid = $_M['form']['pid'] ? $_M['form']['pid'] : 0;
        $znamearr = preg_replace("/\'/", "''", $_M['form']['znamearr']);
        $znamearr = explode(PHP_EOL, trim($znamearr));
        $insert_ids = $this->zone->addzonearr($pid,$znamearr);
        if (!DB::error()) {
            $this->createzonecache();
            $data = array('insert_id' => $insert_ids);
            $this->ajax_success($_M['word']['opsuccess'], $data);
        }else{
            $this->ajax_error($_M['word']['opfailed']);
        }
    }

    public function dodelfzone()
    {
        global $_M;
        $zid = $_M['form']['zid'];
        $this->zone->delzone($zid);
        if (!DB::error()) {
            $this->createzonecache();
            $this->ajax_success($_M['word']['physicaldelok']);
        }else{
            $this->ajax_error($_M['word']['opfailed']);
        }
    }

    public function dorefreshzonecache()
    {
        global $_M;
        $zonelist = $this->createzonecache(0,0);
        $this->ajax_success($_M['word']['opsuccess'],$zonelist);
    }

    public function createzonecache($zid = 0,$json = 1)
    {
        global $_M;
        $this->clearzonecache();
        $zonelist = $this->zone->getZoneList($zid);
        $jsonzonelist = jsonencode($zonelist);
        file_put_contents(__DIR__ . "/templates/js/zone_{$_M['lang']}.js", $jsonzonelist);
        if($json){
            return $zonelist;
        }else{
            return $zonelist;
        }
    }

    public function clearzonecache()
    {
        global $_M;
        if (file_exists(__DIR__ . "/templates/js/zone_{$_M['lang']}.js")) {
            unlink(__DIR__ . "/templates/js/zone_{$_M['lang']}.js");
        }
    }

    //添加地区信息//

	//删除
	public function dodel(){
		global $_M;
		$this->freight->del_freight($_M['form']['id']);
		$this->ajax_success($_M['word']['app_shop_deled']);
	}

	//错误
	public function ajax_error($error){
		global $_M;
		$retun = array();
		$retun['error'] = $error;
		echo jsonencode($retun);
		die();
	}
	//成功
	public function ajax_success($success,$data){
		global $_M;
		$retun = array();
		$retun['success'] = $success;
        $retun['data'] = $data;
		echo jsonencode($retun);
		die();
	}
}