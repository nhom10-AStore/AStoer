<?php
class KhuyenMai
{
    public $conn;
    // ket noi db
    public function __construct()
    {

        $this->conn = connectDB();
    }

    // danh sach tin tuc
    public function getAll()
    {
        try {
            $sql = 'SELECT * FROM khuyen_mais';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Error:' . $e->getMessage();
        }
    }
    // them du lieu vao csdl

    public function postData($ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai)
    {
        try {
            $sql = 'INSERT INTO `khuyen_mais` (ten_khuyen_mai,ma_khuyen_mai,gia_tri,ngay_bat_dau,ngay_ket_thuc,mo_ta,trang_thai) 
                    VALUES (:ten_khuyen_mai,:ma_khuyen_mai,:gia_tri,:ngay_bat_dau,:ngay_ket_thuc,:mo_ta,:trang_thai);';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ten_khuyen_mai', $ten_khuyen_mai);
            $stmt->bindParam(':ma_khuyen_mai', $ma_khuyen_mai);
            $stmt->bindParam(':gia_tri', $gia_tri);
            $stmt->bindParam(':ngay_bat_dau', $ngay_bat_dau);
            $stmt->bindParam(':ngay_ket_thuc', $ngay_ket_thuc);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error:' . $e->getMessage();
        }
    }

    // xoa bai viet
    public function deleteData($id)
    {
        try {
            $sql = 'DELETE FROM khuyen_mais WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error:' . $e->getMessage();
        }
    }

    // Hien thong tin sua
    public function getDetailData($id)
    {
        try {
            $sql = 'SELECT * FROM khuyen_mais WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Error:' . $e->getMessage();
        }
    }

    // xu ly update
    public function updateData($id, $ten_khuyen_mai, $ma_khuyen_mai, $gia_tri, $ngay_bat_dau, $ngay_ket_thuc, $mo_ta, $trang_thai)
    {
        try {
            $sql = 'UPDATE khuyen_mais SET ten_khuyen_mai = :ten_khuyen_mai, ma_khuyen_mai = :ma_khuyen_mai, gia_tri = :gia_tri, 
                    ngay_bat_dau = :ngay_bat_dau, ngay_ket_thuc = :ngay_ket_thuc, mo_ta = :mo_ta, trang_thai = :trang_thai 
                    WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_khuyen_mai', $ten_khuyen_mai);
            $stmt->bindParam(':ma_khuyen_mai', $ma_khuyen_mai);
            $stmt->bindParam(':gia_tri', $gia_tri);
            $stmt->bindParam(':ngay_bat_dau', $ngay_bat_dau);
            $stmt->bindParam(':ngay_ket_thuc', $ngay_ket_thuc);
            $stmt->bindParam(':mo_ta', $mo_ta);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function getListSpDonHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_don_hangs.*, san_phams.ten_san_pham
                    FROM chi_tiet_don_hangs 
                    INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
                    WHERE chi_tiet_don_hangs.don_hang_id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi " . $e->getMessage();
        }
    }
    public function getAllTrangThaiDonHang()
    {
        try {
            $sql = 'SELECT * FROM trang_thai_don_hang';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }



    // huy ket noi csdl
    public function __destruct()
    {
        $this->conn = null;
    }
}
