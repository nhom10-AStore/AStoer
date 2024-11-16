<?php
class AdminLienHe
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllLienHe(){
        try {
            $sql = "SELECT * FROM lien_hes";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi'.$e->getMessage();
        }
    }
    public function getDetailData($id){
        try {
            $sql = "SELECT * FROM lien_hes WHERE id = $id";
            $stmt = $this->conn->prepare($sql);
            // $stmt->bindParam(':id',$id);
            $stmt->execute();
            return  $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi'.$e->getMessage();
        }
    }
    public function updateData($id, $trang_thai) {
        try {
            $sql = "UPDATE lien_hes SET trang_thai = :trang_thai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id, ':trang_thai' => $trang_thai]);
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function deleteLienHe($id) {
        try {
            $sql = "DELETE FROM lien_hes WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    
}
?>