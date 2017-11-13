/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : db_ticket

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-06-04 20:17:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for date_monry
-- ----------------------------
DROP TABLE IF EXISTS `date_monry`;
CREATE TABLE `date_monry` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `p2_Order` int(25) DEFAULT NULL,
  `p3_Amt` int(15) DEFAULT NULL,
  `p5_Pid` varchar(20) DEFAULT NULL,
  `now` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10001 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of date_monry
-- ----------------------------
INSERT INTO `date_monry` VALUES ('10000', 'wll', '201901020', '155', '火车票', '1');

-- ----------------------------
-- Table structure for guestlist
-- ----------------------------
DROP TABLE IF EXISTS `guestlist`;
CREATE TABLE `guestlist` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `recontent` varchar(255) DEFAULT NULL,
  `replay` varchar(255) DEFAULT NULL,
  `addtime` varchar(15) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of guestlist
-- ----------------------------
INSERT INTO `guestlist` VALUES ('8', '火车票还不错', '三生三世十里桃花三生三世十里桃花', '挺好看啊', '1', null, '马云');

-- ----------------------------
-- Table structure for tb_admin
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin` (
  `id` int(4) NOT NULL DEFAULT '0',
  `name` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `pwd` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of tb_admin
-- ----------------------------
INSERT INTO `tb_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `tb_admin` VALUES ('2', 'wll', '123456');
INSERT INTO `tb_admin` VALUES ('3', 'wds', '123456');
INSERT INTO `tb_admin` VALUES ('5', 'admin', 'admin');

-- ----------------------------
-- Table structure for tb_dingdan
-- ----------------------------
DROP TABLE IF EXISTS `tb_dingdan`;
CREATE TABLE `tb_dingdan` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `dingdanhao` varchar(125) CHARACTER SET utf8 DEFAULT NULL,
  `spc` varchar(125) CHARACTER SET utf8 DEFAULT NULL,
  `slc` varchar(125) CHARACTER SET utf8 DEFAULT NULL,
  `shouhuoren` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `sex` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `dizhi` varchar(125) CHARACTER SET utf8 DEFAULT NULL,
  `youbian` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `tel` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `shff` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `zfff` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `leaveword` mediumtext CHARACTER SET utf8,
  `time` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `xiadanren` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `zt` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `total` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of tb_dingdan
-- ----------------------------
INSERT INTO `tb_dingdan` VALUES ('105', '2012042905132946', '225@', '1@', '陈小艺', '男', '北京市', '100080', '13800138000', 'designem@163.com', '普通平邮', '建设银行汇款', '货到汇款', '2012-04-29 05:13:29', '阳光', '已收款&nbsp;', '4600');

-- ----------------------------
-- Table structure for tb_gonggao
-- ----------------------------
DROP TABLE IF EXISTS `tb_gonggao`;
CREATE TABLE `tb_gonggao` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `content` text CHARACTER SET utf8,
  `time` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of tb_gonggao
-- ----------------------------
INSERT INTO `tb_gonggao` VALUES ('30', '北京-上海', '尊敬的乘客，请于指定日期于三号售票口取票或自动取票机取票', '2017-06-6');
INSERT INTO `tb_gonggao` VALUES ('31', '南昌-九江', '尊敬的乘客，请于指定日期于三号售票口取票或自动取票机取票', '2017-06-7');
INSERT INTO `tb_gonggao` VALUES ('32', '合肥-洛阳', '尊敬的乘客，请于指定日期于三号售票口取票或自动取票机取票', '2017-06-8');
INSERT INTO `tb_gonggao` VALUES ('28', '线上支持退票', '现已开通线上退票功能，退款额将在24小时内退回指定账户', '2017-06-9');
INSERT INTO `tb_gonggao` VALUES ('29', '用户登录注册问题已经得到调整', '我站目前已经解决用户注册登录时出现不能识别的问题，线上服务请放心使用！！', '2017-06-10');

-- ----------------------------
-- Table structure for tb_leaveword
-- ----------------------------
DROP TABLE IF EXISTS `tb_leaveword`;
CREATE TABLE `tb_leaveword` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `userid` int(4) DEFAULT NULL,
  `title` varchar(67) CHARACTER SET utf8 DEFAULT NULL,
  `content` text CHARACTER SET utf8,
  `time` varchar(17) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of tb_leaveword
-- ----------------------------
INSERT INTO `tb_leaveword` VALUES ('16', '50', '', '', '2017-04-26');
INSERT INTO `tb_leaveword` VALUES ('17', '50', '', '', '2017-04-26');
INSERT INTO `tb_leaveword` VALUES ('18', '50', '', '', '2017-04-26');

