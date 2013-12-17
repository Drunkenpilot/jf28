#
# Encoding: Unicode (UTF-8)
#


DROP TABLE IF EXISTS `admin_sessions`;
DROP TABLE IF EXISTS `admins`;
DROP TABLE IF EXISTS `categories`;
DROP TABLE IF EXISTS `photos`;
DROP TABLE IF EXISTS `products`;
DROP TABLE IF EXISTS `settings`;


CREATE TABLE `admin_sessions` (
  `session_id` varchar(40) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `ip_address` varchar(45) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `user_agent` varchar(120) CHARACTER SET latin1 NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hashed_password` varchar(128) NOT NULL DEFAULT '',
  `email` varchar(128) NOT NULL DEFAULT '',
  `firstname` varchar(32) NOT NULL DEFAULT '',
  `lastname` varchar(32) NOT NULL DEFAULT '',
  `key_set` varchar(128) DEFAULT NULL,
  `status` varchar(32) DEFAULT NULL,
  `role` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) NOT NULL DEFAULT '0',
  `name` varchar(128) DEFAULT NULL,
  `level_depth` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `position` int(10) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `thumb` varchar(128) DEFAULT NULL,
  `view` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;


CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client` varchar(128) DEFAULT NULL,
  `description` text,
  `year` year(4) DEFAULT NULL,
  `filename_l` varchar(128) DEFAULT NULL,
  `filename_m` varchar(128) DEFAULT NULL,
  `filename_s` varchar(128) DEFAULT NULL,
  `thumb_width` varchar(128) DEFAULT NULL,
  `thumb_height` varchar(128) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;


CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `product_num` varchar(32) NOT NULL DEFAULT '',
  `product_name` varchar(128) NOT NULL DEFAULT '',
  `product_price` float NOT NULL DEFAULT '0',
  `description` text,
  `position` int(11) DEFAULT '0',
  `active` int(10) NOT NULL DEFAULT '0',
  `taxgroup_id` int(10) DEFAULT NULL,
  `num` int(128) DEFAULT NULL,
  `min_num` int(11) DEFAULT '1',
  `thumb` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_theme` varchar(128) DEFAULT NULL,
  `main_theme` varchar(128) DEFAULT NULL,
  `meta` varchar(128) DEFAULT NULL,
  `contact` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;




SET FOREIGN_KEY_CHECKS = 0;


LOCK TABLES `admin_sessions` WRITE;
INSERT INTO `admin_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES ('c1193beba0af3dc3ef5416d29e518492', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36', 1387159347, 'a:2:{s:9:"user_data";s:0:"";s:8:"admin_id";i:1;}');
UNLOCK TABLES;


LOCK TABLES `admins` WRITE;
INSERT INTO `admins` (`id`, `hashed_password`, `email`, `firstname`, `lastname`, `key_set`, `status`, `role`) VALUES (1, '99b338d17850b7a954e201d92c3d622521990f4e69cda42151a36a3d0e9c9ec568d69d9d774a0ac7804a6288773238ce1ae70dde467e27cc3ba8061ed9ad891a', 'bobhao@gmail.com', 'Zhenyu', 'Hao', '87c9501e8874d4224abd71df0b92034c85a95f89d879ab8d9ac3c0524fb15a15f30e2328bb92a5a6fddd477f842402d23856d0a423d2ddad61c2057dcf9b97e4', '1', 'administrator'), (4, '4370826c30d46693f221d84ef8fd0191d554bdd8c417ab611fa86d9e8861ea0464fddb4b0f830e2949062a79c55b1854e620c11f3941f50e7f1b52ccd7fe2f48', 'info@betalife.be', 'Zhenyu', 'Hao', '4603bd8c2fe930d551619fbc8bde83c9c232e19000ea179d8e235e6edc143449734ae48e3d5833700e12ff5c3f15d8672a7ed95219e99cc4ab63766e0a10748e', '1', 'administrator');
UNLOCK TABLES;


LOCK TABLES `categories` WRITE;
INSERT INTO `categories` (`id`, `parent_id`, `name`, `level_depth`, `active`, `position`, `description`, `thumb`, `view`) VALUES (1, 0, 'root', 0, 1, 1, '', NULL, 0), (2, 1, 'animal', 1, 1, 1, 'animal', NULL, 0);
UNLOCK TABLES;


LOCK TABLES `photos` WRITE;
INSERT INTO `photos` (`id`, `client`, `description`, `year`, `filename_l`, `filename_m`, `filename_s`, `thumb_width`, `thumb_height`, `position`, `active`) VALUES (1, NULL, NULL, NULL, 'photo_2013_12_16_01_25_59.jpg', 'm_photo_2013_12_16_01_25_59.jpg', 'thumb_photo_2013_12_16_01_25_59.jpg', '187.43109151', '250', 1, 1), (2, NULL, NULL, NULL, 'photo_2013_12_16_01_25_591.jpg', 'm_photo_2013_12_16_01_25_591.jpg', 'thumb_photo_2013_12_16_01_25_591.jpg', '187.43109151', '250', 2, 1), (3, NULL, NULL, NULL, 'photo_2013_12_16_01_26_00.jpg', 'm_photo_2013_12_16_01_26_00.jpg', 'thumb_photo_2013_12_16_01_26_00.jpg', '187.43109151', '250', 3, 1), (4, NULL, NULL, NULL, 'photo_2013_12_16_01_26_001.jpg', 'm_photo_2013_12_16_01_26_001.jpg', 'thumb_photo_2013_12_16_01_26_001.jpg', '202.5', '250', 4, 1), (5, NULL, NULL, NULL, 'photo_2013_12_16_01_26_01.jpg', 'm_photo_2013_12_16_01_26_01.jpg', 'thumb_photo_2013_12_16_01_26_01.jpg', '179', '250', 5, 1), (6, NULL, NULL, NULL, 'photo_2013_12_16_01_26_011.jpg', 'm_photo_2013_12_16_01_26_011.jpg', 'thumb_photo_2013_12_16_01_26_011.jpg', '199.558985667', '250', 6, 1), (7, NULL, NULL, NULL, 'photo_2013_12_16_01_26_02.jpg', 'm_photo_2013_12_16_01_26_02.jpg', 'thumb_photo_2013_12_16_01_26_02.jpg', '187.731481481', '250', 7, 1), (8, NULL, NULL, NULL, 'photo_2013_12_16_01_26_021.jpg', 'm_photo_2013_12_16_01_26_021.jpg', 'thumb_photo_2013_12_16_01_26_021.jpg', '410.133136095', '250', 8, 1), (9, NULL, NULL, NULL, 'photo_2013_12_16_01_26_022.jpg', 'm_photo_2013_12_16_01_26_022.jpg', 'thumb_photo_2013_12_16_01_26_022.jpg', '179.618768328', '250', 9, 1), (10, NULL, NULL, NULL, 'photo_2013_12_16_01_26_03.jpg', 'm_photo_2013_12_16_01_26_03.jpg', 'thumb_photo_2013_12_16_01_26_03.jpg', '374.707259953', '250', 10, 1);
UNLOCK TABLES;


LOCK TABLES `products` WRITE;
UNLOCK TABLES;


LOCK TABLES `settings` WRITE;
INSERT INTO `settings` (`id`, `admin_theme`, `main_theme`, `meta`, `contact`, `email`) VALUES (2, 'default', 'default', NULL, NULL, 'info@betalife.be');
UNLOCK TABLES;




SET FOREIGN_KEY_CHECKS = 1;


