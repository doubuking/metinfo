<?php

defined('IN_MET') or exit('No permission');
define ('PATH_APP_FILE', PATH_ALL_APP.'shop/');
function get_goods_sprice_str($price){
	global $_M;
    $price_str = load::own_class('web/class/web_func', 'new')->price_str($price);
    return $price_str;
    $price = $price ? $_M['config']['shopv2_price_str_prefix'].number_format($price, $_M['config']['shopv2_price_decimal'], '.', '').$_M['config']['shopv2_price_str_suffix'] : $_M['config']['shopv2_price_str_prefix'].'0.00'.$_M['config']['shopv2_price_str_suffix'];
    return $price;
}
function get_goods($pid){
    global $_M,$db;
	$query = "SELECT * FROM {$_M['table']['shopv2_product']} WHERE pid = '{$pid}'";
	if($db){
		$data = $db->get_one($query);
	}else{
		$data = DB::get_one($query);
	}
	$data['price_str'] = get_goods_sprice_str($data['price']);
	$data['original_str'] = get_goods_sprice_str($data['original']);
	return $data;
}
class plugin_shop{

	public function __construct()
	{
		global $_M;

	}
	public function doadmin(){
		global $_M;
		if(strpos($_SERVER['PHP_SELF'], 'content/product/index.php')){
			echo("<script type='text/javascript'>location.href='{$_M['url']['adminurl']}n=content&c=product_admin&a=doindex&class1={$_M['form']['class1']}'</script>");
			exit;
		}
	}

	public function doweb(){

		global $_M,$userinfo;
		$dir = "app/app/shop/web/class/web_shop_plugin.class.php";
		if(file_exists('./'.$dir)){
			$is_have = 1;
			require_once './'.$dir;
		}
		if(file_exists('../'.$dir)){
			$is_have = 1;
			require_once '../'.$dir;
		}
		if(file_exists('../../'.$dir)){
			$is_have = 1;
			require_once '../../'.$dir;
		}
		if(file_exists('../../../'.$dir)){
			$is_have = 1;
			require_once '../../../'.$dir;
		}
		if($is_have == 1 && $_M['config']['shopv2_open'] == 1){
			$p = new web_shop_plugin();
			$p->url();
			$userinfo = $p->user_login_info();
		}
		$php_self  = explode('/', PHP_SELF);
		if($userinfo && $php_self[count($php_self) - 2] == 'member'){
			if($php_self[count($php_self) - 1] == 'index.php'){
				header('Location: ../shop/profile.php?lang='.$_M['lang']);
				die();
			}
		}
	}

	public function doget_goods($pid)
	{
		global $_M,$db;
        $goods_class = load::own_class('web/class/web_goods', 'new');

        $data = $goods_class->get_goods_by_pid($pid,0,0,1,1);

        $data['price_str_number_format'] = $data['price'] ? number_format($data['price'], 2, '.', ''): '0.00';

		// 可购买数量
		$data['shopmax'] = $data['purchase'] ? $data['purchase'] : $data['stock'];// 总量
		// 最少可购
		$data['shopmin']=$data['shopmax'] ? 1:0;
		// 商品规格的价格信息
		#$para_stock = $goods_class->get_plist_list($pid);  //老
        $para_stock = $goods_class->get_splist_list($pid);  //新
        $data['stockjson'] = jsonencode($para_stock);


        #$data['shopv2_recommend_id']=$_M['config']['shopv2_recommend']==1?$data['class1']:$data['classnow'];
        $query = "SELECT * FROM {$_M['table']['column']} WHERE module='3' AND lang='{$_M['lang']}'";
        $res = DB::get_one($query);
        $data['shopv2_recommend_id']=$res['id'];


		// 收藏按钮
		$data['is_favorite'] = load::own_class('web/class/web_favorite', 'new')->is_favorite($pid);
		$data['favorite_href'] = $_M['user'] ? $_M['url']['shop_favorite_do']:$_M['url']['shop_member_login'];
		return $data;
	}

