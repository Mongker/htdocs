-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2019 at 06:28 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k3office`
--

-- --------------------------------------------------------

--
-- Table structure for table `visa`
--

CREATE TABLE `visa` (
  `id` int(11) NOT NULL COMMENT 'Khóa tự tăng',
  `dauthe` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Đầu thẻ',
  `ngaylam` date NOT NULL COMMENT 'Ngày làm',
  `khachang` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Khách Hàng',
  `sothe` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'số tiền làm',
  `sotienlam` float NOT NULL COMMENT 'số tiền làm',
  `nht` float NOT NULL COMMENT 'Phí % ngân hàng thu',
  `kh` float NOT NULL COMMENT 'Phí % thu khách hàng',
  `psum` float NOT NULL COMMENT 'Phí thu tổng',
  `ptnh` float NOT NULL COMMENT 'Phí thu ngân hàng',
  `ptkh` float NOT NULL COMMENT 'Phí thu khách hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `visa`
--

INSERT INTO `visa` (`id`, `dauthe`, `ngaylam`, `khachang`, `sothe`, `sotienlam`, `nht`, `kh`, `psum`, `ptnh`, `ptkh`) VALUES
(4, 'Le', '2020-01-01', 'Mong', '1223', 6000000, 1.1, 0.02, 120000, 66000, 54000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `visa`
--
ALTER TABLE `visa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `visa`
--
ALTER TABLE `visa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Khóa tự tăng', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
