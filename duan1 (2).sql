-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2024 at 08:35 AM
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
(13, 'uploads/34b5bf180145769.6505ae7623131.jpg', 1),
(14, 'uploads/banner-web-traidepcarelifetime-150324zz-1763.png', 2),
(15, 'uploads/giathat-rethat.webp', 1);

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
(7, 1, 142, 'dggty', '2024-11-15'),
(8, 17, 130, 'a', '2024-11-22'),
(9, 17, 130, 'sdsdg', '2024-11-22'),
(10, 17, 130, 'aaa', '2024-11-22'),
(11, 18, 130, '1232114124124', '2024-11-22'),
(12, 18, 132, 'aaaa', '2024-11-22'),
(13, 17, 140, 'dsfs', '2024-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int NOT NULL,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL,
  `khuyen_mai_id` int DEFAULT NULL,
  `phi_van_chuyen` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `san_pham_id`, `so_luong`, `khuyen_mai_id`, `phi_van_chuyen`) VALUES
(30, 70, 132, 2, NULL, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hangs`
--

CREATE TABLE `chi_tiet_gio_hangs` (
  `id` int NOT NULL,
  `gio_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_gio_hangs`
--

INSERT INTO `chi_tiet_gio_hangs` (`id`, `gio_hang_id`, `san_pham_id`, `so_luong`) VALUES
(4, 2, 140, 2),
(5, 2, 137, 1),
(6, 2, 132, 1);

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
(130, 1, 4, 'Giao hàng nhanh, sản phẩm chất lượng, tư vấn viên nhanh nhẹn nhiệt tình', '2024-11-05', 'abca', 130);

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
(10, 'Phụ Kiện', 1),
(14, 'Tai Nghe', 1);

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
  `khuyen_mai_id` int DEFAULT NULL,
  `phuong_thuc_thanh_toan` int NOT NULL,
  `trang_thai_thanh_toan` tinyint(1) NOT NULL,
  `thanh_toan` float DEFAULT NULL,
  `trang_thai_id` int NOT NULL,
  `ghi_chu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nguoi_dung_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `khuyen_mai_id`, `phuong_thuc_thanh_toan`, `trang_thai_thanh_toan`, `thanh_toan`, `trang_thai_id`, `ghi_chu`, `nguoi_dung_id`) VALUES
(70, 'DH3670', 'Phạm Phú Trung', 'user@gmail.com', '0123456789', 'Hà Nội', '2024-11-27', NULL, 1, 2, 46613000, 4, '', 17);

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int NOT NULL,
  `nguoi_dung_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gio_hangs`
--

