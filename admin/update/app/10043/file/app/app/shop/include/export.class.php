<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved. 

defined('IN_MET') or exit('No permission');
/**
* 导出
*/
class export
{
	
	public $title = array();
	public $data  = array();
	public $field = array();
	public $filename;
	function __construct($title,$field,$data)
	{
		$this->title = $title;
		$this->data  = $data;
		$this->field = $field;
		$this->filename = date('YmdHis',time()).'.xls';
	}


	public function doexport()
	{
		set_time_limit(0);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename='.$this->filename);
        header('Pragma: no-cache');
        header('Expires: 0');
        echo iconv('utf-8', 'gbk', implode("\t", $this->title)), "\n";
        $this->data = $this->getField();
        foreach ($this->data as $key => $value) {
    		echo iconv('utf-8', 'gbk', implode("\t", $value)), "\n";
		}
	}

	public function getField()
	{
		$data = array();
		foreach ($this->data as $key => $v) {
			foreach ($this->field as $k => $c) {
				$data[$key][$c] = $v[$c];
			}
		}
		return $data;

	}
}