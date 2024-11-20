<?php
class Register
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
        if (!$this->conn) {
            die("Kết nối CSDL thất bại!");
        }
    }

    public function postData($ho_ten, $ngay_sinh, $email, $so_dien_thoai, $gioi_tinh, $dia_chi, $mat_khau, $anh_dai_dien, $chuc_vu_id, $trang_thai)
    {
        try {
            $sql = 'INSERT INTO tai_khoans (ho_ten, anh_dai_dien, ngay_sinh, email, so_dien_thoai, gioi_tinh, dia_chi, mat_khau, chuc_vu_id, trang_thai) 
                    VALUES (:ho_ten, :anh_dai_dien, :ngay_sinh, :email, :so_dien_thoai, :gioi_tinh, :dia_chi, :mat_khau, :chuc_vu_id, :trang_thai)';
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':ho_ten', $ho_ten);
            $stmt->bindParam(':anh_dai_dien', $anh_dai_dien);
            $stmt->bindParam(':ngay_sinh', $ngay_sinh);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
            $stmt->bindParam(':gioi_tinh', $gioi_tinh);
            $stmt->bindParam(':dia_chi', $dia_chi);
            $stmt->bindParam(':mat_khau', $mat_khau);
            $stmt->bindParam(':chuc_vu_id', $chuc_vu_id);
            $stmt->bindParam(':trang_thai', $trang_thai);

            if ($stmt->execute()) {
                return true;
            } else {
                print_r($stmt->errorInfo());
                return false;
            }
        } catch (PDOException $e) {
            echo "Thất bại: " . $e->getMessage();
            return false;
        }
    }

    public function checkEmailExist($email)
    {
        $sql = "SELECT COUNT(*) FROM tai_khoans WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function checkPhoneExist($so_dien_thoai)
    {
        $sql = "SELECT COUNT(*) FROM tai_khoans WHERE so_dien_thoai = :so_dien_thoai";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
}
