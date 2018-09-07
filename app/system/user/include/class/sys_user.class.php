<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

/**
 * 前台会员类
 */

load::sys_class('user');

class sys_user extends user {
	public function json_user_list(){
		global $_M;

		$groupid = $_M['form']['groupid'];
		$keyword = $_M['form']['keyword'];
		$idvalid = $_M['form']['idvalid'];

		$search = $groupid ? " and groupid = '{$groupid}'":'';
		$search .= $idvalid ? ($idvalid==1?" and idvalid = '1'":" and (idvalid is null or idvalid = 0)"):'';
		$search.= $keyword?" and (username like '%{$keyword}%' || email like '%{$keyword}%' || tel like '%{$keyword}%')":'';

		$table = load::sys_class('tabledata', 'new');
		$order = "login_time DESC,register_time DESC";
		$where = "lang='{$_M['lang']}' {$search}";
		$userlist = $table->getdata($_M['table']['user'], '*', $where, $order);
		$user_group = array();
		$group = DB::get_all("SELECT * FROM {$_M[table][user_group]} WHERE lang = '{$_M[form]['lang']}'");
		foreach($group as $key=>$val){
			$user_group[$val['id']] = $val['name'];
		}

		foreach($userlist as $key=>$val){
			switch($val['source']){
				case 'weixin': $val['source'] = $_M['word']['weixinlogin']; break;
				case 'weibo': $val['source']  = $_M['word']['sinalogin']; break;
				case 'qq': $val['source']     = $_M['word']['qqlogin']; break;
				default:$val['source']        = $_M['word']['registration'] ; break;
			}
			if(!$val['login_time'])$val['login_time'] = $val['register_time'];
			$list = array();
			$list[] = "<input name=\"id\" type=\"checkbox\" value=\"{$val['id']}\">";
			$list[] = $val['username'];
			$list[] = $user_group[$val['groupid']];
			$list[] = timeFormat($val['register_time']);
			$list[] = timeFormat($val['login_time']);
			$list[] = $val['login_count'];
			$list[] = $val['valid']?$_M['word']['memberChecked']:$_M['word']['memberUnChecked'];
			$list[] = $val['idvalid']?$_M['word']['yes']:$_M['word']['no'];
			$list[] = $val['source'];
			$list[] = "<a href=\"{$_M['url']['own_form']}a=doeditor&id={$val['id']}\" class=\"edit\">".$_M['word']['editor']."</a><span class=\"line\">|</span><a href=\"{$_M['url']['own_form']}a=dodellist&allid={$val['id']}\" class=\"delet\" data-confirm='{$_M['word']['js7']}'>{$_M['word']['delete']}</a>";
			$rarray[] = $list;
		}

		$table->rdata($rarray);
	}



    public function json_enterprisel_user_list(){
        global $_M;

        $groupid = $_M['form']['groupid'];
        $keyword = $_M['form']['keyword'];
        $idvalid = $_M['form']['idvalid'];

        $search = $groupid ? " and groupid = '{$groupid}'":'';
        $search .= $idvalid ? ($idvalid==1?" and idvalid = '1'":" and (idvalid is null or idvalid = 0)"):'';
        $search.= $keyword?" and (username like '%{$keyword}%' || email like '%{$keyword}%' || tel like '%{$keyword}%')":'';

        $table = load::sys_class('tabledata', 'new');
        $order = "login_time DESC,register_time DESC";
        $where = "lang='{$_M['lang']}' {$search} and source='ent'";
        $userlist = $table->getdata($_M['table']['user'], '*', $where, $order);
        $user_group = array();
        $group = DB::get_all("SELECT * FROM {$_M[table][user_group]} WHERE lang = '{$_M[form]['lang']}'");
        foreach($group as $key=>$val){
            $user_group[$val['id']] = $val['name'];
        }

        foreach($userlist as $key=>$val){
            switch($val['source']){
                case 'weixin': $val['source'] = $_M['word']['weixinlogin']; break;
                case 'weibo': $val['source']  = $_M['word']['sinalogin']; break;
                case 'qq': $val['source']     = $_M['word']['qqlogin']; break;
                case 'ent': $val['source']     = $_M['word']['regenterprisel']; break;
                default:$val['source']        = $_M['word']['registration'] ; break;
            }
            if(!$val['login_time'])$val['login_time'] = $val['register_time'];

            $endtemptime = $val['endtime'];
            if(strtotime($val['endtime'])>time()){
                $val['endtime'] = $val['endtime'].'<br><span class="label label-success">会员中</span>';
            }else{
                $val['endtime'] = $val['endtime'].'<br><span class="label label-danger">过期</span>';
            }

            if($val['delay']){
                $val['endtime'] = $endtemptime.'<br><span class="label label-warning">临时延期</span>';
            }


            $list = array();
            $list[] = "<input name=\"id\" type=\"checkbox\" value=\"{$val['id']}\">";
            $list[] = $val['username'];

            $list[] = $user_group[$val['groupid']];
            $list[] = $val['endtime'];
            $list[] = timeFormat($val['register_time']);
            $list[] = timeFormat($val['login_time']);
            $list[] = $val['enterprisel'];
            $list[] = $val['contacts'];
            $list[] = $val['valid']?$_M['word']['memberChecked']:$_M['word']['memberUnChecked'];
//            $list[] = $val['idvalid']?$_M['word']['yes']:$_M['word']['no'];
            $list[] = $val['source'];
            $list[] = "<a href=\"{$_M['url']['own_form']}a=doenterpriseleditor&id={$val['id']}\" class=\"edit\">".$_M['word']['editor']."</a><span class=\"line\">|</span><a href=\"{$_M['url']['own_form']}a=dodellist&allid={$val['id']}\" class=\"delet\" data-confirm='{$_M['word']['js7']}'>{$_M['word']['delete']}</a>";
            $rarray[] = $list;
        }

        $table->rdata($rarray);
    }





