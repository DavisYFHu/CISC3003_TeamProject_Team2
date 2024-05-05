/*
 Navicat Premium Data Transfer

 Source Server         : dwk
 Source Server Type    : MySQL
 Source Server Version : 80013
 Source Host           : localhost:3306
 Source Schema         : jxyyxt1

 Target Server Type    : MySQL
 Target Server Version : 80013
 File Encoding         : 65001

 Date: 15/11/2022 14:12:09
*/
create database kaoshi;
use kaoshi;
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for room
-- ----------------------------
DROP TABLE IF EXISTS `room`;
CREATE TABLE `room`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clean` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `roomid` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of room
-- ----------------------------
INSERT INTO `room` VALUES (1, 'Cleaned', 1001);
INSERT INTO `room` VALUES (2, 'Cleaned', 1002);
INSERT INTO `room` VALUES (3, 'Cleaned', 1003);
INSERT INTO `room` VALUES (5, 'Cleaned', 1004);

-- ----------------------------
-- Table structure for score
-- ----------------------------
DROP TABLE IF EXISTS `score`;
CREATE TABLE `score`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `km` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `teachers` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `score` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `sfzh` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tel` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of score
-- ----------------------------
INSERT INTO `score` VALUES (10, 'Chan Sio Man', 'Compiler Construction', 'Su Ziting', '100', '10002932', '67125467', '1');
INSERT INTO `score` VALUES (11, 'Chan Sio Man', 'Computer Network', 'Cao Xinyue', '100', '10002932', '67125467', '1');
INSERT INTO `score` VALUES (9, 'Kuok Cheong Meng', 'Calculus', 'Vat Kam Hou', '120', '10002483', '66623658', '1');

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stuid` bigint(20) NULL DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `sfzh` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tel` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `create_time` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES (1, 180510001, 'Kuok Cheong Meng', '10002483', '66623658', 'Rua Direita do Hipódromo, "MAN ON SUN CHUN", Nº.96r/c-Q', 'e10adc3949ba59abbe56e057f20f883e', '2022-05-29');
INSERT INTO `students` VALUES (2, 18041010258, 'Chan Sio Man', '10002932', '67125467', 'Xinjiang', 'e10adc3949ba59abbe56e057f20f883e', '2022-05-29');
INSERT INTO `students` VALUES (3, 180410006, 'Chong Ka Keong', '12281507', '62664913', 'Rua do Pedro Coutinho, Nº.19 r/c', 'e10adc3949ba59abbe56e057f20f883e', '2022-05-29');

-- ----------------------------
-- Table structure for teachers
-- ----------------------------
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tid` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `sfzh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `level` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `org` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 42 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of teachers
-- ----------------------------
INSERT INTO `teachers` VALUES (2, '10001', 'Vat Kam Hou', '50014568', '66501747', 'University of Macau', NULL, 'e10adc3949ba59abbe56e057f20f883e', '4+3');
INSERT INTO `teachers` VALUES (4, '10002', 'Zhang Liming', '10051345', '88222426', 'University of Macau', NULL, 'e10adc3949ba59abbe56e057f20f883e', '1');
INSERT INTO `teachers` VALUES (5, '10003', 'Xu Qiwen', '50014568', '30595351', 'University of Macau', NULL, 'e10adc3949ba59abbe56e057f20f883e', '1');
INSERT INTO `teachers` VALUES (6, '10004', 'Liu Yang', '10051345', '93563016', 'University of Macau', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL);
INSERT INTO `teachers` VALUES (7, '10005', 'Jin Yaqi', '50014568', '84517630', 'University of Macau', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL);
INSERT INTO `teachers` VALUES (8, '10006', 'Lin MengLin', '10051345', '59345', 'University of Macau', NULL, 'e10adc3949ba59abbe56e057f20f883e', '1');
INSERT INTO `teachers` VALUES (9, '10007', 'Cao Xinyue', '10051345', '99481342', 'University of Macau', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL);
INSERT INTO `teachers` VALUES (10, '10008', 'Mao Wenyu', '10051345', '30582681', 'University of Macau', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL);
INSERT INTO `teachers` VALUES (11, '10009', 'Chen Shuyu', '10051345', '93627122', 'University of Macau', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL);
INSERT INTO `teachers` VALUES (12, '10010', 'Wang Rui', '10051345', '93574381', 'University of Macau', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL);
INSERT INTO `teachers` VALUES (13, '10011', 'Chen Zhijun', '50014568', '14160565', 'University of Macau', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL);
INSERT INTO `teachers` VALUES (14, '10012', 'Pan Boliang', '10051345', '30557702', 'University of Macau', NULL, 'e10adc3949ba59abbe56e057f20f883e', '1');
INSERT INTO `teachers` VALUES (15, '10013', 'Wang Runtian', '50014568', '84503893', 'University of Macau', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL);
INSERT INTO `teachers` VALUES (16, '10014', 'Wei Yuanyuan', '50014568', '30582639', 'University of Macau', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL);
INSERT INTO `teachers` VALUES (17, '10015', 'Zhang Bohai', '10051345', '19455238', 'University of Macau', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL);
INSERT INTO `teachers` VALUES (18, '10016', 'Zhao Haofeng', '50014568', '93594003', 'University of Macau', NULL, 'e10adc3949ba59abbe56e057f20f883e', '1');
INSERT INTO `teachers` VALUES (19, '10017', 'Zhao Yubei', '50014568', '93565788', 'University of Macau', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL);
INSERT INTO `teachers` VALUES (20, '10018', 'Mao Eryuan', '50014568', '93595076', 'University of Macau', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL);
INSERT INTO `teachers` VALUES (21, '10019', 'Jiao Zegang', '10051345', '89453007', 'University of Macau', NULL, 'e10adc3949ba59abbe56e057f20f883e', '1');

-- ----------------------------
-- Table structure for yuyue
-- ----------------------------
DROP TABLE IF EXISTS `yuyue`;
CREATE TABLE `yuyue`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `pxdate` date NULL DEFAULT NULL,
  `teachers` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `km` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `sfzh` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `tel` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of yuyue
-- ----------------------------
INSERT INTO `yuyue` VALUES (11, 'Chan Sio Man', '2022-11-15', 'Su Ziting', 'Compiler Construction', '10002932', '67125467', '1');
INSERT INTO `yuyue` VALUES (9, 'Kuok Cheong Meng', '2022-11-30', 'Vat Kam Hou', 'Calculus', '10002483', '66623658', '1');
INSERT INTO `yuyue` VALUES (10, 'Kuok Cheong Meng', '2022-11-17', 'Vat Kam Hou', 'Data Structure', '10002483', '66623658', '1');
INSERT INTO `yuyue` VALUES (12, 'Kuok Cheong Meng', '2022-11-26', 'Wang Rui', 'PHPWeb Programming', '10002483', '66623658', '1');
INSERT INTO `yuyue` VALUES (13, 'Chan Sio Man', '2022-11-29', 'Cao Xinyue', 'Computer Network', '10002932', '67125467', '1');
INSERT INTO `yuyue` VALUES (14, 'Chong Ka Keong', '2022-11-27', 'Pan Boliang', 'Compilation Principles', '12281507', '62664913', '0');

SET FOREIGN_KEY_CHECKS = 1;
