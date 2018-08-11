<?php
/**
 * Created by PhpStorm.
 * User: phpwei
 * Date: 2018/8/11 0011
 * Time: 14:25
 */

defined('IN_MET') or exit('No permission');//所有文件都是已这句话开头，保证系统单入口。
load::sys_class('web');//包含后台基类，“.class.php” 可以省略。
class peractivity extends web {//继承后台基类。类名称要与文件名一致
    public function __construct() {
        parent::__construct();//如果重写了初始化方法,一定要调用父类的初始化函数。
    }
    public function doindex(){//定义自己的方法
        global $_M;//引入全局数组
        //自己的代码
        require $this->template('own/index');//引入模板文件，必须global $_M
    }
}