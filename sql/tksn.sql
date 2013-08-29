-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 29, 2013 at 10:54 ÖÖ
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
-- Table structure for table `adet`
--

CREATE TABLE IF NOT EXISTS `adet` (
  `adet_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `depo_adet` int(8) NOT NULL,
  `arge_adet` int(8) NOT NULL,
  `eleman_saklama_durumu_id` smallint(2) NOT NULL,
  PRIMARY KEY (`adet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

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
  `eleman_kodu` mediumint(10) NOT NULL,
  `firma_id` smallint(3) NOT NULL,
  `eleman_turu_id` tinyint(2) NOT NULL,
  `resim` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `kilif_id` tinyint(2) NOT NULL,
  `ozellik` varchar(10000) COLLATE utf8_turkish_ci NOT NULL,
  `dokuman` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `adet_id` int(10) NOT NULL,
  `numune` tinyint(1) NOT NULL,
  PRIMARY KEY (`eleman_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `eleman`
--

INSERT INTO `eleman` (`eleman_id`, `eleman_kodu`, `firma_id`, `eleman_turu_id`, `resim`, `kilif_id`, `ozellik`, `dokuman`, `adet_id`, `numune`) VALUES
(19, 300, 3, 3, '', 1, 'daslmasşlmdşalsmdşlasmdşlasmdşlasmdşlasmşldmsşalmdsaşl', '', 226, 1),
(20, 300, 3, 3, '', 1, 'daslmasşlmdşalsmdşlasmdşlasmdşlasmdşlasmşldmsşalmdsaşl', '', 226, 1),
(21, 300, 3, 3, '', 1, 'daslmasşlmdşalsmdşlasmdşlasmdşlasmdşlasmşldmsşalmdsaşl', '', 226, 1),
(22, 300, 3, 3, '', 1, 'daslmasşlmdşalsmdşlasmdşlasmdşlasmdşlasmşldmsşalmdsaşl', '', 226, 1),
(23, 300, 3, 3, '', 1, 'daslmasşlmdşalsmdşlasmdşlasmdşlasmdşlasmşldmsşalmdsaşl', '', 226, 1),
(24, 300, 3, 3, '', 1, 'daslmasşlmdşalsmdşlasmdşlasmdşlasmdşlasmşldmsşalmdsaşl', '', 226, 1),
(25, 300, 3, 3, '', 1, 'daslmasşlmdşalsmdşlasmdşlasmdşlasmdşlasmşldmsşalmdsaşl', '', 226, 1),
(26, 300, 3, 3, '', 1, 'daslmasşlmdşalsmdşlasmdşlasmdşlasmdşlasmşldmsşalmdsaşl', '', 226, 1),
(27, 300, 3, 3, '', 1, 'daslmasşlmdşalsmdşlasmdşlasmdşlasmdşlasmşldmsşalmdsaşl', '', 226, 1),
(28, 300, 3, 3, '', 1, 'daslmasşlmdşalsmdşlasmdşlasmdşlasmdşlasmşldmsşalmdsaşl', '', 226, 1),
(29, 300, 3, 3, '', 1, 'daslmasşlmdşalsmdşlasmdşlasmdşlasmdşlasmşldmsşalmdsaşl', '', 226, 1),
(30, 300, 3, 3, '', 1, 'daslmasşlmdşalsmdşlasmdşlasmdşlasmdşlasmşldmsşalmdsaşl', '', 226, 1),
(32, 13, 4, 6, '', 3, 'Çok fazla özellik anlatsam inanmazsın..', '', 500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `eleman_saklama_durumu`
--

CREATE TABLE IF NOT EXISTS `eleman_saklama_durumu` (
  `eleman_saklama_durumu_id` smallint(2) NOT NULL AUTO_INCREMENT,
  `saklama_durumu` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`eleman_saklama_durumu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `eleman_turu`
--

CREATE TABLE IF NOT EXISTS `eleman_turu` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `eleman_turu` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `eleman_turu`
--

INSERT INTO `eleman_turu` (`id`, `eleman_turu`) VALUES
(1, 'Direnç '),
(2, 'Kondansatör'),
(3, 'Diyot'),
(4, 'Zener Diyot'),
(5, 'Transistör'),
(6, 'İşlemci'),
(7, 'Sensör'),
(8, 'Kristal'),
(9, 'Regülatör'),
(10, 'OP-AMP'),
(11, 'Hüseyin'),
(12, 'Hüseyin'),
(13, 'Hüseyin'),
(14, 'Hüseyin');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `firma`
--

INSERT INTO `firma` (`firma_id`, `firma_ismi`, `tel`, `mail`, `adres`) VALUES
(1, 'Mikrodizayn ', '0 216 335 03', 'bilgi@mikrodizayn.com.tr ', 'E5 Kuzey Yanyol Üzeri,Memleket Sokak, No: 3, Kat: 2-3-4, 34852, Zümrütevler/ Maltepe - İstanbul'),
(2, 'Future Electronics', '+90 216 5719', 'e_services@FutureElectronics.com', 'Sehit Mehmet Faith Ongul Sok No 3\r\nBagdatlioglu Plaza Kat 9\r\n\r\nIstanbul\r\nKozyatagi - Kadikoy'),
(3, 'Arrow Elektronik', '90 216 680 4', '', 'Yeni Sk. VIP Plaza, No:5 Kat:1\r\nKavacik, Beykoz 34810 Istanbul/Turkey'),
(4, 'huseyinin yeri', '9000500', 'sad@gmail.com', 'dlasdasdas'),
(5, 'huseyinin yeri', '9000500', 'sad@gmail.com', 'dlasdasdas');

-- --------------------------------------------------------

--
-- Table structure for table `kilif`
--

CREATE TABLE IF NOT EXISTS `kilif` (
  `id` smallint(3) NOT NULL AUTO_INCREMENT,
  `kilif_tipi` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kilif`
--

INSERT INTO `kilif` (`id`, `kilif_tipi`) VALUES
(1, 'SMD'),
(2, 'SOID'),
(3, 'huseyin');

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
(1, 'root', 12345, 1),
(2, 'arge', 12345, 2),
(3, 'depo', 12345, 3);

-- --------------------------------------------------------

--
-- Table structure for table `numune`
--

CREATE TABLE IF NOT EXISTS `numune` (
  `numune` tinyint(1) NOT NULL,
  `numune_mi` varchar(5) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `numune`
--

INSERT INTO `numune` (`numune`, `numune_mi`) VALUES
(0, 'Hayır'),
(1, 'Evet');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=44 ;

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
(7, 'proje7', 'images.jpeg', 'bu yedinci proje'),
(31, 'yeni proje ', '36566_330955807003814_66310862_n.jpg', 'dasdsa'),
(32, 'nobodyfiz', '8741_181570218647384_1760318886_n.jpg', 'nobody düzeltik işte panpa'),
(33, 'nobodyfiz', '8741_181570218647384_1760318886_n1.jpg', 'nobody düzeltik işte panpa'),
(34, 'nobodyfiz', '8741_181570218647384_1760318886_n2.jpg', 'nobody düzeltik işte panpa'),
(35, 'nobodyfiz', '8741_181570218647384_1760318886_n3.jpg', 'nobody düzeltik işte panpa'),
(36, 'nobodyfiz', '8741_181570218647384_1760318886_n.jpg', 'nobody düzeltik işte panpa'),
(37, '', '', ''),
(38, '', '', ''),
(39, '', '', ''),
(40, '', '', ''),
(41, '', '', ''),
(42, '', '', ''),
(43, '', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sema`
--

INSERT INTO `sema` (`sema_id`, `sema_ismi`, `proje_id`) VALUES
(3, '55-41.jpg', 0),
(4, '436_336629683103093_624361454_n.jpg', 0),
(5, '44582_10152100347148989_1835910232_n.png', 0),
(6, '17815_10151364412396449_1391635444_n.jpg', 0),
(7, '44582_10152100347148989_1835910232_n1.png', 0);

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
(1, 1, 'Admin'),
(2, 2, 'Arge'),
(3, 3, 'Depo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
