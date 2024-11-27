<?php
class DonHangQL
{
    public $conn;

    // ket noi CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllByUserId($nguoi_dung_id)
    {
        try {
            // Lọc đơn hàng theo người dùng
            $sql = 'SELECT don_hangs.*, tai_khoans.ho_ten, khuyen_mais.ma_khuyen_mai, phuong_thuc_thanh_toans.ten_phuong_thuc, trang_thai_don_hang.ten_trang_thai 
                FROM don_hangs 
                INNER JOIN tai_khoans ON don_hangs.nguoi_dung_id = tai_khoans.id
                LEFT JOIN khuyen_mais ON don_hangs.khuyen_mai_id = khuyen_mais.id
                LEFT JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan = phuong_thuc_thanh_toans.id
                LEFT JOIN trang_thai_don_hang ON don_hangs.trang_thai_id = trang_thai_don_hang.id
                WHERE don_hangs.nguoi_dung_id = :nguoi_dung_id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nguoi_dung_id', $nguoi_dung_id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Kết Nối Thất bại: " . $e->getMessage();
        }
    }

    public function getDetailData($id, $nguoi_dung_id)
    {
        try {
            // Lấy chi tiết đơn hàng của người dùng
            $sql = 'SELECT don_hangs.*, trang_thai_don_hang.ten_trang_thai 
                FROM don_hangs 
                JOIN trang_thai_don_hang ON don_hangs.trang_thai_id = trang_thai_don_hang.id
                WHERE don_hangs.id = :id AND don_hangs.nguoi_dung_id = :nguoi_dung_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':nguoi_dung_id', $nguoi_dung_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    // Các phương thức còn lại không thay đổi
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

}
