<?php
class TinTuc
{
    public $conn;
    // ket noi db
    public function __construct()
    {

        $this->conn = connectDB();
    }

    // danh sach tin tuc
    public function getAll()
    {
        try {
            $sql = 'SELECT * FROM tin_tucs';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Error:' . $e->getMessage();
        }
    }
    // them du lieu vao csdl
    public function postData($tieu_de_bai_viet,  $noi_dung_bai_viet, $trang_thai_bai_viet)
    {
        try {
            $sql = 'INSERT INTO `tin_tucs` (tieu_de_bai_viet, noi_dung_bai_viet,trang_thai_bai_viet) 
                    VALUES (:tieu_de_bai_viet, :noi_dung_bai_viet,:trang_thai_bai_viet);';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tieu_de_bai_viet', $tieu_de_bai_viet);
            $stmt->bindParam(':noi_dung_bai_viet', $noi_dung_bai_viet);
            $stmt->bindParam(':trang_thai_bai_viet', $trang_thai_bai_viet);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error:' . $e->getMessage();
        }
    }
    // xoa bai viet
    public function deleteData($id)
    {
        try {
            $sql = 'DELETE FROM tin_tucs WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error:' . $e->getMessage();
        }
    }
    // Hien thong tin sua
    public function getDetailData($id)
    {
        try {
            $sql = 'SELECT * FROM tin_tucs WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'Error:' . $e->getMessage();
        }
    }
    // xu ly update
    public function updateData($id, $tieu_de_bai_viet,  $noi_dung_bai_viet, $trang_thai_bai_viet)
    {
        try {
            $sql='UPDATE tin_tucs SET tieu_de_bai_viet=:tieu_de_bai_viet,noi_dung_bai_viet=:noi_dung_bai_viet,trang_thai_bai_viet=:trang_thai_bai_viet WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':tieu_de_bai_viet', $tieu_de_bai_viet);
            $stmt->bindParam(':noi_dung_bai_viet', $noi_dung_bai_viet);
            $stmt->bindParam(':trang_thai_bai_viet', $trang_thai_bai_viet);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Error:' . $e->getMessage();
        }
    }


    // huy ket noi csdl
    public function __destruct()
    {
        $this->conn = null;
    }
}
