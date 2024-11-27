<?php
class DonHangController
{
    private $modelDonHang;

    public function __construct()
    {
        $this->modelDonHang = new DonHangQL();
    }

    public function quanLiDonHang()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!isset($_SESSION['user']['id'])) {
            // Nếu người dùng chưa đăng nhập, chuyển hướng về trang đăng nhập
            header("Location: " . BASE_URL . '?act=login');
            exit();
        }

        $nguoi_dung_id = $_SESSION['user']['id']; // ID người dùng đăng nhập

        // Lấy danh sách đơn hàng của người dùng
        $quanliDonhang = $this->modelDonHang->getAllByUserId($nguoi_dung_id);

        // Truyền dữ liệu sang view
        include_once 'views/quanLiDonHang.php';
    }

    public function detailDonHang()
    {
        if (!isset($_SESSION['user'])) {
            // Nếu người dùng chưa đăng nhập, chuyển hướng về trang đăng nhập
            header("Location: " . BASE_URL . '?act=login');
            exit();
        }

        $nguoi_dung_id = $_SESSION['user']['id']; // ID người dùng đăng nhập
        $don_hang_id = $_GET['id_don_hang'];

        // Kiểm tra xem đơn hàng có thuộc người dùng hiện tại không
        $donHang = $this->modelDonHang->getDetailData($don_hang_id, $nguoi_dung_id);

        if (!$donHang) {
            // Nếu đơn hàng không thuộc người dùng này, chuyển hướng về trang quản lý đơn hàng
            header("Location: quanLiDonHang.php");
            exit();
        }

        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($don_hang_id);
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

        require_once './views/detailDonHang.php';
    }
}
