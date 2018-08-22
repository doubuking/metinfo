<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

class shop_search
{
    public $lang;

    public function __construct()
    {
        global $_M;
        $this->lang = $_M['lang'];
    }

    public function getSpeclist($type, $classnow, $page)
    {
        global $_M;
        $sys_auth = load::sys_class('auth', 'new');
        if($type == 'page'){//模块列表页面搜索
            $query = "SELECT `id`,`name` FROM {$_M['table']['shopv2_goods_spec']} WHERE `name`!='specadd' AND lang='{$_M['lang']}' ;";
            #die($query);
            $specs = DB::get_all($query);

            $url = load::sys_class('label', 'new')->get('tag')->get_list_page_url($classnow, $page).'&search=search';

            $specvurl = json_decode($sys_auth->decode($_M['form']['specv']), true);
            $price_low = $_M['form']['price_low'];
            $price_top = $_M['form']['price_top'];

            foreach ($specs as $key=>$spec) {
                $query = "SELECT * FROM {$_M['table']['shopv2_goods_spec_value']} WHERE spec_id='{$spec['id']}' AND lang='{$_M['lang']}';";
                $spec_values = DB::get_all($query);

                $id = $spec['id'];
                $urlnow = $specvurl;
                $urlnow[$id] = '';
                $data[$key]['name'] = $spec['name'];
                $data[$key]['id'] = $id;
                $p['name'] = $_M[word][weball];
                $p['url'] = $url . "&specv=" . urlencode($sys_auth->encode(json_encode($urlnow))).'&price_low='.$price_low.'&price_top='.$price_top;
                $p['id'] = 0;
                $data[$key]['list'][] = $p;


                foreach ($spec_values as $k => $val) {
                    $urlnow = $specvurl;
                    $urlnow[$id] = $val['id'];
                    $data[$key]['name'] = $spec['name'];
                    $data[$key]['id'] = $id;
                    $p['name'] = $val['value'];
                    $p['id'] = $val['id'];
                    $p['url'] = $url . "&specv=" . urlencode($sys_auth->encode(json_encode($urlnow))).'&price_low='.$price_low.'&price_top='.$price_top;
                    $data[$key]['list'][] = $p;
                }

                //选中
                if($specvurl[$data[$key]['id']]){
                    foreach($data[$key]['list'] as $skey => $sval){
                        if($sval['id'] == $specvurl[$data[$key]['id']]){
                            $data[$key]['list'][$skey]['check'] = 'para_select_option';
                        }
                    }
                }else{
                    $data[$key]['list'][0]['check'] = 'para_select_option';
                }
            }
        }
        return $data;
    }

    /**
     * @param $specv  規格ID=>規格值ID
     * @return string
     */
    public function get_search_list_by_specv_sql($specv)
    {
        global $_M;
        $sys_auth = load::sys_class('auth', 'new');
        $low = $_M['form']['price_low']?$_M['form']['price_low']:0;
        $top = $_M['form']['price_top'];
        if (!is_array($specv)) {
            #$sql = "SELECT t1.pid from {$_M['table']['shopv2_goods_relation']} AS t1 LEFT JOIN {$_M['table']['shopv2_goods_spec_value']} AS t2 ON t1.spec_value_id=t2.id where t2.`value` = '{$specv}'";

            $sql = "SELECT id FROM {$_M['table']['product']} WHERE lang='{$_M['lang']}'";
            if($low && $top){
                $sql = " SELECT pid FROM {$_M['table']['shopv2_product']} WHERE pid IN ({$sql}) AND  `price` BETWEEN {$low} AND {$top} UNION SELECT pid FROM {$_M['table']['shopv2_goods_splist']} WHERE pid IN ({$sql}) AND  `price` BETWEEN {$low} AND {$top} ";
            } elseif ($low) {
                $sql = " SELECT pid FROM {$_M['table']['shopv2_product']} WHERE pid IN ({$sql}) AND  `price` >= {$low} UNION SELECT pid FROM {$_M['table']['shopv2_goods_splist']} WHERE pid IN ({$sql}) AND  `price` >= {$low} ";
            } elseif ($top) {
                $sql = " SELECT pid FROM {$_M['table']['shopv2_product']} WHERE pid IN ({$sql}) AND  `price` <= {$top} UNION  SELECT pid FROM {$_M['table']['shopv2_goods_splist']} WHERE pid IN ({$sql}) AND  `price` <= {$top} ";
            }

        }else{
            $i = 0;
            $j = 0;

            foreach ($specv as $spec_id=>$specv_id) {

                if ($specv_id != ''){
                    $subsql[] = " SELECT * from {$_M['table']['shopv2_goods_relation']} WHERE spec_id='{$spec_id}' AND spec_value_id = '{$specv_id}' ";
                    $i++;
                }else{
                    #$subsql[] = " SELECT * from {$_M['table']['shopv2_goods_relation']} WHERE spec_id='{$spec_id}'";
                    $j++;
                }
            }


            if ($j != count($specv)) {
                //规格筛选
                $subsqlstr = implode(' UNION ', $subsql);
                $sql = "SELECT pid FROM (SELECT *,COUNT(splist_id)as counts FROM ({$subsqlstr}) AS t1 GROUP BY splist_id ORDER BY counts desc) AS t2 WHERE counts>={$i}";
                //价格区间
                if($low && $top){
                    $sql = " SELECT pid FROM {$_M['table']['shopv2_goods_splist']} WHERE pid IN ({$sql}) AND  `price` BETWEEN {$low} AND {$top}";
                } elseif ($low) {
                    $sql = " SELECT pid FROM {$_M['table']['shopv2_goods_splist']} WHERE pid IN ({$sql}) AND  `price` >= {$low} ";
                } elseif ($top) {
                    $sql = " SELECT pid FROM {$_M['table']['shopv2_goods_splist']} WHERE pid IN ({$sql}) AND  `price` <= {$top} ";
                }
            }else{
                //全部
                $sql = "SELECT id FROM {$_M['table']['product']} WHERE lang='{$_M['lang']}'";
                //价格区间
                if($low && $top){
                    $sql = " SELECT pid FROM {$_M['table']['shopv2_product']} WHERE pid IN ({$sql}) AND  `price` BETWEEN {$low} AND {$top} UNION SELECT pid FROM {$_M['table']['shopv2_goods_splist']} WHERE pid IN ({$sql}) AND  `price` BETWEEN {$low} AND {$top} ";
                } elseif ($low) {
                    $sql = " SELECT pid FROM {$_M['table']['shopv2_product']} WHERE pid IN ({$sql}) AND  `price` >= {$low} UNION SELECT pid FROM {$_M['table']['shopv2_goods_splist']} WHERE pid IN ({$sql}) AND  `price` >= {$low} ";
                } elseif ($top) {
                    $sql = " SELECT pid FROM {$_M['table']['shopv2_product']} WHERE pid IN ({$sql}) AND  `price` <= {$top} UNION  SELECT pid FROM {$_M['table']['shopv2_goods_splist']} WHERE pid IN ({$sql}) AND  `price` <= {$top} ";
                }
            }
        }
        return $sql;

    }

}
