<?php
class DanhMuc
{

    public $conn;

    // ket noi CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function danhSachDanhMuc()
    {
        try {
            //code...
            $sql = 'SELECT * FROM danh_mucs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return  $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();
        }
    }
}
