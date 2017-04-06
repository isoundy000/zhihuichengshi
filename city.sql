#
# Structure for table "ec_admin"
#

DROP TABLE IF EXISTS `ec_admin`;
CREATE TABLE `ec_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_bin DEFAULT NULL COMMENT '用户名',
  `password` char(32) COLLATE utf8_bin DEFAULT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC COMMENT='管理员';

#
# Data for table "ec_admin"
#

/*!40000 ALTER TABLE `ec_admin` DISABLE KEYS */;
INSERT INTO `ec_admin` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `ec_admin` ENABLE KEYS */;

#
# Structure for table "ec_classinfo"
#

DROP TABLE IF EXISTS `ec_classinfo`;
CREATE TABLE `ec_classinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT '0' COMMENT '分类ID',
  `uid` int(11) DEFAULT '0' COMMENT '用户ID',
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '信息标题',
  `info` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '信息描述',
  `price` decimal(10,2) DEFAULT '0.00' COMMENT '物品价格',
  `contact` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '联系人',
  `tel` varchar(15) COLLATE utf8_bin DEFAULT NULL COMMENT '联系电话',
  `addtime` int(11) DEFAULT '0' COMMENT '发布时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='二手信息';

#
# Data for table "ec_classinfo"
#

/*!40000 ALTER TABLE `ec_classinfo` DISABLE KEYS */;
INSERT INTO `ec_classinfo` VALUES (4,1,2,'二手电脑便宜卖了','11年高配联想笔记本，急用钱',1000.00,'李明','15517059595',1491302045),(5,2,2,'台式电脑3000','刚买的电脑，急用钱卖',2000.00,'小伍','155125665',1491302185);
/*!40000 ALTER TABLE `ec_classinfo` ENABLE KEYS */;

#
# Structure for table "ec_classinfo_cat"
#

DROP TABLE IF EXISTS `ec_classinfo_cat`;
CREATE TABLE `ec_classinfo_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '分类名称',
  `info` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '分类描述',
  `rank` int(11) DEFAULT '0' COMMENT '分类排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC COMMENT='二信息分类';

#
# Data for table "ec_classinfo_cat"
#

/*!40000 ALTER TABLE `ec_classinfo_cat` DISABLE KEYS */;
INSERT INTO `ec_classinfo_cat` VALUES (1,'家居家电','家居家电',0),(2,'数码产品','数码产品',0),(3,'办公用品','办公用品',0),(4,'汽车周边','汽车周边',0);
/*!40000 ALTER TABLE `ec_classinfo_cat` ENABLE KEYS */;

#
# Structure for table "ec_classinfo_files"
#

DROP TABLE IF EXISTS `ec_classinfo_files`;
CREATE TABLE `ec_classinfo_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) DEFAULT '0' COMMENT '信息ID',
  `filename` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '附件名称',
  `filepath` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '附件地址',
  `fileext` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '扩展名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC COMMENT='信息附件';

#
# Data for table "ec_classinfo_files"
#

/*!40000 ALTER TABLE `ec_classinfo_files` DISABLE KEYS */;
INSERT INTO `ec_classinfo_files` VALUES (1,3,'5ab5c9ea15ce36d372931f3633f33a87e950b125.jpg','/public/uploads/classinfo/20170404/a6271fa87696afca488a8afdfd63b8a2.jpg','jpg'),(2,3,'6c224f4a20a44623803739649122720e0cf3d733.jpg','/public/uploads/classinfo/20170404/b12f95bb5f0d2b05b673bb62ce07dc7f.jpg','jpg'),(3,3,'c8ea15ce36d3d5391ec093c53387e950352ab033.jpg','/public/uploads/classinfo/20170404/5029f325a30b740a3653afcbe78fc4e6.jpg','jpg'),(4,4,'5ab5c9ea15ce36d372931f3633f33a87e950b125.jpg','/public/uploads/classinfo/20170404/a9eae37b42cf69910aea42652d1e5972.jpg','jpg'),(5,4,'6c224f4a20a44623803739649122720e0cf3d733.jpg','/public/uploads/classinfo/20170404/950fe4bedc805a05c3433c0fc0b73725.jpg','jpg'),(6,5,'c2cec3fdfc039245ff1b4fd48e94a4c27c1e25ba.jpg','/public/uploads/classinfo/20170404/860c3b37daf843b9b918339d7754544f.jpg','jpg');
/*!40000 ALTER TABLE `ec_classinfo_files` ENABLE KEYS */;

