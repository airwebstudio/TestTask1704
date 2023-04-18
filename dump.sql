CREATE DATABASE /*!32312 IF NOT EXISTS*/`TT` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `TT`;

/*Table structure for table `clients_data` */

DROP TABLE IF EXISTS `clients_data`;

CREATE TABLE `clients_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(800) COLLATE utf8_unicode_ci NOT NULL,
  `view_date` date NOT NULL,
  `url` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `views_count` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
