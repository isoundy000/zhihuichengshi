# Host: localhost  (Version: 5.5.53)
# Date: 2017-03-27 00:54:53
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "ec_admin"
#

CREATE TABLE `ec_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_bin DEFAULT NULL COMMENT '用户名',
  `password` char(32) COLLATE utf8_bin DEFAULT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC COMMENT='管理员';

#
# Data for table "ec_admin"
#

INSERT INTO `ec_admin` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3');

#
# Structure for table "ec_classinfo"
#

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='二手信息';

#
# Data for table "ec_classinfo"
#


#
# Structure for table "ec_classinfo_cat"
#

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

INSERT INTO `ec_classinfo_cat` VALUES (1,'家居家电','家居家电',0),(2,'数码产品','数码产品',0),(3,'办公用品','办公用品',0),(4,'汽车周边','汽车周边',0);

#
# Structure for table "ec_classinfo_files"
#

CREATE TABLE `ec_classinfo_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) DEFAULT '0' COMMENT '信息ID',
  `filename` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '附件名称',
  `filepath` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '附件地址',
  `fileext` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '扩展名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=DYNAMIC COMMENT='信息附件';

#
# Data for table "ec_classinfo_files"
#


#
# Structure for table "ec_forum"
#

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

INSERT INTO `ec_forum` VALUES (1,'情感交流','一起交流情感的所在',1,0),(2,'二手交易','在这里可以发布二手交易信息',1,1);

#
# Structure for table "ec_forum_files"
#

CREATE TABLE `ec_forum_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT '0' COMMENT '贴子ID',
  `filename` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '附件名称',
  `filepath` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '附件地址',
  `fileext` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '扩展名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='贴子附件';

#
# Data for table "ec_forum_files"
#

INSERT INTO `ec_forum_files` VALUES (5,2,'512X512.png','/public/uploads/post/20170326/ad6b5e25eb18bc6e7b091ee3d6e73ba9.png','png'),(6,2,'logo.png','/public/uploads/post/20170326/c3917022143d86d80b2ad0cdd0405c29.png','png'),(7,3,'demo-code.png','/public/uploads/post/20170326/ecdddf191dd3dfd09fa828aa6ce05431.png','png'),(8,3,'254a35963e1db5420aefb42f89d93cd2.png','/public/uploads/post/20170326/dafd6bf5f1631ab4869fde30e4d52ce7.png','png'),(9,4,'demo-code.png','/public/uploads/post/20170326/9c725906fca0fd61847a999967af5c1f.png','png'),(10,4,'512X512.png','/public/uploads/post/20170326/15514fad6fa55968b7dc3738f7c37c9f.png','png');

#
# Structure for table "ec_forum_posts"
#

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='贴子表';

#
# Data for table "ec_forum_posts"
#

INSERT INTO `ec_forum_posts` VALUES (2,1,0,'北京市房山区300亩荒山荒地+建设用地','北京市房山区300亩荒山荒地+建设用地北京市房山区300亩荒山荒地+建设用地北京市房山区300亩荒山荒地+建设用地',1490512576,1490512674,0),(3,1,0,'194北京大兴亦庄附近50亩生物医药用地加3.3万平米新建办公楼厂房转让','194北京大兴亦庄附近50亩生物医药用地加3.3万平米新建办公楼厂房转让194北京大兴亦庄附近50亩生物医药用地加3.3万平米新建办公楼厂房转让194北京大兴亦庄附近50亩生物医药用地加3.3万平米新建办公楼厂房转让',1490512717,1490512717,0),(4,1,0,'249北京大兴南六环104国道附近10亩地出租','249北京大兴南六环104国道附近10亩地出租249北京大兴南六环104国道附近10亩地出租249北京大兴南六环104国道附近10亩地出租',1490512845,1490512845,0);

#
# Structure for table "ec_forum_reply"
#

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='贴子回复';

#
# Data for table "ec_forum_reply"
#


#
# Structure for table "ec_job"
#

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='云工作';

#
# Data for table "ec_job"
#

INSERT INTO `ec_job` VALUES (1,'阿里巴巴','php大牛',1,'不限','不限','面议','155555','很牛Ｂ的职位哦\r\n赶紧的1',1490360229);

#
# Structure for table "ec_landlord"
#

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

INSERT INTO `ec_landlord` VALUES (2,'test','e10adc3949ba59abbe56e057f20f883e','张',1490358179);

#
# Structure for table "ec_news"
#

CREATE TABLE `ec_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '标题',
  `content` text COLLATE utf8_bin COMMENT '内容',
  `addtime` int(11) DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='新闻';

#
# Data for table "ec_news"
#

INSERT INTO `ec_news` VALUES (2,'194北京大兴亦庄附近50亩生物医药用地加3.3万平米新建办公楼厂房转让','194北京大兴亦庄附近50亩生物医药用地加3.3万平米新建办公楼厂房转让194北京大兴亦庄附近50亩生物医药用地加3.3万平米新建办公楼厂房转让194北京大兴亦庄附近50亩生物医药用地加3.3万平米新建办公楼厂房转让194北京大兴亦庄附近50亩生物医药用地加3.3万平米新建办公楼厂房转让<img src=\"/public/uploads/news/20170326/070d447b5011046b8758a12c94cfaa66.jpg\" alt=\"\" />',1490541061);

#
# Structure for table "ec_region"
#

CREATE TABLE `ec_region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(20) COLLATE utf8_bin DEFAULT NULL COMMENT '地区名称',
  `pid` int(11) DEFAULT '0' COMMENT '上级ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='地区管理';

#
# Data for table "ec_region"
#

INSERT INTO `ec_region` VALUES (1,'福田1',0),(2,'流塘阳光',1),(3,'罗湖',0),(4,'黄木冈西区',1);

#
# Structure for table "ec_shop"
#

CREATE TABLE `ec_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(30) COLLATE utf8_bin DEFAULT NULL COMMENT '商家名称',
  `shop_pic` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT '商家图片',
  `shop_contact` varchar(10) COLLATE utf8_bin DEFAULT NULL COMMENT '联系人',
  `shop_phone` varchar(15) COLLATE utf8_bin DEFAULT NULL COMMENT '商家电话',
  `addtime` int(11) DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='楼下商家';

#
# Data for table "ec_shop"
#


#
# Structure for table "ec_user"
#

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='用户表';

#
# Data for table "ec_user"
#

INSERT INTO `ec_user` VALUES (1,'15517059595',NULL,'ddd','未知',0,NULL,NULL,NULL,NULL,0,1);
