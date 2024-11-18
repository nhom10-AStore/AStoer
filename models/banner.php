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
    public function __destruct() {
        $this->conn = null;
    }
}
?>
