<?php
class DonHang
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function addDonHang($ma_don_hang, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi_nguoi_nhan, $ngay_dat, $phuong_thuc_thanh_toan, $trang_thai_thanh_toan, $thanh_toan, $trang_thai_id, $ghi_chu, $nguoi_dung_id)
    {

        try {
            $sql = "INSERT INTO don_hangs (ma_don_hang, ten_nguoi_nhan, email_nguoi_nhan, sdt_nguoi_nhan, dia_chi_nguoi_nhan, ngay_dat, phuong_thuc_thanh_toan, trang_thai_thanh_toan, thanh_toan, trang_thai_id, ghi_chu,nguoi_dung_id) 
            VALUES (:ma_don_hang,:ten_nguoi_nhan, :email_nguoi_nhan, :sdt_nguoi_nhan, :dia_chi_nguoi_nhan, :ngay_dat, :phuong_thuc_thanh_toan, :trang_thai_thanh_toan, :thanh_toan, :trang_thai_id, :ghi_chu,:nguoi_dung_id  )";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ma_don_hang' => $ma_don_hang,
                ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                ':email_nguoi_nhan' => $email_nguoi_nhan,
                ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                ':ngay_dat' => $ngay_dat,
                ':phuong_thuc_thanh_toan' => $phuong_thuc_thanh_toan,
                ':trang_thai_thanh_toan' => $trang_thai_thanh_toan,
                ':thanh_toan' => $thanh_toan,
                ':trang_thai_id' => $trang_thai_id,
                ':ghi_chu' => $ghi_chu,
                ':nguoi_dung_id' => $nguoi_dung_id,
            ]);
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function addChiTietDonhang($donHangId, $sanPhamId, $soLuong, $phiVanChuyen)
    {
        // Kiểm tra lại giá trị đầu vào để đảm bảo không phải NULL
        if (empty($sanPhamId) || empty($soLuong)) {
            throw new Exception("Thông tin sản phẩm hoặc số lượng không hợp lệ.");
        }

        // Câu truy vấn để thêm chi tiết đơn hàng
        $query = "INSERT INTO chi_tiet_don_hangs (don_hang_id, san_pham_id, so_luong, phi_van_chuyen)
              VALUES (:don_hang_id, :san_pham_id, :so_luong, :phi_van_chuyen)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':don_hang_id', $donHangId);
        $stmt->bindParam(':san_pham_id', $sanPhamId);
        $stmt->bindParam(':so_luong', $soLuong);
        $stmt->bindParam(':phi_van_chuyen', $phiVanChuyen);
        return $stmt->execute();
    }
    
}
