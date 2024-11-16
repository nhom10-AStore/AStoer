<?php
class Banner {
    public $conn;

    // Kết nối CSDL
    public function __construct() {
        $this->conn = connectDB();
    }

    // Danh sách banner
    public function getAll() {
        try {
            $sql = 'SELECT * FROM banners';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Thất bại: " . $e->getMessage();
        }
    }

    // Thêm dữ liệu banner mới vào CSDL
    public function postData($ten_banner, $trang_thai) {
        try {
            $sql = 'INSERT INTO banners (ten_banner, trang_thai) VALUES (:ten_banner, :trang_thai)';
            $stmt = $this->conn->prepare($sql);
            // Gán giá trị vào các tham số
            $stmt->bindParam(':ten_banner', $ten_banner);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Thất bại: " . $e->getMessage();
        }
    }

    // Lấy thông tin chi tiết banner
    public function getDetailData($id) {
        try {
            $sql = 'SELECT * FROM banners WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Thất bại: " . $e->getMessage();
        }
    }

    // Cập nhật dữ liệu banner vào CSDL
    public function updateData($id, $ten_banner, $trang_thai) {
        try {
            $sql = 'UPDATE banners SET ten_banner = :ten_banner, trang_thai = :trang_thai WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            // Gán giá trị vào các tham số
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_banner', $ten_banner);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Thất bại: " . $e->getMessage();
        }
    }

    // Xóa banner khỏi CSDL
    public function deleteData($id) {
        try {
            $sql = 'DELETE FROM banners WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Thất bại: " . $e->getMessage();
        }
    }

    // Hủy kết nối CSDL
    public function __destruct() {
        $this->conn = null;
    }
}
?>
