-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 22, 2023 lúc 02:15 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mau`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MA_CTHD` int(5) UNSIGNED NOT NULL,
  `MA_HD` int(10) UNSIGNED NOT NULL,
  `MA_SP` int(10) UNSIGNED DEFAULT NULL,
  `SO_LUONG` int(11) DEFAULT NULL,
  `DON_GIA` float DEFAULT NULL,
  `THANH_TIEN` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MA_CTHD`, `MA_HD`, `MA_SP`, `SO_LUONG`, `DON_GIA`, `THANH_TIEN`) VALUES
(19, 18, 3, 2, 1850000, 3700000),
(20, 19, 14, 1, 2550000, 2550000),
(21, 19, 25, 10, 3050000, 30500000),
(22, 20, 13, 10, 2550000, 25500000),
(23, 20, 11, 1, 2890000, 2890000),
(24, 21, 14, 7, 2550000, 17850000),
(25, 22, 14, 7, 2550000, 17850000),
(26, 22, 10, 10, 2890000, 28900000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MA_DANH_MUC` int(10) UNSIGNED NOT NULL,
  `TEN_DANH_MUC` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`MA_DANH_MUC`, `TEN_DANH_MUC`) VALUES
(1, 'Quản Lý Đơn Hàng'),
(2, 'Quản Lý Sản Phẩm'),
(3, 'Quản Lý Tài Khoản'),
(4, 'Quản Lý Khách Hàng'),
(5, 'Quản Lý  Phân Quyền');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groupquyen`
--

CREATE TABLE `groupquyen` (
  `MA_GROUP_QUYEN` int(10) UNSIGNED NOT NULL,
  `TEN_GROUP_QUYEN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `groupquyen`
--

INSERT INTO `groupquyen` (`MA_GROUP_QUYEN`, `TEN_GROUP_QUYEN`) VALUES
(1, 'admin'),
(2, 'nhanvien'),
(3, 'khachhang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MA_HD` int(10) UNSIGNED NOT NULL,
  `MA_NV` int(10) UNSIGNED DEFAULT NULL,
  `MA_KH` int(10) UNSIGNED NOT NULL,
  `DIA_CHI` text NOT NULL,
  `SODIENTHOAI` varchar(10) NOT NULL,
  `TINH_TRANG` tinyint(1) DEFAULT NULL,
  `TONG_TIEN` float NOT NULL,
  `NGAY_LAP` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MA_HD`, `MA_NV`, `MA_KH`, `DIA_CHI`, `SODIENTHOAI`, `TINH_TRANG`, `TONG_TIEN`, `NGAY_LAP`) VALUES
(18, 1, 10, 'an dương vương', '0381111333', 1, 3700000, '2023-05-19 03:21:23'),
(19, 1, 10, 'an dương vương', '0387777656', 1, 33050000, '2023-05-19 03:28:11'),
(20, NULL, 10, 'an dương vương', '0387777656', 0, 28390000, '2023-05-19 04:22:55'),
(21, NULL, 10, 'an dương vương', '0387777656', 0, 17850000, '2023-05-19 04:36:18'),
(22, NULL, 10, 'an dương vương', '0387777656', 0, 46750000, '2023-05-19 04:38:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MA_KH` int(10) UNSIGNED NOT NULL,
  `MA_TK` int(10) UNSIGNED DEFAULT NULL,
  `TEN_KH` varchar(50) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `PHONE` varchar(10) NOT NULL,
  `GIOI_TINH` varchar(10) NOT NULL,
  `DIA_CHI` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MA_KH`, `MA_TK`, `TEN_KH`, `EMAIL`, `PHONE`, `GIOI_TINH`, `DIA_CHI`) VALUES
(10, 11, 'Mai Anh', 'maianh@gmail.com', '0387777656', 'Nữ', 'an dương vương'),
(11, 12, 'Chi Bảo', 'chibao@gmail.com', '', '', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MA_NV` int(10) UNSIGNED NOT NULL,
  `MA_TK` int(10) UNSIGNED DEFAULT NULL,
  `TEN_NV` varchar(50) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `PHONE` varchar(10) NOT NULL,
  `GIOI_TINH` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MA_NV`, `MA_TK`, `TEN_NV`, `EMAIL`, `PHONE`, `GIOI_TINH`) VALUES
(1, 2, 'nhanvien', 'nhanvien@gmail.com', '072345678', 'Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `MA_GROUP_QUYEN` int(10) UNSIGNED DEFAULT NULL,
  `MA_DANH_MUC` int(10) UNSIGNED DEFAULT NULL,
  `TEN_QUYEN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`MA_GROUP_QUYEN`, `MA_DANH_MUC`, `TEN_QUYEN`) VALUES
