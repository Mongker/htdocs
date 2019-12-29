-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 30, 2019 lúc 12:34 AM
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
-- Cơ sở dữ liệu: `k3office`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `K3OfficeExcel`
--

CREATE TABLE `k3officeexcel` (
  `id` int(11) NOT NULL,
  `hoten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `K3OfficeExcel`
--

INSERT INTO `K3OfficeExcel` (`id`, `hoten`, `ngaysinh`, `gioitinh`, `diachi`) VALUES
(30, 'LÃª VÄƒn Mong', '2019-12-12', 'Nam', 'Thanh HoÃ¡'),
(31, 'LÃª VÄƒn Mong', '2019-12-12', 'Nam', 'Thanh HoÃ¡'),
(32, 'LÃª VÄƒn Mong', '2019-12-12', 'Nam', 'Thanh HoÃ¡'),
(33, 'LÃª VÄƒn Mong', '2019-12-12', 'Nam', 'Thanh HoÃ¡'),
(34, 'LÃª VÄƒn Mong', '2019-12-12', 'Nam', 'Thanh HoÃ¡'),
(35, 'LÃª VÄƒn Mong', '2019-12-12', 'Nam', 'Thanh HoÃ¡');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `K3OfficeExcel`
--
ALTER TABLE `K3OfficeExcel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `K3OfficeExcel`
--
ALTER TABLE `K3OfficeExcel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
