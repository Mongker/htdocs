-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 19, 2019 lúc 04:28 PM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbh_mt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `sohoadon` varchar(20) NOT NULL,
  `ngay` date NOT NULL,
  `makhachhang` varchar(20) NOT NULL,
  `manhanvien` varchar(20) NOT NULL,
  `masanpham` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`sohoadon`, `ngay`, `makhachhang`, `manhanvien`, `masanpham`) VALUES
('HD1', '2019-10-01', 'KH2', 'NV1', 'SP1'),
('HD2', '2019-10-03', 'KH4', 'NV2', 'SP2'),
('HD3', '2019-10-02', 'KH3', 'NV3', 'SP3'),
('HD4', '2019-09-16', 'KH5', 'NV4', 'SP4'),
('HD5', '2019-10-01', 'KH5', 'NV5', 'SP5'),
('HD6', '2019-10-02', 'KH1', 'NV3', 'SP2'),
('HD7', '2019-10-01', 'KH5', 'NV4', 'masanpham'),
('HD8', '2019-10-01', 'KH5', 'NV4', 'SP5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makhachhang` varchar(20) NOT NULL,
  `tenkhachhang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `sodienthoai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makhachhang`, `tenkhachhang`, `diachi`, `sodienthoai`) VALUES
('', '', '', ''),
('KH1', 'Lê Văn Dũng', 'Nam Dinh', '0853897558'),
('KH2', 'Hashirama', 'Japan', '19008198'),
('KH3', 'Uchiha Madara', 'Japan', '0905468975'),
('KH4', 'Đào Thị Lê Na', 'Ha Noi', '0953125467'),
('KH5', 'Lê Trung Tá', 'HCM', '01235647585'),
('KH6', 'Bùi Mạn Cường', 'Ha Noi', '66773508');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manhanvien` varchar(10) NOT NULL,
  `hoten` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gioitinh` varchar(10) DEFAULT NULL,
  `diachi` varchar(50) DEFAULT NULL,
  `namsinh` date DEFAULT NULL,
  `sodienthoai` text NOT NULL,
  `luong` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`manhanvien`, `hoten`, `gioitinh`, `diachi`, `namsinh`, `sodienthoai`, `luong`) VALUES
('', '', '', '', '0000-00-00', '', ''),
('NV1', 'Nguyễn Văn A', 'nam', 'Ha Noi', '2000-10-01', '0988888888', '10.000.000'),
('NV2', 'Lê văn T', 'nam', 'Ha Noi', '1999-10-08', '0945645678', '8.000.000'),
('NV3', 'Đào Thị Bích Ngọc', 'nu', 'Thanh Hoa', '1998-06-08', '0999999999', '12.000.000'),
('NV4', 'Uchiha Sasuke', 'nam', 'Japan', '1999-01-01', '0912345678', '15.000.000'),
('NV5', 'Uzumaki Naruto', 'nam', 'Japan', '2001-10-10', '0123456789', '15.000.000'),
('NV6', 'Nguyễn Mạnh Hùng', 'nam', 'Thanh Hoa', '2003-01-15', '095555555', '15.000.000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masanpham` varchar(20) NOT NULL,
  `tensanpham` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dongia` double NOT NULL,
  `soluong` int(11) NOT NULL,
  `sohoadon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masanpham`, `tensanpham`, `dongia`, `soluong`, `sohoadon`) VALUES
('SP1', 'Máy bay', 1000000000, 2, 'HD1'),
('SP3', 'Xe Tăng', 5000000000, 10, 'HD1'),
('SP4', 'Tàu Ngầm', 10000000000, 5, 'HD3'),
('SP5', 'Tàu Con Thoi', 100000000000, 2, 'HD5'),
('SP6', 'Ô tô', 500000000, 10, 'HD6');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`sohoadon`),
  ADD KEY `pk_manhanvien` (`manhanvien`),
  ADD KEY `pk_makhachhang` (`makhachhang`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makhachhang`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manhanvien`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masanpham`),
  ADD KEY `pk_sohoadon` (`sohoadon`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `pk_makhachhang` FOREIGN KEY (`makhachhang`) REFERENCES `khachhang` (`makhachhang`),
  ADD CONSTRAINT `pk_manhanvien` FOREIGN KEY (`manhanvien`) REFERENCES `nhanvien` (`manhanvien`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `pk_sohoadon` FOREIGN KEY (`sohoadon`) REFERENCES `hoadon` (`sohoadon`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
