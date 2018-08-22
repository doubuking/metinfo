<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');
load::own_class('web/class/web_shop_base');
/**
 * 产品模块
 */

class shop_show extends web_shop_base{

	public function __construct() {
		global $_M;
		$this->de_construct();
	}

	public function doindex($product) {
		global $_M;
  //       if($_M['config']['metinfover']=='v2'){
  //           $load_shop_new=true;
		// }else if(file_exists(PATH_TEM.'shop_showproduct.php')){
		// 	$this->input=$product;
		// 	if(!$_M['form']['id']){
		// 		$_M['form']['id'] = $this->get_id($_M['form']['metid'], $_M['form']['murlid'], $_M['form']['furlid']);
		// 	}
		// 	$goods_class = load::own_class('web/class/web_goods', 'new');
		// 	$goods = $goods_class->get_goods_by_pid($_M['form']['id'], 0, 0, 1, 1);
		// 	$goods = load::plugin('doshopv2_show_goods', 1, array('goods'=>$goods));//加载插件
		// 	#$para_stock = $goods_class->get_plist_list($goods['pid']); //老规格
  //           $para_stock = $goods_class->get_splist_list($goods['pid']); //新规格
		// 	$stockjson = jsonencode($para_stock);

		// 	$displaylist = array();
		// 	foreach($product['displayimgs'] as $key => $val){
		// 		$displaylist[$key]['imgurl'] = $val['img'];
		// 		$displaylist[$key]['size'] = $val['x'].'x'.$val['y'];

		// 	}
		// 	$is_favorite = load::own_class('web/class/web_favorite', 'new')->is_favorite($_M['form']['id']);

		// 	require_once $this->template('tem/shop_showproduct');
		// }else{
		// 	$load_shop_new=true;
		// }
  //       if($load_shop_new){
			require PATH_WEB."templates/".$_M['config']['met_skin_user'].'/metinfo.inc.php';
			$view = load::sys_class('engine','new');
			$shop_showproduct_paths=$template_type == 'ui'?'':'app/';
			if($template_type != 'ui') $product['shopv2_recommend_type']=intval($_M['config']['shopv2_recommend'])?'com':'all';
			$view->dodisplay($shop_showproduct_paths.'shop_showproduct',$product);
		// }
	}

	public function get_id($metid, $murlid, $furlid) {
		global $_M;
		$mid = 0;
		if($metid){
			if(is_numeric($metid)){
				$mid = $metid;
			}else{
				$query = "select * from {$_M['table']['product']} where filename='{$metid}'";
				$url_con = DB::get_one($query);
				$mid = $url_con['id'];
			}
		}else{
			if(strstr('showproduct', $murlid) && $_M['config']['met_htmpagename'] == 0){
				$mid = str_replace('showproduct', '', $murlid);
			}

			if(is_numeric($murlid) && $_M['config']['met_htmpagename'] == 1){
				$mid = substr($murlid, 8);
			}

			if(strpos($murlid,$furlid)!==false && $_M['config']['met_htmpagename'] == 2){
				$mid = str_replace('product', '', $murlid);
			}

			if(!$mid){
				$query = "select * from {$_M['table']['product']} where filename='{$murlid}'";
				$url_con = DB::get_one($query);
				$mid = $url_con['id'];
				//$mid =
			}
		}
		return $mid;
	}

}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>