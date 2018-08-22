<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

class web_discount{
	public $lang;
    public $amount_discount_info;   //数量折扣信息

	public function __construct() {
		global $_M;
		$this->lang = $_M['lang'];
	}

	public function get_discount_by_uid($uid){
		global $_M;
		$query = "SELECT * FROM {$_M['table']['shopv2_discount_coupon']} WHERE uid = '{$uid}' AND lang='{$_M['lang']}'";
		$data = DB::get_all($query);
		$re = array();
		foreach($data as $key=>$val){
			$d = $this->get_discount_by_id($val['did']);
			$re[] = array_merge($d, $val);
		}
		return $re;
	}

	public function get_discount_by_id($id){
		global $_M;
		$query = "SELECT * FROM {$_M['table']['shopv2_discount']} WHERE id = '{$id}' AND lang='{$_M['lang']}'";
		$data = DB::get_one($query);
		return $data;
	}

	public function get_coupon_by_id($id){
		global $_M;
		$query = "SELECT * FROM {$_M['table']['shopv2_discount_coupon']} WHERE id = '{$id}' AND lang='{$_M['lang']}'";
		$data = DB::get_one($query);
		$re = array();
		$d = $this->get_discount_by_id($data['did']);
		$re = array_merge($d, $data);
		return $re;
	}

	public function get_dis_by_price_did($did,$price)
	{
		global $_M;
		$query = "SELECT * FROM {$_M['table']['shopv2_discount_coupon']} a LEFT JOIN {$_M['table']['shopv2_discount']} b ON a.did = b.id WHERE a.id={$did} AND b.r_price <= {$price} AND b.lang='{$_M['lang']}'";
		return DB::get_one($query);

	}

	public function get_dis_by_price_uid($uid,$price)
	{
		global $_M;
		$query = "SELECT * FROM {$_M['table']['shopv2_discount']} a LEFT JOIN {$_M['table']['shopv2_discount_coupon']} b ON a.id=b.did WHERE b.uid={$uid} AND a.r_price <= {$price} AND a.lang='{$_M['lang']}'";
		return DB::get_all($query);

	}

	public function discount_uese($id){
		$info['id'] = $id;
		$info['usetime'] = time();
		$this->save_coupon($info);
		return true;
	}

	public function is_ues_discount($uid, $discount, $goods){

			if($discount['uid'] != $uid){
				return false;
			}

			if($discount['usetime']){
				return false;
			}

			if(time() < $discount['s_time'] || time() > $discount['e_time']){
				return false;
			}

			if($discount['all_goods'] == 0){
				foreach ($goods as $key => $v) {
					$avalible = explode(',', $discount['goods_list']);
					if(!in_array($v['pid'], $avalible)){
						return false;
					}
				}
			}

			$price = 0;
			foreach ($goods as $key => $v) {
				$price+=$v['amount']*$v['price'];
			}

			if($price <= $discount['par']){
				return false;
			}
			return true;
	}

	public function save_discount($info){
		global $_M;
		$keys = $this->save_discount_key();
		$sql = '';
		$info['type'] = 1;
		foreach($keys as $key=>$val){
			if(isset($info[$val]) && $val!='id')$sql .= "{$val}='{$info[$val]}',";
		}
		$sql = trim($sql, ',');
		if($info['id']){
				$query = "UPDATE  {$_M['table']['shopv2_discount']} SET {$sql} WHERE id='{$info['id']}' AND lang='{$_M['lang']}'";
				DB::query($query);
		} else {
				$query = "INSERT INTO {$_M['table']['shopv2_discount']} SET {$sql},lang='{$this->lang}'";
				DB::query($query);
		}
	}

	public function save_discount_key(){
		return array('id', 'name', 'type', 'par', 'r_price', 's_time', 'e_time', 'amount', 'one_user_have', 'ugid', 'all_goods', 'goods_list', 'instructions');
	}

	public function analysis_array($data){
		foreach($data as $key=>$val){
			$data[$key] = $this->analysis($val);
		}
		return $data;
	}

	public function analysis($data){
		global $_M;
		$data['s_time_str'] = date('Y-m-d H:i', $data['s_time']);
		$data['e_time_str'] = date('Y-m-d H:i', $data['e_time']);

		$data['par_str'] = load::own_class('web/class/web_func', 'new')->price_str($data['par']);
		$data['r_price_str'] = load::own_class('web/class/web_func', 'new')->price_str($data['r_price']);
		if(!defined('IN_ADMIN')){
			if($data['ugid'] == 0){
				$data['ugid_str'] = $_M['word']['app_shop_allusers'];
			}else{
				$group = load::sys_class('group', 'new')->get_group_list();
				$data['ugid_str'] = "{$group[$data['ugid']]['name']}{$_M['word']['app_shop_exceeduser']}";
			}
			if($data['all_goods']){
				$data['plist_str'] = $_M['word']['app_shop_allgoods'];
			}else{
				$avalible = array();
				$p = explode(',', $data['goods_list']);
				$goods_class = load::own_class('web/class/web_goods', 'new');

				foreach($p as $key=>$val){

					if($val){
						$goods = load::own_class('web/class/web_goods', 'new')->get_goods_by_pid($val, 1, 0, 1, 0);
						
						$avalible[$key]['url'] = $goods_class->get_show_product_url($goods['id'], $goods['class1']);
						$avalible[$key]['title'] = $goods['title'];
						$avalible[$key]['img'] = $goods['imgurl'];
						$avalible[$key]['price'] = load::own_class('web/class/web_func', 'new')->price_str($goods['price']);;
					}

				}
				$data['avalible_list'] = $avalible;
			}
		}
		return $data;
	}

