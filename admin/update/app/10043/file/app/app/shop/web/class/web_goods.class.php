<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::sys_func('str');

class web_goods {
    public $web_fun;
    public $web_price;

    public function __construct()
    {
        global $_M;
        $this->web_fun = load::own_class('web/class/web_func', 'new');
        $this->web_price = load::own_class('web/class/web_price', 'new');
    }

    public function get_goods_by_pid($pid, $p_table = 0, $p_para = 0, $g_table = 0, $g_para = 0){
		global $_M;

		if($p_table == 1){
			$query = "SELECT * FROM {$_M['table']['product']} WHERE id = '{$pid}'";
			$p_data = DB::get_one($query);
		}
		$p_data['id'] = $pid;
		if($g_table == 1){
			$query = "SELECT * FROM {$_M['table']['shopv2_product']} WHERE pid = '{$pid}'";
			$s_data = DB::get_one($query);
		}
		$s_data['id'] = $pid;
		$redata = array_merge($p_data, $s_data);
		if($p_para == 1){
			$redata['p_para'] = $_M['word']['app_shop_goods_noquery'];
		}

		if($g_para == 1){
            $redata = $this->analysis($redata);
        }
        return $redata;
	}

	/*public function get_plist_by_para($pid, $valuelist){
		global $_M;
		$query = "SELECT * FROM {$_M['table']['shopv2_plist']} WHERE pid='{$pid}' AND valuelist='{$valuelist}'";
        $plist = DB::get_one($query);
        $plist = $this->analysis($plist);
        return $plist;
	}*/

    public function get_splist_by_id($splist_id)
    {
        global $_M;
        $query = "SELECT * FROM {$_M['table']['shopv2_goods_splist']} where id ='{$splist_id}'";
        $splist = DB::get_one($query);
        return $splist;
    }

    /**
     * 通过规格值获取商品信息
     * @param int int $pid   商品ID
     * @param array $valuelist  属性值数组[1,3]
     * @return array
     */
	public function get_splist_by_spec($pid, $valuelist){
		global $_M;
        $condition = array();
        $i = 0;
        foreach ($valuelist as $value_id) {
            $condition []= " spec_value_id = '{$value_id}' ";
            $i++;
        }
        $sql = implode('OR', $condition);
        $query = "SELECT * FROM (SELECT splist_id,COUNT(*)as coun FROM {$_M['table']['shopv2_goods_relation']} WHERE pid='{$pid}'  AND ($sql) GROUP BY splist_id ORDER BY coun DESC) AS t1 WHERE t1.coun>='{$i}'";
        $res = DB::get_one($query);

        $splist = $this->get_splist_by_id($res['splist_id']);

        //会员组价格
        if(1){
            $splist['priceg']   = $this->get_gprice($splist['price']);      //会员组价格
            $splist['price']    = $this->get_gprice($splist['price']);      //会员组价格
        }

        return $splist;
    }

	public function analysis_array($data){
        foreach($data as $key=>$val){
            $data[$key] = $this->analysis($val);
		}
		return $data;
	}

	public function analysis($data){
		$gprice = $this->get_gprice($data['price']);
		$data['gprice'] = $gprice;
        if (1) {
            $data['price'] = $gprice;
        }
		$data['gprice_str'] = $this->web_fun->price_str($data['gprice']);
		$data['price_str'] = $this->web_fun->price_str($data['price']);
		$data['original_str'] = $this->web_fun->price_str($data['original']);
        $paralist = is_array($data['paralist']) ? $data['paralist'] : jsondecode($data['paralist']);
        $data['selectpara'] = $this->get_speclist_list($paralist);

        /*$paralists = jsondecode($data['paralist']);
        dump($paralists);
        foreach($paralists as $key=>$val){
			$list = array();
			$list['name'] = $val['value'];
			$list['value'] =  explode(',' , trim($val['valuelist'], ','));
			$data['selectpara'][] = $list;
		}*/

		$data['purchase'] = $data['purchase'] ? $data['purchase'] : 0;
		$data['prar_select'] = $this->web_fun->price_str($data['price']);

		return $data;
	}

	public function goods_stock($pid, $splist, $amount){
		global $_M;
		$query = "UPDATE {$_M['table']['shopv2_product']} SET stock=stock+'{$amount}',sales=sales-'{$amount}' WHERE pid='{$pid}'";
		DB::query($query);
        if($splist){
            $query = "UPDATE {$_M['table']['shopv2_goods_splist']} SET stock=stock+'{$amount}',sales=sales-'{$amount}' WHERE pid='{$pid}' AND id='{$splist['id']}'";
            DB::query($query);
		}
		return true;
	}

