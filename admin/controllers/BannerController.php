<?php
class BannerController
{
    // Kết nối đến model Banner
    public $modelBanner;

    public function __construct()
    {
        $this->modelBanner = new Banner();
    }

    // Hiển thị danh sách banner
    public function index(){
        // Lấy ra dữ liệu banner
        $banners = $this->modelBanner->getAll();

        // Đưa dữ liệu ra view
        require_once './views/Banner/list-banner.php';
    }

    // Hiển thị form thêm banner
    public function create(){
        require_once './views/Banner/create_banner.php';
    }

    // Xử lý thêm banner vào CSDL
    public function store(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $ten_banner = $_FILES['ten_banner'];
            $trang_thai = $_POST['trang_thai'];
    
            // Định nghĩa thư mục upload
            $upload_dir = 'uploads/';
            $file_path = $upload_dir . basename($ten_banner['name']);
    
            // Di chuyển file vào thư mục uploads
            move_uploaded_file($ten_banner['tmp_name'], $file_path);
    
            // Lưu đường dẫn file ảnh vào cột 'ten_banner' trong CSDL
            $this->modelBanner->postData($file_path, $trang_thai);
    
            header('Location: ?act=banners');
            exit();
        }
    }

    // Hiển thị form sửa banner
    public function edit(){
        // Lấy id banner
        $id = $_GET['id'];

        // Lấy thông tin chi tiết banner
        $banners = $this->modelBanner->getDetailData($id);

        // Đưa dữ liệu ra form sửa
        require_once './views/Banner/edit_banner.php';
    }

    // Xử lý cập nhật dữ liệu banner vào CSDL
    public function update(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy dữ liệu
            $id = $_POST['id'];
            $trang_thai = $_POST['trang_thai'];
            $ten_banner = $_FILES['ten_banner'];
    
            // Định nghĩa thư mục upload
            $upload_dir = 'uploads/';
            $file_path = $upload_dir . basename($ten_banner['name']);
    
            // Di chuyển file vào thư mục uploads nếu có file mới
            if (!empty($ten_banner['name'])) {
                move_uploaded_file($ten_banner['tmp_name'], $file_path);
                $this->modelBanner->updateData($id, $file_path, $trang_thai);
            } else {
                // Trường hợp không thay đổi ảnh
                $this->modelBanner->updateData($id, null, $trang_thai);
            }
    
            header('Location: ?act=banners');
            exit();
        }
    }

    // Xóa banner trong CSDL
    public function destroy(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];

            // Xóa banner
            $this->modelBanner->deleteData($id);
            header('Location: ?act=banners');
            exit();
        }
    }
}
?>
