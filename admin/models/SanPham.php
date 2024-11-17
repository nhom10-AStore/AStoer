<?php

class SanPham
{
    public $conn;

    //kết nối CSDL

    public function __construct()
    {
        $this->conn = connectDB();
    }

    //Danh sách danh mục
    public function getAllSanPham()
    {
        try {

            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
            FROM san_phams
            INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            
            ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return  $stmt->fetchAll();
        } catch (PDOexception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    public function insertSanPham($ma_san_pham, $ten_san_pham, $luot_xem, $gia_nhap, $gia_ban, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $mo_ta_chi_tiet, $anh_san_pham)
    {
        try {
            // var_dump($ma_san_pham,$ten_san_pham,$luot_xem, $gia_nhap,$gia_ban,$gia_khuyen_mai,$so_luong, $ngay_nhap,$danh_muc_id,$trang_thai, $mo_ta,$mo_ta_chi_tiet,$anh_san_pham);
            // die();

            $sql = 'INSERT INTO san_phams (ma_san_pham,ten_san_pham,luot_xem, gia_nhap,gia_ban,gia_khuyen_mai,so_luong, ngay_nhap,danh_muc_id,trang_thai, mo_ta,mo_ta_chi_tiet,anh_san_pham)
            VALUES (:ma_san_pham,:ten_san_pham,:luot_xem, :gia_nhap,:gia_ban,:gia_khuyen_mai,:so_luong,:ngay_nhap,:danh_muc_id,:trang_thai,:mo_ta,:mo_ta_chi_tiet,:anh_san_pham)';

            $stmt = $this->conn->prepare($sql);

            //gán gtri vào các tham số
            $stmt->bindParam(':ma_san_pham', $ma_san_pham);
            $stmt->bindParam(':ten_san_pham', $ten_san_pham);
            $stmt->bindParam(':luot_xem', $luot_xem);
            $stmt->bindParam(':gia_nhap', $gia_nhap);
            $stmt->bindParam(':gia_ban', $gia_ban);
            $stmt->bindParam(':gia_khuyen_mai', $gia_khuyen_mai);
            $stmt->bindParam(':gia_khuyen_mai', $gia_khuyen_mai);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->bindParam(':ngay_nhap', $ngay_nhap);
            $stmt->bindParam(':danh_muc_id', $danh_muc_id);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':mo_ta_chi_tiet', $mo_ta_chi_tiet);
            $stmt->bindParam(':anh_san_pham', $anh_san_pham);
            $stmt->execute();

            return $this->conn->lastInsertId();
        } catch (PDOexception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    public function getDetailSanPham($id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc
                FROM san_phams
                INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                
                WHERE san_phams.id = :id ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function getListAnhSanPham($id)
    {
        try {
            $sql = 'SELECT * FROM  hinh_anh_san_phams WHERE san_pham_id = :id ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function updateSanPham(
        $san_pham_id,
        $ma_san_pham,
        $ten_san_pham,
        $gia_nhap,
        $gia_ban,
        $gia_khuyen_mai,
        $so_luong,
        $ngay_nhap,
        $danh_muc_id,
        $trang_thai,
        $mo_ta,
        $mo_ta_chi_tiet,
        $anh_san_pham
    ) {
        try {
            // var_dump($ma_san_pham,$ten_san_pham,$luot_xem, $gia_nhap,$gia_ban,$gia_khuyen_mai,$so_luong, $ngay_nhap,$danh_muc_id,$trang_thai, $mo_ta,$mo_ta_chi_tiet,$anh_san_pham);
            // die();

            $sql = 'UPDATE san_phams SET ma_san_pham =:ma_san_pham ,ten_san_pham = :ten_san_pham, gia_nhap= :gia_nhap,
                gia_ban = :gia_ban,gia_khuyen_mai = :gia_khuyen_mai,so_luong = :so_luong, ngay_nhap = :ngay_nhap,
                danh_muc_id = :danh_muc_id,trang_thai = :trang_thai, mo_ta = :mo_ta,mo_ta_chi_tiet = :mo_ta_chi_tiet,anh_san_pham = :anh_san_pham
                WHERE id= :id';

            $stmt = $this->conn->prepare($sql);

            //gán gtri vào các tham số
            $stmt->bindParam(':id', $san_pham_id);
            $stmt->bindParam(':ma_san_pham', $ma_san_pham);
            $stmt->bindParam(':ten_san_pham', $ten_san_pham);

            $stmt->bindParam(':gia_nhap', $gia_nhap);
            $stmt->bindParam(':gia_ban', $gia_ban);

            $stmt->bindParam(':gia_khuyen_mai', $gia_khuyen_mai);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->bindParam(':ngay_nhap', $ngay_nhap);
            $stmt->bindParam(':danh_muc_id', $danh_muc_id);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':mo_ta_chi_tiet', $mo_ta_chi_tiet);
            $stmt->bindParam(':anh_san_pham', $anh_san_pham);
            $stmt->execute();

            return true;
        } catch (PDOexception $e) {
            echo 'lỗi: ' . $e->getMessage();
        }
    }
    public function updateAnhSanPham($id, $new_file)
    {
        try {
            $sql = "UPDATE hinh_anh_san_phams SET link_hinh_anh = :new_file WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':new_file' => $new_file,
                    ':id' => $id
                ]
            );
            return true;
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }
    public function insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh)
    {
        try {
            $sql = 'INSERT INTO hinh_anh_san_phams (san_pham_id, link_hinh_anh)
                        VALUES ( :san_pham_id, :link_hinh_anh)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':link_hinh_anh' => $link_hinh_anh,
            ]);

            // lấy id sản phẩm vừa thêm
            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function getDetailAnhSanPham($id)
    {
        try {
            $sql = 'SELECT * FROM hinh_anh_san_phams WHERE id = :id ';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':id' => $id]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }


    public function destroyAnhSanPham($id)
    {
        try {
            $sql = ' DELETE FROM `hinh_anh_san_phams` WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    public function destroySanPham($id)
    {
        try {
            $sql = ' DELETE FROM `san_phams` WHERE id = :id';

            $stmt = $this->conn->prepare($sql);


            $stmt->execute([
                ':id' => $id
            ]);

            return true;
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getDetailBinhLuan()
    {
        try {
            $sql = 'SELECT * FROM binh_luans';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return  $stmt->fetchAll();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi " . $e->getMessage();
        }
    }
    public function getAllDanhGiaBySanPhamId($san_pham_id)
    {
        try {
            $sql = 'SELECT danh_gias.*, tai_khoans.ho_ten 
                FROM danh_gias 
                JOIN tai_khoans ON danh_gias.nguoi_dung_id = tai_khoans.id 
                WHERE danh_gias.san_pham_id = :san_pham_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':san_pham_id', $san_pham_id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Thất bại: " . $e->getMessage();
        }
    }
    public function getDetaiDanhGia($id)
    {
        try {
            //code...
            $sql = 'SELECT *  FROM danh_gias WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return  $stmt->fetch();
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();
        }
    }

    public function updateDG($id, $tra_loi)
    {
        try {
            //code...
            $sql = 'UPDATE `danh_gias` SET tra_loi= :tra_loi WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            // Gan gtri vao cac tham so
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':tra_loi', $tra_loi);
            $stmt->execute();
            return  true;
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();
        }
    }
}
