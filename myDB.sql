/*
SQLyog Community v13.2.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - himalayanputri
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `phone_no` varchar(10) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `del_flg` varchar(1) NOT NULL DEFAULT 'N',
  `entry_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `admins` */

LOCK TABLES `admins` WRITE;

insert  into `admins`(`id`,`full_name`,`email_id`,`phone_no`,`username`,`password`,`del_flg`,`entry_date_time`) values 
(1,'admin',NULL,NULL,'admin@mail.com','$2y$10$jeYmnHes0.N6RxWIOiVRfeBJJHgT0krK6cDcHIe4Rw3zuTASXqGQ2','N','2024-03-20 11:28:16');

UNLOCK TABLES;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fk_admin_id` bigint(20) DEFAULT NULL,
  `del_flg` varchar(1) NOT NULL DEFAULT 'N',
  `entry_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `category` */

LOCK TABLES `category` WRITE;

insert  into `category`(`id`,`title`,`description`,`image`,`fk_admin_id`,`del_flg`,`entry_date_time`) values 
(1,'Cooking','Cooking',NULL,NULL,'N','2024-03-20 11:28:52'),
(2,'Fruits And Vegetables','Fruits & Vegetables',NULL,NULL,'N','2024-03-20 11:28:52'),
(3,'Beverage','Beverage',NULL,NULL,'N','2024-03-20 11:28:52'),
(4,'dairy','dairy',NULL,NULL,'N','2024-03-20 11:28:52');

UNLOCK TABLES;

/*Table structure for table `delevary_address` */

DROP TABLE IF EXISTS `delevary_address`;

CREATE TABLE `delevary_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) DEFAULT NULL COMMENT 'Home,Office,Relative,Friend,Other',
  `name` varchar(100) DEFAULT NULL,
  `address_line_1` varchar(255) DEFAULT NULL,
  `address_line_2` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `PIN` int(11) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(10) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `del_flg` varchar(1) NOT NULL DEFAULT 'N',
  `entry_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `delevary_address` */

LOCK TABLES `delevary_address` WRITE;

UNLOCK TABLES;

/*Table structure for table `product_cart` */

DROP TABLE IF EXISTS `product_cart`;

CREATE TABLE `product_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `fk_user_id` int(11) NOT NULL,
  `del_flg` varchar(1) NOT NULL DEFAULT 'N',
  `entry_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `product_cart` */

LOCK TABLES `product_cart` WRITE;

insert  into `product_cart`(`id`,`fk_product_id`,`qty`,`fk_user_id`,`del_flg`,`entry_date_time`) values 
(11,6,2,1,'N','2024-03-21 14:14:24');

UNLOCK TABLES;

/*Table structure for table `product_rating` */

DROP TABLE IF EXISTS `product_rating`;

CREATE TABLE `product_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `rating` decimal(3,1) NOT NULL,
  `del_flg` varchar(1) NOT NULL DEFAULT 'N',
  `entry_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `product_rating` */

LOCK TABLES `product_rating` WRITE;

UNLOCK TABLES;

/*Table structure for table `product_wishlist` */

DROP TABLE IF EXISTS `product_wishlist`;

CREATE TABLE `product_wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_product_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `del_flg` varchar(1) NOT NULL DEFAULT 'N',
  `entry_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `product_wishlist` */

LOCK TABLES `product_wishlist` WRITE;

insert  into `product_wishlist`(`id`,`fk_product_id`,`fk_user_id`,`del_flg`,`entry_date_time`) values 
(16,1,4444,'Y','2024-03-21 12:42:01'),
(17,2,4444,'N','2024-03-21 11:21:48'),
(18,3,4444,'Y','2024-03-20 16:32:03'),
(19,2,4444,'N','2024-03-21 11:21:48'),
(20,1,4444,'Y','2024-03-21 12:42:01'),
(21,6,4444,'N','2024-03-20 15:48:34'),
(22,1,4444,'Y','2024-03-21 12:42:01'),
(23,2,4444,'N','2024-03-21 11:21:48'),
(24,2,4444,'N','2024-03-21 11:21:48'),
(25,2,4444,'N','2024-03-21 11:21:48'),
(26,1,4444,'Y','2024-03-21 12:42:01'),
(27,10,4444,'N','2024-03-20 15:50:47'),
(28,1,4444,'Y','2024-03-21 12:42:01'),
(29,2,4444,'N','2024-03-21 11:21:48'),
(30,13,4444,'N','2024-03-20 15:51:56'),
(31,1,4444,'Y','2024-03-21 12:42:01'),
(32,11,4444,'N','2024-03-20 16:35:31'),
(33,14,4444,'Y','2024-03-20 16:35:57'),
(34,1,1,'N','2024-03-21 14:12:36'),
(35,2,1,'N','2024-03-21 14:14:00');

