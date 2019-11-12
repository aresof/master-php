# Host: localhost  (Version 5.7.23)
# Date: 2019-11-05 20:09:28
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "images"
#

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_images_users` (`user_id`),
  CONSTRAINT `fk_images_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "images"
#

INSERT INTO `images` VALUES (1,1,'1571844772_prado.jpg','descripción de prueba 1','2019-10-14 21:25:51','2019-10-14 21:25:51'),(2,1,'1571848277_BENQ0060.JPG','descripción de prueba 2','2019-10-14 21:25:51','2019-10-14 21:25:51'),(3,1,'1571844845_003.JPG','descripción de prueba 3','2019-10-14 21:25:51','2019-10-14 21:25:51'),(4,3,'1571844772_prado.jpg','descripción de prueba 4','2019-10-14 21:25:51','2019-10-14 21:25:51'),(6,6,'1571844772_prado.jpg','prado','2019-10-23 15:32:52','2019-10-23 15:32:52'),(7,6,'1571844845_003.JPG','Pedro1','2019-10-23 15:34:05','2019-10-23 15:34:05'),(8,6,'1571848277_BENQ0060.JPG','moto','2019-10-23 16:31:17','2019-10-23 16:31:17'),(9,6,'1571860012_PC240459.JPG','family','2019-10-23 19:46:52','2019-10-23 19:46:52');

#
# Structure for table "users"
#

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(200) DEFAULT NULL,
  `nick` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "users"
#

INSERT INTO `users` VALUES (1,'user','Víctor','Robles','victorroblesweb','victor@victor.com','pass',NULL,'2019-10-14 21:25:51','2019-10-14 21:25:51',NULL),(2,'user','Juan','Lopez','juanlopez','juan@juan.com','pass',NULL,'2019-10-14 21:25:51','2019-10-14 21:25:51',NULL),(3,'user','Manolo','Garcia','manologarcia','manolo@manolo.com','pass',NULL,'2019-10-14 21:25:51','2019-10-14 21:25:51',NULL),(4,'user','Admin',NULL,NULL,'admin@admin.com','$2y$10$1VvS9sqDPKP/jUFDErBlKesZGfPXwXRK0idr9nftDb6B5YRJBTp0e',NULL,'2019-10-21 18:34:20','2019-10-21 18:34:20','ZJdArQJFOEVZACCP9w6YR4TuN4mrYaDiF4EALFFevkjjiLvLotUcIWiiIxBG'),(5,'user','David','Martínez','davidm','david@david.com','$2y$10$LMr3nCRjUIQqT7MpLRngY.Wj4k/bLR3Bk6iN7twpgA1uQWZHSTKim',NULL,'2019-10-21 20:54:36','2019-10-21 20:54:36','u6jq87GvPhK9qwb1mdsqwh57MS7DdltwjQU5uU573Z9JyYhOnrpLZivkmI9V'),(6,'user','Arturo','Ortega Flores','artuof','artuof@hotmail.com','$2y$10$2ROxDNgP7WmBk.mD0Ao6F.0yXcaqNRunyTHSHwdyK2tU9RkcR5Eqy','1571767354_12246664.jpg','2019-10-21 20:58:03','2019-10-23 14:05:08','2sgF2j5qFeVKeXKLg9VlLsFyvgYUjEeZu2EZzw7o90xcTuBhR93ctmZU1NCM');

#
# Structure for table "likes"
#

DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) DEFAULT NULL,
  `image_id` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_likes_users` (`user_id`),
  KEY `fk_likes_images` (`image_id`),
  CONSTRAINT `fk_likes_images` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
  CONSTRAINT `fk_likes_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=latin1;

#
# Data for table "likes"
#

INSERT INTO `likes` VALUES (1,1,4,'2019-10-14 21:25:51','2019-10-14 21:25:51'),(2,2,4,'2019-10-14 21:25:51','2019-10-14 21:25:51'),(3,3,1,'2019-10-14 21:25:51','2019-10-14 21:25:51'),(4,3,2,'2019-10-14 21:25:51','2019-10-14 21:25:51'),(5,2,1,'2019-10-14 21:25:51','2019-10-14 21:25:51'),(113,6,8,'2019-10-29 21:04:46','2019-10-29 21:04:46'),(145,6,9,'2019-11-05 15:48:38','2019-11-05 15:48:38');

#
# Structure for table "comments"
#

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) DEFAULT NULL,
  `image_id` int(255) DEFAULT NULL,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_users` (`user_id`),
  KEY `fk_comments_images` (`image_id`),
  CONSTRAINT `fk_comments_images` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
  CONSTRAINT `fk_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "comments"
#

INSERT INTO `comments` VALUES (1,1,4,'Buena foto de familia!!','2019-10-14 21:25:51','2019-10-14 21:25:51'),(2,2,1,'Buena foto de PLAYA!!','2019-10-14 21:25:51','2019-10-14 21:25:51'),(3,2,4,'que bueno!!','2019-10-14 21:25:51','2019-10-14 21:25:51'),(5,6,9,'Otra españa','2019-10-24 15:31:57','2019-10-24 15:31:57'),(6,6,9,'selección natural','2019-11-05 15:48:47','2019-11-05 15:48:47');
