<?php
class LienHe
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function insert($ten, $email, $loi_nhan) {
        try {
            $sql = "INSERT INTO lien_hes (ten, email, loi_nhan, trang_thai) VALUES (:ten, :email, :loi_nhan, 0)";
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':ten', $ten);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':loi_nhan', $loi_nhan);
            
            return $stmt->execute();
        } catch (PDOException $e) {
            // Log error or handle appropriately
            return false;
        }
    }
}