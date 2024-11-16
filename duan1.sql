-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2024 at 05:44 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int NOT NULL,
  `ten_banner` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `ten_banner`, `trang_thai`) VALUES
(13, 'uploads/sharktank2-1.png.webp', 1),
(14, 'uploads/logo-5.png', 2),
(15, 'uploads/tải xuống (1).jpg', 1),
(16, 'uploads/logo-5.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `noi_dung` text COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_dang` date NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `san_pham_id`, `tai_khoan_id`, `noi_dung`, `ngay_dang`, `trang_thai`) VALUES
(1, 137, 1, 'èewfewgew', '2024-11-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`, `trang_thai`) VALUES
(1, 'Iphone', 1),
(2, 'Mac', 0),
(10, 'Phụ Kiện', 1),
(12, 'Phụ Kiện', 2);

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `nguoi_dung_id` int NOT NULL,
  `ma_don_hang` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `email_nguoi_nhan` varchar(255) NOT NULL,
  `sdt_nguoi_nhan` int NOT NULL,
  `dia_chi_nguoi_nhan` varchar(255) NOT NULL,
  `ngay_dat` date NOT NULL,
  `khuyen_mai_id` int NOT NULL,
  `phuong_thuc_thanh_toan` int NOT NULL,
  `trang_thai_thanh_toan` tinyint(1) NOT NULL,
  `thanh_toan` float NOT NULL,
  `trang_thai_id` int NOT NULL,
  `ghi_chu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `nguoi_dung_id`, `ma_don_hang`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `khuyen_mai_id`, `phuong_thuc_thanh_toan`, `trang_thai_thanh_toan`, `thanh_toan`, `trang_thai_id`, `ghi_chu`) VALUES
(1, 49, 'PH54651', 'Phạm Phú Trung', 'phutrung1606a@gmail.com', 355011558, 'Hải Dương', '2024-11-06', 1, 1, 1, 23000, 5, NULL),
(2, 1, 'PH111223', 'Tiên Văn Sư', 'tiensu@gmail.com', 355011558, 'Hà Nam', '2024-11-29', 2, 2, 1, 23000, 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_san_phams`
--

CREATE TABLE `hinh_anh_san_phams` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `link_hinh_anh` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hinh_anh_san_phams`
--

INSERT INTO `hinh_anh_san_phams` (`id`, `san_pham_id`, `link_hinh_anh`) VALUES
(87, 111, './admin/uploads/1731432987ggmkt.jpg'),
(88, 111, './admin/uploads/1731432987google-maps-icon-on-map - Copy.jpg'),
(89, 111, './admin/uploads/1731432987google-maps-icon-on-map.jpg'),
(90, 111, './admin/uploads/1731432987image2132.png'),
(91, 111, './admin/uploads/1731432987images - Copy.jpg'),
(92, 111, './admin/uploads/1731432987images.jpg'),
(93, 111, './admin/uploads/1731432987images.png'),
(94, 111, './admin/uploads/1731432987iphone 16 pro - 3.jpg'),
(95, 111, './admin/uploads/1731432987mktt.png'),
(96, 111, './admin/uploads/1731432987pngtree-vector-conceptual-design-of-circuit-board-logo-on-a-white-background-png-image_12534520.png'),
(97, 111, './admin/uploads/1731432987Q.jpg'),
(98, 111, './admin/uploads/1731432987simsmkt.jpg'),
(99, 111, './admin/uploads/1731432987slider_2_image.png'),
(100, 111, './admin/uploads/1731432987slider_2_image.webp'),
(101, 111, './admin/uploads/1731432987Thiet-bi-dien-tu-van-phong-768x470.jpg'),
(102, 111, './admin/uploads/1731432987Thiet-bi-dien-tu-vien-thong-768x250.jpg'),
(103, 111, './admin/uploads/1731432987Youtube_logo.png'),
(104, 111, './admin/uploads/1731432987zalomkt.jpg'),
(311, 127, './admin/uploads/17315808012023_Facebook_icon.svg'),
(312, 127, './admin/uploads/1731580801ggmkt.jpg'),
(313, 127, './admin/uploads/1731580801google-maps-icon-on-map - Copy.jpg'),
(314, 127, './admin/uploads/1731580801google-maps-icon-on-map.jpg'),
(315, 127, './admin/uploads/1731580801image2132.png'),
(316, 127, './admin/uploads/1731580801images - Copy.jpg'),
(317, 127, './admin/uploads/1731580801images.jpg'),
(318, 127, './admin/uploads/1731580801images.png'),
(319, 127, './admin/uploads/1731580801iphone 16 pro - 3.jpg'),
(320, 127, './admin/uploads/1731580801kisspng-tiktok-video-musical-ly-youtube-vine-1713907999522.webp'),
(321, 127, './admin/uploads/1731580801logo21.png'),
(322, 127, './admin/uploads/1731580801mktt.png'),
(323, 127, './admin/uploads/1731580801pngtree-vector-conceptual-design-of-circuit-board-logo-on-a-white-background-png-image_12534520.png'),
(324, 127, './admin/uploads/1731580801Q.jpg'),
(325, 127, './admin/uploads/1731580801san_phams.sql'),
(326, 127, './admin/uploads/1731580801simsmkt.jpg'),
(327, 127, './admin/uploads/1731580801slider_2_image.png'),
(328, 127, './admin/uploads/1731580801slider_2_image.webp'),
(329, 127, './admin/uploads/1731580801Thiet-bi-dien-tu-van-phong-768x470.jpg'),
(341, 129, './admin/uploads/17315822788.jpg'),
(342, 129, './admin/uploads/17315822789.jpg'),
(343, 129, './admin/uploads/173158227810.jpg'),
(344, 129, './admin/uploads/17315822782023_Facebook_icon.svg'),
(345, 129, './admin/uploads/1731582278a.jpg'),
(346, 129, './admin/uploads/1731582278banner 3.jpg'),
(347, 129, './admin/uploads/1731582278banner 3.webp'),
(348, 129, './admin/uploads/1731582278banner_2.jpg'),
(349, 129, './admin/uploads/1731582278banner_2.webp'),
(350, 129, './admin/uploads/1731582278bn.jpg'),
(351, 129, './admin/uploads/1731582278fbmkt.jpg'),
(352, 129, './admin/uploads/1731582278ggmkt.jpg'),
(353, 129, './admin/uploads/1731582278google-maps-icon-on-map - Copy.jpg'),
(354, 129, './admin/uploads/1731582278google-maps-icon-on-map.jpg'),
(355, 129, './admin/uploads/1731582278image2132.png'),
(356, 129, './admin/uploads/1731582278images - Copy.jpg'),
(357, 129, './admin/uploads/1731582278images.jpg'),
(358, 129, './admin/uploads/1731582278images.png'),
(359, 130, './admin/uploads/1731582570bn.jpg'),
(360, 130, './admin/uploads/1731582570fbmkt.jpg'),
(361, 130, './admin/uploads/1731582570ggmkt.jpg'),
(362, 130, './admin/uploads/1731582570google-maps-icon-on-map - Copy.jpg'),
(363, 130, './admin/uploads/1731582570google-maps-icon-on-map.jpg'),
(364, 131, './admin/uploads/1731582706Thiet-bi-dien-tu-van-phong-768x470.jpg'),
(365, 131, './admin/uploads/1731582706Thiet-bi-dien-tu-vien-thong-768x250.jpg'),
(366, 131, './admin/uploads/1731582706thiet-ke-bo-mach-dien-tu-1.jpg'),
(367, 131, './admin/uploads/1731582706udemy.jpg'),
(368, 131, './admin/uploads/1731582706Youtube_logo.png'),
(369, 131, './admin/uploads/1731582706zalomkt.jpg'),
(370, 132, './admin/uploads/1731584399a.jpg'),
(371, 132, './admin/uploads/1731584399banner 3.webp'),
(372, 132, './admin/uploads/1731584399mktt.png'),
(373, 132, './admin/uploads/1731584399Q.jpg'),
(374, 133, './admin/uploads/1731584843bn.jpg'),
(375, 133, './admin/uploads/1731584843iphone 16 pro - 3.jpg'),
(376, 133, './admin/uploads/1731584843kisspng-tiktok-video-musical-ly-youtube-vine-1713907999522.webp'),
(377, 134, './admin/uploads/1731586496bn.jpg'),
(378, 134, './admin/uploads/1731586496fbmkt.jpg'),
(379, 134, './admin/uploads/1731586496ggmkt.jpg'),
(380, 134, './admin/uploads/1731586496google-maps-icon-on-map - Copy.jpg'),
(381, 135, './admin/uploads/1731586630iphone 16 pro - 3.jpg'),
(382, 135, './admin/uploads/1731586630kisspng-tiktok-video-musical-ly-youtube-vine-1713907999522.webp'),
(383, 135, './admin/uploads/1731586630Youtube_logo.png'),
(384, 135, './admin/uploads/1731586630zalomkt.jpg'),
(385, 136, './admin/uploads/1731586811kisspng-tiktok-video-musical-ly-youtube-vine-1713907999522.webp'),
(386, 136, './admin/uploads/1731586811logo21.png'),
(387, 136, './admin/uploads/1731586811mktt.png'),
(388, 137, './admin/uploads/1731587650slider_2_image.png'),
(389, 137, './admin/uploads/1731587650Youtube_logo - Copy.png'),
(390, 137, './admin/uploads/17315876502023_Facebook_icon - Copy.svg'),
(391, 138, './admin/uploads/1731588985Youtube_logo - Copy.png'),
(392, 138, './admin/uploads/1731588985Youtube_logo.png'),
(393, 138, './admin/uploads/1731588985zalomkt.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `khuyen_mais`
--

CREATE TABLE `khuyen_mais` (
  `id` int NOT NULL,
  `ten_khuyen_mai` varchar(255) NOT NULL,
  `ma_khuyen_mai` varchar(255) NOT NULL,
  `gia_tri` float NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_ket_thuc` date NOT NULL,
  `mo_ta` varchar(255) NOT NULL,
  `trang_thai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `khuyen_mais`
--

INSERT INTO `khuyen_mais` (`id`, `ten_khuyen_mai`, `ma_khuyen_mai`, `gia_tri`, `ngay_bat_dau`, `ngay_ket_thuc`, `mo_ta`, `trang_thai`) VALUES
(1, 'Khuyến mãi Black Friday', 'BF2024', 1, '2024-11-15', '2024-11-30', 'Giảm giá 20% tất cả sản phẩm', 1),
(2, 'Khuyến mãi Giáng Sinh', 'XMAS2024', 30, '2024-12-01', '2024-12-25', 'Giảm giá 30% nhân dịp lễ Giáng Sinh', 0),
(7, '1222', '111', 1111, '2024-11-22', '2024-11-30', '11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lien_hes`
--

CREATE TABLE `lien_hes` (
  `id` int NOT NULL,
  `ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `loi_nhan` varchar(255) NOT NULL,
  `trang_thai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lien_hes`
--

INSERT INTO `lien_hes` (`id`, `ten`, `email`, `loi_nhan`, `trang_thai`) VALUES
(1, 'Nguyễn Văn A', 'nva@a.b', 'qwertâfimiegnornhoernhorgorrmpokskgoiưmirhmoidmhoksentokhtmaronhmeapemnneropgmoianeebhbmheoktnhpismtiounhseihiodrrpithiorthiosrtlbmoitnbbipsryoiseoinhpirtnjỏinthoisethouinsrpigbpapijapefhwewpgnoegpjeowewogyu', 0),
(2, 'Trần Văn B', 'TVB@BB.B', 'asdfghj', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dungs`
--

CREATE TABLE `nguoi_dungs` (
  `id` int NOT NULL,
  `ten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `so_dien_thoai` int NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `ngay_sinh` date NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `vai_tro` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nguoi_dungs`
--

INSERT INTO `nguoi_dungs` (`id`, `ten`, `email`, `mat_khau`, `so_dien_thoai`, `dia_chi`, `hinh_anh`, `ngay_sinh`, `gioi_tinh`, `trang_thai`, `vai_tro`) VALUES
(1, 'Nguyễn Văn A', 'admin@fpt.edu.vn', '$2y$10$KW7bcY5NGfWq/K3Y8yNSJObPrLVAuyoOw6JSr/gbU0CsCp0rNPXyS', 355011558, 'Hà Nội', './uploads/images/avatarUser.jpg', '2024-11-14', 1, 1, 1),
(49, 'Phạm Phú Trung', 'admin@gmail.com', '$2y$10$KSqjyVpUIx8.YGFutbLLsu2zSVSr4lPv1e3YJy99N7L2G7CqC08Km', 3245567, '321423', './uploads/images/67332c0d5b83f3_l.png', '2001-03-23', 1, 1, 2),
(50, 'Nguyễn Văn ABC', 'admin@fpt.edu.vn', '$2y$10$oN0TJTly7j2cOgVJt56GluoKB42aUKOlofvmre2VUEvb8NuiscaIm', 123456789, 'Hà Nội', './uploads/images/6735d70fdc0acNew-York-Yankees.png', '2011-11-11', 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toans`
--

CREATE TABLE `phuong_thuc_thanh_toans` (
  `id` int NOT NULL,
  `ten_phuong_thuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `phuong_thuc_thanh_toans`
--

INSERT INTO `phuong_thuc_thanh_toans` (`id`, `ten_phuong_thuc`) VALUES
(1, 'COD(Thanh toán khi nhận hàng)'),
(2, 'VNPAY');

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` int NOT NULL,
  `ten_san_pham` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `luot_xem` int NOT NULL,
  `thong_so` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `so_luong` int NOT NULL,
  `so_luong_ton_kho` int NOT NULL,
  `mo_ta` text COLLATE utf8mb4_general_ci NOT NULL,
  `anh_san_pham` text COLLATE utf8mb4_general_ci,
  `gia_nhap` decimal(10,2) NOT NULL,
  `gia_ban` decimal(10,2) NOT NULL,
  `gia_khuyen_mai` decimal(10,2) NOT NULL,
  `mo_ta_chi_tiet` text COLLATE utf8mb4_general_ci NOT NULL,
  `trang_thai` tinyint(1) NOT NULL,
  `danh_muc_id` int NOT NULL,
  `ma_san_pham` int NOT NULL,
  `ngay_nhap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `ten_san_pham`, `luot_xem`, `thong_so`, `so_luong`, `so_luong_ton_kho`, `mo_ta`, `anh_san_pham`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_chi_tiet`, `trang_thai`, `danh_muc_id`, `ma_san_pham`, `ngay_nhap`) VALUES
(85, 'wew', 0, '', 67, 0, 'dsfd', 'uploads/1731313972a.jpg', '0.00', '543.00', '0.00', '', 1, 0, 0, '0000-00-00'),
(88, 'gfgf', 0, '', 676, 0, 'gfg', 'uploads/17313139639.jpg', '0.00', '5.00', '0.00', '', 1, 0, 0, '0000-00-00'),
(89, '4545', 0, '', 5654, 0, '45ffhf', 'uploads/17313115981.jpg', '0.00', '0.00', '0.00', '', 1, 0, 0, '0000-00-00'),
(90, 'grgdfg', 0, '', 54, 0, 'gdf', 'uploads/1731311620a.jpg', '0.00', '454.00', '0.00', '', 2, 0, 0, '0000-00-00'),
(92, 'ere', 0, '', 343, 0, 'fdsf', 'uploads/173131263810.jpg', '0.00', '454.00', '0.00', '', 2, 0, 0, '0000-00-00'),
(93, 'rtr', 0, '', 565, 0, 'gdfg', 'uploads/1731312995banner 3.jpg', '0.00', '454.00', '0.00', '', 2, 0, 0, '0000-00-00'),
(94, 'sd', 0, '', 56, 0, 'fd', 'uploads/17313169604.jpg', '0.00', '344.00', '0.00', '', 2, 0, 0, '0000-00-00'),
(95, 'rtre', 0, '', 54, 0, 'gdfgdfg', 'uploads/1731317893a.jpg', '0.00', '6546.00', '0.00', '', 2, 0, 0, '0000-00-00'),
(96, 'rtrt', 4543, '345', 43, 45, 'egrgrgg', NULL, '33.00', '34.00', '0.00', 'vrttt', 0, 0, 0, '0000-00-00'),
(111, 'tgdf', 4354, '', 2423, 0, 'fcrefrr4543', '', '24.00', '34543.00', '242.00', 'erewr4543', 1, 13, 334, '2024-11-13'),
(127, 'dfds', 646, '', 64, 0, 'ybtrty5654', './admin/uploads/17315808422023_Facebook_icon.svg', '4645.00', '64.00', '4654.00', 'btrby6546', 1, 1, 56456, '2024-11-14'),
(129, '42', 54, '', 54, 0, 'fgfdgf', './admin/uploads/17315822788.jpg', '43.00', '432.00', '434354.00', 'uhfnudshfufhie', 1, 2, 842, '2024-11-14'),
(130, 'fdsf', 32, '', 432, 0, 'dfdsfdfdddddddddddddddddddddd', './admin/uploads/1731582570a.jpg', '343.00', '54.00', '4324.00', 'eu h e hewuteutetie', 2, 1, 300, '2024-11-14'),
(131, 'asas', 65, '', 56, 0, 'tỷ', './admin/uploads/1731582706a.jpg', '56.00', '65.00', '56.00', 'yt', 1, 3, 56456, '2024-11-14'),
(132, 'dfds', 435, '', 24, 0, 'ewrew343', './admin/uploads/1731584399a.jpg', '242.00', '23.00', '43243.00', 'ewrew324', 1, 2, 842, '2024-11-14'),
(133, 'brty', 45, '', 43, 0, 'er453', './admin/uploads/17315848432023_Facebook_icon.svg', '43.00', '32.00', '435.00', 'wrew543', 2, 1, 64, '2024-11-14'),
(134, 'sfsf', 34, '', 34, 0, '42erewrwe', './admin/uploads/1731586496a.jpg', '0.00', '4.00', '423.00', 'cerwr3434', 1, 2, 0, '2024-11-14'),
(135, 'Redmi K70 Pro', 32, '', 32, 0, 'Redmi K70 trang bị chip Snapdragon 8 Gen 2 kết hợp với RAM lên tới 16GB giúp đảm bảo hiệu năng vô cùng mạnh mẽ. Thiết bị xuất xưởng với hệ điều hành HyperOS hoàn toàn mới có nhiều tính năng hấp dẫn và hiện đại. Redmi K70 có màn hình OLED QHD+ hỗ trợ 68 tỷ màu có độ sáng siêu cao lên tới 4000 nit.', './admin/uploads/1731586630zalomkt.jpg', '12.00', '123.00', '3048.00', 'Redmi K70 ra mắt: Snapdragon 8 Gen 2, màn hình 2K, sạc nhanh 120 W (cập nhật: 29/11) Về tổng quan, mình nhận thấy Redmi K70 có ngoại hình khá tương đồng với một số mẫu Redmi Note được ra mắt gần đây. Máy sở hữu những đường nét vuông vắn ở cạnh viền, kết hợp cùng mặt lưng được bo cong nhẹ ở phần mép giúp tạo nên một tổng thể hài hòa. Đồng thời, khu vực mặt lưng của Redmi K70 cũng có sự tinh chỉnh cách thiết kế tùy theo phiên bản màu.', 1, 4, 0, '2024-11-14'),
(136, 'êr', 54, '', 54, 0, 'Redmi K70 ra mắt: Snapdragon 8 Gen 2, màn hình 2K, sạc nhanh 120 W (cập nhật: 29/11) Về tổng quan, mình nhận thấy Redmi K70 có ngoại hình khá tương đồng với một số mẫu Redmi Note được ra mắt gần đây. Máy sở hữu những đường nét vuông vắn ở cạnh viền, kết hợp cùng mặt lưng được bo cong nhẹ ở phần mép giúp tạo nên một tổng thể hài hòa. Đồng thời, khu vực mặt lưng của Redmi K70 cũng có sự tinh chỉnh cách thiết kế tùy theo phiên bản màu.', './admin/uploads/1731586822a.jpg', '43.00', '23.00', '2443.00', 'vRedmi K70 ra mắt: Snapdragon 8 Gen 2, màn hình 2K, sạc nhanh 120 W (cập nhật: 29/11) Về tổng quan, mình nhận thấy Redmi K70 có ngoại hình khá tương đồng với một số mẫu Redmi Note được ra mắt gần đây. Máy sở hữu những đường nét vuông vắn ở cạnh viền, kết hợp cùng mặt lưng được bo cong nhẹ ở phần mép giúp tạo nên một tổng thể hài hòa. Đồng thời, khu vực mặt lưng của Redmi K70 cũng có sự tinh chỉnh cách thiết kế tùy theo phiên bản màu.', 1, 1, 34, '2024-11-14'),
(137, 'Hiếu', 2, '', 21, 0, 'Redmi K70 ra mắt: Snapdragon 8 Gen 2, màn hình 2K, sạc nhanh 120 W (cập nhật: 29/11) Về tổng quan, mình nhận thấy Redmi K70 có ngoại hình khá tương đồng với một số mẫu Redmi Note được ra mắt gần đây. Máy sở hữu những đường nét vuông vắn ở cạnh viền, kết hợp cùng mặt lưng được bo cong nhẹ ở phần mép giúp tạo nên một tổng thể hài hòa. Đồng thời, khu vực mặt lưng của Redmi K70 cũng có sự tinh chỉnh cách thiết kế tùy theo phiên bản màu.', './admin/uploads/1731587650iphone 16 pro - 3.jpg', '23.00', '234.00', '21.00', 'Redmi K70 trang bị chip Snapdragon 8 Gen 2 kết hợp với RAM lên tới 16GB giúp đảm bảo hiệu năng vô cùng mạnh mẽ. Thiết bị xuất xưởng với hệ điều hành HyperOS hoàn toàn mới có nhiều tính năng hấp dẫn và hiện đại. Redmi K70 có màn hình OLED QHD+ hỗ trợ 68 tỷ màu có độ sáng siêu cao lên tới 4000 nit.', 1, 1, 56456, '2024-11-14'),
(138, 'SSADSAD', 45, '', 42, 0, 'yyt', './admin/uploads/1731590727fbmkt.jpg', '32.00', '343.00', '242.00', 'gfgdfgd', 1, 3, 842, '2005-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `tin_tucs`
--

CREATE TABLE `tin_tucs` (
  `id` int NOT NULL,
  `tieu_de_bai_viet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ngay_dang_bai` date DEFAULT NULL,
  `luot_xem` int DEFAULT NULL,
  `trang_thai_bai_viet` tinyint(1) NOT NULL,
  `noi_dung_bai_viet` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tin_tucs`
--

INSERT INTO `tin_tucs` (`id`, `tieu_de_bai_viet`, `ngay_dang_bai`, `luot_xem`, `trang_thai_bai_viet`, `noi_dung_bai_viet`) VALUES
(1, 'Iphone 16 đỉnh cao công nghệ', '2024-11-08', 12, 1, 'Xin chao moi  nguoi chào mừng mọi người đã đến với...Vậy là bạn đã có thể quản lý thời gian thêm bài viết và số lượt xem một cách dễ dàng. Nếu có điều gì cần làm rõ hơn, hãy cho tôi biết nhé!'),
(7, 'Tai nghe mới nhất của Apple1', NULL, NULL, 2, 'sưedfjgfdsdsdfghjhfgdfsdsdhdh'),
(8, 'Tai nghe mới nhất của Apple1', NULL, NULL, 1, 'wrewtytuyilgkfxvvzjjz'),
(10, 'Tai nghe mới nhất của Apple1', NULL, NULL, 1, '<p>aaaaaa</p>\r\n'),
(11, 'dien thoai', NULL, NULL, 2, '<p><strong>Cử tri đề nghị tăng mức xử phạt hành vi vi phạm liên quan đến thực phẩm chức năng</strong></p><p>Thứ Ba, 12/11/2024 14:15&nbsp;|&nbsp;</p><h4><a href=\"https://baotintuc.vn/thoi-su-472ct0.htm\"><strong>Thời sự</strong></a></h4><p>&nbsp;</p><h2><strong>Sáng 12/11, tại Kỳ họp thứ 8, Quốc hội khóa XV tiếp tục phiên chất vấn và trả lời chất vấn với Bộ trưởng Bộ Y tế Đào Hồng Lan và Bộ trưởng Bộ Thông tin và Truyền thông Nguyễn Mạnh Hùng. Phiên chất vất và trả lời chất vấn được đông đảo cử tri, nhân dân thành phố Đà Nẵng, tỉnh Ninh Thuận quan tâm theo dõi.</strong></h2><h4><a href=\"https://baotintuc.vn/thoi-su/cu-tri-danh-gia-cao-phien-chat-van-tai-ky-hop-thu-8-quoc-hoi-khoa-xv-20241111202757401.htm\">Cử tri đánh giá cao phiên chất vấn tại Kỳ họp thứ 8, Quốc hội khóa XV</a></h4><h4><a href=\"https://baotintuc.vn/thoi-su/ben-le-quoc-hoi-phien-chat-van-linh-vuc-y-te-lam-sang-to-nhieu-van-de-cu-tri-quan-tam-20241111170517186.htm\">Bên lề Quốc hội: Phiên chất vấn lĩnh vực Y tế làm sáng tỏ nhiều vấn đề cử tri quan tâm</a></h4><h4><a href=\"https://baotintuc.vn/thoi-su/phien-chat-van-dau-tien-dien-ra-thanh-cong-soi-noi-voi-nhieu-van-de-nong-20241111110535438.htm\">Phiên chất vấn đầu tiên diễn ra thành công, sôi nổi, với nhiều vấn đề nóng</a></h4><h4><a href=\"https://baotintuc.vn/thoi-su/quoc-hoi-bat-dau-phien-chat-van-va-tra-loi-chat-van-20241111090931679.htm\">Quốc hội bắt đầu phiên chất vấn và trả lời chất vấn</a></h4><p>&nbsp;</p><figure class=\"image\"><img src=\"https://cdnmedia.baotintuc.vn/Upload/DmtgOUlHWBO5POIHzIwr1A/files/2024/11/12/dao-hong-lan-12112024-01.jpg\" alt=\"Chú thích ảnh\"><figcaption><i>Bộ trưởng Bộ Y tế Đào Hồng Lan trả lời chất vấn. Ảnh: Doãn Tấn/TTXVN</i></figcaption></figure><p><strong>Sôi nổi, thẳng thắn</strong></p><p>Nhiều cử tri và người dân tại Đà Nẵng, Ninh Thuận bày tỏ tán thành, đánh giá cao nội dung chất vấn của các đại biểu Quốc hội rất thẳng thắn, đề cập đến vấn đề \"nóng\" đang được xã hội quan tâm cũng như phần trả lời rõ ràng, đầy đủ của các Bộ trưởng và thành viên Chính phủ.</p><p>Cử tri tỉnh Ninh Thuận nhận xét, không khí phiên chất vấn, trả lời chất vấn diễn ra sôi nổi, dân chủ, trên tinh thần xây dựng, có nhiều thông tin phản ánh đúng thực trạng tình hình, nêu nhiều đề xuất, kiến nghị, hiến kế trong chỉ đạo, quản lý và điều hành. Cách điều hành phiên chất vấn của Chủ tịch Quốc hội Trần Thanh Mẫn rất linh hoạt, nhiều vấn đề đặt ra tại nghị trường được giải</p>');

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hang`
--

CREATE TABLE `trang_thai_don_hang` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trang_thai_don_hang`
--

INSERT INTO `trang_thai_don_hang` (`id`, `ten_trang_thai`, `trang_thai`) VALUES
(1, 'Chờ xác nhận', 1),
(2, 'Đã xác nhận', 1),
(3, 'Đang giao', 1),
(4, 'Đã giao', 1),
(5, 'Đã hoàn thành', 1),
(6, 'Đã thất bại', 1),
(7, 'Đã hủy', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_don_hangs_nguoi_dungs` (`nguoi_dung_id`),
  ADD KEY `lk_don_hangs_khuyen_mais` (`khuyen_mai_id`),
  ADD KEY `lk_don_hangs_trang_thai_don_hangs` (`trang_thai_id`),
  ADD KEY `lk_don_hangs_phuong_thuc_thanh_toans` (`phuong_thuc_thanh_toan`);

--
-- Indexes for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khuyen_mais`
--
ALTER TABLE `khuyen_mais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lien_hes`
--
ALTER TABLE `lien_hes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguoi_dungs`
--
ALTER TABLE `nguoi_dungs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tin_tucs`
--
ALTER TABLE `tin_tucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trang_thai_don_hang`
--
ALTER TABLE `trang_thai_don_hang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=394;

--
-- AUTO_INCREMENT for table `khuyen_mais`
--
ALTER TABLE `khuyen_mais`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lien_hes`
--
ALTER TABLE `lien_hes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nguoi_dungs`
--
ALTER TABLE `nguoi_dungs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `tin_tucs`
--
ALTER TABLE `tin_tucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `trang_thai_don_hang`
--
ALTER TABLE `trang_thai_don_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD CONSTRAINT `lk_don_hangs_khuyen_mais` FOREIGN KEY (`khuyen_mai_id`) REFERENCES `khuyen_mais` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `lk_don_hangs_nguoi_dungs` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dungs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `lk_don_hangs_phuong_thuc_thanh_toans` FOREIGN KEY (`phuong_thuc_thanh_toan`) REFERENCES `phuong_thuc_thanh_toans` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `lk_don_hangs_trang_thai_don_hangs` FOREIGN KEY (`trang_thai_id`) REFERENCES `trang_thai_don_hang` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
