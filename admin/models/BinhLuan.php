<?php
class BinhLuan
{
    public $conn;

    // ket noi CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }
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
            echo "Kết Nối Thất bại: " . $e->getMessage();
        }
    }
}
