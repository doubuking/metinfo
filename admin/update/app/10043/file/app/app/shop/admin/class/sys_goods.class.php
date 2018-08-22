<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::own_class('web/class/web_goods');
class sys_goods extends web_goods{

	public function json_product_list($where, $order){
		global $_M;
		$this->table = load::sys_class('tabledata', 'new');

		$p = $_M['table']['product'];
		$s = $_M['table']['shopv2_product'];

		if($_M['config']['shopv2_open']){//开启在线订购时
			$table = $p.' Left JOIN '.$s." ON ({$p}.id = {$s}.pid)";
			$where = "{$p}.lang='{$_M['lang']}' and ({$p}.recycle = '0' or {$p}.recycle = '-1') {$where}";
		}else{
			$table = $p;
			$where = "lang='{$_M['lang']}' and (recycle = '0' or recycle = '-1') {$where}";
		}

		$data = $this->table->getdata($table, '*', $where, $order);

		foreach($data as $key=>$val){
			if(!$val['pid'])$data[$key]['pid'] = $val['id'];
		}

		return $data;
	}

	public function json_return($data){
		$this->table->rdata($data);
	}

	public function default_value($list){
		global $_M;
		if($list['id']){
            $product = $this->get_product($list['id']);
            #$list['plist'] = jsonencode($this->get_plist($list['id']));
			$list['plist2'] = jsonencode($this->get_goods_splist($list['id']));
			$list['group_price'] = $this->get_group_price($list['id']);
			$list['paralist'] = $product['paralist'];
            $paralist = is_array($product['paralist']) ? $product['paralist'] : jsondecode($product['paralist']);
            $list['paralist2'] = jsonencode($this->get_speclist_list($paralist));
            $list['price'] = $product['price'];
            $list['stock'] = $product['stock'];
            $list['stock_show'] = $product['stock_show'];
            $list['original'] = $product['original']>0?$product['original']:'';
            $list['logistic'] = $product['logistic'];
            $list['freight_mould'] = $product['freight_mould'];
			$list['freight'] = $product['freight'];
			$list['purchase'] = $product['purchase'];
			$list['lnvoice'] = $product['lnvoice'];
			$list['auto_sent'] = $product['auto_sent'];
			$list['message'] = $product['message'];
			$list['user_discount'] = $product['user_discount'];
			$list['freight_type']=2;
			if(!$list['logistic']){
			    $list['freight_type']=0;
			}
            if ($list['freight_mould']) {
                $list['freight_type']=1;
            }
		}else{
			$list['freight'] = '0.00';
			$list['freight_type'] = 2;
			$list['purchase'] = 0;
			$list['user_discount'] = 1;
			$list['stock_show'] = 1;
			$list['lnvoice'] = 0;
			$list['auto_sent'] = 0;
		}
		return $list;
	}

	public function copy_product($pid,$newid){
		global $_M;
		$form = $this->get_product($pid);
		$this->insert_product_sql($newid,$form['paralist'],$form['logistic'],$form['price'],$form['stock_show'],$form['stock'],$form['original'],$form['freight_mould'],$form['freight'],$form['purchase'],$form['message'],$form['user_discount'],$form['lnvoice'],$form['auto_sent']);
		$splist = $this->get_splist($pid);
		foreach($splist as $val){
			#$this->insert_plist_sql($newid,$val['price'],$val['valuelist'],$val['stock'],0);
			$this->insert_goods_splist_sql($newid,$val['price'],$val['valuelist'],$val['stock'],0,$val['para_img']);
        }
	}

	public function del_product($pid){
		global $_M;
		$query = "DELETE FROM {$_M['table']['shopv2_product']} WHERE pid='{$pid}'";
		DB::query($query);
		$query = "DELETE FROM {$_M['table']['shopv2_plist']} WHERE pid='{$pid}'";
		DB::query($query);
	}

