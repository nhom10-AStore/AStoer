<?php
class DonHangQL
{
    public $conn;

    // ket noi CSDL
    public function __construct()
    {
        $this->conn = connectDB();
    }

   // Lấy tất cả đơn hàng của người dùng
   public function getAllByUserId($nguoi_dung_id)
   {
       try {
           $sql = 'SELECT don_hangs.*, tai_khoans.ho_ten, khuyen_mais.ma_khuyen_mai, phuong_thuc_thanh_toans.ten_phuong_thuc, trang_thai_don_hang.ten_trang_thai 
                   FROM don_hangs 
                   INNER JOIN tai_khoans ON don_hangs.nguoi_dung_id = tai_khoans.id
                   LEFT JOIN khuyen_mais ON don_hangs.khuyen_mai_id = khuyen_mais.id
                   LEFT JOIN phuong_thuc_thanh_toans ON don_hangs.phuong_thuc_thanh_toan = phuong_thuc_thanh_toans.id
                   LEFT JOIN trang_thai_don_hang ON don_hangs.trang_thai_id = trang_thai_don_hang.id
                   WHERE don_hangs.nguoi_dung_id = :nguoi_dung_id
                   ORDER BY ngay_dat DESC, don_hangs.id DESC';
           $stmt = $this->conn->prepare($sql);
           $stmt->bindParam(':nguoi_dung_id', $nguoi_dung_id, PDO::PARAM_INT);
           $stmt->execute();
           return $stmt->fetchAll();
       } catch (PDOException $e) {
           echo "Kết Nối Thất bại: " . $e->getMessage();
       }
   }

