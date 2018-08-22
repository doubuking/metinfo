<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::sys_class('app');

class discount_admin extends app {
	public $discount;
    public $appno;

	public function __construct() {
		parent::__construct();
		global $_M;
        $this->appno = 10043;
		$this->discount = load::own_class('admin/class/sys_discount', 'new');
	}

	public function dojson_discount_list(){
		global $_M;
		$search.= $_M['form']['keyword'] ? " and name like '%{$_M['form']['keyword']}%' ":"";
		$time = time();
		if($_M['form']['state'] == 1){
			$search.= " and s_time > '{$time}'";
		}else if($_M['form']['state'] == 2){
			$search.= " and s_time < '{$time}' and e_time > '{$time}'";
		}else if($_M['form']['state'] == 3){
			$search.= " and e_time < '{$time}'";
		}else{
			$search.= "";
		}
		$order = ' id desc ';
		$data = $this->discount->json_discount_list($search, $order);
		foreach($data as $key=>$val){
			$list = array();
			$list[] = "<span class=\"checkbox-custom checkbox-primary\"><input name=\"id\" type=\"checkbox\" class=\"selectable-item\" value=\"{$val[id]}\"><label></label></span>";
			$list[] = $val['name'];
			$list[] = $val['par'];
			if($val['one_user'] == 1){
				$list[] = $_M['word']['app_shop_discount_table_row1'];
			}else{
				$list[] = "{$val['one_user_have']} /{$_M['word']['app_shop_discount_table_row2']} ";
			}
			$list[] = date('Y-m-d H:i', $val['s_time']).$_M['word']['app_shop_discount_table_row3'].' <br />'.date('Y-m-d H:i', $val['e_time']);
			$list[] = "{$val['receive']} / {$val['used']} / {$val['amount']}";
			$status = $_M['word']['app_shop_discount_state1'];
			if($val['s_time'] > time()){
				$status = $_M['word']['app_shop_discount_state2'];
			}
			if($val['e_time'] < time()){
				$status = $_M['word']['app_shop_discount_state3'];
			}
			$list[] = $status;

			$list[] = "<div><a class='btn btn-primary btn-outline' href=\"{$_M['url'][own_form]}a=doeditor&id={$val['id']}\">{$_M['word']['app_shop_editor']}</a></div>";
			$rarray[] = $list;
		}
		$this->discount->json_return($rarray);
	}

	public function dolist(){
		global $_M;
		require_once $this->show('app/discount_list');
	}

	public function doeditor(){
		global $_M;
		$discount = $this->discount->get_discount_by_id($_M['form']['id']);
		$discount = $this->discount->analysis($discount);
		$discount['s_time_1'] = date("Y-m-d", $discount['s_time']);
		$discount['s_time_2'] = date("H:i", $discount['s_time']);
		$discount['e_time_1'] = date("Y-m-d", $discount['e_time']);
		$discount['e_time_2'] = date("H:i", $discount['e_time']);
		$data['discount']=$discount;
		$data['group'] = load::sys_class('group', 'new')->get_group_list();
		$data['action'] ='doeditorsave';
		require_once $this->show('app/discount_editor',$data);
	}

	public function doadd(){
		global $_M;
		$data['group'] = load::sys_class('group', 'new')->get_group_list();
		$data['action'] ='doaddsave';
		$discount['one_user'] = 0;
		$discount['one_user_have'] = 1;
		$discount['all_goods'] = 1;
		$discount['s_time_1'] = date("Y-m-d", time());
		$discount['s_time_2'] = date("H:i", time());
		$discount['e_time_1'] = date("Y-m-d", time());
		$discount['e_time_2'] = date("H:i", time());
		$data['discount']=$discount;
		require_once $this->show('app/discount_editor',$data);
	}

	public function doeditorsave(){
		global $_M;
		if(!$_M['form']['id']){
			turnover("{$_M['url']['own_form']}a=dolist", $_M['word']['app_shop_discount_data_error']);
		}
		if($_M['form']['e_time'] < $_M['form']['s_time']){
			turnover("{$_M['url']['own_form']}a=doeditor&id={$_M['form']['id']}", $_M['word']['app_shop_discount_error1']);
		}
		$this->save($_M['form']);
		turnover("{$_M['url']['own_form']}a=dolist");
	}

	public function doaddsave(){
		global $_M;
		if($_M['form']['e_time'] < $_M['form']['s_time']){
			turnover("{$_M['url']['own_form']}a=doeditor&id={$_M['form']['id']}", $_M['word']['app_shop_discount_error1']);
		}
		$this->save($_M['form']);
		turnover("{$_M['url']['own_form']}a=dolist");
	}