	public function save_product($pid,$form){
		global $_M;
		if($form['shop_paralist']){
			$paralist = stripslashes($form['shop_paralist']);
			$paralists = json_decode($paralist, true);
            $speclist = array();
            foreach ($paralists as $key=>$spec) {
                $speclist[$key]['spec_id'] =$spec['spec']['id'];
                foreach ($spec['values'] as $value)
                $speclist[$key]['value_id'][] =$value['id'];
            }

            ##$this->para_update($paralists);
            $speclist = jsonencode($speclist);
        }

		switch($form['freight_type']){
            case 0:
				$form['logistic'] = 0;
				$form['freight_mould'] = 0;
				$form['freight'] = 0;
			break;
            case 1:
                $form['logistic'] = 1;
                $form['freight'] = 0;
                break;
            case 2:
				$form['logistic'] = 2;
                $form['freight_mould'] = '';
			break;
		}
		if($this->get_product($pid)){
			$this->update_product_sql($pid,$speclist,$form['logistic'],$form['price'],$form['stock_show'],$form['stock'],$form['original'],$form['freight_mould'],$form['freight'],$form['purchase'],$form['shop_message'],$form['user_discount'],$form['lnvoice'],$form['auto_sent']);
		}else{
			$this->insert_product_sql($pid,$speclist,$form['logistic'],$form['price'],$form['stock_show'],$form['stock'],$form['original'],$form['freight_mould'],$form['freight'],$form['purchase'],$form['shop_message'],$form['user_discount'],$form['lnvoice'],$form['auto_sent']);
		}
		#$this->insert_plist($pid,$form['shop_plist'],$form['group_price']);
		$this->insert_goods_splist($pid,$form['shop_plist'],$form['group_price']);
	}

	public function para_update($paralist){
		global $_M;
		foreach($paralist as $val){
			if($val['value']){
				$query = "SELECT * FROM {$_M['table']['shopv2_para']} WHERE value='{$val[value]}'";
				$para = DB::get_one($query);
				if($para){
					if($para['valuelist']!=$val['valuelist']){
						$ypara = explode(',',$para['valuelist'].$val['valuelist']);
						$ypara = array_unique($ypara);
						$valuelist = '';
						foreach($ypara as $v){
							if($v)$valuelist.= $v.',';
						}
						$query = "UPDATE {$_M['table']['shopv2_para']} SET valuelist = '{$valuelist}' WHERE id = '{$para[id]}'";
						DB::query($query);
					}
				}else{
					$query = "INSERT INTO {$_M['table']['shopv2_para']} SET
						value          	= '{$val[value]}',
						valuelist     	= '{$val[valuelist]}'
					";
					DB::query($query);
				}
			}
		}
	}

	public function update_product_sql($pid,$paralist,$logistic,$price,$stock_show,$stock,$original,$freight_mould,$freight,$purchase,$message,$user_discount,$lnvoice,$auto_sent){
		global $_M;
		if(!$pid){
			return false;
		}
		$query = "UPDATE {$_M['table']['shopv2_product']} SET
			paralist     	= '{$paralist}',
			logistic     	= '{$logistic}',
			price        	= '{$price}',
			stock_show      = '{$stock_show}',
			stock        	= '{$stock}',
			original        = '{$original}',
			freight_mould   = '{$freight_mould}',
			freight         = '{$freight}',
			purchase        = '{$purchase}',
			message         = '{$message}',
			lnvoice         = '{$lnvoice}',
			user_discount   = '{$user_discount}',
			auto_sent       = '{$auto_sent}'
			WHERE pid       = '{$pid}'
		";
		DB::query($query);
		$this->update_searchlist($pid);
	}