#
# Structure for table "ec_dingcai"
#

DROP TABLE IF EXISTS `ec_dingcai`;
CREATE TABLE `ec_dingcai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT '0' COMMENT '贴子ID',
  `uid` int(11) DEFAULT '0' COMMENT '用户ID',
  `act` varchar(20) DEFAULT NULL COMMENT '操作方式',
  `addtime` int(11) DEFAULT '0' COMMENT '操作时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='顶踩记录';

#
# Data for table "ec_dingcai"
#

/*!40000 ALTER TABLE `ec_dingcai` DISABLE KEYS */;
INSERT INTO `ec_dingcai` VALUES (2,10,2,'ding',1491246568),(3,9,2,'cai',1491246578),(4,11,2,'ding',1491293994),(5,15,3,'ding',1491305525),(6,14,3,'ding',1491305526),(7,13,3,'ding',1491305528),(8,12,3,'ding',1491305528),(9,16,3,'ding',1491409309),(10,18,3,'ding',1491409417);
/*!40000 ALTER TABLE `ec_dingcai` ENABLE KEYS */;

#
# Structure for table "ec_forum"
#

DROP TABLE IF EXISTS `ec_forum`;
CREATE TABLE `ec_forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_bin DEFAULT NULL COMMENT '版块名称',
  `info` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '版块介绍',
  `rank` int(11) DEFAULT '0' COMMENT '版块排序',
  `is_lock` tinyint(1) DEFAULT '0' COMMENT '是否允许发贴',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='论坛版块';

#
# Data for table "ec_forum"
#

/*!40000 ALTER TABLE `ec_forum` DISABLE KEYS */;
INSERT INTO `ec_forum` VALUES (1,'情感交流','一起交流情感的所在',1,0),(2,'二手交易','在这里可以发布二手交易信息',1,1);
/*!40000 ALTER TABLE `ec_forum` ENABLE KEYS */;

#
# Structure for table "ec_forum_files"
#

DROP TABLE IF EXISTS `ec_forum_files`;
CREATE TABLE `ec_forum_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT '0' COMMENT '贴子ID',
  `filename` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '附件名称',
  `filepath` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '附件地址',
  `fileext` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '扩展名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='贴子附件';

#
# Data for table "ec_forum_files"
#

/*!40000 ALTER TABLE `ec_forum_files` DISABLE KEYS */;
INSERT INTO `ec_forum_files` VALUES (11,1,'c8ea15ce36d3d5391ec093c53387e950352ab033.jpg','/public/uploads/post/20170404/3dfb7216fd00dbebc0eee9c4ca34da11.jpg','jpg');
/*!40000 ALTER TABLE `ec_forum_files` ENABLE KEYS */;

#
# Structure for table "ec_forum_posts"
#

DROP TABLE IF EXISTS `ec_forum_posts`;
CREATE TABLE `ec_forum_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) DEFAULT '0' COMMENT '版块ID',
  `uid` int(11) DEFAULT '0' COMMENT '用 户ID',
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '标题',
  `content` text COLLATE utf8_bin COMMENT '贴子内容',
  `addtime` int(11) DEFAULT '0' COMMENT '发布时间',
  `lasttime` int(11) DEFAULT '0' COMMENT '最后回复',
  `is_file` tinyint(1) DEFAULT '0' COMMENT '是否有附件',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='贴子表';

#
# Data for table "ec_forum_posts"
#

/*!40000 ALTER TABLE `ec_forum_posts` DISABLE KEYS */;
INSERT INTO `ec_forum_posts` VALUES (9,1,3,'&#128522;有在线的吗，出来聊聊','有在先的吗',1491305149,1491409409,0);
/*!40000 ALTER TABLE `ec_forum_posts` ENABLE KEYS */;

#
# Structure for table "ec_forum_reply"
#

