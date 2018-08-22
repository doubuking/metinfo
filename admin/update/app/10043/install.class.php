<?phpdefined('IN_MET') or exit ('No permission');class install{    public $appname;    public $appno;    public $ver;    public $m_name;    public $m_class;    public $m_action;    public $target;    public $info;    public function __construct(){        global $_M;        $this->appname     = '米拓商城v4.0';        $this->appno       = 10043;        $this->ver         = "4.0.0";        $this->m_name      = 'shop';        $this->m_class     = 'order_admin';        $this->m_action    = 'doindex';        $this->target      = 1;        $this->mlangok     = 1;        $this->info        = "一款适合企业在线B2C的商城系统。采用「响应式设计」，能够自适应不同终端设备（手机、平板、电脑）。源码开放、接口齐全，可轻松扩展自己所需要的功能。";    }    public function dosql() {		global $_M;		$appno      = $this->appno;		$query      = "select * from {$_M['table']['applist']} where no='{$this->appno}'";		$app        = DB::get_one($query);		deldir('cache', 1);		if(!$app){		    //新安装商城			$query = "INSERT INTO  {$_M['table']['applist']} SET no = '{$this->appno}',ver = '{$this->ver}',m_name = '{$this->m_name}',m_class = '{$this->m_class}',m_action = '{$this->m_action}',appname = '{$this->appname}',target='{$this->target}',info  = '{$this->info}',mlangok = '{$this->mlangok}'";			DB::query($query);    //创建数据表			$query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_address` (					  `id` int(11) NOT NULL auto_increment,					  `uid` int(11) NOT NULL COMMENT '所属用户',					  `de` int(1) NOT NULL COMMENT '默认收货地址',					  `name` varchar(50) NOT NULL COMMENT '收件人',					  `zone_coun` varchar(50) NOT NULL COMMENT '国家',					  `zone_p` varchar(50) NOT NULL COMMENT '省',					  `zone_c` varchar(50) NOT NULL COMMENT '市',					  `zone_d` varchar(50) NOT NULL COMMENT '区',					  `zone_a` varchar(100) NOT NULL COMMENT '详细',					  `zone_code` varchar(100) NOT NULL COMMENT '地区编号信息',					  `tel` varchar(50) NOT NULL COMMENT '电话',					  `fixed` varchar(50) NOT NULL COMMENT '固话',					  `email` varchar(50) NOT NULL COMMENT '电子邮件地址',					  `lang` varchar(50) NOT NULL COMMENT '所属语言',					  PRIMARY KEY  (`id`)					) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";			DB::query($query);            add_table('shopv2_address');			$query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_tracking` (					  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,					  `order_id` varchar(200) NOT NULL COMMENT '商品订单号',					  `tracking_no` varchar(100) NOT NULL COMMENT '快递单号',					  `information` text NOT NULL COMMENT '物流信息',					  `addtime` int(10) NOT NULL COMMENT '创建时间',					  `updatetime` int(10) NOT NULL COMMENT '最后更新时间',					  PRIMARY KEY (`id`)					) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;";					DB::query($query);			add_table('shopv2_tracking');			$query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_cart` (					  `id` int(11) NOT NULL auto_increment,					  `uid` int(11) NOT NULL COMMENT '用户ID',					  `pid` int(11) NOT NULL COMMENT '商品ID',					  `para_str` varchar(1000) NOT NULL COMMENT '字段信息',					  `splist_id` int(11) NOT NULL COMMENT '商品规格ID',					  `amount` int(11) NOT NULL COMMENT '数量',					  `lang` varchar(50) NOT NULL,					  PRIMARY KEY  (`id`)					) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";			DB::query($query);            add_table('shopv2_cart');			$query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_discount` (					  `id` int(11) NOT NULL auto_increment,					  `name` varchar(50) NOT NULL COMMENT '优惠券名称',					  `type` int(11) NOT NULL COMMENT '优惠券类型',					  `par` double NOT NULL COMMENT '面值',					  `r_price` double NOT NULL COMMENT '订单满多少才可以使用',					  `s_time` int(11) NOT NULL COMMENT '开始时间',					  `e_time` int(11) NOT NULL COMMENT '结束时间',					  `amount` int(11) NOT NULL COMMENT '数量',					  `one_user_have` int(11) NOT NULL COMMENT '限领取张数',					  `receive` int(11) NOT NULL COMMENT '领取数',					  `used` int(11) NOT NULL COMMENT '使用数',					  `ugid` int(11) NOT NULL COMMENT '领取会员会员组条件',					  `all_goods` int(1) NOT NULL COMMENT '是否全部商品',					  `goods_list` varchar(5000) NOT NULL COMMENT '可以使用优惠劵产品列表',					  `instructions` varchar(1000) NOT NULL COMMENT '使用说明',					  `lang` varchar(50) NOT NULL COMMENT '语言',					  PRIMARY KEY  (`id`)					) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";			DB::query($query);            add_table('shopv2_discount');            $query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_discount_coupon` (				  `id` int(11) NOT NULL auto_increment,				  `did` int(11) NOT NULL COMMENT '优惠券ID',				  `uid` int(11) NOT NULL COMMENT '用户ID',				  `usetime` int(11) NOT NULL COMMENT '使用时间',				  `receivetime` int(11) NOT NULL COMMENT '领取时间',				  `lang` varchar(10) NOT NULL COMMENT '语言',				  PRIMARY KEY  (`id`)				) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";			DB::query($query);            add_table('shopv2_discount_coupon');			$query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_logistics` (					  `id` int(11) NOT NULL auto_increment,					  `name` varchar(50) NOT NULL COMMENT '模板名称',					  `lang` varchar(50) NOT NULL COMMENT '所属语言',					  PRIMARY KEY  (`id`)					) ENGINE=MyISAM  DEFAULT CHARSET=utf8";			DB::query($query);            add_table('shopv2_logistics');            $query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_logistics_zone` (					  `id` int(11) NOT NULL auto_increment,					  `lid` int(11) NOT NULL COMMENT '所属模板ID',					  `zone` text NOT NULL COMMENT '区域',					  `first` int(11) NOT NULL COMMENT '首件',					  `freight` double NOT NULL COMMENT '运费',					  `addp` int(11) NOT NULL COMMENT '续件',					  `renew` double NOT NULL COMMENT '续费',					  PRIMARY KEY  (`id`)					) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";			DB::query($query);            add_table('shopv2_logistics_zone');            $query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_order` (				  `id` int(11) NOT NULL auto_increment,				  `orderid` varchar(20) character set utf8 collate utf8_bin NOT NULL COMMENT '订单ID',				  `type` int(1) NOT NULL COMMENT '订单类型',				  `uid` int(11) NOT NULL COMMENT '用户ID',				  `username` varchar(50) NOT NULL COMMENT '用户名',				  `state` int(2) NOT NULL COMMENT '订单状态 0无状态 1',                  `restate` int(2) NOT NULL COMMENT '退换货状态 0无状态 1申请退换货 2同意退货 3拒绝退货',				  `tel` varchar(20) NOT NULL COMMENT '电话',				  `email` varchar(50) NOT NULL COMMENT '邮件',				  `message` varchar(1000) NOT NULL COMMENT '订单留言',				  `address` varchar(500) NOT NULL COMMENT '收货地址',				  `price` double NOT NULL COMMENT '商品金额',				  `cprice` double NOT NULL COMMENT '修改总金额',				  `tprice` double NOT NULL COMMENT '订单总金额',				  `discount` double NOT NULL COMMENT '折扣价格',				  `discount_info` varchar(200) NOT NULL COMMENT '折扣信息',				  `discount_use` int(1) NOT NULL COMMENT '修改总金额后是否可以继续使用折扣',				  `freight` double NOT NULL COMMENT '运费',				  `cinfo_diy` varchar(50) NOT NULL COMMENT '自定义物流信息',				  `cinfo` varchar(50) NOT NULL COMMENT '物流公司',				  `oinfo` varchar(50) NOT NULL COMMENT '物流单号',				  `paytype` int(1) NOT NULL COMMENT '付款方式',				  `payinfo` varchar(200) NOT NULL COMMENT '付款信息',				  `invoice` int(1) NOT NULL COMMENT '是否需要发票',				  `invoice_info` varchar(500) NOT NULL COMMENT '发票信息',				  `remark` varchar(1000) NOT NULL COMMENT '备注',				  `rtime` int(11) NOT NULL COMMENT '下订单时间',				  `ptime` int(11) NOT NULL COMMENT '付款时间',				  `stime` int(11) NOT NULL COMMENT '发货时间',				  `ctime` int(11) NOT NULL COMMENT '关闭订单时间',				  `search` text NOT NULL COMMENT '信息搜索字段',				  `reason` varchar(1000) NOT NULL COMMENT '订单变更事由',				  `imgs` varchar(500) NOT NULL COMMENT '用户上传图片',				  `lang` varchar(50) NOT NULL COMMENT '所属语言',				  PRIMARY KEY  (`id`),				  UNIQUE KEY `orderid` (`orderid`)				) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";			DB::query($query);            add_table('shopv2_order');            $query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_order_goods` (					  `id` int(11) NOT NULL auto_increment,					  `pid` int(11) NOT NULL COMMENT '商品ID',					  `rid` int(11) NOT NULL COMMENT '订单ID',					  `pname` varchar(100) NOT NULL COMMENT '商品名称',					  `pamount` int(11) NOT NULL COMMENT '商品数量',					  `puprice` double NOT NULL COMMENT '单价',					  `para` varchar(1000) NOT NULL COMMENT '商品字段信息',					  `splist_id` int(11) NOT NULL COMMENT '商品规格ID',					  `message` varchar(1000) NOT NULL COMMENT '商品留言信息',					  `freight` double NOT NULL COMMENT '运费',					  `price` double NOT NULL COMMENT '小计总价',					  `auto_sent` int(11) NOT NULL DEFAULT '0' COMMENT '自动发货',					  PRIMARY KEY  (`id`)					) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";			DB::query($query);            add_table('shopv2_order_goods');            $query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_order_statistics` (			  `id` int(11) NOT NULL auto_increment,			  `start_time` int(11) NOT NULL COMMENT '开始时间',			  `statistics_time` int(11) NOT NULL COMMENT '统计时间',			  `order_number` int(11) NOT NULL COMMENT '下订单数',			  `income` double NOT NULL COMMENT '收入',			  `order_user` int(11) NOT NULL COMMENT '下单人数',			  `order_user_list` text NOT NULL COMMENT '下单用户ID列表',			  `lang` varchar(50) NOT NULL COMMENT '语言',			  PRIMARY KEY  (`id`)			) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";			DB::query($query);            add_table('shopv2_order_statistics');            $query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_para` (					  `id` int(11) NOT NULL auto_increment,					  `value` varchar(100) NOT NULL COMMENT '字段名称',					  `valuelist` varchar(1000) NOT NULL COMMENT '字段值',					  PRIMARY KEY  (`id`)					) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";			DB::query($query);            add_table('shopv2_para');            $query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_plist` (					  `id` int(11) NOT NULL auto_increment,					  `pid` int(11) NOT NULL COMMENT '商品ID',					  `price` double NOT NULL COMMENT '价格',					  `valuelist` varchar(500) NOT NULL COMMENT '字段值',					  `stock` int(11) NOT NULL COMMENT '库存',					  `sales` int(11) NOT NULL COMMENT '销量',					  `para_img` varchar(500) NOT NULL COMMENT '规格图片',					  PRIMARY KEY  (`id`)					) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";			DB::query($query);            add_table('shopv2_plist');            $query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_product` (					  `pid` int(11) NOT NULL COMMENT '商品ID',					  `paralist` varchar(1000) NOT NULL COMMENT '商品用户选择字段信息',					  `searchlist` varchar(1000) NOT NULL COMMENT '用于列表页搜索的字段',					  `logistic` int(1) NOT NULL default '0' COMMENT '是否需要物流',					  `price` double NOT NULL default '0' COMMENT '价格',					  `stock` int(11) NOT NULL COMMENT '库存',					  `stock_show` int(1) NOT NULL default '1' COMMENT  '前台是否显示库存',					  `sales` int(11) NOT NULL COMMENT '销量',					  `original` double NOT NULL default '0' COMMENT '原价',					  `freight_mould` int(11) NOT NULL default '0' COMMENT '运费模板',					  `freight` double NOT NULL COMMENT '运费',					  `purchase` int(1) NOT NULL default '0' COMMENT '限购',					  `lnvoice` int(11) NOT NULL COMMENT '是否发票',					  `message` varchar(500) NOT NULL COMMENT '留言字段信息',					  `user_discount` text NOT NULL COMMENT '会员折扣',					  `auto_sent` int(11) NOT NULL COMMENT '自动发货',					  PRIMARY KEY  (`pid`)					) ENGINE=MyISAM DEFAULT CHARSET=utf8;";			DB::query($query);            add_table('shopv2_product');            $query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_searchlist` (					  `id` int(11) NOT NULL auto_increment,					  `no_order` int(11) NOT NULL COMMENT '排序',					  `name` varchar(100) NOT NULL COMMENT '名称',					  `lang` varchar(50) NOT NULL COMMENT '语言',					  PRIMARY KEY  (`id`)					) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";			DB::query($query);            add_table('shopv2_searchlist');            $query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_searchlist_tag` (					  `id` int(11) NOT NULL auto_increment,					  `sid` int(11) NOT NULL COMMENT '父ID',					  `no_order` int(11) NOT NULL COMMENT '排序',					  `name` varchar(50) NOT NULL COMMENT '名称',					  `title` varchar(50) NOT NULL COMMENT '页面标题',					  `keywords` varchar(1000) NOT NULL COMMENT '页面关键词',					  `description` varchar(1000) NOT NULL COMMENT '页面描述',					  `url` varchar(100) NOT NULL,					  PRIMARY KEY  (`id`)					) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";			DB::query($query);            add_table('shopv2_searchlist_tag');            $query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_finance` (					  `id` int(11) NOT NULL auto_increment,					  `uid` int(11) NOT NULL COMMENT '用户ID',					  `username` varchar(50) NOT NULL COMMENT '用户名',					  `type` int(11) NOT NULL COMMENT '类型',					  `reason` varchar(1000) NOT NULL COMMENT '事由',					  `price` double NOT NULL COMMENT '金额',					  `balance` double NOT NULL COMMENT '余额',					  `addtime` int(11) NOT NULL COMMENT '添加时间',					  `adminname` varchar(50) NOT NULL COMMENT '操作人',					  `lang` varchar(50) NOT NULL COMMENT '语言',					  PRIMARY KEY  (`id`)					) ENGINE=MyISAM  DEFAULT CHARSET=utf8";			DB::query($query);			add_table('shopv2_finance');			$query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_user` (				`uid` int(11) NOT NULL COMMENT '用户ID',				`username` varchar(50) NOT NULL COMMENT '用户名',				`goods_list` text NOT NULL COMMENT '已购买商品列表',				`balance` double NOT NULL COMMENT '余额',				`lang` varchar(50) NOT NULL DEFAULT 'cn' COMMENT '语言',				PRIMARY KEY  (`uid`)				) ENGINE=MyISAM DEFAULT CHARSET=utf8;";			DB::query($query);			add_table('shopv2_user');			$query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_favorite` (					`id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT ,					`uid`  int(10) UNSIGNED NOT NULL COMMENT '用户id' ,					`pid`  int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '产品id' ,					`addtime`  int(10) NOT NULL DEFAULT 0 COMMENT '收藏时间' ,					`lang`  varchar(20) NOT NULL,					PRIMARY KEY (`id`)					);";			DB::query($query);			add_table('shopv2_favorite');            //shop 4.0.0            //用户组折扣			$query = "CREATE TABLE  IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_group_discount`(                  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,                  `groupid` int(11) NOT NULL COMMENT '用户组ID',                  `gdiscount` varchar(50) DEFAULT NULL COMMENT '折扣',                  `lang` varchar(50) DEFAULT NULL,                  PRIMARY KEY (`id`)                ) ENGINE=MyISAM DEFAULT CHARSET=utf8;";			DB::query($query);			add_table('shopv2_group_discount');/*			$query = "CREATE TABLE  IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_group_price`(                  `id` int(50) unsigned NOT NULL AUTO_INCREMENT,                  `plist_id` int(50) NOT NULL COMMENT '商品规格id',                  `pid` int(50) NOT NULL COMMENT '产品id',                  `group_access` int(50) DEFAULT NULL COMMENT '用户组权限',                  `group_price` decimal(50,2) DEFAULT NULL COMMENT '用户组价格',                  `lang` varchar(50) DEFAULT NULL,                  PRIMARY KEY (`id`)                ) ENGINE=MyISAM DEFAULT CHARSET=utf8;";			DB::query($query);			add_table('shopv2_group_price');*/			//退换货留言			$query = "CREATE TABLE  IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_converse`(                  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,                  `order_id` varchar(50) NOT NULL COMMENT '订单ID',                  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',                  `admin_name` varchar(50) DEFAULT NULL COMMENT '用户名称',                  `user_type` int(11) DEFAULT NULL COMMENT '发言用户类型 1管理员 2用户',                  `content` text COMMENT '留言内容',                  `addtime` varchar(20) DEFAULT NULL COMMENT '留言时间',                  `img` varchar(255) DEFAULT NULL COMMENT '附件地址 |',                  `lang` varchar(10) NOT NULL,                  PRIMARY KEY (`id`)                ) ENGINE=MyISAM DEFAULT CHARSET=utf8;";			DB::query($query);			add_table('shopv2_converse');            //自动发放序列号            $query = "CREATE TABLE `{$_M['config']['tablepre']}shopv2_card` (                  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,                  `pid` int(11) NOT NULL COMMENT '商品ID',                  `splist_id` int(11) DEFAULT NULL COMMENT '商品规格ID',                  `card` text COMMENT '发卡能容',                  `state` int(11) DEFAULT NULL COMMENT '状态 1未使用  2已发放  3已使用',                  `orderid` int(20) DEFAULT NULL COMMENT '订单ID',                  `uid` int(11) DEFAULT NULL COMMENT '用户ID',                  `granttime` int(20) DEFAULT NULL COMMENT '发卡时间',                  `addtime` int(20) DEFAULT NULL COMMENT '添加时间',                  `lang` varchar(50) DEFAULT NULL,                  PRIMARY KEY (`id`)                ) ENGINE=MyISAM DEFAULT CHARSET=utf8";            DB::query($query);            add_table('shopv2_card');            //地区信息表            $query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_zone` (                      `id` int(50) NOT NULL AUTO_INCREMENT,                      `name` varchar(100) DEFAULT NULL,                      `pid` int(50) DEFAULT NULL,                      `lang` varchar(50) DEFAULT NULL,                      PRIMARY KEY (`id`)                    ) ENGINE=MyISAM DEFAULT CHARSET=utf8";            DB::query($query);            add_table('shopv2_zone');            //商品规格关系表            $query = "CREATE TABLE `{$_M['config']['tablepre']}shopv2_goods_relation` (                      `id` int(11) NOT NULL AUTO_INCREMENT,                      `splist_id` int(11) NOT NULL,                      `spec_value_id` int(11) NOT NULL,                      `spec_id` int(11) NOT NULL,                      `pid` int(11) NOT NULL,                      PRIMARY KEY (`id`)                    ) ENGINE=MyISAM DEFAULT CHARSET=utf8";            DB::query($query);            add_table('shopv2_goods_relation');            //商品规格表            $query = "CREATE TABLE `{$_M['config']['tablepre']}shopv2_goods_spec` (                      `id` int(11) NOT NULL AUTO_INCREMENT,                      `name` varchar(50) NOT NULL,                      `lang` varchar(50) NOT NULL,                      PRIMARY KEY (`id`),                      KEY `name` (`name`) USING BTREE                    ) ENGINE=MyISAM DEFAULT CHARSET=utf8";            DB::query($query);            add_table('shopv2_goods_spec');            //商品规参数格表            $query = "CREATE TABLE `{$_M['config']['tablepre']}shopv2_goods_spec_value` (                      `id` int(11) NOT NULL AUTO_INCREMENT,                      `spec_id` int(11) NOT NULL COMMENT '规格id',                      `value` varchar(50) NOT NULL COMMENT '规格值',                      `lang` varchar(50) NOT NULL,                      PRIMARY KEY (`id`),                      KEY `value` (`value`) USING BTREE,                      KEY `spec_id` (`spec_id`) USING BTREE                    ) ENGINE=MyISAM DEFAULT CHARSET=utf8";            DB::query($query);            add_table('shopv2_goods_spec_value');            //商品规分类表            $query = "CREATE TABLE `{$_M['config']['tablepre']}shopv2_goods_splist` (                      `id` int(11) NOT NULL AUTO_INCREMENT,                      `pid` int(11) NOT NULL COMMENT '产品ID',                      `price` double NOT NULL COMMENT '价格',                      `stock` int(11) NOT NULL COMMENT '库存',                      `sales` int(11) NOT NULL COMMENT '销量',                      `para_img` varchar(500) NOT NULL COMMENT '规格图片',                      `lang` varchar(50) NOT NULL,                      PRIMARY KEY (`id`),                      KEY `pid` (`pid`) USING BTREE                    ) ENGINE=MyISAM DEFAULT CHARSET=utf8";            DB::query($query);            add_table('shopv2_goods_splist');    //添加数据			//安装语言语言            $this->setWebLang();            $this->setAdminLang();            //添加地区信息            $this->setzone();            //添加配置数据            $this->setconfig();            //添加插件信息            $this->setplugin();            //按启用语言添加配置            foreach ($_M['langlist']['web'] as $lang) {                //添加左侧导航                $this->setLeftNAV($lang['mark']);            }		}else{		    if(version_compare($app['ver'],$this->ver)<0){                //商城升级                $this->appupdate();            }		}        deldir(PATH_WEB.'cache',1);     //清除语言缓存		$url = $_M['url']['site_admin']."index.php?n=appstore&c=appstore&a=doappdetail&type=app&no=10080&lang=cn&anyid=65";		return "<script>alert('商城需要支付接口应用配合才能正常使用,如未安装请点击安装支付接口应用(老用户可通过直接安装升级)');window.location.href='".$url."'</script>";	}    /**     * 添加前台语言     */    public function setWebLang()    {        global $_M;        foreach ($_M['langlist']['web'] as $lang) {            $query = "DELETE FROM {$_M['table']['language']} WHERE app = '{$this->appno}' AND site = '0' AND lang = '{$lang['mark']}'";            DB::query($query);            if ($lang['mark'] == 'cn' || $lang['mark'] == 'en') {                $content = file_get_contents(PATH_ALL_APP . "shop/admin/sql/shop_lang_web_{$lang['mark']}.sql");                $this->insertsql($content);            }else{                //其他语种                $content = file_get_contents(PATH_ALL_APP . "shop/admin/sql/shop_lang_web_cn.sql");                $content = str_replace("'cn')","'{$lang['mark']}')",$content);                $this->insertsql($content);            }        }        return;    }    /**     * 添加后台语言     */    public function setAdminLang()    {        global $_M;        foreach ($_M['langlist']['admin'] as $lang) {            $query = "DELETE FROM {$_M['table']['language']} WHERE app = '{$this->appno}' AND site = '1' AND lang = '{$lang['mark']}'";            DB::query($query);            if ($lang['mark'] == 'cn' || $lang['mark'] == 'en') {                $content = file_get_contents(PATH_ALL_APP . "shop/admin/sql/shop_lang_admin_{$lang['mark']}.sql");                $this->insertsql($content);            }else{                //其他语种                $content = file_get_contents(PATH_ALL_APP . "shop/admin/sql/shop_lang_admin_cn.sql");                $content = str_replace("'cn')","'{$lang['mark']}')",$content);                $this->insertsql($content);            }        }        return;    }    /**     * 添加地区     */    public function setzone()    {        global $_M;        $content = file_get_contents(PATH_ALL_APP . "shop/admin/sql/shop_zone.sql");        $this->insertsql($content);    }    /**     * 插件设置     */    public function setplugin()    {        global $_M;        $query = "SELECT * FROM {$_M['table']['app_plugin']} WHERE no='{$this->appno}'";        if(!DB::get_one($query)){            $query = "INSERT INTO {$_M['table']['app_plugin']} SET no_order='0',no='{$this->appno}',m_name='shop',m_action='doweb',effect=1";            DB::query($query);            $query = "INSERT INTO {$_M['table']['app_plugin']} SET no_order='0',no='{$this->appno}',m_name='shop',m_action='doproduct_list',effect=1";            DB::query($query);            $query = "INSERT INTO {$_M['table']['app_plugin']} SET no_order='0',no='{$this->appno}',m_name='shop',m_action='doproduct_show',effect=1";            DB::query($query);            $query = "INSERT INTO {$_M['table']['app_plugin']} SET no_order='0',no='{$this->appno}',m_name='shop',m_action='doproduct_plugin_class',effect=1";            DB::query($query);            $query = "INSERT INTO {$_M['table']['app_plugin']} SET no_order='0',no='{$this->appno}',m_name='shop',m_action='temporary_plugin_product_list',effect=1";            DB::query($query);            $query = "INSERT INTO {$_M['table']['app_plugin']} SET no_order='0',no='{$this->appno}',m_name='shop',m_action='doadmin',effect=1";            DB::query($query);            $query = "INSERT INTO {$_M['table']['app_plugin']} SET no_order='0',no='{$this->appno}',m_name='shop',m_action='doseourl',effect=1";            DB::query($query);            $query = "INSERT INTO {$_M['table']['app_plugin']} SET no_order='0',no='{$this->appno}',m_name='shop',m_action='dopay',effect=1";            DB::query($query);            $query = "INSERT INTO {$_M['table']['app_plugin']} SET no_order='0',no='{$this->appno}',m_name='shop',m_action='doget_goods',effect=1";            DB::query($query);            $query = "INSERT INTO {$_M['table']['app_plugin']} SET no_order='0',no='{$this->appno}',m_name='shop',m_action='search_order',effect=1";            DB::query($query);            $query = "INSERT INTO {$_M['table']['app_plugin']} SET no_order='0',no='{$this->appno}',m_name='shop',m_action='module_get_list_by_class_query',effect=1";            DB::query($query);        }    }    /**     * 用户中心左侧导航栏     */    public function setLeftNAV($lang)    {        global $_M;        //会员中心侧导航4.0.0		$ifmember_left_shop=array(            array('title'=>'app_shop_mycart','filename'=>'cart.php','own_order'=>0,'target'=>1,'effect'=>1),            array('title'=>'app_shop_personal','filename'=>'profile.php','own_order'=>1,'target'=>0,'effect'=>1),            array('title'=>'app_shop_myorder','filename'=>'order.php','own_order'=>2,'target'=>0,'effect'=>1),            array('title'=>'app_shop_myfavorite','filename'=>'favorite.php','own_order'=>3,'target'=>0,'effect'=>1),            array('title'=>'app_shop_mydiscount','filename'=>'discount.php','own_order'=>4,'target'=>0,'effect'=>1),            array('title'=>'app_shop_myaddress','filename'=>'address.php','own_order'=>5,'target'=>0,'effect'=>1),            #array('title'=>'app_shop_consumption_detail','filename'=>'finance.php','own_order'=>7)        );		foreach ($ifmember_left_shop as $value) {            $query  = "SELECT * FROM {$_M['table']['ifmember_left']} WHERE title='{$value['title']}' AND filename='{$value['filename']}' AND no='{$this->appno}' AND lang = '{$lang}'";            $result = DB::get_one($query);            if(!$result) {                $query = "INSERT INTO {$_M['table']['ifmember_left']} SET no='{$this->appno}',columnid='0',title='{$value['title']}',foldername='shop',filename='{$value['filename']}',target='{$value['target']}',own_order = '{$value['own_order']}',effect = {$value['effect']},lang='{$lang}'";                DB::query($query);            }        }    }    /**     * 添加应用配置     */    public function setconfig()    {        global $_M;        $this->app_config_insert('shopv2_onlinepay', '1');        $this->app_config_insert('shopv2_deliverypay', '0');        $this->app_config_insert('shopv2_gi', '0');        $this->app_config_insert('shopv2_vat', '0');        $this->app_config_insert('shopv2_ei', '0');        $this->app_config_insert('shopv2_invoice','');        $this->app_config_insert('shopv2_open', '1');        $this->app_config_insert('shopv2_order_end', '1440');        $this->app_config_insert('shopv2_order_close', '10080');        $this->app_config_insert('shopv2_adminemail','');        $this->app_config_insert('shopv2_admintel','');        $this->app_config_insert('shopv2_usmsv1', '您的订单已经下单成功，请在30分钟内付款，超过30分钟订单将被关闭！');        $this->app_config_insert('shopv2_usmsv2', '您的订单已经付款成功，我们将会及时安排时间为您发货！');        $this->app_config_insert('shopv2_usmsv3', '您的订单已经发货，请注意收货！');        $this->app_config_insert('shopv2_is_usmsv1', '0');        $this->app_config_insert('shopv2_is_usmsv2', '0');        $this->app_config_insert('shopv2_is_usmsv3', '0');        $this->app_config_insert('shopv2_is_uemailv1', '0');        $this->app_config_insert('shopv2_is_uemailv2', '0');        $this->app_config_insert('shopv2_is_uemailv3', '0');        $this->app_config_insert('shopv2_uemailtv1', '{rid}订单下单成功');        $this->app_config_insert('shopv2_uemailtv2', '{rid}订单付款成功');        $this->app_config_insert('shopv2_uemailtv3', '{rid}订单已经发货');        $this->app_config_insert('shopv2_uemailcv1', '您的订单{rid}已经下单成功，请在30分钟内付款，超过30分钟订单将被关闭！');        $this->app_config_insert('shopv2_uemailcv2', '尊敬的{user}会员，您的订单{rid}已经付款成功，我们将会及时安排时间为您发货！');        $this->app_config_insert('shopv2_uemailcv3', '尊敬的{user}会员，您的订单{rid}已经通过{logistics}发货，快递单号：{odd}，请注意收货');        //$this->app_config_insert('shopv2_bankinfo');        //$this->app_config_insert('shopv2_sinfo');        //$this->app_config_insert('shopv2_skin_user', 'shopv2');        //$this->app_config_insert('shopv2_wap_skin_user', 'shopv2_mobile');        $this->app_config_insert('shopv2_order_auto_close', '0');        $this->app_config_insert('shopv2_order_auto_close_time', '90');        $this->app_config_insert('shopv2_order_auto_ok', '0');        $this->app_config_insert('shopv2_order_auto_ok_time', '7');        $this->app_config_insert('shopv2_order_auto_del', '0');        $this->app_config_insert('shopv2_order_auto_del_time', '30');        $this->app_config_insert('shopv2_price_str_prefix','￥');        $this->app_config_insert('shopv2_price_str_suffix', '元');        // 新加变量        $this->app_config_insert('shopv2_express_key', '');        $this->app_config_insert('shopv2_guest_open', '0');        $this->app_config_insert('shopv2_logistics_open', '0');        $this->app_config_insert('shopv2_recommend', '2');        $this->app_config_insert('shopv2_recommend_num', '5');        $this->app_config_insert('shopv2_recommend_order', '0');        $this->app_config_insert('shopv2_moregoods', '1');        $this->app_config_insert('shopv2_moregoods_num', '12');        $this->app_config_insert('shopv2_moregoods_order', '0');        $this->app_config_insert('shopv2_moregoods_order', '0');    //排序规则        //4.0.0        $this->app_config_insert('shopv2_price_set', '0');          //价格默认设置方式        $this->app_config_insert('shopv2_price_refund', '0');       //自助退款        $this->app_config_insert('shopv2_return_goods', '0');       //退换货        $this->app_config_insert('shopv2_price_reason', '');        //取消订单原由        $this->app_config_insert('shopv2_refund_reason', '');       //退换货单原由        $this->app_config_insert('shopv2_refund_tips', '');         //退换货提示语言        $this->app_config_insert('shopv2_discount_type_1', '0');    //多件商品打折        $this->app_config_insert('shopv2_discount_type_2', '0');    //每单固定折扣        $this->app_config_insert('shopv2_discount_static', '0');    //固定折扣价格        $this->app_config_insert('shopv2_discount_plan', '0');      //数量折扣        $this->app_config_insert('shopv2_stock_type', '0');         //未完成订单是否减少库存        $this->app_config_insert('shopv2_para', '1');               //商城规格搜索开关    }    public function appupdate()    {        global $_M;        $update = load::app_class('shop/admin/update', 'new');        $update->update();    }    //应用更新    public function verupdate(){        global $_M;        //2.0.1        $this->app_config_insert('shopv2_order_auto_del_time', $_M['config']['shopv2_order_del_ok_time']);        // 3.0.0        $this->app_config_insert('shopv2_express_key', '');        $this->app_config_insert('shopv2_guest_open', '0');        $this->app_config_insert('shopv2_logistics_open', '0');        $this->app_config_insert('shopv2_recommend', '2');        $this->app_config_insert('shopv2_recommend_num', '5');        $this->app_config_insert('shopv2_recommend_order', '0');        $this->app_config_insert('shopv2_moregoods', '2');        $this->app_config_insert('shopv2_moregoods_num', '12');        $this->app_config_insert('shopv2_moregoods_order', '0');        //4.0.0        $this->app_config_insert('shopv2_price_set', '0');          //价格默认设置方式        $this->app_config_insert('shopv2_price_refund', '0');       //自助退款        $this->app_config_insert('shopv2_return_goods', '0');       //退换货        $this->app_config_insert('shopv2_price_reason', '');        //取消订单原由        $this->app_config_insert('shopv2_refund_reason', '');       //退换货单原由        $this->app_config_insert('shopv2_refund_tips', '');         //退换货提示语言        $this->app_config_insert('shopv2_discount_type', '0');      //折扣类型        $this->app_config_insert('shopv2_discount_type_1', '0');    //多件商品打折        $this->app_config_insert('shopv2_discount_static', '0');    //固定折扣价格        $this->app_config_insert('shopv2_discount_plan', '0');      //数量折扣        $this->app_config_insert('shopv2_stock_type', '0');         //未完成订单是否减少库存        $query = "UPDATE {$_M['table']['applist']} SET ver='{$this->ver}',target=1 WHERE no = '{$this->appno}'";        DB::query($query);        // 3.0.0        $query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_favorite` (					`id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT ,					`uid`  int(10) UNSIGNED NOT NULL COMMENT '用户id' ,					`pid`  int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '产品id' ,					`addtime`  int(10) NOT NULL DEFAULT 0 COMMENT '收藏时间' ,					`lang`  varchar(20) NOT NULL,					PRIMARY KEY (`id`)					);";        DB::query($query);        add_table('shopv2_favorite');        $query = "CREATE TABLE IF NOT EXISTS `{$_M['config']['tablepre']}shopv2_tracking` (					  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,					  `order_id` varchar(200) NOT NULL COMMENT '商品订单号',					  `tracking_no` varchar(100) NOT NULL COMMENT '快递单号',					  `information` text NOT NULL COMMENT '物流信息',					  `addtime` int(10) NOT NULL COMMENT '创建时间',					  `updatetime` int(10) NOT NULL COMMENT '最后更新时间',					  PRIMARY KEY (`id`)					) ENGINE=MyISAM DEFAULT CHARSET=utf8;";        DB::query($query);        add_table('shopv2_tracking');        $query = "ALTER TABLE `{$_M['config']['tablepre']}pay_order` ADD COLUMN `uid` int(10)";        DB::query($query);        $query = "ALTER TABLE `{$_M['config']['tablepre']}shopv2_discount_coupon` ADD COLUMN `lang` varchar(10) NOT NULL COMMENT '语言'";        DB::query($query);        $query =  "ALTER TABLE `{$_M['config']['tablepre']}shopv2_plist` ADD COLUMN `para_img` varchar(500) NOT NULL COMMENT '规格图片'";        DB::query($query);        $query =  "ALTER TABLE `{$_M['config']['tablepre']}shopv2_user` ADD COLUMN `lang` varchar(50) NOT NULL DEFAULT 'cn' COMMENT '语言'";        DB::query($query);        // 4.0.0        $query = "ALTER TABLE `met_shopv2_order` ADD COLUMN `reason`  varchar(255) NOT NULL COMMENT '退换货事由'";        db::query($query);        $query = "ALTER TABLE `met_shopv2_product` ADD COLUMN `auto_sent`  int(11) NOT NULL COMMENT '自动发货'";        db::query($query);        $query = "ALTER TABLE `met_shopv2_order` ADD COLUMN `auto_sent`  int(11) NOT NULL DEFAULT 0  COMMENT '自动发货'";        db::query($query);        //添加左侧导航        $this->setleftnav();    }    /**     * 写入配置数据     * @param $name     * @param $value     * @param string $lang     * @param $appno     */	public function app_config_insert($name, $value, $lang = ''){		global $_M;        foreach($_M['langlist']['web'] as $key=>$val){            $query = "SELECT * FROM {$_M['table']['app_config']} WHERE name='{$name}' AND lang='{$val['mark']}'";            if(!DB::get_one($query)){            $query = "INSERT INTO {$_M['table']['app_config']} SET name='{$name}',value='{$value}',appno='{$this->appno}' ,lang='{$val['mark']}'";            DB::query($query);            }        }	}    /**     * 写入语言数据     * @param $name     * @param $value     * @param int $site     * @param string $lang     */	public function lang_insert($name, $value ,$site = 0, $lang = ''){		global $_M;		foreach($_M['langlist']['web'] as $key=>$val){			$query = "SELECT * FROM {$_M['table']['language']} WHERE name='{$name}' AND site='{$site}' AND lang='{$val['mark']}' AND app='{$this->appno}'";			if(!DB::get_one($query)){				$query = "INSERT INTO {$_M['table']['language']} SET name='{$name}',value='{$value}', site='{$site}',no_order=0,array=0,app='{$this->appno}',lang='{$val['mark']}'";				DB::query($query);			}		}	}    /**     * 执行sql文件     * @param $content     */    public function insertsql($content)    {        global $_M;        if($content) {            $sql=explode("\n",$content);            foreach ($sql as $query) {                if ($query!=='' && !strstr($query,'##')) {                    $query = str_replace('met_',$_M['config']['tablepre'],$query);                    DB::query($query);                }            }        }        return;    }	/**	 * 生成语言文件     * 现已失效	 * @DateTime 2017-08-31	 */	public function set_lang_file_old() {		global $_M;		foreach($_M['langlist']['web'] as $key=>$val){			$query = "SELECT * FROM {$_M['table']['language']} WHERE app = '{$this->appno}' and lang='{$val['mark']}'";			$lang_array = DB::get_all($query);			$langs = array();			if($lang_array){				foreach ($lang_array as $key => $v) {					$langs[$key]['name'] = $v['name'];					$langs[$key]['value'] = $v['value'];				}				$lang_file = PATH_APP_FILE."lang/shop_lang_{$val['mark']}.js";				file_put_contents($lang_file, "window.SHOPLANG = ".json_encode($langs,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));			}		}	}}?>