-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2019 at 11:37 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `html_content` longtext CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `count` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `date` varchar(255) CHARACTER SET utf32 COLLATE utf32_persian_ci NOT NULL,
  `creator` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `visible_flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contents`
--


-- --------------------------------------------------------

--
-- Table structure for table `contents_del`
--

CREATE TABLE IF NOT EXISTS `contents_del` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `html_content` longtext CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `count` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `date` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `creator` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `visible_flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contents_del`
--


-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `logs`
--


-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `creator` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `visible_flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `menu_items`
--


-- --------------------------------------------------------

--
-- Table structure for table `menu_items2`
--

CREATE TABLE IF NOT EXISTS `menu_items2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `creator` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `visible_flag` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `content_id` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `menu_items2`
--


-- --------------------------------------------------------

--
-- Table structure for table `menu_items2_del`
--

CREATE TABLE IF NOT EXISTS `menu_items2_del` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `creator` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `visible_flag` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `content_id` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `menu_items2_del`
--


-- --------------------------------------------------------

--
-- Table structure for table `menu_items_del`
--

CREATE TABLE IF NOT EXISTS `menu_items_del` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `creator` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `visible_flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `menu_items_del`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `Name` varchar(500) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `Family` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(1024) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `sex` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `enable_flag` int(11) NOT NULL,
  `permission` int(11) NOT NULL,
  `date` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
