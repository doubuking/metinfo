<?php 

defined('IN_MET') or exit('No permission');

load::sys_class('admin');

class website extends admin {

    /**
     * 应用后台首页
     */
    public function doindex() {
      
        global $_M;
       
        require_once $this -> template('own/index');
    }


    /**
     * 保存网站关闭设置
     */
    public function doset() {

      global $_M;
      $configName[] = 'met_website';
      $configName[] = 'met_website_content';
      
      $this->sethtml($_M['form']['met_website']);

      configsave($configName);//保存系统配置
      turnover("{$_M['url']['own_form']}a=doindex","操作成功");//提示信息
     
    }

    /**
     * 设置首页静态页面
     * @param  [type] $website [bool]
     * @return [type]          [null]
     */
    private function sethtml($website) {
      global $_M;
      $html = PATH_WEB."index.html";
      $html_bak = PATH_WEB."index_bak.html";

      if(intval($website) == 0) { //关闭网站
          if(is_file($html) && !is_file($html_bak)) { //如果存在静态首页
              @rename($html, PATH_WEB."index_bak.html");
              $website_content = '<!doctype html><html lang="en"><head><meta charset="UTF-8"><title>'.$_M[config][met_webname].'</title></head><body>'.$_M['config']['met_website_content'].'</body></html>';

             @file_put_contents(PATH_WEB."index.html", $website_content);
          }
      } else { //开启网站
          if(is_file($html) && is_file($html_bak)) { //如果同时存在index.html和index_bak.html
              @unlink($html); 
              @rename($html_bak, $html);
          }
      }
    }

}
