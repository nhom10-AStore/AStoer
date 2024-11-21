<?php

class SanPham
{
    public $conn;

    // Kết nối cơ sở dữ liệu
    public function __construct()
    {
        $this->conn = connectDB(); // Kết nối đến CSDL thông qua hàm connectDB()
    }

    // Lấy tất cả sản phẩm cùng danh mục
    public function getAllSanPham()
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams 
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Lấy chi tiết sản phẩm
    public function getDetailSanPham($id)
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc 
                    FROM san_phams
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                    WHERE san_phams.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    // Lấy danh sách ảnh sản phẩm
    public function getListAnhSanPham($id)
    {
        try {
            $sql = "SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Lấy tất cả bình luận của sản phẩm
    public function getAllBinhLuan($san_pham_id)
    {
        try {
            $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten FROM binh_luans 
                    INNER JOIN tai_khoans ON binh_luans.nguoi_dung_id = tai_khoans.id 
                    WHERE san_pham_id = :san_pham_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':san_pham_id', $san_pham_id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
        }
    }

    // Thêm bình luận cho sản phẩm
    public function addComment($nguoi_dung_id, $san_pham_id, $noi_dung)
    {
        try {
            // Kiểm tra nội dung bình luận
            if (empty($noi_dung)) {
                throw new Exception("Nội dung bình luận không được để trống.");
            }

            // Chuẩn bị câu lệnh SQL
            $sql = "INSERT INTO binh_luans (nguoi_dung_id, san_pham_id, noi_dung, ngay_dang) 
                    VALUES (:nguoi_dung_id, :san_pham_id, :noi_dung, NOW())";

            // Chuẩn bị câu lệnh PDO
            $stmt = $this->conn->prepare($sql);

            // Thực thi câu lệnh với các tham số
            $stmt->execute([
                ':nguoi_dung_id' => $nguoi_dung_id, // ID người dùng
                ':san_pham_id' => $san_pham_id,     // ID sản phẩm
                ':noi_dung' => htmlspecialchars($noi_dung, ENT_QUOTES, 'UTF-8') // Đảm bảo an toàn khỏi XSS
            ]);

            return true; // Thêm bình luận thành công
        } catch (PDOException $e) {
            // Ghi log lỗi PDO
            error_log("Database Error: " . $e->getMessage());
            return false; // Thêm bình luận thất bại
        } catch (Exception $e) {
            // Xử lý lỗi khác
            error_log("Error: " . $e->getMessage());
            return false; // Thêm bình luận thất bại
        }
    }

    // Kiểm tra tính hợp lệ của người dùng
    public function isValidUser($user)
    {
        try {
            $sql = 'SELECT COUNT(*) FROM tai_khoans WHERE id = :tai_khoan_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user', $user);
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            return false;
        }
    }

    // Lấy danh sách sản phẩm cùng danh mục
    public function getListSanPhamCungDanhMuc($danh_muc_id)
    {
        try {
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams 
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id 
                    WHERE san_phams.danh_muc_id = :danh_muc_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':danh_muc_id' => $danh_muc_id]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Lấy tất cả đánh giá
    public function getAllDanhGia()
    {
        try {
            $sql = 'SELECT danh_gias.*, tai_khoans.ho_ten FROM danh_gias
                    JOIN tai_khoans ON danh_gias.nguoi_dung_id = tai_khoans.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    
}
