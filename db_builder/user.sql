-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128),
  `email` varchar(128),
  `image` varchar(255),
  `password` varchar(255),
  `id_role` int(11),
  `is_active` int(1),
  `date_created` int(11),
  `date_modified` int(11),
  PRIMARY KEY (`id`)
);
