<?php
class DanhMuc
{
    public $conn;

    // ket noi CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Danh sach danh muc
    public function getAllDanhMuc()
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

    // Them du lieu moi vao CSDL
    public function postData($ten_danh_muc, $trang_thai)
    {
        try {


            //code...
            $sql = 'INSERT INTO danh_mucs (ten_danh_muc, trang_thai)
                        VALUES (:ten_danh_muc, :trang_thai)';
            $stmt = $this->conn->prepare($sql);
            // Gan gtri vao cac tham so
            $stmt->bindParam(':ten_danh_muc', $ten_danh_muc);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();
            return  true;
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();
        }
    }
    // Lay thong tin chi tiet
    public function getDetaiData($id)
    {
        try {
            //code...
            $sql = 'SELECT *  FROM danh_mucs WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return  $stmt->fetch();
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();
        }
    }

    // Cap nhat du lieu moi vao CSDL
    public function updateData($id, $ten_danh_muc, $trang_thai)
    {
        try {
            //code...
            $sql = 'UPDATE `danh_mucs` SET ten_danh_muc= :ten_danh_muc,trang_thai= :trang_thai WHERE id=:id';
            $stmt = $this->conn->prepare($sql);
            // Gan gtri vao cac tham so
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_danh_muc', $ten_danh_muc);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->execute();
            return  true;
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();
        }
    }

    // Delete Danh muc
    public function deleteData($id)
    {
        try {
            //code...
            $sql = 'DELETE  FROM danh_mucs WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return  true;
        } catch (PDOException $e) {
            echo "Thất bại" . $e->getMessage();
        }
    }

    // Huy ket noi CSDL
    public function __destruct()
    {
        $this->conn = null;
    }
}
