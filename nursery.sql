/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.1.9-MariaDB : Database - nursery
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nursery` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `nursery`;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`user_id`,`first_name`,`last_name`,`email`,`password`) values 
(1,'sdfsdfsdf','awdasdasda','asdasdasdasasd','hjdxchshdhs'),
(2,'sdfsdfsdf','awdasdasda','asdasdasdasasd','hjdxchshdhs'),
(3,'sdfsdfsdf','awdasdasda','asdasdasdasasd','hjdxchshdhs'),
(4,'sdfsdfsdf','awdasdasda','asdasdasdasasd','hjdxchshdhs');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
