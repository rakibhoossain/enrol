-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 21, 2019 at 03:52 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `code` int(4) NOT NULL,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`code`, `name`) VALUES
(1, 'BAGERHAT'),
(3, 'BANDARBAN'),
(4, 'BARGUNA'),
(6, 'BARISAL'),
(9, 'BHOLA'),
(10, 'BOGRA'),
(12, 'BRAHMANBARIA'),
(13, 'CHANDPUR'),
(70, 'CHAPAINAWABGANJ'),
(15, 'CHITTAGONG'),
(18, 'CHUADANGA'),
(19, 'COMILLA'),
(22, 'COX\'S BAZAR'),
(26, 'DHAKA'),
(27, 'DINAJPUR'),
(29, 'FARIDPUR'),
(30, 'FENI'),
(32, 'GAIBANDHA'),
(33, 'GAZIPUR'),
(35, 'GOPALGANJ'),
(36, 'HABIGANJ'),
(39, 'JAMALPUR'),
(41, 'JESSORE'),
(42, 'JHALAKATI'),
(44, 'JHENAIDAH'),
(38, 'JOYPURHAT'),
(46, 'KHAGRACHHARI'),
(47, 'KHULNA'),
(48, 'KISHOREGANJ'),
(49, 'KURIGRAM'),
(50, 'KUSHTIA'),
(51, 'LAKSHMIPUR'),
(52, 'LALMONIRHAT'),
(54, 'MADARIPUR'),
(55, 'MAGURA'),
(56, 'MANIKGANJ'),
(57, 'MEHERPUR'),
(58, 'MOULVIBAZAR'),
(59, 'MUNSHIGANJ'),
(61, 'MYMENSINGH'),
(64, 'NAOGAON'),
(65, 'NARAIL'),
(67, 'NARAYANGANJ'),
(68, 'NARSINGDI'),
(69, 'NATORE'),
(72, 'NETROKONA'),
(73, 'NILPHAMARI'),
(75, 'NOAKHALI'),
(76, 'PABNA'),
(77, 'PANCHAGARH'),
(78, 'PATUAKHALI'),
(79, 'PIROJPUR'),
(82, 'RAJBARI'),
(81, 'RAJSHAHI'),
(84, 'RANGAMATI'),
(85, 'RANGPUR'),
(87, 'SATKHIRA'),
(86, 'SHARIATPUR'),
(89, 'SHERPUR'),
(88, 'SIRAJGANJ'),
(90, 'SUNAMGANJ'),
(91, 'SYLHET'),
(93, 'TANGAIL'),
(94, 'THAKURGAON');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

DROP TABLE IF EXISTS `mark`;
CREATE TABLE IF NOT EXISTS `mark` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `roll` int(10) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `term` varchar(25) NOT NULL,
  `year` int(5) NOT NULL,
  `theory` int(5) NOT NULL,
  `practical` int(5) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`id`, `roll`, `subject`, `term`, `year`, `theory`, `practical`, `comment`) VALUES
