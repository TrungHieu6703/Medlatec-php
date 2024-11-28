-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 05:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btl_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Username` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Username`, `Password`, `Email`) VALUES
('admin', '123', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bacsi`
--

CREATE TABLE `bacsi` (
  `MaBS` varchar(10) NOT NULL,
  `TenBS` varchar(50) NOT NULL,
  `MaKhoa` varchar(10) NOT NULL,
  `Anh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bacsi`
--

INSERT INTO `bacsi` (`MaBS`, `TenBS`, `MaKhoa`, `Anh`) VALUES
('BS02', 'Đoàn Hữu Nghị', 'UB', '20191219_BS+Vu+Thanh+Tuan+PNG.png'),
('BS03', 'Nguyễn Quốc Dũng', 'CDHA', '20190909_TK-BS-bui-van-hai-CK-noi.png'),
('BS04', 'Trịnh Thị Ngọc', 'TN', '20191219_BS+Nguyen+Quynh+Xuan.png'),
('BS05', 'Nguyễn Thái Sơn', 'XN', '20191205_BS+Chuong.png'),
('BS06', 'Nguyễn Thị Vân Hồng', 'TH', '20191217_BS+Le+Thi+Hoai+Thanh.png'),
('BS07', 'Dương Thị Thuỷ', 'NK', '20191203_bac+si.png'),
('BS08', 'Nguyễn Quang Minh', 'TM', '20210828_TSNgoManhQuan.png'),
('BS09', 'Nguyễn Văn Chương', 'TK', '20230307__bac-si-nhu-thi-thu.png'),
('BS10', 'Nguyễn Thị Huyền Thu', 'TK', '20210904_BSTranThiPhuongThao.png'),
('BS11', 'Nguyễn Lê Hùng', 'RHM', '20221221_tien-si-cuong_1_-removebg-preview.png'),
('BS12', 'Ngô Văn Nam', 'RHM', '20210829_BSHoManhLinh.png');

-- --------------------------------------------------------

--
-- Table structure for table `chuyenkhoa`
--

CREATE TABLE `chuyenkhoa` (
  `MaKhoa` varchar(10) NOT NULL,
  `TenKhoa` varchar(50) NOT NULL,
  `Anh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chuyenkhoa`
--

INSERT INTO `chuyenkhoa` (`MaKhoa`, `TenKhoa`, `Anh`) VALUES
('CDHA', 'Chuẩn Đoán Hình Ảnh', 'specialty13-1.png'),
('CKN', 'Chuyên Khoa Nội', 'specialty1-1-2.png'),
('CXK', 'Cơ Xương Khớp', 'specialty14-1.png'),
('DL', 'Da Liễu', 'specialty15-1.png'),
('KN', 'Khoa Ngoại', 'specialty6-1-1.png'),
('M', 'Mắt', 'specialty9-1-1.png'),
('NaK', 'Nam Khoa', 'specialty11-1-1.png'),
('NK', 'Nhi khoa', 'specialty3-1.png'),
('NT', 'Nội Tiết', 'specialty8-1-2.png'),
('RHM', 'Răng hàm mặt', 'specialty18-1.png'),
('SK', 'Sản Khoa', 'specialty4-1.png'),
('TH', 'Tiêu Hóa', 'specialty7-1.png'),
('TK', 'Thần kinh', 'specialty16-1-2.png'),
('TM', 'Tim mạch', 'specialty10-1.png'),
('TMH', 'Tai Mũi Họng', 'specialty12-1-1.png'),
('TN', 'Truyền Nhiễm', 'specialty17-1-1.png'),
('UB', 'Ung bướu', 'specialty2-1.png'),
('XN', 'Xét nghiệm', 'specialty5-1-1.png');

-- --------------------------------------------------------

--
-- Table structure for table `dichvu`
--

CREATE TABLE `dichvu` (
  `TenDV` varchar(50) NOT NULL,
  `GiaDV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dichvu`
--

INSERT INTO `dichvu` (`TenDV`, `GiaDV`) VALUES
(' CA-125', 400000),
('Chlamydia', 100000),
('Cholesterol', 175000),
('Glucose máu', 200000),
('HbA1c', 150000),
('HIV', 120000),
('HPV', 5500000),
('Nội tiết tố', 520000),
('Viêm gan B', 99000),
('Xét nghiệm tổng quát', 699000);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` varchar(10) NOT NULL,
  `MaLK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `MaLK`) VALUES
('HD01', 1),
('HD03', 3),
('HD08', 3),
('HD05', 4),
('HD06', 5),
('HD02', 6),
('HD07', 6),
('HD04', 7),
('HD10', 7),
('HD09', 9);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `SDT` varchar(15) NOT NULL,
  `TenKH` varchar(50) NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` varchar(10) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`SDT`, `TenKH`, `NgaySinh`, `GioiTinh`, `DiaChi`, `Email`) VALUES
