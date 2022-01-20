/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dbcaps

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-12-20 14:39:49
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `attendees`
-- ----------------------------
DROP TABLE IF EXISTS `attendees`;
CREATE TABLE `attendees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `position` varchar(500) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `division` varchar(100) NOT NULL,
  `date_sub` datetime NOT NULL DEFAULT current_timestamp(),
  `mandate` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of attendees
-- ----------------------------
INSERT INTO `attendees` VALUES ('80', 'Rowel', 'Master Teacher I', 'Male', 'Pangasinan II', '2021-12-16 15:32:02', 's');
INSERT INTO `attendees` VALUES ('81', 'Lea', 'Teacher II', 'Female', 'Pangasinan II', '2021-12-16 15:32:02', 's');
INSERT INTO `attendees` VALUES ('82', 'Jorge', 'Principal', 'Male', 'Pangasinan II', '2021-12-16 15:32:02', 'd');
INSERT INTO `attendees` VALUES ('83', 'Georgina', 'Teacher I', 'Female', 'Pangasinan II', '2021-12-16 15:32:02', 'd');

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
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8mb4;

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
INSERT INTO `caps` VALUES ('159', 'hello', 'hi', 'asd', 'asd', 'asd', 'Regional GAD Coordinator', 'Region 1', 'ACTIVE');

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
-- Table structure for `due_dates`
-- ----------------------------
DROP TABLE IF EXISTS `due_dates`;
CREATE TABLE `due_dates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `due_date` date NOT NULL,
  `form_type` varchar(3) NOT NULL,
  `date_submitted` datetime NOT NULL,
  `status` varchar(11) NOT NULL,
  `code` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of due_dates
-- ----------------------------
INSERT INTO `due_dates` VALUES ('34', '2021-12-21', 'GPB', '2021-12-17 17:54:06', 'ACTIVE', '2021');
INSERT INTO `due_dates` VALUES ('35', '2021-12-21', 'GAD', '2021-12-17 17:57:29', 'ACTIVE', '2021');