-- ----------------------------
-- Table structure for tb_piao
-- ----------------------------
DROP TABLE IF EXISTS `tb_piao`;
CREATE TABLE `tb_piao` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `start` varchar(50) CHARACTER SET utf8 NOT NULL,
  `end` varchar(50) CHARACTER SET utf8 NOT NULL,
  `startdate` datetime NOT NULL,
  `backtime` datetime NOT NULL,
  `sitenum` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ticket_content` mediumtext CHARACTER SET utf8 NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=gb2312 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tb_piao
-- ----------------------------
INSERT INTO `tb_piao` VALUES ('1', '北京', '上海', '2017-04-18 09:00:00', '2017-04-18 15:30:00', '1', '请于指定日期登车', '59');

-- ----------------------------
-- Table structure for tb_piaoyuan
-- ----------------------------
DROP TABLE IF EXISTS `tb_piaoyuan`;
CREATE TABLE `tb_piaoyuan` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `mingcheng` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `type` mediumtext CHARACTER SET utf8,
  `starttime` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `dengji` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `end` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `tupian` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `typeid` int(4) DEFAULT NULL,
  `price` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `studentprice` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `qidian` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `tuijian` int(4) DEFAULT NULL,
  `shuliang` int(4) DEFAULT NULL,
  `cishu` int(4) DEFAULT NULL,
  `tishi` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `haoshi` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `tejia` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=227 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of tb_piaoyuan
-- ----------------------------
INSERT INTO `tb_piaoyuan` VALUES ('224', '北京-上海', '软卧', '2017-6-1', '高铁', '上海', 'image/piao.jpg', '29', '178', '160', '北京', '1', '39', '1', '尊敬的乘客，请于指定日期于三号售票口取票或自动取票机取票', '8h', '1');
INSERT INTO `tb_piaoyuan` VALUES ('225', '成都-南京', '硬座', '2017-5-1', '动车', '南京', 'image/piao.jpg', '28', '123', '113', '成都', '0', '160', '5', '尊敬的乘客，请于指定日期于三号售票口取票或自动取票机取票', '5h', '1');
INSERT INTO `tb_piaoyuan` VALUES ('226', '九江-天津', '软卧', '2017-4-26', '火车', '天津', 'image/piao.jpg', '28', '155', '111', '九江', '1', '111', '0', '尊敬的乘客，请于指定日期于三号售票口取票或自动取票机取票', '19h', '1');
INSERT INTO `tb_piaoyuan` VALUES ('223', '九江-乌鲁木齐', '站票', '2017-6-7', '火车', '乌鲁木齐', 'image/piao.jpg', '30', '299', '260', '九江', '1', '55', '3', '尊敬的乘客，请于指定日期于三号售票口取票或自动取票机取票', '16h', '1');

-- ----------------------------
-- Table structure for tb_pingjia
-- ----------------------------
DROP TABLE IF EXISTS `tb_pingjia`;
CREATE TABLE `tb_pingjia` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `userid` int(4) DEFAULT NULL,
  `spid` int(4) DEFAULT NULL,
  `title` varchar(67) CHARACTER SET utf8 DEFAULT NULL,
  `content` text CHARACTER SET utf8,
  `time` varchar(17) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of tb_pingjia
-- ----------------------------
INSERT INTO `tb_pingjia` VALUES ('21', '48', '223', '真的好快', '666666666666', '2017-04-13');

-- ----------------------------
-- Table structure for tb_type
-- ----------------------------
DROP TABLE IF EXISTS `tb_type`;
CREATE TABLE `tb_type` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `typename` varchar(17) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of tb_type
-- ----------------------------
INSERT INTO `tb_type` VALUES ('28', '软卧');
INSERT INTO `tb_type` VALUES ('29', '硬卧');
INSERT INTO `tb_type` VALUES ('30', '硬座');
INSERT INTO `tb_type` VALUES ('31', '站票');
INSERT INTO `tb_type` VALUES ('34', '头文字');
INSERT INTO `tb_type` VALUES ('36', '头文字D');

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `userpwd` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `dongjie` int(4) DEFAULT NULL,
  `email` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `sfzh` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `tel` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `qq` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `tishi` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `huida` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `dizhi` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `youbian` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `regtime` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `truename` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `pwd1` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('45', 'newuser', 'e10adc3949ba59abbe56e057f20f883e', '0', '2568357300@qq.com', '333333333333333333', '13007292303', '1192235168', '您的生日', '771011', '景德镇', '333000', '2011-07-4', '翁大大', '123456');
INSERT INTO `tb_user` VALUES ('47', 'wll', '123456', '0', '2568357300@qq.com', '333333333333333333', '13007292303', '1192235168', null, null, '景德镇', '333000', null, '翁大大', null);
