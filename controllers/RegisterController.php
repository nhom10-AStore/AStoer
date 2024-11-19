<?php
class RegisterController
{
    public $modelRegister;

    public function __construct()
    {
        $this->modelRegister = new Register();
    }

    public function index()
    {
        require_once './views/dashboard.php';
    }

    public function create()
    {
        require_once 'views/register.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu từ form
            $ho_ten = $_POST['ho_ten'];
            $anh_dai_dien = $_FILES['anh_dai_dien'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $dia_chi = $_POST['dia_chi'];
            $mat_khau = $_POST['mat_khau'];

            $chuc_vu_id = 2;
            $trang_thai = 1;


            $upload_dir = 'uploads/';
            $file_path = $upload_dir . basename($anh_dai_dien['name']);

            // Di chuyển file vào thư mục uploads
            move_uploaded_file($anh_dai_dien['tmp_name'], $file_path);

            // Kiểm tra dữ liệu
            $errors = [];
            if (empty($ho_ten)) $errors['ho_ten'] = 'Nhập họ tên';
            if (empty($ho_ten)) $errors['anh_dai_dien'] = 'anh_dai_dien';
            if (empty($ngay_sinh)) $errors['ngay_sinh'] = 'Nhập ngày sinh';
            if (empty($email)) $errors['email'] = 'Nhập email';
            if (empty($so_dien_thoai)) $errors['so_dien_thoai'] = 'Nhập số điện thoại';
            if (empty($gioi_tinh)) $errors['gioi_tinh'] = 'Chọn giới tính';
            if (empty($dia_chi)) $errors['dia_chi'] = 'Nhập địa chỉ';
            if (empty($mat_khau)) $errors['mat_khau'] = 'Nhập mật khẩu';

            // Thêm dữ liệu nếu không có lỗi
            if (empty($errors)) {
                $result = $this->modelRegister->postData($ho_ten, $ngay_sinh, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $mat_khau, $file_path, $chuc_vu_id, $trang_thai);

                if ($result) {
                    unset($_SESSION['errors']);
                    header('Location:' . BASE_URL_ADMIN . '?act=login-admin');
                    exit();
                } else {
                    echo "Lỗi khi thêm dữ liệu!";
                }
            } else {
                $_SESSION['errors'] = $errors;
                header('Location:' . BASE_URL . '?act=dang-ky');
                exit();
            }
        }
    }
}
