/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dbcaps

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-10-05 18:20:05
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of attendees
-- ----------------------------
INSERT INTO `attendees` VALUES ('1', 'jorge', 'Principal', 'male');
INSERT INTO `attendees` VALUES ('2', 'rowel', 'Master Teacher II', 'male');
INSERT INTO `attendees` VALUES ('3', 'Jorge', 'Principal', 'Male');
INSERT INTO `attendees` VALUES ('4', 'Rowel', 'Master Teacher II', 'Male');
INSERT INTO `attendees` VALUES ('5', 'Maricris', 'Teacher I', 'Female');

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
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of caps
-- ----------------------------
INSERT INTO `caps` VALUES ('1', 'Jorge', 'jojo', 'Ojascastro', 'Jorge', 'Valdez', 'Regional GAD Coordinator', 'Region 1', 'ACTIVE');
INSERT INTO `caps` VALUES ('2', 'Leo', 'leo', 'Lana', 'Leo', 'Andrew', 'Division GAD Coordinator', 'Pangasinan I', 'ACTIVE');
INSERT INTO `caps` VALUES ('3', 'admin', 'admin', '', '', '', 'Admin', null, 'ACTIVE');
INSERT INTO `caps` VALUES ('70', 'Rowel', 'roro', 'Dagooc', 'Rowel', 'Row', 'Division GAD Coordinator', 'San Fernando City', 'ACTIVE');
INSERT INTO `caps` VALUES ('72', 'sda', 'adf', 'asdf', 'asdf', 'asdf', 'Division GAD Coordinator', 'Ilocos Norte', 'ACTIVE');
INSERT INTO `caps` VALUES ('73', 'gtfert', 'wert', 'wertwe', 'retw', 'wretwe', 'Regional GAD Coordinator', 'Region 1', 'ACTIVE');
INSERT INTO `caps` VALUES ('74', 'sfds', 'asdf', 'asdf', 'gfh', 'fghf', 'Division GAD Coordinator', 'Dagupan City', 'ACTIVE');
INSERT INTO `caps` VALUES ('75', 'sdfas', 'dfaf', 'dfasf', 'dfas', 'dfa', 'Division GAD Coordinator', 'Ilocos Sur', 'ACTIVE');
INSERT INTO `caps` VALUES ('76', 'safsadf', 'asdfa', 'adfadsf', 'asdff', 'asdfdsf', 'Division GAD Coordinator', 'Vigan City', 'ACTIVE');
INSERT INTO `caps` VALUES ('79', 'kiki', 'fdsd', 'dsfasf', 'dsfas', 'asdf', 'Division GAD Coordinator', 'San Carlos City', 'ACTIVE');
INSERT INTO `caps` VALUES ('80', 'koko', 'asd', 'asf', 'fdg', 'dfg', 'Division GAD Coordinator', 'Candon City', 'ACTIVE');
INSERT INTO `caps` VALUES ('82', 'fdg', 'ert', 'rey', 'ery', 'tyui', 'Division GAD Coordinator', 'Laoag City', 'ACTIVE');

