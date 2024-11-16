<?php
class KhuyenMaiController
{
    // ket noi den file modle
    public $modelKhuyenMai;
    public function __construct()
    {
        $this->modelKhuyenMai = new KhuyenMai();
    }
    // hien thi danh
    public function index()
    {
        // lay ra du lieu tin tuc
        $khuyenMais = $this->modelKhuyenMai->getAll();
        // var_dump($tinTucs);
        // dua du lieu ra view
        require_once './views/khuyenmai/list_khuyen_mai.php';
    }
    
    // them tin tuc
    public function create()
    {
        require_once './views/khuyenmai/add_khuyen_mai.php';
    }
    // xu ly them tin tuc
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
            $ma_khuyen_mai = $_POST['ma_khuyen_mai'];
            $gia_tri = $_POST['gia_tri'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $mo_ta = $_POST['mo_ta'];
            $trang_thai = $_POST['trang_thai'];
            $errors = [];
            if (empty($ten_khuyen_mai)) {
                $errors['ten_khuyen_mai'] = 'Vui lòng nhập tên khuyễn mãi!';
            }
            if (empty($ma_khuyen_mai)) {
                $errors['ma_khuyen_mai'] = 'Vui lòng nhập mã khuyễn mãi!';
            }
            if (empty($gia_tri)) {
                $errors['gia_tri'] = 'Vui lòng nhập giá trị!';
            }
            if (empty($ngay_bat_dau)) {
                $errors['ngay_bat_dau'] = 'Vui lòng nhập ngày bắt đầu!';
            }
            if (empty($ngay_ket_thuc)) {
                $errors['ngay_ket_thuc'] = 'Vui lòng nhập ngày kết thúc!';
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Vui lòng nhập mô tả!';
            }
            if (empty($errors)) {
                $this->modelKhuyenMai->postData($ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai);
                unset($_SESSION['errors']);
                header('Location:?act=khuyen-mai');
            } else {
                $_SESSION['errors'] = $errors;
                header('Location:?act=form-them-khuyen-mai');
                exit();
            }
        }
    }
    
    // hien thi form sua
    public function edit() {
        // lay id
        $id = $_GET['id'];
        // lay thong tin chi tiet cua danh muc
        $khuyenMai = $this->modelKhuyenMai->getDetailData($id);
        require_once './views/khuyenmai/sua_khuyen_mai.php';
    }
    
    // cap nhat du lieu vao CSDL
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
            $ma_khuyen_mai = $_POST['ma_khuyen_mai'];
            $gia_tri = $_POST['gia_tri'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $mo_ta = $_POST['mo_ta'];
            $trang_thai = $_POST['trang_thai'];
            $errors = [];
            if (empty($ten_khuyen_mai)) {
                $errors['ten_khuyen_mai'] = 'Vui lòng nhập tên khuyễn mãi!';
            }
            if (empty($ma_khuyen_mai)) {
                $errors['ma_khuyen_mai'] = 'Vui lòng nhập mã khuyễn mãi!';
            }
            if (empty($gia_tri)) {
                $errors['gia_tri'] = 'Vui lòng nhập giá trị!';
            }
            if (empty($ngay_bat_dau)) {
                $errors['ngay_bat_dau'] = 'Vui lòng nhập ngày bắt đầu!';
            }
            if (empty($ngay_ket_thuc)) {
                $errors['ngay_ket_thuc'] = 'Vui lòng nhập ngày kết thúc!';
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Vui lòng nhập mô tả!';
            }
            if (empty($errors)) {
                $this->modelKhuyenMai->updateData($id,$ten_khuyen_mai,$ma_khuyen_mai,$gia_tri,$ngay_bat_dau,$ngay_ket_thuc,$mo_ta,$trang_thai);
                unset($_SESSION['errors']);
                header('Location:?act=khuyen-mai');
            } else {
                $_SESSION['errors'] = $errors;
                header('Location:?act=form-them-khuyen-mai');
                exit();
            }
        }
    }

    // xoa tin tuc khoi csdl
    public function destroy() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            // var_dump($id);
            $this->modelKhuyenMai->deleteData($id);
            header('Location:?act=khuyen-mai');
            exit();
            
        }
    }
}

