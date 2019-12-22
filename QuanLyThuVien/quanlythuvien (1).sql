-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Host: 127.11.193.2:3306
-- Generation Time: Nov 28, 2016 at 11:43 AM
-- Server version: 5.5.50
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quanlythuvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`) VALUES
(1, 'fg', 'df'),
(2, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `dsbook`
--

CREATE TABLE IF NOT EXISTS `dsbook` (
  `IDbook` int(11) NOT NULL AUTO_INCREMENT,
  `namebook` text COLLATE utf8_unicode_ci NOT NULL,
  `tacgia` text COLLATE utf8_unicode_ci NOT NULL,
  `theloai` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  PRIMARY KEY (`IDbook`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dsbook`
--

INSERT INTO `dsbook` (`IDbook`, `namebook`, `tacgia`, `theloai`, `soluong`) VALUES
(1, 'Táº¥m Váº£i Äá»', 'Há»“ng NÆ°Æ¡ng Tá»­', 4, 2),
(2, 'Ãc Linh Quá»‘c Äá»™', 'Há»“ng NÆ°Æ¡ng Tá»­', 4, 8),
(3, 'Ná»¯ NhÃ¢n Sau LÆ°ng Äáº¿ Quá»‘c ThiÃªn TÃ i Tiá»ƒu ', 'No Name', 3, 3),
(4, 'CÃ¡ch Con GÃ¡i Tá»« Chá»‘i KhÃ©o Lá»i Tá» TÃ¬nh', 'abc', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE IF NOT EXISTS `theloai` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`ID`, `name`, `soluong`) VALUES
(1, 'Truyá»‡n CÆ°á»i', 0),
(2, 'Truyá»‡n TÃ¬nh YÃªu', 0),
(3, 'Tiá»ƒu Thuyáº¿t', 0),
(4, 'Truyá»‡n Ma', 0),
(5, 'Lá»‹ch Sá»­', 0),
(6, 'Truyá»‡n Ngáº¯n', 0),
(7, 'Truyá»‡n Teen', 0),
(8, 'Truyá»‡n Trinh ThÃ¡m', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
