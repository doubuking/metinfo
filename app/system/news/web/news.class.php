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

        $info = $_M['form'];
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

        if(!$row){
            okinfo(-1, $_M['lang']['opfailed']);
        }
        okinfo(HTTP_REFERER, $_M['word']['success']);

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