	public function del_uesr($useridlist){
		global $_M;
		if(!$useridlist){
			return false;
		}
		    $list = explode(",",$useridlist) ;
		    //会员删除接口
			$lists   = load::plugin('douserdel',1,$list);
      if(is_array($lists)) $list = $lists;
		foreach($list as $id){
			if($id){
				if(is_number($id)){
					$query = "DELETE FROM {$_M['table']['user']} WHERE id='{$id}'";
					DB::query($query);
					$query = "DELETE FROM {$_M['table']['user_other']} WHERE met_uid='{$id}'";
					DB::query($query);
					$query = "DELETE FROM {$_M['table']['user_list']} WHERE listid='{$id}'";
					DB::query($query);
				}
			}
		}
		return true;
	}
	public function json_group_list(){
		global $_M;

		$table = load::sys_class('tabledata', 'new');
		$order = "access";
		$where = "lang='{$_M['lang']}'";
		$grouplist = $table->getdata($_M['table']['user_group'], '*', $where, $order);

		foreach($grouplist as $val){
			$list = array();
			$list[] = "<input name=\"id\" type=\"checkbox\" value=\"{$val['id']}\">";
			$list[] = "<input type=\"text\" name=\"name-{$val['id']}\" data-required=\"1\" class=\"ui-input listname\" value=\"{$val['name']}\">";
			$list[] = "<input type=\"text\" name=\"access-{$val['id']}\" data-required=\"1\" class=\"ui-input met-center\" value=\"{$val['access']}\">";
			$rarray[] = $list;
		}
		$table->rdata($rarray);

	}
	public function save_group($allid,$type){
		global $_M;

		$list = explode(",",$allid) ;

		foreach($list as $id){
			if($id){
				if($type=='save'){
					$name = $_M['form']['name-'.$id];
					$access = $_M['form']['access-'.$id];
					$access = $access ? $access : 0 ;
					if(is_number($id)){

						if($access<1){

						echo "<script>alert('".$_M['word']['usereadinfo']."')</script>";
                            turnover("{$_M['url']['own_form']}a=doindex", $_M['word']['opfailed']);

						}
						$query = "UPDATE {$_M['table']['user_group']} SET
						name = '{$name}',
						access = '{$access}'
						WHERE id = '{$id}' and lang = '{$_M['lang']}'
						";
						$query1 = "UPDATE {$_M['table']['admin_array']} SET
						array_name = '{$name}',
						user_webpower = '{$access}'
						WHERE id = '{$id}' and lang = '{$_M['lang']}'
						";
						if($query)DB::query($query);
						if($query1)DB::query($query1);
					}else{
						if($name){

						    if($access<1){

                                echo "<script>alert('".$_M['word']['usereadinfo']."')</script>";
                                turnover("{$_M['url']['own_form']}a=doindex", $_M['word']['opfailed']);

					      	  }
							$query = "INSERT INTO {$_M['table']['user_group']} SET
							name = '{$name}',
							access = '{$access}',
							lang  = '{$_M['lang']}'
							";
							if($query)DB::query($query);
							$query1 = "INSERT INTO {$_M['table']['admin_array']} SET
							id = ".DB::insert_id().",
							array_name = '{$name}',
							user_webpower = '{$access}',
							array_type = 1,
							langok = '',
							lang  = '{$_M['lang']}'
							";
							if($query1)DB::query($query1);
						}
					}
				}elseif($type=='del'){
					if(is_number($id)){
						$query = "DELETE FROM {$_M['table']['user_group']} WHERE id='{$id}' and lang='{$_M['lang']}' ";
						$query1 = "DELETE FROM {$_M['table']['admin_array']} WHERE id='{$id}' and lang='{$_M['lang']}' ";
					}
					if($query)DB::query($query);
					if($query1)DB::query($query1);
				}
			}

		}
		cache::del('user', 'file');
		return true;

	}
}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>