-- ----------------------------
-- Table structure for `division`
-- ----------------------------
DROP TABLE IF EXISTS `division`;
CREATE TABLE `division` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `division` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

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
INSERT INTO `division` VALUES ('16', 'Santol');
INSERT INTO `division` VALUES ('22', 'dfgdsg');
INSERT INTO `division` VALUES ('23', 'dfg');
INSERT INTO `division` VALUES ('26', 'div');

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
INSERT INTO `gad_form` VALUES ('GAD-1632881179014', '2', 'APPROVED', '1', '2021-10-05 17-25-08', '2021-09-29 10-06-18', '');
INSERT INTO `gad_form` VALUES ('GAD-1633423782940', '2', 'PENDING', null, null, '2021-10-05 16-49-42', null);
INSERT INTO `gad_form` VALUES ('GPB-1632634881319', '2', 'APPROVED', '1', '2021-09-26 13-42-40', '2021-09-26 13-41-21', '');
INSERT INTO `gad_form` VALUES ('GPB-1632884474885', '2', 'APPROVED', '1', '2021-10-05 17-14-07', '2021-09-29 11-01-14', '');
INSERT INTO `gad_form` VALUES ('GPB-1633424363561', '2', 'PENDING', null, null, '2021-10-05 16-59-23', null);

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
INSERT INTO `gad_table_entry_value` VALUES ('GPB-1632634881319', 'gpb', 'gpb', 'gpb', 'gpb', 'gpb', 'gpb', '10000', 'gpb', 'gpb', null, '2', '2021-09-26 13-41-21', '1', 'CLIENT');
INSERT INTO `gad_table_entry_value` VALUES ('GAD-1632881179014', 'Lack of awareness and appreciation on gender equality and gender issues within DepEd', 'Need to initiate, coordinate and monitor gender mainstreaming at the regional level ', 'A gender audit establishes a baseline, identifies critical gaps and challenges, and recommends ways of addressing them, suggesting possible improvements and innovations. It also documents good practices towards the achievement of gender equality. ', 'MFO2-Basic Education Services', 'Gender Audit Training-Workshop with Orientation on Magna Carta of Women and DO 32 s. 2017 (Gender-Responsive Basic Education Policy)', 'Strengthened GAD mechanism in the region', '100', '197500', '197500', 'The resource speaker is a member of PCW national Pool of Trainers/ GEDSI exper', '2', '2021-09-29 10-06-18', '1', 'CLIENT');
INSERT INTO `gad_table_entry_value` VALUES ('GPB-1632884474885', 'DepEd Order No. 32, s. 2017: DepEd Gender-Responsive Basic Education Policy and RA 92962: Anti-Violence Against Women and their Children Act of 2004', 'Minimal  opportunity for the Regional Office Personnel - especially the women - to participate in information-awareness campaigns  and be made aware of their rights and roles in the society', 'Maintained a VAWC-free workplace where male and female personnel enjoy human rights and empowerment, resulting to improved delivery of customer services and well-addressed/resolved issues, if not totally eliminated problems, in the workplace', 'MFO2-Basic Education Services', 'Advocacy Campaign for Women Equality and Empowerment (National Women’s Month, 18-Day Campaign to End VAW)', '100% of ROI Personnel capacitated on empowering women, upholding respect for and protection of human rights, maintaining VAWC-free workplace and providing gender-responsive, quality basic customer services', '110500', 'GAD Fund', 'Regional Office I', null, '2', '2021-09-29 11-01-14', '1', 'CLIENT');
INSERT INTO `gad_table_entry_value` VALUES ('GAD-1633423782940', 'ar', 'ar', 'ar', 'ar', 'ar', 'ar', '0', 'ar', 'ar', 'ar', '2', '2021-10-05 16-49-42', '1', 'CLIENT');
INSERT INTO `gad_table_entry_value` VALUES ('GAD-1633423782940', 'arr', 'arr', 'arr', 'arr', 'arr', 'arr', '0', 'arr', 'arr', '', '2', '2021-10-05 16-49-42', '2', 'ORGANIZATION');
INSERT INTO `gad_table_entry_value` VALUES ('GPB-1633424363561', 'aa', 'aa', 'aa', 'aa', 'aa', 'aa', '0', 'aa', 'aa', null, '2', '2021-10-05 16-59-23', '1', 'CLIENT');
INSERT INTO `gad_table_entry_value` VALUES ('GPB-1633424363561', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', '0', 'aaa', 'aaa', null, '2', '2021-10-05 16-59-23', '2', 'ORGANIZATION');

-- ----------------------------
-- Table structure for `mandate`
-- ----------------------------
DROP TABLE IF EXISTS `mandate`;
CREATE TABLE `mandate` (
  `depedno` varchar(250) DEFAULT '',
  `depedcontent` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of mandate
-- ----------------------------
INSERT INTO `mandate` VALUES ('3456', 'issue 4');
INSERT INTO `mandate` VALUES ('45754', 'GAD Issue 2');
INSERT INTO `mandate` VALUES ('54754', 'Issue 3');
INSERT INTO `mandate` VALUES ('32, s. 2017', 'DepEd Gender-Responsive Basic Education Policy and RA 92962: Anti-Violence Against Women and their Children Act of 2004');
INSERT INTO `mandate` VALUES ('40, s. 2012', 'DepEd Child Protection Policy and RA 9710: The Magna Carta of Women and Public School Teacher');
INSERT INTO `mandate` VALUES ('5645', 'Child labor');

-- ----------------------------
-- Table structure for `personnel`
-- ----------------------------
DROP TABLE IF EXISTS `personnel`;
CREATE TABLE `personnel` (
  `id` int(200) NOT NULL,
  `division` varchar(500) DEFAULT NULL,
  `filename` varchar(500) DEFAULT NULL,
  `date_submitted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of personnel
-- ----------------------------
INSERT INTO `personnel` VALUES ('0', 'Pangasinan I', 'GAD_AR_Trained_Personnel_Template.xlsx', '2021-09-22 09:48:00');

-- ----------------------------
-- Table structure for `template`
-- ----------------------------
DROP TABLE IF EXISTS `template`;
CREATE TABLE `template` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `filename` varchar(500) CHARACTER SET cp1256 DEFAULT '',
  `date_temp` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of template
-- ----------------------------
INSERT INTO `template` VALUES ('10', 'GAD_AR_Trained_Personnel_Template.xlsx', '2021-09-22 09:27:00');