DROP TABLE IF EXISTS `ec_forum_reply`;
CREATE TABLE `ec_forum_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT '0' COMMENT '所属贴子',
  `uid` int(11) DEFAULT '0' COMMENT '所属用户',
  `content` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '回复内容',
  `addtime` int(11) DEFAULT '0' COMMENT '回复时间',
  `ding` int(11) DEFAULT '0' COMMENT '顶数',
  `cai` int(11) DEFAULT '0' COMMENT '踩数',
  `filepath` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '附件地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='贴子回复';

#
# Data for table "ec_forum_reply"
#

/*!40000 ALTER TABLE `ec_forum_reply` DISABLE KEYS */;
INSERT INTO `ec_forum_reply` VALUES (12,9,2,'HELLO 美女',1491305381,1,0,NULL),(13,9,3,'我是男的，擦',1491305447,1,0,NULL),(14,9,2,'额，我以为是妞呢',1491305496,1,0,NULL),(15,9,3,'擦擦擦',1491305515,1,0,NULL),(16,9,3,'嘎嘎&#128516;',1491375583,1,0,NULL),(17,9,3,'卧槽(*｀へ´*) ',1491409399,0,0,NULL),(18,9,3,'哈哈哈&#128516;',1491409409,1,0,NULL);
/*!40000 ALTER TABLE `ec_forum_reply` ENABLE KEYS */;

#
# Structure for table "ec_gbook"
#

DROP TABLE IF EXISTS `ec_gbook`;
CREATE TABLE `ec_gbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT '0',
  `type` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '类别',
  `content` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '内容',
  `addtime` int(11) DEFAULT '0' COMMENT '提交时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='投诉建议';

#
# Data for table "ec_gbook"
#

/*!40000 ALTER TABLE `ec_gbook` DISABLE KEYS */;
INSERT INTO `ec_gbook` VALUES (3,2,'投诉','5号楼的租房对我性暴力',1491281681),(4,2,'建议','应该有好点的绿化',1491281742),(5,3,'建议','给我1000块呗',1491304651);
/*!40000 ALTER TABLE `ec_gbook` ENABLE KEYS */;

#
# Structure for table "ec_house"
#

DROP TABLE IF EXISTS `ec_house`;
CREATE TABLE `ec_house` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lid` int(11) DEFAULT '0' COMMENT '所属房东',
  `region_id` int(11) DEFAULT '0' COMMENT '区域ＩＤ',
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '标题',
  `price` decimal(10,2) DEFAULT '0.00' COMMENT '价格',
  `mode` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '方式',
  `area` decimal(10,2) DEFAULT '0.00' COMMENT '面积',
  `type` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '户型',
  `face` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '朝向',
  `adorn` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '装修',
  `floor` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '楼层',
  `tag` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '标签',
  `facility` text COLLATE utf8_bin COMMENT '设施',
  `content` text COLLATE utf8_bin COMMENT '详细',
  `address` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '地址',
  `position` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '定位',
  `addtime` int(11) DEFAULT '0' COMMENT '添加时间',
  `status` tinyint(1) DEFAULT '0' COMMENT '是否出租',
  `is_top` tinyint(1) DEFAULT '0' COMMENT '是否推荐',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='房源';

#
# Data for table "ec_house"
#

/*!40000 ALTER TABLE `ec_house` DISABLE KEYS */;
INSERT INTO `ec_house` VALUES (1,2,4,'金水区花园路御府三号 95平2室精装修低价转让',2800.00,'整租',95.00,'1居','朝南','简装修','低层/共18层','拎包入住#电家齐全','[\"\\u5e8a\",\"\\u5bbd\\u5e26\",\"\\u7535\\u89c6\",\"\\u6d17\\u8863\\u673a\",\"\\u70ed\\u6c34\\u5668\"]','金水区花园路御府三号 95平2市精装修低价转让','金水 - 花园路','113.682859,34.767351',1491400681,0,1),(2,2,2,'首座御园 新房出租 惠的价格 适合的搭配 2500元/月-整租',2500.00,'合租',85.00,'1居','朝南','中等装修','1楼','拎包入住#电家齐全','[\"\\u7535\\u89c6\",\"\\u6d17\\u8863\\u673a\",\"\\u6696\\u6c14\"]',' 爱屋吉屋置业顾问杨帅东向您郑重承诺：\r\n1.我们公布的房源真实有效\r\n2.我们公布的信息翔实可信\r\n3.我们公布的图片实地拍摄\r\n我为您不止提供的房源，更倾心为您提供尽我所能可以帮助您的一切\r\n有问题，随时找我，24为您服务！\r\n此房南北通透采光好，地理位置优越，交通便利，公交线路散布，配套设施齐全，\r\n如果此房您不满意， 请与我联系，我会根据您的需求，当前市场价位，;给您推荐合适的社区，合适的房子。\r\n顺祝您身体健康、工作顺利！！！\r\n与此种种，可谓优点多不可数，现正火爆预约看房中，有意向的您尽快联系我哦。','广和大街7号院（兴亦路北侧，东临东环路）','116.405437,39.901496',1491493854,0,0);
/*!40000 ALTER TABLE `ec_house` ENABLE KEYS */;

#
# Structure for table "ec_house_files"
#

DROP TABLE IF EXISTS `ec_house_files`;
CREATE TABLE `ec_house_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT '0' COMMENT '贴子ID',
  `filename` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '附件名称',
  `filepath` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '附件地址',
  `fileext` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '扩展名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC COMMENT='贴子附件';