	public function dojson_discount_goods()//原来的方法名dojson_goods_list不恰当
	{
		global $_M;
		$state = $_M['form']['state'];
		$did = $_M['form']['did'];
		$select_goods=$_M['form']['select_goods'];//goods_list即select_goods
		$table = load::sys_class('tabledata', 'new');
		$discount = load::own_class('admin/class/sys_discount', 'new');

		// $query = "SELECT * FROM {$_M['table']['shopv2_discount']} WHERE id={$did}";
		// $dis = DB::get_one($query);
		switch ($state) {
			case 1:
				$where = "id IN ({$select_goods})";
				break;
			case -1:
				if($select_goods){
					$where = "id NOT IN ({$select_goods})";
				}else{
					$where = "1=1";
				}
				break;
			default:
				$where = "1=1";
				break;
		}

		$where.=" AND lang='{$_M['lang']}'";
		$order = 'addtime desc';

		$search = $_M['form']['keyword']?" and title like '%{$_M['form']['keyword']}%'":'';
		$where .= $search;
		$query = "{$_M['table']['product']}";
		$goods_list = $table->getdata($query, '*', $where, $order);
		foreach($goods_list as $key=>$val){
			$list = array();
			$list[] = $val['title'];
			$list[] = timeFormat(strtotime($val['addtime']));

			if($state == 1){
				$list[] = "<a class='select' data-select='true' data-id=\"{$val[id]}\" href=\"javascript:;\">{$_M['word']['app_shop_selected']}</a>";
			}elseif($state < 0){

				$list[] = "<a class='select' data-id=\"{$val[id]}\" href=\"javascript:;\">{$_M['word']['app_shop_select']}</a>";
			}else{
				if($select_goods){
					$goods_id = explode(',', $select_goods);
					if(in_array($val['id'], $goods_id)){
						$list[] = "<a class='select' data-select='true' data-id=\"{$val[id]}\" href=\"javascript:;\">{$_M['word']['app_shop_selected']}</a>";
					}else{
						$list[] = "<a class='select' data-id=\"{$val[id]}\" href=\"javascript:;\">{$_M['word']['app_shop_select']}</a>";
					}
				}else{
					$list[] = "<a class='select' data-id=\"{$val[id]}\" href=\"javascript:;\">{$_M['word']['app_shop_select']}</a>";
				}
			}
			$rarray[] = $list;
		}

		$table->rdata($rarray);
	}
	// public function do_json_discount_goods(){//此为之前的老方法 没有地方用到
	// 	global $_M;
	// 	$ids = explode(',', $_M['form']['idlist']);
	// 	$html = '';
	// 	foreach($ids as $key=>$val){
	// 		if($val){
	// 			$query = "SELECT * FROM {$_M['table']['product']} WHERE id = '{$val}'";
	// 			$p = DB::get_one($query);
	// 			$html .= "<div id=\"goods-div-{$val['id']}\" class=\"col-lg-8\" style=\"margin-top:1px;\">
	// 							<span class=\"btn btn-primary\">
	// 								<span>{$p['title']}</span>
	// 								<button type=\"button\" class=\"close\" style=\"margin-top:-4px;\">
	// 									<span style=\"font-size:20px;\" aria-hidden=\"true\">&nbsp;<a href=\"javascript:;\"  class=\"del-goods\" data-id=\"{$val['id']}\" style=\"color:#fff;\">&times;</a></span>
	// 								</button>
	// 							</span>
	// 						</div>
	// 			";
	// 		}
	// 	}
	// 	echo $html;

	// }


    //商品折扣方案 固定折扣  数量折扣
    public function do_discount_set()
    {
        global $_M;
        $data = array();
        $json = base64_decode($_M['config']['shopv2_discount_plan']);
        $discount_plan = jsondecode($json);
        $data['discount_plan'] = $discount_plan;
        require_once $this->show('app/discount_set',$data);
    }

    public function do_discount_editor()
    {
        global $_M;
        foreach ($_M['form'] as $key => $value) {
            if (strstr( $key, 'pnum_')) {
                $pkey = $_M['form'][$key];
            }
            if (strstr( $key, 'pdiscount_')) {
                $pval = $_M['form'][$key];
            }

            if ($pkey && $pval) {
                $discount_plan [$pkey] = $pval;
            }
        }

        #$discount_plan = array('1' => '0.9', '2' => '0.8', '3' => '0.7', '4' => '0.6');

        $_M['form']['shopv2_discount_type_1'] = $_M['form']['shopv2_discount_type_1'] ? $_M['form']['shopv2_discount_type_1'] : 0;  //数量折扣
        $_M['form']['shopv2_discount_type_2'] = $_M['form']['shopv2_discount_type_2'] ? $_M['form']['shopv2_discount_type_2'] : 0;  //固定折扣
        $discount_plan  = jsonencode($discount_plan);    //折扣方案
        $_M['form']['shopv2_discount_plan']   = base64_encode($discount_plan);    //折扣方案
        $_M['form']['shopv2_discount_static'];                                    //固定折扣价格

        $configlist = array();
        $configlist[] = 'shopv2_discount_type_1';       //数量折扣
        $configlist[] = 'shopv2_discount_type_2';       //固定折扣
        $configlist[] = 'shopv2_discount_static';       //固定折扣价格
        $configlist[] = 'shopv2_discount_plan';         //折扣方案
        appconfigsave($configlist,10043);
        setcookie("TestCookie",implode(',',$configlist));
        $this->ajax_success($_M['word']['app_shop_saveok']);
    }

	public function save($data){
		$data['s_time'] = strtotime("{$data['s_time_1']} {$data['s_time_2']}");
		$data['e_time'] = strtotime("{$data['e_time_1']} {$data['e_time_2']}");
		$info = copykey($data, $this->discount->save_discount_key());

		$this->discount->save_discount($info);
	}

	public function dodel(){
		global $_M;
		$allid = explode(',' , $_M['form']['allid']);
		foreach($allid as $key=>$val){
			if($val)$this->discount->del_discount($val);
		}
		$retun['success'] = $_M['word']['app_shop_delok'];
		echo jsonencode($retun);
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
    public function ajax_success($success){
        global $_M;
        $retun = array();
        $retun['success'] = $success;
        echo jsonencode($retun);
        die();
    }
}