('0389296707', 'Ngô Văn Nam', '2003-10-02', 'Nam', 'Tỉnh Thanh Hóa, Thị xã Bỉm Sơn, a', 'test@email.com'),
('0389296708', 'Nguyễn Quang Minh', '2024-01-03', 'Nam', 'Tỉnh Phú Thọ, Thành phố Việt Trì, a', 'test@email.com'),
('0389296722', 'Nguyễn Xuân Vĩ', '2024-01-02', 'Nam', 'Thành phố Hà Nội, Quận Ba Đình, a', 'test@email.com'),
('090 8897 544', 'Lưu Trang Anh', '2001-08-15', 'Nữ', 'Thanh Xuân, Hà Nội', 'tranganh@gmail.com'),
('091 1146 866', 'Mai Tùng Bách', '2003-02-19', 'Nam', 'Hai Bà Trưng, Hà Nội', 'tungbach@gmail.com'),
('091 1149 688', 'Bùi Nam Khánh', '1999-09-09', 'Nam', 'Nam Từ Liêm, Hà Nội', 'namkhanh@gmail.com'),
('091 3723 223', 'Phạm Gia Minh', '2002-10-18', 'Nam', 'Cầu Giấy, Hà Nội', 'giaminh@gmail.com'),
('091 8097 236', 'Vũ Thanh Huyền', '2003-12-23', 'Nữ', 'Hoàng Mai, Hà Nội', 'thanhhuyen@gmail.com'),
('092 1874 035', 'Hoàng Nhật Mai', '2005-12-18', 'Nữ', 'Long Biên, Hà Nội', 'nhatmai@gmail.com'),
('093 2123 035', 'Đỗ Hoàng Mỹ', '2004-06-21', 'Nữ', 'Hà Đông, Hà Nội', 'hoangmy@gmail.com'),
('096 4368 899', 'Hà Duy Anh', '0000-00-00', 'Nam', 'Cầu Giấy, Hà Nội', 'duyanh@gmail.com'),
('097 7666 035', 'Bùi Thảo Anh', '2003-05-09', 'Nữ', 'Nam Từ Liêm, Hà Nội', 'thaoanh@gmail.com'),
('097 8978 035', 'Vũ Phương Thảo', '2005-01-10', 'Nữ', 'Hoàn Kiếm, Hà Nội', 'phuongthao@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `lichkham`
--

CREATE TABLE `lichkham` (
  `MaLK` int(10) NOT NULL,
  `SDT_KH` varchar(15) NOT NULL,
  `TenDV` varchar(50) NOT NULL,
  `MaBS` varchar(10) DEFAULT NULL,
  `NgayKham` date NOT NULL,
  `GioKham` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lichkham`
--

INSERT INTO `lichkham` (`MaLK`, `SDT_KH`, `TenDV`, `MaBS`, `NgayKham`, `GioKham`) VALUES
(1, '090 8897 544', 'Glucose máu', 'BS11', '2024-01-08', '09:00:00'),
(2, '091 1146 866', 'Viêm gan B', 'BS10', '2024-01-08', '16:00:00'),
(3, '092 1874 035', 'HbA1c', 'BS08', '2024-01-07', '10:00:00'),
(4, '091 8097 236', 'HIV', 'BS08', '2024-01-09', '11:00:00'),
(5, '092 1874 035', 'Chlamydia', 'BS10', '2024-01-09', '15:00:00'),
(6, '091 1149 688', ' CA-125', 'BS05', '2024-01-10', '13:00:00'),
(7, '091 8097 236', 'HPV', 'BS05', '2024-01-12', '12:00:00'),
(8, '093 2123 035', 'HbA1c', 'BS05', '2024-01-12', '17:00:00'),
(9, '091 3723 223', 'Xét nghiệm tổng quát', 'BS03', '2024-01-12', '16:00:00'),
(10, '091 3723 223', 'Glucose máu', 'BS05', '2024-01-13', '10:00:00'),
(17, '0389296707', 'Cholesterol', 'BS03', '2024-01-10', '23:37:00'),
(19, '0389296708', 'Cholesterol', 'BS03', '2024-01-01', '09:38:00'),
(35, '0389296722', 'HbA1c', 'BS04', '2024-01-15', '22:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `thietbi`
--

CREATE TABLE `thietbi` (
  `MaTB` varchar(10) NOT NULL,
  `TenTB` varchar(70) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `MaKhoa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thietbi`
--

INSERT INTO `thietbi` (`MaTB`, `TenTB`, `SoLuong`, `MaKhoa`) VALUES
('TB01', 'Máy nhóm máu tự động Orthor vision', 12, 'HH'),
('TB02', 'Xét nghiệm tế bào máu ngoại vi Sysmex XN-1000', 5, 'HH'),
('TB03', 'Máy đông máu tự động STA R MAX', 8, 'HH'),
('TB04', 'Máy siêu âm màu 3D, 4D', 15, 'CDHA'),
('TB05', 'Máy X-quang kỹ thuật số', 3, 'CDHA'),
('TB06', 'Máy đo loãng xương 3 vị trí', 2, 'CDHA'),
('TB07', 'Máy chụp cộng hưởng từ', 4, 'CDHA'),
('TB08', 'Máy chụp phim Cone Beam CT toàn hàm sọ mặt', 2, 'RHM'),
('TB09', 'Robot định vị X-Guide', 1, 'RHM'),
('TB10', 'Máy miễn dịch tự động Architect i2000SR', 2, 'XN'),
('TB11', 'Máy xét nghiệm HbA1C HLC-723G11,Tosoh G11', 3, 'XN'),
('TB12', 'Máy giải trình tự MGISEQ-200', 5, 'XN'),
('TB13', 'Tiêu Hóa', 2, 'TH'),
('TB15', 'Máy điện tim 12 kênh Cardio ', 9, 'TM'),
('TB16', 'Tiêu Hóa', 11, 'TH');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `bacsi`
--
ALTER TABLE `bacsi`
  ADD PRIMARY KEY (`MaBS`),
  ADD KEY `MaKhoa` (`MaKhoa`);

--
-- Indexes for table `chuyenkhoa`
--
ALTER TABLE `chuyenkhoa`
  ADD PRIMARY KEY (`MaKhoa`);

--
-- Indexes for table `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`TenDV`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `MaLK` (`MaLK`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`SDT`);

--
-- Indexes for table `lichkham`
--
ALTER TABLE `lichkham`
  ADD PRIMARY KEY (`MaLK`),
  ADD KEY `SDT_KH` (`SDT_KH`),
  ADD KEY `MaBS` (`MaBS`),
  ADD KEY `TenDV` (`TenDV`);

--
-- Indexes for table `thietbi`
--
ALTER TABLE `thietbi`
  ADD PRIMARY KEY (`MaTB`),
  ADD KEY `MaKhoa` (`MaKhoa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lichkham`
--
ALTER TABLE `lichkham`
  MODIFY `MaLK` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaLK`) REFERENCES `lichkham` (`MaLK`);

--
-- Constraints for table `lichkham`
--
ALTER TABLE `lichkham`
  ADD CONSTRAINT `lichkham_ibfk_1` FOREIGN KEY (`SDT_KH`) REFERENCES `khachhang` (`SDT`),
  ADD CONSTRAINT `lichkham_ibfk_2` FOREIGN KEY (`MaBS`) REFERENCES `bacsi` (`MaBS`) ON DELETE SET NULL,
  ADD CONSTRAINT `lichkham_ibfk_3` FOREIGN KEY (`TenDV`) REFERENCES `dichvu` (`TenDV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
