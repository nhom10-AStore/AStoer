<?php
    class DanhMucController
    {
        // hiển thị danh sách
        // Ket noi den model
        public $modelDanhMuc;
        public function __construct()
        {
            $this->modelDanhMuc = new DanhMuc();
        }
        public function index(){
            // lay ra du lieu danh muc
            $danhMucs = $this->modelDanhMuc->getAllDanhMuc();
            // var_dump($danhMucs);

            // Dua du lieu ra view
            require_once './views/danhmuc/list-danh-muc.php';
        }

        //hiển thị form thêm
        public function create(){
            require_once './views/danhmuc/create_danh_muc.php';
        }

        // hàm sử lý thêm vào CSDl
        public function store(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                # lay ra du lieu
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $trang_thai = $_POST['trang_thai'];
                // var_dump($trang_thai);
                // validate
                $errors = [];
                if (empty($ten_danh_muc)) {
                    $errors ['ten_danh_muc'] = 'Nhap ten danh muc';
                }
                if (empty($trang_thai)) {
                    $errors  ['trang_thai'] = 'trang_thai';
                }
                // them du lieu
                if (empty($errors)) {
                    # neu k co loi thi them du lieu
                    // Them vao CSDL
                    $this->modelDanhMuc->postData($ten_danh_muc, $trang_thai);
                    unset($_SESSION['errors']);
                    header('Location: ?act=danh-mucs');
                    exit();
                }else{
                    $_SESSION['errors'] = $errors;
                    header('Location: ?act=form-them-danh-muc');
                }
            }
        }
        // hàm hiển thị form sửa
        public function edit(){
            // lay id 
            $id = $_GET['danh_muc_id'];
            // lay thong tin chi tiet danh muc
            $danhMucs = $this->modelDanhMuc->getDetaiData($id);
            // var_dump($danhMucs);
            // do du lieu ra form
            require_once './views/danhmuc/edit_danh_muc.php';

        }
        // hàm xử lý cập nhật dữ liệu vào CSDL
        public function update(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                # lay ra du lieu
                $id = $_POST['id'];
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $trang_thai = $_POST['trang_thai'];
                // var_dump($trang_thai);
                // validate
                $errors = [];
                if (empty($ten_danh_muc)) {
                    $errors ['ten_danh_muc'] = 'Xin vui lòng nhập tên danh mục';
                }
                if (empty($trang_thai)) {
                    $errors  ['trang_thai'] = 'Xin vui lòng chọn trạng thái';
                }
                // them du lieu
                if (empty($errors)) {
                    # neu k co loi thi them du lieu
                    // Them vao CSDL
                    $this->modelDanhMuc->updateData($id, $ten_danh_muc, $trang_thai);
                    unset($_SESSION['errors']);
                    header('Location: ?act=danh-mucs');
                    exit();
                }else{
                    $_SESSION['errors'] = $errors;
                    header('Location: ?act=form-sua-danh-muc');
                }
            }
        }
        // hàm xóa dữ liệu tring CSDL
        public function destroy(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id = $_POST['danh_muc_id'];
                // var_dump($id);
                // xoa danh muc
                $this->modelDanhMuc->deleteData($id);
                header('Location: ?act=danh-mucs');
                exit();
            }
        }
    }
?>