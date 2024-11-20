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
            $mat_khau = password_hash($_POST['mat_khau'], PASSWORD_DEFAULT);

            $chuc_vu_id = 2;
            $trang_thai = 1;


            $upload_dir = 'uploads/';
            $file_path = $upload_dir . basename($anh_dai_dien['name']);

            // Di chuyển file vào thư mục uploads
            move_uploaded_file($anh_dai_dien['tmp_name'], $file_path);

            // Kiểm tra dữ liệu
            if (empty($ho_ten)) $errors['ho_ten'] = 'Nhập họ tên';
            if (empty($anh_dai_dien)) $errors['anh_dai_dien'] = 'Chọn ảnh đại diện';
            if (empty($ngay_sinh)) $errors['ngay_sinh'] = 'Nhập ngày sinh';
            if ($ngay_sinh > date('Y-m-d')) $errors['ngay_sinh'] = 'Ngày sinh không được là ngày tương lai';
            if (empty($email)) $errors['email'] = 'Nhập email';
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Email không hợp lệ';
            if ($this->modelRegister->checkEmailExist($email)) $errors['email'] = 'Email đã tồn tại';
            if (empty($so_dien_thoai)) $errors['so_dien_thoai'] = 'Nhập số điện thoại';
            if (!preg_match('/^[0-9]{10,11}$/', $so_dien_thoai)) $errors['so_dien_thoai'] = 'Số điện thoại không hợp lệ';
            if ($this->modelRegister->checkPhoneExist($so_dien_thoai)) $errors['so_dien_thoai'] = 'Số điện thoại đã tồn tại';
            if (empty($gioi_tinh)) $errors['gioi_tinh'] = 'Chọn giới tính';
            if (empty($dia_chi)) $errors['dia_chi'] = 'Nhập địa chỉ';
            if (empty($mat_khau)) $errors['mat_khau'] = 'Nhập mật khẩu';
            if (strlen($mat_khau) < 6) $errors['mat_khau'] = 'Mật khẩu phải lớn hơn 6 ký tự';

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