#
# Data for table "ec_house_files"
#

/*!40000 ALTER TABLE `ec_house_files` DISABLE KEYS */;
INSERT INTO `ec_house_files` VALUES (1,1,'v1bkuyfvp6q7sfqzeceuqa_300-300_7-5.jpg','/public/uploads/house/20170405/b3c76a51de35ab4e096468d0bb391c53.jpg','jpg'),(2,1,'v1bl2lwkaardsfr4iw5agq_300-300_7-5.jpg','/public/uploads/house/20170405/621b317abd6cfdcf6c31d1b42693de2c.jpg','jpg'),(3,1,'v1bl2lwxqcrdsfqjy62a4q_300-300_7-5.jpg','/public/uploads/house/20170405/e1f8b8ab2851fe551c2efa9bd533fc08.jpg','jpg'),(4,2,'722x542 (1).jpg','/public/uploads/house/20170406/b993012592f4ebb99fb753d511bc946f.jpg','jpg'),(5,2,'722x542 (2).jpg','/public/uploads/house/20170406/00ea8831393e0efc5c21e177a4941f23.jpg','jpg'),(6,2,'722x542 (3).jpg','/public/uploads/house/20170406/a891b6369ab5639eafb26f802e402e52.jpg','jpg'),(7,2,'722x542 (4).jpg','/public/uploads/house/20170406/0b36bd8c37f6d23ac306f01ba588cc6b.jpg','jpg'),(8,2,'722x542 (5).jpg','/public/uploads/house/20170406/63d544598879c8e2fa2bb1452a942a08.jpg','jpg'),(9,2,'722x542.jpg','/public/uploads/house/20170406/176eea92dcbc860c860bb5c412e5530b.jpg','jpg');
/*!40000 ALTER TABLE `ec_house_files` ENABLE KEYS */;

#
# Structure for table "ec_job"
#

