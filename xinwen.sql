/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : xinwen

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-10-06 22:31:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for pms_news
-- ----------------------------
DROP TABLE IF EXISTS `pms_news`;
CREATE TABLE `pms_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_en` varchar(255) DEFAULT NULL,
  `title_cn` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `content_en` mediumtext,
  `content_cn` mediumtext,
  `categoryid` int(11) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `read_status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pms_news
-- ----------------------------
INSERT INTO `pms_news` VALUES ('2', 'hello', '隐藏的逗比！科比机智的采访问答', '左浩然', '2016-10-02 04:41:47', '', '<p>跳过大学 &nbsp;直接进入nba</p><p><br/></p>', null, '', null);
INSERT INTO `pms_news` VALUES ('3', 'hello', '日常生活', '左浩然', '2016-10-02 04:42:34', null, '<p>hellohello</p>', null, '', null);
INSERT INTO `pms_news` VALUES ('4', '11', '左浩然', '左浩然', '2016-10-02 06:26:38', null, null, null, '', null);
INSERT INTO `pms_news` VALUES ('5', 'qq', '左浩然', '左浩然', '2016-10-05 04:54:23', null, '<p>紧急通知？？？？？？</p><p><br/></p>', null, '', '已读取');
INSERT INTO `pms_news` VALUES ('6', 'mcd', '吃没收到吗', '才开始', '2016-10-05 05:08:49', null, '<p>&nbsp;都是</p>', null, '', '已读取');
INSERT INTO `pms_news` VALUES ('7', 'hello', '左浩然', '', '2016-10-06 15:05:16', null, null, null, '', '已读取');

-- ----------------------------
-- Table structure for pms_user
-- ----------------------------
DROP TABLE IF EXISTS `pms_user`;
CREATE TABLE `pms_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pms_user
-- ----------------------------
INSERT INTO `pms_user` VALUES ('5', 'admin', '123456', '1');
