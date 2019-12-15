-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 17, 2019 lúc 02:23 PM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `level`, `created`) VALUES
(1, 'Goo', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 2147483647),
(2, 'Mod đz', 'mod@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 2147483647),
(3, 'Tieu Vu', 'nguoimientrung1610@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, 1554625107);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `sort_order` tinyint(4) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `description`, `parent_id`, `sort_order`, `created`) VALUES
(1, 'Thời trang', '', 0, 1, '2019-04-07 05:35:21'),
(2, 'Bán chạy', '', 0, 2, '2019-04-07 05:35:48'),
(3, 'Khuyến mại', '', 0, 3, '2019-04-07 05:35:59'),
(4, 'Tin tức', '', 0, 4, '2019-04-07 05:36:13'),
(5, 'Giỏ hàng', '', 0, 6, '2019-04-07 05:36:49'),
(6, 'Liên hệ', '', 0, 5, '2019-04-07 05:37:02'),
(7, 'Thời trang nam', '', 1, 1, '2019-04-07 05:37:23'),
(8, 'Thời trang nữ', '', 1, 2, '2019-04-07 05:37:36'),
(9, 'Quần áo gia đình', '', 1, 3, '2019-04-07 05:37:50'),
(10, 'Áo phông nam', '', 7, 1, '2019-04-07 09:08:19'),
(11, 'Áo sơ mi nam', '', 7, 2, '2019-04-07 09:08:36'),
(12, 'Quần Jeans', '', 7, 3, '2019-04-07 09:09:01'),
(13, 'Quần Kali', '', 7, 4, '2019-04-07 09:09:14'),
(14, 'Quần Short', '', 7, 5, '2019-04-07 09:09:31'),
(15, 'Áo thun nữ', '', 8, 1, '2019-04-07 09:09:46'),
(16, 'Áo sơ mi nữ', '', 8, 2, '2019-04-07 09:10:10'),
(17, 'Đầm, váy', '', 8, 3, '2019-04-07 09:23:39'),
(18, 'Áo công sở', '', 8, 4, '2019-04-07 09:23:57'),
(19, 'Áo gia đình hè', '', 9, 1, '2019-04-07 09:25:55'),
(20, 'Áo váy gia đình', '', 9, 2, '2019-04-07 09:26:21'),
(21, 'Mẹ và bé', '', 9, 4, '2019-04-07 09:26:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `transaction_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `qty` int(100) NOT NULL DEFAULT '0',
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `transaction_id`, `product_id`, `qty`, `amount`, `status`) VALUES
(42, 31, 56, 3, '507000.00', 0),
(41, 30, 9, 1, '80000.00', 0),
(40, 29, 28, 1, '168917.00', 0),
(39, 28, 58, 3, '2070000.00', 0),
(38, 27, 60, 1, '129000.00', 1),
(37, 26, 15, 1, '170000.00', 1),
(36, 25, 25, 1, '300000.00', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `discount` int(11) DEFAULT '0',
  `image_link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image_list` text COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `soluong` int(5) NOT NULL,
  `buyed` int(255) NOT NULL,
  `rate_total` int(255) NOT NULL DEFAULT '4',
  `rate_count` int(255) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  `created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `catalog_id`, `name`, `content`, `price`, `discount`, `image_link`, `image_list`, `view`, `soluong`, `buyed`, `rate_total`, `rate_count`, `status`, `created`) VALUES
(1, 16, 'Viền Cổ Hoa', '<p>&Aacute;o Sơ Mi Nữ</a>&nbsp;Viền Cổ Hoa 3D Thiết Kế Cổ Tr&ograve;n Viền Sọc Đen, Kết N&uacute;t Cổ Sau Lưng, Tay X&ograve;e Duy&ecirc;n D&aacute;ng, Kết Hoa 3D Th&ecirc;m Phần Nữ T&iacute;nh Cho Ph&aacute;i Đẹp, Chất Liệu Voan Mềm Mại, Tho&aacute;ng M&aacute;t</p>\r\n\r\n<p><strong>Chất Liệu:</strong>&nbsp;Voan Mềm Mại, Tho&aacute;ng M&aacute;t</p>\r\n\r\n<p><strong>M&agrave;u Sắc:</strong>&nbsp;T&iacute;m, Hồng</p>\r\n\r\n<p><strong>Kiểu D&aacute;ng:</strong>&nbsp;Thiết Kế Cổ Tr&ograve;n Viền Sọc Đen, Kết N&uacute;t Cổ Sau Lưng, Tay X&ograve;e Duy&ecirc;n D&aacute;ng, Kết Hoa 3D Th&ecirc;m Phần Nữ T&iacute;nh Cho Ph&aacute;i Đẹp</p>\r\n\r\n<p><strong>K&iacute;ch Thước:</strong>&nbsp;Size S - D&agrave;i &Aacute;o: 60, Rộng Vai: 28 - 32, V&ograve;ng Ngực: 74 - 84 ( Ph&ugrave; Hợp Với Bạn Nữ Dưới 50kg)&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Size M - D&agrave;i &Aacute;o: 62, Rộng Vai: 29 - 33, V&ograve;ng Ngực: 76 - 86&nbsp;( Ph&ugrave; Hợp Với Bạn Nữ Dưới 55kg)</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Size L - D&agrave;i &Aacute;o: 63, Rộng Vai: 31 - 35, V&ograve;ng Ngực: 84 -&nbsp;94( Ph&ugrave; Hợp Với Bạn Nữ Dưới 60kg)</p>\r\n', '179000.00', 20000, 'ao-so-mi-nu-vien-co-hoa-31.jpg', '[\"ao-so-mi-nu-vien-co-hoa-3d1.jpg\",\"ao-so-mi-nu-vien-co-hoa-3dl1.jpg\",\"ao-so-mi-nu-vien-co-hoa-3dla1.jpg\"]', 26, 10, 1, 14, 3, 1, 1493983674),
(2, 16, 'cổ trụ thắt nơ', '', '255000.00', 51000, 'hang-nhap-so-mi-nu-co-tru-that-no-sm1.jpg', '[\"hang-nhap-so-mi-nu-co-tru-that-no.jpg\",\"hang-nhap-so-mi-nu-co-tru-that-no-sm125-1.jpg\"]', 3, 15, 1, 4, 1, 1, 1493983674),
(3, 16, 'ẢO KIỂU HÀN QUỐC', '<p>ẢO KIỂU H&Agrave;N QUỐC V0040&nbsp;&nbsp;tay lỡ l&agrave; gu chủ yếu cho những ng&agrave;y thu. Nếu như h&egrave; bạn c&oacute; thể t&aacute;o bạo diện một chiếc sơ mi kh&ocirc;ng tay hay kiểu cổ ph&oacute;ng kho&aacute;ng cho thời trang c&ocirc;ng sở th&igrave; sang thu sẽ k&iacute;n đ&aacute;o hơn nhiều với kiểu sơ mi tay lỡ hoặc d&aacute;ng d&agrave;i tay đều ph&ugrave; hợp.</p>\r\n\r\n<p>Những mẫu sơ mi thiết kế tay lỡ vẫn sử dụng gam đơn hoặc họa tiết nếu muốn mix ph&ugrave; hợp c&ugrave;ng quần t&acirc;y, jean hay ch&acirc;n v&aacute;y ăn &yacute;.</p>\r\n\r\n<p>ẢO KIỂU&nbsp;<a href=\"https://www.sendo.vn/han-quoc.htm\">H&Agrave;N QUỐC</a>&nbsp;V0040 với c&aacute;c th&ocirc;ng tin như sau:</p>\r\n\r\n<p>+ Mẫu m&atilde;: như h&igrave;nh;</p>\r\n\r\n<p>+ Xuất xứ: Việt Nam</p>\r\n\r\n<p>+ M&agrave;u sắc: Hồng, xanh, trắng, t&iacute;m</p>\r\n\r\n<p>+ Kiểu d&aacute;ng: tay lỡ, vạt ngang, cổ tr&ograve;n k&egrave;m d&acirc;y chuyền phụ kiện;</p>\r\n\r\n<p>+ Size: S, M, L, XL</p>\r\n', '300000.00', 150000, 'ao-kieu-han-quoc-v0040-1m4G3-8352b3_simg_d0daf0_800x1200_max.jpg', '[\"ao-kieu-han-quoc-v0040-1m4G3-7118e0_simg_d0daf0_800x1200_max.jpg\",\"ao-kieu-han-quoc-v0040-1m4G3-131527_simg_d0daf0_800x1200_max.jpg\"]', 45, 20, 4, 16, 4, 1, 1493983674),
(4, 18, 'phối ren', '<p>ẢO KIỂU H&Agrave;N QUỐC V0040&nbsp;&nbsp;tay lỡ l&agrave; gu chủ yếu cho những ng&agrave;y thu. Nếu như h&egrave; bạn c&oacute; thể t&aacute;o bạo diện một chiếc sơ mi kh&ocirc;ng tay hay kiểu cổ ph&oacute;ng kho&aacute;ng cho thời trang c&ocirc;ng sở th&igrave; sang thu sẽ k&iacute;n đ&aacute;o hơn nhiều với kiểu sơ mi tay lỡ hoặc d&aacute;ng d&agrave;i tay đều ph&ugrave; hợp.</p>\r\n\r\n<p>Những mẫu sơ mi thiết kế tay lỡ vẫn sử dụng gam đơn hoặc họa tiết nếu muốn mix ph&ugrave; hợp c&ugrave;ng quần t&acirc;y, jean hay ch&acirc;n v&aacute;y ăn &yacute;.</p>\r\n\r\n<p>ẢO KIỂU&nbsp;<a href=\"https://www.sendo.vn/han-quoc.htm\">H&Agrave;N QUỐC</a>&nbsp;V0040 với c&aacute;c th&ocirc;ng tin như sau:</p>\r\n\r\n<p>+ Mẫu m&atilde;: như h&igrave;nh;</p>\r\n\r\n<p>+ Xuất xứ: Việt Nam</p>\r\n\r\n<p>+ M&agrave;u sắc: Hồng, xanh, trắng, t&iacute;m</p>\r\n\r\n<p>+ Kiểu d&aacute;ng: tay lỡ, vạt ngang, cổ tr&ograve;n k&egrave;m d&acirc;y chuyền phụ kiện;</p>\r\n\r\n<p>+ Size: S, M, L, XL</p>\r\n', '280000.00', 80000, 'hang-nhap-cao-cap-so-mi-nu-phoi-ren-sm115-1m4G3-HuHbF8_simg_d0daf0_800x1200_max.jpg', '[\"hang-nhap-cao-cap-so-mi-nu-phoi-ren-sm115-1m4G3-q1bUZr_simg_d0daf0_800x1200_max.jpg\"]', 21, 20, 8, 18, 4, 1, 1493983674),
(12, 17, 'Đầm maxi phối ren cao cấp', '<p>Chất liệu: Chiffon phối ren cao cấp<br />\r\nM&agrave;u sắc: Đen, hồng<br />\r\nK&iacute;ch thước: S,M,L,XL<br />\r\nXuất Xứ : Việt Nam&nbsp;</p>\r\n\r\n<p>+ size S: Chiều d&agrave;i đầm: 130cm, Ngực 78-80cm, Eo 64-68cm, M&ocirc;ng 84-86cm</p>\r\n\r\n<p>+ size M: Chiều d&agrave;i đầm: 130cm, Ngực 80-84cm, Eo 68-72cm, M&ocirc;ng 86-90cm<br />\r\n+ size L: Chiều d&agrave;i đầm: 130cm, Ngực 84-88cm, Eo 72-76cm, M&ocirc;ng 90-96cm<br />\r\n+ size XL: Chiều d&agrave;i đầm: 130cm, Ngực 88-92cm, Eo 76-78cm, M&ocirc;ng 96-100cm</p>\r\n', '720000.00', 360000, 'dam-maxi-phoi-ren-cao-cap-1m4G3-QXVTv3_simg_d0daf0_800x1200_max.jpg', '[\"dam-maxi-phoi-ren-cao-cap-1m4G3-sh6ofY_simg_d0daf0_800x1200_max.jpg\",\"dam-maxi-phoi-ren-cao-cap-1m4G3-sUX4Gv_simg_d0daf0_800x1200_max.jpg\",\"dam-maxi-phoi-ren-cao-cap-1m4G3-VEbARk_simg_d0daf0_800x1200_max.jpg\"]', 28, 20, 3, 9, 2, 0, 0),
(13, 17, 'Đầm ren Thái form dài', '<p><em>* Chất liệu:&nbsp;</em>Ren Th&aacute;i cao cấp, lớp l&oacute;t trong d&agrave;y dặn</p>\r\n\r\n<p>*&nbsp;<em>Kiểu d&aacute;ng</em>&nbsp;Đầm kh&ocirc;ng tay, cổ tr&ograve;n, Ch&acirc;n v&aacute;y x&ograve;e, d&agrave;i ngang bắp ch&acirc;n. Kiểu d&aacute;ng mềm mại thướt tha đầy nữ t&iacute;nh</p>\r\n\r\n<p>*&nbsp;<em>M&atilde; sản phẩm:</em>&nbsp;DR 26</p>\r\n', '200000.00', 14, 'dam-ren-thai-form-dai-1m4G3-9f2a11.jpg', '[\"dam-ren-thai-form-dai-1m4G3-38d74e.jpg\",\"dam-ren-thai-form-dai-1m4G3-918972.jpg\",\"dam-ren-thai-form-dai-1m4G3-d5e05d.jpg\"]', 8, 34, 2, 4, 1, 1, 1493983674),
(6, 18, 'áo kiểu công sở', '<p>&Aacute;o kiểu mang đến vẻ đẹp nữ t&iacute;nh, dịu d&agrave;ng cho n&agrave;ng!</p>\r\n\r\n<p>Với chất vải v&ocirc; c&ugrave;ng mềm mại v&agrave; nhẹ nh&agrave;ng, chiếc &aacute;o kiểu l&agrave;m từ chất liệu voan n&agrave;y lu&ocirc;n ph&aacute;t huy v&agrave; t&ocirc; điểm được vẻ đẹp nữ t&iacute;nh, dịu d&agrave;ng của bạn g&aacute;i. Nhất l&agrave; với những kiểu d&aacute;ng cổ b&egrave;o c&aacute;ch điệu hay họa tiết xinh xắn lại c&agrave;ng gi&uacute;p n&agrave;ng khoe th&ecirc;m được sự điệu đ&agrave; v&agrave; ấn tượng của m&igrave;nh. Bởi thế, chiếc &aacute;o n&agrave;y v&ocirc; c&ugrave;ng ph&ugrave; hợp với những c&ocirc; n&agrave;ng c&oacute; phong c&aacute;ch thời trang nữ t&iacute;nh, nhẹ nh&agrave;ng.</p>\r\n', '300000.00', 100000, 'ao-kieu-cong-so-a0122-1m4G3-ZebjMN_simg_d0daf0_800x1200_max.png', '[\"ao-kieu-cong-so-a0122-1m4G3-o0hhot_simg_d0daf0_800x1200_max.png\",\"ao-kieu-cong-so-a0122-1m4G3-qXBUW2_simg_d0daf0_800x1200_max.png\",\"ao-kieu-cong-so-a0122-1m4G3-vS6ei3_simg_d0daf0_800x1200_max.png\"]', 2, 13, 1, 4, 1, 1, 1493983674),
(7, 17, 'Đầm ren tay dài tiểu thư', '<p>Đầm ren tay d&agrave;i tiểu thư duy&ecirc;n d&aacute;ng nữ t&iacute;nh trị gi&aacute; 450.000 VNĐ nay chỉ c&ograve;n 350.000 VNĐ</p>\r\n\r\n<p>C&aacute;c th&ocirc;ng tin như sau:</p>\r\n\r\n<p>+ Mẫu m&atilde;: như h&igrave;nh;</p>\r\n\r\n<p>+ Xuất xứ: Việt Nam</p>\r\n\r\n<p>+ M&agrave;u sắc: Hồng, xanh, trắng, t&iacute;m</p>\r\n\r\n<p>+ Kiểu d&aacute;ng: tay lỡ, vạt ngang, cổ tr&ograve;n k&egrave;m d&acirc;y chuyền phụ kiện;</p>\r\n\r\n<p>+ Size: S, M, L, XL</p>\r\n', '450000.00', 100000, 'Dam_ren_den_tay_dai_tieu_thu_(3).jpg', '[\"Dam_ren_den_tay_dai_tieu_thu_(2).jpg\",\"Dam_ren_den_tay_dai_tieu_thu_(13).jpg\",\"Dam_ren_tieu_thu_tay_dai_(1).jpg\"]', 22, 19, 6, 13, 3, 1, 1493983674),
(9, 15, 'Áo Thun Nữ ROMA', '<p>►Chất liệu cao cấp COTTON 4 CHIỀU mềm mại<br />\r\n►Co giãn tốt ; thoáng mát     ►Thiết kế thời trang<br />\r\n►Kiểu dáng đa phong cách   ►Đường may tinh tế sắc sảo<br />\r\n► Áo thun nữ được thiết kế và sản xuất bởi Trần Doanh mang vể đẹp trẻ trung năng động nhưng không kém phần duyên dáng.<br />\r\n►Áo được thiết kế đẹp, chuẩn form, đường may sắc xảo, vải cotton dày, mịn, thấm hút mồ hôi tạo sự thoải mái khi mặc!<br />\r\n►Thích hợp cho sự kết hợp vứi quần jean, sọt,legging!</p>\r\n', '180000.00', 100000, 'ao-thun-ao-phong-nu-hoa-tiet-chu-roma.jpg', '[\"ao-thun-ao-phong-nu-hoa-tiet-chu-roma-ca-tin.jpg\",\"ao-thun-ao-phong-nu-hoa-tiet-chu-roma-ca-tinh.jpg\"]', 3, 18, 1, 4, 1, 1, 1493983674),
(11, 15, 'ÁO THU NGỰA MINI', '<p>ẢO KIỂU H&Agrave;N QUỐC V0040&nbsp;&nbsp;tay lỡ l&agrave; gu chủ yếu cho những ng&agrave;y thu. Nếu như h&egrave; bạn c&oacute; thể t&aacute;o bạo diện một chiếc sơ mi kh&ocirc;ng tay hay kiểu cổ ph&oacute;ng kho&aacute;ng cho thời trang c&ocirc;ng sở th&igrave; sang thu sẽ k&iacute;n đ&aacute;o hơn nhiều với kiểu sơ mi tay lỡ hoặc d&aacute;ng d&agrave;i tay đều ph&ugrave; hợp.</p>\r\n\r\n<p>Những mẫu sơ mi thiết kế tay lỡ vẫn sử dụng gam đơn hoặc họa tiết nếu muốn mix ph&ugrave; hợp c&ugrave;ng quần t&acirc;y, jean hay ch&acirc;n v&aacute;y ăn &yacute;.</p>\r\n\r\n<p>ẢO KIỂU&nbsp;<a href=\"https://www.sendo.vn/han-quoc.htm\">H&Agrave;N QUỐC</a>&nbsp;với c&aacute;c th&ocirc;ng tin như sau:</p>\r\n\r\n<p>+ Mẫu m&atilde;: như h&igrave;nh;</p>\r\n\r\n<p>+ Xuất xứ: Việt Nam</p>\r\n\r\n<p>+ M&agrave;u sắc: Hồng, xanh, trắng, t&iacute;m</p>\r\n\r\n<p>+ Kiểu d&aacute;ng: tay lỡ, vạt ngang, cổ tr&ograve;n k&egrave;m d&acirc;y chuyền phụ kiện;</p>\r\n\r\n<p>+ Size: S, M, L, XL</p>\r\n', '80000.00', 10000, 'ao-thu-ngua-mini-1m4G3-57c588_simg_d0daf0_800x1200_max.jpg', '[\"ao-thu-ngua-mini-1m4G3-9f6f25_simg_d0daf0_800x1200_max.jpg\",\"ao-thu-ngua-mini-1m4G3-a959f5_simg_d0daf0_800x1200_max.jpg\"]', 36, 17, 3, 5, 1, 1, 1493983674),
(10, 15, ' Áo Thun Form Rộng', '<p>- &Aacute;o thun nữ trẻ trung c&oacute; thiết kế năng động với cổ tr&ograve;n, tay ngắn mang lại cho bạn sự thoải m&aacute;i khi mặc.<br />\r\n- Thiết kế form rộng c&aacute; t&iacute;nh cho bạn lu&ocirc;n cảm thấy dễ chịu khi mặc trong thời gian d&agrave;i.<br />\r\n- In họa tiết chữ đơn giản, trẻ trung tạo n&eacute;t c&aacute; t&iacute;nh ri&ecirc;ng cho sản phẩm.<br />\r\n- Đường may chắc chắn, cẩn thận cho bạn tự tin hơn trong vận động.<br />\r\n- Chất liệu: thun cotton 4 chiều co gi&atilde;n tốt, thấm h&uacute;t mồ h&ocirc;i hiệu quả.<br />\r\n- Size: freesize<br />\r\n- M&agrave;u sắc: trắng, đen, xanh biển</p>\r\n', '129000.00', 60000, 'ao-thun-ao-phong-nu-eiffel-ca-tinh-msat28-1m4G3-PP5C91_simg_d0daf0_800x1200_max.jpg', '[\"ao-thun-ao-phong-nu-eiffel-ca-tinh-msat28-1m4G3-LpJZdC_simg_d0daf0_800x1200_max.jpg\",\"ao-thun-ao-phong-nu-eiffel-ca-tinh-msat28-1m4G3-ZyFQ9v_simg_d0daf0_800x1200_max.jpg\"]', 9, 50, 2, 4, 1, 1, 1493983674),
(14, 17, 'ĐẦM ÔM BODY CỔ ĐÍNH HẠT', '<p>CHẤT LIỆU : THUN COTON CO GI&Atilde;N THO&Aacute;NG M&Aacute;T DỂ CHIỆU&nbsp;</p>\r\n\r\n<p>TH&Iacute;CH HỢP MỌI HOẠT ĐỘNG : C&Ocirc;NG SỞ , DỰ TIỆC , DẠO PHỐ , ĐI BIỂN ....</p>\r\n\r\n<p>SIZE :</p>\r\n\r\n<p>M&Agrave;U : CAM N&Acirc;U, X&Aacute;M ĐEN ( &Ocirc; M&Agrave;U CHỌN L&Agrave; X&Aacute;M ) XANH LAM , TRẮNG&nbsp;</p>\r\n', '200000.00', 50000, 'dam-om-body-co-dinh-hat-1m4G3-22CEL4_simg_d0daf0_800x1200_max.jpg', '[\"dam-om-body-co-dinh-hat-1m4G3-qrWR6I_simg_d0daf0_800x1200_max.jpg\",\"dam-om-body-co-dinh-hat-1m4G3-tVjWlK_simg_d0daf0_800x1200_max.jpg\",\"dam-om-body-co-dinh-hat-1m4G3-XI1vLB_simg_d0daf0_800x1200_max.jpg\"]', 3, 25, 2, 4, 1, 1, 1493983674),
(15, 17, 'ĐẦM XÒE PHỐI REN CAO CẤP', '<p>Chất liệu ren&nbsp;<a href=\"https://www.sendo.vn/cao-cap.htm\">cao cấp</a>&nbsp;cho 1 bạn 1 phong c&aacute;ch sang chảnh thu đ&ocirc;ng năm nay ,với c&aacute;c m&agrave;u diệu ,nồng nằng quyến rũ kh&ocirc;ng thể n&agrave;o kh&ocirc;ng cuốn h&uacute;t đươc tất cả &aacute;nh nh&igrave;n xung quanh h&ograve;a quyện v&agrave;o dạng x&ograve;e cổ điển&nbsp;<a href=\"https://www.sendo.vn/phoi-ren.htm\">phối ren</a>&nbsp; cao cấp .<br />\r\nM&agrave;u : đen , xanh , đỏ&nbsp;<br />\r\nSize : M 45 - 52 kg t&ugrave;y theo chiều cao&nbsp;<br />\r\nXưởng nhận may gia c&ocirc;ng tất cả c&aacute;c mặt h&agrave;ng thời trang nam nữ&nbsp;<br />\r\nVới chất liệu bắt mắt v&agrave; chất lượng rất ok nắm bắt xu hướng thời trang thu đ&ocirc;ng năm nay&nbsp;<br />\r\nMẫu v&aacute;y x&ograve;e ren l&agrave; sự lựa chọn tốt nhất cho bạn.</p>\r\n', '350000.00', 180000, 'dam-xoe-phoi-ren-cao-cap-1m4G3-lsWUnT.jpg', '[\"dam-xoe-phoi-ren-cao-cap-1m4G3-AQuuDj.jpg\",\"dam-xoe-phoi-ren-cao-cap-1m4G3-FGCII2.jpg\",\"dam-xoe-phoi-ren-cao-cap-1m4G3-qxyXGj.jpg\",\"dam-xoe-phoi-ren-cao-cap-1m4G3-ztYeGq.jpg\"]', 5, 36, 2, 4, 1, 1, 1493983674),
(16, 19, 'Áo gia đình AG0560', '<p><strong><a href=\"http://aothun24h.vn/san-pham/170/Ao-gia-dinh.html\" target=\"_blank\">&Aacute;o gia đ&igrave;nh</a>&nbsp;kẻ sọc ngang</strong>&nbsp;rất được ưa chuộng hiện nay, d&ugrave; l&agrave; ở lứa tuổi n&agrave;o th&igrave; thời trang kẻ sọc cũng lu&ocirc;n mang đ&ecirc;n cho người mặc một phong c&aacute;ch trẻ trung năng động v&agrave; c&aacute; t&iacute;nh.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kh&ocirc;ng mặc sọc ngang từ đầu đến ch&acirc;n l&agrave; b&iacute; quyết gia đ&igrave;nh bạn n&ecirc;n biết.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chọn chất liệu mềm v&agrave; phom d&aacute;ng su&ocirc;n rộng để che khuyết điểm.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chọn sọc kẻ ngang vừa phải, kh&ocirc;ng đụng tới sọc to.</p>\r\n', '580000.00', 20000, 'ao-gia-dinh-AG0560-1.jpg', '[\"ao-gia-dinh-AG0560.jpg\",\"ao-gia-dinh-AG0560-2.jpg\",\"ao-gia-dinh-AG0560-3.jpg\",\"ao-gia-dinh-AG0560-4.jpg\"]', 7, 42, 3, 13, 3, 1, 1493983674),
(17, 19, 'Áo gia đình AG0554', '<p><strong>Th&ocirc;ng tin về sản phẩm:</strong></p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kiểu &aacute;o : &Aacute;o thun cổ tr&ograve;n tay ngắn.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;M&agrave;u sắc: Nhiều m&agrave;u sắc để lựa chọn.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chất liệu: Thun cotton 4 chiều.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Size &aacute;o: Đủ size &aacute;o để lựa chọn.</p>\r\n\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C&ocirc;ng nghệ in: Mimaki của Nhật Bản.</p>\r\n', '500000.00', 0, 'ao-gia-dinh-AG0554.jpg', '[\"ao-gia-dinh-AG0554-1.jpg\",\"ao-gia-dinh-AG0554-2.jpg\",\"ao-gia-dinh-AG0554-3.jpg\",\"ao-gia-dinh-AG0554-4.jpg\"]', 37, 35, 1, 14, 4, 1, 1493983674),
(19, 21, 'ComBo Đầm Đôi PENDI Xinh Xắn', '<p><strong>TH&Ocirc;NG TIN SẢN PHẨM&nbsp;</strong></p>\r\n\r\n<p>- Chất liệu : thun</p>\r\n\r\n<p>- Năm sản xuất : 2016</p>\r\n\r\n<p>- Xuất xứ : Việt nam ( c&ocirc;ng ty th&aacute;i ho&agrave;ng sx)</p>\r\n\r\n<p>- M&agrave;u sắc : xanh, đỏ , hồng</p>\r\n\r\n<p>- K&iacute;ch thước : Freesize d&agrave;nh cho mẹ từ 43</p>\r\n', '390000.00', 50000, 'combo-dam-doi-pendi-xinh-xan-th08560-1m4G3-GmhUQZ.jpg', '[\"combo-dam-doi-pendi-xinh-xan-th08560-1m4G3-mPSYrq.jpg\",\"combo-dam-doi-pendi-xinh-xan-th08560-1m4G3-tp7Ma5.jpg\",\"combo-dam-doi-pendi-xinh-xan-th08560-1m4G3-Xd5kQ5.jpg\"]', 3, 65, 1, 4, 1, 1, 1493983674),
(20, 21, 'COMBO ĐẦM KÈM ÁO KHOÁC CHOÀNG', '<p><strong>TH&Ocirc;NG TIN SẢN PHẨM&nbsp;</strong></p>\r\n\r\n<p>- Chất liệu : thun</p>\r\n\r\n<p>- Năm sản xuất : 2016</p>\r\n\r\n<p>- Xuất xứ : Việt nam ( c&ocirc;ng ty th&aacute;i ho&agrave;ng sx)<br />\r\n- M&agrave;u sắc : caro&nbsp;</p>\r\n\r\n<p>- K&iacute;ch thước : Freesize d&agrave;nh cho mẹ từ 43-55kg - size M từ 13-17kg- L &nbsp;từ 17-22kg<br />\r\n&nbsp;</p>\r\n', '380000.00', 90000, 'combo-dam-kem-ao-khoac-choang-thoi-trang-th08603-gs195-1m4G3-1SqJve.jpg', '[\"combo-dam-kem-ao-khoac-choang-thoi-trang-th08603-gs195-1m4G3-FWKQKq.jpg\"]', 32, 57, 1, 4, 1, 1, 1493983674),
(21, 21, 'COMBO ĐÔI ĐẦM MẸ VÀ BÉ MICKEY', '<p>T&ecirc;n sp:&nbsp;<a href=\"https://ban.sendo.vn/product\">Combo &aacute;o thun mẹ v&agrave; b&eacute; Mickey</a><br />\r\n<br />\r\nChất liệu: Thun cotton c&aacute; sấu cao cấp mềm mại thoải mai khi mặc cho c&aacute;c n&agrave;ng<br />\r\n<br />\r\nM&agrave;u sắc: &nbsp; &nbsp;Hồng - Trắng 2 m&agrave;u 100% như h&igrave;nh ảnh minh họa. Gam m&agrave;u trẻ trung cho c&aacute;c n&agrave;ng<br />\r\n<br />\r\nThiết kế đơn giản kiểu đầm su&ocirc;ng, form rộng , cổ tr&ograve;n tay lỡ &nbsp; ph&ocirc;i m&agrave;u &nbsp;trẻ trung xin xắn cho&nbsp;<a href=\"https://www.sendo.vn/me-va-be.htm\">mẹ v&agrave; b&eacute;</a><br />\r\n<br />\r\nPh&ugrave; hợp với c&aacute;c mặt dao phố, du lịch, mặc nh&agrave;., đi l&agrave;m, dự tiệc, event ...<br />\r\n<br />\r\nK&iacute;ch thước: Free Size<br />\r\n<br />\r\nCho b&eacute; từ 15 ---&gt; 22 kg</p>\r\n', '180000.00', 35000, 'combo-doi-dam-me-va-be-mickey-ddp08444-1.jpg', '[\"combo-doi-dam-me-va-be-mickey-ddp08444.jpg\",\"combo-doi-dam-me-va-be-mickey-ddp08444-1m4G.jpg\",\"combo-doi-dam-me-va-be-mickey-ddp08444-1m4G3-6653ea_simg_d0daf0_800x1200_max.jpg\"]', 1, 42, 1, 4, 1, 1, 1493983674),
(22, 21, 'COMBO ĐẦM CẶP MẸ VÀ BÉ', '<p>Set đ&ocirc;i mẹ v&agrave; b&eacute; gồm :<br />\r\n&Aacute;o d&agrave;i tay + v&aacute;y yếm cho mẹ c&acirc;n nặng từ 43kg - 53kg<br />\r\n&Aacute;o d&agrave;i tay + quần yếm cho b&eacute; trai/ b&eacute; g&aacute;i c&acirc;n nặng từ 17kg- 24kg<br />\r\nM&agrave;u sắc y h&igrave;nh<br />\r\nChất cotton cao cấp d&agrave;y mịn đẹp. Bao d&agrave;y .<br />\r\nShop ko ship h&agrave;ng để xem hay l&yacute; do ko vừa ko th&iacute;ch ko hợp....<br />\r\nTất cả sp đều c&oacute; h&igrave;nh chụp đầy đủ n&ecirc;n kh&aacute;ch vui l&ograve;ng xem kỹ trước khi mua h&agrave;ng b&ecirc;n shop</p>\r\n', '400000.00', 100000, 'combo-dam-cap-me-va-be-1m4G3-epzjq8_simg_d0daf0_800x1200_max.jpg', '[\"combo-dam-cap-me-va-be-1m4G3-hKwaQm_simg_d0daf0_800x1200_max.jpg\",\"combo-dam-cap-me-va-be-1m4G3-SxVIlb_simg_d0daf0_800x1200_max.jpg\",\"combo-dam-cap-me-va-be-1m4G3-WqmKco_simg_d0daf0_800x1200_max.jpg\"]', 1, 54, 1, 4, 1, 1, 1493983674),
(23, 21, 'COMBO ĐẦM REN MÙA XUÂN', '<p><strong>TH&Ocirc;NG TIN SẢN PHẨM&nbsp;</strong></p>\r\n\r\n<p>- Chất liệu : REN</p>\r\n\r\n<p>- Năm sản xuất : 2016</p>\r\n\r\n<p>- Xuất xứ : Việt nam&nbsp;</p>\r\n\r\n<p>- M&agrave;u sắc :đỏ</p>\r\n\r\n<p>- K&iacute;ch thước : Freesize từ 43-55k... size M từ 13-17. size L từ 17-25</p>\r\n', '450000.00', 80000, 'combo-dam-ren-mua-xuan-cho-me-va-be-th08602-gs210-1m4G3-g4rMfx.jpg', '[\"combo-dam-ren-mua-xuan-cho-me-va-be-th08602-gs210-1m4G3-kwPno1.jpg\"]', 25, 73, 9, 22, 5, 1, 1493983674),
(25, 11, 'Ngắn Tay Cao Cấp Kiểu Dáng Hàn Quốc', '<ul>\r\n	<li><strong><em>Sơ Mi Nam Ngắn Tay Cao Cấp</em> </strong>Kiểu dáng Hàn Quốc</li>\r\n	<li>Phom Dáng Slim Fix</li>\r\n	<li>Chất liệu 90% Cotton</li>\r\n	<li>Áo cao cấp, <strong>KHÔNG</strong> bai xù, mất phom sau thời gian dài sử dụng.</li>\r\n</ul>\r\n', '450000.00', 150000, 'so-mi-nam-ngan-tay-cao-cap-kieu-dang-han-quoc-1m4G3-8aLJTO_simg_d0daf0_800x1200_max.jpg', '[\"so-mi-nam-ngan-tay-cao-cap-kieu-dang-han-quoc-1m4G3-6pRF6s_simg_d0daf0_800x1200_max.jpg\",\"so-mi-nam-ngan-tay-cao-cap-kieu-dang-han-quoc-1m4G3-E232HF_simg_d0daf0_800x1200_max.jpg\",\"so-mi-nam-ngan-tay-cao-cap-kieu-dang-han-quoc-1m4G3-F3VBLA_simg_d0daf0_800x1200_max.jpg\"]', 6, 34, 7, 9, 2, 1, 1493983674),
(27, 14, 'Quần short kaki nam - QKN44', '<p>Quần short&nbsp;<a href=\"https://www.sendo.vn/kaki-nam.htm\">Kaki Nam</a></p>\r\n\r\n<p>Vải kaki loại 1, form chuẩn t&ocirc;n d&aacute;ng &nbsp;</p>\r\n\r\n<p>Size: 28-32</p>\r\n', '200000.00', 40000, 'quan-short-kaki-nam-1m4G3-sexFoa_simg_d0daf0_800x1200_max.jpg', '[\"quan-short-kaki-nam-1m4G3-E4MW4M_simg_d0daf0_800x1200_max.jpg\",\"quan-short-kaki-nam-1m4G3-iKaEX7_simg_d0daf0_800x1200_max.jpg\",\"quan-short-kaki-nam-1m4G3-reyYEA_simg_d0daf0_800x1200_max.jpg\"]', 7, 65, 3, 4, 1, 1, 1493983674),
(28, 13, 'Quần kaki Nam Lịch Lãm - D36', '<p>Quần kaki nam lịch l&atilde;m</p>\r\n\r\n<p>Chất liệu vải kaki loại 1 d&agrave;y mịn</p>\r\n\r\n<p>C&oacute; đủ size 28,29,30,31,32</p>\r\n\r\n<p>Với 3 t&ocirc;ng m&agrave;u trầm đen,xanh đen rất dễ phối với &aacute;o thun,&aacute;o sơ mi,...tạo phong c&aacute;ch thanh lịch cho c&aacute;c bạn nam khi diện đến c&ocirc;ng sở, đi chơi,du lịch,...</p>\r\n', '169000.00', 83, 'quan-kaki-nam-lich-lam-1m4G3-NvjQo7_simg_d0daf0_800x1200_max.jpg', '[\"quan-kaki-nam-lich-lam-1m4G3-tyzFof_simg_d0daf0_800x1200_max.png\",\"quan-kaki-nam-lich-lam-1m4G3-uSjiJP_simg_d0daf0_800x1200_max.jpg\"]', 24, 87, 5, 18, 4, 1, 1493983674),
(49, 10, 'Áo thun cổ bẻ MEN FOR IT W 2018 nam - W04', '<h1><strong>T&ecirc;n sản phẩm:</strong>&nbsp;&Aacute;o thun cổ bẻ MEN FOR IT W 2018 nam</h1>\r\n\r\n<p><strong>Chất liệu:</strong>&nbsp;Thun c&aacute; sấu 65/35 - 4 chiều cao cấp</p>\r\n\r\n<p><strong>M&agrave;u sắc:</strong>&nbsp;đỏ đ&ocirc;, trắng, x&aacute;m, xanh đen, xanh da</p>\r\n\r\n<p><strong>Size M:</strong>&nbsp;d&agrave;nh cho nam dưới 55kg</p>\r\n\r\n<p><strong>Size L:</strong>&nbsp;d&agrave;nh cho nam từ 55kg - 65kg</p>\r\n\r\n<p><strong>Size XL:</strong>&nbsp;d&agrave;nh cho nam từ 65kg - 75kg</p>\r\n\r\n<p><strong>Size XXL:</strong>&nbsp;d&agrave;nh cho nam từ 75kg - 85kg</p>\r\n', '150000.00', 0, '1_2.png', '[\"1_3.png\",\"11.png\"]', 0, 52, 0, 4, 1, 1, 1557369598),
(50, 10, 'Áo thun sọc ngang dài tay cao cấp ATD05 - ATD05', '<p>Áo thun nam sọc ngang dài tay MS: ATD05<br />\r\nCh&acirc;́t li&ecirc;̣u: thun cotton co giãn 4 chi&ecirc;̀u<br />\r\nMàu sắc: 3 màu :Sọc Đen - Trắng<br />\r\nSọc Xám - Trắng<br />\r\nSọc Xanh - Trắng<br />\r\nSize: M &lt; 55kg, L &lt; 62kg, XL &lt; 72kg</p>\r\n', '109000.00', 0, '2_1.jpg', '[\"2_2.jpg\",\"2_3.jpg\"]', 0, 36, 0, 4, 1, 1, 1557369705),
(51, 10, 'Áo thun nam in hình Tôi yêu Việt Nam thời trang Everest Aoknam421 - Aoknam421', '<ul>\r\n	<li><strong>Chất vải:</strong>&nbsp;Vải PE,Cotton thun.</li>\r\n	<li><strong>Họa tiết:</strong>&nbsp;Hoạt h&igrave;nh.</li>\r\n	<li>\r\n	<p>&nbsp;<strong>&Aacute;o thun nam cổ tr&ograve;n in h&igrave;nh:&nbsp;</strong>Chất liệu thun mềm mại, tho&aacute;ng m&aacute;t, thấm h&uacute;t tốt, kh&ocirc;ng lo hầm b&iacute; khi mặc. Thiết kế cổ tr&ograve;n, tay ngắn mang lại cho ph&aacute;i mạnh phong c&aacute;ch nam t&iacute;nh v&agrave; lịch l&atilde;m khi mặc h&agrave;ng ng&agrave;y .</p>\r\n	</li>\r\n</ul>\r\n', '41000.00', 0, '3_1.jpg', '[\"3_2.jpg\",\"3_3.jpg\"]', 1, 36, 0, 4, 1, 1, 1557369861),
(52, 11, 'Áo sơ mi nam Mỹ - TTN43', '<ul>\r\n	<li><strong>Chất vải:</strong>&nbsp;Th&ocirc;.</li>\r\n	<li><strong>Họa tiết:</strong>&nbsp;Chấm bi.</li>\r\n	<li>Sản phẩm được mua trực tiếp tại Mỹ\r\n	<p>H&atilde;ng H&amp;M Mỹ</p>\r\n\r\n	<p>Size S</p>\r\n\r\n	<p>Chất liệu th&ocirc; mềm</p>\r\n\r\n	<p>Cổ t&agrave;u</p>\r\n\r\n	<p>Tay d&agrave;i</p>\r\n	</li>\r\n</ul>\r\n', '500000.00', 0, '4_1.jpg', '[\"4_11.jpg\",\"4_2.jpg\"]', 0, 36, 0, 4, 1, 1, 1557369993),
(53, 11, 'áo sơ mi nam thời trang - K001', '<ul>\r\n	<li><strong>Chất vải:</strong>&nbsp;Kh&aacute;c.</li>\r\n	<li><strong>Họa tiết:</strong>&nbsp;Trơn.</li>\r\n	<li><strong>Kiểu tay &aacute;o:</strong>&nbsp;Tay d&agrave;i.</li>\r\n</ul>\r\n', '200000.00', 0, '5_1.jpg', '[\"5_11.jpg\",\"5_2.jpg\"]', 1, 36, 0, 4, 1, 1, 1557370091),
(54, 11, 'áo nam sơ mi dài tay - A01', '<ul>\r\n	<li><strong>Chất vải:</strong>&nbsp;Cotton pha.</li>\r\n	<li><strong>Họa tiết:</strong>&nbsp;H&igrave;nh học.</li>\r\n	<li><strong>Kiểu tay &aacute;o:</strong>&nbsp;Tay d&agrave;i.</li>\r\n	<li>&Aacute;o sơ mi nam d&agrave;i tay, phong c&aacute;ch trẻ trung</li>\r\n</ul>\r\n', '199000.00', 0, '6_1.jpg', '[\"6_11.jpg\",\"6_2.jpg\"]', 0, 56, 0, 4, 1, 1, 1557370193),
(55, 12, 'quần jean nam BNT78', '<ul>\r\n	<li><strong>Loại vải jean:</strong>&nbsp;Jean trơn.</li>\r\n	<li>Sản phẩm được shop đặt may ri&ecirc;ng với chất liệu vải d&agrave;y bền bỉ.</li>\r\n	<li>M&agrave;u vải được nhộm kỹ đảm bảo kh&ocirc;ng ra m&agrave;u khi giặt.</li>\r\n	<li>From quần su&ocirc;ng, &ocirc;mrất thoải m&aacute;i khi mặc.</li>\r\n	<li>H&igrave;nh ảnh được chụp với sản phẩm thực đang b&aacute;n, cam kết giống h&igrave;nh 100%.</li>\r\n	<li>Chất liệu co gi&atilde;n gi&uacute;p người mặc thoải m&aacute;i</li>\r\n	<li>Đổi trả sản phẩm miễn ph&iacute; nếu sai s&oacute;t của nh&agrave; b&aacute;n h&agrave;ng</li>\r\n	<li>Cảm ơn bạn đ&atilde; ủng hộ v&agrave; chia sẻ gian h&agrave;ng cho người th&acirc;n</li>\r\n	<li>H&agrave;i l&ograve;ng của bạn l&agrave; hạnh ph&uacute;c của ch&uacute;ng t&ocirc;i</li>\r\n</ul>\r\n', '150000.00', 0, '7_1.jpg', '[\"7_2.jpg\",\"7_3.jpg\"]', 0, 87, 0, 4, 1, 1, 1557370286),
(56, 12, 'quần jean nam bò', '<ul>\r\n	<li><strong>Loại vải jean:</strong>&nbsp;Jean r&aacute;ch.</li>\r\n	<li>Sản phẩm được shop đặt may ri&ecirc;ng với chất liệu vải d&agrave;y bền bỉ.</li>\r\n	<li>M&agrave;u vải được nhộm kỹ đảm bảo kh&ocirc;ng ra m&agrave;u khi giặt.</li>\r\n	<li>From quần su&ocirc;ng, &ocirc;m rất thoải m&aacute;i khi mặc.</li>\r\n	<li>H&igrave;nh ảnh được chụp với sản phẩm thực đang b&aacute;n, cam kết giống h&igrave;nh 100%.</li>\r\n	<li>Chất liệu co gi&atilde;n gi&uacute;p người mặc thoải m&aacute;i</li>\r\n	<li>Đổi trả sản phẩm miễn ph&iacute; nếu sai s&oacute;t của nh&agrave; b&aacute;n h&agrave;ng</li>\r\n	<li>Cảm ơn bạn đ&atilde; ủng hộ v&agrave; chia sẻ gian h&agrave;ng cho người th&acirc;n</li>\r\n	<li>H&agrave;i l&ograve;ng của bạn l&agrave; hạnh ph&uacute;c của ch&uacute;ng t&ocirc;i</li>\r\n</ul>\r\n', '169000.00', 0, '8_1.jpg', '[\"8_11.jpg\",\"8_2.png\",\"8_3.png\"]', 0, 36, 0, 4, 1, 1, 1557370411),
(57, 20, 'ét áo váy gia đình xanh đen phối sọc HGS 171 - HGS 171', '<p>M&agrave;u Sắc: sọc y h&igrave;nh</p>\r\n\r\n<p>Chất Liệu: Thun Cotton loại 1</p>\r\n\r\n<p>zalo v&agrave; số dt tư vấn đặt h&agrave;ng:&nbsp;0394966969</p>\r\n\r\n<p>Vui l&ograve;ng Kh ghi số kg hoặc size theo bảng size v&agrave;o &ocirc; &quot;lời nhắn&quot; khi đặt h&agrave;ng nh&eacute;.&nbsp;</p>\r\n', '585000.00', 0, '9_1.jpg', '[]', 0, 36, 0, 4, 1, 1, 1557370539),
(58, 20, '4 áo váy gia đình - AG0683', '<p>- Kiểu &aacute;o: &Aacute;o thun cổ tr&ograve;n tay ngắn.</p>\r\n\r\n<p>- Chất liệu: Thun cotton 4 chiều.</p>\r\n\r\n<p>- Size &aacute;o: Đủ size &aacute;o để lựa chọn.</p>\r\n\r\n<p>- C&ocirc;ng nghệ in: Theo c&ocirc;ng nghệ H&agrave;n Quốc</p>\r\n\r\n<p>- Gi&aacute; b&aacute;n của 1 bộ gồm 4 &aacute;o v&aacute;y.</p>\r\n\r\n<p><br />\r\n<strong>M&agrave;u sắc: Như h&igrave;nh</strong></p>\r\n\r\n<p><br />\r\n<strong><em>Gi&aacute; b&aacute;n của 4 &aacute;o v&aacute;y&nbsp;</em></strong></p>\r\n', '690000.00', 0, '10_1.jpg', '[\"10_11.jpg\"]', 1, 87, 1, 4, 1, 1, 1557370616),
(59, 13, 'Quần kaki nam màu kem cực chất mẫu mới HOT - kaki10', '<p>Chất liệu kaki mềm mại, lu&ocirc;n th&ocirc;ng tho&aacute;ng, đảm bảo cảm gi&aacute;c thoải m&aacute;i, dễ chịu khi mặc.<br />\r\n- Form d&aacute;ng &ocirc;m body kh&aacute; dễ mặc, đường may tỉ mỉ, chắc chắn.<br />\r\n- C&oacute; thể mix linh hoạt với &aacute;o thun năng động dạo phố, hoặc sơ mi thanh lịch nơi c&ocirc;ng sở&nbsp;<br />\r\nChuy&ecirc;n b&aacute;n bu&ocirc;n, b&aacute;n lẻ: Thời trang nam gi&aacute; gốc<br />\r\n. Ch&uacute;ng t&ocirc;i h&acirc;n hạnh v&agrave; lu&ocirc;n cố gắng để mang đến cho qu&yacute; kh&aacute;ch những sản phẩm chất lượng với gi&aacute; cả tốt nhất v&agrave; dịch vụ uy t&iacute;n.<br />\r\nTất cả c&aacute;c sản phẩm đều được ch&uacute;ng t&ocirc;i tuyển chọn một c&aacute;ch kỹ lưỡng sao cho ph&ugrave; hợp với phong c&aacute;ch Ch&acirc;u &Aacute; v&agrave; bắt nhịp c&ugrave;ng xu hướng trẻ.</p>\r\n', '149000.00', 0, '11_1.jpg', '[\"11_11.jpg\",\"11_2.png\"]', 0, 56, 0, 4, 1, 1, 1557370742),
(60, 13, 'Quần Kaki Dài Nam Trung Niên - KKD002', '<p>Mẫu thiết kế nầy ph&ugrave; hợp với lứa tuổi trung ni&ecirc;n. Sản phẩm kh&ocirc;ng bị lỗi thời</p>\r\n\r\n<p>Form quần thẳng đứng, tạo vẻ ch&iacute;n chắn, rất nam t&iacute;nh ph&ugrave; hợp để đi c&aacute;c sự kiện, thăm hỏi người th&acirc;n, nh&acirc;n vi&ecirc;n văn ph&ograve;ng,dạy học .... (N&oacute;i chung l&agrave; đi những nơi lịch sự, trang trọng).</p>\r\n\r\n<ul>\r\n	<li>- Với 2 t&uacute;i trước v&agrave; 2 t&uacute;i sau, t&uacute;i trước đường chỉ điều, t&uacute;i sau đường thi&ecirc;u độc đ&aacute;o</li>\r\n	<li>- Kh&oacute;a k&eacute;o bằng kim loại.</li>\r\n	<li>- Chất liệu kaki cao cấp 3303 Nguy&ecirc;n liệu nhập từ nước ngo&agrave;i v&agrave; dệt ở Việt Nam thấm h&uacute;t mồ h&ocirc;i tốt, Kh&ocirc;ng nhăn nheo khi giặt, kh&ocirc;ng, kh&ocirc;ng ra m&agrave;u, kh&ocirc;ng đổ l&ocirc;ng...</li>\r\n	<li>- Đường may rất bền với kỹ thuật may gấp kh&uacute;c 2 vải lại với nhau may 1 đường chỉ l&oacute;t, đường chỉ ch&iacute;nh gồm 3 sợi chỉ may xoắn v&agrave;o nhau để tạo độ bền chắc</li>\r\n	<li>- Size từ 28-34</li>\r\n</ul>\r\n', '129000.00', 0, '12_1.jpg', '[\"12_11.jpg\",\"12_2.jpg\",\"12_3.jpg\"]', 1, 87, 1, 4, 1, 1, 1557370824),
(61, 14, 'COMBO 2 quần short jean cao cấp', '<p><strong>ƯU &Yacute;:</strong>&nbsp;GI&Aacute; TR&Ecirc;N&nbsp;<strong>GỒM 2 quần short jean</strong>&nbsp;<strong>cao cấp&nbsp;</strong>hiện tại shop c&oacute; 3 m&agrave;u chủ đạo l&agrave; xanh nhạt, xanh vi sinh, xanh đen-----&gt;&gt; nếu bạn đặt shop sẽ gửi 2 m&agrave;u cho bạn dễ phối đồ, hoặc inbox cho shop để chọn m&agrave;u t&ugrave;y &yacute; nh&eacute; !<br />\r\n-&nbsp;<strong>Quần short jean</strong>&nbsp;<strong>cao cấp</strong>&nbsp;được may bằng chất liệu jean phủi bụi cao cấp, dễ thấm h&uacute;t mồ h&ocirc;i cho bạn nam thoải m&aacute;i vận động ở mọi tư thế.<br />\r\n- Kiểu d&aacute;ng quần short năng động, phối t&uacute;i c&aacute; t&iacute;nh, tạo phong c&aacute;ch trẻ trung, mới lạ.<br />\r\n- Dễ d&agrave;ng mix c&ugrave;ng c&aacute;c kiểu T-shirt năng động, sơ mi tay ngắn khỏe khoắn, gi&agrave;y lười hoặc gi&agrave;y thể thao thời trang&hellip;<br />\r\n- Th&iacute;ch hợp mặc ở nh&agrave;, dạo phố, đi chơi, d&atilde; ngoại&hellip;</p>\r\n\r\n<p>✨ SIZE 28 - 29 - 30 - 31 - 32 - 33- 34- 35- 36</p>\r\n', '200000.00', 0, '13_1.jpg', '[\"13_11.jpg\",\"13_2.jpg\",\"13_3.jpg\"]', 0, 52, 0, 4, 1, 1, 1557370945),
(62, 14, 'Quần Short Kaki Vải- SKK99-1', '<p>Quần short Kaki nam vải xuất dư (vải tốt mua tồn kho từ những c&ocirc;ng ty lớn với gi&aacute; rẻ)</p>\r\n\r\n<p>Đặc điểm sản phẩm:</p>\r\n\r\n<ul>\r\n	<li>Chất vải: Cotton 100%</li>\r\n	<li>Form: d&aacute;ng thỏa m&aacute;i.</li>\r\n	<li>Độ d&agrave;y vải: trung b&igrave;nh, kh&ocirc;ng mỏng</li>\r\n	<li>May tại xưởng của shop</li>\r\n	<li>Gi&aacute; th&agrave;nh: Nếu t&igrave;m được nơi n&agrave;o c&ugrave;ng loại vải, kỹ thuật may tương đương shop sẽ ho&agrave;n gấp 3 lần gi&aacute; th&agrave;nh.</li>\r\n	<li>H&igrave;nh ảnh tr&ecirc;n l&agrave; h&igrave;nh ảnh thật của sản phẩm.</li>\r\n</ul>\r\n', '80000.00', 0, '14_1.jpg', '[\"14_11.jpg\",\"14_2.jpg\",\"14_3.jpg\"]', 1, 85, 0, 4, 1, 1, 1557371056);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `name`, `image_link`, `link`, `sort_order`, `created`) VALUES
(1, '1', 'slide11.png', 'http://localhost/webshop/phoi-ren-p4', 1, '2019-04-07 15:24:43'),
(4, '2', 'slide21.jpg', 'http://localhost/webshop/ao-gia-dinh-ag0560-p16', 2, '2019-04-07 15:36:41'),
(5, '3', 'slide31.jpg', 'http://localhost/webshop/phong-cach-phoi-mau-p24', 3, '2019-04-07 15:37:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `payment` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `status`, `user_id`, `user_name`, `user_email`, `user_phone`, `user_address`, `message`, `amount`, `payment`, `created`) VALUES
(29, 1, 10, 'Đình Hiếu', 'admin@gmail.com', '0395825945', 'HY', 'tttt', '168917.00', '', 1557387197),
(31, 0, 10, 'Tuấn Anh', 'admin@gmail.com', '0394966969', 'HY', 'gửi hàng vào 12h', '507000.00', '', 1557391136),
(28, 1, 10, 'Tuấn Anh', 'admin@gmail.com', '0394966969', 'HY', 'RRRR', '2070000.00', '', 1557387167),
(30, 0, 10, 'Tuấn Anh', 'admin@gmail.com', '0394966969', 'HY', 'ttt', '80000.00', '', 1557389084),
(27, 1, 10, 'Tuấn Anh', 'admin@gmail.com', '0394966969', 'HY', 'AAA', '129000.00', '', 1557386987),
(25, 1, 0, 'Trần Chí Doãn', 'admin@gmail.com', '0394966969', 'HY', 'aaa', '300000.00', '', 1557367552),
(26, 1, 0, 'Tuấn Anh', 'nguoimientrung1610@gmail.com', '0395825945', 'Khoái Châu- Hưng Yên', 'aaa', '170000.00', '', 1557367599);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `address`, `created`) VALUES
(10, 'Tuấn Anh', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0394966969', 'HY', 2019),
(9, 'Tieu Vu', 'tranchidoanhy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0394966969', 'HY', 2019);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
