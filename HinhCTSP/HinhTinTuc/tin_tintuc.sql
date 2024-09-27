-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th9 20, 2024 lúc 11:38 PM
-- Phiên bản máy phục vụ: 10.5.26-MariaDB
-- Phiên bản PHP: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `coinvang_data`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin_tintuc`
--

CREATE TABLE `tin_tintuc` (
  `id` int(11) NOT NULL,
  `hinhanh` text NOT NULL,
  `hinhndab` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` longtext NOT NULL,
  `trangchu` text NOT NULL,
  `mota` text NOT NULL,
  `tieude` text NOT NULL,
  `tieude_en` text NOT NULL,
  `title` text NOT NULL,
  `tukhoa` text NOT NULL,
  `tukhoa2` text NOT NULL,
  `ngay` text NOT NULL,
  `linkurl` text NOT NULL,
  `thuocloai` int(11) NOT NULL,
  `moi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tin_tintuc`
--

INSERT INTO `tin_tintuc` (`id`, `hinhanh`, `hinhndab`, `noidung`, `trangchu`, `mota`, `tieude`, `tieude_en`, `title`, `tukhoa`, `tukhoa2`, `ngay`, `linkurl`, `thuocloai`, `moi`) VALUES
(120, 'Silver-jewelry-0100_32_11zon.webp', '', '<p style=\"text-align: justify;\"><strong>Luxury Red Velvet Jewelry Box for Rings and Earrings</strong></p>\r\n\r\n<p style=\"text-align: justify;\">Discover our exquisite luxury jewelry box, designed to elegantly hold rings, earrings, and other fine jewelry. This premium, sturdy box is perfect for gifts, proposals, or expressions of love.</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\"><strong>Warranty</strong>: 7 days</li>\r\n	<li style=\"text-align: justify;\"><strong>Material</strong>: Soft velvet</li>\r\n	<li style=\"text-align: justify;\"><strong>Return Policy</strong>: 7-day return from the date of receipt</li>\r\n</ul>\r\n\r\n<p style=\"text-align: justify;\"><strong>Dimensions</strong>: 5 x 5 x 4 cm<br />\r\n<strong>Color</strong>: Deep red<br />\r\n<strong>Origin</strong>: Vietnam</p>\r\n\r\n<p style=\"text-align: justify;\">Elevate your gifting experience with this stunning jewelry box from Claudia Alves, where elegance meets craftsmanship.</p>\r\n', '', 'CHY Silver Red Velvet Box: Luxurious Storage for Your Jewelry -ndmákad\r\n ', '', 'CHY Silver Red Velvet Box - Luxurious Storage \'s', '', 'Red velvet jewelry box CHY Silver', 'Red velvet jewelry box CHY Silver', ' 21/09/2024 ', 'chy-silver-red-velvet-box---luxurious-storage-for-your-jewelry', 5, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tin_tintuc`
--
ALTER TABLE `tin_tintuc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tin_tintuc`
--
ALTER TABLE `tin_tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