(1, 1, 'Quản Lý Đơn Hàng'),
(1, 2, 'Quản Lý Sản Phẩm'),
(1, 5, 'Quản Lý  Phân Quyền'),
(1, 3, 'Quản Lý Tài Khoản'),
(1, 4, 'Quản Lý Khách Hàng'),
(2, 2, 'Quản Lý Sản Phẩm'),
(2, 1, 'Quản Lý Đơn Hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MA_SP` int(10) UNSIGNED NOT NULL,
  `TEN_SP` varchar(200) NOT NULL,
  `SO_LUONG` int(11) DEFAULT NULL,
  `DON_GIA` float DEFAULT NULL,
  `LOAI_SP` varchar(20) DEFAULT NULL,
  `KICH_THUOC` varchar(10) DEFAULT NULL,
  `MO_TA` text DEFAULT NULL,
  `HINH_ANH_URL` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MA_SP`, `TEN_SP`, `SO_LUONG`, `DON_GIA`, `LOAI_SP`, `KICH_THUOC`, `MO_TA`, `HINH_ANH_URL`) VALUES
(1, 'Nike LeBron Witness 4 EP', 20, 1850000, 'Nike', '39', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'nike40.jpg'),
(2, 'Nike LeBron Witness 4 EP', 20, 1850000, 'Nike', '40', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'nike40.jpg'),
(3, 'Nike LeBron Witness 4 EP', 18, 1850000, 'Nike', '41', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'nike40.jpg'),
(4, 'Nike Phantom GT Elite Dynamic Fit FG', 20, 1890000, 'Nike', '39', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'nike41.jpg'),
(5, 'Nike Phantom GT Elite Dynamic Fit FG', 20, 1890000, 'Nike', '40', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'nike41.jpg'),
(6, 'Nike Phantom GT Elite Dynamic Fit FG', 20, 1890000, 'Nike', '41', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'nike41.jpg'),
(7, 'Nike Phantom GT Academy MG', 20, 2150000, 'Nike', '39', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'nike42.jpg'),
(8, 'Nike Phantom GT Academy MG', 20, 2150000, 'Nike', '40', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'nike42.jpg'),
(9, 'Nike Phantom GT Academy MG', 20, 2150000, 'Nike', '41', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'nike42.jpg'),
(10, 'Adidas Superstar', 10, 2890000, 'Adidas', '39', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'adidas1.jpg'),
(11, 'Adidas Superstar', 19, 2890000, 'Adidas', '40', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'adidas1.jpg'),
(12, 'Adidas Superstar', 20, 2890000, 'Adidas', '41', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'adidas1.jpg'),
(13, 'Adidas Continental 80', 10, 2550000, 'Adidas', '39', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'adidas2.jpg'),
(14, 'Adidas Continental 80', 5, 2550000, 'Adidas', '40', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'adidas2.jpg'),
(15, 'Adidas Continental 80', 18, 2550000, 'Adidas', '41', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'adidas2.jpg'),
(16, 'Adidas Ultraboost 20', 20, 2550000, 'Adidas', '39', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'adidas3.jpg'),
(17, 'Adidas Ultraboost 20', 18, 2550000, 'Adidas', '40', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'adidas3.jpg'),
(18, 'Adidas Ultraboost 20', 20, 2550000, 'Adidas', '41', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'adidas3.jpg'),
(19, 'Adidas Untra 4D 5', 20, 2550000, 'Adidas', '39', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'adidas4.jpg'),
(20, 'Adidas Untra 4D 5', 20, 2550000, 'Adidas', '40', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'adidas4.jpg'),
(21, 'Adidas Untra 4D 5', 20, 2550000, 'Adidas', '41', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'adidas4.jpg'),
(22, 'Mizuno Morelia', 20, 3200000, 'Mizuno', '39', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'mizuno-01.jpg'),
(23, 'Mizuno Morelia', 19, 3200000, 'Mizuno', '40', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'mizuno-01.jpg'),
(24, 'Mizuno Morelia', 20, 3200000, 'Mizuno', '41', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'mizuno-01.jpg'),
(25, 'Mizuno Morelia Neo III Pro', 10, 3050000, 'Mizuno', '39', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'mizuno-02.jpg'),
(26, 'Mizuno Morelia Neo III Pro', 20, 3050000, 'Mizuno', '40', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'mizuno-02.jpg'),
(27, 'Mizuno Morelia Neo III Pro', 20, 3050000, 'Mizuno', '41', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'mizuno-02.jpg'),
(28, 'Vans UA SK8-Hi Reissue Flame', 18, 2000000, 'Vans', '39', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'vans40.jpg'),
(29, 'Vans UA SK8-Hi Reissue Flame', 20, 2000000, 'Vans', '40', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'vans40.jpg'),
(30, 'Vans UA SK8-Hi Reissue Flame', 20, 2000000, 'Vans', '41', 'Đặt chân lên sự thoải mái và phong cách với giày thể thao sự lựa chọn hoàn hảo cho cuộc sống năng động của bạn.', 'vans40.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MA_TK` int(10) UNSIGNED NOT NULL,
  `MA_GROUP_QUYEN` int(10) UNSIGNED DEFAULT NULL,
  `TEN_DANG_NHAP` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MAT_KHAU` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `STATUS` int(1) NOT NULL DEFAULT 1,
  `EMAIL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MA_TK`, `MA_GROUP_QUYEN`, `TEN_DANG_NHAP`, `MAT_KHAU`, `STATUS`, `EMAIL`) VALUES
(1, 1, 'admin', 'admin', 1, 'admin@gmail.com'),
(2, 2, 'nhanvien', 'nhanvien', 1, 'nhanvien@gmail.com'),
(11, 3, 'Mai Anh', '61ffa7ab9e660ed7c3323f669c224c8c', 1, 'maianh@gmail.com'),
(12, 3, 'Chi Bảo', '70e549ce1930bcc3117783635cb44171', 1, 'chibao@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MA_CTHD`),
  ADD KEY `MA_SP` (`MA_SP`),
  ADD KEY `MA_HD` (`MA_HD`) USING BTREE;

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MA_DANH_MUC`);

--
-- Chỉ mục cho bảng `groupquyen`
--
ALTER TABLE `groupquyen`
  ADD PRIMARY KEY (`MA_GROUP_QUYEN`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MA_HD`),
  ADD KEY `MA_KH` (`MA_KH`),
  ADD KEY `MA_NV` (`MA_NV`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MA_KH`),
  ADD KEY `MA_TK` (`MA_TK`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MA_NV`),
  ADD KEY `MA_TK` (`MA_TK`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MA_SP`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MA_TK`),
  ADD KEY `MA_GROUP_QUYEN` (`MA_GROUP_QUYEN`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `MA_CTHD` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MA_DANH_MUC` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `groupquyen`
--
ALTER TABLE `groupquyen`
  MODIFY `MA_GROUP_QUYEN` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MA_HD` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MA_KH` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MA_NV` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MA_SP` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MA_TK` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`MA_SP`) REFERENCES `sanpham` (`MA_SP`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`MA_HD`) REFERENCES `hoadon` (`MA_HD`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`MA_KH`) REFERENCES `khachhang` (`MA_KH`),
  ADD CONSTRAINT `hoadon_ibfk_4` FOREIGN KEY (`MA_NV`) REFERENCES `nhanvien` (`MA_NV`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`MA_TK`) REFERENCES `taikhoan` (`MA_TK`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MA_GROUP_QUYEN`) REFERENCES `groupquyen` (`MA_GROUP_QUYEN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
