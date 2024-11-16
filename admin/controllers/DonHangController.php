<?php
class DonHangController
{
    // hiển thị danh sách
    // Ket noi den model
    public $modelDonHang;
    // public $modelDanhMuc;
    public function __construct()
    {

        $this->modelDonHang = new DonHang();
        // $this->modelDanhMuc = new DanhMuc();
    }
    public function index()
    {
        // lay ra du lieu danh muc
        $donHangs = $this->modelDonHang->getAll();
        // var_dump($DonHang);

        // Dua du lieu ra view
        require_once './views/donhang/list_don_hang.php';
    }
    public function edit()
    {
        $id = $_GET['id'];
        $donHangs = $this->modelDonHang->getDetailData($id);
        $statuses = $this->modelDonHang->getAllStatuses();

        // Hiển thị dữ liệu ra view để chỉnh sửa
        require_once './views/donhang/edit_don_hang.php';
    }

    public function update()
    {
        // Kiểm tra nếu yêu cầu là POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $statusId = $_POST['trang_thai_id'];

            // Khởi tạo mảng lỗi
            $errors = [];

            // Lấy thông tin trạng thái trước đó từ cơ sở dữ liệu (giả sử bạn đã có hàm getDetailData)
            $donHang = $this->modelDonHang->getDetailData($id);
            $previousStatusId = $donHang['trang_thai_id'];

            // Kiểm tra trạng thái mới có giống trạng thái cũ hay không
            if ($statusId <= $previousStatusId) {
                $errors['trang_thai_id'] = 'Trạng thái không thể giống trạng thái trước đó';
            }

            // Nếu không có lỗi thì cập nhật trạng thái đơn hàng
            if (empty($errors)) {
                // Cập nhật trạng thái đơn hàng vào cơ sở dữ liệu
                $isUpdated = $this->modelDonHang->updateStatus($id, $statusId);

                // Xử lý kết quả cập nhật
                if ($isUpdated) {
                    // Nếu cập nhật thành công
                    $_SESSION['success'] = 'Cập nhật trạng thái đơn hàng thành công.';
                    header('Location: ?act=don-hangs');
                    exit();
                } else {
                    // Nếu cập nhật thất bại
                    $_SESSION['error'] = 'Cập nhật trạng thái đơn hàng thất bại.';
                    header('Location: ?act=form-sua-don-hang&id=' . $id);
                    exit();
                }
            } else {
                // Nếu có lỗi, lưu lỗi vào session và chuyển hướng về form sửa
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-sua-don-hang&id=' . $id);
                exit();
            }
        }
    }
    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['trang_thai_id'];
            // var_dump($id);
            // xoa danh muc
            $this->modelDonHang->deleteData($id);
            header('Location: ?act=don-hangs');
            exit();
        }
    }
}
