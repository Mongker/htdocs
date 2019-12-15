-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 14, 2019 lúc 03:10 PM
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
-- Cơ sở dữ liệu: `nhan_vien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `id` int(11) NOT NULL COMMENT 'khóa tự tăng',
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tuoi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anhavatar` text COLLATE utf8_unicode_ci NOT NULL,
  `linkfb` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`id`, `ten`, `tuoi`, `sdt`, `anhavatar`, `linkfb`) VALUES
(60, 'Đào Thị Thanh Mai', '16', '0374668113', 'http://localhost/WebBanHang/img/70968965_1353306428170602_310208015863119872_n (1).jpg', 'https://www.facebook.com/login.php?skip_api_login=1&api_key=1733556690196497&kid_directed_site=0&app_id=1733556690196497&signed_next=1&next=https%3A%2F%2Fwww.facebook.com%2Fv2.8%2Fdialog%2Foauth%3Fauth_type%3Drerequest%26client_id%3D1733556690196497%26red'),
(61, 'Lê Văn Mong 2', '19', '0904168555', 'http://localhost/WebBanHang/img/71313658_1295004607346974_8320918452126613504_n.jpg', 'https://www.facebook.com/login.php?skip_api_login=1&api_key=1733556690196497&kid_directed_site=0&app_id=1733556690196497&signed_next=1&next=https%3A%2F%2Fwww.facebook.com%2Fv2.8%2Fdialog%2Foauth%3Fauth_type%3Drerequest%26client_id%3D1733556690196497%26red'),
(62, 'Tú Đẹp Trai', '16', '0374668113', 'http://localhost/WebBanHang/img/70237310_2341162226200339_8377286461912776704_n (1).jpg', 'https://www.facebook.com/login.php?skip_api_login=1&api_key=1733556690196497&kid_directed_site=0&app_id=1733556690196497&signed_next=1&next=https%3A%2F%2Fwww.facebook.com%2Fv2.8%2Fdialog%2Foauth%3Fauth_type%3Drerequest%26client_id%3D1733556690196497%26red'),
(63, 'Tức Anh Ách', '12', '0904168555', 'http://localhost/WebBanHang/img/71549139_2476612372610591_2462253279908724736_n.jpg', 'https://www.facebook.com/login.php?skip_api_login=1&api_key=1733556690196497&kid_directed_site=0&app_id=1733556690196497&signed_next=1&next=https%3A%2F%2Fwww.facebook.com%2Fv2.8%2Fdialog%2Foauth%3Fauth_type%3Drerequest%26client_id%3D1733556690196497%26red');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'khóa tự tăng', AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
