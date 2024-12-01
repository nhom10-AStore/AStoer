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

    // Kiểm tra hành động hủy đơn hàng
    public function huyDonHang()
    {
        if (!isset($_GET['id_don_hang'])) {
            // Nếu không có ID đơn hàng, chuyển hướng về trang quản lý đơn hàng
            header("Location: quanLiDonHang.php");
            exit();
        }

        $don_hang_id = $_GET['id_don_hang'];

        // Hủy đơn hàng và cập nhật số lượng tồn kho
        $this->modelDonHang->cancelOrder($don_hang_id);

        // Sau khi hủy đơn hàng thành công, chuyển hướng lại trang đơn hàng
        header("Location: " . BASE_URL . '?act=quan_li_don_hang');
        exit();
    }

    public function muaLaiDonHang()
{
    if (!isset($_GET['id_don_hang'])) {
        // Nếu không có ID đơn hàng, chuyển hướng về trang quản lý đơn hàng
        header("Location: " . BASE_URL . '?act=quan_li_don_hang');
        exit();
    }

    $don_hang_id = $_GET['id_don_hang'];
    $nguoi_dung_id = $_SESSION['user']['id']; // ID người dùng đăng nhập
         // Hủy đơn hàng và cập nhật số lượng tồn kho
         $this->modelDonHang->truSoLuong($don_hang_id);

    // Cập nhật trạng thái đơn hàng
    $this->modelDonHang->updateOrderStatus($don_hang_id, 1); // Ví dụ, 1 là ID của trạng thái "Chờ xác nhận"
    // Cập nhật trạng thái đơn hàng thành 'Chờ xác nhận'

    // Sau khi cập nhật, chuyển hướng về trang quản lý đơn hàng
    header("Location: " . BASE_URL . '?act=quan_li_don_hang');
    exit();
}
public function xacNhanDonHang()
{
    // Kiểm tra xem người dùng có đăng nhập không
    if (!isset($_SESSION['user']['id'])) {
        // Nếu chưa đăng nhập, chuyển hướng về trang login
        header("Location: " . BASE_URL . '?act=login');
        exit();
    }

    // Lấy ID đơn hàng từ URL
    $don_hang_id = $_GET['id_don_hang'];

    // Cập nhật trạng thái thanh toán thành "Đã Thanh Toán" và trạng thái đơn hàng thành "Đã hoàn thành"
    $result = $this->modelDonHang->xacNhanThanhToan($don_hang_id);
    
    if ($result) {
        // Sau khi cập nhật thành công, chuyển hướng về trang quản lý đơn hàng
        header("Location: " . BASE_URL . '?act=quan_li_don_hang');
        exit();
    } else {
        // Nếu có lỗi, thông báo lỗi
        echo "Có lỗi xảy ra khi xác nhận đơn hàng.";
    }
}



}
?>
