<?php
class Dashboard
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Đếm tổng số lượng đơn hàng
    public function countOrders()
    {
        $sql = "SELECT COUNT(*) as total FROM don_hangs";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    // Tính tổng doanh thu từ tất cả đơn hàng
    public function sumOrderAmount()
    {
        $sql = "
        SELECT 
            COALESCE(SUM(chi_tiet_don_hangs.so_luong * (san_phams.gia_ban - IFNULL(khuyen_mais.gia_tri/100, 0))), 0) AS total_revenue
        FROM 
            chi_tiet_don_hangs
        INNER JOIN 
            san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
        LEFT JOIN 
            khuyen_mais ON chi_tiet_don_hangs.khuyen_mai_id = khuyen_mais.id
    ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_revenue'];
    }

    // Đếm số đơn hàng đã giao thành công
    public function countCompletedOrders()
    {
        $sql = "SELECT COUNT(*) as completed 
                FROM don_hangs 
                WHERE trang_thai_id = 5";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['completed'];
    }
    public function countCompletedOrdersCancelled()
    {
        $sql = "SELECT COUNT(*) as completed 
                FROM don_hangs 
                WHERE trang_thai_id = 7";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['completed'];
    }
    public function countUniqueBuyers()
    {
        $sql = "SELECT COUNT(DISTINCT nguoi_dung_id) as unique_buyers 
                FROM don_hangs";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['unique_buyers'];
    }
    public function getTopSellingProducts($limit = 10)
    {
        try {
            // SQL query to get top selling products based on quantity sold
            $sql = "
        SELECT 
            
            san_phams.ten_san_pham, 
            san_phams.gia_ban, 
            san_phams.anh_san_pham,
            SUM(chi_tiet_don_hangs.so_luong) AS total_sold
        FROM 
            chi_tiet_don_hangs
        INNER JOIN 
            san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
        GROUP BY 
            san_phams.id
        ORDER BY 
            total_sold DESC
        LIMIT :limit
        ";

            // Prepare the statement
            $stmt = $this->conn->prepare($sql);

            // Bind the limit parameter to prevent SQL injection
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);

            // Execute the query
            $stmt->execute();

            // Return the result as an associative array
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle any exceptions by printing the error message
            echo "Lỗi: " . $e->getMessage();
            return [];
        }
    }
}
