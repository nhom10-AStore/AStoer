<?php 

class HomeController
{
    public $modelSanPham;
    public function __construct()
    {
        $this->modelSanPham = new SanPham();
    }
    public function index() {
    //    require_once './client/home-15.php';
    $listSanPham = $this->modelSanPham->getAllSanPham();
    require_once './views/home.php';
    }
}