	public function insert_product_sql($pid,$paralist,$logistic,$price,$stock_show,$stock,$original,$freight_mould,$freight,$purchase,$message,$user_discount,$lnvoice,$auto_sent){
		global $_M;
		if(!$pid){
			return false;
		}
		$query = "INSERT INTO {$_M['table']['shopv2_product']} SET
			pid          	= '{$pid}',
			paralist     	= '{$paralist}',
			logistic     	= '{$logistic}',
			price        	= '{$price}',
			stock_show      = '{$stock_show}',
			stock        	= '{$stock}',
			original        = '{$original}',
			freight_mould   = '{$freight_mould}',
			freight         = '{$freight}',
			purchase        = '{$purchase}',
			message         = '{$message}',
			lnvoice         = '{$lnvoice}',
			user_discount   = '{$user_discount}',
			auto_sent       = '{$auto_sent}'
		";
		DB::query($query);
		$inid = DB::insert_id();
		$this->update_searchlist($inid);
		return $inid;
	}

	public function update_searchlist($pid){
		global $_M;
		$s = '';
		$query  = "SELECT * FROM {$_M['table']['product']} WHERE id = {$pid}";
		$p = DB::get_one($query);
		$s .= $p['title'].'|';
		if($p['class1']){
			$cid = $p['class1'];
			$query  = "SELECT * FROM {$_M['table']['column']} WHERE id = {$cid}";
			$c = DB::get_one($query);
			$s .= $c['name'].'|';
		}
		if($p['class2']){
			$cid = $p['class2'];
			$query  = "SELECT * FROM {$_M['table']['column']} WHERE id = {$cid}";
			$c = DB::get_one($query);
			$s .= $c['name'].'|';
		}
		if($p['class3']){
			$cid = $p['class3'];
			$query  = "SELECT * FROM {$_M['table']['column']} WHERE id = {$cid}";
			$c = DB::get_one($query);
			$s .= $c['name'].'|';
		}

		$query  = "SELECT * FROM {$_M['table']['plist']} WHERE listid = '{$pid}' AND module = 3";
		$para = DB::get_all($query);
		foreach($para as $key=>$val){
			if(!$val['imgname'] && $val['info'])$s .= $val['info'].'|';
		}

		$query  = "SELECT * FROM {$_M['table']['shopv2_product']} WHERE pid = '{$pid}'";
		$st = DB::get_one($query);
		$paralistarray = jsondecode($st['paralist']);
		foreach($paralistarray  as $key=>$val){
			$s .= str_replace(',', '|', $val['valuelist']).'|';
		}
		$s = str_replace('||', '|',trim($s, '|'));
		$query = "UPDATE {$_M['table']['shopv2_product']} SET searchlist = '{$s}' WHERE pid = '{$pid}'";
		DB::query($query);
	}

	public function update_searchlist_all(){
		global $_M;
		$query = "SELECT * FROM {$_M['table']['shopv2_product']}";
		$result = DB::query($query);
		while($list = DB::fetch_array($result)){
			$this->update_searchlist($list['pid']);
		}
	}


