<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::own_class('web/class/web_shop_base');

class favorite extends web_shop_base{

	public $favorite;

	public function __construct() {
		global $_M;
		parent::__construct();
		$this->favorite = load::own_class('web/class/web_favorite', 'new');
		$_M['config']['own_order']=3;
	}

	public function doindex() {
		global $_M;
		require_once $this->view('app/shop_favorite',$this->input);
	}

	public function domyfavorite()
	{
		global $_M;
		$favorites = $this->favorite->list_favorite();
		if($favorites){
			echo json_encode(array('status'=>1,'data'=>$favorites));die;
		}else{
			echo json_encode(array('status'=>0,'data'=>$_M['word']['data_empty']));die;
		}

	}

	 /**
     * 添加或取消收藏
     */
    public function dofavorite() {
        global $_M;
        if(!is_numeric($_M['form']['pid'])) {
            echo json_encode(array('status'=>0,'msg'=>$_M['word']['app_shop_error']));die;
        }
        $data = load::own_class('web/class/web_favorite', 'new')->add_delete_favorite($_M['form']['pid']);
        if($data['code']){
        	echo json_encode(array('status'=>1,'msg'=>$data['msg']));die;
        }else{
            echo json_encode(array('status'=>0,'msg'=>$data['msg']));die;
        }
    }

}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>