<?php
class ListSanPhamController {
    public $modelListSanPham;
 
    public function __construct() {
        $this->modelListSanPham = new ListSanPham();
        // Lấy danh mục cho menu toàn cục
        $categories = $this->modelListSanPham->getCategories();
        if (!isset($GLOBALS['categories'])) {
            $GLOBALS['categories'] = $categories;
        }
    }
    
    public function getByCategory() {
        // Get parameters from URL
        $categoryId = isset($_GET['category_id']) ? (int)$_GET['category_id'] : null;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $priceRange = isset($_GET['price_filter']) ? $_GET['price_filter'] : null;
        $sortOrder = isset($_GET['sort_by']) ? $_GET['sort_by'] : null;

        
        // Validate category ID
        if ($categoryId !== null) {
            // Check if category exists
            $categoryExists = false;
            foreach ($GLOBALS['categories'] as $category) {
                if ($category['id'] == $categoryId) {
                    $categoryExists = true;
                    break;
                }
            }
            if (!$categoryExists) {
                $categoryId = null; // Reset if invalid category
            }
        }
        
        // Get products with filters
        $products = $this->modelListSanPham->getProductsByCategory($categoryId, $page, $priceRange, $sortOrder);
        
        // Get total products for pagination
        $totalProducts = $this->modelListSanPham->getTotalProducts($categoryId, $priceRange);
        $totalPages = ceil($totalProducts / 16);
        
        // Get categories for filter
        $categories = $this->modelListSanPham->getCategories();
        
        // Debug information
        if (defined('DEBUG')) {
            error_log("Category ID: " . $categoryId);
            error_log("Total Products: " . $totalProducts);
            error_log("Products found: " . count($products));
        }
        
        // Load view
        require_once './views/list-san-pham.php';
    }
}