INSERT INTO `gio_hangs` (`id`, `nguoi_dung_id`) VALUES
(2, 7),
(3, 7),
(4, 7);

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
(2, 'Trần Văn B', 'TVB@BB.B', 'asdfghj', 2),
(4, 'Phạm Phú Trung', 'admin@gmail.com', 'wreretuuyoipu', 0);

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
(130, 'iPhone 16 Pro', 32, 'Bước nhảy vọt cho iPhone với thiết kế mới tuyệt đẹ', 432, 0, 'iPhone 16 Pro có thiết kế titan Cấp 5 với kết cấu vi điểm tinh tế mới. Titan là một trong những kim loại có tỷ số độ bền và trọng lượng cao nhất, giúp phiên bản này cực kỳ cứng cáp và nhẹ ấn tượng. iPhone 16 Pro có bốn màu tuyệt đẹp, bao gồm màu Titan Sa Mạc mới.', './admin/uploads/173236777412_1724647257.webp', '28999000.00', '30000000.00', '29599999.00', 'Các cải tiến thiết kế bên trong (như cấu trúc tản nhiệt bên dưới được làm từ 100% nhôm tái chế và mặt kính sau với những đặc tính tối ưu giúp tản nhiệt hiệu quả hơn) cho phép duy trì hiệu suất tốt hơn 20% so với iPhone 15 Pro. Nhờ đó, bạn có thể làm mọi điều mình thích, như chơi game cường độ cao được lâu hơn.', 1, 1, '300', '2024-11-18'),
(131, 'asas', 65, '', 56, 0, 'tỷ', './admin/uploads/1731582706a.jpg', '56.00', '65.00', '56.00', 'yt', 1, 3, '56456', '2024-11-14'),
(132, 'iPhone 16', 435, '', 300, 0, 'ewrew343', './admin/uploads/173236785811_1724647255.webp', '22999000.00', '23299000.00', '23000000.00', 'ewrew324', 1, 2, '842', '2024-11-15'),
(133, 'iPhone 15', 45, '', 43, 0, 'er453', './admin/uploads/173236784812_1724647257.webp', '18000000.00', '18999999.00', '18799999.00', 'wrew543', 1, 2, '64', '2024-11-14'),
(135, 'Redmi K70 Pro', 32, '', 32, 0, 'Redmi K70 trang bị chip Snapdragon 8 Gen 2 kết hợp với RAM lên tới 16GB giúp đảm bảo hiệu năng vô cùng mạnh mẽ. Thiết bị xuất xưởng với hệ điều hành HyperOS hoàn toàn mới có nhiều tính năng hấp dẫn và hiện đại. Redmi K70 có màn hình OLED QHD+ hỗ trợ 68 tỷ màu có độ sáng siêu cao lên tới 4000 nit.', './admin/uploads/1731586630zalomkt.jpg', '12.00', '123.00', '3048.00', 'Redmi K70 ra mắt: Snapdragon 8 Gen 2, màn hình 2K, sạc nhanh 120 W (cập nhật: 29/11) Về tổng quan, mình nhận thấy Redmi K70 có ngoại hình khá tương đồng với một số mẫu Redmi Note được ra mắt gần đây. Máy sở hữu những đường nét vuông vắn ở cạnh viền, kết hợp cùng mặt lưng được bo cong nhẹ ở phần mép giúp tạo nên một tổng thể hài hòa. Đồng thời, khu vực mặt lưng của Redmi K70 cũng có sự tinh chỉnh cách thiết kế tùy theo phiên bản màu.', 1, 3, '465', '2024-11-14'),
(136, 'êr', 54, '', 54, 0, 'Redmi K70 ra mắt: Snapdragon 8 Gen 2, màn hình 2K, sạc nhanh 120 W (cập nhật: 29/11) Về tổng quan, mình nhận thấy Redmi K70 có ngoại hình khá tương đồng với một số mẫu Redmi Note được ra mắt gần đây. Máy sở hữu những đường nét vuông vắn ở cạnh viền, kết hợp cùng mặt lưng được bo cong nhẹ ở phần mép giúp tạo nên một tổng thể hài hòa. Đồng thời, khu vực mặt lưng của Redmi K70 cũng có sự tinh chỉnh cách thiết kế tùy theo phiên bản màu.', './admin/uploads/173236787012_1724647257.webp', '43.00', '23.00', '2443.00', 'vRedmi K70 ra mắt: Snapdragon 8 Gen 2, màn hình 2K, sạc nhanh 120 W (cập nhật: 29/11) Về tổng quan, mình nhận thấy Redmi K70 có ngoại hình khá tương đồng với một số mẫu Redmi Note được ra mắt gần đây. Máy sở hữu những đường nét vuông vắn ở cạnh viền, kết hợp cùng mặt lưng được bo cong nhẹ ở phần mép giúp tạo nên một tổng thể hài hòa. Đồng thời, khu vực mặt lưng của Redmi K70 cũng có sự tinh chỉnh cách thiết kế tùy theo phiên bản màu.', 1, 1, '34', '2024-11-14'),
(137, 'Hiếu', 2, '', 21, 0, 'Redmi K70 ra mắt: Snapdragon 8 Gen 2, màn hình 2K, sạc nhanh 120 W (cập nhật: 29/11) Về tổng quan, mình nhận thấy Redmi K70 có ngoại hình khá tương đồng với một số mẫu Redmi Note được ra mắt gần đây. Máy sở hữu những đường nét vuông vắn ở cạnh viền, kết hợp cùng mặt lưng được bo cong nhẹ ở phần mép giúp tạo nên một tổng thể hài hòa. Đồng thời, khu vực mặt lưng của Redmi K70 cũng có sự tinh chỉnh cách thiết kế tùy theo phiên bản màu.', './admin/uploads/173236788010-2_1724647254.webp', '23.00', '234.00', '21.00', 'Redmi K70 trang bị chip Snapdragon 8 Gen 2 kết hợp với RAM lên tới 16GB giúp đảm bảo hiệu năng vô cùng mạnh mẽ. Thiết bị xuất xưởng với hệ điều hành HyperOS hoàn toàn mới có nhiều tính năng hấp dẫn và hiện đại. Redmi K70 có màn hình OLED QHD+ hỗ trợ 68 tỷ màu có độ sáng siêu cao lên tới 4000 nit.', 1, 1, '56456', '2024-11-14'),
(138, 'SSADSAD', 45, '', 42, 0, 'yyt', './admin/uploads/1731590727fbmkt.jpg', '32.00', '343.00', '242.00', 'gfgdfgd', 1, 3, '842', '2005-05-09'),
(139, 'ưe', 45, '', 343, 0, '234fver', './admin/uploads/173236793511_1729045960.png', '543.00', '34.00', '43.00', '343rv', 1, 1, '12314', '2024-11-16'),
(140, 'Ip ', 3, '', 434, 10, 'vrtert45', './admin/uploads/173236795113_1729046344.png', '23.00', '342.00', '54354.00', 'rtrte453', 1, 1, '21', '2024-11-20'),
(141, 'nhieu', 34, '', 23, 0, 'gkmgie09i43', './admin/uploads/173236795911_1729046040.png', '33.00', '234.00', '43.00', 'mkrtiei43', 1, 2, '1232', '2024-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `id` int NOT NULL,
  `ho_ten` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `anh_dai_dien` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
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
(1, 'Nguyễn Trung Hiếu', 'uploads/images (1).jpg', '2014-11-11', 'admin@gmail.com', '0968086233', 1, 'Hà Nam', '$2y$10$6Vnlzahj.4FgTty4TctJlOz6P5fWyUZKQGAHRxn/pHvJTgBZUcEIG', 1, 1),
(2, 'Nguyễn anh', 'uploads/images (1).jpg', '2004-03-12', 'anh@gmail.com', '0968086223', 2, '', '$2y$10$NW12CMjaaGxxziJt/7sZKe/cQO/7BF/8plIUCpGqI0gL1IKoIZ2KG', 2, 2),
(6, 'Nguyễn Hoàng Anh23', 'uploads/images (1).jpg', '2024-11-07', 'hieunguyentrung343@gmail.com', '', 1, '', '$2y$10$16VGzu6oq0d0BZmixtlsS..4T2pqWfOH9JrI3zHfDpNZZ/xw8yW0G', 1, 1),
(7, 'Nguyễn Hoàng Anh', 'uploads/images (1).jpg', '2024-11-15', 'nguyentrunghie22@gmail.com', '0968086233', 1, '', '$2y$10$M8BVCa6v0UmbRFsudRU9Y.rHgXlbDdQrI2dytTMPLeBAJV5liRWRe', 2, 2),
(16, 'Nguyễn Văn C', 'uploads/images (1).jpg', '2005-10-11', 'phutrung149@gmail.com', '0355011558', 1, 'Hải Dương', '$2y$10$C/IG/1uc5FGxr7zNeI.fbuExJ9bljXpgroGN4n5S7tVHyER74pFHa', 2, 1),
(17, 'Phạm Phú Trung', 'uploads/tải xuống.jpg', '2005-04-08', 'user@gmail.com', '0123456789', 1, 'Hà Nội', '$2y$10$lHSKZndbVXx7.ZMDnhn0t.3DsrxJF1GGomErXNH0D7/7XC6jjdyv6', 2, 1),
(18, 'DinhTV7 dep trai', 'uploads/Ảnh chụp màn hình 2024-08-10 001805.png', '2024-11-21', 'dinhtv7@fpt.edu.vn', '0355011551', 1, 'dinhtv7@fpt.edu.vn', '$2y$10$tbpNl9VWNQ7KKNTmR1ZHU.RX0Px7ezqQHa5W4x8rfMyVU5p9RmIDm', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tin_tucs`
--

CREATE TABLE `tin_tucs` (
  `id` int NOT NULL,
  `tieu_de_bai_viet` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ngay_dang_bai` date NOT NULL,
  `luot_xem` int DEFAULT NULL,
  `trang_thai_bai_viet` tinyint(1) NOT NULL,
  `noi_dung_bai_viet` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tin_tucs`
--

INSERT INTO `tin_tucs` (`id`, `tieu_de_bai_viet`, `img`, `ngay_dang_bai`, `luot_xem`, `trang_thai_bai_viet`, `noi_dung_bai_viet`) VALUES
(7, 'Tai nghe mới nhất của Apple1', 'uploads/iphone_14__eso1fig4ci6a_xlarge.png', '2024-11-24', 100, 2, '<h2><strong>Thiết kế MacBook quốc dân sang chảnh, hoàn thiện cao</strong></h2><p><img src=\"https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-1-1024x640.jpg\" alt=\"MacBook Air M1, MacBook quốc dân với thiết kế hiện đại, tinh tế\" srcset=\"https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-1-1024x640.jpg 1024w, https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-1-300x188.jpg 300w, https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-1-768x480.jpg 768w, https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-1-150x94.jpg 150w, https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-1-600x375.jpg 600w, https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-1-696x435.jpg 696w, https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-1-1392x870.jpg 1392w, https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-1-1068x668.jpg 1068w, https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-1-672x420.jpg 672w, https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-1-1344x840.jpg 1344w, https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-1.jpg 1440w\" sizes=\"100vw\" width=\"1024\"></p><p><i>MacBook Air M1, MacBook quốc dân với thiết kế hiện đại, tinh tế</i></p><p>MacBook Air M1 mang cho mình một thiết kế thanh lịch và tinh tế và quen thuộc của những chiếc MacBook quốc dân, với nét đặc trưng của dòng sản phẩm MacBook. Máy có vẻ ngoài tối giản với chất liệu nhôm nguyên khối cao cấp, mang lại cảm giác chắc chắn và sang trọng khi cầm trên tay. Độ mỏng ấn tượng chỉ <strong>0.63 inch</strong> và trọng lượng nhẹ nhàng chỉ <strong>1.29 kg</strong>, MacBook Air rất thuận tiện để mang theo mọi nơi, phù hợp với người dùng thường xuyên di chuyển.</p><p>Phần nắp máy được thiết kế mịn màng với logo Apple phát sáng ở giữa, tạo nên điểm nhấn tinh tế. Các góc cạnh được bo tròn mềm mại, tạo cảm giác thoải mái khi sử dụng trong thời gian dài. Bên cạnh đó, bản lề của máy được chế tạo chắc chắn, giúp mở máy mượt mà và giữ màn hình ổn định ở mọi góc độ.</p><p>MacBook Air M1 có ba tùy chọn màu sắc: Vàng hồng, Bạc, và Xám không gian, mang đến sự lựa chọn đa dạng phù hợp với phong cách cá nhân của người dùng. Phần bàn phím Magic Keyboard được cải tiến với cơ chế cắt kéo, mang lại trải nghiệm gõ phím êm ái và chính xác. Không những thế, đèn nền của bàn phím còn giúp làm việc hiệu quả trong điều kiện ánh sáng yếu.</p><p><img src=\"https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-4-1024x640.jpg\" alt=\"Máy có nhiều phiên bản màu sắc khác nhau cho người dùng lựa chọn\" srcset=\"https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-4-1024x640.jpg 1024w, https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-4-300x188.jpg 300w, https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-4-768x480.jpg 768w, https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-4-150x94.jpg 150w, https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-4-600x375.jpg 600w, https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-4-696x435.jpg 696w, https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-4-1392x870.jpg 1392w, https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-4-1068x668.jpg 1068w, https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-4-672x420.jpg 672w, https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-4-1344x840.jpg 1344w, https://phongvu.vn/cong-nghe/wp-content/uploads/2024/07/macbook-air-m1-4.jpg 1440w\" sizes=\"100vw\" width=\"1024\"></p><p><i>Máy có nhiều phiên bản màu sắc khác nhau cho người dùng lựa chọn</i></p><p>Ngoài ra, phần <strong>touchpad lớn và nhạy</strong>, hỗ trợ đa điểm, cho phép người dùng dễ dàng thực hiện các thao tác vuốt, chạm và zoom một cách mượt mà. Hai bên thân máy được trang bị các cổng kết nối USB-C, cung cấp khả năng sạc nhanh và truyền dữ liệu tốc độ cao. Mặc dù số lượng cổng kết nối không nhiều, nhưng với sự phát triển của các phụ kiện hỗ trợ, người dùng vẫn có thể mở rộng kết nối một cách dễ dàng.</p><p>Nhìn chung, thiết kế bên ngoài của MacBook Air M1 không chỉ đẹp mắt mà còn thực sự tiện dụng, đáp ứng tốt nhu cầu sử dụng hàng ngày của người dùng hiện đại.</p>'),
(8, 'Tai nghe mới nhất của Apple1', '', '2024-11-24', 100, 1, '<h2><strong>iPad Mini 7 và iPad Air M2: Đâu là lựa chọn phù hợp với bạn?</strong></h2><p><strong>nhuyhuynh</strong> 27/10/2024 12:00</p><p><img src=\"https://minhtuanmobile.com/uploads/blog/ipad-mini-7-va-ipad-air-m2-dau-la-lua-chon-phu-hop-voi-ban-241023023856.jpg\" alt=\"iPad Mini 7 và iPad Air M2: Đâu là lựa chọn phù hợp với bạn?\" srcset=\"https://minhtuanmobile.com/uploads/blog/ipad-mini-7-va-ipad-air-m2-dau-la-lua-chon-phu-hop-voi-ban-241023023856-241023143856_thumb.jpg 480w, https://minhtuanmobile.com/uploads/blog/ipad-mini-7-va-ipad-air-m2-dau-la-lua-chon-phu-hop-voi-ban-241023023856.jpg 1000w\" sizes=\"100vw\" width=\"980px\"></p><p>Mục lục</p><p><strong>iPad Mini 7 và iPad Air M2 khác biệt ra sao về thiết kế, hiệu năng, giá cả và các tính năng chính để bạn chọn được mẫu iPad phù hợp nhất.</strong></p><p>Năm nay, <a href=\"https://minhtuanmobile.com/thuong-hieu-apple/\">Apple</a> đã cho ra mắt hai phiên bản <a href=\"https://minhtuanmobile.com/ipad/\">iPad</a> mới: iPad Mini 7 và iPad Air thế hệ 6 (M2). Mặc dù thuộc hai dòng sản phẩm khác nhau, cả hai đều có nhiều điểm tương đồng trong thiết kế và tính năng. Hãy cùng phân tích chi tiết để tìm ra sự lựa chọn phù hợp nhất cho từng nhu cầu sử dụng.</p><p><img src=\"https://static.minhtuanmobile.com/uploads/editer/2024-10/23/images/ipad-mini-7-va-ipad-air-m2-dau-la-lua-chon-phu-hop-voi-ban-1.webp\" alt=\"iPad Mini 7 và iPad Air M2: Đâu là lựa chọn phù hợp với bạn?\"></p><h2><strong>Thiết kế và màn hình</strong></h2><p>iPad Mini 7 sở hữu màn hình 8.3 inch với độ phân giải 326 ppi, mang đến trải nghiệm hình ảnh sắc nét trong một thiết kế nhỏ gọn. Với trọng lượng chỉ 297 gram và nút âm lượng được đặt ở cạnh trên, iPad Mini 7 được thiết kế tối ưu cho việc cầm nắm bằng một tay.<br>&nbsp;</p><p><img src=\"https://static.minhtuanmobile.com/uploads/editer/2024-10/23/images/ipad-mini-7-va-ipad-air-m2-dau-la-lua-chon-phu-hop-voi-ban-2.webp\" alt=\"iPad Mini 7 và iPad Air M2: Đâu là lựa chọn phù hợp với bạn?\"></p><p>Trong khi đó, iPad Air M2 cung cấp hai lựa chọn kích thước màn hình: 11 inch và 13 inch với độ phân giải 264 ppi. Bản 13 inch có độ sáng cao hơn đạt 600 nits so với 500 nits của bản 11 inch và iPad Mini. Trọng lượng của iPad Air dao động từ 462 gram đến 617 gram tùy phiên bản, với nút âm lượng được bố trí ở cạnh phải.</p><h2><strong>Hiệu năng và xử lý</strong></h2><p>iPad Mini 7 được trang bị chip A17 Pro mới nhất, sử dụng quy trình sản xuất 3nm tiên tiến, cùng CPU 6 nhân và GPU 5 nhân. Đây là con chip mạnh mẽ được ra mắt cùng iPhone 15 Pro, mang lại hiệu năng ấn tượng cho một thiết bị nhỏ gọn.</p><p><img src=\"https://static.minhtuanmobile.com/uploads/editer/2024-10/23/images/ipad-mini-7-va-ipad-air-m2-dau-la-lua-chon-phu-hop-voi-ban-4.webp\" alt=\"iPad Mini 7 và iPad Air M2: Đâu là lựa chọn phù hợp với bạn?\"></p><p>Ngược lại, iPad Air M2 sử dụng chip M2 với quy trình 5nm nâng cao, tích hợp CPU 8 nhân và GPU 9 nhân. Điểm nổi bật là chip M2 còn được trang bị thêm Media Engine chuyên dụng và hỗ trợ tính năng Stage Manager, giúp nâng cao khả năng xử lý đa nhiệm và các tác vụ chuyên nghiệp.</p>'),
(11, 'dien thoai', '', '2024-11-24', 100, 1, '<p><strong>Cử tri đề nghị tăng mức xử phạt hành vi vi phạm liên quan đến thực phẩm chức năng</strong></p><p>Thứ Ba, 12/11/2024 14:15&nbsp;|&nbsp;</p><h4><a href=\"https://baotintuc.vn/thoi-su-472ct0.htm\"><strong>Thời sự</strong></a></h4><p>&nbsp;</p><h2><strong>Sáng 12/11, tại Kỳ họp thứ 8, Quốc hội khóa XV tiếp tục phiên chất vấn và trả lời chất vấn với Bộ trưởng Bộ Y tế Đào Hồng Lan và Bộ trưởng Bộ Thông tin và Truyền thông Nguyễn Mạnh Hùng. Phiên chất vất và trả lời chất vấn được đông đảo cử tri, nhân dân thành phố Đà Nẵng, tỉnh Ninh Thuận quan tâm theo dõi.</strong></h2><h4><a href=\"https://baotintuc.vn/thoi-su/cu-tri-danh-gia-cao-phien-chat-van-tai-ky-hop-thu-8-quoc-hoi-khoa-xv-20241111202757401.htm\">Cử tri đánh giá cao phiên chất vấn tại Kỳ họp thứ 8, Quốc hội khóa XV</a></h4><h4><a href=\"https://baotintuc.vn/thoi-su/ben-le-quoc-hoi-phien-chat-van-linh-vuc-y-te-lam-sang-to-nhieu-van-de-cu-tri-quan-tam-20241111170517186.htm\">Bên lề Quốc hội: Phiên chất vấn lĩnh vực Y tế làm sáng tỏ nhiều vấn đề cử tri quan tâm</a></h4><h4><a href=\"https://baotintuc.vn/thoi-su/phien-chat-van-dau-tien-dien-ra-thanh-cong-soi-noi-voi-nhieu-van-de-nong-20241111110535438.htm\">Phiên chất vấn đầu tiên diễn ra thành công, sôi nổi, với nhiều vấn đề nóng</a></h4><h4><a href=\"https://baotintuc.vn/thoi-su/quoc-hoi-bat-dau-phien-chat-van-va-tra-loi-chat-van-20241111090931679.htm\">Quốc hội bắt đầu phiên chất vấn và trả lời chất vấn</a></h4><p>&nbsp;</p><figure class=\"image\"><img src=\"https://cdnmedia.baotintuc.vn/Upload/DmtgOUlHWBO5POIHzIwr1A/files/2024/11/12/dao-hong-lan-12112024-01.jpg\" alt=\"Chú thích ảnh\"><figcaption><i>Bộ trưởng Bộ Y tế Đào Hồng Lan trả lời chất vấn. Ảnh: Doãn Tấn/TTXVN</i></figcaption></figure><p><strong>Sôi nổi, thẳng thắn</strong></p><p>Nhiều cử tri và người dân tại Đà Nẵng, Ninh Thuận bày tỏ tán thành, đánh giá cao nội dung chất vấn của các đại biểu Quốc hội rất thẳng thắn, đề cập đến vấn đề \"nóng\" đang được xã hội quan tâm cũng như phần trả lời rõ ràng, đầy đủ của các Bộ trưởng và thành viên Chính phủ.</p><p>Cử tri tỉnh Ninh Thuận nhận xét, không khí phiên chất vấn, trả lời chất vấn diễn ra sôi nổi, dân chủ, trên tinh thần xây dựng, có nhiều thông tin phản ánh đúng thực trạng tình hình, nêu nhiều đề xuất, kiến nghị, hiến kế trong chỉ đạo, quản lý và điều hành. Cách điều hành phiên chất vấn của Chủ tịch Quốc hội Trần Thanh Mẫn rất linh hoạt, nhiều vấn đề đặt ra tại nghị trường được giải</p>'),
(12, 'Tai nghe mới nhất của Apple11', '', '2024-11-24', 100, 1, '<h2>iPhone giá rẻ mới của Apple dự kiến mang đến một thiết kế đổi mới cùng nhiều nâng cấp hấp dẫn nhưng giá bán lại rất phải chăng.</h2><p>&nbsp;</p><p>Theo PhoneArena, LG Innotek, nhà cung cấp camera cho Apple, đã bắt đầu sản xuất hàng loạt module máy ảnh cho iPhone SE 4. Thông tin này cho thấy ngày ra mắt chính thức có thể rơi vào khoảng 21/3/2025, dựa trên lịch sử trữ linh kiện của LG.</p><p><a href=\"https://sohanews.sohacdn.com/160588918557773824/2024/11/17/vs-youtube-iphonese4firstlookaneweraofpowerdesign-306-1731851006927-1731851007144518721942.jpg\"><img src=\"https://sohanews.sohacdn.com/160588918557773824/2024/11/17/vs-youtube-iphonese4firstlookaneweraofpowerdesign-306-1731851006927-1731851007144518721942.jpg\" alt=\" - Ảnh 1.\"></a></p><p>Khác với những thế hệ trước đây, iPhone SE 4 hứa hẹn mang đến nhiều nâng cấp đáng giá. Mặt lưng được cho là sẽ giống iPhone 16 với camera xếp dọc, trong khi mặt trước lại sở hữu màn hình với kích thước lên đến 6,1 inch.</p><p><a href=\"https://sohanews.sohacdn.com/160588918557773824/2024/11/17/vs-youtube-iphonese4firstlookaneweraofpowerdesign-347-1731851007802-1731851008100422847136.jpg\"><img src=\"https://sohanews.sohacdn.com/160588918557773824/2024/11/17/vs-youtube-iphonese4firstlookaneweraofpowerdesign-347-1731851007802-1731851008100422847136.jpg\" alt=\" - Ảnh 2.\"></a></p><p>So với các thế hệ trước đó, màn hình của SE 4 có kích thước ấn tượng hơn khi tăng hẳn 1,4 inch, từ 4,7 lên 6,1 inch. Với thiết kế viền mỏng cùng kích thước màn hình lớn hơn, iPhone SE 4 không chỉ mang đến vẻ ngoài tinh tế mà còn tạo không gian hiển thị rộng rãi hơn khi trải nghiệm.</p><p><a href=\"https://sohanews.sohacdn.com/160588918557773824/2024/11/17/vs-youtube-iphonese4firstlookaneweraofpowerdesign-256-1731851008850-17318510090411145792304.jpg\"><img src=\"https://sohanews.sohacdn.com/160588918557773824/2024/11/17/vs-youtube-iphonese4firstlookaneweraofpowerdesign-256-1731851008850-17318510090411145792304.jpg\" alt=\" - Ảnh 3.\"></a></p>');

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
-- Indexes for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
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
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
