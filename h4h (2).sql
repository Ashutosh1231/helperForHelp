-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 20, 2024 at 11:04 AM
-- Server version: 5.7.40
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `h4h`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE IF NOT EXISTS `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mobile` (`mobile`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `mobile_2` (`mobile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `status`) VALUES
(1, 'Akola', 1),
(2, 'Nashik', 0),
(3, 'Jalgaon', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `address` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int(11) NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile1` bigint(20) NOT NULL,
  `whatsapp1` tinyint(4) NOT NULL,
  `mobile2` bigint(20) NOT NULL,
  `whatsapp2` tinyint(4) NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `mname`, `lname`, `gender`, `birth_date`, `address`, `city`, `pincode`, `email`, `mobile1`, `whatsapp1`, `mobile2`, `whatsapp2`, `password`, `status`) VALUES
(1, 'Nikhil', 'Suresh', 'Rajhans', 'M', '1983-05-26', 'Congress Nagar, Post Colony, Near Trivenidham Temple', 'Akola', 444004, 'nikhil.rajhans@gmail.com', 9881141507, 1, 8380046246, 1, 'umbrella', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_addresses`
--

DROP TABLE IF EXISTS `customer_addresses`;
CREATE TABLE IF NOT EXISTS `customer_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `address` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_payments`
--

DROP TABLE IF EXISTS `customer_payments`;
CREATE TABLE IF NOT EXISTS `customer_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `mode` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `txn_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` float(8,2) NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ts` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_services`
--

DROP TABLE IF EXISTS `customer_services`;
CREATE TABLE IF NOT EXISTS `customer_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `service_city_id` int(11) NOT NULL,
  `sgo_options` int(11) NOT NULL,
  `detailed_pricing` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `address` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `ts` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_subscription`
--

DROP TABLE IF EXISTS `customer_subscription`;
CREATE TABLE IF NOT EXISTS `customer_subscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `price` float(8,2) NOT NULL,
  `discount` float(8,2) NOT NULL,
  `total_price` float(8,2) NOT NULL,
  `max_replacements` int(11) NOT NULL,
  `replacements_used` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL,
  `ts` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_subscription`
--

INSERT INTO `customer_subscription` (`id`, `customer_id`, `subscription_id`, `start_date`, `end_date`, `price`, `discount`, `total_price`, `max_replacements`, `replacements_used`, `status`, `ts`) VALUES
(1, 1, 2, '2024-02-14', '2025-02-14', 1500.00, 300.00, 1200.00, 6, 0, 1, '2024-02-14 12:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_desc` text COLLATE utf8mb4_unicode_ci,
  `features` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `short_desc`, `long_desc`, `features`, `status`) VALUES
(1, 'Brooming', 'akldfj kkasldjfdskf&lt;b&gt; jdkfdjf&lt;/b&gt; kfjkdfjdksfjdskfjskfk&amp;nbsp;', 'aksdfjdkfj kdjfdkjkl kdjfkdjfdkfj &lt;b&gt;&lt;i&gt;kdfjkdjfkdj&lt;/i&gt;&lt;/b&gt;', '&lt;span style=&quot;color:rgb(255,0,0);&quot;&gt;dkfjdkfj&lt;/span&gt; dfkdjfkdjfdk dfkjdkfjdfkjk&amp;nbsp; kdfjdkfjdkfjdk', 1),
(2, 'Moping', '&lt;u&gt;akldfj kkasldjfdskf&lt;/u&gt;&lt;b&gt; jdkfdjf&lt;/b&gt; kfjkdfjdksfjdskfjskfk&amp;nbsp;', 'aksdfjdkfj kdjfdkjkl kdjfkdjfdkfj &lt;i style=&quot;&quot;&gt;kdfjkdjfkdj&lt;/i&gt;', '&lt;span style=&quot;color:rgb(255,0,0);&quot;&gt;dkfjdkfj&lt;/span&gt; dfkdjfkdjfdk dfkjdkfjdfkjk&amp;nbsp; &lt;b&gt;kdfjdkfjdkfjdk&lt;/b&gt;', 1),
(3, 'Cooking', '&lt;span style=&quot;color: rgb(0, 0, 0); font-family: Poppins, sans-serif; font-size: 20px; letter-spacing: -0.3px; white-space-collapse: preserve-breaks;&quot;&gt;Cooks Experienced for Home Style Cooking!&lt;/span&gt;', '&lt;span style=&quot;color: rgb(41, 41, 51); font-family: Poppins, sans-serif; font-size: 16px; white-space-collapse: preserve-breaks;&quot;&gt;Are you looking for a way to get rid of the pain that comes with eating the same dishes twice a week? Look no further, as we provide the best solution to your cooking needs. Our highly skilled and experienced cooks are ready to tantalize your taste senses and cater to your ever-changing moods. With their cooking expertise, you may enjoy wonderful foods without having to worry about food preparation.Whether you need help with kitchen organizing, food shopping, or creating an altered menu, our cooks&amp;nbsp;are available to assist. Our cooks will give you&amp;nbsp;the comforts of home-cooked meals, whether you crave a mouthwatering morning spread, a hearty three-course meal, or simply an&amp;nbsp;evening snack.What distinguishes our service is the ability to adapt your delicious food experience to your health habits and food preferences. Whether you have specific spice level preferences or require salt content modifications, our cooks will personalize each meal to your individual needs. So don&#039;t put it off any longer. Make a booking today and treat yourself to delicious food in the comfort of your own home, all at an affordable price.&lt;/span&gt;', 'ab', 1),
(4, 'Baby Care Taker', '&lt;p class=&quot;MsoNormal&quot;&gt;&lt;span style=&quot;background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;&quot;&gt;&lt;span style=&quot;white-space-collapse: preserve-breaks;&quot;&gt;*Japa maids areexperts who take care of new born babies and mothers and help with food,bathing, massages, etc.&lt;/span&gt;&lt;o:p&gt;&lt;/o:p&gt;&lt;/p&gt;', '&lt;span style=&quot;color: rgb(41, 41, 51); font-family: Poppins, sans-serif; font-size: 16px; white-space-collapse: preserve-breaks;&quot;&gt;If you&#039;re looking for a nanny or Japa services in Delhi, we&#039;re here to help. As a leading babysitter agency in Delhi, we provide all kinds of babysitting services. Whether you want someone to look after your child while you work or want peace of mind knowing that your little one is being looked after, we can help. We offer our services not only to families in Delhi but also in other cities such as Gurgaon.Our professional and experienced nannies in Delhi will take care of any task that comes their way with ease and comfortability. They are Experienced to handle every situation that may come their way, whether it be feeding time or bath time. The best part is that you can rest assured that your child will be safe with them because they have been thoroughly screened before being hired. This means that your children&#039;s safety is guaranteed! Our nanny services in Delhi have years of experience working with children of all ages in various settings&mdash;from homes to schools to daycares&mdash;and they are always up-to-date on the latest child development methods. They love what they do, and it shows!Our nannies are educated in current methods to ensure your kids are content and well-cared-for. They have an eye for detail. They&#039;ll be sure to keep an eye on your child at all times so that you can focus on other things without worrying about their well-being.&lt;/span&gt;', 'ab', 1),
(5, 'All Rounder', 'All house works&amp;nbsp;', 'Will be available for the whole day', 'ab', 1),
(6, '24 Hrs - Live In', 'Home Maid 24/7 available&amp;nbsp;', 'All sort of work included', 'ab', 1),
(7, 'House Maid', 'Book a professional housekeeper for your daily chores', '&lt;p&gt;&lt;b&gt;Are you looking for the best online maid service in town?&lt;/b&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;We&#039;ve got you covered if you&#039;re looking for an online maid service! We have over two years of experience in the industry and have helped hundreds of customers like yourself find their perfect maids.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;We provide everything from help with dusting to cleaning, from basic cooking to more specialized services like housekeeping or babysitters. Our goal is to give our clients peace of mind knowing that whatever they need is taken care of by our team of professionals who are Experienced and certified to provide the highest level of customer service possible.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;So many of us have found ourselves in a bind when we need someone to help around the house, and we can&#039;t be bothered with the hassle of going out and hiring someone. The thought of having strangers enter our homes makes us nervous, and we don&#039;t know how much they&#039;ll cost or how reliable they will be.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;But that&#039;s no longer a concern for you! You can hire seasoned housekeepers through our online maid service for little to no money to come in and take care of your home. You can even set up recurring payments to ensure you never need to be concerned about looking for work again when one arises.&lt;/p&gt;', 'a&lt;p&gt;b&lt;/p&gt;&lt;p&gt;c&lt;/p&gt;&lt;p&gt;d&lt;/p&gt;', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_city`
--

DROP TABLE IF EXISTS `service_city`;
CREATE TABLE IF NOT EXISTS `service_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `base_price` float(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_city`
--

INSERT INTO `service_city` (`id`, `service_id`, `city_id`, `base_price`, `status`) VALUES
(1, 1, 1, 600.00, 1),
(2, 1, 2, 800.00, 1),
(3, 1, 3, 1000.00, 1),
(4, 3, 1, 3000.00, 1),
(5, 7, 1, 2500.00, 1),
(6, 7, 2, 3000.00, 1),
(7, 7, 3, 2500.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_worker`
--

DROP TABLE IF EXISTS `service_worker`;
CREATE TABLE IF NOT EXISTS `service_worker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `worker_id` int(11) NOT NULL,
  `service_city_id` int(11) NOT NULL,
  `sgo_options` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sgo`
--

DROP TABLE IF EXISTS `sgo`;
CREATE TABLE IF NOT EXISTS `sgo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_city_id` int(11) NOT NULL,
  `name` varchar(738) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `service_id` (`service_city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sgo`
--

INSERT INTO `sgo` (`id`, `service_city_id`, `name`, `status`) VALUES
(1, 1, 'Gender', 1),
(2, 1, 'House Area', 1),
(3, 1, 'Do you have dogs ?', 1),
(4, 4, 'Gender', 1),
(5, 5, 'Select House Size', 1),
(6, 5, 'How many floors ?', 1),
(7, 5, 'Do  you have dogs ?', 1),
(8, 5, '3 BHK (more than 2000 sq.ft.)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sgo_options`
--

DROP TABLE IF EXISTS `sgo_options`;
CREATE TABLE IF NOT EXISTS `sgo_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sgo_id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sgo_options`
--

INSERT INTO `sgo_options` (`id`, `sgo_id`, `name`, `price`, `status`) VALUES
(1, 1, 'Male', 0.00, 1),
(2, 1, 'Female', 0.00, 1),
(3, 1, 'Trans', 0.00, 0),
(4, 2, 'Sq Foot', 1.00, 1),
(5, 5, '1 BHK', 0.00, 1),
(6, 5, '2 BHK', 0.00, 1),
(7, 5, '3 BHK (less than 2000 sq.ft.)', 500.00, 1),
(8, 5, '3 BHK (more than 2000 sq.ft.)', 1000.00, 1),
(9, 5, '4 BHK (less than 3000 sq.ft.)', 1000.00, 1),
(10, 5, '4 BHK (more than 3000 sq.ft.)', 2000.00, 1),
(11, 5, '5 BHK', 2250.00, 1),
(12, 5, '6 BHK', 2750.00, 1),
(13, 6, '1 floor only', 0.00, 1),
(14, 6, '2 floors', 0.00, 1),
(15, 6, '3 floors', 0.00, 1),
(16, 6, '4 floors', 0.00, 1),
(17, 7, 'Yes', 0.00, 1),
(18, 7, 'No', 0.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plan`
--

DROP TABLE IF EXISTS `subscription_plan`;
CREATE TABLE IF NOT EXISTS `subscription_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `replacements` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_plan`
--

INSERT INTO `subscription_plan` (`id`, `name`, `city_id`, `duration`, `replacements`, `price`, `status`) VALUES
(1, 'Silver', '1', 6, 3, 1000.00, 1),
(2, 'Gold', '1,3', 12, 6, 1500.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

DROP TABLE IF EXISTS `worker`;
CREATE TABLE IF NOT EXISTS `worker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_address` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `police_verification` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_verification` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photoid_verification` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_id` int(11) DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `subscription_status` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `worker_allocation`
--

DROP TABLE IF EXISTS `worker_allocation`;
CREATE TABLE IF NOT EXISTS `worker_allocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `worker_id` int(11) NOT NULL,
  `customer_service_id` int(11) NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `ts` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `worker_payments`
--

DROP TABLE IF EXISTS `worker_payments`;
CREATE TABLE IF NOT EXISTS `worker_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `worker_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `mode` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `txn_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` float(8,2) NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ts` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `worker_subscription_plan`
--

DROP TABLE IF EXISTS `worker_subscription_plan`;
CREATE TABLE IF NOT EXISTS `worker_subscription_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `services` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ts` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `worker_subscription_plan`
--

INSERT INTO `worker_subscription_plan` (`id`, `name`, `city_id`, `duration`, `price`, `services`, `status`, `ts`) VALUES
(1, 'Bronze', '1,2,3', 12, 500.00, '1,2', 0, '2024-02-12 19:37:51');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
