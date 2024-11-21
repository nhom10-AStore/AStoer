<?php

class HomeController
{
    public $modelBanner;
    public $modelSanPham;
    public $modelTaiKhoan;
    public function __construct()
    {

        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelBanner = new Banner();
        $this->modelSanPham = new SanPham();
    }
    public function index()
    {
        //    require_once './client/home-15.php';
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $banners = $this->modelBanner->getAll();
        $listDanhGia = $this->modelSanPham->getAllDanhGia();
        require_once './views/home.php';
    }
    public function getDetailSanPham()
    {
        require_once 'views/detailSanPham.php';
    }
    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
        deleteSessionError();
        exit();
    }

    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // lấy email và pass gửi lên từ form
            $email = $_POST['email'];
            $password = $_POST['password'];

            // var_dump($email);die;

            // Xử lý kiểm tra thông tin đăng nhập
            $user = $this->modelTaiKhoan->checkLogin($email, $password);

            if ($user == $email) { // Trường hợp đăng nhập thành công
                // Lưu thông tin vào session
                $_SESSION['user_client'] = $user;
                header("Location: " . BASE_URL);
                exit();
            } else {
                // Lỗi thì lưu lỗi vào session
                $_SESSION['error'] = $user;
                // var_dump($_SESSION['error']);die;
                $_SESSION['flash'] = true;

                header("Location: " . BASE_URL . '?act=login');
                exit();
            }
        }
    }
    public function chiTietSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getAllBinhLuan($id);
        $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamCungDanhMuc($sanPham['danh_muc_id']);
        if ($sanPham) {
            require_once './views/detailSanPham.php';
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }

    public function logout()
    {
        require_once './views/logout.php';
    }
    public function profile()
    {
        require_once './views/profile.php';
    }
}
