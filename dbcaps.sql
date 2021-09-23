/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dbcaps

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-09-14 11:15:08
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `caps`
-- ----------------------------
DROP TABLE IF EXISTS `caps`;
CREATE TABLE `caps` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT '',
  `firstname` varchar(255) DEFAULT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `userlevel` varchar(255) DEFAULT '',
  `location` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of caps
-- ----------------------------
INSERT INTO `caps` VALUES ('1', 'Jorge', 'jojo', 'Ojascastro', 'Jorge', 'Valdez', 'Regional GAD Coordinator', 'Region 1', 'ACTIVE');
INSERT INTO `caps` VALUES ('2', 'Leo', 'ole', 'Lana', 'Leo', 'Andrew', 'Division GAD Coordinator', 'Pangasinan I', 'ACTIVE');
INSERT INTO `caps` VALUES ('3', 'admin', 'admin', '', '', '', 'Admin', null, 'ACTIVE');
INSERT INTO `caps` VALUES ('70', 'Rowel', 'roro', 'Dagooc', 'Rowel', 'Row', 'Division GAD Coordinator', 'San Fernando City', 'ACTIVE');
INSERT INTO `caps` VALUES ('72', 'sda', 'adf', 'asdf', 'asdf', 'asdf', 'Division GAD Coordinator', 'La Union', 'ACTIVE');
INSERT INTO `caps` VALUES ('73', 'gtfert', 'wert', 'wertwe', 'retw', 'wretwe', 'Regional GAD Coordinator', 'Region 1', 'ACTIVE');
INSERT INTO `caps` VALUES ('74', 'sfds', 'asdf', 'asdf', 'gfh', 'fghf', 'Division GAD Coordinator', 'Ilocos Norte', 'ACTIVE');
INSERT INTO `caps` VALUES ('75', 'sdfas', 'dfaf', 'dfasf', 'dfas', 'dfa', 'Division GAD Coordinator', 'Ilocos Sur', 'ACTIVE');
INSERT INTO `caps` VALUES ('76', 'safsadf', 'asdfa', 'adfadsf', 'asdff', 'asdfdsf', 'Division GAD Coordinator', 'Vigan City', 'ACTIVE');
INSERT INTO `caps` VALUES ('79', 'kiki', 'fdsd', 'dsfasf', 'dsfas', 'asdf', 'Division GAD Coordinator', 'Dagupan City', 'ACTIVE');

-- ----------------------------
-- Table structure for `division`
-- ----------------------------
DROP TABLE IF EXISTS `division`;
CREATE TABLE `division` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `division` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of division
-- ----------------------------
INSERT INTO `division` VALUES ('1', 'Ilocos Norte');
INSERT INTO `division` VALUES ('2', 'Ilocos Sur');
INSERT INTO `division` VALUES ('3', 'La Union');
INSERT INTO `division` VALUES ('4', 'Pangasinan I');
INSERT INTO `division` VALUES ('5', 'Pangasinan II');
INSERT INTO `division` VALUES ('6', 'Alaminos City');
INSERT INTO `division` VALUES ('7', 'Batac City');
INSERT INTO `division` VALUES ('8', 'Candon City');
INSERT INTO `division` VALUES ('9', 'Dagupan City');
INSERT INTO `division` VALUES ('10', 'Laoag City');
INSERT INTO `division` VALUES ('11', 'San Carlos City');
INSERT INTO `division` VALUES ('12', 'San Fernando City');
INSERT INTO `division` VALUES ('13', 'Urdaneta City');
INSERT INTO `division` VALUES ('14', 'Vigan City');
INSERT INTO `division` VALUES ('15', 'Adayo unay');
INSERT INTO `division` VALUES ('16', 'Santolian');

-- ----------------------------
-- Table structure for `mandate`
-- ----------------------------
DROP TABLE IF EXISTS `mandate`;
CREATE TABLE `mandate` (
  `depedno` int(250) NOT NULL,
  `depedcontent` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`depedno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of mandate
-- ----------------------------
INSERT INTO `mandate` VALUES ('1', 'GAD Issue 3');
INSERT INTO `mandate` VALUES ('45647', 'sdagsvasdf');
INSERT INTO `mandate` VALUES ('45754', 'GAD Issue 2');

-- ----------------------------
-- Table structure for `report`
-- ----------------------------
DROP TABLE IF EXISTS `report`;
CREATE TABLE `report` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `division` varchar(500) DEFAULT '',
  `filename` varchar(500) DEFAULT '',
  `date_submitted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of report
-- ----------------------------
INSERT INTO `report` VALUES ('43', 'San Carlos City', 'Final Quiz 1 Online-Registration-for-College-Admission (Diagrams).docx', '2021-09-09 05:53:00');
INSERT INTO `report` VALUES ('44', 'Urdaneta City', 'Contribution_Online_Registration_System.docx', '2021-09-09 05:53:00');
INSERT INTO `report` VALUES ('45', 'San Fernando City', 'Hardware-Requirements.docx', '2021-09-09 05:54:00');
INSERT INTO `report` VALUES ('46', 'San Fernando City', 'Ojascastro_Act3.docx', '2021-09-09 05:54:00');

-- ----------------------------
-- Table structure for `template`
-- ----------------------------
DROP TABLE IF EXISTS `template`;
CREATE TABLE `template` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `filename` varchar(500) CHARACTER SET cp1256 DEFAULT '',
  `date_temp` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of template
-- ----------------------------
INSERT INTO `template` VALUES ('8', '2020-Consolidated-SDOs.xlsx', '2021-09-10 10:36:00');
INSERT INTO `template` VALUES ('9', '2020-GAR-AR-Regional-Office-Proper-and-Consolidated-SDOs.xlsx', '2021-09-10 10:36:00');
