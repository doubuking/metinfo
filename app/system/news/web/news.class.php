<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::sys_class('web');

class news extends web {
	public function __construct() {
		global $_M;
		parent::__construct();
	}

	public function showpage($module) {
		global $_M;
		$_M['activity_id'] = $_M['form']['id'];
		$data = load::sys_class('label', 'new')->get($module)->get_one_list_contents($_M['form']['id']);
		$data['updatetime'] = date($_M['config']['met_contenttime'], strtotime($data['original_updatetime']));
		$data['addtime'] = date($_M['config']['met_contenttime'], strtotime($data['original_addtime']));
		$this->check($data['access']);
		$this->add_array_input($data);
		$classnow = $data['class3'] ? $data['class3'] :($data['class2'] ? $data['class2'] : $data['class1']);
		$this->input_class($classnow);
		$this->seo($data['title'], $data['keywords'], $data['description']);
		$this->seo_title($data['ctitle']);
	}

    public function dosaveActivity ($module)
    {
        global $_M;
        //检测用户登录状态
        $this->checkmember();
        $info = $_M['form'];
        $memberData = member_information();

        //验证验证码
        if(!load::sys_class('pin', 'new')->check_pin($_M['form']['code'])){
            okinfo(-1, $_M['word']['membercode']);
        }
        $form = '';
        $datetime = date('Y-m-d H:i:s',time());
		foreach ($info['name'] as $key=>$val){
            $form .= "('{$_M['user']['id']}','{$val}','{$info['phone'][$key]}','{$info['email'][$key]}','{$info['activity_id']}','{$datetime}'),";

		}
		$sql = "INSERT INTO met_participants (`user_id`,`name`,`phone`,`email`,`act_id`,`addtime`) VALUES ".rtrim($form,',');

        $row = DB::query($sql);
        $instid = DB::insert_id();

        $sql1 = "SELECT id,is_activity starttime,endtime,isfree,cost,access FROM met_news WHERE id = ".$info['activity_id'];

        $result = DB::get_one($sql1);


        $sql2 = "SELECT `count` FROM met_free_quota WHERE new_id = {$info['activity_id']} AND access_id = {$memberData['access']}";

        $freeData = DB::get_one($sql2);

        //统计该用户已经报了几次
        $sql3 = "SELECT COUNT(*) as count FROM met_participants WHERE act_id = {$info['activity_id']} AND user_id = {$memberData['id']}";

        $result3 = DB::get_one($sql3);

        if(count($info['name']) <= ($freeData['count'])-$result3['count']){
            okinfo(HTTP_REFERER, $_M['word']['success']);
            die();
        }

        //(总名额-免费名额)  *  每人费用
        $total = (count($info['name']) - $freeData['count'])*$result['cost'];



        $resultData = array(
            'first_id'=>$instid, //一组数据第一次插入产生的id
            'count'=>count($info['name']), //插入的个数
            'news_id'=>$info['activity_id'],
            'price'=>$total,
            'no'=>10
        );
        if($total>0){
            $this->dopayactv($resultData);
        }else{
            okinfo(HTTP_REFERER, '报名成功');
            die();
        }


	}

    /**
     * 付费
     */
    public function dopayactv($resultdata)
    {
        global $_M;
        $data = array();
        $payclass = load::mod_class('pay/pay_op','new');
        $pricestr       = $payclass->price_str($resultdata['price']);
        $out_trade_no   = $payclass->getRid();
        $data['subject']        = "{$_M['word']['userbuy']}- [$pricestr]";
        $data['body']           = "{$_M['word']['userbuylist']}-{$out_trade_no}";
        $data['total_fee']      = $resultdata['price'];
        $data['out_trade_no']   = $out_trade_no;
        $data['callback_url']   ="{$_M['url']['profile']}" ;
        $data['sys_callback']   ="{$_M['url']['paygroup']}&a=dochangepayactv" ;
        $data['no']             = $resultdata['no'] ;
        $data['attach']         = base64_encode(jsonencode($resultdata));
        $payhtml = $payclass->createPayForm($data);
        echo $payhtml;
        die();
    }

