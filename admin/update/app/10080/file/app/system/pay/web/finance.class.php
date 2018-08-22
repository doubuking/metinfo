<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
defined('IN_MET') or exit('No permission');
/**
 * 支付基类
 * 集成支付：微信、财付通、支付宝、网银、PayPal
 */
ini_set('date.timezone','Asia/Shanghai');
load::sys_class('web');
load::sys_func('admin');
load::sys_func('str');
load::sys_func('array');
class finance extends web{

    public function __construct() {
        global $_M;
        //重写URL
        parent::__construct();
        $this->load_url_unique();
    }

    /**
     * 财务记录表
     */
    public function doindex(){
        global $_M;
        $user = $this->check();
        $_M['config']['app_no']=10080;
        $_M['config']['own_order']=1;
        $this->input['balance']=$this->getBalance($user);   //用户余额
        $this->load_url_unique();

        require_once $this->view('app/finance',$this->input);
    }

    public function dotable_list_json(){
        global $_M;
        $user = $this->check();
        $size = $_M['form']['length'];
        $offset = $_M['form']['start'];
        $offset = $offset ? $offset * $size - 1 : $offset;

        $table = load::sys_class('tabledata', 'new');
        $where = "uid = '{$user['id']}'";
        $order = "id DESC ";
        $finance = $table->getdata($_M['table']['pay_finance'], $field = '*', $where, $order);

        foreach ($finance as $value) {
            $time       = date("Y-m-d H:i:s" ,$value['addtime']);
            $pricestr   = $this->price_str($value['price']);
            if($value['type']==1){
                $price = "<span class='tag tag-danger'>+{$pricestr}</span>";
            }elseif ($value['type']==2){
                $price = "<span class='tag tag-success'>-{$pricestr}</span>";
            }

            $balance  = $this->price_str($value['balance']);;
            $list=array(
                $time,
                $price,
                $balance,
                $value['reason']
            );
            $rarray[]=$list;
        }
        /*
        $this->table->rarray['draw']            = 1;   //回传执行次数
        $this->table->rarray['recordsTotal']    = 20;  //回传总数量
        $this->table->rarray['recordsFiltered'] = 4;  //回传筛选过的总数量，暂无作用，但必须回传*/
        $table->rdata($rarray);


    }

    /**
     * 充值页面
     */
    public function dorecharge(){
        global $_M;
        $user = $this->check();
        $_M['config']['app_no']=10080;
        $_M['config']['own_order']=1;
        $this->input['balance'] = $this->getBalance($user);   //用户余额
        $this->input['pay_charger_tips1'] = load::mod_class('pay/pay_common','new')->GetPayConfig('pay_charger_tips1');
        //充值提示
        require $this->view('app/recharge',$this->input);
    }

    /**
     * 用户充值
     */
    public function dopayrecharge()
    {
        global $_M;
        $user = $this->check();
        $out_trade_no = $this->get_rid();
        $callback_url = "{$_M['url']['site']}pay/finance.php?lang={$_M['lang']}";
        $price = $_M['form']['price'];
        $pricestr = $this->price_str($price);

        $order = array(
            'subject'       =>  "{$_M['word']['pay_recharge']} [{$pricestr}]",      //商品名称(必须)
            'body'          =>  "{$_M['word']['pay_order']}-{$out_trade_no}",       //商品描述(必须)
            'out_trade_no'  =>  $out_trade_no,                                      //订单编号(必须)
            'attach'        =>  '',                                                 //附加数据
            'goods_tag'     =>  '',                                                 //商品标记
            'product_id'    =>  '',                                                 //产品编号
            'total_fee'     =>  $price,                                             //订单金额(必须)
            'callback_url'  =>  $callback_url,                                      //app回调地址(必须)
            'no'            =>  '10080'                                             //调用接口的应用编号（applist）10080 账户充值
        );

        $app = load::mod_class('pay/web/app', 'new');
        $html = $app::createPayForm($order);
        header ( 'Content-type:text/html;charset=utf-8' );
        echo $html;
    }

    /**
     * 发起账户余额消费
     */
    public function balancepay($data){
        global $_M;
        $user = $this->check();
        if(md5($_M['form']['password']) == $user['password']){

            $user_balance = $this->getBalance($user);
            if($user_balance['balance'] >= $data['total_fee']){
                return true;
            }else{
                $this->errorcode = 'nobalance';
                return false;
            }
        }else{
            return false;
        }
    }

    /**
     * @param $user 用户信息
     * @return array|bool|mixed|返回执行sql执行后的结果
     */

    public function getBalance($user)
    {
        global $_M;
        $query = "SELECT * FROM {$_M['table']['pay_balance']} WHERE uid = '{$user['id']}'";
        $balance = DB::get_one($query);
        if (!$balance) {
            $query = "INSERT INTO {$_M['table']['pay_balance']} SET uid='{$user['id']}',username='{$user['username']}',balance='0',lang='{$_M['lang']}'";
            $res = DB::query($query);
            if (!DB::insert_id()) {
                return false;
            }
            $balance['uid'] = $user['id'];
            $balance['username'] = $user['username'];
            $balance['goods_list'] = '';
            $balance['balance'] = 0;
            $balance['balance_str'] = $this->price_str(0);
        }else{
            $balance['balance_str'] = $this->price_str($balance['balance']);
        }
        return $balance;
    }

