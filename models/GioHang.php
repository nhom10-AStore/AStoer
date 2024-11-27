<?php

class GioHang
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getGioHangFromUser($id)
    {
        try {
            $sql = "SELECT * FROM gio_hangs WHERE nguoi_dung_id = :nguoi_dung_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':nguoi_dung_id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function getDetailGioHang($id)
    {
        try {
            $sql = "SELECT chi_tiet_gio_hangs.*, san_phams.ten_san_pham,san_phams.anh_san_pham,san_phams.gia_ban, san_phams.gia_khuyen_mai
            FROM chi_tiet_gio_hangs
            INNER JOIN san_phams ON chi_tiet_gio_hangs.san_pham_id = san_phams.id
            WHERE chi_tiet_gio_hangs.gio_hang_id = :gio_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':gio_hang_id' => $id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function addGioHang($id)
    {
        try {
            $sql = "INSERT INTO gio_hangs (nguoi_dung_id) VALUES (:id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function updateSoLuong($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            // Kiểm tra xem số lượng có hợp lệ không
            if ($so_luong <= 0) {
                throw new Exception("Số lượng phải lớn hơn 0.");
            }

            // Cập nhật số lượng sản phẩm trong giỏ hàng
            $sql = "UPDATE chi_tiet_gio_hangs SET so_luong = :so_luong WHERE gio_hang_id = :gio_hang_id AND san_pham_id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);

            // Thực thi câu lệnh với các tham số
            $stmt->execute([
                ':gio_hang_id' => $gio_hang_id,
                ':san_pham_id' => $san_pham_id,
                ':so_luong' => $so_luong
            ]);

            // Kiểm tra số dòng bị ảnh hưởng (nếu không có dòng nào bị ảnh hưởng, tức là không có sản phẩm được cập nhật)
            if ($stmt->rowCount() > 0) {
                return true;  // Cập nhật thành công
            } else {
                // Nếu không có thay đổi, có thể là vì sản phẩm không tồn tại trong giỏ hàng
                throw new Exception("Không tìm thấy sản phẩm trong giỏ hàng.");
            }
        } catch (Exception $e) {
            // In ra lỗi nếu có
            echo 'Lỗi: ' . $e->getMessage();
            return false;  // Trả về false nếu có lỗi
        }
    }

    public function addDetailGioHang($gio_hang_id, $san_pham_id, $so_luong)
    {
        try {
            $sql = "INSERT INTO chi_tiet_gio_hangs (gio_hang_id, san_pham_id, so_luong) VALUES (:gio_hang_id, :san_pham_id, :so_luong)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':gio_hang_id' => $gio_hang_id, ':san_pham_id' => $san_pham_id, ':so_luong' => $so_luong]);
            return true;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function deleteCartItem($gio_hang_id, $san_pham_id)
    {
        try {
            // Verify item exists
            $checkSql = "SELECT COUNT(*) FROM chi_tiet_gio_hangs 
                         WHERE gio_hang_id = :gio_hang_id 
                         AND san_pham_id = :san_pham_id";
            $checkStmt = $this->conn->prepare($checkSql);
            $checkStmt->execute([
                ':gio_hang_id' => $gio_hang_id,
                ':san_pham_id' => $san_pham_id
            ]);

            if ($checkStmt->fetchColumn() == 0) {
                return ['success' => false, 'message' => 'Sản phẩm không tồn tại trong giỏ hàng'];
            }

            // Delete item
            $sql = "DELETE FROM chi_tiet_gio_hangs 
                    WHERE gio_hang_id = :gio_hang_id 
                    AND san_pham_id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':gio_hang_id' => $gio_hang_id,
                ':san_pham_id' => $san_pham_id
            ]);

            return ['success' => true, 'message' => 'Xóa sản phẩm thành công'];
        } catch (Exception $e) {
            error_log('Cart deletion error: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Có lỗi xảy ra khi xóa sản phẩm'];
        }
    }
    public function xoaGioHang($gioHangId)
    {
        // Xóa tất cả chi tiết của giỏ hàng
        $sql = "DELETE FROM chi_tiet_gio_hangs WHERE gio_hang_id = :gio_hang_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':gio_hang_id', $gioHangId);
        $stmt->execute();

        // Xóa giỏ hàng
        $sql = "DELETE FROM gio_hangs WHERE id = :gio_hang_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':gio_hang_id', $gioHangId);
        $stmt->execute();
    }
}