	public function get_sql_table(){
		global $_M;
		$p = $_M['table']['product'];
		$s = $_M['table']['shopv2_product'];
		return $p.' Left JOIN '.$s." ON ({$p}.id = {$s}.pid)";
	}

	public function get_sql_search($shopsearch, $type = 1){
		global $_M;
		if($type == 1){
			$sql .= " and searchlist like '%{$shopsearch}%'";
		}else{
			$shopsearchs = explode('_', $shopsearch);
			$sql = '';
			foreach($shopsearchs as $key=>$val){
				$sql .= " and searchlist like '%{$val}%'";
			}
		}
		return $sql;
	}

	public function get_sql_price($pricef,$pricet){
			if($pricef && !$pricet){
				$sql .= " and price <= '{$pricef}'";
			}else if($pricef && $pricet){
				$sql .= " and price >= '{$pricef}' and price <= '{$pricet}'";
			}else if(!$pricef && $pricet){
				$sql .= " and price >= '{$pricet}'";
			}
	}

	public function get_sql_order($order){
		global $_M;
		if(!$order)$order = "sales_desc";
		$orders = explode('_', $order);

		$s = $_M['table']['shopv2_product'];
		if($orders[0] == 'price'){
			if($orders[1] == 'asc'){
				return "top_ok desc,no_order desc,{$s}.price asc,addtime desc,id desc";
			}
			if($orders[1] == 'desc'){
				return "top_ok desc,no_order desc,{$s}.price desc,addtime desc,id desc";
			}
		}
		if($orders[0] == 'sales'){
			if($orders[1] == 'asc'){
				return "top_ok desc,no_order desc,{$s}.sales asc,addtime desc,.id desc";
			}
			if($orders[1] == 'desc'){
				return "top_ok desc,no_order desc,{$s}.sales desc,addtime desc,id desc";
			}
		}
		if($orders[0] == 'time'){
			if($orders[1] == 'asc'){
				return "updatetime asc,id desc";
			}
			if($orders[1] == 'desc'){
				return "updatetime desc,id desc";
			}
		}
		return '';
	}

	//产生用户限购商品列表 可传入参数 pid（商品ID） purchase（限购）
	public function purchase_list($data, $uid){
		$uid = $uid ? $uid : get_met_cookie('id');
		$purchase_list = array();
		$self = load::own_class('web/class/web_shop_user', 'new')->get_user_goods_list($uid);
		foreach($data as $key=>$val){
			if(!isset($dlist[$val['pid']])){
				$list = array();
				if(!isset($val['purchase'])){
					$goods = $this->get_goods_by_pid($val['pid'], 0, 0, 1, 0);
					$list['purchase'] = $goods['purchase'] ? $goods['purchase'] : 0;
				}else{
					$list['purchase'] = $val['purchase'];
				}
				$list['pid'] = $val['pid'];
				$dlist[$val['pid']] = $list;
			}
		}
		foreach($dlist as $key=>$val){
			if($val['purchase'] == 0){
				$purchase_list[$val['pid']] = '999999999';
			}else{
				$val['purchase'] = $val['purchase'] - $self[$val['pid']];
				$purchase_list[$val['pid']] = $val['purchase'];
			}

		}
		return $purchase_list;
	}
	//产生商品是否可以购买数组 data(pid para_str amount)goods web_goods->get_goods_by_pid数据
	public function stock_list_array($data, $goods){
		$list = array();
		foreach($data as $key=>$val){
			$list[$key] = $this->stock_list($val, $goods[$key]);
		}
		return $list;
	}

	public function stock_list($data, $goods){

		$list = array();
		if(!$goods){
			$goods = $this->get_goods_by_pid($data['pid'], 0, 0, 1, 0);
			$list['stock'] = $goods['stock'] ? $goods['stock'] : 0;
		}else{
			$list['stock'] = $goods['stock'];
		}

        if($data['para_str']){
            $valuelist = is_array($data['para_str']) ? $data['para_str'] : explode(',', $data['para_str']);
            $spara = $this->get_splist_by_spec($data['pid'], $valuelist);
            $list['stock'] = $spara['stock'] ? $spara['stock'] : 0;
        }else{
			$list['stock']= $goods['stock'];
		}

		//可用发卡数量
        if ($goods['auto_sent']) {
            $card_stock = load::own_class('web/class/web_card', 'new')->count_card($data['pid'],$spara['id']);
        }

		$list['stock'] = $list['stock'] ? $list['stock'] : 0;
		if($data['amount'] - $list['stock'] > 0 || $list['stock'] <= 0){
			$list['buy_ok'] = 0;
		}else{
			$list['buy_ok'] = 1;

			//自动发卡
            if($goods['auto_sent']){
                if ($data['amount'] - $card_stock > 0 || $card_stock <= 0) {
                    $list['buy_ok'] = 0;
                }
            }
		}
		$list['pid'] = $data['pid'];

		return $list;
	}

