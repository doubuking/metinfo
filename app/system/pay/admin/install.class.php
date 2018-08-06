<?php
defined('IN_MET') or exit ('No permission');
class install {

    public $no;
    public $ver;
    public $name;
    public $m_class;
    public $dopaylist;
    public $appname;
    public $info;
    public $depend;

    public function __construct()
    {
        $this->no           = 10080;
        $this->ver          = '1.0';
        $this->name         = 'pay';
        $this->m_class      = 'admin_pay';
        $this->m_action     = 'dopaylist';
        $this->dopaylist    = 'dofinancelist';
        $this->appname      = '支付接口管理';
        $this->info         = '整合多种常用支付接口,是商城等其他具有支付功能模块的基础支撑模块，也可单独使用。';
        $this->depend       = 'sys';
        $this->mlangok      = 1;
    }

    public function dosql() {
        global $_M;

        $query      = "select * from {$_M['table']['applist']} where no='{$this->no}'";
        $app        = DB::get_one($query);

        if(!$app){
            //添加到applist
            $query = "SELECT * FROM {$_M['table']['applist']} WHERE no='{$this->no}'";
            $result = DB::get_one($query);
            if(!$result) {
                $query = "INSERT INTO  {$_M['table']['applist']} SET no = '{$this->no}',ver = {$this->ver},m_name = '{$this->name}',m_class = '{$this->m_class}',m_action = '{$this->m_action}',appname = '{$this->appname }',target='0',info  = '{$this->info }',mlangok = '{$this->mlangok}',depend = '{$this->depend}'";
                DB::query($query);
            }

            //建表
            //支付模块信息表
                $query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}pay_config` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `name` varchar(255) NOT NULL,
                `value` text NOT NULL,
                `mobile_value` text,
                `columnid` int(11),
                `flashid` int(11),
                `lang` varchar(50) NOT NULL,
                PRIMARY KEY (`id`)) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
                DB::query($query);
                add_table('pay_config');

                //接口参数表
                $query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}pay_api` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`name` varchar(50) NOT NULL,
				`paytype` varchar(255) NOT NULL,
				`value` varchar(511) NOT NULL,PRIMARY KEY (`id`),
				`lang` varchar(50) NOT NULL
				) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
                DB::query($query);
                add_table('pay_api');

