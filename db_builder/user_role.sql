-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128),
  PRIMARY KEY (`id`)
);

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES (1, 'admin');
INSERT INTO `user_role` VALUES (2, 'guru');
INSERT INTO `user_role` VALUES (3, 'siswa');
