<?php

defined('IN_MET') or exit('No permission');

class plugin_website{

    /**
     * 关闭网站，判断是否强制访问
     * @return [type]
     */
    public function doweb() {
        global $_M;
        global $index;

        ##if($_M['config']['met_website'] == 0 && $index == 'index' && $_M['form']['metopen'] != '1') {
    	if($_M['config']['met_website'] == 0 && ($index == 'index'||(M_MODULE == "web" && M_NAME == 'index')) && $_M['form']['metopen'] != '1') {
           $website_content = '<!doctype html><html lang="en"><head><meta charset="UTF-8"><title>'.$_M['config']['met_webname'].'</title></head><body>'.$_M['config']['met_website_content'].'</body></html>';
           echo $website_content;die;
        }
     
    }
}