                //用户余额表
                $query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}pay_balance` (
                      `id` int(10) NOT NULL AUTO_INCREMENT,
                      `uid` int(11) NOT NULL COMMENT '用户ID',
                      `username` varchar(50) NOT NULL COMMENT '用户名',
                      `goods_list` text NOT NULL COMMENT '已购买商品列表',
                      `balance` double NOT NULL COMMENT '余额',
                      `lang` varchar(50) NOT NULL COMMENT '语言',
                      PRIMARY KEY (`id`)
                    ) ENGINE=MyISAM DEFAULT CHARSET=utf8";
                DB::query($query);
                add_table('pay_balance');

                //订单存储表
                $table = $_M['config']['tablepre'].'pay_order';
                $query = "CREATE TABLE IF NOT EXISTS {$table} (`id` int(11) NOT NULL AUTO_INCREMENT,
                `no` int(11) NOT NULL COMMENT '应用编号',
                `callback_url` varchar(255) NOT NULL COMMENT '支付完成跳转地址',
                `sys_callback` varchar(255) NOT NULL COMMENT '系统回调',
                `out_trade_no` varchar(32) NOT NULL COMMENT '商户订单号',
                `subject` varchar(255) NOT NULL COMMENT '商品名称',
                `product_id` varchar(32) DEFAULT NULL COMMENT '商品ID',
                `body` varchar(128) DEFAULT NULL COMMENT '订单详情',
                `goods_tag` varchar(32) DEFAULT NULL COMMENT '商品标记',
                `attach` varchar(500) DEFAULT NULL COMMENT '附加数据',
                `show_url` varchar(255) DEFAULT NULL,
                `total_fee` decimal(9,2) NOT NULL COMMENT '总金额',
                `order_time` datetime NOT NULL,
                `pay_time` datetime DEFAULT NULL,
                `pay_type` int(1) DEFAULT NULL COMMENT '支付类型',
                `callback` int(1) DEFAULT NULL,
                `status` int(1) DEFAULT NULL COMMENT '支付状态',
                `uid` int(10) NOT NULL COMMENT '用户ID',
                `lang` varchar(50) NOT NULL,
                `balance` int(1) unsigned zerofill DEFAULT NULL COMMENT '余额支付 1账户充值  2账户消费',
                PRIMARY KEY (`id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
                DB::query($query);
                add_table('pay_order');

                //财务记录表
                $table = $_M['config']['tablepre'].'pay_finance';
                $query = "CREATE TABLE IF NOT EXISTS {$table} (`id` int(11) NOT NULL AUTO_INCREMENT,
                `uid` int(11) NOT NULL COMMENT '用户ID',
                `username` varchar(50) NOT NULL COMMENT '用户名',
                `appno` int(50) unsigned NOT NULL COMMENT '引用编号',
                `type` int(11) NOT NULL COMMENT '类型',
                `reason` varchar(1000) NOT NULL COMMENT '事由',
                `price` double NOT NULL COMMENT '金额',
                `balance` double NOT NULL COMMENT '余额',
                `addtime` int(11) NOT NULL COMMENT '添加时间',
                `adminname` varchar(50) NOT NULL COMMENT '操作人',
                `lang` varchar(50) NOT NULL COMMENT '语言',
                PRIMARY KEY (`id`)) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
                DB::query($query);
                add_table('pay_finance');

            //添加语言
            $this->setWebLang();
            $this->setAdminLang();

            //按启用语言添加配置
            foreach ($_M['langlist']['web'] as $lang) {
                //应用配置
                $this->setCongfig($lang['mark']);
                //会员中心侧导航
                $this->setLeftNAV($lang['mark']);
            }


        }else{
            if(version_compare($app['ver'],$this->ver)<0){
                //升级
                $this->appupdate();
            }
        }
    }

    /**
     * 会员中心侧导航
     * @param string $lang
     */
    public function setLeftNAV($lang)
    {
        global $_M;
        $query  = "SELECT * FROM {$_M['table']['ifmember_left']} WHERE no='{$this->no}' AND foldername='pay' AND title='pay_consumption_detail' AND  filename='finance.php' AND lang='{$lang}'";
        $result = DB::get_one($query);
        if(!$result) {
            $query = "INSERT INTO {$_M['table']['ifmember_left']} SET no='{$this->no}',columnid='0',title='pay_consumption_detail',foldername='pay',filename='finance.php',target='0',own_order = '1',effect = 1,lang='{$lang}'";
            DB::query($query);
        }
    }

    /**
     * 默认设置
     */
    public function setCongfig($lang)
    {
        global $_M;
        $this->configinsert('payment_type', '1#@met@#6#@met@#7#@met@#2#@met@#3', $lang);
        $this->configinsert('pay_price_str_prefix', '￥', $lang);
        $this->configinsert('pay_price_str_suffix', '元', $lang);
        $this->configinsert('payment_open', '1', $lang);
        $this->appconfiginsert('payment_open', '1', $lang);

    }

    public function configinsert($name,$value,$lang)
    {
        global $_M;
        $query = "SELECT * FROM {$_M['table']['pay_config']} WHERE name = '{$name}' AND  lang = '{$lang}'";
        $res = DB::get_one($query);
        if (!$res) {
            $query = "INSERT INTO {$_M['table']['pay_config']} SET `name`='{$name}', `value`='{$value}' ,lang='{$lang}'";
            DB::query($query);
        }
    }

    public function appconfiginsert($name,$value,$lang)
    {
        global $_M;
        $query = "SELECT * FROM {$_M['table']['app_config']} WHERE name = '{$name}' AND  lang = '{$lang}' AND appno='{$this->no}'";
        $res = DB::get_one($query);
        if (!$res) {
            $query = "INSERT INTO {$_M['table']['app_config']} SET appno='{$this->no}',`name`='{$name}', `value`='{$value}' ,lang='{$lang}'";
            DB::query($query);
        }
    }

    /**
     * 添加前台语言
     * @param string $lang
     */
    public function setWebLang()
    {
        global $_M;
        foreach ($_M['langlist']['web'] as $lang) {
            $query = "DELETE FROM {$_M['table']['language']} WHERE app = '{$this->no}' AND site = '0' AND lang = '{$lang['mark']}'";
            DB::query($query);
            if ($lang['mark'] == 'cn' || $lang['mark'] == 'en') {
                $content = file_get_contents(PATH_SYS . "pay/admin/sql/pay_lang_web_{$lang['mark']}.sql");
                $this->insertsql($content);
            }else{
                //其他语种
                $content = file_get_contents(PATH_SYS . "pay/admin/sql/pay_lang_web_cn.sql");
                $content = str_replace("'cn')","'{$lang['mark']}')",$content);
                $this->insertsql($content);
            }
        }
        return;
    }

    /**
     * 添加后台语言
     */
    public function setAdminLang()
    {
        global $_M;
        foreach ($_M['langlist']['admin'] as $lang) {
            $query = "DELETE FROM {$_M['table']['language']} WHERE app = '{$this->no}' AND site = '1' AND lang = '{$lang['mark']}'";
            DB::query($query);
            if ($lang['mark'] == 'cn' || $lang['mark'] == 'en') {
                $content = file_get_contents(PATH_SYS . "pay/admin/sql/pay_lang_admin_{$lang['mark']}.sql");
                $this->insertsql($content);
            }else{
                //其他语种
                $content = file_get_contents(PATH_SYS . "pay/admin/sql/pay_lang_admin_cn.sql");
                $content = str_replace("'cn')","'{$lang['mark']}')",$content);
                $this->insertsql($content);
            }
        }
        return;
    }

    /**
     * 执行sql文件
     * @param $content
     */
    public function insertsql($content)
    {
        global $_M;
        if ($content) {
            $sql=explode("\n",$content);
            foreach ($sql as $query) {
                if ($query!=='' && !strstr($query,'##')) {
                    $query = str_replace('met_',$_M['config']['tablepre'],$query);
                    DB::query($query);
                }
            }
        }
        return;
    }

    public function appupdate()
    {
        global $_M;
        global $_M;
        $update = load::mod_class('pay/admin/updatepay', 'new');
        $update->update();
    }

   
}
?>