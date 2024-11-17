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
        $sql = "SELECT COALESCE(SUM(thanh_toan), 0) as total_revenue FROM don_hangs";
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
                WHERE trang_thai_id = 7";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['completed'];
    }
    public function countUniqueBuyers() {
        $sql = "SELECT COUNT(DISTINCT nguoi_dung_id) as unique_buyers 
                FROM don_hangs";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['unique_buyers'];
    }
}