(16, 8999, 'Physics', '1st', 2016, 75, 18, 'good'),
(15, 555, 'Physics', '1st', 2014, 57, 0, ''),
(14, 824, 'Physics', '1st', 2014, 57, 17, ''),
(13, 8999, 'Physics', '1st', 2014, 75, 0, 'good'),
(11, 2410, 'Math', '1st', 2016, 67, 0, 'well'),
(12, 23, 'Math', '1st', 2016, 57, 0, 'good'),
(10, 2400, 'Math', '1st', 2016, 57, 0, 'nice'),
(9, 2000, 'Math', '1st', 2016, 75, 0, 'good'),
(17, 824, 'Physics', '1st', 2016, 57, 20, 'good');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `roll` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `class` varchar(100) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `gender` varchar(7) NOT NULL,
  `birth_date` text NOT NULL,
  `city` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roll` (`roll`),
  UNIQUE KEY `roll_2` (`roll`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `roll`, `name`, `class`, `subject`, `gender`, `birth_date`, `city`, `address`, `phone`, `email`) VALUES
(78, 5552, 'Jahana', 'Twelve', 'Science', 'Male', '06/06/2017', 'NETROKONA', 'test', '2147483647', 'serakib@gmail.com'),
(71, 8240, 'Rakib', 'Hons.', 'BENGALI', 'Male', '12/03/1996', 'SIRAJGANJ', 'dbn', '34570000', 'fgsdfgd@vdsddd.com'),
(82, 8960, 'Abdul', 'Hons. Prof.', 'BSc in CSE', 'Male', '06/13/1996', 'SIRAJGANJ', 'Kazipura, Sirajganj', '1889653236', 'admin@gmail.com'),
(81, 8962, 'Jahana', 'Eleven', 'Science', 'Female', '06/05/2017', 'SIRAJGANJ', '23e3e4qq', '2147483647', 'fgsdfgd@vdsddd.com'),
(84, 5013, 'Rakib Hossain', 'Eleven', 'Science', 'Male', '14-08-2019', 'SIRAJGANJ', 'Ullapara,f', '1776217594', 'serakib@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sub_code` varchar(100) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `sub_class` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sub_code` (`sub_code`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `sub_code`, `sub_name`, `sub_class`) VALUES
(10, '1001', 'BENGALI', 'HONOURS'),
(11, '1101', 'ENGLISH', 'HONOURS'),
(12, '1201', 'ARABIC', 'HONOURS'),
(13, '1501', 'HISTORY', 'HONOURS'),
(14, '1601', 'ISLAMIC HISTORY & CULTURE', 'HONOURS'),
(15, '1701', 'PHILOSOPHY', 'HONOURS'),
(16, '1801', 'ISLAMIC STUDIES', 'HONOURS'),
(17, '1901', 'POLITICAL SCIENCE', 'HONOURS'),
(18, '2001', 'SOCIOLOGY', 'HONOURS'),
(19, '2101', 'SOCIAL WORK', 'HONOURS'),
(20, '2201', 'ECONOMICS', 'HONOURS'),
(21, '2301', 'MARKETING', 'HONOURS'),
(22, '2401', 'FINANCE & BANKING', 'HONOURS'),
(23, '2501', 'ACCOUNTING', 'HONOURS'),
(24, '2601', 'MANAGEMENT', 'HONOURS'),
(25, '2701', 'PHYSICS', 'HONOURS'),
(26, '2801', 'CHEMISTRY', 'HONOURS'),
(27, '2901', 'BIO CHEMISTRY', 'HONOURS'),
(28, '3001', 'BOTANY', 'HONOURS'),
(29, '3101', 'ZOOLOGY', 'HONOURS'),
(30, '3201', 'GEOGRAPHY', 'HONOURS'),
(31, '3301', 'SOIL SCIENCE', 'HONOURS'),
(32, '3401', 'PSYCHOLOGY', 'HONOURS'),
(33, '3501', 'HOME ECONOMICS', 'HONOURS'),
(34, '3601', 'STATISTICS', 'HONOURS'),
(35, '3701', 'ATHEMATICS', 'HONOURS'),
(36, '3801', 'BRARY AND INFORMATION SCIENCE', 'HONOURS'),
(37, '3901', 'ACHELOR OF EDUCATION', 'HONOURS'),
(38, '4001', 'ANTHROPOLOGY', 'HONOURS'),
(39, '4101', 'PUBLIC ADMINISTRATION', 'HONOURS'),
(40, '4201', 'COMPUTER SCIENCE', 'HONOURS'),
(41, '4301', 'BUSINESS ADMINISTRATION', 'HONOURS'),
(42, '4401', 'ENVIRONMENTAL SCIENCES', 'HONOURS');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(15) NOT NULL,
  `l_name` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` int(13) NOT NULL,
  `role` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
