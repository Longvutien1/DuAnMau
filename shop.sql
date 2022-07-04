/*
 Navicat Premium Data Transfer

 Source Server         : VuTienLong
 Source Server Type    : MySQL
 Source Server Version : 100421
 Source Host           : localhost:3306
 Source Schema         : shop

 Target Server Type    : MySQL
 Target Server Version : 100421
 File Encoding         : 65001

 Date: 07/10/2021 19:39:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------

-- Table structure for loai_hang
-- ----------------------------
DROP TABLE IF EXISTS `loai_hang`;
CREATE TABLE `loai_hang`  (
  `ma_loai` int NOT NULL AUTO_INCREMENT,
  `ten_loai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ma_loai`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of loai_hang
-- ----------------------------
INSERT INTO `loai_hang` VALUES (1, 'Xe máy');
INSERT INTO `loai_hang` VALUES (2, 'Súng lục');
INSERT INTO `loai_hang` VALUES (3, 'Điện thoại');
INSERT INTO `loai_hang` VALUES (4, 'Xiaomi');
INSERT INTO `loai_hang` VALUES (33, 'fdgfgfgfg');



-- ----------------------------
-- Table structure for hang_hoa
-- ----------------------------
DROP TABLE IF EXISTS `hang_hoa`;
CREATE TABLE `hang_hoa`  (
  `ma_hh` int NOT NULL AUTO_INCREMENT,
  `ten_hh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `don_gia` float NOT NULL,
  `giam_gia` float NOT NULL,
  `hinh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_nhap` date NOT NULL,
  `mo_ta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dac_biet` bit(1) NOT NULL,
  `so_luot_xem` int NULL DEFAULT 0,
  `ma_loai` int NOT NULL,
  PRIMARY KEY (`ma_hh`) USING BTREE,
  INDEX `ma_loai`(`ma_loai`) USING BTREE,
  CONSTRAINT `ma_loai` FOREIGN KEY (`ma_loai`) REFERENCES `loai_hang` (`ma_loai`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of hang_hoa
-- ----------------------------
INSERT INTO `hang_hoa` VALUES (1, 'IPhone13', 121212, 1000, 'image 23.jpg', '2021-10-07', ' Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error reiciendis voluptatibus aperiam debitis laudantium reprehenderit mollitia sint deleniti sed facere, rem, dignissimos quam dolor? Nesciunt repudiandae labore magni vel ex?', b'1', 0, 1);
INSERT INTO `hang_hoa` VALUES (2, 'IPhone X', 89, 1, 'image 22.jpg', '2021-10-04', ' Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error reiciendis voluptatibus aperiam debitis laudantium reprehenderit mollitia sint deleniti sed facere, rem, dignissimos quam dolor? Nesciunt repudiandae labore magni vel ex?', b'1', 0, 3);
INSERT INTO `hang_hoa` VALUES (3, 'IPhone14', 78, 1, 'image 21.jpg', '2021-10-06', ' Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error reiciendis voluptatibus aperiam debitis laudantium reprehenderit mollitia sint deleniti sed facere, rem, dignissimos quam dolor? Nesciunt repudiandae labore magni vel ex?', b'1', 0, 2);
INSERT INTO `hang_hoa` VALUES (4, 'SamSung', 67, 12, 'image 20.jpg', '2021-10-04', ' Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error reiciendis voluptatibus aperiam debitis laudantium reprehenderit mollitia sint deleniti sed facere, rem, dignissimos quam dolor? Nesciunt repudiandae labore magni vel ex?', b'1', 0, 4);
INSERT INTO `hang_hoa` VALUES (5, 'Shot gun', 89, 20, 'image 14.jpg', '2021-10-02', ' ', b'1', 0, 2);
INSERT INTO `hang_hoa` VALUES (6, 'Honda', 999, 30, 'image 13.jpg', '2021-09-28', ' Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error reiciendis voluptatibus aperiam debitis laudantium reprehenderit mollitia sint deleniti sed facere, rem, dignissimos quam dolor? Nesciunt repudiandae labore magni vel ex?', b'1', 0, 1);
INSERT INTO `hang_hoa` VALUES (7, 'Dream', 87, 12, 'image 12.jpg', '2021-10-06', ' Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error reiciendis voluptatibus aperiam debitis laudantium reprehenderit mollitia sint deleniti sed facere, rem, dignissimos quam dolor? Nesciunt repudiandae labore magni vel ex?', b'1', 6, 1);
INSERT INTO `hang_hoa` VALUES (8, 'SH', 788, 12, 'image 11.jpg', '2021-10-04', ' Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error reiciendis voluptatibus aperiam debitis laudantium reprehenderit mollitia sint deleniti sed facere, rem, dignissimos quam dolor? Nesciunt repudiandae labore magni vel ex?', b'1', 1, 1);
INSERT INTO `hang_hoa` VALUES (9, 'Shot gun', 566, 122, 'image 10.jpg', '2021-10-04', '  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error reiciendis voluptatibus aperiam debitis laudantium reprehenderit mollitia sint deleniti sed facere, rem, dignissimos quam dolor? Nesciunt repudiandae labore magni vel ex?', b'1', 7, 2);
INSERT INTO `hang_hoa` VALUES (10, 'Gun', 12111, 12, 'image 4.jpg', '2021-10-04', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error reiciendis voluptatibus aperiam debitis laudantium reprehenderit mollitia sint deleniti sed facere, rem, dignissimos quam dolor? Nesciunt repudiandae labore magni vel ex?</p>', b'1', 36, 2);

-- ----------------------------
-- Table structure for khach_hang
-- ----------------------------
DROP TABLE IF EXISTS `khach_hang`;
CREATE TABLE `khach_hang`  (
  `ma_kh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mat_khau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ho_ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kick_hoat` int NOT NULL,
  `hinh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vai_tro` int NOT NULL,
  PRIMARY KEY (`ma_kh`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of khach_hang
-- ----------------------------
INSERT INTO `khach_hang` VALUES ('longvt', '111', 'vũ tiến long2', 1, 'messi.jpg', 'longvtph14046@gmail.com', 1);
INSERT INTO `khach_hang` VALUES ('longvt1111', '$2y$10$wNhz0P/6zNrLL191NTLCjOg.HdYfHRe7eJwc6yYN0DPtRZ/sfTAwa', 'vũ tiến long2', 1, 'bruno.jpg', 'longvtph14046@gmail.com', 1);
INSERT INTO `khach_hang` VALUES ('longvt11111212', '$2y$10$xx0s9ZwchyL/dMgLxIBf1uxgUMOM/goQAemRibjsWK.zkPClWXlCW', 'vũ tiến long2', 0, 'messi.jpg', 'longvtph14046@fpt.edu.vn', 0);
INSERT INTO `khach_hang` VALUES ('ph14046', '111', 'Vũ Tiến Long', 1, 'MEN-OUTWEAR.png', 'longvtph14046@fpt.edu.vn', 1);

-- ----------------------------
-- Table structure for binh_luan
-- ----------------------------
DROP TABLE IF EXISTS `binh_luan`;
CREATE TABLE `binh_luan`  (
  `ma_bl` int NOT NULL AUTO_INCREMENT,
  `noi_dung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ma_hh` int NOT NULL,
  `ma_kh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_bl` date NOT NULL,
  PRIMARY KEY (`ma_bl`) USING BTREE,
  INDEX `ma_hh`(`ma_hh`) USING BTREE,
  INDEX `ma_kh`(`ma_kh`) USING BTREE,
  CONSTRAINT `ma_hh` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `ma_kh` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of binh_luan
-- ----------------------------
INSERT INTO `binh_luan` VALUES (32, 'sản phẩm tốt', 10, 'ph14046', '2021-10-07');

SET FOREIGN_KEY_CHECKS = 1;
