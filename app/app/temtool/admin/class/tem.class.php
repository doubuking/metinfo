<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');
define(DS,DIRECTORY_SEPARATOR);
/**
* 模板自定义标签更新
*/
class tem
{
	public $temp_dir;

	public function __construct()
	{
		global $_M;
		$this->temp_dir  = PATH_WEB."templates".DS;
	}
	public function dosql($no)
	{
		global $_M;

		if($re = $this->get_install_data($no)) {

			foreach ($_M['langlist']['web'] as $lang => $val) {
				foreach ($re as $key => $data) {
					$data['no'] = $no;
					if(!$this->check_config($data, $lang)){

						$this->add_config($data, $lang);
					}else{
						$this->update_config($data, $lang);
					}
				}
			}
			return $this->update_version($no, $this->get_txt_version($no));
		}

		return false;
	}

	/**
	 * 获取已经安装的模板
	 * @Author   long
	 * @DateTime 2017-04-07
	 * @return  array
	 */
	public function get_existing_templates()
	{
		global $_M;
		$query = "SELECT skin_name FROM {$_M['table']['skin_table']}";
		$templates =  DB::get_all($query);
		$data = array();
		foreach ($templates as $key => $v) {
			$data[] = $v['skin_name'];
		}
		return $data;
	}

	/**
	 * 获取模板文件夹里的模板目录
	 * @Author   long
	 * @DateTime 2017-04-07
	 * @return   array
	 */
	public function get_template_dirs()
	{
		global $_M;
		$dirs = array();
		foreach (scandir($this->temp_dir) as $key => $v) {
			if($v != '.' && $v != '..' && is_dir($this->temp_dir.$v)){
				$dirs[] = $v;
			}
		}
		return $dirs;
	}

	/**
	 * 模板文件夹里存在，数据库不存在的编号
	 * @DateTime 2017-04-07
	 * @return  需要安装的模板
	 */
	public function get_noinstall_templates()
	{
		global $_M;
		return array_diff($this->get_template_dirs(),$this->get_existing_templates());
	}


	/**
	 * 数据库保存的模板版本号
	 * @DateTime 2017-04-14
	 */
	public function get_tem_version($no)
	{
		global $_M;
		$query = "SELECT ver FROM {$_M['table']['skin_table']} WHERE skin_name = '{$no}'";
		$tem = DB::get_one($query);
		return $tem['ver'] ? $tem['ver'] : '1.0.0';
	}



	/**
	 * 模板文件夹下的version.txt文件里的版本号
	 * @Author   long
	 * @DateTime 2017-04-14
	 * @param    [type]     $no [description]
	 * @return   [type]         [description]
	 */
	public function get_txt_version($no)
	{
		$version_txt = $this->temp_dir.$no.DS.'version.txt';
		$version = file_get_contents($version_txt);
		preg_match('/(\d{1,2}\.){2}\d{1,2}/', $version,$ver);
		return $ver ? $ver[0] : '1.0.0';
	}
	



	public function get_install_data($no)
	{
		global $_M;
		$install = $this->temp_dir.$no.DS.'install'.DS.'install.class.php';
		if($install)
		{
			require_once $install;
			$install_class = new install();
			$data = $install_class->dosql();

			$new = array();
			foreach ($data['sql'] as $key => $v) {
				$arr1 = explode(',', $v);
				foreach ($arr1 as $key1 => $c) {
					$arr2 = explode('=', $c);
					$new[$key][trim($arr2[0])] = trim($arr2[1],'\'');
				}
			}
			return $new;
		}else{
			return false;
		}

	}
	/**
	 * 更新模板版本号
	 * @DateTime 2017-04-10
	 * @param    string  $version 模板版本号
	 */
	public function update_version($no,$version) {
		global $_M;
		
		$query = "UPDATE {$_M['table']['skin_table']} SET ver='{$version}' WHERE skin_name='{$no}'";
		return DB::query($query);
	}
	/**
	 * 检测单条模板标签配置是否存在
	 * @DateTime 2017-04-10
	 * @param    array  $data 一条配置
	 * @param    string $lang 语言
	 * @return   boolean 
	 */
	public function check_config($data,$lang) {
		global $_M;
		if($data['type'] == 1){
			$where = "type = 1 AND pos = {$data['pos']} AND name = '{$data['name']}'";
		}else{
			$where = "name = '{$data['name']}'";
		}
		$query = "SELECT id FROM {$_M['table']['templates']} WHERE {$where}  AND no='{$data['no']}' AND lang='{$lang}'";
		return DB::get_one($query);
	}

	/**
	 * 更新一条模板标签配置数据
	 * @DateTime 2017-04-10
	 * @param    array  $data 一条配置
	 * @param    string $lang 语言
	 */
	public function update_config($data,$lang) {
		global $_M;

		if($data['name'] != '' && $data['type'] != 1){
			$query = "UPDATE {$_M['table']['templates']} SET pos = {$data['pos']},style={$data['style']},selectd='{$data['selectd']}',defaultvalue = '{$data['defaultvalue']}',valueinfo = '{$data['valueinfo']}',tips = '{$data['tips']}' WHERE name = '{$data['name']}' AND type = {$data['type']} AND no='{$data['no']}' AND lang='{$lang}'";
		
			return DB::query($query);
		}
		return true;
		
	}

	/**
	 * 插入一条新加的标签配置数据
	 * @DateTime 2017-04-10
	 */
	public function add_config($data,$lang) {
		global $_M;
		$query = "INSERT INTO {$_M['table']['templates']} SET no ='{$data['no']}',lang='{$lang}',pos = {$data['pos']},style={$data['style']},selectd='{$data['selectd']}',defaultvalue = '{$data['defaultvalue']}',valueinfo = '{$data['valueinfo']}',tips = '{$data['tips']}',name = '{$data['name']}',type = {$data['type']},no_order={$data['no_order']}";
		return DB::query($query);
	}

}