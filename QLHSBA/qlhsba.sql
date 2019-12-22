-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 26, 2019 lúc 04:45 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlhsba`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL COMMENT 'Khóa tự tăng',
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `rank`) VALUES
(1, 'admin', '12345678', 'root'),
(3, 'admin', 'admin', ''),
(4, 'admin', 'admin', ''),
(5, 'admin', 'admin', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ds_benhnhan`
--

CREATE TABLE `ds_benhnhan` (
  `id` int(11) NOT NULL,
  `tenbenhnhan` varchar(100) NOT NULL,
  `tuoi` varchar(100) NOT NULL,
  `sdt` varchar(100) NOT NULL,
  `diachi` text NOT NULL,
  `cmt` varchar(100) NOT NULL,
  `ngaysinh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `ds_benhnhan`
--

INSERT INTO `ds_benhnhan` (`id`, `tenbenhnhan`, `tuoi`, `sdt`, `diachi`, `cmt`, `ngaysinh`) VALUES
(16, '1211111', '19', '0905483812', 'Thanh Hóa', '19943249', '2019-10-18'),
(18, '123456789', '123456789', '123456789', '1111', '123456789', '2019-10-13'),
(19, '123456789', '123456789', '123456789', '1111', '123456789', '2019-10-13'),
(20, '123456789c', '123456789', '123456789', '1111', '123456789', '2019-10-13');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ds_benhnhan`
--
ALTER TABLE `ds_benhnhan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Khóa tự tăng', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `ds_benhnhan`
--
ALTER TABLE `ds_benhnhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
