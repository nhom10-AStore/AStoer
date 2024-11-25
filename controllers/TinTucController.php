<?php
class TinTucController
{
    // ket noi den file modle
    public $modelTinTuc;
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelTinTuc = new TinTuc();
        $this->modelDanhMuc = new DanhMuc();
    }
    // hien thi danh
    public function index()
    {
        // lay ra du lieu tin tuc
        $tinTucs = $this->modelTinTuc->getAll();
        $listDanhMuc = $this->modelDanhMuc->danhSachDanhMuc();
        // var_dump($tinTucs);
        // dua du lieu ra view
        require_once './views/tintuc.php';
    }
    public function detail()
    {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
            // lấy thông tin chi tiết bài viết
            $tinTuc = $this->modelTinTuc->getDetail($id);
            $listDanhMuc = $this->modelDanhMuc->danhSachDanhMuc();
            if ($tinTuc) {
                // đưa dữ liệu ra view
                require_once './views/detailTinTuc.php';
            } else {
                // nếu không tìm thấy bài viết
                echo "Bài viết không tồn tại!";
            }
        } else {
            echo "ID không hợp lệ!";
        }
    }
    
}
