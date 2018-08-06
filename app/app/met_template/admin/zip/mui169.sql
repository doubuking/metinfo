#MetInfo.cn Created version:6.0.0 
#https://show.metinfo.cn/m/mui169/341/
#met_
# --------------------------------------------------------


DROP TABLE IF EXISTS ;
;


DROP TABLE IF EXISTS met_admin_array;
CREATE TABLE `met_admin_array` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `array_name` varchar(255) NOT NULL,
  `admin_type` text NOT NULL,
  `admin_ok` int(11) NOT NULL DEFAULT '0',
  `admin_op` varchar(30) DEFAULT 'metinfo',
  `admin_issueok` int(11) NOT NULL DEFAULT '0',
  `admin_group` int(11) NOT NULL,
  `user_webpower` int(11) NOT NULL,
  `array_type` int(11) DEFAULT NULL,
  `lang` varchar(50) DEFAULT NULL,
  `langok` varchar(255) DEFAULT 'metinfo',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO met_admin_array VALUES('3','管理员','metinfo','1','metinfo','0','10000','256','2','metinfo','metinfo');
INSERT INTO met_admin_array VALUES('1','普通会员','','0','','0','0','1','1','cn','');
INSERT INTO met_admin_array VALUES('2','代理商','','0','','0','0','2','1','cn','');

DROP TABLE IF EXISTS met_admin_table;
CREATE TABLE `met_admin_table` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `admin_type` text NOT NULL,
  `admin_id` char(20) NOT NULL,
  `admin_pass` char(64) DEFAULT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_sex` tinyint(1) NOT NULL DEFAULT '1',
  `admin_tel` varchar(20) DEFAULT NULL,
  `admin_mobile` varchar(20) DEFAULT NULL,
  `admin_email` varchar(150) DEFAULT NULL,
  `admin_qq` varchar(12) NOT NULL,
  `admin_msn` varchar(40) NOT NULL,
  `admin_taobao` varchar(40) NOT NULL,
  `admin_introduction` text,
  `admin_login` int(11) unsigned NOT NULL DEFAULT '0',
  `admin_modify_ip` varchar(20) DEFAULT NULL,
  `admin_modify_date` datetime DEFAULT NULL,
  `admin_register_date` datetime DEFAULT NULL,
  `admin_approval_date` datetime DEFAULT NULL,
  `admin_ok` int(11) NOT NULL DEFAULT '0',
  `admin_op` varchar(30) DEFAULT 'metinfo',
  `admin_issueok` int(11) NOT NULL DEFAULT '0',
  `admin_group` int(11) NOT NULL,
  `companyname` varchar(255) DEFAULT NULL,
  `companyaddress` varchar(255) DEFAULT NULL,
  `companyfax` varchar(255) DEFAULT NULL,
  `usertype` int(11) DEFAULT '0',
  `checkid` int(1) DEFAULT '0',
  `companycode` varchar(50) DEFAULT NULL,
  `companywebsite` varchar(50) DEFAULT NULL,
  `cookie` text NOT NULL,
  `admin_shortcut` text NOT NULL,
  `lang` varchar(50) DEFAULT NULL,
  `content_type` tinyint(4) DEFAULT NULL,
  `langok` varchar(255) DEFAULT 'metinfo',
  PRIMARY KEY (`id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO met_admin_table VALUES('1','metinfo','metinfo','10684b121f932bcc05f89c711114f505','','1','','','123@qq.com','','','','创始人','21','175.8.38.146','2018-07-10 13:46:29','2018-06-26 05:00:35','0000-00-00 00:00:00','1','metinfo','0','10000','','','','3','0','','','{\"time\":1531201590,\"metinfo_admin_name\":\"metinfo\",\"metinfo_admin_pass\":\"10684b121f932bcc05f89c711114f505\",\"metinfo_admin_id\":\"1\",\"metinfo_admin_type\":\"3\",\"metinfo_admin_pop\":\"metinfo\",\"metinfo_admin_time\":\"1531201589\",\"metinfo_admin_lang\":\"metinfo\",\"languser\":\"\"}','[{\"name\":\"lang_skinbaseset\",\"url\":\"system/basic.php?anyid=9&lang=cn\",\"bigclass\":\"1\",\"field\":\"s1001\",\"type\":\"2\",\"list_order\":\"10\",\"protect\":\"1\",\"hidden\":\"0\",\"lang\":\"lang_skinbaseset\"},{\"name\":\"lang_indexcolumn\",\"url\":\"column/index.php?anyid=25&lang=cn\",\"bigclass\":\"1\",\"field\":\"s1201\",\"type\":\"2\",\"list_order\":\"0\",\"protect\":\"1\",\"hidden\":\"0\",\"lang\":\"lang_indexcolumn\"},{\"name\":\"lang_unitytxt_75\",\"url\":\"interface/skin_editor.php?anyid=18&lang=cn\",\"bigclass\":\"1\",\"field\":\"s1101\",\"type\":\"2\",\"list_order\":\"0\",\"protect\":\"1\",\"hidden\":\"0\",\"lang\":\"lang_unitytxt_75\"},{\"name\":\"lang_tmptips\",\"url\":\"interface/info.php?anyid=24&lang=cn\",\"bigclass\":\"1\",\"field\":\"\",\"type\":\"2\",\"list_order\":\"0\",\"protect\":\"1\",\"hidden\":\"0\",\"lang\":\"lang_tmptips\"},{\"name\":\"lang_mod2add\",\"url\":\"content/article/content.php?action=add&lang=cn&anyid=29\",\"bigclass\":\"1\",\"field\":\"\",\"type\":\"2\",\"list_order\":\"0\",\"protect\":\"0\",\"hidden\":\"0\",\"lang\":\"lang_mod2add\"},{\"name\":\"lang_mod3add\",\"url\":\"content/product/content.php?action=add&lang=cn&anyid=29\",\"bigclass\":\"1\",\"field\":\"\",\"type\":2,\"list_order\":\"0\",\"protect\":0}]','','1','metinfo');

DROP TABLE IF EXISTS met_app;
CREATE TABLE `met_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` varchar(10) NOT NULL,
  `ver` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `file` varchar(255) NOT NULL,
  `download` tinyint(1) NOT NULL,
  `power` int(11) NOT NULL,
  `sys` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `url` tinytext NOT NULL,
  `info` text NOT NULL,
  `addtime` int(11) NOT NULL,
  `updatetime` int(11) NOT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_admin_column;
CREATE TABLE `met_admin_column` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `bigclass` int(11) NOT NULL,
  `field` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `list_order` int(11) DEFAULT '0',
  `icon` varchar(255) DEFAULT NULL,
  `info` text NOT NULL,
  `display` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

INSERT INTO met_admin_column VALUES('5','lang_unitytxt_39','','0','0','1','7','<i class=\"fa fa-sliders\"></i>','','1');
INSERT INTO met_admin_column VALUES('73','lang_member','index.php?n=user&c=admin_user&a=doindex','72','1601','2','1','<i class=\"fa fa-users\"></i>','','1');
INSERT INTO met_admin_column VALUES('2','lang_content','','0','0','1','1','','','1');
INSERT INTO met_admin_column VALUES('3','lang_marketing','','0','0','1','2','<i class=\"fa fa-money\"></i>','','1');
INSERT INTO met_admin_column VALUES('4','lang_application','','0','0','1','4','','','1');
INSERT INTO met_admin_column VALUES('74','lang_safety','','0','0','1','6','<i class=\"fa fa-shield\"></i>','','1');
INSERT INTO met_admin_column VALUES('10','lang_language','index.php?n=language&c=language_admin&a=doindex','5','1002','2','3','<i class=\"fa fa-language\"></i>','','1');
INSERT INTO met_admin_column VALUES('11','lang_indexpic','index.php?n=imgmanager&c=imgmanager&a=dowatermark','5','1003','2','4','<i class=\"fa fa-picture-o\"></i>','','1');
INSERT INTO met_admin_column VALUES('12','lang_safety_efficiency','index.php?n=safe&c=index&a=doindex','74','1004','2','1','<i class=\"fa fa-shield\"></i>','','1');
INSERT INTO met_admin_column VALUES('13','lang_data_processing','index.php?n=databack&c=index&a=doindex','74','1005','2','2','<i class=\"fa fa-database\"></i>','','1');
INSERT INTO met_admin_column VALUES('57','lang_upfiletips7','index.php?n=webset&c=webset&a=doindex','5','1007','2','0','<i class=\"fa fa-newspaper-o\"></i>','','1');
INSERT INTO met_admin_column VALUES('18','lang_computer','index.php?n=theme&c=theme&a=doindex','69','1101','2','1','<i class=\"fa fa-desktop\"></i>','','1');
INSERT INTO met_admin_column VALUES('25','lang_htmColumn','index.php?n=column&c=index&a=doindex','5','1201','2','2','<i class=\"fa fa-sitemap\"></i>','','1');
INSERT INTO met_admin_column VALUES('29','lang_administration','index.php?n=manage&c=index&a=doindex','2','1301','2','2','<i class=\"fa fa-th-large\"></i>','','1');
INSERT INTO met_admin_column VALUES('71','lang_customers','index.php?n=online&c=online&a=doindex','3','1106','2','2','<i class=\"fa fa-comments-o\"></i>','','1');
INSERT INTO met_admin_column VALUES('70','lang_adminmobile','index.php?n=theme&c=theme&a=doindex&mobile=1','69','1102','2','2','<i class=\"fa fa-mobile\"></i>','','1');
INSERT INTO met_admin_column VALUES('69','lang_appearance','','0','0','1','3','<i class=\"fa fa-tachometer\"></i>','','1');
INSERT INTO met_admin_column VALUES('37','lang_seo','index.php?n=seo&c=seo&a=doindex','3','1404','2','3','<i class=\"fa fa-check\"></i>','','1');
INSERT INTO met_admin_column VALUES('39','lang_indexlink','index.php?n=link&c=link_admin&a=doindex','3','1406','2','4','<i class=\"fa fa-link\"></i>','','1');
INSERT INTO met_admin_column VALUES('40','lang_smsfuc','app/sms/sms.php','44','1503','3','3','sms.png','lang_dlapptips12','0');
INSERT INTO met_admin_column VALUES('42','lang_webnanny','app/nurse/index.php','44','1504','3','4','nurse.png','lang_dlapptips13','0');
INSERT INTO met_admin_column VALUES('43','lang_indexPhysical','index.php?n=physical&c=physical_admin&&a=doindex','44','1501','3','7','physical.png','lang_dlapptips17','1');
INSERT INTO met_admin_column VALUES('44','lang_myapp','index.php?n=myapp&c=myapp&&a=doindex','4','1505','2','1','<i class=\"fa fa-paper-plane\"></i>','','1');
INSERT INTO met_admin_column VALUES('47','lang_managertyp2','index.php?n=admin&c=admin_admin&a=doindex','72','1603','2','2','<i class=\"fa fa-users\"></i>','','1');
INSERT INTO met_admin_column VALUES('68','lang_release','index.php?n=content&c=content&a=doadd','2','1301','2','1','<i class=\"fa fa-plus\"></i>','','1');
INSERT INTO met_admin_column VALUES('72','lang_the_user','','0','0','1','5','<i class=\"fa fa-user\"></i>','','1');
INSERT INTO met_admin_column VALUES('75','lang_checkupdate','index.php?n=update&c=about&a=doindex','5','1104','2','5','<i class=\"fa fa-info-circle\"></i>','','1');
INSERT INTO met_admin_column VALUES('65','lang_dlapptips2','index.php?n=appstore&c=appstore&a=doindex','4','1507','2','9999','<i class=\"fa fa-cube\"></i>','','1');

DROP TABLE IF EXISTS met_column;
CREATE TABLE `met_column` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `foldername` varchar(50) DEFAULT NULL,
  `filename` varchar(50) DEFAULT NULL,
  `bigclass` int(11) DEFAULT '0',
  `samefile` int(11) NOT NULL DEFAULT '0',
  `module` int(11) DEFAULT NULL,
  `no_order` int(11) DEFAULT NULL,
  `wap_ok` int(1) DEFAULT '0',
  `wap_nav_ok` int(11) NOT NULL DEFAULT '0',
  `if_in` int(1) DEFAULT '0',
  `nav` int(1) DEFAULT '0',
  `ctitle` varchar(200) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `content` longtext,
  `description` text,
  `list_order` int(11) DEFAULT '0',
  `new_windows` varchar(50) DEFAULT NULL,
  `classtype` int(11) DEFAULT '1',
  `out_url` varchar(200) DEFAULT NULL,
  `index_num` int(11) DEFAULT '0',
  `access` int(11) DEFAULT '0',
  `indeximg` varchar(255) DEFAULT NULL,
  `columnimg` varchar(255) DEFAULT NULL,
  `isshow` int(11) DEFAULT '1',
  `lang` varchar(50) DEFAULT NULL,
  `namemark` varchar(255) DEFAULT NULL,
  `releclass` int(11) DEFAULT '0',
  `display` int(11) DEFAULT '0',
  `icon` varchar(100) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

INSERT INTO met_column VALUES('1','关于我们','about','','0','0','1','1','0','0','0','3','','','','','0','0','1','','0','0','','','0','cn','','0','0','');
INSERT INTO met_column VALUES('2','新闻中心','news','','0','0','2','2','0','0','0','3','','','','','1','0','1','','0','0','','','1','cn','','0','0','');
INSERT INTO met_column VALUES('3','经典案例','product','','0','0','3','3','0','0','0','3','','','','','1','0','1','','1','0','','','1','cn','','0','0','');
INSERT INTO met_column VALUES('4','加入我们','about1','','0','0','1','4','0','0','0','3','','','','','0','0','1','','0','0','','','0','cn','','0','0','');
INSERT INTO met_column VALUES('5','全站搜索','search','','0','0','11','99','0','0','0','0','','','','','1','0','1','','0','0','','','1','cn','','0','0','');
INSERT INTO met_column VALUES('6','网站地图','sitemap','','0','0','12','99','0','0','0','0','','','','','1','0','1','','0','0','','','1','cn','','0','0','');
INSERT INTO met_column VALUES('7','会员中心','member','','0','0','10','99','0','0','0','0','','','','','1','0','1','','0','0','','','1','cn','','0','0','');
INSERT INTO met_column VALUES('8','联系我们','about2','','0','0','1','5','0','0','0','3','','','<p style=\"text-align: center\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"><strong>联系我们</strong></span></p><p><br/></p><p><img width=\"530\" height=\"340\" src=\"https://api.map.baidu.com/staticimage?center=112.930601,28.121565&zoom=14&width=530&height=340&markers=112.930601,28.121565\" style=\"float: left; margin-right:50px;\"/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">地址：湖南省长沙市洋湖总部经济区<br/></span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">总机：400-0000-0000<br/></span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">电联：商务洽谈&nbsp; 133-0000-0000<br/></span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;人才招聘&nbsp; 133-0000-0000<br/></span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;意见反馈&nbsp; 133-0000-0000<br/></span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">邮箱：email@email.mt</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">微博：https://weibo.com/metinfo</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;Q Q：000000000</span></p>','','1','0','1','','0','0','','','1','cn','','0','0','');
INSERT INTO met_column VALUES('9','投诉建议','message','','0','0','7','6','0','0','0','3','','','','','1','0','1','','0','0','','','1','cn','','0','0','');
INSERT INTO met_column VALUES('10','公司介绍','about','','1','0','1','1','0','0','0','0','','','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"><strong><font face=\"微软雅黑, Microsoft YaHei\">IDED艾邸物业股份有限公司</font></strong></span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"></span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">艾邸物业自1992年创立以来，以“让社区变得更美好”为使命，奉行“我们的价值源于满意的服务和诚意的链接”的核心价值观，经过近30年的发展，已经成为中国最大的现代物业服务集团企业之一，并长期稳居中国物业管理行业市场化运营领先企业前列、中国物业管理行业综合实力前五强。艾邸物业是中国首批国家一级资质物业服务企业，员工人数约30000人（含分包方），形成了覆盖全国的发展态势，集团以“三精化”网格管理模式，着力打造“物业管理发展”与“社区生态建设”双主航道的发展模式。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">在物业管理业务领域，艾邸物业设立了五大区域及深圳、北京、上海、天津、武汉、南京、苏州、成都、重庆、福州、济南、合肥、南昌、大连、长沙、银川、乌鲁木齐等30余个分支机构，物业服务范围覆盖中国31个省、自治区、直辖市的80余个城市，物业项目约750余个，物业面积逾1.7亿平方米。所服务的物业类型包括：住宅（独立式房屋、多层、高层）和公建（写字楼、商业综合体、政府办公楼、大学、医院、公园、会展中心、工业物流园区等）。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">在社区生态圈建设领域，艾邸物业秉承包容式（而非攫取式）整合社区资源，共创共享行业社区生态圈价值，通过以物联网和云计算技术打造的集物业服务、社区商务和公共服务于一体的智慧型社区运营平台的全面应用，整合线上商家资源和线下社区资源，将物业管理和社区商务进行深度融合，积极推动社区生态圈的繁荣，并最终促进物业管理的良性发展和社区生活方式的蝶变式进化。</span></p><p style=\"text-align: center\"><img src=\"https://show.metinfo.cn/m/mui169/341/upload/201806/1529655484555798.jpg\" data-width=\"900\" width=\"900\" data-height=\"500\" height=\"500\" title=\"网站关键词\" alt=\"网站关键词\"/></p><p><br/></p>','','1','0','2','','0','0','','','1','cn','','0','0','');
INSERT INTO met_column VALUES('11','企业文化','about','','1','0','1','2','0','0','0','0','','','<p><span style=\"color: rgb(192, 0, 0);\"><strong><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">核心文化CORE CULTURE</span></strong></span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【艾邸使命】建筑人居梦想</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【艾邸愿景】百年地产，中国榜</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">样</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【艾邸精神】求实、创新，每天进</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">一步</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【艾邸作风】做好每个细节</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【艾邸价值观】实现“三个满意”，</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">奉行“三个大于”	【三个满意为】“员工满意、客户满意、社会满意”</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【三个大于为】“人的价值大于物的价</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">值；团队价值大于个人价值；社会价值大于企业价值”</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【品牌主张】美好你的生活</span></p><p><span style=\"color: rgb(192, 0, 0);\"><strong><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">经营文化MANAGEMENT CULTURE</span></strong></span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【经营理念】经营企业就是经营客户</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【利润观】追求持续稳健的赢利能力</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【品牌理念】意识决定品质，品质铸造品牌</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【产品理念】人无我有、人有我新、人新我快</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【营销理念】最好的营销源于对客户的深刻理解</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【质量理念】高标准、零缺陷；砸质量就是砸饭碗	【市场理念】把握市</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">场，引领需求；没有疲软的市场，只有疲软的行动</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【服务理念】服务是我们的天职；迅速反应，创造感动</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【创新观】创新无处不在；创新的主体是每一位员工；创新的目标就是</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">创造效益；创新的途径是率先性模仿并超越</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【管理目标】人人事事有责任，时时处处讲效率</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【管理理念】制度化、规范化，重执行、重监督；管理的难点就是创新的</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">课题</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【团队理念】创造1+1&gt;2的团队价值；创建互补型、学习型、创新型团队【</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">营销理念】最好的营销源于对客户的深刻理解</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【工作观】把工作当成事业，生活将无限美好</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【“三大问题”警示】终端的问题是领导的问题；看不出的问题是最大</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">的问题；重复出现的问题是最可怕的问题</span></p><p><span style=\"color: rgb(192, 0, 0);\"><strong><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">人才文化TALENTS</span></strong></span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【人才观】人才是金科第一资源；尊重知识、尊重人才；人人都有</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">可能成为人才；金科的岗位无贵贱之分；重学历而不唯学历；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【用人原则】德才兼备者重用；用人之长，避人之短；制度制衡，均</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">衡绩效；优先选拔内部人才；正确看待失败</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【人才管理准则】以人为本，理性公正，责任到位，有效沟通</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【考评原则】客观性、公正性、有效性；过程考核与结果考核并重</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【激励原则】贡献与回报成正比；业内富有竞争力</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【培养原则】帮助员工培养终生就业能力</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">【竞争原则】赛马与相马相结合</span></p>','','1','0','2','','0','0','','','1','cn','','0','0','');
INSERT INTO met_column VALUES('21','管理团队','case','','1','0','5','3','0','0','0','0','','','','','1','0','2','','0','0','','','1','cn','','1','0','');
INSERT INTO met_column VALUES('13','公司动态','news','','2','0','2','1','0','0','0','0','','','','','1','0','2','','0','0','','','1','cn','','0','0','');
INSERT INTO met_column VALUES('14','业内资讯','news','','2','0','2','2','0','0','0','0','','','','','1','0','2','','0','0','','','1','cn','','0','0','');
INSERT INTO met_column VALUES('15','高端住宅','product','','3','0','3','1','0','0','0','0','','','','','1','0','2','','1','0','','../upload/201806/1529662629.jpg','1','cn','','0','0','');
INSERT INTO met_column VALUES('16','地标性写字楼','product','','3','0','3','2','0','0','0','0','','','','','1','0','2','','1','0','','../upload/201806/1529895748.jpg','1','cn','','0','0','');
INSERT INTO met_column VALUES('17','商业综合体','product','','3','0','3','3','0','0','0','0','','','','','1','0','2','','1','0','','','1','cn','','0','0','');
INSERT INTO met_column VALUES('18','人才理念','about1','','4','0','1','1','0','0','0','0','','','<p style=\"white-space: normal; text-align: center;\"><span style=\"color: rgb(192, 0, 0); font-size: 20px;\"><strong><span style=\"color: rgb(192, 0, 0); font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">人才理念</span></strong></span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"><br/></span></p><p style=\"white-space: normal; text-align: center;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">我们坚信：艾邸物业是你事业成长的新起点。</span></p><p style=\"white-space: normal; text-align: center;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">先进的企业理念体系，成熟的规划模式，彻底的执行文化，快速的反馈制度</span></p><p style=\"white-space: normal; text-align: center;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">将为你的新事业注入了强大动力，完善培训管理体系，</span></p><p style=\"white-space: normal; text-align: center;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">科学的绩效评估机制，灵活的职位调配手段将为你的新事业解除后顾之忧。</span></p><p style=\"white-space: normal; text-align: center;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">我们坚信：在这里，你将享受到富有竞争力的发展机会，同时也不失人性化的管理模式。</span></p><p style=\"white-space: normal; text-align: center;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">在这里，你将领略到多元文化与个体成长的和谐统一。</span></p><p style=\"text-align: center;\"><img src=\"https://show.metinfo.cn/m/mui169/341/upload/201806/1529911033235211.jpg\" data-width=\"1200\" width=\"1200\" data-height=\"400\" height=\"400\" title=\"网站关键词\" alt=\"网站关键词\"/></p>','','1','0','2','','0','0','','','1','cn','','0','0','');
INSERT INTO met_column VALUES('26','在线应聘','job','','4','0','6','2','0','0','0','0','','','','','1','0','2','','0','0','','','1','cn','','4','0','');
INSERT INTO met_column VALUES('22','产品服务','about3','','0','0','1','7','0','0','0','0','','','','','1','0','1','','0','0','','','1','cn','','0','0','');
INSERT INTO met_column VALUES('23','物业管理','about3','','22','0','1','1','0','0','0','0','','','','对物业管理的核心价值创造过程进行了重新梳理和再造','0','0','2','','0','0','','','1','cn','','0','0','icon fa-street-view');
INSERT INTO met_column VALUES('24','楼宇科技','about3','','22','0','1','2','0','0','0','0','','','','专注于楼宇设备综合服务，拥有丰富的设施设备运行维护及经验','0','0','2','','0','0','','','1','cn','','0','0','icon fa-building-o');
INSERT INTO met_column VALUES('25','生活服务','about3','','22','0','1','3','0','0','0','0','','','','整合符合其需求的商品资源和本地服务资源','0','0','2','','0','0','','','1','cn','','0','0','icon fa-coffee');

DROP TABLE IF EXISTS met_config;
CREATE TABLE `met_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `mobile_value` text NOT NULL,
  `columnid` int(11) NOT NULL,
  `flashid` int(11) NOT NULL,
  `lang` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=592 DEFAULT CHARSET=utf8;

INSERT INTO met_config VALUES('1','met_nurse_link_tel','','','0','0','metinfo');
INSERT INTO met_config VALUES('2','met_nurse_link','0','','0','0','metinfo');
INSERT INTO met_config VALUES('3','metcms_v','6.0.0','','0','0','metinfo');
INSERT INTO met_config VALUES('4','met_nurse_job_tel','','','0','0','metinfo');
INSERT INTO met_config VALUES('5','met_nurse_job','0','','0','0','metinfo');
INSERT INTO met_config VALUES('6','met_nurse_massge_tel','','','0','0','metinfo');
INSERT INTO met_config VALUES('7','met_nurse_massge','0','','0','0','metinfo');
INSERT INTO met_config VALUES('8','met_nurse_feed_tel','','','0','0','metinfo');
INSERT INTO met_config VALUES('9','met_nurse_feed','0','','0','0','metinfo');
INSERT INTO met_config VALUES('10','met_nurse_member_tel','','','0','0','metinfo');
INSERT INTO met_config VALUES('11','met_nurse_member','0','','0','0','metinfo');
INSERT INTO met_config VALUES('12','met_nurse_monitor_tel','','','0','0','metinfo');
INSERT INTO met_config VALUES('13','met_nurse_monitor_timeb','23','','0','0','metinfo');
INSERT INTO met_config VALUES('14','met_nurse_monitor_timea','0','','0','0','metinfo');
INSERT INTO met_config VALUES('15','met_apptime','1373858456','','0','0','metinfo');
INSERT INTO met_config VALUES('16','met_nurse_monitor_weeka','1','','0','0','metinfo');
INSERT INTO met_config VALUES('17','met_nurse_monitor_fre','1','','0','0','metinfo');
INSERT INTO met_config VALUES('18','met_nurse_monitor','0','','0','0','metinfo');
INSERT INTO met_config VALUES('19','met_host','api.metinfo.cn','','0','0','metinfo');
INSERT INTO met_config VALUES('20','met_nurse_stat','0','','0','0','metinfo');
INSERT INTO met_config VALUES('21','met_nurse_stat_tel','','','0','0','metinfo');
INSERT INTO met_config VALUES('22','met_nurse_max','10','','0','0','metinfo');
INSERT INTO met_config VALUES('23','met_adminfile','3c9auyT8NkHnBVOdOyK5MsD1OZBjNaJKhMFIp0GwE9a5jw','','0','0','metinfo');
INSERT INTO met_config VALUES('24','met_ch_lang','1','','0','0','metinfo');
INSERT INTO met_config VALUES('25','met_stat_max','10000','','0','0','metinfo');
INSERT INTO met_config VALUES('26','met_stat_cr5','2','','0','0','metinfo');
INSERT INTO met_config VALUES('27','met_stat_cr4','3','','0','0','metinfo');
INSERT INTO met_config VALUES('28','met_stat_cr3','3','','0','0','metinfo');
INSERT INTO met_config VALUES('29','met_stat_cr1','0','','0','0','metinfo');
INSERT INTO met_config VALUES('30','met_stat_cr2','3','','0','0','metinfo');
INSERT INTO met_config VALUES('31','met_stat','1','','0','0','metinfo');
INSERT INTO met_config VALUES('32','met_ch_mark','cn','','0','0','metinfo');
INSERT INTO met_config VALUES('33','met_lang_editor','','','0','0','metinfo');
INSERT INTO met_config VALUES('34','met_lang_mark','1','','0','0','metinfo');
INSERT INTO met_config VALUES('35','met_agents_web_site','','','0','0','metinfo');
INSERT INTO met_config VALUES('36','met_admin_type_ok','0','','0','0','metinfo');
INSERT INTO met_config VALUES('37','met_admin_type','cn','','0','0','metinfo');
INSERT INTO met_config VALUES('38','met_sitemap_lang','1','','0','0','metinfo');
INSERT INTO met_config VALUES('39','met_sitemap_not2','1','','0','0','metinfo');
INSERT INTO met_config VALUES('40','met_sitemap_not1','0','','0','0','metinfo');
INSERT INTO met_config VALUES('41','met_sitemap_txt','0','','0','0','metinfo');
INSERT INTO met_config VALUES('42','met_sitemap_xml','1','','0','0','metinfo');
INSERT INTO met_config VALUES('43','met_index_type','cn','','0','0','metinfo');
INSERT INTO met_config VALUES('44','met_nurse_monitor_weekb','1','','0','0','metinfo');
INSERT INTO met_config VALUES('45','physical_time','2013-12-26 17:23:41','','0','0','metinfo');
INSERT INTO met_config VALUES('46','physical_admin','0','','0','0','metinfo');
INSERT INTO met_config VALUES('47','physical_backup','0','','0','0','metinfo');
INSERT INTO met_config VALUES('48','physical_update','528','','0','0','metinfo');
INSERT INTO met_config VALUES('49','physical_seo','1|1|1|','','0','0','metinfo');
INSERT INTO met_config VALUES('50','physical_static','1','','0','0','metinfo');
INSERT INTO met_config VALUES('51','physical_unread','0|3|0','','0','0','metinfo');
INSERT INTO met_config VALUES('52','physical_spam','1','','0','0','metinfo');
INSERT INTO met_config VALUES('53','physical_member','1','','0','0','metinfo');
INSERT INTO met_config VALUES('54','physical_web','0','','0','0','metinfo');
INSERT INTO met_config VALUES('55','physical_file','2|include/common.inc.php|,2|include/global/pseudo.php|,2|include/global/showmod.php|,2|include/global.func.php|,2|include/head.php|,1|install_bak/index.php|,1|install_bak/js/IE6-png.js|,1|install_bak/js/install.js|,1|lang/google_lang.php|,2|lang/lang.php|,2|lang/lang_en.php|,1|lang.php|,2|member/captcha.class.php|,2|member/save.php|,1|power.php|,1|public/js/mobile.js|,2|public/php/metlabel.inc.php|,2|wap/index.php|,2|admin/admin/save.php|,2|admin/app/dlapp/delapp.php|,2|admin/app/sms/sms.php|,1|admin/app/wap/content.php|,1|admin/app/wap/flash.php|,1|admin/app/wap/flashadd.php|,1|admin/app/wap/flashdelete.php|,1|admin/app/wap/flashedit.php|,1|admin/app/wap/flashsave.php|,1|admin/app/wap/index.php|,1|admin/app/wap/list.php|,1|admin/app/wap/map.php|,1|admin/app/wap/setflash.php|,1|admin/app/wap/skin_editor.php|,1|admin/app/wap/skin_manager.php|,2|admin/app/wap/wap.php|,2|admin/column/copycolumn.php|,2|admin/content/content.php|,2|admin/include/captcha.class.php|,2|admin/include/global.func.php|,2|admin/include/lang.php|,2|admin/include/metlist.php|,2|admin/include/return.php|,2|admin/interface/skin.php|,2|admin/interface/skin_editor.php|,2|admin/interface/skin_manager.php|,2|admin/seo/htm.php|,2|admin/system/lang/lang.php|,2|admin/system/olupdate.php|,2|admin/system/shortcut.php|,2|admin/system/shortcut_editor.php|,2|admin/system/sysadmin.php|,2|admin/system/universal.php|,2|admin/templates/met/admin/admin.html|,2|admin/templates/met/admin/admin_editor.html|,2|admin/templates/met/app/dlapp/dlapp.html|,2|admin/templates/met/app/dlapp/index.html|,2|admin/templates/met/app/sms/sms.html|,1|admin/templates/met/app/wap/content.html|,1|admin/templates/met/app/wap/flash.html|,1|admin/templates/met/app/wap/flashadd.html|,1|admin/templates/met/app/wap/flashedit.html|,1|admin/templates/met/app/wap/index.html|,1|admin/templates/met/app/wap/list.html|,1|admin/templates/met/app/wap/map.html|,1|admin/templates/met/app/wap/setflash.html|,1|admin/templates/met/app/wap/skin.html|,1|admin/templates/met/app/wap/skin_editor.html|,1|admin/templates/met/app/wap/top.html|,2|admin/templates/met/app/wap/wap.html|,2|admin/templates/met/content/article/article.html|,2|admin/templates/met/content/content.html|,2|admin/templates/met/content/download/download.html|,2|admin/templates/met/content/img/img.html|,2|admin/templates/met/content/product/product.html|,2|admin/templates/met/head.html|,2|admin/templates/met/images/js/iframes.js|,2|admin/templates/met/images/js/metinfo.js|,2|admin/templates/met/index.html|,2|admin/templates/met/interface/online/online.html|,2|admin/templates/met/interface/set_skin.html|,2|admin/templates/met/interface/skin.html|,2|admin/templates/met/interface/skin_editor.html|,2|admin/templates/met/seo/htm.html|,2|admin/templates/met/system/database/filedown.html|,2|admin/templates/met/system/set_safe.html|,2|admin/templates/met/system/shortcut.html|,2|admin/templates/met/system/shortcut_editor.html|,2|admin/templates/met/system/sysadmin.html|,2|admin/templates/met/system/universal.html|,2|admin/templates/met/system/uploadfile.html|,1|public/ui/mobile/addlink.html|,1|public/ui/mobile/ajax/download.html|,1|public/ui/mobile/ajax/img.html|,1|public/ui/mobile/ajax/job.html|,1|public/ui/mobile/ajax/member/cv.html|,1|public/ui/mobile/ajax/member/feedback.html|,1|public/ui/mobile/ajax/member/message.html|,1|public/ui/mobile/ajax/message.html|,1|public/ui/mobile/ajax/news.html|,1|public/ui/mobile/ajax/product.html|,1|public/ui/mobile/ajax/seach.html|,1|public/ui/mobile/cv.html|,1|public/ui/mobile/download.html|,1|public/ui/mobile/feedback.html|,1|public/ui/mobile/gap.html|,1|public/ui/mobile/img.html|,1|public/ui/mobile/job.html|,1|public/ui/mobile/link_index.html|,1|public/ui/mobile/member/basic.html|,1|public/ui/mobile/member/cv.html|,1|public/ui/mobile/member/cv_detail.html|,1|public/ui/mobile/member/editor.html|,1|public/ui/mobile/member/feedback.html|,1|public/ui/mobile/member/feedback_detail.html|,1|public/ui/mobile/member/getpassword.html|,1|public/ui/mobile/member/login.html|,1|public/ui/mobile/member/message.html|,1|public/ui/mobile/member/message_detail.html|,1|public/ui/mobile/member/register.html|,1|public/ui/mobile/member.html|,1|public/ui/mobile/message_index.html|,1|public/ui/mobile/news.html|,1|public/ui/mobile/product.html|,1|public/ui/mobile/search.html|,1|public/ui/mobile/show.html|,1|public/ui/mobile/showdownload.html|,1|public/ui/mobile/showimg.html|,1|public/ui/mobile/showjob.html|,1|public/ui/mobile/shownews.html|,1|public/ui/mobile/showproduct.html|,1|public/ui/mobile/sitemap.html|,2|wap/templates/met/head.html|','','0','0','metinfo');
INSERT INTO met_config VALUES('56','physical_fingerprint','3|install_bak/index.php|,3|install_bak/js/IE6-png.js|,3|install_bak/js/install.js|,3|lang/google_lang.php|,3|public/js/mobile.js|,3|templates/leadway/addlink.php|,3|templates/leadway/config.php|,3|templates/leadway/config02.php|,3|templates/leadway/cv.php|,3|templates/leadway/database.inc.php|,3|templates/leadway/download.php|,3|templates/leadway/feedback.php|,3|templates/leadway/foot.php|,3|templates/leadway/head.php|,3|templates/leadway/head03.php|,3|templates/leadway/images/js/cn.index.js|,3|templates/leadway/images/js/fixPNG.js|,3|templates/leadway/images/js/fun.inc.js|,3|templates/leadway/images/js/fun.inc01.js|,3|templates/leadway/images/js/image.js|,3|templates/leadway/images/js/indexx.js|,3|templates/leadway/images/js/jquery.slider.min.js|,3|templates/leadway/img.php|,3|templates/leadway/index.php|,3|templates/leadway/info.html|,3|templates/leadway/job.php|,3|templates/leadway/link_index.php|,3|templates/leadway/login.php|,3|templates/leadway/member.php|,3|templates/leadway/message.php|,3|templates/leadway/message_index.php|,3|templates/leadway/metinfo.inc.php|,3|templates/leadway/news.php|,3|templates/leadway/otherinfo.inc.php|,3|templates/leadway/product.php|,3|templates/leadway/register.php|,3|templates/leadway/search.php|,3|templates/leadway/show.php|,3|templates/leadway/showdownload.php|,3|templates/leadway/showimg.php|,3|templates/leadway/showjob.php|,3|templates/leadway/shownews.php|,3|templates/leadway/showproduct.php|,3|templates/leadway/sidebar.php|,3|templates/leadway/sidebar02.php|,3|templates/leadway/sitemap.php|,3|templates/wap001/block/about.html|,3|templates/wap001/block/imgtxt.html|,3|templates/wap001/block/imgtxtshow.html|,3|templates/wap001/block/map.html|,3|templates/wap001/block/newslist.html|,3|templates/wap001/config.html|,3|templates/wap001/foot.html|,3|templates/wap001/head.html|,3|templates/wap001/images/css/css.inc.php|,3|templates/wap001/images/gmu/js/core/event.js|,3|templates/wap001/images/gmu/js/core/gmu.js|,3|templates/wap001/images/gmu/js/core/widget.js|,3|templates/wap001/images/gmu/js/extend/detect.js|,3|templates/wap001/images/gmu/js/extend/event.ortchange.js|,3|templates/wap001/images/gmu/js/extend/event.scrollStop.js|,3|templates/wap001/images/gmu/js/extend/fix.js|,3|templates/wap001/images/gmu/js/extend/highlight.js|,3|templates/wap001/images/gmu/js/extend/imglazyload.js|,3|templates/wap001/images/gmu/js/extend/iscroll.js|,3|templates/wap001/images/gmu/js/extend/matchMedia.js|,3|templates/wap001/images/gmu/js/extend/offset.js|,3|templates/wap001/images/gmu/js/extend/parseTpl.js|,3|templates/wap001/images/gmu/js/extend/position.js|,3|templates/wap001/images/gmu/js/extend/support.js|,3|templates/wap001/images/gmu/js/extend/throttle.js|,3|templates/wap001/images/gmu/js/extend/touch.js|,3|templates/wap001/images/gmu/js/widget/add2desktop/add2desktop.js|,3|templates/wap001/images/gmu/js/widget/button/$input.js|,3|templates/wap001/images/gmu/js/widget/button/button.js|,3|templates/wap001/images/gmu/js/widget/calendar/$picker.js|,3|templates/wap001/images/gmu/js/widget/calendar/calendar.js|,3|templates/wap001/images/gmu/js/widget/dialog/$position.js|,3|templates/wap001/images/gmu/js/widget/dialog/dialog.js|,3|templates/wap001/images/gmu/js/widget/dropmenu/dropmenu.js|,3|templates/wap001/images/gmu/js/widget/dropmenu/horizontal.js|,3|templates/wap001/images/gmu/js/widget/dropmenu/placement.js|,3|templates/wap001/images/gmu/js/widget/gotop/$iscroll.js|,3|templates/wap001/images/gmu/js/widget/gotop/gotop.js|,3|templates/wap001/images/gmu/js/widget/historylist/historylist.js|,3|templates/wap001/images/gmu/js/widget/navigator/$scrollable.js|,3|templates/wap001/images/gmu/js/widget/navigator/evenness.js|,3|templates/wap001/images/gmu/js/widget/navigator/navigator.js|,3|templates/wap001/images/gmu/js/widget/navigator/scrolltonext.js|,3|templates/wap001/images/gmu/js/widget/panel/panel.js|,3|templates/wap001/images/gmu/js/widget/popover/arrow.js|,3|templates/wap001/images/gmu/js/widget/popover/collision.js|,3|templates/wap001/images/gmu/js/widget/popover/dismissible.js|,3|templates/wap001/images/gmu/js/widget/popover/placement.js|,3|templates/wap001/images/gmu/js/widget/popover/popover.js|,3|templates/wap001/images/gmu/js/widget/progressbar/progressbar.js|,3|templates/wap001/images/gmu/js/widget/refresh/$iOS5.js|,3|templates/wap001/images/gmu/js/widget/refresh/$iscroll.js|,3|templates/wap001/images/gmu/js/widget/refresh/$lite.js|,3|templates/wap001/images/gmu/js/widget/refresh/refresh.js|,3|templates/wap001/images/gmu/js/widget/slider/$autoplay.js|,3|templates/wap001/images/gmu/js/widget/slider/$dynamic.js|,3|templates/wap001/images/gmu/js/widget/slider/$lazyloadimg.js|,3|templates/wap001/images/gmu/js/widget/slider/$multiview.js|,3|templates/wap001/images/gmu/js/widget/slider/$touch.js|,3|templates/wap001/images/gmu/js/widget/slider/arrow.js|,3|templates/wap001/images/gmu/js/widget/slider/dots.js|,3|templates/wap001/images/gmu/js/widget/slider/imgzoom.js|,3|templates/wap001/images/gmu/js/widget/slider/slider.js|,3|templates/wap001/images/gmu/js/widget/suggestion/$iscroll.js|,3|templates/wap001/images/gmu/js/widget/suggestion/$posadapt.js|,3|templates/wap001/images/gmu/js/widget/suggestion/$quickdelete.js|,3|templates/wap001/images/gmu/js/widget/suggestion/compatdata.js|,3|templates/wap001/images/gmu/js/widget/suggestion/renderlist.js|,3|templates/wap001/images/gmu/js/widget/suggestion/sendrequest.js|,3|templates/wap001/images/gmu/js/widget/suggestion/suggestion.js|,3|templates/wap001/images/gmu/js/widget/tabs/$ajax.js|,3|templates/wap001/images/gmu/js/widget/tabs/$swipe.js|,3|templates/wap001/images/gmu/js/widget/tabs/tabs.js|,3|templates/wap001/images/gmu/js/widget/toolbar/$position.js|,3|templates/wap001/images/gmu/js/widget/toolbar/toolbar.js|,3|templates/wap001/images/gmu/js/zepto.js|,3|templates/wap001/images/js/fun.inc.js|,3|templates/wap001/images/js/met_Verification.js|,3|templates/wap001/index.html|,3|templates/wap001/metinfo.inc.php|,3|templates/wap001/mtop.html|,3|templates/wap001/otherinfo.inc.php|,3|templates/wap001/sidebar.html|,3|templates/wap001/top.html|,3|templates/yongtai/config.php|,3|templates/yongtai/foot.php|,3|templates/yongtai/head.php|,3|templates/yongtai/images/js/fun.inc.js|,3|templates/yongtai/images/js/lavaLamp/flash.js|,3|templates/yongtai/images/js/lavaLamp/jquery-1.1.3.1.min.js|,3|templates/yongtai/images/js/lavaLamp/jquery.easing.min.js|,3|templates/yongtai/images/js/lavaLamp/jquery.lavalamp.js|,3|templates/yongtai/images/js/lavaLamp/jquery.lavalamp.min.js|,3|templates/yongtai/img.php|,3|templates/yongtai/index.php|,3|templates/yongtai/metinfo.inc.php|,3|templates/yongtai/otherinfo.inc.php|,3|templates/yongtai/product.php|,3|templates/yongtai/showproduct.php|,3|templates/yongtai/sidebar.php|,3|admin/app/wap/content.php|,3|admin/app/wap/flash.php|,3|admin/app/wap/flashadd.php|,3|admin/app/wap/flashdelete.php|,3|admin/app/wap/flashedit.php|,3|admin/app/wap/flashsave.php|,3|admin/app/wap/index.php|,3|admin/app/wap/list.php|,3|admin/app/wap/map.php|,3|admin/app/wap/setflash.php|,3|admin/app/wap/skin_editor.php|,3|admin/app/wap/skin_manager.php|,3|admin/templates/met/app/wap/content.html|,3|admin/templates/met/app/wap/flash.html|,3|admin/templates/met/app/wap/flashadd.html|,3|admin/templates/met/app/wap/flashedit.html|,3|admin/templates/met/app/wap/index.html|,3|admin/templates/met/app/wap/list.html|,3|admin/templates/met/app/wap/map.html|,3|admin/templates/met/app/wap/setflash.html|,3|admin/templates/met/app/wap/skin.html|,3|admin/templates/met/app/wap/skin_editor.html|,3|admin/templates/met/app/wap/top.html|,2|config/config_safe.php|,1|cx.php|,1|file.php|,2|include/common.inc.php|,2|include/global/pseudo.php|,2|include/global/showmod.php|,2|include/global.func.php|,2|include/head.php|,2|include/lang.php|,1|install/index.php|,1|install/js/IE6-png.js|,1|install/js/install.js|,1|install/lang_cn_520.php|,1|install/lang_en_520.php|,1|install/phpinfo.php|,2|lang/lang.php|,1|lang/lang_cn.php|,2|lang/lang_en.php|,1|lang/lang_insert.php|,2|lang.php|,2|member/captcha.class.php|,2|member/save.php|,2|power.php|,2|public/php/metlabel.inc.php|,2|wap/index.php|,2|templates/default/config.html|,2|templates/default/index.html|,2|templates/default/metinfo.inc.php|,2|admin/admin/add.php|,2|admin/admin/save.php|,2|admin/app/dlapp/delapp.php|,2|admin/app/physical/physical.fun.php|,2|admin/app/physical/trust.php|,2|admin/app/sms/sms.php|,2|admin/app/wap/wap.php|,2|admin/column/copycolumn.php|,2|admin/content/content.php|,2|admin/include/captcha.class.php|,2|admin/include/global.func.php|,2|admin/include/lang.php|,2|admin/include/metlist.php|,2|admin/include/return.php|,2|admin/interface/flash/flash.php|,2|admin/interface/flash/flashdelete.php|,2|admin/interface/flash/flashsave.php|,2|admin/interface/flash/setflash.php|,2|admin/interface/skin.php|,2|admin/interface/skin_editor.php|,2|admin/interface/skin_manager.php|,2|admin/seo/htm.php|,2|admin/system/database/recovery.php|,2|admin/system/lang/lang.php|,2|admin/system/olupdate.php|,2|admin/system/shortcut.php|,2|admin/system/shortcut_editor.php|,2|admin/system/sysadmin.php|,2|admin/system/universal.php|,2|admin/templates/met/admin/admin.html|,2|admin/templates/met/admin/admin_add.html|,2|admin/templates/met/admin/admin_editor.html|,2|admin/templates/met/app/dlapp/dlapp.html|,2|admin/templates/met/app/dlapp/index.html|,2|admin/templates/met/app/sms/sms.html|,2|admin/templates/met/app/wap/wap.html|,2|admin/templates/met/content/article/article.html|,2|admin/templates/met/content/content.html|,2|admin/templates/met/content/download/download.html|,2|admin/templates/met/content/img/img.html|,2|admin/templates/met/content/product/product.html|,2|admin/templates/met/head.html|,2|admin/templates/met/images/js/iframes.js|,2|admin/templates/met/images/js/metinfo.js|,2|admin/templates/met/index.html|,2|admin/templates/met/interface/flash/flash.html|,2|admin/templates/met/interface/flash/flashadd.html|,2|admin/templates/met/interface/flash/flashedit.html|,2|admin/templates/met/interface/flash/setflash.html|,1|admin/templates/met/interface/flash/top.html|,2|admin/templates/met/interface/online/online.html|,2|admin/templates/met/interface/set_skin.html|,2|admin/templates/met/interface/skin.html|,2|admin/templates/met/interface/skin_editor.html|,1|admin/templates/met/interface/skin_top.html|,2|admin/templates/met/metlangs.html|,2|admin/templates/met/seo/htm.html|,2|admin/templates/met/seo/sitemap.html|,2|admin/templates/met/system/database/filedown.html|,2|admin/templates/met/system/set_safe.html|,2|admin/templates/met/system/shortcut.html|,2|admin/templates/met/system/shortcut_editor.html|,2|admin/templates/met/system/sysadmin.html|,2|admin/templates/met/system/universal.html|,2|admin/templates/met/system/uploadfile.html|','','0','0','metinfo');
INSERT INTO met_config VALUES('57','physical_function','1','','0','0','metinfo');
INSERT INTO met_config VALUES('58','met_member_force','zvhhrqn','','0','0','metinfo');
INSERT INTO met_config VALUES('59','met_nurse_sendtime','10','','0','0','metinfo');
INSERT INTO met_config VALUES('60','met_recycle','1','','0','0','metinfo');
INSERT INTO met_config VALUES('61','met_tablename','admin_array|admin_table|app|admin_column|column|config|cv|download|feedback|flash|flist|img|job|label|lang|language|link|list|message|news|online|otherinfo|parameter|plist|product|skin_table|sms|visit_day|visit_detail|visit_summary|mlist|ifcolumn|ifcolumn_addfile|ifmember_left|applist|app_plugin|wapmenu|infoprompt|templates|user|user_group|user_list|user_other|ui_list|ui_config|ui|shopv2_tracking|pay_api|pay_config|pay_order|shopv2_favorite','','0','0','metinfo');
INSERT INTO met_config VALUES('62','met_smsprice','0.1','','0','0','metinfo');
INSERT INTO met_config VALUES('63','met_agents_logo_login','templates/met/images/login-logo.png','','0','0','metinfo');
INSERT INTO met_config VALUES('64','met_agents_logo_index','templates/met/images/logoen.gif','','0','0','metinfo');
INSERT INTO met_config VALUES('65','met_agents_copyright_foot','Powered by <b><a href=http://www.metinfo.cn target=_blank>MetInfo $metcms_v</a></b> &copy;2008-$m_now_year &nbsp;<a href=http://www.metinfo.cn target=_blank>MetInfo Inc.</a>','','0','0','metinfo');
INSERT INTO met_config VALUES('66','met_agents_type','0','','0','0','metinfo');
INSERT INTO met_config VALUES('67','met_agents_code','','','0','0','metinfo');
INSERT INTO met_config VALUES('68','met_agents_backup','metinfo','','0','0','metinfo');
INSERT INTO met_config VALUES('69','met_agents_sms','1','','0','0','metinfo');
INSERT INTO met_config VALUES('70','met_agents_app','1','','0','0','metinfo');
INSERT INTO met_config VALUES('71','met_agents_img','public/images/metinfo.gif','','0','0','metinfo');
INSERT INTO met_config VALUES('72','met_newcmsv','','','0','0','metinfo');
INSERT INTO met_config VALUES('73','met_patch','0','','0','0','metinfo');
INSERT INTO met_config VALUES('74','met_app_sysver','|5.0 Beta|5.0|5.0.1|5.0.2|5.0.3|5.0.4|5.1.0|5.1.1|5.1.2|5.1.3|5.1.4|5.1.5|5.1.6|5.1.7|5.2.0|5.2.1|5.2.2|5.2.3|5.2.4|5.2.5|5.2.6','','0','0','metinfo');
INSERT INTO met_config VALUES('75','met_app_info','0|1373858456','','0','0','metinfo');
INSERT INTO met_config VALUES('76','met_agents_thanks','感谢使用 Metinfo','','0','0','cn-metinfo');
INSERT INTO met_config VALUES('77','met_agents_depict_login','MetInfo','','0','0','cn-metinfo');
INSERT INTO met_config VALUES('78','met_agents_name','Metinfo企业网站管理系统','','0','0','cn-metinfo');
INSERT INTO met_config VALUES('79','met_agents_copyright','长沙米拓信息技术有限公司（MetInfo Inc.）','','0','0','cn-metinfo');
INSERT INTO met_config VALUES('80','met_agents_about','关于我们','','0','0','cn-metinfo');
INSERT INTO met_config VALUES('81','met_agents_thanks','thanks use Metinfo','','0','0','en-metinfo');
INSERT INTO met_config VALUES('82','met_agents_depict_login','Metinfo Build marketing value corporate website','','0','0','en-metinfo');
INSERT INTO met_config VALUES('83','met_agents_name','Metinfo CMS','','0','0','en-metinfo');
INSERT INTO met_config VALUES('84','met_agents_copyright','China Changsha MetInfo Information Co., Ltd.','','0','0','en-metinfo');
INSERT INTO met_config VALUES('85','met_agents_about','About Us','','0','0','en-metinfo');
INSERT INTO met_config VALUES('86','met_secret_key','','','0','0','metinfo');
INSERT INTO met_config VALUES('87','met_host_new','app.metinfo.cn','','0','0','metinfo');
INSERT INTO met_config VALUES('88','met_editor','ueditor','','0','0','metinfo');
INSERT INTO met_config VALUES('89','met_sms_url','https://appv2.metinfo.cn/sms','','0','0','metinfo');
INSERT INTO met_config VALUES('90','met_sms_token','','','0','0','metinfo');
INSERT INTO met_config VALUES('91','met_agents_metmsg','1','','0','0','metinfo');
INSERT INTO met_config VALUES('92','met_safe_prompt','0','','0','0','metinfo');
INSERT INTO met_config VALUES('93','met_fd_word','','','0','0','cn');
INSERT INTO met_config VALUES('95','flash_10000','3|980|300|1','','0','10000','cn');
INSERT INTO met_config VALUES('96','flash_10001','1|980|600|','','0','10001','cn');
INSERT INTO met_config VALUES('99','met_weburl','https://show.metinfo.cn/m/mui169/341/','','0','0','cn');
INSERT INTO met_config VALUES('100','met_webname','物业管理企业响应式网站模板','','0','0','cn');
INSERT INTO met_config VALUES('101','met_logo','../upload/201806/1530003651.png','','0','0','cn');
INSERT INTO met_config VALUES('102','met_skin_user','mui169','','0','0','cn');
INSERT INTO met_config VALUES('103','met_big_wate','0','','0','0','cn');
INSERT INTO met_config VALUES('104','met_thumb_wate','0','','0','0','cn');
INSERT INTO met_config VALUES('105','met_wate_class','1','','0','0','cn');
INSERT INTO met_config VALUES('106','met_wate_img','','','0','0','cn');
INSERT INTO met_config VALUES('107','met_wate_bigimg','','','0','0','cn');
INSERT INTO met_config VALUES('108','met_thumb_kind','1','','0','0','cn');
INSERT INTO met_config VALUES('109','met_text_wate','MetInfo','','0','0','cn');
INSERT INTO met_config VALUES('110','met_text_size','10','','0','0','cn');
INSERT INTO met_config VALUES('111','met_text_bigsize','35','','0','0','cn');
INSERT INTO met_config VALUES('112','met_text_fonts','../include/fonts/arial.ttf','','0','0','cn');
INSERT INTO met_config VALUES('113','met_text_color','#000000','','0','0','cn');
INSERT INTO met_config VALUES('114','met_text_angle','0','','0','0','cn');
INSERT INTO met_config VALUES('115','met_watermark','0','','0','0','cn');
INSERT INTO met_config VALUES('116','met_img_style','1','','0','0','cn');
INSERT INTO met_config VALUES('117','met_img_x','150','','0','0','cn');
INSERT INTO met_config VALUES('118','met_img_y','150','','0','0','cn');
INSERT INTO met_config VALUES('119','met_newsimg_x','400','','0','0','cn');
INSERT INTO met_config VALUES('120','met_newsimg_y','400','','0','0','cn');
INSERT INTO met_config VALUES('121','met_productimg_x','900','','0','0','cn');
INSERT INTO met_config VALUES('122','met_productimg_y','500','','0','0','cn');
INSERT INTO met_config VALUES('123','met_imgs_x','400','','0','0','cn');
INSERT INTO met_config VALUES('124','met_imgs_y','400','','0','0','cn');
INSERT INTO met_config VALUES('125','met_keywords','物业管理企业网站模板,物业管理企业网页模板,响应式模板,网站制作,网站建站','','0','0','cn');
INSERT INTO met_config VALUES('126','met_description','MetInfo 企业建站系统专注于为中小企业提供高质量的建站服务，海量模板请登录 www.metinfo.cn，本站为物业管理企业响应式网站模板演示站','','0','0','cn');
INSERT INTO met_config VALUES('127','met_title_type','2','','0','0','cn');
INSERT INTO met_config VALUES('128','met_seo','<p>后台-营销-SEO-头部优化文字处修改</p>','','0','0','cn');
INSERT INTO met_config VALUES('129','met_tools_ok','1','','0','0','cn');
INSERT INTO met_config VALUES('130','met_alt','图片关键词','','0','0','cn');
INSERT INTO met_config VALUES('131','met_atitle','链接关键词','','0','0','cn');
INSERT INTO met_config VALUES('132','met_linkname','某某公司网站','','0','0','cn');
INSERT INTO met_config VALUES('133','met_online_type','3','','0','0','cn');
INSERT INTO met_config VALUES('134','met_footright','我的网站 版权所有 2008-2014 湘ICP备8888888','','0','0','cn');
INSERT INTO met_config VALUES('135','met_footaddress','本页面内容为网站演示数据，前台页面内容都可以在后台修改。','','0','0','cn');
INSERT INTO met_config VALUES('136','met_foottel','','','0','0','cn');
INSERT INTO met_config VALUES('137','met_footother','','','0','0','cn');
INSERT INTO met_config VALUES('138','met_foottext','','','0','0','cn');
INSERT INTO met_config VALUES('139','met_footstat','','','0','0','cn');
INSERT INTO met_config VALUES('140','met_product_list','8','','0','0','cn');
INSERT INTO met_config VALUES('141','met_news_list','6','','0','0','cn');
INSERT INTO met_config VALUES('142','met_download_list','8','','0','0','cn');
INSERT INTO met_config VALUES('143','met_img_list','8','','0','0','cn');
INSERT INTO met_config VALUES('144','met_job_list','3','','0','0','cn');
INSERT INTO met_config VALUES('145','met_message_list','10','','0','0','cn');
INSERT INTO met_config VALUES('146','met_search_list','10','','0','0','cn');
INSERT INTO met_config VALUES('147','met_fd_fromname','米拓信息','','0','0','cn');
INSERT INTO met_config VALUES('148','met_fd_smtp','61.152.188.131','','0','0','cn');
INSERT INTO met_config VALUES('149','met_fd_usename','test@mail.metinfo.cn','','0','0','cn');
INSERT INTO met_config VALUES('150','met_fd_password','passwordhidden','','0','0','cn');
INSERT INTO met_config VALUES('151','met_skin_css','metinfo.css','','0','0','cn');
INSERT INTO met_config VALUES('152','met_autothumb_ok','0','','0','0','cn');
INSERT INTO met_config VALUES('153','met_member_use','1','','0','0','cn');
INSERT INTO met_config VALUES('154','met_member_register','1','','0','0','cn');
INSERT INTO met_config VALUES('155','met_newsdays','3','','0','0','cn');
INSERT INTO met_config VALUES('156','met_hot','100','','0','0','cn');
INSERT INTO met_config VALUES('157','met_listtime','Y-m-d','','0','0','cn');
INSERT INTO met_config VALUES('158','met_contenttime','Y-m-d H:i:s','','0','0','cn');
INSERT INTO met_config VALUES('159','met_member_vecan','4','','0','0','cn');
INSERT INTO met_config VALUES('160','met_membercontrol','欢迎注册为【米拓信息】www.metinfo.cn会员，会员激活后您可以享受更多的专业服务！','','0','0','cn');
INSERT INTO met_config VALUES('161','met_pseudo','0','','0','0','cn');
INSERT INTO met_config VALUES('162','met_online_skin','1','','0','0','cn');
INSERT INTO met_config VALUES('163','met_online_color','#1baadb','','0','0','cn');
INSERT INTO met_config VALUES('164','met_qq_type','3','','0','0','cn');
INSERT INTO met_config VALUES('165','met_msn_type','1','','0','0','cn');
INSERT INTO met_config VALUES('166','met_taobao_type','2','','0','0','cn');
INSERT INTO met_config VALUES('167','met_alibaba_type','10','','0','0','cn');
INSERT INTO met_config VALUES('168','met_skype_type','11','','0','0','cn');
INSERT INTO met_config VALUES('169','met_onlinetel','<p>服务热线：<br/>000-000-0000</p>','','0','0','cn');
INSERT INTO met_config VALUES('170','met_addlinkopen','1','','0','0','cn');
INSERT INTO met_config VALUES('171','met_pageskin','8','','0','0','cn');
INSERT INTO met_config VALUES('172','met_indexskin','','','0','0','cn');
INSERT INTO met_config VALUES('173','met_urlblank','0','','0','0','cn');
INSERT INTO met_config VALUES('174','met_pnorder','0','','0','0','cn');
INSERT INTO met_config VALUES('175','met_hitsok','','','0','0','cn');
INSERT INTO met_config VALUES('176','met_product_page','0','','0','0','cn');
INSERT INTO met_config VALUES('177','met_img_page','0','','0','0','cn');
INSERT INTO met_config VALUES('178','met_product_detail','1','','0','0','cn');
INSERT INTO met_config VALUES('179','met_img_detail','1','','0','0','cn');
INSERT INTO met_config VALUES('180','met_productdetail_x','900','','0','0','cn');
INSERT INTO met_config VALUES('181','met_productdetail_y','500','','0','0','cn');
INSERT INTO met_config VALUES('182','met_imgdetail_x','500','','0','0','cn');
INSERT INTO met_config VALUES('183','met_imgdetail_y','500','','0','0','cn');
INSERT INTO met_config VALUES('184','met_onlineright_top','110','','0','0','cn');
INSERT INTO met_config VALUES('185','met_onlineright_right','10','','0','0','cn');
INSERT INTO met_config VALUES('186','met_onlineleft_top','110','','0','0','cn');
INSERT INTO met_config VALUES('187','met_onlineleft_left','10','','0','0','cn');
INSERT INTO met_config VALUES('188','met_onlinenameok','0','','0','0','cn');
INSERT INTO met_config VALUES('189','met_file_format','rar|zip|sql|doc|pdf|jpg|xls|png|gif|mp3|jpeg|bmp|swf|flv|ico','','0','0','cn');
INSERT INTO met_config VALUES('190','met_file_maxsize','8','','0','0','cn');
INSERT INTO met_config VALUES('191','met_memberlogin_code','1','','0','0','cn');
INSERT INTO met_config VALUES('192','met_login_code','0','','0','0','cn');
INSERT INTO met_config VALUES('193','met_webhtm','0','','0','0','cn');
INSERT INTO met_config VALUES('194','met_htmtype','html','','0','0','cn');
INSERT INTO met_config VALUES('195','met_htmpagename','2','','0','0','cn');
INSERT INTO met_config VALUES('196','met_listhtmltype','1','','0','0','cn');
INSERT INTO met_config VALUES('197','met_htmlistname','1','','0','0','cn');
INSERT INTO met_config VALUES('198','met_htmway','0','','0','0','cn');
INSERT INTO met_config VALUES('199','index_news_no','10','','0','0','cn');
INSERT INTO met_config VALUES('200','index_product_no','10','','0','0','cn');
INSERT INTO met_config VALUES('201','index_download_no','10','','0','0','cn');
INSERT INTO met_config VALUES('202','index_img_no','2','','0','0','cn');
INSERT INTO met_config VALUES('203','index_job_no','10','','0','0','cn');
INSERT INTO met_config VALUES('204','index_link_ok','1','','0','0','cn');
INSERT INTO met_config VALUES('205','index_link_img','9999','','0','0','cn');
INSERT INTO met_config VALUES('206','index_link_text','9999','','0','0','cn');
INSERT INTO met_config VALUES('207','met_pageclick','1','','0','0','cn');
INSERT INTO met_config VALUES('208','met_pagetime','1','','0','0','cn');
INSERT INTO met_config VALUES('209','met_pageprint','1','','0','0','cn');
INSERT INTO met_config VALUES('210','met_pageclose','1','','0','0','cn');
INSERT INTO met_config VALUES('211','met_deleteimg','0','','0','0','cn');
INSERT INTO met_config VALUES('212','met_columnshow','0','','0','0','cn');
INSERT INTO met_config VALUES('213','met_kzqie','1','','0','0','cn');
INSERT INTO met_config VALUES('214','met_cv_time','120','','0','0','cn');
INSERT INTO met_config VALUES('215','met_cv_word','','','0','0','cn');
INSERT INTO met_config VALUES('216','met_cv_type','1','','0','0','cn');
INSERT INTO met_config VALUES('217','met_cv_image','20','','0','0','cn');
INSERT INTO met_config VALUES('218','met_cv_emtype','0','','0','0','cn');
INSERT INTO met_config VALUES('219','met_cv_to','','','0','0','cn');
INSERT INTO met_config VALUES('220','met_tools_code','<div class=\"bdsharebuttonbox\"><a href=\"#\" class=\"bds_more\" data-cmd=\"more\"></a><a href=\"#\" class=\"bds_qzone\" data-cmd=\"qzone\" title=\"分享到QQ空间\"></a><a href=\"#\" class=\"bds_tsina\" data-cmd=\"tsina\" title=\"分享到新浪微博\"></a><a href=\"#\" class=\"bds_tqq\" data-cmd=\"tqq\" title=\"分享到腾讯微博\"></a><a href=\"#\" class=\"bds_renren\" data-cmd=\"renren\" title=\"分享到人人网\"></a><a href=\"#\" class=\"bds_weixin\" data-cmd=\"weixin\" title=\"分享到微信\"></a></div><script>window._bd_share_config={\"common\":{\"bdSnsKey\":{},\"bdText\":\"\",\"bdMini\":\"2\",\"bdMiniList\":false,\"bdPic\":\"\",\"bdStyle\":\"1\",\"bdSize\":\"16\"},\"share\":{}};with(document)0[(getElementsByTagName(\"head\")[0]||body).appendChild(createElement(\"script\")).src=\"http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=\"+~(-new Date()/36e5)];</script>','','0','0','cn');
INSERT INTO met_config VALUES('221','met_cv_back','1','','0','0','cn');
INSERT INTO met_config VALUES('222','met_cv_title','','','0','0','cn');
INSERT INTO met_config VALUES('223','met_cv_content','','','0','0','cn');
INSERT INTO met_config VALUES('224','met_cv_email','17','','0','0','cn');
INSERT INTO met_config VALUES('225','index_hadd_ok','1','','0','0','cn');
INSERT INTO met_config VALUES('226','met_hometitle','物业管理企业网站模板-物业管理企业网页模板|响应式模板|网站制作|网站建站','','0','0','cn');
INSERT INTO met_config VALUES('227','met_img_rename','1','','0','0','cn');
INSERT INTO met_config VALUES('228','met_index_content','<div><img alt=\"\" src=\"upload/images/20120716_094159.jpg\" style=\"line-height: 2; margin: 8px; width: 196px; float: left; height: 209px;\" /></div><div style=\"padding-top:10px;\"><span style=\"font-size:14px;\"><strong>关于&ldquo;为合作伙伴创造价值&rdquo;</strong></span></div><div>米拓信息认为客户、供应商、公司股东、公司员工等一切和自身有合作关系的单位和个人都是自己的合作伙伴，并只有通过努力为合作伙伴创造价值，才能体现自身的价值并获得发展和成功。</div><div>&nbsp;</div><div><span style=\"font-size:14px;\"><strong>关于&ldquo;诚实、宽容、创新、服务&rdquo;</strong></span></div><div><span style=\"font-size:12px;\">米拓信息认为诚信是一切合作的基础，宽容是解决问题的前提，创新是发展事业的利器，服务是创造价值的根本。</span></div><div>&nbsp;</div>','','0','0','cn');
INSERT INTO met_config VALUES('229','met_fd_port','25','','0','0','cn');
INSERT INTO met_config VALUES('230','met_fd_way','tls','','0','0','cn');
INSERT INTO met_config VALUES('231','met_headstat','','','0','0','cn');
INSERT INTO met_config VALUES('232','met_automatic_upgrade','1','','0','0','cn');
INSERT INTO met_config VALUES('233','met_sitemap_auto','1','','0','0','cn');
INSERT INTO met_config VALUES('234','met_maplng','112.947724','','0','0','cn');
INSERT INTO met_config VALUES('235','met_maplat','28.147538','','0','0','cn');
INSERT INTO met_config VALUES('236','met_mapzoom','15','','0','0','cn');
INSERT INTO met_config VALUES('237','met_maptitle','演示公司名称','','0','0','cn');
INSERT INTO met_config VALUES('238','met_mapcontents','地址：长沙市岳麓区#<br/>电话：0000-88888888 0000-8888888','','0','0','cn');
INSERT INTO met_config VALUES('239','met_dimensional_logo','','','0','0','cn');
INSERT INTO met_config VALUES('240','met_menu_ok','1','','0','0','cn');
INSERT INTO met_config VALUES('241','met_menu_oks','1','','0','0','cn');
INSERT INTO met_config VALUES('242','met_menu_rgb','#e9280c','','0','0','cn');
INSERT INTO met_config VALUES('243','met_menu_bg','','','0','0','cn');
INSERT INTO met_config VALUES('244','met_menu_textbg','#ffffff','','0','0','cn');
INSERT INTO met_config VALUES('245','met_wapshowtype','0','','0','0','cn');
INSERT INTO met_config VALUES('246','met_bannerpagetype','0','','0','0','cn');
INSERT INTO met_config VALUES('247','met_theme_preview','','','0','0','cn');
INSERT INTO met_config VALUES('248','met_productTabname','详细信息','','0','0','cn');
INSERT INTO met_config VALUES('249','met_productTabname_1','规格参数','','0','0','cn');
INSERT INTO met_config VALUES('250','met_productTabname_2','包装','','0','0','cn');
INSERT INTO met_config VALUES('251','met_productTabname_3','选项卡四','','0','0','cn');
INSERT INTO met_config VALUES('252','met_productTabname_4','选项卡五','','0','0','cn');
INSERT INTO met_config VALUES('253','met_productTabok','1','','0','0','cn');
INSERT INTO met_config VALUES('254','met_htmlurl','0','','0','0','cn');
INSERT INTO met_config VALUES('255','met_defult_lang','1','0','0','0','cn');
INSERT INTO met_config VALUES('256','met_headstat_mobile','','','0','0','cn');
INSERT INTO met_config VALUES('257','met_footstat_mobile','','','0','0','cn');
INSERT INTO met_config VALUES('258','met_weixin_appid','','','0','0','cn');
INSERT INTO met_config VALUES('259','met_weixin_appsecret','','','0','0','cn');
INSERT INTO met_config VALUES('260','met_weibo_appkey','','','0','0','cn');
INSERT INTO met_config VALUES('261','met_weibo_appsecret','','','0','0','cn');
INSERT INTO met_config VALUES('262','met_qq_appid','','','0','0','cn');
INSERT INTO met_config VALUES('263','met_qq_appsecret','','','0','0','cn');
INSERT INTO met_config VALUES('264','met_weixin_open','0','','0','0','cn');
INSERT INTO met_config VALUES('265','met_weibo_open','0','','0','0','cn');
INSERT INTO met_config VALUES('266','met_qq_open','0','','0','0','cn');
INSERT INTO met_config VALUES('267','met_weixin_gz_appid','','','0','0','cn');
INSERT INTO met_config VALUES('268','met_weixin_gz_appsecret','','','0','0','cn');
INSERT INTO met_config VALUES('269','met_member_bgcolor','','','0','0','cn');
INSERT INTO met_config VALUES('270','met_member_bgimage','','','0','0','cn');
INSERT INTO met_config VALUES('271','met_member_email_reg_title','{webname} 会员中心 注册验证','','0','0','cn');
INSERT INTO met_config VALUES('272','met_member_email_reg_content','<div style=\"width:500px;margin:20px auto;\"><div class=\"header clearfix\" style=\"font-family: &#39;lucida Grande&#39;, Verdana, &#39;Microsoft YaHei&#39;; line-height: 23.7999992370605px; background-color: rgb(255, 255, 255);\"><a href=\"{weburl}\"><strong style=\"outline: none; cursor: pointer; color: rgb(30, 84, 148);\">{webname} 会员中心</strong></a></div><p>&nbsp;</p><div class=\"content\" style=\"font-family: &#39;lucida Grande&#39;, Verdana, &#39;Microsoft YaHei&#39;; line-height: 23.7999992370605px; border: 1px solid rgb(233, 233, 233); margin: 2px 0px 0px; padding: 30px; background: none 0px 0px repeat scroll rgb(255, 255, 255);\"><p style=\"line-height: 23.7999992370605px;\">您好：</p><p style=\"line-height: 23.7999992370605px;\">这是您在 {webname} 会员中心 上的重要邮件, 功能是进行&nbsp;会员中心 注册验证, 请点击下面的连接完成验证</p><p style=\"line-height: 23.7999992370605px; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); margin-top: 15px; margin-bottom: 25px; padding: 15px;\">请点击链接继续：{opurl}</p><p style=\"line-height: 23.7999992370605px;\">&nbsp;</p><p class=\"footer\" style=\"line-height: 23.7999992370605px; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); padding-top: 6px; margin-top: 25px; color: rgb(131, 131, 131);\">请勿回复本邮件, 此邮箱未受监控, 您不会得到任何回复。<br/><br/><a href=\"{weburl}\"><strong style=\"outline: none; cursor: pointer; color: rgb(30, 84, 148);\">{webname}会员中心</strong></a></p></div></div>','','0','0','cn');
INSERT INTO met_config VALUES('273','met_member_email_password_title','{webname} 会员中心 密码找回','','0','0','cn');
INSERT INTO met_config VALUES('274','met_member_email_password_content','<div style=\"width:500px;margin:20px auto;\"><div class=\"header clearfix\" style=\"font-family: &#39;lucida Grande&#39;, Verdana, &#39;Microsoft YaHei&#39;; line-height: 23.7999992370605px; background-color: rgb(255, 255, 255);\"><a href=\"{weburl}\"><strong style=\"outline: none; cursor: pointer; color: rgb(30, 84, 148);\">{webname} 会员中心</strong></a></div><p>&nbsp;</p><div class=\"content\" style=\"font-family: &#39;lucida Grande&#39;, Verdana, &#39;Microsoft YaHei&#39;; line-height: 23.7999992370605px; border: 1px solid rgb(233, 233, 233); margin: 2px 0px 0px; padding: 30px; background: none 0px 0px repeat scroll rgb(255, 255, 255);\"><p style=\"line-height: 23.7999992370605px;\">您好：</p><p style=\"line-height: 23.7999992370605px;\">这是您在 {webname} 会员中心 上的重要邮件, 功能是进行&nbsp;会员中心 密码找回, 请点击下面的连接完成验证</p><p style=\"line-height: 23.7999992370605px; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); margin-top: 15px; margin-bottom: 25px; padding: 15px;\">请点击链接继续：{opurl}</p><p style=\"line-height: 23.7999992370605px;\">&nbsp;</p><p class=\"footer\" style=\"line-height: 23.7999992370605px; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); padding-top: 6px; margin-top: 25px; color: rgb(131, 131, 131);\">请勿回复本邮件, 此邮箱未受监控, 您不会得到任何回复。<br/><br/><a href=\"{weburl}\"><strong style=\"outline: none; cursor: pointer; color: rgb(30, 84, 148);\">{webname}会员中心</strong></a></p></div></div>','','0','0','cn');
INSERT INTO met_config VALUES('275','met_member_email_safety_title','{webname} 会员中心 修改绑定邮箱','','0','0','cn');
INSERT INTO met_config VALUES('276','met_member_email_safety_content','<div style=\"width:500px;margin:20px auto;\"><div class=\"header clearfix\" style=\"font-family: &#39;lucida Grande&#39;, Verdana, &#39;Microsoft YaHei&#39;; line-height: 23.7999992370605px; background-color: rgb(255, 255, 255);\"><a href=\"{weburl}\"><strong style=\"outline: none; cursor: pointer; color: rgb(30, 84, 148);\">{webname} 会员中心</strong></a></div><p>&nbsp;</p><div class=\"content\" style=\"font-family: &#39;lucida Grande&#39;, Verdana, &#39;Microsoft YaHei&#39;; line-height: 23.7999992370605px; border: 1px solid rgb(233, 233, 233); margin: 2px 0px 0px; padding: 30px; background: none 0px 0px repeat scroll rgb(255, 255, 255);\"><p style=\"line-height: 23.7999992370605px;\">您好：</p><p style=\"line-height: 23.7999992370605px;\">这是您在 {webname} 会员中心 上的重要邮件, 功能是进行&nbsp;会员中心 绑定邮箱修改, 请点击下面的连接完成验证</p><p style=\"line-height: 23.7999992370605px; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); margin-top: 15px; margin-bottom: 25px; padding: 15px;\">请点击链接继续：{opurl}</p><p style=\"line-height: 23.7999992370605px;\">&nbsp;</p><p class=\"footer\" style=\"line-height: 23.7999992370605px; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); padding-top: 6px; margin-top: 25px; color: rgb(131, 131,131);\">请勿回复本邮件,此邮箱未受监控,您不会得到任何回复。<br/><br/><a href=\"{weburl}\"><strong style=\"outline: none; cursor: pointer; color: rgb(30, 84, 148);\">{webname}会员中心</strong></a></p></div></div>','','0','0','cn');
INSERT INTO met_config VALUES('277','met_wap','0','','0','0','cn');
INSERT INTO met_config VALUES('457','met_fd_time','120','','9','0','cn');
INSERT INTO met_config VALUES('458','met_fd_word','','','9','0','cn');
INSERT INTO met_config VALUES('459','met_fd_email','0','','9','0','cn');
INSERT INTO met_config VALUES('460','met_fd_type','1','','9','0','cn');
INSERT INTO met_config VALUES('461','met_fd_to','','','9','0','cn');
INSERT INTO met_config VALUES('462','met_fd_back','0','','9','0','cn');
INSERT INTO met_config VALUES('463','met_fd_title','','','9','0','cn');
INSERT INTO met_config VALUES('464','met_fd_content','','','9','0','cn');
INSERT INTO met_config VALUES('465','met_fd_ok','1','','9','0','cn');
INSERT INTO met_config VALUES('466','met_fd_sms_back','0','','9','0','cn');
INSERT INTO met_config VALUES('467','met_fd_sms_content','','','9','0','cn');
INSERT INTO met_config VALUES('468','met_fd_sms_dell','','','9','0','cn');
INSERT INTO met_config VALUES('469','met_message_fd_class','21','','9','0','cn');
INSERT INTO met_config VALUES('470','met_message_fd_content','24','','9','0','cn');
INSERT INTO met_config VALUES('471','met_message_fd_email','23','','9','0','cn');
INSERT INTO met_config VALUES('472','met_message_fd_sms','22','','9','0','cn');
INSERT INTO met_config VALUES('473','flash_1','3|980|300|1','','0','1','cn');
INSERT INTO met_config VALUES('474','flash_2','3|980|300|1','','0','2','cn');
INSERT INTO met_config VALUES('475','flash_3','3|980|300|1','','0','3','cn');
INSERT INTO met_config VALUES('476','flash_4','3|980|300|1','','0','4','cn');
INSERT INTO met_config VALUES('477','flash_8','3|980|300|1','','0','8','cn');
INSERT INTO met_config VALUES('478','flash_9','3|980|300|1','','0','9','cn');
INSERT INTO met_config VALUES('479','flash_5','3|980|300|1','','0','5','cn');
INSERT INTO met_config VALUES('480','flash_6','3|980|300|1','','0','6','cn');
INSERT INTO met_config VALUES('481','flash_7','3|980|300|1','','0','7','cn');
INSERT INTO met_config VALUES('482','flash_10','3|980|300|1','','0','10','cn');
INSERT INTO met_config VALUES('483','flash_13','3|980|300|1','','0','13','cn');
INSERT INTO met_config VALUES('484','flash_15','3|980|300|1','','0','15','cn');
INSERT INTO met_config VALUES('485','flash_18','3|980|300|1','','0','18','cn');
INSERT INTO met_config VALUES('486','flash_23','3|980|300|1','','0','23','cn');
INSERT INTO met_config VALUES('487','flash_11','3|980|300|1','','0','11','cn');
INSERT INTO met_config VALUES('488','flash_14','3|980|300|1','','0','14','cn');
INSERT INTO met_config VALUES('489','flash_16','3|980|300|1','','0','16','cn');
INSERT INTO met_config VALUES('490','flash_19','3|980|300|1','','0','19','cn');
INSERT INTO met_config VALUES('491','flash_24','3|980|300|1','','0','24','cn');
INSERT INTO met_config VALUES('492','flash_21','3|980|300|1','','0','21','cn');
INSERT INTO met_config VALUES('493','flash_17','3|980|300|1','','0','17','cn');
INSERT INTO met_config VALUES('494','flash_20','3|980|300|1','','0','20','cn');
INSERT INTO met_config VALUES('495','flash_25','3|980|300|1','','0','25','cn');
INSERT INTO met_config VALUES('496','flash_22','3|980|300|1','','0','22','cn');
INSERT INTO met_config VALUES('497','flash_26','3|980|300|1','','0','26','cn');
INSERT INTO met_config VALUES('566','shopv2_order_auto_del_time','30','','0','0','cn');
INSERT INTO met_config VALUES('568','shopv2_price_str_prefix','￥','','0','0','cn');
INSERT INTO met_config VALUES('570','shopv2_price_str_suffix','元','','0','0','cn');
INSERT INTO met_config VALUES('572','shopv2_express_key','','','0','0','cn');
INSERT INTO met_config VALUES('590','met_tempath','mui169/file/templates/mui169','','0','0','metinfo');
INSERT INTO met_config VALUES('591','met_datatable_path','mui169_341','','0','0','metinfo');

DROP TABLE IF EXISTS met_cv;
CREATE TABLE `met_cv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `addtime` datetime DEFAULT NULL,
  `readok` int(11) DEFAULT '0',
  `customerid` varchar(50) DEFAULT '0',
  `jobid` int(11) NOT NULL DEFAULT '0',
  `lang` varchar(50) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_download;
CREATE TABLE `met_download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `ctitle` varchar(200) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `description` text,
  `content` longtext,
  `class1` int(11) DEFAULT '0',
  `class2` int(11) DEFAULT '0',
  `class3` int(11) DEFAULT '0',
  `no_order` int(11) DEFAULT '0',
  `new_ok` int(1) DEFAULT '0',
  `wap_ok` int(1) DEFAULT '0',
  `downloadurl` varchar(255) DEFAULT NULL,
  `filesize` varchar(100) DEFAULT NULL,
  `com_ok` int(1) DEFAULT '0',
  `hits` int(11) DEFAULT '0',
  `updatetime` datetime DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `issue` varchar(100) DEFAULT '',
  `access` int(11) DEFAULT '0',
  `top_ok` int(1) DEFAULT '0',
  `downloadaccess` int(11) DEFAULT '0',
  `filename` varchar(255) DEFAULT NULL,
  `lang` varchar(50) DEFAULT NULL,
  `recycle` int(11) NOT NULL DEFAULT '0',
  `displaytype` int(11) NOT NULL DEFAULT '1',
  `tag` text NOT NULL,
  `links` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_feedback;
CREATE TABLE `met_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class1` int(11) DEFAULT '0',
  `fdtitle` varchar(255) DEFAULT NULL,
  `fromurl` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `readok` int(11) DEFAULT '0',
  `useinfo` text,
  `customerid` varchar(30) DEFAULT '0',
  `lang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_flash;
CREATE TABLE `met_flash` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` text,
  `img_title` varchar(255) DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `img_link` varchar(255) DEFAULT NULL,
  `flash_path` varchar(255) DEFAULT NULL,
  `flash_back` varchar(255) DEFAULT NULL,
  `no_order` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `wap_ok` int(11) NOT NULL DEFAULT '0',
  `img_title_color` varchar(100) NOT NULL DEFAULT '',
  `img_des` varchar(100) NOT NULL DEFAULT '',
  `img_des_color` varchar(100) NOT NULL DEFAULT '',
  `img_text_position` varchar(100) NOT NULL DEFAULT '',
  `lang` varchar(50) DEFAULT NULL,
  `height_m` int(11) DEFAULT NULL,
  `height_t` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO met_flash VALUES('1',',10001,','','../upload/201806/1529910675.jpg','','','','0','0','0','0','','','','4','cn','0','0');
INSERT INTO met_flash VALUES('2',',10001,','','../upload/201806/1529911070.jpg','','','','1','0','0','0','','','','4','cn','0','0');
INSERT INTO met_flash VALUES('3',',1,10,11,21,2,13,14,3,15,16,17,4,18,26,8,9,5,6,7,22,23,24,25,','','../upload/201806/1529914462.jpg','','','','0','0','0','0','','','','4','cn','0','0');

DROP TABLE IF EXISTS met_flist;
CREATE TABLE `met_flist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listid` int(11) DEFAULT NULL,
  `paraid` int(11) DEFAULT NULL,
  `info` text,
  `lang` varchar(50) DEFAULT NULL,
  `module` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_img;
CREATE TABLE `met_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `ctitle` varchar(200) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `description` text,
  `content` longtext,
  `class1` int(11) DEFAULT '0',
  `class2` int(11) DEFAULT '0',
  `class3` int(11) DEFAULT '0',
  `no_order` int(11) DEFAULT '0',
  `wap_ok` int(1) DEFAULT '0',
  `new_ok` int(1) DEFAULT '0',
  `imgurl` varchar(255) DEFAULT NULL,
  `imgurls` varchar(255) DEFAULT NULL,
  `displayimg` text,
  `com_ok` int(1) DEFAULT '0',
  `hits` int(11) DEFAULT '0',
  `updatetime` datetime DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `issue` varchar(100) DEFAULT '',
  `access` int(11) DEFAULT '0',
  `top_ok` int(1) DEFAULT '0',
  `filename` varchar(255) DEFAULT NULL,
  `lang` varchar(50) DEFAULT NULL,
  `content1` text,
  `content2` text,
  `content3` text,
  `content4` text,
  `contentinfo` varchar(255) DEFAULT NULL,
  `contentinfo1` varchar(255) DEFAULT NULL,
  `contentinfo2` varchar(255) DEFAULT NULL,
  `contentinfo3` varchar(255) DEFAULT NULL,
  `contentinfo4` varchar(255) DEFAULT NULL,
  `recycle` int(11) NOT NULL DEFAULT '0',
  `displaytype` int(11) NOT NULL DEFAULT '1',
  `tag` text NOT NULL,
  `links` varchar(200) DEFAULT NULL,
  `imgsize` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO met_img VALUES('1','董事会主席   王邂','','','1965年出生于江苏。1988年毕业于北京大学国际经济学系，获学士学位；后于1997年获北京大学经济学硕士学位。曾供职于深圳外贸集团。1990年加入艾邸企业股份有限公司。1993年任长沙市艾邸财务顾问有限公司总经理；1994年起任公司董事；1996年任艾邸企业股份有限公司副总经理；1999年任公司常务副总经理兼财务负责人；2001年起任公司总经理（总裁）；2017年起任艾邸董事会主席、总裁兼首席执','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1965年出生于江苏。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1988年毕业于北京大学国际经济学系，获学士学位；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">后于1997年获北京大学经济学硕士学位。曾供职于深圳外贸集团。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1990年加入艾邸企业股份有限公司。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1993年任长沙市艾邸财务顾问有限公司总经理；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1994年起任公司董事；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1996年任艾邸企业股份有限公司副总经理；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1999年任公司常务副总经理兼财务负责人；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2001年起任公司总经理（总裁）；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2017年起任艾邸董事会主席、总裁兼首席执行官。现任公司董事会主席。</span></p>','21','0','0','3','0','0','../upload/201806/1529658194.jpg','','','0','0','2018-06-22 16:47:08','2018-06-22 16:49:27','','0','0','','cn','','','','','','','','','','0','1','','','600x600');
INSERT INTO met_img VALUES('2','工会主席   王亮','','','1965 年出生1987 年毕业于南京工学院无线电系，获学士学位；1997 年获上海交通大学管理学院工商管理硕士学位；2007 年获上海交通大学管理学博士学位1992 年加入艾邸，历任人事部经理、人力资源部总经理、人力资源总监、副总经理、执行副总裁加入艾邸之前，曾供职于中国深圳彩电总公司深圳 RGB 电子有限公司','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1965 年出生</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1987 年毕业于南京工学院无线电系，获学士学位；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1997 年获上海交通大学管理学院工商管理硕士学位；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2007 年获上海交通大学管理学博士学位</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1992 年加入艾邸，历任人事部经理、人力资源部总经理、人力资源总监、副总经理、执行副总裁</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">加入艾邸之前，曾供职于中国深圳彩电总公司深圳 RGB 电子有限公司</span></p>','21','0','0','2','0','0','../upload/201806/1529657691.jpg','','','0','1','2018-06-22 16:49:33','2018-06-22 16:50:44','','0','0','','cn','','','','','','','','','','0','1','','','600x600');
INSERT INTO met_img VALUES('3','首席执行官   曾明哲','','','1969年出生1993年获得中南财经大学（现中南财经政法大学）经济学硕士学位2003年获得中南财经政法大学经济学博士学位1993年至2012年祝九胜在中国建设银行股份有限公司深圳市分行工作历任福田支行副行长（主持工作）、分行信贷部总经理、公司部总经理、分行副行长等&nbsp;2012年加入艾邸，2012年至2015年担任公司高级副总裁，2014年至今担任艾邸全资附属企业董事长2016年至2018年','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1969年出生</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1993年获得中南财经大学（现中南财经政法大学）经济学硕士学位</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2003年获得中南财经政法大学经济学博士学位</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1993年至2012年祝九胜在中国建设银行股份有限公司深圳市分行工作</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">历任福田支行副行长（主持工作）、分行信贷部总经理、公司部总经理、分行副行长等</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;2012年加入艾邸，2012年至2015年担任公司高级副总裁，2014年至今担任艾邸全资附属企业董事长</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2016年至2018年1月担任公司董事长兼总经理。现任公司总裁、首席执行官</span></p>','21','0','0','1','0','0','../upload/201806/1529658134.jpg','','','0','1','2018-06-22 16:51:00','2018-06-22 16:52:55','','0','0','','cn','','','','','','','','','','0','1','','','600x600');
INSERT INTO met_img VALUES('4','首席风险官   唐雯','','','1966年出生，1994 年获中南财经政法大学硕士学位现为中国注册会计师非执业会员1993 年加入艾邸，历任财务管理部总经理、财务总监、首席财务官在加入艾邸之前，先后供职于合肥市塑料十厂、中科院安徽光学精密机械研究所','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1966年出生，1994 年获中南财经政法大学硕士学位</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">现为中国注册会计师非执业会员</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1993 年加入艾邸，历任财务管理部总经理、财务总监、首席财务官</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">在加入艾邸之前，先后供职于合肥市塑料十厂、中科院安徽光学精密机械研究所</span></p>','21','0','0','0','0','0','../upload/201806/1529658684.jpg','','','0','1','2018-06-22 16:54:37','2018-06-22 16:55:43','','0','0','','cn','','','','','','','','','','0','1','','','600x600');
INSERT INTO met_img VALUES('5','首席运营官   孙立','','','1963年生1984 年毕业于合肥工业大学工业与民用建筑专业，获学士学位；2001 年获美国特洛伊州立大学（Troy state university）MBA 学位2002 年加入艾邸，历任武汉市艾邸公司工程总监、副总经理、常务副总经理、总经理、公司副总裁在加入艾邸之前，曾供职于中国海外集团。目前兼任艾邸置业公司执行董事。','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1963年生</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1984 年毕业于合肥工业大学工业与民用建筑专业，获学士学位；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2001 年获美国特洛伊州立大学（Troy state university）MBA 学位</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2002 年加入艾邸，历任武汉市艾邸公司工程总监、副总经理、常务副总经理、总经理、公司副总裁</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">在加入艾邸之前，曾供职于中国海外集团。目前兼任艾邸置业公司执行董事。</span></p>','21','0','0','0','0','0','../upload/201806/1529658194.jpg','','','0','1','2018-06-22 16:57:36','2018-06-22 17:04:33','','0','0','','cn','','','','','','','','','','0','1','','','600x600');
INSERT INTO met_img VALUES('6','首席财务官   赵旭','','','1978年出生，2001 年毕业于北京大学经济学院，获学士学位2007 年毕业于哈佛大学商学院，获工商管理硕士学位曾先后供职于麦肯锡咨询公司、中国网络通信集团公司2007 年加入艾邸，2008 年任公司战略与投资管理部总经理2010 年任西安艾邸企业有限公司总经理2012 年任上海艾邸企业有限公司总经理2015 年任公司副总裁。','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1978年出生，2001 年毕业于北京大学经济学院，获学士学位</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2007 年毕业于哈佛大学商学院，获工商管理硕士学位</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">曾先后供职于麦肯锡咨询公司、中国网络通信集团公司</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2007 年加入艾邸，</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2008 年任公司战略与投资管理部总经理</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2010 年任西安艾邸企业有限公司总经理</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2012 年任上海艾邸企业有限公司总经理</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2015 年任公司副总裁。</span></p>','21','0','0','0','0','0','../upload/201806/1529657691.jpg','','','0','0','2018-06-22 17:04:38','2018-06-22 17:07:33','','0','0','','cn','','','','','','','','','','0','1','','','600x600');
INSERT INTO met_img VALUES('7','高级副总裁   章嘉','','','1970年出生于江苏1991年7月毕业于北京大学国际政治系，获学士学位；后于1998年获北京大学世界经济系硕士学位曾供职于江苏省盐城市委党校1992年进入艾邸1994年8月任总经理办公室研究室副主任1995年任《艾邸周刊》主编1996年1月任艾邸东北经营管理本部总经理助理1997年任艾邸东北本部副总经理1998年任上海艾邸副总经理1999年任艾邸企划部经理2000-2005年任上海艾邸公司总经理2','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1970年出生于江苏</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1991年7月毕业于北京大学国际政治系，获学士学位；</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">后于1998年获北京大学世界经济系硕士学位</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">曾供职于江苏省盐城市委党校</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1992年进入艾邸</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1994年8月任总经理办公室研究室副主任</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1995年任《艾邸周刊》主编</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1996年1月任艾邸东北经营管理本部总经理助理</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1997年任艾邸东北本部副总经理</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1998年任上海艾邸副总经理</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1999年任艾邸企划部经理</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2000-2005年任上海艾邸公司总经理</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2001年任公司执行副总裁</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2005年10月任北方区域第一负责人，现任公司高级副总裁</span></p>','21','0','0','0','0','0','../upload/201806/1529658134.jpg','','','0','3','2018-06-22 17:11:31','2018-06-22 17:09:49','admin','0','0','','cn','','','','','','','','','','0','1','','','600x600');
INSERT INTO met_img VALUES('8','高级副总裁   史飘飘','','','1973年出生本科学历2001年加入艾邸企业股份有限公司2008年任艾邸企业股份有限公司董事会办公室主任2009年3月至2016年3月任艾邸企业股份有限公司董事会秘书现任艾邸企业股份有限公司高级副总裁。','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1973年出生本科学历</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2001年加入艾邸企业股份有限公司</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2008年任艾邸企业股份有限公司董事会办公室主任</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2009年3月至2016年3月任艾邸企业股份有限公司董事会秘书</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">现任艾邸企业股份有限公司高级副总裁。</span></p>','21','0','0','0','0','0','../upload/201806/1529658684.jpg','','','0','2','2018-06-22 17:12:18','2018-06-22 17:11:10','admin','0','0','','cn','','','','','','','','','','0','1','','','600x600');

DROP TABLE IF EXISTS met_job;
CREATE TABLE `met_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(200) DEFAULT NULL,
  `count` int(11) DEFAULT '0',
  `place` varchar(200) DEFAULT NULL,
  `deal` varchar(200) DEFAULT NULL,
  `addtime` date DEFAULT NULL,
  `useful_life` int(11) DEFAULT NULL,
  `content` longtext,
  `access` int(11) DEFAULT '0',
  `no_order` int(11) DEFAULT '0',
  `wap_ok` int(1) DEFAULT '0',
  `top_ok` int(1) DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `lang` varchar(50) DEFAULT NULL,
  `displaytype` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO met_job VALUES('1','物业项目经理','1','长沙市','6000-8000','2018-06-25','0','<p><strong><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">工作职责：</span></strong></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1、23岁---35岁;&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2、一年以上相关工作经验或</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">者本专业者优先;</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">3、具有良好的沟通能力，较强</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">的组织、协调能力，灵活、机智的处事能力;</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">4、有强烈的工作责任心和团队合作精神，能承担较大的工作压力。</span></p><p><strong><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">任职资格：</span></strong></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1、维系客户关系;&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2、催缴物业管理费;</span></p>','0','0','0','0','','','cn','1');
INSERT INTO met_job VALUES('2','市场发展经理','1','长沙市','6000-8000','2018-06-25','0','<p style=\"white-space: normal;\"><span style=\"font-weight: 700;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">工作职责：</span></span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1、23岁---35岁;&nbsp;</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2、一年以上相关工作经验或</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">者本专业者优先;</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">3、具有良好的沟通能力，较强</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">的组织、协调能力，灵活、机智的处事能力;</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">4、有强烈的工作责任心和团队合作精神，能承担较大的工作压力。</span></p><p style=\"white-space: normal;\"><span style=\"font-weight: 700;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">任职资格：</span></span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1、维系客户关系;&nbsp;</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2、催缴物业管理费;</span></p><div><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"><br/></span></div><p><br/></p>','0','0','0','0','','','cn','1');
INSERT INTO met_job VALUES('3','会员经理','1','长沙市','4000-6000','2018-06-25','0','<p style=\"white-space: normal;\"><span style=\"font-weight: 700;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">工作职责：</span></span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1、23岁---35岁;&nbsp;</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2、一年以上相关工作经验或</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">者本专业者优先;</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">3、具有良好的沟通能力，较强</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">的组织、协调能力，灵活、机智的处事能力;</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">4、有强烈的工作责任心和团队合作精神，能承担较大的工作压力。</span></p><p style=\"white-space: normal;\"><span style=\"font-weight: 700;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">任职资格：</span></span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1、维系客户关系;&nbsp;</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2、催缴物业管理费;</span></p><div><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"><br/></span></div><p><br/></p>','0','0','0','0','','','cn','1');
INSERT INTO met_job VALUES('4','平台运营经理','2','长沙市','4000-6000','2018-06-25','0','<p style=\"white-space: normal;\"><span style=\"font-weight: 700;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">工作职责：</span></span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1、23岁---35岁;&nbsp;</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2、一年以上相关工作经验或</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">者本专业者优先;</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">3、具有良好的沟通能力，较强</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">的组织、协调能力，灵活、机智的处事能力;</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">4、有强烈的工作责任心和团队合作精神，能承担较大的工作压力。</span></p><p style=\"white-space: normal;\"><span style=\"font-weight: 700;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">任职资格：</span></span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1、维系客户关系;&nbsp;</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2、催缴物业管理费;</span></p><div><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"><br/></span></div><p><br/></p>','0','0','0','0','','','cn','1');
INSERT INTO met_job VALUES('5','平面、UI设计师','0','长沙市','面议','2018-06-25','0','<p style=\"white-space: normal;\"><span style=\"font-weight: 700;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">工作职责：</span></span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1、23岁---35岁;&nbsp;</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2、一年以上相关工作经验或</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">者本专业者优先;</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">3、具有良好的沟通能力，较强</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">的组织、协调能力，灵活、机智的处事能力;</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">4、有强烈的工作责任心和团队合作精神，能承担较大的工作压力。</span></p><p style=\"white-space: normal;\"><span style=\"font-weight: 700;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">任职资格：</span></span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">1、维系客户关系;&nbsp;</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2、催缴物业管理费;</span></p><div><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"><br/></span></div><p><br/></p>','0','0','0','0','','','cn','1');

DROP TABLE IF EXISTS met_label;
CREATE TABLE `met_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oldwords` varchar(255) DEFAULT NULL,
  `newwords` varchar(255) DEFAULT NULL,
  `newtitle` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `num` int(11) NOT NULL DEFAULT '99',
  `lang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_lang;
CREATE TABLE `met_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `useok` int(1) NOT NULL,
  `no_order` int(11) NOT NULL,
  `mark` varchar(50) NOT NULL,
  `synchronous` varchar(50) NOT NULL,
  `flag` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `newwindows` int(1) NOT NULL,
  `met_webhtm` int(1) NOT NULL,
  `met_htmtype` varchar(50) NOT NULL,
  `met_weburl` varchar(255) NOT NULL,
  `lang` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO met_lang VALUES('2','English','1','2','en','en','','','0','0','','','metinfo');
INSERT INTO met_lang VALUES('1','简体中文','1','1','cn','cn','','','0','0','','','metinfo');
INSERT INTO met_lang VALUES('3','简体中文','1','1','cn','cn','cn.gif','','0','0','html','https://show.metinfo.cn/m/mui169/341/','cn');

DROP TABLE IF EXISTS met_language;
CREATE TABLE `met_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `site` tinyint(1) NOT NULL,
  `no_order` int(11) NOT NULL DEFAULT '0',
  `array` int(11) NOT NULL,
  `app` int(11) NOT NULL,
  `lang` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6794 DEFAULT CHARSET=utf8;

INSERT INTO met_language VALUES('1','system','系统参数','0','1','0','0','cn');
INSERT INTO met_language VALUES('2','searchall','整站搜索','0','15','1','0','cn');
INSERT INTO met_language VALUES('3','search','搜索','0','16','1','0','cn');
INSERT INTO met_language VALUES('4','home','网站首页','0','17','1','0','cn');
INSERT INTO met_language VALUES('5','error','读取数据错误','0','18','1','0','cn');
INSERT INTO met_language VALUES('6','success','操作成功!','0','19','1','0','cn');
INSERT INTO met_language VALUES('7','Info1','MetInfo企业网站管理系统','0','20','1','0','cn');
INSERT INTO met_language VALUES('8','Info2','企业建站程序','0','21','1','0','cn');
INSERT INTO met_language VALUES('9','Info3','企业网站建设','0','22','1','0','cn');
INSERT INTO met_language VALUES('10','Colunm','栏目名称','0','23','1','0','cn');
INSERT INTO met_language VALUES('11','Title','标题','0','24','1','0','cn');
INSERT INTO met_language VALUES('12','Content','内容','0','25','1','0','cn');
INSERT INTO met_language VALUES('13','Hits','点击次数','0','26','1','0','cn');
INSERT INTO met_language VALUES('14','UpdateTime','更新时间','0','27','1','0','cn');
INSERT INTO met_language VALUES('15','Detail','查看详细','0','28','1','0','cn');
INSERT INTO met_language VALUES('16','Close','关闭','0','29','1','0','cn');
INSERT INTO met_language VALUES('17','Online','在线交流','0','30','1','0','cn');
INSERT INTO met_language VALUES('18','Online_tips','点击可隐藏','0','31','1','0','cn');
INSERT INTO met_language VALUES('19','Noinfo','没有了','0','32','1','0','cn');
INSERT INTO met_language VALUES('20','Buy','购买反馈','0','33','1','0','cn');
INSERT INTO met_language VALUES('21','ProductTitle','产品名称','0','34','1','0','cn');
INSERT INTO met_language VALUES('22','ImgTitle','图片名称','0','35','1','0','cn');
INSERT INTO met_language VALUES('23','BigPicture','查看大图','0','36','1','0','cn');
INSERT INTO met_language VALUES('24','ProductSearch','产品搜索','0','37','1','0','cn');
INSERT INTO met_language VALUES('25','Nolimit','不限','0','38','1','0','cn');
INSERT INTO met_language VALUES('26','imgSearch','图片搜索','0','39','1','0','cn');
INSERT INTO met_language VALUES('27','displayimg','展示图片','0','40','1','0','cn');
INSERT INTO met_language VALUES('28','defualt','默认','0','41','1','0','cn');
INSERT INTO met_language VALUES('29','logininformation','登录信息提示','0','2','0','0','cn');
INSERT INTO met_language VALUES('30','membercode','验证码错误！','0','1','2','0','cn');
INSERT INTO met_language VALUES('31','membernameno','会员账号不存在！','0','2','2','0','cn');
INSERT INTO met_language VALUES('32','memberpassno','密码错误！','0','3','2','0','cn');
INSERT INTO met_language VALUES('33','access','您没有阅读该信息的权限！','0','4','2','0','cn');
INSERT INTO met_language VALUES('34','login','登录','0','5','2','0','cn');
INSERT INTO met_language VALUES('35','register','注册','0','6','2','0','cn');
INSERT INTO met_language VALUES('36','downloadaccess','您没有下载此文件的权限！','0','7','2','0','cn');
INSERT INTO met_language VALUES('37','paging','分页','0','3','0','0','cn');
INSERT INTO met_language VALUES('38','PageTotal','共','0','1','3','0','cn');
INSERT INTO met_language VALUES('39','Page','页','0','2','3','0','cn');
INSERT INTO met_language VALUES('40','PageLocation','当前第','0','3','3','0','cn');
INSERT INTO met_language VALUES('41','PageHome','首页','0','4','3','0','cn');
INSERT INTO met_language VALUES('42','PageEnd','末页','0','5','3','0','cn');
INSERT INTO met_language VALUES('43','PagePre','上一页','0','6','3','0','cn');
INSERT INTO met_language VALUES('44','PageNext','下一页','0','7','3','0','cn');
INSERT INTO met_language VALUES('45','PageGo','转至第','0','8','3','0','cn');
INSERT INTO met_language VALUES('46','Previous','上一条','0','9','3','0','cn');
INSERT INTO met_language VALUES('47','Next','下一条','0','10','3','0','cn');
INSERT INTO met_language VALUES('48','Total','条记录','0','11','3','0','cn');
INSERT INTO met_language VALUES('49','Pagenum','页次','0','12','3','0','cn');
INSERT INTO met_language VALUES('50','Pagenum1','第','0','13','3','0','cn');
INSERT INTO met_language VALUES('51','Pagenum2','页','0','14','3','0','cn');
INSERT INTO met_language VALUES('52','membership','会员信息','0','4','0','0','cn');
INSERT INTO met_language VALUES('53','memberclose','会员功能尚未开启！','0','1','4','0','cn');
INSERT INTO met_language VALUES('54','memberLogin','会员登录','0','2','4','0','cn');
INSERT INTO met_language VALUES('55','memberRegisterName','请输入用户名','0','3','4','0','cn');
INSERT INTO met_language VALUES('56','memberPassword','请输入密码','0','4','4','0','cn');
INSERT INTO met_language VALUES('57','memberCookie','请先开启浏览器的COOKIE功能！','0','5','4','0','cn');
INSERT INTO met_language VALUES('58','memberName','会员名','0','6','4','0','cn');
INSERT INTO met_language VALUES('59','memberPs','密 码','0','7','4','0','cn');
INSERT INTO met_language VALUES('60','memberImgCode','验证码','0','8','4','0','cn');
INSERT INTO met_language VALUES('61','memberTip1','看不清？点击更换验证码','0','9','4','0','cn');
INSERT INTO met_language VALUES('62','memberTip2','记住我的登录信息','0','10','4','0','cn');
INSERT INTO met_language VALUES('63','memberGo','登录','0','11','4','0','cn');
INSERT INTO met_language VALUES('64','memberRegister','立即注册','0','12','4','0','cn');
INSERT INTO met_language VALUES('65','memberReset','重填','0','13','4','0','cn');
INSERT INTO met_language VALUES('66','memberForget','忘记密码？','0','14','4','0','cn');
INSERT INTO met_language VALUES('67','memberIndex1','用户管理中心','0','15','4','0','cn');
INSERT INTO met_language VALUES('68','memberIndex2','欢迎您！','0','16','4','0','cn');
INSERT INTO met_language VALUES('69','memberIndex3','会员中心','0','17','4','0','cn');
INSERT INTO met_language VALUES('70','memberIndex4','修改基本信息','0','18','4','0','cn');
INSERT INTO met_language VALUES('71','memberIndex5','管理反馈信息','0','19','4','0','cn');
INSERT INTO met_language VALUES('72','memberIndex6','管理留言信息','0','20','4','0','cn');
INSERT INTO met_language VALUES('73','memberIndex7','管理简历信息','0','21','4','0','cn');
INSERT INTO met_language VALUES('74','memberIndex8','会员控制面板','0','22','4','0','cn');
INSERT INTO met_language VALUES('75','memberIndex9','个人信息','0','23','4','0','cn');
INSERT INTO met_language VALUES('76','memberIndex10','退出登录','0','24','4','0','cn');
INSERT INTO met_language VALUES('77','memberIndex11','共','0','25','4','0','cn');
INSERT INTO met_language VALUES('78','memberIndex12','条信息','0','26','4','0','cn');
INSERT INTO met_language VALUES('79','memberIndex13','已读','0','27','4','0','cn');
INSERT INTO met_language VALUES('80','memberIndex14','未读','0','28','4','0','cn');
INSERT INTO met_language VALUES('81','memberIndex15','简历投递管理','0','29','4','0','cn');
INSERT INTO met_language VALUES('82','memberIndex16','会员公告','0','30','4','0','cn');
INSERT INTO met_language VALUES('83','memberbasicTitle','查看基本信息','0','31','4','0','cn');
INSERT INTO met_language VALUES('84','memberbasicUserName','用户名','0','32','4','0','cn');
INSERT INTO met_language VALUES('85','memberbasicReadlName','姓名','0','33','4','0','cn');
INSERT INTO met_language VALUES('86','memberbasicSex','性别','0','34','4','0','cn');
INSERT INTO met_language VALUES('87','memberbasicMan','男','0','35','4','0','cn');
INSERT INTO met_language VALUES('88','memberbasicWoman','女','0','36','4','0','cn');
INSERT INTO met_language VALUES('89','memberbasicTel','联系电话','0','37','4','0','cn');
INSERT INTO met_language VALUES('90','memberbasicCell','手机','0','38','4','0','cn');
INSERT INTO met_language VALUES('91','memberbasicTaoBao','淘宝','0','39','4','0','cn');
INSERT INTO met_language VALUES('92','memberbasicLoginNum','登录次数','0','40','4','0','cn');
INSERT INTO met_language VALUES('93','memberbasicLastLogin','最后登录时间','0','41','4','0','cn');
INSERT INTO met_language VALUES('94','memberbasicLastIP','最后登录IP','0','42','4','0','cn');
INSERT INTO met_language VALUES('95','memberbasicRegisterTime','帐号注册时间','0','43','4','0','cn');
INSERT INTO met_language VALUES('96','memberbasicIntro','会员简介','0','44','4','0','cn');
INSERT INTO met_language VALUES('97','memberbasicCompanyName','公司名称','0','45','4','0','cn');
INSERT INTO met_language VALUES('98','memberbasicCompanyFax','公司传真','0','46','4','0','cn');
INSERT INTO met_language VALUES('99','memberbasicCompanyCode','公司邮政编码','0','47','4','0','cn');
INSERT INTO met_language VALUES('100','memberbasicCompanyAddress','公司联系地址','0','48','4','0','cn');
INSERT INTO met_language VALUES('101','memberbasicCompanyWebsite','公司网址','0','49','4','0','cn');
INSERT INTO met_language VALUES('102','memberbasicType','会员类型','0','50','4','0','cn');
INSERT INTO met_language VALUES('103','memberbasicType1','普通会员','0','51','4','0','cn');
INSERT INTO met_language VALUES('104','memberbasicType2','代理商','0','52','4','0','cn');
INSERT INTO met_language VALUES('105','memberbasicType3','管理员','0','53','4','0','cn');
INSERT INTO met_language VALUES('106','membereditorPs','登录密码','0','54','4','0','cn');
INSERT INTO met_language VALUES('107','membereditorPs1','密码确认','0','55','4','0','cn');
INSERT INTO met_language VALUES('108','membereditorTip','不修改请留空','0','56','4','0','cn');
INSERT INTO met_language VALUES('109','membereditorTip1','用于找回密码','0','57','4','0','cn');
INSERT INTO met_language VALUES('110','memberReg','会员注册','0','58','4','0','cn');
INSERT INTO met_language VALUES('111','memberEdit','编辑','0','59','4','0','cn');
INSERT INTO met_language VALUES('112','memberDetail','查看','0','60','4','0','cn');
INSERT INTO met_language VALUES('113','memberShowAll','查看全部','0','61','4','0','cn');
INSERT INTO met_language VALUES('114','memberFeedbackName','反馈信息标题','0','62','4','0','cn');
INSERT INTO met_language VALUES('115','memberAddTime','提交时间','0','63','4','0','cn');
INSERT INTO met_language VALUES('116','memberOperate','操作','0','64','4','0','cn');
INSERT INTO met_language VALUES('117','memberFile','已上传的附件','0','65','4','0','cn');
INSERT INTO met_language VALUES('118','memberinfo','留言内容','0','66','4','0','cn');
INSERT INTO met_language VALUES('119','memberReply','是否回复','0','67','4','0','cn');
INSERT INTO met_language VALUES('120','memberContent','留言内容','0','68','4','0','cn');
INSERT INTO met_language VALUES('121','messageeditorName','姓名','0','69','4','0','cn');
INSERT INTO met_language VALUES('122','messageeditorTel','电话','0','70','4','0','cn');
INSERT INTO met_language VALUES('123','messageeditorContact','其他联系方式','0','71','4','0','cn');
INSERT INTO met_language VALUES('124','messageeditorContent','留言内容','0','72','4','0','cn');
INSERT INTO met_language VALUES('125','messageeditorTime','留言提交时间','0','73','4','0','cn');
INSERT INTO met_language VALUES('126','messageeditorReply','管理员回复留言','0','74','4','0','cn');
INSERT INTO met_language VALUES('127','cvTip4','职位已经被删除','0','75','4','0','cn');
INSERT INTO met_language VALUES('128','memberPosition','应聘职位','0','76','4','0','cn');
INSERT INTO met_language VALUES('129','memberModifyCV','修改简历','0','77','4','0','cn');
INSERT INTO met_language VALUES('130','memberModifyMS','修改留言','0','78','4','0','cn');
INSERT INTO met_language VALUES('131','memberModifyFD','修改反馈','0','79','4','0','cn');
INSERT INTO met_language VALUES('132','memberShowFD','查看反馈','0','80','4','0','cn');
INSERT INTO met_language VALUES('133','memberShowMS','查看留言','0','81','4','0','cn');
INSERT INTO met_language VALUES('134','memberShowCV','查看简历','0','82','4','0','cn');
INSERT INTO met_language VALUES('135','getNotice','会员找回密码','0','83','4','0','cn');
INSERT INTO met_language VALUES('136','NewPassJS','新密码','0','84','4','0','cn');
INSERT INTO met_language VALUES('137','NewPassJS1','再输入一次','0','85','4','0','cn');
INSERT INTO met_language VALUES('138','NewPassJS2','两次输入密码不一致','0','86','4','0','cn');
INSERT INTO met_language VALUES('139','NoidJS','没有此用户','0','87','4','0','cn');
INSERT INTO met_language VALUES('140','NoidJS1','没有此用户或邮箱地址不正确','0','88','4','0','cn');
INSERT INTO met_language VALUES('141','getTip1','您的密码重置请求已经得到验证。请点击以下链接输入您的新密码：','0','89','4','0','cn');
INSERT INTO met_language VALUES('142','getTip2','取回密码的方法已经通过 Email 发送到您的信箱中。请在 3 天之内到网站修改您的密码。','0','90','4','0','cn');
INSERT INTO met_language VALUES('143','getTip3','您提交的找回密码邮件发送失败！请联系网站管理员！。','0','91','4','0','cn');
INSERT INTO met_language VALUES('144','getTip4','请输入下面的信息，以帮助您快速找回密码。','0','92','4','0','cn');
INSERT INTO met_language VALUES('145','getTip5','密码找回','0','93','4','0','cn');
INSERT INTO met_language VALUES('146','getTip6','无法调用Jmail组件','0','94','4','0','cn');
INSERT INTO met_language VALUES('147','getTip7','请输入新密码，以后请牢记您的密码。','0','95','4','0','cn');
INSERT INTO met_language VALUES('148','getTip8','该链接已失效！','0','96','4','0','cn');
INSERT INTO met_language VALUES('149','getOK','发送成功','0','97','4','0','cn');
INSERT INTO met_language VALUES('150','getFail','发送失败','0','98','4','0','cn');
INSERT INTO met_language VALUES('151','membernodo','该用户尚未激活，请即时与管理员联系!','0','99','4','0','cn');
INSERT INTO met_language VALUES('152','hello','您好！','0','100','4','0','cn');
INSERT INTO met_language VALUES('153','fileupload','文件上传','0','5','0','0','cn');
INSERT INTO met_language VALUES('154','fileOK','文件上传成功','0','1','5','0','cn');
INSERT INTO met_language VALUES('155','fileError1','上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。','0','2','5','0','cn');
INSERT INTO met_language VALUES('156','fileError2','上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。','0','3','5','0','cn');
INSERT INTO met_language VALUES('157','fileError3','文件只有部分被上传。','0','4','5','0','cn');
INSERT INTO met_language VALUES('158','fileError4','没有文件被上传。','0','5','5','0','cn');
INSERT INTO met_language VALUES('159','jstip','js提示','0','6','0','0','cn');
INSERT INTO met_language VALUES('160','js1','操作失败！','0','1','6','0','cn');
INSERT INTO met_language VALUES('161','js2','管理员身份登录！','0','2','6','0','cn');
INSERT INTO met_language VALUES('162','js3','抱歉，注册功能暂时关闭！','0','3','6','0','cn');
INSERT INTO met_language VALUES('163','js4','无法激活此用户,请与管理员联系！','0','4','6','0','cn');
INSERT INTO met_language VALUES('164','js5','已成功激活,请登录！','0','5','6','0','cn');
INSERT INTO met_language VALUES('165','js6','用户名输入有误!','0','6','6','0','cn');
INSERT INTO met_language VALUES('166','js7','用户名不能小于3位','0','7','6','0','cn');
INSERT INTO met_language VALUES('167','js8','密码应大于等于6位！','0','8','6','0','cn');
INSERT INTO met_language VALUES('168','js9','请再次输入用户密码！','0','9','6','0','cn');
INSERT INTO met_language VALUES('169','js10','两次密码输入不一致','0','10','6','0','cn');
INSERT INTO met_language VALUES('170','js11','请输入公司名称！','0','11','6','0','cn');
INSERT INTO met_language VALUES('171','js12','请输入您的Email！','0','12','6','0','cn');
INSERT INTO met_language VALUES('172','js13','Email地址不正确！','0','13','6','0','cn');
INSERT INTO met_language VALUES('173','js14','请输入验证码！','0','14','6','0','cn');
INSERT INTO met_language VALUES('174','js15','此用户名已经被使用','0','15','6','0','cn');
INSERT INTO met_language VALUES('175','js16','会员激活','0','16','6','0','cn');
INSERT INTO met_language VALUES('176','js17','会员激活方式：','0','17','6','0','cn');
INSERT INTO met_language VALUES('177','js18','请您点击','0','18','6','0','cn');
INSERT INTO met_language VALUES('178','js19','完成会员账号激活！','0','19','6','0','cn');
INSERT INTO met_language VALUES('179','js20','激活邮件已发生到您注册的邮箱中，请即时激活您的会员身份!','0','20','6','0','cn');
INSERT INTO met_language VALUES('180','js21','操作成功!','0','21','6','0','cn');
INSERT INTO met_language VALUES('181','js22','指定的路径不可写，或者没有此路径!','0','22','6','0','cn');
INSERT INTO met_language VALUES('182','js23','文件格式不允许上传。','0','23','6','0','cn');
INSERT INTO met_language VALUES('183','js24','管理员已阅读，没有权限修改！','0','24','6','0','cn');
INSERT INTO met_language VALUES('184','js25','注册成功，待管理审核即可登录控制面板！','0','25','6','0','cn');
INSERT INTO met_language VALUES('185','other','其他','0','7','0','0','cn');
INSERT INTO met_language VALUES('186','YES','是','0','1','7','0','cn');
INSERT INTO met_language VALUES('187','NO','否','0','2','7','0','cn');
INSERT INTO met_language VALUES('188','Article','相关文章','0','3','7','0','cn');
INSERT INTO met_language VALUES('189','Printing','打印此页','0','4','7','0','cn');
INSERT INTO met_language VALUES('190','Times','次','0','5','7','0','cn');
INSERT INTO met_language VALUES('191','Feedback','购买反馈','0','6','7','0','cn');
INSERT INTO met_language VALUES('192','FileSize','文件大小','0','7','7','0','cn');
INSERT INTO met_language VALUES('193','Download','点击下载','0','8','7','0','cn');
INSERT INTO met_language VALUES('194','Position','招聘职位','0','9','7','0','cn');
INSERT INTO met_language VALUES('195','PersonNumber','招聘人数','0','10','7','0','cn');
INSERT INTO met_language VALUES('196','WorkPlace','工作地点','0','11','7','0','cn');
INSERT INTO met_language VALUES('197','AddDate','发布日期','0','12','7','0','cn');
INSERT INTO met_language VALUES('198','Deal','工资待遇','0','13','7','0','cn');
INSERT INTO met_language VALUES('199','Validity','有效期','0','14','7','0','cn');
INSERT INTO met_language VALUES('200','JobDescription','职位描述','0','15','7','0','cn');
INSERT INTO met_language VALUES('201','Submit','提交信息','0','16','7','0','cn');
INSERT INTO met_language VALUES('202','Reset','重新填写','0','17','7','0','cn');
INSERT INTO met_language VALUES('203','AdvancedSearch','高级搜索','0','18','7','0','cn');
INSERT INTO met_language VALUES('204','Keywords','关键字','0','19','7','0','cn');
INSERT INTO met_language VALUES('205','AllBigclass','所有一级栏目','0','20','7','0','cn');
INSERT INTO met_language VALUES('206','AllSmallclass','所有二级栏目','0','21','7','0','cn');
INSERT INTO met_language VALUES('207','AllThirdclass','所有三级栏目','0','22','7','0','cn');
INSERT INTO met_language VALUES('208','And','和','0','23','7','0','cn');
INSERT INTO met_language VALUES('209','LinkType','链接类型','0','33','7','0','cn');
INSERT INTO met_language VALUES('210','TextLink','文字链接','0','34','7','0','cn');
INSERT INTO met_language VALUES('211','PictureLink','图片链接','0','35','7','0','cn');
INSERT INTO met_language VALUES('212','Contact','联系方式','0','36','7','0','cn');
INSERT INTO met_language VALUES('213','ApplyLink','申请友情链接','0','37','7','0','cn');
INSERT INTO met_language VALUES('214','ApplyLinkNO','没有开启友情链接申请','0','38','7','0','cn');
INSERT INTO met_language VALUES('215','SubmitInfo','提交留言','0','39','7','0','cn');
INSERT INTO met_language VALUES('216','Publish','发表于','0','40','7','0','cn');
INSERT INTO met_language VALUES('217','SubmitContent','留言内容','0','41','7','0','cn');
INSERT INTO met_language VALUES('218','Reply','管理员回复','0','42','7','0','cn');
INSERT INTO met_language VALUES('219','ReadInfo','查看留言','0','43','7','0','cn');
INSERT INTO met_language VALUES('220','Name','姓名','0','44','7','0','cn');
INSERT INTO met_language VALUES('221','Phone','电话','0','45','7','0','cn');
INSERT INTO met_language VALUES('222','Email','Email','0','46','7','0','cn');
INSERT INTO met_language VALUES('223','OtherContact','其他联系方式','0','47','7','0','cn');
INSERT INTO met_language VALUES('224','Info5','如QQ、MSN等','0','48','7','0','cn');
INSERT INTO met_language VALUES('225','Feedback1','请不要在','0','49','7','0','cn');
INSERT INTO met_language VALUES('226','Feedback2','秒内重复提交信息，谢谢合作！','0','50','7','0','cn');
INSERT INTO met_language VALUES('227','Feedback3','反馈信息中不能包含','0','51','7','0','cn');
INSERT INTO met_language VALUES('228','Feedback5','反馈已经被关闭','0','52','7','0','cn');
INSERT INTO met_language VALUES('229','FeedbackProduct','反馈产品','0','53','7','0','cn');
INSERT INTO met_language VALUES('230','IP','来源IP','0','54','7','0','cn');
INSERT INTO met_language VALUES('231','AddTime','提交时间','0','55','7','0','cn');
INSERT INTO met_language VALUES('232','SourcePage','来源页面','0','56','7','0','cn');
INSERT INTO met_language VALUES('233','Feedback4','反馈信息已成功提交，谢谢！','0','57','7','0','cn');
INSERT INTO met_language VALUES('234','Choice','请选择','0','58','7','0','cn');
INSERT INTO met_language VALUES('235','Empty','不能为空','0','59','7','0','cn');
INSERT INTO met_language VALUES('236','LinkInfo1','您的网站已成功提交，谢谢！','0','60','7','0','cn');
INSERT INTO met_language VALUES('237','MessageInfo1','在线留言','0','63','7','0','cn');
INSERT INTO met_language VALUES('238','MessageInfo2','您的留言已成功提交，谢谢！','0','64','7','0','cn');
INSERT INTO met_language VALUES('239','MessageInfo3','姓名不能为空','0','65','7','0','cn');
INSERT INTO met_language VALUES('240','MessageInfo4','留言信息不能为空','0','66','7','0','cn');
INSERT INTO met_language VALUES('241','MessageInfo5','浏览器不支持此功能，请手动设置！','0','67','7','0','cn');
INSERT INTO met_language VALUES('242','messageadd','提交留言','0','68','7','0','cn');
INSERT INTO met_language VALUES('243','messageview','查看留言','0','69','7','0','cn');
INSERT INTO met_language VALUES('244','SearchInfo','在线搜索','0','70','7','0','cn');
INSERT INTO met_language VALUES('245','SearchInfo1','请输入搜索关键词！','0','71','7','0','cn');
INSERT INTO met_language VALUES('246','SearchInfo2','全站搜索','0','72','7','0','cn');
INSERT INTO met_language VALUES('247','SearchInfo3','没有含有','0','73','7','0','cn');
INSERT INTO met_language VALUES('248','SearchInfo4','的信息内容','0','74','7','0','cn');
INSERT INTO met_language VALUES('249','Job1','不限','0','75','7','0','cn');
INSERT INTO met_language VALUES('250','Job2','天','0','76','7','0','cn');
INSERT INTO met_language VALUES('251','several','若干','0','77','7','0','cn');
INSERT INTO met_language VALUES('252','cvtitle','在线应聘','0','78','7','0','cn');
INSERT INTO met_language VALUES('253','cv','查看简历','0','79','7','0','cn');
INSERT INTO met_language VALUES('254','cv2','申请贵公司','0','80','7','0','cn');
INSERT INTO met_language VALUES('255','feedbackonline','在线反馈','0','81','7','0','cn');
INSERT INTO met_language VALUES('256','messageonline','在线留言','0','82','7','0','cn');
INSERT INTO met_language VALUES('257','htmcreate','生成','0','83','7','0','cn');
INSERT INTO met_language VALUES('258','htmsuccess','成功!','0','84','7','0','cn');
INSERT INTO met_language VALUES('259','htmpermission','没有权限！','0','85','7','0','cn');
INSERT INTO met_language VALUES('260','metwapok','没有开启WAP功能！','0','86','7','0','cn');
INSERT INTO met_language VALUES('261','wap','手机版','0','87','7','0','cn');
INSERT INTO met_language VALUES('262','smstips66','余额不足','0','88','7','0','cn');
INSERT INTO met_language VALUES('263','smstips67','短信内容太长，最多350个字','0','89','7','0','cn');
INSERT INTO met_language VALUES('264','smstips68','手机号码太多，最多800个号码','0','90','7','0','cn');
INSERT INTO met_language VALUES('265','smstips69','号码不符合规则','0','91','7','0','cn');
INSERT INTO met_language VALUES('266','smstips70','发送成功(有延迟)','0','92','7','0','cn');
INSERT INTO met_language VALUES('267','smstips71','异常操作，余额不足','0','93','7','0','cn');
INSERT INTO met_language VALUES('268','smstips72','余额不足','0','94','7','0','cn');
INSERT INTO met_language VALUES('269','smstips73','短信内容和手机号码不能为空','0','95','7','0','cn');
INSERT INTO met_language VALUES('270','smstips74','发送密码错误','0','96','7','0','cn');
INSERT INTO met_language VALUES('271','smstips75','网站无法访问','0','97','7','0','cn');
INSERT INTO met_language VALUES('272','smstips76','服务器无响应','0','98','7','0','cn');
INSERT INTO met_language VALUES('273','detailtxt','详细描述','0','99','7','0','cn');
INSERT INTO met_language VALUES('274','showdownload1','更新时间','0','100','7','0','cn');
INSERT INTO met_language VALUES('275','showdownload2','文件下载','0','101','7','0','cn');
INSERT INTO met_language VALUES('276','showdownload3','点击下载','0','102','7','0','cn');
INSERT INTO met_language VALUES('277','initext1','立即搜索','0','42','1','0','cn');
INSERT INTO met_language VALUES('278','saechplaceholder','请输入关键词','0','43','1','0','cn');
INSERT INTO met_language VALUES('279','drxtop','顶','0','44','1','0','cn');
INSERT INTO met_language VALUES('280','drxhot','热','0','45','1','0','cn');
INSERT INTO met_language VALUES('281','drxnew','新','0','46','1','0','cn');
INSERT INTO met_language VALUES('282','colmnmore','更多分类','0','47','1','0','cn');
INSERT INTO met_language VALUES('283','fliptext1','查看更多','0','48','1','0','cn');
INSERT INTO met_language VALUES('284','fliptext2','加载中...','0','49','1','0','cn');
INSERT INTO met_language VALUES('285','downloadtext1','下载','0','50','1','0','cn');
INSERT INTO met_language VALUES('286','downloadtext2','次访问','0','51','1','0','cn');
INSERT INTO met_language VALUES('287','jobtext1','人','0','52','1','0','cn');
INSERT INTO met_language VALUES('288','foottext1','电话','0','53','1','0','cn');
INSERT INTO met_language VALUES('289','foottext2','地图','0','54','1','0','cn');
INSERT INTO met_language VALUES('290','foottext3','留言','0','55','1','0','cn');
INSERT INTO met_language VALUES('291','foottext4','首页','0','56','1','0','cn');
INSERT INTO met_language VALUES('292','foottext5','电脑版','0','57','1','0','cn');
INSERT INTO met_language VALUES('293','foottext6','触屏版','0','58','1','0','cn');
INSERT INTO met_language VALUES('294','navtext1','导航栏目','0','59','1','0','cn');
INSERT INTO met_language VALUES('295','nettext2','文章内容','0','60','1','0','cn');
INSERT INTO met_language VALUES('296','nettext3','产品详情','0','61','1','0','cn');
INSERT INTO met_language VALUES('297','nettext4','资料详情','0','62','1','0','cn');
INSERT INTO met_language VALUES('298','nettext5','图片详情','0','63','1','0','cn');
INSERT INTO met_language VALUES('299','nettext6','职位详情','0','64','1','0','cn');
INSERT INTO met_language VALUES('300','tagweb','标签','0','66','1','0','cn');
INSERT INTO met_language VALUES('301','formerror1','请填写此字段。','0','0','1','0','cn');
INSERT INTO met_language VALUES('302','formerror2','请从这些选项中选择一个。','0','0','1','0','cn');
INSERT INTO met_language VALUES('303','formerror3','请输入正确的手机号码。','0','0','1','0','cn');
INSERT INTO met_language VALUES('304','formerror4','请输入正确的Email地址。','0','0','1','0','cn');
INSERT INTO met_language VALUES('305','formerror5','两次输入的密码不一致，请重新输入。','0','0','1','0','cn');
INSERT INTO met_language VALUES('306','formerror6','请输入至少&metinfo&个字符。','0','0','1','0','cn');
INSERT INTO met_language VALUES('307','formerror7','输入不能超过&metinfo&个字符。','0','0','1','0','cn');
INSERT INTO met_language VALUES('308','formerror8','输入的字符数必须在&metinfo&之间。','0','0','1','0','cn');
INSERT INTO met_language VALUES('309','read','阅读','0','0','1','0','cn');
INSERT INTO met_language VALUES('310','switching_category','切换类目','0','0','1','0','cn');
INSERT INTO met_language VALUES('311','js46','不能重复','0','0','1','0','cn');
INSERT INTO met_language VALUES('312','emailcheck','邮箱验证','0','102','4','0','cn');
INSERT INTO met_language VALUES('313','emailchecktips1','感谢您的注册！激活链接已经发送到您的邮箱','0','103','4','0','cn');
INSERT INTO met_language VALUES('314','emailchecktips2','点击邮件里的链接即可激活账户','0','104','4','0','cn');
INSERT INTO met_language VALUES('315','emailchecktips3','还没收到确认邮件？','0','105','4','0','cn');
INSERT INTO met_language VALUES('316','emailchecktips4','尝试到广告邮件、垃圾邮件目录里找找看','0','106','4','0','cn');
INSERT INTO met_language VALUES('317','emailchecktips5','再次发送确认邮件','0','107','4','0','cn');
INSERT INTO met_language VALUES('318','accsafe','账号安全','0','108','4','0','cn');
INSERT INTO met_language VALUES('319','resend','重发','0','109','4','0','cn');
INSERT INTO met_language VALUES('320','getmemberImgCode','获取验证码','0','110','4','0','cn');
INSERT INTO met_language VALUES('321','teluse','手机号已被注册','0','111','4','0','cn');
INSERT INTO met_language VALUES('322','telok','请输入正确的手机号码','0','112','4','0','cn');
INSERT INTO met_language VALUES('323','password','密码','0','113','4','0','cn');
INSERT INTO met_language VALUES('324','userhave','用户名已存在','0','114','4','0','cn');
INSERT INTO met_language VALUES('325','emailhave','邮箱已被注册','0','115','4','0','cn');
INSERT INTO met_language VALUES('326','memberemail','邮箱','0','116','4','0','cn');
INSERT INTO met_language VALUES('327','memberMoreInfo','更多资料','0','117','4','0','cn');
INSERT INTO met_language VALUES('328','select','选择','0','118','4','0','cn');
INSERT INTO met_language VALUES('329','acchave','已有账号？','0','119','4','0','cn');
INSERT INTO met_language VALUES('330','accpassword','帐号密码','0','120','4','0','cn');
INSERT INTO met_language VALUES('331','accsaftips1','用于保护帐号信息和登录安全','0','121','4','0','cn');
INSERT INTO met_language VALUES('332','modify','修改','0','122','4','0','cn');
INSERT INTO met_language VALUES('333','accemail','邮箱绑定','0','123','4','0','cn');
INSERT INTO met_language VALUES('334','accsaftips2','邮箱绑定可以用于登录帐号，重置密码或其他安全验证','0','124','4','0','cn');
INSERT INTO met_language VALUES('335','acctel','手机绑定','0','125','4','0','cn');
INSERT INTO met_language VALUES('336','accsaftips3','手机绑定可以用于登录帐号，重置密码或其他安全验证','0','126','4','0','cn');
INSERT INTO met_language VALUES('337','modifypassword','密码修改','0','127','4','0','cn');
INSERT INTO met_language VALUES('338','oldpassword','原密码','0','128','4','0','cn');
INSERT INTO met_language VALUES('339','newpassword','新密码','0','129','4','0','cn');
INSERT INTO met_language VALUES('340','confirm','确定','0','130','4','0','cn');
INSERT INTO met_language VALUES('341','cancel','取消','0','131','4','0','cn');
INSERT INTO met_language VALUES('342','emailaddress','邮箱地址','0','132','4','0','cn');
INSERT INTO met_language VALUES('343','emailuse','邮箱已被绑定','0','133','4','0','cn');
INSERT INTO met_language VALUES('344','telnum','手机号码','0','134','4','0','cn');
INSERT INTO met_language VALUES('345','teluse','手机号码已被绑定','0','135','4','0','cn');
INSERT INTO met_language VALUES('346','telok','请输入正确的手机号码','0','136','4','0','cn');
INSERT INTO met_language VALUES('347','modifyacctel','修改手机绑定','0','137','4','0','cn');
INSERT INTO met_language VALUES('348','modifyinfo','保存资料','0','138','4','0','cn');
INSERT INTO met_language VALUES('349','emailnow','当前邮箱：','0','139','4','0','cn');
INSERT INTO met_language VALUES('350','newemail','新邮箱','0','140','4','0','cn');
INSERT INTO met_language VALUES('351','submit','提交','0','141','4','0','cn');
INSERT INTO met_language VALUES('352','modifyaccemail','修改绑定邮箱','0','142','4','0','cn');
INSERT INTO met_language VALUES('353','resetpassword','请重新设置密码','0','143','4','0','cn');
INSERT INTO met_language VALUES('354','renewpassword','重复密码','0','144','4','0','cn');
INSERT INTO met_language VALUES('355','inputcode','请输入验证码','0','145','4','0','cn');
INSERT INTO met_language VALUES('356','next','下一步','0','146','4','0','cn');
INSERT INTO met_language VALUES('357','logintips','用户名/邮箱/手机','0','147','4','0','cn');
INSERT INTO met_language VALUES('358','otherlogin','其它方式登录','0','148','4','0','cn');
INSERT INTO met_language VALUES('359','logintips1','没有账号？现在去注册','0','149','4','0','cn');
INSERT INTO met_language VALUES('360','rehomepage','返回首页','0','150','4','0','cn');
INSERT INTO met_language VALUES('361','rememberImgCode','重发验证码','0','150','4','0','cn');
INSERT INTO met_language VALUES('362','relogin','返回登录','0','151','4','0','cn');
INSERT INTO met_language VALUES('363','getpasswordtips','邮箱/手机','0','152','4','0','cn');
INSERT INTO met_language VALUES('364','regclose','注册功能已关闭','0','153','4','0','cn');
INSERT INTO met_language VALUES('365','regfail','注册失败','0','154','4','0','cn');
INSERT INTO met_language VALUES('366','codetimeout','验证码已超时','0','155','4','0','cn');
INSERT INTO met_language VALUES('367','telcheckfail','手机号码与短信验证号码不一致','0','156','4','0','cn');
INSERT INTO met_language VALUES('368','regsuc','注册成功！','0','157','4','0','cn');
INSERT INTO met_language VALUES('369','activesuc','激活成功','0','158','4','0','cn');
INSERT INTO met_language VALUES('370','emailvildtips1','验证信息错误','0','159','4','0','cn');
INSERT INTO met_language VALUES('371','emailvildtips2','验证信息错误或已超时','0','160','4','0','cn');
INSERT INTO met_language VALUES('372','telreg','手机号已被注册','0','161','4','0','cn');
INSERT INTO met_language VALUES('373','Sendfrequent','发送过于频繁，请稍后再试','0','162','4','0','cn');
INSERT INTO met_language VALUES('374','emailsuc','邮件发送成功！','0','163','4','0','cn');
INSERT INTO met_language VALUES('375','emailfail','邮件发送失败，请确认邮箱是否正确或联系网站管理人员解决。','0','164','4','0','cn');
INSERT INTO met_language VALUES('376','modifysuc','修改成功','0','165','4','0','cn');
INSERT INTO met_language VALUES('377','binding','绑定','0','166','4','0','cn');
INSERT INTO met_language VALUES('378','notbound','未绑定','0','167','4','0','cn');
INSERT INTO met_language VALUES('379','accnotmodify','帐号无法修改','0','168','4','0','cn');
INSERT INTO met_language VALUES('380','emailsuclink','邮件发送成功！请点击邮件里的验证链接完成操作！','0','169','4','0','cn');
INSERT INTO met_language VALUES('381','bindingok','绑定成功','0','170','4','0','cn');
INSERT INTO met_language VALUES('382','opfail','操作失败','0','171','4','0','cn');
INSERT INTO met_language VALUES('383','modifypasswordsuc','密码修改成功！','0','172','4','0','cn');
INSERT INTO met_language VALUES('384','lodpasswordfail','原密码错误','0','173','4','0','cn');
INSERT INTO met_language VALUES('385','membererror1','用户名或密码错误','0','174','4','0','cn');
INSERT INTO met_language VALUES('386','membererror2','请开启session！','0','175','4','0','cn');
INSERT INTO met_language VALUES('387','membererror3','授权失败','0','176','4','0','cn');
INSERT INTO met_language VALUES('388','membererror4','未知错误','0','177','4','0','cn');
INSERT INTO met_language VALUES('389','emailsucpass','密码找回邮件已经发送至您的邮箱，点击邮件里的链接即可重设密码。','0','178','4','0','cn');
INSERT INTO met_language VALUES('390','emailvildtips3','请输入正确的邮箱或手机号码','0','179','4','0','cn');
INSERT INTO met_language VALUES('391','membererror5','发送失败！错误码：','0','180','4','0','cn');
INSERT INTO met_language VALUES('392','noempty','此项不能为空','0','181','4','0','cn');
INSERT INTO met_language VALUES('393','usernamecheck','用户名必须在2-30个字符之间','0','182','4','0','cn');
INSERT INTO met_language VALUES('394','passwordcheck','密码必须在6-30个字符之间','0','183','4','0','cn');
INSERT INTO met_language VALUES('395','passwordsame','两次密码输入不一致','0','184','4','0','cn');
INSERT INTO met_language VALUES('396','emailcheck','请输入正确的Email地址','0','184','4','0','cn');
INSERT INTO met_language VALUES('397','Previous_news','上一篇','0','9','3','0','cn');
INSERT INTO met_language VALUES('398','Next_news','下一篇','0','10','3','0','cn');
INSERT INTO met_language VALUES('399','job_tips1_v6','工作简历中不能包含','0','0','0','0','cn');
INSERT INTO met_language VALUES('400','close','关闭','0','0','0','0','cn');
INSERT INTO met_language VALUES('401','error404','404错误，页面不见了。。。','0','0','0','0','cn');
INSERT INTO met_language VALUES('402','browserupdatetips','你正在使用一个 <strong>过时</strong> 的浏览器。请 <a href=https://browsehappy.com/ target=_blank>升级您的浏览器</a>，以提高您的体验。','0','0','0','0','cn');
INSERT INTO met_language VALUES('403','newFeedback','您收到了新的反馈','0','0','0','0','cn');
INSERT INTO met_language VALUES('404','opfailed','操作失败','0','0','0','0','cn');
INSERT INTO met_language VALUES('405','jobPrompt','收到了新的简历','0','0','0','0','cn');
INSERT INTO met_language VALUES('406','reMessage1','您网站','0','0','0','0','cn');
INSERT INTO met_language VALUES('407','feedbackPrompt','收到了新的反馈信息','0','0','0','0','cn');
INSERT INTO met_language VALUES('408','reMessage2','，请尽快登录网站后台查看','0','0','0','0','cn');
INSERT INTO met_language VALUES('409','messagePrompt','收到了新的留言','0','0','0','0','cn');
INSERT INTO met_language VALUES('410','formaterror','格式错误','0','0','0','0','cn');
INSERT INTO met_language VALUES('411','listcom','推荐','0','0','0','0','cn');
INSERT INTO met_language VALUES('412','listnew','最新','0','0','0','0','cn');
INSERT INTO met_language VALUES('413','listhot','热门','0','0','0','0','cn');
INSERT INTO met_language VALUES('414','listsales','销量','0','0','0','0','cn');
INSERT INTO met_language VALUES('415','weball','全部','0','0','0','0','cn');
INSERT INTO met_language VALUES('831','unitytxt_74','查看商业版WAP功能','1','438','8','0','cn');
INSERT INTO met_language VALUES('832','unitytxt_73','地图设置（用于设置wap页面底部固定功能）','1','437','8','0','cn');
INSERT INTO met_language VALUES('833','unitytxt_72','地图设置','1','436','8','0','cn');
INSERT INTO met_language VALUES('834','unitytxt_71','二维码','1','435','8','0','cn');
INSERT INTO met_language VALUES('835','unitytxt_69','安装、升级文件删除','1','433','8','0','cn');
INSERT INTO met_language VALUES('836','unitytxt_70','上传文件','1','434','8','0','cn');
INSERT INTO met_language VALUES('837','unitytxt_68','当创始人账号为admin时，您拥有一次机会，可以修改创始人名称。','1','432','8','0','cn');
INSERT INTO met_language VALUES('838','unitytxt_67','修改为','1','431','8','0','cn');
INSERT INTO met_language VALUES('839','unitytxt_63','QQ支持','1','427','8','0','cn');
INSERT INTO met_language VALUES('840','unitytxt_64','论坛支持','1','428','8','0','cn');
INSERT INTO met_language VALUES('841','unitytxt_64','论坛支持','1','428','8','0','cn');
INSERT INTO met_language VALUES('842','unitytxt_65','服务信息','1','429','8','0','cn');
INSERT INTO met_language VALUES('843','unitytxt_66','服务期限','1','430','8','0','cn');
INSERT INTO met_language VALUES('844','unitytxt_62','电话支持','1','426','8','0','cn');
INSERT INTO met_language VALUES('845','unitytxt_61','服务方式','1','425','8','0','cn');
INSERT INTO met_language VALUES('846','unitytxt_59','重新录入商业授权码','1','423','8','0','cn');
INSERT INTO met_language VALUES('847','unitytxt_60','享有服务','1','424','8','0','cn');
INSERT INTO met_language VALUES('848','unitytxt_58','到期日期','1','422','8','0','cn');
INSERT INTO met_language VALUES('849','unitytxt_57','授权日期','1','421','8','0','cn');
INSERT INTO met_language VALUES('850','unitytxt_54','授权域名','1','418','8','0','cn');
INSERT INTO met_language VALUES('851','unitytxt_55','网站名称','1','419','8','0','cn');
INSERT INTO met_language VALUES('852','unitytxt_56','授权类型','1','420','8','0','cn');
INSERT INTO met_language VALUES('853','unitytxt_53','请输入常用功能名称！','1','417','8','0','cn');
INSERT INTO met_language VALUES('854','unitytxt_52','请选择一个指向功能！','1','416','8','0','cn');
INSERT INTO met_language VALUES('855','unitytxt_49','选择指向功能','1','413','8','0','cn');
INSERT INTO met_language VALUES('856','unitytxt_50','常用功能名称','1','414','8','0','cn');
INSERT INTO met_language VALUES('857','unitytxt_51','直接下载压缩包会占用空间流量，如果空间限制流量，建议通过FTP下载。您确定要下载吗？','1','415','8','0','cn');
INSERT INTO met_language VALUES('858','unitytxt_46','其它页面细节设置','1','410','8','0','cn');
INSERT INTO met_language VALUES('859','unitytxt_47','了解商业授权','1','411','8','0','cn');
INSERT INTO met_language VALUES('860','unitytxt_48','前日','1','412','8','0','cn');
INSERT INTO met_language VALUES('861','unitytxt_45','显示产品分类列表（图片为该分类的栏目图片，在栏目设置中上传），点击对应的分类图片后进入该分类的产品缩略图列表。','1','409','8','0','cn');
INSERT INTO met_language VALUES('862','unitytxt_43','列表页展示方式','1','407','8','0','cn');
INSERT INTO met_language VALUES('863','unitytxt_44','直接显示产品缩略图列表，点击缩略图进入产品详情页。','1','408','8','0','cn');
INSERT INTO met_language VALUES('864','unitytxt_39','设置','1','403','8','0','cn');
INSERT INTO met_language VALUES('865','unitytxt_40','首页信息列表显示条数','1','404','8','0','cn');
INSERT INTO met_language VALUES('866','unitytxt_41','首页友情链接设置','1','405','8','0','cn');
INSERT INTO met_language VALUES('867','unitytxt_42','列表页每页显示条数','1','406','8','0','cn');
INSERT INTO met_language VALUES('868','unitytxt_38','代码会放在 &lt;/body&gt; 标签以上','1','402','8','0','cn');
INSERT INTO met_language VALUES('869','unitytxt_37','代码会放在 &lt;/head&gt; 标签以上','1','401','8','0','cn');
INSERT INTO met_language VALUES('870','unitytxt_33','权限设置','1','397','8','0','cn');
INSERT INTO met_language VALUES('871','unitytxt_34','资料文档上传','1','398','8','0','cn');
INSERT INTO met_language VALUES('872','unitytxt_35','回发邮件给此用户','1','399','8','0','cn');
INSERT INTO met_language VALUES('873','unitytxt_36','PC端第三方代码（一般用于放置百度商桥代码、站长统计代码、谷歌翻译代码等）','1','400','8','0','cn');
INSERT INTO met_language VALUES('874','unitytxt_30','多栏目显示','1','394','8','0','cn');
INSERT INTO met_language VALUES('875','unitytxt_31','显示缩略图','1','395','8','0','cn');
INSERT INTO met_language VALUES('876','unitytxt_32','隐藏缩略图','1','396','8','0','cn');
INSERT INTO met_language VALUES('877','unitytxt_28','自定义时间参数','1','392','8','0','cn');
INSERT INTO met_language VALUES('878','unitytxt_29','请勾选要显示栏目','1','393','8','0','cn');
INSERT INTO met_language VALUES('879','unitytxt_27','每个栏目对应一个功能模块，请在栏目设置里查看所属模块。','1','391','8','0','cn');
INSERT INTO met_language VALUES('880','unitytxt_24','Title设置','1','388','8','0','cn');
INSERT INTO met_language VALUES('881','unitytxt_25','关键词设置','1','389','8','0','cn');
INSERT INTO met_language VALUES('882','unitytxt_26','优化文字设置（可用于增加关键词密度）','1','390','8','0','cn');
INSERT INTO met_language VALUES('883','unitytxt_23','彻底解决静态页面经常需要手动生成的烦恼','1','387','8','0','cn');
INSERT INTO met_language VALUES('884','unitytxt_22','开启即可生效，无需生成。<br/>如服务器需要手动配置伪静态规则文件，请在右上角下载。','1','386','8','0','cn');
INSERT INTO met_language VALUES('885','unitytxt_21','您还没有下载任何应用功能','1','385','8','0','cn');
INSERT INTO met_language VALUES('886','unitytxt_20','已安装应用列表','1','384','8','0','cn');
INSERT INTO met_language VALUES('887','unitytxt_19','内置应用列表','1','383','8','0','cn');
INSERT INTO met_language VALUES('888','unitytxt_15','其它设置','1','379','8','0','cn');
INSERT INTO met_language VALUES('889','unitytxt_16','标准指纹文件','1','380','8','0','cn');
INSERT INTO met_language VALUES('890','unitytxt_17','指纹文件','1','381','8','0','cn');
INSERT INTO met_language VALUES('891','unitytxt_18','备份','1','382','8','0','cn');
INSERT INTO met_language VALUES('892','unitytxt_13','底部信息设置（显示在网站前台底部）','1','377','8','0','cn');
INSERT INTO met_language VALUES('893','unitytxt_14','样式设置','1','378','8','0','cn');
INSERT INTO met_language VALUES('894','unitytxt_12','至','1','376','8','0','cn');
INSERT INTO met_language VALUES('895','unitytxt_10','仅适用用于中文前台语言（语言标识为cn或zh时生效），浏览者可以在简繁体之间切换。','1','374','8','0','cn');
INSERT INTO met_language VALUES('896','unitytxt_11','密码修改（不修改请留空）','1','375','8','0','cn');
INSERT INTO met_language VALUES('897','unitytxt_9','同步官方参数','1','373','8','0','cn');
INSERT INTO met_language VALUES('898','unitytxt_8','该语言设置了独立域名，需要修改网站网址请在<font class=\'red\'>语言设置</font>中修改。','1','372','8','0','cn');
INSERT INTO met_language VALUES('899','unitytxt_7','备份包下载后建议及时删除备份文件，以免影响空间大小（如果你的虚拟主机限定流量，你可以通过FTP下载节省流量）','1','371','8','0','cn');
INSERT INTO met_language VALUES('900','unitytxt_4','功能相关','1','368','8','0','cn');
INSERT INTO met_language VALUES('901','unitytxt_6','版本不一致','1','370','8','0','cn');
INSERT INTO met_language VALUES('902','unitytxt_5','后台操作','1','369','8','0','cn');
INSERT INTO met_language VALUES('903','unitytxt_2','勾选则采用默认设置','1','366','8','0','cn');
INSERT INTO met_language VALUES('904','unitytxt_3','其它设置（用于不支持JS的移动终端展示，即免费版本的WAP前台页面）','1','367','8','0','cn');
INSERT INTO met_language VALUES('905','ssl','SSL服务方式','1','362','8','0','cn');
INSERT INTO met_language VALUES('906','tls','TLS服务方式','1','363','8','0','cn');
INSERT INTO met_language VALUES('907','xtips','小技巧：Ctrl + 回车键 可以快捷保存','1','364','8','0','cn');
INSERT INTO met_language VALUES('908','unitytxt_1','功能设置','1','365','8','0','cn');
INSERT INTO met_language VALUES('909','loginOldwords','此关键词已经被替换过!','1','361','8','0','cn');
INSERT INTO met_language VALUES('910','loginSkin','上传失败！此模板风格已经存在！','1','360','8','0','cn');
INSERT INTO met_language VALUES('911','loginUserMudb1','此用户名已经被使用','1','358','8','0','cn');
INSERT INTO met_language VALUES('912','loginFail','操作失败!','1','359','8','0','cn');
INSERT INTO met_language VALUES('913','loginRegok','<font color=green>恭喜你，可以注册</font>','1','357','8','0','cn');
INSERT INTO met_language VALUES('914','loginUserMudb','<font color=red>此用户名已经被使用</font>','1','356','8','0','cn');
INSERT INTO met_language VALUES('915','loginIntput','请输入登录帐号!','1','354','8','0','cn');
INSERT INTO met_language VALUES('916','loginUserErr','<font color=red>用户名格式错误</font>','1','355','8','0','cn');
INSERT INTO met_language VALUES('917','reall','批量还原后请手动生成列表静态页面','1','353','8','0','cn');
INSERT INTO met_language VALUES('918','NewPassJS','请您登录邮箱收取最新密码','1','351','8','0','cn');
INSERT INTO met_language VALUES('919','delall','批量删除后请手动生成二三级列表静态页面','1','352','8','0','cn');
INSERT INTO met_language VALUES('920','deleteJS','请先添加管理员再删除！','1','348','8','0','cn');
INSERT INTO met_language VALUES('921','NoidJS1','没有此用户或邮箱地址不正确','1','350','8','0','cn');
INSERT INTO met_language VALUES('922','NoidJS','没有此用户','1','349','8','0','cn');
INSERT INTO met_language VALUES('923','jsx33','展开高级选项','1','345','8','0','cn');
INSERT INTO met_language VALUES('924','jsx34','隐藏高级选项','1','346','8','0','cn');
INSERT INTO met_language VALUES('925','jsx35','上传临时文件夹(upload_tmp_dir)没有写权限,请联系空间商修改。','1','347','8','0','cn');
INSERT INTO met_language VALUES('926','jsx31','失败','1','343','8','0','cn');
INSERT INTO met_language VALUES('927','jsx32','登录超时，请重新登录！','1','344','8','0','cn');
INSERT INTO met_language VALUES('928','jsx30','静态页面名称与其它信息ID号冲突，请更换为字母+数字，不建议纯数字的静态页面名称','1','342','8','0','cn');
INSERT INTO met_language VALUES('929','jsx29','是否全部执行','1','341','8','0','cn');
INSERT INTO met_language VALUES('930','jsx27','静态页面名已存在','1','339','8','0','cn');
INSERT INTO met_language VALUES('931','jsx28','是否将选定内容放入回收站？','1','340','8','0','cn');
INSERT INTO met_language VALUES('932','jsx26','更新文件...','1','338','8','0','cn');
INSERT INTO met_language VALUES('933','jsx24','下载文件...','1','336','8','0','cn');
INSERT INTO met_language VALUES('934','jsx25','更新数据库...','1','337','8','0','cn');
INSERT INTO met_language VALUES('935','jsx23','开始升级，检测目录权限...','1','335','8','0','cn');
INSERT INTO met_language VALUES('936','jsx22','备份当前数据...','1','334','8','0','cn');
INSERT INTO met_language VALUES('937','jsx21','无法连接到服务器','1','333','8','0','cn');
INSERT INTO met_language VALUES('938','jsx20','正在检测...','1','332','8','0','cn');
INSERT INTO met_language VALUES('939','jsx19','测试失败！请检查帐号密码是否正确。','1','331','8','0','cn');
INSERT INTO met_language VALUES('940','jsx18','正在测试...','1','330','8','0','cn');
INSERT INTO met_language VALUES('941','jsx16','正在上传','1','328','8','0','cn');
INSERT INTO met_language VALUES('942','jsx17','上传成功！','1','329','8','0','cn');
INSERT INTO met_language VALUES('943','jsx15','上传','1','327','8','0','cn');
INSERT INTO met_language VALUES('944','jsx14','抱歉！该语言下没有同模块栏目存在，请先到对应语言添加栏目再操作！','1','326','8','0','cn');
INSERT INTO met_language VALUES('945','jsx13','不可同时操作。','1','325','8','0','cn');
INSERT INTO met_language VALUES('946','jsx11','正在获取信息...','1','323','8','0','cn');
INSERT INTO met_language VALUES('947','jsx12','该栏目下没有内容！','1','324','8','0','cn');
INSERT INTO met_language VALUES('948','jsx10','错误','1','322','8','0','cn');
INSERT INTO met_language VALUES('949','jsx9','错误：需要生成的静态页面路径不存在！','1','321','8','0','cn');
INSERT INTO met_language VALUES('950','jsx8','完成！','1','320','8','0','cn');
INSERT INTO met_language VALUES('951','jsx4','表单复制成功！','1','316','8','0','cn');
INSERT INTO met_language VALUES('952','jsx5','编辑器载入中...','1','317','8','0','cn');
INSERT INTO met_language VALUES('953','jsx6','成功','1','318','8','0','cn');
INSERT INTO met_language VALUES('954','jsx7','文件写入失败，可能没有写入的权限','1','319','8','0','cn');
INSERT INTO met_language VALUES('955','jsx2','请至少选一种语言！','1','314','8','0','cn');
INSERT INTO met_language VALUES('956','jsx3','请先选择需要复制的表单','1','315','8','0','cn');
INSERT INTO met_language VALUES('957','jsx1','载入中...','1','313','8','0','cn');
INSERT INTO met_language VALUES('958','js70','确定启用选中的模板吗？','1','312','8','0','cn');
INSERT INTO met_language VALUES('959','js69','确定启用选中的风格吗？','1','311','8','0','cn');
INSERT INTO met_language VALUES('960','js68','请选择zip格式文件','1','310','8','0','cn');
INSERT INTO met_language VALUES('961','js67','请至少选择一个所属栏目','1','309','8','0','cn');
INSERT INTO met_language VALUES('962','js66','确定要彻底清空所有回收站的内容？','1','308','8','0','cn');
INSERT INTO met_language VALUES('963','js64','是否还原所选内容','1','306','8','0','cn');
INSERT INTO met_language VALUES('964','js65','确定要还原所有回收站的内容？','1','307','8','0','cn');
INSERT INTO met_language VALUES('965','js62','您确定要移动所选吗？','1','304','8','0','cn');
INSERT INTO met_language VALUES('966','js63','确定清空','1','305','8','0','cn');
INSERT INTO met_language VALUES('967','js59','请填写目录名称','1','301','8','0','cn');
INSERT INTO met_language VALUES('968','js60','是否把选定内容放入回收站？','1','302','8','0','cn');
INSERT INTO met_language VALUES('969','js61','您确定要复制所选吗？','1','303','8','0','cn');
INSERT INTO met_language VALUES('970','js58','是否合并栏目？合并后该目录名称将被修改,点取消则保持原目录名称并进入下一步','1','300','8','0','cn');
INSERT INTO met_language VALUES('971','js57','您确认要移动该栏目吗？','1','299','8','0','cn');
INSERT INTO met_language VALUES('972','js54','正在生成静态页面...','1','296','8','0','cn');
INSERT INTO met_language VALUES('973','js55','返回','1','297','8','0','cn');
INSERT INTO met_language VALUES('974','js56','移动为一级栏目必须设置一个新的目录名称(目录名只能是数字或字母)','1','298','8','0','cn');
INSERT INTO met_language VALUES('975','js53','完成静态页面生成！','1','295','8','0','cn');
INSERT INTO met_language VALUES('976','js52','请命名栏目文件夹名称','1','294','8','0','cn');
INSERT INTO met_language VALUES('977','js51','请填写栏目名称','1','293','8','0','cn');
INSERT INTO met_language VALUES('978','js46','不能重复','1','288','8','0','cn');
INSERT INTO met_language VALUES('979','js47','正在删除静态页面...','1','289','8','0','cn');
INSERT INTO met_language VALUES('980','js50','该语言不存在相同模块的一级栏目','1','292','8','0','cn');
INSERT INTO met_language VALUES('981','js49','撤销','1','291','8','0','cn');
INSERT INTO met_language VALUES('982','js48','正在加载...','1','290','8','0','cn');
INSERT INTO met_language VALUES('983','js45','检测表单..','1','287','8','0','cn');
INSERT INTO met_language VALUES('984','js44','Email地址不正确！','1','286','8','0','cn');
INSERT INTO met_language VALUES('985','js43','添加成功！是否继续添加信息？','1','285','8','0','cn');
INSERT INTO met_language VALUES('986','js39','请选择三级栏目','1','281','8','0','cn');
INSERT INTO met_language VALUES('987','js40','正在提交..','1','282','8','0','cn');
INSERT INTO met_language VALUES('988','js41','不能为空！','1','283','8','0','cn');
INSERT INTO met_language VALUES('989','js42','提交成功!','1','284','8','0','cn');
INSERT INTO met_language VALUES('990','js38','请选择二级栏目','1','280','8','0','cn');
INSERT INTO met_language VALUES('991','js37','请选择一级栏目','1','279','8','0','cn');
INSERT INTO met_language VALUES('992','js34','请先转移该栏目的三级栏目','1','276','8','0','cn');
INSERT INTO met_language VALUES('993','js36','请选择语言','1','278','8','0','cn');
INSERT INTO met_language VALUES('994','js35','上传临时文件夹（upload_tmp_dir）不可写或者域名/后台文件夹/include/uploadify.php没有访问权限。','1','277','8','0','cn');
INSERT INTO met_language VALUES('995','js33','静态页面名称不能为空','1','275','8','0','cn');
INSERT INTO met_language VALUES('996','js32','是否同时删除相关简历？','1','274','8','0','cn');
INSERT INTO met_language VALUES('997','js30','代理商','1','272','8','0','cn');
INSERT INTO met_language VALUES('998','js31','管理员','1','273','8','0','cn');
INSERT INTO met_language VALUES('999','js24','确定吗？','1','266','8','0','cn');
INSERT INTO met_language VALUES('1000','js25','图片地址不能为空！','1','267','8','0','cn');
INSERT INTO met_language VALUES('1001','js26','Flash地址不能为空！','1','268','8','0','cn');
INSERT INTO met_language VALUES('1002','js27','请填写地址！','1','269','8','0','cn');
INSERT INTO met_language VALUES('1003','js28','不限','1','270','8','0','cn');
INSERT INTO met_language VALUES('1004','js29','普通会员','1','271','8','0','cn');
INSERT INTO met_language VALUES('1005','js23','没有选中的记录!','1','265','8','0','cn');
INSERT INTO met_language VALUES('1006','js22','是否改变其状态?','1','264','8','0','cn');
INSERT INTO met_language VALUES('1007','js21','设置已生效，是否删除所有已生成的静态页面？','1','263','8','0','cn');
INSERT INTO met_language VALUES('1008','js20','网站地址不能为空','1','262','8','0','cn');
INSERT INTO met_language VALUES('1009','js19','网站名称不能为空','1','261','8','0','cn');
INSERT INTO met_language VALUES('1010','js17','招聘职位不能为空','1','259','8','0','cn');
INSERT INTO met_language VALUES('1011','js18','原文字不能为空','1','260','8','0','cn');
INSERT INTO met_language VALUES('1012','js15','请选择上传文件','1','257','8','0','cn');
INSERT INTO met_language VALUES('1013','js16','下载地址不能为空','1','258','8','0','cn');
INSERT INTO met_language VALUES('1014','js13','请输入标题','1','255','8','0','cn');
INSERT INTO met_language VALUES('1015','js14','请选择二级及三级栏目','1','256','8','0','cn');
INSERT INTO met_language VALUES('1016','js12','栏目文件夹名称不能为空','1','254','8','0','cn');
INSERT INTO met_language VALUES('1017','js11','栏目名称不能为空','1','253','8','0','cn');
INSERT INTO met_language VALUES('1018','js10','您的修改内容还没有保存，您确定离开吗？','1','252','8','0','cn');
INSERT INTO met_language VALUES('1019','js9','模板文件夹不能为空','1','251','8','0','cn');
INSERT INTO met_language VALUES('1020','js8','模板名称不能为空','1','250','8','0','cn');
INSERT INTO met_language VALUES('1021','js6','两次输入的密码不一样','1','248','8','0','cn');
INSERT INTO met_language VALUES('1022','js7','确定要删除选中的信息吗？一旦删除将不能恢复！','1','249','8','0','cn');
INSERT INTO met_language VALUES('1023','js5','email不能为空','1','247','8','0','cn');
INSERT INTO met_language VALUES('1024','js4','登录密码不能为空','1','246','8','0','cn');
INSERT INTO met_language VALUES('1025','js2','数据出错了','1','244','8','0','cn');
INSERT INTO met_language VALUES('1026','js3','管理员帐号不能为空','1','245','8','0','cn');
INSERT INTO met_language VALUES('1027','js1','请稍等,系统检测中....','1','243','8','0','cn');
INSERT INTO met_language VALUES('1028','dataerror','数据错误','1','242','8','0','cn');
INSERT INTO met_language VALUES('1029','jsok','操作成功','1','241','8','0','cn');
INSERT INTO met_language VALUES('1030','pages','页','1','239','8','0','cn');
INSERT INTO met_language VALUES('1031','pageGo','转到','1','240','8','0','cn');
INSERT INTO met_language VALUES('1032','delnow','当前选中','1','237','8','0','cn');
INSERT INTO met_language VALUES('1033','marks','：','1','238','8','0','cn');
INSERT INTO met_language VALUES('1034','displayimgTip','展示图片','1','236','8','0','cn');
INSERT INTO met_language VALUES('1035','displayimg','展示图片','1','235','8','0','cn');
INSERT INTO met_language VALUES('1036','Operating','操作系统','1','233','8','0','cn');
INSERT INTO met_language VALUES('1037','noorderinfo','数值越小越靠前','1','234','8','0','cn');
INSERT INTO met_language VALUES('1038','launched','点击展开/隐藏侧栏','1','232','8','0','cn');
INSERT INTO met_language VALUES('1039','anonymity','匿名','1','231','8','0','cn');
INSERT INTO met_language VALUES('1040','move','转移','1','230','8','0','cn');
INSERT INTO met_language VALUES('1041','selectnow','选择','1','229','8','0','cn');
INSERT INTO met_language VALUES('1042','detail','查看详细','1','228','8','0','cn');
INSERT INTO met_language VALUES('1043','contentdetail','详细内容','1','227','8','0','cn');
INSERT INTO met_language VALUES('1044','content','内容','1','226','8','0','cn');
INSERT INTO met_language VALUES('1045','webaccess','访问权限','1','225','8','0','cn');
INSERT INTO met_language VALUES('1046','descriptioninfo','用于搜索引擎优化','1','224','8','0','cn');
INSERT INTO met_language VALUES('1047','keywordsinfo','多个关键词请用\",\"隔开','1','223','8','0','cn');
INSERT INTO met_language VALUES('1048','keywords','关键词','1','222','8','0','cn');
INSERT INTO met_language VALUES('1049','hits','点击次数','1','221','8','0','cn');
INSERT INTO met_language VALUES('1050','addtime','发布时间','1','220','8','0','cn');
INSERT INTO met_language VALUES('1051','updatetime','更新时间','1','219','8','0','cn');
INSERT INTO met_language VALUES('1052','access3','管理员','1','218','8','0','cn');
INSERT INTO met_language VALUES('1053','access2','代理商','1','217','8','0','cn');
INSERT INTO met_language VALUES('1054','access1','普通会员','1','216','8','0','cn');
INSERT INTO met_language VALUES('1055','access0','不限','1','215','8','0','cn');
INSERT INTO met_language VALUES('1056','access','权限','1','214','8','0','cn');
INSERT INTO met_language VALUES('1057','ordernumber','数字越小排名越靠前','1','213','8','0','cn');
INSERT INTO met_language VALUES('1058','deleteselected','删除','1','212','8','0','cn');
INSERT INTO met_language VALUES('1059','htmlok','支持HTML语言','1','211','8','0','cn');
INSERT INTO met_language VALUES('1060','read','已读','1','210','8','0','cn');
INSERT INTO met_language VALUES('1061','set','参数配置','1','209','8','0','cn');
INSERT INTO met_language VALUES('1062','parameter','参数','1','208','8','0','cn');
INSERT INTO met_language VALUES('1063','imagename','请输入名称，留空将采用默认名称','1','207','8','0','cn');
INSERT INTO met_language VALUES('1064','search','搜索','1','206','8','0','cn');
INSERT INTO met_language VALUES('1065','manager','管理内容','1','205','8','0','cn');
INSERT INTO met_language VALUES('1066','newest','最新','1','204','8','0','cn');
INSERT INTO met_language VALUES('1067','new','最新信息','1','203','8','0','cn');
INSERT INTO met_language VALUES('1068','top','置顶','1','202','8','0','cn');
INSERT INTO met_language VALUES('1069','wap','wap','1','201','8','0','cn');
INSERT INTO met_language VALUES('1070','recom','推荐','1','200','8','0','cn');
INSERT INTO met_language VALUES('1071','images','图片信息','1','199','8','0','cn');
INSERT INTO met_language VALUES('1072','image','图片','1','198','8','0','cn');
INSERT INTO met_language VALUES('1073','title','标题','1','197','8','0','cn');
INSERT INTO met_language VALUES('1074','description','简短描述','1','196','8','0','cn');
INSERT INTO met_language VALUES('1075','名称','','1','195','8','0','cn');
INSERT INTO met_language VALUES('1076','order','No.','1','194','8','0','cn');
INSERT INTO met_language VALUES('1077','default','默认','1','193','8','0','cn');
INSERT INTO met_language VALUES('1078','selected','选择','1','192','8','0','cn');
INSERT INTO met_language VALUES('1079','selectall','全选','1','191','8','0','cn');
INSERT INTO met_language VALUES('1080','item','条','1','190','8','0','cn');
INSERT INTO met_language VALUES('1081','metinfo','MetInfo企业网站管理系统','1','189','8','0','cn');
INSERT INTO met_language VALUES('1082','no','否','1','188','8','0','cn');
INSERT INTO met_language VALUES('1083','yes','是','1','187','8','0','cn');
INSERT INTO met_language VALUES('1084','sort','排序','1','186','8','0','cn');
INSERT INTO met_language VALUES('1085','type','类型','1','185','8','0','cn');
INSERT INTO met_language VALUES('1086','close','关闭','1','184','8','0','cn');
INSERT INTO met_language VALUES('1087','open','开启','1','183','8','0','cn');
INSERT INTO met_language VALUES('1088','operate','操作','1','182','8','0','cn');
INSERT INTO met_language VALUES('1089','preview','预览','1','181','8','0','cn');
INSERT INTO met_language VALUES('1090','delete','删除','1','180','8','0','cn');
INSERT INTO met_language VALUES('1091','modify','修改','1','179','8','0','cn');
INSERT INTO met_language VALUES('1092','View','查看','1','178','8','0','cn');
INSERT INTO met_language VALUES('1093','editor','编辑','1','177','8','0','cn');
INSERT INTO met_language VALUES('1094','add','添加','1','176','8','0','cn');
INSERT INTO met_language VALUES('1095','dataerr1','失败！导入的数据与系统版本不一致！','1','169','8','0','cn');
INSERT INTO met_language VALUES('1096','fontfamily','','1','170','8','0','cn');
INSERT INTO met_language VALUES('1097','Submit','保存','1','171','8','0','cn');
INSERT INTO met_language VALUES('1098','Submitall','提交','1','172','8','0','cn');
INSERT INTO met_language VALUES('1099','Reset','重置','1','173','8','0','cn');
INSERT INTO met_language VALUES('1100','Copy','复制','1','174','8','0','cn');
INSERT INTO met_language VALUES('1101','Copytitle','复制至...','1','175','8','0','cn');
INSERT INTO met_language VALUES('1102','langadderr6','远程下载语言包失败，已复制默认语言包。','1','168','8','0','cn');
INSERT INTO met_language VALUES('1103','langadderr4','无法同步官网语言包，错误原因：','1','166','8','0','cn');
INSERT INTO met_language VALUES('1104','langadderr5','您删除的是默认语言！请先设置一个其它语言为默认语言再操作！','1','167','8','0','cn');
INSERT INTO met_language VALUES('1105','langadderr1','非法语言标识','1','163','8','0','cn');
INSERT INTO met_language VALUES('1106','langadderr2','您现在在此语言进行操作！请到右上角切换到其它语言再删除！','1','164','8','0','cn');
INSERT INTO met_language VALUES('1107','langadderr3','语言添加成功！在右上角的网站语言可以切换到新增的语言。','1','165','8','0','cn');
INSERT INTO met_language VALUES('1108','basictips7','邮箱设置正确！','1','162','8','0','cn');
INSERT INTO met_language VALUES('1109','basictips6','<b>解决办法：</b>请检查帐号密码和smtp是否有误或查看邮箱是否开启smtp服务。','1','161','8','0','cn');
INSERT INTO met_language VALUES('1110','basictips5','<b>错误提示：</b>测试发送邮件失败！','1','160','8','0','cn');
INSERT INTO met_language VALUES('1111','basictips3','邮件发送测试','1','158','8','0','cn');
INSERT INTO met_language VALUES('1112','basictips4','收到邮件说明您网站的系统邮箱设置正确。','1','159','8','0','cn');
INSERT INTO met_language VALUES('1113','basictips2','<b>解决办法：</b>联系空间商开启其中一个函数。','1','157','8','0','cn');
INSERT INTO met_language VALUES('1114','basictips1','<b>错误提示：</b>pfsockopen和fsockopen函数被禁用！','1','156','8','0','cn');
INSERT INTO met_language VALUES('1115','updaterr22','是否重试此步升级?点击‘取消’将会放弃此次升级！','1','154','8','0','cn');
INSERT INTO met_language VALUES('1116','updaterr23','API服务器验证失败，API服务器无法访问您的网站，请关闭网站引导页或暂时网站防护工具','1','155','8','0','cn');
INSERT INTO met_language VALUES('1117','updaterr21','升级出现问题！','1','153','8','0','cn');
INSERT INTO met_language VALUES('1118','updaterr20','链接不上服务器，无法完成商业会员验证！','1','152','8','0','cn');
INSERT INTO met_language VALUES('1119','updaterr18','cache文件不可写，无法完成权限验证!','1','150','8','0','cn');
INSERT INTO met_language VALUES('1120','updaterr19','权限认证失败','1','151','8','0','cn');
INSERT INTO met_language VALUES('1121','updaterr17','开始整站备份','1','149','8','0','cn');
INSERT INTO met_language VALUES('1122','updaterr16','是否进行整站备份','1','148','8','0','cn');
INSERT INTO met_language VALUES('1123','updaterr15','更新文件成功','1','147','8','0','cn');
INSERT INTO met_language VALUES('1124','updaterr14','文件复制失败。错误原因：文件没有写权限','1','146','8','0','cn');
INSERT INTO met_language VALUES('1125','updaterr9','下载文件中','1','141','8','0','cn');
INSERT INTO met_language VALUES('1126','updaterr10','下载文件完成，开始更新','1','142','8','0','cn');
INSERT INTO met_language VALUES('1127','updaterr11','数据库更新成功','1','143','8','0','cn');
INSERT INTO met_language VALUES('1128','updaterr12','数据库更新失败。错误原因：','1','144','8','0','cn');
INSERT INTO met_language VALUES('1129','updaterr13','数据库不需要更新','1','145','8','0','cn');
INSERT INTO met_language VALUES('1130','updaterr7','文件权限检测正常','1','139','8','0','cn');
INSERT INTO met_language VALUES('1131','updaterr8','更新文件列表下载失败','1','140','8','0','cn');
INSERT INTO met_language VALUES('1132','updaterr6','以下文件不可写，请登陆FTP修改权限为777或联系空间商修改','1','138','8','0','cn');
INSERT INTO met_language VALUES('1133','updaterr2','无法备份数据库','1','134','8','0','cn');
INSERT INTO met_language VALUES('1134','updaterr3','无法备整站文件','1','135','8','0','cn');
INSERT INTO met_language VALUES('1135','updaterr4','网站备份成功','1','136','8','0','cn');
INSERT INTO met_language VALUES('1136','updaterr5','已备份','1','137','8','0','cn');
INSERT INTO met_language VALUES('1137','supportnot','空间不支持在线更新，请联系空间商开启curl,fsockopen,pfsockopen函数其中之一','1','131','8','0','cn');
INSERT INTO met_language VALUES('1138','updaterr1','文件备份失败，错误原因：文件没有可写权限','1','133','8','0','cn');
INSERT INTO met_language VALUES('1139','updownerrs','文件下载失败，错误原因：','1','132','8','0','cn');
INSERT INTO met_language VALUES('1140','redownload','重新下载','1','130','8','0','cn');
INSERT INTO met_language VALUES('1141','retested','重新检测','1','129','8','0','cn');
INSERT INTO met_language VALUES('1142','cvinfo','简历信息','1','128','8','0','cn');
INSERT INTO met_language VALUES('1143','Error','错误','1','127','8','0','cn');
INSERT INTO met_language VALUES('1144','upfileFail10','不支持imagejpeg函数','1','125','8','0','cn');
INSERT INTO met_language VALUES('1145','upfileFail11','不支持imagepng函数','1','126','8','0','cn');
INSERT INTO met_language VALUES('1146','upfileFail9','不支持imagegif函数','1','124','8','0','cn');
INSERT INTO met_language VALUES('1147','upfileFail8','文件损坏,缩略图生成失败','1','123','8','0','cn');
INSERT INTO met_language VALUES('1148','upfileFail7','不支持当前文件格式生成缩略图，请上传JPG,GIF,PNG图片','1','122','8','0','cn');
INSERT INTO met_language VALUES('1149','upfileFail6','空间不支持GD库，无法生成缩略图','1','121','8','0','cn');
INSERT INTO met_language VALUES('1150','upfileFail5','bmp的格式无法自动生成缩图','1','120','8','0','cn');
INSERT INTO met_language VALUES('1151','upfileFail4','创建目录失败','1','119','8','0','cn');
INSERT INTO met_language VALUES('1152','upfileNotice','注意：','1','118','8','0','cn');
INSERT INTO met_language VALUES('1153','upfileOver4','upload文件夹没有写权限,请联系空间商修改。','1','116','8','0','cn');
INSERT INTO met_language VALUES('1154','upfileOver5','上传临时文件夹(upload_tmp_dir)没有写权限,请联系空间商修改。','1','117','8','0','cn');
INSERT INTO met_language VALUES('1155','upfileOver3','没有文件被上传。','1','115','8','0','cn');
INSERT INTO met_language VALUES('1156','upfileOver2','文件只有部分被上传。','1','114','8','0','cn');
INSERT INTO met_language VALUES('1157','upfileOK','文件上传成功','1','111','8','0','cn');
INSERT INTO met_language VALUES('1158','upfileOver','上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。','1','112','8','0','cn');
INSERT INTO met_language VALUES('1159','upfileOver1','上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。','1','113','8','0','cn');
INSERT INTO met_language VALUES('1160','upfileTip3','文件格式不允许上传。','1','110','8','0','cn');
INSERT INTO met_language VALUES('1161','upfileTip2','文件名已经存在。','1','109','8','0','cn');
INSERT INTO met_language VALUES('1162','upfileTip1','，不能上传。','1','108','8','0','cn');
INSERT INTO met_language VALUES('1163','upfileByte','字节','1','107','8','0','cn');
INSERT INTO met_language VALUES('1164','upfileFail','创建水印目录失败','1','101','8','0','cn');
INSERT INTO met_language VALUES('1165','upfileFail1','创建缩图目录失败','1','102','8','0','cn');
INSERT INTO met_language VALUES('1166','upfileFail2','创建图片目录失败','1','103','8','0','cn');
INSERT INTO met_language VALUES('1167','upfileFail3','指定的路径不可写，或者没有此路径!','1','104','8','0','cn');
INSERT INTO met_language VALUES('1168','upfileMax','大小超出系统限定值','1','106','8','0','cn');
INSERT INTO met_language VALUES('1169','upfileFile','上传文件','1','105','8','0','cn');
INSERT INTO met_language VALUES('1170','funCreate','生成文件','1','99','8','0','cn');
INSERT INTO met_language VALUES('1171','funjumpget','如果您的浏览器没有自动跳转，请点击这里','1','100','8','0','cn');
INSERT INTO met_language VALUES('1172','funFile','文件','1','98','8','0','cn');
INSERT INTO met_language VALUES('1173','funOK','成功！','1','97','8','0','cn');
INSERT INTO met_language VALUES('1174','funFail','失败！','1','96','8','0','cn');
INSERT INTO met_language VALUES('1175','funTip1','不可写，请检查其属性后重试！','1','95','8','0','cn');
INSERT INTO met_language VALUES('1176','funNav4','都显示','1','94','8','0','cn');
INSERT INTO met_language VALUES('1177','funNav3','尾部导航条','1','93','8','0','cn');
INSERT INTO met_language VALUES('1178','funNav2','头部主导航条','1','92','8','0','cn');
INSERT INTO met_language VALUES('1179','funNav1','不显示','1','91','8','0','cn');
INSERT INTO met_language VALUES('1180','adminwenjian','后台文件名数据已更新，请手动修改后台文件夹名称','1','90','8','0','cn');
INSERT INTO met_language VALUES('1181','indexmailset','发件箱设置','1','89','8','0','cn');
INSERT INTO met_language VALUES('1182','indexthanks','感谢使用','1','88','8','0','cn');
INSERT INTO met_language VALUES('1183','indexpeople','的个人资料','1','87','8','0','cn');
INSERT INTO met_language VALUES('1184','indexnarrowver2','切换到窄版','1','86','8','0','cn');
INSERT INTO met_language VALUES('1185','indexnarrowver1','窄版','1','85','8','0','cn');
INSERT INTO met_language VALUES('1186','indexwidever2','切换到宽版','1','84','8','0','cn');
INSERT INTO met_language VALUES('1187','indexwidever1','宽版','1','83','8','0','cn');
INSERT INTO met_language VALUES('1188','indexperson','个人资料','1','82','8','0','cn');
INSERT INTO met_language VALUES('1189','indexadminattay','管理员组管理','1','81','8','0','cn');
INSERT INTO met_language VALUES('1190','indexadminname','管理员管理','1','80','8','0','cn');
INSERT INTO met_language VALUES('1191','indexfeedbackm','反馈信息管理','1','79','8','0','cn');
INSERT INTO met_language VALUES('1192','indexlink','友情链接','1','78','8','0','cn');
INSERT INTO met_language VALUES('1193','indexwebcount','访问统计','1','77','8','0','cn');
INSERT INTO met_language VALUES('1194','indexPhysical','网站体检','1','76','8','0','cn');
INSERT INTO met_language VALUES('1195','indexwap','WAP功能（商业版）','1','75','8','0','cn');
INSERT INTO met_language VALUES('1196','indexhtm','静态页面生成','1','74','8','0','cn');
INSERT INTO met_language VALUES('1197','indexhtmset','静态页面','1','73','8','0','cn');
INSERT INTO met_language VALUES('1198','indexhot','热门标签','1','72','8','0','cn');
INSERT INTO met_language VALUES('1199','indexseoset','SEO参数','1','71','8','0','cn');
INSERT INTO met_language VALUES('1200','indexcv','简历参数配置','1','70','8','0','cn');
INSERT INTO met_language VALUES('1201','indexflashset','Banner设置','1','66','8','0','cn');
INSERT INTO met_language VALUES('1202','indexflash','Banner 管理','1','67','8','0','cn');
INSERT INTO met_language VALUES('1203','indexonlineset','在线客服','1','68','8','0','cn');
INSERT INTO met_language VALUES('1204','indexonline','客服列表','1','69','8','0','cn');
INSERT INTO met_language VALUES('1205','indexhomeset','首页设置','1','65','8','0','cn');
INSERT INTO met_language VALUES('1206','indexpic','图片水印','1','64','8','0','cn');
INSERT INTO met_language VALUES('1207','indexbbs','技术支持','1','63','8','0','cn');
INSERT INTO met_language VALUES('1208','indexebook','使用手册','1','62','8','0','cn');
INSERT INTO met_language VALUES('1209','indexupload','上传文件管理','1','59','8','0','cn');
INSERT INTO met_language VALUES('1210','indexskinset','模板配置教程','1','60','8','0','cn');
INSERT INTO met_language VALUES('1211','indexcode','商业授权','1','61','8','0','cn');
INSERT INTO met_language VALUES('1212','indexsafe','网站安全','1','58','8','0','cn');
INSERT INTO met_language VALUES('1213','indexdataback','数据备份','1','57','8','0','cn');
INSERT INTO met_language VALUES('1214','indexotherinfo','其他内容','1','56','8','0','cn');
INSERT INTO met_language VALUES('1215','indexfoot','底部信息','1','55','8','0','cn');
INSERT INTO met_language VALUES('1216','indexlang','语言设置','1','54','8','0','cn');
INSERT INTO met_language VALUES('1217','indexbasicinfo','基本设置','1','53','8','0','cn');
INSERT INTO met_language VALUES('1218','indexloginout','退出','1','51','8','0','cn');
INSERT INTO met_language VALUES('1219','indexsysteminfo','系统信息','1','52','8','0','cn');
INSERT INTO met_language VALUES('1220','indexhome','网站首页','1','49','8','0','cn');
INSERT INTO met_language VALUES('1221','indexadmin','常用功能','1','50','8','0','cn');
INSERT INTO met_language VALUES('1222','indexwelcom','您好','1','48','8','0','cn');
INSERT INTO met_language VALUES('1223','indexuser','用户管理','1','47','8','0','cn');
INSERT INTO met_language VALUES('1224','indexseo','优化推广','1','45','8','0','cn');
INSERT INTO met_language VALUES('1225','indexapp','企业应用','1','46','8','0','cn');
INSERT INTO met_language VALUES('1226','indexcontent','内容管理','1','44','8','0','cn');
INSERT INTO met_language VALUES('1227','indexcolumn','栏目设置','1','43','8','0','cn');
INSERT INTO met_language VALUES('1228','indexskin','界面风格','1','42','8','0','cn');
INSERT INTO met_language VALUES('1229','indexbasic','网站设置','1','41','8','0','cn');
INSERT INTO met_language VALUES('1230','loginalllang','你没有管理此种语言内容的权限，请联系管理员开通','1','40','8','0','cn');
INSERT INTO met_language VALUES('1231','loginall','你没有添加、修改、删除信息的权限，请联系管理员开通','1','39','8','0','cn');
INSERT INTO met_language VALUES('1232','loginedit','你没有修改信息的权限，请联系管理员开通','1','38','8','0','cn');
INSERT INTO met_language VALUES('1233','loginadd','你没有添加信息的权限，请联系管理员开通','1','37','8','0','cn');
INSERT INTO met_language VALUES('1234','logindelete','你没有删除信息的权限，请联系管理员开通','1','36','8','0','cn');
INSERT INTO met_language VALUES('1235','loginpass','用户名或密码错误','1','35','8','0','cn');
INSERT INTO met_language VALUES('1236','loginname','用户名或密码错误','1','34','8','0','cn');
INSERT INTO met_language VALUES('1237','logincodeerror','验证码错误','1','33','8','0','cn');
INSERT INTO met_language VALUES('1238','loginconfirm','登录','1','32','8','0','cn');
INSERT INTO met_language VALUES('1239','loginforget','忘记密码?','1','31','8','0','cn');
INSERT INTO met_language VALUES('1240','logincodechange','点击刷新验证码','1','30','8','0','cn');
INSERT INTO met_language VALUES('1241','loginusename','用户名','1','27','8','0','cn');
INSERT INTO met_language VALUES('1242','loginpassword','密码','1','28','8','0','cn');
INSERT INTO met_language VALUES('1243','logincode','验证码','1','29','8','0','cn');
INSERT INTO met_language VALUES('1244','loginlanguage','后台语言','1','26','8','0','cn');
INSERT INTO met_language VALUES('1245','loginmetinfo','MetInfo','1','25','8','0','cn');
INSERT INTO met_language VALUES('1246','loginadmin','管理员登录','1','24','8','0','cn');
INSERT INTO met_language VALUES('1247','logintitle','后台登录','1','21','8','0','cn');
INSERT INTO met_language VALUES('1248','loginid','用户名不能为空','1','22','8','0','cn');
INSERT INTO met_language VALUES('1249','loginps','密码不能为空','1','23','8','0','cn');
INSERT INTO met_language VALUES('1250','myapp','我的应用','1','20','8','0','cn');
INSERT INTO met_language VALUES('1251','webnanny','网站保姆','1','19','8','0','cn');
INSERT INTO met_language VALUES('1252','smsfuc','短信功能','1','18','8','0','cn');
INSERT INTO met_language VALUES('1253','recycle','内容回收站','1','17','8','0','cn');
INSERT INTO met_language VALUES('1254','field','字段','1','15','8','0','cn');
INSERT INTO met_language VALUES('1255','bulkopr','批量操作','1','16','8','0','cn');
INSERT INTO met_language VALUES('1256','contsting','内容页设置','1','14','8','0','cn');
INSERT INTO met_language VALUES('1257','managertyp5','自定义','1','10','8','0','cn');
INSERT INTO met_language VALUES('1258','pagesting','列表页设置','1','13','8','0','cn');
INSERT INTO met_language VALUES('1259','Universal','通用设置','1','12','8','0','cn');
INSERT INTO met_language VALUES('1260','temstyle','模板管理','1','11','8','0','cn');
INSERT INTO met_language VALUES('1261','managertyp4','内容管理员','1','9','8','0','cn');
INSERT INTO met_language VALUES('1262','managertyp2','管理员','1','7','8','0','cn');
INSERT INTO met_language VALUES('1263','managertyp3','优化推广员','1','8','8','0','cn');
INSERT INTO met_language VALUES('1264','managertyp1','创始人','1','6','8','0','cn');
INSERT INTO met_language VALUES('1265','uplaoderr3','请上传sql后缀文件或zip后缀文件！','1','5','8','0','cn');
INSERT INTO met_language VALUES('1266','filenomor','文件未上传或不存在','1','2','8','0','cn');
INSERT INTO met_language VALUES('1267','uplaoderr1','上传失败！','1','3','8','0','cn');
INSERT INTO met_language VALUES('1268','uplaoderr2','请上传zip文件！','1','4','8','0','cn');
INSERT INTO met_language VALUES('1269','clickview','点击查看','1','1','8','0','cn');
INSERT INTO met_language VALUES('1270','otherfields','其它字段','1','8','0','0','cn');
INSERT INTO met_language VALUES('1271','modifyadminidtips','当创始人账号为admin时，您拥有一次机会，可以修改创始人名称。','1','109','7','0','cn');
INSERT INTO met_language VALUES('1272','modifyadminidto','修改为','1','108','7','0','cn');
INSERT INTO met_language VALUES('1273','modifyadminid','修改用户名','1','107','7','0','cn');
INSERT INTO met_language VALUES('1274','membertips1','注册时间','1','105','7','0','cn');
INSERT INTO met_language VALUES('1275','memberdelactive','清空未激活会员','1','106','7','0','cn');
INSERT INTO met_language VALUES('1276','memberaddarray','添加会员组','1','103','7','0','cn');
INSERT INTO met_language VALUES('1277','memberaddarraytips1','值越大，阅读权限越大。','1','104','7','0','cn');
INSERT INTO met_language VALUES('1278','memberall','显示所有','1','102','7','0','cn');
INSERT INTO met_language VALUES('1279','memberjstxt5','阅读权限必须是1~255之间任意整数','1','98','7','0','cn');
INSERT INTO met_language VALUES('1280','memberarayname','会员组名','1','100','7','0','cn');
INSERT INTO met_language VALUES('1281','memberpermission','阅读权限','1','101','7','0','cn');
INSERT INTO met_language VALUES('1282','memberwebpower','阅读权限不能重复','1','99','7','0','cn');
INSERT INTO met_language VALUES('1283','memberjstxt1','请输入确认密码！','1','94','7','0','cn');
INSERT INTO met_language VALUES('1284','memberjstxt4','会员组名称不能为空','1','97','7','0','cn');
INSERT INTO met_language VALUES('1285','memberjstxt3','两次密码输入不一致！','1','96','7','0','cn');
INSERT INTO met_language VALUES('1286','memberjstxt2','请输入登录密码！','1','95','7','0','cn');
INSERT INTO met_language VALUES('1287','membereditorTitle','修改会员信息','1','93','7','0','cn');
INSERT INTO met_language VALUES('1288','memberCheck','是否激活','1','92','7','0','cn');
INSERT INTO met_language VALUES('1289','memberCompanyWebsite','公司网址','1','91','7','0','cn');
INSERT INTO met_language VALUES('1290','memberCompanyAddress','公司联系地址','1','90','7','0','cn');
INSERT INTO met_language VALUES('1291','memberCompanyCode','公司邮政编码','1','89','7','0','cn');
INSERT INTO met_language VALUES('1292','memberCompanyFax','公司传真','1','88','7','0','cn');
INSERT INTO met_language VALUES('1293','memberCompanyName','公司名称','1','87','7','0','cn');
INSERT INTO met_language VALUES('1294','memberIntro','会员简介','1','86','7','0','cn');
INSERT INTO met_language VALUES('1295','memberSex','性别','1','80','7','0','cn');
INSERT INTO met_language VALUES('1296','memberMan','先生','1','81','7','0','cn');
INSERT INTO met_language VALUES('1297','memberWoman','女士','1','82','7','0','cn');
INSERT INTO met_language VALUES('1298','memberTel','联系电话','1','83','7','0','cn');
INSERT INTO met_language VALUES('1299','memberCell','手机','1','84','7','0','cn');
INSERT INTO met_language VALUES('1300','memberTaoBao','淘宝','1','85','7','0','cn');
INSERT INTO met_language VALUES('1301','memberPs1','密码确认','1','79','7','0','cn');
INSERT INTO met_language VALUES('1302','memberTip','不修改请留空','1','78','7','0','cn');
INSERT INTO met_language VALUES('1303','memberPs','登录密码','1','77','7','0','cn');
INSERT INTO met_language VALUES('1304','memberName','姓名','1','76','7','0','cn');
INSERT INTO met_language VALUES('1305','memberSearch','用户名查询','1','75','7','0','cn');
INSERT INTO met_language VALUES('1306','memberFD','反馈','1','73','7','0','cn');
INSERT INTO met_language VALUES('1307','memberCV','简历','1','74','7','0','cn');
INSERT INTO met_language VALUES('1308','memberMessage','留言','1','72','7','0','cn');
INSERT INTO met_language VALUES('1309','memberDetail','详细','1','71','7','0','cn');
INSERT INTO met_language VALUES('1310','memberLastLogin','最后登录时间','1','70','7','0','cn');
INSERT INTO met_language VALUES('1311','memberActive','激活','1','68','7','0','cn');
INSERT INTO met_language VALUES('1312','memberNum','登录次数','1','69','7','0','cn');
INSERT INTO met_language VALUES('1313','memberEmail','邮箱地址','1','67','7','0','cn');
INSERT INTO met_language VALUES('1314','memberUserName','用户名','1','66','7','0','cn');
INSERT INTO met_language VALUES('1315','memberSelectType','选择类型','1','65','7','0','cn');
INSERT INTO met_language VALUES('1316','memberType','会员类型','1','64','7','0','cn');
INSERT INTO met_language VALUES('1317','memberalllang','所有语言中的会员','1','63','7','0','cn');
INSERT INTO met_language VALUES('1318','memberAdd','添加会员','1','62','7','0','cn');
INSERT INTO met_language VALUES('1319','memberChecked','已激活','1','60','7','0','cn');
INSERT INTO met_language VALUES('1320','memberUnChecked','未激活','1','61','7','0','cn');
INSERT INTO met_language VALUES('1321','memberarrayManage','会员组管理','1','59','7','0','cn');
INSERT INTO met_language VALUES('1322','memberManage','会员管理','1','58','7','0','cn');
INSERT INTO met_language VALUES('1323','memberforceinfo','使用带密钥的地址便可以浏览所有信息，如：','1','57','7','0','cn');
INSERT INTO met_language VALUES('1324','memberforce','强制浏览密钥','1','56','7','0','cn');
INSERT INTO met_language VALUES('1325','membercontrol','会员控制面板公告','1','55','7','0','cn');
INSERT INTO met_language VALUES('1326','memberregisteremail','注册激活邮件','1','54','7','0','cn');
INSERT INTO met_language VALUES('1327','memberloginok4','开启但需要管理员后台验证','1','53','7','0','cn');
INSERT INTO met_language VALUES('1328','memberloginok3','开启但需要邮件验证','1','52','7','0','cn');
INSERT INTO met_language VALUES('1329','memberlogin','会员注册','1','51','7','0','cn');
INSERT INTO met_language VALUES('1330','memberuse','会员功能','1','49','7','0','cn');
INSERT INTO met_language VALUES('1331','memberuseok2','开启会员功能','1','50','7','0','cn');
INSERT INTO met_language VALUES('1332','hello','您好！','1','47','7','0','cn');
INSERT INTO met_language VALUES('1333','memberset','会员功能配置','1','48','7','0','cn');
INSERT INTO met_language VALUES('1334','getTip5','找回密码','1','45','7','0','cn');
INSERT INTO met_language VALUES('1335','getOK','发送成功','1','46','7','0','cn');
INSERT INTO met_language VALUES('1336','getTip4','您提交的找回密码未能成功！可能是邮箱服务器设置不正确，请通过其它方式找回密码','1','44','7','0','cn');
INSERT INTO met_language VALUES('1337','getTip3','创建新密码链接的电子邮件已经发送到您的邮箱，请尽快修改您的密码。','1','43','7','0','cn');
INSERT INTO met_language VALUES('1338','getTip2','感谢您对MetInfo的支持与厚爱，希望MetInfo能为您的网站创造价值！','1','42','7','0','cn');
INSERT INTO met_language VALUES('1339','getTip1','您的密码重置请求已经得到验证。请点击以下链接输入您的新密码：','1','41','7','0','cn');
INSERT INTO met_language VALUES('1340','getNotice','管理员密码找回','1','40','7','0','cn');
INSERT INTO met_language VALUES('1341','adminpassTitle','修改个人信息','1','39','7','0','cn');
INSERT INTO met_language VALUES('1342','adminBackup','返回','1','38','7','0','cn');
INSERT INTO met_language VALUES('1343','adminSelectAll','全部选择','1','37','7','0','cn');
INSERT INTO met_language VALUES('1344','adminOperate4','删除信息','1','35','7','0','cn');
INSERT INTO met_language VALUES('1345','adminColumn','栏目权限','1','36','7','0','cn');
INSERT INTO met_language VALUES('1346','adminOperate3','修改信息','1','34','7','0','cn');
INSERT INTO met_language VALUES('1347','adminOperate1','完全控制','1','32','7','0','cn');
INSERT INTO met_language VALUES('1348','adminOperate2','添加信息','1','33','7','0','cn');
INSERT INTO met_language VALUES('1349','adminPower','信息权限','1','29','7','0','cn');
INSERT INTO met_language VALUES('1350','adminTip2','只允许查看自己发表的信息','1','30','7','0','cn');
INSERT INTO met_language VALUES('1351','adminOperate','操作权限','1','31','7','0','cn');
INSERT INTO met_language VALUES('1352','adminlang','全选','1','28','7','0','cn');
INSERT INTO met_language VALUES('1353','adminTaoBao','淘宝','1','26','7','0','cn');
INSERT INTO met_language VALUES('1354','adminIntro','管理员简介','1','27','7','0','cn');
INSERT INTO met_language VALUES('1355','adminMan','先生','1','23','7','0','cn');
INSERT INTO met_language VALUES('1356','adminWoman','女士','1','24','7','0','cn');
INSERT INTO met_language VALUES('1357','adminTip1','用于取回账号密码','1','25','7','0','cn');
INSERT INTO met_language VALUES('1358','adminSex','性别','1','22','7','0','cn');
INSERT INTO met_language VALUES('1359','adminpassword1','密码确认','1','21','7','0','cn');
INSERT INTO met_language VALUES('1360','adminpassword','登录密码','1','20','7','0','cn');
INSERT INTO met_language VALUES('1361','adminLastLogin','最后登录时间','1','18','7','0','cn');
INSERT INTO met_language VALUES('1362','adminLastIP','最后登录IP','1','19','7','0','cn');
INSERT INTO met_language VALUES('1363','metadmin','管理员','1','12','7','0','cn');
INSERT INTO met_language VALUES('1364','adminusername','用户名','1','13','7','0','cn');
INSERT INTO met_language VALUES('1365','adminname','姓名','1','14','7','0','cn');
INSERT INTO met_language VALUES('1366','admintel','电话','1','15','7','0','cn');
INSERT INTO met_language VALUES('1367','adminmobile','手机','1','16','7','0','cn');
INSERT INTO met_language VALUES('1368','adminLoginNum','登录次数','1','17','7','0','cn');
INSERT INTO met_language VALUES('1369','admintips7','管理员权限设置','1','11','7','0','cn');
INSERT INTO met_language VALUES('1370','adminjurisd','语言权限','1','5','7','0','cn');
INSERT INTO met_language VALUES('1371','admintips1','所有语言','1','6','7','0','cn');
INSERT INTO met_language VALUES('1372','admintips2','至少选择一个','1','7','7','0','cn');
INSERT INTO met_language VALUES('1373','admintips3','取消之后其他用户新增的网站栏目该用户将没有管理权限','1','8','7','0','cn');
INSERT INTO met_language VALUES('1374','admintips5','用户组','1','10','7','0','cn');
INSERT INTO met_language VALUES('1375','admintips4','新增栏目权限','1','9','7','0','cn');
INSERT INTO met_language VALUES('1376','webcompre','整站压缩包','1','3','7','0','cn');
INSERT INTO met_language VALUES('1377','admininfo','管理员基本信息','1','4','7','0','cn');
INSERT INTO met_language VALUES('1378','uploadfile','上传文件夹','1','2','7','0','cn');
INSERT INTO met_language VALUES('1379','usermanagement','用户管理','1','7','0','0','cn');
INSERT INTO met_language VALUES('1380','database','数据库','1','1','7','0','cn');
INSERT INTO met_language VALUES('1381','map_contents','公司地址','1','357','6','0','cn');
INSERT INTO met_language VALUES('1382','map_input','输入地址查询','1','355','6','0','cn');
INSERT INTO met_language VALUES('1383','map_title','公司名称','1','356','6','0','cn');
INSERT INTO met_language VALUES('1384','smstips89','获取短信密钥失败，无法连接服务器！','1','354','6','0','cn');
INSERT INTO met_language VALUES('1385','nursetips39','友链提醒','1','347','6','0','cn');
INSERT INTO met_language VALUES('1386','nursetips40','每日提醒次数','1','348','6','0','cn');
INSERT INTO met_language VALUES('1387','nursetips41','次','1','349','6','0','cn');
INSERT INTO met_language VALUES('1388','nursetips42','达到上限后将停止短信提醒','1','350','6','0','cn');
INSERT INTO met_language VALUES('1389','smstips86','数据已经更新，3秒后刷新后台！','1','351','6','0','cn');
INSERT INTO met_language VALUES('1390','smstips87','获取短信密钥中，请勿刷新页面！','1','352','6','0','cn');
INSERT INTO met_language VALUES('1391','smstips88','获取短信密钥成功','1','353','6','0','cn');
INSERT INTO met_language VALUES('1392','nursetips37','简历提醒','1','345','6','0','cn');
INSERT INTO met_language VALUES('1393','nursetips38','每当有访客提交友情链接申请，系统将会发送一条含对方网址和网站名称的短信到您的手机','1','346','6','0','cn');
INSERT INTO met_language VALUES('1394','nursetips35','留言提醒','1','343','6','0','cn');
INSERT INTO met_language VALUES('1395','nursetips36','每当有访客提交简历，系统将会发送一条含投递职位和应聘者姓名的短信到您的手机','1','344','6','0','cn');
INSERT INTO met_language VALUES('1396','nursetips33','反馈提醒','1','341','6','0','cn');
INSERT INTO met_language VALUES('1397','nursetips34','每当有访客提交留言，系统将会发送一条含留言内容(前10个字符)的短信到您的手机','1','342','6','0','cn');
INSERT INTO met_language VALUES('1398','nursetips32','每当有访客提交反馈信息，系统会发送一条含反馈标题的短信到您的手机','1','340','6','0','cn');
INSERT INTO met_language VALUES('1399','nursetips31','注册提醒','1','339','6','0','cn');
INSERT INTO met_language VALUES('1400','nursetips30','每当有访客注册会员，系统会发送一条短信到您的手机','1','338','6','0','cn');
INSERT INTO met_language VALUES('1401','nursetips29x','只在指定时间段内监测','1','337','6','0','cn');
INSERT INTO met_language VALUES('1402','nursetips29','只在指定星期段内随机时间段监测','1','336','6','0','cn');
INSERT INTO met_language VALUES('1403','nursetips28','星期日','1','335','6','0','cn');
INSERT INTO met_language VALUES('1404','nursetips27x','星期日','1','334','6','0','cn');
INSERT INTO met_language VALUES('1405','nursetips24','星期三','1','330','6','0','cn');
INSERT INTO met_language VALUES('1406','nursetips25','星期四','1','331','6','0','cn');
INSERT INTO met_language VALUES('1407','nursetips26','星期五','1','332','6','0','cn');
INSERT INTO met_language VALUES('1408','nursetips27','星期六','1','333','6','0','cn');
INSERT INTO met_language VALUES('1409','nursetips23','星期二','1','329','6','0','cn');
INSERT INTO met_language VALUES('1410','nursetips19','指定时间段监测一次','1','325','6','0','cn');
INSERT INTO met_language VALUES('1411','nursetips20','时间段','1','326','6','0','cn');
INSERT INTO met_language VALUES('1412','nursetips21','每月随机时间段检测','1','327','6','0','cn');
INSERT INTO met_language VALUES('1413','nursetips22','星期一','1','328','6','0','cn');
INSERT INTO met_language VALUES('1414','nursetips12','访问监测','1','318','6','0','cn');
INSERT INTO met_language VALUES('1415','nursetips13','监测网址','1','319','6','0','cn');
INSERT INTO met_language VALUES('1416','nursetips14','监测频率','1','320','6','0','cn');
INSERT INTO met_language VALUES('1417','nursetips15','每小时一次','1','321','6','0','cn');
INSERT INTO met_language VALUES('1418','nursetips16','每天一次','1','322','6','0','cn');
INSERT INTO met_language VALUES('1419','nursetips17','每周一次','1','323','6','0','cn');
INSERT INTO met_language VALUES('1420','nursetips18','每月一次','1','324','6','0','cn');
INSERT INTO met_language VALUES('1421','nursetips10','接收短信提醒的手机号码，多个请换行','1','316','6','0','cn');
INSERT INTO met_language VALUES('1422','nursetips11','指定时间监测您网站能否正常访问，如不能正常访问，则发送一条监测报告到您的手机','1','317','6','0','cn');
INSERT INTO met_language VALUES('1423','nursetips8','报告发送时间','1','314','6','0','cn');
INSERT INTO met_language VALUES('1424','nursetips9','接收号码','1','315','6','0','cn');
INSERT INTO met_language VALUES('1425','nursetips7','请确认网址！在系统设置-基本信息-网站地址修改','1','313','6','0','cn');
INSERT INTO met_language VALUES('1426','nursetips5','流量统计报告','1','311','6','0','cn');
INSERT INTO met_language VALUES('1427','nursetips6','统计网址','1','312','6','0','cn');
INSERT INTO met_language VALUES('1428','nursetips3','访客操作提醒','1','309','6','0','cn');
INSERT INTO met_language VALUES('1429','nursetips4','每天指定时间发送昨日的流量统计报告到您的手机','1','310','6','0','cn');
INSERT INTO met_language VALUES('1430','nursetips2','访问故障监测','1','308','6','0','cn');
INSERT INTO met_language VALUES('1431','nursetips1','流量统计保告','1','307','6','0','cn');
INSERT INTO met_language VALUES('1432','dlapptips17','可进行网站体检、查杀木马、文件校对，建议定期使用','1','305','6','0','cn');
INSERT INTO met_language VALUES('1433','dlapptips18','可以管理注册的会员、设置会员组以及阅读权限、其它相关设置等','1','306','6','0','cn');
INSERT INTO met_language VALUES('1434','dlapptips15','原版本名为在线交流，漂浮的在线即时交流工具，可添加QQ、旺旺、MSN、SKYPE等','1','303','6','0','cn');
INSERT INTO met_language VALUES('1435','dlapptips16','可以管理后台上传的文件','1','304','6','0','cn');
INSERT INTO met_language VALUES('1436','dlapptips14','原为FLASH设置，可用于上传或设置网站页面的大图轮播（一般位于导航下方）','1','302','6','0','cn');
INSERT INTO met_language VALUES('1437','dlapptips13','用于监听网站状态，可以利用短信功能将网站实时状况发送到指定手机号码','1','301','6','0','cn');
INSERT INTO met_language VALUES('1438','dlapptips12','可以用于批量发送、查看发送记录、流水账，以及充值短信费用','1','300','6','0','cn');
INSERT INTO met_language VALUES('1439','dlapptips6','卸载','1','294','6','0','cn');
INSERT INTO met_language VALUES('1440','dlapptips7','尊敬的','1','295','6','0','cn');
INSERT INTO met_language VALUES('1441','dlapptips8','您当前为：','1','296','6','0','cn');
INSERT INTO met_language VALUES('1442','dlapptips9','用户使用','1','297','6','0','cn');
INSERT INTO met_language VALUES('1443','dlapptips10','仅限','1','298','6','0','cn');
INSERT INTO met_language VALUES('1444','dlapptips11','用于网站在移动终端展示的功能<br/>商业版WAP功能更全面，页面展示更绚丽。<a href=http://www.metinfo.cn/web/wap.htm target=_blank class=red>详情请看</a>','1','299','6','0','cn');
INSERT INTO met_language VALUES('1445','dlapptips2','官方商城','1','290','6','0','cn');
INSERT INTO met_language VALUES('1446','dlapptips3','说明：','1','291','6','0','cn');
INSERT INTO met_language VALUES('1447','dlapptips4','版本：','1','292','6','0','cn');
INSERT INTO met_language VALUES('1448','dlapptips5','打开','1','293','6','0','cn');
INSERT INTO met_language VALUES('1449','mobiletips6','查看图片','1','287','6','0','cn');
INSERT INTO met_language VALUES('1450','mobiletips7','次','1','288','6','0','cn');
INSERT INTO met_language VALUES('1451','dlapptips1','已安装应用','1','289','6','0','cn');
INSERT INTO met_language VALUES('1452','mobiletips5','没有添加相关模块的栏目','1','286','6','0','cn');
INSERT INTO met_language VALUES('1453','mobiletips2','没有开启或添加相关功能版块','1','283','6','0','cn');
INSERT INTO met_language VALUES('1454','mobiletips3','添加内容','1','284','6','0','cn');
INSERT INTO met_language VALUES('1455','mobiletips4','请填写标题','1','285','6','0','cn');
INSERT INTO met_language VALUES('1456','mobiletips1','您的浏览器没有开启javascript支持，开启后才能进行相应的后台操作。','1','282','6','0','cn');
INSERT INTO met_language VALUES('1457','waptips6','隐藏','1','278','6','0','cn');
INSERT INTO met_language VALUES('1458','waptips7','开启静态页面仅智能机支持自动跳转，建议使用伪静态','1','279','6','0','cn');
INSERT INTO met_language VALUES('1459','waptips9','为空将显示网站LOGO','1','281','6','0','cn');
INSERT INTO met_language VALUES('1460','waptips8','指定域名','1','280','6','0','cn');
INSERT INTO met_language VALUES('1461','waptips5','显示','1','277','6','0','cn');
INSERT INTO met_language VALUES('1462','waptips3','为空将显示网站首页标题','1','275','6','0','cn');
INSERT INTO met_language VALUES('1463','waptips4','为空将显示网站简短描述','1','276','6','0','cn');
INSERT INTO met_language VALUES('1464','waptips1','Wap设置','1','273','6','0','cn');
INSERT INTO met_language VALUES('1465','waptips2','设置Wap内容页展示图片尺寸','1','274','6','0','cn');
INSERT INTO met_language VALUES('1466','smstips95','错误原因：','1','272','6','0','cn');
INSERT INTO met_language VALUES('1467','smstips94','当前短信发送价格和服务器设定价格不一致，点击<a href=\'\'>此处</a>刷新页面，重新获取发送价格','1','271','6','0','cn');
INSERT INTO met_language VALUES('1468','smstips92','联系','1','269','6','0','cn');
INSERT INTO met_language VALUES('1469','smstips93','开通','1','270','6','0','cn');
INSERT INTO met_language VALUES('1470','smstips91','及时查收余额','1','268','6','0','cn');
INSERT INTO met_language VALUES('1471','smstips84','立即兑换','1','266','6','0','cn');
INSERT INTO met_language VALUES('1472','smstips90','请注册充值后，','1','267','6','0','cn');
INSERT INTO met_language VALUES('1473','smstips83','优惠劵使用说明','1','265','6','0','cn');
INSERT INTO met_language VALUES('1474','smstips82','使用成功','1','264','6','0','cn');
INSERT INTO met_language VALUES('1475','smstips81','超过使用时间','1','263','6','0','cn');
INSERT INTO met_language VALUES('1476','smstips80','此劵已经使用','1','262','6','0','cn');
INSERT INTO met_language VALUES('1477','smstips79','无此优惠劵','1','261','6','0','cn');
INSERT INTO met_language VALUES('1478','smstips78','优惠劵','1','260','6','0','cn');
INSERT INTO met_language VALUES('1479','smstips85','从官网获取数据中，请误刷新页面','1','259','6','0','cn');
INSERT INTO met_language VALUES('1480','smstips76','服务器无响应','1','257','6','0','cn');
INSERT INTO met_language VALUES('1481','smstips77','无法连接短信发送服务器，请网站体检！','1','258','6','0','cn');
INSERT INTO met_language VALUES('1482','smstips74','发送密码错误','1','255','6','0','cn');
INSERT INTO met_language VALUES('1483','smstips75','网站无法访问','1','256','6','0','cn');
INSERT INTO met_language VALUES('1484','smstips73','短信内容和手机号码不能为空','1','254','6','0','cn');
INSERT INTO met_language VALUES('1485','smstips72','余额不足','1','253','6','0','cn');
INSERT INTO met_language VALUES('1486','smstips71','异常操作，余额不足','1','252','6','0','cn');
INSERT INTO met_language VALUES('1487','smstips70','发送成功(有延迟)','1','251','6','0','cn');
INSERT INTO met_language VALUES('1488','smstips69','号码不符合规则','1','250','6','0','cn');
INSERT INTO met_language VALUES('1489','smstips68','手机号码太多，最多800个号码','1','249','6','0','cn');
INSERT INTO met_language VALUES('1490','smstips67','短信内容太长，最多350个字','1','248','6','0','cn');
INSERT INTO met_language VALUES('1491','smstips66','余额不足','1','247','6','0','cn');
INSERT INTO met_language VALUES('1492','smstips65','操作','1','246','6','0','cn');
INSERT INTO met_language VALUES('1493','smstips64','状态','1','245','6','0','cn');
INSERT INTO met_language VALUES('1494','smstips63','对方号码','1','244','6','0','cn');
INSERT INTO met_language VALUES('1495','smstips62','短信内容','1','243','6','0','cn');
INSERT INTO met_language VALUES('1496','smstips61','密码找回','1','242','6','0','cn');
INSERT INTO met_language VALUES('1497','smstips60','访客操作提醒','1','241','6','0','cn');
INSERT INTO met_language VALUES('1498','smstips55','发送时间','1','236','6','0','cn');
INSERT INTO met_language VALUES('1499','smstips59','访问故障监测','1','240','6','0','cn');
INSERT INTO met_language VALUES('1500','smstips57','批量发送','1','238','6','0','cn');
INSERT INTO met_language VALUES('1501','smstips58','流量统计报告','1','239','6','0','cn');
INSERT INTO met_language VALUES('1502','smstips56','发送类型','1','237','6','0','cn');
INSERT INTO met_language VALUES('1503','smstips52','正在发送...','1','233','6','0','cn');
INSERT INTO met_language VALUES('1504','smstips53','您确定清空所有发送记录吗？','1','234','6','0','cn');
INSERT INTO met_language VALUES('1505','smstips54','短信内容或手机号码','1','235','6','0','cn');
INSERT INTO met_language VALUES('1506','smstips44','修改发送密码','1','225','6','0','cn');
INSERT INTO met_language VALUES('1507','smstips45','费用预计','1','226','6','0','cn');
INSERT INTO met_language VALUES('1508','smstips46','元每条，共发送','1','227','6','0','cn');
INSERT INTO met_language VALUES('1509','smstips47','条','1','228','6','0','cn');
INSERT INTO met_language VALUES('1510','smstips48','发送','1','229','6','0','cn');
INSERT INTO met_language VALUES('1511','smstips49','发送成功后需等待片刻才能收到短信','1','230','6','0','cn');
INSERT INTO met_language VALUES('1512','smstips50','正在获取...','1','231','6','0','cn');
INSERT INTO met_language VALUES('1513','smstips51','暂无','1','232','6','0','cn');
INSERT INTO met_language VALUES('1514','smstips43','发送密码','1','224','6','0','cn');
INSERT INTO met_language VALUES('1515','smstips41','获取已激活会员手机号码','1','222','6','0','cn');
INSERT INTO met_language VALUES('1516','smstips42','去除重复号码','1','223','6','0','cn');
INSERT INTO met_language VALUES('1517','smstips40','个号码','1','221','6','0','cn');
INSERT INTO met_language VALUES('1518','smstips36','个字','1','217','6','0','cn');
INSERT INTO met_language VALUES('1519','smstips37','共','1','218','6','0','cn');
INSERT INTO met_language VALUES('1520','smstips38','条短信','1','219','6','0','cn');
INSERT INTO met_language VALUES('1521','smstips39','请填写接收短信的手机号码<br/>多个手机号码请换行<br/>一次不超过800个手机号码<br/>当前共','1','220','6','0','cn');
INSERT INTO met_language VALUES('1522','smstips33','短信内容','1','214','6','0','cn');
INSERT INTO met_language VALUES('1523','smstips34','中文/英文第一条66个字，第二条起64个字<br/>超过字数算将切分为多条短信','1','215','6','0','cn');
INSERT INTO met_language VALUES('1524','smstips35','当前字数：','1','216','6','0','cn');
INSERT INTO met_language VALUES('1525','smstips32','建议在短信结尾加上如 【某某公司】 的字样（两边的框也需要），否则有可能接收不到。','1','213','6','0','cn');
INSERT INTO met_language VALUES('1526','smstips31','短信内容有非法关键词可能会被拦截，费用无法退回，所以建议先给2、3个手机号码试发一次。','1','212','6','0','cn');
INSERT INTO met_language VALUES('1527','smstips29','至少6位','1','211','6','0','cn');
INSERT INTO met_language VALUES('1528','smstips28','新发送密码','1','210','6','0','cn');
INSERT INTO met_language VALUES('1529','smstips21','发生金额','1','203','6','0','cn');
INSERT INTO met_language VALUES('1530','smstips26','服务密码','1','208','6','0','cn');
INSERT INTO met_language VALUES('1531','smstips27','服务密码是第一次充值时由系统自动生成并发送到您邮箱的不可更改密码','1','209','6','0','cn');
INSERT INTO met_language VALUES('1532','smstips25','修改服务密码','1','207','6','0','cn');
INSERT INTO met_language VALUES('1533','smstips23','操作事由','1','205','6','0','cn');
INSERT INTO met_language VALUES('1534','smstips24','操作时间','1','206','6','0','cn');
INSERT INTO met_language VALUES('1535','smstips22','账户余额','1','204','6','0','cn');
INSERT INTO met_language VALUES('1536','smstips18','操作类型','1','200','6','0','cn');
INSERT INTO met_language VALUES('1537','smstips19','充值','1','201','6','0','cn');
INSERT INTO met_language VALUES('1538','smstips20','扣款','1','202','6','0','cn');
INSERT INTO met_language VALUES('1539','smstips16','财务流水记录在官方服务器上，不影响您网站数据库大小，会保存最近30天的财务记录。','1','198','6','0','cn');
INSERT INTO met_language VALUES('1540','smstips17','序列','1','199','6','0','cn');
INSERT INTO met_language VALUES('1541','smstips15','短信资费说明','1','197','6','0','cn');
INSERT INTO met_language VALUES('1542','smstips14','充值成功后款项无法退还，请谨慎充值！','1','196','6','0','cn');
INSERT INTO met_language VALUES('1543','smstips13','首次充值请确定基本设置的网址为您的域名，当前为：','1','195','6','0','cn');
INSERT INTO met_language VALUES('1544','smstips12','注意事项','1','194','6','0','cn');
INSERT INTO met_language VALUES('1545','smstips11','立即充值','1','193','6','0','cn');
INSERT INTO met_language VALUES('1546','smstips9','元','1','191','6','0','cn');
INSERT INTO met_language VALUES('1547','smstips10','首次充值成功将会发送服务密码到您的邮箱，服务密码很重要，请妥善保管！','1','192','6','0','cn');
INSERT INTO met_language VALUES('1548','smstips8','充值金额','1','190','6','0','cn');
INSERT INTO met_language VALUES('1549','smstips5','在线短信充值','1','187','6','0','cn');
INSERT INTO met_language VALUES('1550','smstips6','当前余额','1','188','6','0','cn');
INSERT INTO met_language VALUES('1551','smstips7','付款方式','1','189','6','0','cn');
INSERT INTO met_language VALUES('1552','physicaltips41','对比结果','1','182','6','0','cn');
INSERT INTO met_language VALUES('1553','smstips1','批量发送','1','183','6','0','cn');
INSERT INTO met_language VALUES('1554','smstips2','发送记录','1','184','6','0','cn');
INSERT INTO met_language VALUES('1555','smstips3','财务流水','1','185','6','0','cn');
INSERT INTO met_language VALUES('1556','smstips4','在线充值','1','186','6','0','cn');
INSERT INTO met_language VALUES('1557','physicaltips39','处不一致','1','180','6','0','cn');
INSERT INTO met_language VALUES('1558','physicaltips40','返回','1','181','6','0','cn');
INSERT INTO met_language VALUES('1559','physicaltips37','正在对比...','1','178','6','0','cn');
INSERT INTO met_language VALUES('1560','physicaltips38','查看上次对比结果','1','179','6','0','cn');
INSERT INTO met_language VALUES('1561','physicaltips36','立即对比','1','177','6','0','cn');
INSERT INTO met_language VALUES('1562','physicaltips35','文件校对：网站所有文件与上次备份指纹进行比对，找出缺失或可疑文件，需手动登录FTP修复。<br/>网站升级，应用和模板的下载删除，会改变指纹，建议这些操作之前指纹对比，操作之后备份指纹。','1','176','6','0','cn');
INSERT INTO met_language VALUES('1563','physicaltips34','立即备份指纹','1','175','6','0','cn');
INSERT INTO met_language VALUES('1564','physicaltips33','正在备份...','1','174','6','0','cn');
INSERT INTO met_language VALUES('1565','physicaltips32','备份指纹：记录网站所有文件及文件大小','1','173','6','0','cn');
INSERT INTO met_language VALUES('1566','physicaltips31','扫描结果','1','172','6','0','cn');
INSERT INTO met_language VALUES('1567','physicaltips30','重新扫描','1','171','6','0','cn');
INSERT INTO met_language VALUES('1568','physicaltips29','个','1','170','6','0','cn');
INSERT INTO met_language VALUES('1569','physicaltips24','立即扫描','1','165','6','0','cn');
INSERT INTO met_language VALUES('1570','physicaltips25','查看上次扫描结果','1','166','6','0','cn');
INSERT INTO met_language VALUES('1571','physicaltips26','可疑文件','1','167','6','0','cn');
INSERT INTO met_language VALUES('1572','physicaltips27','个，非法后缀文件','1','168','6','0','cn');
INSERT INTO met_language VALUES('1573','physicaltips28','个，非系统文件夹','1','169','6','0','cn');
INSERT INTO met_language VALUES('1574','physicaltips23','能够扫描到网站目录下存在的可疑文件，建议定期扫描','1','164','6','0','cn');
INSERT INTO met_language VALUES('1575','physicaltips22','安全项目','1','163','6','0','cn');
INSERT INTO met_language VALUES('1576','physicaltips20','优化项目','1','161','6','0','cn');
INSERT INTO met_language VALUES('1577','physicaltips21','推荐修复这些项目','1','162','6','0','cn');
INSERT INTO met_language VALUES('1578','physicaltips19','这些项目可能会导致网站无法正常访问，请尽快修复','1','160','6','0','cn');
INSERT INTO met_language VALUES('1579','physicaltips18','危险项目','1','159','6','0','cn');
INSERT INTO met_language VALUES('1580','physicaltips17','分','1','158','6','0','cn');
INSERT INTO met_language VALUES('1581','physicaltips16','重新体检','1','157','6','0','cn');
INSERT INTO met_language VALUES('1582','physicaltips15','体检时间','1','156','6','0','cn');
INSERT INTO met_language VALUES('1583','physicaltips14','体检得分','1','155','6','0','cn');
INSERT INTO met_language VALUES('1584','physicaltips13','立即体检','1','154','6','0','cn');
INSERT INTO met_language VALUES('1585','physicaltips11','项有问题','1','152','6','0','cn');
INSERT INTO met_language VALUES('1586','physicaltips12','建议每周定期体检可以发现您网站存在的细节问题，并保护您的网站安全。','1','153','6','0','cn');
INSERT INTO met_language VALUES('1587','physicaltips9','项，','1','150','6','0','cn');
INSERT INTO met_language VALUES('1588','physicaltips10','其中','1','151','6','0','cn');
INSERT INTO met_language VALUES('1589','physicaltips8','共扫描了','1','149','6','0','cn');
INSERT INTO met_language VALUES('1590','physicaltips7','分，','1','148','6','0','cn');
INSERT INTO met_language VALUES('1591','physicaltips6','上次网站体检得分','1','147','6','0','cn');
INSERT INTO met_language VALUES('1592','physicaltips5','上次体检时间','1','146','6','0','cn');
INSERT INTO met_language VALUES('1593','physicaltips4','文件校对','1','145','6','0','cn');
INSERT INTO met_language VALUES('1594','physicaltips3','查杀木马','1','144','6','0','cn');
INSERT INTO met_language VALUES('1595','physicaltips2','网站体检','1','143','6','0','cn');
INSERT INTO met_language VALUES('1596','physicaltips1','正在扫描...','1','142','6','0','cn');
INSERT INTO met_language VALUES('1597','statbrowser7','搜狗浏览器','1','141','6','0','cn');
INSERT INTO met_language VALUES('1598','statbrowser6','谷歌浏览器','1','140','6','0','cn');
INSERT INTO met_language VALUES('1599','statbrowser5','世界之窗浏览器','1','139','6','0','cn');
INSERT INTO met_language VALUES('1600','statbrowser4','TT浏览器','1','138','6','0','cn');
INSERT INTO met_language VALUES('1601','statother','其他','1','134','6','0','cn');
INSERT INTO met_language VALUES('1602','statbrowser1','360安全浏览器','1','135','6','0','cn');
INSERT INTO met_language VALUES('1603','statbrowser2','傲游浏览器','1','136','6','0','cn');
INSERT INTO met_language VALUES('1604','statbrowser3','QQ浏览器','1','137','6','0','cn');
INSERT INTO met_language VALUES('1605','statvisitors','独立访客','1','133','6','0','cn');
INSERT INTO met_language VALUES('1606','statip','IP','1','132','6','0','cn');
INSERT INTO met_language VALUES('1607','week7','日','1','130','6','0','cn');
INSERT INTO met_language VALUES('1608','statpv','PV','1','131','6','0','cn');
INSERT INTO met_language VALUES('1609','week6','六','1','129','6','0','cn');
INSERT INTO met_language VALUES('1610','week5','五','1','128','6','0','cn');
INSERT INTO met_language VALUES('1611','week4','四','1','127','6','0','cn');
INSERT INTO met_language VALUES('1612','week2','二','1','125','6','0','cn');
INSERT INTO met_language VALUES('1613','week3','三','1','126','6','0','cn');
INSERT INTO met_language VALUES('1614','stat_cr0','从不清空','1','123','6','0','cn');
INSERT INTO met_language VALUES('1615','week1','一','1','124','6','0','cn');
INSERT INTO met_language VALUES('1616','stat_cr4','保留近一年','1','122','6','0','cn');
INSERT INTO met_language VALUES('1617','stat_cr3','保留近一个月','1','121','6','0','cn');
INSERT INTO met_language VALUES('1618','sms3','cache文件夹没有写权限，商业会员短信发送价格获取失败！','1','117','6','0','cn');
INSERT INTO met_language VALUES('1619','stat_cr1','仅保留当天','1','119','6','0','cn');
INSERT INTO met_language VALUES('1620','stat_cr2','保留近七天','1','120','6','0','cn');
INSERT INTO met_language VALUES('1621','statweb','直接输入网址','1','118','6','0','cn');
INSERT INTO met_language VALUES('1622','sms1','短信内容和手机号码不能为空','1','115','6','0','cn');
INSERT INTO met_language VALUES('1623','sms2','操作失败，可能是输入的信息有误！','1','116','6','0','cn');
INSERT INTO met_language VALUES('1624','physicalfingerprint1','指纹文件','1','109','6','0','cn');
INSERT INTO met_language VALUES('1625','physicalfingerprint2','并非指纹文件','1','110','6','0','cn');
INSERT INTO met_language VALUES('1626','physicalfingerprint3','文件大小与指纹文件不一致','1','111','6','0','cn');
INSERT INTO met_language VALUES('1627','smschargeback','扣款','1','112','6','0','cn');
INSERT INTO met_language VALUES('1628','smsrecharge','充值','1','113','6','0','cn');
INSERT INTO met_language VALUES('1629','smsreonlinecharge','在线短信充值','1','114','6','0','cn');
INSERT INTO met_language VALUES('1630','physicalfunction6','全部删除','1','105','6','0','cn');
INSERT INTO met_language VALUES('1631','physicalfingerprintno','指纹文件不存在','1','108','6','0','cn');
INSERT INTO met_language VALUES('1632','physicalfingerprintok','指纹比对完全一致','1','107','6','0','cn');
INSERT INTO met_language VALUES('1633','physicalfunctionok','扫描已完成，未发现木马及其它安全威胁。','1','106','6','0','cn');
INSERT INTO met_language VALUES('1634','physicalfunction5','非本系统文件夹，如果不是您安装的其他程序，请删除','1','104','6','0','cn');
INSERT INTO met_language VALUES('1635','physicalfunction4','文件夹','1','103','6','0','cn');
INSERT INTO met_language VALUES('1636','physicalfunction3','非法后缀','1','102','6','0','cn');
INSERT INTO met_language VALUES('1637','physicalfunction2','含有危险函数','1','101','6','0','cn');
INSERT INTO met_language VALUES('1638','physicalfiletime6','年前','1','99','6','0','cn');
INSERT INTO met_language VALUES('1639','physicalfunction1','可疑文件','1','100','6','0','cn');
INSERT INTO met_language VALUES('1640','physicalfiletime5','个月前','1','98','6','0','cn');
INSERT INTO met_language VALUES('1641','physicalfiletime2','小时前','1','95','6','0','cn');
INSERT INTO met_language VALUES('1642','physicalfiletime3','天前','1','96','6','0','cn');
INSERT INTO met_language VALUES('1643','physicalfiletime4','周前','1','97','6','0','cn');
INSERT INTO met_language VALUES('1644','physicalfiletime1','分钟前','1','94','6','0','cn');
INSERT INTO met_language VALUES('1645','physicalfileno','没有进行过网站体检，建议立即体检','1','93','6','0','cn');
INSERT INTO met_language VALUES('1646','physicalfile10','文件大小与系统标准文件不一致','1','92','6','0','cn');
INSERT INTO met_language VALUES('1647','physicalfile9','重新生成','1','91','6','0','cn');
INSERT INTO met_language VALUES('1648','physicalfile2','未发现风险','1','84','6','0','cn');
INSERT INTO met_language VALUES('1649','physicalfile3','系统文件','1','85','6','0','cn');
INSERT INTO met_language VALUES('1650','physicalfile4','配置文件','1','86','6','0','cn');
INSERT INTO met_language VALUES('1651','physicalfile5','丢失','1','87','6','0','cn');
INSERT INTO met_language VALUES('1652','physicalfile6','文件大小与系统标准文件不一致','1','88','6','0','cn');
INSERT INTO met_language VALUES('1653','physicalfile7','重新下载','1','89','6','0','cn');
INSERT INTO met_language VALUES('1654','physicalfile8','请恢复备份','1','90','6','0','cn');
INSERT INTO met_language VALUES('1655','physicalfile1','无法连接服务器获取系统标准文件','1','83','6','0','cn');
INSERT INTO met_language VALUES('1656','physicalweb1','网站网址与当前访问网址不一致','1','81','6','0','cn');
INSERT INTO met_language VALUES('1657','physicalfile','关键文件检测','1','82','6','0','cn');
INSERT INTO met_language VALUES('1658','physicalweb','网站地址设置','1','80','6','0','cn');
INSERT INTO met_language VALUES('1659','physicalmember2','名','1','79','6','0','cn');
INSERT INTO met_language VALUES('1660','physicalspam','垃圾信息','1','75','6','0','cn');
INSERT INTO met_language VALUES('1661','physicalspam1','回收站有未清理数据','1','76','6','0','cn');
INSERT INTO met_language VALUES('1662','physicalmember','待审核会员','1','77','6','0','cn');
INSERT INTO met_language VALUES('1663','physicalmember1','有未审核会员：','1','78','6','0','cn');
INSERT INTO met_language VALUES('1664','physicalunread3','简历','1','74','6','0','cn');
INSERT INTO met_language VALUES('1665','physicalunread2','留言信息','1','73','6','0','cn');
INSERT INTO met_language VALUES('1666','physicalunread','未读信息','1','71','6','0','cn');
INSERT INTO met_language VALUES('1667','physicalunread1','反馈信息','1','72','6','0','cn');
INSERT INTO met_language VALUES('1668','physicalstatic1','静态页面和伪静态被同时开启，将导致页面无法访问','1','70','6','0','cn');
INSERT INTO met_language VALUES('1669','physicalseo4','已设置','1','68','6','0','cn');
INSERT INTO met_language VALUES('1670','physicalstatic','静态页面设置','1','69','6','0','cn');
INSERT INTO met_language VALUES('1671','physicalseo3','网站描述未设置','1','67','6','0','cn');
INSERT INTO met_language VALUES('1672','physicalupdate3','请尽快更新网站内容','1','63','6','0','cn');
INSERT INTO met_language VALUES('1673','physicalseo','SEO优化设置','1','64','6','0','cn');
INSERT INTO met_language VALUES('1674','physicalseo1','网站关键词未设置','1','65','6','0','cn');
INSERT INTO met_language VALUES('1675','physicalseo2','网站关键词中有全角逗号[，]建议使用半角逗号[,]或竖线[|]作为分隔符','1','66','6','0','cn');
INSERT INTO met_language VALUES('1676','physicalupdate2','建议每周更新内容','1','62','6','0','cn');
INSERT INTO met_language VALUES('1677','physicalupdate1','上次更新时间：','1','61','6','0','cn');
INSERT INTO met_language VALUES('1678','physicalupdate','网站内容更新','1','60','6','0','cn');
INSERT INTO met_language VALUES('1679','physicalbackup4','天前，建议每月至少备份一次','1','59','6','0','cn');
INSERT INTO met_language VALUES('1680','physicalbackup1','没有检测到数据备份文件，建议定期备份网站数据。','1','57','6','0','cn');
INSERT INTO met_language VALUES('1681','physicalbackup2','上次备份时间：','1','58','6','0','cn');
INSERT INTO met_language VALUES('1682','physicalbackup','网站数据备份','1','56','6','0','cn');
INSERT INTO met_language VALUES('1683','physicaladmin2','已修改','1','55','6','0','cn');
INSERT INTO met_language VALUES('1684','physicaladmin1','后台目录名称未修改，建议修改','1','54','6','0','cn');
INSERT INTO met_language VALUES('1685','physicaladmin','后台目录名称','1','53','6','0','cn');
INSERT INTO met_language VALUES('1686','physicalnoneed','无需处理','1','52','6','0','cn');
INSERT INTO met_language VALUES('1687','physicalok','正常','1','51','6','0','cn');
INSERT INTO met_language VALUES('1688','physicalupdatesuc','更新成功','1','50','6','0','cn');
INSERT INTO met_language VALUES('1689','physicaldelok','删除成功','1','47','6','0','cn');
INSERT INTO met_language VALUES('1690','physicaldelno','找不到文件,文件删除失败.','1','48','6','0','cn');
INSERT INTO met_language VALUES('1691','physicalgenok','生成成功','1','49','6','0','cn');
INSERT INTO met_language VALUES('1692','nursenomoney','余额不足，请充值后再提交！','1','46','6','0','cn');
INSERT INTO met_language VALUES('1693','appdl4','以上版本系统支持','1','45','6','0','cn');
INSERT INTO met_language VALUES('1694','appdl2','已安装','1','43','6','0','cn');
INSERT INTO met_language VALUES('1695','appdl3','此应用需要','1','44','6','0','cn');
INSERT INTO met_language VALUES('1696','appdl1','应用安装完成后请到我的应用中使用','1','42','6','0','cn');
INSERT INTO met_language VALUES('1697','appuninstall','卸载成功','1','41','6','0','cn');
INSERT INTO met_language VALUES('1698','usertype2','商业授权','1','34','6','0','cn');
INSERT INTO met_language VALUES('1699','usertype3','普通商业授权','1','35','6','0','cn');
INSERT INTO met_language VALUES('1700','usertype4','高级商业授权','1','36','6','0','cn');
INSERT INTO met_language VALUES('1701','hosterror','连接服务器失败，请稍后再试','1','37','6','0','cn');
INSERT INTO met_language VALUES('1702','appinstall','安装','1','38','6','0','cn');
INSERT INTO met_language VALUES('1703','appreinstall','重新安装','1','39','6','0','cn');
INSERT INTO met_language VALUES('1704','appupgrade','升级','1','40','6','0','cn');
INSERT INTO met_language VALUES('1705','usertype1','免费','1','33','6','0','cn');
INSERT INTO met_language VALUES('1706','csvexplain2','1.请不要修改文件名。','1','30','6','0','cn');
INSERT INTO met_language VALUES('1707','csvexplain3','2.详细内容字段支持HTML代码。','1','31','6','0','cn');
INSERT INTO met_language VALUES('1708','csvexplain4','3.选择项字段请填写选项内容。','1','32','6','0','cn');
INSERT INTO met_language VALUES('1709','csvexplain1','说明文档','1','29','6','0','cn');
INSERT INTO met_language VALUES('1710','csverror2','上传内容的静态页面名称与已有内容相同。出错行：','1','28','6','0','cn');
INSERT INTO met_language VALUES('1711','csvnodata','没有数据','1','26','6','0','cn');
INSERT INTO met_language VALUES('1712','csverror1','上传文件中存在相同的静态页面名称。出错行：','1','27','6','0','cn');
INSERT INTO met_language VALUES('1713','listno','该栏目下没有内容','1','24','6','0','cn');
INSERT INTO met_language VALUES('1714','wapdimensionaltips','请上传小于300K的图片，图片过大可能无法正常生成！<br />不需要在二维码上显示LOGO，请留空。','1','21','6','0','cn');
INSERT INTO met_language VALUES('1715','csvnocolumn','没有找到对应栏目，请不要修改文件名','1','25','6','0','cn');
INSERT INTO met_language VALUES('1716','wapdimensionaldo','生成','1','22','6','0','cn');
INSERT INTO met_language VALUES('1717','contentuppage','操作成功，跳到下一页','1','23','6','0','cn');
INSERT INTO met_language VALUES('1718','wapdimensionalsize','尺寸','1','20','6','0','cn');
INSERT INTO met_language VALUES('1719','wapdimensionaltitle','二维码生成（手机扫描二维码即可访问手机版网站）','1','19','6','0','cn');
INSERT INTO met_language VALUES('1720','wapdescription','简短描述','1','17','6','0','cn');
INSERT INTO met_language VALUES('1721','wapfoottext','底部文字','1','18','6','0','cn');
INSERT INTO met_language VALUES('1722','wapindextitle','页面标题(title)','1','16','6','0','cn');
INSERT INTO met_language VALUES('1723','waptiao','条','1','15','6','0','cn');
INSERT INTO met_language VALUES('1724','waplist','各模块列表显示数量','1','13','6','0','cn');
INSERT INTO met_language VALUES('1725','waplistauk','显示全部','1','14','6','0','cn');
INSERT INTO met_language VALUES('1726','waplistaud','需要审核','1','12','6','0','cn');
INSERT INTO met_language VALUES('1727','waplistshow','内容显示','1','10','6','0','cn');
INSERT INTO met_language VALUES('1728','wapinfo7','设置为需审核后，后台添加的内容需勾选允许显示在WAP才会正常在WAP前台显示','1','11','6','0','cn');
INSERT INTO met_language VALUES('1729','wapinfo4','如wap.metinfo.cn(请先做好域名解析和绑定)','1','7','6','0','cn');
INSERT INTO met_language VALUES('1730','wapinfo6','考虑到手机屏宽，图片宽度240px(像素)比较适合','1','9','6','0','cn');
INSERT INTO met_language VALUES('1731','wapshowimg','展示图片','1','8','6','0','cn');
INSERT INTO met_language VALUES('1732','waptype','Wap功能','1','1','6','0','cn');
INSERT INTO met_language VALUES('1733','waplang','显示链接','1','2','6','0','cn');
INSERT INTO met_language VALUES('1734','wapsetlang','网站首页语言切换位置会显示WAP文字链接','1','3','6','0','cn');
INSERT INTO met_language VALUES('1735','wapfang','自动跳转','1','4','6','0','cn');
INSERT INTO met_language VALUES('1736','wapgeturl','手机访问自动跳转','1','5','6','0','cn');
INSERT INTO met_language VALUES('1737','wapinfo3','指定域名跳转','1','6','6','0','cn');
INSERT INTO met_language VALUES('1738','enterpriseapp','企业应用','1','6','0','0','cn');
INSERT INTO met_language VALUES('1739','otherinfocache2','cache文件没有写权限，更新内容前台无法正常显示！','1','209','5','0','cn');
INSERT INTO met_language VALUES('1740','otherinfocache1','请重新生成静态页面，并刷新页面，修改内容才可以正常显示！','1','208','5','0','cn');
INSERT INTO met_language VALUES('1741','modulemanagement8','反馈系统','1','207','5','0','cn');
INSERT INTO met_language VALUES('1742','modulemanagement7','留言系统','1','206','5','0','cn');
INSERT INTO met_language VALUES('1743','modulemanagement6','招聘模块','1','205','5','0','cn');
INSERT INTO met_language VALUES('1744','modulemanagement5','图片模块','1','204','5','0','cn');
INSERT INTO met_language VALUES('1745','modulemanagement3','产品模块','1','202','5','0','cn');
INSERT INTO met_language VALUES('1746','modulemanagement4','下载模块','1','203','5','0','cn');
INSERT INTO met_language VALUES('1747','modulemanagement1','简介模块','1','200','5','0','cn');
INSERT INTO met_language VALUES('1748','modulemanagement2','文章模块','1','201','5','0','cn');
INSERT INTO met_language VALUES('1749','dltips7','下载超时','1','195','5','0','cn');
INSERT INTO met_language VALUES('1750','columnarrangement1','展示方式：','1','196','5','0','cn');
INSERT INTO met_language VALUES('1751','columnarrangement2','切换为','1','197','5','0','cn');
INSERT INTO met_language VALUES('1752','columnarrangement3','按模块分类','1','198','5','0','cn');
INSERT INTO met_language VALUES('1753','columnarrangement4','按栏目分类','1','199','5','0','cn');
INSERT INTO met_language VALUES('1754','dltips6','远程服务器请求错误','1','194','5','0','cn');
INSERT INTO met_language VALUES('1755','dltips5','您所请求的文件不存在','1','193','5','0','cn');
INSERT INTO met_language VALUES('1756','dltips4','请升级程序','1','192','5','0','cn');
INSERT INTO met_language VALUES('1757','dltips3','您没有权限下载此文件','1','191','5','0','cn');
INSERT INTO met_language VALUES('1758','dltips2','文件下载失败，请检查本地目录权限和空间大小','1','190','5','0','cn');
INSERT INTO met_language VALUES('1759','dltips1','无法连接上远程服务器，请检查网络','1','189','5','0','cn');
INSERT INTO met_language VALUES('1760','seotips25','立即打包并下载','1','188','5','0','cn');
INSERT INTO met_language VALUES('1761','seotips24','注意！您同时开启了静态页面和伪静态，请关闭其中一种，否则会导致网站无法正常访问。','1','187','5','0','cn');
INSERT INTO met_language VALUES('1762','seotips18','过滤外部模块','1','182','5','0','cn');
INSERT INTO met_language VALUES('1763','seotips19','网站语言范围','1','183','5','0','cn');
INSERT INTO met_language VALUES('1764','seotips20','当前语言','1','184','5','0','cn');
INSERT INTO met_language VALUES('1765','seotips21','仅生成勾选语言的网站地图','1','185','5','0','cn');
INSERT INTO met_language VALUES('1766','seotips22','并生成','1','186','5','0','cn');
INSERT INTO met_language VALUES('1767','seotips17','过滤不显示在前台的栏目','1','181','5','0','cn');
INSERT INTO met_language VALUES('1768','seotips15_3','适合雅虎，','1','179','5','0','cn');
INSERT INTO met_language VALUES('1769','seotips16','过滤栏目及内容','1','180','5','0','cn');
INSERT INTO met_language VALUES('1770','seotips15_1','便于访客查看网站内容，可以在栏目设置中添加模块为‘网站地图’的栏目。','1','177','5','0','cn');
INSERT INTO met_language VALUES('1771','seotips15_2','适合谷歌和百度，','1','178','5','0','cn');
INSERT INTO met_language VALUES('1772','seotips15','地图网址','1','176','5','0','cn');
INSERT INTO met_language VALUES('1773','seotips6','首页','1','166','5','0','cn');
INSERT INTO met_language VALUES('1774','seotips7','如','1','167','5','0','cn');
INSERT INTO met_language VALUES('1775','seotips8','静态页面名称或ID','1','168','5','0','cn');
INSERT INTO met_language VALUES('1776','seotips9','内容页','1','169','5','0','cn');
INSERT INTO met_language VALUES('1777','seotips10','是否删除伪静态配置文件？如有其它语言开启伪静态功能请不要删除。','1','170','5','0','cn');
INSERT INTO met_language VALUES('1778','seotips14_1','怎样提交给搜索引擎？','1','175','5','0','cn');
INSERT INTO met_language VALUES('1779','seotips14','网站地图（Sitemap）有助于加快网站被搜索引擎收录','1','174','5','0','cn');
INSERT INTO met_language VALUES('1780','seotips13','更换静态化方式将重新生成所有静态页面，确定吗！','1','173','5','0','cn');
INSERT INTO met_language VALUES('1781','seotips12','是否立即生成所有静态页面？','1','172','5','0','cn');
INSERT INTO met_language VALUES('1782','seotips11','是否删除所有已生成的静态页面？','1','171','5','0','cn');
INSERT INTO met_language VALUES('1783','seotips5','URL构成方式(伪静态的URL构成暂不支持更改)','1','165','5','0','cn');
INSERT INTO met_language VALUES('1784','uisetTips2','为空则调用电脑版LOGO，推荐尺寸：130*50 (像素)','1','0','0','0','cn');
INSERT INTO met_language VALUES('1785','seotips3','静态页面生成','1','163','5','0','cn');
INSERT INTO met_language VALUES('1786','seotips2','静态页面设置','1','162','5','0','cn');
INSERT INTO met_language VALUES('1787','seotips1','多个关键词请用竖线 | 隔开，建议3到4个关键词。','1','161','5','0','cn');
INSERT INTO met_language VALUES('1788','statips62','来访次数','1','159','5','0','cn');
INSERT INTO met_language VALUES('1789','statips63','访问次数','1','160','5','0','cn');
INSERT INTO met_language VALUES('1790','statips60','来路域名','1','157','5','0','cn');
INSERT INTO met_language VALUES('1791','statips61','来路URL','1','158','5','0','cn');
INSERT INTO met_language VALUES('1792','statips59','来路页面','1','156','5','0','cn');
INSERT INTO met_language VALUES('1793','statips57','每日访问最大值','1','154','5','0','cn');
INSERT INTO met_language VALUES('1794','statips58','为防止恶意攻击，超出后不再记录来访信息','1','155','5','0','cn');
INSERT INTO met_language VALUES('1795','statips56','安全设置','1','153','5','0','cn');
INSERT INTO met_language VALUES('1796','statips55','清空今日以前的所有数据','1','152','5','0','cn');
INSERT INTO met_language VALUES('1797','statips54','清空所有数据','1','151','5','0','cn');
INSERT INTO met_language VALUES('1798','statips53','一键清空所有统计数据','1','150','5','0','cn');
INSERT INTO met_language VALUES('1799','statips52','清空统计数据','1','149','5','0','cn');
INSERT INTO met_language VALUES('1800','statips51','一键清空','1','148','5','0','cn');
INSERT INTO met_language VALUES('1801','statips50','程序每日会清空设置时间前的统计数据，保存即生效。','1','147','5','0','cn');
INSERT INTO met_language VALUES('1802','statips49','清空方式（统计数据会占用数据库大小）','1','146','5','0','cn');
INSERT INTO met_language VALUES('1803','statips48','关闭后不再记录来访信息','1','145','5','0','cn');
INSERT INTO met_language VALUES('1804','statips47','访问统计功能','1','144','5','0','cn');
INSERT INTO met_language VALUES('1805','statips46','24小时流量趋势','1','143','5','0','cn');
INSERT INTO met_language VALUES('1806','statips45','历史累计','1','142','5','0','cn');
INSERT INTO met_language VALUES('1807','statips44','历史最高','1','141','5','0','cn');
INSERT INTO met_language VALUES('1808','statips43','每日平均','1','140','5','0','cn');
INSERT INTO met_language VALUES('1809','statips41','按IP查看','1','138','5','0','cn');
INSERT INTO met_language VALUES('1810','statips42','访问量概况','1','139','5','0','cn');
INSERT INTO met_language VALUES('1811','statips40','按独立访客查看','1','137','5','0','cn');
INSERT INTO met_language VALUES('1812','statips38','小时段分布','1','135','5','0','cn');
INSERT INTO met_language VALUES('1813','statips39','按PV查看','1','136','5','0','cn');
INSERT INTO met_language VALUES('1814','statips37','日访问量分布','1','134','5','0','cn');
INSERT INTO met_language VALUES('1815','statips36','星期','1','133','5','0','cn');
INSERT INTO met_language VALUES('1816','statips35','日期','1','132','5','0','cn');
INSERT INTO met_language VALUES('1817','statips34','日访问量概况','1','131','5','0','cn');
INSERT INTO met_language VALUES('1818','statips33','搜索次数','1','130','5','0','cn');
INSERT INTO met_language VALUES('1819','statips32','搜索引擎','1','129','5','0','cn');
INSERT INTO met_language VALUES('1820','statips31','受访','1','128','5','0','cn');
INSERT INTO met_language VALUES('1821','statips30','来路','1','127','5','0','cn');
INSERT INTO met_language VALUES('1822','statips23','所属语言','1','121','5','0','cn');
INSERT INTO met_language VALUES('1823','statips25','域名','1','122','5','0','cn');
INSERT INTO met_language VALUES('1824','statips26','直接输入网址或书签','1','123','5','0','cn');
INSERT INTO met_language VALUES('1825','statips29','浏览器','1','126','5','0','cn');
INSERT INTO met_language VALUES('1826','statips28','地区-网络','1','125','5','0','cn');
INSERT INTO met_language VALUES('1827','statips27','时间','1','124','5','0','cn');
INSERT INTO met_language VALUES('1828','statips22','人均浏览次数','1','120','5','0','cn');
INSERT INTO met_language VALUES('1829','statips21','独立访客','1','119','5','0','cn');
INSERT INTO met_language VALUES('1830','statips20','浏览次数','1','118','5','0','cn');
INSERT INTO met_language VALUES('1831','statips19','页面名称','1','117','5','0','cn');
INSERT INTO met_language VALUES('1832','statips18','排名','1','116','5','0','cn');
INSERT INTO met_language VALUES('1833','statips17','从','1','115','5','0','cn');
INSERT INTO met_language VALUES('1834','statips14','本月','1','113','5','0','cn');
INSERT INTO met_language VALUES('1835','statips15','选择日期','1','114','5','0','cn');
INSERT INTO met_language VALUES('1836','statips13','最近30天','1','112','5','0','cn');
INSERT INTO met_language VALUES('1837','statips12','最近7天','1','111','5','0','cn');
INSERT INTO met_language VALUES('1838','statips11','昨日','1','110','5','0','cn');
INSERT INTO met_language VALUES('1839','statips10','今日','1','109','5','0','cn');
INSERT INTO met_language VALUES('1840','statips9','受访语言','1','108','5','0','cn');
INSERT INTO met_language VALUES('1841','statips8','受访域名','1','107','5','0','cn');
INSERT INTO met_language VALUES('1842','statips5','来路分析','1','104','5','0','cn');
INSERT INTO met_language VALUES('1843','statips6','访问明细','1','105','5','0','cn');
INSERT INTO met_language VALUES('1844','statips7','受访页面','1','106','5','0','cn');
INSERT INTO met_language VALUES('1845','enginetype7','有道','1','98','5','0','cn');
INSERT INTO met_language VALUES('1846','enginetype8','360搜索','1','99','5','0','cn');
INSERT INTO met_language VALUES('1847','statips1','统计概况','1','100','5','0','cn');
INSERT INTO met_language VALUES('1848','statips2','统计设置','1','101','5','0','cn');
INSERT INTO met_language VALUES('1849','statips4','受访分析','1','103','5','0','cn');
INSERT INTO met_language VALUES('1850','statips3','搜索引擎','1','102','5','0','cn');
INSERT INTO met_language VALUES('1851','enginetype6','搜狗','1','97','5','0','cn');
INSERT INTO met_language VALUES('1852','enginetype5','必应','1','96','5','0','cn');
INSERT INTO met_language VALUES('1853','enginetype4','雅虎','1','95','5','0','cn');
INSERT INTO met_language VALUES('1854','linkRecommend','推荐站点','1','91','5','0','cn');
INSERT INTO met_language VALUES('1855','enginetype1','谷歌','1','92','5','0','cn');
INSERT INTO met_language VALUES('1856','enginetype2','百度','1','93','5','0','cn');
INSERT INTO met_language VALUES('1857','enginetype3','搜搜','1','94','5','0','cn');
INSERT INTO met_language VALUES('1858','linkPass','审核通过','1','90','5','0','cn');
INSERT INTO met_language VALUES('1859','linkLOGO','网站LOGO','1','87','5','0','cn');
INSERT INTO met_language VALUES('1860','linkcontact','联系方式','1','88','5','0','cn');
INSERT INTO met_language VALUES('1861','linktip1','数字越大排序越靠前','1','89','5','0','cn');
INSERT INTO met_language VALUES('1862','linkUrl','网站地址','1','86','5','0','cn');
INSERT INTO met_language VALUES('1863','linkTip2','请输入网站标题关键字','1','85','5','0','cn');
INSERT INTO met_language VALUES('1864','linkKeys','网站关键词','1','83','5','0','cn');
INSERT INTO met_language VALUES('1865','linkCheck','审核','1','84','5','0','cn');
INSERT INTO met_language VALUES('1866','linkName','网站标题','1','82','5','0','cn');
INSERT INTO met_language VALUES('1867','linkType4','文字链接','1','80','5','0','cn');
INSERT INTO met_language VALUES('1868','linkType5','LOGO链接','1','81','5','0','cn');
INSERT INTO met_language VALUES('1869','linkType3','全部链接','1','79','5','0','cn');
INSERT INTO met_language VALUES('1870','linkType1','未审核链接','1','77','5','0','cn');
INSERT INTO met_language VALUES('1871','linkType2','推荐链接','1','78','5','0','cn');
INSERT INTO met_language VALUES('1872','htmnoopen','没有开启静态页面','1','74','5','0','cn');
INSERT INTO met_language VALUES('1873','linkType','链接类型','1','75','5','0','cn');
INSERT INTO met_language VALUES('1874','linkTypenonull','请选择链接类型','1','76','5','0','cn');
INSERT INTO met_language VALUES('1875','htmdabaoinfo2','<span style=float:right;>打包成一个独立的静态站点，能够独立访问</span>全站静态打包','1','73','5','0','cn');
INSERT INTO met_language VALUES('1876','htmdabao','全站静态打包','1','72','5','0','cn');
INSERT INTO met_language VALUES('1877','rewriteruledownload2','MetInfo伪静态规则','1','71','5','0','cn');
INSERT INTO met_language VALUES('1878','rewriteruledownload1','下载伪静态规则','1','70','5','0','cn');
INSERT INTO met_language VALUES('1879','rewritefinfo3','请先关闭伪静态功能，伪静态和静态页面只能采用一种。','1','69','5','0','cn');
INSERT INTO met_language VALUES('1880','rewritefaq','什么是伪静态？有何作用？','1','67','5','0','cn');
INSERT INTO met_language VALUES('1881','rewritefinfo2','请先关闭静态页面功能，伪静态和静态页面只能采用一种。','1','68','5','0','cn');
INSERT INTO met_language VALUES('1882','htmCreateAll','生成所有页面','1','63','5','0','cn');
INSERT INTO met_language VALUES('1883','htmcreateallinfo','请谨慎使用，非常消耗系统资源！','1','64','5','0','cn');
INSERT INTO met_language VALUES('1884','rewrite','伪静态(URL Rewrite)','1','65','5','0','cn');
INSERT INTO met_language VALUES('1885','rewriteok','需要空间支持：URL Rewrite模块（URL重写）','1','66','5','0','cn');
INSERT INTO met_language VALUES('1886','htmsitemap','网站地图','1','61','5','0','cn');
INSERT INTO met_language VALUES('1887','htmsitemap1','生成网站地图','1','62','5','0','cn');
INSERT INTO met_language VALUES('1888','htmAll','所有页面','1','59','5','0','cn');
INSERT INTO met_language VALUES('1889','htmlogin','会员模块','1','60','5','0','cn');
INSERT INTO met_language VALUES('1890','htmTip1','生成内容页面','1','57','5','0','cn');
INSERT INTO met_language VALUES('1891','htmTip2','生成列表页面','1','58','5','0','cn');
INSERT INTO met_language VALUES('1892','htmColumn','栏目','1','56','5','0','cn');
INSERT INTO met_language VALUES('1893','htmCreateHome','生成网站首页','1','55','5','0','cn');
INSERT INTO met_language VALUES('1894','htmHome','网站首页','1','54','5','0','cn');
INSERT INTO met_language VALUES('1895','sethtmsitemap','网站地图生成设置','1','51','5','0','cn');
INSERT INTO met_language VALUES('1896','sethtmsitemap1','HTML网站地图','1','52','5','0','cn');
INSERT INTO met_language VALUES('1897','sethtmsitemap4','xml网站地图','1','53','5','0','cn');
INSERT INTO met_language VALUES('1898','sethtmlist','列表页面名称','1','47','5','0','cn');
INSERT INTO met_language VALUES('1899','sethtmlist1','默认文件名+class+页码（如product_1_1)','1','48','5','0','cn');
INSERT INTO met_language VALUES('1900','sethtmlist2','所在文件夹名称+class+页码（如software_1_1)','1','49','5','0','cn');
INSERT INTO met_language VALUES('1901','sethtmpage4','<span style=float:right;>不建议频繁更换，以确保SEO效果（修改后请重新生成所有静态页面）</span>静态页面名称规则','1','50','5','0','cn');
INSERT INTO met_language VALUES('1902','sethtmpage3','所在文件夹名称+ID（如product10)','1','43','5','0','cn');
INSERT INTO met_language VALUES('1903','setlisthtmltype','列表页面类型','1','44','5','0','cn');
INSERT INTO met_language VALUES('1904','setlisthtmltype1','显示所有栏目id（如product_1_2_3）','1','45','5','0','cn');
INSERT INTO met_language VALUES('1905','setlisthtmltype2','只显示本栏目id（如product_1）','1','46','5','0','cn');
INSERT INTO met_language VALUES('1906','sethtmpage2','年月日+ID（如2009081510)','1','42','5','0','cn');
INSERT INTO met_language VALUES('1907','sethtmpage1','默认文件名+ID（如showproduct10)','1','41','5','0','cn');
INSERT INTO met_language VALUES('1908','sethtmpage','内容页面名称','1','40','5','0','cn');
INSERT INTO met_language VALUES('1909','sethtmtype','静态页面类型','1','39','5','0','cn');
INSERT INTO met_language VALUES('1910','sethtmway3','不建议开启自动生成功能，非常消耗资源，且仅内容管理相关操作能自动生成，其它后台设置修改后如前台无改变需要手动生成。','1','38','5','0','cn');
INSERT INTO met_language VALUES('1911','sethtmway2','手动生成','1','37','5','0','cn');
INSERT INTO met_language VALUES('1912','sethtmway','生成方式','1','35','5','0','cn');
INSERT INTO met_language VALUES('1913','sethtmway1','内容信息变动时自动生成','1','36','5','0','cn');
INSERT INTO met_language VALUES('1914','setbasicTip4','建议企业站使用伪静态功能，纯静态消耗资源且不方便管理；首次开启请点击“静态页面生成”生成全部页面','1','34','5','0','cn');
INSERT INTO met_language VALUES('1915','sethtmok','静态页面开启','1','31','5','0','cn');
INSERT INTO met_language VALUES('1916','sethtmall','全站静态化','1','32','5','0','cn');
INSERT INTO met_language VALUES('1917','setbasicTip3','首页、内容页面静态化','1','33','5','0','cn');
INSERT INTO met_language VALUES('1918','labelUrl','链接地址','1','27','5','0','cn');
INSERT INTO met_language VALUES('1919','labelAdd','添加新标签','1','28','5','0','cn');
INSERT INTO met_language VALUES('1920','labelnonull','原文字不能为空','1','29','5','0','cn');
INSERT INTO met_language VALUES('1921','htm','静态页面已成功生成','1','30','5','0','cn');
INSERT INTO met_language VALUES('1922','labelNewtitle','Title','1','26','5','0','cn');
INSERT INTO met_language VALUES('1923','setseojiathis','社会化分享按钮','1','22','5','0','cn');
INSERT INTO met_language VALUES('1924','labelnum','替换次数','1','23','5','0','cn');
INSERT INTO met_language VALUES('1925','labelOld','原文字','1','24','5','0','cn');
INSERT INTO met_language VALUES('1926','labelNew','替换为','1','25','5','0','cn');
INSERT INTO met_language VALUES('1927','setseoTip14','内页的标题(title)构成方式，您也可以在编辑/添加内容时自定义对应页面的标题(title)。','1','21','5','0','cn');
INSERT INTO met_language VALUES('1928','setseotitletype4','内容标题+网站关键词+网站名称','1','20','5','0','cn');
INSERT INTO met_language VALUES('1929','setseotitletype3','内容标题+网站关键词','1','19','5','0','cn');
INSERT INTO met_language VALUES('1930','setseotitletype2','内容标题+网站名称','1','18','5','0','cn');
INSERT INTO met_language VALUES('1931','setseotitletype','内页标题（title）','1','16','5','0','cn');
INSERT INTO met_language VALUES('1932','setseotitletype1','内容标题','1','17','5','0','cn');
INSERT INTO met_language VALUES('1933','setseodopen','当前窗口打开','1','14','5','0','cn');
INSERT INTO met_language VALUES('1934','setseonewopen','新窗口打开','1','15','5','0','cn');
INSERT INTO met_language VALUES('1935','setseotype','页面链接','1','13','5','0','cn');
INSERT INTO met_language VALUES('1936','setseoFoot','网站底部优化字','1','11','5','0','cn');
INSERT INTO met_language VALUES('1937','setseoTip13','显示在前台友情链接申请页面中','1','12','5','0','cn');
INSERT INTO met_language VALUES('1938','setseoFriendLink','友情链接本站名称','1','10','5','0','cn');
INSERT INTO met_language VALUES('1939','setseoTip9','鼠标移至超链接显示的文字','1','9','5','0','cn');
INSERT INTO met_language VALUES('1940','setseoTip8','超链接默认Title','1','8','5','0','cn');
INSERT INTO met_language VALUES('1941','setseoTip7','鼠标移至图片显示的文字','1','7','5','0','cn');
INSERT INTO met_language VALUES('1942','setseoTip6','图片默认ALT','1','6','5','0','cn');
INSERT INTO met_language VALUES('1943','setseoTip4','头部优化文字','1','5','5','0','cn');
INSERT INTO met_language VALUES('1944','setseoTip10','留空则采用网站关键词+网站名称的构成方式','1','4','5','0','cn');
INSERT INTO met_language VALUES('1945','setseoKey','网站关键词','1','2','5','0','cn');
INSERT INTO met_language VALUES('1946','setseohomeKey','首页标题（title）','1','3','5','0','cn');
INSERT INTO met_language VALUES('1947','optimizationpromotion','优化推广','1','5','0','0','cn');
INSERT INTO met_language VALUES('1948','setseoTip1','多个关键词请用“|”或“，”隔开。','1','1','5','0','cn');
INSERT INTO met_language VALUES('1949','setheadstat','顶部代码','1','176','4','0','cn');
INSERT INTO met_language VALUES('1950','eidtfed','查看反馈','1','129','4','0','cn');
INSERT INTO met_language VALUES('1951','recycledelall','删除所有','1','124','4','0','cn');
INSERT INTO met_language VALUES('1952','recycleno','没有开启回收站','1','125','4','0','cn');
INSERT INTO met_language VALUES('1953','subpart','下级栏目','1','127','4','0','cn');
INSERT INTO met_language VALUES('1954','eidtmsg','查看留言','1','128','4','0','cn');
INSERT INTO met_language VALUES('1955','recyclereall','还原所有','1','123','4','0','cn');
INSERT INTO met_language VALUES('1956','recycledownload','下载模块','1','119','4','0','cn');
INSERT INTO met_language VALUES('1957','recycleimg','图片模块','1','120','4','0','cn');
INSERT INTO met_language VALUES('1958','recycledietime','删除时间','1','121','4','0','cn');
INSERT INTO met_language VALUES('1959','recyclere','还原','1','122','4','0','cn');
INSERT INTO met_language VALUES('1960','recyclenew','新闻模块','1','117','4','0','cn');
INSERT INTO met_language VALUES('1961','recycleproduct','产品模块','1','118','4','0','cn');
INSERT INTO met_language VALUES('1962','recycletype','模块类型','1','116','4','0','cn');
INSERT INTO met_language VALUES('1963','recycleall','所有模块','1','115','4','0','cn');
INSERT INTO met_language VALUES('1964','recycleexplain1','仅支持（新闻、产品、下载、图片）模块的内容。','1','114','4','0','cn');
INSERT INTO met_language VALUES('1965','messageeditor','编辑留言','1','113','4','0','cn');
INSERT INTO met_language VALUES('1966','messagesubmit','留言提交开启关闭','1','112','4','0','cn');
INSERT INTO met_language VALUES('1967','messageeditorContent','留言内容','1','108','4','0','cn');
INSERT INTO met_language VALUES('1968','messageeditorReply','回复留言','1','109','4','0','cn');
INSERT INTO met_language VALUES('1969','messageeditorCheck','回复审核','1','110','4','0','cn');
INSERT INTO met_language VALUES('1970','messageeditorShow','审核通过并在前台显示','1','111','4','0','cn');
INSERT INTO met_language VALUES('1971','messageTime','提交时间','1','106','4','0','cn');
INSERT INTO met_language VALUES('1972','messageeditorContact','其他联系方式','1','107','4','0','cn');
INSERT INTO met_language VALUES('1973','messageID','留言者身份','1','105','4','0','cn');
INSERT INTO met_language VALUES('1974','messageReply','审核','1','104','4','0','cn');
INSERT INTO met_language VALUES('1975','messageClass5','已审核信息','1','102','4','0','cn');
INSERT INTO met_language VALUES('1976','messageTel','电话','1','103','4','0','cn');
INSERT INTO met_language VALUES('1977','messageClass3','已回复信息','1','100','4','0','cn');
INSERT INTO met_language VALUES('1978','messageClass4','未审核信息','1','101','4','0','cn');
INSERT INTO met_language VALUES('1979','messageClass2','未回复信息','1','99','4','0','cn');
INSERT INTO met_language VALUES('1980','messageClass1','所有信息','1','98','4','0','cn');
INSERT INTO met_language VALUES('1981','messageClass','留言信息分类','1','97','4','0','cn');
INSERT INTO met_language VALUES('1982','messageTitle','留言信息管理','1','96','4','0','cn');
INSERT INTO met_language VALUES('1983','messageVoice','留言表单设置','1','443','4','0','cn');
INSERT INTO met_language VALUES('1984','messageincTip4','是否将客户留言自动发生到指定邮箱','1','95','4','0','cn');
INSERT INTO met_language VALUES('1985','messageincSend','是否发送邮件','1','94','4','0','cn');
INSERT INTO met_language VALUES('1986','messageincTip3','客户留言后需要在后台回复审核才显示','1','93','4','0','cn');
INSERT INTO met_language VALUES('1987','messageincShow','显示方式','1','92','4','0','cn');
INSERT INTO met_language VALUES('1988','feedbackauto','邮件回复设置','1','90','4','0','cn');
INSERT INTO met_language VALUES('1989','messageincTitle','留言系统设置','1','91','4','0','cn');
INSERT INTO met_language VALUES('1990','feedbackexplain1','页面title名称，默认为该栏目名称','1','89','4','0','cn');
INSERT INTO met_language VALUES('1991','feedbacksubmit','反馈提交开启关闭','1','88','4','0','cn');
INSERT INTO met_language VALUES('1992','feedbackview','查看反馈信息','1','87','4','0','cn');
INSERT INTO met_language VALUES('1993','fdeditorFrom','来源页面地址','1','85','4','0','cn');
INSERT INTO met_language VALUES('1994','fdeditorRecord','编辑记录','1','86','4','0','cn');
INSERT INTO met_language VALUES('1995','fdeditorInterest','感兴趣产品','1','83','4','0','cn');
INSERT INTO met_language VALUES('1996','fdeditorTime','反馈提交时间','1','84','4','0','cn');
INSERT INTO met_language VALUES('1997','feedbackAccess0','游客','1','82','4','0','cn');
INSERT INTO met_language VALUES('1998','feedbackTip4','全部导出','1','80','4','0','cn');
INSERT INTO met_language VALUES('1999','feedbackExport','导出','1','81','4','0','cn');
INSERT INTO met_language VALUES('2000','feedbackTip2','导出EXCEL表','1','79','4','0','cn');
INSERT INTO met_language VALUES('2001','feedbackTime','提交时间','1','78','4','0','cn');
INSERT INTO met_language VALUES('2002','feedbackID','反馈者身份','1','77','4','0','cn');
INSERT INTO met_language VALUES('2003','feedbackShowAll','查看全部','1','76','4','0','cn');
INSERT INTO met_language VALUES('2004','feedbackClass2','未阅读信息','1','74','4','0','cn');
INSERT INTO met_language VALUES('2005','feedbackClass3','已阅读信息','1','75','4','0','cn');
INSERT INTO met_language VALUES('2006','feedbackClass1','所有信息','1','73','4','0','cn');
INSERT INTO met_language VALUES('2007','feedbackClass','信息状态','1','71','4','0','cn');
INSERT INTO met_language VALUES('2008','feedbackClasp','信息类别','1','72','4','0','cn');
INSERT INTO met_language VALUES('2009','fdincFeedbackTitle','回复邮件标题','1','68','4','0','cn');
INSERT INTO met_language VALUES('2010','fdincAutoFbTitle','自动回复邮件的标题','1','69','4','0','cn');
INSERT INTO met_language VALUES('2011','fdincAutoContent','回复邮件内容','1','70','4','0','cn');
INSERT INTO met_language VALUES('2012','fdincEmailName','Email字段名','1','66','4','0','cn');
INSERT INTO met_language VALUES('2013','fdincTip11','用于获取用户的邮箱地址，以便回复邮件。字段类型必须为“简短”','1','67','4','0','cn');
INSERT INTO met_language VALUES('2014','fdincTip10','勾选后将自动向提交表单的用户回复邮件','1','65','4','0','cn');
INSERT INTO met_language VALUES('2015','fdincAuto','邮件回复','1','64','4','0','cn');
INSERT INTO met_language VALUES('2016','fdincTip9','多个邮箱请用|隔开','1','63','4','0','cn');
INSERT INTO met_language VALUES('2017','fdincAcceptMail','反馈邮件接收邮箱','1','62','4','0','cn');
INSERT INTO met_language VALUES('2018','fdincTip7','仅后台读取','1','60','4','0','cn');
INSERT INTO met_language VALUES('2019','fdincTip8','发送邮件并写入数据','1','61','4','0','cn');
INSERT INTO met_language VALUES('2020','fdincAccept','仅邮件接收','1','59','4','0','cn');
INSERT INTO met_language VALUES('2021','fdincTip6','用于获取用户反馈的类型，字段类型必须为“下拉”，设置为关联产品时，下拉菜单为对应栏目下的全部产品。','1','57','4','0','cn');
INSERT INTO met_language VALUES('2022','fdincAcceptType','信息接收方式','1','58','4','0','cn');
INSERT INTO met_language VALUES('2023','fdincClassName','信息分类字段名','1','56','4','0','cn');
INSERT INTO met_language VALUES('2024','fdincTip5','多个字符请用|隔开','1','55','4','0','cn');
INSERT INTO met_language VALUES('2025','fdincSlash','敏感字符过滤','1','54','4','0','cn');
INSERT INTO met_language VALUES('2026','fdincTip4','秒，同一IP2次提交的最小间隔时间','1','53','4','0','cn');
INSERT INTO met_language VALUES('2027','fdincName','反馈表单名称','1','51','4','0','cn');
INSERT INTO met_language VALUES('2028','fdincTime','防刷新时间','1','52','4','0','cn');
INSERT INTO met_language VALUES('2029','jobsetname','请选择字段名','1','49','4','0','cn');
INSERT INTO met_language VALUES('2030','fdincTitle','反馈系统设置','1','50','4','0','cn');
INSERT INTO met_language VALUES('2031','jobmanagement','招聘职位管理','1','48','4','0','cn');
INSERT INTO met_language VALUES('2032','jobtip9','简历照片，以便在邮件中能看到应聘者上传的照片。','1','47','4','0','cn');
INSERT INTO met_language VALUES('2033','jobtip8','图片字段名','1','46','4','0','cn');
INSERT INTO met_language VALUES('2034','jobtip5','投递简历后系统会自动发送一封邮件到接收邮箱','1','45','4','0','cn');
INSERT INTO met_language VALUES('2035','cvset','简历表单设置','1','44','4','0','cn');
INSERT INTO met_language VALUES('2036','cvmanagement','简历信息管理','1','43','4','0','cn');
INSERT INTO met_language VALUES('2037','cvemail','简历接受邮箱','1','42','4','0','cn');
INSERT INTO met_language VALUES('2038','cvwd','未读','1','41','4','0','cn');
INSERT INTO met_language VALUES('2039','cvyd','已读','1','40','4','0','cn');
INSERT INTO met_language VALUES('2040','cvall','全部','1','39','4','0','cn');
INSERT INTO met_language VALUES('2041','cvsha','筛选','1','38','4','0','cn');
INSERT INTO met_language VALUES('2042','cvincAcceptType','简历接收方式','1','37','4','0','cn');
INSERT INTO met_language VALUES('2043','cvincAcceptMail','简历接收邮箱','1','36','4','0','cn');
INSERT INTO met_language VALUES('2044','cvincTip5','如设置为单独职位，将发送到给每个职位设置的邮箱地址','1','35','4','0','cn');
INSERT INTO met_language VALUES('2045','cvincTip4','单独职位','1','34','4','0','cn');
INSERT INTO met_language VALUES('2046','cvincTip3','统一设置','1','33','4','0','cn');
INSERT INTO met_language VALUES('2047','cvincTip2','邮件接收方式','1','32','4','0','cn');
INSERT INTO met_language VALUES('2048','josAlways','不限','1','31','4','0','cn');
INSERT INTO met_language VALUES('2049','cveditorTitle','查看简历','1','30','4','0','cn');
INSERT INTO met_language VALUES('2050','cvTip4','职位已经被删除','1','29','4','0','cn');
INSERT INTO met_language VALUES('2051','cvAddtime','提交时间','1','28','4','0','cn');
INSERT INTO met_language VALUES('2052','cvName','应聘者身份','1','27','4','0','cn');
INSERT INTO met_language VALUES('2053','cvPosition','应聘职位','1','26','4','0','cn');
INSERT INTO met_language VALUES('2054','jobtip3','天 （留空为不限）','1','25','4','0','cn');
INSERT INTO met_language VALUES('2055','jobnow','今天是','1','23','4','0','cn');
INSERT INTO met_language VALUES('2056','jobtip2','注意不要改变格式。','1','24','4','0','cn');
INSERT INTO met_language VALUES('2057','jobdeal','工资待遇','1','22','4','0','cn');
INSERT INTO met_language VALUES('2058','jobCV','简历','1','20','4','0','cn');
INSERT INTO met_language VALUES('2059','jobtip1','人 （留空为不限）','1','21','4','0','cn');
INSERT INTO met_language VALUES('2060','jobpublish','发布日期','1','19','4','0','cn');
INSERT INTO met_language VALUES('2061','joblife','有效时间','1','18','4','0','cn');
INSERT INTO met_language VALUES('2062','jobnum','招聘人数','1','16','4','0','cn');
INSERT INTO met_language VALUES('2063','jobaddress','工作地点','1','17','4','0','cn');
INSERT INTO met_language VALUES('2064','jobposition','招聘职位','1','15','4','0','cn');
INSERT INTO met_language VALUES('2065','setotherTip2','该字段没有启用','1','14','4','0','cn');
INSERT INTO met_language VALUES('2066','setotherTip1','请根据‘模板配置导航’相关说明进行配置，如开启静态页面，修改后需要生成全部静态页面。','1','13','4','0','cn');
INSERT INTO met_language VALUES('2067','setotherItemSet','其他内容配置','1','12','4','0','cn');
INSERT INTO met_language VALUES('2068','setfootstat','底部代码','1','11','4','0','cn');
INSERT INTO met_language VALUES('2069','setfootOther','其他信息','1','10','4','0','cn');
INSERT INTO met_language VALUES('2070','setfootAddressCode','地址邮编','1','8','4','0','cn');
INSERT INTO met_language VALUES('2071','setfootVersion','版权信息','1','7','4','0','cn');
INSERT INTO met_language VALUES('2072','article6','参数设置','1','6','4','0','cn');
INSERT INTO met_language VALUES('2073','article5','复制或移动后请手动生成相应栏目和内容静态页面','1','5','4','0','cn');
INSERT INTO met_language VALUES('2074','article2','图片(需模板支持)','1','2','4','0','cn');
INSERT INTO met_language VALUES('2075','article3','wap显示','1','3','4','0','cn');
INSERT INTO met_language VALUES('2076','article4','排序数值越大越靠前','1','4','4','0','cn');
INSERT INTO met_language VALUES('2077','contentmanagement','内容管理','1','4','0','0','cn');
INSERT INTO met_language VALUES('2078','article1','可选属性','1','1','4','0','cn');
INSERT INTO met_language VALUES('2079','mod8content','查看反馈','1','152','3','0','cn');
INSERT INTO met_language VALUES('2080','mod7content','查看留言','1','151','3','0','cn');
INSERT INTO met_language VALUES('2081','mod6content','查看简历','1','150','3','0','cn');
INSERT INTO met_language VALUES('2082','mod4content','管理下载','1','148','3','0','cn');
INSERT INTO met_language VALUES('2083','mod5content','管理图片','1','149','3','0','cn');
INSERT INTO met_language VALUES('2084','mod3content','管理产品','1','147','3','0','cn');
INSERT INTO met_language VALUES('2085','mod6add','发布职位','1','144','3','0','cn');
INSERT INTO met_language VALUES('2086','mod1content','管理简介','1','145','3','0','cn');
INSERT INTO met_language VALUES('2087','mod2content','管理文章','1','146','3','0','cn');
INSERT INTO met_language VALUES('2088','mod4add','添加下载','1','142','3','0','cn');
INSERT INTO met_language VALUES('2089','mod5add','添加图片','1','143','3','0','cn');
INSERT INTO met_language VALUES('2090','mod3add','添加产品','1','141','3','0','cn');
INSERT INTO met_language VALUES('2091','mod2add','添加文章','1','140','3','0','cn');
INSERT INTO met_language VALUES('2092','copyotherlang5','二级，三级栏目不能单独复制，请连同一级栏目一起复制，或提升为一级栏目','1','139','3','0','cn');
INSERT INTO met_language VALUES('2093','copyotherlang4','栏目在复制语言中已经存在，请直接复制内容','1','138','3','0','cn');
INSERT INTO met_language VALUES('2094','copyotherlang2','复制内容','1','136','3','0','cn');
INSERT INTO met_language VALUES('2095','copyotherlang3','请选择语言！','1','137','3','0','cn');
INSERT INTO met_language VALUES('2096','ctitleinfo','为空则使用SEO参数设置中设置的title构成方式','1','134','3','0','cn');
INSERT INTO met_language VALUES('2097','copyotherlang1','复制到其他语言','1','135','3','0','cn');
INSERT INTO met_language VALUES('2098','listproductre','关联产品','1','132','3','0','cn');
INSERT INTO met_language VALUES('2099','listproductreok','不关联','1','133','3','0','cn');
INSERT INTO met_language VALUES('2100','parameter3','文本','1','123','3','0','cn');
INSERT INTO met_language VALUES('2101','parameter4','多选','1','124','3','0','cn');
INSERT INTO met_language VALUES('2102','parameter5','附件','1','125','3','0','cn');
INSERT INTO met_language VALUES('2103','parameter6','单选','1','126','3','0','cn');
INSERT INTO met_language VALUES('2104','allcategory','所有栏目','1','127','3','0','cn');
INSERT INTO met_language VALUES('2105','parameterMust','是否必填','1','128','3','0','cn');
INSERT INTO met_language VALUES('2106','parameternameexist','菜单名称已经存在','1','129','3','0','cn');
INSERT INTO met_language VALUES('2107','listTitle','设置选项','1','130','3','0','cn');
INSERT INTO met_language VALUES('2108','listAddList','添加新选项','1','131','3','0','cn');
INSERT INTO met_language VALUES('2109','parameter1','简短','1','121','3','0','cn');
INSERT INTO met_language VALUES('2110','parameter2','下拉','1','122','3','0','cn');
INSERT INTO met_language VALUES('2111','parameteradd','添加新字段','1','120','3','0','cn');
INSERT INTO met_language VALUES('2112','parametertype','字段类型','1','119','3','0','cn');
INSERT INTO met_language VALUES('2113','columnmtitle','页面Title','1','118','3','0','cn');
INSERT INTO met_language VALUES('2114','columnmfeedback3','点击开始复制','1','111','3','0','cn');
INSERT INTO met_language VALUES('2115','columnmfeedback4','开始复制','1','112','3','0','cn');
INSERT INTO met_language VALUES('2116','columnmfeedback5','自定义表单设置','1','113','3','0','cn');
INSERT INTO met_language VALUES('2117','columnmfeedback6','自定义反馈表单','1','114','3','0','cn');
INSERT INTO met_language VALUES('2118','columnmfeedback7','设置反馈表单','1','115','3','0','cn');
INSERT INTO met_language VALUES('2119','columnmappend','附加内容：','1','116','3','0','cn');
INSERT INTO met_language VALUES('2120','columnmore','更多','1','117','3','0','cn');
INSERT INTO met_language VALUES('2121','columnmfeedback2','请选择表单','1','110','3','0','cn');
INSERT INTO met_language VALUES('2122','columnmfeedback1','复制表单','1','109','3','0','cn');
INSERT INTO met_language VALUES('2123','columnmwap','wap显示','1','107','3','0','cn');
INSERT INTO met_language VALUES('2124','columnmfeedback','反馈表单设置','1','108','3','0','cn');
INSERT INTO met_language VALUES('2125','columnmnotallow','不允许','1','105','3','0','cn');
INSERT INTO met_language VALUES('2126','columnmlink','友情链接申请：','1','106','3','0','cn');
INSERT INTO met_language VALUES('2127','columnmeditor','编辑栏目','1','103','3','0','cn');
INSERT INTO met_language VALUES('2128','columnmallow','允许','1','104','3','0','cn');
INSERT INTO met_language VALUES('2129','columnmove4','升为顶级栏目','1','101','3','0','cn');
INSERT INTO met_language VALUES('2130','columnmove5','新建文件夹名','1','102','3','0','cn');
INSERT INTO met_language VALUES('2131','columnmove2','至','1','99','3','0','cn');
INSERT INTO met_language VALUES('2132','columnmove3','移动，下级栏目超过1和下级栏目有关联栏目的无法移动','1','100','3','0','cn');
INSERT INTO met_language VALUES('2133','columnmove','移动栏目','1','97','3','0','cn');
INSERT INTO met_language VALUES('2134','columnmove1','移动','1','98','3','0','cn');
INSERT INTO met_language VALUES('2135','columnexplain8','附加内容会显示在此栏目下所有内容页最后，用于描述同样的内容。','1','96','3','0','cn');
INSERT INTO met_language VALUES('2136','columnexplain6','将会复制所选的表单选项和表单设置','1','94','3','0','cn');
INSERT INTO met_language VALUES('2137','columnexplain7','此功能用于老版本兼容（作用于该栏目在前台对应位置的显示）','1','95','3','0','cn');
INSERT INTO met_language VALUES('2138','columnexplain4','设置栏目链接是否在新窗口打开','1','92','3','0','cn');
INSERT INTO met_language VALUES('2139','columnexplain5','关闭后访客无法提交友情链接申请','1','93','3','0','cn');
INSERT INTO met_language VALUES('2140','columnexplain2','设置好选项后，在内容管理中可以直接选择对应选项。','1','90','3','0','cn');
INSERT INTO met_language VALUES('2141','columnexplain3','参数一般用于展示信息的属性，如价格、型号等，设置后在添加内容的时候可以填写对应参数值。','1','91','3','0','cn');
INSERT INTO met_language VALUES('2142','columnexplain1','关联后下面选项将显示对应产品栏目下的产品名称','1','89','3','0','cn');
INSERT INTO met_language VALUES('2143','columnerr8','设置为不允许添加内容的栏目必须有子级栏目','1','88','3','0','cn');
INSERT INTO met_language VALUES('2144','columnerr7','升为一级栏目','1','87','3','0','cn');
INSERT INTO met_language VALUES('2145','columnerr6','此操作将会合并栏目,您确认要移动该栏目吗？','1','86','3','0','cn');
INSERT INTO met_language VALUES('2146','columnerr3','每个语言网站下只能有一个','1','83','3','0','cn');
INSERT INTO met_language VALUES('2147','columnerr4','目录名称已存在，可能已被使用','1','84','3','0','cn');
INSERT INTO met_language VALUES('2148','columnerr5','您确认要移动该栏目吗？','1','85','3','0','cn');
INSERT INTO met_language VALUES('2149','columnerr2','目录名称不能重名','1','82','3','0','cn');
INSERT INTO met_language VALUES('2150','columnerr1','目录名只能是数字或字母','1','81','3','0','cn');
INSERT INTO met_language VALUES('2151','columntip14','为空则使用静态页面设置中设置的URL构成方式，不要加html后缀，不支持特殊字符','1','80','3','0','cn');
INSERT INTO met_language VALUES('2152','columntip13','复制反馈系统配置文件失败，请检测文件是否存在！','1','79','3','0','cn');
INSERT INTO met_language VALUES('2153','columntip12','隐藏所有子栏目','1','78','3','0','cn');
INSERT INTO met_language VALUES('2154','columntip11','展开所有子栏目','1','77','3','0','cn');
INSERT INTO met_language VALUES('2155','columnImg2','栏目图片','1','74','3','0','cn');
INSERT INTO met_language VALUES('2156','columnshow','添加内容','1','75','3','0','cn');
INSERT INTO met_language VALUES('2157','columntip8','设置为不允许后栏目链接将跳转到第一个子级栏目','1','76','3','0','cn');
INSERT INTO met_language VALUES('2158','columnhref','链接地址','1','71','3','0','cn');
INSERT INTO met_language VALUES('2159','columntip7','链接到外部网站需要加http或https,如：https://www.metinfo.cn/','1','72','3','0','cn');
INSERT INTO met_language VALUES('2160','columnImg1','标识图片','1','73','3','0','cn');
INSERT INTO met_language VALUES('2161','columnSEO','搜索引擎优化设置(seo)','1','70','3','0','cn');
INSERT INTO met_language VALUES('2162','columnhtmlname','静态页面名称','1','69','3','0','cn');
INSERT INTO met_language VALUES('2163','columnaddOrder','顺序','1','68','3','0','cn');
INSERT INTO met_language VALUES('2164','columnReverseSort','倒序','1','67','3','0','cn');
INSERT INTO met_language VALUES('2165','columncontentorder','列表页排序方式','1','66','3','0','cn');
INSERT INTO met_language VALUES('2166','columnOutLink','http://','1','65','3','0','cn');
INSERT INTO met_language VALUES('2167','columnnav4','都显示','1','63','3','0','cn');
INSERT INTO met_language VALUES('2168','columnnewwindow','新窗口打开','1','64','3','0','cn');
INSERT INTO met_language VALUES('2169','columnnav3','尾部导航条','1','62','3','0','cn');
INSERT INTO met_language VALUES('2170','columnnav2','头部主导航条','1','61','3','0','cn');
INSERT INTO met_language VALUES('2171','columntip1','请参考','1','59','3','0','cn');
INSERT INTO met_language VALUES('2172','columnnav1','不显示','1','60','3','0','cn');
INSERT INTO met_language VALUES('2173','columnmark1','标识','1','52','3','0','cn');
INSERT INTO met_language VALUES('2174','columnctitle','栏目标题(title)','1','53','3','0','cn');
INSERT INTO met_language VALUES('2175','columnPreName','上级栏目名称','1','54','3','0','cn');
INSERT INTO met_language VALUES('2176','columnorder','同级栏目排序','1','55','3','0','cn');
INSERT INTO met_language VALUES('2177','columnmark','栏目标识','1','56','3','0','cn');
INSERT INTO met_language VALUES('2178','columnnew2','添加子栏目','1','57','3','0','cn');
INSERT INTO met_language VALUES('2179','columnnew3','添加三级栏目','1','58','3','0','cn');
INSERT INTO met_language VALUES('2180','columndocument','目录名称','1','51','3','0','cn');
INSERT INTO met_language VALUES('2181','columnmodule','所属模块','1','50','3','0','cn');
INSERT INTO met_language VALUES('2182','columnnav','导航栏显示','1','49','3','0','cn');
INSERT INTO met_language VALUES('2183','columnnamemarkinfo','其它设置（根据模板配置说明设置）','1','48','3','0','cn');
INSERT INTO met_language VALUES('2184','columnnamemark','栏目修饰名称','1','47','3','0','cn');
INSERT INTO met_language VALUES('2185','contentinfo4','拓展内容四','1','45','3','0','cn');
INSERT INTO met_language VALUES('2186','columnname','栏目名称','1','46','3','0','cn');
INSERT INTO met_language VALUES('2187','contentinfo3','拓展内容三','1','44','3','0','cn');
INSERT INTO met_language VALUES('2188','contentinfo1','拓展内容一','1','42','3','0','cn');
INSERT INTO met_language VALUES('2189','contentinfo2','拓展内容二','1','43','3','0','cn');
INSERT INTO met_language VALUES('2190','contentinfo','详细内容','1','41','3','0','cn');
INSERT INTO met_language VALUES('2191','category','所属栏目','1','40','3','0','cn');
INSERT INTO met_language VALUES('2192','editinfo','修改内容','1','39','3','0','cn');
INSERT INTO met_language VALUES('2193','addinfo','添加内容','1','38','3','0','cn');
INSERT INTO met_language VALUES('2194','downloadsize','文件大小','1','37','3','0','cn');
INSERT INTO met_language VALUES('2195','modsearch','请输入信息标题关键字','1','33','3','0','cn');
INSERT INTO met_language VALUES('2196','downloadurl','下载地址','1','36','3','0','cn');
INSERT INTO met_language VALUES('2197','downloadaccess','前台下载权限','1','35','3','0','cn');
INSERT INTO met_language VALUES('2198','modnull','留空','1','34','3','0','cn');
INSERT INTO met_language VALUES('2199','modtimenow1','注意不要改变格式。','1','32','3','0','cn');
INSERT INTO met_language VALUES('2200','modtimenow','当前时间为：','1','31','3','0','cn');
INSERT INTO met_language VALUES('2201','modhits','点击次数越多，热门信息中排名越靠前','1','30','3','0','cn');
INSERT INTO met_language VALUES('2202','modpublish','发布人','1','29','3','0','cn');
INSERT INTO met_language VALUES('2203','modimgurls','缩略图','1','28','3','0','cn');
INSERT INTO met_language VALUES('2204','modimgauto','自动生成缩略图','1','27','3','0','cn');
INSERT INTO met_language VALUES('2205','modimgurl','图片地址','1','26','3','0','cn');
INSERT INTO met_language VALUES('2206','modmodulewyok','该模块已经被使用','1','24','3','0','cn');
INSERT INTO met_language VALUES('2207','modFilenameok','静态页面名已存在','1','23','3','0','cn');
INSERT INTO met_language VALUES('2208','modFiledir','创建文件夹失败','1','22','3','0','cn');
INSERT INTO met_language VALUES('2209','modClass3','三级栏目','1','21','3','0','cn');
INSERT INTO met_language VALUES('2210','modClass2','二级栏目','1','20','3','0','cn');
INSERT INTO met_language VALUES('2211','modClass1','一级栏目','1','19','3','0','cn');
INSERT INTO met_language VALUES('2212','modOuturl','链接地址不能为空','1','18','3','0','cn');
INSERT INTO met_language VALUES('2213','modModule','栏目所属模块不能为空','1','17','3','0','cn');
INSERT INTO met_language VALUES('2214','modFoldername','栏目文件夹不能为空','1','16','3','0','cn');
INSERT INTO met_language VALUES('2215','mod101','图片列表','1','15','3','0','cn');
INSERT INTO met_language VALUES('2216','mod7','留言系统','1','8','3','0','cn');
INSERT INTO met_language VALUES('2217','mod8','反馈系统','1','9','3','0','cn');
INSERT INTO met_language VALUES('2218','mod9','友情链接','1','10','3','0','cn');
INSERT INTO met_language VALUES('2219','mod10','会员中心','1','11','3','0','cn');
INSERT INTO met_language VALUES('2220','mod11','全站搜索','1','12','3','0','cn');
INSERT INTO met_language VALUES('2221','mod12','网站地图','1','13','3','0','cn');
INSERT INTO met_language VALUES('2222','mod100','产品列表','1','14','3','0','cn');
INSERT INTO met_language VALUES('2223','unitytxt_76','缩略图尺寸设置','1','440','8','0','cn');
INSERT INTO met_language VALUES('2224','unitytxt_77','更新内容时候自动更新网站地图','1','441','8','0','cn');
INSERT INTO met_language VALUES('2225','unitytxt_75','模板设置','1','439','8','0','cn');
INSERT INTO met_language VALUES('2226','mod6','招聘模块','1','7','3','0','cn');
INSERT INTO met_language VALUES('2227','mod3','产品模块','1','4','3','0','cn');
INSERT INTO met_language VALUES('2228','mod4','下载模块','1','5','3','0','cn');
INSERT INTO met_language VALUES('2229','mod5','图片模块','1','6','3','0','cn');
INSERT INTO met_language VALUES('2230','mod2','文章模块','1','3','3','0','cn');
INSERT INTO met_language VALUES('2231','mod1','简介模块','1','2','3','0','cn');
INSERT INTO met_language VALUES('2232','modout','外部模块','1','1','3','0','cn');
INSERT INTO met_language VALUES('2233','tmptips','模板配置说明','1','128','2','0','cn');
INSERT INTO met_language VALUES('2234','columnconfiguration','栏目配置','1','3','0','0','cn');
INSERT INTO met_language VALUES('2235','skinerr3','请选择','1','127','2','0','cn');
INSERT INTO met_language VALUES('2236','onlineskype','SKYPE','1','124','2','0','cn');
INSERT INTO met_language VALUES('2237','skinerr1','如果只有一张展示图片，设置样式将不会生效','1','125','2','0','cn');
INSERT INTO met_language VALUES('2238','skinerr2','更多模板','1','126','2','0','cn');
INSERT INTO met_language VALUES('2239','onliemsn','MSN','1','123','2','0','cn');
INSERT INTO met_language VALUES('2240','onlieqq','QQ','1','122','2','0','cn');
INSERT INTO met_language VALUES('2241','indexonlieno','取消','1','121','2','0','cn');
INSERT INTO met_language VALUES('2242','indexonlieok','确认','1','120','2','0','cn');
INSERT INTO met_language VALUES('2243','indexonlieimg','选择图片风格','1','119','2','0','cn');
INSERT INTO met_language VALUES('2244','onlinetel1','支持HTML语言，可加入第三方代码','1','117','2','0','cn');
INSERT INTO met_language VALUES('2245','indexonlieicon','更改图标','1','118','2','0','cn');
INSERT INTO met_language VALUES('2246','onlinetel','电话或其他说明','1','116','2','0','cn');
INSERT INTO met_language VALUES('2247','onlineskin','风格','1','114','2','0','cn');
INSERT INTO met_language VALUES('2248','onlineimg','图标','1','115','2','0','cn');
INSERT INTO met_language VALUES('2249','onlineskintype','颜色风格','1','113','2','0','cn');
INSERT INTO met_language VALUES('2250','onlinegray','灰色','1','112','2','0','cn');
INSERT INTO met_language VALUES('2251','onlinegreen','绿色','1','111','2','0','cn');
INSERT INTO met_language VALUES('2252','onlinered','淡红','1','109','2','0','cn');
INSERT INTO met_language VALUES('2253','onlinepurple','紫色','1','110','2','0','cn');
INSERT INTO met_language VALUES('2254','onlineblue','浅蓝','1','108','2','0','cn');
INSERT INTO met_language VALUES('2255','onlinealibaba','阿里旺旺','1','107','2','0','cn');
INSERT INTO met_language VALUES('2256','onlinetaobao','淘宝旺旺','1','106','2','0','cn');
INSERT INTO met_language VALUES('2257','onlineName','客服名称','1','105','2','0','cn');
INSERT INTO met_language VALUES('2258','onlineAdd','添加新客服','1','104','2','0','cn');
INSERT INTO met_language VALUES('2259','onlineTitle','客服列表','1','103','2','0','cn');
INSERT INTO met_language VALUES('2260','setskinOnline8','居右时滚动位置','1','101','2','0','cn');
INSERT INTO met_language VALUES('2261','setskinOnline9','固定于页面右边','1','102','2','0','cn');
INSERT INTO met_language VALUES('2262','setskinOnline7','距离浏览器右边','1','100','2','0','cn');
INSERT INTO met_language VALUES('2263','setskinOnline4','居左时滚动位置','1','97','2','0','cn');
INSERT INTO met_language VALUES('2264','setskinOnline5','距离浏览器左边','1','98','2','0','cn');
INSERT INTO met_language VALUES('2265','setskinOnline6','距离浏览器顶部','1','99','2','0','cn');
INSERT INTO met_language VALUES('2266','setskinOnline3','居右随屏幕滚动','1','96','2','0','cn');
INSERT INTO met_language VALUES('2267','indexflashaddflash','添加Banner','1','92','2','0','cn');
INSERT INTO met_language VALUES('2268','setskinOnline','在线交流方式','1','93','2','0','cn');
INSERT INTO met_language VALUES('2269','setskinOnline1','固定于页面左边','1','94','2','0','cn');
INSERT INTO met_language VALUES('2270','setskinOnline2','居左随屏幕滚动','1','95','2','0','cn');
INSERT INTO met_language VALUES('2271','indexflashaddimg','添加图片','1','91','2','0','cn');
INSERT INTO met_language VALUES('2272','indexflashexplain9','请在前面加 http://','1','90','2','0','cn');
INSERT INTO met_language VALUES('2273','indexflashexplain7','对应栏目的Banner模式','1','89','2','0','cn');
INSERT INTO met_language VALUES('2274','indexflashexplain6','暂时没有设置Banner的栏目，请设置后再编辑。','1','88','2','0','cn');
INSERT INTO met_language VALUES('2275','indexflashexplain5','一般不用设置','1','87','2','0','cn');
INSERT INTO met_language VALUES('2276','indexflashexplain3','对应栏目的Banner尺寸','1','85','2','0','cn');
INSERT INTO met_language VALUES('2277','indexflashexplain4','图片轮播展示方式的1和3不支持PNG图片','1','86','2','0','cn');
INSERT INTO met_language VALUES('2278','indexflashexplain2','跳转到Banner设置','1','84','2','0','cn');
INSERT INTO met_language VALUES('2279','indexflashexplain1','Banner一般位于网站导航下方，可以每个栏目显示不同的Banner，也可以统一设置','1','83','2','0','cn');
INSERT INTO met_language VALUES('2280','flashmodify1','中修改','1','82','2','0','cn');
INSERT INTO met_language VALUES('2281','flashmodify','请在','1','81','2','0','cn');
INSERT INTO met_language VALUES('2282','flashGlobal','默认设置','1','80','2','0','cn');
INSERT INTO met_language VALUES('2283','flashMode2','Flash动画','1','77','2','0','cn');
INSERT INTO met_language VALUES('2284','flashMode3','全部图片','1','78','2','0','cn');
INSERT INTO met_language VALUES('2285','flashHome','网站首页','1','79','2','0','cn');
INSERT INTO met_language VALUES('2286','flashMode','展示方式','1','75','2','0','cn');
INSERT INTO met_language VALUES('2287','flashMode1','图片轮播','1','76','2','0','cn');
INSERT INTO met_language VALUES('2288','setflashcolumn','应用栏目','1','74','2','0','cn');
INSERT INTO met_language VALUES('2289','setflashimgtext','样式','1','73','2','0','cn');
INSERT INTO met_language VALUES('2290','setflashimg','图片轮播样式','1','72','2','0','cn');
INSERT INTO met_language VALUES('2291','setflashset','FLASH 配置','1','71','2','0','cn');
INSERT INTO met_language VALUES('2292','setflashImgHref','链接地址','1','68','2','0','cn');
INSERT INTO met_language VALUES('2293','setflashUrl','图片/Flash地址','1','69','2','0','cn');
INSERT INTO met_language VALUES('2294','setflashBg','Flash背景','1','70','2','0','cn');
INSERT INTO met_language VALUES('2295','setflashHeight','高','1','66','2','0','cn');
INSERT INTO met_language VALUES('2296','setflashImgUrl','图片地址','1','67','2','0','cn');
INSERT INTO met_language VALUES('2297','setflashPixel','像素','1','65','2','0','cn');
INSERT INTO met_language VALUES('2298','setflashWidth','宽','1','64','2','0','cn');
INSERT INTO met_language VALUES('2299','setflashSize','Banner尺寸','1','63','2','0','cn');
INSERT INTO met_language VALUES('2300','indexsetskin','首页风格','1','59','2','0','cn');
INSERT INTO met_language VALUES('2301','setflashBelong','所属栏目','1','60','2','0','cn');
INSERT INTO met_language VALUES('2302','setflashName','图片标题','1','61','2','0','cn');
INSERT INTO met_language VALUES('2303','setflashMode3','单张图片','1','62','2','0','cn');
INSERT INTO met_language VALUES('2304','indexsetImgLink','图片链接显示数','1','56','2','0','cn');
INSERT INTO met_language VALUES('2305','indexsetIntroduce','首页简介内容','1','58','2','0','cn');
INSERT INTO met_language VALUES('2306','indexsetWordLink','文字链接显示数','1','57','2','0','cn');
INSERT INTO met_language VALUES('2307','indexsetFriendly','友情链接','1','55','2','0','cn');
INSERT INTO met_language VALUES('2308','printpage','打印此页','1','52','2','0','cn');
INSERT INTO met_language VALUES('2309','closebutton','关闭按钮','1','53','2','0','cn');
INSERT INTO met_language VALUES('2310','indexsetnum','显示数','1','54','2','0','cn');
INSERT INTO met_language VALUES('2311','skinunder','下','1','51','2','0','cn');
INSERT INTO met_language VALUES('2312','skinindexno','隐藏','1','49','2','0','cn');
INSERT INTO met_language VALUES('2313','skinindexexplain1','从4.0版本升级到5.0的用户，设置为隐藏后，如发现前台对应位置出现多余的竖线，请到官网重新下载对应模板。','1','50','2','0','cn');
INSERT INTO met_language VALUES('2314','skinindexok','显示','1','48','2','0','cn');
INSERT INTO met_language VALUES('2315','skinindex','设为首页和收藏本站','1','47','2','0','cn');
INSERT INTO met_language VALUES('2316','skinsetup','模板设置','1','46','2','0','cn');
INSERT INTO met_language VALUES('2317','skinnumber','编号','1','45','2','0','cn');
INSERT INTO met_language VALUES('2318','skinstyle','风格','1','43','2','0','cn');
INSERT INTO met_language VALUES('2319','skindescription','描述','1','44','2','0','cn');
INSERT INTO met_language VALUES('2320','skinusenow','启用','1','40','2','0','cn');
INSERT INTO met_language VALUES('2321','skinused','已启用','1','41','2','0','cn');
INSERT INTO met_language VALUES('2322','skininfo','信息','1','42','2','0','cn');
INSERT INTO met_language VALUES('2323','skinuse','立即启用','1','39','2','0','cn');
INSERT INTO met_language VALUES('2324','skinmore','获取更多模板风格','1','38','2','0','cn');
INSERT INTO met_language VALUES('2325','skinexplain2','前台将更换为该风格','1','37','2','0','cn');
INSERT INTO met_language VALUES('2326','skintemplatedescription','模板描述','1','34','2','0','cn');
INSERT INTO met_language VALUES('2327','skinup','模板上传','1','35','2','0','cn');
INSERT INTO met_language VALUES('2328','skinexplain1','上传后记得点保存，仅支持zip格式','1','36','2','0','cn');
INSERT INTO met_language VALUES('2329','skintemplatename','模板名称','1','33','2','0','cn');
INSERT INTO met_language VALUES('2330','skintypeset','模板设置','1','32','2','0','cn');
INSERT INTO met_language VALUES('2331','skinbaseset','基本设置','1','31','2','0','cn');
INSERT INTO met_language VALUES('2332','skinset','参数设置','1','30','2','0','cn');
INSERT INTO met_language VALUES('2333','skinAddNew','添加新模板','1','26','2','0','cn');
INSERT INTO met_language VALUES('2334','skinname','风格名称','1','27','2','0','cn');
INSERT INTO met_language VALUES('2335','skinadd','风格添加','1','28','2','0','cn');
INSERT INTO met_language VALUES('2336','skinaddinfo1','浏览上传后会自动获取文件夹名称(手动上传需传至系统根目录下的templates文件夹中)','1','29','2','0','cn');
INSERT INTO met_language VALUES('2337','skinIntroduce','风格描述','1','25','2','0','cn');
INSERT INTO met_language VALUES('2338','skinDocument','文件夹名称','1','24','2','0','cn');
INSERT INTO met_language VALUES('2339','setskincontentxian','页脚显示','1','23','2','0','cn');
INSERT INTO met_language VALUES('2340','settopcolumns','一级栏目','1','21','2','0','cn');
INSERT INTO met_language VALUES('2341','setpnorder','上一条下一条翻页范围','1','20','2','0','cn');
INSERT INTO met_language VALUES('2342','infoNoTem','该模板没有相关的配置说明！','1','19','2','0','cn');
INSERT INTO met_language VALUES('2343','setskinimgdetail','展示图片风格','1','18','2','0','cn');
INSERT INTO met_language VALUES('2344','setskinproduct2','显示当前栏目下级栏目列表','1','17','2','0','cn');
INSERT INTO met_language VALUES('2345','setskinproduct1','显示栏目下所有信息列表','1','16','2','0','cn');
INSERT INTO met_language VALUES('2346','setskinpage','翻页样式','1','15','2','0','cn');
INSERT INTO met_language VALUES('2347','setskindatecontent','时间显示格式','1','14','2','0','cn');
INSERT INTO met_language VALUES('2348','setskindatelist','时间显示格式','1','13','2','0','cn');
INSERT INTO met_language VALUES('2349','setskinhot1','点击次数超过','1','10','2','0','cn');
INSERT INTO met_language VALUES('2350','setskinhot3','（需要前台模板支持）','1','12','2','0','cn');
INSERT INTO met_language VALUES('2351','setskinhot2','次被点击的信息显示','1','11','2','0','cn');
INSERT INTO met_language VALUES('2352','setskinhot','热门信息','1','9','2','0','cn');
INSERT INTO met_language VALUES('2353','setskinnews3','（需要前台模板支持）','1','8','2','0','cn');
INSERT INTO met_language VALUES('2354','setskinNumOfPage','每页显示','1','3','2','0','cn');
INSERT INTO met_language VALUES('2355','setskinDefault','默认风格','1','4','2','0','cn');
INSERT INTO met_language VALUES('2356','setskinnews','最新信息','1','5','2','0','cn');
INSERT INTO met_language VALUES('2357','setskinnews1','最近','1','6','2','0','cn');
INSERT INTO met_language VALUES('2358','setskinnews2','天内发表的信息显示','1','7','2','0','cn');
INSERT INTO met_language VALUES('2359','setskinAdd','添加模板','1','1','2','0','cn');
INSERT INTO met_language VALUES('2360','setskinListPage','列表页','1','2','2','0','cn');
INSERT INTO met_language VALUES('2361','interfacestyle','界面风格','1','2','0','0','cn');
INSERT INTO met_language VALUES('2362','langtips2','点击切换到网站语言：','1','428','1','0','cn');
INSERT INTO met_language VALUES('2363','automatic_upgrade','漏洞自动修复','1','424','1','0','cn');
INSERT INTO met_language VALUES('2364','authTip14','服务器验证失败','1','425','1','0','cn');
INSERT INTO met_language VALUES('2365','langtips1','当前后台管理的网站语言：','1','427','1','0','cn');
INSERT INTO met_language VALUES('2366','setbasicTip13','默认邮箱服务方式为TLS（咨询空间商获得）<br />如果使用TLS方式25端口无法发送邮件，请尝试使用SSL方式465端口发件','1','422','1','0','cn');
INSERT INTO met_language VALUES('2367','automatic_upgrade_mark','开启后如果有漏洞补丁或BUG补丁发布，程序会自动下载并修复','1','423','1','0','cn');
INSERT INTO met_language VALUES('2368','setbasicSMTPWay','发送方式','1','420','1','0','cn');
INSERT INTO met_language VALUES('2369','setbasicTip12','用于邮件发送端口（咨询邮箱服务商获得，TLS一般为25，SSL一般为465）','1','421','1','0','cn');
INSERT INTO met_language VALUES('2370','about','关于我们','1','418','1','0','cn');
INSERT INTO met_language VALUES('2371','setbasicSMTPPort','发送端口','1','419','1','0','cn');
INSERT INTO met_language VALUES('2372','temexists2','该风格正在被使用，请先切换至其它风格后再删除！','1','415','1','0','cn');
INSERT INTO met_language VALUES('2373','metadmintext1','您修改了缩略图尺寸，为了防止以前上传的图片变形，请到内容管理-批量操作-批量缩略图，重新生成缩略图。','1','417','1','0','cn');
INSERT INTO met_language VALUES('2374','fileerr1','打开配置文件失败！不存在该文件或者没有可写的权限','1','416','1','0','cn');
INSERT INTO met_language VALUES('2375','temexists1','已经存在该风格','1','414','1','0','cn');
INSERT INTO met_language VALUES('2376','password30','请确保后台邮箱服务器设置正确','1','413','1','0','cn');
INSERT INTO met_language VALUES('2377','password29','用电子邮箱找回','1','412','1','0','cn');
INSERT INTO met_language VALUES('2378','password28','短信资费说明','1','411','1','0','cn');
INSERT INTO met_language VALUES('2379','password27','用手机号码找回','1','410','1','0','cn');
INSERT INTO met_language VALUES('2380','password25','新密码：','1','408','1','0','cn');
INSERT INTO met_language VALUES('2381','password26','再输入：','1','409','1','0','cn');
INSERT INTO met_language VALUES('2382','password20','下一步','1','403','1','0','cn');
INSERT INTO met_language VALUES('2383','password21','返回登录','1','404','1','0','cn');
INSERT INTO met_language VALUES('2384','password22','手机号码','1','405','1','0','cn');
INSERT INTO met_language VALUES('2385','password23','请输入校验码(6位数字)：','1','406','1','0','cn');
INSERT INTO met_language VALUES('2386','password24','用户名：','1','407','1','0','cn');
INSERT INTO met_language VALUES('2387','password17','校验码错误次数太多，请重新验证！','1','400','1','0','cn');
INSERT INTO met_language VALUES('2388','password18','校验码错误，请重试！','1','401','1','0','cn');
INSERT INTO met_language VALUES('2389','password19','数据错误，请重试！','1','402','1','0','cn');
INSERT INTO met_language VALUES('2390','password16','验证成功！请设置您新的密码。','1','399','1','0','cn');
INSERT INTO met_language VALUES('2391','password14','没有找到该用户的邮箱地址，请通过其它方式找回密码','1','397','1','0','cn');
INSERT INTO met_language VALUES('2392','password15','请输入校验码','1','398','1','0','cn');
INSERT INTO met_language VALUES('2393','password13','没有开启短信找回密码功能','1','396','1','0','cn');
INSERT INTO met_language VALUES('2394','password12','经过网关时，网络通讯异常可能会造成短信丢失，或者您会延时收到短信，请您耐心等待一下或稍后再试一下。','1','395','1','0','cn');
INSERT INTO met_language VALUES('2395','password11','请输入您手机接受到的短信校验码，然后点下一步。','1','394','1','0','cn');
INSERT INTO met_language VALUES('2396','password10','序号','1','393','1','0','cn');
INSERT INTO met_language VALUES('2397','password8','没有找到对应该手机的用户，请通过其它方式找回密码','1','391','1','0','cn');
INSERT INTO met_language VALUES('2398','password9','您请求重新设置密码，效验码','1','392','1','0','cn');
INSERT INTO met_language VALUES('2399','password7','没有找到该用户','1','390','1','0','cn');
INSERT INTO met_language VALUES('2400','password6','没有找到该用户的手机号码，请通过其它方式找回密码','1','389','1','0','cn');
INSERT INTO met_language VALUES('2401','password5','请输入您的用户名或电子邮箱地址：','1','388','1','0','cn');
INSERT INTO met_language VALUES('2402','password4','请输入您的用户名或电子邮箱地址。您会收到一封包含创建新密码链接的电子邮件。','1','387','1','0','cn');
INSERT INTO met_language VALUES('2403','password3','请输入您的用户名或手机号码：','1','386','1','0','cn');
INSERT INTO met_language VALUES('2404','password2','请输入您的用户名或手机号码，然后点下一步，您会收到一个短信校验码。','1','385','1','0','cn');
INSERT INTO met_language VALUES('2405','password1','请选择找回密码的方式：','1','384','1','0','cn');
INSERT INTO met_language VALUES('2406','lang64','中文(简体)','1','383','1','0','cn');
INSERT INTO met_language VALUES('2407','lang62','越南语','1','381','1','0','cn');
INSERT INTO met_language VALUES('2408','lang63','中文(繁体)','1','382','1','0','cn');
INSERT INTO met_language VALUES('2409','lang61','英语','1','380','1','0','cn');
INSERT INTO met_language VALUES('2410','lang60','印尼语','1','379','1','0','cn');
INSERT INTO met_language VALUES('2411','lang59','乌尔都语','1','378','1','0','cn');
INSERT INTO met_language VALUES('2412','lang58','印度的泰米尔语','1','377','1','0','cn');
INSERT INTO met_language VALUES('2413','lang57','印度的泰卢固语','1','376','1','0','cn');
INSERT INTO met_language VALUES('2414','lang56','印度的卡纳达语','1','375','1','0','cn');
INSERT INTO met_language VALUES('2415','lang55','印地语','1','374','1','0','cn');
INSERT INTO met_language VALUES('2416','lang54','意第绪语','1','373','1','0','cn');
INSERT INTO met_language VALUES('2417','lang53','意大利语','1','372','1','0','cn');
INSERT INTO met_language VALUES('2418','lang52','亚美尼亚语','1','371','1','0','cn');
INSERT INTO met_language VALUES('2419','lang48','希腊语','1','367','1','0','cn');
INSERT INTO met_language VALUES('2420','lang49','西班牙的巴斯克语','1','368','1','0','cn');
INSERT INTO met_language VALUES('2421','lang50','西班牙语','1','369','1','0','cn');
INSERT INTO met_language VALUES('2422','lang51','匈牙利语','1','370','1','0','cn');
INSERT INTO met_language VALUES('2423','lang47','希伯来语','1','366','1','0','cn');
INSERT INTO met_language VALUES('2424','lang46','乌克兰语','1','365','1','0','cn');
INSERT INTO met_language VALUES('2425','lang45','威尔士语','1','364','1','0','cn');
INSERT INTO met_language VALUES('2426','lang43','泰语','1','362','1','0','cn');
INSERT INTO met_language VALUES('2427','lang44','土耳其语','1','363','1','0','cn');
INSERT INTO met_language VALUES('2428','lang42','斯瓦希里语','1','361','1','0','cn');
INSERT INTO met_language VALUES('2429','lang37','日语','1','356','1','0','cn');
INSERT INTO met_language VALUES('2430','lang38','瑞典语','1','357','1','0','cn');
INSERT INTO met_language VALUES('2431','lang39','塞尔维亚语','1','358','1','0','cn');
INSERT INTO met_language VALUES('2432','lang40','斯洛伐克语','1','359','1','0','cn');
INSERT INTO met_language VALUES('2433','lang41','斯洛文尼亚语','1','360','1','0','cn');
INSERT INTO met_language VALUES('2434','lang36','葡萄牙语','1','355','1','0','cn');
INSERT INTO met_language VALUES('2435','lang35','挪威语','1','354','1','0','cn');
INSERT INTO met_language VALUES('2436','lang34','孟加拉语','1','353','1','0','cn');
INSERT INTO met_language VALUES('2437','lang33','马其顿语','1','352','1','0','cn');
INSERT INTO met_language VALUES('2438','lang32','马来语','1','351','1','0','cn');
INSERT INTO met_language VALUES('2439','lang31','马耳他语','1','350','1','0','cn');
INSERT INTO met_language VALUES('2440','lang30','罗马尼亚语','1','349','1','0','cn');
INSERT INTO met_language VALUES('2441','lang29','立陶宛语','1','348','1','0','cn');
INSERT INTO met_language VALUES('2442','lang28','拉脱维亚语','1','347','1','0','cn');
INSERT INTO met_language VALUES('2443','lang27','拉丁语','1','346','1','0','cn');
INSERT INTO met_language VALUES('2444','lang26','克罗地亚语','1','345','1','0','cn');
INSERT INTO met_language VALUES('2445','lang25','捷克语','1','344','1','0','cn');
INSERT INTO met_language VALUES('2446','lang24','加泰罗尼亚语','1','343','1','0','cn');
INSERT INTO met_language VALUES('2447','lang23','加利西亚语','1','342','1','0','cn');
INSERT INTO met_language VALUES('2448','lang22','荷兰语','1','341','1','0','cn');
INSERT INTO met_language VALUES('2449','lang21','韩语','1','340','1','0','cn');
INSERT INTO met_language VALUES('2450','lang20','海地克里奥尔语','1','339','1','0','cn');
INSERT INTO met_language VALUES('2451','lang19','古吉拉特语','1','338','1','0','cn');
INSERT INTO met_language VALUES('2452','lang18','格鲁吉亚语','1','337','1','0','cn');
INSERT INTO met_language VALUES('2453','lang17','芬兰语','1','336','1','0','cn');
INSERT INTO met_language VALUES('2454','lang16','菲律宾语','1','335','1','0','cn');
INSERT INTO met_language VALUES('2455','lang14','俄语','1','333','1','0','cn');
INSERT INTO met_language VALUES('2456','lang11','布尔语(南非荷兰语)','1','330','1','0','cn');
INSERT INTO met_language VALUES('2457','lang15','法语','1','334','1','0','cn');
INSERT INTO met_language VALUES('2458','lang12','丹麦语','1','331','1','0','cn');
INSERT INTO met_language VALUES('2459','lang13','德语','1','332','1','0','cn');
INSERT INTO met_language VALUES('2460','lang3','阿塞拜疆语','1','322','1','0','cn');
INSERT INTO met_language VALUES('2461','lang4','爱尔兰语','1','323','1','0','cn');
INSERT INTO met_language VALUES('2462','lang5','爱沙尼亚语','1','324','1','0','cn');
INSERT INTO met_language VALUES('2463','lang6','白俄罗斯语','1','325','1','0','cn');
INSERT INTO met_language VALUES('2464','lang7','保加利亚语','1','326','1','0','cn');
INSERT INTO met_language VALUES('2465','lang8','冰岛语','1','327','1','0','cn');
INSERT INTO met_language VALUES('2466','lang9','波兰语','1','328','1','0','cn');
INSERT INTO met_language VALUES('2467','lang10','波斯语','1','329','1','0','cn');
INSERT INTO met_language VALUES('2468','lang2','阿拉伯语','1','321','1','0','cn');
INSERT INTO met_language VALUES('2469','lang1','阿尔巴尼亚语','1','320','1','0','cn');
INSERT INTO met_language VALUES('2470','langselect','选择语言','1','318','1','0','cn');
INSERT INTO met_language VALUES('2471','langselect1','请选择语言','1','319','1','0','cn');
INSERT INTO met_language VALUES('2472','langadminadd','后台语言添加','1','315','1','0','cn');
INSERT INTO met_language VALUES('2473','langwebmanage','网站语言','1','316','1','0','cn');
INSERT INTO met_language VALUES('2474','langadminmanage','后台语言','1','317','1','0','cn');
INSERT INTO met_language VALUES('2475','langwebadd','网站语言添加','1','314','1','0','cn');
INSERT INTO met_language VALUES('2476','langexplain11','同步官方语言包，将会覆盖当前语言数据，是否继续','1','312','1','0','cn');
INSERT INTO met_language VALUES('2477','langexplain12','该语言已经被关闭，请开启后再设置默认语言。','1','313','1','0','cn');
INSERT INTO met_language VALUES('2478','langexplain10','未指定同步语言！','1','311','1','0','cn');
INSERT INTO met_language VALUES('2479','langexplain8','在线下载自动翻译的语言包，本地语言则复制已添加语言的语言包（语言包可以自行修改从而更好的满足使用需要）','1','309','1','0','cn');
INSERT INTO met_language VALUES('2480','langexplain9','不同步','1','310','1','0','cn');
INSERT INTO met_language VALUES('2481','langexplain7','从服务器远程下载基础语言包，基础语言仅包含翻译过的前台部分文字信息。','1','308','1','0','cn');
INSERT INTO met_language VALUES('2482','langexplain6','本地语言','1','307','1','0','cn');
INSERT INTO met_language VALUES('2483','langexplain5','在线下载','1','306','1','0','cn');
INSERT INTO met_language VALUES('2484','langexplain4','复制已经有语言的基础语言包，譬如复制英文，则新语言的前台部分文字会是英文。','1','305','1','0','cn');
INSERT INTO met_language VALUES('2485','langexplain3','基础语言包','1','304','1','0','cn');
INSERT INTO met_language VALUES('2486','langexplain2','语言标识','1','303','1','0','cn');
INSERT INTO met_language VALUES('2487','langexplain1','对应前台网站页面部分文字，注意不要加特殊符号，点击底部保存按钮后生效。(参数名：值)','1','302','1','0','cn');
INSERT INTO met_language VALUES('2488','upfiletips43','检测更新','1','301','1','0','cn');
INSERT INTO met_language VALUES('2489','upfiletips42','在线升级','1','300','1','0','cn');
INSERT INTO met_language VALUES('2490','upfiletips41','环境','1','299','1','0','cn');
INSERT INTO met_language VALUES('2491','upfiletips40','简称','1','298','1','0','cn');
INSERT INTO met_language VALUES('2492','upfiletips32','交流论坛','1','290','1','0','cn');
INSERT INTO met_language VALUES('2493','upfiletips33','专用主机','1','291','1','0','cn');
INSERT INTO met_language VALUES('2494','upfiletips34','收费模板','1','292','1','0','cn');
INSERT INTO met_language VALUES('2495','upfiletips35','商业授权','1','293','1','0','cn');
INSERT INTO met_language VALUES('2496','upfiletips36','定制开发','1','294','1','0','cn');
INSERT INTO met_language VALUES('2497','upfiletips37','新闻','1','295','1','0','cn');
INSERT INTO met_language VALUES('2498','upfiletips38','服务器信息','1','296','1','0','cn');
INSERT INTO met_language VALUES('2499','upfiletips39','程序名称','1','297','1','0','cn');
INSERT INTO met_language VALUES('2500','upfiletips28','显示在需要支付一定的短信费用(可以在企业应用中在线充值)','1','286','1','0','cn');
INSERT INTO met_language VALUES('2501','upfiletips31','服务与支持','1','289','1','0','cn');
INSERT INTO met_language VALUES('2502','upfiletips30','访问概况','1','288','1','0','cn');
INSERT INTO met_language VALUES('2503','upfiletips29','概况','1','287','1','0','cn');
INSERT INTO met_language VALUES('2504','upfiletips27','短信密码找回','1','285','1','0','cn');
INSERT INTO met_language VALUES('2505','upfiletips25','回收站','1','283','1','0','cn');
INSERT INTO met_language VALUES('2506','upfiletips26','内容管理-回收站','1','284','1','0','cn');
INSERT INTO met_language VALUES('2507','upfiletips24','前台的反馈、留言和简历提交','1','282','1','0','cn');
INSERT INTO met_language VALUES('2508','upfiletips20','拉伸','1','278','1','0','cn');
INSERT INTO met_language VALUES('2509','upfiletips21','留白','1','279','1','0','cn');
INSERT INTO met_language VALUES('2510','upfiletips22','裁减','1','280','1','0','cn');
INSERT INTO met_language VALUES('2511','upfiletips23','生成方式','1','281','1','0','cn');
INSERT INTO met_language VALUES('2512','upfiletips19','水印','1','277','1','0','cn');
INSERT INTO met_language VALUES('2513','upfiletips18','缩略图','1','276','1','0','cn');
INSERT INTO met_language VALUES('2514','upfiletips17','点击测试','1','275','1','0','cn');
INSERT INTO met_language VALUES('2515','upfiletips16','发送测试','1','274','1','0','cn');
INSERT INTO met_language VALUES('2516','upfiletips15','100字以内','1','273','1','0','cn');
INSERT INTO met_language VALUES('2517','upfiletips14','网站描述','1','272','1','0','cn');
INSERT INTO met_language VALUES('2518','upfiletips13','多个关键词请用竖线|隔开，建议3到4个关键词。','1','271','1','0','cn');
INSERT INTO met_language VALUES('2519','upfiletips11','搜索引擎优化设置','1','269','1','0','cn');
INSERT INTO met_language VALUES('2520','upfiletips12','网站关键词','1','270','1','0','cn');
INSERT INTO met_language VALUES('2521','upfiletips10','6.0.0以上版本无需手动设置，当前登陆的网址是：','1','268','1','0','cn');
INSERT INTO met_language VALUES('2522','upfiletips6','录入','1','264','1','0','cn');
INSERT INTO met_language VALUES('2523','upfiletips7','基本信息','1','265','1','0','cn');
INSERT INTO met_language VALUES('2524','upfiletips8','邮箱设置','1','266','1','0','cn');
INSERT INTO met_language VALUES('2525','upfiletips9','网站LOGO','1','267','1','0','cn');
INSERT INTO met_language VALUES('2526','upfiletips5','商业授权查询','1','263','1','0','cn');
INSERT INTO met_language VALUES('2527','upfiletips2','文件管理器','1','260','1','0','cn');
INSERT INTO met_language VALUES('2528','upfiletips3','商业授权说明','1','261','1','0','cn');
INSERT INTO met_language VALUES('2529','upfiletips4','商业授权录入','1','262','1','0','cn');
INSERT INTO met_language VALUES('2530','dataexplain11','网站搬家','1','257','1','0','cn');
INSERT INTO met_language VALUES('2531','dataexplain12','时需要用到整站压缩。','1','258','1','0','cn');
INSERT INTO met_language VALUES('2532','upfiletips1','查看文件列表','1','259','1','0','cn');
INSERT INTO met_language VALUES('2533','dataexplain9','上传文件夹一般不用备份','1','255','1','0','cn');
INSERT INTO met_language VALUES('2534','dataexplain10','数据库备份','1','256','1','0','cn');
INSERT INTO met_language VALUES('2535','dataexplain8','建议每月至少备份一次数据库','1','254','1','0','cn');
INSERT INTO met_language VALUES('2536','dataexplain7','<span style=float:right;>一般在搬家时用，占用较大空间</span>备份数据和文件（数据库、用户文件、程序文件）','1','253','1','0','cn');
INSERT INTO met_language VALUES('2537','dataexplain6','<span style=float:right;>一般不用备份，占用较大空间</span>备份上传的文件（图片、文档等）','1','252','1','0','cn');
INSERT INTO met_language VALUES('2538','dataexplain5','<span style=float:right;>建议每月备份，占用少量空间</span>备份数据（不含上传的文件）','1','251','1','0','cn');
INSERT INTO met_language VALUES('2539','dataexplain4','正在备份，请耐心等待...','1','250','1','0','cn');
INSERT INTO met_language VALUES('2540','dataexplain3','自定义备份数据','1','249','1','0','cn');
INSERT INTO met_language VALUES('2541','dataexplain2','可以上传数据库备份文件，支持sql或zip','1','248','1','0','cn');
INSERT INTO met_language VALUES('2542','dataexplain1','目前没有数据','1','247','1','0','cn');
INSERT INTO met_language VALUES('2543','databackup8','压缩整站','1','245','1','0','cn');
INSERT INTO met_language VALUES('2544','databackup9','暂时没有备份文件','1','246','1','0','cn');
INSERT INTO met_language VALUES('2545','databackup7','全部备份','1','244','1','0','cn');
INSERT INTO met_language VALUES('2546','databackup6','上传文件夹备份','1','243','1','0','cn');
INSERT INTO met_language VALUES('2547','databackup2','恢复','1','239','1','0','cn');
INSERT INTO met_language VALUES('2548','databackup3','下载','1','240','1','0','cn');
INSERT INTO met_language VALUES('2549','databackup4','备份','1','241','1','0','cn');
INSERT INTO met_language VALUES('2550','databackup5','自定义备份数据表','1','242','1','0','cn');
INSERT INTO met_language VALUES('2551','databackup1','备份','1','238','1','0','cn');
INSERT INTO met_language VALUES('2552','setimgTopMid','顶中','1','233','1','0','cn');
INSERT INTO met_language VALUES('2553','setimgmodule_tips','缩略图一般显示在列表页或首页图片展示','1','237','1','0','cn');
INSERT INTO met_language VALUES('2554','setimgLeftMid','左中','1','236','1','0','cn');
INSERT INTO met_language VALUES('2555','setimgLowMid','底中','1','235','1','0','cn');
INSERT INTO met_language VALUES('2556','setimgRightMid','右中','1','234','1','0','cn');
INSERT INTO met_language VALUES('2557','setimgLeftLow','左下','1','232','1','0','cn');
INSERT INTO met_language VALUES('2558','setimgRightLow','右下','1','231','1','0','cn');
INSERT INTO met_language VALUES('2559','setimgRightTop','右上','1','230','1','0','cn');
INSERT INTO met_language VALUES('2560','setimgLeftTop','左上','1','229','1','0','cn');
INSERT INTO met_language VALUES('2561','setimgGray2','烟灰','1','224','1','0','cn');
INSERT INTO met_language VALUES('2562','setimgGray3','深灰','1','225','1','0','cn');
INSERT INTO met_language VALUES('2563','setimgBlue2','灰蓝','1','226','1','0','cn');
INSERT INTO met_language VALUES('2564','setimgMid','中间','1','228','1','0','cn');
INSERT INTO met_language VALUES('2565','setimgPosition','水印位置','1','227','1','0','cn');
INSERT INTO met_language VALUES('2566','setimgYellow2','军黄','1','223','1','0','cn');
INSERT INTO met_language VALUES('2567','setimgYellow1','桔黄','1','222','1','0','cn');
INSERT INTO met_language VALUES('2568','setimgRed5','紫红','1','221','1','0','cn');
INSERT INTO met_language VALUES('2569','setimgRed4','玫红','1','220','1','0','cn');
INSERT INTO met_language VALUES('2570','setimgRed3','暗红','1','219','1','0','cn');
INSERT INTO met_language VALUES('2571','setimgBlue1','淡蓝','1','218','1','0','cn');
INSERT INTO met_language VALUES('2572','setimgRed2','砖红','1','217','1','0','cn');
INSERT INTO met_language VALUES('2573','setimgRed1','综红','1','216','1','0','cn');
INSERT INTO met_language VALUES('2574','setimgGreen3','翠绿','1','215','1','0','cn');
INSERT INTO met_language VALUES('2575','setimgGray1','黄灰','1','214','1','0','cn');
INSERT INTO met_language VALUES('2576','setimgWhite','白色','1','203','1','0','cn');
INSERT INTO met_language VALUES('2577','setimgBlack','黑色','1','204','1','0','cn');
INSERT INTO met_language VALUES('2578','setimgRed','红色','1','205','1','0','cn');
INSERT INTO met_language VALUES('2579','setimgYellow','黄色','1','206','1','0','cn');
INSERT INTO met_language VALUES('2580','setimgGreen','绿色','1','207','1','0','cn');
INSERT INTO met_language VALUES('2581','setimgOrange','橙色','1','208','1','0','cn');
INSERT INTO met_language VALUES('2582','setimgPurple','紫色','1','209','1','0','cn');
INSERT INTO met_language VALUES('2583','setimgBlue','蓝色','1','210','1','0','cn');
INSERT INTO met_language VALUES('2584','setimgBrown','褐色','1','211','1','0','cn');
INSERT INTO met_language VALUES('2585','setimgGreen1','粉绿','1','212','1','0','cn');
INSERT INTO met_language VALUES('2586','setimgGreen2','淡绿','1','213','1','0','cn');
INSERT INTO met_language VALUES('2587','setimgWordAngle','水印文字角度','1','199','1','0','cn');
INSERT INTO met_language VALUES('2588','setimgTip5','水平为0','1','200','1','0','cn');
INSERT INTO met_language VALUES('2589','setimgWordColor','水印文字颜色','1','201','1','0','cn');
INSERT INTO met_language VALUES('2590','setimgTip4','请将字体文件放到后台管理目录include/fonts/下','1','198','1','0','cn');
INSERT INTO met_language VALUES('2591','setimgWordFont','水印文字字体','1','197','1','0','cn');
INSERT INTO met_language VALUES('2592','setimgWordSize2','大图水印文字大小','1','196','1','0','cn');
INSERT INTO met_language VALUES('2593','setimgWord','水印文字','1','193','1','0','cn');
INSERT INTO met_language VALUES('2594','setimgTip3','不支持中文（中文水印需要下载中文字体才能支持）','1','194','1','0','cn');
INSERT INTO met_language VALUES('2595','setimgWordSize','缩略图水印文字大小','1','195','1','0','cn');
INSERT INTO met_language VALUES('2596','setimgImgWatermark','图片水印','1','189','1','0','cn');
INSERT INTO met_language VALUES('2597','setimgImg','缩略图水印图片','1','190','1','0','cn');
INSERT INTO met_language VALUES('2598','setimgImg2','大图水印图片','1','191','1','0','cn');
INSERT INTO met_language VALUES('2599','setimgTip2','仅支持.gif|.png格式','1','192','1','0','cn');
INSERT INTO met_language VALUES('2600','setimgWatermarkType','水印类型','1','187','1','0','cn');
INSERT INTO met_language VALUES('2601','setimgWordWatermark','文字水印','1','188','1','0','cn');
INSERT INTO met_language VALUES('2602','setimgThumb','缩略图片添加','1','186','1','0','cn');
INSERT INTO met_language VALUES('2603','setimgWatermark','添加方式','1','184','1','0','cn');
INSERT INTO met_language VALUES('2604','setimgBigImg','详细大图片添加','1','185','1','0','cn');
INSERT INTO met_language VALUES('2605','setimgrename2','重命名文件名称有利于减少异常','1','183','1','0','cn');
INSERT INTO met_language VALUES('2606','setimgrename','自动重命名','1','181','1','0','cn');
INSERT INTO met_language VALUES('2607','setimgrename1','对上传的文件名自动进行重命名','1','182','1','0','cn');
INSERT INTO met_language VALUES('2608','setimgdeleteimg','自动删除图片','1','177','1','0','cn');
INSERT INTO met_language VALUES('2609','setimgdeleteimg1','开启后删除信息时将自动删除相应图片','1','178','1','0','cn');
INSERT INTO met_language VALUES('2610','setimgWaterok','此功能用于老版本模板兼容，6.0.0以上新模板请不要开启。','1','180','1','0','cn');
INSERT INTO met_language VALUES('2611','setimgWater','自动生成','1','179','1','0','cn');
INSERT INTO met_language VALUES('2612','setimgHeight','高','1','176','1','0','cn');
INSERT INTO met_language VALUES('2613','setimgPixel','像素','1','175','1','0','cn');
INSERT INTO met_language VALUES('2614','setimgWidth','宽','1','174','1','0','cn');
INSERT INTO met_language VALUES('2615','authTip12','正在跳转....请稍后！','1','170','1','0','cn');
INSERT INTO met_language VALUES('2616','authTip13','未购买商业授权','1','171','1','0','cn');
INSERT INTO met_language VALUES('2617','filemaxsize','文件已超出网站限制的最大值','1','172','1','0','cn');
INSERT INTO met_language VALUES('2618','setimgSet','网站图片设置','1','173','1','0','cn');
INSERT INTO met_language VALUES('2619','authTip6','网站名称：','1','164','1','0','cn');
INSERT INTO met_language VALUES('2620','authTip7','授权类型：','1','165','1','0','cn');
INSERT INTO met_language VALUES('2621','authTip8','享有服务：','1','166','1','0','cn');
INSERT INTO met_language VALUES('2622','authTip9','授权日期：','1','167','1','0','cn');
INSERT INTO met_language VALUES('2623','authTip10','到期日期：','1','168','1','0','cn');
INSERT INTO met_language VALUES('2624','authTip11','后台文件夹修改成功！','1','169','1','0','cn');
INSERT INTO met_language VALUES('2625','authTip5','授权域名：','1','163','1','0','cn');
INSERT INTO met_language VALUES('2626','authTip4','您使用的MetInfo企业网站管理系统为免费版，如您将其用于商业用途，请联系MetInfo官方进行授权，感谢您的使用！','1','162','1','0','cn');
INSERT INTO met_language VALUES('2627','authTip3','您的域名没有经过MetInfo企业网站管理系统官方认证','1','161','1','0','cn');
INSERT INTO met_language VALUES('2628','authTip2','您所输入的商业注册码与域名不匹配！','1','160','1','0','cn');
INSERT INTO met_language VALUES('2629','authDomain','授权域名','1','157','1','0','cn');
INSERT INTO met_language VALUES('2630','authKey','密钥','1','158','1','0','cn');
INSERT INTO met_language VALUES('2631','authAuthorizedCode','授权码','1','159','1','0','cn');
INSERT INTO met_language VALUES('2632','authQuery','域名授权查询','1','155','1','0','cn');
INSERT INTO met_language VALUES('2633','authSubmitQuery','查询授权情况','1','156','1','0','cn');
INSERT INTO met_language VALUES('2634','authDetail','查看详细','1','149','1','0','cn');
INSERT INTO met_language VALUES('2635','authGetLicense','获取商业授权步骤','1','150','1','0','cn');
INSERT INTO met_language VALUES('2636','authGet1','第一步、通过了解或试用后明确计划购买MetInfo企业网站系统商业授权','1','151','1','0','cn');
INSERT INTO met_language VALUES('2637','authGet2','第二步、联系MetInfo或各地代理商获取最优化的授权方案，并缴纳费用','1','152','1','0','cn');
INSERT INTO met_language VALUES('2638','authGet3','第三步、添加MetInfo技术支持QQ、MSN等，提交商业授权资料卡','1','153','1','0','cn');
INSERT INTO met_language VALUES('2639','authGet4','第四步、使用官方提供的授权文件替换系统相关文件，并在此输入授权码和密钥','1','154','1','0','cn');
INSERT INTO met_language VALUES('2640','authDifferent4','查看免费版与商业版的详细功能及服务对比','1','148','1','0','cn');
INSERT INTO met_language VALUES('2641','authDifferent1','如您将程序用于商业用途，请购买商业授权，否则我们将保留追究法律责任的权利','1','145','1','0','cn');
INSERT INTO met_language VALUES('2642','authDifferent3','免费版如去除【Powered by MetInfo】版权标识将不能正常运行！MetInfo官方并将追求相应的法律责任！','1','147','1','0','cn');
INSERT INTO met_language VALUES('2643','authDifferent2','免费版仅限个人学习使用，功能没有任何限制，商业用户可以获取专业的技术支持服务','1','146','1','0','cn');
INSERT INTO met_language VALUES('2644','setfiletext2','文件夹下共找到','1','140','1','0','cn');
INSERT INTO met_language VALUES('2645','setfiletext3','个文件','1','141','1','0','cn');
INSERT INTO met_language VALUES('2646','setfiletext4','文件夹及文件夹下的所有文件','1','142','1','0','cn');
INSERT INTO met_language VALUES('2647','authWelcome2','买空间送授权促销活动','1','143','1','0','cn');
INSERT INTO met_language VALUES('2648','authDifferentLicense','商业版和免费版区别','1','144','1','0','cn');
INSERT INTO met_language VALUES('2649','setfilenourl','找不到相应的文件！','1','138','1','0','cn');
INSERT INTO met_language VALUES('2650','setfiletext1','upload为上传根目录，201103为以年月分类的图片文件夹，thumb为缩略图文件夹，watermark为水印大图文件夹','1','139','1','0','cn');
INSERT INTO met_language VALUES('2651','setfiletime','上传时间','1','135','1','0','cn');
INSERT INTO met_language VALUES('2652','setfileview','查看','1','136','1','0','cn');
INSERT INTO met_language VALUES('2653','setsafesq5text','抱歉！该目录没有文件！','1','131','1','0','cn');
INSERT INTO met_language VALUES('2654','setfileno','此文件夹下没有文件！','1','137','1','0','cn');
INSERT INTO met_language VALUES('2655','setfilesize','文件大小','1','134','1','0','cn');
INSERT INTO met_language VALUES('2656','setfiletype','类型','1','133','1','0','cn');
INSERT INTO met_language VALUES('2657','setfilename','文件名称','1','132','1','0','cn');
INSERT INTO met_language VALUES('2658','setsafesq3text','清空','1','129','1','0','cn');
INSERT INTO met_language VALUES('2659','setsafesq4text','目录','1','130','1','0','cn');
INSERT INTO met_language VALUES('2660','setsafemember','前台提交验证码','1','127','1','0','cn');
INSERT INTO met_language VALUES('2661','setsafesq2text','点击','1','128','1','0','cn');
INSERT INTO met_language VALUES('2662','setsafeadmin','后台登录验证码','1','126','1','0','cn');
INSERT INTO met_language VALUES('2663','setsafeupdate','删除升级文件','1','124','1','0','cn');
INSERT INTO met_language VALUES('2664','setsafeupdate1','删除后可以增强网站的安全性能','1','125','1','0','cn');
INSERT INTO met_language VALUES('2665','setsafeinstall','删除安装文件','1','123','1','0','cn');
INSERT INTO met_language VALUES('2666','setsafeadminname1a','修改网站后台文件夹名称（默认为admin）;','1','120','1','0','cn');
INSERT INTO met_language VALUES('2667','setsafeadminname1b','删除栏目配置中的【网站管理】栏目;','1','121','1','0','cn');
INSERT INTO met_language VALUES('2668','setsafeadminname1c','仅创始人可修改，不支持中文，部分空间修改文件名称后需要通过FTP手动修改文件夹名称，当前后台网址：','1','122','1','0','cn');
INSERT INTO met_language VALUES('2669','setsafeadminname','后台文件夹名称','1','118','1','0','cn');
INSERT INTO met_language VALUES('2670','setsafeadminname1','安全建议:','1','119','1','0','cn');
INSERT INTO met_language VALUES('2671','setdbExtractOK','解压及恢复成功','1','117','1','0','cn');
INSERT INTO met_language VALUES('2672','lang_setdbArchiveNo','空间分配内存资源不足，压缩失败，请联系空间商帮助压缩！！！','1','116','1','0','cn');
INSERT INTO met_language VALUES('2673','setdbNotExist','文件不存在','1','114','1','0','cn');
INSERT INTO met_language VALUES('2674','setdbArchiveOK','压缩成功','1','115','1','0','cn');
INSERT INTO met_language VALUES('2675','setdbDBRestoreOK','数据恢复成功','1','113','1','0','cn');
INSERT INTO met_language VALUES('2676','setdbImportOK','导入成功','1','111','1','0','cn');
INSERT INTO met_language VALUES('2677','setdbWriteOK','写入成功!','1','108','1','0','cn');
INSERT INTO met_language VALUES('2678','setdbDBFile','数据库文件','1','110','1','0','cn');
INSERT INTO met_language VALUES('2679','setdbBackupOK','数据库备份完毕!','1','109','1','0','cn');
INSERT INTO met_language VALUES('2680','setdbBackupFile','备份文件','1','107','1','0','cn');
INSERT INTO met_language VALUES('2681','setdbTip4','如果数据文件超出设置大小就会新建分卷。','1','106','1','0','cn');
INSERT INTO met_language VALUES('2682','setdbTip2','数据无法备份到服务器!请检查','1','104','1','0','cn');
INSERT INTO met_language VALUES('2683','setdbTip3','目录是否可写。','1','105','1','0','cn');
INSERT INTO met_language VALUES('2684','setdbSelectTable','请选择要备份的数据表!','1','103','1','0','cn');
INSERT INTO met_language VALUES('2685','setdbDownload','下载','1','102','1','0','cn');
INSERT INTO met_language VALUES('2686','setdbImportData','导入','1','101','1','0','cn');
INSERT INTO met_language VALUES('2687','setdbLack','缺少分卷','1','100','1','0','cn');
INSERT INTO met_language VALUES('2688','setdbFilesize','文件大小','1','97','1','0','cn');
INSERT INTO met_language VALUES('2689','setdbTime','备份时间','1','98','1','0','cn');
INSERT INTO met_language VALUES('2690','setdbNumber','分卷数','1','99','1','0','cn');
INSERT INTO met_language VALUES('2691','setdbsysver','系统版本','1','96','1','0','cn');
INSERT INTO met_language VALUES('2692','setdbFilename','文件名','1','95','1','0','cn');
INSERT INTO met_language VALUES('2693','setdbStart','开始备份数据','1','94','1','0','cn');
INSERT INTO met_language VALUES('2694','setdbAll','共','1','92','1','0','cn');
INSERT INTO met_language VALUES('2695','setdbEveryoneSize','分卷大小','1','93','1','0','cn');
INSERT INTO met_language VALUES('2696','setdbItems','记录条数','1','90','1','0','cn');
INSERT INTO met_language VALUES('2697','setdbSize','大小','1','91','1','0','cn');
INSERT INTO met_language VALUES('2698','setdbTable','数据表','1','89','1','0','cn');
INSERT INTO met_language VALUES('2699','setdbImport','导入备份数据','1','88','1','0','cn');
INSERT INTO met_language VALUES('2700','langshuom','说明','1','86','1','0','cn');
INSERT INTO met_language VALUES('2701','setdbBackup','数据与备份','1','87','1','0','cn');
INSERT INTO met_language VALUES('2702','langtype','语言状态','1','85','1','0','cn');
INSERT INTO met_language VALUES('2703','langvalue','值','1','83','1','0','cn');
INSERT INTO met_language VALUES('2704','langinfo','注释','1','84','1','0','cn');
INSERT INTO met_language VALUES('2705','langnameorder','不可以与其他语言排序重复','1','80','1','0','cn');
INSERT INTO met_language VALUES('2706','langnamerepeat','语言标识不能重复','1','81','1','0','cn');
INSERT INTO met_language VALUES('2707','langone','系统只有一种语言，不能被删除！','1','82','1','0','cn');
INSERT INTO met_language VALUES('2708','langclose2','默认语言无法被关闭','1','79','1','0','cn');
INSERT INTO met_language VALUES('2709','langclose1','只开启了一种语言，无法被关闭','1','78','1','0','cn');
INSERT INTO met_language VALUES('2710','langnamenull','语言名称不能为空','1','77','1','0','cn');
INSERT INTO met_language VALUES('2711','langouturlinfo','务必包含http://或https://，访问该域名程序将自动跳转到此语言（需先做好域名解析绑定），或者做外部链接用。','1','74','1','0','cn');
INSERT INTO met_language VALUES('2712','langcopyfile','复制文件失败，请检查文件是否存在','1','76','1','0','cn');
INSERT INTO met_language VALUES('2713','langnewwindows','新窗口打开','1','75','1','0','cn');
INSERT INTO met_language VALUES('2714','langbasicinfo','复制相应的后台语言文件','1','73','1','0','cn');
INSERT INTO met_language VALUES('2715','langbasic','语言文件基于','1','72','1','0','cn');
INSERT INTO met_language VALUES('2716','langmarkinfo','请用英文字母，如 cn ，不可以与其他语言标识重复','1','71','1','0','cn');
INSERT INTO met_language VALUES('2717','langurlinfo','网站被访问时默认展示的网站语言','1','69','1','0','cn');
INSERT INTO met_language VALUES('2718','langorderinfo','不可以重复','1','70','1','0','cn');
INSERT INTO met_language VALUES('2719','langadminyes','管理员在登录前可以选择后台语言','1','66','1','0','cn');
INSERT INTO met_language VALUES('2720','langurl','站群功能','1','67','1','0','cn');
INSERT INTO met_language VALUES('2721','langsw','语言切换','1','68','1','0','cn');
INSERT INTO met_language VALUES('2722','langhome','默认语言','1','63','1','0','cn');
INSERT INTO met_language VALUES('2723','langdefaultadmin','后台默认语言','1','64','1','0','cn');
INSERT INTO met_language VALUES('2724','langadminok','简繁切换','1','65','1','0','cn');
INSERT INTO met_language VALUES('2725','langchok','一般以链接形式显示在前台右上角','1','62','1','0','cn');
INSERT INTO met_language VALUES('2726','langcnch','简体中文或繁体中文语言标识','1','61','1','0','cn');
INSERT INTO met_language VALUES('2727','langch','简繁体自动切换','1','60','1','0','cn');
INSERT INTO met_language VALUES('2728','langeadminditor','后台语言参数','1','59','1','0','cn');
INSERT INTO met_language VALUES('2729','langwebeditor','编辑参数','1','58','1','0','cn');
INSERT INTO met_language VALUES('2730','langmark','语言标识','1','54','1','0','cn');
INSERT INTO met_language VALUES('2731','langouturl','单独域名','1','55','1','0','cn');
INSERT INTO met_language VALUES('2732','langadmin','后台语言','1','56','1','0','cn');
INSERT INTO met_language VALUES('2733','langpara','语言参数修改','1','57','1','0','cn');
INSERT INTO met_language VALUES('2734','langflag','国旗标志','1','53','1','0','cn');
INSERT INTO met_language VALUES('2735','langname','语言名称','1','52','1','0','cn');
INSERT INTO met_language VALUES('2736','langtitle','语言配置','1','48','1','0','cn');
INSERT INTO met_language VALUES('2737','langedit','修改语言','1','51','1','0','cn');
INSERT INTO met_language VALUES('2738','langadd','添加新语言','1','50','1','0','cn');
INSERT INTO met_language VALUES('2739','langweb','网站语言','1','49','1','0','cn');
INSERT INTO met_language VALUES('2740','setbasicTip11','用于发送邮件的邮箱密码','1','47','1','0','cn');
INSERT INTO met_language VALUES('2741','setbasicTip10','如QQ邮箱为smtp.qq.com','1','45','1','0','cn');
INSERT INTO met_language VALUES('2742','setbasicSMTPPassword','邮箱密码','1','46','1','0','cn');
INSERT INTO met_language VALUES('2743','setbasicSMTPServer','SMTP','1','44','1','0','cn');
INSERT INTO met_language VALUES('2744','setbasicTip8','用于发送邮件的邮箱账号','1','43','1','0','cn');
INSERT INTO met_language VALUES('2745','setbasicEmailAccount','邮箱账号','1','42','1','0','cn');
INSERT INTO met_language VALUES('2746','setbasicTip7','所显示的发件人姓名','1','41','1','0','cn');
INSERT INTO met_language VALUES('2747','setbasictopic','主题','1','37','1','0','cn');
INSERT INTO met_language VALUES('2748','setbasicmainbody','正文','1','38','1','0','cn');
INSERT INTO met_language VALUES('2749','setbasicok','发件成功','1','39','1','0','cn');
INSERT INTO met_language VALUES('2750','setbasicno','发件失败','1','40','1','0','cn');
INSERT INTO met_language VALUES('2751','setbasicTip5','多个请用“|”隔开','1','33','1','0','cn');
INSERT INTO met_language VALUES('2752','setbasicTip6','发件箱设置（站内所有邮件均由此邮箱发送，如会员密码找回邮件等）','1','34','1','0','cn');
INSERT INTO met_language VALUES('2753','setbasicFromName','发件人','1','35','1','0','cn');
INSERT INTO met_language VALUES('2754','setbasicToName','收件人','1','36','1','0','cn');
INSERT INTO met_language VALUES('2755','setbasicEnableFormat','允许上传的文件格式','1','32','1','0','cn');
INSERT INTO met_language VALUES('2756','setbasicUploadMax','文件上传最大值','1','31','1','0','cn');
INSERT INTO met_language VALUES('2757','setbasicWebName','网站名称','1','29','1','0','cn');
INSERT INTO met_language VALUES('2758','setbasicWebSite','网站网址','1','30','1','0','cn');
INSERT INTO met_language VALUES('2759','setbasicWebInfoSet','网站基本信息设置','1','28','1','0','cn');
INSERT INTO met_language VALUES('2760','metinfoversion','系统版本','1','23','1','0','cn');
INSERT INTO met_language VALUES('2761','reserved','版权所有','1','24','1','0','cn');
INSERT INTO met_language VALUES('2762','copyright','长沙米拓信息技术有限公司（MetInfo Inc.）','1','25','1','0','cn');
INSERT INTO met_language VALUES('2763','sysadminlicense','查看完整用户授权许可协议','1','22','1','0','cn');
INSERT INTO met_language VALUES('2764','sysadminAgreement3','未经官方授权的用户，在使用过程中出现任何不可预料的后果，官方不承担任何责任。','1','21','1','0','cn');
INSERT INTO met_language VALUES('2765','sysadminAgreement2','未经官方授权的用户，请务必保留网站底部 Powered by MetInfo 的字样和链接。<br/>经过官方授权后方可去除前台版权信息。','1','20','1','0','cn');
INSERT INTO met_language VALUES('2766','sysadminUseAgreement','使用协议','1','18','1','0','cn');
INSERT INTO met_language VALUES('2767','sysadminAgreement1','个人网站永久免费且不限制用途。<br/>未获商业授权之前，不得将MetInfo用于商业用途。','1','19','1','0','cn');
INSERT INTO met_language VALUES('2768','sysadminHelp4','第四步：在优化推广中设置静态页面、SEO参数及其他信息','1','16','1','0','cn');
INSERT INTO met_language VALUES('2769','sysadminHelp5','第五步：在内容管理中添加网站内容、底部信息等','1','17','1','0','cn');
INSERT INTO met_language VALUES('2770','sysadminHelp3','第三步：在栏目配置中设置网站导航栏目及相关参数','1','15','1','0','cn');
INSERT INTO met_language VALUES('2771','sysadminHelp2','第二步：在界面风格中选择网站模板风格并设置相关风格参数','1','14','1','0','cn');
INSERT INTO met_language VALUES('2772','sysadminHelp1','第一步：在系统设置中进行设置基本信息、语言设置、安全与效率等','1','13','1','0','cn');
INSERT INTO met_language VALUES('2773','sysadminHelp','使用说明','1','12','1','0','cn');
INSERT INTO met_language VALUES('2774','sysadminDBVersion','Mysql版本','1','10','1','0','cn');
INSERT INTO met_language VALUES('2775','sysadminOfficialWebsite','官方网站','1','11','1','0','cn');
INSERT INTO met_language VALUES('2776','sysadminLoginTime','登录时间','1','9','1','0','cn');
INSERT INTO met_language VALUES('2777','sysadminLoginNum','登录次数','1','8','1','0','cn');
INSERT INTO met_language VALUES('2778','sysadminUserInfo','用户信息','1','6','1','0','cn');
INSERT INTO met_language VALUES('2779','sysadminUsername','用户名','1','7','1','0','cn');
INSERT INTO met_language VALUES('2780','sysadminMember','会员注册','1','5','1','0','cn');
INSERT INTO met_language VALUES('2781','sysadminFriendlyLink','友情链接','1','4','1','0','cn');
INSERT INTO met_language VALUES('2782','sysadminLeaveMessage','在线留言','1','3','1','0','cn');
INSERT INTO met_language VALUES('2783','sysadminFeedbackInfo','反馈信息','1','2','1','0','cn');
INSERT INTO met_language VALUES('2784','sysadminUnread','未读信息','1','1','1','0','cn');
INSERT INTO met_language VALUES('2785','systemconfiguration','系统配置','1','1','0','0','cn');
INSERT INTO met_language VALUES('2786','proposal','我要提建议','1','442','8','0','cn');
INSERT INTO met_language VALUES('2787','onlinehelp','QQ未启用帮助文档：','1','104','2','0','cn');
INSERT INTO met_language VALUES('2788','setbasicTip14','gmail邮箱需要空间支持SSL，请开启SSL，或换成其他邮箱！！！','1','429','1','0','cn');
INSERT INTO met_language VALUES('2789','setbasicTip15','空间不支持SSL方式发送邮件，请开启SSL，或换成TLS方式！！！','1','430','1','0','cn');
INSERT INTO met_language VALUES('2790','onlinehelp1','添加的QQ需要到【shang.qq.com】登录后在【商家沟通组建—设置】开启QQ的在线状态，否则将显示“未启用”','1','105','2','0','cn');
INSERT INTO met_language VALUES('2791','dlapptips19','有新应用发布了！！！','1','358','6','0','cn');
INSERT INTO met_language VALUES('2792','dlapptips20','有更新','1','359','6','0','cn');
INSERT INTO met_language VALUES('2793','feedbackautosms','短信回复设置','1','177','4','0','cn');
INSERT INTO met_language VALUES('2794','fdincAutosms','短信回复','1','178','4','0','cn');
INSERT INTO met_language VALUES('2795','fdincAutoContentsms','回复短信内容','1','179','4','0','cn');
INSERT INTO met_language VALUES('2796','fdincTipsms','勾选后将自动向提交表单的用户回复短信，需要在我的应用“短信功能”进行短信充值后才能使用','1','180','4','0','cn');
INSERT INTO met_language VALUES('2797','fdinctellsms','联系电话字段名','1','181','4','0','cn');
INSERT INTO met_language VALUES('2798','fdinctells','用于获取用户的联系电话，以便回复短信。字段类型必须为“简短”','1','182','4','0','cn');
INSERT INTO met_language VALUES('2799','hotsearches','热门搜索','1','431','1','0','cn');
INSERT INTO met_language VALUES('2800','searchresult','搜索结果','1','432','1','0','cn');
INSERT INTO met_language VALUES('2801','savenow','后台所有语言均可修改','1','433','1','0','cn');
INSERT INTO met_language VALUES('2802','onlineupdate','在线升级','1','436','1','0','cn');
INSERT INTO met_language VALUES('2803','updatenow','立即升级','1','437','1','0','cn');
INSERT INTO met_language VALUES('2804','updatelater','稍后升级','1','438','1','0','cn');
INSERT INTO met_language VALUES('2805','tag','Tag标签','1','434','1','0','cn');
INSERT INTO met_language VALUES('2806','tagtips','多个Tag标签请用“|”隔开','1','435','1','0','cn');
INSERT INTO met_language VALUES('2807','displaytype','前台显示','1','183','4','0','cn');
INSERT INTO met_language VALUES('2808','checkupdate','检测更新','1','439','1','0','cn');
INSERT INTO met_language VALUES('2809','checkupdatetips','对不起！您的权限不够，无法操作在线升级。','1','440','1','0','cn');
INSERT INTO met_language VALUES('2810','memberInformation','会员信息设置','1','67','8','0','cn');
INSERT INTO met_language VALUES('2811','tradewap','手机版（商业版）','1','75','8','0','cn');
INSERT INTO met_language VALUES('2812','paraname','名称','1','187','8','0','cn');
INSERT INTO met_language VALUES('2813','parazce','注册信息','1','200','8','0','cn');
INSERT INTO met_language VALUES('2814','parazce_explain','注：当注册信息勾选了的字段才会在会员注册界面显示，没有勾选则只能在编辑会员信息界面中显示','1','201','8','0','cn');
INSERT INTO met_language VALUES('2815','message_name','姓名字段名','1','240','4','0','cn');
INSERT INTO met_language VALUES('2816','message_name1','用于获取用户的姓名，字段类型必须为“简短”','1','241','4','0','cn');
INSERT INTO met_language VALUES('2817','message_content','留言内容字段名','1','242','4','0','cn');
INSERT INTO met_language VALUES('2818','message_content1','用于获取用户的留言内容，字段类型必须为“文本”','1','243','4','0','cn');
INSERT INTO met_language VALUES('2819','message_AcceptMail','留言邮件接收邮箱','1','244','4','0','cn');
INSERT INTO met_language VALUES('2820','popular_explain','当替换为的值为空时，则把原文字的值替换为空','1','25','5','0','cn');
INSERT INTO met_language VALUES('2821','column_search','栏目搜索','1','245','4','0','cn');
INSERT INTO met_language VALUES('2822','column_searchname','请输入栏目名称','1','246','4','0','cn');
INSERT INTO met_language VALUES('2823','search_inthe','正在搜索中','1','247','4','0','cn');
INSERT INTO met_language VALUES('2824','search_Noresults','抱歉，没有找到您要搜索的栏目','1','248','4','0','cn');
INSERT INTO met_language VALUES('2825','membertips','会员设置','1','244','4','0','cn');
INSERT INTO met_language VALUES('2826','memberstyle','会员组设置','1','245','4','0','cn');
INSERT INTO met_language VALUES('2827','memberflashset','会员功能设置','1','246','4','0','cn');
INSERT INTO met_language VALUES('2828','jsx36','注意：zip格式不允许上传，请到网站安全里面添加zip上传格式','1','444','8','0','cn');
INSERT INTO met_language VALUES('2829','jsx37','注意：sql格式不允许上传，请到网站安全里面添加sql上传格式','1','445','8','0','cn');
INSERT INTO met_language VALUES('2830','jsx38','您没有完全控制权限，请联系管理员开通','1','446','8','0','cn');
INSERT INTO met_language VALUES('2831','appmodule','应用模块','1','1','3','0','cn');
INSERT INTO met_language VALUES('2832','formerror1','请填写此字段。','1','0','8','0','cn');
INSERT INTO met_language VALUES('2833','formerror2','请从这些选项中选择一个。','1','0','8','0','cn');
INSERT INTO met_language VALUES('2834','formerror3','请输入正确的手机号码。','1','0','8','0','cn');
INSERT INTO met_language VALUES('2835','formerror4','请输入正确的Email地址。','1','0','8','0','cn');
INSERT INTO met_language VALUES('2836','formerror5','两次输入的密码不一致，请重新输入。','1','0','8','0','cn');
INSERT INTO met_language VALUES('2837','formerror6','请输入至少&metinfo&个字符。','1','0','8','0','cn');
INSERT INTO met_language VALUES('2838','formerror7','输入不能超过&metinfo&个字符。','1','0','8','0','cn');
INSERT INTO met_language VALUES('2839','formerror8','输入的字符数必须在&metinfo&之间。','1','0','8','0','cn');
INSERT INTO met_language VALUES('2840','smstips96','其它','1','0','8','0','cn');
INSERT INTO met_language VALUES('2841','smstips97','用户通知','1','0','8','0','cn');
INSERT INTO met_language VALUES('2842','js72','是否导入管理员及会员信息，确定则当前的管理员及会员信息会被导入的数据替换，取消则管理员及会员还是当前的。','1','0','8','0','cn');
INSERT INTO met_language VALUES('2843','upfileFail20','删除缩略图缓存','1','0','8','0','cn');
INSERT INTO met_language VALUES('2844','page_setup_details','详情页设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('2845','defined_separately','（可以为每个栏目单独定义大图轮播）','1','0','1','0','cn');
INSERT INTO met_language VALUES('2846','click_here_settings','点此进入自定义设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('2847','consistent_home_page','与首页一致','1','0','1','0','cn');
INSERT INTO met_language VALUES('2848','call_way','调用方式','1','0','1','0','cn');
INSERT INTO met_language VALUES('2849','inside_larger','内页大图轮播设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('2850','sys_orange','橘红','1','0','1','0','cn');
INSERT INTO met_language VALUES('2851','sys_cyan','青色','1','0','1','0','cn');
INSERT INTO met_language VALUES('2852','style_Settings','风格设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('2853','sys_parameter315','点此进入更多设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('2854','add_them_picture','添加轮播图片','1','0','1','0','cn');
INSERT INTO met_language VALUES('2855','title_link','设置标题和链接','1','0','1','0','cn');
INSERT INTO met_language VALUES('2856','larger_wheel','大图轮播设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('2857','scroll_bar','滚动条','1','0','1','0','cn');
INSERT INTO met_language VALUES('2858','complete_experience','如需完整体验手机版，请用手机访问网站网址或扫描二维码浏览。','1','0','1','0','cn');
INSERT INTO met_language VALUES('2859','effect_should','一切效果应以手机终端浏览为标准。','1','0','1','0','cn');
INSERT INTO met_language VALUES('2860','computer_browser','电脑浏览器与手机浏览器部分效果渲染不同，因此在电脑上浏览手机版可能会出现细节不兼容现象。','1','0','1','0','cn');
INSERT INTO met_language VALUES('2861','save_Settings','保存设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('2862','trying_load','正在努力加载','1','0','1','0','cn');
INSERT INTO met_language VALUES('2863','templates_choice','模板选择','1','0','1','0','cn');
INSERT INTO met_language VALUES('2864','fixed_bottom','底部固定菜单','1','0','1','0','cn');
INSERT INTO met_language VALUES('2865','All_empty_message','清空全部消息','1','0','1','0','cn');
INSERT INTO met_language VALUES('2866','messages_restore','确定要删除全部的消息吗？一旦删除将不能恢复！','1','0','1','0','cn');
INSERT INTO met_language VALUES('2867','enter_user','请输入用户名','1','0','1','0','cn');
INSERT INTO met_language VALUES('2868','stations_recommended','针对于还在使用纯静态页面的老站，新站不推荐。','1','0','1','0','cn');
INSERT INTO met_language VALUES('2869','static_page','设置静态页面','1','0','1','0','cn');
INSERT INTO met_language VALUES('2870','pure_static_Settings','针对于还在使用纯静态页面的用户，可以从下面进入设置。','1','0','1','0','cn');
INSERT INTO met_language VALUES('2871','sys_good','优秀。','1','0','1','0','cn');
INSERT INTO met_language VALUES('2872','static_dynamic','静态化并不比动态','1','0','1','0','cn');
INSERT INTO met_language VALUES('2873','development_engine','静态化，对于发展至今的搜索引擎来说，','1','0','1','0','cn');
INSERT INTO met_language VALUES('2874','manually_static_rules2','静态化，伪静态是推荐的做法，甚至可以不用','1','0','1','0','cn');
INSERT INTO met_language VALUES('2875','manually_static_rules1','上面是伪静态相关的设置，如果非得','1','0','1','0','cn');
INSERT INTO met_language VALUES('2876','manually_static_rules','部分空间需要手动设置伪静态规则文件','1','0','1','0','cn');
INSERT INTO met_language VALUES('2877','pseudo_static','查看伪静态规则','1','0','1','0','cn');
INSERT INTO met_language VALUES('2878','pseudo_static','伪静态规则','1','0','1','0','cn');
INSERT INTO met_language VALUES('2879','sys_end','结尾。','1','0','1','0','cn');
INSERT INTO met_language VALUES('2880','and_to','（网址），并且以','1','0','1','0','cn');
INSERT INTO met_language VALUES('2881','simplify_front_desk','开启后能够简化前台网页','1','0','1','0','cn');
INSERT INTO met_language VALUES('2882','sys_static','伪静态化','1','0','1','0','cn');
INSERT INTO met_language VALUES('2883','being_generated','正在生成','1','0','1','0','cn');
INSERT INTO met_language VALUES('2884','anchor_text','添加锚文本','1','0','1','0','cn');
INSERT INTO met_language VALUES('2885','applies_paper','仅作用于前台页面中的内容文字，比如文章详情页内容文字。','1','0','1','0','cn');
INSERT INTO met_language VALUES('2886','everyone_see','上线了，大家来看看！','1','0','1','0','cn');
INSERT INTO met_language VALUES('2887','build_site','搭建的新网站','1','0','1','0','cn');
INSERT INTO met_language VALUES('2888','sys_use','我用','1','0','1','0','cn');
INSERT INTO met_language VALUES('2889','more_applications','更多应用','1','0','1','0','cn');
INSERT INTO met_language VALUES('2890','recommended','推荐应用','1','0','1','0','cn');
INSERT INTO met_language VALUES('2891','Traffic_trends','小时流量趋势','1','0','1','0','cn');
INSERT INTO met_language VALUES('2892','sys_nearly','近','1','0','1','0','cn');
INSERT INTO met_language VALUES('2893','sys_views','浏览次数','1','0','1','0','cn');
INSERT INTO met_language VALUES('2894','share_mood','分享心情','1','0','1','0','cn');
INSERT INTO met_language VALUES('2895','publish_content','发布内容','1','0','1','0','cn');
INSERT INTO met_language VALUES('2896','debug_appearance','调试外观','1','0','1','0','cn');
INSERT INTO met_language VALUES('2897','configuration_section','配置栏目','1','0','1','0','cn');
INSERT INTO met_language VALUES('2898','new_guidelines','新手指引','1','0','1','0','cn');
INSERT INTO met_language VALUES('2899','release_to','发布至','1','0','1','0','cn');
INSERT INTO met_language VALUES('2900','template_code1','请输入模板编号','1','0','1','0','cn');
INSERT INTO met_language VALUES('2901','sys_cost','费用','1','0','1','0','cn');
INSERT INTO met_language VALUES('2902','industry_segments','行业细分','1','0','1','0','cn');
INSERT INTO met_language VALUES('2903','color_filter','颜色筛选','1','0','1','0','cn');
INSERT INTO met_language VALUES('2904','industry_screening','行业筛选','1','0','1','0','cn');
INSERT INTO met_language VALUES('2905','set_password','第三步：设置支付密码','1','0','1','0','cn');
INSERT INTO met_language VALUES('2906','login_password','位。付费购买应用时需要输入支付密码，请不要与登录密码一致。','1','0','1','0','cn');
INSERT INTO met_language VALUES('2907','services_future','可用于找回密码以及获取应用市场未来提供的更多服务','1','0','1','0','cn');
INSERT INTO met_language VALUES('2908','personal_information','第二步：设置个人信息','1','0','1','0','cn');
INSERT INTO met_language VALUES('2909','Repeat_password','重复登陆密码','1','0','1','0','cn');
INSERT INTO met_language VALUES('2910','sys_password','登陆密码','1','0','1','0','cn');
INSERT INTO met_language VALUES('2911','create_account','第一步：创建账户','1','0','1','0','cn');
INSERT INTO met_language VALUES('2912','buy_time','购买时间','1','0','1','0','cn');
INSERT INTO met_language VALUES('2913','please_click','支付成功，请点击！！','1','0','1','0','cn');
INSERT INTO met_language VALUES('2914','payment_method','请选择支付方式','1','0','1','0','cn');
INSERT INTO met_language VALUES('2915','sys_unionpay','银联','1','0','1','0','cn');
INSERT INTO met_language VALUES('2916','enter_amount','请输入充值金额','1','0','1','0','cn');
INSERT INTO met_language VALUES('2917','payment_amount','支付金额','1','0','1','0','cn');
INSERT INTO met_language VALUES('2918','account_Settings','账户设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('2919','consumption_record','消费记录','1','0','1','0','cn');
INSERT INTO met_language VALUES('2920','the_balance','余额','1','0','1','0','cn');
INSERT INTO met_language VALUES('2921','website_manually','登录成功后您的网站将永久自动登录此帐号，除非手动退出。','1','0','1','0','cn');
INSERT INTO met_language VALUES('2922','application_market','登陆应用市场','1','0','1','0','cn');
INSERT INTO met_language VALUES('2923','installations','安装量','1','0','1','0','cn');
INSERT INTO met_language VALUES('2924','permission_download','无权限下载','1','0','1','0','cn');
INSERT INTO met_language VALUES('2925','goods_comment','购买商品后才能评论','1','0','1','0','cn');
INSERT INTO met_language VALUES('2926','product_commented','同一个产品最多评论3次','1','0','1','0','cn');
INSERT INTO met_language VALUES('2927','password_mistake','支付密码错误','1','0','1','0','cn');
INSERT INTO met_language VALUES('2928','please_again','请先登录应用商店；应用商店采用独立的账号体系，如没有注册账号请先操作注册！','1','0','1','0','cn');
INSERT INTO met_language VALUES('2929','have_bought','已购买','1','0','1','0','cn');
INSERT INTO met_language VALUES('2930','download_application','当前系统无法下载此应用，请升级系统','1','0','1','0','cn');
INSERT INTO met_language VALUES('2931','sys_evaluation','评价成功！感谢您的评价！','1','0','1','0','cn');
INSERT INTO met_language VALUES('2932','downloads','开始下载','1','0','1','0','cn');
INSERT INTO met_language VALUES('2933','click_rating','请点击星形评分！','1','0','1','0','cn');
INSERT INTO met_language VALUES('2934','system_temporarily','您的充值订单，系统暂未收到，请稍后查看财务记录，或联系官网客服人员。','1','0','1','0','cn');
INSERT INTO met_language VALUES('2935','prepaid_successfully','充值成功','1','0','1','0','cn');
INSERT INTO met_language VALUES('2936','repeat_password','重复支付密码','1','0','1','0','cn');
INSERT INTO met_language VALUES('2937','payment_password','新支付密码','1','0','1','0','cn');
INSERT INTO met_language VALUES('2938','original_password1','请输入原支付密码','1','0','1','0','cn');
INSERT INTO met_language VALUES('2939','original_password','原支付密码','1','0','1','0','cn');
INSERT INTO met_language VALUES('2940','password_length','密码长度','1','0','1','0','cn');
INSERT INTO met_language VALUES('2941','please_enter','请输入新密码','1','0','1','0','cn');
INSERT INTO met_language VALUES('2942','login_password_new','新登录密码','1','0','1','0','cn');
INSERT INTO met_language VALUES('2943','original_passwords1','请输入原密码','1','0','1','0','cn');
INSERT INTO met_language VALUES('2944','original_passwords','原登录密码','1','0','1','0','cn');
INSERT INTO met_language VALUES('2945','account_password','请填写应用市场账户登录密码，而不是网站登录密码。','1','0','1','0','cn');
INSERT INTO met_language VALUES('2946','please_password','请输入登录密码','1','0','1','0','cn');
INSERT INTO met_language VALUES('2947','login_password1','您必须填写登录密码才能修改资料','1','0','1','0','cn');
INSERT INTO met_language VALUES('2948','popular_template','热门模板','1','0','1','0','cn');
INSERT INTO met_language VALUES('2949','popular_application','热门应用','1','0','1','0','cn');
INSERT INTO met_language VALUES('2950','sys_parameter218','这里的数据由控件自动生成','1','0','1','0','cn');
INSERT INTO met_language VALUES('2951','number_installation','安装次数','1','0','1','0','cn');
INSERT INTO met_language VALUES('2952','application_name','应用名称','1','0','1','0','cn');
INSERT INTO met_language VALUES('2953','application_developers','开发者应用','1','0','1','0','cn');
INSERT INTO met_language VALUES('2954','website_developers','开发者网站','1','0','1','0','cn');
INSERT INTO met_language VALUES('2955','introduction_developers','开发者简介','1','0','1','0','cn');
INSERT INTO met_language VALUES('2956','sys_head','头像','1','0','1','0','cn');
INSERT INTO met_language VALUES('2957','name_developers','开发者名称','1','0','1','0','cn');
INSERT INTO met_language VALUES('2958','dont_fill','可不填','1','0','1','0','cn');
INSERT INTO met_language VALUES('2959','mouse_click_rating','鼠标放到星形上点击评分','1','0','1','0','cn');
INSERT INTO met_language VALUES('2960','score','评分','1','0','1','0','cn');
INSERT INTO met_language VALUES('2961','want_comment','我要评论','1','0','1','0','cn');
INSERT INTO met_language VALUES('2962','next_page','下一页','1','0','1','0','cn');
INSERT INTO met_language VALUES('2963','back','上一页','1','0','1','0','cn');
INSERT INTO met_language VALUES('2964','running_environment','运行环境','1','0','1','0','cn');
INSERT INTO met_language VALUES('2965','updated_date','更新日期','1','0','1','0','cn');
INSERT INTO met_language VALUES('2966','online_presentation','在线演示','1','0','1','0','cn');
INSERT INTO met_language VALUES('2967','screenshots','截图','1','0','1','0','cn');
INSERT INTO met_language VALUES('2968','is_introduced','介绍','1','0','1','0','cn');
INSERT INTO met_language VALUES('2969','comments','评论','1','0','1','0','cn');
INSERT INTO met_language VALUES('2970','evaluation','人评价）','1','0','1','0','cn');
INSERT INTO met_language VALUES('2971','total_of','（共','1','0','1','0','cn');
INSERT INTO met_language VALUES('2972','password_input','请输入支付密码','1','0','1','0','cn');
INSERT INTO met_language VALUES('2973','pay_password','支付密码','1','0','1','0','cn');
INSERT INTO met_language VALUES('2974','temporary_access1','请输入临时访问域名，必须是三级域名。','1','0','1','0','cn');
INSERT INTO met_language VALUES('2975','temporary_access','临时访问域名','1','0','1','0','cn');
INSERT INTO met_language VALUES('2976','template_domain','请输入模板绑定的一级域名','1','0','1','0','cn');
INSERT INTO met_language VALUES('2977','top_domain_names','顶级域名','1','0','1','0','cn');
INSERT INTO met_language VALUES('2978','buy_template_must','购买后程序将自动获取当前网站域名并进行绑定，以后此模板只能用于绑定域名下使用。','1','0','1','0','cn');
INSERT INTO met_language VALUES('2979','template_domain','模板绑定域名说明','1','0','1','0','cn');
INSERT INTO met_language VALUES('2980','amount_of','金额','1','0','1','0','cn');
INSERT INTO met_language VALUES('2981','purchase_program','购买项目','1','0','1','0','cn');
INSERT INTO met_language VALUES('2982','success_payment','支付成功后，请点击此链接跳转！！','1','0','1','0','cn');
INSERT INTO met_language VALUES('2983','pay_success','支付成功','1','0','1','0','cn');
INSERT INTO met_language VALUES('2984','latest_version','已是最新版','1','0','1','0','cn');
INSERT INTO met_language VALUES('2985','be_updated','可更新至','1','0','1','0','cn');
INSERT INTO met_language VALUES('2986','special_thanks','特别感谢','1','0','1','0','cn');
INSERT INTO met_language VALUES('2987','update_log','更新日志','1','0','1','0','cn');
INSERT INTO met_language VALUES('2988','get_in','获取中','1','0','1','0','cn');
INSERT INTO met_language VALUES('2989','current_version','当前版本','1','0','1','0','cn');
INSERT INTO met_language VALUES('2990','official_information','官方信息','1','0','1','0','cn');
INSERT INTO met_language VALUES('2991','program_information','程序信息','1','0','1','0','cn');
INSERT INTO met_language VALUES('2992','recruitment_information','招聘信息','1','0','1','0','cn');
INSERT INTO met_language VALUES('2993','system_maintenance','系统维护中','1','0','1','0','cn');
INSERT INTO met_language VALUES('2994','permission_download','没有权限下载','1','0','1','0','cn');
INSERT INTO met_language VALUES('2995','link_remote','链接不上远程服务器','1','0','1','0','cn');
INSERT INTO met_language VALUES('2996','try_again','重试','1','0','1','0','cn');
INSERT INTO met_language VALUES('2997','give_installation','放弃安装','1','0','1','0','cn');
INSERT INTO met_language VALUES('2998','installation_errors','安装时错误，可能由以下原因造成','1','0','1','0','cn');
INSERT INTO met_language VALUES('2999','installation_errors','安装错误','1','0','1','0','cn');
INSERT INTO met_language VALUES('3000','configuratio_template','配置模板','1','0','1','0','cn');
INSERT INTO met_language VALUES('3001','seconds_background','秒好后刷新后台','1','0','1','0','cn');
INSERT INTO met_language VALUES('3002','installation_complete1','安装完成，','1','0','1','0','cn');
INSERT INTO met_language VALUES('3003','installation_complete','安装完成','1','0','1','0','cn');
INSERT INTO met_language VALUES('3004','installation','安装中','1','0','1','0','cn');
INSERT INTO met_language VALUES('3005','possible_reasons','可能原因','1','0','1','0','cn');
INSERT INTO met_language VALUES('3006','download_interrupt','文件下载中断','1','0','1','0','cn');
INSERT INTO met_language VALUES('3007','write_permission','文件没有写权限或其新建的子文件夹没有写权限','1','0','1','0','cn');
INSERT INTO met_language VALUES('3008','download','下载中','1','0','1','0','cn');
INSERT INTO met_language VALUES('3009','following_documents','下列文件没有修改权限，无法进行升级操作！','1','0','1','0','cn');
INSERT INTO met_language VALUES('3010','document_upgrade','系统升级文档','1','0','1','0','cn');
INSERT INTO met_language VALUES('3011','file_permissions','文件权限检测中','1','0','1','0','cn');
INSERT INTO met_language VALUES('3012','input_link_address','请输入链接地址','1','0','1','0','cn');
INSERT INTO met_language VALUES('3013','enter_replacement','请输入替换后的文字','1','0','1','0','cn');
INSERT INTO met_language VALUES('3014','modify_system_rules','系统规则请勿修改','1','0','1','0','cn');
INSERT INTO met_language VALUES('3015','enter_original','请输入原文字','1','0','1','0','cn');
INSERT INTO met_language VALUES('3016','displays_directory','是否显示根目录下文件列表','1','0','1','0','cn');
INSERT INTO met_language VALUES('3017','anchor_text','站内锚文本','1','0','1','0','cn');
INSERT INTO met_language VALUES('3018','yesterday','昨天','1','0','1','0','cn');
INSERT INTO met_language VALUES('3019','today','今天','1','0','1','0','cn');
INSERT INTO met_language VALUES('3020','please_select','请选择栏目','1','0','1','0','cn');
INSERT INTO met_language VALUES('3021','log_successfully','登陆成功','1','0','1','0','cn');
INSERT INTO met_language VALUES('3022','out_of_success','退出成功','1','0','1','0','cn');
INSERT INTO met_language VALUES('3023','password_changing','支付密码修改','1','0','1','0','cn');
INSERT INTO met_language VALUES('3024','login_password_changing','登录密码修改','1','0','1','0','cn');
INSERT INTO met_language VALUES('3025','account_information','账户信息设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('3026','my_bill','充值记录','1','0','1','0','cn');
INSERT INTO met_language VALUES('3027','fine','精 选','1','0','1','0','cn');
INSERT INTO met_language VALUES('3028','form_controls1','表格控件','1','0','1','0','cn');
INSERT INTO met_language VALUES('3029','form_controls','表单控件','1','0','1','0','cn');
INSERT INTO met_language VALUES('3030','to_move','移动到','1','0','1','0','cn');
INSERT INTO met_language VALUES('3031','copied_to','复制到','1','0','1','0','cn');
INSERT INTO met_language VALUES('3032','keep_sorting','保存排序','1','0','1','0','cn');
INSERT INTO met_language VALUES('3033','add_primary_columns','添加一级栏目','1','0','1','0','cn');
INSERT INTO met_language VALUES('3034','path_variable','为当前应用根目录，仅仅做为路径变量','1','0','1','0','cn');
INSERT INTO met_language VALUES('3035','bring_in_more','还可以引入多个','1','0','1','0','cn');
INSERT INTO met_language VALUES('3036','time_Settings','时间设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('3037','support_special','后缀，不支持特殊字符','1','0','1','0','cn');
INSERT INTO met_language VALUES('3038','dont_add','构成方式，不要加','1','0','1','0','cn');
INSERT INTO met_language VALUES('3039','multiple_keywords','可设置多个关键词','1','0','1','0','cn');
INSERT INTO met_language VALUES('3040','static_page_setup','为空则使用静态页面设置中设置的','1','0','1','0','cn');
INSERT INTO met_language VALUES('3041','structure_mode','构成方式','1','0','1','0','cn');
INSERT INTO met_language VALUES('3042','parameter_Settings','参数设置中设置的','1','0','1','0','cn');
INSERT INTO met_language VALUES('3043','null_used','为空则使用','1','0','1','0','cn');
INSERT INTO met_language VALUES('3044','title_cannot_empty!','标题不能为空！','1','0','1','0','cn');
INSERT INTO met_language VALUES('3045','please_enter_title','请输入文章标题','1','0','1','0','cn');
INSERT INTO met_language VALUES('3046','home_link_text','首页链接文字','1','0','1','0','cn');
INSERT INTO met_language VALUES('3047','list_on_left','列表页左侧标题','1','0','1','0','cn');
INSERT INTO met_language VALUES('3048','position_navigation','位置导航前缀名称','1','0','1','0','cn');
INSERT INTO met_language VALUES('3049','title_words','标题文字','1','0','1','0','cn');
INSERT INTO met_language VALUES('3050','search_placeholder','头部搜索占位文本','1','0','1','0','cn');
INSERT INTO met_language VALUES('3051','below_recommended_Settings','以下建议使用默认设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('3052','image_module_explain','图片模块列表页每行显示个数，请根据图片尺寸合理设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('3053','product_module_explain','产品模块列表页每行显示个数，请根据图片尺寸合理设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('3054','number_line','每行显示个数','1','0','1','0','cn');
INSERT INTO met_language VALUES('3055','adaptive','自适应','1','0','1','0','cn');
INSERT INTO met_language VALUES('3056','inside_pages_subtopic','内页左侧子栏目列表','1','0','1','0','cn');
INSERT INTO met_language VALUES('3057','hide_default','默认隐藏所有','1','0','1','0','cn');
INSERT INTO met_language VALUES('3058','open_default','默认展开所有','1','0','1','0','cn');
INSERT INTO met_language VALUES('3059','image_style','图片样式','1','0','1','0','cn');
INSERT INTO met_language VALUES('3060','text_style','文字样式','1','0','1','0','cn');
INSERT INTO met_language VALUES('3061','please_cooperate','请与缩略图大小配合设置，每行数量越多缩略图越小反之越大','1','0','1','0','cn');
INSERT INTO met_language VALUES('3062','page_scrolling_visual','首页滚动图片可视数量','1','0','1','0','cn');
INSERT INTO met_language VALUES('3063','article_number_list','文章列表显示数量','1','0','1','0','cn');
INSERT INTO met_language VALUES('3064','short_description_words','简短描述字数','1','0','1','0','cn');
INSERT INTO met_language VALUES('3065','page_block','首页区块','1','0','1','0','cn');
INSERT INTO met_language VALUES('3066','moves_right','右移','1','0','1','0','cn');
INSERT INTO met_language VALUES('3067','title_words','标题字数','1','0','1','0','cn');
INSERT INTO met_language VALUES('3068','move_down','下移','1','0','1','0','cn');
INSERT INTO met_language VALUES('3069','commonly_Settings','常用设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('3070','links_corner_address','标题及右上角链接地址','1','0','1','0','cn');
INSERT INTO met_language VALUES('3071','homepage_configuration','首页快速配置','1','0','1','0','cn');
INSERT INTO met_language VALUES('3072','upload_component','上传组件','1','0','1','0','cn');
INSERT INTO met_language VALUES('3073','radio_buttons','单选按钮','1','0','1','0','cn');
INSERT INTO met_language VALUES('3074','multiline_text','多行文本','1','0','1','0','cn');
INSERT INTO met_language VALUES('3075','partitions','分区','1','0','1','0','cn');
INSERT INTO met_language VALUES('3076','delete_information','您确定要删除该信息吗？删除之后无法再恢复。','1','0','1','0','cn');
INSERT INTO met_language VALUES('3077','page_for_details','详情页','1','0','1','0','cn');
INSERT INTO met_language VALUES('3078','separated_vertical','值，中间用竖线隔开。如','1','0','1','0','cn');
INSERT INTO met_language VALUES('3079','option','选项文字','1','0','1','0','cn');
INSERT INTO met_language VALUES('3080','radio_set','单选设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('3081','click_button_effect','点击页面底部的保存按钮才生效','1','0','1','0','cn');
INSERT INTO met_language VALUES('3082','label_function','通过函数标签','1','0','1','0','cn');
INSERT INTO met_language VALUES('3083','information_columns4','用户选中指定栏目并保存后，前台对应的变量可以得到相应的值。','1','0','1','0','cn');
INSERT INTO met_language VALUES('3084','module_identifier','模块标识','1','0','1','0','cn');
INSERT INTO met_language VALUES('3085','value_structure','值结构','1','0','1','0','cn');
INSERT INTO met_language VALUES('3086','information_columns3','比如文章列表只能显示带信息列表的栏目。','1','0','1','0','cn');
INSERT INTO met_language VALUES('3087','information_columns2','可以限制用户选择的栏目，以便于正确的引导用户设置模板。','1','0','1','0','cn');
INSERT INTO met_language VALUES('3088','information_columns1','只能选择带信息列表的栏目（文章、产品、图片、下载、招聘）','1','0','1','0','cn');
INSERT INTO met_language VALUES('3089','only_choose_column','只能选择一级栏目','1','0','1','0','cn');
INSERT INTO met_language VALUES('3090','optional_columns','可选所有栏目','1','0','1','0','cn');
INSERT INTO met_language VALUES('3091','column_selection','栏目选择','1','0','1','0','cn');
INSERT INTO met_language VALUES('3092','preservation_effect','保存生效','1','0','1','0','cn');
INSERT INTO met_language VALUES('3093','clear_variables','您确定要清空所有变量吗？','1','0','1','0','cn');
INSERT INTO met_language VALUES('3094','custom_tag','增加自定义标签','1','0','1','0','cn');
INSERT INTO met_language VALUES('3095','current_template','当前模板','1','0','1','0','cn');
INSERT INTO met_language VALUES('3096','variables_using_method','变量使用方法','1','0','1','0','cn');
INSERT INTO met_language VALUES('3097','template_folder_under','下的模板文件夹','1','0','1','0','cn');
INSERT INTO met_language VALUES('3098','delete_template','此处删除模板并不会删除','1','0','1','0','cn');
INSERT INTO met_language VALUES('3099','previewimg','预览图','1','0','1','0','cn');
INSERT INTO met_language VALUES('3100','template_code','模板编号','1','0','1','0','cn');
INSERT INTO met_language VALUES('3101','template_Settings','里，这样保存时才能载入模板设置。','1','0','1','0','cn');
INSERT INTO met_language VALUES('3102','site_directory','网站根目录','1','0','1','0','cn');
INSERT INTO met_language VALUES('3103','modify_template','如果是修改模板，请先将原模板放到','1','0','1','0','cn');
INSERT INTO met_language VALUES('3104','template_type','模板类型','1','0','1','0','cn');
INSERT INTO met_language VALUES('3105','computer_template','电脑模板','1','0','1','0','cn');
INSERT INTO met_language VALUES('3106','cell_template','手机模板','1','0','1','0','cn');
INSERT INTO met_language VALUES('3107','need_manually_create','需要手动建立模板文件夹','1','0','1','0','cn');
INSERT INTO met_language VALUES('3108','new_template','新增模板','1','0','1','0','cn');
INSERT INTO met_language VALUES('3109','template_folder','模板文件夹','1','0','1','0','cn');
INSERT INTO met_language VALUES('3110','default_values','默认值','1','0','1','0','cn');
INSERT INTO met_language VALUES('3111','variable_name','变量名称','1','0','1','0','cn');
INSERT INTO met_language VALUES('3112','Fill_option','选项值”填入选项','1','0','1','0','cn');
INSERT INTO met_language VALUES('3113','press_option','按“选项内容','1','0','1','0','cn');
INSERT INTO met_language VALUES('3114','setting_item12','设置选项类型','1','0','1','0','cn');
INSERT INTO met_language VALUES('3115','setting_item1','此设置将放到选中项的后一项','1','0','1','0','cn');
INSERT INTO met_language VALUES('3116','location_linkage','位置联动','1','0','1','0','cn');
INSERT INTO met_language VALUES('3117','set_title','设置标题','1','0','1','0','cn');
INSERT INTO met_language VALUES('3118','option_set','选项设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('3119','detail_page','详细页','1','0','1','0','cn');
INSERT INTO met_language VALUES('3120','first','首项','1','0','1','0','cn');
INSERT INTO met_language VALUES('3121','global','全局','1','0','1','0','cn');
INSERT INTO met_language VALUES('3122','label','标签','1','0','1','0','cn');
INSERT INTO met_language VALUES('3123','special','特殊','1','0','1','0','cn');
INSERT INTO met_language VALUES('3124','slider','滑块','1','0','1','0','cn');
INSERT INTO met_language VALUES('3125','color_picker','颜色选择器','1','0','1','0','cn');
INSERT INTO met_language VALUES('3126','sys_editor','编辑器','1','0','1','0','cn');
INSERT INTO met_language VALUES('3127','for','为','1','0','1','0','cn');
INSERT INTO met_language VALUES('3128','down_program3','三级栏目下拉，所有模块栏目','1','0','1','0','cn');
INSERT INTO met_language VALUES('3129','down_program2','的三级栏目下拉','1','0','1','0','cn');
INSERT INTO met_language VALUES('3130','down_program1','的一级栏目下拉','1','0','1','0','cn');
INSERT INTO met_language VALUES('3131','sys_parameter36','小于','1','0','1','0','cn');
INSERT INTO met_language VALUES('3132','text_input','文本输入框','1','0','1','0','cn');
INSERT INTO met_language VALUES('3133','sys_variables','系统变量','1','0','1','0','cn');
INSERT INTO met_language VALUES('3134','short_text','简短文本','1','0','1','0','cn');
INSERT INTO met_language VALUES('3135','class_Settings','分类设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('3136','block_set','区块设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('3137','title_bar','标题栏','1','0','1','0','cn');
INSERT INTO met_language VALUES('3138','verify_password','请重复输入密码','1','0','1','0','cn');
INSERT INTO met_language VALUES('3139','down_options','下拉选项','1','0','1','0','cn');
INSERT INTO met_language VALUES('3140','Repeat_password','重复密码','1','0','1','0','cn');
INSERT INTO met_language VALUES('3141','order_number','订单号','1','0','1','0','cn');
INSERT INTO met_language VALUES('3142','for_details','详情','1','0','1','0','cn');
INSERT INTO met_language VALUES('3143','template','模板','1','0','1','0','cn');
INSERT INTO met_language VALUES('3144','application','增值服务','1','0','8','0','cn');
INSERT INTO met_language VALUES('3145','Prompt_domain','请输入域名','1','0','1','0','cn');
INSERT INTO met_language VALUES('3146','Prompt_password','请输入密码','1','0','1','0','cn');
INSERT INTO met_language VALUES('3147','Prompt_alipay','请输入支付宝账号','1','0','1','0','cn');
INSERT INTO met_language VALUES('3148','alipay','支付宝','1','0','1','0','cn');
INSERT INTO met_language VALUES('3149','account','账号','1','0','1','0','cn');
INSERT INTO met_language VALUES('3150','Prompt_email','请输入邮箱地址','1','0','1','0','cn');
INSERT INTO met_language VALUES('3151','mailbox','邮箱','1','0','1','0','cn');
INSERT INTO met_language VALUES('3152','Prompt_mobile','请输入手机号码','1','0','1','0','cn');
INSERT INTO met_language VALUES('3153','Prompt_cell','请输入电话号码','1','0','1','0','cn');
INSERT INTO met_language VALUES('3154','female','女','1','0','1','0','cn');
INSERT INTO met_language VALUES('3155','male','男','1','0','1','0','cn');
INSERT INTO met_language VALUES('3156','Prompt_nickname','请输入会员昵称','1','0','1','0','cn');
INSERT INTO met_language VALUES('3157','nickname','昵称','1','0','1','0','cn');
INSERT INTO met_language VALUES('3158','Prompt_user','请输入您的用户名','1','0','1','0','cn');
INSERT INTO met_language VALUES('3159','info_modification','会员信息修改','1','0','1','0','cn');
INSERT INTO met_language VALUES('3160','balance','余额','1','0','1','0','cn');
INSERT INTO met_language VALUES('3161','amount_operation','操作金额','1','0','1','0','cn');
INSERT INTO met_language VALUES('3162','into_model','入款','1','0','1','0','cn');
INSERT INTO met_language VALUES('3163','buy_records','购买记录','1','0','1','0','cn');
INSERT INTO met_language VALUES('3164','info_editing','信息编辑','1','0','1','0','cn');
INSERT INTO met_language VALUES('3165','loggedin','您已登录！','1','0','1','0','cn');
INSERT INTO met_language VALUES('3166','registration','注册','1','0','1','0','cn');
INSERT INTO met_language VALUES('3167','landing','登陆','1','0','1','0','cn');
INSERT INTO met_language VALUES('3168','page_range','翻页范围','1','0','1','0','cn');
INSERT INTO met_language VALUES('3169','designer_special','如果模板设计师采用了特制的展示方式，则此处设置无效。','1','0','1','0','cn');
INSERT INTO met_language VALUES('3170','shuffling_closed','大图轮播被关闭或设置成其它展示方式','1','0','1','0','cn');
INSERT INTO met_language VALUES('3171','click_enter','展开更多设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('3172','such_uploadfile','（如上传swf文件）','1','0','1','0','cn');
INSERT INTO met_language VALUES('3173','recruitment_info','能够影响文章、产品、图片、招聘模块信息列表，而并非所有链接。','1','0','1','0','cn');
INSERT INTO met_language VALUES('3174','sys_navigation','导航：栏目设置中可以调整是否新窗口打开。','1','0','1','0','cn');
INSERT INTO met_language VALUES('3175','sys_navigation1','此功能预览无法查看效果，需要保存后刷新前台页面才能体验。','1','0','1','0','cn');
INSERT INTO met_language VALUES('3176','sys_navigation2','显示栏目列表时，图片需要在栏目设置中上传（栏目图片）。','1','0','1','0','cn');
INSERT INTO met_language VALUES('3177','more_options','更多选项','1','0','1','0','cn');
INSERT INTO met_language VALUES('3178','suggested_size','建议尺寸','1','0','1','0','cn');
INSERT INTO met_language VALUES('3179','current_input','（当前已输入','1','0','1','0','cn');
INSERT INTO met_language VALUES('3180','sys_characters','个字符）','1','0','1','0','cn');
INSERT INTO met_language VALUES('3181','settings_effect','设置已生效','1','0','1','0','cn');
INSERT INTO met_language VALUES('3182','website_information','网站信息','1','0','1','0','cn');
INSERT INTO met_language VALUES('3183','email_Settings','邮件发送设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('3184','third_party_code','第三方代码','1','0','1','0','cn');
INSERT INTO met_language VALUES('3185','technology_business','无技术商业授权','1','0','1','0','cn');
INSERT INTO met_language VALUES('3186','purchase_in','购买中','1','0','1','0','cn');
INSERT INTO met_language VALUES('3187','please_login','请先登录！','1','0','1','0','cn');
INSERT INTO met_language VALUES('3188','server_failed','链接远程服务器失败','1','0','1','0','cn');
INSERT INTO met_language VALUES('3189','permission_download','无权限下载！！','1','0','1','0','cn');
INSERT INTO met_language VALUES('3190','Refresh_seconds','秒后刷新页面','1','0','1','0','cn');
INSERT INTO met_language VALUES('3191','in_processing','处理中','1','0','1','0','cn');
INSERT INTO met_language VALUES('3192','sys_results','项结果','1','0','1','0','cn');
INSERT INTO met_language VALUES('3193','Display_first','显示第','1','0','1','0','cn');
INSERT INTO met_language VALUES('3194','result_total','项结果，共','1','0','1','0','cn');
INSERT INTO met_language VALUES('3195','Results_filtering','项结果过滤','1','0','1','0','cn');
INSERT INTO met_language VALUES('3196','data_empty','表中数据为空','1','0','1','0','cn');
INSERT INTO met_language VALUES('3197','Of_load','载入中','1','0','1','0','cn');
INSERT INTO met_language VALUES('3198','on_page','上页','1','0','1','0','cn');
INSERT INTO met_language VALUES('3199','next_page','下页','1','0','1','0','cn');
INSERT INTO met_language VALUES('3200','at_page','末页','1','0','1','0','cn');
INSERT INTO met_language VALUES('3201','ascending_order','以升序排列此列','1','0','1','0','cn');
INSERT INTO met_language VALUES('3202','descending_order','以降序排列此列','1','0','1','0','cn');
INSERT INTO met_language VALUES('3203','background_page','后台首页','1','0','1','0','cn');
INSERT INTO met_language VALUES('3204','modify_information','修改个人资料','1','0','1','0','cn');
INSERT INTO met_language VALUES('3205','sys_select','精  选','1','0','1','0','cn');
INSERT INTO met_language VALUES('3206','should_used','应  用','1','0','1','0','cn');
INSERT INTO met_language VALUES('3207','sys_template','模  板','1','0','1','0','cn');
INSERT INTO met_language VALUES('3208','sys_purchase','购买','1','0','1','0','cn');
INSERT INTO met_language VALUES('3209','sys_payment','支付','1','0','1','0','cn');
INSERT INTO met_language VALUES('3210','extension_school','米拓学院','1','0','1','0','cn');
INSERT INTO met_language VALUES('3211','the_bit','位','1','0','1','0','cn');
INSERT INTO met_language VALUES('3212','the_server','服务器','1','0','1','0','cn');
INSERT INTO met_language VALUES('3213','the_version','版本','1','0','1','0','cn');
INSERT INTO met_language VALUES('3214','marketing','营销','1','0','8','0','cn');
INSERT INTO met_language VALUES('3215','safety_efficiency','安全与效率','1','0','8','0','cn');
INSERT INTO met_language VALUES('3216','data_processing','备份与恢复','1','0','8','0','cn');
INSERT INTO met_language VALUES('3217','computer','电脑','1','0','1','0','cn');
INSERT INTO met_language VALUES('3218','appearance','外观','1','0','1','0','cn');
INSERT INTO met_language VALUES('3219','seo_optimization','SEO优化','1','0','8','0','cn');
INSERT INTO met_language VALUES('3220','the_user','用户','1','0','8','0','cn');
INSERT INTO met_language VALUES('3221','mobile_edition','手机版','1','0','1','0','cn');
INSERT INTO met_language VALUES('3222','safety','安全','1','0','8','0','cn');
INSERT INTO met_language VALUES('3223','attention','关注','1','0','1','0','cn');
INSERT INTO met_language VALUES('3224','author','作者','1','0','1','0','cn');
INSERT INTO met_language VALUES('3225','news_prompt','您有一条留言信息，请查收！','1','0','1','0','cn');
INSERT INTO met_language VALUES('3226','news_prompt1','您有一条反馈信息，请查收！','1','0','1','0','cn');
INSERT INTO met_language VALUES('3227','sys_authorization','获得商业授权才能够享受技术支持服务','1','0','1','0','cn');
INSERT INTO met_language VALUES('3228','sys_authorization1','录入商业授权','1','0','1','0','cn');
INSERT INTO met_language VALUES('3229','sys_authorization2','了解商业授权','1','0','1','0','cn');
INSERT INTO met_language VALUES('3230','detection','检测中','1','0','1','0','cn');
INSERT INTO met_language VALUES('3231','recommended_tems','推荐应用','1','0','1','0','cn');
INSERT INTO met_language VALUES('3232','more_tems','更多模板','1','0','1','0','cn');
INSERT INTO met_language VALUES('3233','usernametips','如果有官网或交流论坛帐号，请注册成一样，因为我们即将同步三个平台的帐号','1','0','1','0','cn');
INSERT INTO met_language VALUES('3234','authorization_level','授权等级','1','0','1','0','cn');
INSERT INTO met_language VALUES('3235','technical_support','获取技术支持','1','0','1','0','cn');
INSERT INTO met_language VALUES('3236','entry_authorization','重新录入授权','1','0','1','0','cn');
INSERT INTO met_language VALUES('3237','title_description','请输入Title描述','1','0','1','0','cn');
INSERT INTO met_language VALUES('3238','tab_settings','产品模块选项卡设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('3239','display_number','选项卡显示数','1','0','1','0','cn');
INSERT INTO met_language VALUES('3240','corresponding_products','选项卡内容请在内容管理对应产品中填写','1','0','1','0','cn');
INSERT INTO met_language VALUES('3241','tab_title1','选项卡一标题','1','0','1','0','cn');
INSERT INTO met_language VALUES('3242','tab_title2','选项卡二标题','1','0','1','0','cn');
INSERT INTO met_language VALUES('3243','tab_title3','选项卡三标题','1','0','1','0','cn');
INSERT INTO met_language VALUES('3244','tab_title4','选项卡四标题','1','0','1','0','cn');
INSERT INTO met_language VALUES('3245','tab_title5','选项卡五标题','1','0','1','0','cn');
INSERT INTO met_language VALUES('3246','menu_settings','底部固定菜单设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('3247','settings_page','点此进入设置页面','1','0','1','0','cn');
INSERT INTO met_language VALUES('3248','height_setting','高度设置(宽度跟随界面宽度)','1','0','1','0','cn');
INSERT INTO met_language VALUES('3249','recommended_template','推荐模板','1','0','1','0','cn');
INSERT INTO met_language VALUES('3250','download_prompt','正在进行下载，请不要操作页面！','1','0','1','0','cn');
INSERT INTO met_language VALUES('3251','purchase_application','购买的应用只能作用于当前的网站','1','0','1','0','cn');
INSERT INTO met_language VALUES('3252','function_settings','功能设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('3253','add_menu','添加菜单','1','0','1','0','cn');
INSERT INTO met_language VALUES('3254','menu_effect','菜单效果','1','0','1','0','cn');
INSERT INTO met_language VALUES('3255','noadd_menu','尚未添加菜单','1','0','1','0','cn');
INSERT INTO met_language VALUES('3256','edit_menu','编辑菜单','1','0','1','0','cn');
INSERT INTO met_language VALUES('3257','menu_information','菜单信息','1','0','1','0','cn');
INSERT INTO met_language VALUES('3258','menu_information1','名称最多支持4个汉字字符（英文字符算半个汉字字符）','1','0','1','0','cn');
INSERT INTO met_language VALUES('3259','style_settings','风格设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('3260','icon_color','图标颜色','1','0','1','0','cn');
INSERT INTO met_language VALUES('3261','icon_color1','请点击输入框右边的颜色选择器设置颜色，为空时颜色则为白色','1','0','1','0','cn');
INSERT INTO met_language VALUES('3262','text_color','文字颜色','1','0','1','0','cn');
INSERT INTO met_language VALUES('3263','menu_click_effect','菜单点击效果','1','0','1','0','cn');
INSERT INTO met_language VALUES('3264','dial_telephone','拨打电话','1','0','1','0','cn');
INSERT INTO met_language VALUES('3265','customer_service','QQ客服','1','0','1','0','cn');
INSERT INTO met_language VALUES('3266','map_location','地图位置','1','0','1','0','cn');
INSERT INTO met_language VALUES('3267','home_page_link','首页链接','1','0','1','0','cn');
INSERT INTO met_language VALUES('3268','column_links','栏目链接','1','0','1','0','cn');
INSERT INTO met_language VALUES('3269','phone_number1','电话号码','1','0','1','0','cn');
INSERT INTO met_language VALUES('3270','dial_telephone1','手机访问时，点击该菜单拨打电话','1','0','1','0','cn');
INSERT INTO met_language VALUES('3271','customer_service1','手机访问时，点击该菜单拨打电话','1','0','1','0','cn');
INSERT INTO met_language VALUES('3272','qq_number','QQ号码','1','0','1','0','cn');
INSERT INTO met_language VALUES('3273','qq_number1','请确认QQ在线开启，如未开启，请到QQ商家中开启。','1','0','1','0','cn');
INSERT INTO met_language VALUES('3274','the_jump','点击跳转','1','0','1','0','cn');
INSERT INTO met_language VALUES('3275','map_location1','点击该菜单跳转地图信息页面','1','0','1','0','cn');
INSERT INTO met_language VALUES('3276','map_location2','输入地址后点击搜索，下面的地图会定位到对应的位置','1','0','1','0','cn');
INSERT INTO met_language VALUES('3277','the_menu','底部菜单','1','0','1','0','cn');
INSERT INTO met_language VALUES('3278','menu_management','菜单管理','1','0','1','0','cn');
INSERT INTO met_language VALUES('3279','the_menu1','可创建最多 4 个菜单，每个菜单有拨打电话、QQ客服、地图位置、首页链接、栏目链接5种类型选择。','1','0','1','0','cn');
INSERT INTO met_language VALUES('3280','menu_functions','菜单功能','1','0','1','0','cn');
INSERT INTO met_language VALUES('3281','menu_functions1','关闭后将不显示底部菜单','1','0','1','0','cn');
INSERT INTO met_language VALUES('3282','display_effect','显示效果','1','0','1','0','cn');
INSERT INTO met_language VALUES('3283','display_effect1','图标可展开式','1','0','1','0','cn');
INSERT INTO met_language VALUES('3284','display_effect2','底部固定式','1','0','1','0','cn');
INSERT INTO met_language VALUES('3285','display_effect3','设置底部菜单显示的效果','1','0','1','0','cn');
INSERT INTO met_language VALUES('3286','background_color','背景颜色','1','0','1','0','cn');
INSERT INTO met_language VALUES('3287','pink','粉色','1','0','1','0','cn');
INSERT INTO met_language VALUES('3288','custom_colors','自定义颜色','1','0','1','0','cn');
INSERT INTO met_language VALUES('3289','custom_picture','自定义图片','1','0','1','0','cn');
INSERT INTO met_language VALUES('3290','custom_colors1','输入十六进制颜色值，为空时颜色则为蓝色','1','0','1','0','cn');
INSERT INTO met_language VALUES('3291','custom_picture1','设置底部菜单背景图片，建议图片的尺寸为 340 X 45像素','1','0','1','0','cn');
INSERT INTO met_language VALUES('3292','app_datele','您确定要卸载该应用吗？卸载后应用相应的数据也会被清空！','1','0','1','0','cn');
INSERT INTO met_language VALUES('3293','map_location3','点击地图上位置可以移动图标','1','0','1','0','cn');
INSERT INTO met_language VALUES('3294','update_permissions','取消之后该管理员无法在后头操作在线升级','1','0','1','0','cn');
INSERT INTO met_language VALUES('3295','external_links','外部链接','1','0','1','0','cn');
INSERT INTO met_language VALUES('3296','appmarket_jurisdiction','您没有查看应用市场的权限，请联系管理员开通。','1','0','1','0','cn');
INSERT INTO met_language VALUES('3297','setup_permissions','您没有设置权限，请联系管理员开通。','1','0','1','0','cn');
INSERT INTO met_language VALUES('3298','permission_upgrade','升级权限','1','0','1','0','cn');
INSERT INTO met_language VALUES('3299','metinfo_explain','MetInfo是一款非常棒的企业网站管理系统（CMS）！可以免费用的哦！','1','0','1','0','cn');
INSERT INTO met_language VALUES('3300','share_friends','分享给朋友','1','0','1','0','cn');
INSERT INTO met_language VALUES('3301','installation_template','官方6.0新模板请直接在应用商店中安装或使用“我的应用”中“官方模板管理工具”进行导入添加<br>','1','0','1','0','cn');
INSERT INTO met_language VALUES('3302','install_application','如果需安装自己制作的模板，请到应用市场安装','1','0','1','0','cn');
INSERT INTO met_language VALUES('3303','template_assistant','模板制作助手','1','0','1','0','cn');
INSERT INTO met_language VALUES('3304','specified_link','点击跳转到指定链接','1','0','1','0','cn');
INSERT INTO met_language VALUES('3305','release','添加','1','0','1','0','cn');
INSERT INTO met_language VALUES('3306','administration','管理','1','0','1','0','cn');
INSERT INTO met_language VALUES('3307','customers','客服','1','0','1','0','cn');
INSERT INTO met_language VALUES('3308','seo','SEO','1','0','1','0','cn');
INSERT INTO met_language VALUES('3309','member','会员','1','0','1','0','cn');
INSERT INTO met_language VALUES('3310','language','语言','1','0','1','0','cn');
INSERT INTO met_language VALUES('3311','htmltopseudo','静态页面伪静态化','1','0','1','0','cn');
INSERT INTO met_language VALUES('3312','htmltopseudotips','使用伪静态方式实现静态页面URL，当前静态页面URL不变。对SEO效果不会产生影响。需要空间支持伪静态，并且会删除静态页面文件。','1','0','1','0','cn');
INSERT INTO met_language VALUES('3313','htmlnocreatetips','静态页面url已经转成伪静态，无需生成静态页面','1','0','1','0','cn');
INSERT INTO met_language VALUES('3314','timedrelease','定时发布','1','0','1','0','cn');
INSERT INTO met_language VALUES('3315','timedreleasetips','把发布时间设置为未来时间，即可在指定时间发布，此功能不支持静态页面，如静态页面需要使用此功能，请设置静态页面功能伪静态化。','1','0','1','0','cn');
INSERT INTO met_language VALUES('3316','clickset','点击设置','1','0','1','0','cn');
INSERT INTO met_language VALUES('3317','timelisttips1','(将于','1','0','1','0','cn');
INSERT INTO met_language VALUES('3318','timelisttips2','发布）','1','0','1','0','cn');
INSERT INTO met_language VALUES('3319','mod_rewrite_column','开启伪静态化需空间环境配置开启mod_rewrite模块，如没有开启则联系空间商解决。','1','0','1','0','cn');
INSERT INTO met_language VALUES('3320','displaytype2','前台隐藏','1','0','0','0','cn');
INSERT INTO met_language VALUES('3321','js73','静态页面名称已被使用','1','0','0','0','cn');
INSERT INTO met_language VALUES('3322','js74','仅支持中文、大小写字母、数字、下划线','1','0','0','0','cn');
INSERT INTO met_language VALUES('3323','js75','名称可用','1','0','0','0','cn');
INSERT INTO met_language VALUES('3324','js76','请先添加栏目再在此页面设置页面内容','1','0','0','0','cn');
INSERT INTO met_language VALUES('3325','unrecom','取消推荐','1','0','0','0','cn');
INSERT INTO met_language VALUES('3326','untop','取消置顶','1','0','0','0','cn');
INSERT INTO met_language VALUES('3327','timedreleasecancel','取消定时发布','1','0','0','0','cn');
INSERT INTO met_language VALUES('3328','modistauts','状态修改','1','0','0','0','cn');
INSERT INTO met_language VALUES('3329','shelvesup','上架','1','0','0','0','cn');
INSERT INTO met_language VALUES('3330','shelvesdown','下架','1','0','0','0','cn');
INSERT INTO met_language VALUES('3331','goods','商品','1','0','0','0','cn');
INSERT INTO met_language VALUES('3332','js77','后台文件夹名称仅支持大小写字母、数字、下划线','1','0','0','0','cn');
INSERT INTO met_language VALUES('3333','js78','管理员名称不能重复','1','0','0','0','cn');
INSERT INTO met_language VALUES('3334','banner_pcheight_v6','电脑端高度','1','0','0','0','cn');
INSERT INTO met_language VALUES('3335','banner_setalert_v6','填数值，（如300，代表300px）建议自适应高度','1','0','0','0','cn');
INSERT INTO met_language VALUES('3336','banner_pidheight_v6','平板电脑端高度','1','0','0','0','cn');
INSERT INTO met_language VALUES('3337','banner_phoneheight_v6','手机端高度','1','0','0','0','cn');
INSERT INTO met_language VALUES('3338','banner_height_v6','高度','1','0','0','0','cn');
INSERT INTO met_language VALUES('3339','banner_imgtitlecolor_v6','图片标题颜色','1','0','0','0','cn');
INSERT INTO met_language VALUES('3340','banner_needtempsupport_v6','该设置需要模板支持','1','0','0','0','cn');
INSERT INTO met_language VALUES('3341','banner_imgdesc_v6','图片描述','1','0','0','0','cn');
INSERT INTO met_language VALUES('3342','banner_imgdesccolor_v6','图片描述颜色','1','0','0','0','cn');
INSERT INTO met_language VALUES('3343','banner_imgwordpos_v6','图片文字位置','1','0','0','0','cn');
INSERT INTO met_language VALUES('3344','posleft','左','1','0','0','0','cn');
INSERT INTO met_language VALUES('3345','posright','右','1','0','0','0','cn');
INSERT INTO met_language VALUES('3346','posup','上','1','0','0','0','cn');
INSERT INTO met_language VALUES('3347','poslower','下','1','0','0','0','cn');
INSERT INTO met_language VALUES('3348','poscenter','居中','1','0','0','0','cn');
INSERT INTO met_language VALUES('3349','batch_wm_v6','批量水印','1','0','0','0','cn');
INSERT INTO met_language VALUES('3350','batch_rmwm_v6','去除水印','1','0','0','0','cn');
INSERT INTO met_language VALUES('3351','batch_addwm_v6','添加水印','1','0','0','0','cn');
INSERT INTO met_language VALUES('3352','admin_movetocolumn_v6','移动到指定栏目','1','0','0','0','cn');
INSERT INTO met_language VALUES('3353','admin_copytocolumn_v6','复制到指定栏目','1','0','0','0','cn');
INSERT INTO met_language VALUES('3354','doogsimg','商品图片','1','0','0','0','cn');
INSERT INTO met_language VALUES('3355','admin_holdcanrlchoose_v6','按住 Ctrl 可以多选','1','0','0','0','cn');
INSERT INTO met_language VALUES('3356','admin_colunmmanage_v6','栏目管理','1','0','0','0','cn');
INSERT INTO met_language VALUES('3357','admin_dropsort_v6','拖拽图片调整图片顺序','1','0','0','0','cn');
INSERT INTO met_language VALUES('3358','parmanage','参数管理','1','0','0','0','cn');
INSERT INTO met_language VALUES('3359','refresh','刷新','1','0','0','0','cn');
INSERT INTO met_language VALUES('3360','admin_seotips1_v6','为空则系统自动构成，可以到 SEO 中设置构成规则。','1','0','0','0','cn');
INSERT INTO met_language VALUES('3361','desctext','描述文字','1','0','0','0','cn');
INSERT INTO met_language VALUES('3362','admin_seotips3_v6','显示在商品详情页底部，用于聚合内容。','1','0','0','0','cn');
INSERT INTO met_language VALUES('3363','admin_seotips2_v6','空则系统自动抓取商品详情。','1','0','0','0','cn');
INSERT INTO met_language VALUES('3364','linkto','链接至','1','0','0','0','cn');
INSERT INTO met_language VALUES('3365','admin_seotips6_v6','定时发布不支持静态页面，请关闭静态页面。（可以使用伪静态）','1','0','0','0','cn');
INSERT INTO met_language VALUES('3366','releasenow','立即发布','1','0','0','0','cn');
INSERT INTO met_language VALUES('3367','publish','发布商品','1','0','0','0','cn');
INSERT INTO met_language VALUES('3368','js79','访问量','1','0','0','0','cn');
INSERT INTO met_language VALUES('3369','added','新增','1','0','0','0','cn');
INSERT INTO met_language VALUES('3370','admin_tagadder_v6','标签增加器','1','0','0','0','cn');
INSERT INTO met_language VALUES('3371','js80','确定','1','0','0','0','cn');
INSERT INTO met_language VALUES('3372','column_littleicon_v6','小图标icon','1','0','0','0','cn');
INSERT INTO met_language VALUES('3373','column_choosicon_v6','选择图标','1','0','0','0','cn');
INSERT INTO met_language VALUES('3374','column_backiconlist_v6','返回图标库列表','1','0','0','0','cn');
INSERT INTO met_language VALUES('3375','column_saveicon_v6','点击选中图标并保存','1','0','0','0','cn');
INSERT INTO met_language VALUES('3376','column_addcolumn_v6','添加新栏目','1','0','0','0','cn');
INSERT INTO met_language VALUES('3377','column_inputcolumnfolder_v6','输入栏目文件夹名称','1','0','0','0','cn');
INSERT INTO met_language VALUES('3378','column_pageedito_v6','页面编辑','1','0','0','0','cn');
INSERT INTO met_language VALUES('3379','browserupdatetips','你正在使用一个 <strong>过时</strong> 的浏览器。请 <a href=https://browsehappy.com/ target=_blank>升级您的浏览器</a>，以提高您的体验。','1','0','0','0','cn');
INSERT INTO met_language VALUES('3380','iconsettips','同一区块推荐尽量使用同一套图标库中的图标，以保持图标风格样式的统一性。','1','0','0','0','cn');
INSERT INTO met_language VALUES('3381','column_selecticonlib_v6','图标库选择','1','0','0','0','cn');
INSERT INTO met_language VALUES('3382','column_viewicon_v6','浏览图标','1','0','0','0','cn');
INSERT INTO met_language VALUES('3383','column_selecticon_v6','图标选择','1','0','0','0','cn');
INSERT INTO met_language VALUES('3384','tips1_v6','为空则系统自动抓取详细内容排序靠前的部分文字','1','0','0','0','cn');
INSERT INTO met_language VALUES('3385','tips2_v6','显示在详情页底部，用于聚合内容','1','0','0','0','cn');
INSERT INTO met_language VALUES('3386','tips3_v6','点击 + 号输入选项名，再点击 + 号或回车完成添加，点击“确定”后，需要再点击页面下方“保存”按钮才能完成数据保存！','1','0','0','0','cn');
INSERT INTO met_language VALUES('3387','tips4_v6','请输入网址（需要包含http或https），设置后访问该条信息将直接跳转到设置的网址','1','0','0','0','cn');
INSERT INTO met_language VALUES('3388','tips5_v6','定时发布不支持静态页面，请关闭静态页面。（可以使用伪静态）','1','0','0','0','cn');
INSERT INTO met_language VALUES('3389','tips6_v6','为空则系统自动构成，可以到 营销-SEO 中设置构成规则。','1','0','0','0','cn');
INSERT INTO met_language VALUES('3390','tips7_v6','当没有手动上传图片时候，会自动提取详细信息第一张图片作为封面（此功能需要模板支持）','1','0','0','0','cn');
INSERT INTO met_language VALUES('3391','coverimg','封面图片','1','0','0','0','cn');
INSERT INTO met_language VALUES('3392','articletitle','文章标题','1','0','0','0','cn');
INSERT INTO met_language VALUES('3393','htmTip3','生成首页','1','0','5','0','cn');
INSERT INTO met_language VALUES('3394','choicecolor','选择颜色','1','0','0','0','cn');
INSERT INTO met_language VALUES('3395','js81','您没有此操作权限请联系管理员','1','0','0','0','cn');
INSERT INTO met_language VALUES('3396','help1','帮助教程','1','0','0','0','cn');
INSERT INTO met_language VALUES('3397','help2','友情提示','1','0','0','0','cn');
INSERT INTO met_language VALUES('3398','tips8_v6','你的网站后台管理文件夹名称存在严重风险，建议你尽快修改','1','0','0','0','cn');
INSERT INTO met_language VALUES('3399','nohint','不再提示','1','0','0','0','cn');
INSERT INTO met_language VALUES('3400','tochange','前往修改','1','0','0','0','cn');
INSERT INTO met_language VALUES('3401','close','关闭','1','0','0','0','cn');
INSERT INTO met_language VALUES('3402','homepage','首页','1','0','0','0','cn');
INSERT INTO met_language VALUES('3403','backstage','后台','1','0','0','0','cn');
INSERT INTO met_language VALUES('3404','visualization','可视化','1','0','0','0','cn');
INSERT INTO met_language VALUES('3405','opfailed','操作失败','1','0','0','0','cn');
INSERT INTO met_language VALUES('3406','unread','未阅读','1','0','0','0','cn');
INSERT INTO met_language VALUES('3407','savesuccess','保存成功','1','0','0','0','cn');
INSERT INTO met_language VALUES('3408','language_outputlang_v6','导出语言包','1','0','0','0','cn');
INSERT INTO met_language VALUES('3409','language_batchreplace_v6','批量替换语言','1','0','0','0','cn');
INSERT INTO met_language VALUES('3410','language_copysetting_v6','复制基本设置','1','0','0','0','cn');
INSERT INTO met_language VALUES('3411','notcopy','不复制','1','0','0','0','cn');
INSERT INTO met_language VALUES('3412','language_tips1_v6','基于选中的语言复制除栏目内容外的全部参数配置','1','0','0','0','cn');
INSERT INTO met_language VALUES('3413','language_tips2_v6','基于选中的语言复制栏目及内容信息（共用选中语言的图片、附件等）','1','0','0','0','cn');
INSERT INTO met_language VALUES('3414','websitetheme','网站主题风格','1','0','0','0','cn');
INSERT INTO met_language VALUES('3415','language_tips3_v6','基于选中的语言复制模板设置参数','1','0','0','0','cn');
INSERT INTO met_language VALUES('3416','language_backlangchange_v6','后台语言切换','1','0','0','0','cn');
INSERT INTO met_language VALUES('3417','language_updatelang_v6','更新语言包数据<br>请严格按照导出格式粘贴于此','1','0','0','0','cn');
INSERT INTO met_language VALUES('3418','message_mailtext_v6','_提交了留言','1','0','0','0','cn');
INSERT INTO met_language VALUES('3419','nopicture','暂无图片','1','0','0','0','cn');
INSERT INTO met_language VALUES('3420','message_tips1_v6','提示文字，为空时显示，输入文字后消失','1','0','0','0','cn');
INSERT INTO met_language VALUES('3421','onlone_onlinelist_v6','客服列表','1','0','0','0','cn');
INSERT INTO met_language VALUES('3422','onlone_online_v6','在线客服','1','0','0','0','cn');
INSERT INTO met_language VALUES('3423','online_csname_v6','客服名称','1','0','0','0','cn');
INSERT INTO met_language VALUES('3424','online_taobaocs_v6','淘宝旺旺','1','0','0','0','cn');
INSERT INTO met_language VALUES('3425','online_alics_v6','阿里旺旺','1','0','0','0','cn');
INSERT INTO met_language VALUES('3426','online_tips1_v6','添加的QQ需要到【shang.qq.com】登录后在【推广工具—设置】安全级别选择完全公开，否则将显示“未启用” <br>添加的QQ号码，需要到个人QQ设置-权限设置里面，开启临时会话功能，否则点击QQ，将提示添加好友才能对话','1','0','0','0','cn');
INSERT INTO met_language VALUES('3427','parameter7','城市选择','1','0','0','0','cn');
INSERT INTO met_language VALUES('3428','confirm','确定','1','0','0','0','cn');
INSERT INTO met_language VALUES('3429','submit','保存','1','0','0','0','cn');
INSERT INTO met_language VALUES('3430','column1','栏目1','1','0','0','0','cn');
INSERT INTO met_language VALUES('3431','column2','栏目2','1','0','0','0','cn');
INSERT INTO met_language VALUES('3432','frontshow','前台显示','1','0','0','0','cn');
INSERT INTO met_language VALUES('3433','fronthidden','前台隐藏','1','0','0','0','cn');
INSERT INTO met_language VALUES('3434','state','状态','1','0','0','0','cn');
INSERT INTO met_language VALUES('3435','visitcount','访问量','1','0','0','0','cn');
INSERT INTO met_language VALUES('3436','tips9_v6','支持中文、大小写字母、数字、下划线','1','0','0','0','cn');
INSERT INTO met_language VALUES('3437','tips10_v6','自定义页面title','1','0','0','0','cn');
INSERT INTO met_language VALUES('3438','goodsdetails','商品详情','1','0','0','0','cn');
INSERT INTO met_language VALUES('3439','selectcolumn','请选择所属栏目','1','0','0','0','cn');
INSERT INTO met_language VALUES('3440','tips11_v6','可以拖拽图片调整图片顺序。','1','0','0','0','cn');
INSERT INTO met_language VALUES('3441','tips12_v6','按住 Ctrl 可以多选','1','0','0','0','cn');
INSERT INTO met_language VALUES('3442','columumanage','栏目管理','1','0','0','0','cn');
INSERT INTO met_language VALUES('3443','titletips','标题（名称）','1','0','0','0','cn');
INSERT INTO met_language VALUES('3444','recyclere_tips1_v6','仅支持（新闻、产品、下载、图片）模块的内容。','1','0','0','0','cn');
INSERT INTO met_language VALUES('3445','seotips1','过滤不显示在导航的一级栏目','1','0','0','0','cn');
INSERT INTO met_language VALUES('3446','seotips2','网站地图生成的栏目仅限一级栏目和显示在导航栏上栏目。<br / >不显示内容与栏目，都不会在网站地图中生成。','1','0','0','0','cn');
INSERT INTO met_language VALUES('3447','seotips3','相比于纯静态功能，伪静态更适合信息内容较少的企业网站，既能满足SEO优化，又能方便的管理。','1','0','0','0','cn');
INSERT INTO met_language VALUES('3448','defaultlangtag','默认语言标识','1','0','0','0','cn');
INSERT INTO met_language VALUES('3449','seotips4','默认语言标示开启后，默认语言伪静态文件会在最后添加一个“-语言标示”，比如“-cn”','1','0','0','0','cn');
INSERT INTO met_language VALUES('3450','uisetTips3','当前页面没有可设置参数，请点击页面中相应区块的“设置”和“内容”按钮进行设置','1','0','0','0','cn');
INSERT INTO met_language VALUES('3451','theme_tips1_v6','图片建议尺寸：500*500 (像素)','1','0','0','0','cn');
INSERT INTO met_language VALUES('3452','theme_tips2_v6','为空则调用电脑版LOGO，推荐尺寸：130*50 (像素)','1','0','0','0','cn');
INSERT INTO met_language VALUES('3453','replacemethod','替换方式','1','0','0','0','cn');
INSERT INTO met_language VALUES('3454','replacemeth1','替换当前图片文件','1','0','0','0','cn');
INSERT INTO met_language VALUES('3455','replacemeth2','保留当前图片文件，上传新图片','1','0','0','0','cn');
INSERT INTO met_language VALUES('3456','uploadimg','上传图片','1','0','0','0','cn');
INSERT INTO met_language VALUES('3457','addbaricon','地址栏图标','1','0','0','0','cn');
INSERT INTO met_language VALUES('3458','webset_tips1_v6','如果无法正常显示新上传图标，清空浏览器缓存后访问。','1','0','0','0','cn');
INSERT INTO met_language VALUES('3459','webset_tips2_v6','点击制作ICO','1','0','0','0','cn');
INSERT INTO met_language VALUES('3460','icontips','的.ico文件。','1','0','0','0','cn');
INSERT INTO met_language VALUES('3461','Mobile','移动端','1','0','0','0','cn');
INSERT INTO met_language VALUES('3462','PC','电脑端','1','0','0','0','cn');
INSERT INTO met_language VALUES('3463','memberist','会员列表','1','0','0','0','cn');
INSERT INTO met_language VALUES('3464','membergroup','会员组','1','0','0','0','cn');
INSERT INTO met_language VALUES('3465','memberattribute','会员属性','1','0','0','0','cn');
INSERT INTO met_language VALUES('3466','memberfunc','会员功能设置','1','0','0','0','cn');
INSERT INTO met_language VALUES('3467','thirdlogin','社会化登录','1','0','0','0','cn');
INSERT INTO met_language VALUES('3468','mailcontentsetting','邮件内容设置','1','0','0','0','cn');
INSERT INTO met_language VALUES('3469','user_tips1_v6','可以注册','1','0','0','0','cn');
INSERT INTO met_language VALUES('3470','user_tips2_v6','含有非法字符','1','0','0','0','cn');
INSERT INTO met_language VALUES('3471','user_tips3_v6','用户名已存在','1','0','0','0','cn');
INSERT INTO met_language VALUES('3472','user_tips4_v6','请输入6-30位的密码','1','0','0','0','cn');
INSERT INTO met_language VALUES('3473','edsuccess','编辑成功','1','0','0','0','cn');
INSERT INTO met_language VALUES('3474','weixinlogin','微信登录','1','0','0','0','cn');
INSERT INTO met_language VALUES('3475','sinalogin','微博登录','1','0','0','0','cn');
INSERT INTO met_language VALUES('3476','qqlogin','QQ登录','1','0','0','0','cn');
INSERT INTO met_language VALUES('3477','register','注册','1','0','0','0','cn');
INSERT INTO met_language VALUES('3478','lastactive','最后活跃','1','0','0','0','cn');
INSERT INTO met_language VALUES('3479','source','来源','1','0','0','0','cn');
INSERT INTO met_language VALUES('3480','bindingmail','绑定邮箱','1','0','0','0','cn');
INSERT INTO met_language VALUES('3481','bindingmobile','绑定手机','1','0','0','0','cn');
INSERT INTO met_language VALUES('3482','membergroupname','会员组名称','1','0','0','0','cn');
INSERT INTO met_language VALUES('3483','systips1','您没有权限访问这个内容！请登陆后访问！','1','0','0','0','cn');
INSERT INTO met_language VALUES('3484','systips2','您所在用户组没有权限访问这个内容！','1','0','0','0','cn');
INSERT INTO met_language VALUES('3485','unrestricted','不限制','1','0','0','0','cn');
INSERT INTO met_language VALUES('3486','dowloadauthority','下载权限','1','0','0','0','cn');
INSERT INTO met_language VALUES('3487','save','保存','1','0','0','0','cn');
INSERT INTO met_language VALUES('3488','hiddensetting','隐藏设置','1','0','0','0','cn');
INSERT INTO met_language VALUES('3489','syssetting','系统设置','1','0','0','0','cn');
INSERT INTO met_language VALUES('3490','baceinfo','基本信息','1','0','0','0','cn');
INSERT INTO met_language VALUES('3491','goodspar','商品参数','1','0','0','0','cn');
INSERT INTO met_language VALUES('3492','goodsname','商品名称','1','0','0','0','cn');
INSERT INTO met_language VALUES('3493','createstatic','静态页面生成','1','163','5','0','cn');
INSERT INTO met_language VALUES('3494','staticpage','静态页面设置','1','162','5','0','cn');
INSERT INTO met_language VALUES('3495','pseudostatic','伪静态','1','164','5','0','cn');
INSERT INTO met_language VALUES('3496','setequivalentcolumns','当前栏目','1','22','2','0','cn');
INSERT INTO met_language VALUES('3497','veditor','可视化编辑','1','0','0','0','cn');
INSERT INTO met_language VALUES('3498','veditortips1','开启（管理员会拥有所有可视化编辑状态下的管理功能）','1','0','0','0','cn');
INSERT INTO met_language VALUES('3499','loading','获取中...','1','0','0','0','cn');
INSERT INTO met_language VALUES('3500','systips3','处理时间：每天 ','1','0','0','0','cn');
INSERT INTO met_language VALUES('3501','systips4','工单','1','0','0','0','cn');
INSERT INTO met_language VALUES('3502','systips5','在线时间：工作日','1','0','0','0','cn');
INSERT INTO met_language VALUES('3503','systips6','点我咨询','1','0','0','0','cn');
INSERT INTO met_language VALUES('3504','systips7','到期','1','0','0','0','cn');
INSERT INTO met_language VALUES('3505','systips8','于','1','0','0','0','cn');
INSERT INTO met_language VALUES('3506','systips9','续费服务','1','0','0','0','cn');
INSERT INTO met_language VALUES('3507','systips10','尚未开通服务','1','0','0','0','cn');
INSERT INTO met_language VALUES('3508','systips11','什么是技术支持？','1','0','0','0','cn');
INSERT INTO met_language VALUES('3509','systips12','开通服务','1','0','0','0','cn');
INSERT INTO met_language VALUES('3510','funcCollection','功能大全','1','0','0','0','cn');
INSERT INTO met_language VALUES('3511','websiteSet','网站配置与管理','1','0','0','0','cn');
INSERT INTO met_language VALUES('3512','systemModule','系统模块','1','0','0','0','cn');
INSERT INTO met_language VALUES('3513','appearanceSetting','外观设置','1','0','0','0','cn');
INSERT INTO met_language VALUES('3514','basicInfoSet','基本信息配置','1','0','0','0','cn');
INSERT INTO met_language VALUES('3515','multilingual','多语言','1','0','0','0','cn');
INSERT INTO met_language VALUES('3516','mailSetting','邮件发送设置','1','0','0','0','cn');
INSERT INTO met_language VALUES('3517','thirdCode','第三方代码添加','1','0','0','0','cn');
INSERT INTO met_language VALUES('3518','watermarkThumbnail','水印/缩略图','1','0','0','0','cn');
INSERT INTO met_language VALUES('3519','customerService','在线客服','1','0','0','0','cn');
INSERT INTO met_language VALUES('3520','recycleBin','回收站','1','0','0','0','cn');
INSERT INTO met_language VALUES('3521','securityTools','系统安全与工具','1','0','0','0','cn');
INSERT INTO met_language VALUES('3522','dataRecovery','数据恢复','1','0','0','0','cn');
INSERT INTO met_language VALUES('3523','searchEngineOptimization','SEO搜索引擎优化','1','0','0','0','cn');
INSERT INTO met_language VALUES('3524','seoSetting','SEO参数设置','1','0','0','0','cn');
INSERT INTO met_language VALUES('3525','thirdPartyLogin','社会化登录设置','1','0','0','0','cn');
INSERT INTO met_language VALUES('3526','appAndPlugin','应用插件及增值服务','1','0','0','0','cn');
INSERT INTO met_language VALUES('3527','metShop','官方商城','1','0','0','0','cn');
INSERT INTO met_language VALUES('3528','commercialAuthorizationCode','商业授权代码','1','0','0','0','cn');
INSERT INTO met_language VALUES('3529','systips13','老版本模板兼容（非响应式模板）','1','0','0','0','cn');
INSERT INTO met_language VALUES('3530','mobileSetting','手机版设置','1','0','0','0','cn');
INSERT INTO met_language VALUES('3531','mobileVersion','手机版外观','1','0','0','0','cn');
INSERT INTO met_language VALUES('3532','uisetTips1','图片建议尺寸：500*500 (像素)','1','0','0','0','cn');
INSERT INTO met_language VALUES('3533','metinfoSystem','米拓企业建站系统','1','0','0','0','cn');
INSERT INTO met_language VALUES('3534','uisetTips4','当前页面预览','1','0','0','0','cn');
INSERT INTO met_language VALUES('3535','uisetTips5','当前页面系统参数设置','1','0','0','0','cn');
INSERT INTO met_language VALUES('3536','uisetTips6','页面设置','1','0','0','0','cn');
INSERT INTO met_language VALUES('3537','moreSettings','更多设置','1','0','0','0','cn');
INSERT INTO met_language VALUES('3538','sysMailboxConfig','系统邮箱配置','1','0','0','0','cn');
INSERT INTO met_language VALUES('3539','navSetting','导航菜单设置','1','0','0','0','cn');
INSERT INTO met_language VALUES('3540','oldBackstage','传统后台','1','0','0','0','cn');
INSERT INTO met_language VALUES('3541','sysMessage','系统消息','1','0','0','0','cn');
INSERT INTO met_language VALUES('3542','uisetTips7','风格设置（此处设置网站总体风格，模板的每个区块可以设置区块风格参数）','1','0','0','0','cn');
INSERT INTO met_language VALUES('3543','replaceImg','替换图片','1','0','0','0','cn');
INSERT INTO met_language VALUES('3544','selectReplaceIcon','选择替换图标','1','0','0','0','cn');
INSERT INTO met_language VALUES('3545','uisetTips8','隐藏该元素<br>（隐藏后方便修改被遮挡的元素，<br>刷新页面可再次显示）','1','0','0','0','cn');
INSERT INTO met_language VALUES('3546','putIntoRecycle','放入回收站','1','0','0','0','cn');
INSERT INTO met_language VALUES('3547','thoroughlyDeleting','彻底删除','1','0','0','0','cn');
INSERT INTO met_language VALUES('3548','unselected','没有选中的记录','1','0','0','0','cn');
INSERT INTO met_language VALUES('3549','websiteContent','网站基本内容','1','0','0','0','cn');
INSERT INTO met_language VALUES('3550','jslang0','放入回收站','1','0','0','1','cn');
INSERT INTO met_language VALUES('3551','jslang1','彻底删除','1','0','0','1','cn');
INSERT INTO met_language VALUES('3552','jslang2','取消','1','0','0','1','cn');
INSERT INTO met_language VALUES('3553','seotips26','开启后能够简化前台网页URL（网址），并且以html结尾（静态页面功能关闭状态下方能生效）。','1','0','0','0','cn');
INSERT INTO met_language VALUES('3554','systips14','（开启前请确保伪静态功能已关闭）','1','0','0','0','cn');
INSERT INTO met_language VALUES('3555','systips15','MB（如网站后台设置值超过服务器限制的上传文件最大值，则以服务器限制的数值为准）','1','0','0','0','cn');
INSERT INTO met_language VALUES('3556','third_code_mobile','移动端第三方代码','1','0','0','0','cn');
INSERT INTO met_language VALUES('3557','clearCache','清空缓存','1','0','0','0','cn');
INSERT INTO met_language VALUES('3558','jsx39','（删除栏目时将删除栏目下的所有内容）','1','0','0','0','cn');
INSERT INTO met_language VALUES('3559','onlineHolder1','请输入客服名称','1','0','0','0','cn');
INSERT INTO met_language VALUES('3560','onlineHolder2','请输入客服信息','1','0','0','0','cn');
INSERT INTO met_language VALUES('3561','jslang3','没有选中的记录','1','0','0','1','cn');
INSERT INTO met_language VALUES('3562','jslang4','请选择所属栏目','1','0','0','1','cn');
INSERT INTO met_language VALUES('3563','jslang5','我知道了','1','0','0','1','cn');
INSERT INTO met_language VALUES('3564','jslang6','展开更多设置','1','0','0','1','cn');
INSERT INTO met_language VALUES('3565','jslang7','隐藏设置','1','0','0','1','cn');
INSERT INTO met_language VALUES('3566','newFeedback','您收到了新的反馈','1','0','0','0','cn');
INSERT INTO met_language VALUES('3567','onlone_onlinetitle_v6','在线客服表单名称请在多语言参数中修改','1','0','0','0','cn');
INSERT INTO met_language VALUES('3568','unitytxt_74','Check out the Business WAP feature','1','438','8','0','en');
INSERT INTO met_language VALUES('3569','unitytxt_73','Map settings (used to set the wap page fixed at the bottom of the function)','1','437','8','0','en');
INSERT INTO met_language VALUES('3570','unitytxt_72','Map setting','1','436','8','0','en');
INSERT INTO met_language VALUES('3571','unitytxt_71','QR code','1','435','8','0','en');
INSERT INTO met_language VALUES('3572','unitytxt_69','Installation, upgrade file deletion','1','433','8','0','en');
INSERT INTO met_language VALUES('3573','unitytxt_70','upload files','1','434','8','0','en');
INSERT INTO met_language VALUES('3574','unitytxt_68','When the founders account is admin, you have a chance to edit the founders name.','1','432','8','0','en');
INSERT INTO met_language VALUES('3575','unitytxt_67','change into','1','431','8','0','en');
INSERT INTO met_language VALUES('3576','unitytxt_63','QQ support','1','427','8','0','en');
INSERT INTO met_language VALUES('3577','unitytxt_64','Forum support','1','428','8','0','en');
INSERT INTO met_language VALUES('3578','unitytxt_64','Forum support','1','428','8','0','en');
INSERT INTO met_language VALUES('3579','unitytxt_65','Service Information','1','429','8','0','en');
INSERT INTO met_language VALUES('3580','unitytxt_66','Service Term','1','430','8','0','en');
INSERT INTO met_language VALUES('3581','unitytxt_62','Phone support','1','426','8','0','en');
INSERT INTO met_language VALUES('3582','unitytxt_61','service method','1','425','8','0','en');
INSERT INTO met_language VALUES('3583','unitytxt_59','Re-enter the commercial authorization code','1','423','8','0','en');
INSERT INTO met_language VALUES('3584','unitytxt_60','Enjoy service','1','424','8','0','en');
INSERT INTO met_language VALUES('3585','unitytxt_58','Date of Expiry','1','422','8','0','en');
INSERT INTO met_language VALUES('3586','unitytxt_57','Authorization date','1','421','8','0','en');
INSERT INTO met_language VALUES('3587','unitytxt_54','Authorized domain name','1','418','8','0','en');
INSERT INTO met_language VALUES('3588','unitytxt_55','Website name','1','419','8','0','en');
INSERT INTO met_language VALUES('3589','unitytxt_56','Authorization type','1','420','8','0','en');
INSERT INTO met_language VALUES('3590','unitytxt_53','Please enter the common function name!','1','417','8','0','en');
INSERT INTO met_language VALUES('3591','unitytxt_52','Please select a point to function!','1','416','8','0','en');
INSERT INTO met_language VALUES('3592','unitytxt_49','Select the point function','1','413','8','0','en');
INSERT INTO met_language VALUES('3593','unitytxt_50','Common function name','1','414','8','0','en');
INSERT INTO met_language VALUES('3594','unitytxt_51','Directly download the compressed package will occupy space traffic, if the space limit traffic, it is recommended to download via FTP. Are you sure you want to download?','1','415','8','0','en');
INSERT INTO met_language VALUES('3595','unitytxt_46','Other page details set','1','410','8','0','en');
INSERT INTO met_language VALUES('3596','unitytxt_47','Understand commercial licensing','1','411','8','0','en');
INSERT INTO met_language VALUES('3597','unitytxt_48','The day before yesterday','1','412','8','0','en');
INSERT INTO met_language VALUES('3598','unitytxt_45','Display the product category list (the picture is the picture of the category, upload in the part settings), click the corresponding category picture to enter the product\'s thumbnail list of the category.','1','409','8','0','en');
INSERT INTO met_language VALUES('3599','unitytxt_43','List page display','1','407','8','0','en');
INSERT INTO met_language VALUES('3600','unitytxt_44','Directly display the product thumbnail list, click the thumbnail to enter the product details page.','1','408','8','0','en');
INSERT INTO met_language VALUES('3601','unitytxt_39','Set','1','403','8','0','en');
INSERT INTO met_language VALUES('3602','unitytxt_40','Home information list shows the number','1','404','8','0','en');
INSERT INTO met_language VALUES('3603','unitytxt_41','Home Links Settings','1','405','8','0','en');
INSERT INTO met_language VALUES('3604','unitytxt_42','List page shows the number of each page','1','406','8','0','en');
INSERT INTO met_language VALUES('3605','unitytxt_38','The code will be placed above the & lt; / body & gt; tag','1','402','8','0','en');
INSERT INTO met_language VALUES('3606','unitytxt_37','The code will be placed above the & lt; / head & gt; tag','1','401','8','0','en');
INSERT INTO met_language VALUES('3607','unitytxt_33','Permission settings','1','397','8','0','en');
INSERT INTO met_language VALUES('3608','unitytxt_34','Data file upload','1','398','8','0','en');
INSERT INTO met_language VALUES('3609','unitytxt_35','Mail back to this user','1','399','8','0','en');
INSERT INTO met_language VALUES('3610','unitytxt_36','PC-side third-party code (generally used to place Baidu Bridge code, webmaster code, Google translation code, etc.)','1','400','8','0','en');
INSERT INTO met_language VALUES('3611','unitytxt_30','Multi-column display','1','394','8','0','en');
INSERT INTO met_language VALUES('3612','unitytxt_31','Display thumbnails','1','395','8','0','en');
INSERT INTO met_language VALUES('3613','unitytxt_32','Hide thumbnail','1','396','8','0','en');
INSERT INTO met_language VALUES('3614','unitytxt_28','Custom time parameters','1','392','8','0','en');
INSERT INTO met_language VALUES('3615','unitytxt_29','Please tick the column to be displayed','1','393','8','0','en');
INSERT INTO met_language VALUES('3616','unitytxt_27','Each column corresponds to a function module, please check the module in the column setting.','1','391','8','0','en');
INSERT INTO met_language VALUES('3617','unitytxt_24','Title setting','1','388','8','0','en');
INSERT INTO met_language VALUES('3618','unitytxt_25','Keyword setting','1','389','8','0','en');
INSERT INTO met_language VALUES('3619','unitytxt_26','Optimize text settings (can be used to increase keyword density)','1','390','8','0','en');
INSERT INTO met_language VALUES('3620','unitytxt_23','Thoroughly solve the static pages often need to manually generate the trouble','1','387','8','0','en');
INSERT INTO met_language VALUES('3621','unitytxt_22','Open to take effect, no need to generate. If the server needs to manually configure the pseudo-static rules file, please download in the upper right corner.','1','386','8','0','en');
INSERT INTO met_language VALUES('3622','unitytxt_21','You have not downloaded any apps yet','1','385','8','0','en');
INSERT INTO met_language VALUES('3623','unitytxt_20','Installed application list','1','384','8','0','en');
INSERT INTO met_language VALUES('3624','unitytxt_19','Built-in application list','1','383','8','0','en');
INSERT INTO met_language VALUES('3625','unitytxt_15','Other settings','1','379','8','0','en');
INSERT INTO met_language VALUES('3626','unitytxt_16','Standard fingerprint file','1','380','8','0','en');
INSERT INTO met_language VALUES('3627','unitytxt_17','Fingerprint file','1','381','8','0','en');
INSERT INTO met_language VALUES('3628','unitytxt_18','Backup','1','382','8','0','en');
INSERT INTO met_language VALUES('3629','unitytxt_13','Bottom information settings (displayed at the bottom of the site front desk)','1','377','8','0','en');
INSERT INTO met_language VALUES('3630','unitytxt_14','Style set','1','378','8','0','en');
INSERT INTO met_language VALUES('3631','unitytxt_12','to','1','376','8','0','en');
INSERT INTO met_language VALUES('3632','unitytxt_10','Only applicable to the Chinese front language (language logo cn or zh effective), visitors can switch between simplified and traditional.','1','374','8','0','en');
INSERT INTO met_language VALUES('3633','unitytxt_11','Password change (please leave blank)','1','375','8','0','en');
INSERT INTO met_language VALUES('3634','unitytxt_9','Synchronize the official parameters','1','373','8','0','en');
INSERT INTO met_language VALUES('3635','unitytxt_8','The language is set up an independent domain name, you need to modify the website URL in the <font class = \'red\'> language settings </ font> to modify.','1','372','8','0','en');
INSERT INTO met_language VALUES('3636','unitytxt_7','After the backup package is downloaded, it is recommended to delete the backup file in time to avoid affecting the size of the space (you can save the traffic through FTP if your web host limited the traffic)','1','371','8','0','en');
INSERT INTO met_language VALUES('3637','unitytxt_4','Functionally related','1','368','8','0','en');
INSERT INTO met_language VALUES('3638','unitytxt_6','Inconsistent version','1','370','8','0','en');
INSERT INTO met_language VALUES('3639','unitytxt_5','Background operation','1','369','8','0','en');
INSERT INTO met_language VALUES('3640','unitytxt_2','Check to use the default settings','1','366','8','0','en');
INSERT INTO met_language VALUES('3641','unitytxt_3','Other settings (for mobile terminal displays that do not support JS, the free version of the WAP front page)','1','367','8','0','en');
INSERT INTO met_language VALUES('3642','ssl','SSL service method','1','362','8','0','en');
INSERT INTO met_language VALUES('3643','tls','TLS service','1','363','8','0','en');
INSERT INTO met_language VALUES('3644','xtips','Tip: Ctrl + Enter can be saved quickly','1','364','8','0','en');
INSERT INTO met_language VALUES('3645','unitytxt_1','Function setting','1','365','8','0','en');
INSERT INTO met_language VALUES('3646','loginOldwords','This keyword has been replaced!','1','361','8','0','en');
INSERT INTO met_language VALUES('3647','loginSkin','upload failed! This template style already exists!','1','360','8','0','en');
INSERT INTO met_language VALUES('3648','loginUserMudb1','This username has been used','1','358','8','0','en');
INSERT INTO met_language VALUES('3649','loginFail','operation failed!','1','359','8','0','en');
INSERT INTO met_language VALUES('3650','loginRegok','<font color = green> Congratulations, you can sign up </ font>','1','357','8','0','en');
INSERT INTO met_language VALUES('3651','loginUserMudb','<font color = red> This username has been used </ font>','1','356','8','0','en');
INSERT INTO met_language VALUES('3652','loginIntput','Please enter the login account!','1','354','8','0','en');
INSERT INTO met_language VALUES('3653','loginUserErr','<font color = red> wrong username format </ font>','1','355','8','0','en');
INSERT INTO met_language VALUES('3654','reall','After batch restore, manually create a list of static pages','1','353','8','0','en');
INSERT INTO met_language VALUES('3655','NewPassJS','Please login email to receive the latest password','1','351','8','0','en');
INSERT INTO met_language VALUES('3656','delall','After the bulk delete manually generated two or three list static pages','1','352','8','0','en');
INSERT INTO met_language VALUES('3657','deleteJS','Please add the administrator before deleting!','1','348','8','0','en');
INSERT INTO met_language VALUES('3658','NoidJS1','Without this user or email address is incorrect','1','350','8','0','en');
INSERT INTO met_language VALUES('3659','NoidJS','Without this user','1','349','8','0','en');
INSERT INTO met_language VALUES('3660','jsx33','Expand advanced options','1','345','8','0','en');
INSERT INTO met_language VALUES('3661','jsx34','Hide advanced options','1','346','8','0','en');
INSERT INTO met_language VALUES('3662','jsx35','Upload temporary folder (upload_tmp_dir) no write permission, please contact the space to modify.','1','347','8','0','en');
INSERT INTO met_language VALUES('3663','jsx31','failure','1','343','8','0','en');
INSERT INTO met_language VALUES('3664','jsx32','Login timeout, please log in again!','1','344','8','0','en');
INSERT INTO met_language VALUES('3665','jsx30','Static page name and other information ID number conflict, please replace the letter + number, not recommended for pure digital static page name','1','342','8','0','en');
INSERT INTO met_language VALUES('3666','jsx29','Whether all the implementation','1','341','8','0','en');
INSERT INTO met_language VALUES('3667','jsx27','Static page name already exists','1','339','8','0','en');
INSERT INTO met_language VALUES('3668','jsx28','Will the selection be placed in the Recycle Bin?','1','340','8','0','en');
INSERT INTO met_language VALUES('3669','jsx26','Update file ...','1','338','8','0','en');
INSERT INTO met_language VALUES('3670','jsx24','download file...','1','336','8','0','en');
INSERT INTO met_language VALUES('3671','jsx25','Update the database ...','1','337','8','0','en');
INSERT INTO met_language VALUES('3672','jsx23','Start upgrade, check directory permissions ...','1','335','8','0','en');
INSERT INTO met_language VALUES('3673','jsx22','Back up the current data ...','1','334','8','0','en');
INSERT INTO met_language VALUES('3674','jsx21','Unable to connect to the server','1','333','8','0','en');
INSERT INTO met_language VALUES('3675','jsx20','Detecting ...','1','332','8','0','en');
INSERT INTO met_language VALUES('3676','jsx19','Test failed! Please check the account password is correct.','1','331','8','0','en');
INSERT INTO met_language VALUES('3677','jsx18','testing...','1','330','8','0','en');
INSERT INTO met_language VALUES('3678','jsx16','uploading','1','328','8','0','en');
INSERT INTO met_language VALUES('3679','jsx17','Upload success!','1','329','8','0','en');
INSERT INTO met_language VALUES('3680','jsx15','Upload','1','327','8','0','en');
INSERT INTO met_language VALUES('3681','jsx14','Sorry! The language does not exist with the same part of the module, please go to the corresponding language to add columns and then operate!','1','326','8','0','en');
INSERT INTO met_language VALUES('3682','jsx13','Do not operate at the same time.','1','325','8','0','en');
INSERT INTO met_language VALUES('3683','jsx11','Getting information ...','1','323','8','0','en');
INSERT INTO met_language VALUES('3684','jsx12','There is no content under this section!','1','324','8','0','en');
INSERT INTO met_language VALUES('3685','jsx10','error','1','322','8','0','en');
INSERT INTO met_language VALUES('3686','jsx9','Error: need to generate a static page path does not exist!','1','321','8','0','en');
INSERT INTO met_language VALUES('3687','jsx8','carry out!','1','320','8','0','en');
INSERT INTO met_language VALUES('3688','jsx4','Copy form successfully!','1','316','8','0','en');
INSERT INTO met_language VALUES('3689','jsx5','Editor Loading ...','1','317','8','0','en');
INSERT INTO met_language VALUES('3690','jsx6','success','1','318','8','0','en');
INSERT INTO met_language VALUES('3691','jsx7','File write failed, may not write permission','1','319','8','0','en');
INSERT INTO met_language VALUES('3692','jsx2','Please choose at least one language!','1','314','8','0','en');
INSERT INTO met_language VALUES('3693','jsx3','Please select the form you want to copy first','1','315','8','0','en');
INSERT INTO met_language VALUES('3694','jsx1','loading...','1','313','8','0','en');
INSERT INTO met_language VALUES('3695','js70','Are you sure you enabled the selected template?','1','312','8','0','en');
INSERT INTO met_language VALUES('3696','js69','Are you sure that the selected style is enabled?','1','311','8','0','en');
INSERT INTO met_language VALUES('3697','js68','Please select the zip format file','1','310','8','0','en');
INSERT INTO met_language VALUES('3698','js67','Please select at least one of the columns','1','309','8','0','en');
INSERT INTO met_language VALUES('3699','js66','Are you sure you want to completely empty all recycle bin content?','1','308','8','0','en');
INSERT INTO met_language VALUES('3700','js64','Whether to restore the selection','1','306','8','0','en');
INSERT INTO met_language VALUES('3701','js65','Are you sure you want to restore the contents of all recycle bin?','1','307','8','0','en');
INSERT INTO met_language VALUES('3702','js62','Are you sure you want to move the selected one?','1','304','8','0','en');
INSERT INTO met_language VALUES('3703','js63','Confirm emptying','1','305','8','0','en');
INSERT INTO met_language VALUES('3704','js59','Please fill in the directory name','1','301','8','0','en');
INSERT INTO met_language VALUES('3705','js60','Whether to put the selection into the recycle bin?','1','302','8','0','en');
INSERT INTO met_language VALUES('3706','js61','Are you sure you want to copy the selected one?','1','303','8','0','en');
INSERT INTO met_language VALUES('3707','js58','Whether to merge section? After the merger the name of the directory will be modified, point to cancel the original directory name and enter the next step','1','300','8','0','en');
INSERT INTO met_language VALUES('3708','js57','Are you sure you want to move this section?','1','299','8','0','en');
INSERT INTO met_language VALUES('3709','js54','Generating static pages ...','1','296','8','0','en');
INSERT INTO met_language VALUES('3710','js55','return','1','297','8','0','en');
INSERT INTO met_language VALUES('3711','js56','To move a column must set a new directory name (directory name can only be numbers or letters)','1','298','8','0','en');
INSERT INTO met_language VALUES('3712','js53','Complete static page generation!','1','295','8','0','en');
INSERT INTO met_language VALUES('3713','js52','Please name the column folder name','1','294','8','0','en');
INSERT INTO met_language VALUES('3714','js51','Please fill in the column name','1','293','8','0','en');
INSERT INTO met_language VALUES('3715','js46','Can not repeat','1','288','8','0','en');
INSERT INTO met_language VALUES('3716','js47','Removing static pages ...','1','289','8','0','en');
INSERT INTO met_language VALUES('3717','js50','The language does not exist in the same module of a column','1','292','8','0','en');
INSERT INTO met_language VALUES('3718','js49','Undo','1','291','8','0','en');
INSERT INTO met_language VALUES('3719','js48','loading...','1','290','8','0','en');
INSERT INTO met_language VALUES('3720','js45','Test form.','1','287','8','0','en');
INSERT INTO met_language VALUES('3721','js44','Email address is incorrect!','1','286','8','0','en');
INSERT INTO met_language VALUES('3722','js43','Added successfully! Continue to add information?','1','285','8','0','en');
INSERT INTO met_language VALUES('3723','js39','Please select three columns','1','281','8','0','en');
INSERT INTO met_language VALUES('3724','js40','is submitting..','1','282','8','0','en');
INSERT INTO met_language VALUES('3725','js41','Can not be empty!','1','283','8','0','en');
INSERT INTO met_language VALUES('3726','js42','Submitted successfully!','1','284','8','0','en');
INSERT INTO met_language VALUES('3727','js38','Please select the second column','1','280','8','0','en');
INSERT INTO met_language VALUES('3728','js37','Please select a column','1','279','8','0','en');
INSERT INTO met_language VALUES('3729','js34','Please transfer the column of the first three columns','1','276','8','0','en');
INSERT INTO met_language VALUES('3730','js36','Please select a language','1','278','8','0','en');
INSERT INTO met_language VALUES('3731','js35','Uploading a temporary folder (upload_tmp_dir) is not writable or the domain / background folder / include / upload.php does not have access.','1','277','8','0','en');
INSERT INTO met_language VALUES('3732','js33','Static page name can not be empty','1','275','8','0','en');
INSERT INTO met_language VALUES('3733','js32','Whether to delete the relevant resume at the same time?','1','274','8','0','en');
INSERT INTO met_language VALUES('3734','js30','Agents','1','272','8','0','en');
INSERT INTO met_language VALUES('3735','js31','administrator','1','273','8','0','en');
INSERT INTO met_language VALUES('3736','js24','sure?','1','266','8','0','en');
INSERT INTO met_language VALUES('3737','js25','Image address can not be empty!','1','267','8','0','en');
INSERT INTO met_language VALUES('3738','js26','Flash address can not be empty!','1','268','8','0','en');
INSERT INTO met_language VALUES('3739','js27','Please fill in the address!','1','269','8','0','en');
INSERT INTO met_language VALUES('3740','js28','Not limited to','1','270','8','0','en');
INSERT INTO met_language VALUES('3741','js29','Ordinary member','1','271','8','0','en');
INSERT INTO met_language VALUES('3742','js23','No records selected!','1','265','8','0','en');
INSERT INTO met_language VALUES('3743','js22','Whether to change its state?','1','264','8','0','en');
INSERT INTO met_language VALUES('3744','js21','Settings have taken effect, whether to delete all generated static pages?','1','263','8','0','en');
INSERT INTO met_language VALUES('3745','js20','Website address can not be empty','1','262','8','0','en');
INSERT INTO met_language VALUES('3746','js19','Site name can not be empty','1','261','8','0','en');
INSERT INTO met_language VALUES('3747','js17','Recruitment positions can not be empty','1','259','8','0','en');
INSERT INTO met_language VALUES('3748','js18','The original text can not be empty','1','260','8','0','en');
INSERT INTO met_language VALUES('3749','js15','Please choose to upload the file','1','257','8','0','en');
INSERT INTO met_language VALUES('3750','js16','Download address can not be empty','1','258','8','0','en');
INSERT INTO met_language VALUES('3751','js13','Please enter the title','1','255','8','0','en');
INSERT INTO met_language VALUES('3752','js14','Please select two and three columns','1','256','8','0','en');
INSERT INTO met_language VALUES('3753','js12','Column folder name can not be empty','1','254','8','0','en');
INSERT INTO met_language VALUES('3754','js11','Column name can not be empty','1','253','8','0','en');
INSERT INTO met_language VALUES('3755','js10','Your changes have not been saved, are you sure you want to leave?','1','252','8','0','en');
INSERT INTO met_language VALUES('3756','js9','Template folder can not be empty','1','251','8','0','en');
INSERT INTO met_language VALUES('3757','js8','Template name can not be empty','1','250','8','0','en');
INSERT INTO met_language VALUES('3758','js6','The password entered twice is not the same','1','248','8','0','en');
INSERT INTO met_language VALUES('3759','js7','Are you sure you want to delete the selected message? Once deleted will not be able to recover!','1','249','8','0','en');
INSERT INTO met_language VALUES('3760','js5','email can not be empty','1','247','8','0','en');
INSERT INTO met_language VALUES('3761','js4','Login password can not be blank','1','246','8','0','en');
INSERT INTO met_language VALUES('3762','js2','The data is wrong','1','244','8','0','en');
INSERT INTO met_language VALUES('3763','js3','Administrator account can not be empty','1','245','8','0','en');
INSERT INTO met_language VALUES('3764','js1','Please wait, the system test ....','1','243','8','0','en');
INSERT INTO met_language VALUES('3765','dataerror','data error','1','242','8','0','en');
INSERT INTO met_language VALUES('3766','jsok','Successful operation','1','241','8','0','en');
INSERT INTO met_language VALUES('3767','pages','page','1','239','8','0','en');
INSERT INTO met_language VALUES('3768','pageGo','Go to','1','240','8','0','en');
INSERT INTO met_language VALUES('3769','delnow','Currently selected','1','237','8','0','en');
INSERT INTO met_language VALUES('3770','marks',':','1','238','8','0','en');
INSERT INTO met_language VALUES('3771','displayimgTip','Show pictures','1','236','8','0','en');
INSERT INTO met_language VALUES('3772','displayimg','Show pictures','1','235','8','0','en');
INSERT INTO met_language VALUES('3773','Operating','operating system','1','233','8','0','en');
INSERT INTO met_language VALUES('3774','noorderinfo','The smaller the value the more forward','1','234','8','0','en');
INSERT INTO met_language VALUES('3775','launched','Click to expand / hide sidebar','1','232','8','0','en');
INSERT INTO met_language VALUES('3776','anonymity','anonymous','1','231','8','0','en');
INSERT INTO met_language VALUES('3777','move','Transfer','1','230','8','0','en');
INSERT INTO met_language VALUES('3778','selectnow','select','1','229','8','0','en');
INSERT INTO met_language VALUES('3779','detail','See the details','1','228','8','0','en');
INSERT INTO met_language VALUES('3780','contentdetail','details','1','227','8','0','en');
INSERT INTO met_language VALUES('3781','content','content','1','226','8','0','en');
INSERT INTO met_language VALUES('3782','webaccess','access permission','1','225','8','0','en');
INSERT INTO met_language VALUES('3783','descriptioninfo','Used for search engine optimization','1','224','8','0','en');
INSERT INTO met_language VALUES('3784','keywordsinfo','Please use multiple keywords, \",\" separated','1','223','8','0','en');
INSERT INTO met_language VALUES('3785','keywords','Key words','1','222','8','0','en');
INSERT INTO met_language VALUES('3786','hits','The number of clicks','1','221','8','0','en');
INSERT INTO met_language VALUES('3787','addtime','release time','1','220','8','0','en');
INSERT INTO met_language VALUES('3788','updatetime','Update time','1','219','8','0','en');
INSERT INTO met_language VALUES('3789','access3','administrator','1','218','8','0','en');
INSERT INTO met_language VALUES('3790','access2','Agents','1','217','8','0','en');
INSERT INTO met_language VALUES('3791','access1','Ordinary member','1','216','8','0','en');
INSERT INTO met_language VALUES('3792','access0','Not limited to','1','215','8','0','en');
INSERT INTO met_language VALUES('3793','access','Permissions','1','214','8','0','en');
INSERT INTO met_language VALUES('3794','ordernumber','The smaller the number, the higher the ranking','1','213','8','0','en');
INSERT INTO met_language VALUES('3795','deleteselected','delete','1','212','8','0','en');
INSERT INTO met_language VALUES('3796','htmlok','Support HTML language','1','211','8','0','en');
INSERT INTO met_language VALUES('3797','read','Have read','1','210','8','0','en');
INSERT INTO met_language VALUES('3798','set','Parameter configuration','1','209','8','0','en');
INSERT INTO met_language VALUES('3799','parameter','parameter','1','208','8','0','en');
INSERT INTO met_language VALUES('3800','imagename','Please enter a name, leave blank to use the default name','1','207','8','0','en');
INSERT INTO met_language VALUES('3801','search','search for','1','206','8','0','en');
INSERT INTO met_language VALUES('3802','manager','Manage content','1','205','8','0','en');
INSERT INTO met_language VALUES('3803','newest','up to date','1','204','8','0','en');
INSERT INTO met_language VALUES('3804','new','Latest news','1','203','8','0','en');
INSERT INTO met_language VALUES('3805','top','Stick to the top','1','202','8','0','en');
INSERT INTO met_language VALUES('3806','wap','wap','1','201','8','0','en');
INSERT INTO met_language VALUES('3807','recom','recommend','1','200','8','0','en');
INSERT INTO met_language VALUES('3808','images','image information','1','199','8','0','en');
INSERT INTO met_language VALUES('3809','image','image','1','198','8','0','en');
INSERT INTO met_language VALUES('3810','title','title','1','197','8','0','en');
INSERT INTO met_language VALUES('3811','description','Short description','1','196','8','0','en');
INSERT INTO met_language VALUES('3812','名称','','1','195','8','0','en');
INSERT INTO met_language VALUES('3813','order','No.','1','194','8','0','en');
INSERT INTO met_language VALUES('3814','default','default','1','193','8','0','en');
INSERT INTO met_language VALUES('3815','selected','select','1','192','8','0','en');
INSERT INTO met_language VALUES('3816','selectall','select all','1','191','8','0','en');
INSERT INTO met_language VALUES('3817','item','Article','1','190','8','0','en');
INSERT INTO met_language VALUES('3818','metinfo','MetInfo enterprise website management system','1','189','8','0','en');
INSERT INTO met_language VALUES('3819','no','no','1','188','8','0','en');
INSERT INTO met_language VALUES('3820','yes','Yes','1','187','8','0','en');
INSERT INTO met_language VALUES('3821','sort','Sort','1','186','8','0','en');
INSERT INTO met_language VALUES('3822','type','Types of','1','185','8','0','en');
INSERT INTO met_language VALUES('3823','close','shut down','1','184','8','0','en');
INSERT INTO met_language VALUES('3824','open','Open','1','183','8','0','en');
INSERT INTO met_language VALUES('3825','operate','operating','1','182','8','0','en');
INSERT INTO met_language VALUES('3826','preview','Preview','1','181','8','0','en');
INSERT INTO met_language VALUES('3827','delete','delete','1','180','8','0','en');
INSERT INTO met_language VALUES('3828','modify','modify','1','179','8','0','en');
INSERT INTO met_language VALUES('3829','View','View','1','178','8','0','en');
INSERT INTO met_language VALUES('3830','editor','edit','1','177','8','0','en');
INSERT INTO met_language VALUES('3831','add','Add to','1','176','8','0','en');
INSERT INTO met_language VALUES('3832','dataerr1','failure! Import data inconsistent with the system version!','1','169','8','0','en');
INSERT INTO met_language VALUES('3833','fontfamily','','1','170','8','0','en');
INSERT INTO met_language VALUES('3834','Submit','save','1','171','8','0','en');
INSERT INTO met_language VALUES('3835','Submitall','submit','1','172','8','0','en');
INSERT INTO met_language VALUES('3836','Reset','Reset','1','173','8','0','en');
INSERT INTO met_language VALUES('3837','Copy','copy','1','174','8','0','en');
INSERT INTO met_language VALUES('3838','Copytitle','Copy to ...','1','175','8','0','en');
INSERT INTO met_language VALUES('3839','langadderr6','Failed to download language pack remotely, copied default language pack.','1','168','8','0','en');
INSERT INTO met_language VALUES('3840','langadderr4','Unable to sync official language packs, wrong reason:','1','166','8','0','en');
INSERT INTO met_language VALUES('3841','langadderr5','You deleted the default language! Please set another language as the default language and then operate!','1','167','8','0','en');
INSERT INTO met_language VALUES('3842','langadderr1','Illegal language identification','1','163','8','0','en');
INSERT INTO met_language VALUES('3843','langadderr2','You are now in this language! Please go to the top right corner to switch to other languages ??and then delete!','1','164','8','0','en');
INSERT INTO met_language VALUES('3844','langadderr3','Language added successfully! In the upper right corner of the site language can switch to the new language.','1','165','8','0','en');
INSERT INTO met_language VALUES('3845','basictips7','E-mail set up correctly!','1','162','8','0','en');
INSERT INTO met_language VALUES('3846','basictips6','<b> Workaround: </ b> Check your account password and smtp for errors or check if your mailbox has smtp service enabled.','1','161','8','0','en');
INSERT INTO met_language VALUES('3847','basictips5','<b> Error tip: </ b> failed to test email!','1','160','8','0','en');
INSERT INTO met_language VALUES('3848','basictips3','Mail sending test','1','158','8','0','en');
INSERT INTO met_language VALUES('3849','basictips4','E-mail received indicates that your site\'s system mailbox settings are correct.','1','159','8','0','en');
INSERT INTO met_language VALUES('3850','basictips2','<b> Solution: </ b> Contact the space provider to open one of these functions.','1','157','8','0','en');
INSERT INTO met_language VALUES('3851','basictips1','<b> Error Tips: </ b> The pfsockopen and fsockopen functions are disabled!','1','156','8','0','en');
INSERT INTO met_language VALUES('3852','updaterr22','Do you want to retry this upgrade? Click \'Cancel\' will give up this upgrade!','1','154','8','0','en');
INSERT INTO met_language VALUES('3853','updaterr23','API server verification failed, API server can not access your website, please close the website boot page or temporary website protection tool','1','155','8','0','en');
INSERT INTO met_language VALUES('3854','updaterr21','Upgrade problems!','1','153','8','0','en');
INSERT INTO met_language VALUES('3855','updaterr20','Link to the server, unable to complete the business membership verification!','1','152','8','0','en');
INSERT INTO met_language VALUES('3856','updaterr18','Cache file can not be written, unable to complete the permission verification!','1','150','8','0','en');
INSERT INTO met_language VALUES('3857','updaterr19','Permission authentication failed','1','151','8','0','en');
INSERT INTO met_language VALUES('3858','updaterr17','Start the whole station backup','1','149','8','0','en');
INSERT INTO met_language VALUES('3859','updaterr16','Whether to carry out the whole station backup','1','148','8','0','en');
INSERT INTO met_language VALUES('3860','updaterr15','Update file is successful','1','147','8','0','en');
INSERT INTO met_language VALUES('3861','updaterr14','File copy failed. The cause of the error: the file does not write permission','1','146','8','0','en');
INSERT INTO met_language VALUES('3862','updaterr9','Download file','1','141','8','0','en');
INSERT INTO met_language VALUES('3863','updaterr10','Download file is completed, start updating','1','142','8','0','en');
INSERT INTO met_language VALUES('3864','updaterr11','Database update succeeded','1','143','8','0','en');
INSERT INTO met_language VALUES('3865','updaterr12','Database update failed. wrong reason:','1','144','8','0','en');
INSERT INTO met_language VALUES('3866','updaterr13','Database does not need to be updated','1','145','8','0','en');
INSERT INTO met_language VALUES('3867','updaterr7','File permissions detection is normal','1','139','8','0','en');
INSERT INTO met_language VALUES('3868','updaterr8','Update file list download failed','1','140','8','0','en');
INSERT INTO met_language VALUES('3869','updaterr6','The following documents can not be written, please visit FTP modify permissions for 777 or contact space to modify','1','138','8','0','en');
INSERT INTO met_language VALUES('3870','updaterr2','Unable to back up the database','1','134','8','0','en');
INSERT INTO met_language VALUES('3871','updaterr3','Unable to prepare the whole station document','1','135','8','0','en');
INSERT INTO met_language VALUES('3872','updaterr4','Website backup success','1','136','8','0','en');
INSERT INTO met_language VALUES('3873','updaterr5','Backed up','1','137','8','0','en');
INSERT INTO met_language VALUES('3874','supportnot','Space does not support online updates, please contact the space open curl, fsockopen, pfsockopen function one of them','1','131','8','0','en');
INSERT INTO met_language VALUES('3875','updaterr1','File backup failed, the error reason: the file does not have write permission','1','133','8','0','en');
INSERT INTO met_language VALUES('3876','updownerrs','File download failed, wrong reason:','1','132','8','0','en');
INSERT INTO met_language VALUES('3877','redownload','download again','1','130','8','0','en');
INSERT INTO met_language VALUES('3878','retested','recheck','1','129','8','0','en');
INSERT INTO met_language VALUES('3879','cvinfo','Resume information','1','128','8','0','en');
INSERT INTO met_language VALUES('3880','Error','error','1','127','8','0','en');
INSERT INTO met_language VALUES('3881','upfileFail10','Imagejpeg function is not supported','1','125','8','0','en');
INSERT INTO met_language VALUES('3882','upfileFail11','Imagepng function is not supported','1','126','8','0','en');
INSERT INTO met_language VALUES('3883','upfileFail9','The imagegif function is not supported','1','124','8','0','en');
INSERT INTO met_language VALUES('3884','upfileFail8','File corruption, thumbnail generation failed','1','123','8','0','en');
INSERT INTO met_language VALUES('3885','upfileFail7','Does not support the current file format to generate thumbnails, please upload JPG, GIF, PNG pictures','1','122','8','0','en');
INSERT INTO met_language VALUES('3886','upfileFail6','Space does not support GD library, can not generate thumbnails','1','121','8','0','en');
INSERT INTO met_language VALUES('3887','upfileFail5','The bmp format does not automatically generate thumbnails','1','120','8','0','en');
INSERT INTO met_language VALUES('3888','upfileFail4','Failed to create directory','1','119','8','0','en');
INSERT INTO met_language VALUES('3889','upfileNotice','note:','1','118','8','0','en');
INSERT INTO met_language VALUES('3890','upfileOver4','upload folder does not write permission, please contact space to modify.','1','116','8','0','en');
INSERT INTO met_language VALUES('3891','upfileOver5','Upload temporary folder (upload_tmp_dir) no write permission, please contact the space to modify.','1','117','8','0','en');
INSERT INTO met_language VALUES('3892','upfileOver3','No files have been uploaded','1','115','8','0','en');
INSERT INTO met_language VALUES('3893','upfileOver2','Only part of the file is uploaded.','1','114','8','0','en');
INSERT INTO met_language VALUES('3894','upfileOK','File upload is successful','1','111','8','0','en');
INSERT INTO met_language VALUES('3895','upfileOver','The uploaded file exceeded the limit of upload_max_filesize option in php.ini.','1','112','8','0','en');
INSERT INTO met_language VALUES('3896','upfileOver1','The size of the uploaded file exceeds the value specified by the MAX_FILE_SIZE option in the HTML form.','1','113','8','0','en');
INSERT INTO met_language VALUES('3897','upfileTip3','File format does not allow uploading.','1','110','8','0','en');
INSERT INTO met_language VALUES('3898','upfileTip2','The file name already exists.','1','109','8','0','en');
INSERT INTO met_language VALUES('3899','upfileTip1',', Can not upload.','1','108','8','0','en');
INSERT INTO met_language VALUES('3900','upfileByte','byte','1','107','8','0','en');
INSERT INTO met_language VALUES('3901','upfileFail','Failed to create watermark directory','1','101','8','0','en');
INSERT INTO met_language VALUES('3902','upfileFail1','Failed to create thumbnail directory','1','102','8','0','en');
INSERT INTO met_language VALUES('3903','upfileFail2','Failed to create picture directory','1','103','8','0','en');
INSERT INTO met_language VALUES('3904','upfileFail3','Specified path can not be written, or no such path!','1','104','8','0','en');
INSERT INTO met_language VALUES('3905','upfileMax','Size exceeds system limit','1','106','8','0','en');
INSERT INTO met_language VALUES('3906','upfileFile','upload files','1','105','8','0','en');
INSERT INTO met_language VALUES('3907','funCreate','Generate the file','1','99','8','0','en');
INSERT INTO met_language VALUES('3908','funjumpget','Please click here if your web browser did not jump automatically','1','100','8','0','en');
INSERT INTO met_language VALUES('3909','funFile','file','1','98','8','0','en');
INSERT INTO met_language VALUES('3910','funOK','success!','1','97','8','0','en');
INSERT INTO met_language VALUES('3911','funFail','failure!','1','96','8','0','en');
INSERT INTO met_language VALUES('3912','funTip1','Can not write, please check its properties and try again!','1','95','8','0','en');
INSERT INTO met_language VALUES('3913','funNav4','Show','1','94','8','0','en');
INSERT INTO met_language VALUES('3914','funNav3','Tail navigation bar','1','93','8','0','en');
INSERT INTO met_language VALUES('3915','funNav2','Head main navigation bar','1','92','8','0','en');
INSERT INTO met_language VALUES('3916','funNav1','Do not show','1','91','8','0','en');
INSERT INTO met_language VALUES('3917','adminwenjian','Background file name data has been updated, please manually modify the name of the background folder','1','90','8','0','en');
INSERT INTO met_language VALUES('3918','indexmailset','Outbox settings','1','89','8','0','en');
INSERT INTO met_language VALUES('3919','indexthanks','Thanks for using','1','88','8','0','en');
INSERT INTO met_language VALUES('3920','indexpeople','s personal profile','1','87','8','0','en');
INSERT INTO met_language VALUES('3921','indexnarrowver2','Switch to narrow version','1','86','8','0','en');
INSERT INTO met_language VALUES('3922','indexnarrowver1','Narrow version','1','85','8','0','en');
INSERT INTO met_language VALUES('3923','indexwidever2','Switch to wide version','1','84','8','0','en');
INSERT INTO met_language VALUES('3924','indexwidever1','Wide version','1','83','8','0','en');
INSERT INTO met_language VALUES('3925','indexperson','personal information','1','82','8','0','en');
INSERT INTO met_language VALUES('3926','indexadminattay','Admin group management','1','81','8','0','en');
INSERT INTO met_language VALUES('3927','indexadminname','Administrator management','1','80','8','0','en');
INSERT INTO met_language VALUES('3928','indexfeedbackm','Feedback management','1','79','8','0','en');
INSERT INTO met_language VALUES('3929','indexlink','Links','1','78','8','0','en');
INSERT INTO met_language VALUES('3930','indexwebcount','statistics','1','77','8','0','en');
INSERT INTO met_language VALUES('3931','indexPhysical','Website checkup','1','76','8','0','en');
INSERT INTO met_language VALUES('3932','indexwap','WAP function (commercial version)','1','75','8','0','en');
INSERT INTO met_language VALUES('3933','indexhtm','Static page generation','1','74','8','0','en');
INSERT INTO met_language VALUES('3934','indexhtmset','Static pages','1','73','8','0','en');
INSERT INTO met_language VALUES('3935','indexhot','Popular tags','1','72','8','0','en');
INSERT INTO met_language VALUES('3936','indexseoset','SEO parameters','1','71','8','0','en');
INSERT INTO met_language VALUES('3937','indexcv','Resume parameter configuration','1','70','8','0','en');
INSERT INTO met_language VALUES('3938','indexflashset','Banner settings','1','66','8','0','en');
INSERT INTO met_language VALUES('3939','indexflash','Banner management','1','67','8','0','en');
INSERT INTO met_language VALUES('3940','indexonlineset','online service','1','68','8','0','en');
INSERT INTO met_language VALUES('3941','indexonline','Customer list','1','69','8','0','en');
INSERT INTO met_language VALUES('3942','indexhomeset','Home settings','1','65','8','0','en');
INSERT INTO met_language VALUES('3943','indexpic','Image watermark','1','64','8','0','en');
INSERT INTO met_language VALUES('3944','indexbbs','Technical Support','1','63','8','0','en');
INSERT INTO met_language VALUES('3945','indexebook','manual','1','62','8','0','en');
INSERT INTO met_language VALUES('3946','indexupload','Upload file management','1','59','8','0','en');
INSERT INTO met_language VALUES('3947','indexskinset','Template configuration tutorial','1','60','8','0','en');
INSERT INTO met_language VALUES('3948','indexcode','Commercial authorization','1','61','8','0','en');
INSERT INTO met_language VALUES('3949','indexsafe','Website security','1','58','8','0','en');
INSERT INTO met_language VALUES('3950','indexdataback','data backup','1','57','8','0','en');
INSERT INTO met_language VALUES('3951','indexotherinfo','Other content','1','56','8','0','en');
INSERT INTO met_language VALUES('3952','indexfoot','Bottom information','1','55','8','0','en');
INSERT INTO met_language VALUES('3953','indexlang','language settings','1','54','8','0','en');
INSERT INTO met_language VALUES('3954','indexbasicinfo','basic settings','1','53','8','0','en');
INSERT INTO met_language VALUES('3955','indexloginout','drop out','1','51','8','0','en');
INSERT INTO met_language VALUES('3956','indexsysteminfo','system message','1','52','8','0','en');
INSERT INTO met_language VALUES('3957','indexhome','Home page','1','49','8','0','en');
INSERT INTO met_language VALUES('3958','indexadmin','Functions','1','50','8','0','en');
INSERT INTO met_language VALUES('3959','indexwelcom','Hello','1','48','8','0','en');
INSERT INTO met_language VALUES('3960','indexuser','User Management','1','47','8','0','en');
INSERT INTO met_language VALUES('3961','indexseo','Optimize promotion','1','45','8','0','en');
INSERT INTO met_language VALUES('3962','indexapp','Enterprise application','1','46','8','0','en');
INSERT INTO met_language VALUES('3963','indexcontent','Content management','1','44','8','0','en');
INSERT INTO met_language VALUES('3964','indexcolumn','Column settings','1','43','8','0','en');
INSERT INTO met_language VALUES('3965','indexskin','interface style','1','42','8','0','en');
INSERT INTO met_language VALUES('3966','indexbasic','Website settings','1','41','8','0','en');
INSERT INTO met_language VALUES('3967','loginalllang','You do not have the authority to manage this language, please contact the administrator to open','1','40','8','0','en');
INSERT INTO met_language VALUES('3968','loginall','You do not have to add, modify, delete the permissions of the information, please contact the administrator to open','1','39','8','0','en');
INSERT INTO met_language VALUES('3969','loginedit','You do not have permission to modify the information, please contact the administrator to open','1','38','8','0','en');
INSERT INTO met_language VALUES('3970','loginadd','You do not have permission to add information, please contact the administrator to open','1','37','8','0','en');
INSERT INTO met_language VALUES('3971','logindelete','You do not have permission to delete information, please contact the administrator to open','1','36','8','0','en');
INSERT INTO met_language VALUES('3972','loginpass','wrong user name or password','1','35','8','0','en');
INSERT INTO met_language VALUES('3973','loginname','wrong user name or password','1','34','8','0','en');
INSERT INTO met_language VALUES('3974','logincodeerror','Verification code error','1','33','8','0','en');
INSERT INTO met_language VALUES('3975','loginconfirm','log in','1','32','8','0','en');
INSERT INTO met_language VALUES('3976','loginforget','forget password?','1','31','8','0','en');
INSERT INTO met_language VALUES('3977','logincodechange','Click Refresh verification code','1','30','8','0','en');
INSERT INTO met_language VALUES('3978','loginusename','username','1','27','8','0','en');
INSERT INTO met_language VALUES('3979','loginpassword','password','1','28','8','0','en');
INSERT INTO met_language VALUES('3980','logincode','Verification code','1','29','8','0','en');
INSERT INTO met_language VALUES('3981','loginlanguage','Language','1','26','8','0','en');
INSERT INTO met_language VALUES('3982','loginmetinfo','MetInfo','1','25','8','0','en');
INSERT INTO met_language VALUES('3983','loginadmin','Administrator login','1','24','8','0','en');
INSERT INTO met_language VALUES('3984','logintitle','Background login','1','21','8','0','en');
INSERT INTO met_language VALUES('3985','loginid','Username can not be empty','1','22','8','0','en');
INSERT INTO met_language VALUES('3986','loginps','password can not be blank','1','23','8','0','en');
INSERT INTO met_language VALUES('3987','myapp','My Applications','1','20','8','0','en');
INSERT INTO met_language VALUES('3988','webnanny','Website nanny','1','19','8','0','en');
INSERT INTO met_language VALUES('3989','smsfuc','SMS function','1','18','8','0','en');
INSERT INTO met_language VALUES('3990','recycle','Content Recycle Bin','1','17','8','0','en');
INSERT INTO met_language VALUES('3991','field','Field','1','15','8','0','en');
INSERT INTO met_language VALUES('3992','bulkopr','Batch operation','1','16','8','0','en');
INSERT INTO met_language VALUES('3993','contsting','Content page settings','1','14','8','0','en');
INSERT INTO met_language VALUES('3994','managertyp5','customize','1','10','8','0','en');
INSERT INTO met_language VALUES('3995','pagesting','List page settings','1','13','8','0','en');
INSERT INTO met_language VALUES('3996','Universal','Universal settings','1','12','8','0','en');
INSERT INTO met_language VALUES('3997','temstyle','Template management','1','11','8','0','en');
INSERT INTO met_language VALUES('3998','managertyp4','Content Manager','1','9','8','0','en');
INSERT INTO met_language VALUES('3999','managertyp2','administrator','1','7','8','0','en');
INSERT INTO met_language VALUES('4000','managertyp3','Optimize promotion','1','8','8','0','en');
INSERT INTO met_language VALUES('4001','managertyp1','Founder','1','6','8','0','en');
INSERT INTO met_language VALUES('4002','uplaoderr3','Please upload sql suffix file or zip suffix file!','1','5','8','0','en');
INSERT INTO met_language VALUES('4003','filenomor','File is not uploaded or does not exist','1','2','8','0','en');
INSERT INTO met_language VALUES('4004','uplaoderr1','upload failed!','1','3','8','0','en');
INSERT INTO met_language VALUES('4005','uplaoderr2','Please upload zip file!','1','4','8','0','en');
INSERT INTO met_language VALUES('4006','clickview','Click to view','1','1','8','0','en');
INSERT INTO met_language VALUES('4007','otherfields','Other fields','1','8','0','0','en');
INSERT INTO met_language VALUES('4008','modifyadminidtips','When the founders account is admin, you have a chance to edit the founders name.','1','109','7','0','en');
INSERT INTO met_language VALUES('4009','modifyadminidto','change into','1','108','7','0','en');
INSERT INTO met_language VALUES('4010','modifyadminid','Modify the user name','1','107','7','0','en');
INSERT INTO met_language VALUES('4011','membertips1','Registration time','1','105','7','0','en');
INSERT INTO met_language VALUES('4012','memberdelactive','Empty inactive member','1','106','7','0','en');
INSERT INTO met_language VALUES('4013','memberaddarray','Add a member group','1','103','7','0','en');
INSERT INTO met_language VALUES('4014','memberaddarraytips1','The larger the value, the greater the read permission.','1','104','7','0','en');
INSERT INTO met_language VALUES('4015','memberall','Show all','1','102','7','0','en');
INSERT INTO met_language VALUES('4016','memberjstxt5','Read permission must be any integer between 1 ~ 255','1','98','7','0','en');
INSERT INTO met_language VALUES('4017','memberarayname','Member group name','1','100','7','0','en');
INSERT INTO met_language VALUES('4018','memberpermission','Read permission','1','101','7','0','en');
INSERT INTO met_language VALUES('4019','memberwebpower','Reading permission can not be repeated','1','99','7','0','en');
INSERT INTO met_language VALUES('4020','memberjstxt1','Please enter the confirmation password!','1','94','7','0','en');
INSERT INTO met_language VALUES('4021','memberjstxt4','Member group name can not be empty','1','97','7','0','en');
INSERT INTO met_language VALUES('4022','memberjstxt3','Two password input inconsistent!','1','96','7','0','en');
INSERT INTO met_language VALUES('4023','memberjstxt2','Please enter your password!','1','95','7','0','en');
INSERT INTO met_language VALUES('4024','membereditorTitle','Modify membership information','1','93','7','0','en');
INSERT INTO met_language VALUES('4025','memberCheck','Activate now','1','92','7','0','en');
INSERT INTO met_language VALUES('4026','memberCompanyWebsite','company website','1','91','7','0','en');
INSERT INTO met_language VALUES('4027','memberCompanyAddress','Company address','1','90','7','0','en');
INSERT INTO met_language VALUES('4028','memberCompanyCode','Company zip code','1','89','7','0','en');
INSERT INTO met_language VALUES('4029','memberCompanyFax','company Fax','1','88','7','0','en');
INSERT INTO met_language VALUES('4030','memberCompanyName','company name','1','87','7','0','en');
INSERT INTO met_language VALUES('4031','memberIntro','Member Profile','1','86','7','0','en');
INSERT INTO met_language VALUES('4032','memberSex','gender','1','80','7','0','en');
INSERT INTO met_language VALUES('4033','memberMan','Mr','1','81','7','0','en');
INSERT INTO met_language VALUES('4034','memberWoman','Ms','1','82','7','0','en');
INSERT INTO met_language VALUES('4035','memberTel','contact number','1','83','7','0','en');
INSERT INTO met_language VALUES('4036','memberCell','Phone','1','84','7','0','en');
INSERT INTO met_language VALUES('4037','memberTaoBao','Taobao','1','85','7','0','en');
INSERT INTO met_language VALUES('4038','memberPs1','Password Confirmation','1','79','7','0','en');
INSERT INTO met_language VALUES('4039','memberTip','Please leave blank without modification','1','78','7','0','en');
INSERT INTO met_language VALUES('4040','memberPs','login password','1','77','7','0','en');
INSERT INTO met_language VALUES('4041','memberName','Name','1','76','7','0','en');
INSERT INTO met_language VALUES('4042','memberSearch','User name query','1','75','7','0','en');
INSERT INTO met_language VALUES('4043','memberFD','Feedback','1','73','7','0','en');
INSERT INTO met_language VALUES('4044','memberCV','resume','1','74','7','0','en');
INSERT INTO met_language VALUES('4045','memberMessage','leave a message','1','72','7','0','en');
INSERT INTO met_language VALUES('4046','memberDetail','detailed','1','71','7','0','en');
INSERT INTO met_language VALUES('4047','memberLastLogin','last login time','1','70','7','0','en');
INSERT INTO met_language VALUES('4048','memberActive','activation','1','68','7','0','en');
INSERT INTO met_language VALUES('4049','memberNum','Login times','1','69','7','0','en');
INSERT INTO met_language VALUES('4050','memberEmail','email address','1','67','7','0','en');
INSERT INTO met_language VALUES('4051','memberUserName','username','1','66','7','0','en');
INSERT INTO met_language VALUES('4052','memberSelectType','Choose a type','1','65','7','0','en');
INSERT INTO met_language VALUES('4053','memberType','Type of membership','1','64','7','0','en');
INSERT INTO met_language VALUES('4054','memberalllang','Members in all languages','1','63','7','0','en');
INSERT INTO met_language VALUES('4055','memberAdd','Add member','1','62','7','0','en');
INSERT INTO met_language VALUES('4056','memberChecked','activated','1','60','7','0','en');
INSERT INTO met_language VALUES('4057','memberUnChecked','inactivated','1','61','7','0','en');
INSERT INTO met_language VALUES('4058','memberarrayManage','Member Management','1','59','7','0','en');
INSERT INTO met_language VALUES('4059','memberManage','Member management','1','58','7','0','en');
INSERT INTO met_language VALUES('4060','memberforceinfo','Use the keyed address to view all information, such as:','1','57','7','0','en');
INSERT INTO met_language VALUES('4061','memberforce','Forcibly browse the key','1','56','7','0','en');
INSERT INTO met_language VALUES('4062','membercontrol','Member Control Panel announcement','1','55','7','0','en');
INSERT INTO met_language VALUES('4063','memberregisteremail','Register activation email','1','54','7','0','en');
INSERT INTO met_language VALUES('4064','memberloginok4','Open but need administrator background authentication','1','53','7','0','en');
INSERT INTO met_language VALUES('4065','memberloginok3','Open but require mail verification','1','52','7','0','en');
INSERT INTO met_language VALUES('4066','memberlogin','Sign Up','1','51','7','0','en');
INSERT INTO met_language VALUES('4067','memberuse','Member function','1','49','7','0','en');
INSERT INTO met_language VALUES('4068','memberuseok2','Open member function','1','50','7','0','en');
INSERT INTO met_language VALUES('4069','hello','Hello!','1','47','7','0','en');
INSERT INTO met_language VALUES('4070','memberset','Member function configuration','1','48','7','0','en');
INSERT INTO met_language VALUES('4071','getTip5','Retrieve the password','1','45','7','0','en');
INSERT INTO met_language VALUES('4072','getOK','Sent successfully','1','46','7','0','en');
INSERT INTO met_language VALUES('4073','getTip4','The password you submitted failed to be successful! Mail server may be set incorrectly, please retrieve the password by other means','1','44','7','0','en');
INSERT INTO met_language VALUES('4074','getTip3','Email to create a new password link has been sent to your email address. Please change your password as soon as possible.','1','43','7','0','en');
INSERT INTO met_language VALUES('4075','getTip2','Thank you for your support and love for MetInfo and hope MetInfo will create value for your website!','1','42','7','0','en');
INSERT INTO met_language VALUES('4076','getTip1','Your password reset request has been verified. Please click the following link to enter your new password:','1','41','7','0','en');
INSERT INTO met_language VALUES('4077','getNotice','Administrator password retrieve','1','40','7','0','en');
INSERT INTO met_language VALUES('4078','adminpassTitle','Modify Personal Information','1','39','7','0','en');
INSERT INTO met_language VALUES('4079','adminBackup','return','1','38','7','0','en');
INSERT INTO met_language VALUES('4080','adminSelectAll','All Selection','1','37','7','0','en');
INSERT INTO met_language VALUES('4081','adminOperate4','delete message','1','35','7','0','en');
INSERT INTO met_language VALUES('4082','adminColumn','Column permissions','1','36','7','0','en');
INSERT INTO met_language VALUES('4083','adminOperate3','Modify information','1','34','7','0','en');
INSERT INTO met_language VALUES('4084','adminOperate1','fully control','1','32','7','0','en');
INSERT INTO met_language VALUES('4085','adminOperate2','add information','1','33','7','0','en');
INSERT INTO met_language VALUES('4086','adminPower','Information rights','1','29','7','0','en');
INSERT INTO met_language VALUES('4087','adminTip2','Only allow to view your published information','1','30','7','0','en');
INSERT INTO met_language VALUES('4088','adminOperate','Operating authority','1','31','7','0','en');
INSERT INTO met_language VALUES('4089','adminlang','select all','1','28','7','0','en');
INSERT INTO met_language VALUES('4090','adminTaoBao','Taobao','1','26','7','0','en');
INSERT INTO met_language VALUES('4091','adminIntro','Administrator Profile','1','27','7','0','en');
INSERT INTO met_language VALUES('4092','adminMan','Mr','1','23','7','0','en');
INSERT INTO met_language VALUES('4093','adminWoman','Ms','1','24','7','0','en');
INSERT INTO met_language VALUES('4094','adminTip1','Used to retrieve the account password','1','25','7','0','en');
INSERT INTO met_language VALUES('4095','adminSex','gender','1','22','7','0','en');
INSERT INTO met_language VALUES('4096','adminpassword1','Password Confirmation','1','21','7','0','en');
INSERT INTO met_language VALUES('4097','adminpassword','login password','1','20','7','0','en');
INSERT INTO met_language VALUES('4098','adminLastLogin','last login time','1','18','7','0','en');
INSERT INTO met_language VALUES('4099','adminLastIP','Finally login IP','1','19','7','0','en');
INSERT INTO met_language VALUES('4100','metadmin','administrator','1','12','7','0','en');
INSERT INTO met_language VALUES('4101','adminusername','username','1','13','7','0','en');
INSERT INTO met_language VALUES('4102','adminname','Name','1','14','7','0','en');
INSERT INTO met_language VALUES('4103','admintel','phone','1','15','7','0','en');
INSERT INTO met_language VALUES('4104','adminmobile','Phone','1','16','7','0','en');
INSERT INTO met_language VALUES('4105','adminLoginNum','Login times','1','17','7','0','en');
INSERT INTO met_language VALUES('4106','admintips7','Administrator permission settings','1','11','7','0','en');
INSERT INTO met_language VALUES('4107','adminjurisd','Language permissions','1','5','7','0','en');
INSERT INTO met_language VALUES('4108','admintips1','All languages','1','6','7','0','en');
INSERT INTO met_language VALUES('4109','admintips2','Choose at least one','1','7','7','0','en');
INSERT INTO met_language VALUES('4110','admintips3','After the cancellation of other users to add the site section of the user will not have administrative rights','1','8','7','0','en');
INSERT INTO met_language VALUES('4111','admintips5','user group','1','10','7','0','en');
INSERT INTO met_language VALUES('4112','admintips4','New column permissions','1','9','7','0','en');
INSERT INTO met_language VALUES('4113','webcompre','The whole station compression package','1','3','7','0','en');
INSERT INTO met_language VALUES('4114','admininfo','Administrator basic information','1','4','7','0','en');
INSERT INTO met_language VALUES('4115','uploadfile','Upload folder','1','2','7','0','en');
INSERT INTO met_language VALUES('4116','usermanagement','User Management','1','7','0','0','en');
INSERT INTO met_language VALUES('4117','database','database','1','1','7','0','en');
INSERT INTO met_language VALUES('4118','map_contents','company address','1','357','6','0','en');
INSERT INTO met_language VALUES('4119','map_input','Enter the address query','1','355','6','0','en');
INSERT INTO met_language VALUES('4120','map_title','company name','1','356','6','0','en');
INSERT INTO met_language VALUES('4121','smstips89','Failed to get SMS key, unable to connect to server!','1','354','6','0','en');
INSERT INTO met_language VALUES('4122','nursetips39','Friendly link reminder','1','347','6','0','en');
INSERT INTO met_language VALUES('4123','nursetips40','Daily reminder times','1','348','6','0','en');
INSERT INTO met_language VALUES('4124','nursetips41','Times','1','349','6','0','en');
INSERT INTO met_language VALUES('4125','nursetips42','After reaching the upper limit will stop SMS reminder','1','350','6','0','en');
INSERT INTO met_language VALUES('4126','smstips86','Data has been updated, refresh the background after 3 seconds!','1','351','6','0','en');
INSERT INTO met_language VALUES('4127','smstips87','Get SMS key, do not refresh the page!','1','352','6','0','en');
INSERT INTO met_language VALUES('4128','smstips88','Get the SMS key successfully','1','353','6','0','en');
INSERT INTO met_language VALUES('4129','nursetips37','Resume reminder','1','345','6','0','en');
INSERT INTO met_language VALUES('4130','nursetips38','Whenever a visitor submits a friend link application, the system will send a text message containing your partner\'s website and website name to your mobile phone','1','346','6','0','en');
INSERT INTO met_language VALUES('4131','nursetips35','Message reminder','1','343','6','0','en');
INSERT INTO met_language VALUES('4132','nursetips36','Whenever a visitor submits a resume, a text message will be sent to your phone containing the job title and applicant\'s name','1','344','6','0','en');
INSERT INTO met_language VALUES('4133','nursetips33','Feedback reminder','1','341','6','0','en');
INSERT INTO met_language VALUES('4134','nursetips34','Whenever a visitor submits a message, the system will send a text message (first 10 characters) to your mobile phone','1','342','6','0','en');
INSERT INTO met_language VALUES('4135','nursetips32','Whenever a visitor submits a feedback, the system sends a text message with a feedback title to your mobile','1','340','6','0','en');
INSERT INTO met_language VALUES('4136','nursetips31','Registration reminder','1','339','6','0','en');
INSERT INTO met_language VALUES('4137','nursetips30','Whenever a guest is a registered member, the system will send a text message to your mobile phone','1','338','6','0','en');
INSERT INTO met_language VALUES('4138','nursetips29x','Monitor only for a specified period of time','1','337','6','0','en');
INSERT INTO met_language VALUES('4139','nursetips29','Monitor only at random time periods during the specified weekday','1','336','6','0','en');
INSERT INTO met_language VALUES('4140','nursetips28','on Sunday','1','335','6','0','en');
INSERT INTO met_language VALUES('4141','nursetips27x','on Sunday','1','334','6','0','en');
INSERT INTO met_language VALUES('4142','nursetips24','Wednesday','1','330','6','0','en');
INSERT INTO met_language VALUES('4143','nursetips25','Thursday','1','331','6','0','en');
INSERT INTO met_language VALUES('4144','nursetips26','Friday','1','332','6','0','en');
INSERT INTO met_language VALUES('4145','nursetips27','on Saturday','1','333','6','0','en');
INSERT INTO met_language VALUES('4146','nursetips23','Tuesday','1','329','6','0','en');
INSERT INTO met_language VALUES('4147','nursetips19','Monitored time period specified','1','325','6','0','en');
INSERT INTO met_language VALUES('4148','nursetips20','period','1','326','6','0','en');
INSERT INTO met_language VALUES('4149','nursetips21','Monthly random period of testing','1','327','6','0','en');
INSERT INTO met_language VALUES('4150','nursetips22','Monday','1','328','6','0','en');
INSERT INTO met_language VALUES('4151','nursetips12','Visit monitoring','1','318','6','0','en');
INSERT INTO met_language VALUES('4152','nursetips13','Monitoring website','1','319','6','0','en');
INSERT INTO met_language VALUES('4153','nursetips14','Monitoring frequency','1','320','6','0','en');
INSERT INTO met_language VALUES('4154','nursetips15','Once an hour','1','321','6','0','en');
INSERT INTO met_language VALUES('4155','nursetips16','Once a day','1','322','6','0','en');
INSERT INTO met_language VALUES('4156','nursetips17','once a week','1','323','6','0','en');
INSERT INTO met_language VALUES('4157','nursetips18','Once a month','1','324','6','0','en');
INSERT INTO met_language VALUES('4158','nursetips10','Receive SMS reminder cell phone number, please change the line','1','316','6','0','en');
INSERT INTO met_language VALUES('4159','nursetips11','Monitor if your website can access normally at a specified time, send a monitoring report to your mobile if it can not be accessed normally','1','317','6','0','en');
INSERT INTO met_language VALUES('4160','nursetips8','Report sent time','1','314','6','0','en');
INSERT INTO met_language VALUES('4161','nursetips9','Receive the number','1','315','6','0','en');
INSERT INTO met_language VALUES('4162','nursetips7','Please confirm the website! In the system settings - basic information - website address changes','1','313','6','0','en');
INSERT INTO met_language VALUES('4163','nursetips5','Traffic statistics report','1','311','6','0','en');
INSERT INTO met_language VALUES('4164','nursetips6','Statistics website','1','312','6','0','en');
INSERT INTO met_language VALUES('4165','nursetips3','Guest action reminder','1','309','6','0','en');
INSERT INTO met_language VALUES('4166','nursetips4','Send the yesterday\'s traffic statistics report to your mobile phone every day for the specified time','1','310','6','0','en');
INSERT INTO met_language VALUES('4167','nursetips2','Access fault monitoring','1','308','6','0','en');
INSERT INTO met_language VALUES('4168','nursetips1','Traffic statistics warranties','1','307','6','0','en');
INSERT INTO met_language VALUES('4169','dlapptips17','Web site inspection, killing Trojans, document proofing, it is recommended to use regularly','1','305','6','0','en');
INSERT INTO met_language VALUES('4170','dlapptips18','Can manage registered members, set membership and read permissions, other related settings','1','306','6','0','en');
INSERT INTO met_language VALUES('4171','dlapptips15','The original version of the online exchange, floating online instant communication tools, you can add QQ, Want, MSN, SKYPE, etc.','1','303','6','0','en');
INSERT INTO met_language VALUES('4172','dlapptips16','Can manage the files uploaded in the background','1','304','6','0','en');
INSERT INTO met_language VALUES('4173','dlapptips14','The original FLASH settings, can be used to upload or set the page of the website Carousel (usually located below the navigation)','1','302','6','0','en');
INSERT INTO met_language VALUES('4174','dlapptips13','Used to monitor the status of the site, you can use the SMS feature to send real-time status of the site to the specified phone number','1','301','6','0','en');
INSERT INTO met_language VALUES('4175','dlapptips12','Can be used to bulk send, view send records, running account, and recharge SMS costs','1','300','6','0','en');
INSERT INTO met_language VALUES('4176','dlapptips6','Uninstall','1','294','6','0','en');
INSERT INTO met_language VALUES('4177','dlapptips7','Dear','1','295','6','0','en');
INSERT INTO met_language VALUES('4178','dlapptips8','You are currently:','1','296','6','0','en');
INSERT INTO met_language VALUES('4179','dlapptips9','User use','1','297','6','0','en');
INSERT INTO met_language VALUES('4180','dlapptips10','Only','1','298','6','0','en');
INSERT INTO met_language VALUES('4181','dlapptips11','The function of commercial version of WAP for website display on mobile terminal is more comprehensive and page display is more brilliant. <a href=http://www.metinfo.cn/web/wap.htm target=_blank class=red> Read more </a>','1','299','6','0','en');
INSERT INTO met_language VALUES('4182','dlapptips2','Official mall','1','290','6','0','en');
INSERT INTO met_language VALUES('4183','dlapptips3','Description:','1','291','6','0','en');
INSERT INTO met_language VALUES('4184','dlapptips4','version:','1','292','6','0','en');
INSERT INTO met_language VALUES('4185','dlapptips5','turn on','1','293','6','0','en');
INSERT INTO met_language VALUES('4186','mobiletips6','view image','1','287','6','0','en');
INSERT INTO met_language VALUES('4187','mobiletips7','Times','1','288','6','0','en');
INSERT INTO met_language VALUES('4188','dlapptips1','Installed application','1','289','6','0','en');
INSERT INTO met_language VALUES('4189','mobiletips5','Did not add the relevant modules of the column','1','286','6','0','en');
INSERT INTO met_language VALUES('4190','mobiletips2','Did not open or add the relevant functional section','1','283','6','0','en');
INSERT INTO met_language VALUES('4191','mobiletips3','Add content','1','284','6','0','en');
INSERT INTO met_language VALUES('4192','mobiletips4','Please fill in the title','1','285','6','0','en');
INSERT INTO met_language VALUES('4193','mobiletips1','Your browser does not open javascript support, open to the appropriate background operation.','1','282','6','0','en');
INSERT INTO met_language VALUES('4194','waptips6','hide','1','278','6','0','en');
INSERT INTO met_language VALUES('4195','waptips7','Open the static page Only intelligent machines support automatic jump, it is recommended to use pseudo-static','1','279','6','0','en');
INSERT INTO met_language VALUES('4196','waptips9','Empty will display website LOGO','1','281','6','0','en');
INSERT INTO met_language VALUES('4197','waptips8','Specify the domain name','1','280','6','0','en');
INSERT INTO met_language VALUES('4198','waptips5','display','1','277','6','0','en');
INSERT INTO met_language VALUES('4199','waptips3','Blank will display the homepage title','1','275','6','0','en');
INSERT INTO met_language VALUES('4200','waptips4','Blank will display a brief description of the website','1','276','6','0','en');
INSERT INTO met_language VALUES('4201','waptips1','Wap settings','1','273','6','0','en');
INSERT INTO met_language VALUES('4202','waptips2','Set Wap content page display picture size','1','274','6','0','en');
INSERT INTO met_language VALUES('4203','smstips95','wrong reason:','1','272','6','0','en');
INSERT INTO met_language VALUES('4204','smstips94','The current SMS delivery price and the server set the price is inconsistent, click <a href=\'\'> here </a> to refresh the page, retrieve the sending price','1','271','6','0','en');
INSERT INTO met_language VALUES('4205','smstips92','contact','1','269','6','0','en');
INSERT INTO met_language VALUES('4206','smstips93','Opened','1','270','6','0','en');
INSERT INTO met_language VALUES('4207','smstips91','Check the balance in time','1','268','6','0','en');
INSERT INTO met_language VALUES('4208','smstips84','Redeem immediately','1','266','6','0','en');
INSERT INTO met_language VALUES('4209','smstips90','Please register recharge,','1','267','6','0','en');
INSERT INTO met_language VALUES('4210','smstips83','Coupon instructions','1','265','6','0','en');
INSERT INTO met_language VALUES('4211','smstips82','Successful use','1','264','6','0','en');
INSERT INTO met_language VALUES('4212','smstips81','Over the use of time','1','263','6','0','en');
INSERT INTO met_language VALUES('4213','smstips80','This coupon is already in use','1','262','6','0','en');
INSERT INTO met_language VALUES('4214','smstips79','No such coupons','1','261','6','0','en');
INSERT INTO met_language VALUES('4215','smstips78','coupon','1','260','6','0','en');
INSERT INTO met_language VALUES('4216','smstips85','Get data from the official website, please refresh the page by mistake','1','259','6','0','en');
INSERT INTO met_language VALUES('4217','smstips76','Server is not responding','1','257','6','0','en');
INSERT INTO met_language VALUES('4218','smstips77','Can not connect to send text message server, please check the website!','1','258','6','0','en');
INSERT INTO met_language VALUES('4219','smstips74','Sending password is wrong','1','255','6','0','en');
INSERT INTO met_language VALUES('4220','smstips75','Website can not be accessed','1','256','6','0','en');
INSERT INTO met_language VALUES('4221','smstips73','SMS content and phone number can not be empty','1','254','6','0','en');
INSERT INTO met_language VALUES('4222','smstips72','Insufficient balance','1','253','6','0','en');
INSERT INTO met_language VALUES('4223','smstips71','Abnormal operation, insufficient balance','1','252','6','0','en');
INSERT INTO met_language VALUES('4224','smstips70','Sent successfully (with delay)','1','251','6','0','en');
INSERT INTO met_language VALUES('4225','smstips69','Number does not meet the rules','1','250','6','0','en');
INSERT INTO met_language VALUES('4226','smstips68','Too many phone numbers, up to 800 numbers','1','249','6','0','en');
INSERT INTO met_language VALUES('4227','smstips67','SMS content is too long, up to 350 words','1','248','6','0','en');
INSERT INTO met_language VALUES('4228','smstips66','Insufficient balance','1','247','6','0','en');
INSERT INTO met_language VALUES('4229','smstips65','operating','1','246','6','0','en');
INSERT INTO met_language VALUES('4230','smstips64','status','1','245','6','0','en');
INSERT INTO met_language VALUES('4231','smstips63','The number of each other','1','244','6','0','en');
INSERT INTO met_language VALUES('4232','smstips62','SMS content','1','243','6','0','en');
INSERT INTO met_language VALUES('4233','smstips61','recover password','1','242','6','0','en');
INSERT INTO met_language VALUES('4234','smstips60','Guest action reminder','1','241','6','0','en');
INSERT INTO met_language VALUES('4235','smstips55','Send time','1','236','6','0','en');
INSERT INTO met_language VALUES('4236','smstips59','Access fault monitoring','1','240','6','0','en');
INSERT INTO met_language VALUES('4237','smstips57','Send in bulk','1','238','6','0','en');
INSERT INTO met_language VALUES('4238','smstips58','Traffic statistics report','1','239','6','0','en');
INSERT INTO met_language VALUES('4239','smstips56','Send type','1','237','6','0','en');
INSERT INTO met_language VALUES('4240','smstips52','sending...','1','233','6','0','en');
INSERT INTO met_language VALUES('4241','smstips53','Are you sure to clear all sent records?','1','234','6','0','en');
INSERT INTO met_language VALUES('4242','smstips54','SMS content or phone number','1','235','6','0','en');
INSERT INTO met_language VALUES('4243','smstips44','Modify send password','1','225','6','0','en');
INSERT INTO met_language VALUES('4244','smstips45','Expected cost','1','226','6','0','en');
INSERT INTO met_language VALUES('4245','smstips46','Yuan each, a total of sent','1','227','6','0','en');
INSERT INTO met_language VALUES('4246','smstips47','Article','1','228','6','0','en');
INSERT INTO met_language VALUES('4247','smstips48','send','1','229','6','0','en');
INSERT INTO met_language VALUES('4248','smstips49','After sending successfully, you need to wait a moment before you can receive the message','1','230','6','0','en');
INSERT INTO met_language VALUES('4249','smstips50','retrieving...','1','231','6','0','en');
INSERT INTO met_language VALUES('4250','smstips51','No','1','232','6','0','en');
INSERT INTO met_language VALUES('4251','smstips43','Send password','1','224','6','0','en');
INSERT INTO met_language VALUES('4252','smstips41','Get the activated member\'s mobile number','1','222','6','0','en');
INSERT INTO met_language VALUES('4253','smstips42','Remove duplicate numbers','1','223','6','0','en');
INSERT INTO met_language VALUES('4254','smstips40','Number','1','221','6','0','en');
INSERT INTO met_language VALUES('4255','smstips36','Words','1','217','6','0','en');
INSERT INTO met_language VALUES('4256','smstips37','Total','1','218','6','0','en');
INSERT INTO met_language VALUES('4257','smstips38','SMS','1','219','6','0','en');
INSERT INTO met_language VALUES('4258','smstips39','Please fill in the mobile phone number to receive text messages Multiple mobile phone number Please re-line a no more than 800 mobile phone numbers The current total','1','220','6','0','en');
INSERT INTO met_language VALUES('4259','smstips33','SMS content','1','214','6','0','en');
INSERT INTO met_language VALUES('4260','smstips34','Chinese / English first 66 words, the second 64 words more than the number of words will be divided into multiple messages','1','215','6','0','en');
INSERT INTO met_language VALUES('4261','smstips35','Current words:','1','216','6','0','en');
INSERT INTO met_language VALUES('4262','smstips32','It is recommended to add the words such as \"a certain company\" at the end of the message (the boxes on both sides are also needed), otherwise it may not be received.','1','213','6','0','en');
INSERT INTO met_language VALUES('4263','smstips31','SMS content illegal keywords may be intercepted, the cost can not be returned, it is proposed to give 2,3 cell phone number trial once.','1','212','6','0','en');
INSERT INTO met_language VALUES('4264','smstips29','At least 6 digits','1','211','6','0','en');
INSERT INTO met_language VALUES('4265','smstips28','New password','1','210','6','0','en');
INSERT INTO met_language VALUES('4266','smstips21','Amount incurred','1','203','6','0','en');
INSERT INTO met_language VALUES('4267','smstips26','service password','1','208','6','0','en');
INSERT INTO met_language VALUES('4268','smstips27','Service password is the first time recharging automatically generated by the system and sent to your mailbox can not be changed password','1','209','6','0','en');
INSERT INTO met_language VALUES('4269','smstips25','Change service password','1','207','6','0','en');
INSERT INTO met_language VALUES('4270','smstips23','Operational reasons','1','205','6','0','en');
INSERT INTO met_language VALUES('4271','smstips24','Operating time','1','206','6','0','en');
INSERT INTO met_language VALUES('4272','smstips22','Account Balance','1','204','6','0','en');
INSERT INTO met_language VALUES('4273','smstips18','Type of operation','1','200','6','0','en');
INSERT INTO met_language VALUES('4274','smstips19','Recharge','1','201','6','0','en');
INSERT INTO met_language VALUES('4275','smstips20','Chargeback','1','202','6','0','en');
INSERT INTO met_language VALUES('4276','smstips16','Financial water records recorded in the official server, does not affect your site database size, will save the last 30 days of financial records.','1','198','6','0','en');
INSERT INTO met_language VALUES('4277','smstips17','sequence','1','199','6','0','en');
INSERT INTO met_language VALUES('4278','smstips15','SMS tariff instructions','1','197','6','0','en');
INSERT INTO met_language VALUES('4279','smstips14','Recharge money after the payment can not be returned, please carefully recharge!','1','196','6','0','en');
INSERT INTO met_language VALUES('4280','smstips13','For the first time, please make sure the basic web address is your domain name, currently:','1','195','6','0','en');
INSERT INTO met_language VALUES('4281','smstips12','Precautions','1','194','6','0','en');
INSERT INTO met_language VALUES('4282','smstips11','Recharge immediately','1','193','6','0','en');
INSERT INTO met_language VALUES('4283','smstips9','yuan','1','191','6','0','en');
INSERT INTO met_language VALUES('4284','smstips10','The first successful recharge will be sent to your e-mail service password, service password is very important, please keep it safe!','1','192','6','0','en');
INSERT INTO met_language VALUES('4285','smstips8','Recharge amount','1','190','6','0','en');
INSERT INTO met_language VALUES('4286','smstips5','Online SMS recharge','1','187','6','0','en');
INSERT INTO met_language VALUES('4287','smstips6','current balance','1','188','6','0','en');
INSERT INTO met_language VALUES('4288','smstips7','payment method','1','189','6','0','en');
INSERT INTO met_language VALUES('4289','physicaltips41','compare results','1','182','6','0','en');
INSERT INTO met_language VALUES('4290','smstips1','Send in bulk','1','183','6','0','en');
INSERT INTO met_language VALUES('4291','smstips2','send record','1','184','6','0','en');
INSERT INTO met_language VALUES('4292','smstips3','Financial water','1','185','6','0','en');
INSERT INTO met_language VALUES('4293','smstips4','Online recharge','1','186','6','0','en');
INSERT INTO met_language VALUES('4294','physicaltips39','Department inconsistent','1','180','6','0','en');
INSERT INTO met_language VALUES('4295','physicaltips40','return','1','181','6','0','en');
INSERT INTO met_language VALUES('4296','physicaltips37','Comparing ...','1','178','6','0','en');
INSERT INTO met_language VALUES('4297','physicaltips38','Check the last comparison result','1','179','6','0','en');
INSERT INTO met_language VALUES('4298','physicaltips36','Immediate contrast','1','177','6','0','en');
INSERT INTO met_language VALUES('4299','physicaltips35','Document Proof: All the files in the website are compared with the last backup fingerprint to find the missing or suspicious files, you need to manually log in FTP repair. Website upgrade, application and template download and deletion will change the fingerprint. It is recommended to compare the fingerprint before these operations and backup the fingerprint after the operation.','1','176','6','0','en');
INSERT INTO met_language VALUES('4300','physicaltips34','Back up the fingerprint immediately','1','175','6','0','en');
INSERT INTO met_language VALUES('4301','physicaltips33','Backing up ...','1','174','6','0','en');
INSERT INTO met_language VALUES('4302','physicaltips32','Backup Fingerprint: Record all the files and file size of the website','1','173','6','0','en');
INSERT INTO met_language VALUES('4303','physicaltips31','Scan results','1','172','6','0','en');
INSERT INTO met_language VALUES('4304','physicaltips30','Rescan','1','171','6','0','en');
INSERT INTO met_language VALUES('4305','physicaltips29','A','1','170','6','0','en');
INSERT INTO met_language VALUES('4306','physicaltips24','Scan now','1','165','6','0','en');
INSERT INTO met_language VALUES('4307','physicaltips25','Check the last scan result','1','166','6','0','en');
INSERT INTO met_language VALUES('4308','physicaltips26','Suspicious files','1','167','6','0','en');
INSERT INTO met_language VALUES('4309','physicaltips27','A, illegal suffix file','1','168','6','0','en');
INSERT INTO met_language VALUES('4310','physicaltips28','A, non-system folders','1','169','6','0','en');
INSERT INTO met_language VALUES('4311','physicaltips23','Able to scan the suspicious files that exist in the website directory, it is recommended to scan regularly','1','164','6','0','en');
INSERT INTO met_language VALUES('4312','physicaltips22','Safety project','1','163','6','0','en');
INSERT INTO met_language VALUES('4313','physicaltips20','Optimization project','1','161','6','0','en');
INSERT INTO met_language VALUES('4314','physicaltips21','Recommended to fix these items','1','162','6','0','en');
INSERT INTO met_language VALUES('4315','physicaltips19','These items may cause the site can not be normal access, please fix as soon as possible','1','160','6','0','en');
INSERT INTO met_language VALUES('4316','physicaltips18','Dangerous item','1','159','6','0','en');
INSERT INTO met_language VALUES('4317','physicaltips17','Minute','1','158','6','0','en');
INSERT INTO met_language VALUES('4318','physicaltips16','Re-examination','1','157','6','0','en');
INSERT INTO met_language VALUES('4319','physicaltips15','Physical examination time','1','156','6','0','en');
INSERT INTO met_language VALUES('4320','physicaltips14','Physical examination score','1','155','6','0','en');
INSERT INTO met_language VALUES('4321','physicaltips13','Immediate medical examination','1','154','6','0','en');
INSERT INTO met_language VALUES('4322','physicaltips11','Items have problems','1','152','6','0','en');
INSERT INTO met_language VALUES('4323','physicaltips12','It is recommended that weekly regular physical exams discover the details of your site and protect your site.','1','153','6','0','en');
INSERT INTO met_language VALUES('4324','physicaltips9','item,','1','150','6','0','en');
INSERT INTO met_language VALUES('4325','physicaltips10','among them','1','151','6','0','en');
INSERT INTO met_language VALUES('4326','physicaltips8','A total of scanned','1','149','6','0','en');
INSERT INTO met_language VALUES('4327','physicaltips7','Minute,','1','148','6','0','en');
INSERT INTO met_language VALUES('4328','physicaltips6','Last site medical examination score','1','147','6','0','en');
INSERT INTO met_language VALUES('4329','physicaltips5','Last physical examination time','1','146','6','0','en');
INSERT INTO met_language VALUES('4330','physicaltips4','Document proofing','1','145','6','0','en');
INSERT INTO met_language VALUES('4331','physicaltips3','Killing Trojans','1','144','6','0','en');
INSERT INTO met_language VALUES('4332','physicaltips2','Website checkup','1','143','6','0','en');
INSERT INTO met_language VALUES('4333','physicaltips1','Scanning...','1','142','6','0','en');
INSERT INTO met_language VALUES('4334','statbrowser7','Sogou browser','1','141','6','0','en');
INSERT INTO met_language VALUES('4335','statbrowser6','Google Chrome','1','140','6','0','en');
INSERT INTO met_language VALUES('4336','statbrowser5','Window of the World browser','1','139','6','0','en');
INSERT INTO met_language VALUES('4337','statbrowser4','TT browser','1','138','6','0','en');
INSERT INTO met_language VALUES('4338','statother','other','1','134','6','0','en');
INSERT INTO met_language VALUES('4339','statbrowser1','360 Safe Browser','1','135','6','0','en');
INSERT INTO met_language VALUES('4340','statbrowser2','Maxthon browser','1','136','6','0','en');
INSERT INTO met_language VALUES('4341','statbrowser3','QQ browser','1','137','6','0','en');
INSERT INTO met_language VALUES('4342','statvisitors','Independent visitor','1','133','6','0','en');
INSERT INTO met_language VALUES('4343','statip','IP','1','132','6','0','en');
INSERT INTO met_language VALUES('4344','week7','day','1','130','6','0','en');
INSERT INTO met_language VALUES('4345','statpv','PV','1','131','6','0','en');
INSERT INTO met_language VALUES('4346','week6','six','1','129','6','0','en');
INSERT INTO met_language VALUES('4347','week5','Fives','1','128','6','0','en');
INSERT INTO met_language VALUES('4348','week4','four','1','127','6','0','en');
INSERT INTO met_language VALUES('4349','week2','two','1','125','6','0','en');
INSERT INTO met_language VALUES('4350','week3','three','1','126','6','0','en');
INSERT INTO met_language VALUES('4351','stat_cr0','Never empty','1','123','6','0','en');
INSERT INTO met_language VALUES('4352','week1','one','1','124','6','0','en');
INSERT INTO met_language VALUES('4353','stat_cr4','Keep for nearly a year','1','122','6','0','en');
INSERT INTO met_language VALUES('4354','stat_cr3','Keep for nearly a month','1','121','6','0','en');
INSERT INTO met_language VALUES('4355','sms3','cache folder does not write permission, business member SMS send price failed to obtain!','1','117','6','0','en');
INSERT INTO met_language VALUES('4356','stat_cr1','Only keep the same day','1','119','6','0','en');
INSERT INTO met_language VALUES('4357','stat_cr2','Keep nearly seven days','1','120','6','0','en');
INSERT INTO met_language VALUES('4358','statweb','Enter the URL directly','1','118','6','0','en');
INSERT INTO met_language VALUES('4359','sms1','SMS content and phone number can not be empty','1','115','6','0','en');
INSERT INTO met_language VALUES('4360','sms2','Operation failed, may be the input information is wrong!','1','116','6','0','en');
INSERT INTO met_language VALUES('4361','physicalfingerprint1','Fingerprint file','1','109','6','0','en');
INSERT INTO met_language VALUES('4362','physicalfingerprint2','Not a fingerprint file','1','110','6','0','en');
INSERT INTO met_language VALUES('4363','physicalfingerprint3','The file size is different from the fingerprint file','1','111','6','0','en');
INSERT INTO met_language VALUES('4364','smschargeback','Chargeback','1','112','6','0','en');
INSERT INTO met_language VALUES('4365','smsrecharge','Recharge','1','113','6','0','en');
INSERT INTO met_language VALUES('4366','smsreonlinecharge','Online SMS recharge','1','114','6','0','en');
INSERT INTO met_language VALUES('4367','physicalfunction6','delete all','1','105','6','0','en');
INSERT INTO met_language VALUES('4368','physicalfingerprintno','Fingerprint file does not exist','1','108','6','0','en');
INSERT INTO met_language VALUES('4369','physicalfingerprintok','Fingerprint exactly the same','1','107','6','0','en');
INSERT INTO met_language VALUES('4370','physicalfunctionok','Scan has been completed, did not find Trojans and other security threats.','1','106','6','0','en');
INSERT INTO met_language VALUES('4371','physicalfunction5','Non-system folders, if you are not installed other programs, please delete','1','104','6','0','en');
INSERT INTO met_language VALUES('4372','physicalfunction4','folder','1','103','6','0','en');
INSERT INTO met_language VALUES('4373','physicalfunction3','Illegal suffix','1','102','6','0','en');
INSERT INTO met_language VALUES('4374','physicalfunction2','Contains danger function','1','101','6','0','en');
INSERT INTO met_language VALUES('4375','physicalfiletime6','Years ago','1','99','6','0','en');
INSERT INTO met_language VALUES('4376','physicalfunction1','Suspicious files','1','100','6','0','en');
INSERT INTO met_language VALUES('4377','physicalfiletime5','A month ago','1','98','6','0','en');
INSERT INTO met_language VALUES('4378','physicalfiletime2','An hour ago','1','95','6','0','en');
INSERT INTO met_language VALUES('4379','physicalfiletime3','Days ago','1','96','6','0','en');
INSERT INTO met_language VALUES('4380','physicalfiletime4','Week ago','1','97','6','0','en');
INSERT INTO met_language VALUES('4381','physicalfiletime1','minutes ago','1','94','6','0','en');
INSERT INTO met_language VALUES('4382','physicalfileno','No site medical examination, it is recommended that immediately physical examination','1','93','6','0','en');
INSERT INTO met_language VALUES('4383','physicalfile10','The file size is not the same as the system standard file','1','92','6','0','en');
INSERT INTO met_language VALUES('4384','physicalfile9','regenerate','1','91','6','0','en');
INSERT INTO met_language VALUES('4385','physicalfile2','No risk found','1','84','6','0','en');
INSERT INTO met_language VALUES('4386','physicalfile3','System Files','1','85','6','0','en');
INSERT INTO met_language VALUES('4387','physicalfile4','Profile','1','86','6','0','en');
INSERT INTO met_language VALUES('4388','physicalfile5','Lost','1','87','6','0','en');
INSERT INTO met_language VALUES('4389','physicalfile6','The file size is not the same as the system standard file','1','88','6','0','en');
INSERT INTO met_language VALUES('4390','physicalfile7','download again','1','89','6','0','en');
INSERT INTO met_language VALUES('4391','physicalfile8','Please restore the backup','1','90','6','0','en');
INSERT INTO met_language VALUES('4392','physicalfile1','Could not connect to server for system standard file','1','83','6','0','en');
INSERT INTO met_language VALUES('4393','physicalweb1','The website URL is different from the current website','1','81','6','0','en');
INSERT INTO met_language VALUES('4394','physicalfile','Key file detection','1','82','6','0','en');
INSERT INTO met_language VALUES('4395','physicalweb','Website address settings','1','80','6','0','en');
INSERT INTO met_language VALUES('4396','physicalmember2','name','1','79','6','0','en');
INSERT INTO met_language VALUES('4397','physicalspam','Spam','1','75','6','0','en');
INSERT INTO met_language VALUES('4398','physicalspam1','Recycle bin has uncleared data','1','76','6','0','en');
INSERT INTO met_language VALUES('4399','physicalmember','Pending member','1','77','6','0','en');
INSERT INTO met_language VALUES('4400','physicalmember1','There are unverified members:','1','78','6','0','en');
INSERT INTO met_language VALUES('4401','physicalunread3','resume','1','74','6','0','en');
INSERT INTO met_language VALUES('4402','physicalunread2','voicemail','1','73','6','0','en');
INSERT INTO met_language VALUES('4403','physicalunread','Unread message','1','71','6','0','en');
INSERT INTO met_language VALUES('4404','physicalunread1','Feedback','1','72','6','0','en');
INSERT INTO met_language VALUES('4405','physicalstatic1','Static pages and pseudo-static is turned on at the same time, will result in the page can not be accessed','1','70','6','0','en');
INSERT INTO met_language VALUES('4406','physicalseo4','Has been set','1','68','6','0','en');
INSERT INTO met_language VALUES('4407','physicalstatic','Static page settings','1','69','6','0','en');
INSERT INTO met_language VALUES('4408','physicalseo3','Site description is not set','1','67','6','0','en');
INSERT INTO met_language VALUES('4409','physicalupdate3','Please update the website content as soon as possible','1','63','6','0','en');
INSERT INTO met_language VALUES('4410','physicalseo','SEO optimization settings','1','64','6','0','en');
INSERT INTO met_language VALUES('4411','physicalseo1','Website keywords not set','1','65','6','0','en');
INSERT INTO met_language VALUES('4412','physicalseo2','There are full-width commas in website keywords [,] It is recommended to use commas [,] or vertical bars [|] as delimiters','1','66','6','0','en');
INSERT INTO met_language VALUES('4413','physicalupdate2','Recommended weekly updates','1','62','6','0','en');
INSERT INTO met_language VALUES('4414','physicalupdate1','Last updated:','1','61','6','0','en');
INSERT INTO met_language VALUES('4415','physicalupdate','Website content update','1','60','6','0','en');
INSERT INTO met_language VALUES('4416','physicalbackup4','A few days ago, it is recommended to back up at least once a month','1','59','6','0','en');
INSERT INTO met_language VALUES('4417','physicalbackup1','No data backup file detected, it is recommended to back up site data regularly.','1','57','6','0','en');
INSERT INTO met_language VALUES('4418','physicalbackup2','Last backup time:','1','58','6','0','en');
INSERT INTO met_language VALUES('4419','physicalbackup','Website data backup','1','56','6','0','en');
INSERT INTO met_language VALUES('4420','physicaladmin2','already edited','1','55','6','0','en');
INSERT INTO met_language VALUES('4421','physicaladmin1','Background directory name is not modified, it is recommended to modify','1','54','6','0','en');
INSERT INTO met_language VALUES('4422','physicaladmin','Background directory name','1','53','6','0','en');
INSERT INTO met_language VALUES('4423','physicalnoneed','No need to deal with','1','52','6','0','en');
INSERT INTO met_language VALUES('4424','physicalok','normal','1','51','6','0','en');
INSERT INTO met_language VALUES('4425','physicalupdatesuc','update completed','1','50','6','0','en');
INSERT INTO met_language VALUES('4426','physicaldelok','successfully deleted','1','47','6','0','en');
INSERT INTO met_language VALUES('4427','physicaldelno','Can not find the file, file deletion failed.','1','48','6','0','en');
INSERT INTO met_language VALUES('4428','physicalgenok','Generated successfully','1','49','6','0','en');
INSERT INTO met_language VALUES('4429','nursenomoney','The balance is not enough, please recharge after submit!','1','46','6','0','en');
INSERT INTO met_language VALUES('4430','appdl4','The above version of the system support','1','45','6','0','en');
INSERT INTO met_language VALUES('4431','appdl2','Installed','1','43','6','0','en');
INSERT INTO met_language VALUES('4432','appdl3','This application needs','1','44','6','0','en');
INSERT INTO met_language VALUES('4433','appdl1','After the application is installed, please use it in my application','1','42','6','0','en');
INSERT INTO met_language VALUES('4434','appuninstall','Uninstall successful','1','41','6','0','en');
INSERT INTO met_language VALUES('4435','usertype2','Commercial authorization','1','34','6','0','en');
INSERT INTO met_language VALUES('4436','usertype3','Ordinary commercial authority','1','35','6','0','en');
INSERT INTO met_language VALUES('4437','usertype4','Advanced Business Licensing','1','36','6','0','en');
INSERT INTO met_language VALUES('4438','hosterror','Connection to server failed, please try again later','1','37','6','0','en');
INSERT INTO met_language VALUES('4439','appinstall','installation','1','38','6','0','en');
INSERT INTO met_language VALUES('4440','appreinstall','re-install','1','39','6','0','en');
INSERT INTO met_language VALUES('4441','appupgrade','upgrade','1','40','6','0','en');
INSERT INTO met_language VALUES('4442','usertype1','FREE','1','33','6','0','en');
INSERT INTO met_language VALUES('4443','csvexplain2','1. Please do not modify the file name.','1','30','6','0','en');
INSERT INTO met_language VALUES('4444','csvexplain3','2. Details field supports HTML code.','1','31','6','0','en');
INSERT INTO met_language VALUES('4445','csvexplain4','3. Select the field, please fill in the options.','1','32','6','0','en');
INSERT INTO met_language VALUES('4446','csvexplain1','Documentation','1','29','6','0','en');
INSERT INTO met_language VALUES('4447','csverror2','The static page name of the upload is the same as the existing content. Wrong line:','1','28','6','0','en');
INSERT INTO met_language VALUES('4448','csvnodata','no data','1','26','6','0','en');
INSERT INTO met_language VALUES('4449','csverror1','The same static page name exists in the upload file. Wrong line:','1','27','6','0','en');
INSERT INTO met_language VALUES('4450','listno','There is no content under this section','1','24','6','0','en');
INSERT INTO met_language VALUES('4451','wapdimensionaltips','Please upload less than 300K pictures, the picture may not be generated too large! <br /> do not need to display the QR code on the QR code, please leave blank.','1','21','6','0','en');
INSERT INTO met_language VALUES('4452','csvnocolumn','Did not find the corresponding column, please do not modify the file name','1','25','6','0','en');
INSERT INTO met_language VALUES('4453','wapdimensionaldo','generate','1','22','6','0','en');
INSERT INTO met_language VALUES('4454','contentuppage','The operation is successful, skip to the next page','1','23','6','0','en');
INSERT INTO met_language VALUES('4455','wapdimensionalsize','size','1','20','6','0','en');
INSERT INTO met_language VALUES('4456','wapdimensionaltitle','Two-dimensional code generation (mobile phone scanning two-dimensional code to access the mobile version of the site)','1','19','6','0','en');
INSERT INTO met_language VALUES('4457','wapdescription','Short description','1','17','6','0','en');
INSERT INTO met_language VALUES('4458','wapfoottext','Bottom text','1','18','6','0','en');
INSERT INTO met_language VALUES('4459','wapindextitle','Page title','1','16','6','0','en');
INSERT INTO met_language VALUES('4460','waptiao','Article','1','15','6','0','en');
INSERT INTO met_language VALUES('4461','waplist','Each module list shows the quantity','1','13','6','0','en');
INSERT INTO met_language VALUES('4462','waplistauk','display all','1','14','6','0','en');
INSERT INTO met_language VALUES('4463','waplistaud','Need to review','1','12','6','0','en');
INSERT INTO met_language VALUES('4464','waplistshow','Content display','1','10','6','0','en');
INSERT INTO met_language VALUES('4465','wapinfo7','Set to be audited, the background to add content to be checked to allow the display will be displayed in the WAP WAP foreground','1','11','6','0','en');
INSERT INTO met_language VALUES('4466','wapinfo4','Such as wap.metinfo.cn (please do a good job of domain name resolution and binding)','1','7','6','0','en');
INSERT INTO met_language VALUES('4467','wapinfo6','Taking into account the phone screen width, picture width 240px (pixels) is more suitable','1','9','6','0','en');
INSERT INTO met_language VALUES('4468','wapshowimg','Show pictures','1','8','6','0','en');
INSERT INTO met_language VALUES('4469','waptype','Wap function','1','1','6','0','en');
INSERT INTO met_language VALUES('4470','waplang','Show link','1','2','6','0','en');
INSERT INTO met_language VALUES('4471','wapsetlang','The homepage language switch position will display the WAP text link','1','3','6','0','en');
INSERT INTO met_language VALUES('4472','wapfang','Jump automatically','1','4','6','0','en');
INSERT INTO met_language VALUES('4473','wapgeturl','Phone access automatically jump','1','5','6','0','en');
INSERT INTO met_language VALUES('4474','wapinfo3','Specify the domain name to jump','1','6','6','0','en');
INSERT INTO met_language VALUES('4475','enterpriseapp','Enterprise application','1','6','0','0','en');
INSERT INTO met_language VALUES('4476','otherinfocache2','cache file does not write permission, update the contents of the front can not be displayed!','1','209','5','0','en');
INSERT INTO met_language VALUES('4477','otherinfocache1','Please re-generate a static page, and refresh the page, modify the content can be displayed properly!','1','208','5','0','en');
INSERT INTO met_language VALUES('4478','modulemanagement8','Feedback system','1','207','5','0','en');
INSERT INTO met_language VALUES('4479','modulemanagement7','Message system','1','206','5','0','en');
INSERT INTO met_language VALUES('4480','modulemanagement6','Recruitment module','1','205','5','0','en');
INSERT INTO met_language VALUES('4481','modulemanagement5','Picture module','1','204','5','0','en');
INSERT INTO met_language VALUES('4482','modulemanagement3','Product module','1','202','5','0','en');
INSERT INTO met_language VALUES('4483','modulemanagement4','Download module','1','203','5','0','en');
INSERT INTO met_language VALUES('4484','modulemanagement1','Profile module','1','200','5','0','en');
INSERT INTO met_language VALUES('4485','modulemanagement2','Article module','1','201','5','0','en');
INSERT INTO met_language VALUES('4486','dltips7','Download timed out','1','195','5','0','en');
INSERT INTO met_language VALUES('4487','columnarrangement1','Display mode:','1','196','5','0','en');
INSERT INTO met_language VALUES('4488','columnarrangement2','Switch to','1','197','5','0','en');
INSERT INTO met_language VALUES('4489','columnarrangement3','Sort by module','1','198','5','0','en');
INSERT INTO met_language VALUES('4490','columnarrangement4','Classified by column','1','199','5','0','en');
INSERT INTO met_language VALUES('4491','dltips6','Remote server request error','1','194','5','0','en');
INSERT INTO met_language VALUES('4492','dltips5','The file you requested does not exist','1','193','5','0','en');
INSERT INTO met_language VALUES('4493','dltips4','Please upgrade the program','1','192','5','0','en');
INSERT INTO met_language VALUES('4494','dltips3','You do not have permission to download this file','1','191','5','0','en');
INSERT INTO met_language VALUES('4495','dltips2','File download failed, please check the local directory permissions and space size','1','190','5','0','en');
INSERT INTO met_language VALUES('4496','dltips1','Can not connect to the remote server, please check the network','1','189','5','0','en');
INSERT INTO met_language VALUES('4497','seotips25','Pack it now and download it','1','188','5','0','en');
INSERT INTO met_language VALUES('4498','seotips24','note! You have both static pages and pseudostates turned off. Please turn off one of them, otherwise you will not be able to access the website.','1','187','5','0','en');
INSERT INTO met_language VALUES('4499','seotips18','Filter external modules','1','182','5','0','en');
INSERT INTO met_language VALUES('4500','seotips19','Website language range','1','183','5','0','en');
INSERT INTO met_language VALUES('4501','seotips20','Current language','1','184','5','0','en');
INSERT INTO met_language VALUES('4502','seotips21','Generate a sitemap of the selected language only','1','185','5','0','en');
INSERT INTO met_language VALUES('4503','seotips22','And generate','1','186','5','0','en');
INSERT INTO met_language VALUES('4504','seotips17','Filtering does not appear in the foreground section','1','181','5','0','en');
INSERT INTO met_language VALUES('4505','seotips15_3','Suitable for Yahoo,','1','179','5','0','en');
INSERT INTO met_language VALUES('4506','seotips16','Filter columns and content','1','180','5','0','en');
INSERT INTO met_language VALUES('4507','seotips15_1','To facilitate visitors to view the site content, you can add a section in the column settings for the \'Site Map\' section.','1','177','5','0','en');
INSERT INTO met_language VALUES('4508','seotips15_2','Suitable for Google and Baidu','1','178','5','0','en');
INSERT INTO met_language VALUES('4509','seotips15','Map URL','1','176','5','0','en');
INSERT INTO met_language VALUES('4510','seotips6','Home','1','166','5','0','en');
INSERT INTO met_language VALUES('4511','seotips7','Such as','1','167','5','0','en');
INSERT INTO met_language VALUES('4512','seotips8','Static page name or ID','1','168','5','0','en');
INSERT INTO met_language VALUES('4513','seotips9','Content page','1','169','5','0','en');
INSERT INTO met_language VALUES('4514','seotips10','Whether to delete the pseudo-static configuration file? If other languages ??to open the pseudo-static function, please do not delete.','1','170','5','0','en');
INSERT INTO met_language VALUES('4515','seotips14_1','How to submit to search engine?','1','175','5','0','en');
INSERT INTO met_language VALUES('4516','seotips14','Sitemaps help speed up your site\'s search engine listings','1','174','5','0','en');
INSERT INTO met_language VALUES('4517','seotips13','Replacing the static way to rebuild all static pages, ok!','1','173','5','0','en');
INSERT INTO met_language VALUES('4518','seotips12','Will all static pages be generated immediately?','1','172','5','0','en');
INSERT INTO met_language VALUES('4519','seotips11','Delete all generated static pages?','1','171','5','0','en');
INSERT INTO met_language VALUES('4520','seotips5','URL form (pseudo-static URL composition does not support changes)','1','165','5','0','en');
INSERT INTO met_language VALUES('4521','uisetTips2','Empty call computer version of LOGO, the recommended size: 130 * 50 (pixels)','1','0','0','0','en');
INSERT INTO met_language VALUES('4522','seotips3','Static page generation','1','163','5','0','en');
INSERT INTO met_language VALUES('4523','seotips2','Static page settings','1','162','5','0','en');
INSERT INTO met_language VALUES('4524','seotips1','Multiple keywords separated by vertical lines |, recommended 3-4 keywords.','1','161','5','0','en');
INSERT INTO met_language VALUES('4525','statips62','Visits','1','159','5','0','en');
INSERT INTO met_language VALUES('4526','statips63','Visits','1','160','5','0','en');
INSERT INTO met_language VALUES('4527','statips60','Domain name','1','157','5','0','en');
INSERT INTO met_language VALUES('4528','statips61','Way URL','1','158','5','0','en');
INSERT INTO met_language VALUES('4529','statips59','Way to the page','1','156','5','0','en');
INSERT INTO met_language VALUES('4530','statips57','Daily maximum access','1','154','5','0','en');
INSERT INTO met_language VALUES('4531','statips58','In order to prevent malicious attacks, beyond the record no longer visit information','1','155','5','0','en');
INSERT INTO met_language VALUES('4532','statips56','Security Settings','1','153','5','0','en');
INSERT INTO met_language VALUES('4533','statips55','Clear all data before today','1','152','5','0','en');
INSERT INTO met_language VALUES('4534','statips54','Clear all data','1','151','5','0','en');
INSERT INTO met_language VALUES('4535','statips53','Clear all statistics with one click','1','150','5','0','en');
INSERT INTO met_language VALUES('4536','statips52','Clear statistics','1','149','5','0','en');
INSERT INTO met_language VALUES('4537','statips51','A key to clear','1','148','5','0','en');
INSERT INTO met_language VALUES('4538','statips50','The program clears the statistics before the set time every day, and the save takes effect.','1','147','5','0','en');
INSERT INTO met_language VALUES('4539','statips49','Clear the way (the statistics will occupy the database size)','1','146','5','0','en');
INSERT INTO met_language VALUES('4540','statips48','Closing no longer records visitor information','1','145','5','0','en');
INSERT INTO met_language VALUES('4541','statips47','Access statistical functions','1','144','5','0','en');
INSERT INTO met_language VALUES('4542','statips46','24 hour traffic trend','1','143','5','0','en');
INSERT INTO met_language VALUES('4543','statips45','Accumulated history','1','142','5','0','en');
INSERT INTO met_language VALUES('4544','statips44','Highest in history','1','141','5','0','en');
INSERT INTO met_language VALUES('4545','statips43','Daily average','1','140','5','0','en');
INSERT INTO met_language VALUES('4546','statips41','Press IP to view','1','138','5','0','en');
INSERT INTO met_language VALUES('4547','statips42','Overview of traffic','1','139','5','0','en');
INSERT INTO met_language VALUES('4548','statips40','View by independent visitors','1','137','5','0','en');
INSERT INTO met_language VALUES('4549','statips38','Small time distribution','1','135','5','0','en');
INSERT INTO met_language VALUES('4550','statips39','Press PV to view','1','136','5','0','en');
INSERT INTO met_language VALUES('4551','statips37','Daily traffic distribution','1','134','5','0','en');
INSERT INTO met_language VALUES('4552','statips36','week','1','133','5','0','en');
INSERT INTO met_language VALUES('4553','statips35','date','1','132','5','0','en');
INSERT INTO met_language VALUES('4554','statips34','Daily traffic profile','1','131','5','0','en');
INSERT INTO met_language VALUES('4555','statips33','Number of searches','1','130','5','0','en');
INSERT INTO met_language VALUES('4556','statips32','search engine','1','129','5','0','en');
INSERT INTO met_language VALUES('4557','statips31','Interviewed','1','128','5','0','en');
INSERT INTO met_language VALUES('4558','statips30','origin','1','127','5','0','en');
INSERT INTO met_language VALUES('4559','statips23','Own language','1','121','5','0','en');
INSERT INTO met_language VALUES('4560','statips25','domain name','1','122','5','0','en');
INSERT INTO met_language VALUES('4561','statips26','Enter the URL or bookmark directly','1','123','5','0','en');
INSERT INTO met_language VALUES('4562','statips29','Browser','1','126','5','0','en');
INSERT INTO met_language VALUES('4563','statips28','Area - network','1','125','5','0','en');
INSERT INTO met_language VALUES('4564','statips27','time','1','124','5','0','en');
INSERT INTO met_language VALUES('4565','statips22','Per capita views','1','120','5','0','en');
INSERT INTO met_language VALUES('4566','statips21','Independent visitor','1','119','5','0','en');
INSERT INTO met_language VALUES('4567','statips20','Views','1','118','5','0','en');
INSERT INTO met_language VALUES('4568','statips19','Page name','1','117','5','0','en');
INSERT INTO met_language VALUES('4569','statips18','Ranking','1','116','5','0','en');
INSERT INTO met_language VALUES('4570','statips17','From','1','115','5','0','en');
INSERT INTO met_language VALUES('4571','statips14','this month','1','113','5','0','en');
INSERT INTO met_language VALUES('4572','statips15','Choose a date','1','114','5','0','en');
INSERT INTO met_language VALUES('4573','statips13','The last 30 days','1','112','5','0','en');
INSERT INTO met_language VALUES('4574','statips12','The last 7 days','1','111','5','0','en');
INSERT INTO met_language VALUES('4575','statips11','Yesterday','1','110','5','0','en');
INSERT INTO met_language VALUES('4576','statips10','today','1','109','5','0','en');
INSERT INTO met_language VALUES('4577','statips9','Interviewed language','1','108','5','0','en');
INSERT INTO met_language VALUES('4578','statips8','Interviewed domain name','1','107','5','0','en');
INSERT INTO met_language VALUES('4579','statips5','Analysis','1','104','5','0','en');
INSERT INTO met_language VALUES('4580','statips6','Visit details','1','105','5','0','en');
INSERT INTO met_language VALUES('4581','statips7','Interviewed page','1','106','5','0','en');
INSERT INTO met_language VALUES('4582','enginetype7','Youdao','1','98','5','0','en');
INSERT INTO met_language VALUES('4583','enginetype8','360 search','1','99','5','0','en');
INSERT INTO met_language VALUES('4584','statips1','Statistics Overview','1','100','5','0','en');
INSERT INTO met_language VALUES('4585','statips2','Statistics settings','1','101','5','0','en');
INSERT INTO met_language VALUES('4586','statips4','Analysis of the interview','1','103','5','0','en');
INSERT INTO met_language VALUES('4587','statips3','search engine','1','102','5','0','en');
INSERT INTO met_language VALUES('4588','enginetype6','Sogou','1','97','5','0','en');
INSERT INTO met_language VALUES('4589','enginetype5','must','1','96','5','0','en');
INSERT INTO met_language VALUES('4590','enginetype4','Yahoo','1','95','5','0','en');
INSERT INTO met_language VALUES('4591','linkRecommend','Recommended site','1','91','5','0','en');
INSERT INTO met_language VALUES('4592','enginetype1','Google','1','92','5','0','en');
INSERT INTO met_language VALUES('4593','enginetype2','Baidu','1','93','5','0','en');
INSERT INTO met_language VALUES('4594','enginetype3','Soso','1','94','5','0','en');
INSERT INTO met_language VALUES('4595','linkPass','examination passed','1','90','5','0','en');
INSERT INTO met_language VALUES('4596','linkLOGO','Website LOGO','1','87','5','0','en');
INSERT INTO met_language VALUES('4597','linkcontact','Contact information','1','88','5','0','en');
INSERT INTO met_language VALUES('4598','linktip1','The larger the number, the higher the ranking','1','89','5','0','en');
INSERT INTO met_language VALUES('4599','linkUrl','Website address','1','86','5','0','en');
INSERT INTO met_language VALUES('4600','linkTip2','Please enter the website title keyword','1','85','5','0','en');
INSERT INTO met_language VALUES('4601','linkKeys','Website keywords','1','83','5','0','en');
INSERT INTO met_language VALUES('4602','linkCheck','Audit','1','84','5','0','en');
INSERT INTO met_language VALUES('4603','linkName','Website title','1','82','5','0','en');
INSERT INTO met_language VALUES('4604','linkType4','Text link','1','80','5','0','en');
INSERT INTO met_language VALUES('4605','linkType5','LOGO link','1','81','5','0','en');
INSERT INTO met_language VALUES('4606','linkType3','All links','1','79','5','0','en');
INSERT INTO met_language VALUES('4607','linkType1','Unaudited link','1','77','5','0','en');
INSERT INTO met_language VALUES('4608','linkType2','Recommended links','1','78','5','0','en');
INSERT INTO met_language VALUES('4609','htmnoopen','Not open the static page','1','74','5','0','en');
INSERT INTO met_language VALUES('4610','linkType','Link type','1','75','5','0','en');
INSERT INTO met_language VALUES('4611','linkTypenonull','Please select the link type','1','76','5','0','en');
INSERT INTO met_language VALUES('4612','htmdabaoinfo2','<span style = float: right;> Package as a stand-alone static site that can be accessed independently </ span>','1','73','5','0','en');
INSERT INTO met_language VALUES('4613','htmdabao','Station static packaging','1','72','5','0','en');
INSERT INTO met_language VALUES('4614','rewriteruledownload2','MetInfo Pseudo-static rules','1','71','5','0','en');
INSERT INTO met_language VALUES('4615','rewriteruledownload1','Download pseudo-static rules','1','70','5','0','en');
INSERT INTO met_language VALUES('4616','rewritefinfo3','Please turn off the pseudo static function, pseudo static and static pages can only use one.','1','69','5','0','en');
INSERT INTO met_language VALUES('4617','rewritefaq','What is Pseudo-Static state? What is the role?','1','67','5','0','en');
INSERT INTO met_language VALUES('4618','rewritefinfo2','Please turn off the static page function, pseudo static and static pages can only use one.','1','68','5','0','en');
INSERT INTO met_language VALUES('4619','htmCreateAll','Generate all pages','1','63','5','0','en');
INSERT INTO met_language VALUES('4620','htmcreateallinfo','Please use caution, very consume system resources!','1','64','5','0','en');
INSERT INTO met_language VALUES('4621','rewrite','Pseudo-static (URL Rewrite)','1','65','5','0','en');
INSERT INTO met_language VALUES('4622','rewriteok','Need space support: URL Rewrite module (URL rewrite)','1','66','5','0','en');
INSERT INTO met_language VALUES('4623','htmsitemap','Sitemap','1','61','5','0','en');
INSERT INTO met_language VALUES('4624','htmsitemap1','Generate site map','1','62','5','0','en');
INSERT INTO met_language VALUES('4625','htmAll','All pages','1','59','5','0','en');
INSERT INTO met_language VALUES('4626','htmlogin','Member module','1','60','5','0','en');
INSERT INTO met_language VALUES('4627','htmTip1','Generate content page','1','57','5','0','en');
INSERT INTO met_language VALUES('4628','htmTip2','Generate the list page','1','58','5','0','en');
INSERT INTO met_language VALUES('4629','htmColumn','Column','1','56','5','0','en');
INSERT INTO met_language VALUES('4630','htmCreateHome','Generate home page','1','55','5','0','en');
INSERT INTO met_language VALUES('4631','htmHome','Home page','1','54','5','0','en');
INSERT INTO met_language VALUES('4632','sethtmsitemap','Site map build settings','1','51','5','0','en');
INSERT INTO met_language VALUES('4633','sethtmsitemap1','HTML sitemap','1','52','5','0','en');
INSERT INTO met_language VALUES('4634','sethtmsitemap4','xml sitemap','1','53','5','0','en');
INSERT INTO met_language VALUES('4635','sethtmlist','List page name','1','47','5','0','en');
INSERT INTO met_language VALUES('4636','sethtmlist1','Default file name + class + page number (eg product_1_1)','1','48','5','0','en');
INSERT INTO met_language VALUES('4637','sethtmlist2','Where the folder name + class + page number (such as software_1_1)','1','49','5','0','en');
INSERT INTO met_language VALUES('4638','sethtmpage4','<span style = \"float: right;\"> Do not recommend frequent replacement, to ensure the SEO effect (please modify all static pages) </ span> Static page name rules','1','50','5','0','en');
INSERT INTO met_language VALUES('4639','sethtmpage3','Where the folder name + ID (such as product10)','1','43','5','0','en');
INSERT INTO met_language VALUES('4640','setlisthtmltype','List page type','1','44','5','0','en');
INSERT INTO met_language VALUES('4641','setlisthtmltype1','Show all section id (eg product_1_2_3)','1','45','5','0','en');
INSERT INTO met_language VALUES('4642','setlisthtmltype2','Only show this column id (such as product_1)','1','46','5','0','en');
INSERT INTO met_language VALUES('4643','sethtmpage2','Year, month, day + ID (such as 2009081510)','1','42','5','0','en');
INSERT INTO met_language VALUES('4644','sethtmpage1','The default file name + ID (such as showproduct10)','1','41','5','0','en');
INSERT INTO met_language VALUES('4645','sethtmpage','Content page name','1','40','5','0','en');
INSERT INTO met_language VALUES('4646','sethtmtype','Static page type','1','39','5','0','en');
INSERT INTO met_language VALUES('4647','sethtmway3','It is not recommended to enable the automatic generation function, which consumes a lot of resources. Only content management-related operations can be automatically generated. If other background settings are changed, no foreground creation needs to be manually generated.','1','38','5','0','en');
INSERT INTO met_language VALUES('4648','sethtmway2','Manually generated','1','37','5','0','en');
INSERT INTO met_language VALUES('4649','sethtmway','Generation method','1','35','5','0','en');
INSERT INTO met_language VALUES('4650','sethtmway1','Automatically generated when content information changes','1','36','5','0','en');
INSERT INTO met_language VALUES('4651','setbasicTip4','It is suggested that the enterprise station use the pseudo-static function, purely static consumption of resources and inconvenient management; the first time you open, click \"static page generation\" to generate all the pages','1','34','5','0','en');
INSERT INTO met_language VALUES('4652','sethtmok','Static pages open','1','31','5','0','en');
INSERT INTO met_language VALUES('4653','sethtmall','Station static','1','32','5','0','en');
INSERT INTO met_language VALUES('4654','setbasicTip3','Home page, content page static','1','33','5','0','en');
INSERT INTO met_language VALUES('4655','labelUrl','link address','1','27','5','0','en');
INSERT INTO met_language VALUES('4656','labelAdd','Add a new label','1','28','5','0','en');
INSERT INTO met_language VALUES('4657','labelnonull','The original text can not be empty','1','29','5','0','en');
INSERT INTO met_language VALUES('4658','htm','Static page has been successfully generated','1','30','5','0','en');
INSERT INTO met_language VALUES('4659','labelNewtitle','Title','1','26','5','0','en');
INSERT INTO met_language VALUES('4660','setseojiathis','Social Share button','1','22','5','0','en');
INSERT INTO met_language VALUES('4661','labelnum','Replacement times','1','23','5','0','en');
INSERT INTO met_language VALUES('4662','labelOld','Original text','1','24','5','0','en');
INSERT INTO met_language VALUES('4663','labelNew','Replace with','1','25','5','0','en');
INSERT INTO met_language VALUES('4664','setseoTip14','The title of the inner page is constructed so that you can also customize the title of the corresponding page when editing / adding content.','1','21','5','0','en');
INSERT INTO met_language VALUES('4665','setseotitletype4','Content title + website keyword + website name','1','20','5','0','en');
INSERT INTO met_language VALUES('4666','setseotitletype3','Content title + website keyword','1','19','5','0','en');
INSERT INTO met_language VALUES('4667','setseotitletype2','Content title + website name','1','18','5','0','en');
INSERT INTO met_language VALUES('4668','setseotitletype','Inside page title (title)','1','16','5','0','en');
INSERT INTO met_language VALUES('4669','setseotitletype1','Content title','1','17','5','0','en');
INSERT INTO met_language VALUES('4670','setseodopen','The current window opens','1','14','5','0','en');
INSERT INTO met_language VALUES('4671','setseonewopen','open in a new window','1','15','5','0','en');
INSERT INTO met_language VALUES('4672','setseotype','Page link','1','13','5','0','en');
INSERT INTO met_language VALUES('4673','setseoFoot','Website optimization at the bottom','1','11','5','0','en');
INSERT INTO met_language VALUES('4674','setseoTip13','Display in the foreground link application page','1','12','5','0','en');
INSERT INTO met_language VALUES('4675','setseoFriendLink','Friendship link site name','1','10','5','0','en');
INSERT INTO met_language VALUES('4676','setseoTip9','Move the mouse to the text displayed on the hyperlink','1','9','5','0','en');
INSERT INTO met_language VALUES('4677','setseoTip8','Hyperlink default Title','1','8','5','0','en');
INSERT INTO met_language VALUES('4678','setseoTip7','Move the mouse to the text shown in the picture','1','7','5','0','en');
INSERT INTO met_language VALUES('4679','setseoTip6','Image default ALT','1','6','5','0','en');
INSERT INTO met_language VALUES('4680','setseoTip4','Head optimization text','1','5','5','0','en');
INSERT INTO met_language VALUES('4681','setseoTip10','Leave blank is the site keyword + site name of the composition','1','4','5','0','en');
INSERT INTO met_language VALUES('4682','setseoKey','Website keywords','1','2','5','0','en');
INSERT INTO met_language VALUES('4683','setseohomeKey','Home title (title)','1','3','5','0','en');
INSERT INTO met_language VALUES('4684','optimizationpromotion','Optimize promotion','1','5','0','0','en');
INSERT INTO met_language VALUES('4685','setseoTip1','Multiple keywords should be separated by \"|\" or \",\".','1','1','5','0','en');
INSERT INTO met_language VALUES('4686','setheadstat','Top code','1','176','4','0','en');
INSERT INTO met_language VALUES('4687','eidtfed','View feedback','1','129','4','0','en');
INSERT INTO met_language VALUES('4688','recycledelall','Delete all','1','124','4','0','en');
INSERT INTO met_language VALUES('4689','recycleno','Did not open the recycle bin','1','125','4','0','en');
INSERT INTO met_language VALUES('4690','subpart','Lower column','1','127','4','0','en');
INSERT INTO met_language VALUES('4691','eidtmsg','View Message','1','128','4','0','en');
INSERT INTO met_language VALUES('4692','recyclereall','Restore all','1','123','4','0','en');
INSERT INTO met_language VALUES('4693','recycledownload','Download module','1','119','4','0','en');
INSERT INTO met_language VALUES('4694','recycleimg','Picture module','1','120','4','0','en');
INSERT INTO met_language VALUES('4695','recycledietime','Delete the time','1','121','4','0','en');
INSERT INTO met_language VALUES('4696','recyclere','reduction','1','122','4','0','en');
INSERT INTO met_language VALUES('4697','recyclenew','News module','1','117','4','0','en');
INSERT INTO met_language VALUES('4698','recycleproduct','Product module','1','118','4','0','en');
INSERT INTO met_language VALUES('4699','recycletype','Module type','1','116','4','0','en');
INSERT INTO met_language VALUES('4700','recycleall','All modules','1','115','4','0','en');
INSERT INTO met_language VALUES('4701','recycleexplain1','Only support for (news, product, download, picture) module content.','1','114','4','0','en');
INSERT INTO met_language VALUES('4702','messageeditor','Edit message','1','113','4','0','en');
INSERT INTO met_language VALUES('4703','messagesubmit','Message submitted to open and close','1','112','4','0','en');
INSERT INTO met_language VALUES('4704','messageeditorContent','Message content','1','108','4','0','en');
INSERT INTO met_language VALUES('4705','messageeditorReply','Respond to voicemail','1','109','4','0','en');
INSERT INTO met_language VALUES('4706','messageeditorCheck','Reply to the audit','1','110','4','0','en');
INSERT INTO met_language VALUES('4707','messageeditorShow','Approved and shown in the foreground','1','111','4','0','en');
INSERT INTO met_language VALUES('4708','messageTime','Submit time','1','106','4','0','en');
INSERT INTO met_language VALUES('4709','messageeditorContact','other ways of contact','1','107','4','0','en');
INSERT INTO met_language VALUES('4710','messageID','Message status','1','105','4','0','en');
INSERT INTO met_language VALUES('4711','messageReply','Audit','1','104','4','0','en');
INSERT INTO met_language VALUES('4712','messageClass5','Reviewed information','1','102','4','0','en');
INSERT INTO met_language VALUES('4713','messageTel','phone','1','103','4','0','en');
INSERT INTO met_language VALUES('4714','messageClass3','Replied message','1','100','4','0','en');
INSERT INTO met_language VALUES('4715','messageClass4','Unaudited information','1','101','4','0','en');
INSERT INTO met_language VALUES('4716','messageClass2','No reply message','1','99','4','0','en');
INSERT INTO met_language VALUES('4717','messageClass1','All information','1','98','4','0','en');
INSERT INTO met_language VALUES('4718','messageClass','Message classification','1','97','4','0','en');
INSERT INTO met_language VALUES('4719','messageTitle','Message management','1','96','4','0','en');
INSERT INTO met_language VALUES('4720','messageVoice','Message form settings','1','443','4','0','en');
INSERT INTO met_language VALUES('4721','messageincTip4','Whether the customer message automatically to the specified mailbox','1','95','4','0','en');
INSERT INTO met_language VALUES('4722','messageincSend','Whether to send mail','1','94','4','0','en');
INSERT INTO met_language VALUES('4723','messageincTip3','Customer message needs to be back in the background audit before the show','1','93','4','0','en');
INSERT INTO met_language VALUES('4724','messageincShow','Display method','1','92','4','0','en');
INSERT INTO met_language VALUES('4725','feedbackauto','Mail reply settings','1','90','4','0','en');
INSERT INTO met_language VALUES('4726','messageincTitle','Message system settings','1','91','4','0','en');
INSERT INTO met_language VALUES('4727','feedbackexplain1','Page title name, the default is the name of the section','1','89','4','0','en');
INSERT INTO met_language VALUES('4728','feedbacksubmit','Feedback submitted to open and close','1','88','4','0','en');
INSERT INTO met_language VALUES('4729','feedbackview','View feedback','1','87','4','0','en');
INSERT INTO met_language VALUES('4730','fdeditorFrom','Source page address','1','85','4','0','en');
INSERT INTO met_language VALUES('4731','fdeditorRecord','Edit records','1','86','4','0','en');
INSERT INTO met_language VALUES('4732','fdeditorInterest','Product of interest','1','83','4','0','en');
INSERT INTO met_language VALUES('4733','fdeditorTime','Feedback submission time','1','84','4','0','en');
INSERT INTO met_language VALUES('4734','feedbackAccess0','Tourists','1','82','4','0','en');
INSERT INTO met_language VALUES('4735','feedbackTip4','Export all','1','80','4','0','en');
INSERT INTO met_language VALUES('4736','feedbackExport','Export','1','81','4','0','en');
INSERT INTO met_language VALUES('4737','feedbackTip2','Export EXCEL table','1','79','4','0','en');
INSERT INTO met_language VALUES('4738','feedbackTime','Submit time','1','78','4','0','en');
INSERT INTO met_language VALUES('4739','feedbackID','Feedback status','1','77','4','0','en');
INSERT INTO met_language VALUES('4740','feedbackShowAll','view all','1','76','4','0','en');
INSERT INTO met_language VALUES('4741','feedbackClass2','Unread message','1','74','4','0','en');
INSERT INTO met_language VALUES('4742','feedbackClass3','Read the information','1','75','4','0','en');
INSERT INTO met_language VALUES('4743','feedbackClass1','All information','1','73','4','0','en');
INSERT INTO met_language VALUES('4744','feedbackClass','Information status','1','71','4','0','en');
INSERT INTO met_language VALUES('4745','feedbackClasp','Information category','1','72','4','0','en');
INSERT INTO met_language VALUES('4746','fdincFeedbackTitle','Reply mail title','1','68','4','0','en');
INSERT INTO met_language VALUES('4747','fdincAutoFbTitle','Auto reply email title','1','69','4','0','en');
INSERT INTO met_language VALUES('4748','fdincAutoContent','Reply mail content','1','70','4','0','en');
INSERT INTO met_language VALUES('4749','fdincEmailName','Email field name','1','66','4','0','en');
INSERT INTO met_language VALUES('4750','fdincTip11','Used to retrieve the user\'s email address, in order to reply to the mail. Field type must be \"short\"','1','67','4','0','en');
INSERT INTO met_language VALUES('4751','fdincTip10','Check to automatically reply to the user submitting the form','1','65','4','0','en');
INSERT INTO met_language VALUES('4752','fdincAuto','Mail reply','1','64','4','0','en');
INSERT INTO met_language VALUES('4753','fdincTip9','Multiple emails should be separated by |','1','63','4','0','en');
INSERT INTO met_language VALUES('4754','fdincAcceptMail','Feedback mail receiving mailbox','1','62','4','0','en');
INSERT INTO met_language VALUES('4755','fdincTip7','Only background read','1','60','4','0','en');
INSERT INTO met_language VALUES('4756','fdincTip8','Send mail and write data','1','61','4','0','en');
INSERT INTO met_language VALUES('4757','fdincAccept','Only mail received','1','59','4','0','en');
INSERT INTO met_language VALUES('4758','fdincTip6','It is used to get the type of user feedback. The type of the field must be \"pull-down\". When set as the associated product, the pull-down menu is all the products under the corresponding column.','1','57','4','0','en');
INSERT INTO met_language VALUES('4759','fdincAcceptType','Information reception method','1','58','4','0','en');
INSERT INTO met_language VALUES('4760','fdincClassName','Information Category field name','1','56','4','0','en');
INSERT INTO met_language VALUES('4761','fdincTip5','Please use | to separate multiple characters','1','55','4','0','en');
INSERT INTO met_language VALUES('4762','fdincSlash','Sensitive character filtering','1','54','4','0','en');
INSERT INTO met_language VALUES('4763','fdincTip4','Second, the same IP2 times to submit the minimum interval','1','53','4','0','en');
INSERT INTO met_language VALUES('4764','fdincName','Feedback form name','1','51','4','0','en');
INSERT INTO met_language VALUES('4765','fdincTime','Anti-refresh time','1','52','4','0','en');
INSERT INTO met_language VALUES('4766','jobsetname','Please select the field name','1','49','4','0','en');
INSERT INTO met_language VALUES('4767','fdincTitle','Feedback system settings','1','50','4','0','en');
INSERT INTO met_language VALUES('4768','jobmanagement','Recruitment management','1','48','4','0','en');
INSERT INTO met_language VALUES('4769','jobtip9','Resume photo, so that you can see in the mail candidates upload photos.','1','47','4','0','en');
INSERT INTO met_language VALUES('4770','jobtip8','Image field name','1','46','4','0','en');
INSERT INTO met_language VALUES('4771','jobtip5','After the delivery resume, the system will automatically send an e-mail to receive mail','1','45','4','0','en');
INSERT INTO met_language VALUES('4772','cvset','Resume form settings','1','44','4','0','en');
INSERT INTO met_language VALUES('4773','cvmanagement','Resume information management','1','43','4','0','en');
INSERT INTO met_language VALUES('4774','cvemail','Resume to accept the mailbox','1','42','4','0','en');
INSERT INTO met_language VALUES('4775','cvwd','unread','1','41','4','0','en');
INSERT INTO met_language VALUES('4776','cvyd','Have read','1','40','4','0','en');
INSERT INTO met_language VALUES('4777','cvall','All','1','39','4','0','en');
INSERT INTO met_language VALUES('4778','cvsha','filter','1','38','4','0','en');
INSERT INTO met_language VALUES('4779','cvincAcceptType','Resume reception method','1','37','4','0','en');
INSERT INTO met_language VALUES('4780','cvincAcceptMail','Resume to receive mail','1','36','4','0','en');
INSERT INTO met_language VALUES('4781','cvincTip5','If set as a separate job, it will be sent to the email address set for each job','1','35','4','0','en');
INSERT INTO met_language VALUES('4782','cvincTip4','Individual position','1','34','4','0','en');
INSERT INTO met_language VALUES('4783','cvincTip3','Uniform setting','1','33','4','0','en');
INSERT INTO met_language VALUES('4784','cvincTip2','Mail reception method','1','32','4','0','en');
INSERT INTO met_language VALUES('4785','josAlways','Not limited to','1','31','4','0','en');
INSERT INTO met_language VALUES('4786','cveditorTitle','View your resume','1','30','4','0','en');
INSERT INTO met_language VALUES('4787','cvTip4','Job has been deleted','1','29','4','0','en');
INSERT INTO met_language VALUES('4788','cvAddtime','Submit time','1','28','4','0','en');
INSERT INTO met_language VALUES('4789','cvName','Candidate status','1','27','4','0','en');
INSERT INTO met_language VALUES('4790','cvPosition','apply for job','1','26','4','0','en');
INSERT INTO met_language VALUES('4791','jobtip3','Day (not limited to)','1','25','4','0','en');
INSERT INTO met_language VALUES('4792','jobnow','Today is','1','23','4','0','en');
INSERT INTO met_language VALUES('4793','jobtip2','Be careful not to change the format.','1','24','4','0','en');
INSERT INTO met_language VALUES('4794','jobdeal','Wages','1','22','4','0','en');
INSERT INTO met_language VALUES('4795','jobCV','resume','1','20','4','0','en');
INSERT INTO met_language VALUES('4796','jobtip1','Person (not limited to)','1','21','4','0','en');
INSERT INTO met_language VALUES('4797','jobpublish','Release date','1','19','4','0','en');
INSERT INTO met_language VALUES('4798','joblife','Effective time','1','18','4','0','en');
INSERT INTO met_language VALUES('4799','jobnum','Number of recruits','1','16','4','0','en');
INSERT INTO met_language VALUES('4800','jobaddress','work place','1','17','4','0','en');
INSERT INTO met_language VALUES('4801','jobposition','Jobs','1','15','4','0','en');
INSERT INTO met_language VALUES('4802','setotherTip2','This field is not enabled','1','14','4','0','en');
INSERT INTO met_language VALUES('4803','setotherTip1','Please follow the instructions in \'Template Configuration Navigation\'. For example, if you enable the static page, you need to generate all the static pages after the modification.','1','13','4','0','en');
INSERT INTO met_language VALUES('4804','setotherItemSet','Other content configuration','1','12','4','0','en');
INSERT INTO met_language VALUES('4805','setfootstat','Bottom code','1','11','4','0','en');
INSERT INTO met_language VALUES('4806','setfootOther','other information','1','10','4','0','en');
INSERT INTO met_language VALUES('4807','setfootAddressCode','Address Postcode','1','8','4','0','en');
INSERT INTO met_language VALUES('4808','setfootVersion','Copyright Information','1','7','4','0','en');
INSERT INTO met_language VALUES('4809','article6','parameter settings','1','6','4','0','en');
INSERT INTO met_language VALUES('4810','article5','After copying or moving, please manually generate the corresponding columns and content static pages','1','5','4','0','en');
INSERT INTO met_language VALUES('4811','article2','Picture (need template support)','1','2','4','0','en');
INSERT INTO met_language VALUES('4812','article3','wap display','1','3','4','0','en');
INSERT INTO met_language VALUES('4813','article4','Sort the larger the value of the more front','1','4','4','0','en');
INSERT INTO met_language VALUES('4814','contentmanagement','Content management','1','4','0','0','en');
INSERT INTO met_language VALUES('4815','article1','Optional attributes','1','1','4','0','en');
INSERT INTO met_language VALUES('4816','mod8content','View feedback','1','152','3','0','en');
INSERT INTO met_language VALUES('4817','mod7content','View Message','1','151','3','0','en');
INSERT INTO met_language VALUES('4818','mod6content','View your resume','1','150','3','0','en');
INSERT INTO met_language VALUES('4819','mod4content','Manage downloads','1','148','3','0','en');
INSERT INTO met_language VALUES('4820','mod5content','Manage pictures','1','149','3','0','en');
INSERT INTO met_language VALUES('4821','mod3content','Manage products','1','147','3','0','en');
INSERT INTO met_language VALUES('4822','mod6add','Post a job','1','144','3','0','en');
INSERT INTO met_language VALUES('4823','mod1content','Management Profile','1','145','3','0','en');
INSERT INTO met_language VALUES('4824','mod2content','Manage articles','1','146','3','0','en');
INSERT INTO met_language VALUES('4825','mod4add','Add download','1','142','3','0','en');
INSERT INTO met_language VALUES('4826','mod5add','add pictures','1','143','3','0','en');
INSERT INTO met_language VALUES('4827','mod3add','Add product','1','141','3','0','en');
INSERT INTO met_language VALUES('4828','mod2add','Add an article','1','140','3','0','en');
INSERT INTO met_language VALUES('4829','copyotherlang5','Level 2 and Level 3 can not be copied separately, please copy together with a level or upgrade to a level','1','139','3','0','en');
INSERT INTO met_language VALUES('4830','copyotherlang4','The column already exists in the copy language, please copy the content directly','1','138','3','0','en');
INSERT INTO met_language VALUES('4831','copyotherlang2','Copy content','1','136','3','0','en');
INSERT INTO met_language VALUES('4832','copyotherlang3','Please choose the language!','1','137','3','0','en');
INSERT INTO met_language VALUES('4833','ctitleinfo','Is used to set the SEO parameters set in the title structure','1','134','3','0','en');
INSERT INTO met_language VALUES('4834','copyotherlang1','Copy to other languages','1','135','3','0','en');
INSERT INTO met_language VALUES('4835','listproductre','related products','1','132','3','0','en');
INSERT INTO met_language VALUES('4836','listproductreok','Not related','1','133','3','0','en');
INSERT INTO met_language VALUES('4837','parameter3','text','1','123','3','0','en');
INSERT INTO met_language VALUES('4838','parameter4','Multiple choice','1','124','3','0','en');
INSERT INTO met_language VALUES('4839','parameter5','annex','1','125','3','0','en');
INSERT INTO met_language VALUES('4840','parameter6','Radio','1','126','3','0','en');
INSERT INTO met_language VALUES('4841','allcategory','All sections','1','127','3','0','en');
INSERT INTO met_language VALUES('4842','parameterMust','Required?','1','128','3','0','en');
INSERT INTO met_language VALUES('4843','parameternameexist','Menu name already exists','1','129','3','0','en');
INSERT INTO met_language VALUES('4844','listTitle','Setting Options','1','130','3','0','en');
INSERT INTO met_language VALUES('4845','listAddList','Add new options','1','131','3','0','en');
INSERT INTO met_language VALUES('4846','parameter1','short','1','121','3','0','en');
INSERT INTO met_language VALUES('4847','parameter2','drop down','1','122','3','0','en');
INSERT INTO met_language VALUES('4848','parameteradd','Add a new field','1','120','3','0','en');
INSERT INTO met_language VALUES('4849','parametertype','Field Type','1','119','3','0','en');
INSERT INTO met_language VALUES('4850','columnmtitle','Page Title','1','118','3','0','en');
INSERT INTO met_language VALUES('4851','columnmfeedback3','Click to start copying','1','111','3','0','en');
INSERT INTO met_language VALUES('4852','columnmfeedback4','Start copying','1','112','3','0','en');
INSERT INTO met_language VALUES('4853','columnmfeedback5','Customize the form settings','1','113','3','0','en');
INSERT INTO met_language VALUES('4854','columnmfeedback6','Custom feedback form','1','114','3','0','en');
INSERT INTO met_language VALUES('4855','columnmfeedback7','Set feedback form','1','115','3','0','en');
INSERT INTO met_language VALUES('4856','columnmappend','Additional content:','1','116','3','0','en');
INSERT INTO met_language VALUES('4857','columnmore','More','1','117','3','0','en');
INSERT INTO met_language VALUES('4858','columnmfeedback2','Please select the form','1','110','3','0','en');
INSERT INTO met_language VALUES('4859','columnmfeedback1','Copy the form','1','109','3','0','en');
INSERT INTO met_language VALUES('4860','columnmwap','wap display','1','107','3','0','en');
INSERT INTO met_language VALUES('4861','columnmfeedback','Feedback form settings','1','108','3','0','en');
INSERT INTO met_language VALUES('4862','columnmnotallow','Not allowed','1','105','3','0','en');
INSERT INTO met_language VALUES('4863','columnmlink','Friend Link Application:','1','106','3','0','en');
INSERT INTO met_language VALUES('4864','columnmeditor','Edit section','1','103','3','0','en');
INSERT INTO met_language VALUES('4865','columnmallow','allow','1','104','3','0','en');
INSERT INTO met_language VALUES('4866','columnmove4','Lifted to the top column','1','101','3','0','en');
INSERT INTO met_language VALUES('4867','columnmove5','New folder name','1','102','3','0','en');
INSERT INTO met_language VALUES('4868','columnmove2','to','1','99','3','0','en');
INSERT INTO met_language VALUES('4869','columnmove3','Mobile, subordinate column more than 1 and subordinate column related columns can not move','1','100','3','0','en');
INSERT INTO met_language VALUES('4870','columnmove','Move column','1','97','3','0','en');
INSERT INTO met_language VALUES('4871','columnmove1','mobile','1','98','3','0','en');
INSERT INTO met_language VALUES('4872','columnexplain8','Additional content is displayed at the end of all content pages under this section, describing the same content.','1','96','3','0','en');
INSERT INTO met_language VALUES('4873','columnexplain6','The selected form options and form settings will be copied','1','94','3','0','en');
INSERT INTO met_language VALUES('4874','columnexplain7','This feature is compatible with the old version (the role of the column in the foreground corresponding display)','1','95','3','0','en');
INSERT INTO met_language VALUES('4875','columnexplain4','Set whether the section link opens in a new window','1','92','3','0','en');
INSERT INTO met_language VALUES('4876','columnexplain5','Guest can not submit friendship link after application','1','93','3','0','en');
INSERT INTO met_language VALUES('4877','columnexplain2','After setting the options, you can directly select the corresponding option in content management.','1','90','3','0','en');
INSERT INTO met_language VALUES('4878','columnexplain3','The parameters are generally used to display information attributes, such as price, model, etc., after setting, you can fill in the corresponding parameter values ??when adding content.','1','91','3','0','en');
INSERT INTO met_language VALUES('4879','columnexplain1','After the association, the following options will display the product name under the corresponding product section','1','89','3','0','en');
INSERT INTO met_language VALUES('4880','columnerr8','Columns set to disallow content additions must have child columns','1','88','3','0','en');
INSERT INTO met_language VALUES('4881','columnerr7','Promoted to a column','1','87','3','0','en');
INSERT INTO met_language VALUES('4882','columnerr6','This operation will be combined column, you confirm that you want to move the column?','1','86','3','0','en');
INSERT INTO met_language VALUES('4883','columnerr3','There can be only one per language website','1','83','3','0','en');
INSERT INTO met_language VALUES('4884','columnerr4','The directory name already exists and may already be used','1','84','3','0','en');
INSERT INTO met_language VALUES('4885','columnerr5','Are you sure you want to move this section?','1','85','3','0','en');
INSERT INTO met_language VALUES('4886','columnerr2','Directory name can not be renamed','1','82','3','0','en');
INSERT INTO met_language VALUES('4887','columnerr1','Directory name can only be numbers or letters','1','81','3','0','en');
INSERT INTO met_language VALUES('4888','columntip14','Is the use of static pages set to set the URL of the way, do not add html suffix, does not support special characters','1','80','3','0','en');
INSERT INTO met_language VALUES('4889','columntip13','Failed to copy the feedback system configuration file, please check whether the file exists!','1','79','3','0','en');
INSERT INTO met_language VALUES('4890','columntip12','Hide all sub-sections','1','78','3','0','en');
INSERT INTO met_language VALUES('4891','columntip11','Expand all sub-sections','1','77','3','0','en');
INSERT INTO met_language VALUES('4892','columnImg2','Column picture','1','74','3','0','en');
INSERT INTO met_language VALUES('4893','columnshow','Add content','1','75','3','0','en');
INSERT INTO met_language VALUES('4894','columntip8','Set to not allow the column link will jump to the first sub-column','1','76','3','0','en');
INSERT INTO met_language VALUES('4895','columnhref','link address','1','71','3','0','en');
INSERT INTO met_language VALUES('4896','columntip7','Links to external websites need to add http or https, such as: https://www.metinfo.cn/','1','72','3','0','en');
INSERT INTO met_language VALUES('4897','columnImg1','Logo picture','1','73','3','0','en');
INSERT INTO met_language VALUES('4898','columnSEO','Search engine optimization settings (seo)','1','70','3','0','en');
INSERT INTO met_language VALUES('4899','columnhtmlname','Static page name','1','69','3','0','en');
INSERT INTO met_language VALUES('4900','columnaddOrder','order','1','68','3','0','en');
INSERT INTO met_language VALUES('4901','columnReverseSort','Reverse order','1','67','3','0','en');
INSERT INTO met_language VALUES('4902','columncontentorder','List page Sort by','1','66','3','0','en');
INSERT INTO met_language VALUES('4903','columnOutLink','http: //','1','65','3','0','en');
INSERT INTO met_language VALUES('4904','columnnav4','Show','1','63','3','0','en');
INSERT INTO met_language VALUES('4905','columnnewwindow','open in a new window','1','64','3','0','en');
INSERT INTO met_language VALUES('4906','columnnav3','Tail navigation bar','1','62','3','0','en');
INSERT INTO met_language VALUES('4907','columnnav2','Head main navigation bar','1','61','3','0','en');
INSERT INTO met_language VALUES('4908','columntip1','Please refer to','1','59','3','0','en');
INSERT INTO met_language VALUES('4909','columnnav1','Do not show','1','60','3','0','en');
INSERT INTO met_language VALUES('4910','columnmark1','Logo','1','52','3','0','en');
INSERT INTO met_language VALUES('4911','columnctitle','Column title (title)','1','53','3','0','en');
INSERT INTO met_language VALUES('4912','columnPreName','The name of the upper column','1','54','3','0','en');
INSERT INTO met_language VALUES('4913','columnorder','Sort at the same level','1','55','3','0','en');
INSERT INTO met_language VALUES('4914','columnmark','Column ID','1','56','3','0','en');
INSERT INTO met_language VALUES('4915','columnnew2','Add sub-sections','1','57','3','0','en');
INSERT INTO met_language VALUES('4916','columnnew3','Add three columns','1','58','3','0','en');
INSERT INTO met_language VALUES('4917','columndocument','Directory name','1','51','3','0','en');
INSERT INTO met_language VALUES('4918','columnmodule','Own module','1','50','3','0','en');
INSERT INTO met_language VALUES('4919','columnnav','Navigation bar is displayed','1','49','3','0','en');
INSERT INTO met_language VALUES('4920','columnnamemarkinfo','Other settings (set according to the template configuration instructions)','1','48','3','0','en');
INSERT INTO met_language VALUES('4921','columnnamemark','Column modification name','1','47','3','0','en');
INSERT INTO met_language VALUES('4922','contentinfo4','Expand content four','1','45','3','0','en');
INSERT INTO met_language VALUES('4923','columnname','program name','1','46','3','0','en');
INSERT INTO met_language VALUES('4924','contentinfo3','Expand content three','1','44','3','0','en');
INSERT INTO met_language VALUES('4925','contentinfo1','Expand content one','1','42','3','0','en');
INSERT INTO met_language VALUES('4926','contentinfo2','Expand content two','1','43','3','0','en');
INSERT INTO met_language VALUES('4927','contentinfo','details','1','41','3','0','en');
INSERT INTO met_language VALUES('4928','category','Belongs to the column','1','40','3','0','en');
INSERT INTO met_language VALUES('4929','editinfo','Modify content','1','39','3','0','en');
INSERT INTO met_language VALUES('4930','addinfo','Add content','1','38','3','0','en');
INSERT INTO met_language VALUES('4931','downloadsize','File size','1','37','3','0','en');
INSERT INTO met_language VALUES('4932','modsearch','Please enter the information title keyword','1','33','3','0','en');
INSERT INTO met_language VALUES('4933','downloadurl','download link','1','36','3','0','en');
INSERT INTO met_language VALUES('4934','downloadaccess','Front desk download permissions','1','35','3','0','en');
INSERT INTO met_language VALUES('4935','modnull','Leave blank','1','34','3','0','en');
INSERT INTO met_language VALUES('4936','modtimenow1','Be careful not to change the format.','1','32','3','0','en');
INSERT INTO met_language VALUES('4937','modtimenow','The current time is:','1','31','3','0','en');
INSERT INTO met_language VALUES('4938','modhits','The more clicks, the more popular the top rankings','1','30','3','0','en');
INSERT INTO met_language VALUES('4939','modpublish','publisher','1','29','3','0','en');
INSERT INTO met_language VALUES('4940','modimgurls','Thumbnail','1','28','3','0','en');
INSERT INTO met_language VALUES('4941','modimgauto','Automatically generate thumbnails','1','27','3','0','en');
INSERT INTO met_language VALUES('4942','modimgurl','The map\'s address','1','26','3','0','en');
INSERT INTO met_language VALUES('4943','modmodulewyok','This module has already been used','1','24','3','0','en');
INSERT INTO met_language VALUES('4944','modFilenameok','Static page name already exists','1','23','3','0','en');
INSERT INTO met_language VALUES('4945','modFiledir','Failed to create folder','1','22','3','0','en');
INSERT INTO met_language VALUES('4946','modClass3','Three columns','1','21','3','0','en');
INSERT INTO met_language VALUES('4947','modClass2','Second column','1','20','3','0','en');
INSERT INTO met_language VALUES('4948','modClass1','A column','1','19','3','0','en');
INSERT INTO met_language VALUES('4949','modOuturl','Link address can not be empty','1','18','3','0','en');
INSERT INTO met_language VALUES('4950','modModule','Column belongs to the module can not be empty','1','17','3','0','en');
INSERT INTO met_language VALUES('4951','modFoldername','Column folder can not be empty','1','16','3','0','en');
INSERT INTO met_language VALUES('4952','mod101','Picture list','1','15','3','0','en');
INSERT INTO met_language VALUES('4953','mod7','Message system','1','8','3','0','en');
INSERT INTO met_language VALUES('4954','mod8','Feedback system','1','9','3','0','en');
INSERT INTO met_language VALUES('4955','mod9','Links','1','10','3','0','en');
INSERT INTO met_language VALUES('4956','mod10','Member Centre','1','11','3','0','en');
INSERT INTO met_language VALUES('4957','mod11','Site Search','1','12','3','0','en');
INSERT INTO met_language VALUES('4958','mod12','Sitemap','1','13','3','0','en');
INSERT INTO met_language VALUES('4959','mod100','Product List','1','14','3','0','en');
INSERT INTO met_language VALUES('4960','unitytxt_76','Thumbnail size setting','1','440','8','0','en');
INSERT INTO met_language VALUES('4961','unitytxt_77','Update content automatically update the site map','1','441','8','0','en');
INSERT INTO met_language VALUES('4962','unitytxt_75','Template set','1','439','8','0','en');
INSERT INTO met_language VALUES('4963','mod6','Recruitment module','1','7','3','0','en');
INSERT INTO met_language VALUES('4964','mod3','Product module','1','4','3','0','en');
INSERT INTO met_language VALUES('4965','mod4','Download module','1','5','3','0','en');
INSERT INTO met_language VALUES('4966','mod5','Picture module','1','6','3','0','en');
INSERT INTO met_language VALUES('4967','mod2','Article module','1','3','3','0','en');
INSERT INTO met_language VALUES('4968','mod1','Profile module','1','2','3','0','en');
INSERT INTO met_language VALUES('4969','modout','External module','1','1','3','0','en');
INSERT INTO met_language VALUES('4970','tmptips','Template configuration instructions','1','128','2','0','en');
INSERT INTO met_language VALUES('4971','columnconfiguration','Column configuration','1','3','0','0','en');
INSERT INTO met_language VALUES('4972','skinerr3','please choose','1','127','2','0','en');
INSERT INTO met_language VALUES('4973','onlineskype','SKYPE','1','124','2','0','en');
INSERT INTO met_language VALUES('4974','skinerr1','If there is only one display picture, the setting style will not take effect','1','125','2','0','en');
INSERT INTO met_language VALUES('4975','skinerr2','More templates','1','126','2','0','en');
INSERT INTO met_language VALUES('4976','onliemsn','MSN','1','123','2','0','en');
INSERT INTO met_language VALUES('4977','onlieqq','QQ','1','122','2','0','en');
INSERT INTO met_language VALUES('4978','indexonlieno','cancel','1','121','2','0','en');
INSERT INTO met_language VALUES('4979','indexonlieok','confirm','1','120','2','0','en');
INSERT INTO met_language VALUES('4980','indexonlieimg','Choose a picture style','1','119','2','0','en');
INSERT INTO met_language VALUES('4981','onlinetel1','Support HTML language, can join the third party code','1','117','2','0','en');
INSERT INTO met_language VALUES('4982','indexonlieicon','Change icon','1','118','2','0','en');
INSERT INTO met_language VALUES('4983','onlinetel','Phone or other instructions','1','116','2','0','en');
INSERT INTO met_language VALUES('4984','onlineskin','style','1','114','2','0','en');
INSERT INTO met_language VALUES('4985','onlineimg','icon','1','115','2','0','en');
INSERT INTO met_language VALUES('4986','onlineskintype','Color style','1','113','2','0','en');
INSERT INTO met_language VALUES('4987','onlinegray','gray','1','112','2','0','en');
INSERT INTO met_language VALUES('4988','onlinegreen','green','1','111','2','0','en');
INSERT INTO met_language VALUES('4989','onlinered','Pink','1','109','2','0','en');
INSERT INTO met_language VALUES('4990','onlinepurple','purple','1','110','2','0','en');
INSERT INTO met_language VALUES('4991','onlineblue','Light blue','1','108','2','0','en');
INSERT INTO met_language VALUES('4992','onlinealibaba','Ali Want','1','107','2','0','en');
INSERT INTO met_language VALUES('4993','onlinetaobao','Taobao Want','1','106','2','0','en');
INSERT INTO met_language VALUES('4994','onlineName','Customer service name','1','105','2','0','en');
INSERT INTO met_language VALUES('4995','onlineAdd','Add new customer service','1','104','2','0','en');
INSERT INTO met_language VALUES('4996','onlineTitle','Customer list','1','103','2','0','en');
INSERT INTO met_language VALUES('4997','setskinOnline8','Right when rolling position','1','101','2','0','en');
INSERT INTO met_language VALUES('4998','setskinOnline9','Fixed to the right of the page','1','102','2','0','en');
INSERT INTO met_language VALUES('4999','setskinOnline7','Right from the browser','1','100','2','0','en');
INSERT INTO met_language VALUES('5000','setskinOnline4','Home left scroll position','1','97','2','0','en');
INSERT INTO met_language VALUES('5001','setskinOnline5','Distance to the left of the browser','1','98','2','0','en');
INSERT INTO met_language VALUES('5002','setskinOnline6','From the top of the browser','1','99','2','0','en');
INSERT INTO met_language VALUES('5003','setskinOnline3','Right with the screen scroll','1','96','2','0','en');
INSERT INTO met_language VALUES('5004','indexflashaddflash','Add Banner','1','92','2','0','en');
INSERT INTO met_language VALUES('5005','setskinOnline','Online communication','1','93','2','0','en');
INSERT INTO met_language VALUES('5006','setskinOnline1','Pinned to the left of the page','1','94','2','0','en');
INSERT INTO met_language VALUES('5007','setskinOnline2','Home left scroll with the screen','1','95','2','0','en');
INSERT INTO met_language VALUES('5008','indexflashaddimg','add pictures','1','91','2','0','en');
INSERT INTO met_language VALUES('5009','indexflashexplain9','Please add http: //','1','90','2','0','en');
INSERT INTO met_language VALUES('5010','indexflashexplain7','Banner mode corresponding to the column','1','89','2','0','en');
INSERT INTO met_language VALUES('5011','indexflashexplain6','Temporarily did not set Banner section, please set and then edit.','1','88','2','0','en');
INSERT INTO met_language VALUES('5012','indexflashexplain5','Generally do not have to set','1','87','2','0','en');
INSERT INTO met_language VALUES('5013','indexflashexplain3','Banner size corresponding to the column','1','85','2','0','en');
INSERT INTO met_language VALUES('5014','indexflashexplain4','PNG pictures 1 and 3 of the image carousel mode are not supported','1','86','2','0','en');
INSERT INTO met_language VALUES('5015','indexflashexplain2','Jump to Banner Settings','1','84','2','0','en');
INSERT INTO met_language VALUES('5016','indexflashexplain1','Banner generally located under the site navigation, you can display a different Banner in each column, you can also set the same','1','83','2','0','en');
INSERT INTO met_language VALUES('5017','flashmodify1','In the amendment','1','82','2','0','en');
INSERT INTO met_language VALUES('5018','flashmodify','please at','1','81','2','0','en');
INSERT INTO met_language VALUES('5019','flashGlobal','default setting','1','80','2','0','en');
INSERT INTO met_language VALUES('5020','flashMode2','Flash animation','1','77','2','0','en');
INSERT INTO met_language VALUES('5021','flashMode3','All pictures','1','78','2','0','en');
INSERT INTO met_language VALUES('5022','flashHome','Home page','1','79','2','0','en');
INSERT INTO met_language VALUES('5023','flashMode','Display mode','1','75','2','0','en');
INSERT INTO met_language VALUES('5024','flashMode1','Image Carousel','1','76','2','0','en');
INSERT INTO met_language VALUES('5025','setflashcolumn','Application section','1','74','2','0','en');
INSERT INTO met_language VALUES('5026','setflashimgtext','style','1','73','2','0','en');
INSERT INTO met_language VALUES('5027','setflashimg','Picture carousel style','1','72','2','0','en');
INSERT INTO met_language VALUES('5028','setflashset','FLASH configuration','1','71','2','0','en');
INSERT INTO met_language VALUES('5029','setflashImgHref','link address','1','68','2','0','en');
INSERT INTO met_language VALUES('5030','setflashUrl','Picture / flash address','1','69','2','0','en');
INSERT INTO met_language VALUES('5031','setflashBg','Flash background','1','70','2','0','en');
INSERT INTO met_language VALUES('5032','setflashHeight','high','1','66','2','0','en');
INSERT INTO met_language VALUES('5033','setflashImgUrl','The map\'s address','1','67','2','0','en');
INSERT INTO met_language VALUES('5034','setflashPixel','Pixel','1','65','2','0','en');
INSERT INTO met_language VALUES('5035','setflashWidth','width','1','64','2','0','en');
INSERT INTO met_language VALUES('5036','setflashSize','Banner size','1','63','2','0','en');
INSERT INTO met_language VALUES('5037','indexsetskin','Home style','1','59','2','0','en');
INSERT INTO met_language VALUES('5038','setflashBelong','Belongs to the column','1','60','2','0','en');
INSERT INTO met_language VALUES('5039','setflashName','Picture title','1','61','2','0','en');
INSERT INTO met_language VALUES('5040','setflashMode3','Single picture','1','62','2','0','en');
INSERT INTO met_language VALUES('5041','indexsetImgLink','Picture link shows the number','1','56','2','0','en');
INSERT INTO met_language VALUES('5042','indexsetIntroduce','Home introduction content','1','58','2','0','en');
INSERT INTO met_language VALUES('5043','indexsetWordLink','Text link shows the number','1','57','2','0','en');
INSERT INTO met_language VALUES('5044','indexsetFriendly','Links','1','55','2','0','en');
INSERT INTO met_language VALUES('5045','printpage','print this page','1','52','2','0','en');
INSERT INTO met_language VALUES('5046','closebutton','Close button','1','53','2','0','en');
INSERT INTO met_language VALUES('5047','indexsetnum','Display number','1','54','2','0','en');
INSERT INTO met_language VALUES('5048','skinunder','under','1','51','2','0','en');
INSERT INTO met_language VALUES('5049','skinindexno','hide','1','49','2','0','en');
INSERT INTO met_language VALUES('5050','skinindexexplain1','Users who upgraded from version 4.0 to 5.0 are set as hidden. If any redundant vertical line appears at the corresponding position in the foreground, please go to the official website and download the corresponding template again.','1','50','2','0','en');
INSERT INTO met_language VALUES('5051','skinindexok','display','1','48','2','0','en');
INSERT INTO met_language VALUES('5052','skinindex','Set as home page and collection site','1','47','2','0','en');
INSERT INTO met_language VALUES('5053','skinsetup','Template set','1','46','2','0','en');
INSERT INTO met_language VALUES('5054','skinnumber','Numbering','1','45','2','0','en');
INSERT INTO met_language VALUES('5055','skinstyle','style','1','43','2','0','en');
INSERT INTO met_language VALUES('5056','skindescription','description','1','44','2','0','en');
INSERT INTO met_language VALUES('5057','skinusenow','Enabled','1','40','2','0','en');
INSERT INTO met_language VALUES('5058','skinused','activated','1','41','2','0','en');
INSERT INTO met_language VALUES('5059','skininfo','information','1','42','2','0','en');
INSERT INTO met_language VALUES('5060','skinuse','Enable now','1','39','2','0','en');
INSERT INTO met_language VALUES('5061','skinmore','Get more template style','1','38','2','0','en');
INSERT INTO met_language VALUES('5062','skinexplain2','The front desk will be replaced by this style','1','37','2','0','en');
INSERT INTO met_language VALUES('5063','skintemplatedescription','Template description','1','34','2','0','en');
INSERT INTO met_language VALUES('5064','skinup','Template upload','1','35','2','0','en');
INSERT INTO met_language VALUES('5065','skinexplain1','Remember to save after uploading, only supports zip format','1','36','2','0','en');
INSERT INTO met_language VALUES('5066','skintemplatename','Template name','1','33','2','0','en');
INSERT INTO met_language VALUES('5067','skintypeset','Template set','1','32','2','0','en');
INSERT INTO met_language VALUES('5068','skinbaseset','basic settings','1','31','2','0','en');
INSERT INTO met_language VALUES('5069','skinset','parameter settings','1','30','2','0','en');
INSERT INTO met_language VALUES('5070','skinAddNew','Add a new template','1','26','2','0','en');
INSERT INTO met_language VALUES('5071','skinname','Style name','1','27','2','0','en');
INSERT INTO met_language VALUES('5072','skinadd','Style add','1','28','2','0','en');
INSERT INTO met_language VALUES('5073','skinaddinfo1','Browse upload will automatically get the folder name (manual upload required to the system root directory templates folder)','1','29','2','0','en');
INSERT INTO met_language VALUES('5074','skinIntroduce','Style description','1','25','2','0','en');
INSERT INTO met_language VALUES('5075','skinDocument','Folder name','1','24','2','0','en');
INSERT INTO met_language VALUES('5076','setskincontentxian','Footer display','1','23','2','0','en');
INSERT INTO met_language VALUES('5077','settopcolumns','A column','1','21','2','0','en');
INSERT INTO met_language VALUES('5078','setpnorder','Previous Next page range','1','20','2','0','en');
INSERT INTO met_language VALUES('5079','infoNoTem','This template has no related configuration instructions!','1','19','2','0','en');
INSERT INTO met_language VALUES('5080','setskinimgdetail','Show picture style','1','18','2','0','en');
INSERT INTO met_language VALUES('5081','setskinproduct2','The current column shows the lower column list','1','17','2','0','en');
INSERT INTO met_language VALUES('5082','setskinproduct1','Show a list of all the information under the list','1','16','2','0','en');
INSERT INTO met_language VALUES('5083','setskinpage','Page style','1','15','2','0','en');
INSERT INTO met_language VALUES('5084','setskindatecontent','Time display format','1','14','2','0','en');
INSERT INTO met_language VALUES('5085','setskindatelist','Time display format','1','13','2','0','en');
INSERT INTO met_language VALUES('5086','setskinhot1','Clicks over','1','10','2','0','en');
INSERT INTO met_language VALUES('5087','setskinhot3','(Need foreground template support)','1','12','2','0','en');
INSERT INTO met_language VALUES('5088','setskinhot2','The clicked message is displayed','1','11','2','0','en');
INSERT INTO met_language VALUES('5089','setskinhot','Popular information','1','9','2','0','en');
INSERT INTO met_language VALUES('5090','setskinnews3','(Need foreground template support)','1','8','2','0','en');
INSERT INTO met_language VALUES('5091','setskinNumOfPage','Every page shows','1','3','2','0','en');
INSERT INTO met_language VALUES('5092','setskinDefault','Default style','1','4','2','0','en');
INSERT INTO met_language VALUES('5093','setskinnews','Latest news','1','5','2','0','en');
INSERT INTO met_language VALUES('5094','setskinnews1','recent','1','6','2','0','en');
INSERT INTO met_language VALUES('5095','setskinnews2','The information published in the day shows','1','7','2','0','en');
INSERT INTO met_language VALUES('5096','setskinAdd','Add a template','1','1','2','0','en');
INSERT INTO met_language VALUES('5097','setskinListPage','List','1','2','2','0','en');
INSERT INTO met_language VALUES('5098','interfacestyle','interface style','1','2','0','0','en');
INSERT INTO met_language VALUES('5099','langtips2','Click to switch to site language:','1','428','1','0','en');
INSERT INTO met_language VALUES('5100','automatic_upgrade','Vulnerability fixes automatically','1','424','1','0','en');
INSERT INTO met_language VALUES('5101','authTip14','Server verification failed','1','425','1','0','en');
INSERT INTO met_language VALUES('5102','langtips1','Current background admin site language:','1','427','1','0','en');
INSERT INTO met_language VALUES('5103','setbasicTip13','The default mailbox service for TLS (consulting space providers get) <br /> If you use TLS mode 25 port can not send mail, try using SSL 465-port send','1','422','1','0','en');
INSERT INTO met_language VALUES('5104','automatic_upgrade_mark','After opening if there are loopholes patch or BUG patch release, the program will automatically download and repair','1','423','1','0','en');
INSERT INTO met_language VALUES('5105','setbasicSMTPWay','sending method','1','420','1','0','en');
INSERT INTO met_language VALUES('5106','setbasicTip12','For mail sending port (consulting E-mail service providers, TLS is generally 25, SSL is generally 465)','1','421','1','0','en');
INSERT INTO met_language VALUES('5107','about','about us','1','418','1','0','en');
INSERT INTO met_language VALUES('5108','setbasicSMTPPort','Send port','1','419','1','0','en');
INSERT INTO met_language VALUES('5109','temexists2','The style is being used, please switch to other styles before deleting!','1','415','1','0','en');
INSERT INTO met_language VALUES('5110','metadmintext1','You have changed the size of the thumbnails, in order to prevent the previously uploaded images from being distorted, go to Content Management - Batch Operations - Bulk Thumbnails and regenerate the thumbnails.','1','417','1','0','en');
INSERT INTO met_language VALUES('5111','fileerr1','Failed to open the configuration file! There is no such file or no writable permission','1','416','1','0','en');
INSERT INTO met_language VALUES('5112','temexists1','This style already exists','1','414','1','0','en');
INSERT INTO met_language VALUES('5113','password30','Make sure the back-end email server is set up correctly','1','413','1','0','en');
INSERT INTO met_language VALUES('5114','password29','E-mail to retrieve','1','412','1','0','en');
INSERT INTO met_language VALUES('5115','password28','SMS tariff instructions','1','411','1','0','en');
INSERT INTO met_language VALUES('5116','password27','Retrieve with phone number','1','410','1','0','en');
INSERT INTO met_language VALUES('5117','password25','new password:','1','408','1','0','en');
INSERT INTO met_language VALUES('5118','password26','Enter:','1','409','1','0','en');
INSERT INTO met_language VALUES('5119','password20','Next step','1','403','1','0','en');
INSERT INTO met_language VALUES('5120','password21','Back to login','1','404','1','0','en');
INSERT INTO met_language VALUES('5121','password22','cellphone number','1','405','1','0','en');
INSERT INTO met_language VALUES('5122','password23','Please enter the verification code (6 digits):','1','406','1','0','en');
INSERT INTO met_language VALUES('5123','password24','username:','1','407','1','0','en');
INSERT INTO met_language VALUES('5124','password17','Too many checksum errors, please revalidate!','1','400','1','0','en');
INSERT INTO met_language VALUES('5125','password18','Check code error, please try again!','1','401','1','0','en');
INSERT INTO met_language VALUES('5126','password19','Data error, please try again!','1','402','1','0','en');
INSERT INTO met_language VALUES('5127','password16','Verify success! Please set your new password.','1','399','1','0','en');
INSERT INTO met_language VALUES('5128','password14','Did not find the user\'s email address, please retrieve the password by other means','1','397','1','0','en');
INSERT INTO met_language VALUES('5129','password15','Please enter the verification code','1','398','1','0','en');
INSERT INTO met_language VALUES('5130','password13','Did not open the SMS retrieve password function','1','396','1','0','en');
INSERT INTO met_language VALUES('5131','password12','If you have an Internet connection, you may receive an SMS message after receiving an SMS message. Please wait for a moment or try again later.','1','395','1','0','en');
INSERT INTO met_language VALUES('5132','password11','Please enter the SMS verification code received by your mobile phone, and then click Next.','1','394','1','0','en');
INSERT INTO met_language VALUES('5133','password10','Serial number','1','393','1','0','en');
INSERT INTO met_language VALUES('5134','password8','Did not find the phone corresponding to the user, please retrieve the password by other means','1','391','1','0','en');
INSERT INTO met_language VALUES('5135','password9','You request to reset the password, validation code','1','392','1','0','en');
INSERT INTO met_language VALUES('5136','password7','Did not find this user','1','390','1','0','en');
INSERT INTO met_language VALUES('5137','password6','Did not find the user\'s mobile phone number, please retrieve the password by other means','1','389','1','0','en');
INSERT INTO met_language VALUES('5138','password5','Please enter your username or email address:','1','388','1','0','en');
INSERT INTO met_language VALUES('5139','password4','Please enter your username or email address. You will receive an email with the link to create a new password.','1','387','1','0','en');
INSERT INTO met_language VALUES('5140','password3','Please enter your username or mobile number:','1','386','1','0','en');
INSERT INTO met_language VALUES('5141','password2','Please enter your username or mobile number, and then click Next, you will receive a SMS verification code.','1','385','1','0','en');
INSERT INTO met_language VALUES('5142','password1','Please choose how to retrieve your password:','1','384','1','0','en');
INSERT INTO met_language VALUES('5143','lang64','Chinese (simplified)','1','383','1','0','en');
INSERT INTO met_language VALUES('5144','lang62','Vietnamese','1','381','1','0','en');
INSERT INTO met_language VALUES('5145','lang63','traditional Chinese)','1','382','1','0','en');
INSERT INTO met_language VALUES('5146','lang61','English','1','380','1','0','en');
INSERT INTO met_language VALUES('5147','lang60','Indonesian','1','379','1','0','en');
INSERT INTO met_language VALUES('5148','lang59','Urdu','1','378','1','0','en');
INSERT INTO met_language VALUES('5149','lang58','Indian Tamil','1','377','1','0','en');
INSERT INTO met_language VALUES('5150','lang57','Telugu, India','1','376','1','0','en');
INSERT INTO met_language VALUES('5151','lang56','Indian Kannada','1','375','1','0','en');
INSERT INTO met_language VALUES('5152','lang55','Hindi','1','374','1','0','en');
INSERT INTO met_language VALUES('5153','lang54','Yiddish','1','373','1','0','en');
INSERT INTO met_language VALUES('5154','lang53','Italian','1','372','1','0','en');
INSERT INTO met_language VALUES('5155','lang52','Armenian','1','371','1','0','en');
INSERT INTO met_language VALUES('5156','lang48','Greek','1','367','1','0','en');
INSERT INTO met_language VALUES('5157','lang49','Spanish Basque','1','368','1','0','en');
INSERT INTO met_language VALUES('5158','lang50','Spanish','1','369','1','0','en');
INSERT INTO met_language VALUES('5159','lang51','Hungarian','1','370','1','0','en');
INSERT INTO met_language VALUES('5160','lang47','Hebrew','1','366','1','0','en');
INSERT INTO met_language VALUES('5161','lang46','Ukrainian','1','365','1','0','en');
INSERT INTO met_language VALUES('5162','lang45','Welsh','1','364','1','0','en');
INSERT INTO met_language VALUES('5163','lang43','Thai','1','362','1','0','en');
INSERT INTO met_language VALUES('5164','lang44','Turkish','1','363','1','0','en');
INSERT INTO met_language VALUES('5165','lang42','Swahili','1','361','1','0','en');
INSERT INTO met_language VALUES('5166','lang37','Japanese','1','356','1','0','en');
INSERT INTO met_language VALUES('5167','lang38','Swedish','1','357','1','0','en');
INSERT INTO met_language VALUES('5168','lang39','Serbian','1','358','1','0','en');
INSERT INTO met_language VALUES('5169','lang40','Slovak','1','359','1','0','en');
INSERT INTO met_language VALUES('5170','lang41','Slovenian','1','360','1','0','en');
INSERT INTO met_language VALUES('5171','lang36','Portuguese','1','355','1','0','en');
INSERT INTO met_language VALUES('5172','lang35','Norwegian','1','354','1','0','en');
INSERT INTO met_language VALUES('5173','lang34','Bengali','1','353','1','0','en');
INSERT INTO met_language VALUES('5174','lang33','Macedonian','1','352','1','0','en');
INSERT INTO met_language VALUES('5175','lang32','Malay','1','351','1','0','en');
INSERT INTO met_language VALUES('5176','lang31','Maltese','1','350','1','0','en');
INSERT INTO met_language VALUES('5177','lang30','Romanian','1','349','1','0','en');
INSERT INTO met_language VALUES('5178','lang29','Lithuanian','1','348','1','0','en');
INSERT INTO met_language VALUES('5179','lang28','Latvian','1','347','1','0','en');
INSERT INTO met_language VALUES('5180','lang27','Latin','1','346','1','0','en');
INSERT INTO met_language VALUES('5181','lang26','Croatian','1','345','1','0','en');
INSERT INTO met_language VALUES('5182','lang25','Czech','1','344','1','0','en');
INSERT INTO met_language VALUES('5183','lang24','Catalan','1','343','1','0','en');
INSERT INTO met_language VALUES('5184','lang23','Galician','1','342','1','0','en');
INSERT INTO met_language VALUES('5185','lang22','Dutch','1','341','1','0','en');
INSERT INTO met_language VALUES('5186','lang21','Korean','1','340','1','0','en');
INSERT INTO met_language VALUES('5187','lang20','Haitian Creole','1','339','1','0','en');
INSERT INTO met_language VALUES('5188','lang19','Gujarati','1','338','1','0','en');
INSERT INTO met_language VALUES('5189','lang18','Georgian','1','337','1','0','en');
INSERT INTO met_language VALUES('5190','lang17','Finnish','1','336','1','0','en');
INSERT INTO met_language VALUES('5191','lang16','Filipino','1','335','1','0','en');
INSERT INTO met_language VALUES('5192','lang14','Russian','1','333','1','0','en');
INSERT INTO met_language VALUES('5193','lang11','Boolean (Afrikaans)','1','330','1','0','en');
INSERT INTO met_language VALUES('5194','lang15','French','1','334','1','0','en');
INSERT INTO met_language VALUES('5195','lang12','Danish','1','331','1','0','en');
INSERT INTO met_language VALUES('5196','lang13','German','1','332','1','0','en');
INSERT INTO met_language VALUES('5197','lang3','Azerbaijani','1','322','1','0','en');
INSERT INTO met_language VALUES('5198','lang4','Irish','1','323','1','0','en');
INSERT INTO met_language VALUES('5199','lang5','Estonian','1','324','1','0','en');
INSERT INTO met_language VALUES('5200','lang6','Belarusian','1','325','1','0','en');
INSERT INTO met_language VALUES('5201','lang7','Bulgarian','1','326','1','0','en');
INSERT INTO met_language VALUES('5202','lang8','Icelandic','1','327','1','0','en');
INSERT INTO met_language VALUES('5203','lang9','Polish','1','328','1','0','en');
INSERT INTO met_language VALUES('5204','lang10','Persian','1','329','1','0','en');
INSERT INTO met_language VALUES('5205','lang2','Arabic','1','321','1','0','en');
INSERT INTO met_language VALUES('5206','lang1','Albanian','1','320','1','0','en');
INSERT INTO met_language VALUES('5207','langselect','Choose a language','1','318','1','0','en');
INSERT INTO met_language VALUES('5208','langselect1','Please select a language','1','319','1','0','en');
INSERT INTO met_language VALUES('5209','langadminadd','Background language to add','1','315','1','0','en');
INSERT INTO met_language VALUES('5210','langwebmanage','Website language','1','316','1','0','en');
INSERT INTO met_language VALUES('5211','langadminmanage','Language','1','317','1','0','en');
INSERT INTO met_language VALUES('5212','langwebadd','Website language added','1','314','1','0','en');
INSERT INTO met_language VALUES('5213','langexplain11','Synchronize the official language pack, will cover the current language data, whether to continue','1','312','1','0','en');
INSERT INTO met_language VALUES('5214','langexplain12','The language has been closed, please turn on and set the default language.','1','313','1','0','en');
INSERT INTO met_language VALUES('5215','langexplain10','No synchronization language specified!','1','311','1','0','en');
INSERT INTO met_language VALUES('5216','langexplain8','Online download automatically translated language packs, the local language is copied language packs have been added language (language packs can be modified to better meet the needs of use)','1','309','1','0','en');
INSERT INTO met_language VALUES('5217','langexplain9','Not synchronized','1','310','1','0','en');
INSERT INTO met_language VALUES('5218','langexplain7','The base language package is downloaded remotely from the server and the base language contains only translated text of the foreground part.','1','308','1','0','en');
INSERT INTO met_language VALUES('5219','langexplain6','Local language','1','307','1','0','en');
INSERT INTO met_language VALUES('5220','langexplain5','Online Download','1','306','1','0','en');
INSERT INTO met_language VALUES('5221','langexplain4','Copy the language has been the basic language package, such as copying English, the new language will be part of the front of the text will be in English.','1','305','1','0','en');
INSERT INTO met_language VALUES('5222','langexplain3','Basic language pack','1','304','1','0','en');
INSERT INTO met_language VALUES('5223','langexplain2','Language logo','1','303','1','0','en');
INSERT INTO met_language VALUES('5224','langexplain1','Corresponds to the front page of the site part of the text, be careful not to add special symbols, click the bottom of the save button to take effect. (Parameter name: value)','1','302','1','0','en');
INSERT INTO met_language VALUES('5225','upfiletips43','Check for updates','1','301','1','0','en');
INSERT INTO met_language VALUES('5226','upfiletips42','Online upgrade','1','300','1','0','en');
INSERT INTO met_language VALUES('5227','upfiletips41','surroundings','1','299','1','0','en');
INSERT INTO met_language VALUES('5228','upfiletips40','Short name','1','298','1','0','en');
INSERT INTO met_language VALUES('5229','upfiletips32','Exchange Forum','1','290','1','0','en');
INSERT INTO met_language VALUES('5230','upfiletips33','Dedicated host','1','291','1','0','en');
INSERT INTO met_language VALUES('5231','upfiletips34','Charge template','1','292','1','0','en');
INSERT INTO met_language VALUES('5232','upfiletips35','Commercial authorization','1','293','1','0','en');
INSERT INTO met_language VALUES('5233','upfiletips36','Custom Development','1','294','1','0','en');
INSERT INTO met_language VALUES('5234','upfiletips37','news','1','295','1','0','en');
INSERT INTO met_language VALUES('5235','upfiletips38','server information','1','296','1','0','en');
INSERT INTO met_language VALUES('5236','upfiletips39','Program name','1','297','1','0','en');
INSERT INTO met_language VALUES('5237','upfiletips28','Show need to pay a certain SMS fees (you can recharge online in business applications)','1','286','1','0','en');
INSERT INTO met_language VALUES('5238','upfiletips31','service and support','1','289','1','0','en');
INSERT INTO met_language VALUES('5239','upfiletips30','Visit profile','1','288','1','0','en');
INSERT INTO met_language VALUES('5240','upfiletips29','General situation','1','287','1','0','en');
INSERT INTO met_language VALUES('5241','upfiletips27','SMS password recovery','1','285','1','0','en');
INSERT INTO met_language VALUES('5242','upfiletips25','Recycle Bin','1','283','1','0','en');
INSERT INTO met_language VALUES('5243','upfiletips26','Content Management - Recycle Bin','1','284','1','0','en');
INSERT INTO met_language VALUES('5244','upfiletips24','Feedback, message and resume submission','1','282','1','0','en');
INSERT INTO met_language VALUES('5245','upfiletips20','Stretch','1','278','1','0','en');
INSERT INTO met_language VALUES('5246','upfiletips21','Leave blank','1','279','1','0','en');
INSERT INTO met_language VALUES('5247','upfiletips22','Cut','1','280','1','0','en');
INSERT INTO met_language VALUES('5248','upfiletips23','Generation method','1','281','1','0','en');
INSERT INTO met_language VALUES('5249','upfiletips19','Watermark','1','277','1','0','en');
INSERT INTO met_language VALUES('5250','upfiletips18','Thumbnail','1','276','1','0','en');
INSERT INTO met_language VALUES('5251','upfiletips17','Click Test','1','275','1','0','en');
INSERT INTO met_language VALUES('5252','upfiletips16','Send the test','1','274','1','0','en');
INSERT INTO met_language VALUES('5253','upfiletips15','100 words or less','1','273','1','0','en');
INSERT INTO met_language VALUES('5254','upfiletips14','Website Description','1','272','1','0','en');
INSERT INTO met_language VALUES('5255','upfiletips13','Multiple keywords separated by vertical lines |, recommended 3-4 keywords.','1','271','1','0','en');
INSERT INTO met_language VALUES('5256','upfiletips11','Search engine optimization settings','1','269','1','0','en');
INSERT INTO met_language VALUES('5257','upfiletips12','Website keywords','1','270','1','0','en');
INSERT INTO met_language VALUES('5258','upfiletips10','6.0.0 above version without manual settings, the current login URL is:','1','268','1','0','en');
INSERT INTO met_language VALUES('5259','upfiletips6','Enter','1','264','1','0','en');
INSERT INTO met_language VALUES('5260','upfiletips7','Basic Information','1','265','1','0','en');
INSERT INTO met_language VALUES('5261','upfiletips8','a','1','266','1','0','en');
INSERT INTO met_language VALUES('5262','upfiletips9','Website LOGO','1','267','1','0','en');
INSERT INTO met_language VALUES('5263','upfiletips5','Commercial authorization inquiry','1','263','1','0','en');
INSERT INTO met_language VALUES('5264','upfiletips2','File Manager','1','260','1','0','en');
INSERT INTO met_language VALUES('5265','upfiletips3','Commercial authorization instructions','1','261','1','0','en');
INSERT INTO met_language VALUES('5266','upfiletips4','Commercial authorization entry','1','262','1','0','en');
INSERT INTO met_language VALUES('5267','dataexplain11','Website moving','1','257','1','0','en');
INSERT INTO met_language VALUES('5268','dataexplain12','Need to use the whole station compression.','1','258','1','0','en');
INSERT INTO met_language VALUES('5269','upfiletips1','Check the list of files','1','259','1','0','en');
INSERT INTO met_language VALUES('5270','dataexplain9','Upload folders generally do not have to back up','1','255','1','0','en');
INSERT INTO met_language VALUES('5271','dataexplain10','database backup','1','256','1','0','en');
INSERT INTO met_language VALUES('5272','dataexplain8','It is recommended to back up the database at least once a month','1','254','1','0','en');
INSERT INTO met_language VALUES('5273','dataexplain7','<span style = \"float: right;\"> Usually used when moving, take up more space </ span> Back up data and files (database, user files, program files)','1','253','1','0','en');
INSERT INTO met_language VALUES('5274','dataexplain6','<span style = \"float: right;\"> Generally do not backup, take up more space </ span> Backup uploaded files (pictures, documents, etc.)','1','252','1','0','en');
INSERT INTO met_language VALUES('5275','dataexplain5','<span style = \"float: right;\"> Recommended monthly backup, take up a little space </ span> Back up your data (without uploaded files)','1','251','1','0','en');
INSERT INTO met_language VALUES('5276','dataexplain4','Are backing up, please be patient ...','1','250','1','0','en');
INSERT INTO met_language VALUES('5277','dataexplain3','Custom backup data','1','249','1','0','en');
INSERT INTO met_language VALUES('5278','dataexplain2','You can upload database backup files, support sql or zip','1','248','1','0','en');
INSERT INTO met_language VALUES('5279','dataexplain1','There is currently no data','1','247','1','0','en');
INSERT INTO met_language VALUES('5280','databackup8','Compress the whole station','1','245','1','0','en');
INSERT INTO met_language VALUES('5281','databackup9','Temporarily no backup file','1','246','1','0','en');
INSERT INTO met_language VALUES('5282','databackup7','Full backup','1','244','1','0','en');
INSERT INTO met_language VALUES('5283','databackup6','Upload folder backup','1','243','1','0','en');
INSERT INTO met_language VALUES('5284','databackup2','restore','1','239','1','0','en');
INSERT INTO met_language VALUES('5285','databackup3','download','1','240','1','0','en');
INSERT INTO met_language VALUES('5286','databackup4','Backup','1','241','1','0','en');
INSERT INTO met_language VALUES('5287','databackup5','Custom backup data sheet','1','242','1','0','en');
INSERT INTO met_language VALUES('5288','databackup1','Backup','1','238','1','0','en');
INSERT INTO met_language VALUES('5289','setimgTopMid','Top','1','233','1','0','en');
INSERT INTO met_language VALUES('5290','setimgmodule_tips','Thumbnails are generally displayed on the list page or the homepage image','1','237','1','0','en');
INSERT INTO met_language VALUES('5291','setimgLeftMid','Left middle','1','236','1','0','en');
INSERT INTO met_language VALUES('5292','setimgLowMid','The bottom','1','235','1','0','en');
INSERT INTO met_language VALUES('5293','setimgRightMid','Right middle','1','234','1','0','en');
INSERT INTO met_language VALUES('5294','setimgLeftLow','Lower left','1','232','1','0','en');
INSERT INTO met_language VALUES('5295','setimgRightLow','Bottom right','1','231','1','0','en');
INSERT INTO met_language VALUES('5296','setimgRightTop','Top right','1','230','1','0','en');
INSERT INTO met_language VALUES('5297','setimgLeftTop','Top left','1','229','1','0','en');
INSERT INTO met_language VALUES('5298','setimgGray2','Soot','1','224','1','0','en');
INSERT INTO met_language VALUES('5299','setimgGray3','Dark gray','1','225','1','0','en');
INSERT INTO met_language VALUES('5300','setimgBlue2','Gray blue','1','226','1','0','en');
INSERT INTO met_language VALUES('5301','setimgMid','intermediate','1','228','1','0','en');
INSERT INTO met_language VALUES('5302','setimgPosition','Watermark location','1','227','1','0','en');
INSERT INTO met_language VALUES('5303','setimgYellow2','Jun Huang','1','223','1','0','en');
INSERT INTO met_language VALUES('5304','setimgYellow1','Orange','1','222','1','0','en');
INSERT INTO met_language VALUES('5305','setimgRed5','Purple','1','221','1','0','en');
INSERT INTO met_language VALUES('5306','setimgRed4','Rose red','1','220','1','0','en');
INSERT INTO met_language VALUES('5307','setimgRed3','Dark red','1','219','1','0','en');
INSERT INTO met_language VALUES('5308','setimgBlue1','Light blue','1','218','1','0','en');
INSERT INTO met_language VALUES('5309','setimgRed2','Brick red','1','217','1','0','en');
INSERT INTO met_language VALUES('5310','setimgRed1','Comprehensive red','1','216','1','0','en');
INSERT INTO met_language VALUES('5311','setimgGreen3','Green','1','215','1','0','en');
INSERT INTO met_language VALUES('5312','setimgGray1','Yellow-gray','1','214','1','0','en');
INSERT INTO met_language VALUES('5313','setimgWhite','white','1','203','1','0','en');
INSERT INTO met_language VALUES('5314','setimgBlack','black','1','204','1','0','en');
INSERT INTO met_language VALUES('5315','setimgRed','red','1','205','1','0','en');
INSERT INTO met_language VALUES('5316','setimgYellow','yellow','1','206','1','0','en');
INSERT INTO met_language VALUES('5317','setimgGreen','green','1','207','1','0','en');
INSERT INTO met_language VALUES('5318','setimgOrange','Orange','1','208','1','0','en');
INSERT INTO met_language VALUES('5319','setimgPurple','purple','1','209','1','0','en');
INSERT INTO met_language VALUES('5320','setimgBlue','blue','1','210','1','0','en');
INSERT INTO met_language VALUES('5321','setimgBrown','brown','1','211','1','0','en');
INSERT INTO met_language VALUES('5322','setimgGreen1','Pink green','1','212','1','0','en');
INSERT INTO met_language VALUES('5323','setimgGreen2','Light green','1','213','1','0','en');
INSERT INTO met_language VALUES('5324','setimgWordAngle','Watermark text angle','1','199','1','0','en');
INSERT INTO met_language VALUES('5325','setimgTip5','Level is 0','1','200','1','0','en');
INSERT INTO met_language VALUES('5326','setimgWordColor','Watermark text color','1','201','1','0','en');
INSERT INTO met_language VALUES('5327','setimgTip4','Please put the font file in the background management directory include / fonts /','1','198','1','0','en');
INSERT INTO met_language VALUES('5328','setimgWordFont','Watermark text font','1','197','1','0','en');
INSERT INTO met_language VALUES('5329','setimgWordSize2','Big picture watermark text size','1','196','1','0','en');
INSERT INTO met_language VALUES('5330','setimgWord','Watermark text','1','193','1','0','en');
INSERT INTO met_language VALUES('5331','setimgTip3','Does not support Chinese (Chinese watermark needs to download Chinese fonts to support)','1','194','1','0','en');
INSERT INTO met_language VALUES('5332','setimgWordSize','Thumbnail watermark text size','1','195','1','0','en');
INSERT INTO met_language VALUES('5333','setimgImgWatermark','Image watermark','1','189','1','0','en');
INSERT INTO met_language VALUES('5334','setimgImg','Thumbnail watermark image','1','190','1','0','en');
INSERT INTO met_language VALUES('5335','setimgImg2','Big picture watermark picture','1','191','1','0','en');
INSERT INTO met_language VALUES('5336','setimgTip2','Only .gif | .png formats are supported','1','192','1','0','en');
INSERT INTO met_language VALUES('5337','setimgWatermarkType','Watermark type','1','187','1','0','en');
INSERT INTO met_language VALUES('5338','setimgWordWatermark','Text watermark','1','188','1','0','en');
INSERT INTO met_language VALUES('5339','setimgThumb','Thumbnail image added','1','186','1','0','en');
INSERT INTO met_language VALUES('5340','setimgWatermark','Add way','1','184','1','0','en');
INSERT INTO met_language VALUES('5341','setimgBigImg','Detailed large picture to add','1','185','1','0','en');
INSERT INTO met_language VALUES('5342','setimgrename2','Renaming a file name helps to reduce the anomaly','1','183','1','0','en');
INSERT INTO met_language VALUES('5343','setimgrename','Automatic rename','1','181','1','0','en');
INSERT INTO met_language VALUES('5344','setimgrename1','Rename the uploaded file name automatically','1','182','1','0','en');
INSERT INTO met_language VALUES('5345','setimgdeleteimg','Automatically delete pictures','1','177','1','0','en');
INSERT INTO met_language VALUES('5346','setimgdeleteimg1','Delete the information will automatically delete the corresponding picture','1','178','1','0','en');
INSERT INTO met_language VALUES('5347','setimgWaterok','This function is compatible with the old version of the template, please do not open the new 6.0.0 template.','1','180','1','0','en');
INSERT INTO met_language VALUES('5348','setimgWater','Automatic generated','1','179','1','0','en');
INSERT INTO met_language VALUES('5349','setimgHeight','high','1','176','1','0','en');
INSERT INTO met_language VALUES('5350','setimgPixel','Pixel','1','175','1','0','en');
INSERT INTO met_language VALUES('5351','setimgWidth','width','1','174','1','0','en');
INSERT INTO met_language VALUES('5352','authTip12','Jumping ... please wait!','1','170','1','0','en');
INSERT INTO met_language VALUES('5353','authTip13','Commercial license not purchased','1','171','1','0','en');
INSERT INTO met_language VALUES('5354','filemaxsize','The file has exceeded the maximum web site limit','1','172','1','0','en');
INSERT INTO met_language VALUES('5355','setimgSet','Website picture settings','1','173','1','0','en');
INSERT INTO met_language VALUES('5356','authTip6','Website name:','1','164','1','0','en');
INSERT INTO met_language VALUES('5357','authTip7','Authorization Type:','1','165','1','0','en');
INSERT INTO met_language VALUES('5358','authTip8','Services:','1','166','1','0','en');
INSERT INTO met_language VALUES('5359','authTip9','Authorization date:','1','167','1','0','en');
INSERT INTO met_language VALUES('5360','authTip10','Date of Expiry:','1','168','1','0','en');
INSERT INTO met_language VALUES('5361','authTip11','Background folder modified successfully!','1','169','1','0','en');
INSERT INTO met_language VALUES('5362','authTip5','Authorized domain name:','1','163','1','0','en');
INSERT INTO met_language VALUES('5363','authTip4','MetInfo website management system you use for the free version, if you use it for commercial purposes, please contact MetInfo official authorization, Thank you for your use!','1','162','1','0','en');
INSERT INTO met_language VALUES('5364','authTip3','Your domain has not been officially certified by MetInfo Enterprise Website Management System','1','161','1','0','en');
INSERT INTO met_language VALUES('5365','authTip2','The business registration code you entered does not match the domain name!','1','160','1','0','en');
INSERT INTO met_language VALUES('5366','authDomain','Authorized domain name','1','157','1','0','en');
INSERT INTO met_language VALUES('5367','authKey','Key','1','158','1','0','en');
INSERT INTO met_language VALUES('5368','authAuthorizedCode','Authorization code','1','159','1','0','en');
INSERT INTO met_language VALUES('5369','authQuery','Domain name authorization query','1','155','1','0','en');
INSERT INTO met_language VALUES('5370','authSubmitQuery','Query the authorization situation','1','156','1','0','en');
INSERT INTO met_language VALUES('5371','authDetail','See the details','1','149','1','0','en');
INSERT INTO met_language VALUES('5372','authGetLicense','Get commercial authorization steps','1','150','1','0','en');
INSERT INTO met_language VALUES('5373','authGet1','The first step, through the understanding or trial after a clear plan to buy MetInfo business website system commercial authority','1','151','1','0','en');
INSERT INTO met_language VALUES('5374','authGet2','The second step, contact MetInfo or agents to obtain the most optimized licensing program, and pay fees','1','152','1','0','en');
INSERT INTO met_language VALUES('5375','authGet3','The third step, add MetInfo technical support QQ, MSN, etc., to submit commercial authorization card','1','153','1','0','en');
INSERT INTO met_language VALUES('5376','authGet4','The fourth step, the use of official documents provided by the authority to replace system-related documents, and enter the authorization code and key','1','154','1','0','en');
INSERT INTO met_language VALUES('5377','authDifferent4','View free version and business version of the detailed features and services comparison','1','148','1','0','en');
INSERT INTO met_language VALUES('5378','authDifferent1','If you use the program for commercial purposes, please purchase a commercial license, or we will retain the right to pursue legal obligations','1','145','1','0','en');
INSERT INTO met_language VALUES('5379','authDifferent3','Free version such as removing [Powered by MetInfo] copyright logo will not work! MetInfo official and will pursue the corresponding legal responsibility!','1','147','1','0','en');
INSERT INTO met_language VALUES('5380','authDifferent2','Free version is for personal learning only, there are no restrictions on the function, the commercial user can obtain the professional technical support service','1','146','1','0','en');
INSERT INTO met_language VALUES('5381','setfiletext2','Found under the folder','1','140','1','0','en');
INSERT INTO met_language VALUES('5382','setfiletext3','A file','1','141','1','0','en');
INSERT INTO met_language VALUES('5383','setfiletext4','All files under folders and folders','1','142','1','0','en');
INSERT INTO met_language VALUES('5384','authWelcome2','Buy space to send authorized promotional activities','1','143','1','0','en');
INSERT INTO met_language VALUES('5385','authDifferentLicense','Differences between commercial and free edition','1','144','1','0','en');
INSERT INTO met_language VALUES('5386','setfilenourl','Can not find the corresponding file!','1','138','1','0','en');
INSERT INTO met_language VALUES('5387','setfiletext1','upload is the root directory for upload, 201103 is an image folder classified by year, month, thumb is a thumbnail folder, and watermark is a watermark large folder','1','139','1','0','en');
INSERT INTO met_language VALUES('5388','setfiletime','Upload time','1','135','1','0','en');
INSERT INTO met_language VALUES('5389','setfileview','View','1','136','1','0','en');
INSERT INTO met_language VALUES('5390','setsafesq5text','Sorry! This directory has no files!','1','131','1','0','en');
INSERT INTO met_language VALUES('5391','setfileno','No files under this folder!','1','137','1','0','en');
INSERT INTO met_language VALUES('5392','setfilesize','File size','1','134','1','0','en');
INSERT INTO met_language VALUES('5393','setfiletype','Types of','1','133','1','0','en');
INSERT INTO met_language VALUES('5394','setfilename','file name','1','132','1','0','en');
INSERT INTO met_language VALUES('5395','setsafesq3text','Emptied','1','129','1','0','en');
INSERT INTO met_language VALUES('5396','setsafesq4text','table of Contents','1','130','1','0','en');
INSERT INTO met_language VALUES('5397','setsafemember','Submit a verification code at the front desk','1','127','1','0','en');
INSERT INTO met_language VALUES('5398','setsafesq2text','Click','1','128','1','0','en');
INSERT INTO met_language VALUES('5399','setsafeadmin','Background login verification code','1','126','1','0','en');
INSERT INTO met_language VALUES('5400','setsafeupdate','Delete the upgrade file','1','124','1','0','en');
INSERT INTO met_language VALUES('5401','setsafeupdate1','After deletion, you can enhance the website\'s security performance','1','125','1','0','en');
INSERT INTO met_language VALUES('5402','setsafeinstall','Delete the installation file','1','123','1','0','en');
INSERT INTO met_language VALUES('5403','setsafeadminname1a','Modify the name of the site background folder (default is admin);','1','120','1','0','en');
INSERT INTO met_language VALUES('5404','setsafeadminname1b','Delete column configuration in the Web site management column;','1','121','1','0','en');
INSERT INTO met_language VALUES('5405','setsafeadminname1c','Only the founder can be modified, does not support Chinese, after some space to modify the file name need to manually modify the folder name via FTP, the current background URL:','1','122','1','0','en');
INSERT INTO met_language VALUES('5406','setsafeadminname','Background folder name','1','118','1','0','en');
INSERT INTO met_language VALUES('5407','setsafeadminname1','Safety advice:','1','119','1','0','en');
INSERT INTO met_language VALUES('5408','setdbExtractOK','Unzip and restore successfully','1','117','1','0','en');
INSERT INTO met_language VALUES('5409','lang_setdbArchiveNo','Spatial allocation of memory resources, compression failure, please contact space providers to help compress! ! !','1','116','1','0','en');
INSERT INTO met_language VALUES('5410','setdbNotExist','file does not exist','1','114','1','0','en');
INSERT INTO met_language VALUES('5411','setdbArchiveOK','Compression successful','1','115','1','0','en');
INSERT INTO met_language VALUES('5412','setdbDBRestoreOK','Data recovery successful','1','113','1','0','en');
INSERT INTO met_language VALUES('5413','setdbImportOK','Import successful','1','111','1','0','en');
INSERT INTO met_language VALUES('5414','setdbWriteOK','Write success!','1','108','1','0','en');
INSERT INTO met_language VALUES('5415','setdbDBFile','Database file','1','110','1','0','en');
INSERT INTO met_language VALUES('5416','setdbBackupOK','Database backup is completed!','1','109','1','0','en');
INSERT INTO met_language VALUES('5417','setdbBackupFile','backup file','1','107','1','0','en');
INSERT INTO met_language VALUES('5418','setdbTip4','If the data file exceeds the set size will be a new sub-volume.','1','106','1','0','en');
INSERT INTO met_language VALUES('5419','setdbTip2','Data can not be backed up to the server! Please check','1','104','1','0','en');
INSERT INTO met_language VALUES('5420','setdbTip3','Whether the directory is writable','1','105','1','0','en');
INSERT INTO met_language VALUES('5421','setdbSelectTable','Please select the data to be backed up!','1','103','1','0','en');
INSERT INTO met_language VALUES('5422','setdbDownload','download','1','102','1','0','en');
INSERT INTO met_language VALUES('5423','setdbImportData','Import','1','101','1','0','en');
INSERT INTO met_language VALUES('5424','setdbLack','Missing sub-volumes','1','100','1','0','en');
INSERT INTO met_language VALUES('5425','setdbFilesize','File size','1','97','1','0','en');
INSERT INTO met_language VALUES('5426','setdbTime','Backup time','1','98','1','0','en');
INSERT INTO met_language VALUES('5427','setdbNumber','Sub-volume','1','99','1','0','en');
INSERT INTO met_language VALUES('5428','setdbsysver','system version','1','96','1','0','en');
INSERT INTO met_language VALUES('5429','setdbFilename','file name','1','95','1','0','en');
INSERT INTO met_language VALUES('5430','setdbStart','Start backing up the data','1','94','1','0','en');
INSERT INTO met_language VALUES('5431','setdbAll','Total','1','92','1','0','en');
INSERT INTO met_language VALUES('5432','setdbEveryoneSize','Sub-volume size','1','93','1','0','en');
INSERT INTO met_language VALUES('5433','setdbItems','Number of records','1','90','1','0','en');
INSERT INTO met_language VALUES('5434','setdbSize','size','1','91','1','0','en');
INSERT INTO met_language VALUES('5435','setdbTable','data sheet','1','89','1','0','en');
INSERT INTO met_language VALUES('5436','setdbImport','Import backup data','1','88','1','0','en');
INSERT INTO met_language VALUES('5437','langshuom','Description','1','86','1','0','en');
INSERT INTO met_language VALUES('5438','setdbBackup','Data and backup','1','87','1','0','en');
INSERT INTO met_language VALUES('5439','langtype','Language status','1','85','1','0','en');
INSERT INTO met_language VALUES('5440','langvalue','value','1','83','1','0','en');
INSERT INTO met_language VALUES('5441','langinfo','Comments','1','84','1','0','en');
INSERT INTO met_language VALUES('5442','langnameorder','Do not repeat with other languages','1','80','1','0','en');
INSERT INTO met_language VALUES('5443','langnamerepeat','Language ID can not be repeated','1','81','1','0','en');
INSERT INTO met_language VALUES('5444','langone','The system has only one language, can not be deleted!','1','82','1','0','en');
INSERT INTO met_language VALUES('5445','langclose2','Default language can not be closed','1','79','1','0','en');
INSERT INTO met_language VALUES('5446','langclose1','Only opened a language, can not be closed','1','78','1','0','en');
INSERT INTO met_language VALUES('5447','langnamenull','Language name can not be empty','1','77','1','0','en');
INSERT INTO met_language VALUES('5448','langouturlinfo','Be sure to include http: // or https: //. The program that accesses this domain automatically jumps to this language (you need to do a good name binding) or do an external link.','1','74','1','0','en');
INSERT INTO met_language VALUES('5449','langcopyfile','Failed to copy the file, please check whether the file exists','1','76','1','0','en');
INSERT INTO met_language VALUES('5450','langnewwindows','open in a new window','1','75','1','0','en');
INSERT INTO met_language VALUES('5451','langbasicinfo','Copy the appropriate background language file','1','73','1','0','en');
INSERT INTO met_language VALUES('5452','langbasic','Language file based','1','72','1','0','en');
INSERT INTO met_language VALUES('5453','langmarkinfo','Please use English letters, such as cn, can not be repeated with other language logo','1','71','1','0','en');
INSERT INTO met_language VALUES('5454','langurlinfo','The site language that is displayed by default when the site is visited','1','69','1','0','en');
INSERT INTO met_language VALUES('5455','langorderinfo','Can not repeat','1','70','1','0','en');
INSERT INTO met_language VALUES('5456','langadminyes','The administrator can choose the background language before logging in','1','66','1','0','en');
INSERT INTO met_language VALUES('5457','langurl','Station group function','1','67','1','0','en');
INSERT INTO met_language VALUES('5458','langsw','Language switching','1','68','1','0','en');
INSERT INTO met_language VALUES('5459','langhome','default language','1','63','1','0','en');
INSERT INTO met_language VALUES('5460','langdefaultadmin','Background default language','1','64','1','0','en');
INSERT INTO met_language VALUES('5461','langadminok','Simple and complicated switch','1','65','1','0','en');
INSERT INTO met_language VALUES('5462','langchok','Generally linked to the form displayed in the upper right corner of the front desk','1','62','1','0','en');
INSERT INTO met_language VALUES('5463','langcnch','Simplified Chinese or Traditional Chinese language logo','1','61','1','0','en');
INSERT INTO met_language VALUES('5464','langch','Simplified and Traditional automatic switching','1','60','1','0','en');
INSERT INTO met_language VALUES('5465','langeadminditor','Background language parameters','1','59','1','0','en');
INSERT INTO met_language VALUES('5466','langwebeditor','Edit parameters','1','58','1','0','en');
INSERT INTO met_language VALUES('5467','langmark','Language logo','1','54','1','0','en');
INSERT INTO met_language VALUES('5468','langouturl','Separate domain name','1','55','1','0','en');
INSERT INTO met_language VALUES('5469','langadmin','Language','1','56','1','0','en');
INSERT INTO met_language VALUES('5470','langpara','Language parameters change','1','57','1','0','en');
INSERT INTO met_language VALUES('5471','langflag','Flag sign','1','53','1','0','en');
INSERT INTO met_language VALUES('5472','langname','Language name','1','52','1','0','en');
INSERT INTO met_language VALUES('5473','langtitle','Language configuration','1','48','1','0','en');
INSERT INTO met_language VALUES('5474','langedit','Modify the language','1','51','1','0','en');
INSERT INTO met_language VALUES('5475','langadd','Add a new language','1','50','1','0','en');
INSERT INTO met_language VALUES('5476','langweb','Website language','1','49','1','0','en');
INSERT INTO met_language VALUES('5477','setbasicTip11','E-mail password used to send mail','1','47','1','0','en');
INSERT INTO met_language VALUES('5478','setbasicTip10','Such as QQ mailbox smtp.qq.com','1','45','1','0','en');
INSERT INTO met_language VALUES('5479','setbasicSMTPPassword','email Password','1','46','1','0','en');
INSERT INTO met_language VALUES('5480','setbasicSMTPServer','SMTP','1','44','1','0','en');
INSERT INTO met_language VALUES('5481','setbasicTip8','E-mail account used to send mail','1','43','1','0','en');
INSERT INTO met_language VALUES('5482','setbasicEmailAccount','email address','1','42','1','0','en');
INSERT INTO met_language VALUES('5483','setbasicTip7','The sender\'s name is displayed','1','41','1','0','en');
INSERT INTO met_language VALUES('5484','setbasictopic','theme','1','37','1','0','en');
INSERT INTO met_language VALUES('5485','setbasicmainbody','text','1','38','1','0','en');
INSERT INTO met_language VALUES('5486','setbasicok','Sent successfully','1','39','1','0','en');
INSERT INTO met_language VALUES('5487','setbasicno','The sender failed','1','40','1','0','en');
INSERT INTO met_language VALUES('5488','setbasicTip5','Multiple please use | separated','1','33','1','0','en');
INSERT INTO met_language VALUES('5489','setbasicTip6','Outbox settings (all mail within the station are sent by this email, such as member password retrieve mail, etc.)','1','34','1','0','en');
INSERT INTO met_language VALUES('5490','setbasicFromName','Sender','1','35','1','0','en');
INSERT INTO met_language VALUES('5491','setbasicToName','Recipients','1','36','1','0','en');
INSERT INTO met_language VALUES('5492','setbasicEnableFormat','File formats allowed to be uploaded','1','32','1','0','en');
INSERT INTO met_language VALUES('5493','setbasicUploadMax','File upload maximum','1','31','1','0','en');
INSERT INTO met_language VALUES('5494','setbasicWebName','Website name','1','29','1','0','en');
INSERT INTO met_language VALUES('5495','setbasicWebSite','Website URL','1','30','1','0','en');
INSERT INTO met_language VALUES('5496','setbasicWebInfoSet','Website basic information settings','1','28','1','0','en');
INSERT INTO met_language VALUES('5497','metinfoversion','system version','1','23','1','0','en');
INSERT INTO met_language VALUES('5498','reserved','all rights reserved','1','24','1','0','en');
INSERT INTO met_language VALUES('5499','copyright','Changsha Mituo Information Technology Co., Ltd. (MetInfo Inc.)','1','25','1','0','en');
INSERT INTO met_language VALUES('5500','sysadminlicense','View the complete user license agreement','1','22','1','0','en');
INSERT INTO met_language VALUES('5501','sysadminAgreement3','Unauthorized users, the use of any unanticipated consequences, the official does not assume any responsibility.','1','21','1','0','en');
INSERT INTO met_language VALUES('5502','sysadminAgreement2','For users without official authorization, be sure to keep the words and links of Powered by MetInfo at the bottom of the website. After the official authorization to remove the front copyright information.','1','20','1','0','en');
INSERT INTO met_language VALUES('5503','sysadminUseAgreement','Use Agreement','1','18','1','0','en');
INSERT INTO met_language VALUES('5504','sysadminAgreement1','Personal websites are free and unlimited. MetInfo may not be used for commercial purposes without commercial authorization.','1','19','1','0','en');
INSERT INTO met_language VALUES('5505','sysadminHelp4','Step Four: Set up static pages, SEO parameters and other information in the optimization and promotion','1','16','1','0','en');
INSERT INTO met_language VALUES('5506','sysadminHelp5','The fifth step: in the content management to add site content, bottom information','1','17','1','0','en');
INSERT INTO met_language VALUES('5507','sysadminHelp3','The third step: in the column configuration settings site navigation column and related parameters','1','15','1','0','en');
INSERT INTO met_language VALUES('5508','sysadminHelp2','The second step: in the interface style, select the site template style and set the relevant style parameters','1','14','1','0','en');
INSERT INTO met_language VALUES('5509','sysadminHelp1','The first step: set in the system settings Basic information, language settings, safety and efficiency','1','13','1','0','en');
INSERT INTO met_language VALUES('5510','sysadminHelp','Instructions for use','1','12','1','0','en');
INSERT INTO met_language VALUES('5511','sysadminDBVersion','Mysql version','1','10','1','0','en');
INSERT INTO met_language VALUES('5512','sysadminOfficialWebsite','Official website','1','11','1','0','en');
INSERT INTO met_language VALUES('5513','sysadminLoginTime','Log in time','1','9','1','0','en');
INSERT INTO met_language VALUES('5514','sysadminLoginNum','Login times','1','8','1','0','en');
INSERT INTO met_language VALUES('5515','sysadminUserInfo','User Info','1','6','1','0','en');
INSERT INTO met_language VALUES('5516','sysadminUsername','username','1','7','1','0','en');
INSERT INTO met_language VALUES('5517','sysadminMember','Sign Up','1','5','1','0','en');
INSERT INTO met_language VALUES('5518','sysadminFriendlyLink','Links','1','4','1','0','en');
INSERT INTO met_language VALUES('5519','sysadminLeaveMessage','Online message','1','3','1','0','en');
INSERT INTO met_language VALUES('5520','sysadminFeedbackInfo','Feedback','1','2','1','0','en');
INSERT INTO met_language VALUES('5521','sysadminUnread','Unread message','1','1','1','0','en');
INSERT INTO met_language VALUES('5522','systemconfiguration','System Configuration','1','1','0','0','en');
INSERT INTO met_language VALUES('5523','proposal','I want to make suggestions','1','442','8','0','en');
INSERT INTO met_language VALUES('5524','onlinehelp','QQ is not enabled Help Document:','1','104','2','0','en');
INSERT INTO met_language VALUES('5525','setbasicTip14','gmail mailbox need space to support SSL, please open SSL, or replaced by other mail! ! !','1','429','1','0','en');
INSERT INTO met_language VALUES('5526','setbasicTip15','Space does not support SSL send mail, please open SSL, or replaced by TLS! ! !','1','430','1','0','en');
INSERT INTO met_language VALUES('5527','onlinehelp1','Add QQ need to [shang.qq.com] After login in the [merchant communication set-up] to open QQ online status, otherwise it will display \"not enabled\"','1','105','2','0','en');
INSERT INTO met_language VALUES('5528','dlapptips19','New application released! ! !','1','358','6','0','en');
INSERT INTO met_language VALUES('5529','dlapptips20','Updated','1','359','6','0','en');
INSERT INTO met_language VALUES('5530','feedbackautosms','SMS reply settings','1','177','4','0','en');
INSERT INTO met_language VALUES('5531','fdincAutosms','SMS reply','1','178','4','0','en');
INSERT INTO met_language VALUES('5532','fdincAutoContentsms','Reply SMS content','1','179','4','0','en');
INSERT INTO met_language VALUES('5533','fdincTipsms','Check the box will automatically reply to the user submitting text messages, you need to use the SMS feature in my application to recharge SMS','1','180','4','0','en');
INSERT INTO met_language VALUES('5534','fdinctellsms','Contact phone field name','1','181','4','0','en');
INSERT INTO met_language VALUES('5535','fdinctells','Used to retrieve the user\'s contact number in order to reply to a text message. Field type must be short','1','182','4','0','en');
INSERT INTO met_language VALUES('5536','hotsearches','popular searches','1','431','1','0','en');
INSERT INTO met_language VALUES('5537','searchresult','search results','1','432','1','0','en');
INSERT INTO met_language VALUES('5538','savenow','Background can be modified in all languages','1','433','1','0','en');
INSERT INTO met_language VALUES('5539','onlineupdate','Online upgrade','1','436','1','0','en');
INSERT INTO met_language VALUES('5540','updatenow','upgrade immediately','1','437','1','0','en');
INSERT INTO met_language VALUES('5541','updatelater','Upgrade later','1','438','1','0','en');
INSERT INTO met_language VALUES('5542','tag','Tag label','1','434','1','0','en');
INSERT INTO met_language VALUES('5543','tagtips','Multiple tags should be separated by |','1','435','1','0','en');
INSERT INTO met_language VALUES('5544','displaytype','Front display','1','183','4','0','en');
INSERT INTO met_language VALUES('5545','checkupdate','Check for updates','1','439','1','0','en');
INSERT INTO met_language VALUES('5546','checkupdatetips','I am sorry! You do not have enough privileges to upgrade online.','1','440','1','0','en');
INSERT INTO met_language VALUES('5547','memberInformation','Member information settings','1','67','8','0','en');
INSERT INTO met_language VALUES('5548','tradewap','Mobile version (commercial version)','1','75','8','0','en');
INSERT INTO met_language VALUES('5549','paraname','name','1','187','8','0','en');
INSERT INTO met_language VALUES('5550','parazce','registration message','1','200','8','0','en');
INSERT INTO met_language VALUES('5551','parazce_explain','Note: When the registration information is checked, the fields will be displayed in the member registration interface. If not checked, it will only be displayed in the editing member information interface','1','201','8','0','en');
INSERT INTO met_language VALUES('5552','message_name','Name field name','1','240','4','0','en');
INSERT INTO met_language VALUES('5553','message_name1','Used to get the user\'s name, field type must be \"short\"','1','241','4','0','en');
INSERT INTO met_language VALUES('5554','message_content','Message content field name','1','242','4','0','en');
INSERT INTO met_language VALUES('5555','message_content1','Used to obtain the user\'s message content, field type must be \"text\"','1','243','4','0','en');
INSERT INTO met_language VALUES('5556','message_AcceptMail','Message mail receiving mailbox','1','244','4','0','en');
INSERT INTO met_language VALUES('5557','popular_explain','When the value of \"Replace with\" is null, the value of \"Original text\" is replaced by null','1','25','5','0','en');
INSERT INTO met_language VALUES('5558','column_search','Column search','1','245','4','0','en');
INSERT INTO met_language VALUES('5559','column_searchname','Please enter the column name','1','246','4','0','en');
INSERT INTO met_language VALUES('5560','search_inthe','Searching','1','247','4','0','en');
INSERT INTO met_language VALUES('5561','search_Noresults','Sorry, did not find the section you want to search','1','248','4','0','en');
INSERT INTO met_language VALUES('5562','membertips','Member settings','1','244','4','0','en');
INSERT INTO met_language VALUES('5563','memberstyle','Member group settings','1','245','4','0','en');
INSERT INTO met_language VALUES('5564','memberflashset','Member function settings','1','246','4','0','en');
INSERT INTO met_language VALUES('5565','jsx36','Note: The zip format is not allowed to upload, please go to the site safe to add zip upload format','1','444','8','0','en');
INSERT INTO met_language VALUES('5566','jsx37','Note: sql format is not allowed to upload, please go to the site to add security inside sql upload format','1','445','8','0','en');
INSERT INTO met_language VALUES('5567','jsx38','You do not have full control, please contact the administrator to open','1','446','8','0','en');
INSERT INTO met_language VALUES('5568','appmodule','Application module','1','1','3','0','en');
INSERT INTO met_language VALUES('5569','formerror1','Please fill in this field.','1','0','8','0','en');
INSERT INTO met_language VALUES('5570','formerror2','Please choose one of these options.','1','0','8','0','en');
INSERT INTO met_language VALUES('5571','formerror3','Please enter the correct phone number.','1','0','8','0','en');
INSERT INTO met_language VALUES('5572','formerror4','Please enter the correct email address.','1','0','8','0','en');
INSERT INTO met_language VALUES('5573','formerror5','The password entered twice is different. Please re-enter it.','1','0','8','0','en');
INSERT INTO met_language VALUES('5574','formerror6','Please enter at least & metinfo & characters.','1','0','8','0','en');
INSERT INTO met_language VALUES('5575','formerror7','Input can not exceed & metinfo & characters.','1','0','8','0','en');
INSERT INTO met_language VALUES('5576','formerror8','The number of characters entered must be between & metinfo &.','1','0','8','0','en');
INSERT INTO met_language VALUES('5577','smstips96','other','1','0','8','0','en');
INSERT INTO met_language VALUES('5578','smstips97','User notification','1','0','8','0','en');
INSERT INTO met_language VALUES('5579','js72','Whether to import the administrator and membership information, to determine the current administrator and member information will be imported data to replace, cancel the administrator and members are still current.','1','0','8','0','en');
INSERT INTO met_language VALUES('5580','upfileFail20','Delete the thumbnail cache','1','0','8','0','en');
INSERT INTO met_language VALUES('5581','page_setup_details','Details page settings','1','0','1','0','en');
INSERT INTO met_language VALUES('5582','defined_separately','(Can be individually defined for each section carousel)','1','0','1','0','en');
INSERT INTO met_language VALUES('5583','click_here_settings','Click here to enter the custom settings','1','0','1','0','en');
INSERT INTO met_language VALUES('5584','consistent_home_page','In line with the home page','1','0','1','0','en');
INSERT INTO met_language VALUES('5585','call_way','Calling method','1','0','1','0','en');
INSERT INTO met_language VALUES('5586','inside_larger','Internal page carousel settings','1','0','1','0','en');
INSERT INTO met_language VALUES('5587','sys_orange','Orange red','1','0','1','0','en');
INSERT INTO met_language VALUES('5588','sys_cyan','blue','1','0','1','0','en');
INSERT INTO met_language VALUES('5589','style_Settings','Style set','1','0','1','0','en');
INSERT INTO met_language VALUES('5590','sys_parameter315','Click here to enter more settings','1','0','1','0','en');
INSERT INTO met_language VALUES('5591','add_them_picture','Add carousel picture','1','0','1','0','en');
INSERT INTO met_language VALUES('5592','title_link','Set titles and links','1','0','1','0','en');
INSERT INTO met_language VALUES('5593','larger_wheel','Larger picture carousel settings','1','0','1','0','en');
INSERT INTO met_language VALUES('5594','scroll_bar','scroll bar','1','0','1','0','en');
INSERT INTO met_language VALUES('5595','complete_experience','For a complete mobile version, please visit the website or scan the QR code using mobile phone.','1','0','1','0','en');
INSERT INTO met_language VALUES('5596','effect_should','All effects should be mobile terminal browsing as the standard.','1','0','1','0','en');
INSERT INTO met_language VALUES('5597','computer_browser','Computer browsers and mobile browser part render different, so browse the mobile version of the computer may appear the details of incompatibility.','1','0','1','0','en');
INSERT INTO met_language VALUES('5598','save_Settings','Save Settings','1','0','1','0','en');
INSERT INTO met_language VALUES('5599','trying_load','Are trying hard to load','1','0','1','0','en');
INSERT INTO met_language VALUES('5600','templates_choice','Template selection','1','0','1','0','en');
INSERT INTO met_language VALUES('5601','fixed_bottom','Bottom fixed menu','1','0','1','0','en');
INSERT INTO met_language VALUES('5602','All_empty_message','Clear all the news','1','0','1','0','en');
INSERT INTO met_language VALUES('5603','messages_restore','Are you sure you want to delete all the messages? Once deleted will not be able to recover!','1','0','1','0','en');
INSERT INTO met_language VALUES('5604','enter_user','please enter user name','1','0','1','0','en');
INSERT INTO met_language VALUES('5605','stations_recommended','New stations are not recommended for old stations that still use purely static pages.','1','0','1','0','en');
INSERT INTO met_language VALUES('5606','static_page','Set static pages','1','0','1','0','en');
INSERT INTO met_language VALUES('5607','pure_static_Settings','For users still using pure static pages, you can enter the settings below.','1','0','1','0','en');
INSERT INTO met_language VALUES('5608','sys_good','excellent.','1','0','1','0','en');
INSERT INTO met_language VALUES('5609','static_dynamic','Static is not dynamic','1','0','1','0','en');
INSERT INTO met_language VALUES('5610','development_engine','Static, for the development of search engines so far,','1','0','1','0','en');
INSERT INTO met_language VALUES('5611','manually_static_rules2','Static, pseudo-static is the recommended practice, you can even not','1','0','1','0','en');
INSERT INTO met_language VALUES('5612','manually_static_rules1','The above is pseudo-static related settings, if you have','1','0','1','0','en');
INSERT INTO met_language VALUES('5613','manually_static_rules','Part of the space need to manually set the pseudo-static rules file','1','0','1','0','en');
INSERT INTO met_language VALUES('5614','pseudo_static','See pseudo-static rules','1','0','1','0','en');
INSERT INTO met_language VALUES('5615','pseudo_static','Pseudo-static rules','1','0','1','0','en');
INSERT INTO met_language VALUES('5616','sys_end','end.','1','0','1','0','en');
INSERT INTO met_language VALUES('5617','and_to','(URL), and','1','0','1','0','en');
INSERT INTO met_language VALUES('5618','simplify_front_desk','After opening to simplify the front page','1','0','1','0','en');
INSERT INTO met_language VALUES('5619','sys_static','Pseudo-static','1','0','1','0','en');
INSERT INTO met_language VALUES('5620','being_generated','Generating','1','0','1','0','en');
INSERT INTO met_language VALUES('5621','anchor_text','Add anchor text','1','0','1','0','en');
INSERT INTO met_language VALUES('5622','applies_paper','Only in front of the page content text, such as article details page content text.','1','0','1','0','en');
INSERT INTO met_language VALUES('5623','everyone_see','On the line, everyone to see!','1','0','1','0','en');
INSERT INTO met_language VALUES('5624','build_site','Build a new website','1','0','1','0','en');
INSERT INTO met_language VALUES('5625','sys_use','I use','1','0','1','0','en');
INSERT INTO met_language VALUES('5626','more_applications','More applications','1','0','1','0','en');
INSERT INTO met_language VALUES('5627','recommended','Recommended Applications','1','0','1','0','en');
INSERT INTO met_language VALUES('5628','Traffic_trends','Hourly traffic trends','1','0','1','0','en');
INSERT INTO met_language VALUES('5629','sys_nearly','near','1','0','1','0','en');
INSERT INTO met_language VALUES('5630','sys_views','Views','1','0','1','0','en');
INSERT INTO met_language VALUES('5631','share_mood','Share the mood','1','0','1','0','en');
INSERT INTO met_language VALUES('5632','publish_content','Publish content','1','0','1','0','en');
INSERT INTO met_language VALUES('5633','debug_appearance','Debug the appearance','1','0','1','0','en');
INSERT INTO met_language VALUES('5634','configuration_section','Configure the column','1','0','1','0','en');
INSERT INTO met_language VALUES('5635','new_guidelines','Novice guide','1','0','1','0','en');
INSERT INTO met_language VALUES('5636','release_to','Post to','1','0','1','0','en');
INSERT INTO met_language VALUES('5637','template_code1','Please enter the template number','1','0','1','0','en');
INSERT INTO met_language VALUES('5638','sys_cost','cost','1','0','1','0','en');
INSERT INTO met_language VALUES('5639','industry_segments','Industry breakdown','1','0','1','0','en');
INSERT INTO met_language VALUES('5640','color_filter','Color screening','1','0','1','0','en');
INSERT INTO met_language VALUES('5641','industry_screening','Industry screening','1','0','1','0','en');
INSERT INTO met_language VALUES('5642','set_password','The third step: set the payment password','1','0','1','0','en');
INSERT INTO met_language VALUES('5643','login_password','Bit. Pay for the application need to enter the payment password, please do not be consistent with the login password.','1','0','1','0','en');
INSERT INTO met_language VALUES('5644','services_future','Can be used to retrieve the password and get more services in the future of the application market','1','0','1','0','en');
INSERT INTO met_language VALUES('5645','personal_information','Step two: set up personal information','1','0','1','0','en');
INSERT INTO met_language VALUES('5646','Repeat_password','Repeat login password','1','0','1','0','en');
INSERT INTO met_language VALUES('5647','sys_password','login password','1','0','1','0','en');
INSERT INTO met_language VALUES('5648','create_account','The first step: create an account','1','0','1','0','en');
INSERT INTO met_language VALUES('5649','buy_time','Purchase time','1','0','1','0','en');
INSERT INTO met_language VALUES('5650','please_click','Payment is successful, please click! !','1','0','1','0','en');
INSERT INTO met_language VALUES('5651','payment_method','Please select mode of payment','1','0','1','0','en');
INSERT INTO met_language VALUES('5652','sys_unionpay','UnionPay','1','0','1','0','en');
INSERT INTO met_language VALUES('5653','enter_amount','Please enter the recharge amount','1','0','1','0','en');
INSERT INTO met_language VALUES('5654','payment_amount','Payment amount','1','0','1','0','en');
INSERT INTO met_language VALUES('5655','account_Settings','account settings','1','0','1','0','en');
INSERT INTO met_language VALUES('5656','consumption_record','Expenses record','1','0','1','0','en');
INSERT INTO met_language VALUES('5657','the_balance','Balance','1','0','1','0','en');
INSERT INTO met_language VALUES('5658','website_manually','After successful login your website will automatically log in to this account, unless you manually exit.','1','0','1','0','en');
INSERT INTO met_language VALUES('5659','application_market','Login application market','1','0','1','0','en');
INSERT INTO met_language VALUES('5660','installations','Installation volume','1','0','1','0','en');
INSERT INTO met_language VALUES('5661','permission_download','No permission to download','1','0','1','0','en');
INSERT INTO met_language VALUES('5662','goods_comment','Buy a product before commenting','1','0','1','0','en');
INSERT INTO met_language VALUES('5663','product_commented','The same product up to comment 3 times','1','0','1','0','en');
INSERT INTO met_language VALUES('5664','password_mistake','Pay the wrong password','1','0','1','0','en');
INSERT INTO met_language VALUES('5665','please_again','Please log in to the App Store. The App Store uses an independent account system. If you do not have an account, please register first!','1','0','1','0','en');
INSERT INTO met_language VALUES('5666','have_bought','bought','1','0','1','0','en');
INSERT INTO met_language VALUES('5667','download_application','The current system can not download this application, please upgrade the system','1','0','1','0','en');
INSERT INTO met_language VALUES('5668','sys_evaluation','Evaluation of success! Thank you for your comment!','1','0','1','0','en');
INSERT INTO met_language VALUES('5669','downloads','start download','1','0','1','0','en');
INSERT INTO met_language VALUES('5670','click_rating','Please click star rating!','1','0','1','0','en');
INSERT INTO met_language VALUES('5671','system_temporarily','Your recharge order, the system yet to receive, please check the financial records later, or contact the official website customer service staff.','1','0','1','0','en');
INSERT INTO met_language VALUES('5672','prepaid_successfully','Recharge success','1','0','1','0','en');
INSERT INTO met_language VALUES('5673','repeat_password','Repeat payment password','1','0','1','0','en');
INSERT INTO met_language VALUES('5674','payment_password','New payment password','1','0','1','0','en');
INSERT INTO met_language VALUES('5675','original_password1','Please enter the original payment password','1','0','1','0','en');
INSERT INTO met_language VALUES('5676','original_password','The original payment password','1','0','1','0','en');
INSERT INTO met_language VALUES('5677','password_length','Password length','1','0','1','0','en');
INSERT INTO met_language VALUES('5678','please_enter','Please enter a new password','1','0','1','0','en');
INSERT INTO met_language VALUES('5679','login_password_new','New login password','1','0','1','0','en');
INSERT INTO met_language VALUES('5680','original_passwords1','Please enter the original password','1','0','1','0','en');
INSERT INTO met_language VALUES('5681','original_passwords','The original login password','1','0','1','0','en');
INSERT INTO met_language VALUES('5682','account_password','Please fill in the application market account login password, rather than website login password.','1','0','1','0','en');
INSERT INTO met_language VALUES('5683','please_password','Please enter your password','1','0','1','0','en');
INSERT INTO met_language VALUES('5684','login_password1','You must fill in the login password to modify the data','1','0','1','0','en');
INSERT INTO met_language VALUES('5685','popular_template','Hot template','1','0','1','0','en');
INSERT INTO met_language VALUES('5686','popular_application','Popular applications','1','0','1','0','en');
INSERT INTO met_language VALUES('5687','sys_parameter218','The data here is automatically generated by the control','1','0','1','0','en');
INSERT INTO met_language VALUES('5688','number_installation','Installation times','1','0','1','0','en');
INSERT INTO met_language VALUES('5689','application_name','Application Name','1','0','1','0','en');
INSERT INTO met_language VALUES('5690','application_developers','Developer application','1','0','1','0','en');
INSERT INTO met_language VALUES('5691','website_developers','Developer website','1','0','1','0','en');
INSERT INTO met_language VALUES('5692','introduction_developers','Developer Profile','1','0','1','0','en');
INSERT INTO met_language VALUES('5693','sys_head','Avatar','1','0','1','0','en');
INSERT INTO met_language VALUES('5694','name_developers','Developer name','1','0','1','0','en');
INSERT INTO met_language VALUES('5695','dont_fill','Not fill','1','0','1','0','en');
INSERT INTO met_language VALUES('5696','mouse_click_rating','Mouse over the star to click on the score','1','0','1','0','en');
INSERT INTO met_language VALUES('5697','score','score','1','0','1','0','en');
INSERT INTO met_language VALUES('5698','want_comment','I want to comment','1','0','1','0','en');
INSERT INTO met_language VALUES('5699','next_page','Next page','1','0','1','0','en');
INSERT INTO met_language VALUES('5700','back','Previous page','1','0','1','0','en');
INSERT INTO met_language VALUES('5701','running_environment','Operating environment','1','0','1','0','en');
INSERT INTO met_language VALUES('5702','updated_date','Updated','1','0','1','0','en');
INSERT INTO met_language VALUES('5703','online_presentation','Online demo','1','0','1','0','en');
INSERT INTO met_language VALUES('5704','screenshots','Screenshots','1','0','1','0','en');
INSERT INTO met_language VALUES('5705','is_introduced','Introduction','1','0','1','0','en');
INSERT INTO met_language VALUES('5706','comments','comment','1','0','1','0','en');
INSERT INTO met_language VALUES('5707','evaluation','Person evaluation)','1','0','1','0','en');
INSERT INTO met_language VALUES('5708','total_of','(Total','1','0','1','0','en');
INSERT INTO met_language VALUES('5709','password_input','Please enter payment password','1','0','1','0','en');
INSERT INTO met_language VALUES('5710','pay_password','Pay the password','1','0','1','0','en');
INSERT INTO met_language VALUES('5711','temporary_access1','Please enter the temporary access domain name, it must be a third-level domain name.','1','0','1','0','en');
INSERT INTO met_language VALUES('5712','temporary_access','Temporary access to the domain name','1','0','1','0','en');
INSERT INTO met_language VALUES('5713','template_domain','Please enter the first level domain name bound to the template','1','0','1','0','en');
INSERT INTO met_language VALUES('5714','top_domain_names','Top level domain','1','0','1','0','en');
INSERT INTO met_language VALUES('5715','buy_template_must','After the purchase process will automatically get the current site domain name and binding, after this template can only be used under the binding domain name.','1','0','1','0','en');
INSERT INTO met_language VALUES('5716','template_domain','Template binding domain name description','1','0','1','0','en');
INSERT INTO met_language VALUES('5717','amount_of','Amount','1','0','1','0','en');
INSERT INTO met_language VALUES('5718','purchase_program','Purchase item','1','0','1','0','en');
INSERT INTO met_language VALUES('5719','success_payment','After payment is successful, please click this link to jump! !','1','0','1','0','en');
INSERT INTO met_language VALUES('5720','pay_success','payment successful','1','0','1','0','en');
INSERT INTO met_language VALUES('5721','latest_version','Is the latest version','1','0','1','0','en');
INSERT INTO met_language VALUES('5722','be_updated','Can be updated to','1','0','1','0','en');
INSERT INTO met_language VALUES('5723','special_thanks','Special thanks to','1','0','1','0','en');
INSERT INTO met_language VALUES('5724','update_log','Update log','1','0','1','0','en');
INSERT INTO met_language VALUES('5725','get_in','Get in','1','0','1','0','en');
INSERT INTO met_language VALUES('5726','current_version','current version','1','0','1','0','en');
INSERT INTO met_language VALUES('5727','official_information','Official information','1','0','1','0','en');
INSERT INTO met_language VALUES('5728','program_information','Program information','1','0','1','0','en');
INSERT INTO met_language VALUES('5729','recruitment_information','Job Offers','1','0','1','0','en');
INSERT INTO met_language VALUES('5730','system_maintenance','System maintenance','1','0','1','0','en');
INSERT INTO met_language VALUES('5731','permission_download','No permission to download','1','0','1','0','en');
INSERT INTO met_language VALUES('5732','link_remote','Link is not on the remote server','1','0','1','0','en');
INSERT INTO met_language VALUES('5733','try_again','Retry','1','0','1','0','en');
INSERT INTO met_language VALUES('5734','give_installation','Abandon the installation','1','0','1','0','en');
INSERT INTO met_language VALUES('5735','installation_errors','Installation error, may be caused by the following reasons','1','0','1','0','en');
INSERT INTO met_language VALUES('5736','installation_errors','Installation error','1','0','1','0','en');
INSERT INTO met_language VALUES('5737','configuratio_template','Configure the template','1','0','1','0','en');
INSERT INTO met_language VALUES('5738','seconds_background','After a second refresh the background','1','0','1','0','en');
INSERT INTO met_language VALUES('5739','installation_complete1','The installation is complete,','1','0','1','0','en');
INSERT INTO met_language VALUES('5740','installation_complete','The installation is complete','1','0','1','0','en');
INSERT INTO met_language VALUES('5741','installation','installing','1','0','1','0','en');
INSERT INTO met_language VALUES('5742','possible_reasons','Possible Causes','1','0','1','0','en');
INSERT INTO met_language VALUES('5743','download_interrupt','File download interrupted','1','0','1','0','en');
INSERT INTO met_language VALUES('5744','write_permission','The file does not have write permission or the newly created subfolder does not have write permission','1','0','1','0','en');
INSERT INTO met_language VALUES('5745','download','downloading','1','0','1','0','en');
INSERT INTO met_language VALUES('5746','following_documents','The following documents did not modify permissions, can not be upgraded!','1','0','1','0','en');
INSERT INTO met_language VALUES('5747','document_upgrade','System upgrade documentation','1','0','1','0','en');
INSERT INTO met_language VALUES('5748','file_permissions','File permissions detection','1','0','1','0','en');
INSERT INTO met_language VALUES('5749','input_link_address','Please enter the link address','1','0','1','0','en');
INSERT INTO met_language VALUES('5750','enter_replacement','Please enter the replaced text','1','0','1','0','en');
INSERT INTO met_language VALUES('5751','modify_system_rules','System rules do not modify','1','0','1','0','en');
INSERT INTO met_language VALUES('5752','enter_original','Please enter the original text','1','0','1','0','en');
INSERT INTO met_language VALUES('5753','displays_directory','Whether to display the list of files under the root directory','1','0','1','0','en');
INSERT INTO met_language VALUES('5754','anchor_text','Station anchor text','1','0','1','0','en');
INSERT INTO met_language VALUES('5755','yesterday','yesterday','1','0','1','0','en');
INSERT INTO met_language VALUES('5756','today','Nowadays','1','0','1','0','en');
INSERT INTO met_language VALUES('5757','please_select','Please select a section','1','0','1','0','en');
INSERT INTO met_language VALUES('5758','log_successfully','Landed successfully','1','0','1','0','en');
INSERT INTO met_language VALUES('5759','out_of_success','exit successfully','1','0','1','0','en');
INSERT INTO met_language VALUES('5760','password_changing','Pay the password change','1','0','1','0','en');
INSERT INTO met_language VALUES('5761','login_password_changing','Login password change','1','0','1','0','en');
INSERT INTO met_language VALUES('5762','account_information','Account information settings','1','0','1','0','en');
INSERT INTO met_language VALUES('5763','my_bill','Recharge record','1','0','1','0','en');
INSERT INTO met_language VALUES('5764','fine','Featured','1','0','1','0','en');
INSERT INTO met_language VALUES('5765','form_controls1','Form controls','1','0','1','0','en');
INSERT INTO met_language VALUES('5766','form_controls','Form controls','1','0','1','0','en');
INSERT INTO met_language VALUES('5767','to_move','move to','1','0','1','0','en');
INSERT INTO met_language VALUES('5768','copied_to','copy to','1','0','1','0','en');
INSERT INTO met_language VALUES('5769','keep_sorting','Save the order','1','0','1','0','en');
INSERT INTO met_language VALUES('5770','add_primary_columns','Add a column','1','0','1','0','en');
INSERT INTO met_language VALUES('5771','path_variable','For the current application of the root directory, only as a path variable','1','0','1','0','en');
INSERT INTO met_language VALUES('5772','bring_in_more','You can also introduce more than one','1','0','1','0','en');
INSERT INTO met_language VALUES('5773','time_Settings','time setting','1','0','1','0','en');
INSERT INTO met_language VALUES('5774','support_special','Suffix, does not support special characters','1','0','1','0','en');
INSERT INTO met_language VALUES('5775','dont_add','Composition, do not add','1','0','1','0','en');
INSERT INTO met_language VALUES('5776','multiple_keywords','Can set multiple keywords','1','0','1','0','en');
INSERT INTO met_language VALUES('5777','static_page_setup','Empty use the static page settings set','1','0','1','0','en');
INSERT INTO met_language VALUES('5778','structure_mode','Composition way','1','0','1','0','en');
INSERT INTO met_language VALUES('5779','parameter_Settings','Set in parameter setting','1','0','1','0','en');
INSERT INTO met_language VALUES('5780','null_used','Is used to be empty','1','0','1','0','en');
INSERT INTO met_language VALUES('5781','title_cannot_empty!','The title can not be blank!','1','0','1','0','en');
INSERT INTO met_language VALUES('5782','please_enter_title','Please enter the article title','1','0','1','0','en');
INSERT INTO met_language VALUES('5783','home_link_text','Home link text','1','0','1','0','en');
INSERT INTO met_language VALUES('5784','list_on_left','Title on the left of the list page','1','0','1','0','en');
INSERT INTO met_language VALUES('5785','position_navigation','Location navigation prefix name','1','0','1','0','en');
INSERT INTO met_language VALUES('5786','title_words','Title text','1','0','1','0','en');
INSERT INTO met_language VALUES('5787','search_placeholder','Head search placeholder text','1','0','1','0','en');
INSERT INTO met_language VALUES('5788','below_recommended_Settings','The following suggestions use the default settings','1','0','1','0','en');
INSERT INTO met_language VALUES('5789','image_module_explain','Picture module list page shows the number of each line, according to the picture size reasonable set','1','0','1','0','en');
INSERT INTO met_language VALUES('5790','product_module_explain','Product module list page shows the number of each line, according to the picture size reasonable set','1','0','1','0','en');
INSERT INTO met_language VALUES('5791','number_line','Each line shows the number','1','0','1','0','en');
INSERT INTO met_language VALUES('5792','adaptive','Adaptive','1','0','1','0','en');
INSERT INTO met_language VALUES('5793','inside_pages_subtopic','The left side of the page sub-section list','1','0','1','0','en');
INSERT INTO met_language VALUES('5794','hide_default','Hide all by default','1','0','1','0','en');
INSERT INTO met_language VALUES('5795','open_default','Expand by default','1','0','1','0','en');
INSERT INTO met_language VALUES('5796','image_style','Picture style','1','0','1','0','en');
INSERT INTO met_language VALUES('5797','text_style','Text style','1','0','1','0','en');
INSERT INTO met_language VALUES('5798','please_cooperate','Please cooperate with the size of the thumbnail set, the greater the number of each line, the smaller thumbnails and vice versa','1','0','1','0','en');
INSERT INTO met_language VALUES('5799','page_scrolling_visual','Home scrolls the number of visible images','1','0','1','0','en');
INSERT INTO met_language VALUES('5800','article_number_list','Article list shows the quantity','1','0','1','0','en');
INSERT INTO met_language VALUES('5801','short_description_words','Short description of the number of words','1','0','1','0','en');
INSERT INTO met_language VALUES('5802','page_block','Home block','1','0','1','0','en');
INSERT INTO met_language VALUES('5803','moves_right','Move right','1','0','1','0','en');
INSERT INTO met_language VALUES('5804','title_words','Title number of words','1','0','1','0','en');
INSERT INTO met_language VALUES('5805','move_down','Move down','1','0','1','0','en');
INSERT INTO met_language VALUES('5806','commonly_Settings','Common settings','1','0','1','0','en');
INSERT INTO met_language VALUES('5807','links_corner_address','Title and upper right corner link address','1','0','1','0','en');
INSERT INTO met_language VALUES('5808','homepage_configuration','Home quick configuration','1','0','1','0','en');
INSERT INTO met_language VALUES('5809','upload_component','Upload components','1','0','1','0','en');
INSERT INTO met_language VALUES('5810','radio_buttons','single button','1','0','1','0','en');
INSERT INTO met_language VALUES('5811','multiline_text','Multi-line text','1','0','1','0','en');
INSERT INTO met_language VALUES('5812','partitions','Partition','1','0','1','0','en');
INSERT INTO met_language VALUES('5813','delete_information','Are you sure you want to delete this information? Can not be restored after deleted.','1','0','1','0','en');
INSERT INTO met_language VALUES('5814','page_for_details','Details page','1','0','1','0','en');
INSERT INTO met_language VALUES('5815','separated_vertical','Value, separated by vertical lines in the middle. Such as','1','0','1','0','en');
INSERT INTO met_language VALUES('5816','option','Option text','1','0','1','0','en');
INSERT INTO met_language VALUES('5817','radio_set','Radio settings','1','0','1','0','en');
INSERT INTO met_language VALUES('5818','click_button_effect','Click the Save button at the bottom of the page to take effect','1','0','1','0','en');
INSERT INTO met_language VALUES('5819','label_function','Through function labels','1','0','1','0','en');
INSERT INTO met_language VALUES('5820','information_columns4','After the user selects the specified column and saves it, the corresponding variable in the foreground can get the corresponding value.','1','0','1','0','en');
INSERT INTO met_language VALUES('5821','module_identifier','Module identification','1','0','1','0','en');
INSERT INTO met_language VALUES('5822','value_structure','Value structure','1','0','1','0','en');
INSERT INTO met_language VALUES('5823','information_columns3','For example, the article list can only display the column with the information list.','1','0','1','0','en');
INSERT INTO met_language VALUES('5824','information_columns2','You can limit the user\'s choice of columns in order to guide the user to set the correct template.','1','0','1','0','en');
INSERT INTO met_language VALUES('5825','information_columns1','Only select columns with information list (articles, products, pictures, downloads, hiring)','1','0','1','0','en');
INSERT INTO met_language VALUES('5826','only_choose_column','Can only choose a column','1','0','1','0','en');
INSERT INTO met_language VALUES('5827','optional_columns','Optional all fields','1','0','1','0','en');
INSERT INTO met_language VALUES('5828','column_selection','Column selection','1','0','1','0','en');
INSERT INTO met_language VALUES('5829','preservation_effect','Save effective','1','0','1','0','en');
INSERT INTO met_language VALUES('5830','clear_variables','Are you sure you want to clear all the variables?','1','0','1','0','en');
INSERT INTO met_language VALUES('5831','custom_tag','Add a custom label','1','0','1','0','en');
INSERT INTO met_language VALUES('5832','current_template','Current template','1','0','1','0','en');
INSERT INTO met_language VALUES('5833','variables_using_method','How to use variables','1','0','1','0','en');
INSERT INTO met_language VALUES('5834','template_folder_under','Under the template folder','1','0','1','0','en');
INSERT INTO met_language VALUES('5835','delete_template','The template will not be deleted here','1','0','1','0','en');
INSERT INTO met_language VALUES('5836','previewimg','preview','1','0','1','0','en');
INSERT INTO met_language VALUES('5837','template_code','Template number','1','0','1','0','en');
INSERT INTO met_language VALUES('5838','template_Settings','Lane, so save can only be loaded into the template settings.','1','0','1','0','en');
INSERT INTO met_language VALUES('5839','site_directory','Website root directory','1','0','1','0','en');
INSERT INTO met_language VALUES('5840','modify_template','If it is to modify the template, please put the original template','1','0','1','0','en');
INSERT INTO met_language VALUES('5841','template_type','Template type','1','0','1','0','en');
INSERT INTO met_language VALUES('5842','computer_template','Computer template','1','0','1','0','en');
INSERT INTO met_language VALUES('5843','cell_template','Mobile phone template','1','0','1','0','en');
INSERT INTO met_language VALUES('5844','need_manually_create','Need to manually create a template folder','1','0','1','0','en');
INSERT INTO met_language VALUES('5845','new_template','Add a template','1','0','1','0','en');
INSERT INTO met_language VALUES('5846','template_folder','Template folder','1','0','1','0','en');
INSERT INTO met_language VALUES('5847','default_values','Defaults','1','0','1','0','en');
INSERT INTO met_language VALUES('5848','variable_name','Variable name','1','0','1','0','en');
INSERT INTO met_language VALUES('5849','Fill_option','Option value fill in the options','1','0','1','0','en');
INSERT INTO met_language VALUES('5850','press_option','Press option','1','0','1','0','en');
INSERT INTO met_language VALUES('5851','setting_item12','Set the option type','1','0','1','0','en');
INSERT INTO met_language VALUES('5852','setting_item1','This setting will be placed after the selected item','1','0','1','0','en');
INSERT INTO met_language VALUES('5853','location_linkage','Location linkage','1','0','1','0','en');
INSERT INTO met_language VALUES('5854','set_title','Set the title','1','0','1','0','en');
INSERT INTO met_language VALUES('5855','option_set','Option setting','1','0','1','0','en');
INSERT INTO met_language VALUES('5856','detail_page','Detailed page','1','0','1','0','en');
INSERT INTO met_language VALUES('5857','first','First item','1','0','1','0','en');
INSERT INTO met_language VALUES('5858','global','Global','1','0','1','0','en');
INSERT INTO met_language VALUES('5859','label','label','1','0','1','0','en');
INSERT INTO met_language VALUES('5860','special','special','1','0','1','0','en');
INSERT INTO met_language VALUES('5861','slider','Slider','1','0','1','0','en');
INSERT INTO met_language VALUES('5862','color_picker','Color picker','1','0','1','0','en');
INSERT INTO met_language VALUES('5863','sys_editor','editor','1','0','1','0','en');
INSERT INTO met_language VALUES('5864','for','for','1','0','1','0','en');
INSERT INTO met_language VALUES('5865','down_program3','Three columns drop-down, all modules section','1','0','1','0','en');
INSERT INTO met_language VALUES('5866','down_program2','Pull down the three columns','1','0','1','0','en');
INSERT INTO met_language VALUES('5867','down_program1','A column of the drop-down','1','0','1','0','en');
INSERT INTO met_language VALUES('5868','sys_parameter36','Less than','1','0','1','0','en');
INSERT INTO met_language VALUES('5869','text_input','Text input box','1','0','1','0','en');
INSERT INTO met_language VALUES('5870','sys_variables','System variables','1','0','1','0','en');
INSERT INTO met_language VALUES('5871','short_text','Short text','1','0','1','0','en');
INSERT INTO met_language VALUES('5872','class_Settings','Category settings','1','0','1','0','en');
INSERT INTO met_language VALUES('5873','block_set','Block settings','1','0','1','0','en');
INSERT INTO met_language VALUES('5874','title_bar','title','1','0','1','0','en');
INSERT INTO met_language VALUES('5875','verify_password','Please enter the password again','1','0','1','0','en');
INSERT INTO met_language VALUES('5876','down_options','Drop-down option','1','0','1','0','en');
INSERT INTO met_language VALUES('5877','Repeat_password','Repeat password','1','0','1','0','en');
INSERT INTO met_language VALUES('5878','order_number','order number','1','0','1','0','en');
INSERT INTO met_language VALUES('5879','for_details','Details','1','0','1','0','en');
INSERT INTO met_language VALUES('5880','template','template','1','0','1','0','en');
INSERT INTO met_language VALUES('5881','application','Services','1','0','8','0','en');
INSERT INTO met_language VALUES('5882','Prompt_domain','Please enter the domain name','1','0','1','0','en');
INSERT INTO met_language VALUES('5883','Prompt_password','Please enter the password','1','0','1','0','en');
INSERT INTO met_language VALUES('5884','Prompt_alipay','Please enter Alipay account','1','0','1','0','en');
INSERT INTO met_language VALUES('5885','alipay','Alipay','1','0','1','0','en');
INSERT INTO met_language VALUES('5886','account','account number','1','0','1','0','en');
INSERT INTO met_language VALUES('5887','Prompt_email','Please input the email address','1','0','1','0','en');
INSERT INTO met_language VALUES('5888','mailbox','mailbox','1','0','1','0','en');
INSERT INTO met_language VALUES('5889','Prompt_mobile','Please enter the phone number','1','0','1','0','en');
INSERT INTO met_language VALUES('5890','Prompt_cell','Please enter your phone number','1','0','1','0','en');
INSERT INTO met_language VALUES('5891','female','Female','1','0','1','0','en');
INSERT INTO met_language VALUES('5892','male','male','1','0','1','0','en');
INSERT INTO met_language VALUES('5893','Prompt_nickname','Please enter a member nickname','1','0','1','0','en');
INSERT INTO met_language VALUES('5894','nickname','nickname','1','0','1','0','en');
INSERT INTO met_language VALUES('5895','Prompt_user','Please enter your username','1','0','1','0','en');
INSERT INTO met_language VALUES('5896','info_modification','Member information is modified','1','0','1','0','en');
INSERT INTO met_language VALUES('5897','balance','Balance','1','0','1','0','en');
INSERT INTO met_language VALUES('5898','amount_operation','Operating amount','1','0','1','0','en');
INSERT INTO met_language VALUES('5899','into_model','Deposit','1','0','1','0','en');
INSERT INTO met_language VALUES('5900','buy_records','Purchase History','1','0','1','0','en');
INSERT INTO met_language VALUES('5901','info_editing','Information editing','1','0','1','0','en');
INSERT INTO met_language VALUES('5902','loggedin','You are logged in!','1','0','1','0','en');
INSERT INTO met_language VALUES('5903','registration','registered','1','0','1','0','en');
INSERT INTO met_language VALUES('5904','landing','Login','1','0','1','0','en');
INSERT INTO met_language VALUES('5905','page_range','Page range','1','0','1','0','en');
INSERT INTO met_language VALUES('5906','designer_special','If the template designer uses a special display, the setting here is invalid.','1','0','1','0','en');
INSERT INTO met_language VALUES('5907','shuffling_closed','Large carousel is turned off or set to show in other ways','1','0','1','0','en');
INSERT INTO met_language VALUES('5908','click_enter','Expand more settings','1','0','1','0','en');
INSERT INTO met_language VALUES('5909','such_uploadfile','(Such as upload swf file)','1','0','1','0','en');
INSERT INTO met_language VALUES('5910','recruitment_info','Can affect articles, products, pictures, hiring module information list, not all links.','1','0','1','0','en');
INSERT INTO met_language VALUES('5911','sys_navigation','Navigation: column settings can be adjusted whether the new window opens.','1','0','1','0','en');
INSERT INTO met_language VALUES('5912','sys_navigation1','This feature preview can not see the effect, you need to save the refresh front page to experience.','1','0','1','0','en');
INSERT INTO met_language VALUES('5913','sys_navigation2','When displaying the column list, the pictures need to be uploaded in the column settings (column pictures).','1','0','1','0','en');
INSERT INTO met_language VALUES('5914','more_options','more options','1','0','1','0','en');
INSERT INTO met_language VALUES('5915','suggested_size','Recommended size','1','0','1','0','en');
INSERT INTO met_language VALUES('5916','current_input','(Currently entered','1','0','1','0','en');
INSERT INTO met_language VALUES('5917','sys_characters','Characters)','1','0','1','0','en');
INSERT INTO met_language VALUES('5918','settings_effect','The setting is in effect','1','0','1','0','en');
INSERT INTO met_language VALUES('5919','website_information','Website information','1','0','1','0','en');
INSERT INTO met_language VALUES('5920','email_Settings','Mail sending settings','1','0','1','0','en');
INSERT INTO met_language VALUES('5921','third_party_code','Third-party code','1','0','1','0','en');
INSERT INTO met_language VALUES('5922','technology_business','No technical commercial authorization','1','0','1','0','en');
INSERT INTO met_language VALUES('5923','purchase_in','Purchase','1','0','1','0','en');
INSERT INTO met_language VALUES('5924','please_login','please log in first!','1','0','1','0','en');
INSERT INTO met_language VALUES('5925','server_failed','Link remote server failed','1','0','1','0','en');
INSERT INTO met_language VALUES('5926','permission_download','No permission to download! !','1','0','1','0','en');
INSERT INTO met_language VALUES('5927','Refresh_seconds','Second after refresh the page','1','0','1','0','en');
INSERT INTO met_language VALUES('5928','in_processing','Processing','1','0','1','0','en');
INSERT INTO met_language VALUES('5929','sys_results','Results','1','0','1','0','en');
INSERT INTO met_language VALUES('5930','Display_first','Show the first','1','0','1','0','en');
INSERT INTO met_language VALUES('5931','result_total','Total results','1','0','1','0','en');
INSERT INTO met_language VALUES('5932','Results_filtering','Filter results','1','0','1','0','en');
INSERT INTO met_language VALUES('5933','data_empty','The data in the table is empty','1','0','1','0','en');
INSERT INTO met_language VALUES('5934','Of_load','loading','1','0','1','0','en');
INSERT INTO met_language VALUES('5935','on_page','last page','1','0','1','0','en');
INSERT INTO met_language VALUES('5936','next_page','next page','1','0','1','0','en');
INSERT INTO met_language VALUES('5937','at_page','last page','1','0','1','0','en');
INSERT INTO met_language VALUES('5938','ascending_order','Sort this column in ascending order','1','0','1','0','en');
INSERT INTO met_language VALUES('5939','descending_order','Sort this column in descending order','1','0','1','0','en');
INSERT INTO met_language VALUES('5940','background_page','Background Home','1','0','1','0','en');
INSERT INTO met_language VALUES('5941','modify_information','modify personal information','1','0','1','0','en');
INSERT INTO met_language VALUES('5942','sys_select','Featured','1','0','1','0','en');
INSERT INTO met_language VALUES('5943','should_used','Application','1','0','1','0','en');
INSERT INTO met_language VALUES('5944','sys_template','Template','1','0','1','0','en');
INSERT INTO met_language VALUES('5945','sys_purchase','buy','1','0','1','0','en');
INSERT INTO met_language VALUES('5946','sys_payment','Pay','1','0','1','0','en');
INSERT INTO met_language VALUES('5947','extension_school','Rice Extension College','1','0','1','0','en');
INSERT INTO met_language VALUES('5948','the_bit','Bit','1','0','1','0','en');
INSERT INTO met_language VALUES('5949','the_server','server','1','0','1','0','en');
INSERT INTO met_language VALUES('5950','the_version','version','1','0','1','0','en');
INSERT INTO met_language VALUES('5951','marketing','Marketing','1','0','8','0','en');
INSERT INTO met_language VALUES('5952','safety_efficiency','Safety and efficiency','1','0','8','0','en');
INSERT INTO met_language VALUES('5953','data_processing','Backup and recovery','1','0','8','0','en');
INSERT INTO met_language VALUES('5954','computer','computer','1','0','1','0','en');
INSERT INTO met_language VALUES('5955','appearance','Exterior','1','0','1','0','en');
INSERT INTO met_language VALUES('5956','seo_optimization','SEO optimization','1','0','8','0','en');
INSERT INTO met_language VALUES('5957','the_user','user','1','0','8','0','en');
INSERT INTO met_language VALUES('5958','mobile_edition','Mobile version','1','0','1','0','en');
INSERT INTO met_language VALUES('5959','safety','Safety','1','0','8','0','en');
INSERT INTO met_language VALUES('5960','attention','attention','1','0','1','0','en');
INSERT INTO met_language VALUES('5961','author','Author','1','0','1','0','en');
INSERT INTO met_language VALUES('5962','news_prompt','You have a message, please check!','1','0','1','0','en');
INSERT INTO met_language VALUES('5963','news_prompt1','You have a feedback, please check!','1','0','1','0','en');
INSERT INTO met_language VALUES('5964','sys_authorization','Commercial license to be able to enjoy technical support services','1','0','1','0','en');
INSERT INTO met_language VALUES('5965','sys_authorization1','Enter the business license','1','0','1','0','en');
INSERT INTO met_language VALUES('5966','sys_authorization2','Understand commercial licensing','1','0','1','0','en');
INSERT INTO met_language VALUES('5967','detection','checking','1','0','1','0','en');
INSERT INTO met_language VALUES('5968','recommended_tems','Recommended Applications','1','0','1','0','en');
INSERT INTO met_language VALUES('5969','more_tems','More templates','1','0','1','0','en');
INSERT INTO met_language VALUES('5970','usernametips','If you have official website or exchange forum account, please register the same, because we are about to synchronize the account of the three platforms','1','0','1','0','en');
INSERT INTO met_language VALUES('5971','authorization_level','Authorization level','1','0','1','0','en');
INSERT INTO met_language VALUES('5972','technical_support','Get technical support','1','0','1','0','en');
INSERT INTO met_language VALUES('5973','entry_authorization','Re-enter the authorization','1','0','1','0','en');
INSERT INTO met_language VALUES('5974','title_description','Please enter Title description','1','0','1','0','en');
INSERT INTO met_language VALUES('5975','tab_settings','Product Module tab settings','1','0','1','0','en');
INSERT INTO met_language VALUES('5976','display_number','Number of tabs displayed','1','0','1','0','en');
INSERT INTO met_language VALUES('5977','corresponding_products','Please fill in the corresponding contents in the content management','1','0','1','0','en');
INSERT INTO met_language VALUES('5978','tab_title1','Tab a title','1','0','1','0','en');
INSERT INTO met_language VALUES('5979','tab_title2','Tab two titles','1','0','1','0','en');
INSERT INTO met_language VALUES('5980','tab_title3','Tab three titles','1','0','1','0','en');
INSERT INTO met_language VALUES('5981','tab_title4','Tab four titles','1','0','1','0','en');
INSERT INTO met_language VALUES('5982','tab_title5','Tab Five Title','1','0','1','0','en');
INSERT INTO met_language VALUES('5983','menu_settings','Bottom fixed menu settings','1','0','1','0','en');
INSERT INTO met_language VALUES('5984','settings_page','Click here to enter the settings page','1','0','1','0','en');
INSERT INTO met_language VALUES('5985','height_setting','Height setting (width follows interface width)','1','0','1','0','en');
INSERT INTO met_language VALUES('5986','recommended_template','Recommended template','1','0','1','0','en');
INSERT INTO met_language VALUES('5987','download_prompt','Ongoing download, please do not operate the page!','1','0','1','0','en');
INSERT INTO met_language VALUES('5988','purchase_application','The purchase of the application can only act on the current website','1','0','1','0','en');
INSERT INTO met_language VALUES('5989','function_settings','Function setting','1','0','1','0','en');
INSERT INTO met_language VALUES('5990','add_menu','Add menu','1','0','1','0','en');
INSERT INTO met_language VALUES('5991','menu_effect','Menu effect','1','0','1','0','en');
INSERT INTO met_language VALUES('5992','noadd_menu','No menu added yet','1','0','1','0','en');
INSERT INTO met_language VALUES('5993','edit_menu','Edit menu','1','0','1','0','en');
INSERT INTO met_language VALUES('5994','menu_information','Menu information','1','0','1','0','en');
INSERT INTO met_language VALUES('5995','menu_information1','Name up to 4 Chinese characters (English characters counted half Chinese characters)','1','0','1','0','en');
INSERT INTO met_language VALUES('5996','style_settings','Style set','1','0','1','0','en');
INSERT INTO met_language VALUES('5997','icon_color','Icon color','1','0','1','0','en');
INSERT INTO met_language VALUES('5998','icon_color1','Please click the color box to the right of the input box to set the color, the color is white when empty','1','0','1','0','en');
INSERT INTO met_language VALUES('5999','text_color','Text color','1','0','1','0','en');
INSERT INTO met_language VALUES('6000','menu_click_effect','Menu click effect','1','0','1','0','en');
INSERT INTO met_language VALUES('6001','dial_telephone','dial number','1','0','1','0','en');
INSERT INTO met_language VALUES('6002','customer_service','QQ customer service','1','0','1','0','en');
INSERT INTO met_language VALUES('6003','map_location','Map location','1','0','1','0','en');
INSERT INTO met_language VALUES('6004','home_page_link','Home link','1','0','1','0','en');
INSERT INTO met_language VALUES('6005','column_links','Column link','1','0','1','0','en');
INSERT INTO met_language VALUES('6006','phone_number1','telephone number','1','0','1','0','en');
INSERT INTO met_language VALUES('6007','dial_telephone1','When the phone is accessed, tap the menu to make a call','1','0','1','0','en');
INSERT INTO met_language VALUES('6008','customer_service1','When the phone is accessed, tap the menu to make a call','1','0','1','0','en');
INSERT INTO met_language VALUES('6009','qq_number','QQ number','1','0','1','0','en');
INSERT INTO met_language VALUES('6010','qq_number1','Please confirm QQ online open, if not open, please open to QQ merchants.','1','0','1','0','en');
INSERT INTO met_language VALUES('6011','the_jump','Click to jump','1','0','1','0','en');
INSERT INTO met_language VALUES('6012','map_location1','Click the menu to jump to map information page','1','0','1','0','en');
INSERT INTO met_language VALUES('6013','map_location2','Enter the address and click Search, the map below will be positioned to the corresponding location','1','0','1','0','en');
INSERT INTO met_language VALUES('6014','the_menu','Bottom menu','1','0','1','0','en');
INSERT INTO met_language VALUES('6015','menu_management','Menu management','1','0','1','0','en');
INSERT INTO met_language VALUES('6016','the_menu1','Can create up to 4 menus, each menu has a call, QQ customer service, map location, home page link, link 5 types of options.','1','0','1','0','en');
INSERT INTO met_language VALUES('6017','menu_functions','Menu function','1','0','1','0','en');
INSERT INTO met_language VALUES('6018','menu_functions1','When closed, the bottom menu will not be displayed','1','0','1','0','en');
INSERT INTO met_language VALUES('6019','display_effect','display effect','1','0','1','0','en');
INSERT INTO met_language VALUES('6020','display_effect1','Icon expandable','1','0','1','0','en');
INSERT INTO met_language VALUES('6021','display_effect2','Bottom fixed','1','0','1','0','en');
INSERT INTO met_language VALUES('6022','display_effect3','Set the bottom menu to show the effect','1','0','1','0','en');
INSERT INTO met_language VALUES('6023','background_color','background color','1','0','1','0','en');
INSERT INTO met_language VALUES('6024','pink','Pink','1','0','1','0','en');
INSERT INTO met_language VALUES('6025','custom_colors','Custom color','1','0','1','0','en');
INSERT INTO met_language VALUES('6026','custom_picture','Custom pictures','1','0','1','0','en');
INSERT INTO met_language VALUES('6027','custom_colors1','Enter the hexadecimal color value, when empty, the color is blue','1','0','1','0','en');
INSERT INTO met_language VALUES('6028','custom_picture1','Set the bottom menu background image, the recommended size of the image is 340 X 45 pixels','1','0','1','0','en');
INSERT INTO met_language VALUES('6029','app_datele','Are you sure you want to uninstall this app? After unloading the corresponding data will be emptied!','1','0','1','0','en');
INSERT INTO met_language VALUES('6030','map_location3','Click on the map to move the icon','1','0','1','0','en');
INSERT INTO met_language VALUES('6031','update_permissions','After the cancellation of the administrator can not be operated online upgrade','1','0','1','0','en');
INSERT INTO met_language VALUES('6032','external_links','external link','1','0','1','0','en');
INSERT INTO met_language VALUES('6033','appmarket_jurisdiction','You do not have permission to view the app market, please contact the administrator to open.','1','0','1','0','en');
INSERT INTO met_language VALUES('6034','setup_permissions','You do not have set permissions, please contact the administrator to open.','1','0','1','0','en');
INSERT INTO met_language VALUES('6035','permission_upgrade','Upgrade permissions','1','0','1','0','en');
INSERT INTO met_language VALUES('6036','metinfo_explain','MetInfo is a great corporate website management system (CMS)! Free to use Oh!','1','0','1','0','en');
INSERT INTO met_language VALUES('6037','share_friends','Share with friends','1','0','1','0','en');
INSERT INTO met_language VALUES('6038','installation_template','Official 6.0 new template Please install directly in the store or use the official template management tools in My Apps to import Add <br>','1','0','1','0','en');
INSERT INTO met_language VALUES('6039','install_application','If you need to install your own template, please go to the application market','1','0','1','0','en');
INSERT INTO met_language VALUES('6040','template_assistant','Template production assistant','1','0','1','0','en');
INSERT INTO met_language VALUES('6041','specified_link','Click to jump to the specified link','1','0','1','0','en');
INSERT INTO met_language VALUES('6042','release','Add to','1','0','1','0','en');
INSERT INTO met_language VALUES('6043','administration','management','1','0','1','0','en');
INSERT INTO met_language VALUES('6044','customers','Customer service','1','0','1','0','en');
INSERT INTO met_language VALUES('6045','seo','SEO','1','0','1','0','en');
INSERT INTO met_language VALUES('6046','member','member','1','0','1','0','en');
INSERT INTO met_language VALUES('6047','language','Language','1','0','1','0','en');
INSERT INTO met_language VALUES('6048','htmltopseudo','Static page pseudo-static','1','0','1','0','en');
INSERT INTO met_language VALUES('6049','htmltopseudotips','Use pseudo-static way to achieve static page URL, the current static page URL unchanged. SEO effect will not be affected. Need space to support pseudo-static, and will delete the static page file.','1','0','1','0','en');
INSERT INTO met_language VALUES('6050','htmlnocreatetips','Static page URL has been converted to pseudo-static, without generating static pages','1','0','1','0','en');
INSERT INTO met_language VALUES('6051','timedrelease','Regular release','1','0','1','0','en');
INSERT INTO met_language VALUES('6052','timedreleasetips','If you set the release time to be the future time, you can release it at a specified time. This feature does not support static pages. For example, you need to use this function for static pages. Set the static page function to be pseudo-static.','1','0','1','0','en');
INSERT INTO met_language VALUES('6053','clickset','Click settings','1','0','1','0','en');
INSERT INTO met_language VALUES('6054','timelisttips1','(Will be','1','0','1','0','en');
INSERT INTO met_language VALUES('6055','timelisttips2','release)','1','0','1','0','en');
INSERT INTO met_language VALUES('6056','mod_rewrite_column','Open pseudo-static space environment configuration required to open the mod_rewrite module, if not open the contact space solution.','1','0','1','0','en');
INSERT INTO met_language VALUES('6057','displaytype2','Front desk hidden','1','0','0','0','en');
INSERT INTO met_language VALUES('6058','js73','Static page name has been used','1','0','0','0','en');
INSERT INTO met_language VALUES('6059','js74','Only supports Chinese, uppercase and lowercase letters, numbers, underline','1','0','0','0','en');
INSERT INTO met_language VALUES('6060','js75','Name available','1','0','0','0','en');
INSERT INTO met_language VALUES('6061','js76','Please add columns and then set the page content on this page','1','0','0','0','en');
INSERT INTO met_language VALUES('6062','unrecom','Cancel recommended','1','0','0','0','en');
INSERT INTO met_language VALUES('6063','untop','Unpin','1','0','0','0','en');
INSERT INTO met_language VALUES('6064','timedreleasecancel','Cancel regular release','1','0','0','0','en');
INSERT INTO met_language VALUES('6065','modistauts','Status changes','1','0','0','0','en');
INSERT INTO met_language VALUES('6066','shelvesup','Shelves','1','0','0','0','en');
INSERT INTO met_language VALUES('6067','shelvesdown','Under the shelf','1','0','0','0','en');
INSERT INTO met_language VALUES('6068','goods','commodity','1','0','0','0','en');
INSERT INTO met_language VALUES('6069','js77','The name of the background folder supports only uppercase and lowercase letters, numbers, and underscores','1','0','0','0','en');
INSERT INTO met_language VALUES('6070','js78','Administrator name can not be repeated','1','0','0','0','en');
INSERT INTO met_language VALUES('6071','banner_pcheight_v6','Computer-side height','1','0','0','0','en');
INSERT INTO met_language VALUES('6072','banner_setalert_v6','Fill the value, (eg 300, representing 300px) suggested adaptive height','1','0','0','0','en');
INSERT INTO met_language VALUES('6073','banner_pidheight_v6','Tablet-side height','1','0','0','0','en');
INSERT INTO met_language VALUES('6074','banner_phoneheight_v6','Phone side height','1','0','0','0','en');
INSERT INTO met_language VALUES('6075','banner_height_v6','height','1','0','0','0','en');
INSERT INTO met_language VALUES('6076','banner_imgtitlecolor_v6','Picture title color','1','0','0','0','en');
INSERT INTO met_language VALUES('6077','banner_needtempsupport_v6','This setting requires template support','1','0','0','0','en');
INSERT INTO met_language VALUES('6078','banner_imgdesc_v6','image description','1','0','0','0','en');
INSERT INTO met_language VALUES('6079','banner_imgdesccolor_v6','Picture description color','1','0','0','0','en');
INSERT INTO met_language VALUES('6080','banner_imgwordpos_v6','Image text location','1','0','0','0','en');
INSERT INTO met_language VALUES('6081','posleft','left','1','0','0','0','en');
INSERT INTO met_language VALUES('6082','posright','right','1','0','0','0','en');
INSERT INTO met_language VALUES('6083','posup','on','1','0','0','0','en');
INSERT INTO met_language VALUES('6084','poslower','under','1','0','0','0','en');
INSERT INTO met_language VALUES('6085','poscenter','Center','1','0','0','0','en');
INSERT INTO met_language VALUES('6086','batch_wm_v6','Batch watermarking','1','0','0','0','en');
INSERT INTO met_language VALUES('6087','batch_rmwm_v6','Remove the watermark','1','0','0','0','en');
INSERT INTO met_language VALUES('6088','batch_addwm_v6','Add watermark','1','0','0','0','en');
INSERT INTO met_language VALUES('6089','admin_movetocolumn_v6','Move to the specified column','1','0','0','0','en');
INSERT INTO met_language VALUES('6090','admin_copytocolumn_v6','Copy to the specified column','1','0','0','0','en');
INSERT INTO met_language VALUES('6091','doogsimg','product picture','1','0','0','0','en');
INSERT INTO met_language VALUES('6092','admin_holdcanrlchoose_v6','Hold down Ctrl to select multiple','1','0','0','0','en');
INSERT INTO met_language VALUES('6093','admin_colunmmanage_v6','Column','1','0','0','0','en');
INSERT INTO met_language VALUES('6094','admin_dropsort_v6','Drag the picture to adjust the picture order','1','0','0','0','en');
INSERT INTO met_language VALUES('6095','parmanage','Parameter management','1','0','0','0','en');
INSERT INTO met_language VALUES('6096','refresh','Refresh','1','0','0','0','en');
INSERT INTO met_language VALUES('6097','admin_seotips1_v6','The system is automatically formed when empty, you can set the rules to the SEO settings.','1','0','0','0','en');
INSERT INTO met_language VALUES('6098','desctext','Description text','1','0','0','0','en');
INSERT INTO met_language VALUES('6099','admin_seotips3_v6','Appears at the bottom of the item listing page to syndicate the content.','1','0','0','0','en');
INSERT INTO met_language VALUES('6100','admin_seotips2_v6','Empty system automatically crawls the product details.','1','0','0','0','en');
INSERT INTO met_language VALUES('6101','linkto','Link to','1','0','0','0','en');
INSERT INTO met_language VALUES('6102','admin_seotips6_v6','Timely release does not support static pages, please close the static pages. (Pseudo-static can be used)','1','0','0','0','en');
INSERT INTO met_language VALUES('6103','releasenow','Publish now','1','0','0','0','en');
INSERT INTO met_language VALUES('6104','publish','Post product','1','0','0','0','en');
INSERT INTO met_language VALUES('6105','js79','Views','1','0','0','0','en');
INSERT INTO met_language VALUES('6106','added','Added','1','0','0','0','en');
INSERT INTO met_language VALUES('6107','admin_tagadder_v6','Tag augmentor','1','0','0','0','en');
INSERT INTO met_language VALUES('6108','js80','determine','1','0','0','0','en');
INSERT INTO met_language VALUES('6109','column_littleicon_v6','Small icon icon','1','0','0','0','en');
INSERT INTO met_language VALUES('6110','column_choosicon_v6','Choice icon','1','0','0','0','en');
INSERT INTO met_language VALUES('6111','column_backiconlist_v6','Return to the icon library list','1','0','0','0','en');
INSERT INTO met_language VALUES('6112','column_saveicon_v6','Click to select the icon and save','1','0','0','0','en');
INSERT INTO met_language VALUES('6113','column_addcolumn_v6','Add a new section','1','0','0','0','en');
INSERT INTO met_language VALUES('6114','column_inputcolumnfolder_v6','Enter the name of the section folder','1','0','0','0','en');
INSERT INTO met_language VALUES('6115','column_pageedito_v6','Page edit','1','0','0','0','en');
INSERT INTO met_language VALUES('6116','browserupdatetips','You are using a <strong> obsolete </ strong> browser. Please <a href=https://browsehappy.com/ target=_blank> upgrade your browser </a> to enhance your experience.','1','0','0','0','en');
INSERT INTO met_language VALUES('6117','iconsettips','The same block recommended to use the same set of icons in the icon library to maintain the unity of icon style style.','1','0','0','0','en');
INSERT INTO met_language VALUES('6118','column_selecticonlib_v6','Icon library selection','1','0','0','0','en');
INSERT INTO met_language VALUES('6119','column_viewicon_v6','Browse icons','1','0','0','0','en');
INSERT INTO met_language VALUES('6120','column_selecticon_v6','Icon selection','1','0','0','0','en');
INSERT INTO met_language VALUES('6121','tips1_v6','Empty the system automatically crawls the details of the top part of the text','1','0','0','0','en');
INSERT INTO met_language VALUES('6122','tips2_v6','Appears at the bottom of the detail page to aggregate the content','1','0','0','0','en');
INSERT INTO met_language VALUES('6123','tips3_v6','Click the + sign to enter the option name, and then click the + sign or Enter to complete the add, click \"OK\", you need to click the bottom of the page \"Save\" button to complete the data save!','1','0','0','0','en');
INSERT INTO met_language VALUES('6124','tips4_v6','Please enter the URL (need to include http or https), after setting the access to the information will be directed to the set URL','1','0','0','0','en');
INSERT INTO met_language VALUES('6125','tips5_v6','Timely release does not support static pages, please close the static pages. (Pseudo-static can be used)','1','0','0','0','en');
INSERT INTO met_language VALUES('6126','tips6_v6','Empty system is automatically formed, you can go to the marketing-SEO set rules.','1','0','0','0','en');
INSERT INTO met_language VALUES('6127','tips7_v6','When not manually upload pictures, it will automatically extract the first picture as a cover (this feature requires template support)','1','0','0','0','en');
INSERT INTO met_language VALUES('6128','coverimg','cover image','1','0','0','0','en');
INSERT INTO met_language VALUES('6129','articletitle','Article title','1','0','0','0','en');
INSERT INTO met_language VALUES('6130','htmTip3','Generate homepage','1','0','5','0','en');
INSERT INTO met_language VALUES('6131','choicecolor','choose the color','1','0','0','0','en');
INSERT INTO met_language VALUES('6132','js81','You do not have the authority to contact the administrator','1','0','0','0','en');
INSERT INTO met_language VALUES('6133','help1','Help tutorial','1','0','0','0','en');
INSERT INTO met_language VALUES('6134','help2','friendly reminder','1','0','0','0','en');
INSERT INTO met_language VALUES('6135','tips8_v6','There is a serious risk in the name of your site admin folder and I suggest you change it as soon as possible','1','0','0','0','en');
INSERT INTO met_language VALUES('6136','nohint','Do not remind again','1','0','0','0','en');
INSERT INTO met_language VALUES('6137','tochange','Go to edit','1','0','0','0','en');
INSERT INTO met_language VALUES('6138','close','shut down','1','0','0','0','en');
INSERT INTO met_language VALUES('6139','homepage','Home','1','0','0','0','en');
INSERT INTO met_language VALUES('6140','backstage','Panel','1','0','0','0','en');
INSERT INTO met_language VALUES('6141','visualization','Visual','1','0','0','0','en');
INSERT INTO met_language VALUES('6142','opfailed','operation failed','1','0','0','0','en');
INSERT INTO met_language VALUES('6143','unread','Not read','1','0','0','0','en');
INSERT INTO met_language VALUES('6144','savesuccess','Saved successfully','1','0','0','0','en');
INSERT INTO met_language VALUES('6145','language_outputlang_v6','Export language packs','1','0','0','0','en');
INSERT INTO met_language VALUES('6146','language_batchreplace_v6','Bulk replacement language','1','0','0','0','en');
INSERT INTO met_language VALUES('6147','language_copysetting_v6','Copy the basic settings','1','0','0','0','en');
INSERT INTO met_language VALUES('6148','notcopy','Do not copy','1','0','0','0','en');
INSERT INTO met_language VALUES('6149','language_tips1_v6','Based on the selected language copy all the parameters except column content configuration','1','0','0','0','en');
INSERT INTO met_language VALUES('6150','language_tips2_v6','Based on the selected language copy section and content information (share the selected language pictures, attachments, etc.)','1','0','0','0','en');
INSERT INTO met_language VALUES('6151','websitetheme','Website theme style','1','0','0','0','en');
INSERT INTO met_language VALUES('6152','language_tips3_v6','Set parameters based on the selected language copy template','1','0','0','0','en');
INSERT INTO met_language VALUES('6153','language_backlangchange_v6','Background language switch','1','0','0','0','en');
INSERT INTO met_language VALUES('6154','language_updatelang_v6','Update language pack data <br> Please paste in exactly as you wish','1','0','0','0','en');
INSERT INTO met_language VALUES('6155','message_mailtext_v6',' submitting a message','1','0','0','0','en');
INSERT INTO met_language VALUES('6156','nopicture','No picture','1','0','0','0','en');
INSERT INTO met_language VALUES('6157','message_tips1_v6','Prompt text, blank display, enter the text disappears','1','0','0','0','en');
INSERT INTO met_language VALUES('6158','onlone_onlinelist_v6','Customer list','1','0','0','0','en');
INSERT INTO met_language VALUES('6159','onlone_online_v6','online service','1','0','0','0','en');
INSERT INTO met_language VALUES('6160','online_csname_v6','Customer service name','1','0','0','0','en');
INSERT INTO met_language VALUES('6161','online_taobaocs_v6','Taobao Want','1','0','0','0','en');
INSERT INTO met_language VALUES('6162','online_alics_v6','Ali Want','1','0','0','0','en');
INSERT INTO met_language VALUES('6163','online_tips1_v6','Add QQ need to [shang.qq.com] login in the 【promotion tools - set??security level choose to be completely open, otherwise it will display \"not enabled\" QQ number added to the need to personal QQ settings - permission settings Inside, open the temporary session function, otherwise click QQ, will prompt to add friends to dialogue','1','0','0','0','en');
INSERT INTO met_language VALUES('6164','parameter7','City choice','1','0','0','0','en');
INSERT INTO met_language VALUES('6165','confirm','determine','1','0','0','0','en');
INSERT INTO met_language VALUES('6166','submit','save','1','0','0','0','en');
INSERT INTO met_language VALUES('6167','column1','Column 1','1','0','0','0','en');
INSERT INTO met_language VALUES('6168','column2','Part 2','1','0','0','0','en');
INSERT INTO met_language VALUES('6169','frontshow','Front display','1','0','0','0','en');
INSERT INTO met_language VALUES('6170','fronthidden','Front desk hidden','1','0','0','0','en');
INSERT INTO met_language VALUES('6171','state','status','1','0','0','0','en');
INSERT INTO met_language VALUES('6172','visitcount','Views','1','0','0','0','en');
INSERT INTO met_language VALUES('6173','tips9_v6','Support Chinese, uppercase and lowercase letters, numbers, underline','1','0','0','0','en');
INSERT INTO met_language VALUES('6174','tips10_v6','Custom page title','1','0','0','0','en');
INSERT INTO met_language VALUES('6175','goodsdetails','product details','1','0','0','0','en');
INSERT INTO met_language VALUES('6176','selectcolumn','Please select the column','1','0','0','0','en');
INSERT INTO met_language VALUES('6177','tips11_v6','You can drag the picture to adjust the picture order.','1','0','0','0','en');
INSERT INTO met_language VALUES('6178','tips12_v6','Hold down Ctrl to select multiple','1','0','0','0','en');
INSERT INTO met_language VALUES('6179','columumanage','Column','1','0','0','0','en');
INSERT INTO met_language VALUES('6180','titletips','Title (name)','1','0','0','0','en');
INSERT INTO met_language VALUES('6181','recyclere_tips1_v6','Only support for (news, product, download, picture) module content.','1','0','0','0','en');
INSERT INTO met_language VALUES('6182','seotips1','Filtering does not appear in the first level of navigation','1','0','0','0','en');
INSERT INTO met_language VALUES('6183','seotips2','The site generated by the site only a first column and the column displayed in the navigation bar. <br /> do not display content and columns, will not be generated in the site map.','1','0','0','0','en');
INSERT INTO met_language VALUES('6184','seotips3','Compared to the pure static function, pseudo-static more suitable for less information content of the corporate website, both to meet SEO optimization, but also easy to manage.','1','0','0','0','en');
INSERT INTO met_language VALUES('6185','defaultlangtag','Default language ID','1','0','0','0','en');
INSERT INTO met_language VALUES('6186','seotips4','After the default language flag is enabled, the default language pseudo-static file will be added at the end of a \"- language label\", such as \"-cn\"','1','0','0','0','en');
INSERT INTO met_language VALUES('6187','uisetTips3','The current page does not have the parameters that can be set. Click the Set and Contents buttons of the corresponding block in the page to set','1','0','0','0','en');
INSERT INTO met_language VALUES('6188','theme_tips1_v6','Image recommended size: 500 * 500 (pixels)','1','0','0','0','en');
INSERT INTO met_language VALUES('6189','theme_tips2_v6','Empty call computer version of LOGO, the recommended size: 130 * 50 (pixels)','1','0','0','0','en');
INSERT INTO met_language VALUES('6190','replacemethod','Replacement','1','0','0','0','en');
INSERT INTO met_language VALUES('6191','replacemeth1','Replace the current picture file','1','0','0','0','en');
INSERT INTO met_language VALUES('6192','replacemeth2','Keep the current picture file, upload a new picture','1','0','0','0','en');
INSERT INTO met_language VALUES('6193','uploadimg','upload image','1','0','0','0','en');
INSERT INTO met_language VALUES('6194','addbaricon','Address bar icon','1','0','0','0','en');
INSERT INTO met_language VALUES('6195','webset_tips1_v6','If you can not display the new upload icon, clear the browser cache access.','1','0','0','0','en');
INSERT INTO met_language VALUES('6196','webset_tips2_v6','Click to create ICO','1','0','0','0','en');
INSERT INTO met_language VALUES('6197','icontips','.ico file.','1','0','0','0','en');
INSERT INTO met_language VALUES('6198','PC','Computer side','1','0','0','0','en');
INSERT INTO met_language VALUES('6199','Mobile','Mobile terminal','1','0','0','0','en');
INSERT INTO met_language VALUES('6200','memberist','member list','1','0','0','0','en');
INSERT INTO met_language VALUES('6201','membergroup','member group','1','0','0','0','en');
INSERT INTO met_language VALUES('6202','memberattribute','Member properties','1','0','0','0','en');
INSERT INTO met_language VALUES('6203','memberfunc','Member function settings','1','0','0','0','en');
INSERT INTO met_language VALUES('6204','thirdlogin','Social login','1','0','0','0','en');
INSERT INTO met_language VALUES('6205','mailcontentsetting','Mail content settings','1','0','0','0','en');
INSERT INTO met_language VALUES('6206','user_tips1_v6','You can register','1','0','0','0','en');
INSERT INTO met_language VALUES('6207','user_tips2_v6','Contains illegal characters','1','0','0','0','en');
INSERT INTO met_language VALUES('6208','user_tips3_v6','Username already exists','1','0','0','0','en');
INSERT INTO met_language VALUES('6209','user_tips4_v6','Please enter the 6-30 password','1','0','0','0','en');
INSERT INTO met_language VALUES('6210','edsuccess','Edited successfully','1','0','0','0','en');
INSERT INTO met_language VALUES('6211','weixinlogin','Wechat login','1','0','0','0','en');
INSERT INTO met_language VALUES('6212','sinalogin','Weibo login','1','0','0','0','en');
INSERT INTO met_language VALUES('6213','qqlogin','QQ login','1','0','0','0','en');
INSERT INTO met_language VALUES('6214','register','registered','1','0','0','0','en');
INSERT INTO met_language VALUES('6215','lastactive','Last active','1','0','0','0','en');
INSERT INTO met_language VALUES('6216','source','source','1','0','0','0','en');
INSERT INTO met_language VALUES('6217','bindingmail','Bind the mailbox','1','0','0','0','en');
INSERT INTO met_language VALUES('6218','bindingmobile','Binding phone','1','0','0','0','en');
INSERT INTO met_language VALUES('6219','membergroupname','Member name','1','0','0','0','en');
INSERT INTO met_language VALUES('6220','systips1','You do not have permission to access this content! Please login to visit!','1','0','0','0','en');
INSERT INTO met_language VALUES('6221','systips2','Your user group does not have permission to access this content!','1','0','0','0','en');
INSERT INTO met_language VALUES('6222','unrestricted','not limited','1','0','0','0','en');
INSERT INTO met_language VALUES('6223','dowloadauthority','Download permissions','1','0','0','0','en');
INSERT INTO met_language VALUES('6224','save','save','1','0','0','0','en');
INSERT INTO met_language VALUES('6225','hiddensetting','Hide settings','1','0','0','0','en');
INSERT INTO met_language VALUES('6226','syssetting','System settings','1','0','0','0','en');
INSERT INTO met_language VALUES('6227','baceinfo','Basic Information','1','0','0','0','en');
INSERT INTO met_language VALUES('6228','goodspar','Product parameters','1','0','0','0','en');
INSERT INTO met_language VALUES('6229','goodsname','product name','1','0','0','0','en');
INSERT INTO met_language VALUES('6230','createstatic','Static page generation','1','163','5','0','en');
INSERT INTO met_language VALUES('6231','staticpage','Static page settings','1','162','5','0','en');
INSERT INTO met_language VALUES('6232','pseudostatic','Pseudo-static','1','164','5','0','en');
INSERT INTO met_language VALUES('6233','setequivalentcolumns','The current section','1','22','2','0','en');
INSERT INTO met_language VALUES('6234','veditor','Visual editing','1','0','0','0','en');
INSERT INTO met_language VALUES('6235','veditortips1','Open (the administrator will have all the visual editing state management functions)','1','0','0','0','en');
INSERT INTO met_language VALUES('6236','loading','Get in ...','1','0','0','0','en');
INSERT INTO met_language VALUES('6237','systips3','Processing time: everyday','1','0','0','0','en');
INSERT INTO met_language VALUES('6238','systips4','Work order','1','0','0','0','en');
INSERT INTO met_language VALUES('6239','systips5','Online Time: Business Day','1','0','0','0','en');
INSERT INTO met_language VALUES('6240','systips6','Point me to consult','1','0','0','0','en');
INSERT INTO met_language VALUES('6241','systips7','maturity','1','0','0','0','en');
INSERT INTO met_language VALUES('6242','systips8','in','1','0','0','0','en');
INSERT INTO met_language VALUES('6243','systips9','Renew the service','1','0','0','0','en');
INSERT INTO met_language VALUES('6244','systips10','No service yet','1','0','0','0','en');
INSERT INTO met_language VALUES('6245','systips11','What is technical support?','1','0','0','0','en');
INSERT INTO met_language VALUES('6246','systips12','Subscribe to a service','1','0','0','0','en');
INSERT INTO met_language VALUES('6247','funcCollection','Features','1','0','0','0','en');
INSERT INTO met_language VALUES('6248','websiteSet','Website configuration and management','1','0','0','0','en');
INSERT INTO met_language VALUES('6249','systemModule','System module','1','0','0','0','en');
INSERT INTO met_language VALUES('6250','appearanceSetting','Appearance settings','1','0','0','0','en');
INSERT INTO met_language VALUES('6251','basicInfoSet','Basic information configuration','1','0','0','0','en');
INSERT INTO met_language VALUES('6252','multilingual','Language','1','0','0','0','en');
INSERT INTO met_language VALUES('6253','mailSetting','Mail sending settings','1','0','0','0','en');
INSERT INTO met_language VALUES('6254','thirdCode','Third-party code to add','1','0','0','0','en');
INSERT INTO met_language VALUES('6255','watermarkThumbnail','Watermark / thumbnail','1','0','0','0','en');
INSERT INTO met_language VALUES('6256','customerService','online service','1','0','0','0','en');
INSERT INTO met_language VALUES('6257','recycleBin','Recycle Bin','1','0','0','0','en');
INSERT INTO met_language VALUES('6258','securityTools','System Security and Tools','1','0','0','0','en');
INSERT INTO met_language VALUES('6259','dataRecovery','Data Recovery','1','0','0','0','en');
INSERT INTO met_language VALUES('6260','searchEngineOptimization','SEO search engine optimization','1','0','0','0','en');
INSERT INTO met_language VALUES('6261','seoSetting','SEO parameter settings','1','0','0','0','en');
INSERT INTO met_language VALUES('6262','thirdPartyLogin','Social login settings','1','0','0','0','en');
INSERT INTO met_language VALUES('6263','appAndPlugin','Application plug-ins and value-added services','1','0','0','0','en');
INSERT INTO met_language VALUES('6264','metShop','Official mall','1','0','0','0','en');
INSERT INTO met_language VALUES('6265','commercialAuthorizationCode','Commercial authorization code','1','0','0','0','en');
INSERT INTO met_language VALUES('6266','systips13','Old version template compatible (non-responsive template)','1','0','0','0','en');
INSERT INTO met_language VALUES('6267','mobileSetting','Mobile version set','1','0','0','0','en');
INSERT INTO met_language VALUES('6268','mobileVersion','Mobile version of the appearance','1','0','0','0','en');
INSERT INTO met_language VALUES('6269','uisetTips1','Image recommended size: 500 * 500 (pixels)','1','0','0','0','en');
INSERT INTO met_language VALUES('6270','metinfoSystem','Rice Extension enterprise website system','1','0','0','0','en');
INSERT INTO met_language VALUES('6271','uisetTips4','Current page preview','1','0','0','0','en');
INSERT INTO met_language VALUES('6272','uisetTips5','The current page system parameter settings','1','0','0','0','en');
INSERT INTO met_language VALUES('6273','uisetTips6','Page','1','0','0','0','en');
INSERT INTO met_language VALUES('6274','moreSettings','More','1','0','0','0','en');
INSERT INTO met_language VALUES('6275','sysMailboxConfig','System mailbox configuration','1','0','0','0','en');
INSERT INTO met_language VALUES('6276','navSetting','Navigation menu settings','1','0','0','0','en');
INSERT INTO met_language VALUES('6277','oldBackstage','Panel','1','0','0','0','en');
INSERT INTO met_language VALUES('6278','sysMessage','system information','1','0','0','0','en');
INSERT INTO met_language VALUES('6279','uisetTips7','Style settings (here set the site\'s overall style, each block of the template can set the block style parameters)','1','0','0','0','en');
INSERT INTO met_language VALUES('6280','replaceImg','Replace the picture','1','0','0','0','en');
INSERT INTO met_language VALUES('6281','selectReplaceIcon','Select the replacement icon','1','0','0','0','en');
INSERT INTO met_language VALUES('6282','uisetTips8','Hide the element <br> (hide the modified occlusion element, <br> refresh the page can be displayed again)','1','0','0','0','en');
INSERT INTO met_language VALUES('6283','putIntoRecycle','Into the recycling station','1','0','0','0','en');
INSERT INTO met_language VALUES('6284','thoroughlyDeleting','Remove completely','1','0','0','0','en');
INSERT INTO met_language VALUES('6285','unselected','No records selected','1','0','0','0','en');
INSERT INTO met_language VALUES('6286','websiteContent','Website basic content','1','0','0','0','en');
INSERT INTO met_language VALUES('6287','jslang0','Into the recycling station','1','0','0','1','en');
INSERT INTO met_language VALUES('6288','jslang1','Remove completely','1','0','0','1','en');
INSERT INTO met_language VALUES('6289','jslang2','cancel','1','0','0','1','en');
INSERT INTO met_language VALUES('6290','seotips26','After opening to simplify the front page URL (URL), and end in html (static page function is disabled).','1','0','0','0','en');
INSERT INTO met_language VALUES('6291','systips14','(Please ensure that the pseudo-static function is turned off before opening)','1','0','0','0','en');
INSERT INTO met_language VALUES('6292','systips15','MB (If the website background setting value exceeds the maximum limit of the upload file of the server, the value of the server limit shall prevail)','1','0','0','0','en');
INSERT INTO met_language VALUES('6293','third_code_mobile','Mobile third-party code','1','0','0','0','en');
INSERT INTO met_language VALUES('6294','clearCache','Empty the cache','1','0','0','0','en');
INSERT INTO met_language VALUES('6295','jsx39','(Delete column will delete all the contents of the column)','1','0','0','0','en');
INSERT INTO met_language VALUES('6296','onlineHolder1','Please enter the customer service name','1','0','0','0','en');
INSERT INTO met_language VALUES('6297','onlineHolder2','Please enter customer service information','1','0','0','0','en');
INSERT INTO met_language VALUES('6298','jslang3','No records selected','1','0','0','1','en');
INSERT INTO met_language VALUES('6299','jslang4','Please select the column','1','0','0','1','en');
INSERT INTO met_language VALUES('6300','jslang5','I know','1','0','0','1','en');
INSERT INTO met_language VALUES('6301','jslang6','Expand more settings','1','0','0','1','en');
INSERT INTO met_language VALUES('6302','jslang7','Hide settings','1','0','0','1','en');
INSERT INTO met_language VALUES('6303','newFeedback','You received new feedback','1','0','0','0','en');
INSERT INTO met_language VALUES('6304','onlone_onlinetitle_v6','Online customer service form name please modify in multi-language parameters','1','0','0','0','en');

DROP TABLE IF EXISTS met_link;
CREATE TABLE `met_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webname` varchar(255) DEFAULT NULL,
  `weburl` varchar(255) DEFAULT NULL,
  `weblogo` varchar(255) DEFAULT NULL,
  `link_type` int(11) DEFAULT '0',
  `info` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `orderno` int(11) DEFAULT '0',
  `com_ok` int(11) DEFAULT '0',
  `show_ok` int(11) DEFAULT '0',
  `addtime` datetime DEFAULT NULL,
  `lang` varchar(50) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_list;
CREATE TABLE `met_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bigid` int(11) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `no_order` int(11) DEFAULT NULL,
  `lang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_message;
CREATE TABLE `met_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `readok` int(11) DEFAULT '0',
  `useinfo` text,
  `lang` varchar(50) DEFAULT NULL,
  `access` int(11) DEFAULT '0',
  `customerid` varchar(30) DEFAULT '0',
  `checkok` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_news;
CREATE TABLE `met_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `ctitle` varchar(200) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `description` text,
  `content` longtext,
  `class1` int(11) DEFAULT '0',
  `class2` int(11) DEFAULT '0',
  `class3` int(11) DEFAULT '0',
  `no_order` int(11) DEFAULT '0',
  `wap_ok` int(1) DEFAULT '0',
  `img_ok` int(1) DEFAULT '0',
  `imgurl` varchar(255) DEFAULT NULL,
  `imgurls` varchar(255) DEFAULT NULL,
  `com_ok` int(1) DEFAULT '0',
  `issue` varchar(100) DEFAULT NULL,
  `hits` int(11) DEFAULT '0',
  `updatetime` datetime DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `access` int(11) DEFAULT '0',
  `top_ok` int(1) DEFAULT '0',
  `filename` varchar(255) DEFAULT NULL,
  `lang` varchar(50) DEFAULT NULL,
  `recycle` int(11) NOT NULL DEFAULT '0',
  `displaytype` int(11) NOT NULL DEFAULT '1',
  `tag` text NOT NULL,
  `links` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO met_news VALUES('1','不动产登记全国联网，为房地产税开征提供基础数据','','','一则有关不动产登记的消息，再度引发舆论对于房地产税开征与反腐这两大热点话题的讨论。据央视17日报道，全国统一的不动产登记信息管理基础平台已实现全国联网，我国不动产登记体系进入到全面运行阶段。自然资源部最新调查统计显示，目前全国335个地市、2853个县区共设立3001个不动产登记办事大厅、3.8万个窗口，8万多一线登记工作人员平均每天为30多万企业和群众提供不动产登记服务。不动产登记是近几年来国土','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">一则有关不动产登记的消息，再度引发舆论对于房地产税开征与反腐这两大热点话题的讨论。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">据央视17日报道，全国统一的不动产登记信息管理基础平台已实现全国联网，我国不动产登记体系进入到全面运行阶段。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">自然资源部最新调查统计显示，目前全国335个地市、2853个县区共设立3001个不动产登记办事大厅、3.8万个窗口，8万多一线登记工作人员平均每天为30多万企业和群众提供不动产登记服务。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">不动产登记是近几年来国土部门大力推进的一项工作，于2014年正式启动，计划4年左右时间建立有效运行的不动产登记信息管理基础平台。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">原国土部官员曾表示，各地不动产信息纳入统一的不动产登记信息管理基础平台后，才能确保国家、省、市、县四级登记信息的实时共享，为国家宏观调控、制定科学决策提供准确数据支撑。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">并非开征房地产税前提条件</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"></span></p><p style=\"text-align: center\"><img src=\"https://show.metinfo.cn/m/mui169/341/upload/201806/1529891783614967.jpg\" data-width=\"900\" width=\"900\" data-height=\"500\" height=\"500\" title=\"网站关键词\" alt=\"网站关键词\"/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"></span><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">不动产登记与房地产税开征之间有什么关系?自2014年我国政府推进不动产统一登记工作以来，这个问题始终被外界提及。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">原国土部相关负责人曾表示，实施不动产统一登记并不是开征房地产税的前提条件。在分散登记模式下，同样可以开展征收房地产税的改革。只是，不动产统一登记后，特别是不动产登记信息管理基础平台建成并全面运行后，能够为征收房地产税提供更加充分的依据和基础信息，能够更加有效支撑房地产税收改革工作。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">“是否征收房地产税、何时开征、征收多少，应当通过制定相关税收法律去规定，与不动产统一登记制度建设没有直接关联。实施不动产统一登记并不意味要开征房地产税，更谈不上老百姓将面临高额税费的问题。”上述人士称。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">虽然不动产登记尚未在实际操作层面直接与房地产税开征挂钩，但相关的理论研究一直没有停止。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2017年12月份，原国土资源战略研究重点实验室曾举办以“房地产税设计与不动产登记”为主题的学术报告会。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">与会学者认为，房地产税征收必须在处理好公平与效率问题的原则下，以不动产登记信息管理基础平台数据为依据，明确房地产税的开征范围和功能定位，防止危害金融体系稳定、引发房地产市场剧烈波动等风险。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">在此次会议上各位专家学者及研究员们就房地产税收的一系列关键问题进行了深入探讨，为研究不动产统一登记支撑房地产税收提供了思路。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">对于此次不动产登记信息管理基础平台实现全国联网的信息，中原地产首席分析师张大伟认为，对房地产市场而言，不动产登记联网将有利于摸清楼市“家底”，并在一定程度上影响市场预期。不动产登记本身并不是房地产调控政策，不会直接影响到楼市，但通过不动产登记可以实现更大更快的楼市调控效果。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">张大伟认为，不动产登记本身并不是房地产调控，但这一政策是房地产调控从之前的交易环节调控转变到存量环节调控的重要标志性事件，对市场的影响将非常大。只有不动产统一登记后，房地产税才可能全面落地。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">全国政协经济委员会副主任委员杨伟民近日在“2018陆家嘴论坛”上演讲时也表示，应该尽快摸清房地产的“底数”。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">“我在中央财办时，曾经请有关单位通过对用电量对全国住宅的空置情况摸底调查，显示我国无论是城镇还是乡村住宅的空置率都相当高，比日本这种高度老龄化、少子化、城市化的国家还要高，日本是13%。这很不正常，说明用来炒的房子真不少，有关部门应该尽快制定空置标准。现在我们在频频调控房地产市场，但是底数不清怎么调控？像GDP不清楚怎么调控经济？”杨伟民称。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">通过不动产登记能否摸清房地产市场的底数？在不动产登记信息管理基础平台实现全国联网的前提下，新增不动产登记信息可以被实时掌控，存量信息的整合就成为一个重点问题。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">一位地方国土官员曾表示：“第一步（接入国家信息平台）完成的是一个打通传送通道的工作，可实现所有适时登记信息都上报到国土部。但更为关键的是海量的既有不动产权登记信息，分散在房产、国土、林业等多个部门，还需要一定时间的整合、进网。”</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">6月12日在浙江省衢州市召开的自然资源部全国不动产登记窗口作风问题专项整治工作动员部署会上，自然资源部官员强调，下一步要加强不动产登记信息管理基础平台建设，加强信息共享，扎实推进存量数据整合，形成“全生命周期”的不动产登记数据库。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">可通过查房反腐吗？</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">一些民众还将不动产统一登记与反腐关联起来，认为如果全国不动产登记信息联网后，通过“以人查房”就可能揪出更多的腐败官员。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">为何一些民众会将不动产登记下的“查房”与反腐相联系？</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">南开大学法学院教授陈耀东曾撰称，随着我国反腐败工作的逐步深入，房产在官员腐败案件中成为越来越引人注目的“要素”，如拥有22套房产的广东“房叔”;有4个户口在京拥有41套房产的陕西“房姐”……等等。根据中央巡视组反馈情况和各地方整改通报，在2013年以来被巡视的21个省份中，有20个省份发现了房地产业腐败，占比达95%。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">陈耀东表示，在这样的大背景下，《不动产登记暂行条例》这个本意在于以登记来确定不动产物权归属与交易，明确不动产登记程序，整合不动产登记职责，规范登记行为的法律规范文件，引发了人们对“以人查房”的反腐败功能的期待。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">不是谁都可以去查询他人房产登记信息</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">依据《不动产登记暂行条例》，有关国家机关可以依照法律、行政法规的规定查询、复制与调查处理事项有关的不动产登记资料。换言之，检察人员有权去查询一座房产登记在谁的名下，或者去查询一个人的名下有多少房产。通俗地讲，就是可以“以房查人”和“以人查房”。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">但谁都可以去以人查房吗?实际情况并非如此。谁有权去查？去查谁？不可能每个人都能随意去查询他人的房产信息，抑或自己的房产信息被所有人查询。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">《不动产登记暂行条例》对不动产登记信息的公开、查询设置了严密的规则。只有权利人和利害相关人才能够查询信息，也就是只能因为正当、合法的目的才可进行查询;相关部门如司法部门、司法机关需要查询权利人的财产时是可以查询的，但必须提供查询目的和查询的证件。登记机关工作人员泄露登记资料，查询的单位和个人违反规定泄露查询的资料，都需要承担相应的法律责任。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">原国土部曾表示，不动产统一登记以后，登记信息公开查询要继续依法开展，但不会无条件、不受限制地全面公开，不会导致居民住址、身份等基本信息外泄。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">哪些人属于“以人查房”的查询对象?陈耀东认为要严格限制可查询的对象范围。原则上讲，只有对以下两类人可以启动“以人查房”程序：</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">一是涉案人员，包括公安、检察机关立案侦查、起诉和纪检监察机关调查的人员;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">二是有如实报告不动产义务的个人。有报告才有查询，按照现行规定，应包括领导干部重大事项报告制度涉及的人员，以及地方开展的财产申报涉及的人员。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">陈耀东表示，统一不动产登记制度一定程度上为腐败案件的调查提供了方便，为司法机关、纪检监察部门和组织人事部门完整、准确掌握官员房产信息，提供了制度和技术条件，可以在一定程度上解决房产的虚报问题，但不动产登记制度归根结底是《物权法》的组成部分，不是反腐败的法律。反腐败要多措并举，如社会信用体制、财产申报制度的完善等。从反腐败的角度而言，不能对不动产登记制度予以过高的期许。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">“不动产登记本身并不负载通过以人查房实现反腐败的功能;而实现不动产登记的功能，自然更与以人查房无关联，以人查房推动反腐败工作的进程只能说是民众在当今对不动产登记制度的一个溢出期待。”陈耀东称。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">中国社科院法学所研究员孙宪忠此前在接受第一财经记者采访时也表示，官员腐败管理是干部管理制度，干部管理主要看干部是否廉政，涉及干部财产的话干部就需要去登记自己的财产，但是不动产登记制度登记簿上没有办法显示你是不是干部，不能说登记簿上也要登记是什么官员，也没有必要，只要他是合法的申请人都足够了。这个申请人到底是谁，在法律上是没法严格追究的，也没法严格限制，只要申请人合法就要给予登记。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">“不动产登记本身不可能发挥阳光法案的作用、反腐的作用。但是为了反腐败去查房都是可以的，不管是以人查房还是以房查人都是可以的，你是一个官员，我们总会查到这个房子归根结底是谁的。房子本身登记上的权利人状态和事实上真正的权利人状态是可以脱节的。”</span></p>','2','13','0','0','0','0','../upload/201806/1529891783614967.jpg','','0','','0','2018-06-25 09:39:17','2018-06-25 09:56:26','0','0','','cn','0','1','','');
INSERT INTO met_news VALUES('2','左手谷歌右手腾讯，家乐福加快电商布局','','','在电子商务领域起步较慢的家乐福加快了前进的步伐。近日，家乐福宣布与谷歌组建合资公司，成为法国第一家与谷歌合作的零售商。通过家乐福的产品和物流优势，及Google在人工智能、Cloud及Google Assistant语音助手等方面的领先技术，双方将从2019年开始推行在法国地区零售业务上的合作。这两家巨头的合作将围绕三个方面展开：购物方式上，消费者可以通过包括Google Assistant语音助','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">在电子商务领域起步较慢的家乐福加快了</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">前进的步伐。近日，家乐福宣布与谷歌组建合资公司，成为法国第一家与谷歌合作的零售商。通过家乐福的产品和物流优势，及Google在人工智能、Cloud及Google Assistant语音助手等方面的领先技术，双方将从2019年开始推行在法国地区零售业务上的合作。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">这两家巨头的合作将围绕三个方面展开：购</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">物方式上，消费者可以通过包括Google Assistant语音助手、Google Home智能音箱以及新开通的Google购物网站等多种平台选购家乐福商品；消费体验上，双方将在巴黎共同设立创新实验室，家乐福的工程师与Google Cloud AI专家合作研究全新的消费体验；同时，Google将助力家乐福集团实现数字化全面转型。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"></span></p><p style=\"text-align: center\"><img src=\"https://show.metinfo.cn/m/mui169/341/upload/201806/1529891919116809.jpg\" data-width=\"900\" width=\"900\" data-height=\"500\" height=\"500\" title=\"网站关键词\" alt=\"网站关键词\"/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"></span><br/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">家乐福推动电商业务加速发展的举措不仅</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">在法国。今年1月，家乐福与腾讯就在中国展开战略业务合作签署初步协议，腾讯与永辉可能投资家乐福中国。联手腾讯，能帮家乐福提升其线上曝光率、线上与线下零售业务的流量，并利用腾讯先进的数字和技术专长开发全新的智慧零售项目。 作为这项合作的一部分，今年5月，家乐福与腾讯合作的首家智慧门店“LeMarche”在上海开业，主打餐饮、生鲜、进口商品，是一家微信支付智慧零售旗舰店。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">家乐福这一系列电子商务上的进展，响应</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">了去年起家乐福新首席执行官亚历山大·邦帕德（Alexandre Bompard）的计划。在去年7月上任时，邦帕德就表示公司此前在电子商务领域发展缓慢，要增加集团在该领域的投资。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">与两大科技巨头的合作，让家乐福在全球市</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">场的电子商务步伐逐步走上正轨。“6个月前，我们还是孤立无援，所有的零售联盟都没有我们的参与。”邦帕德在6月15日的家乐福年度股东大会上说，“但如今，我们与腾讯和谷歌结成了联盟。”</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">实际上，今年1月家乐福发布的“家乐福20</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">22”转型计划的内容之一就是增加电子商务投资。根据计划，家乐福将在未来5年内，把数字投资增加至现在的6倍，达到28亿欧元。2022年前，公司在线食品销售额将达到50亿欧元。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">而重视电商业务并加大投资，是当今所有零</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">售商都在做的功课。家乐福的本土竞争对手Monoprix今年3月曾宣布，将通过亚马逊的Prime Now服务向巴黎消费者销售产品；另一个本土竞争对手E.Leclerc则在加强线上服务能力。家乐福的合作伙伴谷歌，也与沃尔玛和target达成了合作。</span></p>','2','13','0','0','0','0','../upload/201806/1529891919116809.jpg','','0','','1','2018-06-25 09:56:38','2018-06-25 09:58:50','0','0','','cn','0','1','','');
INSERT INTO met_news VALUES('3','投资成本高企，超大城市经济增速慢下来','','','超大城市发展怎么办？&nbsp;随着各常住人口超过1000万的超大城市经济总量越来越大，今年以来，中国超大城市的经济增速与投资增速放慢明显。&nbsp;根据各地统计公布的数字显示，2018年1-4月投资数据除了广州、武汉、上海增速相对稳定外，成都、天津、北京、重庆、深圳、哈尔滨均出现大幅下滑，其中天津、北京、哈尔滨的投资增速分别为-21.6%、-12.8%、-18%左右。&nbsp;为什么出现这样','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">超大城市发展怎么办？&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">随着各常住人口超过1000万的</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">超大城市经济总量越来越大，今年以来，中国超大城市的经济增速与投资增速放慢明显。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">根据各地统计公布的数字显示，</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2018年1-4月投资数据除了广州、武汉、上海增速相对稳定外，成都、天津、北京、重庆、深圳、哈尔滨均出现大幅下滑，其中天津、北京、哈尔滨的投资增速分别为-21.6%、-12.8%、-18%左右。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">为什么出现这样的情况？中国社科院</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">工业所研究员李钢认为，各个超大城市经济总量大，常住人口多，已经到了承载力转折点，现在经济放慢为正常的情况。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">超大城市服务业比重大，但是服务业生产</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">效率难以快速提升，不能规模化生产，所以经济难以快速增长。而很多城市目前人口还没达到千万级，未达到超大城市标准，仍处于人口聚集的阶段，可能还有快速发展的条件。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">李钢对21世纪经济报道</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">记者称，比如最近去中西部地区调研发现，很多城市人口总量仍不大，产业投资还会很快，房价也不高，发展前景大。“比如很多农民工和大学生原先在沿海超大城市发展，房价高，属于漂的一族，但是回到当地很多城市，当地房价不高，也有制造业就业机会，也能照应家里，发展也会不错。”他说。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">增速难续两位数增长&nbsp;</font></p><p><font face=\"微软雅黑, Microsoft YaHei\">根据各地统计公布的数字，今</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">年以来超大城市投资增速都不高。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">以直辖市为例，除了上海1-4月</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">度投资增速为8%，和去年同期的7.9%基本持平外，北京、天津、重庆1-4月的投资增速分别为-12.8%、-21.6%、4.8%，相比去年同期的7.8%、3%、12%，降幅分别为15-25个百分点。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">2018年1-4月深圳、哈尔滨、成都</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">的投资增速分别为18.9%、-18%左右（预计值，一季度增速为-18%）、10%，相比去年同期的31.9%、6.3%、15.4%，投资增速降幅在5.4-25个百分点左右。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">为什么超大城市出现这么大的投资</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">降幅，这与工业投资、房地产投资比较低有关。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">首都经贸大学研究员蒋三庚指出，超</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">大城市普遍投资增速慢，要仔细分析原因，但是一个重要的情况是，超大城市服务业比重大，像北京、上海的服务业比重为八成和七成，经济很难加快增长的，比如律师和医院不可能像工业厂房那样投资快，生产效率也不可能太快提高。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">特别是像北京，目前大量的市场和</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">一般工业等都在加快向外疏解，这显然使得投资增速难以提升。“超大城市常规投资容易饱和，很难持续达到两位数增长。”他说。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">数据显示，很多城市工业投资大幅下降</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">比如重庆今年1-4月工业投资为-6.1%，</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">比去年同期低21.3个百分点。北京2018年1-4月工业投资同比下降46.6%；比去年同期低77.6个百分点。天津1-4月工业投资同比下降36.8%，更是说明了形势的严峻性。另外很多超大城市今年以来房地产和第三产业投资增速也很低。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">中国社科院工业所研究员李钢认为，一般而言，城</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">市规模越大，经济的效率会越提高。但是像京沪等这样的城市，可能进入到了新的发展拐点，因为人口多、房价高、交通拥堵等，这都使得经济难以加快。而这些城市很多加工业，转到一些人口不多的中小城市，属于正常情</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">况。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">经济亟寻新动能&nbsp;</font></p><p><font face=\"微软雅黑, Microsoft YaHei\">对于人口超千万的超大城市，在房价高、投资成本</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">高的情况下，下一步将如何发展？</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">重庆社科院城市所副所长彭劲松指出，对于超大城市而言，还是</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">要寻找新的发展动力，像重庆前几年汽车产业发展快，最近汽车产业有波动，这影响到经济，下一步还是要有新的增长点。“对每个城市而言，核心还是新旧动能转换，在旧的发展动能消减时，新的动能要提上来。”他说。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">21世纪经济报记者了解到，很多超大城市的房地产供给变少，</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">使得房价上升快，这对传统的工业会产生挤出效应，相应生产性服务业也会受到影响。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">从今年前1-4月数字看，全国超大城市中重庆和天津的房产地投资</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">增速为加快，其余的武汉、成都、北京、上海的房地产投资增速均放慢（深圳缺数字）。而很多城市房价涨幅明显，4月新建商品住宅价格，北京、上海、广州、深圳因为限购严重价格为同比下降外，哈尔滨涨幅为12%，天津为0.6%，武汉为0.5%，成都为1.1%。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">不少超大城市因为房价高，要发展一般工业很难，高端制造业可以发</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">展，但是也面临吸引人才的问题。尽管很多城市实施了人才招募政策，但是在很大程度上推高了房价，高精尖制造业发展也有难度。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">同时超大城市要大力发展第三产业，在这些领域要加快开放，吸引高端的服</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">务业。目前很多超大城市新动能在提升，但是整个投资仍放慢。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">比如2018年1-4月北京信息传输、软件和信息技术服务业增长1.4倍，但是整</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">个服务业完成投资下降9.4%。同期天津服务业投资同比下降16.4%。上海服务业投资增速只有6.9%。成都和深圳今年前4个月服务业投资增速分别为19.7%、8.7%，比去年同期的10.7%、24.8%有所下降。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">首都经贸大学研究员蒋三庚指出，几乎每个城市都要发展高精尖产业，比如像</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">石化和饮料是否也属于该产业，仍不好定义。而不管是服务业还是制造业，都要注意商务成本问题。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p>','2','13','0','0','0','0','','','0','','0','2018-06-25 09:59:05','2018-06-25 10:02:15','0','0','','cn','0','1','','');
INSERT INTO met_news VALUES('4','银行理财委外陷入停滞，债券委外规模下滑','','','在经历了市场波动和政策规范后，2018年几乎陷入停滞。多名受访的银行资管人士表示，今年债券委外投资只减不增，权益类投资也没有新的投放计划，仍在等待资管监管细则出台。亦有受托债券投资的私募人士向21世纪经济报道报道记者表示，今年其公司委外到期赎回和继续投资大约各占一半，最大的变化在于，银行开始要求管理人提供单日净值，以推动银行理财产品端的净值化。银行处于观望状态“需要等银行理财新规落地，才能安心发新','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">在经历了市场波动和政策规范后，2018年几乎陷入停滞。多名受访的银行</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">资管人士表示，今年债券委外投资只减不增，权益类投资也没有新的投放计划，仍在等待资管监管细则出台。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">亦有受托债券投资的私募人士向21世纪经济报道报道记者表示，今年其</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">公司委外到期赎回和继续投资大约各占一半，最大的变化在于，银行开始要求管理人提供单日净值，以推动银行理财产品端的净值化。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">银行处于观望状态<br style=\"font-family: &quot;Microsoft Yahei&quot;; font-size: 15px; white-space: normal; overflow-x: visible !important; word-break: normal !important;\"/>“需要等银行理财新规落地，才能安心发新产品，现在基本都停着在</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">观望。”某股份行资管部人士表示。类似看法在银行资管圈十分普遍。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">据21世纪经济报道记者了解，今年部分银行有计划推出一些指数型</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">产品，并在这方面增加了人员投入，但仍处于了解和准备阶段，较少“真金白银”的投入。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">银行的观望状态，主要由两方面原因造成。一是老产品结束有压力。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">根据多名银行资管人士反馈，监管非正式要求银行存量不合规产品（包括没有净值化的）每年压降三分之一规模。实际操作中，老产品投资的资产到期后，不能再投资新资产。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"></span></p><p style=\"text-align: center\"><img src=\"https://show.metinfo.cn/m/mui169/341/upload/201806/1529892741765105.jpg\" data-width=\"900\" width=\"900\" data-height=\"500\" height=\"500\" title=\"网站关键词\" alt=\"网站关键词\"/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">一位城商行资管部高管向21世纪经济报道记者表示，上述老产品</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">不能投资新资产的要求几乎令其投资端“寸步难行”。“比如我的产品现在持有A债券，有行情，想卖掉再买B债券，那B债券算新资产么？不能买的话，只能持有到期，但兑付收益这块可能存在压力。”不过，他同时透露，目前该行</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">委外仍在正常交易，规模只减不增。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">观望的另一方面压力，来自新的产品究竟怎么设计，怎么发行，系统如</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">何改造升级，市场接受程度如何。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">上述城商行资管部高管坦言，对于中小银行，系统改造少则几个月，多则可</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">能跨年。据他透露，目前该行正在使用的是一家股份行开发的系统，还是基于预期收益率产品的基础。若新系统采用外部开发，需要一定时间磨合，短时间内一定发不出净值型产品。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">债券委外规模收缩</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">据21世纪经济报道记者多方调研，今年银行债券委外出现了不</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">同程度收缩，但具体规模难以统计。事实上，也有银行的整体理财规模出现了下降。</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">以某华北股份行为例，据其资管部人士透露，目前该行现金管理</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">类产品的债券投资几乎都由本行“操刀”。</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">据一名华东股份行资管部人士的说法，债券委外规模收缩有多重原</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">因：一是外部券商或基金管理人的业绩不尽如人意；二是资管新规明确了债券投资杠杆率、嵌套等问题，通过债券委外做高收益的动力被消除，且出于合规要求，一些银行为应对监管检查或自查后进行了主动调整。</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">在股票投资方面，目前银行只能依赖外部管理人。但有两名股份</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">行资管部高管人士向21世纪经济报道记者透露，有计划内部培养自身的投研团队，培养银行内部的权益投资经理。至于如何配套激励机制，上述两位人士均坦言“与基金券商不可比，还需探索。”</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">委外业务自2015年兴起，大背景是银行理财的预期收益率模式，</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">即银行兑付给客户固定收益，因此银行委外也要求外部管理人提供固定收益；即使最终收益不达预期，不少非银管理人也会通过各种形式辅助银行“躲过”风险暴露。</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">随着资管新规要求所有资管产品净值化，银行在新的委外业务中</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">，也开始明确要求管理人提供净值化管理。</span></p><p><font face=\"微软雅黑, Microsoft YaHei\">“公募当然没什么影响，主要是私募基金和券商资管计划，之前大</font><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">部分券商集合产品用的也都是成本摊余法，和银行理财其实差不多。现在双方的系统都需要改，涉及的工作量很大，而且波动方面也还需要磨合。”某券商资管人士表示。</span></p>','2','13','0','0','0','0','../upload/201806/1529892741765105.jpg','','0','','1','2018-06-25 10:05:29','2018-06-25 10:12:24','0','0','','cn','0','1','','');
INSERT INTO met_news VALUES('5','光电发展重点将转向提质增效','','','光伏发电装机规模高速增长的时代或将结束。近日，国家发展改革委、财政部、国家能源局联合印发《关于2018年光伏发电有关事项的通知》，要求合理把握发展节奏，优化光伏发电新增建设规模，暂不安排2018年普通光伏电站建设规模，在国家未下发文件启动普通电站建设工作前，各地不得以任何形式安排需国家补贴的普通电站建设。而在分布式光伏方面，今年仅安排1000万千瓦左右建设规模。此外，将进一步降低光伏发电补贴强度。','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">光伏发电装机规模高速增长的时代或将结束。近日，国家发展改革委、财政部、国家能源局联合印发《关于2018年光伏发电有关事项的通知》，要求合理把握发展节奏，优化光伏发电新增建设规模，暂不安排2018年普通光伏电站建设规模，在国家未下发文件启动普通电站建设工作前，各地不得以任何形式安排需国家补贴的普通电站建设。而在分布式光伏方面，今年仅安排1000万千瓦左右建设规模。此外，将进一步降低光伏发电补贴强度。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">近年来，我国光伏发电新增装机规模连续5年全球第一，累计装机规模连续3年位居全球第一。光伏技术不断创新突破、全球领先，并已形成具有国际竞争力的完整的光伏产业链。但另一方面，也存在光伏发电弃光问题显现以及补贴需求持续扩大等问题，直接影响光伏行业健康有序发展，需要根据新形势、新要求调整发展思路，完善发展政策。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">“我国光伏发电历经成长起步、产业化发展、规模化发展等阶段，当前发展的重点需要从扩大规模转到提质增效、推进技术进步上来，需要从更有利于健康可持续发展的角度,着力推进技术进步、降低发电成本、减少补贴依赖,优化发展规模,提高运行质量,推动行业有序发展、高质量发展。”国家能源局新能源和可再生能源司有关负责人表示，这是今年及今后一段时期光伏发电发展的基本思路。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"></span></p><p style=\"text-align: center\"><img src=\"https://show.metinfo.cn/m/mui169/341/upload/201806/1529893274100324.jpg\" data-width=\"900\" width=\"900\" data-height=\"500\" height=\"500\" title=\"网站关键词\" alt=\"网站关键词\"/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">记者了解到，近几年普通光伏电站发展较快，部分地方出现弃光问题。对于今年的光伏发电新增建设规模，根据当前发展实际，明确暂不安排各地普通电站建设规模。这既是缓解消纳问题，也是为先进技术、高质量光伏发电项目留下发展空间。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">在领跑基地建设方面，2017年国家能源局组织开展了第三期光伏发电领跑基地建设，共有10个应用领跑基地和3个技术领跑基地，合计650万千瓦。“考虑领跑基地建设在促进技术进步、产业升级、成本下降、补贴退坡上的显著效果，今年是否再组织领跑基地建设及安排多大规模、何时启动，将视光伏发电规模优化情况再行研究。”该负责人说。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">目前光伏发电既面临补贴不足的现实问题，也有市场竞争力不足的长远发展问题。为此，下一步将在通过各种措施推动光伏发电自身建设成本下降的同时，鼓励各地出台政策支持光伏产业发展，减少非技术成本，降低补贴强度。对于不需要中央财政补贴的光伏发电项目，地方可根据接网消纳条件和相关要求自行安排建设。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">光伏发电价格机制调整后，今年光伏发电项目上网电价具体如何执行?对此，记者了解到，本次价格调整可以概括为“两下调一不变”。“两下调”指的是下调一类至三类资源区光伏电站标杆电价各5分、下调分布式光伏发电度电补贴标准5分;“一不变”指的是维持光伏扶贫项目电价不变。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">“需要特别说明的是，国家发展光伏发电的方向是坚定不移的。此次出台文件是着力解决当前光伏发展的突出矛盾、突出问题作出的阶段性年度政策安排，是为促进我国光伏行业从大到强，促进光伏企业练内功、强体质，提高核心竞争力。”该负责人表示，对于今年新增建设规模安排，不是要限制光伏发展规模，只是对需要中央财政补贴的项目优化新增规模。对于技术先进、发展质量高、不需要中央财政补贴的光伏发电项目规模是放开的。</span></p>','2','14','0','0','0','0','../upload/201806/1529893274100324.jpg','','0','','0','2018-06-25 10:26:41','2018-06-25 10:26:45','0','0','','cn','0','1','','');
INSERT INTO met_news VALUES('6','多角度防范化解金融风险','','','由上海市人民政府和中国人民银行、中国银行保险监督管理委员会、中国证券监督管理委员会共同主办的“2018陆家嘴论坛”在上海举行。时隔6年再次参加陆家嘴论坛，中国银行保险监督管理委员会党委书记、主席，中国人民银行党委书记郭树清回忆上一次参加时，还是证监会主席。郭树清表示，我国现阶段的金融问题具有极大的特殊性，这种特殊性决定了面对的矛盾更为复杂，有些风险的形成有着深远的历史原因，必须以更积极的态度处置各','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">由上海市人民政府和中国人民银行、中国银行保险监督管理委员会、中国证券监督管理委员会共同主办的“2018陆家嘴论坛”在上海举行。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">时隔6年再次参加陆家嘴论坛，中国银行保险监督管理委员会党委书记、主席，中国人民银行党委书记郭树清回忆上一次参加时，还是证监会主席。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">郭树清表示，我国现阶段的金融问题具有极大的特殊性，这种特殊性决定了面对的矛盾更为复杂，有些风险的形成有着深远的历史原因，必须以更积极的态度处置各类隐患，以经常的“小震”释放压力，避免出现严重的“大震”，总体上要用事先的而不是事后的、主动的而不是被动的、整体的而不是零散的方法，去矫正各种偏离，及早恢复经济金融平衡。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">在防范化解金融风险的一系列工作实践中，郭树清在九个方面体会比较深。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"></span></p><p style=\"text-align: center\"><img src=\"https://show.metinfo.cn/m/mui169/341/upload/201806/1530006104469605.jpg\" data-width=\"900\" width=\"900\" data-height=\"500\" height=\"500\" title=\"物业管理企业网站模板,物业管理企业网页模板,响应式模板,网站制作,网站建站\" alt=\"物业管理企业网站模板,物业管理企业网页模板,响应式模板,网站制作,网站建站\"/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">一是底线思维防患未然。中国自古就有“治未病”的医学思想，防范化解金融风险也需要树立预防为主的意识，做到早发现、早预警、早处置，努力把风险消灭在萌芽状态和早期阶段。近年来，针对房地产贷款、地方政府债务和互联网金融等系统性风险隐患较大的领域，银保监会设定审慎监控指标，开展压力测试，加强清理规范，及早介入干预，有效遏制了风险累积。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">二是稳定大局逐步加严。治理金融业内部层层嵌套、自我循环，必须充分考虑机构和市场的承受能力。在化解“类信贷”业务风险过程中，银保监会没有全线出击、四面作战，而是合理安排过渡期，先由机构自查再由监管部门检查，有计划、分步骤，渐次达成目标。在整治同业业务时，重点整治同业投资和同业理财，而对同业存放和同业存单调整力度比较小。直至去年底今年初，对表外业务才开始启动规范委托贷款和信托贷款，同样没有采取“一刀切”和急刹车的办法。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">三是统筹兼顾突出重点。防范化解金融风险，必须善于抓主要矛盾，优先处理最可能影响全局、威胁整体的问题。在推动去杠杆过程中，金融管理部门坚持以结构性去杠杆为基本思路，优先推动国有企业和地方政府降低杠杆率。针对交叉金融野蛮生长、影子银行急剧膨胀等突出问题，银保监会及时开展市场乱象综合整治，有力遏制了银行业和保险业资金脱实向虚势头。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">“一年多来，银行业在保持12%以上信贷增速的同时，总资产规模少扩张20多万亿元。在发展方式转变和总保费收入下降的情况下，保险业的保障功能不断增强，今年前4个月，人身险中纯保障类产品占比上升2.9个百分点。”郭树清介绍称。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">四是区别对待分类施策。根据不同领域、不同市场的金融风险情况，采取差异化、个性化的办法。工作实践中，对于不法分子控制的金融集团等“恶性肿瘤”，毫不手软，及时实施“外科手术”。对于情况复杂、牵涉面广的案例，采取徐缓调理的办法，通过“慢撒气”逐步缓释，条件具备时再果断出手。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">五是抓住时机攻坚克难。去年以来，银保监会督促银行利用当前拨备较充足的有利条件，做实贷款分类，真实反映信用风险。目前逾期90天以上贷款与不良贷款之比，已由高峰期的近120%降至100%以内。同时鼓励银行综合运用坏账核销、现金清收和批量转让等手段，加大不良贷款处置力度，2017年以来共处置不良贷款1.9万亿元。有的观察家将这些行动解读为银行的负面讯息，恐怕不太合理。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">六是标本兼治依法规范。防范化解金融风险是系统性工程，必须及时采取措施强力治标，力争在最短的时间内把市场上的歪风邪气压制下去。但是从根本建立起规范有序的金融市场体系，更要注重补齐监管短板。2017年，银行业重点推进70多项补短板项目，其中已完成48项，今年又新提出40多项；保险业去年以来修订出台规章和规范性文件60多项。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">七是回归本源服务实体。金融系统坚持以服务供给侧结构性改革为主线，全国成立1.68万个债权人委员会，积极推动企业的财务重组和破产重整。在着力破除无效供给的同时，支持培育新动能，降低实体经济融资成本。2017年银行业新增减费让利440亿元，今年一系列新的降成本措施正在陆续出台。信贷增速继续明显超过货币供应量和国内生产总值增速，小微企业贷款持续实现“三个不低于”目标。目前，小微企业贷款覆盖率17.3%，申贷获得率95.1%，但是解决小微企业融资难、融资贵还需做出新的努力。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">八是深化改革扩大开放。总书记指出，回顾改革开放以来我国金融业发展历程，解决影响和制约金融业发展的难题必须深化改革。在利率、汇率市场化不断深入的条件下，我们积极推动完善公司治理结构，强化股权管理，优化机构布局，健全市场体系，持续提升我国金融机构的核心竞争力。</span></p>','2','14','0','0','0','0','../upload/201806/1530006104469605.jpg','','0','','2','2018-06-26 17:41:27','2018-06-26 17:41:50','0','0','','cn','0','1','','');
INSERT INTO met_news VALUES('7','楼市新政：或成长效机制样本','','','深圳多位开发商、专家学者和业内人士均对此表示高度关注，认为它将深刻影响深圳的居住体系以及房地产市场，抑制楼市投机投资，并可能为其他城市提供借鉴。打破单一供应“这是住房制度的革命性变革”，中国（深圳）综合开发研究院旅游与地产研究中心主任宋丁认为，《意见》中非常重大的一个改变，就是多主体供应住房的方向，不像过去统一由政府供应，大大拓展了供应主体，减少了过去单一供应造成的供需矛盾。记者注意到，《意见》强','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">深圳多位开发商、专家学者和业内人士均对此表示高度关注，认为它将深刻影响深圳的居住体系以及房地产市场，抑制楼市投机投资，并可能为其他城市提供借鉴。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">打破单一供应</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">“这是住房制度的革命性变革”，中国（深圳）综合开发研究院旅游与地产研究中心主任宋丁认为，《意见》中非常重大的一个改变，就是多主体供应住房的方向，不像过去统一由政府供应，大大拓展了供应主体，减少了过去单一供应造成的供需矛盾。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"></span></p><p style=\"text-align: center\"><img src=\"https://show.metinfo.cn/m/mui169/341/upload/201806/1529893573139005.jpg\" data-width=\"900\" width=\"900\" data-height=\"500\" height=\"500\" title=\"网站关键词\" alt=\"网站关键词\"/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">记者注意到，《意见》强调了多主体供应，包括开发商、长租公寓运营商、政府机构、企事业单位、金融机构、各类社会组织，都可以提供住房，可租可售。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">其中，以房企为主提供商品住房、安居型商品房；以住房租赁经营机构为主，提供各类长租公寓；支持社区股份合作公司和原村民，通过“城中村”综合整治和改造，提供租赁住房。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">近几年来，深圳长租公寓蓬勃发展，以开发商为主的长租公寓品牌争相抢占市场份额，比如万科、招商蛇口、龙湖、深业等公司，目前在深圳提供的长租公寓达数万套。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">万科、深业公司人士告诉21世纪经济报道，其通过城中村综合整治来发展租赁，目前已改造玉田村、水围村、新围仔村等村的数栋村民楼。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">在保障房的部分，以市、区政府、人才住房专营机构为主，提供人才住房、安居型商品房和公共租赁住房；支持企事业单位利用自有用地或自有用房，以及各类金融机构采取直接投资、融资等方式，建设筹集保障房；此外，还支持社会组织等主体，建设筹集公益性住房。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2016年9月，深圳市成立了人才安居集团，投入1000亿元作为资本金；在初期市政府出资后，后续可通过杠杆撬动6000亿-7000亿元资金，用于人才住房的全过程一体化建设运营管理。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">据记者统计，在过去的一年多里，人才安居集团已通过各种方式筹集住房5万套左右，这个数字还在快速增加。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">从土地来源看，《意见》提出，计划新增盘活35平方公里土地用于建设各类住房，存量可用的土地则包括企事业单位自用地、棚户区改造、城中村改造等。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">至于为何是18年供应170万套房？住建委表示，预计至2035年，深圳常住人口将达到1800万人，新增约550万人，新增住房需求约180万套。综合考虑土地供应和住房建设筹集能力，将住房总量目标确定为170万套。</span></p>','2','14','0','0','0','0','../upload/201806/1529893573139005.jpg','','0','','1','2018-06-25 10:27:07','2018-06-25 10:27:13','0','0','','cn','0','1','','');
INSERT INTO met_news VALUES('8','50城楼市降温，一二线热点城市成交量将继续走低','','','2017年一季度，各地政府以“因城施策”为导向，积极深化房地产调控政策。在此背景下，住宅、土地市场成交量均呈现回落态势。业内分析认为，由于调控政策不断升级，未来房地产市场有望稳步回归理性，而一二线热点城市成交量将继续走低。&nbsp;住宅市场：成交量出现回落4日，中国指数研究院发布的最新数据显示，2017年以来，一二线热点城市调控政策升级，住宅市场成交量持续回落。据统计，今年一季度50个代表城市商','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">2017年一季度，各地政府以“因城施策”为导向，积极深化房地产调控政策。在此背景下，住宅、土地市场成交量均呈现回落态势。业内分析认为，由于调控政策不断升级，未来房地产市场有望稳步回归理性，而一二线热点城市成交量将继续走低。&nbsp;</span></p><p><span style=\"font-family:微软雅黑, Microsoft YaHei\">住宅市场：成交量出现回落</span></p><p><span style=\"font-family:微软雅黑, Microsoft YaHei\">4日，中国指数研究院发布的最新数据显示，2017</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">年以来，一二线热点城市调控政策升级，住宅市场成交量持续回落。据统计，今年一季度50个代表城市商品住宅市场月均成交量在2650万平方米，同比下降约15%。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">从不同级别城市来看，一线城市受调控影</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">较大</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">，成交量同比降幅在各线城市中最为突出。据统计，一线城市一季度住宅成交面积同比下降约四成，除广州外，其余城市同比均下降。二线城市成交量也显著下降，但旅游型城市成交增长明显，城市分化加剧。核心城市辐射圈的三线城市成交量受调控政策影响普遍回落，其余三线城市成交量表现稳定增长。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"></span></p><p style=\"text-align: center\"><img src=\"https://show.metinfo.cn/m/mui169/341/upload/201806/1529891783614967.jpg\" data-width=\"900\" width=\"900\" data-height=\"500\" height=\"500\" alt=\"网站关键词\"/></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">从价格走势来看，一季度住宅成交价格累计涨</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">幅持续收窄。根据中国房地产指数系统对100个城市全样本调查数据显示，进入2017年，百城价格环比涨幅继续收窄，一季度涨幅较2016年四季度收窄1.28个百分点。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">在成交量整体走低的同时，一季度各级城市住宅</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">价格涨幅分化。今年以来，热点城市房地产调控政策不断加码，新房市场价格涨幅趋缓。其中一线城市受调控影响涨幅收窄最为显著，一季度累计上涨0.80%，较去年四季度收窄1.30个百分点；二线代表城市累计上涨2.19%，</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">较去年四季度收窄0.70个百分点。一季度三线代表城市累计上涨2.57%，在各线城市中涨幅最为突出。&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">中指院相关负责人分析认为，整体来看</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">，受</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">去年同期高基数及政策调控影响，一季度新房成交量同比小幅下调，价格累计涨幅持续收窄。其中，一二线热点城市新房价格涨幅明显收窄，成交量同比降幅显著，但二手房市场价格涨幅明显高于新房。同时，因去库存政策效</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">应及核心城市外溢影响，部分三四线城市量价保持了稳步增长。在调控持续收紧下，预计未来一二线城市成交仍难见起色，价格整体将趋向平稳。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">土地市场：溢价率持续走低&nbsp;</span></p><p><span style=\"font-family:微软雅黑, Microsoft YaHei\">一季度土地市场同样量价齐跌，溢价率持</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">续走低。克而瑞地产研究中心的统计数据显示，从全国土地市场来看，一季度经营性土地成交建筑面积下降至9135万平方米，同、环比明显回落，跌幅分别为12%和30%。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">克而瑞</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">方面分析认为，一方面，受春</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">节假期因素影响，土地市场迎来一年一度的成交淡季；另一方面，年初各线城市尚在制订2017年供地计划，新晋出让地块以上年度结转土地居多，成交规模高位回落。&nbsp;</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">具体来看，各线城市均有不同程度的缩减，受供地计划影响，一线城市环比跌幅居前。溢价率连续两个季度回落，北上深中心城区优质宅地集体“断供”，一线城市溢价率创近年来单季度新低。与此同时，核心城市周边的三、四线城市土拍高温持续，佛山、惠州、漳州等多市频出高溢价地块，溢价率都在100%以上。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">整体来看，一季度土地平均溢价率32.5%，环比减少8个百分点。克而瑞地产研究中心相关负责人表示，一方面，土地限价城市进一步扩容，显著抑制溢价率上行空间。另一方面，热点城市土地出让底价均有所上调，极端情况下，起拍楼板价超出区域最高单价，溢价空间有限。</span><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">&nbsp;</span></p>','2','14','0','0','0','0','../upload/201806/1529891783614967.jpg','','0','','3','2018-06-25 10:27:19','2018-06-25 10:29:18','0','0','','cn','0','1','','');

DROP TABLE IF EXISTS met_online;
CREATE TABLE `met_online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `no_order` int(11) DEFAULT NULL,
  `qq` text,
  `msn` varchar(100) DEFAULT NULL,
  `taobao` varchar(100) DEFAULT NULL,
  `alibaba` varchar(100) DEFAULT NULL,
  `skype` varchar(100) DEFAULT NULL,
  `lang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_otherinfo;
CREATE TABLE `met_otherinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info1` varchar(255) DEFAULT NULL,
  `info2` varchar(255) DEFAULT NULL,
  `info3` varchar(255) DEFAULT NULL,
  `info4` varchar(255) DEFAULT NULL,
  `info5` varchar(255) DEFAULT NULL,
  `info6` varchar(255) DEFAULT NULL,
  `info7` varchar(255) DEFAULT NULL,
  `info8` text,
  `info9` text,
  `info10` text,
  `imgurl1` varchar(255) DEFAULT NULL,
  `imgurl2` varchar(255) DEFAULT NULL,
  `rightmd5` varchar(255) DEFAULT NULL,
  `righttext` varchar(255) DEFAULT NULL,
  `authcode` text,
  `authpass` varchar(255) DEFAULT NULL,
  `authtext` varchar(255) DEFAULT NULL,
  `data` longtext,
  `lang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO met_otherinfo VALUES('1','','','','','','','','','','','','','','','','','','','metinfo');

DROP TABLE IF EXISTS met_parameter;
CREATE TABLE `met_parameter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `options` text NOT NULL,
  `description` text NOT NULL,
  `no_order` int(2) DEFAULT NULL,
  `type` int(2) DEFAULT NULL,
  `access` int(11) DEFAULT '0',
  `wr_ok` int(2) DEFAULT '0',
  `class1` int(11) NOT NULL,
  `class2` int(11) NOT NULL,
  `class3` int(11) NOT NULL,
  `module` int(2) DEFAULT NULL,
  `lang` varchar(50) DEFAULT NULL,
  `wr_oks` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

INSERT INTO met_parameter VALUES('1','公司名称','','','9','1','0','0','0','0','0','10','cn','1');
INSERT INTO met_parameter VALUES('3','公司传真','','','10','1','0','0','0','0','0','10','cn','1');
INSERT INTO met_parameter VALUES('5','公司联系地址','','','11','1','0','0','0','0','0','10','cn','1');
INSERT INTO met_parameter VALUES('7','公司邮政编码','','','12','1','0','0','0','0','0','10','cn','1');
INSERT INTO met_parameter VALUES('9','公司网址','','','13','1','0','0','0','0','0','10','cn','1');
INSERT INTO met_parameter VALUES('11','建筑类型','','','1','1','0','0','0','0','0','3','cn','1');
INSERT INTO met_parameter VALUES('12','项目状态','','','2','1','0','0','0','0','0','3','cn','1');
INSERT INTO met_parameter VALUES('13','项目面积','','','3','1','0','0','0','0','0','3','cn','1');
INSERT INTO met_parameter VALUES('14','主力户型','','','4','1','0','0','0','0','0','3','cn','1');
INSERT INTO met_parameter VALUES('15','姓名','','','1','1','0','0','0','0','0','6','cn','1');
INSERT INTO met_parameter VALUES('16','联系方式','','','2','1','0','0','0','0','0','6','cn','1');
INSERT INTO met_parameter VALUES('17','Email','','','3','1','0','0','0','0','0','6','cn','1');
INSERT INTO met_parameter VALUES('18','岗位','物业项目经理$|$市场发展经理$|$会员经理$|$平台运营经理$|$平面、UI设计师$|$系统工程师$|$开发工程师','','4','2','0','0','0','0','0','6','cn','1');
INSERT INTO met_parameter VALUES('19','个人简介','','','5','3','0','0','0','0','0','6','cn','1');
INSERT INTO met_parameter VALUES('20','简历上传','','','6','5','0','0','0','0','0','6','cn','1');
INSERT INTO met_parameter VALUES('21','姓名','','','1','1','0','0','0','0','0','7','cn','1');
INSERT INTO met_parameter VALUES('22','联系方式','','','2','1','0','0','0','0','0','7','cn','1');
INSERT INTO met_parameter VALUES('23','Email','','','3','1','0','0','0','0','0','7','cn','1');
INSERT INTO met_parameter VALUES('24','反馈内容','','','5','3','0','0','0','0','0','7','cn','1');

DROP TABLE IF EXISTS met_plist;
CREATE TABLE `met_plist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listid` int(11) DEFAULT NULL,
  `paraid` int(11) DEFAULT NULL,
  `info` text,
  `lang` varchar(50) DEFAULT NULL,
  `imgname` varchar(255) DEFAULT NULL,
  `module` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

INSERT INTO met_plist VALUES('1','1','11','写字楼、公寓、住宅','cn','','3');
INSERT INTO met_plist VALUES('2','1','12','在营','cn','','3');
INSERT INTO met_plist VALUES('3','1','13','18万㎡','cn','','3');
INSERT INTO met_plist VALUES('4','1','14','平层公寓','cn','','3');
INSERT INTO met_plist VALUES('5','2','11','写字楼、公寓','cn','','3');
INSERT INTO met_plist VALUES('6','2','12','在营','cn','','3');
INSERT INTO met_plist VALUES('7','2','13','1.5万㎡','cn','','3');
INSERT INTO met_plist VALUES('8','2','14','平层及错层公寓','cn','','3');
INSERT INTO met_plist VALUES('9','3','11','住宅/商铺','cn','','3');
INSERT INTO met_plist VALUES('10','3','12','在营/在售','cn','','3');
INSERT INTO met_plist VALUES('11','3','13','83万㎡','cn','','3');
INSERT INTO met_plist VALUES('12','3','14','住宅/商铺','cn','','3');
INSERT INTO met_plist VALUES('13','4','11','写字楼','cn','','3');
INSERT INTO met_plist VALUES('14','4','12','在营','cn','','3');
INSERT INTO met_plist VALUES('15','4','13','7.2万㎡','cn','','3');
INSERT INTO met_plist VALUES('16','4','14','办公楼','cn','','3');
INSERT INTO met_plist VALUES('17','5','11','写字楼','cn','','3');
INSERT INTO met_plist VALUES('18','5','12','在营','cn','','3');
INSERT INTO met_plist VALUES('19','5','13','26万㎡','cn','','3');
INSERT INTO met_plist VALUES('20','5','14','写字楼','cn','','3');
INSERT INTO met_plist VALUES('21','6','11','写字楼','cn','','3');
INSERT INTO met_plist VALUES('22','6','12','在营','cn','','3');
INSERT INTO met_plist VALUES('23','6','13','20万㎡','cn','','3');
INSERT INTO met_plist VALUES('24','6','14','写字楼','cn','','3');
INSERT INTO met_plist VALUES('25','7','11','高层住宅、洋房公寓、公寓','cn','','3');
INSERT INTO met_plist VALUES('26','7','12','在营','cn','','3');
INSERT INTO met_plist VALUES('27','7','13','87万㎡','cn','','3');
INSERT INTO met_plist VALUES('28','7','14','两室一厅','cn','','3');
INSERT INTO met_plist VALUES('29','8','11','住宅','cn','','3');
INSERT INTO met_plist VALUES('30','8','12','在营','cn','','3');
INSERT INTO met_plist VALUES('31','8','13','27万㎡','cn','','3');
INSERT INTO met_plist VALUES('32','8','14','109㎡、119㎡、129㎡、139㎡','cn','','3');

DROP TABLE IF EXISTS met_product;
CREATE TABLE `met_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `ctitle` varchar(200) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `description` text,
  `content` longtext,
  `class1` int(11) DEFAULT '0',
  `class2` int(11) DEFAULT '0',
  `class3` int(11) DEFAULT '0',
  `classother` text NOT NULL,
  `no_order` int(11) DEFAULT '0',
  `wap_ok` int(1) DEFAULT '0',
  `new_ok` int(1) DEFAULT '0',
  `imgurl` varchar(255) DEFAULT NULL,
  `imgurls` varchar(255) DEFAULT NULL,
  `displayimg` text,
  `com_ok` int(1) DEFAULT '0',
  `hits` int(11) DEFAULT '0',
  `updatetime` datetime DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `issue` varchar(100) DEFAULT '',
  `access` int(11) DEFAULT '0',
  `top_ok` int(1) DEFAULT '0',
  `filename` varchar(255) DEFAULT NULL,
  `lang` varchar(50) DEFAULT NULL,
  `content1` text,
  `content2` text,
  `content3` text,
  `content4` text,
  `contentinfo` varchar(255) DEFAULT NULL,
  `contentinfo1` varchar(255) DEFAULT NULL,
  `contentinfo2` varchar(255) DEFAULT NULL,
  `contentinfo3` varchar(255) DEFAULT NULL,
  `contentinfo4` varchar(255) DEFAULT NULL,
  `recycle` int(11) NOT NULL DEFAULT '0',
  `displaytype` int(11) NOT NULL DEFAULT '1',
  `tag` text NOT NULL,
  `links` varchar(200) DEFAULT NULL,
  `imgsize` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO met_product VALUES('1','大都汇广场','','','大都汇位于华南旗舰级主题公园旅游度假区旁，西连高铁南站商圈，东接万博商圈，坐拥万千客流。距离地铁3号线汉溪长隆站仅一步之遥。全委托管理分为前期服务与正常期服务。借鉴了现代连锁企业的通行做法，对物业管理的核心价值创造过程进行了重新梳理和再造，从而形成了“市场——开店——运营”的物业服务价值链，同时，对组织架构进行了适应性调整，以确保所有物业管理项目能够得到快速的复制。截至目前，现有全委托物业管理项目','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">大都汇位于华南旗舰级主题公园旅游度假区旁，西连高铁南站商圈，东接万博商圈，坐拥万千客流。距离地铁3号线汉溪长隆站仅一步之遥。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">全委托管理分为前期服务与正常期服务。借鉴了现代连锁企业的通行做法，对物业管理的核心价值创造过程进行了重新梳理和再造，从而形成了“市场——开店——运营”的物业服务价值链，同时，对组织架构进行了适应性调整，以确保所有物业管理项目能够得到快速的复制。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">截至目前，现有全委托物业管理项目近700个(已签约)；全委托管理面积逾1.5亿平方米，业务区域涉足31个省、自治区、直辖市，70余个城市；服务100多万户、300多万人口。</span></p>','3','17','0','','0','0','0','../upload/201806/1529906574.jpg','','','0','2','2018-06-25 13:54:40','2018-06-25 13:54:40','','0','0','','cn','','','','','','','','','','0','1','','','900x500');
INSERT INTO met_product VALUES('2','中达广场','','','中达广场定位为高端商业综合体，包含两栋超甲级写字楼、一栋酒店式服务公寓和时尚商业街全委托管理分为前期服务与正常期服务。借鉴了现代连锁企业的通行做法，对物业管理的核心价值创造过程进行了重新梳理和再造，从而形成了“市场——开店——运营”的物业服务价值链，同时，对组织架构进行了适应性调整，以确保所有物业管理项目能够得到快速的复制。截至目前，现有全委托物业管理项目近700个(已签约)；全委托管理面积逾1.','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">中达广场定位为高端商业综合体，包含两栋超甲级写字楼、一栋酒店式服务公寓和时尚商业街</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">全委托管理分为前期服务与正常期服务。借鉴了现代连锁企业的通行做法，对物业管理的核心价值创造过程进行了重新梳理和再造，从而形成了“市场——开店——运营”的物业服务价值链，同时，对组织架构进行了适应性调整，以确保所有物业管理项目能够得到快速的复制。</span></p><p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">截至目前，现有全委托物业管理项目近700个(已签约)；全委托管理面积逾1.5亿平方米，业务区域涉足31个省、自治区、直辖市，70余个城市；服务100多万户、300多万人口。</span></p>','3','17','0','','0','0','0','../upload/201806/1529906463.jpg','','','0','1','2018-06-25 13:57:22','2018-06-25 13:57:22','','0','0','','cn','','','','','','','','','','0','1','','','900x500');
INSERT INTO met_product VALUES('3','滨湖天地','','','滨湖天地项目位于城西休闲商务区，总占地约293693万方，总建筑面积约83万方。其中商业建筑面积约36万方；住宅建筑面积约44万方。全委托管理分为前期服务与正常期服务。借鉴了现代连锁企业的通行做法，对物业管理的核心价值创造过程进行了重新梳理和再造，从而形成了“市场——开店——运营”的物业服务价值链，同时，对组织架构进行了适应性调整，以确保所有物业管理项目能够得到快速的复制。截至目前，现有全委托物业','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">滨湖天地项目位于城西休闲商务区，总占地约293693万方，总建筑面积约83万方。其中商业建筑面积约36万方；住宅建筑面积约44万方。</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">全委托管理分为前期服务与正常期服务。借鉴了现代连锁企业的通行做法，对物业管理的核心价值创造过程进行了重新梳理和再造，从而形成了“市场——开店——运营”的物业服务价值链，同时，对组织架构进行了适应性调整，以确保所有物业管理项目能够得到快速的复制。</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">截至目前，现有全委托物业管理项目近700个(已签约)；全委托管理面积逾1.5亿平方米，业务区域涉足31个省、自治区、直辖市，70余个城市；服务100多万户、300多万人口。</span></p><p><br/></p>','3','17','0','','0','0','0','../upload/201806/1529906919.jpg','','','0','0','2018-06-25 13:59:56','2018-06-25 13:59:56','','0','0','','cn','','','','','','','','','','0','1','','','900x500');
INSERT INTO met_product VALUES('4','中科广场','','','中科广场驻落于科学城智慧城板块，项目面积约72600平方米，总建筑面积约60411平方米，绿化面积约15000平方米，邻近地铁站，斥资打造的甲级写字楼。全委托管理分为前期服务与正常期服务。借鉴了现代连锁企业的通行做法，对物业管理的核心价值创造过程进行了重新梳理和再造，从而形成了“市场——开店——运营”的物业服务价值链，同时，对组织架构进行了适应性调整，以确保所有物业管理项目能够得到快速的复制。截至','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">中科广场驻落于科学城智慧城板块，项目面积约72600平方米，总建筑面积约60411平方米，绿化面积约15000平方米，邻近地铁站，斥资打造的甲级写字楼。</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">全委托管理分为前期服务与正常期服务。借鉴了现代连锁企业的通行做法，对物业管理的核心价值创造过程进行了重新梳理和再造，从而形成了“市场——开店——运营”的物业服务价值链，同时，对组织架构进行了适应性调整，以确保所有物业管理项目能够得到快速的复制。</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">截至目前，现有全委托物业管理项目近700个(已签约)；全委托管理面积逾1.5亿平方米，业务区域涉足31个省、自治区、直辖市，70余个城市；服务100多万户、300多万人口。</span></p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\"><br/></span><p><br/></p>','3','16','0','','0','0','0','../upload/201806/1529906781.jpg','','','0','3','2018-06-25 14:02:34','2018-06-25 14:02:34','','0','0','','cn','','','','','','','','','','0','1','','','900x500');
INSERT INTO met_product VALUES('5','克洛维广场','','','克洛维广场在城市中轴线旁，位置属于新城商业核心区，位置属于新城商业核心区。连接三个商务圈，交通四通八达，商业气氛浓郁，能聚人气、财气。全委托管理分为前期服务与正常期服务。借鉴了现代连锁企业的通行做法，对物业管理的核心价值创造过程进行了重新梳理和再造，从而形成了“市场——开店——运营”的物业服务价值链，同时，对组织架构进行了适应性调整，以确保所有物业管理项目能够得到快速的复制。截至目前，现有全委托物','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">克洛维广场在城市中轴线旁，位置属于新城商业核心区，位置属于新城商业核心区。连接三个商务圈，交通四通八达，商业气氛浓郁，能聚人气、财气。</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">全委托管理分为前期服务与正常期服务。借鉴了现代连锁企业的通行做法，对物业管理的核心价值创造过程进行了重新梳理和再造，从而形成了“市场——开店——运营”的物业服务价值链，同时，对组织架构进行了适应性调整，以确保所有物业管理项目能够得到快速的复制。</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">截至目前，现有全委托物业管理项目近700个(已签约)；全委托管理面积逾1.5亿平方米，业务区域涉足31个省、自治区、直辖市，70余个城市；服务100多万户、300多万人口。</span></p>','3','16','0','','0','0','0','../upload/201806/1529907439.jpg','','','0','0','2018-06-25 14:09:01','2018-06-25 14:09:01','','0','0','','cn','','','','','','','','','','0','1','','','900x500');
INSERT INTO met_product VALUES('6','威座大厦','','','地处新城核心区，紧邻新城中央广场，北接金穗路，南抵兴盛路，东达主干道冼村路，北接嘉裕酒店，西临大道东，地理位置优越全委托管理分为前期服务与正常期服务。借鉴了现代连锁企业的通行做法，对物业管理的核心价值创造过程进行了重新梳理和再造，从而形成了“市场——开店——运营”的物业服务价值链，同时，对组织架构进行了适应性调整，以确保所有物业管理项目能够得到快速的复制。截至目前，现有全委托物业管理项目近700个','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">地处新城核心区，紧邻新城中央广场，北接金穗路，南抵兴盛路，东达主干道冼村路，北接嘉裕酒店，西临大道东，地理位置优越</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">全委托管理分为前期服务与正常期服务。借鉴了现代连锁企业的通行做法，对物业管理的核心价值创造过程进行了重新梳理和再造，从而形成了“市场——开店——运营”的物业服务价值链，同时，对组织架构进行了适应性调整，以确保所有物业管理项目能够得到快速的复制。</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">截至目前，现有全委托物业管理项目近700个(已签约)；全委托管理面积逾1.5亿平方米，业务区域涉足31个省、自治区、直辖市，70余个城市；服务100多万户、300多万人口。</span></p>','3','16','0','','0','0','0','../upload/201806/1529907476.jpg','','','0','0','2018-06-25 14:11:01','2018-06-25 14:11:01','','0','0','','cn','','','','','','','','','','0','1','','','900x500');
INSERT INTO met_product VALUES('7','江上明珠','','','总建总面积87万平米，规划为洋房和高层两种建筑形态，现有洋房住宅26栋，高层住宅30栋，商业中心1个，糼儿园1个，江上明珠项目将成为主城区标杆豪宅项目。全委托管理分为前期服务与正常期服务。借鉴了现代连锁企业的通行做法，对物业管理的核心价值创造过程进行了重新梳理和再造，从而形成了“市场——开店——运营”的物业服务价值链，同时，对组织架构进行了适应性调整，以确保所有物业管理项目能够得到快速的复制。截至','<p><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">总建总面积87万平米，规划为洋房和高层两种建筑形态，现有洋房住宅26栋，高层住宅30栋，商业中心1个，糼儿园1个，江上明珠项目将成为主城区标杆豪宅项目。</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">全委托管理分为前期服务与正常期服务。借鉴了现代连锁企业的通行做法，对物业管理的核心价值创造过程进行了重新梳理和再造，从而形成了“市场——开店——运营”的物业服务价值链，同时，对组织架构进行了适应性调整，以确保所有物业管理项目能够得到快速的复制。</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">截至目前，现有全委托物业管理项目近700个(已签约)；全委托管理面积逾1.5亿平方米，业务区域涉足31个省、自治区、直辖市，70余个城市；服务100多万户、300多万人口。</span></p>','3','15','0','','0','0','0','../upload/201806/1529907585.jpg','','','0','0','2018-06-25 14:14:57','2018-06-25 14:14:57','','0','0','','cn','','','','','','','','','','0','1','','','900x500');
INSERT INTO met_product VALUES('8','香槟国际','','','全委托管理分为前期服务与正常期服务。借鉴了现代连锁企业的通行做法，对物业管理的核心价值创造过程进行了重新梳理和再造，从而形成了“市场——开店——运营”的物业服务价值链，同时，对组织架构进行了适应性调整，以确保所有物业管理项目能够得到快速的复制。截至目前，现有全委托物业管理项目近700个(已签约)；全委托管理面积逾1.5亿平方米，业务区域涉足31个省、自治区、直辖市，70余个城市；服务100多万户、','<p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">全委托管理分为前期服务与正常期服务。借鉴了现代连锁企业的通行做法，对物业管理的核心价值创造过程进行了重新梳理和再造，从而形成了“市场——开店——运营”的物业服务价值链，同时，对组织架构进行了适应性调整，以确保所有物业管理项目能够得到快速的复制。</span></p><p style=\"white-space: normal;\"><span style=\"font-family: 微软雅黑, &quot;Microsoft YaHei&quot;;\">截至目前，现有全委托物业管理项目近700个(已签约)；全委托管理面积逾1.5亿平方米，业务区域涉足31个省、自治区、直辖市，70余个城市；服务100多万户、300多万人口。</span></p><p><br/></p>','3','15','0','','0','0','0','../upload/201806/1529907686.jpg','','','0','4','2018-06-25 14:17:07','2018-06-25 14:17:07','','0','0','','cn','','','','','','','','','','0','1','','','900x500');

DROP TABLE IF EXISTS met_skin_table;
CREATE TABLE `met_skin_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skin_name` varchar(200) DEFAULT NULL,
  `skin_file` varchar(20) DEFAULT NULL,
  `skin_info` text,
  `devices` int(11) NOT NULL DEFAULT '0',
  `ver` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO met_skin_table VALUES('2','mui169','mui169','','0','');

DROP TABLE IF EXISTS met_sms;
CREATE TABLE `met_sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `content` text NOT NULL,
  `tel` text NOT NULL,
  `remark` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_visit_day;
;

DROP TABLE IF EXISTS met_visit_detail;
;

DROP TABLE IF EXISTS met_visit_summary;
;

DROP TABLE IF EXISTS met_mlist;
CREATE TABLE `met_mlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listid` int(11) DEFAULT NULL,
  `paraid` int(11) DEFAULT NULL,
  `info` text,
  `lang` varchar(50) DEFAULT NULL,
  `imgname` varchar(255) DEFAULT NULL,
  `module` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_ifcolumn;
CREATE TABLE `met_ifcolumn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `appname` varchar(50) NOT NULL COMMENT '应用名称',
  `addfile` tinyint(1) NOT NULL DEFAULT '1',
  `memberleft` tinyint(1) NOT NULL DEFAULT '0',
  `uniqueness` tinyint(1) NOT NULL DEFAULT '0',
  `fixed_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_ifcolumn_addfile;
CREATE TABLE `met_ifcolumn_addfile` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `m_module` varchar(255) NOT NULL,
  `m_class` varchar(255) NOT NULL,
  `m_action` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_ifmember_left;
CREATE TABLE `met_ifmember_left` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `no` int(11) NOT NULL,
  `columnid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `foldername` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_applist;
CREATE TABLE `met_applist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` int(11) NOT NULL,
  `ver` varchar(50) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `m_class` varchar(50) NOT NULL,
  `m_action` varchar(50) NOT NULL,
  `appname` varchar(50) NOT NULL,
  `info` text NOT NULL,
  `addtime` int(11) NOT NULL,
  `updatetime` int(11) NOT NULL,
  `target` int(11) NOT NULL DEFAULT '0',
  `display` int(11) NOT NULL DEFAULT '1',
  `depend` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO met_applist VALUES('1','0','1.0','ueditor','index','doindex','百度编辑器','编辑器','0','0','0','0','');
INSERT INTO met_applist VALUES('2','10070','1.0','met_sms','index','doindex','短信功能','短信接口','0','0','0','1','');
INSERT INTO met_applist VALUES('3','50002','1.0','met_template','temtool','dotemlist','官方模板管理工具','官方商业模板请在此进行管理操作','0','0','0','2','');
INSERT INTO met_applist VALUES('13','50002','1.0','met_template','temtool','dotemlist','模板管理工具','模板管理工具','1531188927','1531188927','0','1','');

DROP TABLE IF EXISTS met_app_plugin;
CREATE TABLE `met_app_plugin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_order` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `m_action` varchar(255) NOT NULL,
  `effect` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_wapmenu;
;


DROP TABLE IF EXISTS met_infoprompt;
CREATE TABLE `met_infoprompt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `newstitle` varchar(120) NOT NULL,
  `content` text NOT NULL,
  `url` varchar(200) NOT NULL,
  `member` varchar(50) NOT NULL,
  `type` varchar(35) NOT NULL,
  `time` int(11) NOT NULL,
  `see_ok` int(11) NOT NULL DEFAULT '0',
  `lang` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO met_infoprompt VALUES('1','0','关于2018年端午节放假与售后服务调整的通知','','https://www.metinfo.cn/news/shownews1605.htm','','metinfo','1529029396','0','metinfo');
INSERT INTO met_infoprompt VALUES('2','0','米拓试用延期和试用站公开访问功能正式上线','','https://www.metinfo.cn/news/shownews1604.htm','','metinfo','1528972299','0','metinfo');
INSERT INTO met_infoprompt VALUES('3','0','米拓1元体验建站正式上线','','https://www.metinfo.cn/news/shownews1603.htm','','metinfo','1528944363','0','metinfo');
INSERT INTO met_infoprompt VALUES('4','0','试用转正功能正式上线（阿里云服务器上线销售）','','https://www.metinfo.cn/news/shownews1602.htm','','metinfo','1528870052','0','metinfo');
INSERT INTO met_infoprompt VALUES('5','0','米拓建站-高端|快速|开源','','https://www.metinfo.cn/news/shownews1591.htm','','metinfo','1527986447','0','metinfo');
INSERT INTO met_infoprompt VALUES('6','0','2018年5月米拓团队建设泰国行','','https://www.metinfo.cn/news/shownews1578.htm','','metinfo','1526347182','0','metinfo');
INSERT INTO met_infoprompt VALUES('7','0','5月3日-8日，米拓团建活动进行中','','https://www.metinfo.cn/news/shownews1577.htm','','metinfo','1525261505','0','metinfo');
INSERT INTO met_infoprompt VALUES('8','0','关于售后技术支持服务调整的通知','','https://www.metinfo.cn/news/shownews1574.htm','','metinfo','1524920272','0','metinfo');
INSERT INTO met_infoprompt VALUES('9','0','关于5月3日-8日米拓团建活动期间售后服务调整的通知','','https://www.metinfo.cn/news/shownews1576.htm','','metinfo','1524920128','0','metinfo');
INSERT INTO met_infoprompt VALUES('10','0','关于2018年五一劳动节放假与售后服务调整的通知','','https://www.metinfo.cn/news/shownews1573.htm','','metinfo','1524920059','0','metinfo');
INSERT INTO met_infoprompt VALUES('11','0','米拓售后服务已全部转为工单系统','','https://www.metinfo.cn/news/shownews1616.htm','','metinfo','1530154917','0','metinfo');
INSERT INTO met_infoprompt VALUES('12','0','阿里云图片云加速临时异常导致米拓演示站无法正常显示','','https://www.metinfo.cn/news/shownews1615.htm','','metinfo','1530092569','0','metinfo');

DROP TABLE IF EXISTS met_templates;
CREATE TABLE `met_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` varchar(20) NOT NULL,
  `pos` int(11) NOT NULL,
  `no_order` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `style` int(11) NOT NULL DEFAULT '0',
  `selectd` varchar(500) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` text NOT NULL,
  `defaultvalue` text NOT NULL,
  `valueinfo` varchar(100) NOT NULL,
  `tips` varchar(255) NOT NULL,
  `lang` varchar(50) NOT NULL,
  `bigclass` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=175 DEFAULT CHARSET=utf8;

INSERT INTO met_templates VALUES('1','metv6','0','1','1','3','','met_head','','','顶部设置','','cn','0');
INSERT INTO met_templates VALUES('2','metv6','0','4','4','3','$M$开启$T$1$M$关闭$T$0','navbullet_ok','1','1','下拉动画','','cn','1');
INSERT INTO met_templates VALUES('3','metv6','0','7','4','3','$M$头部$T$1$M$底部$T$0','langlist_position','1','1','多语言位置','','cn','1');
INSERT INTO met_templates VALUES('4','metv6','0','2','4','3','$M$开启$T$1$M$关闭$T$0','navbarok','1','1','下拉菜单','','cn','1');
INSERT INTO met_templates VALUES('5','metv6','0','5','2','3','','all','全部','全部','下拉菜单全部','仅在手机端显示','cn','1');
INSERT INTO met_templates VALUES('6','metv6','0','3','2','3','','nav_ml','10','10','导航间距','默认是0，仅支持5的倍数（0/5/10/15/20...最大50）<br/>不同网站的导航数量不同，根据需求适当调整间距，让网站更协调。','cn','1');
INSERT INTO met_templates VALUES('7','metv6','0','8','4','3','$M$开启$T$1$M$关闭$T$0','langlist1_icon_ok','1','1','语言国旗开关','','cn','1');
INSERT INTO met_templates VALUES('8','metv6','0','6','4','3','$M$鼠标经过$T$1$M$点击展开$T$0','navhoverok','1','1','下拉方式','','cn','1');
INSERT INTO met_templates VALUES('9','metv6','1','1','1','3','','met_index_news','','','首页新闻区块','','cn','0');
INSERT INTO met_templates VALUES('10','metv6','1','6','4','3','$M$全部$T$all$M$推荐$T$com','home_news_type','','all','调用类型','','cn','9');
INSERT INTO met_templates VALUES('11','metv6','1','7','2','3','','home_news_more','','MOER','更多文字','','cn','9');
INSERT INTO met_templates VALUES('12','metv6','1','4','6','3','','home_news3','','3','新闻区块三','调用当前栏目的内容列表','cn','9');
INSERT INTO met_templates VALUES('13','metv6','1','2','6','3','','home_news1','','4','新闻区块一','调用当前栏目的内容列表','cn','9');
INSERT INTO met_templates VALUES('14','metv6','1','3','6','3','','home_news2','','5','新闻区块二','调用当前栏目的内容列表','cn','9');
INSERT INTO met_templates VALUES('15','metv6','1','5','2','3','','home_news_num','','5','调用条数','','cn','9');
INSERT INTO met_templates VALUES('16','metv6','0','25','1','3','','banner','','','banner设置','','cn','0');
INSERT INTO met_templates VALUES('17','metv6','0','27','9','3','','page_top_bgcolor','','#ccc','内页无banner背景色','','cn','16');
INSERT INTO met_templates VALUES('18','metv6','0','28','9','3','','bannersub_color','','#fff','内页无banner字体色','','cn','16');
INSERT INTO met_templates VALUES('19','metv6','0','26','4','3','$M$提示$T$1','info','','1','提示','此banner是图片不适合设置高度，如果觉得banner尺寸不合适请更换banner尺寸','cn','16');
INSERT INTO met_templates VALUES('20','metv6','3','22','1','3','','product_bar','','','产品模块侧边栏','','cn','0');
INSERT INTO met_templates VALUES('21','metv6','3','24','2','3','','product_sidebar_piclist_num','','5','调用条数','','cn','20');
INSERT INTO met_templates VALUES('22','metv6','3','25','4','3','$M$全部$T$all$M$推荐$T$com','product_sidebar_piclist_type','','com','调用类型','','cn','20');
INSERT INTO met_templates VALUES('23','metv6','3','23','2','3','','product_sidebar_piclist_title','','热门推荐','区块标题','','cn','20');
INSERT INTO met_templates VALUES('24','metv6','3','15','1','3','','img_bar','','','图片模块侧边栏','','cn','0');
INSERT INTO met_templates VALUES('25','metv6','3','21','4','3','$M$开启$T$1$M$关闭$T$0','img_column3_ok','','1','三级栏目开关','','cn','24');
INSERT INTO met_templates VALUES('26','metv6','3','20','4','3','$M$开启$T$1$M$关闭$T$0','imgbar_column_open','','1','侧栏栏目开关','','cn','24');
INSERT INTO met_templates VALUES('27','metv6','3','19','2','3','','img_bar_list_num','','5','侧栏列表图片数量','','cn','24');
INSERT INTO met_templates VALUES('28','metv6','3','17','2','3','','img_bar_list_title','','为您推荐','侧栏图片列表标题','','cn','24');
INSERT INTO met_templates VALUES('29','metv6','3','16','4','3','$M$开启$T$1$M$关闭$T$0','img_bar_list_open','','1','侧栏图片列表开关','','cn','24');
INSERT INTO met_templates VALUES('30','metv6','3','18','4','3','$M$全部$T$all$M$推荐$T$com','img_bar_list_type','','com','侧栏列表图片类型','','cn','24');
INSERT INTO met_templates VALUES('31','metv6','0','17','1','3','','global','','','全局参数','','cn','0');
INSERT INTO met_templates VALUES('32','metv6','0','19','2','3','','page_ajax_next','加载更多','加载更多','分页文字','无刷新分页默认文字','cn','31');
INSERT INTO met_templates VALUES('33','metv6','0','20','2','3','','nodata','没有数据了','没有数据了','无数据提示','','cn','31');
INSERT INTO met_templates VALUES('34','metv6','0','22','9','3','','first_color','#ba1111','#000000','模板主色调','','cn','31');
INSERT INTO met_templates VALUES('35','metv6','0','21','2','3','','search_placeholder','请输入内容关键词1','请输入内容关键词','搜索文字','','cn','31');
INSERT INTO met_templates VALUES('36','metv6','0','23','4','3','当前窗口打开$T$_self$M$新窗口打开$T$_blank$M$','met_listurlblank','_blank','_self','页面链接','','cn','31');
INSERT INTO met_templates VALUES('37','metv6','0','18','2','3','','sub_all','全部','全部','页面文字','','cn','31');
INSERT INTO met_templates VALUES('38','metv6','0','24','2','3','','font_family','','','页面字体','非特殊语种，建议留空使用模板默认字体','cn','31');
INSERT INTO met_templates VALUES('39','metv6','0','9','1','3','','met_position','','','当前位置','','cn','0');
INSERT INTO met_templates VALUES('40','metv6','0','10','2','3','','position_text','','你的位置','当前位置标题','','cn','39');
INSERT INTO met_templates VALUES('41','metv6','0','11','4','3','$M$开启$T$1$M$关闭$T$0','tagshow_1','','1','区域开关','','cn','39');
INSERT INTO met_templates VALUES('42','metv6','2','7','1','3','','subcolumn_nav','','','子栏目设置','','cn','0');
INSERT INTO met_templates VALUES('43','metv6','2','8','4','3','$M$开启$T$1$M$关闭$T$0','tagshow_2','','1','区块开关','','cn','42');
INSERT INTO met_templates VALUES('44','metv6','2','3','1','3','','met_img','','','图片模块','','cn','0');
INSERT INTO met_templates VALUES('45','metv6','2','5','1','3','','met_job','','','招聘模块','','cn','0');
INSERT INTO met_templates VALUES('46','metv6','2','6','2','3','','cvtitle','','在线应聘','按钮文字','','cn','45');
INSERT INTO met_templates VALUES('47','metv6','3','8','1','3','','downlaod_bar','','','下载模块侧边栏','','cn','0');
INSERT INTO met_templates VALUES('48','metv6','3','9','2','3','','download_bar_list_title','','为你推荐','侧栏下载列表标题','','cn','47');
INSERT INTO met_templates VALUES('49','metv6','3','10','2','3','','sidebar_downloadlist_num','','5','侧栏下载列表数量','','cn','47');
INSERT INTO met_templates VALUES('50','metv6','3','12','4','3','$M$开启$T$1$M$关闭$T$0','download_column3_ok','','1','三级栏目开关','','cn','47');
INSERT INTO met_templates VALUES('51','metv6','3','11','4','3','$M$全部$T$all$M$推荐$T$com','download_bar_list_type','','com','侧栏列表下载类型','','cn','47');
INSERT INTO met_templates VALUES('52','metv6','3','14','4','3','$M$开启$T$1$M$关闭$T$0','sidebar_downloadlist_ok','','1','侧栏文章列表开关','','cn','47');
INSERT INTO met_templates VALUES('53','metv6','3','13','4','3','$M$开启$T$1$M$关闭$T$0','downloadsidebar_column_ok','','1','侧栏栏目开关','','cn','47');
INSERT INTO met_templates VALUES('54','metv6','2','9','1','3','','met_news','','','文章模块','','cn','0');
INSERT INTO met_templates VALUES('55','metv6','2','10','4','3','$M$开启$T$1$M$关闭$T$0','news_imgok','','1','图片开关','','cn','54');
INSERT INTO met_templates VALUES('56','metv6','0','12','1','3','','met_foot','','','底部设置','','cn','0');
INSERT INTO met_templates VALUES('57','metv6','0','16','4','3','$M$开启$T$1$M$关闭$T$0','cn1_ok','','1','简繁体切换开关','','cn','56');
INSERT INTO met_templates VALUES('58','metv6','0','14','2','3','','footlink_title','','友情链接','友情链接标题','','cn','56');
INSERT INTO met_templates VALUES('59','metv6','0','13','4','3','$M$开启$T$1$M$关闭$T$0','link_ok','','1','友情链接开关','','cn','56');
INSERT INTO met_templates VALUES('60','metv6','0','15','4','3','$M$底部$T$0$M$顶部$T$1','cn1_position','','0','简繁体切换按钮位置','','cn','56');
INSERT INTO met_templates VALUES('61','metv6','3','1','1','3','','news_bar','','','文章模块侧边栏','','cn','0');
INSERT INTO met_templates VALUES('62','metv6','3','7','4','3','$M$全部$T$all$M$推荐$T$com','news_bar_list_type','','com','侧栏列表文章类型','','cn','61');
INSERT INTO met_templates VALUES('63','metv6','3','6','2','3','','news_bar_list_num','','5','侧栏列表文章数量','','cn','61');
INSERT INTO met_templates VALUES('64','metv6','3','2','4','3','$M$开启$T$1$M$关闭$T$0','bar_column3_open','','1','三级栏目开关','除开产品模块以外的侧栏','cn','61');
INSERT INTO met_templates VALUES('65','metv6','3','4','4','3','$M$开启$T$1$M$关闭$T$0','news_bar_list_open','','1','侧栏文章列表开关','','cn','61');
INSERT INTO met_templates VALUES('66','metv6','3','3','4','3','$M$开启$T$1$M$关闭$T$0','bar_column_open','','1','侧栏栏目开关','除开产品模块以外的侧栏','cn','61');
INSERT INTO met_templates VALUES('67','metv6','3','5','2','3','','news_bar_list_title','','为您推荐','侧栏文章列表标题','','cn','61');
INSERT INTO met_templates VALUES('68','metv6','2','1','1','3','','met_download','','','下载模块','','cn','0');
INSERT INTO met_templates VALUES('69','metv6','2','2','2','3','','download','','立即下载','按钮文字','','cn','68');
INSERT INTO met_templates VALUES('70','metv6','0','29','1','3','','met_contact','','','底部联系信息设置','','cn','0');
INSERT INTO met_templates VALUES('71','metv6','0','30','2','3','','footinfo_tel','111','','服务热线','','cn','70');
INSERT INTO met_templates VALUES('72','metv6','0','31','2','3','','footinfo_dsc','wrewt','','描述文字','','cn','70');
INSERT INTO met_templates VALUES('73','metv6','0','32','4','3','$M$开启$T$1$M$关闭$T$0','footinfo_wx_ok','1','1','微信','','cn','70');
INSERT INTO met_templates VALUES('74','metv6','0','33','7','3','','footinfo_wx','../upload/201801/1515570241107588.jpg','','微信二维码','','cn','70');
INSERT INTO met_templates VALUES('75','metv6','0','34','4','3','$M$开启$T$1$M$关闭$T$0','footinfo_qq_ok','1','1','QQ','','cn','70');
INSERT INTO met_templates VALUES('76','metv6','0','35','4','3','$M$个人QQ$T$1$M$企业营销QQ$T$2','foot_info_qqtype','1','1','QQ类型','个人QQ和企业营销QQ超链接结构不一样，因此请务必选择正确。','cn','70');
INSERT INTO met_templates VALUES('77','metv6','0','36','2','3','','footinfo_qq','','','QQ号码','点击QQ链接可直接对话，需要先到 shang.qq.com 免费开通。<br/>企业营销QQ 无需开通','cn','70');
INSERT INTO met_templates VALUES('78','metv6','0','37','4','3','$M$开启$T$1$M$关闭$T$0','footinfo_sina_ok','1','1','新浪微博','','cn','70');
INSERT INTO met_templates VALUES('79','metv6','0','38','2','3','','footinfo_sina','','','新浪微博网址','请输入微博网址','cn','70');
INSERT INTO met_templates VALUES('80','metv6','0','39','4','3','$M$开启$T$1$M$关闭$T$0','footinfo_twitterok','0','0','twitter（推特）','','cn','70');
INSERT INTO met_templates VALUES('81','metv6','0','40','2','3','','footinfo_twitter','','','twitter网址','','cn','70');
INSERT INTO met_templates VALUES('82','metv6','0','41','4','3','$M$开启$T$1$M$关闭$T$0','footinfo_googleok','0','0','google+','','cn','70');
INSERT INTO met_templates VALUES('83','metv6','0','42','2','3','','footinfo_google','','','google+网址','','cn','70');
INSERT INTO met_templates VALUES('84','metv6','0','43','4','3','$M$开启$T$1$M$关闭$T$0','footinfo_facebookok','0','0','Facebook','','cn','70');
INSERT INTO met_templates VALUES('85','metv6','0','44','2','3','','footinfo_facebook','','','Facebook网址','','cn','70');
INSERT INTO met_templates VALUES('86','metv6','0','45','4','3','$M$开启$T$1$M$关闭$T$0','footinfo_emailok','0','0','邮箱','','cn','70');
INSERT INTO met_templates VALUES('87','metv6','0','46','2','3','','footinfo_email','','','邮箱地址','','cn','70');

DROP TABLE IF EXISTS met_user;
CREATE TABLE `met_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `head` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `groupid` int(11) NOT NULL,
  `register_time` int(11) NOT NULL,
  `register_ip` varchar(15) NOT NULL,
  `login_time` int(11) NOT NULL,
  `login_count` int(11) NOT NULL,
  `login_ip` varchar(15) NOT NULL,
  `valid` int(1) NOT NULL,
  `source` varchar(20) NOT NULL,
  `lang` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_user_group;
CREATE TABLE `met_user_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `access` int(11) NOT NULL,
  `lang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO met_user_group VALUES('1','普通会员','1','cn');
INSERT INTO met_user_group VALUES('2','代理商','3','cn');

DROP TABLE IF EXISTS met_user_list;
CREATE TABLE `met_user_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listid` int(11) DEFAULT NULL,
  `paraid` int(11) DEFAULT NULL,
  `info` text,
  `lang` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_user_other;
CREATE TABLE `met_user_other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `met_uid` int(11) NOT NULL,
  `openid` varchar(100) NOT NULL,
  `unionid` varchar(100) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `expires_in` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `openid` (`openid`),
  KEY `met_uid` (`met_uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_ui_list;
CREATE TABLE `met_ui_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `installid` int(10) NOT NULL,
  `parent_name` varchar(100) NOT NULL,
  `ui_name` varchar(100) NOT NULL,
  `skin_name` varchar(100) NOT NULL,
  `ui_page` varchar(200) NOT NULL,
  `ui_title` varchar(100) NOT NULL,
  `ui_description` varchar(500) NOT NULL,
  `ui_order` int(10) NOT NULL DEFAULT '0',
  `ui_version` varchar(100) NOT NULL,
  `ui_installtime` int(10) NOT NULL,
  `ui_edittime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

INSERT INTO met_ui_list VALUES('1','1','head_nav','met_11_1','mui169','head','头部导航（简洁风格）','头部导航（简洁风格）','1','2.6','1529562137','1531894971');
INSERT INTO met_ui_list VALUES('2','2','banner','met_16_1','mui169','head','bootstrap最常见banner','bootstrap最常见banner','2','2.1','1529562157','1532507444');
INSERT INTO met_ui_list VALUES('3','3','foot_nav','met_11_1','mui169','foot','底部导航（简洁风格）','底部导航（简洁风格）','1','1.2','1529562188','1529562188');
INSERT INTO met_ui_list VALUES('4','4','foot_info','met_11_1','mui169','foot','底部信息（简洁风格）','底部信息（简洁风格）','2','1.4','1529562202','1529562202');
INSERT INTO met_ui_list VALUES('5','5','back_top','met_16_1','mui169','foot','返回顶部','返回顶部按钮','3','1.0','1529562216','1529562216');
INSERT INTO met_ui_list VALUES('6','6','show','met_16_1','mui169','show','简介模块详情内容','简介模块详情内容','2','1.2','1529562240','1529562240');
INSERT INTO met_ui_list VALUES('7','7','subcolumn_nav','met_16_1','mui169','show','内页子栏目列表','','1','1.9','1529562274','1529562274');
INSERT INTO met_ui_list VALUES('8','8','subcolumn_nav','met_16_1','mui169','news','内页子栏目列表','','1','1.9','1529562317','1529562317');
INSERT INTO met_ui_list VALUES('9','9','news_list_page','met_11_1','mui169','news','文章列表页（简洁风格）','图文风格的文章列表页（简洁风格）','2','2.0','1529562365','1531894976');
INSERT INTO met_ui_list VALUES('10','10','sidebar','met_16_1','mui169','news','内页公共侧栏','','3','1.2','1529562382','1529562382');
INSERT INTO met_ui_list VALUES('11','11','subcolumn_nav','met_16_1','mui169','product','内页子栏目列表','','1','1.9','1529562414','1529562414');
INSERT INTO met_ui_list VALUES('12','12','para_search','met_16_1','mui169','product','参数搜索','参数搜索','2','2.0','1529562428','1531186471');
INSERT INTO met_ui_list VALUES('43','43','subcolumn_nav','met_16_1','mui169','job','内页子栏目列表','','1','1.9','1529911225','1529911225');
INSERT INTO met_ui_list VALUES('42','42','service_list','met_16_1','mui169','index','上图标下文字列表','','1','1.8','1529895478','1531186471');
INSERT INTO met_ui_list VALUES('14','14','img_list_page','met_16_1','mui169','img','图片模块列表','','2','1.4','1529562488','1529562488');
INSERT INTO met_ui_list VALUES('15','15','subcolumn_nav','met_16_1','mui169','img','内页子栏目列表','','1','1.9','1529562503','1529562503');
INSERT INTO met_ui_list VALUES('18','18','job_list_page','met_16_1','mui169','job','默认招聘列表页','默认招聘列表页','2','1.1','1529562574','1529562574');
INSERT INTO met_ui_list VALUES('17','17','download_list_page','met_16_1','mui169','download','下载列表','','1','1.4','1529562547','1529562547');
INSERT INTO met_ui_list VALUES('19','19','message_list','met_16_1','mui169','message_index','留言列表','','1','1.2','1529562593','1529562593');
INSERT INTO met_ui_list VALUES('20','20','message_form','met_16_1','mui169','message_index','留言表单','留言表单','2','1.2','1529562605','1531192524');
INSERT INTO met_ui_list VALUES('21','21','feedback','met_16_1','mui169','feedback','反馈表单','','1','1.6','1529562620','1529562620');
INSERT INTO met_ui_list VALUES('22','22','news_list_detail','met_16_1','mui169','shownews','大众详情页','大众详情页','1','1.5','1529562659','1529562659');
INSERT INTO met_ui_list VALUES('23','23','sidebar','met_16_1','mui169','shownews','内页公共侧栏','','2','1.2','1529562679','1529562679');
INSERT INTO met_ui_list VALUES('24','24','product_list_detail','met_16_1','mui169','showproduct','无商城产品模块详情','无商城产品模块详情','1','2.3','1529562696','1531894981');
INSERT INTO met_ui_list VALUES('25','25','download_list_detail','met_11_2','mui169','showdownload','下载详情页（拟物风格）','下载详情页（拟物风格）','1','1.1','1529562762','1529562762');
INSERT INTO met_ui_list VALUES('26','26','img_list_detail','met_16_1','mui169','showimg','图片模块详情','图片模块详情','1','1.6','1529562777','1531186473');
INSERT INTO met_ui_list VALUES('27','27','job_list_detail','met_16_1','mui169','showjob','招聘模块详情页','招聘模块详情页','1','1.0','1529562794','1529562794');
INSERT INTO met_ui_list VALUES('28','28','shopproduct_list_detail','met_16_1','mui169','shop_showproduct','商城产品模块详情','商城产品模块详情','1','1.5','1529562963','1531894984');
INSERT INTO met_ui_list VALUES('29','29','sitemap','met_16_1','mui169','sitemap','网站地图模块','网站地图模块','1','1.0','1529563523','1529563523');
INSERT INTO met_ui_list VALUES('30','30','search','met_16_1','mui169','search','全局搜索模块','全局搜索模块','1','1.2','1529563604','1529563604');
INSERT INTO met_ui_list VALUES('31','31','404','met_16_1','mui169','404','简单的404页面','简单的404页面','1','1.0','1529563624','1529563624');
INSERT INTO met_ui_list VALUES('41','41','product_list_page','met_11_1','mui169','product','产品列表页（简洁风格）','产品列表页（简洁风格）','3','1.4','1529895058','1531273073');
INSERT INTO met_ui_list VALUES('35','35','product_list','met_36_1','mui169','index','首页轮播产品列表','首页轮播产品列表','2','1.1','1529569202','1531188563');
INSERT INTO met_ui_list VALUES('34','34','about_list','met_28_3','mui169','index','首页简介内容(背景滚动)','','3','1.0','1529565504','1529565504');
INSERT INTO met_ui_list VALUES('36','36','video','met_16_1','mui169','index','视频区块','视频区块','4','1.2','1529569297','1532052106');
INSERT INTO met_ui_list VALUES('38','38','link','met_11_1','mui169','index','友情链接（简洁风格）','友情链接（简洁风格）','6','1.2','1529569426','1529569426');
INSERT INTO met_ui_list VALUES('39','39','news_list','met_36_2','mui169','index','首页新闻区块','首页新闻区块','5','1.0','1529893824','1529893824');

DROP TABLE IF EXISTS met_ui_config;
CREATE TABLE `met_ui_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL,
  `parent_name` varchar(100) NOT NULL,
  `ui_name` varchar(100) NOT NULL,
  `skin_name` varchar(100) NOT NULL,
  `uip_type` int(10) NOT NULL,
  `uip_style` tinyint(1) NOT NULL,
  `uip_select` varchar(500) NOT NULL DEFAULT '1',
  `uip_name` varchar(100) NOT NULL,
  `uip_key` varchar(100) NOT NULL,
  `uip_value` text NOT NULL,
  `uip_default` varchar(255) NOT NULL,
  `uip_title` varchar(100) NOT NULL,
  `uip_description` varchar(255) NOT NULL,
  `uip_order` int(10) unsigned NOT NULL DEFAULT '0',
  `lang` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=528 DEFAULT CHARSET=utf8;

INSERT INTO met_ui_config VALUES('1','0','global','system','mui169','9','0','','firstcolor','firstcolor','#333333','#ffffff','模板主色调','一般为标题颜色，也可以使用各区块颜色参数单独设置区块为不同颜色','2','cn');
INSERT INTO met_ui_config VALUES('2','0','global','system','mui169','9','0','','secondcolor','secondcolor','#666666','#ffffff','模板副色调','一般为副标题或描述颜色，也可以使用各区块颜色参数单独设置区块为不同颜色','3','cn');
INSERT INTO met_ui_config VALUES('3','0','global','system','mui169','9','0','','thirdcolor','thirdcolor','#524741','#ffffff','模板配色调','一般为鼠标经过颜色，也可以使用各区块颜色参数单独设置区块为不同颜色','4','cn');
INSERT INTO met_ui_config VALUES('4','0','global','system','mui169','4','0','$M$新窗口打开$T$target=_blank$M$当前窗口打开$T$target=_self','urlnew','urlnew','target=_self','target=_self','内容列表链接打开方式','列表页链接打开方式可在栏目管理中对每个栏目进行单独设置','8','cn');
INSERT INTO met_ui_config VALUES('5','0','global','system','mui169','7','0','','bodybgimg','bodybgimg','','','网站背景图片',' 网站整体的背景图片，个别区块会有自定义的背景，优先显示区块背景图片','6','cn');
INSERT INTO met_ui_config VALUES('6','0','global','system','mui169','9','0','','bodybgcolor','bodybgcolor','#ffffff','','网站背景颜色',' 网站整体的背景颜色，个别区块会有自定义的背景，优先显示区块背景颜色','1','cn');
INSERT INTO met_ui_config VALUES('7','0','global','system','mui169','7','0','','lazyloadbg','lazyloadbg','','','图片延迟加载背景图','不上传则显示默认的延迟加载背景图','7','cn');
INSERT INTO met_ui_config VALUES('8','0','global','system','mui169','2','0','','met_font','met_font','','','网站字体','建议留空（使用模板默认字体），自定义字体需要访问终端浏览器支持','5','cn');
INSERT INTO met_ui_config VALUES('9','1','head_nav','met_11_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','1','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('10','1','head_nav','met_11_1','mui169','9','0','','bgcolor','bgcolor-1','','','背景颜色','默认为网站背景色','1','cn');
INSERT INTO met_ui_config VALUES('11','1','head_nav','met_11_1','mui169','9','0','','titlecolor','titlecolor-1','','','标题颜色','默认为网站主色调','2','cn');
INSERT INTO met_ui_config VALUES('12','1','head_nav','met_11_1','mui169','9','0','','hovercolor','hovercolor-1','','','鼠标经过颜色','默认为网站配色调','3','cn');
INSERT INTO met_ui_config VALUES('13','1','head_nav','met_11_1','mui169','9','0','','sec_bgcolor','sec_bgcolor','','','下拉菜单背景颜色','默认为网站背景色','4','cn');
INSERT INTO met_ui_config VALUES('14','1','head_nav','met_11_1','mui169','9','0','','sec_titlecolor','sec_titlecolor','','','下拉菜单文字颜色','默认为网站副色调','4','cn');
INSERT INTO met_ui_config VALUES('15','1','head_nav','met_11_1','mui169','9','0','','sec_hovercolor','sec_hovercolor','#f2f2f2','#f2f2f2','下拉菜单鼠标经过背景颜色','默认为f2f2f2','5','cn');
INSERT INTO met_ui_config VALUES('16','1','head_nav','met_11_1','mui169','2','0','','nav_ml','nav_ml','30','15','导航间距','','6','cn');
INSERT INTO met_ui_config VALUES('17','1','head_nav','met_11_1','mui169','4','0','$M$展示$T$1$M$隐藏$T$0','navdropdown_ok','navdropdown_ok','1','1','下拉菜单','','7','cn');
INSERT INTO met_ui_config VALUES('18','1','head_nav','met_11_1','mui169','4','0','$M$鼠标经过$T$1$M$鼠标点击$T$0','navdropdown_type','navdropdown_type','1','1','下拉方式','','8','cn');
INSERT INTO met_ui_config VALUES('19','1','head_nav','met_11_1','mui169','4','0','$M$固定$T$1$M$不固定$T$0','nav_fixed','nav_fixed','1','1','导航固定','','9','cn');
INSERT INTO met_ui_config VALUES('20','1','head_nav','met_11_1','mui169','2','0','','all','all','全部','全部','二级栏目全部文本','','10','cn');
INSERT INTO met_ui_config VALUES('21','1','head_nav','met_11_1','mui169','4','0','$M$开$T$1$M$关$T$0','langlist','langlist','0','1','多语言切换','需要在后台开启多语言切换功能','11','cn');
INSERT INTO met_ui_config VALUES('22','1','head_nav','met_11_1','mui169','4','0','$M$开$T$1$M$关$T$0','langlist_icon','langlist_icon','0','1','国旗图标','','12','cn');
INSERT INTO met_ui_config VALUES('23','1','head_nav','met_11_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','simplified','simplified-1','0','1','简繁体切换','需要在后台开启简繁体切换功能','13','cn');
INSERT INTO met_ui_config VALUES('24','1','head_nav','met_11_1','mui169','4','0','$M$显示$T$1$M$隐藏$T$0','member','member-1','0','1','会员登录注册','','14','cn');
INSERT INTO met_ui_config VALUES('25','2','banner','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('26','2','banner','met_16_1','mui169','9','0','','bgcolor','bgcolor-1','','','区块背景色','默认为网站背景颜色,此设置针对于内页无banner时设置的','1','cn');
INSERT INTO met_ui_config VALUES('27','2','banner','met_16_1','mui169','2','0','','listhide','listhide','','','隐藏列表页头部大图','隐藏指定栏目列表页的头部大图，请填写栏目名称，多个用竖线（|）隔开，如：下载中心|产品中心','2','cn');
INSERT INTO met_ui_config VALUES('28','2','banner','met_16_1','mui169','2','0','','detailhide','detailhide','','','隐藏详情页头部大图','隐藏指定栏目详情页的头部大图，请填写栏目名称，多个用竖线（|）隔开，如：下载中心|产品中心','3','cn');
INSERT INTO met_ui_config VALUES('29','3','foot_nav','met_11_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','1','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('30','3','foot_nav','met_11_1','mui169','9','0','','bgcolor','bgcolor-1','','','背景色','','1','cn');
INSERT INTO met_ui_config VALUES('31','3','foot_nav','met_11_1','mui169','9','0','','titlecolor','titlecolor-1','','','标题颜色','','2','cn');
INSERT INTO met_ui_config VALUES('32','3','foot_nav','met_11_1','mui169','9','0','','desccolor','desccolor-1','','','描述颜色','','3','cn');
INSERT INTO met_ui_config VALUES('33','3','foot_nav','met_11_1','mui169','9','0','','hovercolor','hovercolor-1','','','鼠标经过颜色','','4','cn');
INSERT INTO met_ui_config VALUES('34','3','foot_nav','met_11_1','mui169','2','0','','footinfo_tel','footinfo_tel','400-0000-0000','','底部联系方式','','5','cn');
INSERT INTO met_ui_config VALUES('35','3','foot_nav','met_11_1','mui169','2','0','','footinfo_dsc','footinfo_dsc','艾邸，专注物业服务20年','','底部简要描述','','6','cn');
INSERT INTO met_ui_config VALUES('36','3','foot_nav','met_11_1','mui169','2','0','','footinfo_qq','footinfo_qq','0000000000','','QQ号码','','7','cn');
INSERT INTO met_ui_config VALUES('37','3','foot_nav','met_11_1','mui169','2','0','','footinfo_sina','footinfo_sina','https://weibo.com/metinfo','','微博地址','','8','cn');
INSERT INTO met_ui_config VALUES('38','3','foot_nav','met_11_1','mui169','7','0','','footinfo_wx','footinfo_wx','../upload/201806/1529910351.png','','微信图','','9','cn');
INSERT INTO met_ui_config VALUES('39','4','foot_info','met_11_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','1','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('40','4','foot_info','met_11_1','mui169','9','0','','bgcolor','bgcolor-1','','','背景色','默认为网站背景色','1','cn');
INSERT INTO met_ui_config VALUES('41','4','foot_info','met_11_1','mui169','9','0','','titlecolor','titlecolor-1','','','标题颜色','默认为模板主色调','2','cn');
INSERT INTO met_ui_config VALUES('42','4','foot_info','met_11_1','mui169','9','0','','desccolor','desccolor-1','','','描述颜色','默认为模板副色调','3','cn');
INSERT INTO met_ui_config VALUES('43','4','foot_info','met_11_1','mui169','9','0','','hovercolor','hovercolor-1','','','鼠标经过颜色','默认为模板配色调','4','cn');
INSERT INTO met_ui_config VALUES('44','4','foot_info','met_11_1','mui169','4','0','$M$显示$T$1$M$隐藏$T$0','simplified','simplified-1','0','1','简繁体切换','','5','cn');
INSERT INTO met_ui_config VALUES('45','4','foot_info','met_11_1','mui169','4','0','$M$显示$T$1$M$隐藏$T$0','langlist','langlist-1','0','1','多语言切换','','6','cn');
INSERT INTO met_ui_config VALUES('46','4','foot_info','met_11_1','mui169','4','0','$M$显示$T$1$M$隐藏$T$0','foot_langlist_icon','foot_langlist_icon-1','0','1','国旗开关','','7','cn');
INSERT INTO met_ui_config VALUES('47','5','back_top','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','1','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('48','5','back_top','met_16_1','mui169','9','0','','bgcolor','bgcolor-1','#524741','','区块背景色','默认为网站背景颜色','2','cn');
INSERT INTO met_ui_config VALUES('49','5','back_top','met_16_1','mui169','9','0','','hovercolor','hovercolor-1','#524741','','鼠标经过背景颜色','模板配色调','3','cn');
INSERT INTO met_ui_config VALUES('50','5','back_top','met_16_1','mui169','9','0','','iconcolor','iconcolor-1','#ffffff','#ffffff','图标颜色','默认为白色','4','cn');
INSERT INTO met_ui_config VALUES('51','5','back_top','met_16_1','mui169','9','0','','iconhovercolor','iconhovercolor','#ffffff','#000000','鼠标经过图标颜色','默认为黑色','5','cn');
INSERT INTO met_ui_config VALUES('52','6','show','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','1','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('53','6','show','met_16_1','mui169','4','0','$M$全屏$T$1$M$固定宽度$T$0','container','container','0','1','展示样式','','1','cn');
INSERT INTO met_ui_config VALUES('54','6','show','met_16_1','mui169','4','0','$M$背景色$T$1$M$背景图$T$0','bg_type','bg_type','1','1','背景呈现方式','默认为背景色','2','cn');
INSERT INTO met_ui_config VALUES('55','6','show','met_16_1','mui169','9','0','','bgcolor','bgcolor-1','','','背景色','','3','cn');
INSERT INTO met_ui_config VALUES('56','6','show','met_16_1','mui169','7','0','','bgpic','bgpic-1','','','背景图','','4','cn');
INSERT INTO met_ui_config VALUES('57','6','show','met_16_1','mui169','4','0','$M$开$T$1$M$关$T$0','radio_ok','radio_ok','0','0','反馈表单开关','','5','cn');
INSERT INTO met_ui_config VALUES('58','6','show','met_16_1','mui169','2','0','','title','title-1','Contact us','Contact us','反馈标题','设置为0隐藏','6','cn');
INSERT INTO met_ui_config VALUES('59','6','show','met_16_1','mui169','6','4','','id','id-1','','','反馈表单','只能选择反馈模块栏目;表单内容需到内容管理-反馈系统中设置','7','cn');
INSERT INTO met_ui_config VALUES('60','6','show','met_16_1','mui169','9','0','','bordercolor','bordercolor-1','','','文本框颜色','默认继承网站副色调','8','cn');
INSERT INTO met_ui_config VALUES('61','6','show','met_16_1','mui169','9','0','','borderfocus','borderfocus','','','文本框选中颜色','默认继承网站配色调','9','cn');
INSERT INTO met_ui_config VALUES('62','6','show','met_16_1','mui169','9','0','','submit','submit','','','提交按钮颜色','默认继承网站主色调','10','cn');
INSERT INTO met_ui_config VALUES('63','6','show','met_16_1','mui169','9','0','','titlecolor','titlecolor-1','','','标题颜色','默认继承网站主色调','11','cn');
INSERT INTO met_ui_config VALUES('64','6','show','met_16_1','mui169','9','0','','textcolor','textcolor','','','文本框字体颜色','默认继承网站配色调','12','cn');
INSERT INTO met_ui_config VALUES('65','6','show','met_16_1','mui169','9','0','','radiocolor','radiocolor','','','多选按钮字体颜色','默认继承网站主色调','13','cn');
INSERT INTO met_ui_config VALUES('66','7','subcolumn_nav','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('67','7','subcolumn_nav','met_16_1','mui169','2','0','','all','all-1','','全部','全部文字','','1','cn');
INSERT INTO met_ui_config VALUES('68','7','subcolumn_nav','met_16_1','mui169','2','0','','product_placeholder','product_placeholder','','search','搜索提示文字','','2','cn');
INSERT INTO met_ui_config VALUES('69','7','subcolumn_nav','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','product_search','product_search','','1','搜索','存在于产品模块','3','cn');
INSERT INTO met_ui_config VALUES('70','7','subcolumn_nav','met_16_1','mui169','9','0','','bgcolor','bgcolor-1','','','区块背景色','','4','cn');
INSERT INTO met_ui_config VALUES('71','7','subcolumn_nav','met_16_1','mui169','9','0','','titlecolor','titlecolor-1','','','标题颜色','默认为模板主色调','5','cn');
INSERT INTO met_ui_config VALUES('72','7','subcolumn_nav','met_16_1','mui169','9','0','','hovercolor','hovercolor-1','','','鼠标经过颜色和搜索框选中颜色','默认为模板配色调','6','cn');
INSERT INTO met_ui_config VALUES('73','7','subcolumn_nav','met_16_1','mui169','9','0','','bordercolor','bordercolor-1','','#f0f2f5','下边框线条颜色','','7','cn');
INSERT INTO met_ui_config VALUES('74','7','subcolumn_nav','met_16_1','mui169','4','0','全屏$T$0$M$固定宽度$T$1','container','container-1','','0','展示样式','','8','cn');
INSERT INTO met_ui_config VALUES('75','8','subcolumn_nav','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('76','8','subcolumn_nav','met_16_1','mui169','2','0','','all','all-1','','全部','全部文字','','1','cn');
INSERT INTO met_ui_config VALUES('77','8','subcolumn_nav','met_16_1','mui169','2','0','','product_placeholder','product_placeholder','','search','搜索提示文字','','2','cn');
INSERT INTO met_ui_config VALUES('78','8','subcolumn_nav','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','product_search','product_search','','1','搜索','存在于产品模块','3','cn');
INSERT INTO met_ui_config VALUES('79','8','subcolumn_nav','met_16_1','mui169','9','0','','bgcolor','bgcolor-1','','','区块背景色','','4','cn');
INSERT INTO met_ui_config VALUES('80','8','subcolumn_nav','met_16_1','mui169','9','0','','titlecolor','titlecolor-1','','','标题颜色','默认为模板主色调','5','cn');
INSERT INTO met_ui_config VALUES('81','8','subcolumn_nav','met_16_1','mui169','9','0','','hovercolor','hovercolor-1','','','鼠标经过颜色和搜索框选中颜色','默认为模板配色调','6','cn');
INSERT INTO met_ui_config VALUES('82','8','subcolumn_nav','met_16_1','mui169','9','0','','bordercolor','bordercolor-1','','#f0f2f5','下边框线条颜色','','7','cn');
INSERT INTO met_ui_config VALUES('83','8','subcolumn_nav','met_16_1','mui169','4','0','全屏$T$0$M$固定宽度$T$1','container','container-1','','0','展示样式','','8','cn');
INSERT INTO met_ui_config VALUES('84','9','news_list_page','met_11_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('85','9','news_list_page','met_11_1','mui169','4','0','$M$极简$T$1$M$图文$T$2$M$橱窗$T$3','news_listtype','news_listtype','','1','列表展示','橱窗模式下新闻头条无效','1','cn');
INSERT INTO met_ui_config VALUES('86','9','news_list_page','met_11_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','news_headlines','news_headlines','','0','新闻头条','头条将采用大图轮播的方式展现','2','cn');
INSERT INTO met_ui_config VALUES('87','9','news_list_page','met_11_1','mui169','2','0','','news_headlines_num','news_headlines_num','','3','头条数量','数量必须小于文章列表页每页显示条数','3','cn');
INSERT INTO met_ui_config VALUES('88','9','news_list_page','met_11_1','mui169','2','0','','news_headlines_x','news_headlines_x','','900','头条图片宽度','建议尺寸：900','4','cn');
INSERT INTO met_ui_config VALUES('89','9','news_list_page','met_11_1','mui169','2','0','','news_headlines_y','news_headlines_y','','300','头条图片高度','建议尺寸：300','5','cn');
INSERT INTO met_ui_config VALUES('90','9','news_list_page','met_11_1','mui169','2','0','','news_ccimg_x','news_ccimg_x','','900','橱窗图片宽度','建议尺寸：900','6','cn');
INSERT INTO met_ui_config VALUES('91','9','news_list_page','met_11_1','mui169','2','0','','news_ccimg_y','news_ccimg_y','','300','橱窗图片高度','建议尺寸：300','7','cn');
INSERT INTO met_ui_config VALUES('92','9','news_list_page','met_11_1','mui169','9','0','','bgcolor','bgcolor','','','区块背景色','默认为网站背景色','8','cn');
INSERT INTO met_ui_config VALUES('93','9','news_list_page','met_11_1','mui169','9','0','','titlecolor','titlecolor','','','标题字体颜色','默认为模板主色调','9','cn');
INSERT INTO met_ui_config VALUES('94','9','news_list_page','met_11_1','mui169','9','0','','desccolor','desccolor','','','描述字体颜色','默认为模板副色调','10','cn');
INSERT INTO met_ui_config VALUES('95','9','news_list_page','met_11_1','mui169','9','0','','hovercolor','hovercolor-1','','','鼠标经过颜色','默认为模板配色调','11','cn');
INSERT INTO met_ui_config VALUES('96','9','news_list_page','met_11_1','mui169','9','0','','timecolor','timecolor-1','','','时间，图标颜色','默认为模板副色调','12','cn');
INSERT INTO met_ui_config VALUES('97','9','news_list_page','met_11_1','mui169','2','0','','tips','tips-1','','栏目标识为7且由下级栏目时可展示下级栏目','特殊展示栏目设置说明：','特殊展示栏目设置说明：栏目标识为7且有下级栏目时可展示下级栏目','13','cn');
INSERT INTO met_ui_config VALUES('98','9','news_list_page','met_11_1','mui169','9','0','','bgconcolor','bgconcolor-1','','#ffffff','内容背景色','默认为白色','14','cn');
INSERT INTO met_ui_config VALUES('99','9','news_list_page','met_11_1','mui169','9','0','','para_color','para_color-1','','#ffffff','分页未选择背景颜色','默认为白色','15','cn');
INSERT INTO met_ui_config VALUES('100','9','news_list_page','met_11_1','mui169','9','0','','bor_bottom','bor_bottom','','#ffffff','下方线条颜色','默认为白色','16','cn');
INSERT INTO met_ui_config VALUES('101','10','sidebar','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('102','10','sidebar','met_16_1','mui169','2','0','','sidebar_search_placeholder','sidebar_search_placeholder','','search','搜索框文字提示','','1','cn');
INSERT INTO met_ui_config VALUES('103','10','sidebar','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','sidebar_column_ok','sidebar_column_ok','','1','侧栏栏目开关','','2','cn');
INSERT INTO met_ui_config VALUES('104','10','sidebar','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','sidebar_column3_ok','sidebar_column3_ok','','1','侧栏3级栏目','','3','cn');
INSERT INTO met_ui_config VALUES('105','10','sidebar','met_16_1','mui169','2','0','','all','all','','全部','全部文字','','4','cn');
INSERT INTO met_ui_config VALUES('106','10','sidebar','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','sidebar_newslist_ok','sidebar_newslist_ok','','1','侧栏列表开关','','5','cn');
INSERT INTO met_ui_config VALUES('107','10','sidebar','met_16_1','mui169','2','0','','sidebar_newslist_title','sidebar_newslist_title','','为你推荐','侧栏列表标题','','6','cn');
INSERT INTO met_ui_config VALUES('108','10','sidebar','met_16_1','mui169','2','0','','sidebar_newslist_num','sidebar_newslist_num','','5','侧栏列表文章数量','','7','cn');
INSERT INTO met_ui_config VALUES('109','10','sidebar','met_16_1','mui169','9','0','','ccolor','titlecolor-1','','','字体颜色','默认为模板主色调','8','cn');
INSERT INTO met_ui_config VALUES('110','10','sidebar','met_16_1','mui169','9','0','','hover_color','hovercolor-1','','','鼠标经过颜色','默认为模板配色调','9','cn');
INSERT INTO met_ui_config VALUES('111','11','subcolumn_nav','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('112','11','subcolumn_nav','met_16_1','mui169','2','0','','all','all-1','','全部','全部文字','','1','cn');
INSERT INTO met_ui_config VALUES('113','11','subcolumn_nav','met_16_1','mui169','2','0','','product_placeholder','product_placeholder','','search','搜索提示文字','','2','cn');
INSERT INTO met_ui_config VALUES('114','11','subcolumn_nav','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','product_search','product_search','','1','搜索','存在于产品模块','3','cn');
INSERT INTO met_ui_config VALUES('115','11','subcolumn_nav','met_16_1','mui169','9','0','','bgcolor','bgcolor-1','','','区块背景色','','4','cn');
INSERT INTO met_ui_config VALUES('116','11','subcolumn_nav','met_16_1','mui169','9','0','','titlecolor','titlecolor-1','','','标题颜色','默认为模板主色调','5','cn');
INSERT INTO met_ui_config VALUES('117','11','subcolumn_nav','met_16_1','mui169','9','0','','hovercolor','hovercolor-1','','','鼠标经过颜色和搜索框选中颜色','默认为模板配色调','6','cn');
INSERT INTO met_ui_config VALUES('118','11','subcolumn_nav','met_16_1','mui169','9','0','','bordercolor','bordercolor-1','','#f0f2f5','下边框线条颜色','','7','cn');
INSERT INTO met_ui_config VALUES('119','11','subcolumn_nav','met_16_1','mui169','4','0','全屏$T$0$M$固定宽度$T$1','container','container-1','','0','展示样式','','8','cn');
INSERT INTO met_ui_config VALUES('120','12','para_search','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','0','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('121','12','para_search','met_16_1','mui169','4','0','$M$固定宽度$T$1$M$全屏$T$0','type','type-1','1','1','展示样式','','1','cn');
INSERT INTO met_ui_config VALUES('122','12','para_search','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','sort_ok','sort_ok','1','1','排序','可以按照推荐，点击次数，最新来排序，在开启商城的前提下产品模块还有按销量来排序','9','cn');
INSERT INTO met_ui_config VALUES('123','12','para_search','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','attr_ok','attr_ok','1','1','参数搜索','只有在有参数管理的的模块下才有参数搜索，比如产品，图片，下载等模块','11','cn');
INSERT INTO met_ui_config VALUES('124','12','para_search','met_16_1','mui169','9','0','','bgcolor','bgcolor-1','','','区块背景色','默认颜色为#f2f2f2','50','cn');
INSERT INTO met_ui_config VALUES('125','12','para_search','met_16_1','mui169','9','0','','attr_namebgcolor','attr_namebgcolor','','','筛选参数名称背景色','默认为#e5e5e5','53','cn');
INSERT INTO met_ui_config VALUES('126','12','para_search','met_16_1','mui169','9','0','','attr_nametextcolor','attr_nametextcolor','','','筛选参数名称字体颜色','默认为#76838f','54','cn');
INSERT INTO met_ui_config VALUES('127','12','para_search','met_16_1','mui169','9','0','','attr_vbgcolor','attr_vbgcolor','#fafafa','#fafafa','筛选参数值背景色','默认为#fafafa','55','cn');
INSERT INTO met_ui_config VALUES('128','12','para_search','met_16_1','mui169','9','0','','attr_vtextcolor','attr_vtextcolor','','','筛选参数值字体颜色','默认为模板副色调','56','cn');
INSERT INTO met_ui_config VALUES('129','12','para_search','met_16_1','mui169','9','0','','border_color','border_color','','','筛选边框颜色','默认为#e4e4e4','57','cn');
INSERT INTO met_ui_config VALUES('130','12','para_search','met_16_1','mui169','9','0','','hovercolor','hovercolor-1','','','筛选文字鼠标经过色','默认为模板配色调','59','cn');
INSERT INTO met_ui_config VALUES('131','12','para_search','met_16_1','mui169','9','0','','sort_textcolor','sort_textcolor','','','排序字体颜色','默认为模板主色调','60','cn');
INSERT INTO met_ui_config VALUES('132','12','para_search','met_16_1','mui169','9','0','','sort_bgcolor','sort_bgcolor','','','排序背景色','默认为白色','60','cn');
INSERT INTO met_ui_config VALUES('133','12','para_search','met_16_1','mui169','9','0','','sort_hovercolor','sort_hovercolor','','','排序字体鼠标经过颜色','默认为模板配色调','61','cn');
INSERT INTO met_ui_config VALUES('134','12','para_search','met_16_1','mui169','2','0','','padding','padding-1','30','30','电脑区块边距','默认为30px','62','cn');
INSERT INTO met_ui_config VALUES('135','12','para_search','met_16_1','mui169','2','0','','padding_p','padding_p-1','20','20','平板区块边距','默认为20px','63','cn');
INSERT INTO met_ui_config VALUES('136','12','para_search','met_16_1','mui169','2','0','','padding_m','padding_m','10','10','手机区块边距','默认为10px','64','cn');
INSERT INTO met_ui_config VALUES('506','42','service_list','met_16_1','mui169','9','0','','icon_hoverbg','icon_hoverbg','','','鼠标经过图标背景颜色','默认继承自模板配色调','20','cn');
INSERT INTO met_ui_config VALUES('507','42','service_list','met_16_1','mui169','9','0','','icon_color','icon_color','#524741','#a3a3a3','图标颜色','','21','cn');
INSERT INTO met_ui_config VALUES('508','42','service_list','met_16_1','mui169','9','0','','icon_hovercolor','icon_hovercolor','#ffffff','#ffffff','鼠标经过图标颜色','','22','cn');
INSERT INTO met_ui_config VALUES('509','42','service_list','met_16_1','mui169','4','0','开启$T$1$M$关闭$T$0','bottom_ok','bottom_ok','0','0','底部图片开关','','23','cn');
INSERT INTO met_ui_config VALUES('510','42','service_list','met_16_1','mui169','7','0','','bottom_bg','bottom_bg','','','底部图片','建议上传1920*200的图片','24','cn');
INSERT INTO met_ui_config VALUES('511','42','service_list','met_16_1','mui169','4','0','全屏$T$0$M$固定$T$1','ifwidth','ifwidth-1','1','1','宽度显示','','25','cn');
INSERT INTO met_ui_config VALUES('512','42','service_list','met_16_1','mui169','4','0','显示$T$1$M$隐藏$T$0','desc_ok','desc_ok','1','0','是否显示栏目描述','','26','cn');
INSERT INTO met_ui_config VALUES('147','14','img_list_page','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','1','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('148','14','img_list_page','met_16_1','mui169','2','0','','img_listlook','img_listlook','浏览','浏览','按钮文字','','1','cn');
INSERT INTO met_ui_config VALUES('149','14','img_list_page','met_16_1','mui169','4','0','$M$全屏$T$1$M$固定宽度$T$0','style','style','1','1','展示样式','','1','cn');
INSERT INTO met_ui_config VALUES('150','14','img_list_page','met_16_1','mui169','2','0','','img_column_xlg','img_column_xlg','4','4','大尺寸电脑显示列数','大尺寸电脑：浏览器宽度大于1600像素','3','cn');
INSERT INTO met_ui_config VALUES('151','14','img_list_page','met_16_1','mui169','2','0','','img_column_md','img_column_md','4','4','普通电脑显示列数','普通电脑：浏览器宽度大于992像素小于1600像素','4','cn');
INSERT INTO met_ui_config VALUES('152','14','img_list_page','met_16_1','mui169','2','0','','img_column_sm','img_column_sm','2','2','平板显示列数','平板：浏览器宽度大于768像素小于992像素','5','cn');
INSERT INTO met_ui_config VALUES('153','14','img_list_page','met_16_1','mui169','2','0','','img_column_xs','img_column_xs','1','1','手机显示列数','手机：浏览器宽度小于768像素','6','cn');
INSERT INTO met_ui_config VALUES('154','14','img_list_page','met_16_1','mui169','9','0','','hovercolor','hovercolor-1','','','当前页颜色','默认为网页配色调','7','cn');
INSERT INTO met_ui_config VALUES('155','14','img_list_page','met_16_1','mui169','9','0','','bgcolor','bgcolor-1','','','区块背景色','默认为网页背景调','8','cn');
INSERT INTO met_ui_config VALUES('156','15','subcolumn_nav','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('157','15','subcolumn_nav','met_16_1','mui169','2','0','','all','all-1','','全部','全部文字','','1','cn');
INSERT INTO met_ui_config VALUES('158','15','subcolumn_nav','met_16_1','mui169','2','0','','product_placeholder','product_placeholder','','search','搜索提示文字','','2','cn');
INSERT INTO met_ui_config VALUES('159','15','subcolumn_nav','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','product_search','product_search','','1','搜索','存在于产品模块','3','cn');
INSERT INTO met_ui_config VALUES('160','15','subcolumn_nav','met_16_1','mui169','9','0','','bgcolor','bgcolor-1','','','区块背景色','','4','cn');
INSERT INTO met_ui_config VALUES('161','15','subcolumn_nav','met_16_1','mui169','9','0','','titlecolor','titlecolor-1','','','标题颜色','默认为模板主色调','5','cn');
INSERT INTO met_ui_config VALUES('162','15','subcolumn_nav','met_16_1','mui169','9','0','','hovercolor','hovercolor-1','','','鼠标经过颜色和搜索框选中颜色','默认为模板配色调','6','cn');
INSERT INTO met_ui_config VALUES('163','15','subcolumn_nav','met_16_1','mui169','9','0','','bordercolor','bordercolor-1','','#f0f2f5','下边框线条颜色','','7','cn');
INSERT INTO met_ui_config VALUES('164','15','subcolumn_nav','met_16_1','mui169','4','0','全屏$T$0$M$固定宽度$T$1','container','container-1','','0','展示样式','','8','cn');
INSERT INTO met_ui_config VALUES('184','19','message_list','met_16_1','mui169','9','0','','bgcolor','bgcolor-1','','','区块背景色','','1','cn');
INSERT INTO met_ui_config VALUES('183','19','message_list','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('182','18','job_list_page','met_16_1','mui169','9','0','','hovercolor','hovercolor-1','','','鼠标经过颜色和按钮颜色','默认为模板公共参数配色调','4','cn');
INSERT INTO met_ui_config VALUES('181','18','job_list_page','met_16_1','mui169','9','0','','titlecolor','titlecolor-1','','','标题颜色','默认为模板公共参数副色调','3','cn');
INSERT INTO met_ui_config VALUES('180','18','job_list_page','met_16_1','mui169','2','0','','cvtitle','cvtitle','','在线应聘','按钮文字','','1','cn');
INSERT INTO met_ui_config VALUES('178','18','job_list_page','met_16_1','mui169','9','0','','bgcolor','bgcolor-1','','','区块背景色','默认为#f2f2f2','2','cn');
INSERT INTO met_ui_config VALUES('179','18','job_list_page','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('173','17','download_list_page','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('174','17','download_list_page','met_16_1','mui169','2','0','','download','download','','立即下载','按钮文字','','1','cn');
INSERT INTO met_ui_config VALUES('175','17','download_list_page','met_16_1','mui169','9','0','','bgcolor','bgcolor-1','','','区块背景色','默认为网站背景颜色','2','cn');
INSERT INTO met_ui_config VALUES('176','17','download_list_page','met_16_1','mui169','9','0','','titlecolor','titlecolor-1','','','标题颜色','默认为模板主色调','3','cn');
INSERT INTO met_ui_config VALUES('177','17','download_list_page','met_16_1','mui169','9','0','','hovercolor','hovercolor-1','','','鼠标经过颜色和按钮颜色及当前页的颜色','默认为模板配色调','4','cn');
INSERT INTO met_ui_config VALUES('185','19','message_list','met_16_1','mui169','9','0','','hovercolor','hovercolor-1','','','分页按钮颜色','默认为模板配色调','2','cn');
INSERT INTO met_ui_config VALUES('186','20','message_form','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('187','20','message_form','met_16_1','mui169','9','0','','bgcolor','bgcolor-1','','','区块背景色','默认为网站背景色','1','cn');
INSERT INTO met_ui_config VALUES('188','20','message_form','met_16_1','mui169','9','0','','hovercolor','hovercolor-1','','','鼠标经过颜色','默认为模板配色调','3','cn');
INSERT INTO met_ui_config VALUES('189','20','message_form','met_16_1','mui169','9','0','','btncolor','btncolor-1','','','提交按钮颜色','默认为模板主色调','4','cn');
INSERT INTO met_ui_config VALUES('190','20','message_form','met_16_1','mui169','9','0','','txtcolor','txtcolor','','#ffffff','提交按钮文字颜色','默认为 #ffffff','5','cn');
INSERT INTO met_ui_config VALUES('191','20','message_form','met_16_1','mui169','9','0','','hovertxtcolor','hovertxtcolor','','#ffffff','鼠标经过提交按钮文字颜色','默认为 #ffffff','6','cn');
INSERT INTO met_ui_config VALUES('192','21','feedback','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('193','21','feedback','met_16_1','mui169','9','0','','bgcolor','bgcolor-1','','','区块背景色','默认颜色为网站背景色','1','cn');
INSERT INTO met_ui_config VALUES('194','21','feedback','met_16_1','mui169','9','0','','hovercolor','hovercolor-1','','','鼠标经过颜色以及多选框选中颜色','默认为模板配色调','2','cn');
INSERT INTO met_ui_config VALUES('195','21','feedback','met_16_1','mui169','9','0','','btncolor','btncolor-1','','','按钮颜色','默认为模板副色调','3','cn');
INSERT INTO met_ui_config VALUES('196','21','feedback','met_16_1','mui169','9','0','','inputborder_color','inputborder_color','','','按钮的边框颜色','默认为模板副色调','4','cn');
INSERT INTO met_ui_config VALUES('197','21','feedback','met_16_1','mui169','9','0','','btn_txt_color','btn_txt_color','','#ffffff','按钮文字颜色','默认为白色','5','cn');
INSERT INTO met_ui_config VALUES('198','21','feedback','met_16_1','mui169','9','0','','bgconcolor','bgconcolor-1','','#ffffff','内容背景色','默认为白色','6','cn');
INSERT INTO met_ui_config VALUES('199','21','feedback','met_16_1','mui169','9','0','','inputcolor','inputcolor','','#ffffff','输入框背景颜色','默认为白色','7','cn');
INSERT INTO met_ui_config VALUES('200','21','feedback','met_16_1','mui169','9','0','','border_color','border_color-1','','','输入框边框颜色','默认为网站副色调','8','cn');
INSERT INTO met_ui_config VALUES('201','21','feedback','met_16_1','mui169','9','0','','title_color','title_color-1','','#000000','问题标题颜色','默认为黑色','9','cn');
INSERT INTO met_ui_config VALUES('202','21','feedback','met_16_1','mui169','9','0','','center_color','center_color-1','','#000000','问题内容颜色','默认为黑色','10','cn');
INSERT INTO met_ui_config VALUES('203','21','feedback','met_16_1','mui169','9','0','','txt_color','txt_color','','','被选中的文本框，边框颜色','默认网站配色调','11','cn');
INSERT INTO met_ui_config VALUES('204','22','news_list_detail','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('205','22','news_list_detail','met_16_1','mui169','9','0','','titlecolor','titlecolor-1','','','标题颜色','默认为模板副色调','1','cn');
INSERT INTO met_ui_config VALUES('206','22','news_list_detail','met_16_1','mui169','9','0','','infocolor','infocolor','','','修饰颜色','包括发布作者，点击量，发布日期的字体颜色','2','cn');
INSERT INTO met_ui_config VALUES('207','22','news_list_detail','met_16_1','mui169','9','0','','bgcolor','bgcolor-1','','','区块背景色','默认为#f5f5f5','3','cn');
INSERT INTO met_ui_config VALUES('208','22','news_list_detail','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','tag_ok','tag_ok','','1','tag开关','','4','cn');
INSERT INTO met_ui_config VALUES('209','22','news_list_detail','met_16_1','mui169','2','0','','tag_num','tag_num','','2','tag调用条数','','5','cn');
INSERT INTO met_ui_config VALUES('210','22','news_list_detail','met_16_1','mui169','9','0','','hovercolor','hovercolor-1','','','鼠标经过上下翻页文字颜色','默认为模板配色调','6','cn');
INSERT INTO met_ui_config VALUES('211','22','news_list_detail','met_16_1','mui169','9','0','','bgconcolor','bgconcolor-1','','#ffffff','内容背景色','默认为白色','7','cn');
INSERT INTO met_ui_config VALUES('212','22','news_list_detail','met_16_1','mui169','9','0','','linecolor','linecolor-1','','','线条颜色和边框颜色','默认为模板副色调','8','cn');
INSERT INTO met_ui_config VALUES('213','22','news_list_detail','met_16_1','mui169','9','0','','textcolor','textcolor-1','','','上下翻页文字颜色','默认为模板副色调','9','cn');
INSERT INTO met_ui_config VALUES('214','22','news_list_detail','met_16_1','mui169','9','0','','pagebgcolor','pagebgcolor','','','上下翻页鼠标经过背景颜色','默认为透明色','10','cn');
INSERT INTO met_ui_config VALUES('215','23','sidebar','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','1','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('216','23','sidebar','met_16_1','mui169','2','0','','sidebar_search_placeholder','sidebar_search_placeholder','search','search','搜索框文字提示','','1','cn');
INSERT INTO met_ui_config VALUES('217','23','sidebar','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','sidebar_column_ok','sidebar_column_ok','1','1','侧栏栏目开关','','2','cn');
INSERT INTO met_ui_config VALUES('218','23','sidebar','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','sidebar_column3_ok','sidebar_column3_ok','1','1','侧栏3级栏目','','3','cn');
INSERT INTO met_ui_config VALUES('219','23','sidebar','met_16_1','mui169','2','0','','all','all','全部','全部','全部文字','','4','cn');
INSERT INTO met_ui_config VALUES('220','23','sidebar','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','sidebar_newslist_ok','sidebar_newslist_ok','1','1','侧栏列表开关','','5','cn');
INSERT INTO met_ui_config VALUES('221','23','sidebar','met_16_1','mui169','2','0','','sidebar_newslist_title','sidebar_newslist_title','为你推荐','为你推荐','侧栏列表标题','','6','cn');
INSERT INTO met_ui_config VALUES('222','23','sidebar','met_16_1','mui169','2','0','','sidebar_newslist_num','sidebar_newslist_num','8','5','侧栏列表文章数量','','7','cn');
INSERT INTO met_ui_config VALUES('223','23','sidebar','met_16_1','mui169','9','0','','ccolor','titlecolor-1','','','字体颜色','默认为模板主色调','8','cn');
INSERT INTO met_ui_config VALUES('224','23','sidebar','met_16_1','mui169','9','0','','hover_color','hovercolor-1','','','鼠标经过颜色','默认为模板配色调','9','cn');
INSERT INTO met_ui_config VALUES('225','24','product_list_detail','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','1','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('226','24','product_list_detail','met_16_1','mui169','2','0','','product_sidebar_piclist_title','product_sidebar_piclist_title','为您推荐','为您推荐','推荐产品侧栏标题','','1','cn');
INSERT INTO met_ui_config VALUES('227','24','product_list_detail','met_16_1','mui169','2','0','','product_sidebar_piclist_num','product_sidebar_piclist_num','3','5','推荐产品侧栏调用条数','','2','cn');
INSERT INTO met_ui_config VALUES('228','24','product_list_detail','met_16_1','mui169','4','0','$M$全部$T$all$M$推荐$T$com','product_sidebar_piclist_type','product_sidebar_piclist_type','all','all','推荐产品侧栏调用类型','','3','cn');
INSERT INTO met_ui_config VALUES('229','24','product_list_detail','met_16_1','mui169','4','0','$M$标准$T$1$M$时尚$T$2','product_pagetype','product_pagetype-1','1','1','展示方式','','4','cn');
INSERT INTO met_ui_config VALUES('230','24','product_list_detail','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','product_sidebar_piclist_ok','product_sidebar_piclist_ok','1','1','产品侧栏','','5','cn');
INSERT INTO met_ui_config VALUES('231','24','product_list_detail','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','tag_ok','tag_ok','1','1','tag开关','','6','cn');
INSERT INTO met_ui_config VALUES('232','24','product_list_detail','met_16_1','mui169','2','0','','tag_num','tag_num','2','2','tag调用条数','默认调用两条','7','cn');
INSERT INTO met_ui_config VALUES('233','24','product_list_detail','met_16_1','mui169','9','0','','bgcolor','bgcolor','','','区块背景色','默认为网页背景色','8','cn');
INSERT INTO met_ui_config VALUES('234','24','product_list_detail','met_16_1','mui169','9','0','','titlecolor','titlecolor','','','产品标题颜色','默认为模板公共参数主色调','9','cn');
INSERT INTO met_ui_config VALUES('235','24','product_list_detail','met_16_1','mui169','9','0','','attrcolor','attrcolor','','','参数颜色','默认为#76838f','10','cn');
INSERT INTO met_ui_config VALUES('236','24','product_list_detail','met_16_1','mui169','9','0','','bgcolor_odd','bgcolor1','','','时尚模式奇块背景色','默认为白色','12','cn');
INSERT INTO met_ui_config VALUES('237','24','product_list_detail','met_16_1','mui169','9','0','','bgcolor_even','bgcolor2','','','时尚模式偶块背景色','默认为#f2f2f2','13','cn');
INSERT INTO met_ui_config VALUES('238','24','product_list_detail','met_16_1','mui169','9','0','','hovercolor','hovercolor-1','','','鼠标经过色和选项卡选中颜色','默认为网页配色调','14','cn');
INSERT INTO met_ui_config VALUES('239','24','product_list_detail','met_16_1','mui169','9','0','','desccolor','descolor','','','描述颜色','默认为模板公共参数副色调','14','cn');
INSERT INTO met_ui_config VALUES('240','24','product_list_detail','met_16_1','mui169','9','0','','navbgcolor','navbgcolor-1','','','时尚模式导航背景色','','14','cn');
INSERT INTO met_ui_config VALUES('241','24','product_list_detail','met_16_1','mui169','2','0','','specpara','specpara','参数','参数','参数名称','','15','cn');
INSERT INTO met_ui_config VALUES('242','24','product_list_detail','met_16_1','mui169','9','0','','bgconcolor','bgconcolor-1','#ffffff','#ffffff','内容背景色','默认为白色','17','cn');
INSERT INTO met_ui_config VALUES('243','24','product_list_detail','met_16_1','mui169','4','0','左$T$1$M$右$T$0','compos','compos','1','1','推荐产品产品位置','','18','cn');
INSERT INTO met_ui_config VALUES('244','25','download_list_detail','met_11_2','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('245','25','download_list_detail','met_11_2','mui169','2','0','','download','download-1','','立即下载','立即下载','','1','cn');
INSERT INTO met_ui_config VALUES('246','25','download_list_detail','met_11_2','mui169','4','0','$M$开启$T$1$M$关闭$T$0','tag_ok','tag_ok-1','','1','tag开关','','2','cn');
INSERT INTO met_ui_config VALUES('247','25','download_list_detail','met_11_2','mui169','2','0','','tag_num','tag_num-1','','2','tag调用条数','默认调用2条','3','cn');
INSERT INTO met_ui_config VALUES('248','25','download_list_detail','met_11_2','mui169','9','0','','bgcolor','bgcolor-1','','','区块背景色','默认为网页背景色','4','cn');
INSERT INTO met_ui_config VALUES('249','25','download_list_detail','met_11_2','mui169','9','0','','titlecolor','titlecolor-1','','','标题颜色','默认为模板公共参数主色调','5','cn');
INSERT INTO met_ui_config VALUES('250','25','download_list_detail','met_11_2','mui169','9','0','','desccolor','desccolor-1','','','时间，图标颜色','默认为模板公共参数副色调','5','cn');
INSERT INTO met_ui_config VALUES('251','25','download_list_detail','met_11_2','mui169','9','0','','hovercolor','hovercolor-1','','','按钮颜色（与按钮经过颜色组成渐变）','默认为模板公共参数配色调，必须同时设置按钮经过颜色','6','cn');
INSERT INTO met_ui_config VALUES('252','25','download_list_detail','met_11_2','mui169','9','0','','linearcolor','linearcolor','','','按钮经过颜色（与按钮颜色组成渐变）','默认为模板公共参数副色调，必须同时设置按钮颜色','7','cn');
INSERT INTO met_ui_config VALUES('253','26','img_list_detail','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('254','26','img_list_detail','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','tag_ok','tag_ok-1','','1','tag开关','','4','cn');
INSERT INTO met_ui_config VALUES('255','26','img_list_detail','met_16_1','mui169','2','0','','tag_num','tag_num-1','','2','tag调用条数','默认调用2条','5','cn');
INSERT INTO met_ui_config VALUES('256','26','img_list_detail','met_16_1','mui169','9','0','','linecolor','linecolor-1','','','线条颜色和边框颜色','默认为模板副色调','7','cn');
INSERT INTO met_ui_config VALUES('257','26','img_list_detail','met_16_1','mui169','9','0','','textcolor','textcolor','','','上下翻页文字颜色','默认为模板副色调','8','cn');
INSERT INTO met_ui_config VALUES('258','26','img_list_detail','met_16_1','mui169','9','0','','pagebgcolor','pagebgcolor-1','','','上下翻页鼠标经过背景颜色','默认为透明色','9','cn');
INSERT INTO met_ui_config VALUES('259','26','img_list_detail','met_16_1','mui169','9','0','','bgcolor','bgcolor-1','','','区块背景色','默认为网页背景色','10','cn');
INSERT INTO met_ui_config VALUES('260','26','img_list_detail','met_16_1','mui169','9','0','','bgconcolor','bgconcolor','','','内容背景色','默认为透明色','10','cn');
INSERT INTO met_ui_config VALUES('261','26','img_list_detail','met_16_1','mui169','9','0','','titlecolor','titlecolor-1','','','标题颜色','默认为模板主色调','11','cn');
INSERT INTO met_ui_config VALUES('262','26','img_list_detail','met_16_1','mui169','9','0','','tagcolor','tagcolor','','#666666','tag文字颜色','默认为#666666','11','cn');
INSERT INTO met_ui_config VALUES('263','26','img_list_detail','met_16_1','mui169','9','0','','desccolor','desccolor-1','','','时间点击量处的文字颜色','默认使用模板副色调','12','cn');
INSERT INTO met_ui_config VALUES('264','26','img_list_detail','met_16_1','mui169','9','0','','hovercolor','hovercolor-1','','','鼠标经过颜色','默认为模板配色调','13','cn');
INSERT INTO met_ui_config VALUES('265','27','job_list_detail','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('266','27','job_list_detail','met_16_1','mui169','2','0','','cvtitle','cvtitle-1','','在线应聘','按钮文字','','1','cn');
INSERT INTO met_ui_config VALUES('267','27','job_list_detail','met_16_1','mui169','9','4','','bgcolor','bgcolor-1','','','区块背景色','默认为网页背景色','2','cn');
INSERT INTO met_ui_config VALUES('268','27','job_list_detail','met_16_1','mui169','9','0','','titlecolor','titlecolor-1','','','标题颜色','默认为模板公共参数主色调','3','cn');
INSERT INTO met_ui_config VALUES('269','27','job_list_detail','met_16_1','mui169','9','0','','hovercolor','hovercolor-1','','','按钮颜色','默认为模板公共参数配色调','4','cn');
INSERT INTO met_ui_config VALUES('270','27','job_list_detail','met_16_1','mui169','9','0','','desccolor','desccolor-1','','#a3afb7','时间点击量处的文字颜色','','5','cn');
INSERT INTO met_ui_config VALUES('271','28','shopproduct_list_detail','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('272','28','shopproduct_list_detail','met_16_1','mui169','4','0','$M$标准$T$1$M$时尚$T$2','product_pagetype','product_pagetype-1','','1','展示方式','','1','cn');
INSERT INTO met_ui_config VALUES('273','28','shopproduct_list_detail','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','product_sidebar_piclist_ok','product_sidebar_piclist_ok','','1','推荐产品侧栏','推荐产品只有标准模式下有效','2','cn');
INSERT INTO met_ui_config VALUES('274','28','shopproduct_list_detail','met_16_1','mui169','2','0','','product_sidebar_piclist_title','product_sidebar_piclist_title','','为您推荐','推荐产品侧栏标题','','3','cn');
INSERT INTO met_ui_config VALUES('275','28','shopproduct_list_detail','met_16_1','mui169','2','0','','product_sidebar_piclist_num','product_sidebar_piclist_num','','5','推荐产品侧栏调用条数','','4','cn');
INSERT INTO met_ui_config VALUES('276','28','shopproduct_list_detail','met_16_1','mui169','4','0','$M$全部$T$all$M$推荐$T$com','product_sidebar_piclist_type','product_sidebar_piclist_type','','all','推荐产品侧栏调用类型','','5','cn');
INSERT INTO met_ui_config VALUES('277','28','shopproduct_list_detail','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','tag_ok','tag_ok','','1','tag开关','','6','cn');
INSERT INTO met_ui_config VALUES('278','28','shopproduct_list_detail','met_16_1','mui169','2','0','','tag_num','tag_num','','2','tag调用条数','默认调用两条','7','cn');
INSERT INTO met_ui_config VALUES('279','28','shopproduct_list_detail','met_16_1','mui169','9','0','','bgcolor','bgcolor','','','区块背景色','默认为网页背景色','8','cn');
INSERT INTO met_ui_config VALUES('280','28','shopproduct_list_detail','met_16_1','mui169','9','0','','titlecolor','titlecolor','','','产品标题颜色','默认为模板公共参数主色调','9','cn');
INSERT INTO met_ui_config VALUES('281','28','shopproduct_list_detail','met_16_1','mui169','9','0','','attrcolor','attrcolor','','','参数颜色','默认为#76838f','10','cn');
INSERT INTO met_ui_config VALUES('282','28','shopproduct_list_detail','met_16_1','mui169','9','0','','bgcolor_odd','bgcolor1','','','时尚模式偶块背景色','此区块是出轮播图之外的区块，默认为白色','12','cn');
INSERT INTO met_ui_config VALUES('283','28','shopproduct_list_detail','met_16_1','mui169','9','0','','bgcolor_even','bgcolor2','','','时尚模式奇块背景色','此区块是出轮播图之外的区块，默认为#f2f2f2','13','cn');
INSERT INTO met_ui_config VALUES('284','28','shopproduct_list_detail','met_16_1','mui169','9','0','','desccolor','descolor','','','描述颜色','默认为模板公共参数副色调','14','cn');
INSERT INTO met_ui_config VALUES('285','28','shopproduct_list_detail','met_16_1','mui169','9','0','','hovercolor','hovercolor-1','','','鼠标经过色和选项卡选中颜色','默认为网页配色调','14','cn');
INSERT INTO met_ui_config VALUES('286','28','shopproduct_list_detail','met_16_1','mui169','2','0','','specpara','specpara','','参数','参数名称','','15','cn');
INSERT INTO met_ui_config VALUES('287','28','shopproduct_list_detail','met_16_1','mui169','9','0','','car_color','car_color','','#f96868','购物车颜色','','16','cn');
INSERT INTO met_ui_config VALUES('288','28','shopproduct_list_detail','met_16_1','mui169','9','0','','favorite_color','favorite','','#f2a654','加入收藏颜色','','17','cn');
INSERT INTO met_ui_config VALUES('289','28','shopproduct_list_detail','met_16_1','mui169','2','0','','shop_modal_title','shop_modal_title','','商品选项','弹框标题','启用商城模块后时尚模式下点击购买按钮弹框标题','18','cn');
INSERT INTO met_ui_config VALUES('290','28','shopproduct_list_detail','met_16_1','mui169','9','0','','navbgcolor','navbgcolor-1','','','时尚模式导航背景色','默认为网页背景色','19','cn');
INSERT INTO met_ui_config VALUES('291','28','shopproduct_list_detail','met_16_1','mui169','9','0','','shopcolor','shopcolor','','#f96868','立即购买按钮颜色','','20','cn');
INSERT INTO met_ui_config VALUES('292','28','shopproduct_list_detail','met_16_1','mui169','9','0','','bgconcolor','bgconcolor-1','','#ffffff','内容背景色','默认为白色','21','cn');
INSERT INTO met_ui_config VALUES('293','28','shopproduct_list_detail','met_16_1','mui169','4','0','左$T$1$M$右$T$0','compos','compos-1','','1','推荐产品侧栏位置','','22','cn');
INSERT INTO met_ui_config VALUES('294','29','sitemap','met_16_1','mui169','9','0','','titlecolor','titlecolor-1','','','标题颜色','默认为模板主色调','2','cn');
INSERT INTO met_ui_config VALUES('295','29','sitemap','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('296','29','sitemap','met_16_1','mui169','9','0','','bgcolor','bgcolor-1','','','区块背景色','默认为网页背景色','1','cn');
INSERT INTO met_ui_config VALUES('297','29','sitemap','met_16_1','mui169','9','0','','hovercolor','desccolor-1','','','鼠标经过颜色','默认为模板主色调','3','cn');
INSERT INTO met_ui_config VALUES('298','30','search','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('299','30','search','met_16_1','mui169','9','0','','bgcolor','bgcolor-1','','','区块背景色','','1','cn');
INSERT INTO met_ui_config VALUES('300','30','search','met_16_1','mui169','9','0','','hovercolor','hovercolor-1','','','鼠标经过颜色','默认为模板配色调','2','cn');
INSERT INTO met_ui_config VALUES('301','30','search','met_16_1','mui169','9','0','','titlecolor','titlecolor-1','','','标题颜色','默认为模板主色调','3','cn');
INSERT INTO met_ui_config VALUES('302','31','404','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('303','31','404','met_16_1','mui169','9','0','','bgcolor','bgcolor-1','','','区块背景色','默认为网站背景色','1','cn');
INSERT INTO met_ui_config VALUES('304','31','404','met_16_1','mui169','9','0','','titlecolor','titlecolor-1','','','字体颜色','默认为模板主色调','2','cn');
INSERT INTO met_ui_config VALUES('342','35','product_list','met_36_1','mui169','6','4','','picturecolumn','picturecolumn','3','','栏目选择','模块栏目选择','7','cn');
INSERT INTO met_ui_config VALUES('341','35','product_list','met_36_1','mui169','9','4','','pctitlecolor','pctitlecolor','#524741','','产品标题文字颜色','默认为模板主色调','6','cn');
INSERT INTO met_ui_config VALUES('340','35','product_list','met_36_1','mui169','9','4','','bgcolor','bgcolor','#f8f8f8','#333333','图片背景色','默认为#333333','5','cn');
INSERT INTO met_ui_config VALUES('339','35','product_list','met_36_1','mui169','9','4','','titlecolor','titlecolor','#333333','','标题文字颜色','默认为模板主色调','4','cn');
INSERT INTO met_ui_config VALUES('338','35','product_list','met_36_1','mui169','2','4','','picturetitle','picturetitle','精品项目','产品展示','大标题','栏目标题名称，填写0的时候默认不显示','3','cn');
INSERT INTO met_ui_config VALUES('522','42','service_list','met_16_1','mui169','9','0','','hovertitlecolor','hovertitlecolor','','','鼠标经过标题文字颜色','默认继承自模板配色调','27','cn');
INSERT INTO met_ui_config VALUES('337','35','product_list','met_36_1','mui169','9','0','','bgfullcolor','bgfullcolor','','','区块背景色','区块背景色默认为模板背景色','2','cn');
INSERT INTO met_ui_config VALUES('336','35','product_list','met_36_1','mui169','7','4','','bgimg','bgimg','','','区块背景图','背景图片建议尺寸：800px * 1000px,当上传区块背景图时会挡住区块背景色。','1','cn');
INSERT INTO met_ui_config VALUES('335','35','product_list','met_36_1','mui169','4','4','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','1','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('316','34','about_list','met_28_3','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','1','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('317','34','about_list','met_28_3','mui169','7','0','','imgbg','imgbg','','','区块背景图','','1','cn');
INSERT INTO met_ui_config VALUES('318','34','about_list','met_28_3','mui169','2','0','','title','title','关于艾邸 / About us','标题','标题','','2','cn');
INSERT INTO met_ui_config VALUES('319','34','about_list','met_28_3','mui169','4','0','背景图$T$1$M$背景色$T$0','bgtype','bgtype','1','1','背景显示类型','','2','cn');
INSERT INTO met_ui_config VALUES('320','34','about_list','met_28_3','mui169','3','0','','desc','desc','艾邸物业自1992年创立以来，以“让社区变得更美好”为使命，奉行“我们的价值源于满意的服务和诚意的链接”的核心价值观，经过近30年的发展，已经成为中国最大的现代物业服务集团企业之一，并长期稳居中国物业管理行业市场化运营领先企业前列、中国物业管理行业综合实力前五强。艾邸物业是中国首批国家一级资质物业服务企业，员工人数约30000人（含分包方），形成了覆盖全国的发展态势，集团以“三精化”网格管理模式，着力打造“物业管理发展”与“社区生态建设”双主航道的发展模式。','描述一','描述一','填0隐藏','3','cn');
INSERT INTO met_ui_config VALUES('321','34','about_list','met_28_3','mui169','3','0','','desc_two','desc_two','在物业管理业务领域，艾邸物业设立了五大区域及深圳、北京、上海、天津、武汉、南京、苏州、成都、重庆、福州、济南、合肥、南昌、大连、长沙、银川、乌鲁木齐等30余个分支机构，物业服务范围覆盖中国31个省、自治区、直辖市的80余个城市，物业项目约750余个，物业面积逾1.7亿平方米。所服务的物业类型包括：住宅（独立式房屋、多层、高层）和公建（写字楼、商业综合体、政府办公楼、大学、医院、公园、会展中心、工业物流园区等）。','描述二','描述二','填0隐藏','4','cn');
INSERT INTO met_ui_config VALUES('322','34','about_list','met_28_3','mui169','3','0','','desc_thirdcolor','desc_thirdcolor','在社区生态圈建设领域，艾邸物业秉承包容式（而非攫取式）整合社区资源，共创共享行业社区生态圈价值，通过以物联网和云计算技术打造的集物业服务、社区商务和公共服务于一体的智慧型社区运营平台的全面应用，整合线上商家资源和线下社区资源，将物业管理和社区商务进行深度融合，积极推动社区生态圈的繁荣，并最终促进物业管理的良性发展和社区生活方式的蝶变式进化。','描述三','描述三','填0隐藏','5','cn');
INSERT INTO met_ui_config VALUES('323','34','about_list','met_28_3','mui169','2','0','','moretxt','moretxt','查看更多','查看更多','查看更多文字','','6','cn');
INSERT INTO met_ui_config VALUES('324','34','about_list','met_28_3','mui169','9','0','','titlecolor','titlecolor-1','','','标题文字颜色','默认为网站主色调','7','cn');
INSERT INTO met_ui_config VALUES('325','34','about_list','met_28_3','mui169','9','0','','bgcolor','bgcolor','','','区块背景色','默认为网站背景色','7','cn');
INSERT INTO met_ui_config VALUES('326','34','about_list','met_28_3','mui169','9','0','','desccolor','desccolor-1','','','描述颜色','默认为网站副色调','8','cn');
INSERT INTO met_ui_config VALUES('327','34','about_list','met_28_3','mui169','9','0','','btnbgcolor','btnbgcolor','#333333','#f0f0f0','查看更多按钮背景色','默认为#f0f0f0','9','cn');
INSERT INTO met_ui_config VALUES('328','34','about_list','met_28_3','mui169','9','0','','btntxtcolor','btntxtcolor','#ffffff','#ffffff','查看更多按钮文字颜色','默认为#fff','10','cn');
INSERT INTO met_ui_config VALUES('329','34','about_list','met_28_3','mui169','9','0','','hovercolor','hovercolor','','','鼠标经过颜色','默认为网站配色调','10','cn');
INSERT INTO met_ui_config VALUES('330','34','about_list','met_28_3','mui169','2','0','','link','link-1','https://show.metinfo.cn/m/mui169/341/about/','','按钮链接地址','','11','cn');
INSERT INTO met_ui_config VALUES('331','34','about_list','met_28_3','mui169','4','0','右$T$1$M$左$T$0','position','position','1','1','文字位置','电脑端起效','12','cn');
INSERT INTO met_ui_config VALUES('332','34','about_list','met_28_3','mui169','7','0','','imgurl','imgurl','../upload/201806/1529662629.jpg','','上传图片','建议不使用背景图时使用，会根据文字位置改变居左或居右','15','cn');
INSERT INTO met_ui_config VALUES('333','34','about_list','met_28_3','mui169','2','0','','img_x','img_x','500','480','图片缩略图宽','','16','cn');
INSERT INTO met_ui_config VALUES('334','34','about_list','met_28_3','mui169','2','0','','img_y','img_y','500','360','图片缩略图高','','17','cn');
INSERT INTO met_ui_config VALUES('343','35','product_list','met_36_1','mui169','2','4','','picturenum','picturenum','12','12','显示图片个数','默认为12','8','cn');
INSERT INTO met_ui_config VALUES('344','35','product_list','met_36_1','mui169','4','4','全部$T$all$M$推荐$T$com','picturecom','picturecom','all','all','调用类型','栏目调用类型，默认为全部','9','cn');
INSERT INTO met_ui_config VALUES('345','35','product_list','met_36_1','mui169','9','4','','focuscolor','focuscolor','#f5f5f5','','鼠标经过文字颜色','默认为模板配色调','10','cn');
INSERT INTO met_ui_config VALUES('346','35','product_list','met_36_1','mui169','9','4','','bghovercolor','bghovercolor','#524741','#8a8787','区块悬停背景色','默认为#8a8787','11','cn');
INSERT INTO met_ui_config VALUES('347','35','product_list','met_36_1','mui169','9','4','','arrowhovercolor','arrowhovercolor','#f5f5f5','#ffffff','鼠标经过左右箭头颜色','默认为#ffffff','12','cn');
INSERT INTO met_ui_config VALUES('348','35','product_list','met_36_1','mui169','9','0','','arrowbordercolor','arrowbordercolor','#524741','#424141','轮播左右箭头边框','轮播左右箭头边框颜色设置','13','cn');
INSERT INTO met_ui_config VALUES('349','35','product_list','met_36_1','mui169','2','0','','desc_num','desc_num','10','10','标题默认显示字数','标题默认显示字数','14','cn');
INSERT INTO met_ui_config VALUES('350','35','product_list','met_36_1','mui169','7','0','','titlebottompicture','productpicture','','','标题下标图片上传','标题下标图片上传','15','cn');
INSERT INTO met_ui_config VALUES('351','35','product_list','met_36_1','mui169','2','0','','fullpadding','padding-1','70','70','电脑端区块边距','默认为70px','16','cn');
INSERT INTO met_ui_config VALUES('352','35','product_list','met_36_1','mui169','2','0','','padding_p','padding_p-1','50','50','平板端区块边距','默认为50px','17','cn');
INSERT INTO met_ui_config VALUES('353','35','product_list','met_36_1','mui169','2','0','','padding_m','padding_m-1','50','50','手机端区块边距','默认为50px','18','cn');
INSERT INTO met_ui_config VALUES('354','35','product_list','met_36_1','mui169','2','0','','titlesize','titlesize','24','36','栏目标题文字大小','默认为36px','19','cn');
INSERT INTO met_ui_config VALUES('355','35','product_list','met_36_1','mui169','2','0','','titleweight','titleweight','550','550','栏目标题文字粗细','默认为550','20','cn');
INSERT INTO met_ui_config VALUES('356','35','product_list','met_36_1','mui169','2','0','','picturetitlesize','picturetitlesize','18','18','产品标题文字大小','默认为18px','21','cn');
INSERT INTO met_ui_config VALUES('357','35','product_list','met_36_1','mui169','2','0','','picturetitleweight','picturetitleweight','600','700','产品标题文字粗细','默认为700','22','cn');
INSERT INTO met_ui_config VALUES('358','35','product_list','met_36_1','mui169','2','0','','subtitlenum','subtitlenum','32','14','产品描述字数','默认为14','23','cn');
INSERT INTO met_ui_config VALUES('359','35','product_list','met_36_1','mui169','9','0','','subtitlecolor','subtitlecolor','#333333','#777777','产品描述字体颜色','默认为#777777','24','cn');
INSERT INTO met_ui_config VALUES('360','35','product_list','met_36_1','mui169','2','0','','subtitlesize','subtitlesize','14','14','产品描述字体尺寸','默认为14px','25','cn');
INSERT INTO met_ui_config VALUES('361','35','product_list','met_36_1','mui169','2','0','','subtitleweight','subtitleweight','300','300','产品描述字体粗细','默认为300','26','cn');
INSERT INTO met_ui_config VALUES('362','35','product_list','met_36_1','mui169','9','0','','pricecolor','pricecolor','#79a8da','#79a8da','产品价格字体颜色','默认为#79a8da','27','cn');
INSERT INTO met_ui_config VALUES('363','35','product_list','met_36_1','mui169','2','0','','pricesize','pricesize','14','14','产品价格字体尺寸','默认为14px','28','cn');
INSERT INTO met_ui_config VALUES('364','35','product_list','met_36_1','mui169','2','0','','priceweight','priceweight','300','300','产品价格字体粗细','默认为300','29','cn');
INSERT INTO met_ui_config VALUES('365','35','product_list','met_36_1','mui169','9','0','','carousel_control_hover','carousel_control_hover','#524741','','箭头悬浮颜色','默认为模板风格背景色','30','cn');
INSERT INTO met_ui_config VALUES('366','35','product_list','met_36_1','mui169','2','0','','img_x','img_x-1','500','255','缩略图宽度','默认为255px','31','cn');
INSERT INTO met_ui_config VALUES('367','35','product_list','met_36_1','mui169','2','0','','img_y','img_y-1','400','255','缩略图高度','默认为255px','32','cn');
INSERT INTO met_ui_config VALUES('368','35','product_list','met_36_1','mui169','9','0','','description_hover_color','description_hover_color','#f5f5f5','','产品描述鼠标悬浮颜色','默认为模板配色调','33','cn');
INSERT INTO met_ui_config VALUES('369','36','video','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','1','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('370','36','video','met_16_1','mui169','2','0','','title','title-1','<p style=\"font-size:24px; font-weight:500;\">企业文化</p>','标题','标题','','1','cn');
INSERT INTO met_ui_config VALUES('371','36','video','met_16_1','mui169','2','0','','desc','desc-1','<div></div>','描述','描述','','2','cn');
INSERT INTO met_ui_config VALUES('372','36','video','met_16_1','mui169','7','0','','poster','poster','','','视频封面图','建议图片尺寸：【1000】X【560】，图片在移动端生效','4','cn');
INSERT INTO met_ui_config VALUES('373','36','video','met_16_1','mui169','8','0','','url','url','<p style=\"text-align:center\"><video class=\"edui-upload-video  vjs-default-skin    video-js\" controls=\"\" preload=\"none\" width=\"420\" height=\"280\" src=\"https://show.metinfo.cn/m/mui169/341/upload/video/201806/1529894180198290.mp4\" data-setup=\"{}\"><source src=\"https://show.metinfo.cn/m/mui169/341/upload/video/201806/1529894180198290.mp4\" type=\"video/mp4\"></source></video></p>','','上传视频','请使用编辑器的上传视频功能，插入视频无效。','5','cn');
INSERT INTO met_ui_config VALUES('374','36','video','met_16_1','mui169','2','0','','vtitle','vtitle','风雨兼程二十载，精品服务千万家','','视频主标题','','6','cn');
INSERT INTO met_ui_config VALUES('375','36','video','met_16_1','mui169','2','0','','vsubtitle','vsubtitle','','','视频副标题','','7','cn');
INSERT INTO met_ui_config VALUES('376','36','video','met_16_1','mui169','2','0','','btn','btn','查看详情','','按钮文本','','8','cn');
INSERT INTO met_ui_config VALUES('377','36','video','met_16_1','mui169','2','0','','btn_url','btn_url','https://show.metinfo.cn/m/mui169/341/about/show.php?id=11','','按钮链接','','9','cn');
INSERT INTO met_ui_config VALUES('378','36','video','met_16_1','mui169','7','0','','bgpic','bgpic-1','','','区块背景图','','9','cn');
INSERT INTO met_ui_config VALUES('379','36','video','met_16_1','mui169','9','0','','titlecolor','titlecolor-1','','','区块标题颜色','默认为模板主色调','10','cn');
INSERT INTO met_ui_config VALUES('380','36','video','met_16_1','mui169','9','0','','desccolor','desccolor-1','','','区块描述颜色','默认为模板副色调','11','cn');
INSERT INTO met_ui_config VALUES('381','36','video','met_16_1','mui169','2','0','','padding','padding-1','70','70','电脑端区块边距','默认为70px','12','cn');
INSERT INTO met_ui_config VALUES('382','36','video','met_16_1','mui169','2','0','','padding_p','padding_p-1','60','60','平板区块间距','默认为60px','13','cn');
INSERT INTO met_ui_config VALUES('383','36','video','met_16_1','mui169','2','0','','padding_m','padding_m-1','50','50','手机区块间距','默认为50px','14','cn');
INSERT INTO met_ui_config VALUES('487','42','service_list','met_16_1','mui169','2','4','','title','title-1','<p style=\"font-size:24px; font-weight:500;\">产品服务</p>','标题','标题','','1','cn');
INSERT INTO met_ui_config VALUES('504','42','service_list','met_16_1','mui169','9','0','','desccolor','desccolor','','','描述颜色','默认继承自模板副色调','17','cn');
INSERT INTO met_ui_config VALUES('502','42','service_list','met_16_1','mui169','7','0','','bgpic','bgpic','','','区块背景图','建议上传宽为1920px高自定义的图片','15','cn');
INSERT INTO met_ui_config VALUES('503','42','service_list','met_16_1','mui169','9','0','','titlecolor','titlecolor','','','标题颜色','默认继承自模板主色调','16','cn');
INSERT INTO met_ui_config VALUES('501','42','service_list','met_16_1','mui169','9','0','','bgcolor','asdadas','','','区块背景色','默认继承自网站背景颜色','14','cn');
INSERT INTO met_ui_config VALUES('498','42','service_list','met_16_1','mui169','2','0','','padding_p','padding_p','60','60','平板区块间距','默认60px','12','cn');
INSERT INTO met_ui_config VALUES('499','42','service_list','met_16_1','mui169','4','0','$M$背景色$T$1$M$背景图$T$0','bg_type','bg_type','1','1','区块背景方式','','13','cn');
INSERT INTO met_ui_config VALUES('500','42','service_list','met_16_1','mui169','2','0','','padding_m','padding_m','50','50','手机区块间距','默认50px','13','cn');
INSERT INTO met_ui_config VALUES('496','42','service_list','met_16_1','mui169','2','0','','column_xs','column_xs-1','2','2','手机显示列数','手机：浏览器宽度小于768像素','9','cn');
INSERT INTO met_ui_config VALUES('497','42','service_list','met_16_1','mui169','2','0','','padding','padding','70','70','电脑区块间距','默认70px','11','cn');
INSERT INTO met_ui_config VALUES('495','42','service_list','met_16_1','mui169','2','0','','column_md','column_md-1','2','2','平板显示列数','平板：浏览器宽度大于或等于768像素且小于992像素','8','cn');
INSERT INTO met_ui_config VALUES('493','42','service_list','met_16_1','mui169','2','0','','column_xxl','column_xxl-1','4','4','大尺寸电脑显示列数','大尺寸电脑：浏览器窗口宽度大于或等于1600像素','6','cn');
INSERT INTO met_ui_config VALUES('494','42','service_list','met_16_1','mui169','2','0','','column_lg','column_lg-1','4','4','普通电脑显示列数','普通电脑：浏览器窗口宽度大于或等于992像素且小于1600像素','7','cn');
INSERT INTO met_ui_config VALUES('492','42','service_list','met_16_1','mui169','4','0','$M$图标$T$1$M$图片$T$0','home_service_type','home_service_type','1','1','展示方式','','5','cn');
INSERT INTO met_ui_config VALUES('490','42','service_list','met_16_1','mui169','2','0','','num','num-1','4','4','调用栏目数量','','4','cn');
INSERT INTO met_ui_config VALUES('491','42','service_list','met_16_1','mui169','4','0','$M$带链接$T$1$M$纯展示$T$0','link_ok','link_ok','0','1','是否链接','列表是否可以链接到栏目页','5','cn');
INSERT INTO met_ui_config VALUES('488','42','service_list','met_16_1','mui169','2','4','','desc','desc-1','0','描述','描述','','2','cn');
INSERT INTO met_ui_config VALUES('489','42','service_list','met_16_1','mui169','6','4','','id','id-1','22','1','调用栏目','调用指定二级栏目列表，显示栏目名称+栏目描述','3','cn');
INSERT INTO met_ui_config VALUES('476','41','product_list_page','met_11_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('477','41','product_list_page','met_11_1','mui169','4','0','$M$标准$T$1$M$橱窗$T$2','list_style','list_style','','1','展示方式','','1','cn');
INSERT INTO met_ui_config VALUES('478','41','product_list_page','met_11_1','mui169','9','0','','bgcolor','bgcolor-1','','','区块背景色','默认为网站背景色','2','cn');
INSERT INTO met_ui_config VALUES('479','41','product_list_page','met_11_1','mui169','9','0','','titlecolor','titlecolor-1','','','标题颜色','默认为模板主色调','3','cn');
INSERT INTO met_ui_config VALUES('480','41','product_list_page','met_11_1','mui169','9','0','','desccolor','desccolor-1','','','描述颜色','默认为模板副色调','4','cn');
INSERT INTO met_ui_config VALUES('481','41','product_list_page','met_11_1','mui169','9','0','','hovercolor','hovercolor-1','','','鼠标经过颜色和产品按钮及当前分页按钮颜色','默认为模板配色调','5','cn');
INSERT INTO met_ui_config VALUES('482','41','product_list_page','met_11_1','mui169','2','0','','column_xxl','column_xlg','','4','大尺寸电脑显示列数','大尺寸电脑：浏览器宽度大于1600像素','6','cn');
INSERT INTO met_ui_config VALUES('483','41','product_list_page','met_11_1','mui169','2','0','','column_lg','column_md-1','','4','普通电脑显示列数','普通电脑：浏览器宽度大于992像素小于1600像素','7','cn');
INSERT INTO met_ui_config VALUES('505','42','service_list','met_16_1','mui169','9','0','','icon_bg','icon_bg','#ffffff','#eeeeee','图标背景色','','19','cn');
INSERT INTO met_ui_config VALUES('423','38','link','met_11_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('424','38','link','met_11_1','mui169','2','0','','footlink_title','footlink_title','','友情链接','友情链接标题','','1','cn');
INSERT INTO met_ui_config VALUES('425','38','link','met_11_1','mui169','9','0','','bgcolor','bgcolor-1','','','背景色','默认为网站背景色','2','cn');
INSERT INTO met_ui_config VALUES('426','38','link','met_11_1','mui169','9','0','','titlecolor','titlecolor-1','','','标题颜色','默认为模板主色调','3','cn');
INSERT INTO met_ui_config VALUES('427','38','link','met_11_1','mui169','9','0','','desccolor','desccolor-1','','','描述颜色','默认为模板副色调','4','cn');
INSERT INTO met_ui_config VALUES('428','38','link','met_11_1','mui169','9','0','','hovercolor','hovercolor-1','','','鼠标经过颜色','默认为模板配色调','5','cn');
INSERT INTO met_ui_config VALUES('429','38','link','met_11_1','mui169','9','0','','solidcolor','solidcolor-1','','','线框颜色','','6','cn');
INSERT INTO met_ui_config VALUES('430','38','link','met_11_1','mui169','4','0','显示$T$1$M$隐藏$T$0','split','split','','1','分隔符','默认显示分隔符，分隔符为斜杠“/”','7','cn');
INSERT INTO met_ui_config VALUES('485','41','product_list_page','met_11_1','mui169','2','0','','column_xs','column_xs-1','','2','手机显示列数','手机：浏览器宽度小于768像素','9','cn');
INSERT INTO met_ui_config VALUES('486','42','service_list','met_16_1','mui169','4','4','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','1','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('484','41','product_list_page','met_11_1','mui169','2','0','','column_md','column_sm','','2','平板显示列数','平板：浏览器宽度大于768像素小于992像素','8','cn');
INSERT INTO met_ui_config VALUES('431','39','news_list','met_36_2','mui169','4','4','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','1','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('432','39','news_list','met_36_2','mui169','2','4','','title','title-1','<p style=\"font-size:24px; font-weight:500;\">新闻资讯</p>','新闻资讯','区块标题','为0的时候默认隐藏','1','cn');
INSERT INTO met_ui_config VALUES('433','39','news_list','met_36_2','mui169','6','4','','select','select-1','2','','区块栏目选择','选择相应的栏目会展示对应的内容','2','cn');
INSERT INTO met_ui_config VALUES('434','39','news_list','met_36_2','mui169','4','0','全部$T$all$M$推荐$T$com','type','type-1','all','all','区块内容展示类型','默认展示全部内容','3','cn');
INSERT INTO met_ui_config VALUES('435','39','news_list','met_36_2','mui169','2','4','','padding_pc','padding_pc','70','70','区块电脑端内边距','默认为70px','4','cn');
INSERT INTO met_ui_config VALUES('436','39','news_list','met_36_2','mui169','2','4','','padding_paid','padding_paid-1','50','50','区块平板端内边距','默认为50px','5','cn');
INSERT INTO met_ui_config VALUES('437','39','news_list','met_36_2','mui169','2','4','','padding_mobile','padding_mobile-1','20','20','区块手机端内边距','默认为20px','6','cn');
INSERT INTO met_ui_config VALUES('438','39','news_list','met_36_2','mui169','9','4','','bgfullcolor','bgfullcolor-1','','','区块背景颜色','默认继承网站背景色','7','cn');
INSERT INTO met_ui_config VALUES('439','39','news_list','met_36_2','mui169','7','4','','bgimg','bgimg-1','','','区块背景图片','上传区块背景图会将区块背景色覆盖，建议上传宽1920px,高自定义的图片','8','cn');
INSERT INTO met_ui_config VALUES('440','39','news_list','met_36_2','mui169','2','0','','img_x','img_x-1','900','790','区块缩略图宽','默认为790px','9','cn');
INSERT INTO met_ui_config VALUES('441','39','news_list','met_36_2','mui169','2','0','','img_y','img_y-1','500','465','区块缩略图高','默认为465px','10','cn');
INSERT INTO met_ui_config VALUES('442','39','news_list','met_36_2','mui169','2','0','','desc_num','desc_num-1','20','20','内容标题显示字数','默认为20个','11','cn');
INSERT INTO met_ui_config VALUES('443','39','news_list','met_36_2','mui169','2','0','','subtitlenum','subtitlenum-1','60','60','内容描述显示字数','默认为60个','12','cn');
INSERT INTO met_ui_config VALUES('444','39','news_list','met_36_2','mui169','2','0','','right_list_num','right_list_num','5','4','右侧内容展示条数','默认为4条','13','cn');
INSERT INTO met_ui_config VALUES('445','39','news_list','met_36_2','mui169','2','0','','more','more','更多','更多','底部按钮文本','区块底部按钮文本','14','cn');
INSERT INTO met_ui_config VALUES('446','39','news_list','met_36_2','mui169','9','0','','m_title_color','m_title_color','','','区块标题字体颜色','默认继承模板主色调','15','cn');
INSERT INTO met_ui_config VALUES('447','39','news_list','met_36_2','mui169','2','0','','m_title_size','m_title_size','24','18','区块标题字体尺寸','默认为18px','16','cn');
INSERT INTO met_ui_config VALUES('448','39','news_list','met_36_2','mui169','2','0','','m_title_weight','m_title_weight','600','700','区块标题字体粗细','默认为700','17','cn');
INSERT INTO met_ui_config VALUES('449','39','news_list','met_36_2','mui169','9','0','','time_color','time_color','#524741','#959595','右侧内容时间字体颜色','默认为#959595','18','cn');
INSERT INTO met_ui_config VALUES('450','39','news_list','met_36_2','mui169','2','0','','time_size','time_size','12','12','右侧内容时间字体尺寸','默认为12px','19','cn');
INSERT INTO met_ui_config VALUES('451','39','news_list','met_36_2','mui169','9','0','','dec_color','dec_color','','','右侧内容描述字体颜色','默认继承模板副色调','20','cn');
INSERT INTO met_ui_config VALUES('452','39','news_list','met_36_2','mui169','2','0','','dec_size','dec_size','10','10','右侧内容描述字体尺寸','默认为10px','21','cn');
INSERT INTO met_ui_config VALUES('453','39','news_list','met_36_2','mui169','9','0','','dec_hover_color','dec_hover_color','','','右侧内容描述悬浮颜色','默认继承模板配色调','22','cn');
INSERT INTO met_ui_config VALUES('454','39','news_list','met_36_2','mui169','9','0','','dec_select_color','dec_select_color','','','右侧内容描述选中颜色','默认继承模板配色调','23','cn');
INSERT INTO met_ui_config VALUES('455','39','news_list','met_36_2','mui169','9','0','','hovercolor','hovercolor-1','','','底部按钮字体颜色，悬浮背景、边框颜色','默认继承模板配色调','24','cn');
INSERT INTO met_ui_config VALUES('456','39','news_list','met_36_2','mui169','9','0','','hover_btn_color','hover_btn_color','#ffffff','#ffffff','底部按钮悬浮字体颜色','默认为#ffffff','25','cn');
INSERT INTO met_ui_config VALUES('457','39','news_list','met_36_2','mui169','9','0','','title_color','title_color-1','#ffffff','','内容标题字体颜色','默认继承模板主色调','26','cn');
INSERT INTO met_ui_config VALUES('458','39','news_list','met_36_2','mui169','2','0','','title_size','title_size-1','20','25','内容标题字体尺寸','默认为25px','27','cn');
INSERT INTO met_ui_config VALUES('513','43','subcolumn_nav','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','ui_show','ui_show','','1','区块显示开关','当前UI区块的开启关闭设置，关闭后可以在可视化编辑中开启','0','cn');
INSERT INTO met_ui_config VALUES('514','43','subcolumn_nav','met_16_1','mui169','2','0','','all','all-1','','全部','全部文字','','1','cn');
INSERT INTO met_ui_config VALUES('515','43','subcolumn_nav','met_16_1','mui169','2','0','','product_placeholder','product_placeholder','','search','搜索提示文字','','2','cn');
INSERT INTO met_ui_config VALUES('516','43','subcolumn_nav','met_16_1','mui169','4','0','$M$开启$T$1$M$关闭$T$0','product_search','product_search','','1','搜索','存在于产品模块','3','cn');
INSERT INTO met_ui_config VALUES('517','43','subcolumn_nav','met_16_1','mui169','9','0','','bgcolor','bgcolor-1','','','区块背景色','','4','cn');
INSERT INTO met_ui_config VALUES('518','43','subcolumn_nav','met_16_1','mui169','9','0','','titlecolor','titlecolor-1','','','标题颜色','默认为模板主色调','5','cn');
INSERT INTO met_ui_config VALUES('519','43','subcolumn_nav','met_16_1','mui169','9','0','','hovercolor','hovercolor-1','','','鼠标经过颜色和搜索框选中颜色','默认为模板配色调','6','cn');
INSERT INTO met_ui_config VALUES('520','43','subcolumn_nav','met_16_1','mui169','9','0','','bordercolor','bordercolor-1','','#f0f2f5','下边框线条颜色','','7','cn');
INSERT INTO met_ui_config VALUES('521','43','subcolumn_nav','met_16_1','mui169','4','0','全屏$T$0$M$固定宽度$T$1','container','container-1','','0','展示样式','','8','cn');
INSERT INTO met_ui_config VALUES('523','42','service_list','met_16_1','mui169','9','0','','hoverdesccolor','hoverdesccolor','','','鼠标经过描述文字颜色','默认继承自模板配色调','28','cn');
INSERT INTO met_ui_config VALUES('524','1','head_nav','met_11_1','mui169','9','0','','sec_textcolor','sec_textcolor','','','下拉菜单鼠标经过文字颜色','默认为网站副色调','5','cn');
INSERT INTO met_ui_config VALUES('525','24','product_list_detail','met_16_1','mui169','2','0','','para_num','para_num','','0','关闭参数个数','设置之后前N个参数不显示，默认都显示','19','cn');
INSERT INTO met_ui_config VALUES('526','28','shopproduct_list_detail','met_16_1','mui169','2','0','','para_num','para_num-1','','0','关闭参数个数','设置之后前N个参数不显示，默认都显示','23','cn');
INSERT INTO met_ui_config VALUES('527','2','banner','met_16_1','mui169','9','0','','titlecolor','titlecolor-1','','','banner文字颜色','默认为#ffffff,此设置针对于内页无banner时设置的','4','cn');

DROP TABLE IF EXISTS met_ui;
;


DROP TABLE IF EXISTS met_shopv2_tracking;
CREATE TABLE `met_shopv2_tracking` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(200) NOT NULL COMMENT '商品订单号',
  `tracking_no` varchar(100) NOT NULL COMMENT '快递单号',
  `information` text NOT NULL COMMENT '物流信息',
  `addtime` int(10) NOT NULL COMMENT '创建时间',
  `updatetime` int(10) NOT NULL COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_pay_api;
CREATE TABLE `met_pay_api` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `paytype` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_pay_config;
CREATE TABLE `met_pay_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `mobile_value` text,
  `columnid` int(11) DEFAULT NULL,
  `flashid` int(11) DEFAULT NULL,
  `lang` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO met_pay_config VALUES('1','model_name','在线支付','','0','0','metinfo');
INSERT INTO met_pay_config VALUES('2','payment_open','1','','0','0','payment');

DROP TABLE IF EXISTS met_pay_order;
CREATE TABLE `met_pay_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` int(11) NOT NULL,
  `callback_url` varchar(255) DEFAULT NULL,
  `out_trade_no` varchar(32) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `product_id` varchar(32) DEFAULT NULL,
  `body` varchar(128) DEFAULT NULL,
  `goods_tag` varchar(32) DEFAULT NULL,
  `attach` varchar(127) DEFAULT NULL,
  `show_url` varchar(255) DEFAULT NULL,
  `total_fee` decimal(9,2) NOT NULL,
  `order_time` datetime NOT NULL,
  `pay_time` datetime DEFAULT NULL,
  `pay_type` int(1) DEFAULT NULL,
  `callback` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `uid` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS met_shopv2_favorite;
CREATE TABLE `met_shopv2_favorite` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '产品id',
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '收藏时间',
  `lang` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