	/*public function insert_plist($pid,$standard,$groupprice){
		global $_M;

		#$query = "DELETE FROM {$_M['table']['shopv2_plist']} WHERE pid='{$pid}'";
		#DB::query($query);
		if($standard) {
            $standard = stripslashes($standard);
            $standard = json_decode($standard,  true);
            foreach ($standard as $val) {
                $query = "SELECT *FROM {$_M['table']['shopv2_plist']} WHERE id = '{$val['id']}'";
                if (!DB::get_one($query)) {
                    $plistid = $this->insert_plist_sql($pid, $val['price'], $val['valuelist'], $val['stock'], $val['sales'], $val['para_img']);
                    $update_plist_ids[] = $plistid;
                } else {
                    $this->update_plist_sql($pid, $val['id'], $val['price'], $val['valuelist'], $val['stock'], $val['sales'], $val['para_img']);
                    $plistid = $val['id'];
                    $update_plist_ids[] = $plistid;
                }
            }
            #$this->insert_group_price($pid,$plistid,$groupprice);

            $query = "SELECT * FROM {$_M['table']['shopv2_plist']} WHERE pid = '{$pid}'";
            $plist = DB::get_all($query);
            foreach ($plist as $value) {
                if(!in_array($value['id'],$update_plist_ids)){
                    $del_id[] = $value['id'];
                    $query = "DELETE FROM {$_M['table']['shopv2_plist']} WHERE id='{$value['id']}'";
                    DB::query($query);
                }
            }
        }
	}

	public function insert_plist_sql($pid,$price,$valuelist,$stock,$sales,$para_img){
		global $_M;
		if(!$pid){
			return false;
		}
		$query = "INSERT INTO {$_M['table']['shopv2_plist']} SET
			pid          = '{$pid}',
			price        = '{$price}',
			valuelist    = '{$valuelist}',
			stock        = '{$stock}',
			sales        = '{$sales}',
			para_img	 = '{$para_img}'
		";
		DB::query($query);
		return DB::insert_id();
	}

    public function update_plist_sql($pid,$plist_id,$price,$valuelist,$stock,$sales,$para_img)
    {
        global $_M;
        if(!$pid){
            return false;
        }
        $query = "UPDATE {$_M['table']['shopv2_plist']} SET 
            pid= '{$pid}',
			price        = '{$price}',
			valuelist    = '{$valuelist}',
			stock        = '{$stock}',
			sales        = '{$sales}',
			para_img	 = '{$para_img}'
			WHERE id = '{$plist_id}'
		";
        DB::query($query);
    }*/

    //新商品规格
    private function insert_goods_splist($pid, $standard)
    {
        global $_M;
        if($standard) {
            $standard = stripslashes($standard);
            $standard = jsondecode($standard,  true);
            foreach ($standard as $val) {
                $query = "SELECT * FROM {$_M['table']['shopv2_goods_splist']} WHERE id = '{$val['id']}'";
                if (!DB::get_one($query)) {
                    $plistid = $this->insert_goods_splist_sql($pid, $val['price'], $val['valuelist'], $val['stock'], $val['sales'], $val['para_img']);
                    $update_plist_ids[] = $plistid;
                } else {
                    $this->update_goods_splist_sql($pid, $val['id'], $val['price'], $val['valuelist'], $val['stock'], $val['sales'], $val['para_img']);
                    $plistid = $val['id'];
                    $update_plist_ids[] = $plistid;
                }
            }

            $this->del_old_splist($pid, $update_plist_ids);
        }
    }


    /**
     * 去除无用split信息
     */
    private function del_old_splist($pid, $update_plist_ids)
    {
        global $_M;
        $query = "SELECT * FROM {$_M['table']['shopv2_goods_splist']} WHERE pid = '{$pid}'";
        $plist = DB::get_all($query);


        foreach ($plist as $value) {
            if(!in_array($value['id'],$update_plist_ids)){
                $del_id[] = $value['id'];
                $query = "DELETE FROM {$_M['table']['shopv2_goods_splist']} WHERE id='{$value['id']}' AND pid='{$pid}'";
                DB::query($query);
                #dump($query);

                $query = "DELETE FROM {$_M['table']['shopv2_goods_relation']} WHERE splist_id='{$value['id']}'";
                DB::query($query);
                #dump($query);
            }
        }
    }

    private function insert_goods_splist_sql($pid, $price, $valuelist, $stock, $sales, $para_img)
    {
        global $_M;
        if(!$pid){
            return false;
        }
        $query = "INSERT INTO {$_M['table']['shopv2_goods_splist']} SET
			pid          = '{$pid}',
			price        = '{$price}',
			stock        = '{$stock}',
			sales        = '{$sales}',
			para_img	 = '{$para_img}',
			lang	     = '{$_M['lang']}'
		";
        DB::query($query);
        $goods_splist_id = DB::insert_id();

        $this->insert_goods_relation($goods_splist_id, $valuelist, $pid);

        return $goods_splist_id;
    }