	public function save_coupon($info){
		global $_M;
		$keys = $this->save_coupon_key();

		$sql = '';
		foreach($keys as $key=>$val){
			if(isset($info[$val]) && $val!='id')$sql .= "{$val}='{$info[$val]}',";
		}
		$sql = trim($sql, ',');

		if($info['id']){
            $query = "UPDATE  {$_M['table']['shopv2_discount_coupon']} SET {$sql} WHERE id='{$info['id']}' AND lang='{$_M['lang']}'";
            DB::query($query);

            $query = "SELECT `did` FROM {$_M['table']['shopv2_discount_coupon']} WHERE id = '{$info['id']}'";
            $dis = db::get_one($query);

            $query = "UPDATE {$_M['table']['shopv2_discount']} SET `used` = used+1 WHERE id='{$dis['did']}'";
            DB::query($query);
		} else {

			if($info['uid'] && $info['did']){
				$query = "INSERT INTO {$_M['table']['shopv2_discount_coupon']} SET {$sql}";
				DB::query($query);
			}
		}
	}

	public function save_coupon_key(){
		return array('did', 'uid', 'usetime', 'receivetime','lang');
	}

	public function is_receive($did, $uid){
		global $_M;
		$discount = $this->get_discount_by_id($did);

		if(!$uid){
			return $this->response($_M['word']['please_login']);
		}

		if($discount){

			if($discount['receive'] >= $discount['amount']){
				return $this->response($_M['word']['app_shop_nodiscounts']);
			}
			if(time() < $discount['s_time'] || time() > $discount['e_time']){
				return $this->response($_M['word']['app_shop_nodiscounts']);

			}
			if($discount['one_user_have'] != 0){
				$query = "SELECT * FROM {$_M['table']['shopv2_discount_coupon']} WHERE uid = '{$uid}' AND did = '{$did}' AND lang='{$_M['lang']}'";

			
				$c = DB::get_all($query);
				if(count($c) >= $discount['one_user_have']){
					return $this->response($_M['word']['app_shop_receivelimit'].$discount['one_user_have'].$_M['word']['app_shop_sheet']);
				}
			}
		}else{
			return $this->response($_M['word']['app_shop_nodiscounts']);
		}
		return $this->response($_M['word']['app_shop_receive_albe'],1);

	}
	public function receive($did, $uid){
		global $_M;
		$res = $this->is_receive($did, $uid);

		if($res['status'] == 1){
			$query = "UPDATE {$_M['table']['shopv2_discount']} SET `receive` = `receive` + 1 WHERE id='{$did}' AND `amount` >= `receive` + 1 AND lang='{$_M['lang']}'";
			
			DB::query($query);

			if(DB::affected_rows() > 0){
				$info['did'] = $did;
				$info['uid'] = $uid;
				$info['usetime'] = 0;
				$info['receivetime'] = time();
				$info['lang'] = $_M['lang'];
				$this->save_coupon($info);
				return $res;
			}else{
				return array('status'=>0,'info'=>$_M['word']['app_shop_receive_fail']);
			}
		}else{
			return $res;
		}
	}

	public function list_discounts()
	{
		global $_M;
		$time = time();
		$query = "SELECT * FROM {$_M['table']['shopv2_discount']} WHERE  e_time > {$time} AND lang='{$_M['lang']}'";
		return DB::get_all($query);
	}

	public function get_discount_by_state($state,$pid=0)
	{
		global $_M;
		$uid = get_met_cookie('id');	
		switch ($state) {
			case 0:
				// 已领取可使用
				$info = $this->my_discounts();

				foreach ($info as $key => $v) {

					if($v['all_goods'] == 0 && $pid){
						$goods = explode(',', $v['goods_list']);
						if(!in_array($pid, $goods)){
							continue;
						}
					}
					$data[] = $v;
				}
				break;
			case 1:
				// 未领取可领取
				$data = $this->avalible_discounts($pid);
				break;
			case 2:
				// 已领取已使用
				$data = $this->my_discounts(2);
				break;
			case 3:
				// 已领取未使用已过期
				$data = $this->my_discounts(3);
				break;	
			default:
				$data = $this->my_discounts();
				break;
		}

		return $data;
	}

