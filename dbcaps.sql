/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dbcaps

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-11-14 17:03:38
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `attendees`
-- ----------------------------
DROP TABLE IF EXISTS `attendees`;
CREATE TABLE `attendees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `position` varchar(500) DEFAULT NULL,
  `gender` varchar(500) DEFAULT NULL,
  `division` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of attendees
-- ----------------------------
INSERT INTO `attendees` VALUES ('17', 'Kobe', 'Principal', 'male', 'Ilocos Norte');
INSERT INTO `attendees` VALUES ('18', 'Vannessa', 'Master Teacher II', 'female', 'Ilocos Norte');
INSERT INTO `attendees` VALUES ('19', 'Leobron', 'Master Teacher I', 'male', 'Ilocos Norte');
INSERT INTO `attendees` VALUES ('20', 'Jorge', 'Principal', 'Male', 'Ilocos Norte');
INSERT INTO `attendees` VALUES ('21', 'Rowel', 'Master Teacher II', 'Male', 'Ilocos Norte');
INSERT INTO `attendees` VALUES ('22', 'Maricris', 'Teacher I', 'Female', 'Ilocos Norte');
INSERT INTO `attendees` VALUES ('23', 'Mark', 'Teacher I', 'Male', 'Ilocos Norte');
INSERT INTO `attendees` VALUES ('24', 'Leona', 'Administrative Assistant I', 'Female', 'Ilocos Norte');
INSERT INTO `attendees` VALUES ('25', 'Ako', 'Principal', 'male', 'San Fernando City');
INSERT INTO `attendees` VALUES ('26', 'Ikaw', 'Master Teacher II', 'female', 'San Fernando City');
INSERT INTO `attendees` VALUES ('27', 'Ako ulit', 'Master Teacher I', 'male', 'San Fernando City');

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
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of caps
-- ----------------------------
INSERT INTO `caps` VALUES ('1', 'Jorge', 'jojo', 'Ojascastro', 'Jorge', 'Valdez', 'Regional GAD Coordinator', 'Region 1', 'ACTIVE');
INSERT INTO `caps` VALUES ('3', 'admin', 'admin', '', '', '', 'Admin', null, 'ACTIVE');
INSERT INTO `caps` VALUES ('70', 'Rowel', 'roro', 'Dagooc', 'Rowel', 'Row', 'Division GAD Coordinator', 'San Fernando City', 'ACTIVE');
INSERT INTO `caps` VALUES ('72', 'sdaa', 'adf', 'asdf', 'asdf', 'asdf', 'Division GAD Coordinator', 'Pangasinan I', 'ACTIVE');
INSERT INTO `caps` VALUES ('73', 'gtferty', 'wert', 'wertwe', 'retw', 'wretwe', 'Regional GAD Coordinator', 'Region 1', 'ACTIVE');
INSERT INTO `caps` VALUES ('74', 'sfds', 'asdf', 'asdf', 'gfh', 'fghf', 'Division GAD Coordinator', 'Dagupan City', 'ACTIVE');
INSERT INTO `caps` VALUES ('75', 'sdfas', 'dfaf', 'dfasf', 'dfas', 'dfa', 'Division GAD Coordinator', 'Ilocos Sur', 'ACTIVE');
INSERT INTO `caps` VALUES ('76', 'safsadf', 'asdfa', 'adfadsf', 'asdff', 'asdfdsf', 'Division GAD Coordinator', 'Vigan City', 'ACTIVE');
INSERT INTO `caps` VALUES ('79', 'kiki', 'fdsd', 'dsfasf', 'dsfas', 'asdf', 'Division GAD Coordinator', 'San Carlos City', 'ACTIVE');
INSERT INTO `caps` VALUES ('80', 'koko', 'asd', 'asf', 'fdg', 'dfg', 'Division GAD Coordinator', 'Candon City', 'ACTIVE');
INSERT INTO `caps` VALUES ('82', 'fudge', 'ert', 'rey', 'ery', 'tyui', 'Division GAD Coordinator', 'Alaminos City', 'ACTIVE');
INSERT INTO `caps` VALUES ('84', 'albert', 'albert', 'albert', 'albert', 'albert', 'Division GAD Coordinator', 'La Union', 'ACTIVE');
INSERT INTO `caps` VALUES ('155', 'wqer', 'ewrt', 'wert', 'wert', 'wert', 'Division GAD Coordinator', 'Laoag City', 'ACTIVE');
INSERT INTO `caps` VALUES ('156', 'Leo', 'leo', 'Lana', 'Leo', 'Andrew', 'Division GAD Coordinator', 'Pangasinan II', 'ACTIVE');
INSERT INTO `caps` VALUES ('158', 'samples', 'sa', 'sample', 'sample', 'sample', 'Division GAD Coordinator', 'Ilocos Norte', 'ACTIVE');

-- ----------------------------
-- Table structure for `division`
-- ----------------------------
DROP TABLE IF EXISTS `division`;
CREATE TABLE `division` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `division` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

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

-- ----------------------------
-- Table structure for `fiscal_year`
-- ----------------------------
DROP TABLE IF EXISTS `fiscal_year`;
CREATE TABLE `fiscal_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `code` int(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of fiscal_year
-- ----------------------------
INSERT INTO `fiscal_year` VALUES ('3', '2021-01-01', '2021-12-31', '2021', 'Active');

-- ----------------------------
-- Table structure for `gad_form`
-- ----------------------------
DROP TABLE IF EXISTS `gad_form`;
CREATE TABLE `gad_form` (
  `form_number` varchar(20) NOT NULL,
  `requestor_id` varchar(100) DEFAULT NULL,
  `form_status` varchar(100) DEFAULT NULL,
  `approver_id` varchar(100) DEFAULT NULL,
  `date_approved` varchar(100) DEFAULT NULL,
  `date_submitted` varchar(100) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`form_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of gad_form
-- ----------------------------

-- ----------------------------
-- Table structure for `gad_table_entry_value`
-- ----------------------------
DROP TABLE IF EXISTS `gad_table_entry_value`;
CREATE TABLE `gad_table_entry_value` (
  `form_number` varchar(20) DEFAULT NULL,
  `col1` varchar(500) DEFAULT NULL,
  `col2` varchar(500) DEFAULT NULL,
  `col3` varchar(500) DEFAULT NULL,
  `col4` varchar(500) DEFAULT NULL,
  `col5` varchar(500) DEFAULT NULL,
  `col6` varchar(500) DEFAULT NULL,
  `col7` double(255,0) DEFAULT NULL,
  `col8` varchar(500) DEFAULT NULL,
  `col9` varchar(500) DEFAULT NULL,
  `col10` varchar(500) DEFAULT NULL,
  `requestor_id` varchar(100) DEFAULT NULL,
  `date_requested` varchar(100) DEFAULT NULL,
  `row_number` varchar(100) DEFAULT NULL,
  `category_focused` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of gad_table_entry_value
-- ----------------------------

-- ----------------------------
-- Table structure for `mandate`
-- ----------------------------
DROP TABLE IF EXISTS `mandate`;
CREATE TABLE `mandate` (
  `id` int(20) NOT NULL,
  `depedno` varchar(250) NOT NULL DEFAULT '',
  `depedcontent` varchar(500) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of mandate
-- ----------------------------

-- ----------------------------
-- Table structure for `template`
-- ----------------------------
DROP TABLE IF EXISTS `template`;
CREATE TABLE `template` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `filename` varchar(500) CHARACTER SET cp1256 DEFAULT '',
  `date_temp` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of template
-- ----------------------------
INSERT INTO `template` VALUES ('14', 'GAD_AR_Trained_Personnel_Template.xlsx', '2021-10-25 12:18:00');
