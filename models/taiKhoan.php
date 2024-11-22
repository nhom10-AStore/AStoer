<?php
class TaiKhoan
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getDetailTaiKhoan($id)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi' . $e->getMessage();
        }
    }

    public function checkLogin($email, $mat_khau)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            if ($user && password_verify($mat_khau, $user['mat_khau'])) {
                if ($user['chuc_vu_id'] == 2) {
                    if ($user['trang_thai'] == 1) {
                        return $user['email'];
                    } else {
                        return "Tài khoản bị cấm";
                    }
                } else {
                    return "Tài khoản không có quyền đăng nhập";
                }
            } else {
                return "Bạn nhập sai thông tin mật khẩu hoặc tài khoản";
            }
        } catch (\Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function updateTaiKhoan($id, $ho_ten, $email, $gioi_tinh, $so_dien_thoai, $dia_chi, $ngay_sinh, $anh_dai_dien = null, $trang_thai = 1)
    {
        try {
            $sql = "UPDATE tai_khoans SET ho_ten = :ho_ten, email = :email, gioi_tinh = :gioi_tinh, so_dien_thoai = :so_dien_thoai, dia_chi = :dia_chi, ngay_sinh = :ngay_sinh, trang_thai = :trang_thai";
            if ($anh_dai_dien !== null) {
                $sql .= ", anh_dai_dien = :anh_dai_dien";
            }
            $sql .= " WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':ho_ten', $ho_ten, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':gioi_tinh', $gioi_tinh, PDO::PARAM_INT);
            $stmt->bindParam(':so_dien_thoai', $so_dien_thoai, PDO::PARAM_STR);
            $stmt->bindParam(':dia_chi', $dia_chi, PDO::PARAM_STR);
            $stmt->bindParam(':ngay_sinh', $ngay_sinh, PDO::PARAM_STR);
            $stmt->bindParam(':trang_thai', $trang_thai, PDO::PARAM_INT);
            if ($anh_dai_dien !== null) {
                $stmt->bindParam(':anh_dai_dien', $anh_dai_dien, PDO::PARAM_STR);
            }
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

    public function updateMatKhau($id, $mat_khau)
    {
        try {
            $sql = "UPDATE tai_khoans SET mat_khau = :mat_khau WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':mat_khau', $mat_khau, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }
}
