<?php
class SanPhamController
{

    public $modelSanPham;
    public $modelDanhMuc;
    public $modelBinhLuan;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelDanhMuc = new DanhMuc();
        $this->modelBinhLuan = new BinhLuan();
    }

    public function listSanPham()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        // var_dump($listQuanTri);

        require_once './views/sanpham/listsanpham.php';
    }

    public function formaddSanPham()
    {

        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/sanpham/formthemsanpham.php';
        deleteSessionError();
    }

    public function postAddSanPham()
    {
        //hàm này dùng để xử lý thêm dữ liệu
        // kiểm tra xem dữ liệu có phải đc subimt lên ko
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            $ma_san_pham = $_POST['ma_san_pham'] ?? '';
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            // $anh_san_pham = $_POST['anh_san_pham'] ?? '' ;   
            $luot_xem = $_POST['luot_xem'] ?? '';

            $gia_nhap = $_POST['gia_nhap'] ?? '';

            $gia_ban = $_POST['gia_ban'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $so_luong_ton_kho = $_POST['so_luong_ton_kho'] ?? '';
            $thong_so = $_POST['thong_so'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $mo_ta_chi_tiet = $_POST['mo_ta_chi_tiet'] ?? '';

            $anh_san_pham = $_FILES['anh_san_pham'] ?? null;

            // var_dump($ma_san_pham);
            // die();


            // lưu hình ảnh vào 
            $file_thumb = uploadFile($anh_san_pham, './admin/uploads/');


            // mảng hình ảnh
            $img_array = $_FILES['img_array'];


            // tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($ma_san_pham)) {
                $errors['ma_san_pham'] = 'Ma sản phẩm không được để trống';
            }
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_ban)) {
                $errors['gia_ban'] = 'Gia ban không được để trống';
            }
            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'Gia ban không được để trống';
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Mo ta không được để trống';
            }

            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng sản phẩm không được để trống';
            }
            if (empty($so_luong_ton_kho)) {
                $errors['so_luong_ton_kho'] = 'Số lượng sản phẩm không được để trống';
            }
            if (empty($thong_so)) {
                $errors['thong_so'] = 'Thông số sản phẩm không được để trống';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh mục sản phẩm phải chọn';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái sản phẩm phải chọn';
            }

            if ($anh_san_pham['error'] !== 0) {
                $errors['anh_san_pham'] = 'Phải chọn ảnh sản phẩm';
            }
            // var_dump($gia_khuyen_mai);
            // die();

            $_SESSION['errors'] = $errors;


            // nếu ko có lỗi thì tiến hành thêm sản phẩm
            if (empty($errors)) {
                // nếu ko có lỗi thì tiến hàng thêm sản phẩm
                // var_dump('ok');

                $san_pham_id = $this->modelSanPham->insertSanPham(
                    $ma_san_pham,
                    $ten_san_pham,
                    $luot_xem,
                    $gia_nhap,
                    $gia_ban,
                    $gia_khuyen_mai,
                    $so_luong,
                    $so_luong_ton_kho,
                    $thong_so,
                    $ngay_nhap,
                    $danh_muc_id,
                    $trang_thai,
                    $mo_ta,
                    $mo_ta_chi_tiet,
                    $file_thumb
                );
                // var_dump($san_pham_id);die();
                // xử lý thêm album ảnh sản phẩm img_array
                if (!empty($img_array['name'])) {
                    foreach ($img_array['name'] as $key => $value) {
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key],
                        ];

                        $link_hinh_anh = uploadFile($file, './admin/uploads/');
                        $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
                    }
                }


                header('location: ?act=san_phams');
                exit();
            } else {
                //Trả về form và lỗi 
                // Đặt chỉ thị xóa section sau khi hiển thị form
                $_SESSION['flash'] = true;

                header('location: ?act=form-them-san-pham');
                exit();
            }
        }
    }

    public function formEditSanPham()
    {
        //hàm này dùng để hiện thi form nhập
        // lấy ra thông tin của sản phẩm cần sủa
        $id = $_GET['id_san_pham'];
        $SanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        if ($SanPham) {
            require_once './views/sanpham/editsanpham.php';
            // deleteSessionError();
        } else {
            header('location: ?act=san_phams');
            exit();
        }
    }


    public function postEditSanPham()
    {
        //hàm này dùng để xử lý thêm dữ liệu


        // kiểm tra xem dữ liệu có phải đc subimt lên ko
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $old_file = $sanPhamOld['anh_san_pham'];
            $ma_san_pham = $_POST['ma_san_pham'] ?? '';
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_nhap = $_POST['gia_nhap'] ?? '';
            $gia_ban = $_POST['gia_ban'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $so_luong_ton_kho = $_POST['so_luong_ton_kho'] ?? '';
            $thong_so = $_POST['thong_so'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';
            $mo_ta_chi_tiet = $_POST['mo_ta_chi_tiet'] ?? '';

            $anh_san_pham = $_FILES['anh_san_pham'] ?? NULL;



            // tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($ma_san_pham)) {
                $errors['ma_san_pham'] = 'Ma sản phẩm không được để trống';
            }
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($gia_ban)) {
                $errors['gia_ban'] = 'Gia ban không được để trống';
            }
            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'Gia ban không được để trống';
            }
            if (empty($mo_ta)) {
                $errors['mo_ta'] = 'Mo ta không được để trống';
            }

            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng sản phẩm không được để trống';
            }
            if (empty($so_luong_ton_kho)) {
                $errors['so_luong_ton_kho'] = 'Số lượng sản phẩm không được để trống';
            }
            if (empty($thong_so)) {
                $errors['thong_so'] = 'Thông số sản phẩm không được để trống';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập sản phẩm không được để trống';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh mục sản phẩm phải chọn';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái sản phẩm phải chọn';
            }

            if ($anh_san_pham['error'] !== 0) {
                $errors['anh_san_pham'] = 'Phải chọn ảnh sản phẩm';
            }
            // var_dump($gia_khuyen_mai);
            // die();
            $_SESSION['errors'] = $errors;


            // logic sửa ảnh 
            if (isset($anh_san_pham) && $anh_san_pham['error'] == UPLOAD_ERR_OK) {
                // upload ảnh mới lên
                $new_file = uploadFile($anh_san_pham, './admin/uploads/');

                // if (!empty($old_file)) {   // Nếu có ảnh cũ thì xóa đi
                //     deleteFile($old_file);
                // }
            } else {
                $new_file = $old_file;
               
            }


            // nếu ko có lỗi thì tiến hành thêm sản phẩm
            if (empty($errors)) {
                // var_dump('abc'); die;

                $san_pham_id = $this->modelSanPham->updateSanPham(
                    $san_pham_id,
                    $ma_san_pham,
                    $ten_san_pham,
                    $gia_nhap,
                    $gia_ban,
                    $gia_khuyen_mai,
                    $so_luong,
                    $so_luong_ton_kho,
                    $thong_so,
                    $ngay_nhap,
                    $danh_muc_id,
                    $trang_thai,
                    $mo_ta,
                    $mo_ta_chi_tiet,
                    $new_file
                );


                header("Location: " . BASE_URL_ADMIN . '?act=san_phams');
                exit();
            } else {
                //Trả về form và lỗi 
                // Đặt chỉ thị xóa section sau khi hiển thị form
                $_SESSION['flash'] = true;

                header('location: ?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
                exit();
            }
        }
    }
    public function postEditAnhSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);
            $img_array = $_FILES['img_array'];
            $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
            $current_img_ids = $_POST['current_img_ids'] ?? [];
    
            $upload_file = [];
            foreach ($img_array['name'] as $key => $value) {
                if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
                    $new_file = uploadFileAlbum($img_array, './uploads/', $key);
                    if ($new_file) {
                        $upload_file[] = [
                            'id' => $current_img_ids[$key] ?? null,
                            'file' => $new_file
                        ];
                    }
                }
            }
    
            foreach ($upload_file as $file_info) {
                if ($file_info['id']) {
                    $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];
                    $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);
                    deleteFile($old_file);
                } else {
                    $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
                }
            }
    
            foreach ($listAnhSanPhamCurrent as $anhSP) {
                $anh_id = $anhSP['id'];
                if (in_array($anh_id, $img_delete)) {
                    $this->modelSanPham->destroyAnhSanPham($anh_id);
                    deleteFile($anhSP['link_hinh_anh']);
                }
            }
            // var_dump( $anhSP);die;
            header("Location:". BASE_URL_ADMIN.'?act=form-sua-san-pham&id_san_pham='.$san_pham_id);
            // require_once './views/sanpham/listsanpham.php';
            exit();
        }
    }
    
    

    public function deleteSanPham()
    {
        $id = $_GET['id_san_pham'];
        $SanPham = $this->modelSanPham->getDetailSanPham($id);

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);


        if ($SanPham) {
            deleteFile($SanPham['hinh_anh']);
            $this->modelSanPham->destroySanPham($id);
        }
        if ($listAnhSanPham) {
            foreach ($listAnhSanPham as $key => $anhSP) {
                deleteFile($anhSP['link_hinh_anh']);
                $this->modelSanPham->destroyAnhSanPham($anhSP['id']);
            }
        }

        header('location: ?act=san_phams');
        exit();
    }

    public function detailSanPham()
    {
        // Lấy ID sản phẩm từ URL
        $id = $_GET['id_san_pham'];

        // Lấy thông tin chi tiết sản phẩm
        $SanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

        // Lấy danh sách bình luận
        $listBinhLuan = $this->modelBinhLuan->getAllBinhLuan($id);
        $danhGias = $this->modelSanPham->getAllDanhGiaBySanPhamId($id);

        // Nếu sản phẩm tồn tại, hiển thị view
        if ($SanPham) {
            require_once './views/sanpham/detailSanPham.php';
        } else {
            header('location: ?act=san_phams');
            exit();
        }
    }
    public function formPhanHoi()
    {
        // lay id 
        $id = $_GET['danh_gia_id'];
        // lay thong tin chi tiet danh muc
        $danhGias = $this->modelSanPham->getDetaiDanhGia($id);
        // var_dump($danhMucs);
        // do du lieu ra form
        require_once './views/sanpham/phanhoidanhgia.php';
    }
    public function updateDanhGia()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            # lay ra du lieu
            $id = $_POST['id'];
            $tra_loi = $_POST['tra_loi'];
            // var_dump($trang_thai);
            // validate
            $errors = [];
            if (empty($tra_loi)) {
                $errors['tra_loi'] = 'Phản hồi đánh giá';
            }
            // them du lieu
            if (empty($errors)) {
                # neu k co loi thi them du lieu
                // Them vao CSDL
                $this->modelSanPham->updateDG($id, $tra_loi);
                unset($_SESSION['errors']);
                header('Location: ?act=chi_tiet_san_pham');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-phanhoi');
            }
        }
    }
}