DROP TABLE IF EXISTS `ec_job`;
CREATE TABLE `ec_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '企业名称',
  `job_name` varchar(50) COLLATE utf8_bin DEFAULT NULL COMMENT '职位名称',
  `job_count` int(11) DEFAULT '0' COMMENT '招聘人数',
  `job_work` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '工作经验',
  `job_edu` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '学历要求',
  `job_wage` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '工资',
  `contact_tel` varchar(15) COLLATE utf8_bin DEFAULT NULL COMMENT '联系电话',
  `job_info` text COLLATE utf8_bin COMMENT '工作说明',
  `addtime` int(11) DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='云工作';

#
# Data for table "ec_job"
#

/*!40000 ALTER TABLE `ec_job` DISABLE KEYS */;
INSERT INTO `ec_job` VALUES (1,'阿里巴巴','php大牛',1,'不限','不限','面议','155555','很牛Ｂ的职位哦\r\n赶紧的1',1490360229),(2,'腾讯科技','普工/学徒工',10,'不限','不限','3000-5000','155555','招聘长期工,临时工,寒暑假工',1491231064),(3,'东莞市天明厨具设备工程有限公司','焊工',1,'不限','不限','8000','155555','1、根据焊接工艺指导书，选择合适的焊接工艺和原材料，进行产品零件、设备的焊接； \r\n2、进行焊条烘干、零件预热，焊渣清除，必要时进行焊后热处理，\r\n3、焊接完成后，检验夹渣、未焊透现象，及时进行补焊、重焊； \r\n4、定期对焊机、箱式炉、烘干炉进行维护保养，独立或配合其他人完成焊接设备的维修。\r\n任职资格：\r\n1、中专及以上学历，持有焊工证；\r\n2、二年以上焊工经验；\r\n3、熟悉各种设备的焊接材料及其相应的焊接要求，并使用熟练；\r\n4、有进取心、高度的事业心、责任感和良好的职业道德。',1491231130);
/*!40000 ALTER TABLE `ec_job` ENABLE KEYS */;

#
# Structure for table "ec_landlord"
#

DROP TABLE IF EXISTS `ec_landlord`;
CREATE TABLE `ec_landlord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_bin DEFAULT NULL COMMENT '用户名',
  `password` char(32) COLLATE utf8_bin DEFAULT NULL COMMENT '密码',
  `truename` varchar(10) COLLATE utf8_bin DEFAULT NULL COMMENT '真实姓名',
  `addtime` int(11) DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='房东';

#
# Data for table "ec_landlord"
#

/*!40000 ALTER TABLE `ec_landlord` DISABLE KEYS */;
INSERT INTO `ec_landlord` VALUES (2,'test','e10adc3949ba59abbe56e057f20f883e','张',1490358179);
/*!40000 ALTER TABLE `ec_landlord` ENABLE KEYS */;

#
# Structure for table "ec_news"
#

