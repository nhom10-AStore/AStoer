<?php
class UserController
{
    public $modelTaiKhoan;
    public function __construct()
    {
        $this->modelTaiKhoan = new TaiKhoan();
    }
    public function chiTietTaiKhoan()
    {
        $id = $_GET['id'];
        // var_dump($id);die;
        $taiKhoan = $this->modelTaiKhoan->getDetailTaiKhoan($id);
        require_once 'views/profile.php';
    }
    public function updateThongTin()
    {
        // session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $anh_dai_dien = null;
            if (isset($_FILES['anh_dai_dien']) && $_FILES['anh_dai_dien']['error'] == UPLOAD_ERR_OK) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["anh_dai_dien"]["name"]);
                move_uploaded_file($_FILES["anh_dai_dien"]["tmp_name"], $target_file);
                $anh_dai_dien = $target_file;
            }
            $trang_thai = 1;
            $result = $this->modelTaiKhoan->updateTaiKhoan($id, $ho_ten, $email, $gioi_tinh, $so_dien_thoai, $dia_chi, $ngay_sinh, $anh_dai_dien, $trang_thai);
            if ($result) {
                $_SESSION['message'] = "Cập nhật thông tin thành công!";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Cập nhật thông tin thất bại!";
                $_SESSION['message_type'] = "error";
            }
            header("Location: " . BASE_URL . '?act=thong-tin-ca-nhan&id=' . $_SESSION['user']['id']);
            exit();
        } else {
            echo "Phương thức yêu cầu không hợp lệ.";
        }
    }
    public function doiMatKhau()
    {
        require_once './views/doiMatKhau.php';
    }
    public function updatePassword()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $mat_khau_cu = $_POST['mat_khau_cu'];
            $mat_khau_moi1 = $_POST['mat_khau_moi1'];
            $mat_khau_moi2 = $_POST['mat_khau_moi2'];
            if ($mat_khau_moi1 !== $mat_khau_moi2) {
                $_SESSION['message'] = "Mật khẩu mới không khớp.";
                $_SESSION['message_type'] = "error";
                header("Location: " . BASE_URL . '?act=doi-mat-khau&id=' . $_SESSION['user']['id']);
                exit();
            }
            $tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($id);
            if (!$tai_khoan || !password_verify($mat_khau_cu, $tai_khoan['mat_khau'])) {
                $_SESSION['message'] = "Mật khẩu cũ không đúng.";
                $_SESSION['message_type'] = "error";
                header("Location: " . BASE_URL . '?act=doi-mat-khau&id=' . $_SESSION['user']['id']);
                exit();
            }
            $mat_khau_moi_ma_hoa = password_hash($mat_khau_moi1, PASSWORD_DEFAULT);
            $result = $this->modelTaiKhoan->updateMatKhau($id, $mat_khau_moi_ma_hoa);
            if ($result) {
                $_SESSION['message'] = "Thay đổi mật khẩu thành công!";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Thay đổi mật khẩu thất bại!";
                $_SESSION['message_type'] = "error";
            }
            header("Location: " . BASE_URL . '?act=thong-tin-ca-nhan&id=' . $_SESSION['user']['id']);
            exit();
        } else {
            echo "Phương thức yêu cầu không hợp lệ.";
        }
    }
}