    private function update_goods_splist_sql($pid, $splist_id, $price, $valuelist, $stock, $sales, $para_img)
    {
        global $_M;
        if(!$pid){
            return false;
        }
        $query = "UPDATE {$_M['table']['shopv2_goods_splist']} SET 
            pid          = '{$pid}',
			price        = '{$price}',
			stock        = '{$stock}',
			sales        = '{$sales}',
			para_img	 = '{$para_img}'
			WHERE id = '{$splist_id}' AND lang='{$_M['lang']}'
		";
        DB::query($query);

        $this->insert_goods_relation($splist_id, $valuelist, $pid);

    }

    private function insert_goods_relation($splist_id ,$valuelist, $pid)
    {
        global $_M;
        foreach ($valuelist as $value) {
                $this->insert_goods_relation_sql($splist_id, $value['value_id'], $value['spec_id'], $pid);
        }
    }

    private function insert_goods_relation_sql($splist_id, $value_id, $spec_id, $pid)
    {
        global $_M;
        $query = "SELECT * FROM {$_M['table']['shopv2_goods_relation']} WHERE splist_id='{$splist_id}' AND spec_value_id='{$value_id}' AND  spec_id='{$spec_id}' AND pid='{$pid}'";
        if (!DB::get_one($query)) {
            $query = "INSERT INTO {$_M['table']['shopv2_goods_relation']} SET splist_id='{$splist_id}' ,spec_value_id='{$value_id}' ,spec_id='{$spec_id}' ,pid='{$pid}'";
            DB::query($query);
        }
        $this->clear_relation();
        if (!DB::errno()) {
            return DB::insert_id();
        } else {
            return false;
        }
    }

    //清除失效关联记录
    private function clear_relation()
    {
        global $_M;
        $query = $query = "SELECT `id` FROM {$_M['table']['shopv2_goods_splist']}";
        $res = DB::get_all($query);
        foreach ($res as $item) {
            $splist_ids []= $item['id'];
        }
        $splist_ids_str = "(";
        $splist_ids_str .= implode(',', $splist_ids);
        $splist_ids_str .= ")";
        $query = "DELETE FROM {$_M['table']['shopv2_goods_relation']} WHERE `splist_id` NOT IN {$splist_ids_str}";
        DB::query($query);


        $query = $query = "SELECT `id` FROM {$_M['table']['shopv2_goods_spec_value']}";
        $res = DB::get_all($query);
        foreach ($res as $item) {
            $splist_value_ids[] = $item['id'];
        }
        $splist_value_ids_str = "(";
        $splist_value_ids_str .= implode(',', $splist_value_ids);
        $splist_value_ids_str .= ")";
        $query = "DELETE FROM {$_M['table']['shopv2_goods_relation']} WHERE `spec_value_id` NOT IN {$splist_value_ids_str}";
        DB::query($query);
    }

    /**
     * @param array $paralist
     * @return mixed
     */
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

    /*public function get_goods_splist($pid)
    {
        global $_M;
        $query = "SELECT * FROM {$_M['table']['shopv2_goods_splist']} WHERE pid='{$pid}' AND lang='{$_M['lang']}'";
        $goodspe = DB::get_all($query);
        foreach ($goodspe as $item) {
            $splist[$item['id']] = $item;
        }

        $query  = "SELECT t_splist.id,t_rela.spec_value_id FROM {$_M['table']['shopv2_goods_splist']} as t_splist LEFT JOIN {$_M['table']['shopv2_goods_relation']} as t_rela ON t_splist.id=t_rela.splist_id WHERE t_splist.pid='{$pid}';";
        $rula = DB::get_all($query);

        foreach ($rula as $item) {
            $spec_value = $this->get_spec_value($item['spec_value_id']);
            $spec = $this->get_spec($spec_value['spec_id']);
            $name = ['spec_id'=>$spec['id'],'specn'=>$spec['name'] ];
            $value = ['value_id'=>$spec_value['id'],'specv' => $spec_value['value']];
            $valuelist = array_merge($name, $value);
            $splist[$item['id']]['valuelist'][] = $valuelist;
        }

        return $splist;
    }*/

