-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2024 at 03:36 AM
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
(16, 'uploads/logo-5.png', 2),
(17, 'uploads/Ảnh chụp màn hình 2024-11-17 004408.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int NOT NULL,
  `nguoi_dung_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `noi_dung` text COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_dang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `nguoi_dung_id`, `san_pham_id`, `noi_dung`, `ngay_dang`) VALUES
(5, 7, 130, '32525456', '2024-11-14'),
(6, 8, 132, 'asasffsagas', '2024-11-13'),
(7, 1, 142, 'dggty', '2024-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int NOT NULL,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL,
  `khuyen_mai_id` int NOT NULL,
  `phi_van_chuyen` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `san_pham_id`, `so_luong`, `khuyen_mai_id`, `phi_van_chuyen`) VALUES
(6, 4, 135, 4, 2, 10000),
(7, 4, 133, 23, 1, 15000),
(8, 5, 130, 4, 1, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vus`
--

CREATE TABLE `chuc_vus` (
  `id` int NOT NULL,
  `ten_chuc_vu` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chuc_vus`
--

INSERT INTO `chuc_vus` (`id`, `ten_chuc_vu`) VALUES
(1, 'Quản trị viên'),
(2, 'Khách hàng');

-- --------------------------------------------------------

--
-- Table structure for table `danh_gias`
--

CREATE TABLE `danh_gias` (
  `id` int NOT NULL,
  `nguoi_dung_id` int NOT NULL,
  `sao` int NOT NULL,
  `noi_dung` text COLLATE utf8mb4_general_ci NOT NULL,
  `ngaydg` date NOT NULL,
  `tra_loi` text COLLATE utf8mb4_general_ci NOT NULL,
  `san_pham_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danh_gias`
--

INSERT INTO `danh_gias` (`id`, `nguoi_dung_id`, `sao`, `noi_dung`, `ngaydg`, `tra_loi`, `san_pham_id`) VALUES
(130, 1, 4, 'ưertyuiu', '2024-11-05', 'abca', 130);

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
(2, 'Mac', 1),
(10, 'Phụ Kiện', 1);

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `email_nguoi_nhan` varchar(255) NOT NULL,
  `sdt_nguoi_nhan` varchar(10) NOT NULL,
  `dia_chi_nguoi_nhan` varchar(255) NOT NULL,
  `ngay_dat` date NOT NULL,
  `khuyen_mai_id` int NOT NULL,
  `phuong_thuc_thanh_toan` int NOT NULL,
  `trang_thai_thanh_toan` tinyint(1) NOT NULL,
  `thanh_toan` decimal(10,2) DEFAULT NULL,
  `trang_thai_id` int NOT NULL,
  `ghi_chu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nguoi_dung_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `khuyen_mai_id`, `phuong_thuc_thanh_toan`, `trang_thai_thanh_toan`, `thanh_toan`, `trang_thai_id`, `ghi_chu`, `nguoi_dung_id`) VALUES
(4, 'PH111223', 'ưertyuio', 'phutrung@gmail.com', '0355011558', 'ẻtyjklj;k', '2024-11-11', 7, 1, 1, '230000.00', 7, '312423gfdgd', 7),
(5, 'PH111223', 'ègdfmn,', 'eqwrr@gmail.com', '0355011558', 'ưqewq', '2024-11-20', 2, 2, 1, '230000.00', 7, '123', 6),
(6, '432341', 'Nguyễn Văn A', 'ABC@gmail.com', '0355011558', 'Hà Nam', '2024-11-18', 7, 2, 1, '50000.00', 5, 'Không ghi chú', 7);

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
(393, 138, './admin/uploads/1731588985zalomkt.jpg'),
(394, 0, './admin/uploads/1731733343Ảnh chụp màn hình (517).png'),
(395, 0, './admin/uploads/1731733343Ảnh chụp màn hình (518).png'),
(396, 0, './admin/uploads/1731733343Ảnh chụp màn hình (519).png'),
(397, 0, './admin/uploads/1731733343Ảnh chụp màn hình (520).png'),
(398, 0, './admin/uploads/1731733343Ảnh chụp màn hình (521).png'),
(399, 0, './admin/uploads/1731733343Ảnh chụp màn hình (522).png'),
(400, 0, './admin/uploads/1731733343Ảnh chụp màn hình (523).png'),
(401, 0, './admin/uploads/1731733343Ảnh chụp màn hình (524).png'),
(402, 0, './admin/uploads/1731733343Ảnh chụp màn hình (525).png'),
(403, 139, './admin/uploads/1731733863udemy.jpg'),
(404, 139, './admin/uploads/1731733863Youtube_logo - Copy.png'),
(405, 139, './admin/uploads/1731733863Youtube_logo.png'),
(406, 139, './admin/uploads/1731733863zalomkt.jpg');

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
(1, 'Khuyến mãi Black Friday', 'BF2024', 10, '2024-11-15', '2024-11-30', 'Giảm giá 20% tất cả sản phẩm', 1),
(2, 'Khuyến mãi Giáng Sinh', 'XMAS2024', 30, '2024-12-01', '2024-12-25', 'Giảm giá 30% nhân dịp lễ Giáng Sinh', 0),
(7, '1222', '111', 11, '2024-11-22', '2024-11-30', '11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lien_hes`
--

CREATE TABLE `lien_hes` (
  `id` int NOT NULL,
  `ten` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `loi_nhan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `trang_thai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lien_hes`
--

INSERT INTO `lien_hes` (`id`, `ten`, `email`, `loi_nhan`, `trang_thai`) VALUES
(1, 'Nguyễn Văn A', 'nva@a.b', 'qwertâfimiegnornhoernhorgorrmpokskgoiưmirhmoidmhoksentokhtmaronhmeapemnneropgmoianeebhbmheoktnhpismtiounhseihiodrrpithiorthiosrtlbmoitnbbipsryoiseoinhpirtnjỏinthoisethouinsrpigbpapijapefhwewpgnoegpjeowewogyu', 0),
(2, 'Trần Văn B', 'TVB@BB.B', 'asdfghj', 2);

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toans`
--

CREATE TABLE `phuong_thuc_thanh_toans` (
  `id` int NOT NULL,
  `ten_phuong_thuc` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `ma_san_pham` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_nhap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `ten_san_pham`, `luot_xem`, `thong_so`, `so_luong`, `so_luong_ton_kho`, `mo_ta`, `anh_san_pham`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `mo_ta_chi_tiet`, `trang_thai`, `danh_muc_id`, `ma_san_pham`, `ngay_nhap`) VALUES
(111, 'tgdf', 4354, '', 2423, 0, 'fcrefrr4543', '', '24.00', '34543.00', '242.00', 'erewr4543', 1, 1, '334', '2024-11-13'),
(130, 'fdsf', 32, '', 432, 0, 'dfdsfdfdddddddddddddddddddddd', './uploads/1731895154Ảnh chụp màn hình 2024-09-19 140845.png', '343.00', '54.00', '4324.00', 'eu h e hewuteutetie', 2, 1, '300', '2024-11-14'),
(131, 'asas', 65, '', 56, 0, 'tỷ', './admin/uploads/1731582706a.jpg', '56.00', '65.00', '56.00', 'yt', 1, 3, '56456', '2024-11-14'),
(132, 'dfds', 435, '', 24, 0, 'ewrew343', './admin/uploads/1731584399a.jpg', '242.00', '23.00', '43243.00', 'ewrew324', 1, 2, '842', '2024-11-14'),
(133, 'brty', 45, '', 43, 0, 'er453', './admin/uploads/17315848432023_Facebook_icon.svg', '43.00', '32.00', '435.00', 'wrew543', 2, 1, '64', '2024-11-14'),
(135, 'Redmi K70 Pro', 32, '', 32, 0, 'Redmi K70 trang bị chip Snapdragon 8 Gen 2 kết hợp với RAM lên tới 16GB giúp đảm bảo hiệu năng vô cùng mạnh mẽ. Thiết bị xuất xưởng với hệ điều hành HyperOS hoàn toàn mới có nhiều tính năng hấp dẫn và hiện đại. Redmi K70 có màn hình OLED QHD+ hỗ trợ 68 tỷ màu có độ sáng siêu cao lên tới 4000 nit.', './admin/uploads/1731586630zalomkt.jpg', '12.00', '123.00', '3048.00', 'Redmi K70 ra mắt: Snapdragon 8 Gen 2, màn hình 2K, sạc nhanh 120 W (cập nhật: 29/11) Về tổng quan, mình nhận thấy Redmi K70 có ngoại hình khá tương đồng với một số mẫu Redmi Note được ra mắt gần đây. Máy sở hữu những đường nét vuông vắn ở cạnh viền, kết hợp cùng mặt lưng được bo cong nhẹ ở phần mép giúp tạo nên một tổng thể hài hòa. Đồng thời, khu vực mặt lưng của Redmi K70 cũng có sự tinh chỉnh cách thiết kế tùy theo phiên bản màu.', 1, 3, '0', '2024-11-14'),
(136, 'êr', 54, '', 54, 0, 'Redmi K70 ra mắt: Snapdragon 8 Gen 2, màn hình 2K, sạc nhanh 120 W (cập nhật: 29/11) Về tổng quan, mình nhận thấy Redmi K70 có ngoại hình khá tương đồng với một số mẫu Redmi Note được ra mắt gần đây. Máy sở hữu những đường nét vuông vắn ở cạnh viền, kết hợp cùng mặt lưng được bo cong nhẹ ở phần mép giúp tạo nên một tổng thể hài hòa. Đồng thời, khu vực mặt lưng của Redmi K70 cũng có sự tinh chỉnh cách thiết kế tùy theo phiên bản màu.', './uploads/1731899465Ảnh chụp màn hình 2024-09-19 140845.png', '43.00', '23.00', '2443.00', 'vRedmi K70 ra mắt: Snapdragon 8 Gen 2, màn hình 2K, sạc nhanh 120 W (cập nhật: 29/11) Về tổng quan, mình nhận thấy Redmi K70 có ngoại hình khá tương đồng với một số mẫu Redmi Note được ra mắt gần đây. Máy sở hữu những đường nét vuông vắn ở cạnh viền, kết hợp cùng mặt lưng được bo cong nhẹ ở phần mép giúp tạo nên một tổng thể hài hòa. Đồng thời, khu vực mặt lưng của Redmi K70 cũng có sự tinh chỉnh cách thiết kế tùy theo phiên bản màu.', 1, 1, '34', '2024-11-14'),
(137, 'Hiếu', 2, '', 21, 0, 'Redmi K70 ra mắt: Snapdragon 8 Gen 2, màn hình 2K, sạc nhanh 120 W (cập nhật: 29/11) Về tổng quan, mình nhận thấy Redmi K70 có ngoại hình khá tương đồng với một số mẫu Redmi Note được ra mắt gần đây. Máy sở hữu những đường nét vuông vắn ở cạnh viền, kết hợp cùng mặt lưng được bo cong nhẹ ở phần mép giúp tạo nên một tổng thể hài hòa. Đồng thời, khu vực mặt lưng của Redmi K70 cũng có sự tinh chỉnh cách thiết kế tùy theo phiên bản màu.', './admin/uploads/1731587650iphone 16 pro - 3.jpg', '23.00', '234.00', '21.00', 'Redmi K70 trang bị chip Snapdragon 8 Gen 2 kết hợp với RAM lên tới 16GB giúp đảm bảo hiệu năng vô cùng mạnh mẽ. Thiết bị xuất xưởng với hệ điều hành HyperOS hoàn toàn mới có nhiều tính năng hấp dẫn và hiện đại. Redmi K70 có màn hình OLED QHD+ hỗ trợ 68 tỷ màu có độ sáng siêu cao lên tới 4000 nit.', 1, 1, '56456', '2024-11-14'),
(138, 'SSADSAD', 45, '', 42, 0, 'yyt', './admin/uploads/1731590727fbmkt.jpg', '32.00', '343.00', '242.00', 'gfgdfgd', 1, 3, '842', '2005-05-09'),
(139, 'ưe', 45, '', 343, 0, '234fver', './uploads/1731899446Ảnh chụp màn hình 2024-09-19 140845.png', '543.00', '34.00', '43.00', '343rv', 1, 1, '123', '2024-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `id` int NOT NULL,
  `ho_ten` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `anh_dai_dien` text COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_sinh` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `so_dien_thoai` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL,
  `dia_chi` text COLLATE utf8mb4_general_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `chuc_vu_id` int NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tai_khoans`
--

INSERT INTO `tai_khoans` (`id`, `ho_ten`, `anh_dai_dien`, `ngay_sinh`, `email`, `so_dien_thoai`, `gioi_tinh`, `dia_chi`, `mat_khau`, `chuc_vu_id`, `trang_thai`) VALUES
(0, 'Nguyễn anh', '', '0000-00-00', 'anh@gmail.com', '0968086223', 0, '', '$2y$10$NW12CMjaaGxxziJt/7sZKe/cQO/7BF/8plIUCpGqI0gL1IKoIZ2KG', 2, 2),
(1, 'Nguyễn Trung Hiếu', '', '2014-11-11', 'admin@gmail.com', '0968086233', 1, 'Hà Nam', '$2y$10$6Vnlzahj.4FgTty4TctJlOz6P5fWyUZKQGAHRxn/pHvJTgBZUcEIG', 1, 1),
(6, 'Nguyễn Hoàng Anh23', '', '0000-00-00', 'hieunguyentrung343@gmail.com', '', 0, '', '$2y$10$16VGzu6oq0d0BZmixtlsS..4T2pqWfOH9JrI3zHfDpNZZ/xw8yW0G', 1, 1),
(7, 'Nguyễn Hoàng Anh', '', '2024-11-15', 'nguyentrunghie22@gmail.com', '0968086233', 1, '', '$2y$10$M8BVCa6v0UmbRFsudRU9Y.rHgXlbDdQrI2dytTMPLeBAJV5liRWRe', 2, 2),
(8, 'Phạm Phú Trung', '', '2014-11-08', 'phutrung1606a@gmail.com', '0355011558', 1, 'Hải Dương', '$2y$10$6Vnlzahj.4FgTty4TctJlOz6P5fWyUZKQGAHRxn/pHvJTgBZUcEIG', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tin_tucs`
--

CREATE TABLE `tin_tucs` (
  `id` int NOT NULL,
  `tieu_de_bai_viet` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_dang_bai` date DEFAULT NULL,
  `luot_xem` int DEFAULT NULL,
  `trang_thai_bai_viet` tinyint(1) NOT NULL,
  `noi_dung_bai_viet` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tin_tucs`
--

INSERT INTO `tin_tucs` (`id`, `tieu_de_bai_viet`, `ngay_dang_bai`, `luot_xem`, `trang_thai_bai_viet`, `noi_dung_bai_viet`) VALUES
(7, 'Tai nghe mới nhất của Apple1', NULL, NULL, 2, 'sưedfjgfdsdsdfghjhfgdfsdsdhdh'),
(8, 'Tai nghe mới nhất của Apple1', NULL, NULL, 1, 'wrewtytuyilgkfxvvzjjz'),
(11, 'dien thoai', NULL, NULL, 2, '<p><strong>Cử tri đề nghị tăng mức xử phạt hành vi vi phạm liên quan đến thực phẩm chức năng</strong></p><p>Thứ Ba, 12/11/2024 14:15&nbsp;|&nbsp;</p><h4><a href=\"https://baotintuc.vn/thoi-su-472ct0.htm\"><strong>Thời sự</strong></a></h4><p>&nbsp;</p><h2><strong>Sáng 12/11, tại Kỳ họp thứ 8, Quốc hội khóa XV tiếp tục phiên chất vấn và trả lời chất vấn với Bộ trưởng Bộ Y tế Đào Hồng Lan và Bộ trưởng Bộ Thông tin và Truyền thông Nguyễn Mạnh Hùng. Phiên chất vất và trả lời chất vấn được đông đảo cử tri, nhân dân thành phố Đà Nẵng, tỉnh Ninh Thuận quan tâm theo dõi.</strong></h2><h4><a href=\"https://baotintuc.vn/thoi-su/cu-tri-danh-gia-cao-phien-chat-van-tai-ky-hop-thu-8-quoc-hoi-khoa-xv-20241111202757401.htm\">Cử tri đánh giá cao phiên chất vấn tại Kỳ họp thứ 8, Quốc hội khóa XV</a></h4><h4><a href=\"https://baotintuc.vn/thoi-su/ben-le-quoc-hoi-phien-chat-van-linh-vuc-y-te-lam-sang-to-nhieu-van-de-cu-tri-quan-tam-20241111170517186.htm\">Bên lề Quốc hội: Phiên chất vấn lĩnh vực Y tế làm sáng tỏ nhiều vấn đề cử tri quan tâm</a></h4><h4><a href=\"https://baotintuc.vn/thoi-su/phien-chat-van-dau-tien-dien-ra-thanh-cong-soi-noi-voi-nhieu-van-de-nong-20241111110535438.htm\">Phiên chất vấn đầu tiên diễn ra thành công, sôi nổi, với nhiều vấn đề nóng</a></h4><h4><a href=\"https://baotintuc.vn/thoi-su/quoc-hoi-bat-dau-phien-chat-van-va-tra-loi-chat-van-20241111090931679.htm\">Quốc hội bắt đầu phiên chất vấn và trả lời chất vấn</a></h4><p>&nbsp;</p><figure class=\"image\"><img src=\"https://cdnmedia.baotintuc.vn/Upload/DmtgOUlHWBO5POIHzIwr1A/files/2024/11/12/dao-hong-lan-12112024-01.jpg\" alt=\"Chú thích ảnh\"><figcaption><i>Bộ trưởng Bộ Y tế Đào Hồng Lan trả lời chất vấn. Ảnh: Doãn Tấn/TTXVN</i></figcaption></figure><p><strong>Sôi nổi, thẳng thắn</strong></p><p>Nhiều cử tri và người dân tại Đà Nẵng, Ninh Thuận bày tỏ tán thành, đánh giá cao nội dung chất vấn của các đại biểu Quốc hội rất thẳng thắn, đề cập đến vấn đề \"nóng\" đang được xã hội quan tâm cũng như phần trả lời rõ ràng, đầy đủ của các Bộ trưởng và thành viên Chính phủ.</p><p>Cử tri tỉnh Ninh Thuận nhận xét, không khí phiên chất vấn, trả lời chất vấn diễn ra sôi nổi, dân chủ, trên tinh thần xây dựng, có nhiều thông tin phản ánh đúng thực trạng tình hình, nêu nhiều đề xuất, kiến nghị, hiến kế trong chỉ đạo, quản lý và điều hành. Cách điều hành phiên chất vấn của Chủ tịch Quốc hội Trần Thanh Mẫn rất linh hoạt, nhiều vấn đề đặt ra tại nghị trường được giải</p>'),
(12, 'Tai nghe mới nhất của Apple11', NULL, NULL, 2, '<h2>iPhone giá rẻ mới của Apple dự kiến mang đến một thiết kế đổi mới cùng nhiều nâng cấp hấp dẫn nhưng giá bán lại rất phải chăng.</h2><p>&nbsp;</p><p>Theo PhoneArena, LG Innotek, nhà cung cấp camera cho Apple, đã bắt đầu sản xuất hàng loạt module máy ảnh cho iPhone SE 4. Thông tin này cho thấy ngày ra mắt chính thức có thể rơi vào khoảng 21/3/2025, dựa trên lịch sử trữ linh kiện của LG.</p><p><a href=\"https://sohanews.sohacdn.com/160588918557773824/2024/11/17/vs-youtube-iphonese4firstlookaneweraofpowerdesign-306-1731851006927-1731851007144518721942.jpg\"><img src=\"https://sohanews.sohacdn.com/160588918557773824/2024/11/17/vs-youtube-iphonese4firstlookaneweraofpowerdesign-306-1731851006927-1731851007144518721942.jpg\" alt=\" - Ảnh 1.\"></a></p><p>Khác với những thế hệ trước đây, iPhone SE 4 hứa hẹn mang đến nhiều nâng cấp đáng giá. Mặt lưng được cho là sẽ giống iPhone 16 với camera xếp dọc, trong khi mặt trước lại sở hữu màn hình với kích thước lên đến 6,1 inch.</p><p><a href=\"https://sohanews.sohacdn.com/160588918557773824/2024/11/17/vs-youtube-iphonese4firstlookaneweraofpowerdesign-347-1731851007802-1731851008100422847136.jpg\"><img src=\"https://sohanews.sohacdn.com/160588918557773824/2024/11/17/vs-youtube-iphonese4firstlookaneweraofpowerdesign-347-1731851007802-1731851008100422847136.jpg\" alt=\" - Ảnh 2.\"></a></p><p>So với các thế hệ trước đó, màn hình của SE 4 có kích thước ấn tượng hơn khi tăng hẳn 1,4 inch, từ 4,7 lên 6,1 inch. Với thiết kế viền mỏng cùng kích thước màn hình lớn hơn, iPhone SE 4 không chỉ mang đến vẻ ngoài tinh tế mà còn tạo không gian hiển thị rộng rãi hơn khi trải nghiệm.</p><p><a href=\"https://sohanews.sohacdn.com/160588918557773824/2024/11/17/vs-youtube-iphonese4firstlookaneweraofpowerdesign-256-1731851008850-17318510090411145792304.jpg\"><img src=\"https://sohanews.sohacdn.com/160588918557773824/2024/11/17/vs-youtube-iphonese4firstlookaneweraofpowerdesign-256-1731851008850-17318510090411145792304.jpg\" alt=\" - Ảnh 3.\"></a></p>');

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hang`
--

CREATE TABLE `trang_thai_don_hang` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `trang_thai` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_thanh_toans`
--

CREATE TABLE `trang_thai_thanh_toans` (
  `id` int NOT NULL,
  `trang_thai_thanh_toan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trang_thai_thanh_toans`
--

INSERT INTO `trang_thai_thanh_toans` (`id`, `trang_thai_thanh_toan`) VALUES
(1, 'Chưa thanh toán'),
(2, 'Đã thanh toán');

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
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_gias`
--
ALTER TABLE `danh_gias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_danhgia_sp` (`san_pham_id`),
  ADD KEY `lk_danhgia_nd` (`nguoi_dung_id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
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
-- Indexes for table `trang_thai_thanh_toans`
--
ALTER TABLE `trang_thai_thanh_toans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `danh_gias`
--
ALTER TABLE `danh_gias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=418;

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
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `tin_tucs`
--
ALTER TABLE `tin_tucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `trang_thai_don_hang`
--
ALTER TABLE `trang_thai_don_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trang_thai_thanh_toans`
--
ALTER TABLE `trang_thai_thanh_toans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