DROP TABLE IF EXISTS `ec_news`;
CREATE TABLE `ec_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '标题',
  `content` text COLLATE utf8_bin COMMENT '内容',
  `addtime` int(11) DEFAULT '0' COMMENT '添加时间',
  `is_top` tinyint(1) DEFAULT '0' COMMENT '是否推荐',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='新闻';

#
# Data for table "ec_news"
#

/*!40000 ALTER TABLE `ec_news` DISABLE KEYS */;
INSERT INTO `ec_news` VALUES (2,'194北京大兴亦庄附近50亩生物医药用地加3.3万平米新建办公楼厂房转让','194北京大兴亦庄附近50亩生物医药用地加3.3万平米新建办公楼厂房转让194北京大兴亦庄附近50亩生物医药用地加3.3万平米新建办公楼厂房转让194北京大兴亦庄附近50亩生物医药用地加3.3万平米新建办公楼厂房转让194北京大兴亦庄附近50亩生物医药用地加3.3万平米新建办公楼厂房转让<img src=\"/public/uploads/news/20170326/070d447b5011046b8758a12c94cfaa66.jpg\" alt=\"\" />',1490541061,1),(3,'山东日照海域再现赤潮 近岸海水被染红(图)','<div align=\"center\" style=\"border:0px;margin:0px;padding:0px;font-size:14px;color:#333333;font-family:宋体, simsun, sans-serif, Arial;background-color:#FFFFFF;\">\r\n\t<img src=\"http://photocdn.sohu.com/20170403/Img486252904.jpeg\" alt=\"4月2日，山东日照海域再次出现赤潮现象，部分海域近海海岸海水被染成锈红色。在日照大泉沟渔港码头沿岸海边，记者看到，赤潮在靠近礁石的区域呈条状分布，随潮水流动，宽度几米至几十米不等。在渔港内，渔船停泊的空隙处海水全部被染成锈红色。自3月10日开始，日照市灯塔风景区开始出现零星赤潮;，日照市海洋与渔业局技术人员经过取样和实验室分析，确定为小面积夜光藻赤潮。目前，日照市海洋与渔业局将密切关注赤潮发展动向，研究防止赤潮大面积发展的技术措施，做好赤潮应对工作。视觉中国\" width=\"584\" height=\"615\" align=\"middle\" border=\"1\" class=\"flag_bigP\" />\r\n\t<div class=\"conserve-photo conserve-photo-hover\" style=\"border:0px;margin:0px;padding:0px;background:url(&quot;\">\r\n\t\t<div class=\"comCount\" style=\"border:0px;margin:0px;padding:0px;font-size:11px;font-family:宋体;color:white;\">\r\n\t\t\t1\r\n\t\t</div>\r\n\t</div>\r\n</div>\r\n<div style=\"border:0px;margin:0px;padding:0px;font-size:14px;font-family:宋体, simsun, sans-serif, Arial;background-color:#FFFFFF;\">\r\n\t<p>\r\n\t\t　　4月2日，山东日照海域再次出现赤潮现象，部分海域近海海岸海水被染成锈红色。在日照大泉沟渔港码头沿岸海边，记者看到，赤潮在靠近礁石的区域呈条状分布，随潮水流动，宽度几米至几十米不等。在渔港内，渔船停泊的空隙处海水全部被染成锈红色。自3月10日开始，日照市灯塔风景区开始出现零星赤潮;，日照市海洋与渔业局技术人员经过取样和实验室分析，确定为小面积夜光藻赤潮。目前，日照市海洋与渔业局将密切关注赤潮发展动向，研究防止赤潮大面积发展的技术措施，做好赤潮应对工作。视觉中国\r\n\t</p>\r\n</div>\r\n<div align=\"center\" style=\"border:0px;margin:0px;padding:0px;font-size:14px;color:#333333;font-family:宋体, simsun, sans-serif, Arial;background-color:#FFFFFF;\">\r\n\t<img src=\"http://photocdn.sohu.com/20170403/Img486252905.jpeg\" alt=\"4月2日，山东日照海域再次出现赤潮现象，部分海域近海海岸海水被染成锈红色。在日照大泉沟渔港码头沿岸海边，记者看到，赤潮在靠近礁石的区域呈条状分布，随潮水流动，宽度几米至几十米不等。在渔港内，渔船停泊的空隙处海水全部被染成锈红色。自3月10日开始，日照市灯塔风景区开始出现零星赤潮;，日照市海洋与渔业局技术人员经过取样和实验室分析，确定为小面积夜光藻赤潮。目前，日照市海洋与渔业局将密切关注赤潮发展动向，研究防止赤潮大面积发展的技术措施，做好赤潮应对工作。视觉中国\" width=\"516\" height=\"615\" align=\"middle\" border=\"1\" class=\"flag_bigP\" />\r\n\t<div class=\"conserve-photo\" style=\"border:0px;margin:0px;padding:0px;background:url(&quot;\">\r\n\t\t<div class=\"comCount\" style=\"border:0px;margin:0px;padding:0px;font-size:11px;font-family:宋体;color:white;\">\r\n\t\t\t1\r\n\t\t</div>\r\n\t</div>\r\n</div>\r\n<div style=\"border:0px;margin:0px;padding:0px;font-size:14px;font-family:宋体, simsun, sans-serif, Arial;background-color:#FFFFFF;\">\r\n</div>\r\n<div align=\"center\" style=\"border:0px;margin:0px;padding:0px;font-size:14px;color:#333333;font-family:宋体, simsun, sans-serif, Arial;background-color:#FFFFFF;\">\r\n\t<img src=\"http://photocdn.sohu.com/20170403/Img486252906.jpeg\" alt=\"4月2日，山东日照海域再次出现赤潮现象，部分海域近海海岸海水被染成锈红色。在日照大泉沟渔港码头沿岸海边，记者看到，赤潮在靠近礁石的区域呈条状分布，随潮水流动，宽度几米至几十米不等。在渔港内，渔船停泊的空隙处海水全部被染成锈红色。自3月10日开始，日照市灯塔风景区开始出现零星赤潮;，日照市海洋与渔业局技术人员经过取样和实验室分析，确定为小面积夜光藻赤潮。目前，日照市海洋与渔业局将密切关注赤潮发展动向，研究防止赤潮大面积发展的技术措施，做好赤潮应对工作。视觉中国\" width=\"558\" height=\"619\" align=\"middle\" border=\"1\" class=\"flag_bigP\" />\r\n\t<div class=\"conserve-photo\" style=\"border:0px;margin:0px;padding:0px;background:url(&quot;\">\r\n\t\t<div class=\"comCount\" style=\"border:0px;margin:0px;padding:0px;font-size:11px;font-family:宋体;color:white;\">\r\n\t\t\t1\r\n\t\t</div>\r\n\t</div>\r\n</div>\r\n<div style=\"border:0px;margin:0px;padding:0px;font-size:14px;font-family:宋体, simsun, sans-serif, Arial;background-color:#FFFFFF;\">\r\n</div>\r\n<div align=\"center\" style=\"border:0px;margin:0px;padding:0px;font-size:14px;color:#333333;font-family:宋体, simsun, sans-serif, Arial;background-color:#FFFFFF;\">\r\n\t<img src=\"http://photocdn.sohu.com/20170403/Img486252907.jpeg\" alt=\"4月2日，山东日照海域再次出现赤潮现象，部分海域近海海岸海水被染成锈红色。在日照大泉沟渔港码头沿岸海边，记者看到，赤潮在靠近礁石的区域呈条状分布，随潮水流动，宽度几米至几十米不等。在渔港内，渔船停泊的空隙处海水全部被染成锈红色。自3月10日开始，日照市灯塔风景区开始出现零星赤潮;，日照市海洋与渔业局技术人员经过取样和实验室分析，确定为小面积夜光藻赤潮。目前，日照市海洋与渔业局将密切关注赤潮发展动向，研究防止赤潮大面积发展的技术措施，做好赤潮应对工作。视觉中国\" width=\"564\" height=\"618\" align=\"middle\" border=\"1\" class=\"flag_bigP\" />\r\n</div>',1491283878,1);
/*!40000 ALTER TABLE `ec_news` ENABLE KEYS */;

#
# Structure for table "ec_region"
#

DROP TABLE IF EXISTS `ec_region`;
CREATE TABLE `ec_region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '地区名称',
  `pid` int(11) DEFAULT '0' COMMENT '上级ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='地区管理';

