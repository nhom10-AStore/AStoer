<?php
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/RegisterController.php';


// Require toàn bộ file Models
require_once './models/taiKhoan.php';
require_once './models/sanPham.php';
require_once './models/banner.php';
require_once 'models/Register.php';
// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'                 => (new HomeController())->index(),
    'chi-tiet-san-pham' => (new HomeController())->chiTietSanPham(),

    // auth
    'login'             => (new HomeController())->formLogin(),
    'check-login'       => (new HomeController())->postLogin(),
    'dang-xuat'         => (new HomeController())->logout(),
    // Đăng ký
    'dang-ky'           => (new RegisterController())->create(),
    'dangky'            => (new RegisterController())->store(),
    //thông tin nguời dùng
    'thong-tin-ca-nhan'  => (new HomeController())->profile(),
};
