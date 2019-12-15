-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2017 at 08:23 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- --------------------------------------------------------

--
-- Table structure for table `cms_customers`
--

CREATE TABLE `cms_customers` (
  `ID` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_addr` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `customer_birthday` datetime NOT NULL,
  `customer_gender` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_init` int(11) NOT NULL,
  `user_upd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_customers`
--

INSERT INTO `cms_customers` (`ID`, `customer_name`, `customer_phone`, `customer_email`, `customer_addr`, `notes`, `customer_birthday`, `customer_gender`, `created`, `updated`, `user_init`, `user_upd`) VALUES
(1, 'Nguyễn Huy Toàn', '0973870336', 'nguyentoanahv@gmail.com', 'Hương Lâm - Hiệp Hòa - Bắc Giang', '', '1984-09-21 00:00:00', 0, '2016-05-31 08:13:49', '0000-00-00 00:00:00', 1, 0),
(2, 'Trần Văn Nam', '0984666027', 'namtran2210@gmail.com', 'Trung Thành, tp. Thái Nguyên, Thái Nguyên', '', '1962-10-22 00:00:00', 0, '2016-05-31 08:14:54', '2016-05-31 08:16:22', 1, 1),
(3, 'Trần Mạnh Ninh', '0902178888', 'tranmanhninh@gmail.com', 'Phường Cam Giá, Thành phố Thái Nguyên', '', '1982-01-26 00:00:00', 0, '2016-05-31 08:18:47', '0000-00-00 00:00:00', 1, 0),
(4, 'Phạm Văn Thái', '0973820333', 'thaipham2112@yahoo.com.vn', 'số 156 ngõ Xã Đàn 2, Đống đa, Hà Nội', '', '1993-12-22 00:00:00', 0, '2016-05-31 08:20:40', '0000-00-00 00:00:00', 1, 0),
(5, 'Nguyễn Thị Anh', '0973870336', '', 'Số 178 - Trung Thành Thái Nguyên', '', '1971-06-09 00:00:00', 0, '2016-06-02 13:46:42', '2016-06-02 13:50:51', 1, 1),
(6, 'Nguyễn Tuấn Anh', '0963888376', 'anhnt2206@gmail.com', 'Hương Lâm - HH - Bắc Giang', '', '2016-06-09 00:00:00', 0, '2016-06-02 13:47:40', '2016-06-02 13:48:07', 1, 1),
(7, 'Trần Thị Lan Anh', '0986909908', 'lananhtran@yahoo.com.vn', 'Phan Đình Phùng - Hà Nội', '', '1986-09-03 00:00:00', 1, '2016-06-02 13:49:57', '2016-06-02 14:04:23', 1, 1),
(8, 'Nguyễn Anh Tuấn', '01668731648', '', 'Sô 33A - Đường Tròn Gang Thép - TP.Thái Nguyên', '', '1992-06-11 00:00:00', 0, '2016-06-02 14:03:02', '0000-00-00 00:00:00', 1, 0),
(9, 'Đinh Trọng Nam', '02803678002', 'dinhnam@gmail.com', 'Số 119 - Đường Phan Đình Phùng - Tp.Thái Nguyên', '', '1988-06-10 00:00:00', 0, '2016-06-02 14:04:17', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cms_import_stock`
--

CREATE TABLE `cms_import_stock` (
  `ID` int(10) UNSIGNED NOT NULL,
  `id_manuf` int(11) NOT NULL,
  `id_stock` int(11) NOT NULL,
  `input_date` datetime NOT NULL,
  `notes` varchar(255) NOT NULL,
  `payment_method` tinyint(4) NOT NULL,
  `discount` int(11) NOT NULL,
  `total_money` varchar(255) NOT NULL,
  `payed` int(11) NOT NULL,
  `lack` varchar(255) NOT NULL,
  `detail_import` varchar(255) NOT NULL,
  `import_status` tinyint(1) NOT NULL,
  `import_del_temp` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_init` int(11) NOT NULL,
  `user_upd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_import_stock`
--

INSERT INTO `cms_import_stock` (`ID`, `id_manuf`, `id_stock`, `input_date`, `notes`, `payment_method`, `discount`, `total_money`, `payed`, `lack`, `detail_import`, `import_status`, `import_del_temp`, `created`, `updated`, `user_init`, `user_upd`) VALUES
(1, 0, 1, '2016-05-31 11:14:07', '', 1, 1234, '7,598,766', 0, '7,598,766', '[{"id":"11","count":"200"}]', 1, 0, '2016-05-31 11:14:07', '0000-00-00 00:00:00', 1, 0),
(2, 0, 1, '2016-05-31 11:19:28', '', 1, 0, '35,000', 0, '35,000', '[{"id":"9","count":"1"}]', 1, 0, '2016-05-31 11:19:28', '0000-00-00 00:00:00', 1, 0),
(3, 0, 1, '2016-05-31 11:20:27', '', 1, 0, '35,000', 0, '35,000', '[{"id":"9","count":"1"}]', 1, 0, '2016-05-31 11:20:27', '0000-00-00 00:00:00', 1, 0),
(4, 0, 1, '2016-05-31 11:20:51', '', 1, 0, '35,000', 0, '35,000', '[{"id":"9","count":"1"},{"id":"10","count":"1"}]', 1, 0, '2016-05-31 11:20:51', '0000-00-00 00:00:00', 1, 0),
(5, 0, 1, '2016-05-31 11:33:29', '', 1, 0, '27,902', 0, '27,902', '[{"id":"7","count":"200"}]', 1, 0, '2016-05-31 11:33:29', '0000-00-00 00:00:00', 1, 0),
(6, 0, 1, '2016-05-31 11:34:03', '', 1, 0, '27,902', 0, '27,902', '[{"id":"7","count":"1"},{"id":"8","count":"3005"}]', 1, 0, '2016-05-31 11:34:03', '0000-00-00 00:00:00', 1, 0),
(7, 0, 1, '2016-06-02 13:52:10', '', 1, 344456, '11,055,544', 0, '11,055,544', '[{"id":"11","count":"300"}]', 1, 0, '2016-06-02 13:52:10', '0000-00-00 00:00:00', 1, 0),
(8, 3, 1, '2016-06-02 13:53:05', '', 1, 0, '14,937,600', 14937600, '0', '[{"id":"12","count":"389"}]', 1, 0, '2016-06-02 13:53:05', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cms_manufactures`
--

CREATE TABLE `cms_manufactures` (
  `ID` int(10) UNSIGNED NOT NULL,
  `manuf_name` varchar(255) NOT NULL,
  `manuf_phone` varchar(30) NOT NULL,
  `manuf_email` varchar(150) NOT NULL,
  `manuf_addr` varchar(255) NOT NULL,
  `tax_code` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_init` int(11) NOT NULL,
  `user_upd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_manufactures`
--

INSERT INTO `cms_manufactures` (`ID`, `manuf_name`, `manuf_phone`, `manuf_email`, `manuf_addr`, `tax_code`, `notes`, `created`, `updated`, `user_init`, `user_upd`) VALUES
(1, 'Công Ty TNHH Thương Mại Sắt Thép Ánh Hoa II', '06503514098', 'anhhoaservices@gmail.com', 'ấp Phú Hoà, Xã Hoà Lợi, Bến Cát,Bình Dương', '22945852456', '', '2016-05-31 08:24:56', '2016-05-31 08:30:59', 1, 1),
(2, 'CÔNG TY CỔ PHẦN GANG THÉP THÁI NGUYÊN - TISCO', '02803832236', 'tiscotn@gmail.com', 'Phường Cam Giá, Thành phố Thái Nguyên, Việt Nam', '24232125787', '', '2016-05-31 08:26:54', '2016-05-31 08:30:37', 1, 1),
(3, 'CÔNG TY CỔ PHẦN GANG THÉP THÁI NGUYÊN - TISCO', '0462848666', '', '39 Nguyễn Đình Chiểu, P.Lê Đại Hành, Q.Hai Bà Trưng, Hà Nội', '245854588', '', '2016-05-31 08:28:24', '2016-05-31 08:29:21', 1, 1),
(4, 'THÉP VIỆT Ý', '84462511092', '', 'Tầng 9A, Tòa Nhà Sông Đà HH4, Mỹ Đình I, Nam Từ Liêm, Hà Nội', '25845254111', '', '2016-05-31 08:33:07', '2016-05-31 08:33:30', 1, 1),
(5, 'TẬP ĐOÀN THÉP VIỆT NHẬT', '84313749998', '', 'Km9 - Quốc Lộ 5, Quán Toan, Hồng Bàng, Hải Phòng, Việt Nam', '231578545587', 'TẬP ĐOÀN THÉP VIỆT NHẬT', '2016-06-02 08:39:36', '2016-06-02 08:39:50', 1, 1),
(6, 'THÉP VIỆT ÚC (Vinausteel)', '84313850145', '', 'Km 9, Vật Cách, Phường Quán Toan, Quận Hồng Bàng, TP. Hải Phòng', '2578568885254', '', '2016-06-02 08:49:01', '2016-06-02 08:49:13', 1, 1),
(7, 'THÉP VIỆT HÀN', '0313850124', '', 'Km 9, Quan Toan, Hong Bang, Hai Phong', '231578545587', '', '2016-06-02 08:54:22', '2016-06-02 08:54:28', 1, 1),
(8, 'THÉP HÒA PHÁT', '0462848666', '', '39 Nguyễn Đình Chiểu, P.Lê Đại Hành, Q.Hai Bà Trưng, Hà Nội', '2578568885254', '', '2016-06-02 08:56:01', '2016-06-17 15:00:06', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_orders`
--

CREATE TABLE `cms_orders` (
  `ID` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) NOT NULL,
  `sell_date` datetime NOT NULL,
  `notes` varchar(255) NOT NULL,
  `payment_method` tinyint(4) NOT NULL,
  `coupon` int(11) NOT NULL,
  `count_money_pay` int(11) NOT NULL,
  `total_money` varchar(255) NOT NULL,
  `lack` varchar(255) NOT NULL,
  `detail_order` text NOT NULL,
  `order_status` tinyint(1) NOT NULL,
  `order_del_temp` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_init` int(11) NOT NULL,
  `user_upd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_orders`
--

INSERT INTO `cms_orders` (`ID`, `id_customer`, `sell_date`, `notes`, `payment_method`, `coupon`, `count_money_pay`, `total_money`, `lack`, `detail_order`, `order_status`, `order_del_temp`, `created`, `updated`, `user_init`, `user_upd`) VALUES
(1, 0, '2016-05-31 08:39:53', '', 1, 0, 0, '124,425,000', '124,425,000', '[{"id":"9","count":"200"}]', 1, 1, '2016-05-31 08:39:53', '0000-00-00 00:00:00', 1, 0),
(2, 0, '2016-05-31 11:11:11', '', 1, 0, 0, '105,000', '105,000', '[{"id":"9","count":"3"}]', 1, 1, '2016-05-31 11:11:11', '0000-00-00 00:00:00', 1, 0),
(3, 0, '2016-05-31 11:11:34', '', 1, 0, 0, '3,840,000', '3,840,000', '[{"id":"12","count":"100"}]', 1, 0, '2016-05-31 11:11:34', '0000-00-00 00:00:00', 1, 0),
(4, 0, '2016-05-31 11:35:11', '', 1, 0, 0, '27,902', '27,902', '[{"id":"7","count":"1"}]', 1, 0, '2016-05-31 11:35:11', '0000-00-00 00:00:00', 1, 0),
(5, 0, '2016-05-31 11:35:30', '', 1, 0, 0, '27,902', '27,902', '[{"id":"7","count":"1"}]', 1, 0, '2016-05-31 11:35:30', '0000-00-00 00:00:00', 1, 0),
(6, 0, '2016-05-31 11:36:02', '', 1, 0, 0, '27,902', '27,902', '[{"id":"7","count":"1"}]', 1, 0, '2016-05-31 11:36:02', '0000-00-00 00:00:00', 1, 0),
(7, 0, '2016-06-01 01:13:18', '', 1, 0, 0, '35,000', '35,000', '[{"id":"9","count":"1"}]', 1, 0, '2016-06-01 01:13:18', '0000-00-00 00:00:00', 1, 0),
(8, 0, '2016-06-01 01:22:40', '', 1, 0, 0, '181,400', '181,400', '[{"id":"9","count":"3"},{"id":"11","count":"1"},{"id":"12","count":"1"}]', 1, 0, '2016-06-01 01:22:40', '0000-00-00 00:00:00', 1, 0),
(9, 2, '2016-06-02 00:00:00', '', 1, 0, 110235200, '110,235,200', '110,235,200', '[{"id":"10","count":"200"},{"id":"12","count":"2678"}]', 1, 0, '2016-06-02 13:38:00', '0000-00-00 00:00:00', 1, 0),
(10, 4, '2016-06-02 13:39:01', '', 1, 0, 5850000, '5,850,000', '0', '[{"id":"16","count":"195"}]', 1, 0, '2016-06-02 13:39:01', '0000-00-00 00:00:00', 1, 0),
(11, 9, '2016-06-16 00:00:00', '', 2, 0, 2244, '6,000,000', '5,997,756', '[{"id":"16","count":"200"}]', 1, 0, '2016-06-15 18:01:01', '0000-00-00 00:00:00', 1, 0),
(12, 0, '2016-06-15 22:19:58', '', 1, 0, 0, '35,000', '35,000', '[{"id":"9","count":"1"}]', 1, 1, '2016-06-15 22:19:58', '0000-00-00 00:00:00', 6, 0),
(13, 0, '2016-06-17 14:29:53', '', 1, 0, 11110000, '11,110,000', '11,110,000', '[{"id":"9","count":"200"},{"id":"13","count":"150"}]', 1, 0, '2016-06-17 14:29:54', '0000-00-00 00:00:00', 1, 0),
(14, 0, '2016-06-17 14:32:54', '', 1, 0, 653200, '653,200', '0', '[{"id":"17","count":"100"},{"id":"18","count":"98"}]', 1, 0, '2016-06-17 14:32:54', '0000-00-00 00:00:00', 1, 0),
(15, 1, '2016-06-15 00:00:00', '', 1, 0, 5240000, '5,240,000', '5,240,000', '[{"id":"20","count":"200"}]', 1, 0, '2016-06-17 14:55:29', '0000-00-00 00:00:00', 1, 0),
(16, 4, '2016-08-22 00:00:00', '', 1, 0, 0, '38,000,000', '38,000,000', '[{"id":"11","count":"1000"}]', 1, 0, '2016-06-22 13:46:42', '0000-00-00 00:00:00', 1, 0),
(17, 0, '2016-06-22 13:47:23', '', 1, 0, 0, '7,680,000', '7,680,000', '[{"id":"12","count":"200"}]', 1, 0, '2016-06-22 13:47:23', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cms_permissions`
--

CREATE TABLE `cms_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_url` varchar(255) NOT NULL,
  `permission_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_permissions`
--

INSERT INTO `cms_permissions` (`id`, `permission_url`, `permission_name`) VALUES
(2, 'backend/config', 'Thiết lập (Thông tin cửa hàng, nhân viên, thiết lập bán hàng, phân quyền)'),
(3, 'backend/inventory', 'Báo cáo tồn kho'),
(4, 'backend/import', 'Nhập hàng'),
(5, 'backend/order', 'Đơn hàng'),
(6, 'backend/product', 'Hàng Hóa'),
(7, 'backend/dashboard', 'Báo cáo mỗi ngày');

-- --------------------------------------------------------

--
-- Table structure for table `cms_products`
--

CREATE TABLE `cms_products` (
  `ID` int(10) UNSIGNED NOT NULL,
  `prd_name` varchar(255) NOT NULL,
  `prd_sls` int(11) NOT NULL,
  `prd_origin_price` int(11) NOT NULL,
  `prd_sell_price` int(11) NOT NULL,
  `prd_vat` tinyint(4) NOT NULL,
  `prd_status` tinyint(4) NOT NULL,
  `prd_inventory` tinyint(1) NOT NULL,
  `prd_del_temp` tinyint(4) NOT NULL,
  `prd_category_id` int(11) NOT NULL,
  `prd_group_id` int(11) NOT NULL,
  `prd_image_url` int(11) NOT NULL,
  `prd_descriptions` text NOT NULL,
  `prd_manuf_id` int(11) NOT NULL,
  `prd_hot` tinyint(1) NOT NULL,
  `prd_new` tinyint(1) NOT NULL,
  `prd_highlight` tinyint(1) NOT NULL,
  `display_website` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_init` int(11) NOT NULL,
  `user_upd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_products`
--

INSERT INTO `cms_products` (`ID`, `prd_name`, `prd_sls`, `prd_origin_price`, `prd_sell_price`, `prd_vat`, `prd_status`, `prd_inventory`, `prd_del_temp`, `prd_category_id`, `prd_group_id`, `prd_image_url`, `prd_descriptions`, `prd_manuf_id`, `prd_hot`, `prd_new`, `prd_highlight`, `display_website`, `created`, `updated`, `user_init`, `user_upd`) VALUES
(1, 'Thép ống đúc phi 76 , api5l - ống sắt phi 76 , ống d65 dày 6ly , 4ly phi 90 , dn', 1234, 23455, 123456, 0, 1, 0, 1, -1, 1, 0, '0', 0, 0, 0, 0, 0, '2016-05-25 10:34:07', '0000-00-00 00:00:00', 1, 0),
(2, 'ỐNG THÉP MẠ KẼM - D15', 0, 22400, 27400, 0, 1, 0, 1, 8, 1, 0, '0', 0, 0, 0, 0, 0, '2016-05-25 10:41:50', '0000-00-00 00:00:00', 1, 0),
(3, 'ỐNG THÉP MẠ KẼM', 0, 26400, 27400, 0, 1, 0, 1, 8, 1, 0, '0', 0, 0, 0, 0, 0, '2016-05-25 10:45:59', '0000-00-00 00:00:00', 1, 0),
(6, 'THÉP MẠ KẼM  - D15', 5, 22700, 27400, 0, 0, 1, 0, 8, 1, 0, '0', 0, 0, 0, 0, 0, '2016-05-31 07:59:48', '0000-00-00 00:00:00', 1, 0),
(7, 'THÉP MẠ KẼM  - D20', 3400, 23800, 27902, 0, 0, 0, 0, 17, 2, 0, '0', 0, 0, 0, 0, 0, '2016-05-31 08:03:14', '0000-00-00 00:00:00', 1, 0),
(8, 'THÉP MẠ KẼM  - D20 - Φ26.65 1.9', 38005, 30200, 36700, 0, 1, 1, 0, 18, 2, 0, '0', 0, 0, 0, 0, 0, '2016-05-31 08:04:40', '0000-00-00 00:00:00', 1, 0),
(9, 'THÉP MẠ KẼM  - D20 - Φ26.65 2.1mm', 2395, 30000, 35000, 0, 1, 1, 0, 19, 2, 0, '0', 0, 0, 0, 0, 0, '2016-05-31 08:05:45', '0000-00-00 00:00:00', 1, 0),
(10, 'THÉP MẠ KẼM  - D25 - Φ33.5 1.6mm', 49800, 34200, 37000, 0, 1, 1, 0, 20, 2, 0, '0', 0, 0, 0, 0, 0, '2016-05-31 08:07:07', '0000-00-00 00:00:00', 1, 0),
(11, 'THÉP MẠ KẼM  - D25 - Φ33.5 1.9mm', 19299, 33100, 38000, 0, 1, 1, 0, 21, 2, 0, '0', 0, 0, 0, 0, 0, '2016-05-31 08:07:55', '0000-00-00 00:00:00', 1, 0),
(12, 'THÉP MẠ KẼM  - D25 - Φ33.5 2.1mm', 2510, 34200, 38400, 0, 1, 1, 0, 22, 2, 0, '0', 0, 0, 0, 0, 0, '2016-05-31 08:09:03', '0000-00-00 00:00:00', 1, 0),
(13, 'THÉP MẠ KẼM  - D32 - Φ42.2 1.6mm', 24850, 24300, 27400, 0, 1, 0, 0, 25, 2, 0, '0', 0, 0, 0, 0, 0, '2016-05-31 08:11:23', '0000-00-00 00:00:00', 1, 0),
(14, 'THÉP MẠ KẼM  - D32 - Φ42.2 1.9mm', 24000, 23500, 26400, 0, 1, 1, 0, 26, 2, 0, '0', 0, 0, 0, 0, 0, '2016-05-31 08:12:17', '0000-00-00 00:00:00', 1, 0),
(15, 'THÉP MẠ KẼM - D32 - Φ42.2 1.9mm', 0, 25000, 30000, 0, 0, 1, 0, 26, 2, 0, '0', 0, 0, 0, 0, 0, '2016-05-31 16:04:44', '0000-00-00 00:00:00', 1, 0),
(16, 'THÉP MẠ KẼM - D32 - Φ42.2 2.1mm', -395, 2600, 30000, 0, 1, 0, 0, 27, 1, 0, '', 0, 0, 0, 0, 0, '2016-06-01 01:40:07', '0000-00-00 00:00:00', 1, 0),
(17, 'THÉP MẠ KẼM - D40 - Φ42.1 2.1mm', 246, 2600, 3200, 0, 1, 1, 0, 30, 2, 0, '', 0, 0, 0, 0, 0, '2016-06-02 13:59:13', '0000-00-00 00:00:00', 1, 0),
(18, 'THÉP MẠ KẼM - D40 - Φ48.1 1.6mm', 402, 2700, 3400, 0, 1, 1, 0, 28, 1, 0, '', 0, 0, 0, 0, 0, '2016-06-02 14:00:18', '0000-00-00 00:00:00', 1, 0),
(19, 'THÉP MẠ KẼM - D40 - Φ48.1 1.9mm', 360, 2600, 3100, 0, 1, 1, 0, 29, 2, 0, '', 0, 0, 0, 0, 0, '2016-06-02 14:00:55', '0000-00-00 00:00:00', 1, 0),
(20, 'THÉP V - D45 - Φ 21.2 - 1.6 mm', 800, 23600, 26200, 0, 0, 1, 0, 13, 2, 0, '', 0, 0, 0, 0, 0, '2016-06-17 11:23:28', '0000-00-00 00:00:00', 1, 0),
(21, 'Bộ 3 làm đẹp Maybelline 3 in 1 New Nuevo', 500, 125000, 350000, 5, 1, 1, 0, 27, 2, 0, '', 0, 0, 0, 0, 0, '2016-12-14 08:20:25', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cms_products_category`
--

CREATE TABLE `cms_products_category` (
  `ID` int(10) UNSIGNED NOT NULL,
  `prd_cat_name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_init` int(11) NOT NULL,
  `user_upd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_products_category`
--

INSERT INTO `cms_products_category` (`ID`, `prd_cat_name`, `created`, `updated`, `user_init`, `user_upd`) VALUES
(13, 'Φ 21.2 - 1.6 mm', '2016-05-31 07:54:25', '0000-00-00 00:00:00', 1, 0),
(14, 'Φ 21.2 - 1.9 mm', '2016-05-31 07:54:55', '0000-00-00 00:00:00', 1, 0),
(16, 'Φ 21.4 - 2.6 mm', '2016-05-31 07:55:37', '0000-00-00 00:00:00', 1, 0),
(17, 'Φ 26.65 - 1.6 mm', '2016-05-31 07:56:05', '0000-00-00 00:00:00', 1, 0),
(18, 'Φ 26.65 - 1.9 mm', '2016-05-31 07:56:08', '0000-00-00 00:00:00', 1, 0),
(19, 'Φ 26.65 - 2.1 mm', '2016-05-31 07:56:19', '0000-00-00 00:00:00', 1, 0),
(20, 'Φ 33.5 - 1.6 mm', '2016-05-31 07:56:56', '0000-00-00 00:00:00', 1, 0),
(21, 'Φ 33.5 - 1.9 mm', '2016-05-31 07:57:01', '0000-00-00 00:00:00', 1, 0),
(22, 'Φ 33.5 - 2.1 mm', '2016-05-31 07:57:05', '0000-00-00 00:00:00', 1, 0),
(23, 'Φ 33.5 - 2.3 mm', '2016-05-31 07:57:21', '0000-00-00 00:00:00', 1, 0),
(24, 'Φ 33.5 - 3.2 mm', '2016-05-31 07:57:26', '0000-00-00 00:00:00', 1, 0),
(25, 'Φ 42.2 - 1.6mm', '2016-05-31 08:09:50', '0000-00-00 00:00:00', 1, 0),
(26, 'Φ 42.2 - 1.9mm', '2016-05-31 08:09:56', '0000-00-00 00:00:00', 1, 0),
(27, 'Φ 42.2 - 2.1mm', '2016-05-31 08:09:59', '0000-00-00 00:00:00', 1, 0),
(28, 'Φ 48.1 - 1.6mm', '2016-06-02 13:55:40', '0000-00-00 00:00:00', 1, 0),
(29, 'Φ 48.1 - 1.9mm', '2016-06-02 13:55:58', '0000-00-00 00:00:00', 1, 0),
(30, 'Φ 48.1 - 2.1mm', '2016-06-02 13:56:25', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cms_products_group`
--

CREATE TABLE `cms_products_group` (
  `ID` int(10) UNSIGNED NOT NULL,
  `prd_group_name` varchar(255) NOT NULL,
  `parentid` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `user_init` tinyint(4) NOT NULL,
  `user_upd` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_products_group`
--

INSERT INTO `cms_products_group` (`ID`, `prd_group_name`, `parentid`, `level`, `lft`, `rgt`, `created`, `updated`, `user_init`, `user_upd`) VALUES
(1, 'Root', 0, 0, 0, 1, '2016-05-26 22:53:20', '0000-00-00 00:00:00', 1, 0),
(2, 'THÉP', 0, 0, 2, 3, '2016-05-31 08:01:10', '0000-00-00 00:00:00', 1, 0),
(3, 'SẮT', 0, 0, 4, 5, '2016-05-31 08:01:16', '0000-00-00 00:00:00', 1, 0),
(5, 'INOX', 0, 0, 6, 7, '2016-06-02 13:57:05', '2016-06-02 13:57:12', 1, 1),
(6, 'MY PHAM', 0, 0, 8, 9, '2016-12-14 08:20:07', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cms_stocks`
--

CREATE TABLE `cms_stocks` (
  `ID` int(10) UNSIGNED NOT NULL,
  `stock_name` varchar(255) NOT NULL,
  `user_init` int(11) NOT NULL,
  `user_upd` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_stocks`
--

INSERT INTO `cms_stocks` (`ID`, `stock_name`, `user_init`, `user_upd`, `created`, `updated`) VALUES
(1, 'Thái Nguyên', 1, 1, '2016-05-11 00:00:00', '2016-05-03 00:00:00'),
(2, 'Nam Định', 1, 1, '2016-05-23 00:00:00', '2016-05-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cms_users`
--

CREATE TABLE `cms_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `email` varchar(120) NOT NULL,
  `display_name` varchar(120) NOT NULL,
  `user_status` tinyint(4) NOT NULL,
  `group_id` int(11) NOT NULL,
  `id_stock` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `logined` datetime NOT NULL,
  `ip_logged` varchar(255) NOT NULL,
  `recode` varchar(255) NOT NULL,
  `code_time_out` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_users`
--

INSERT INTO `cms_users` (`id`, `username`, `password`, `salt`, `email`, `display_name`, `user_status`, `group_id`, `id_stock`, `created`, `updated`, `logined`, `ip_logged`, `recode`, `code_time_out`) VALUES
(1, 'Adminstrator', '9a6419caf039d9c00e982f052428445f', 'ABCD', 'son@khuyenmaicantho.com', 'Phạm Văn Quang', 1, 1, 1, '2016-05-03 23:11:27', '2016-06-17 11:16:14', '2017-02-13 18:13:39.0', '::1', '', ''),
(6, 'Nguyennguyet', '8529ba9fdcde0220ed2dc4151008555d', '7%j(ZN$QOYzqGe2^aA(bRA4bo3%POMK7bn3hR3&R*RbsX8vxEdQbbBH!Quv*Kp)@VwB@O', 'Nguyetnt@gmail.com', 'Nguyễn Thị Nguyệt', 1, 3, 1, '2016-06-15 21:34:37', '2016-06-15 21:40:50', '2016-06-15 22:11:41.0', '::1', '', ''),
(7, 'Tungit', '270651af40501ed70ebe86e09de292ac', 'b*mhP1oBUM5FK9i@ODQ1uF8SW4)v^^e#Hng6$Hkep9am3G^bgwDs$P85UuNpHpjEniv^c', 'tungit@gmail.com', 'Ngô Quang Tùng', 1, 2, 1, '2016-06-15 21:43:51', '2016-06-15 21:45:37', '2016-06-15 21:44:38.0', '::1', '', ''),
(8, 'hnmanager', 'cfa74686acc2b510e544874f1bda0ef0', 'AjR9W%9s6H1N150KD!&yKHXXo5N%Jwm7Lpqq4HPPkXF0dnHgm2wcXX$M9zjk@yQ3!@b3d', 'hoangvannam@gmail.com', 'Hoàng Văn Nam', 1, 2, 2, '2016-06-17 11:07:46', '2016-06-17 11:11:47', '0000-00-00 00:00:00.0', '', '', ''),
(9, 'lan2210it', '964ed66baa343330992d3d325430b448', 'AlNqavJGSDEVGxoY7qr50uvQ0rIq%PQG7NcCuRKxiQ0Ig^ji^BubGLbh06Je@v1SuRVXA', 'lan2210it@yahoo.com.vn', 'Nguyễn Thị Lan', 1, 1, 2, '2016-06-17 11:08:49', '2016-06-17 11:12:17', '0000-00-00 00:00:00.0', '', '', ''),
(10, 'missmissfa', 'bf089d9d5d7c66f07a3ee377af188d10', 't%1^0PER0FMXdQ)#K#s#bUNYA7&L3Kn1kzWziezusbZFmCOz9rUDZs7boxFiF)lxXckjk', 'missmissfa@gmail.com', 'Nguyễn Thị Hoa', 0, 3, 1, '2016-06-17 11:11:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00.0', '', '', ''),
(11, 'hoangtuan', '85a23210867223180f2321b1bfac2b82', '8aj%JeujUM4t4fu)^ykRR7aLm&UUnyx@HlDwpTQg9!GOQaAZvLcxC1e&JFS@JT8knUL!2', 'htuansir@yahoo.com', 'Hoàng Anh Tuấn', 0, 3, 1, '2016-06-17 11:13:22', '0000-00-00 00:00:00', '0000-00-00 00:00:00.0', '', '', ''),
(12, 'oanhtran123', '22526f01b26b2f9044022c5481c8ac04', '7nWU64O6QxSTWoY&a!RGsXWBauPpfasoG5DN*F!cp0l^^xvvGj6KmKkxY2$SvaqnAaARE', 'oanhtran001@gmail.com', 'Trần Thị Kim Oanh', 0, 3, 1, '2016-06-17 11:14:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00.0', '', '', ''),
(13, 'minhminhcute', 'ac6eae6ba4d7ce7ccba14a860384470a', 'l6HpMGZ*htR4YBuC*L1sw*emjB(ksY8gp6aaD0P21ndDx%H$2cJfy6NjS1YeR$xe&CLMV', 'minhminhcute2201@gmail.com', 'Phạm Thị Minh', 0, 3, 2, '2016-06-17 11:15:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00.0', '', '', ''),
(14, 'quangcntt2015', '9fbf42d3a05b58a0a9a37218d0bb966c', 'Eu*&)fn87FlnWT&$kbVFKmZMPo&sW@%e38WjQk6&N2TjcL2GmULETkbP4kUtEX0R5^6p*', 'quangcntt2015@gmail.com', 'Nguyễn Văn Quang', 0, 1, 2, '2016-06-17 11:15:51', '2016-06-17 15:20:26', '0000-00-00 00:00:00.0', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cms_users_group`
--

CREATE TABLE `cms_users_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `group_permission` varchar(255) NOT NULL,
  `group_registered` datetime NOT NULL,
  `group_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_users_group`
--

INSERT INTO `cms_users_group` (`id`, `group_name`, `group_permission`, `group_registered`, `group_updated`) VALUES
(1, 'Ban Giám đốc', '["2","3","4","5","6","7"]', '2016-01-22 02:58:58', '2016-06-15 21:42:04'),
(2, 'Quản lý', '["3","4","5","6","7"]', '2016-01-22 03:00:40', '2016-06-15 21:42:37'),
(3, 'Nhân viên', '["5"]', '2016-01-22 03:03:22', '2016-06-15 21:38:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_customers`
--
ALTER TABLE `cms_customers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `customer_name` (`customer_name`);

--
-- Indexes for table `cms_import_stock`
--
ALTER TABLE `cms_import_stock`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cms_manufactures`
--
ALTER TABLE `cms_manufactures`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `manuf_name` (`manuf_name`),
  ADD KEY `manuf_phone` (`manuf_phone`);

--
-- Indexes for table `cms_orders`
--
ALTER TABLE `cms_orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cms_permissions`
--
ALTER TABLE `cms_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_products`
--
ALTER TABLE `cms_products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cms_products_category`
--
ALTER TABLE `cms_products_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cms_products_group`
--
ALTER TABLE `cms_products_group`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cms_stocks`
--
ALTER TABLE `cms_stocks`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_users_group`
--
ALTER TABLE `cms_users_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_customers`
--
ALTER TABLE `cms_customers`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cms_import_stock`
--
ALTER TABLE `cms_import_stock`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cms_manufactures`
--
ALTER TABLE `cms_manufactures`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cms_orders`
--
ALTER TABLE `cms_orders`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `cms_permissions`
--
ALTER TABLE `cms_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cms_products`
--
ALTER TABLE `cms_products`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `cms_products_category`
--
ALTER TABLE `cms_products_category`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `cms_products_group`
--
ALTER TABLE `cms_products_group`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cms_stocks`
--
ALTER TABLE `cms_stocks`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `cms_users_group`
--
ALTER TABLE `cms_users_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