#
# Data for table "ec_region"
#

/*!40000 ALTER TABLE `ec_region` DISABLE KEYS */;
INSERT INTO `ec_region` VALUES (1,'福田1',0),(2,'流塘阳光',1),(3,'罗湖',0),(4,'黄木冈西区',1);
/*!40000 ALTER TABLE `ec_region` ENABLE KEYS */;

#
# Structure for table "ec_shop"
#

DROP TABLE IF EXISTS `ec_shop`;
CREATE TABLE `ec_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(30) COLLATE utf8_bin DEFAULT NULL COMMENT '商家名称',
  `shop_pic` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '商家图片',
  `shop_contact` varchar(10) COLLATE utf8_bin DEFAULT NULL COMMENT '联系人',
  `shop_phone` varchar(15) COLLATE utf8_bin DEFAULT NULL COMMENT '商家电话',
  `addtime` int(11) DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='楼下商家';

#
# Data for table "ec_shop"
#

/*!40000 ALTER TABLE `ec_shop` DISABLE KEYS */;
INSERT INTO `ec_shop` VALUES (1,'宜家超市','/public/uploads/shop/20170403/e36fa64525c48fbb16a80c39706d54c4.jpg','杨先生','15517059595',1491221600),(2,'王二小理发','/public/uploads/shop/20170403/4716b875cb0d3eafd24fffc9f048651f.jpg','小王','52555555',1491221631),(3,'小勃形象','/public/uploads/shop/20170403/b603b5fbc08805bf3c5bf389056b6baf.jpg','小勃','010-88874849',1491229143),(4,'和合玉器','/public/uploads/shop/20170403/40e69de42f5d5a425ef5562a7b23e046.jpg','和合','010-88864919',1491229195),(5,'Folli Follie','/public/uploads/shop/20170403/0f1fe3e4432bf0f3505f914856e42294.jpg','先生','010-88871677',1491229249),(6,'圣心SPA会所（世纪城店）','/public/uploads/shop/20170403/8a82d3d8ed2eb7369c2ad0a24f649cd0.jpg','圣心','010-88866966',1491229277),(7,'自然美','/public/uploads/shop/20170403/0126971381233294caf0494bd85ab33b.jpg','自然美','010-88596364',1491229303),(8,'赛斯特sister(金源新燕莎店)','/public/uploads/shop/20170403/cbc3c42ea9cb5f0c249d142727c9dac6.jpg','赛斯特','010-88875486',1491229329),(9,'始祖鸟ARC\'TERYX(金源店)','/public/uploads/shop/20170403/606556d6483b631021e51c0ca45e55df.jpg','始祖','010-88865847',1491229354),(10,'指上花','/public/uploads/shop/20170403/4179c8976aa65e8106aeda14eb6e3f5b.jpg','指上花','1111111',1491229411),(11,'名媛汇手足护理沙龙 NAIL','/public/uploads/shop/20170403/d36193f809b9dec311c0e0349e133899.jpg','名媛','010-88875602',1491229432),(12,'FINITY(菲妮迪)','/public/uploads/shop/20170403/c2d5fceea593a350476496d0672c9f75.jpg','FINITY(菲妮迪','010-88894297',1491229457);
/*!40000 ALTER TABLE `ec_shop` ENABLE KEYS */;

#
# Structure for table "ec_slide"
#

DROP TABLE IF EXISTS `ec_slide`;
CREATE TABLE `ec_slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '幻灯名称',
  `image_url` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '幻灯地址',
  `position` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '位置',
  `link` varchar(255) CHARACTER SET utf8 DEFAULT '0' COMMENT '链接',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC COMMENT='幻灯';