-- ----------------------------
-- Table structure for `fiscal_year`
-- ----------------------------
DROP TABLE IF EXISTS `fiscal_year`;
CREATE TABLE `fiscal_year` (
  `code` varchar(250) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(250) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of fiscal_year
-- ----------------------------
INSERT INTO `fiscal_year` VALUES ('2021', '2021-01-01', '2021-12-31', 'ACTIVE');
INSERT INTO `fiscal_year` VALUES ('2022', '2022-01-01', '2022-12-31', 'INACTIVE');
INSERT INTO `fiscal_year` VALUES ('2023', '2023-01-01', '2023-12-31', 'INACTIVE');

-- ----------------------------
-- Table structure for `gad_form`
-- ----------------------------
DROP TABLE IF EXISTS `gad_form`;
CREATE TABLE `gad_form` (
  `form_number` varchar(20) NOT NULL,
  `requestor_id` varchar(100) NOT NULL,
  `form_status` varchar(100) NOT NULL,
  `approver_id` varchar(100) NOT NULL,
  `date_approved` datetime DEFAULT NULL,
  `date_submitted` datetime NOT NULL,
  `remarks` varchar(500) NOT NULL,
  PRIMARY KEY (`form_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of gad_form
-- ----------------------------
INSERT INTO `gad_form` VALUES ('GAD-1638767325941', '156', 'PENDING', '', null, '2021-12-06 13:08:45', '');
INSERT INTO `gad_form` VALUES ('GAD-1639121403480', '156', 'APPROVED', '1', '2021-12-10 15:32:44', '2021-12-10 15:30:03', '');
INSERT INTO `gad_form` VALUES ('GAD-1639187062510', '156', 'PENDING', '', null, '2021-12-11 09:44:22', '');
INSERT INTO `gad_form` VALUES ('GAD-1639188592308', '156', 'PENDING', '', null, '2021-12-11 10:09:52', '');
INSERT INTO `gad_form` VALUES ('GAD-1639639823485', '156', 'PENDING', '', null, '2021-12-16 15:30:23', '');
INSERT INTO `gad_form` VALUES ('GPB-1638766355764', '156', 'APPROVED', '1', '2021-12-10 15:11:23', '2021-12-06 12:52:35', '');
INSERT INTO `gad_form` VALUES ('GPB-1639638327102', '156', 'APPROVED', '1', '2021-12-19 15:41:21', '2021-12-16 15:05:26', '');

-- ----------------------------
-- Table structure for `gad_table_entry_value`
-- ----------------------------
DROP TABLE IF EXISTS `gad_table_entry_value`;
CREATE TABLE `gad_table_entry_value` (
  `form_number` varchar(20) NOT NULL,
  `col1` varchar(500) NOT NULL,
  `col2` varchar(500) NOT NULL,
  `col3` varchar(500) NOT NULL,
  `col4` varchar(500) NOT NULL,
  `col5` varchar(500) NOT NULL,
  `col6` varchar(500) NOT NULL,
  `col7` varchar(500) NOT NULL,
  `col8` varchar(500) NOT NULL,
  `col9` varchar(500) NOT NULL,
  `col10` varchar(500) NOT NULL,
  `requestor_id` varchar(100) NOT NULL,
  `date_requested` datetime NOT NULL,
  `row_number` varchar(100) NOT NULL,
  `category_focused` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of gad_table_entry_value
-- ----------------------------
INSERT INTO `gad_table_entry_value` VALUES ('GPB-1638766355764', 'a', 'a', 'a', 'a', 'a', 'a', '3', 'a', 'a', '', '156', '2021-12-06 12:52:35', '1', 'CLIENT');
INSERT INTO `gad_table_entry_value` VALUES ('GAD-1638767325941', 's', 's', 's', 's', 's', 's', 's', '4', '5', 's', '156', '2021-12-06 13:08:45', '1', 'CLIENT');
INSERT INTO `gad_table_entry_value` VALUES ('GAD-1639121403480', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2', '3', 'a', '156', '2021-12-10 15:30:03', '1', 'CLIENT');
INSERT INTO `gad_table_entry_value` VALUES ('GAD-1639186860563', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2', '3', 'a', '156', '2021-12-11 09:41:00', '1', 'CLIENT');
INSERT INTO `gad_table_entry_value` VALUES ('GAD-1639186860563', 's', 's', 's', 's', 's', 's', 's', '4', '5', 's', '156', '2021-12-11 09:41:00', '2', 'ORGANIZATION');
INSERT INTO `gad_table_entry_value` VALUES ('GAD-1639187062510', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2', '3', 'a', '156', '2021-12-11 09:44:22', '1', 'CLIENT');
INSERT INTO `gad_table_entry_value` VALUES ('GAD-1639187522012', 'Issue 1', 'a', 'a', 'a', 'a', 'a', 'a', '4', '4', 'a', '156', '2021-12-11 09:51:58', '1', 'CLIENT');
INSERT INTO `gad_table_entry_value` VALUES ('GAD-1639187522012', 'Issue 2', 's', 's', 's', 's', 's', 's', '3', '3', 's', '156', '2021-12-11 09:51:58', '2', 'ORGANIZATION');
INSERT INTO `gad_table_entry_value` VALUES ('GAD-1639188592308', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2', '3', 'a', '156', '2021-12-11 10:09:52', '1', 'CLIENT');
INSERT INTO `gad_table_entry_value` VALUES ('GAD-1639188592308', 's', 's', 's', 's', 's', 's', 's', '3', '4', 's', '156', '2021-12-11 10:09:52', '2', 'ORGANIZATION');
INSERT INTO `gad_table_entry_value` VALUES ('GPB-1639638327102', 'a', 'a', 'a', 'a', 'a', 'a', '3', 'a', 'a', '', '156', '2021-12-16 15:05:26', '1', 'CLIENT');
INSERT INTO `gad_table_entry_value` VALUES ('GAD-1639639823485', 's', 's', 's', 's', 's', 's', 's', '5', '6', 's', '156', '2021-12-16 15:30:23', '1', 'CLIENT');
INSERT INTO `gad_table_entry_value` VALUES ('GAD-1639639823485', 'd', 'd', 'd', 'd', 'd', 'd', 'd', '7', '8', 'd', '156', '2021-12-16 15:30:23', '2', 'ORGANIZATION');

-- ----------------------------
-- Table structure for `mandate`
-- ----------------------------
DROP TABLE IF EXISTS `mandate`;
CREATE TABLE `mandate` (
  `depedno` varchar(250) NOT NULL,
  `depedcontent` varchar(500) DEFAULT NULL,
  `date_submitted` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`depedno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of mandate
-- ----------------------------
INSERT INTO `mandate` VALUES ('32, s. 2017: ', 'Issue 1', '2021-12-14 13:36:35');

-- ----------------------------
-- Table structure for `position`
-- ----------------------------
DROP TABLE IF EXISTS `position`;
CREATE TABLE `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of position
-- ----------------------------
INSERT INTO `position` VALUES ('1', 'MASTER TEACHER I');
INSERT INTO `position` VALUES ('2', 'MASTER TEACHER II');
INSERT INTO `position` VALUES ('3', 'MASTER TEACHER III');
INSERT INTO `position` VALUES ('4', 'SPECIAL SCIENCE TEACHER I');
INSERT INTO `position` VALUES ('5', 'SPECIAL EDUCATION TEACHER I');
INSERT INTO `position` VALUES ('6', 'SPECIAL EDUCATION TEACHER II');
INSERT INTO `position` VALUES ('7', 'SPECIAL EDUCATION TEACHER III');
INSERT INTO `position` VALUES ('8', 'TEACHER I');
INSERT INTO `position` VALUES ('9', 'TEACHER II');
INSERT INTO `position` VALUES ('10', 'TEACHER III');
INSERT INTO `position` VALUES ('11', 'ACCOUNTANT I');
INSERT INTO `position` VALUES ('12', 'ACCOUNTANT II');
INSERT INTO `position` VALUES ('13', 'ACCOUNTANT III');
INSERT INTO `position` VALUES ('14', 'ADMINISTRATIVE AIDE I');
INSERT INTO `position` VALUES ('15', 'ADMINISTRATIVE AIDE II');
INSERT INTO `position` VALUES ('16', 'ADMINISTRATIVE AIDE III');
INSERT INTO `position` VALUES ('17', 'ADMINISTRATIVE AIDE IV');
INSERT INTO `position` VALUES ('18', 'ADMINISTRATIVE AIDE V');
INSERT INTO `position` VALUES ('19', 'ADMINISTRATIVE ASSISTANT I');
INSERT INTO `position` VALUES ('20', 'ADMINISTRATIVE ASSISTANT II');
INSERT INTO `position` VALUES ('21', 'ADMINISTRATIVE ASSISTANT III');
INSERT INTO `position` VALUES ('22', 'ADMINISTRATIVE OFFICER I');
INSERT INTO `position` VALUES ('23', 'ADMINISTRATIVE OFFICER II');
INSERT INTO `position` VALUES ('24', 'ADMINISTRATIVE OFFICER III');
INSERT INTO `position` VALUES ('25', 'ADMINISTRATIVE OFFICER IV');
INSERT INTO `position` VALUES ('26', 'ADMINISTRATIVE OFFICER V');
INSERT INTO `position` VALUES ('27', 'AGRICULTURIST');
INSERT INTO `position` VALUES ('28', 'ASSISTANT PROFESSOR');
INSERT INTO `position` VALUES ('29', 'ASSISTANT SCHOOL PRINCIPAL I');
INSERT INTO `position` VALUES ('30', 'ASSISTANT SCHOOL PRINCIPAL II');
INSERT INTO `position` VALUES ('31', 'ASSISTANT SCHOOL PRINCIPAL III');
INSERT INTO `position` VALUES ('32', 'ASSISTANT SCHOOLS DIVISION SUPERINTENDENT');
INSERT INTO `position` VALUES ('33', 'ATTORNEY I');
INSERT INTO `position` VALUES ('34', 'ATTORNEY II');
INSERT INTO `position` VALUES ('35', 'ATTORNEY III');
INSERT INTO `position` VALUES ('36', 'CHIEF EDUCATION SUPERVISOR');
INSERT INTO `position` VALUES ('37', 'CLERK I, EO 366');
INSERT INTO `position` VALUES ('38', 'CLERK II, EO 366');
INSERT INTO `position` VALUES ('39', 'CLERK III, EO 366');
INSERT INTO `position` VALUES ('40', 'COMMUNICATIONS EQUIPMENT OPERATOR I');
INSERT INTO `position` VALUES ('41', 'COMMUNICATIONS EQUIPMENT OPERATOR II');
INSERT INTO `position` VALUES ('42', 'COMMUNICATIONS EQUIPMENT OPERATOR III');
INSERT INTO `position` VALUES ('43', 'DENTAL AIDE');
INSERT INTO `position` VALUES ('44', 'DENTIST I');
INSERT INTO `position` VALUES ('45', 'DENTIST II');
INSERT INTO `position` VALUES ('46', 'EDUCATION PROGRAM SPECIALIST I');
INSERT INTO `position` VALUES ('47', 'EDUCATION PROGRAM SPECIALIST II');
INSERT INTO `position` VALUES ('48', 'EDUCATION PROGRAM SUPERVISOR');
INSERT INTO `position` VALUES ('49', 'ELECTRONICS AND COMMUNICATIONS EQUIPMENT TECHNICIAN');
INSERT INTO `position` VALUES ('50', 'ENGINEER I');
INSERT INTO `position` VALUES ('51', 'ENGINEER II');
INSERT INTO `position` VALUES ('52', 'ENGINEER III');
INSERT INTO `position` VALUES ('53', 'FARM WORKER I');
INSERT INTO `position` VALUES ('54', 'FISHERMAN');
INSERT INTO `position` VALUES ('55', 'GUIDANCE COORDINATOR I');
INSERT INTO `position` VALUES ('56', 'GUIDANCE COORDINATOR II');
INSERT INTO `position` VALUES ('57', 'GUIDANCE COORDINATOR III');
INSERT INTO `position` VALUES ('58', 'GUIDANCE COUNSELOR I');
INSERT INTO `position` VALUES ('59', 'GUIDANCE COUNSELOR II');
INSERT INTO `position` VALUES ('60', 'GUIDANCE COUNSELOR III');
INSERT INTO `position` VALUES ('61', 'HANDICRAFT WORKER I');
INSERT INTO `position` VALUES ('62', 'HEAD TEACHER I');
INSERT INTO `position` VALUES ('63', 'HEAD TEACHER II');
INSERT INTO `position` VALUES ('64', 'HEAD TEACHER III');
INSERT INTO `position` VALUES ('65', 'HEAD TEACHER IV');
INSERT INTO `position` VALUES ('66', 'HEAD TEACHER V');
INSERT INTO `position` VALUES ('67', 'HEAD TEACHER VI');
INSERT INTO `position` VALUES ('68', 'INFORMATION TECHNOLOGY OFFICER I');
INSERT INTO `position` VALUES ('69', 'LEGAL ASSISTANT');
INSERT INTO `position` VALUES ('70', 'LIBRARIAN I');
INSERT INTO `position` VALUES ('71', 'LIBRARIAN II');
INSERT INTO `position` VALUES ('72', 'MASTER FISHERMAN I');
INSERT INTO `position` VALUES ('73', 'MEDICAL OFFICER I');
INSERT INTO `position` VALUES ('74', 'MEDICAL OFFICER II');
INSERT INTO `position` VALUES ('75', 'MEDICAL OFFICER III');
INSERT INTO `position` VALUES ('76', 'NURSE I');
INSERT INTO `position` VALUES ('77', 'NUTRITIONIST DIETITIAN');
INSERT INTO `position` VALUES ('78', 'PLANNING OFFICER I');
INSERT INTO `position` VALUES ('79', 'PLANNING OFFICER II');
INSERT INTO `position` VALUES ('80', 'PLANNING OFFICER III');
INSERT INTO `position` VALUES ('81', 'PROJECT DEVELOPMENT OFFICER I');
INSERT INTO `position` VALUES ('82', 'PROJECT DEVELOPMENT OFFICER II');
INSERT INTO `position` VALUES ('83', 'PUBLIC SCHOOLS DISTRICT SUPERVISOR');
INSERT INTO `position` VALUES ('84', 'REGISTRAR I');
INSERT INTO `position` VALUES ('85', 'SCHOOL FARM DEMONSTRATOR');
INSERT INTO `position` VALUES ('86', 'SCHOOL FARMING COORDINATOR I');
INSERT INTO `position` VALUES ('87', 'SCHOOL FARMING COORDINATOR II');
INSERT INTO `position` VALUES ('88', 'SCHOOL FARMING COORDINATOR III');
INSERT INTO `position` VALUES ('89', 'SCHOOL LIBRARIAN I');
INSERT INTO `position` VALUES ('90', 'SCHOOL LIBRARIAN II');
INSERT INTO `position` VALUES ('91', 'SCHOOL LIBRARIAN III');
INSERT INTO `position` VALUES ('92', 'SCHOOL PRINCIPAL I');
INSERT INTO `position` VALUES ('93', 'SCHOOL PRINCIPAL II');
INSERT INTO `position` VALUES ('94', 'SCHOOL PRINCIPAL III');
INSERT INTO `position` VALUES ('95', 'SCHOOL PRINCIPAL IV');
INSERT INTO `position` VALUES ('96', 'SCHOOLS DIVISION SUPERINTENDENT');
INSERT INTO `position` VALUES ('97', 'SECURITY GUARD I');
INSERT INTO `position` VALUES ('98', 'SECURITY GUARD II');
INSERT INTO `position` VALUES ('99', 'SECURITY GUARD III');
INSERT INTO `position` VALUES ('100', 'SENIOR EDUCATION PROGRAM SPECIALIST');
INSERT INTO `position` VALUES ('101', 'UTILITY WORKER I');
INSERT INTO `position` VALUES ('102', 'WATCHMAN I');

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