UNLOCK TABLES;

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` decimal(3,1) NOT NULL,
  `actual_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 0 COMMENT '0-> Available, 1-> Out of stock, 2-> Up comming',
  `fk_category_id` int(11) DEFAULT NULL,
  `fk_admin_id` int(11) DEFAULT NULL,
  `del_flg` varchar(1) NOT NULL DEFAULT 'N',
  `entry_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `products` */

LOCK TABLES `products` WRITE;

insert  into `products`(`id`,`title`,`description`,`brand_name`,`product_code`,`product_type`,`image`,`rating`,`actual_price`,`selling_price`,`tags`,`status`,`fk_category_id`,`fk_admin_id`,`del_flg`,`entry_date_time`) values 
(1,'111','test','test','lkj','lkj','images/1sad.png',5.0,500.00,450.00,'test tags',NULL,NULL,NULL,'N','2024-03-20 15:11:11'),
(2,'222','asd','Brand Name','Brand ','Brand ','images/16.png',1.0,50.00,60.00,'item',NULL,NULL,NULL,'N','2024-03-20 15:11:13'),
(3,'3333','Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love. Caramels marshmallow icing dessert candy canes I love soufflé I love toffee. Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon muffin I love carrot cake sugar plum dessert bonbon.\r\n\r\n','Black Forest','W0690034','White Cream Cake','images/2.png',5.0,36.00,35.00,'item',NULL,NULL,NULL,'N','2024-03-20 15:11:15'),
(4,'4444','Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love. Caramels marshmallow icing dessert candy canes I love soufflé I love toffee. Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon muffin I love carrot cake sugar plum dessert bonbon.\r\n\r\n','Black Forest','W0690034','White Cream Cake','images/3.png',5.0,36.00,35.00,'item',NULL,NULL,NULL,'N','2024-03-20 15:11:16'),
(5,'555','Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love. Caramels marshmallow icing dessert candy canes I love soufflé I love toffee. Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon muffin I love carrot cake sugar plum dessert bonbon.\r\n\r\n','Black Forest','W0690034','White Cream Cake','images/4.png',5.0,36.00,35.00,'item',NULL,NULL,NULL,'N','2024-03-20 15:11:18'),
(6,'6666','Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love. Caramels marshmallow icing dessert candy canes I love soufflé I love toffee. Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon muffin I love carrot cake sugar plum dessert bonbon.\r\n\r\n','Black Forest','W0690034','White Cream Cake','images/5.png',5.0,36.00,35.00,'item',NULL,NULL,NULL,'N','2024-03-20 15:11:19'),
(7,'77777','Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love. Caramels marshmallow icing dessert candy canes I love soufflé I love toffee. Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon muffin I love carrot cake sugar plum dessert bonbon.\r\n\r\n','Black Forest','W0690034','White Cream Cake','images/6.png',5.0,36.00,35.00,'item',NULL,NULL,NULL,'N','2024-03-20 15:11:22'),
(8,'8888','Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love. Caramels marshmallow icing dessert candy canes I love soufflé I love toffee. Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon muffin I love carrot cake sugar plum dessert bonbon.\r\n\r\n','Black Forest','W0690034','White Cream Cake','images/7.png',5.0,36.00,35.00,'item',NULL,NULL,NULL,'N','2024-03-20 15:11:25'),
(9,'99999','Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love. Caramels marshmallow icing dessert candy canes I love soufflé I love toffee. Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon muffin I love carrot cake sugar plum dessert bonbon.\r\n\r\n','Black Forest','W0690034','White Cream Cake','images/13.png',5.0,36.00,35.00,'item',NULL,NULL,NULL,'N','2024-03-20 15:11:30'),
(10,'aaaa','Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love. Caramels marshmallow icing dessert candy canes I love soufflé I love toffee. Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon muffin I love carrot cake sugar plum dessert bonbon.\r\n\r\n','Black Forest','W0690034','White Cream Cake','images/8.png',5.0,36.00,35.00,'item',NULL,NULL,NULL,'N','2024-03-20 15:11:33'),
(11,'bbbbb','Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love. Caramels marshmallow icing dessert candy canes I love soufflé I love toffee. Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon muffin I love carrot cake sugar plum dessert bonbon.\r\n\r\n','Black Forest','W0690034','White Cream Cake','images/15.png',5.0,36.00,35.00,'item',NULL,NULL,NULL,'N','2024-03-20 15:11:35'),
(12,'cccccc','Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love. Caramels marshmallow icing dessert candy canes I love soufflé I love toffee. Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon muffin I love carrot cake sugar plum dessert bonbon.\r\n\r\n','Black Forest','W0690034','White Cream Cake','images/16.png',5.0,36.00,35.00,'item',NULL,NULL,NULL,'N','2024-03-20 15:11:39'),
(13,'dddddd','Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love. Caramels marshmallow icing dessert candy canes I love soufflé I love toffee. Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon muffin I love carrot cake sugar plum dessert bonbon.\r\n\r\n','Black Forest','W0690034','White Cream Cake','images/3.png',5.0,36.00,35.00,'item',NULL,NULL,NULL,'N','2024-03-20 15:11:44'),
(14,'eeeee','Veniam inventore an','Imogene Williamson','Voluptatum molestias','Quaerat fugit cupid','images/13.png',2.0,561.00,155.00,'Ut est optio aliqui',NULL,NULL,NULL,'N','2024-03-20 15:11:46'),
(15,'ffffff','Sint iure voluptas e','Bernard Sutton','Autem facere totam t','Nobis et id rerum f','images/13.png',3.0,199.00,157.00,'In dolore nulla id b',NULL,NULL,NULL,'N','2024-03-20 15:11:51'),
(16,'gggggg','new test','sf','sdf','sfs','images/1sad.png',2.0,0.01,0.01,'123456',NULL,NULL,NULL,'N','2024-03-20 15:11:54');

UNLOCK TABLES;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `password` text NOT NULL,
  `del_flg` varchar(1) NOT NULL DEFAULT 'N',
  `entry_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

LOCK TABLES `users` WRITE;

insert  into `users`(`id`,`name`,`email`,`phone`,`password`,`del_flg`,`entry_date_time`) values 
(1,'test1','test1@test.com',NULL,'123456','N','2024-03-20 11:29:36'),
(2,'test2','test2@test.com',NULL,'123456','N','2024-03-20 11:29:36'),
(3,'test3','test3@test.com',NULL,'123456','N','2024-03-20 11:29:36'),
(4,'admin2','asdfsf',NULL,'$2y$10$TVWnI3zUT98U5UkPV5ZyoeaMww4nYjF8x.do69j.VaPktvPzFWzJa','N','2024-03-20 11:29:36');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
