-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 20, 2013 at 03:47 ÖS
-- Server version: 5.5.31
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tksn`
--
CREATE DATABASE IF NOT EXISTS `tksn` DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci;
USE `tksn`;

-- --------------------------------------------------------

--
-- Table structure for table `kullanicilar`
--

CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `user_id` int(2) NOT NULL AUTO_INCREMENT,
  `kullanici_adi` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` int(20) NOT NULL,
  `uyelik_turu` smallint(2) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kullanicilar`
--

INSERT INTO `kullanicilar` (`user_id`, `kullanici_adi`, `sifre`, `uyelik_turu`) VALUES
(1, 'root', 12345, 0),
(2, 'arge', 12345, 1),
(3, 'depo', 12345, 2);

-- --------------------------------------------------------

--
-- Table structure for table `proje`
--

CREATE TABLE IF NOT EXISTS `proje` (
  `proje_id` int(3) NOT NULL AUTO_INCREMENT,
  `proje_ismi` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `proje_resmi` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `proje_tanimi` text COLLATE utf8_turkish_ci,
  PRIMARY KEY (`proje_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `proje`
--

INSERT INTO `proje` (`proje_id`, `proje_ismi`, `proje_resmi`, `proje_tanimi`) VALUES
(1, 'proje1', '', ''),
(2, 'proje1', 'images.jpeg', 'ne ilk ne son proje'),
(3, 'proje1', 'images.jpeg', 'ne ilk ne son proje'),
(4, 'proje1', 'images.jpeg', 'ne ilk ne son proje'),
(5, 'proje1', 'images.jpeg', 'ne ilk ne son proje'),
(6, 'proje1', 'images.jpeg', ''),
(7, 'proje1', 'images.jpeg', ''),
(8, 'proje1', 'images.jpeg', ''),
(9, 'poje2', 'images.jpeg', 'sadkaslşfa'),
(10, 'poje2', 'images.jpeg', 'sadkaslşfa'),
(11, 'poje2', 'images.jpeg', 'sadkaslşfa'),
(12, 'poje2', 'images.jpeg', 'sadkaslşfa'),
(13, 'poje2', 'images.jpeg', 'sadkaslşfa'),
(14, 'poje2', 'images.jpeg', 'sadkaslşfa'),
(15, 'poje2', 'images.jpeg', 'sadkaslşfa'),
(16, 'poje2', 'images.jpeg', 'sadkaslşfa'),
(17, 'poje2', 'images1.jpeg', 'sadkaslşfa'),
(18, 'poje2', 'images2.jpeg', 'sadkaslşfa');

-- --------------------------------------------------------

--
-- Table structure for table `uyelik_turu`
--

CREATE TABLE IF NOT EXISTS `uyelik_turu` (
  `tip_id` int(3) NOT NULL AUTO_INCREMENT,
  `uyelik_turu` smallint(3) NOT NULL,
  `uyelik_tanimi` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`tip_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `uyelik_turu`
--

INSERT INTO `uyelik_turu` (`tip_id`, `uyelik_turu`, `uyelik_tanimi`) VALUES
(1, 0, 'Admin'),
(2, 1, 'Arge'),
(3, 2, 'Depo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
