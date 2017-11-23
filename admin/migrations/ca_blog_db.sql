-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for ca_blog
CREATE DATABASE IF NOT EXISTS `ca_blog` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_lithuanian_ci */;
USE `ca_blog`;

-- Dumping structure for table ca_blog.admin_menu
CREATE TABLE IF NOT EXISTS `admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_lithuanian_ci DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8_lithuanian_ci DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

-- Dumping data for table ca_blog.admin_menu: 5 rows
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` (`id`, `title`, `slug`) VALUES
	(1, 'Pages', 'page'),
	(2, 'Blog', 'blog'),
	(3, 'Banners', 'banner'),
	(4, 'Users', 'user'),
	(5, 'Home', 'home');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;

-- Dumping structure for table ca_blog.banners
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `link` varchar(300) COLLATE utf8_bin NOT NULL,
  `image` varchar(300) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table ca_blog.banners: 4 rows
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` (`id`, `name`, `link`, `image`) VALUES
	(1, 'Delfi', 'http://delfi.lt', 'https://static1.squarespace.com/static/55df40dae4b016fc7870b045/t/55f7273de4b0e6c5fe721e33/1442260799088/visitus.png'),
	(2, '15min', 'https://15min.lt\r\n', 'https://static1.squarespace.com/static/55df40dae4b016fc7870b045/t/55f7273de4b0e6c5fe721e33/1442260799088/visitus.png'),
	(3, 'Code Academy', 'http://codeacademy.lt', 'https://static1.squarespace.com/static/55df40dae4b016fc7870b045/t/55f7273de4b0e6c5fe721e33/1442260799088/visitus.png'),
	(4, 'Php', 'https://php.net', 'https://static1.squarespace.com/static/55df40dae4b016fc7870b045/t/55f7273de4b0e6c5fe721e33/1442260799088/visitus.png');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;

-- Dumping structure for table ca_blog.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `body` text COLLATE utf8_bin NOT NULL,
  `slug` varchar(255) COLLATE utf8_bin NOT NULL,
  `isPage` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table ca_blog.pages: 6 rows
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`id`, `title`, `body`, `slug`, `isPage`) VALUES
	(1, 'Home', 'Welcome to our webpage! if you would like to create some post\'s in BLOG you should LOGIN/REGISTER first!', '', 1),
	(2, 'contacts', 'Our contacts: 432423423', '', 1),
	(3, 'Blog', 'Blog', '', 0),
	(5, 'Login', 'Auth', '', 2),
	(6, 'Register', 'Auth/regForm', '', 2),
	(7, 'Logout', 'Auth/logout', '', 3);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;

-- Dumping structure for table ca_blog.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `body` text COLLATE utf8_bin NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table ca_blog.posts: 7 rows
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `title`, `body`, `date`) VALUES
	(1, 'The Fellowship of the Ring is comming!', 'Lorem ring dolor sit amet, consectetur adipiscing elit. Sed eget justo at augue ultricies semper id et ipsum. Integer a mi est. In non nunc sed sapien dapibus rhoncus. Donec id scelerisque velit. Quisque rhoncus diam id ante dapibus, nec efficitur nisl feugiat. Curabitur sed posuere augue, vitae sagittis tortor. Sed in accumsan augue, eget volutpat ante. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec venenatis sodales purus, vel consequat felis fermentum ac. Nullam nisi dui, pharetra at mauris eget, porttitor aliquam lectus.\n\nVivamus sollicitudin est at erat elementum, vitae dignissim libero semper. Sed consequat venenatis neque id dictum. Donec sit amet eleifend mi. Proin et condimentum sem. Nam finibus dolor ut ex congue, eu ultrices arcu rhoncus. Praesent sed tortor massa. Integer finibus urna eu eros finibus scelerisque. Mauris vulputate venenatis tellus sed mollis. Ut venenatis tortor nisi, sit amet tincidunt elit gravida dictum.', '2017-11-14 14:46:57'),
	(2, 'Gandalf has died!', 'Haha\n', '2017-11-14 14:46:57'),
	(3, 'Third post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget justo at augue ultricies semper id et ipsum. Integer a mi est. In non nunc sed sapien dapibus rhoncus. Donec id scelerisque velit. Quisque rhoncus diam id ante dapibus, nec efficitur nisl feugiat. Curabitur sed posuere augue, vitae sagittis tortor. Sed in accumsan augue, eget volutpat ante. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec venenatis sodales purus, vel consequat felis fermentum ac. Nullam nisi dui, pharetra at mauris eget, porttitor aliquam lectus.\n\nVivamus sollicitudin est at erat elementum, vitae dignissim libero semper. Sed consequat venenatis neque id dictum. Donec sit amet eleifend mi. Proin et condimentum sem. Nam finibus dolor ut ex congue, eu ultrices arcu rhoncus. Praesent sed tortor massa. Integer finibus urna eu eros finibus scelerisque. Mauris vulputate venenatis tellus sed mollis. Ut venenatis tortor nisi, sit amet tincidunt elit gravida dictum.', '2017-11-14 14:47:27'),
	(4, 'Third post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget justo at augue ultricies semper id et ipsum. Integer a mi est. In non nunc sed sapien dapibus rhoncus. Donec id scelerisque velit. Quisque rhoncus diam id ante dapibus, nec efficitur nisl feugiat. Curabitur sed posuere augue, vitae sagittis tortor. Sed in accumsan augue, eget volutpat ante. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec venenatis sodales purus, vel consequat felis fermentum ac. Nullam nisi dui, pharetra at mauris eget, porttitor aliquam lectus.\n\nVivamus sollicitudin est at erat elementum, vitae dignissim libero semper. Sed consequat venenatis neque id dictum. Donec sit amet eleifend mi. Proin et condimentum sem. Nam finibus dolor ut ex congue, eu ultrices arcu rhoncus. Praesent sed tortor massa. Integer finibus urna eu eros finibus scelerisque. Mauris vulputate venenatis tellus sed mollis. Ut venenatis tortor nisi, sit amet tincidunt elit gravida dictum.', '2017-11-14 14:47:27'),
	(5, 'Third post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget justo at augue ultricies semper id et ipsum. Integer a mi est. In non nunc sed sapien dapibus rhoncus. Donec id scelerisque velit. Quisque rhoncus diam id ante dapibus, nec efficitur nisl feugiat. Curabitur sed posuere augue, vitae sagittis tortor. Sed in accumsan augue, eget volutpat ante. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec venenatis sodales purus, vel consequat felis fermentum ac. Nullam nisi dui, pharetra at mauris eget, porttitor aliquam lectus.\n\nVivamus sollicitudin est at erat elementum, vitae dignissim libero semper. Sed consequat venenatis neque id dictum. Donec sit amet eleifend mi. Proin et condimentum sem. Nam finibus dolor ut ex congue, eu ultrices arcu rhoncus. Praesent sed tortor massa. Integer finibus urna eu eros finibus scelerisque. Mauris vulputate venenatis tellus sed mollis. Ut venenatis tortor nisi, sit amet tincidunt elit gravida dictum.', '2017-11-14 14:47:27'),
	(6, 'Third post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget justo at augue ultricies semper id et ipsum. Integer a mi est. In non nunc sed sapien dapibus rhoncus. Donec id scelerisque velit. Quisque rhoncus diam id ante dapibus, nec efficitur nisl feugiat. Curabitur sed posuere augue, vitae sagittis tortor. Sed in accumsan augue, eget volutpat ante. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec venenatis sodales purus, vel consequat felis fermentum ac. Nullam nisi dui, pharetra at mauris eget, porttitor aliquam lectus.\n\nVivamus sollicitudin est at erat elementum, vitae dignissim libero semper. Sed consequat venenatis neque id dictum. Donec sit amet eleifend mi. Proin et condimentum sem. Nam finibus dolor ut ex congue, eu ultrices arcu rhoncus. Praesent sed tortor massa. Integer finibus urna eu eros finibus scelerisque. Mauris vulputate venenatis tellus sed mollis. Ut venenatis tortor nisi, sit amet tincidunt elit gravida dictum.', '2017-11-14 14:47:27'),
	(7, 'Third post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget justo at augue ultricies semper id et ipsum. Integer a mi est. In non nunc sed sapien dapibus rhoncus. Donec id scelerisque velit. Quisque rhoncus diam id ante dapibus, nec efficitur nisl feugiat. Curabitur sed posuere augue, vitae sagittis tortor. Sed in accumsan augue, eget volutpat ante. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec venenatis sodales purus, vel consequat felis fermentum ac. Nullam nisi dui, pharetra at mauris eget, porttitor aliquam lectus.\n\nVivamus sollicitudin est at erat elementum, vitae dignissim libero semper. Sed consequat venenatis neque id dictum. Donec sit amet eleifend mi. Proin et condimentum sem. Nam finibus dolor ut ex congue, eu ultrices arcu rhoncus. Praesent sed tortor massa. Integer finibus urna eu eros finibus scelerisque. Mauris vulputate venenatis tellus sed mollis. Ut venenatis tortor nisi, sit amet tincidunt elit gravida dictum.', '2017-11-14 14:47:27');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table ca_blog.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_lithuanian_ci DEFAULT NULL,
  `password` text COLLATE utf8_lithuanian_ci,
  `level` int(11) DEFAULT '1',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

-- Dumping data for table ca_blog.users: 2 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
	(3, 'admin', '$2y$10$NEBLcfbzTcM3bxck.5NMp.YXI4bgSvOCuKrNPYkF41lpOg.k6FI4O', 2),
	(5, 'test', '$2y$10$yLO7j7ICJZ7GB.xOD1LLp.WHQR8ro7K9QoOB1jCnqyQYt6M89NePe', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