	/**
	 * 已领取
	 * @DateTime 2017-08-02
	 * @param    integer    $type=1 所有已领取 $type=2 所有已领取未使用 $type=3 所有已领取已使用
	 * @return   [type]           [description]
	 */
	public function my_discounts($type=1)
	{
		global $_M;
		$uid = get_met_cookie('id');
		$time = time();

		switch ($type) {
			case 1:
			// 未使用可使用
				$where = "uid = {$uid} AND usetime = 0 AND e_time > {$time}";
				break;
			case 2:
				// 已使用
				$where = "uid = {$uid} AND usetime > 0";
				break;	
			case 3:
			// 未使用已过期
				$where = "uid = {$uid} AND usetime = 0  AND e_time < {$time}";
				$time = 0;
				break;		
			default:
				$where = "uid = {$uid} AND usetime = 0  AND e_time > {$time}";
				break;
		}
		
		$query = "SELECT * FROM {$_M['table']['shopv2_discount_coupon']} a LEFT JOIN  {$_M['table']['shopv2_discount']} b ON a.did=b.id WHERE {$where} AND a.lang='{$_M['lang']}'";
		return DB::get_all($query);
	}

	/**
	 * 当前可领取的优惠券
	 * @DateTime 2017-08-02
	 * @return   array 登录状态下显示用户可领取，未登录显示所有可领取
	 */
	public function avalible_discounts($pid=0)
	{
		global $_M;
		$discounts = $this->list_discounts();

		$avalible = array();
		$uid = get_met_cookie('id');
		foreach ($discounts as $key => $v) {
			if($v['amount'] > $v['receive']){

				if(time() < $v['s_time']){
					$v['status'] = 1;
				}

				if(intval(get_met_cookie('groupid')) < $v['ugid']){
					continue;
				}

				// 如果传入pid 当优惠券是指定商品可用时 判断当前商品是否可用
				if($v['all_goods'] == 0 && $pid){
					$goods = explode(',', $v['goods_list']);
					if(!in_array($pid, $goods)){
						continue;
					}
				}

				if($uid){
					// 当前这张优惠券已领取的次数
					$query = "SELECT * FROM {$_M['table']['shopv2_discount_coupon']} WHERE  uid = {$uid} AND did = {$v['id']} AND lang='{$_M['lang']}'";
					$has = DB::get_all($query);

					// 当前优惠券限领次数和已领次数
					if($v['one_user_have'] <= count($has)){
						continue;
					}
					$avalible[] = $v;

				}else{
					$avalible[] = $v;
				}

				
			}
		}
		return $avalible;
	}

	public function response($info,$status = 0)
	{
		global $_M;
		return array('status'=>$status,'info'=>$info);
	}

    /**
     * 多件商品打折优惠
     * @param $pgoods   商品列表
     * @param $price    订单总价
     * @return int
     */
    public function amount_discount($pgoods, $price)
    {
        global $_M;
        $cprice = 0;

        //多件打折
        if($_M['config']['shopv2_discount_type_1']){
            $json = base64_decode($_M['config']['shopv2_discount_plan']);
            $discount_plan  = jsondecode($json);
            $num = array_keys($discount_plan);
            $tamount = 0;
            $discount  = 1;
            $info = array();

            foreach ($pgoods as $good) {
                $tamount = $tamount + $good['amount'];
            }
            foreach ($num as $value) {
                if ($tamount >= $value) {
                    $discount = $discount_plan[$value];
                }
            }
            if(!is_number($discount)){
                $discount = 1;
            }
            $cprice_1 = 0 - ($price - $price * $discount);
            $info['amount_discount']['amount']      = $tamount;
            $info['amount_discount']['discount']    = $discount;
            $info['amount_discount']['dprice']       = $cprice_1;
        }

        //每单固定折扣
        if ($_M['config']['shopv2_discount_type_2']){
            $cprice_2 = 0 - $_M['config']['shopv2_discount_static'];
        }
        $info['static_discount']['dprice'] = $cprice_2;

        $cprice = $cprice_1 + $cprice_2;

        $this->amount_discount_info = $info;
        return $cprice;
    }

    public function get_discount_info()
    {
        global $_M;
        if($_M['config']['shopv2_discount_type_1']){
            $json = base64_decode($_M['config']['shopv2_discount_plan']);
            $discount_plan  = jsondecode($json);
            foreach ($discount_plan as $key=>$item) {
                $discount_plan[$key] = $item * 10;
            }
            $discount_info['discount_amount'] = $discount_plan;
        }
        if ($_M['config']['shopv2_discount_type_2']){
            $discount_info['discount_static'] = $_M['config']['shopv2_discount_static'];
        }
        return $discount_info;
    }


    public function group_discount($price)
    {
        global $_M;
        if (!$user = $_M['user']) {
            return false;
        }

    }


}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>