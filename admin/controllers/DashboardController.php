<?php
class DashboardController
{
    public $modelDashboard;

    public function __construct()
    {
        $this->modelDashboard = new Dashboard();
    }

    public function index()
    {
        // Lấy các thống kê từ model
        $totalOrders = $this->modelDashboard->countOrders();
        $totalRevenue = $this->modelDashboard->sumOrderAmount();
        $completedOrders = $this->modelDashboard->countCompletedOrders();
        $countUniqueBuyers = $this->modelDashboard->countUniqueBuyers();
        // Gọi view để hiển thị
        require_once "./views/dashboard.php";
    }
}