	public function doproduct_list(){
		global $_M;
		load::own_class('web/shop_list', 'new')->doindex();
		die();
	}

	public function doproduct_show($product){
		global $_M;
		load::own_class('web/shop_show', 'new')->doindex($product);
		die();
	}

	public function doproduct_plugin_class(){
			return load::app_class('shop/admin/class/sys_goods', 'new');

	}

	public function doseourl($para){
		$seourl = load::app_class('shop/admin/class/shop_seo_url', 'new');
		return $para['str'].$seourl->get($para['type']);
	}

	public function dopay($para){
		if($para['pay']['no'] == 10043){
            $payclass = load::mod_class('pay/class/pay_op','new');
            $para['pay']['pay_type'] = $payclass->getPayTypeName($para['pay']['pay_type']);
			load::app_class('shop/web/class/web_order', 'new')->order_pay($para['pay']['out_trade_no'], $para['pay']['pay_type'], $para['pay']['total_fee']);
		}
	}

	public function temporary_plugin_product_list($datainfo){
		global $searchlist,$searchs,$pricef,$pricet,$no_order,$gotonew;
		if($gotonew == 1){
			$goods = load::app_class('shop/web/class/web_goods', 'new');
			$data['dbname'] = $goods->get_sql_table();
			$sql = '';
			if($searchs){
				$sql .= $goods->get_sql_search($searchs, 1);
			}
			if($searchlist){
				$sql .= $goods->get_sql_search($searchlist, 2);
			}
			if($pricef || $pricet){
				$sql .= $goods->get_sql_price($pricef,$pricet);
			}

			$data['serch_sql'] = $datainfo['serch_sql']." {$sql} ";

			$data['order_sql'] = "ORDER BY ". $goods->get_sql_order($no_order);
			return $data;
		}
	}

	public function temporary_plugin_product_analysis($alist){
		global $gotonew;
		if($gotonew == 1){
			$alist = load::app_class('shop/web/class/web_goods', 'new')->analysis_array($alist);
			foreach($alist as $key=>$val){
				$alist[$key]['price_str'] = $val['price'] ? '￥'.number_format($val['price'], 2) : '￥0.00';
			}
		}
		return $alist;

	}

	public function temporary_plugin_product_page(){
		global $searchlist,$searchs,$pricef,$pricet,$no_order;
		global $_M;
		$url = '';
		if($searchlist || $no_order || $searchs){
			if($searchlist){
				$url = $_M['url']['shop_searchlist'].$searchlist.'/';
				return $url;
			}
			if($searchs){
				$url = $_M['url']['shop_searchs'].$searchs.'/';;
				return $url;
			}
			if($no_order){
				$url = 	$_M['url']['shop_no_order'].$no_order.'/';
				return $url;
			}
			/*
			if($pricef){
				$str .= "&pricef={$pricef}";
			}
			if($pricet){
				$str .= "&pricet={$pricet}";
			}
			*/
		}
		return $url;
	}


	public function search_order($para){
		global $_M;
		$order = $para['order'];
		if(M_NAME == 'product'){
			$list['name'] = $_M['word']['listsales'];
			$list['url']  = str_replace('&order=com', '&order=sales', $order['com']['url']);
			$order['sales'] = $list;
		}
		return $order;
	}

	public function module_get_list_by_class_query($para){
		global $_M;
		$sql = $para['query'];
		if(preg_match('/'.$_M['table']['product'].'/', $sql) && $_M['form']['order'] == 'sales'){
			if(preg_match('/(.+?)WHERE(.+?)ORDER BY(.+?)LIMIT(.+)/', $sql, $out)){
				$sql = "SELECT p.*,g.pid,g.sales FROM {$_M['table']['product']} AS p LEFT JOIN {$_M['table']['shopv2_product']} AS g on (p.id = g.pid) WHERE {$out[2]} ORDER BY sales DESC, id DESC LIMIT {$out[4]}";
			}
		}
		return $sql;
	}
}
?>