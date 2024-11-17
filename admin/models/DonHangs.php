<?php
class DonHang
{
    public $conn;

    // ket noi CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }

    //  Danh sach san pham
    // public function getAllKhoaNgoai(){
    //     try {
    //         $sql = 'SELECT  don_hangs.*, danh_mucs.ten_danh_muc
    //         FROM don_hangs
    //         INNER JOIN danh_mucs ON  don_hangs.danh_muc_id = danh_mucs.id
    //         ';
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute();
    //         return  $stmt->fetchAll();
    //     } catch (PDOException $e) {
    //         echo "Kết Nối Thất bại" . $e->getMessage();            }
    // }

    public function getAll()
    {
        try {
            // SQL query với JOIN để lấy tên tài khoản từ bảng tai_khoans, mã khuyến mãi từ bảng khuyen_mais, tên phương thức thanh toán và tên trạng thái từ bảng trang_thai_don_hangs
            $sql = 'SELECT don_hangs.*, tai_khoans.ho_ten, khuyen_mais.ma_khuyen_mai, phuong_thuc_thanh_toans.ten_phuong_thuc, trang_thai_don_hang.ten_trang_thai 
                FROM don_hangs 
                INNER JOIN tai_khoans ON don_hangs.nguoi_dung_id = tai_khoans.id
                LEFT JOIN khuyen_mais ON don_hangs.khuyen_mai_id = khuyen_mais.id
                LEFT JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan = phuong_thuc_thanh_toans.id
                LEFT JOIN trang_thai_don_hang ON don_hangs.trang_thai_id = trang_thai_don_hang.id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Kết Nối Thất bại: " . $e->getMessage();
        }
    }
    public function getDetailData($id)
    {
        try {
            $sql = 'SELECT don_hangs.*, trang_thai_don_hang.ten_trang_thai 
                FROM don_hangs 
                JOIN trang_thai_don_hang ON don_hangs.trang_thai_id = trang_thai_don_hang.id
                WHERE don_hangs.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function getAllStatuses()
    {
        $sql = 'SELECT id, ten_trang_thai FROM trang_thai_don_hang';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateStatus($id, $statusId)
    {
        try {
            $sql = 'UPDATE don_hangs SET trang_thai_id = :statusId WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':statusId', $statusId, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
    public function deleteData($id)
    {
        try {
            $sql = 'DELETE FROM don_hangs WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error:' . $e->getMessage();
        }
    }
    public function getListSpDonHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_don_hangs.*, san_phams.ten_san_pham, san_phams.gia_ban, khuyen_mais.gia_tri 
                FROM chi_tiet_don_hangs 
                INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id 
                LEFT JOIN khuyen_mais ON chi_tiet_don_hangs.khuyen_mai_id = khuyen_mais.id 
                WHERE chi_tiet_don_hangs.don_hang_id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
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


    public function __destruct()
    {
        $this->conn = null;
    }
}
