<?php
class TinTucController
{
    // ket noi den file modle
    public $modelTinTuc;
    public function __construct()
    {
        $this->modelTinTuc = new TinTuc();
    }
    // hien thi danh
    public function index()
    {
        // lay ra du lieu tin tuc
        $tinTucs = $this->modelTinTuc->getAll();
        // var_dump($tinTucs);
        // dua du lieu ra view
        require_once './views/tintuc/list_tin_tuc.php';
    }
    // them tin tuc
    public function create()
    {
        // echo "chao ba con";
        require_once './views/tintuc/add_tin_tuc.php';
    }
    // xu ly them tin tuc
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tieu_de_bai_viet = $_POST['tieu_de_bai_viet'];
            $noi_dung_bai_viet = $_POST['noi_dung_bai_viet'];
            $trang_thai_bai_viet = $_POST['trang_thai_bai_viet'];
            // var_dump($ten_bai_viet);
            // var_dump($noi_dung_bai_viet);
            // var_dump($trang_thai_bai_viet);
            $errors = [];
            if (empty($tieu_de_bai_viet)) {
                $errors['tieu_de_bai_viet'] = 'Vui lòng nhập tiêu đề bài viết!';
            }
            if (empty($noi_dung_bai_viet)) {
                $errors['noi_dung_bai_viet'] = 'Vui lòng thêm nội đung bài viết!';
            }
            if (empty($trang_thai_bai_viet)) {
                $errors['trang_thai_bai_viet'] = 'Vui lòng chọn trạng thái bài!';
            }
            if (empty($errors)) {
                $this->modelTinTuc->postData($tieu_de_bai_viet,  $noi_dung_bai_viet, $trang_thai_bai_viet);
                unset($_SESSION['errors']);
                header('Location:'.BASE_URL_ADMIN.'?act=tin-tucs');
            } else {
                $_SESSION['errors'] = $errors;
                header('Location:'.BASE_URL_ADMIN.'?act=form-them-tin-tuc');
                exit();
            }
        }
    }
    // hien thi form sua
    public function edit() {
        // lay id
        $id = $_GET['id'];
        // lay thong tin chi tiet cua danh muc
        $tinTuc = $this->modelTinTuc->getDetailData($id);
        // var_dump($tinTuc);
        // do  du lieu ra form
        require_once './views/tintuc/sua-tin-tuc.php';
    }
    // cap nhat du lieu vao CSDL
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $tieu_de_bai_viet = $_POST['tieu_de_bai_viet'];
            $noi_dung_bai_viet = $_POST['noi_dung_bai_viet'];
            $trang_thai_bai_viet = $_POST['trang_thai_bai_viet'];
            // var_dump($ten_bai_viet);
            // var_dump($noi_dung_bai_viet);
            // var_dump($trang_thai_bai_viet);
            $errors = [];
            if (empty($tieu_de_bai_viet)) {
                $errors['tieu_de_bai_viet'] = 'Vui lòng nhập tiêu đề bài viết!';
            }
            if (empty($noi_dung_bai_viet)) {
                $errors['noi_dung_bai_viet'] = 'Vui lòng thêm nội đung bài viết!';
            }
            if (empty($trang_thai_bai_viet)) {
                $errors['trang_thai_bai_viet'] = 'Vui lòng chọn trạng thái bài!';
            }
            if (empty($errors)) {
                $this->modelTinTuc->updateData($id,$tieu_de_bai_viet,  $noi_dung_bai_viet, $trang_thai_bai_viet);
                unset($_SESSION['errors']);
                header('Location:?act=tin-tucs');
            } else {
                $_SESSION['errors'] = $errors;
                header('Location:'.BASE_URL_ADMIN.'?act=form-them-tin-tuc');
                exit();
            }
        }
    }
    // xoa tin tuc khoi csdl
    public function destroy() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            // var_dump($id);
            $this->modelTinTuc->deleteData($id);
            header('Location:'.BASE_URL_ADMIN.'?act=tin-tucs');
            exit();
            
        }
    }
}
