-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2014 at 06:45 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `visitor`
--
CREATE DATABASE `visitor` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `visitor`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'novianto', '$2y$10$TsuxOptrHslaUuweYhcv2udyuM.YYhAiivmQZvSF/B4yXSNlHPvfK'),
(2, 'jesikawati', '$2y$10$TsuxOptrHslaUuweYhcv2udyuM.YYhAiivmQZvSF/B4yXSNlHPvfK'),
(3, 'victor', '$2y$10$TsuxOptrHslaUuweYhcv2udyuM.YYhAiivmQZvSF/B4yXSNlHPvfK');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

DROP TABLE IF EXISTS `logo`;
CREATE TABLE IF NOT EXISTS `logo` (
  `id_logo` int(11) NOT NULL AUTO_INCREMENT,
  `gbr_logo` text NOT NULL,
  PRIMARY KEY (`id_logo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id_logo`, `gbr_logo`) VALUES
(1, 'logo/LogoK.png');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `nama`, `email`, `pesan`, `tanggal`, `waktu`) VALUES
(1, 'asd', 'asd@gmail.com', 'test', '2014-12-11', '18:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_pic` text NOT NULL,
  `news_judul` text NOT NULL,
  `news_info` text NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_pic`, `news_judul`, `news_info`) VALUES
(11, 'news/brosur.png', 'Come ,Try Our Services ', 'Punya desain udangan sendiri? Kami bisa membantu anda membuatkan undangan yang anda inginkan. Kami menerima pesanan sesuai permintaan konsumen, dari model, warna, dan isi sesuai yang anda inginkan. Hari bahagia anda pasti akan menjadi sangat lengkap dengan adanya kartu undangan yang anda desain sendiri. Apabila tidak memiliki desain sendiri, kami punya banyak sampel yang mungkin akan menarik perhatian anda.'),
(12, 'news/mug.png', 'New Product,Design MUG !', 'Layanan terbaru kami hadir bulan ini.Kami bisa membantu anda membuatkan design gambaran mug sesuai permintaan anda. Kami menerima pesanan sesuai permintaan konsumen, dari model, warna, dan gambar sesuai yang anda inginkan. Hari bahagia anda pasti akan menjadi sangat lengkap dengan adanya MUG buatan kami,untuk info lebih lanjut silahkan hubungi kami.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
