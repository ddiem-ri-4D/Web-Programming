-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 15, 2012 at 11:30 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `WinTribeFashion`
--
CREATE DATABASE `WinTribeFashion` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `WinTribeFashion`;

-- --------------------------------------------------------

--
-- Table structure for table `ChiTietDonDatHang`
--

CREATE TABLE IF NOT EXISTS `ChiTietDonDatHang` (
  `MaChiTietDonDatHang` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `GiaBan` int(11) DEFAULT NULL,
  `MaDonDatHang` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  PRIMARY KEY (`MaChiTietDonDatHang`),
  KEY `fk_ChiTietDonDatHang_DonDatHang1_idx` (`MaDonDatHang`),
  KEY `fk_ChiTietDonDatHang_SanPham1_idx` (`MaSanPham`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ChiTietDonDatHang`
--

INSERT INTO `ChiTietDonDatHang` (`MaChiTietDonDatHang`, `SoLuong`, `GiaBan`, `MaDonDatHang`, `MaSanPham`) VALUES
('08101200100', 4, 260000, '081012001', 11),
('08101200101', 3, 160000, '081012001', 4),
('08101200102', 30, 220000, '081012001', 10),
('08101200103', 1, 380000, '081012001', 9),
('08101200200', 1, 380000, '081012002', 9),
('08101200300', 2, 220000, '081012003', 10),
('13121200100', 4, 160000, '131212001', 4),
('13121200200', 1, 180000, '131212002', 5),
('13121200201', 2, 260000, '131212002', 11);

-- --------------------------------------------------------

--
-- Table structure for table `DonDatHang`
--

CREATE TABLE IF NOT EXISTS `DonDatHang` (
  `MaDonDatHang` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `NgayLap` datetime DEFAULT NULL,
  `TongThanhTien` int(11) DEFAULT NULL,
  `MaTaiKhoan` int(11) NOT NULL,
  `MaTinhTrang` int(11) NOT NULL,
  PRIMARY KEY (`MaDonDatHang`),
  KEY `fk_DonDatHang_TaiKhoan1_idx` (`MaTaiKhoan`),
  KEY `fk_DonDatHang_TinhTrang1_idx` (`MaTinhTrang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `DonDatHang`
--

INSERT INTO `DonDatHang` (`MaDonDatHang`, `NgayLap`, `TongThanhTien`, `MaTaiKhoan`, `MaTinhTrang`) VALUES
('081012001', '2012-10-08 00:00:00', 380000, 1, 1),
('081012002', '2012-10-08 00:00:00', 380000, 1, 1),
('081012003', '2012-10-08 00:00:00', 440000, 1, 1),
('131212001', '2012-12-13 00:00:00', 640000, 1, 1),
('131212002', '2012-12-13 00:00:00', 700000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `HangSanXuat`
--

CREATE TABLE IF NOT EXISTS `HangSanXuat` (
  `MaHangSanXuat` int(11) NOT NULL AUTO_INCREMENT,
  `TenHangSanXuat` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LogoURL` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`MaHangSanXuat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `HangSanXuat`
--

INSERT INTO `HangSanXuat` (`MaHangSanXuat`, `TenHangSanXuat`, `LogoURL`, `BiXoa`) VALUES
(1, 'Chanel', '2.jpg', 0),
(2, 'Dior', '3.jpg', 0),
(3, 'Hermès', '4.jpg', 0),
(4, 'GUCCI', '5.jpg', 0),
(5, 'D&G', '7.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `LoaiSanPham`
--

CREATE TABLE IF NOT EXISTS `LoaiSanPham` (
  `MaLoaiSanPham` int(11) NOT NULL AUTO_INCREMENT,
  `TenLoaiSanPham` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`MaLoaiSanPham`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `LoaiSanPham`
--

INSERT INTO `LoaiSanPham` (`MaLoaiSanPham`, `TenLoaiSanPham`, `BiXoa`) VALUES
(1, 'Áo', 0),
(2, 'Quần', 0),
(3, 'Váy', 0),
(4, 'Đồ Vest', 0),
(5, 'Đầm', 0),
(6, 'Đồ bơi', 0);
-- --------------------------------------------------------

--
-- Table structure for table `LoaiTaiKhoan`
--

CREATE TABLE IF NOT EXISTS `LoaiTaiKhoan` (
  `MaLoaiTaiKhoan` int(11) NOT NULL AUTO_INCREMENT,
  `TenLoaiTaiKhoan` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaLoaiTaiKhoan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `LoaiTaiKhoan`
--

INSERT INTO `LoaiTaiKhoan` (`MaLoaiTaiKhoan`, `TenLoaiTaiKhoan`) VALUES
(1, 'User'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `SanPham`
--

CREATE TABLE IF NOT EXISTS `SanPham` (
  `MaSanPham` int(11) NOT NULL AUTO_INCREMENT,
  `TenSanPham` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhURL` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GiaSanPham` int(11) DEFAULT NULL,
  `NgayNhap` datetime DEFAULT NULL,
  `SoLuongTon` int(11) DEFAULT NULL,
  `SoLuongBan` int(11) DEFAULT NULL,
  `SoLuocXem` int(11) DEFAULT NULL,
  `MoTa` text COLLATE utf8_unicode_ci,
  `BiXoa` tinyint(1) DEFAULT '0',
  `MaLoaiSanPham` int(11) NOT NULL,
  `MaHangSanXuat` int(11) NOT NULL,
  PRIMARY KEY (`MaSanPham`),
  KEY `fk_SanPham_LoaiSanPham1_idx` (`MaLoaiSanPham`),
  KEY `fk_SanPham_HangSanXuat1_idx` (`MaHangSanXuat`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `SanPham`
--

INSERT INTO `SanPham` (`MaSanPham`, `TenSanPham`, `HinhURL`, `GiaSanPham`, `NgayNhap`, `SoLuongTon`, `SoLuongBan`, `SoLuocXem`, `MoTa`, `BiXoa`, `MaLoaiSanPham`, `MaHangSanXuat`) VALUES
(4, 'Bill D. Beaver', '9.jpg', 160000, '2012-08-25 00:00:00', 14, 9, 25, 'Hải lý bằng bông mịn, đẹp, dễ thương', 0, 1, 3),
(5, 'Captain Calamari', '2.jpg', 180000, '2012-05-01 00:00:00', 14, 6, 4, 'Bạch tuộc biển', 0, 1, 3),
(7, 'Elephantunes', '3.jpg', 480000, '2012-09-12 00:00:00', 25, 2, 9, 'Voi bằng bông, hồng xì tin...', 0, 1, 3),
(8, 'Freddie the Firefly', '4.jpg', 300000, '2012-07-03 00:00:00', 30, 0, 8, 'Bướm nhồi bông', 0, 1, 3),
(9, 'Supper Mario', '6.jpg', 380000, '2012-01-01 00:00:00', 24, 6, 14, 'Bộ lấp áp Lego trò chơi Mario', 0, 5, 2),
(10, 'Nasa Academy Space', '7.jpg', 220000, '2012-08-15 00:00:00', 28, 7, 8, 'Tàu con thoi của Nasa', 0, 3, 1),
(11, 'Lamborghini Revention', '8.jpg', 260000, '2012-09-01 00:00:00', 38, 3, 38, 'Siêu xe Lamborghini Revention', 0, 3, 1),
(12, 'Camaro SS', '9.jpg', 260000, '2012-10-02 00:00:00', 20, 0, 0, 'Xe đua Camaro SS', 0, 3, 1),
(13, 'Pond Motion Gym', '10.jpg', 920000, '2012-10-04 00:00:00', 10, 2, 14, 'Niệm lót cho trẻ em', 0, 1, 3),
(14, 'Stacking Rings', '11.jpg', 240000, '2012-09-25 00:00:00', 5, 5, 1, 'Vòng xoay kỳ thú, kích thích sự tò mò của trẻ', 0, 1, 3),
(15, 'Octivity Time', '12.jpg', 270000, '2012-08-27 00:00:00', 19, 3, 3, 'Bé mặt trời xanh', 0, 1, 3),
(16, 'Mittens the Kitten', '13.jpg', 190000, '2012-07-13 00:00:00', 50, 3, 5, 'Chú mèo ngộ nghĩnh', 0, 1, 3),
(17, 'Feel Me Fish', '14.jpg', 180000, '2012-09-15 00:00:00', 60, 3, 2, 'Chú cá vàng đa sắc', 0, 1, 3),
(18, 'Huey the Hedgehog', '1.jpg', 200000, '2012-09-14 00:00:00', 30, 30, 22, 'Nhiếm bảy màu, mang đến sự may mắn cho bé', 0, 1, 3),
(19, 'Neat-Oh!', '2.jpg', 110000, '2012-06-12 00:00:00', 19, 13, 24, 'Túi đồ chơi xây dựng công viên của Lego', 0, 5, 2),
(20, 'Ninjago 2172', '3.jpg', 160000, '2012-07-12 00:00:00', 20, 12, 13, 'Bộ xếp hình Lego thời Ai Cập cổ đại', 0, 5, 2),
(21, 'Mexican', '4.jpg', 140000, '2012-08-17 00:00:00', 35, 12, 12, 'Bộ xếp hình Lego nhạc công Mehico', 0, 5, 2),
(22, 'Star Wars', '5.jpg', 500000, '2012-10-05 00:00:00', 24, 28, 30, 'Bộ xếp hình Lego phi thuyền trong cuộc chiến tranh giữa các vì sao', 0, 5, 2),
(23, 'City Park Cafe 3061', '6.jpg', 950000, '2012-10-07 00:00:00', 30, 2, 24, 'Bộ xếp hình xây dựng shop cafe trong thành phố ', 0, 5, 2),
(24, 'Bright Lights Ball', '7.jpg', 150000, '2012-10-08 00:00:00', 39, 2, 6, 'Quả cầu thông minh', 0, 2, 4),
(25, 'Baby''s Laptop', '8.jpg', 240000, '2012-09-07 00:00:00', 38, 2, 4, 'Laptop thông tin của trẻ em, giúp trẻ phát triển tư duy trí tuệ', 0, 2, 4),
(26, 'Toot Driver Garage', '9.jpg', 620000, '2012-10-07 00:00:00', 20, 12, 30, 'Bãi đỗ xe trong thành phố, sẽ giúp bé tự điều hành việc hoạt động của một bãi đỗ xe hiện đại trong thành phố', 0, 2, 4),
(27, 'Emergency Vehicles (3-Pack)', '10.jpg', 223000, '2012-10-02 00:00:00', 20, 12, 3, 'Bộ sản phẩm 3 xe đồ chơi, đẹp, dễ thương và an toàn với trẻ', 0, 2, 4),
(28, 'Lamborghini Murcielago', '11.jpg', 300000, '2012-10-01 00:00:00', 10, 1, 2, 'Xe điều khiển từ xa Lamborghini', 0, 4, 5),
(29, 'Rover Sport HSE', '12.jpg', 320000, '2012-09-30 00:00:00', 10, 3, 2, 'Xe điều khiển Rover, vượt mọi địa hình, sức mạnh của trâu', 0, 4, 5),
(30, 'Apache Helicopter', '13.jpg', 625000, '2012-10-01 00:00:00', 4, 2, 1, 'Máy bay chiến đâu siêu đa năng Apache', 0, 4, 1),
(31, 'Micro Helicopter', '14.jpg', 560000, '2012-10-05 00:00:00', 2, 6, 5, 'Máy bay lên thẳng đa dụng', 0, 4, 5),
(32, 'Micro Chinook', '1.jpg', 410000, '2012-10-06 00:00:00', 3, 0, 0, 'Máy bay trực thăng vận tải, đa dụng, có thể vận chuyển được xe tăng', 0, 4, 1),
(33, 'X1 - 01', '2.jpg', 600000, '2012-10-06 00:00:00', 4, 0, 15, 'Máy bay lên thẳng 4 cánh quạt, đa dụng và dễ dàng điều khiển vượt qua mọi địa hình', 0, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `TaiKhoan`
--

CREATE TABLE IF NOT EXISTS `TaiKhoan` (
  `MaTaiKhoan` int(11) NOT NULL AUTO_INCREMENT,
  `TenDangNhap` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MatKhau` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TenHienThi` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DienThoai` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT '0',
  `MaLoaiTaiKhoan` int(11) NOT NULL,
  PRIMARY KEY (`MaTaiKhoan`),
  KEY `fk_TaiKhoan_LoaiTaiKhoan_idx` (`MaLoaiTaiKhoan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `TaiKhoan`
--

INSERT INTO `TaiKhoan` (`MaTaiKhoan`, `TenDangNhap`, `MatKhau`, `TenHienThi`, `DiaChi`, `DienThoai`, `Email`, `BiXoa`, `MaLoaiTaiKhoan`) VALUES
(1, 'ndhuy', 'ndhuy', 'Đức Huy', '227 - Nguyễn Văn Cừ - Q.5', '01234567890', 'ndhuy@gmail.com', 0, 1),
(5, 'admin', 'admin', 'Admin website', 'WinTribeFashion', '0909123456', 'admin@WinTribeFashion.vn', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `TinhTrang`
--

CREATE TABLE IF NOT EXISTS `TinhTrang` (
  `MaTinhTrang` int(11) NOT NULL AUTO_INCREMENT,
  `TenTinhTrang` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaTinhTrang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `TinhTrang`
--

INSERT INTO `TinhTrang` (`MaTinhTrang`, `TenTinhTrang`) VALUES
(1, 'Đặt hàng'),
(2, 'Đang giao hàng'),
(3, 'Thanh toán'),
(4, 'Hủy');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ChiTietDonDatHang`
--
ALTER TABLE `ChiTietDonDatHang`
  ADD CONSTRAINT `fk_ChiTietDonDatHang_DonDatHang1` FOREIGN KEY (`MaDonDatHang`) REFERENCES `dondathang` (`MaDonDatHang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ChiTietDonDatHang_SanPham1` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `DonDatHang`
--
ALTER TABLE `DonDatHang`
  ADD CONSTRAINT `fk_DonDatHang_TaiKhoan1` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DonDatHang_TinhTrang1` FOREIGN KEY (`MaTinhTrang`) REFERENCES `tinhtrang` (`MaTinhTrang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `SanPham`
--
ALTER TABLE `SanPham`
  ADD CONSTRAINT `fk_SanPham_HangSanXuat1` FOREIGN KEY (`MaHangSanXuat`) REFERENCES `hangsanxuat` (`MaHangSanXuat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SanPham_LoaiSanPham1` FOREIGN KEY (`MaLoaiSanPham`) REFERENCES `loaisanpham` (`MaLoaiSanPham`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `TaiKhoan`
--
ALTER TABLE `TaiKhoan`
  ADD CONSTRAINT `fk_TaiKhoan_LoaiTaiKhoan` FOREIGN KEY (`MaLoaiTaiKhoan`) REFERENCES `loaitaikhoan` (`MaLoaiTaiKhoan`) ON DELETE NO ACTION ON UPDATE NO ACTION;
