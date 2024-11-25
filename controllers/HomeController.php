<?php

class HomeController
{
    public $modelBanner;
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelDanhMuc;
    public function __construct()
    {

        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelBanner = new Banner();
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
    }
    public function index()
    {
        //    require_once './client/home-15.php';
        $listDanhMuc = $this->modelDanhMuc->danhSachDanhMuc();
        $listSanPham = $this->modelSanPham->getAllSanPham();
        $banners = $this->modelBanner->getAll();
        $listDanhGia = $this->modelSanPham->getAllDanhGia();
        require_once './views/home.php';
    }
    public function getDetailSanPham()
    {
        $listDanhMuc = $this->modelDanhMuc->danhSachDanhMuc();
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
    public function search()
    {
        $keyword = $_GET['keyword'] ?? '';
        $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
        $limit = 8;

        // New filter parameters
        $priceFilter = $_GET['price_filter'] ?? '';
        $sortBy = $_GET['sort_by'] ?? '';

        if (!empty($keyword)) {
            $searchResult = $this->modelSanPham->searchSanPham($keyword, $page, $limit, $priceFilter, $sortBy);
            $searchResults = $searchResult['products'];
            $totalPages = $searchResult['totalPages'];
            $totalProducts = $searchResult['total'];
        } else {
            $searchResults = [];
            $totalPages = 0;
            $totalProducts = 0;
        }

        // Return JSON for AJAX requests
        if (isset($_GET['ajax'])) {
            header('Content-Type: application/json');
            echo json_encode($searchResults);
            exit;
        }

        // Load view for non-AJAX requests
        $pageTitle = "Kết quả tìm kiếm: " . htmlspecialchars($keyword);
        require_once './views/search-results.php';
    }

    public function chiTietSanPham()
    {
        $listDanhMuc = $this->modelDanhMuc->danhSachDanhMuc();
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
    public function addComment()
    {
        // Kiểm tra người dùng đã đăng nhập chưa
        if (!isset($_SESSION['user'])) {
            echo json_encode(['status' => 'error', 'message' => 'Bạn cần đăng nhập để bình luận.']);
            return;
        }

        // Lấy thông tin người dùng và sản phẩm từ request
        $nguoi_dung_id = $_SESSION['user']['id']; // ID người dùng từ session
        $san_pham_id = $_GET['id_san_pham']; // ID sản phẩm
        $noi_dung = isset($_POST['noi_dung']) ? trim($_POST['noi_dung']) : ''; // Nội dung bình luận
        // var_dump($san_pham_id);die;
        // Kiểm tra tính hợp lệ của dữ liệu
        if (empty($san_pham_id) || empty($noi_dung)) {
            echo json_encode(['status' => 'error', 'message' => 'Vui lòng nhập đầy đủ thông tin bình luận.']);
            return;
        }

        // Gọi model để thêm bình luận
        $result = $this->modelSanPham->addComment($nguoi_dung_id, $san_pham_id, $noi_dung);

        // Xử lý kết quả thêm bình luận
        if ($result) {
            // Nếu thêm bình luận thành công, chuyển hướng về trang chi tiết sản phẩm
            header("Location: " . BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $san_pham_id);
            exit();
        } else {
            // Nếu có lỗi trong quá trình thêm bình luận, thông báo lỗi
            echo json_encode(['status' => 'error', 'message' => 'Đã xảy ra lỗi khi thêm bình luận.']);
        }
    }
    public function thanhToan()
    {
        // if (!isset($_SESSION['user'])) {
        //     echo json_encode(['status' => 'error', 'message' => 'Bạn cần đăng nhập để thanh toán.']);
        //     return;
        // }

        require_once './views/thanhToan.php';
    }
    public function logout()
    {
        require_once './views/logout.php';
    }
}