    /**
     * 支付回调
     */
    public function dochangepayactv()
    {
        global $_M;
        $payclass = load::mod_class('pay/pay_op','new');
        $data = $payclass->de_code($_M['form']['codestr']);
        if ($data['no'] != 11) {
            return false;
        }
        $paygroup = jsondecode(base64_decode($data['attach']));

        if(bccomp((float)$data['total_fee'], (float)$paygroup['price']) !== 0){
            return false;
        }else{
            if ($data['total_fee'] != $paygroup['price']) {
                return false;
            }
        }
        $arr = array();
        //计算总共插入的个数
        for($i=0;$i<$paygroup['count'];$i++){
            $arr[] = $paygroup['first_id']+$i;
        }

        $upstr = $this->db_create_in($arr);

        $upsql = "UPDATE met_participants SET `status`= 1 WHERE id {$upstr}";

        DB::query($upsql);

        return true;

    }

    /**
     * 创建像这样的查询: "IN('a','b')";
     *
     * @access   public
     * @param    mix      $item_list      列表数组或字符串,如果为字符串时,字符串只接受数字串
     * @param    string   $field_name     字段名称
     * @author   wj
     *
     * @return   void
     */
    public function db_create_in($item_list, $field_name = '')
    {
        if (empty($item_list))
        {
            return $field_name . " IN ('') ";
        }
        else
        {
            if (!is_array($item_list))
            {
                $item_list = explode(',', $item_list);
                foreach ($item_list as $k=>$v)
                {
                    $item_list[$k] = intval($v);
                }
            }

            $item_list = array_unique($item_list);
            $item_list_tmp = '';
            foreach ($item_list AS $item)
            {
                if ($item !== '')
                {
                    $item_list_tmp .= $item_list_tmp ? ",'$item'" : "'$item'";
                }
            }
            if (empty($item_list_tmp))
            {
                return $field_name . " IN ('') ";
            }
            else
            {
                return $field_name . ' IN (' . $item_list_tmp . ') ';
            }
        }
    }


    public function checkmember() {
        global $_M;
        $user = $this->get_login_user_info();
        if(!$user){
            okinfo($_M['url']['site'].'member/login.php?');
            return false;
        }
        return true;
    }

	public function listpage($module) {
		global $_M;
		if($_M['form']['pseudo_jump'] && $_M['form']['list']!=1){
			if(!is_numeric($_M['form']['metid'])){
				$custom = load::sys_class('label', 'new')->get($module)->database->get_list_by_filename($_M['form']['metid']);
				$_M['form']['metid'] = $custom['0']['id'];
			}
			$_M['form']['id'] = $_M['form']['metid'];
			return 'show';
		}

		$classnow = $_M['form']['class3'] ? $_M['form']['class3'] :($_M['form']['class2'] ? $_M['form']['class2'] : $_M['form']['class1']);
		$classnow = $classnow ? $classnow : $_M['form']['metid'];
        if(!is_numeric($classnow)){
            $custom = load::sys_class('label', 'new')->get('column')->get_column_folder($_M['form']['metid']);
            $classnow = $custom['0']['id'];
        }
        $classnow = $this->input_class($classnow);
        $data = load::sys_class('label', 'new')->get('column')->get_column_id($classnow);
        $this->check($data['access']);
        unset($data['id']);
        $this->add_array_input($data);
		$this->seo($data['name'], $data['keywords'], $data['description']);
		$this->seo_title($data['ctitle']);
		$this->add_input('page', $_M['form']['page']);
		$this->add_input('list', 1);
		return 'list';
	}

  public function donews() {
		global $_M;
		if($this->listpage('news') == 'list'){
			require_once $this->template('tem/news');
		}else{
			$this->doshownews();
		}
  }

	public function doshownews(){
		global $_M;
		$this->showpage('news');
		require_once $this->template('tem/shownews');
	}

}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>
