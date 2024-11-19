<?php
session_start();
// Require file Common
require_once '../commons/env.php'; // Declare environment variables
require_once '../commons/function.php'; // Helper functions
$act = $_GET['act'] ?? '/';
if ($act !== 'login-admin' && $act !== 'check-login-admin' && $act !== 'logout-admin') {
    checkLoginAdmin(); // chặn quyền truy cập khi đã logout ra
}
// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/DanhMucController.php';
require_once 'controllers/TinTucController.php';
require_once 'controllers/AdminLienHeController.php';
require_once 'controllers/KhuyenMaiController.php';
require_once 'controllers/BannerController.php';
require_once 'controllers/SanPhamController.php';
require_once 'controllers/DonHangController.php';
require_once 'controllers/TrangThaiDonHangController.php';
require_once 'controllers/AdminTaiKhoanController.php';



// Require toàn bộ file Models
require_once 'models/DanhMuc.php';
require_once 'models/SanPham.php';
require_once 'models/TinTuc.php';
require_once 'models/AdminLienHe.php';
require_once 'models/KhuyenMai.php';
require_once 'models/Banner.php';
require_once 'models/DonHangs.php';
require_once 'models/TrangThaiDonHang.php';
require_once 'models/AdminTaiKhoan.php';
require_once 'models/BinhLuan.php';
require_once 'models/Dashboard.php';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
$act = $_GET['act'] ?? '/';
match ($act) {
    // Dashboards
    '/'                     => (new DashboardController())->index(),
    // quản  lý danh mục sản phẩm
    'danh-mucs'             => (new DanhMucController())->index(),
    'form-them-danh-muc'    => (new DanhMucController())->create(),
    'them-danh-muc'         => (new DanhMucController())->store(),
    'form-sua-danh-muc'     => (new DanhMucController())->edit(),
    'sua-danh-muc'          => (new DanhMucController())->update(),
    'xoa-danh-muc'          => (new DanhMucController())->destroy(),

    // Quản lý tin tức
    'tin-tucs'              => (new TinTucController())->index(),
    'form-them-tin-tuc'     => (new TinTucController())->create(),
    'them-tin-tuc'          => (new TinTucController())->store(),
    'form-sua-tin-tuc'      => (new TinTucController())->edit(),
    'sua-tin-tuc'           => (new TinTucController())->update(),
    'xoa-tin-tuc'           => (new TinTucController())->destroy(),
    // Quản lý liên hệ
    'lien-he'               => (new AdminLienHeController())->index(),
    'form-sua-lien-he'      => (new AdminLienHeController())->edit(),
    'update-lien-he'        => (new AdminLienHeController())->update(),
    'xoa-lien-he'           => (new AdminLienHeController())->delete(),

    // Quản lý Khuyến mãi
    'khuyen-mai'              => (new KhuyenMaiController())->index(),
    'form-them-khuyen-mai'     => (new KhuyenMaiController())->create(),
    'them-khuyen-mai'          => (new KhuyenMaiController())->store(),
    'form-sua-khuyen-mai'      => (new KhuyenMaiController())->edit(),
    'sua-khuyen-mai'          => (new KhuyenMaiController())->update(),
    'xoa-khuyen-mai'           => (new KhuyenMaiController())->destroy(),
    // Quản lý banner
    'banners'              => (new BannerController())->index(),
    'form-them-banner'     => (new BannerController())->create(),
    'them-banner'          => (new BannerController())->store(),
    'form-sua-banner'      => (new BannerController())->edit(),
    'sua-banner'          => (new BannerController())->update(),
    'xoa-banner'           => (new BannerController())->destroy(),
    // quán lí đơn hàng
    'don-hangs'                 => (new DonHangController())->index(),
    'form-sua-don-hang'         => (new DonHangController())->edit(),
    'sua-don-hang'              => (new DonHangController())->update(),
    'xoa-don-hang'              => (new DonHangController())->destroy(),
    'chi-tiet-don-hang'         => (new DonHangController())->detailDonHang(),

    // Quản lý sản phẩm
    'san_phams'             => (new SanPhamController())->listSanPham(),
    'form-them-san-pham'    => (new SanPhamController())->formAddSanPham(),
    'them-san-pham'         => (new SanPhamController())->postAddSanPham(),
    'form-sua-san-pham'     => (new SanPhamController())->formEditSanPham(),
    'sua-san-pham'          => (new SanPhamController())->postEditSanPham(),
    'xoa-san-pham'          => (new SanPhamController())->deleteSanPham(),
    'chi_tiet_san_pham'     => (new SanPhamController())->detailSanPham(),
    // Quản lý trạng thái đơn hàng
    'trang-thai-don-hang'   => (new TrangThaiDonHangController())->index(),
    'them-trang-thai'       => (new TrangThaiDonHangController())->create(),
    'xu-ly-them'            => (new TrangThaiDonHangController())->store(),
    'sua-trang-thai'        => (new TrangThaiDonHangController())->edit(),
    'xu-ly-sua-trang-thai'  => (new TrangThaiDonHangController)->update(),
    'xoa-trang-thai'        => (new TrangThaiDonHangController())->destroy(),
    // Quản lý tài khoản quản trị
    'list_tai_khoan_quan_tri'   => (new AdminTaiKhoanController())->danhSachQuanTri(),
    'form-them-quan-tri'        => (new AdminTaiKhoanController())->formAddQuanTri(),
    'them-quan-tri'             => (new AdminTaiKhoanController())->postAddQuanTri(),
    'form-sua-quan-tri'         => (new AdminTaiKhoanController())->formEditQuanTri(),
    'sua-quan-tri'              => (new AdminTaiKhoanController())->postEditQuanTri(),
    'reset-password'            => (new AdminTaiKhoanController())->resetPassword(),

    'list-tai-khoan-quan-tri'   => (new AdminTaiKhoanController())->danhSachQuanTri(),
    'form-them-quan-tri'    => (new AdminTaiKhoanController())->formAddQuanTri(),
    'them-quan-tri'         => (new AdminTaiKhoanController())->postAddQuanTri(),
    'form-sua-quan-tri'     => (new AdminTaiKhoanController())->formEditQuanTri(),
    'sua-quan-tri'          => (new AdminTaiKhoanController())->postEditQuanTri(),



    'reset-password' => (new AdminTaiKhoanController())->resetPassword(),

    'list-tai-khoan-khach-hang' => (new AdminTaiKhoanController())->danhSachKhachHang(),
    'form-sua-khach-hang' => (new AdminTaiKhoanController())->formEditKhachHang(),
    'sua-khach-hang' => (new AdminTaiKhoanController())->postEditKhachHang(),
    'chi-tiet-khach-hang' => (new AdminTaiKhoanController())->detailKhachHang(),

    'login-admin' => (new AdminTaiKhoanController())->formLogin(),
    'check-login-admin' => (new AdminTaiKhoanController())->login(),
    'logout-admin' => (new AdminTaiKhoanController())->logout(),
    // đánh giá
    'danh-gias'             => (new SanPhamController())->detailSanPham(),
    'sua-danh-gia'          => (new SanPhamController())->updateDanhGia(),
    'form-phanhoi'     => (new SanPhamController())->formPhanHoi(),
};
