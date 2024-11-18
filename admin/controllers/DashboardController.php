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
        $completedOrdersCancelled = $this->modelDashboard->countCompletedOrdersCancelled();
        $countUniqueBuyers = $this->modelDashboard->countUniqueBuyers();
        $topProducts = $this->modelDashboard->getTopSellingProducts($limit = 10);
        // Gọi view để hiển thị
        require_once "./views/dashboard.php";
    }
}
