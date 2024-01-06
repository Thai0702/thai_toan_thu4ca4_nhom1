-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 22, 2023 lúc 02:55 PM
-- Phiên bản máy phục vụ: 5.7.30-log-cll-lve
-- Phiên bản PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `stylegen_dt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_user` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_user`, `fullname`, `email`, `username`, `password`, `role`) VALUES
(1, 'ADMIN', 'admin@gmail.com', 'admin', '123', 1),
(16, 'thai', NULL, '1234@gmail.com', '$2y$10$dKc8VnNb/AyM9l9Daqp2qezSTWNNYGTCVgydMUjOnWtO9NKZ/Q47S', 0),
(15, 'toan', NULL, '123@gmail.com', '$2y$10$oFHcbSP1nNCYsE/SpibAm.pDxeMMbLsCvB2Fgj2jDjINma1AVIvtK', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id_category` int(11) NOT NULL,
  `namecategory` varchar(100) NOT NULL,
  `serial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`id_category`, `namecategory`, `serial`) VALUES
(52, 'Iphone', 1),
(53, 'Samsung', 2),
(54, 'Oppo', 3),
(55, 'Vivo', 4),
(56, 'Huawei', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id_product` int(11) NOT NULL,
  `nameproduct` varchar(250) NOT NULL,
  `productcode` varchar(100) NOT NULL,
  `priceproduct` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `content` text NOT NULL,
  `summary` tinytext NOT NULL,
  `picture` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`id_product`, `nameproduct`, `productcode`, `priceproduct`, `quantity`, `content`, `summary`, `picture`, `status`, `id_category`) VALUES
(131, 'Iphone', '1', '2000000', 11, 'Uy tÃ­n cháº¥t lÆ°á»£ng', 'Uy tÃ­n cháº¥t lÆ°á»£ng', '1702990636_iphon14.png', 1, 52),
(132, 'Vivo', '2', '3000000', 22, 'Uy tÃ­n cháº¥t lÆ°á»£ng', 'Uy tÃ­n cháº¥t lÆ°á»£ng', '1702990730_vivo-y22.png', 1, 55),
(137, 'Oppo', '3', '30000000', 22, 'Uy tÃ­n cháº¥t lÆ°á»£ng', 'Uy tÃ­n cháº¥t lÆ°á»£ng', '1703049364_oppo-a79.jpg', 1, 54),
(138, 'Iphone', '4', '3000000', 22, 'uy tÃ­n cháº¥t lÆ°á»£ng', 'uy tÃ­n cháº¥t lÆ°á»£ng', '1703064565_iphone2.png', 1, 52),
(139, 'Op', '5', '200000', 4, 'uy tÃ­n cháº¥t lÆ°á»£ng', 'uy tÃ­n cháº¥t lÆ°á»£ng', '1703064615_OPPO.png', 1, 54),
(140, 'Vivo', '6', '200000', 21, 'uy tÃ­n cháº¥t lÆ°á»£ng', 'uy tÃ­n cháº¥t lÆ°á»£ng', '1703064769_vivo-y16.png', 1, 55),
(141, 'Samsung', '7', '300000', 21, 'uy tÃ­n cháº¥t lÆ°á»£ng', 'uy tÃ­n cháº¥t lÆ°á»£ng', '1703064802_samsung3.png', 1, 53),
(142, 'Samsung', '8', '200000 ', 222, ' uy tÃ­n cháº¥t lÆ°á»£ng', 'uy tÃ­n cháº¥t lÆ°á»£ng', '1703064944_samsumg4.png', 1, 53),
(143, 'Samsung', '9', '300000', 21, 'uy tÃ­n cháº¥t lÆ°á»£ng', 'uy tÃ­n cháº¥t lÆ°á»£ng', '1703064868_sumsumg1.jpg', 1, 53),
(144, 'Oppo', '10', '200000 ', 222, ' uy tÃ­n cháº¥t lÆ°á»£ng', 'uy tÃ­n cháº¥t lÆ°á»£ng', '1703064925_oppoA77.jpg', 1, 54),
(145, 'Iphone', '11', '3', 21, 'Uy tÃ­n cháº¥t lÆ°á»£ng', 'Uy tÃ­n cháº¥t lÆ°á»£ng', '1703216390_iphon14.png', 1, 52),
(147, 'Huawei', 'h1', '2', 22, 'Uy tÃ­n cháº¥t lÆ°á»£ng\r\n', 'Uy tÃ­n cháº¥t lÆ°á»£ng\r\n', '1703230724_huawei.jpg', 1, 56),
(148, 'Huawei', 'h2', '300000', 22, 'Uy tÃ­n cháº¥t lÆ°á»£ng\r\n', 'Uy tÃ­n cháº¥t lÆ°á»£ng\r\n', '1703230764_huawei2.jpg', 1, 56),
(149, 'Huawei', 'h3', '200000', 32, 'Uy tÃ­n cháº¥t lÆ°á»£ng\r\n', 'Uy tÃ­n cháº¥t lÆ°á»£ng\r\n', '1703230794_h4.jpg', 1, 56),
(150, 'Huawei', 'h4', '3000000', 21, 'Uy tÃ­n cháº¥t lÆ°á»£ng\r\n', 'Uy tÃ­n cháº¥t lÆ°á»£ng\r\n', '1703230827_h5.jpg', 1, 56);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `LK_1` (`id_category`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `LK_1` FOREIGN KEY (`id_category`) REFERENCES `tbl_category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
