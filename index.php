<?php
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/RegisterController.php';
require_once './controllers/UserController.php';
require_once './controllers/TinTucController.php';
require_once './controllers/KhuyenMaiController.php';
require_once './controllers/LienHeController.php';
require_once './controllers/ListSanPhamController.php';
require_once './controllers/DonHangController.php';



// Require toàn bộ file Models
require_once './models/taiKhoan.php';
require_once './models/sanPham.php';
require_once './models/banner.php';
require_once 'models/Register.php';
require_once './models/DanhMuc.php';
require_once './models/TinTuc.php';
require_once './models/KhuyenMai.php';
require_once './models/LienHe.php';
require_once './models/ListSanPham.php';
require_once './models/GioHang.php';
require_once './models/DonHangQL.php';
require_once './models/DonHang.php';
// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'                 => (new HomeController())->index(),
    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),
    'xu-ly-binh-luan' => (new HomeController())->addComment(),

    // auth
    'login'             => (new HomeController())->formLogin(),
    'check-login'       => (new HomeController())->postLogin(),
    'dang-xuat'         => (new HomeController())->logout(),
    // Đăng ký
    'dang-ky'           => (new RegisterController())->create(),
    'dangky'            => (new RegisterController())->store(),
    //thông tin nguời dùng
    'thong-tin-ca-nhan'  => (new UserController())->chiTietTaiKhoan(),
    'xu-ly-thay-doi-thong-tin-ca-nhan' => (new UserController())->updateThongTin(),
    'doi-mat-khau' => (new UserController())->doiMatKhau(),
    'xu-ly-doi-mat-khau' => (new UserController())->updatePassword(),
    //tin tuc
    'tin-tucs'                 => (new TinTucController())->index(),
    'chi-tiet-tin-tuc'                 => (new TinTucController())->detail(),
    'khuyen-mais'                 => (new KhuyenMaiController())->index(),
    // Liên hệ
    'lien-he'           => (new LienHeController())->index(),
    'form-them-lien-he' => (new LienHeController())->create(),
    'them-lien-he'      => (new LienHeController())->store(),
    
    'list-san-pham' => (new ListSanPhamController())->getByCategory(),
    'search'            => (new HomeController())->search(),
    'them-gio-hang' => (new HomeController())->addGioHang(),
    'gio-hang' => (new HomeController())->gioHang(),
    'xoa-gio-hang' => (new HomeController())->deleteFromCart(),
    'cap-nhat-gio-hang' => (new HomeController())->updateGioHang(),
    // quan li dong hang
    'quan_li_don_hang' => (new DonHangController())->quanLiDonHang(),
    'chi-tiet-don-hang'         => (new DonHangController())->detailDonHang(),
    'huy-don-hang'         => (new DonHangController())->huyDonHang(),
    'mua-lai'         => (new DonHangController())->muaLaiDonHang(),
    'xac-nhan-don-hang'         => (new DonHangController())->xacNhanDonHang(),
    //Thanh toan
    'thanh-toan' => (new HomeController())->thanhToan(),
    'xu-ly-thanh-toan' => (new HomeController())->postThanhToan(),
};