	public function get_show_product_url($pid, $class1){
		global $_M;
		if(!$this->clounm){
			$query = "SELECT * FROM {$_M['table']['column']} WHERE module = 3";
			$clounm = DB::get_all($query);
			foreach($clounm as $key=>$val){
				$this->clounm[$val['id']] = $val['foldername'];
			}
		}
		return "{$_M['url']['site']}{$this->clounm[$class1]}/showproduct.php?lang={$_M['lang']}&id={$pid}";
	}

	/*public function get_plist_list($pid){
		global $_M;
		$query = "SELECT * FROM {$_M['table']['shopv2_plist']} WHERE pid='{$pid}'";
        $plist_list = DB::get_all($query);
        $plist_list = $this->analysis_array($plist_list);
		return $plist_list;
	}*/

	//新规格
    public function get_splist_list($pid){
        global $_M;
        $query = "SELECT * FROM {$_M['table']['shopv2_goods_splist']} WHERE pid='{$pid}'";
        $splist_list = DB::get_all($query);

        foreach ($splist_list as $key => $splist) {
            $query  = "SELECT * FROM {$_M['table']['shopv2_goods_relation']}  WHERE splist_id='{$splist['id']}'";
            $relas = DB::get_all($query);

            if(1){
                //会员组价格
                $splist_list[$key]['gprice'] = $this->get_gprice($splist['price']);
                $splist_list[$key]['price'] = $this->get_gprice($splist['price']);
            }

            $valuelist = array();
            foreach ($relas as $k=>$rela) {
                //if()
                $valuelist[$k]['spec_id'] = $rela['spec_id'];
                $valuelist[$k]['value_id'][] = $rela['spec_value_id'];
            }
            $splist_list[$key]['paralist'] = $valuelist;
            $splist_list[$key]['para_img'] = thumb($splist_list[$key]['para_img'],$_M['config']['met_productdetail_x'],$_M['config']['met_productdetail_y'],1);
        }
        #$splist_list = $this->analysis_array($splist_list);
        return $splist_list;
    }


    //获取会员组价格
    public function get_gprice($price){
        global $_M;
        $gprice =  $this->web_price->get_group_price($price);
        return $gprice;
    }

    public function get_spec_valuelist_str($spec_valuelist)
    {
        global $_M;
        $splist_str = '';
        foreach ($spec_valuelist as $value) {
            if($value)
            $splist_str .= $value['specn'] . "-" . $value['specv'].' ' ;
        }
        return $splist_str;
    }

    /**
     * @param array $spec_valuelist
     */
    public function analysis_spec_valuelist($spec_valuelist)
    {
        global $_M;
        foreach ($spec_valuelist as $key => $specv_id) {
            $specv = $this->get_spec_value($specv_id);
            $spec = $this->get_spec($specv['spec_id']);
            $spec_list[$key]['spec_id']     = $specv['spec_id'];
            $spec_list[$key]['specn']       = $spec['name'];
            $spec_list[$key]['value_id']    = $specv['id'];
            $spec_list[$key]['specv']       = $specv['value'];
        }
        return $spec_list;
    }

    //新规格
    public function get_speclist_list($paralist)
    {
        global $_M;
        foreach ($paralist as $key => $item) {
            $spec = $this->get_spec($item['spec_id']);
            $speclist[$key]['spec'] = $spec;
            foreach ($item['value_id'] as $vid) {
                $speclist[$key]['values'][] = $this->get_spec_value($vid);
            }
        }
        return $speclist;
    }

    private function get_spec_value($specv_id)
    {
        global $_M;
        $query = $query = "SELECT * FROM {$_M['table']['shopv2_goods_spec_value']} WHERE id='{$specv_id}' AND lang='{$_M['lang']}'";
        return DB::get_one($query);
    }

    private function get_spec($spec_id)
    {
        global $_M;
        $query = $query = "SELECT * FROM {$_M['table']['shopv2_goods_spec']} WHERE id='{$spec_id}' AND lang='{$_M['lang']}'";
        return DB::get_one($query);
    }

}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>