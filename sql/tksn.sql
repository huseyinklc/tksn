-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 23, 2013 at 03:05 ÖS
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
-- Table structure for table `dokuman`
--

CREATE TABLE IF NOT EXISTS `dokuman` (
  `dokuman_id` smallint(3) NOT NULL AUTO_INCREMENT,
  `dokuman_ismi` text COLLATE utf8_turkish_ci NOT NULL,
  `documan_turu` text COLLATE utf8_turkish_ci NOT NULL,
  `proje_id` int(3) NOT NULL,
  PRIMARY KEY (`dokuman_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `eleman`
--

CREATE TABLE IF NOT EXISTS `eleman` (
  `eleman_id` mediumint(6) NOT NULL AUTO_INCREMENT,
  `eleman_kodu` mediumint(6) NOT NULL,
  `firma_id` smallint(3) NOT NULL,
  `eleman_turu_id` tinyint(2) NOT NULL,
  `resim` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `kilif_id` tinyint(2) NOT NULL,
  `ozellik` text COLLATE utf8_turkish_ci NOT NULL,
  `dokuman` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `adet` int(10) NOT NULL,
  `numune` tinyint(1) NOT NULL,
  PRIMARY KEY (`eleman_id`),
  UNIQUE KEY `eleman_kodu` (`eleman_kodu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `eleman_turu`
--

CREATE TABLE IF NOT EXISTS `eleman_turu` (
  `id` tinyint(3) NOT NULL DEFAULT '0',
  `eleman_turu` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `firma`
--

CREATE TABLE IF NOT EXISTS `firma` (
  `firma_id` smallint(3) NOT NULL AUTO_INCREMENT,
  `firma_ismi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `tel` varchar(12) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `adres` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`firma_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kilif`
--

CREATE TABLE IF NOT EXISTS `kilif` (
  `id` smallint(3) NOT NULL AUTO_INCREMENT,
  `kilif_tipi` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `proje`
--

INSERT INTO `proje` (`proje_id`, `proje_ismi`, `proje_resmi`, `proje_tanimi`) VALUES
(1, 'proje1', 'images.jpeg', '1'),
(2, 'proje2', 'images.jpeg', '2'),
(3, 'proje3', 'images.jpeg', '3'),
(4, 'proje4', 'images.jpeg', '4'),
(5, 'proje5', 'images.jpeg', '5'),
(6, 'proje6', 'images.jpeg', 'proje id = 6'),
(7, 'proje7', 'images.jpeg', 'bu yedinci proje');

-- --------------------------------------------------------

--
-- Table structure for table `proje_eleman_id`
--

CREATE TABLE IF NOT EXISTS `proje_eleman_id` (
  `proje_eleman_id` mediumint(5) NOT NULL AUTO_INCREMENT,
  `proje_id` smallint(3) NOT NULL,
  `eleman_id` mediumint(5) NOT NULL,
  PRIMARY KEY (`proje_eleman_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sema`
--

CREATE TABLE IF NOT EXISTS `sema` (
  `sema_id` mediumint(2) NOT NULL AUTO_INCREMENT,
  `sema_ismi` text COLLATE utf8_turkish_ci NOT NULL,
  `proje_id` mediumint(2) NOT NULL,
  PRIMARY KEY (`sema_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

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