    public function get_goods_splist($pid)
    {
        global $_M;
        $query = "SELECT * FROM {$_M['table']['shopv2_goods_splist']} WHERE pid='{$pid}' AND lang='{$_M['lang']}'";
        $goodspe = DB::get_all($query);

        $query  = "SELECT t_splist.id,t_rela.spec_value_id FROM {$_M['table']['shopv2_goods_splist']} as t_splist LEFT JOIN {$_M['table']['shopv2_goods_relation']} as t_rela ON t_splist.id=t_rela.splist_id WHERE t_splist.pid='{$pid}';";
        $rula = DB::get_all($query);

        foreach ($rula as $item) {
            $spec_value = $this->get_spec_value($item['spec_value_id']);
            $spec = $this->get_spec($spec_value['spec_id']);
            $name = array('spec_id'=>$spec['id'],'specn'=>$spec['name']);
            $value = array('value_id'=>$spec_value['id'],'specv' => $spec_value['value']);
            $valuelist = array_merge($name, $value);
            foreach ($goodspe as $key => $gspec) {
                if ($gspec['id'] == $item['id']) {
                    $goodspe[$key]['valuelist'][] = $valuelist;
                }
            }
        }
        return $goodspe;
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

    public function get_spec_valuelist_str($spec_valuelist)
    {
        global $_M;
        $splist_str = '';
        foreach ($spec_valuelist as $value) {
            $splist_str .= $value['specn'] . "-" . $value['specv'].' ' ;
        }
        return $splist_str;
    }



    public function get_product($pid){
		global $_M;
		$query   = "SELECT * FROM {$_M['table']['shopv2_product']} WHERE pid='{$pid}'";
		$product = DB::get_one($query);
		return $product;
	}

    public function get_sys_product($pid){
        global $_M;
        $query   = "SELECT * FROM {$_M['table']['product']} WHERE id='{$pid}'";
        $product = DB::get_one($query);
        return $product;
    }

	/*public function get_plist($pid){
		global $_M;
		$query   = "SELECT * FROM {$_M['table']['shopv2_plist']} WHERE pid='{$pid}'";
		$plist = DB::get_all($query);
		return $plist;
	}*/

	public function get_splist($pid){
		global $_M;
		$query   = "SELECT * FROM {$_M['table']['shopv2_goods_splist']} WHERE pid='{$pid}'";
		$splist = DB::get_all($query);
		return $splist;
	}

	public function get_para(){
		global $_M;
		$query = "SELECT * FROM {$_M['table']['shopv2_para']} WHERE value!=''";
		$para = DB::get_all($query);
		foreach($para as $val){
			$valuelist = explode(',',$val['valuelist']);
			$paras[$val['value']] = $valuelist;
		}
		return $paras;
	}

	public function get_tmpname($tmpname){
		if($tmpname == 'product_shop_index'){
			return PATH_WEB.'app/app/shop/admin/templates/product_shop_index.php';
		}
		if($tmpname == 'product_shop'){
			return PATH_WEB.'app/app/shop/admin/templates/product_shop.php';
		}
	}

	public function get_group_price($pid){
	    global $_M;
        $query = "SELECT * FROM {$_M['table']['shopv2_goods_splist']} WHERE pid='{$pid}'";
        $splist = DB::get_all($query);

        $gprice_list = array();
        foreach ($splist as $val){
            $query = "SELECT * FROM {$_M['table']['shopv2_group_price']} WHERE plist_id='{$val['id']}'";
            $gprice = DB::get_one($query);
            $gprice_list[] = $gprice;
        }
        return $gprice_list;
    }

    public function insert_group_price($pid,$plistid,$groupprice){
        global $_M;
        $query = "DELETE FROM {$_M['table']['shopv2_group_price']} WHERE pid='{$pid} AND plist_id = '{$plistid}'";
        DB::query($query);
         if($groupprice){
             $groupprice = stripslashes($groupprice);
             $groupprice = json_decode($groupprice, true);
        }
    }

	public function plgin_json_list(){
		global $_M;
		if($_M['config']['shopv2_open'] == 0){return false;}
		$moduleclass = load::mod_class('content/class/sys_product', 'new');
		if($_M['form']['class1_select']=='null'&&$_M['form']['class2_select']=='null'&&$_M['form']['class3_select']=='null'){
				$class1 = $_M['form']['class1'];
				$class2 = $_M['form']['class2'];
				$class3 = $_M['form']['class3'];
			}else{
				$class1 = $_M['form']['class1_select'];
				$class2 = $_M['form']['class2_select'];
				$class3 = $_M['form']['class3_select'];
			}
            if($_M['form']['class1_select']==$_M[word][allcategory] && $_M['form']['class1']){
                	$class1 = $_M['form']['class1'];
                	$class2 = $_M['form']['class2'];
				    $class3 = $_M['form']['class3'];
            }

			$class1 = $class1 == ' ' ? 'null' : $class1;
			$class2 = $class2 == ' ' ? 'null' : $class2;
			$class3 = $class3 == ' ' ? 'null' : $class3;

		$keyword = $_M['form']['keyword'];
		$search_type = $_M['form']['search_type'];
		$orderby_hits = $_M['form']['orderby_hits'];
		#$orderby_addtime = $_M['form']['orderby_addtime'];
		$orderby_pudatetime = $_M['form']['orderby_updatetime'];

		$ps = $_M['config']['shopv2_open']?$_M['table']['product'].'.':'';

		$where = $class1&&$class1!='所有栏目'&&$class1!='null'?"and {$ps}class1 = '{$class1}'":'';
		$where.= $class2&&$class2!='null'?"and {$ps}class2 = '{$class2}'":'';
		$where.= $class3&&$class3!='null'?"and {$ps}class3 = '{$class3}'":'';
		$where.= $keyword?"and {$ps}title like '%{$keyword}%'":'';
		switch($search_type){
			case 0:break;
			case 1:
				$where.= "and {$ps}displaytype = '0'";
			break;
			case 2:
				$where.= "and {$ps}com_ok = '1'";
			break;
		}

		if($class3!='null' &&$class3){
                 $classnow=$class3;
			}elseif($class2!='null' && $class2){
                 $classnow=$class2;
			}else{
				 $classnow=$class1;
			}
		$met_class = $moduleclass->column(2,3);
        $order = $moduleclass->list_order($met_class[$classnow]['list_order']);
        if($orderby_hits)$order = "{$ps}hits {$orderby_hits}";
        #if($orderby_addtime)$order = "{$ps}addtime {$orderby_addtime}";
        if($orderby_pudatetime)$order = "{$ps}updatetime {$orderby_pudatetime}";

        if($_M['config']['shopv2_open']){//开启在线订购时
			$orderby_stock = $_M['form']['orderby_stock'];
			$orderby_sales = $_M['form']['orderby_sales'];
			$orderby_price = $_M['form']['orderby_price'];
			if($orderby_stock)$order = "{$_M['table']['shopv2_product']}.stock {$orderby_stock}";
			if($orderby_sales)$order = "{$_M['table']['shopv2_product']}.sales {$orderby_sales}";
			if($orderby_price)$order = "{$_M['table']['shopv2_product']}.price {$orderby_price}";
			if($search_type==4)$where.= "and {$_M['table']['shopv2_product']}.stock = '0'";
		}

		$userlist = $this->json_product_list($where, $order);

		foreach($userlist as $key=>$val){
			//开启在线订购时
			if($_M['config']['shopv2_open'])$val['price_html'] = '<p style="color:#f60;">'.load::app_class('shop/web/class/web_func', 'new')->price_str($val['price']).'</p>';
			//
			$val['url']   = $moduleclass->url($val,3);
			$val['state'] = $val['displaytype']?'':'<span class="label label-default">'.$_M['word']['app_shop_web_hidden'].'</span>';
			if(!$val['state'])$val['state'] = strtotime($val['addtime'])>time()?'<span class="label label-default">'.$_M['word']['app_shop_timing_release'].'</span>':'';
			$val['state'].= $val['com_ok']?'<span class="label label-info" style="margin-left:8px;">'.$_M['word']['app_shop_tocom'].'</span>':'';
			$val['state'].= $val['top_ok']?'<span class="label label-success" style="margin-left:8px;">'.$_M['word']['app_shop_totop'].'</span>':'';
			$list = array();
			$list[] = "<input name=\"id\" type=\"checkbox\" value=\"{$val[id]}\">";
			$list[] = "
				<div class=\"media\">
				  <div class=\"media-left\">
					<a href=\"{$val['url']}\" title='{$val['title']}' target=\"_blank\">
					  <img class=\"media-object\" src=\"{$val[imgurl]}\" width=\"60\" alt='{$val['title']}'>
					</a>
				  </div>
				  <div class=\"media-body\">
					<a href=\"{$val['url']}\" title='{$val['title']}' target=\"_blank\">{$val['title']}</a>
					{$val['price_html']}
				  </div>
				</div>
			";
			$list[] = $val['hits'];
			if($_M['config']['shopv2_open']){//开启在线订购时
				$list[] = $val['stock'];
				$list[] = $val['sales'];
				if($val['stock']==0)$val['state'].= '<span class="label label-danger" style="margin-left:8px;">'.$_M['word']['app_shop_sold_out'].'</span>';
			}
			$list[] = $val['updatetime'];
			$list[] = $val['state'];
			$list[] = "<input name=\"no_order-{$val['id']}\" type=\"text\" class=\"ui-input text-center\" value=\"{$val[no_order]}\">";
            $operat = "<a href=\"{$_M['url']['own_form']}a=doeditor&id={$val['id']}&select_class1={$class1}&select_class2={$class2}&select_class3={$class3}\" class=\"edit\">{$_M[word][editor]}</a><span class=\"line\">-</span><a href=\"{$_M['url']['own_form']}a=dolistsave&submit_type=del&allid={$val['id']}\" data-toggle=\"popover\" class=\"delet\">{$_M[word][delete]}</a>";
            if($val['auto_sent']){
                $operat.="<span class=\"line\">-</span><a href='#' class='auto-sent' data-id='{$val['id']}' data-toggle='modal' data-target='.auto-sent-modal'>{$_M['word']['app_shop_set_shipping_code']}</a>";
            }
            $list[] = $operat;
            $rarray[] = $list;
		}
		$this->json_return($rarray);
		return true;
	}

    public function delpara($form)
    {
        global $_M;
        $value = $form['value'];
        $valuename = $form['valuename'];
        $query = "SELECT * FROM {$_M['table']['shopv2_para']} WHERE value='{$valuename}'";
        $row = DB::get_one($query);
        $paralist = explode(",", trim($row['valuelist'],','));
        foreach ($paralist as $key=>$val) {
            if ($val == $value) {
                unset($paralist[$key]);
            }
        }

        if ($paralist) {
            $valelist = implode(',', $paralist);
            $valelist .= ',';
            $query = "UPDATE {$_M['table']['shopv2_para']} SET valuelist = '{$valelist}' WHERE value = '{$valuename}'";
            DB::query($query);
        }else{
            $query = "DELETE FROM {$_M['table']['shopv2_para']} WHERE value = '{$valuename}'";
            DB::query($query);
        }

        $retun = array();
        $retun['success'] = $_M['word']['physicaldelok'];
        echo jsonencode($retun);
        die();
    }
}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>