    /**
     * @param $type int 财务类型 1收入 | 2支出
     * @param $user int 用户id
     * @param $price float 金额
     * @return bool|int
     */
    public function modify_user_balance($type, $uid, $price){
        global $_M;
        $user = load::sys_class('user', 'new')->get_user_by_id($uid);
        if(!$user){//用户不存在
            return false;
        }
        $user_balance = $this->getBalance($user);
        if($type == 1){//收入
            $user_balance['balance'] = $user_balance['balance'] + $price;
        }else if($type == 2){//支出
            if($user_balance['balance'] >= $price){
                $user_balance['balance'] = $user_balance['balance'] - $price;
            }else{
                $this->errorcode = 'nobalance';
                return false;
            }
        }

        $query = "UPDATE {$_M['table']['pay_balance']} SET balance='{$user_balance['balance']}' WHERE uid='{$user['id']}' AND lang='{$user['lang']}'";
        #file_put_contents(__DIR__ . '/sql.txt', $query);
        DB::query($query);
        return $user_balance['balance'];
    }

    /**
     * 系统财务记录
     * @param $type int 财务类型 1收入 2支出
     * @param $appno int 应用编号
     * @param $uid  int 用户id
     * @param $price float 金额
     * @param $reason string 事由
     * @return bool
     */
    public function addfinance($type, $appno, $uid, $price, $reason){
        global $_M;
        $addtime = time();
        $adminuesr = $this->get_op_user();
        //$user = $this->check();
        $user = load::sys_class('user', 'new')->get_user_by_id($uid);
        if(!$user){//用户不存在
            return false;
        }

        //更新用户余额
        $balance = $this->modify_user_balance($type, $uid, $price);

        if($balance !== false){
            $query = "INSERT INTO {$_M['table']['pay_finance']} SET uid='{$uid}',username='{$user['username']}',appno='{$appno}',type='{$type}',reason='{$reason}',price='{$price}',balance='{$balance}',addtime='{$addtime}',adminname='{$adminuesr}',lang='{$user['lang']}'";
            DB::query($query);
            return true;
        }else{
            $this->errorcode = $user->errorcode;
            return false;
        }
    }

    /**
     * 获取用户消费记录
     * @param $user 用户信息
     * @param $type 类型 1充值 2消费
     * @return array 消费记录
     */
    public function get_record_by_uid($user,$type = 0)
    {
        global $_M;
        if ($type == 1) {
            $query = "SELECT * FROM {$_M['table']['pay_finance']} WHERE uid = '{$user['id']}' AND `type`='1' ";
        } elseif ($type == 2) {
            $query = "SELECT * FROM {$_M['table']['pay_finance']} WHERE uid = '{$user['id']}' AND `type`='2' ";
        }else{
            $query = "SELECT * FROM {$_M['table']['pay_finance']} WHERE uid = '{$user['id']}'";
        }
        $record_list = DB::get_all($query);
        return $record_list;
    }

    public function get_op_user(){
        return 'system';
    }

    public function getUserFinance($user, $offset = 0 ,$size = 20)
    {
        global $_M;
        #$query = "SELECT * FROM {$_M['table']['pay_finance']} WHERE uid = '{$user['id']}' LIMIT $offset ,$size";
        $query = "SELECT * FROM {$_M['table']['pay_finance']} WHERE uid = '{$user['id']}'";
        $balance = DB::get_all($query);

        return $balance;

    }

    /**
     * 检测用户信息
     * @return bool
     */

    public function check() {
        global $_M;
        $user = $this->get_login_user_info();
        if(!$user){
            okinfo($_M['url']['site'].'member/login.php?');
            return false;
        }
        return $user;
    }

    public function price_str($price){
        global $_M;
        $pricestr = load::mod_class('pay/pay_common', 'new')->price_str($price);
        return $pricestr;
    }

    /**
     * 生成订单ID
     * @return string
     */
    public function get_rid(){
        $rid = date('YmdHis').random(5, 1);
        return $rid;
    }

    /**
     * ajax成功
     * @param $success
     */
    public function ajax_success($success){
        global $_M;
        $retun = array();
        $retun['success'] = $success;
        echo jsonencode($retun);
        die();
    }

    /**ajax失败
     * @param $error
     */
    public function ajax_error($error){
        global $_M;
        $retun = array();
        $retun['error'] = $error;
        echo jsonencode($retun);
        die();
    }

    /**
     * 重写web类的load_url_unique方法，获取前台特有URL
     */
    protected function load_url_unique() {
        global $_M;
        parent::load_url_unique();
        if(M_NAME=='pay') $_M['url']['own_form'] = $_M['url']['site'] . "pay/finance.php?lang={$_M['lang']}&";
        $_M['url']['finance']   = $_M['url']['site']."pay/finance.php?lang={$_M['lang']}";
        $_M['url']['recharge']  = $_M['url']['site']."pay/finance.php?lang={$_M['lang']}&a=dorecharge";
        $_M['url']['dopayrecharge']     = $_M['url']['site']."pay/finance.php?lang={$_M['lang']}&a=dopayrecharge";
        $_M['url']['balance_pay']       = $_M['url']['site']."pay/finance.php?lang={$_M['lang']}&a=dobalancepay";
    }
}
