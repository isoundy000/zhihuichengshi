# Host: localhost  (Version: 5.5.40)
# Date: 2017-03-24 20:59:11
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='云工作';

#
# Data for table "ec_job"
#

/*!40000 ALTER TABLE `ec_job` DISABLE KEYS */;
INSERT INTO `ec_job` VALUES (1,'阿里巴巴','php大牛',1,'不限','不限','面议','155555','很牛Ｂ的职位哦\r\n赶紧的1',1490360229);
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='房东';

#
# Data for table "ec_landlord"
#

/*!40000 ALTER TABLE `ec_landlord` DISABLE KEYS */;
INSERT INTO `ec_landlord` VALUES (2,'test','e10adc3949ba59abbe56e057f20f883e','张',1490358179);
/*!40000 ALTER TABLE `ec_landlord` ENABLE KEYS */;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='楼下商家';

#
# Data for table "ec_shop"
#

/*!40000 ALTER TABLE `ec_shop` DISABLE KEYS */;
/*!40000 ALTER TABLE `ec_shop` ENABLE KEYS */;