#
# Data for table "ec_slide"
#

/*!40000 ALTER TABLE `ec_slide` DISABLE KEYS */;
INSERT INTO `ec_slide` VALUES (1,'1','/public/uploads/slide/20170404/6b76cbf62e4d9e4852e2eb98d9552f3d.jpg','top','http://192.168.0.105/index.php/link/2'),(2,'2222','/public/uploads/slide/20170404/213185f35fe7654232f9ab87d4f4efe3.jpg','center','http://192.168.0.105/index.php/link/2'),(3,'22','/public/uploads/slide/20170404/4eac27cbf3970dcfb208524b8f89d1c0.jpg','top','');
/*!40000 ALTER TABLE `ec_slide` ENABLE KEYS */;

#
# Structure for table "ec_user"
#

DROP TABLE IF EXISTS `ec_user`;
CREATE TABLE `ec_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(15) COLLATE utf8_bin DEFAULT NULL COMMENT '手机号',
  `password` char(32) COLLATE utf8_bin DEFAULT NULL COMMENT '密码',
  `nickname` varchar(15) COLLATE utf8_bin DEFAULT NULL COMMENT '昵称',
  `sex` enum('男','女','未知') COLLATE utf8_bin DEFAULT '未知' COMMENT '性别',
  `age` int(11) DEFAULT '0' COMMENT '年龄',
  `head_pic` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '头像',
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '邮箱',
  `qq` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT 'QQ',
  `wechat` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '微信',
  `addtime` int(11) DEFAULT '0' COMMENT '注册时间',
  `status` tinyint(1) DEFAULT '0' COMMENT '状态 1正常 0锁定',
  `token` char(32) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='用户表';

#
# Data for table "ec_user"
#

/*!40000 ALTER TABLE `ec_user` DISABLE KEYS */;
INSERT INTO `ec_user` VALUES (2,'15517059591','698d51a19d8a121ce581499d7b701668','风吹裤档PP凉','男',20,'/public/uploads/head/20170404/f999728a8fa5b68f4cb0a30aa9dda6ea.png',NULL,NULL,NULL,1491220169,1,'2df70a54c0a8cf83c98f8ee668ec0d23'),(3,'15517059595','e10adc3949ba59abbe56e057f20f883e','名字难起','男',21,'/public/uploads/head/20170406/6244200fcb61f74dabef80c3ec029a44.png',NULL,NULL,NULL,1491296727,1,'b5d70b423915fe0589138ed289885bc5');
/*!40000 ALTER TABLE `ec_user` ENABLE KEYS */;
