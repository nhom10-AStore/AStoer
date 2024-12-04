<?php

class HomeController
{
    public $modelBanner;
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelDanhMuc;
    public $modelGioHang;
    public $modelDonhang;

    public function __construct()
    {

        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelBanner = new Banner();
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
        $this->modelGioHang = new GioHang();
        $this->modelDonhang = new DonHang();
    }
    public function index()
{
    // Lấy danh sách danh mục
    $listDanhMuc = $this->modelDanhMuc->danhSachDanhMuc();
    
    // Lấy danh sách sản phẩm mới nhất, đã được sắp xếp từ CSDL
    $listSanPhamHienThi = $this->modelSanPham->getSanPhamMoiNhat(8); // Lấy tối đa 8 sản phẩm
    
    // Lấy dữ liệu khác
    $banners = $this->modelBanner->getAll();
    $listDanhGia = $this->modelSanPham->getAllDanhGia();

    // Tải view
    require_once './views/home.php';
}

    
    
    public function getDetailSanPham()
    {
        
        $listDanhMuc = $this->modelDanhMuc->danhSachDanhMuc();
        require_once 'views/detailSanPham.php';
    }
    public function formLogin()
    {
        header("Location: " . BASE_URL_ADMIN . '?act=login');
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
        $keyword = trim($_GET['keyword'] ?? '');
        $page = 1; // Default page is 1
        $limit = 8;
    
        if (!empty($keyword)) {
            $searchResult = $this->modelSanPham->searchSanPham($keyword, $page, $limit);
            $searchResults = $searchResult['products'];
            $totalPages = $searchResult['totalPages'];
            $totalProducts = $searchResult['total'];
        } else {
            $searchResults = [];
            $totalPages = 0;
            $totalProducts = 0;
        }
    
        $pageTitle = "Kết quả tìm kiếm: " . htmlspecialchars($keyword);
        require_once 'views/search-results.php';
    }
    
    
    public function chiTietSanPham()
    {
        // session_start(); // Khởi tạo session nếu chưa được bắt đầu
    
        $listDanhMuc = $this->modelDanhMuc->danhSachDanhMuc();
    
        // Lấy ID sản phẩm từ URL
        $id = $_GET['id_san_pham'];
    
        // Lấy danh sách sản phẩm đã xem từ session (nếu có)
        if (!isset($_SESSION['id_san_pham'])) {
            $_SESSION['id_san_pham'] = []; // Tạo mảng nếu chưa tồn tại
        }
    
        $current_time = time(); // Lấy thời gian hiện tại
        $shouldIncreaseView = true;
    
        // Kiểm tra nếu sản phẩm đã từng được xem
        if (isset($_SESSION['id_san_pham'][$id])) {
            $lastViewedTime = $_SESSION['id_san_pham'][$id];
            // Kiểm tra nếu thời gian click lại đủ lâu (ví dụ: 5 phút)
            if ($current_time - $lastViewedTime < 100) { // 100 giây = 5 phút
                $shouldIncreaseView = false;
            }
        }
    
        // Nếu cần tăng lượt xem
        if ($shouldIncreaseView) {
            $this->modelSanPham->tangluotxem($id); // Tăng lượt xem
            $_SESSION['id_san_pham'][$id] = $current_time; // Cập nhật thời gian xem sản phẩm
        }
    
        // Lấy chi tiết sản phẩm
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
    
        // Các thông tin khác
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
        $user = $this->modelTaiKhoan->getDetailTaiKhoan($_SESSION['user']['id']);
        $gioHang =  $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
        // var_dump($gioHang);die;
        if (!$gioHang) {
            $gioHangId = $this->modelGioHang->addGioHang($user['id']);
            $gioHang = ['id' => $gioHangId];
            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        } else {
            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
        }
        require_once './views/thanhToan.php';
    }
    public function logout()
    {
        require_once './views/logout.php';
    }
   public function addGioHang()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_SESSION['user'])) {
            $userId = $_SESSION['user']['id'];
            $gioHang = $this->modelGioHang->getGioHangFromUser($userId);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($userId);
                $gioHang = ['id' => $gioHangId];
            }
            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);

            $san_pham_id = $_POST['id_san_pham'];
            $so_luong = $_POST['so_luong'];

            // Lấy thông tin tồn kho từ model sản phẩm
            $sanPham = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $soLuongTonKho = $sanPham['so_luong_ton_kho'];

            // Tính tổng số lượng sản phẩm trong giỏ
            $tongSoLuongTrongGio = 0;
            foreach ($chiTietGioHang as $detail) {
                if ($detail['san_pham_id'] == $san_pham_id) {
                    $tongSoLuongTrongGio = $detail['so_luong'];
                    break;
                }
            }

            // Kiểm tra nếu thêm vượt quá tồn kho
            if (($tongSoLuongTrongGio + $so_luong) > $soLuongTonKho) {
                $_SESSION['error'] = "Đã quá số lượng tồn kho!";
                header("Location: " . BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' .$san_pham_id);
                exit();
            }

            // Thêm hoặc cập nhật số lượng sản phẩm trong giỏ hàng
            $checkSanPham = false;
            foreach ($chiTietGioHang as $detail) {
                if ($detail['san_pham_id'] == $san_pham_id) {
                    $newSoLuong = $detail['so_luong'] + $so_luong;
                    $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                    $checkSanPham = true;
                    break;
                }
            }
            if (!$checkSanPham) {
                $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
            }

            header("Location: " . BASE_URL . '?act=gio-hang');
            exit();
        } else {
            // Xử lý khi chưa đăng nhập
            header("Location: " . BASE_URL . "?act=login");
            exit();
        }
    }
}

    public function gioHang()
    {
        if (isset($_SESSION['user'])) {
            $userId = $_SESSION['user']['id'];
            // var_dump($userId);die;
            $gioHang = $this->modelGioHang->getGioHangFromUser($userId);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($userId);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }
            // var_dump($chiTietGioHang);die;
            require_once './views/gioHang.php';
        } else {
            // Xử lý khi chưa đăng nhập
            header("Location: " . BASE_URL_ADMIN . "?act=login-admin");
            exit();
        }
    }
    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy thông tin người dùng
            $user = $this->modelTaiKhoan->getDetailTaiKhoan($_SESSION['user']['id']);
            $nguoi_dung_id = $user['id'];
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $thanh_toan = $_POST['thanh_toan'];
            $phuong_thuc_thanh_toan = $_POST['phuong_thuc_thanh_toan'];
            $trang_thai_thanh_toan = 2;
            $ngay_dat = date('Y-m-d');
            $trang_thai_id = 1;
    
            // Tạo mã đơn hàng ngẫu nhiên
            $ma_don_hang = 'DH' . rand(1000, 99999);
    
            // Thêm đơn hàng vào cơ sở dữ liệu
            $donHang = $this->modelDonhang->addDonHang(
                $ma_don_hang,
                $ten_nguoi_nhan,
                $email_nguoi_nhan,
                $sdt_nguoi_nhan,
                $dia_chi_nguoi_nhan,
                $ngay_dat,
                $phuong_thuc_thanh_toan,
                $trang_thai_thanh_toan,
                $thanh_toan,
                $trang_thai_id,
                $ghi_chu,
                $nguoi_dung_id
            );
    
            // Lấy chi tiết giỏ hàng
            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
    
            // Duyệt qua từng sản phẩm trong giỏ hàng và thêm vào chi tiết đơn hàng
            foreach ($chiTietGioHang as $item) {
                // Thêm sản phẩm vào chi tiết đơn hàng
                $this->modelDonhang->addChiTietDonhang(
                    $donHang,
                    $item['san_pham_id'],
                    $item['so_luong'],
                    $phi_van_chuyen = 15000
                );
    
                // Giảm số lượng tồn kho của sản phẩm
                $this->modelSanPham->reduceStock($item['san_pham_id'], $item['so_luong']);
            }
    
            // Xóa giỏ hàng sau khi đơn hàng được tạo thành công
            $this->modelGioHang->xoaGioHang($gioHang['id']);
    
            // Hiển thị trang thành công
            require_once './views/thanhToanThanhCong.php';
        }
    }
    
    public function deleteFromCart()
    {
        header('Content-Type: application/json');

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user'])) {
            $userId = $_SESSION['user']['id'];
            $sanPhamId = isset($_POST['san_pham_id']) ? $_POST['san_pham_id'] : null;

            // Thêm log để debug
            error_log("Delete request - User ID: $userId, Product ID: $sanPhamId");
            error_log("Raw POST data: " . print_r($_POST, true));

            if (!$sanPhamId) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Không tìm thấy thông tin sản phẩm!'
                ]);
                exit();
            }

            $gioHang = $this->modelGioHang->getGioHangFromUser($userId);

            if ($gioHang) {
                error_log("Found cart - Cart ID: " . $gioHang['id']);

                $isDeleted = $this->modelGioHang->deleteCartItem($gioHang['id'], $sanPhamId);

                if ($isDeleted) {
                    echo json_encode([
                        'success' => true,
                        'message' => 'Sản phẩm đã được xóa khỏi giỏ hàng!'
                    ]);
                    exit();
                }
            }
        }

        echo json_encode([
            'success' => false,
            'message' => 'Không thể xóa sản phẩm, vui lòng thử lại!'
        ]);
        exit();
    }

    public function updateGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user'])) {
            $userId = $_SESSION['user']['id'];

            // Get the user's cart
            $gioHang = $this->modelGioHang->getGioHangFromUser($userId);

            if ($gioHang) {
                // Get quantities from POST data
                $quantities = $_POST['quantity'] ?? [];

                // Update quantities in the database
                $result = $this->modelGioHang->updateCartItemQuantities($gioHang['id'], $quantities);

                if ($result) {
                    // Nếu số lượng tồn kho còn thì sẽ  hiển thị cập nhật thành công
                    $_SESSION['success_message'] = 'Cập nhật số lượng thành công!';
                    header("Location: " . BASE_URL . '?act=gio-hang');
                    exit();
                } else {
                    // Nếu số lượng tồn kho hết thì sẽ thì sẽ cập nhật không thành công
                    $_SESSION['error_message'] = 'Đã vượt quá số lượng   trong kho.';
                    header("Location: " . BASE_URL . '?act=gio-hang');
                    exit();
                }
            }
        }

        // If no user or invalid request
        header("Location: " . BASE_URL . '?act=login');
        exit();
    }
    
}