  // Lấy chi tiết đơn hàng
  public function getDetailData($id, $nguoi_dung_id)
  {
      try {
          $sql = 'SELECT don_hangs.*, trang_thai_don_hang.ten_trang_thai 
                  FROM don_hangs 
                  JOIN trang_thai_don_hang ON don_hangs.trang_thai_id = trang_thai_don_hang.id
                  WHERE don_hangs.id = :id AND don_hangs.nguoi_dung_id = :nguoi_dung_id';
          $stmt = $this->conn->prepare($sql);
          $stmt->bindParam(':id', $id, PDO::PARAM_INT);
          $stmt->bindParam(':nguoi_dung_id', $nguoi_dung_id, PDO::PARAM_INT);
          $stmt->execute();
          return $stmt->fetch(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
          echo 'Error: ' . $e->getMessage();
      }
  }
   // Cập nhật trạng thái đơn hàng khi hủy và cộng lại số lượng tồn kho
   public function cancelOrder($don_hang_id)
   {
       try {
           // Lấy trạng thái hiện tại của đơn hàng từ CSDL
           $sql = "SELECT don_hangs.trang_thai_id, trang_thai_don_hang.ten_trang_thai
                   FROM don_hangs 
                   INNER JOIN trang_thai_don_hang ON don_hangs.trang_thai_id = trang_thai_don_hang.id
                   WHERE don_hangs.id = :don_hang_id";
           $stmt = $this->conn->prepare($sql);
           $stmt->execute([':don_hang_id' => $don_hang_id]);
           $order = $stmt->fetch(PDO::FETCH_ASSOC);
   
           // Kiểm tra trạng thái của đơn hàng
           if ($order['ten_trang_thai'] !== 'Chờ xác nhận') {
               // Nếu trạng thái không phải "Chờ xác nhận", không cho phép hủy
               return false; // Trả về false để người dùng biết rằng không thể hủy đơn hàng
           }
   
           // Lấy thông tin chi tiết đơn hàng
           $sqlDetails = "SELECT chi_tiet_don_hangs.san_pham_id, chi_tiet_don_hangs.so_luong 
                          FROM chi_tiet_don_hangs 
                          WHERE chi_tiet_don_hangs.don_hang_id = :don_hang_id";
           $stmtDetails = $this->conn->prepare($sqlDetails);
           $stmtDetails->execute([':don_hang_id' => $don_hang_id]);
           $orderDetails = $stmtDetails->fetchAll();
   
           // Cập nhật lại số lượng tồn kho cho các sản phẩm trong đơn hàng
           foreach ($orderDetails as $detail) {
               $sqlUpdate = "UPDATE san_phams 
                             SET so_luong_ton_kho = so_luong_ton_kho + :so_luong
                             WHERE id = :san_pham_id";
               $stmtUpdate = $this->conn->prepare($sqlUpdate);
               $stmtUpdate->execute([
                   ':san_pham_id' => $detail['san_pham_id'],
                   ':so_luong' => $detail['so_luong']
               ]);
           }
   
           // Cập nhật trạng thái đơn hàng thành "Đã hủy"
           $sqlStatusUpdate = "UPDATE don_hangs 
                               SET trang_thai_id = (SELECT id FROM trang_thai_don_hang WHERE ten_trang_thai = 'Đã hủy') 
                               WHERE id = :don_hang_id";
           $stmtStatusUpdate = $this->conn->prepare($sqlStatusUpdate);
           $stmtStatusUpdate->execute([':don_hang_id' => $don_hang_id]);
   
           return true;
       } catch (Exception $e) {
           echo 'Lỗi: ' . $e->getMessage();
           return false;
       }
   }
   
    // Cập nhật trạng thái đơn hàng khi hủy và cộng lại số lượng tồn kho
    public function truSoLuong($don_hang_id)
    {
        try {
            // Lấy thông tin chi tiết đơn hàng
            $sql = "SELECT chi_tiet_don_hangs.san_pham_id, chi_tiet_don_hangs.so_luong 
                    FROM chi_tiet_don_hangs
                    WHERE chi_tiet_don_hangs.don_hang_id = :don_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':don_hang_id' => $don_hang_id]);
            $orderDetails = $stmt->fetchAll();
 
            // Cập nhật lại số lượng tồn kho cho các sản phẩm
            foreach ($orderDetails as $detail) {
                $sqlUpdate = "UPDATE san_phams 
                              SET so_luong_ton_kho = so_luong_ton_kho - :so_luong
                              WHERE id = :san_pham_id";
                $stmtUpdate = $this->conn->prepare($sqlUpdate);
                $stmtUpdate->execute([
                    ':san_pham_id' => $detail['san_pham_id'],
                    ':so_luong' => $detail['so_luong']
                ]);
            }
 
            // Cập nhật trạng thái đơn hàng thành "Đã hủy"
            $sqlStatusUpdate = "UPDATE don_hangs 
                                SET trang_thai_id = (SELECT id FROM trang_thai_don_hang WHERE ten_trang_thai = 'Đã hủy') 
                                WHERE id = :don_hang_id";
            $stmtStatusUpdate = $this->conn->prepare($sqlStatusUpdate);
            $stmtStatusUpdate->execute([':don_hang_id' => $don_hang_id]);
 
            return true;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }
    // Thêm phương thức cho việc mua lại (hoặc tạo đơn hàng mới)
    public function reOrder($don_hang_id, $nguoi_dung_id)
    {
        try {
            // Lấy lại thông tin đơn hàng cũ
            $orderDetails = $this->getDetailData($don_hang_id, $nguoi_dung_id);

            // Tạo đơn hàng mới và thêm sản phẩm vào giỏ hàng hoặc đơn hàng
            // Phần này sẽ liên quan đến giỏ hàng hoặc đơn hàng mới, bạn cần viết logic cho phần tạo đơn hàng mới.

            return true;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }

    // Các phương thức còn lại không thay đổi
    public function getListSpDonHang($id)
    {
        try {
            $sql = 'SELECT chi_tiet_don_hangs.*, san_phams.ten_san_pham, san_phams.gia_ban, khuyen_mais.gia_tri 
                FROM chi_tiet_don_hangs 
                INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id 
                LEFT JOIN khuyen_mais ON chi_tiet_don_hangs.khuyen_mai_id = khuyen_mais.id 
                WHERE chi_tiet_don_hangs.don_hang_id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "lỗi " . $e->getMessage();
        }
    }



    public function getAllTrangThaiDonHang()
    {
        try {
            $sql = 'SELECT * FROM trang_thai_don_hang';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function addToCart($nguoi_dung_id, $san_pham_id, $so_luong)
    {
        try {
            // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
            $sql = "SELECT * FROM gio_hang WHERE nguoi_dung_id = :nguoi_dung_id AND san_pham_id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':nguoi_dung_id' => $nguoi_dung_id,
                ':san_pham_id' => $san_pham_id
            ]);
    
            if ($stmt->rowCount() > 0) {
                // Nếu sản phẩm đã có trong giỏ hàng, chỉ cập nhật số lượng mà không thay đổi thông tin khác
                $sql = "UPDATE gio_hang SET so_luong = so_luong + :so_luong WHERE nguoi_dung_id = :nguoi_dung_id AND san_pham_id = :san_pham_id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':so_luong' => $so_luong,
                    ':nguoi_dung_id' => $nguoi_dung_id,
                    ':san_pham_id' => $san_pham_id
                ]);
            } else {
                // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới vào giỏ hàng
                $sql = "INSERT INTO gio_hang (nguoi_dung_id, san_pham_id, so_luong) VALUES (:nguoi_dung_id, :san_pham_id, :so_luong)";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':nguoi_dung_id' => $nguoi_dung_id,
                    ':san_pham_id' => $san_pham_id,
                    ':so_luong' => $so_luong
                ]);
            }
    
            return true;
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return false;
        }
    }
    public function updateOrderStatus($don_hang_id, $trang_thai_id)
    {
        // Kiểm tra câu lệnh SQL
        $sql = "UPDATE don_hangs SET trang_thai_id = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        
        // Truyền tham số theo đúng thứ tự
        $stmt->execute([$trang_thai_id, $don_hang_id]);
    }
    
    
    // Cập nhật trạng thái thanh toán thành "Đã Thanh Toán"
// Cập nhật trạng thái thanh toán thành "Đã Thanh Toán" và trạng thái đơn hàng thành "Đã hoàn thành"
public function xacNhanThanhToan($don_hang_id)
{
    try {
        // Cập nhật trạng thái thanh toán thành 1 (Đã Thanh Toán)
        $sql = "UPDATE don_hangs 
                SET trang_thai_thanh_toan = 1, trang_thai_id = 5
                WHERE id = :don_hang_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':don_hang_id' => $don_hang_id]);

        return true;
    } catch (Exception $e) {
        echo 'Lỗi: ' . $e->getMessage();
        return false;
    }
}


    // Phương thức cập nhật trạng thái thanh toán của đơn hàng
public function capNhatThanhToan($idDonHang, $trangThaiThanhToan) {
    $sql = "UPDATE don_hangs SET trang_thai_thanh_toan = ? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$trangThaiThanhToan, $idDonHang]);
}



}
