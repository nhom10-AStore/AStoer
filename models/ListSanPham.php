<?php
class ListSanPham {
    public $conn;
    private $items_per_page = 16;
 
    public function __construct() {
        $this->conn = connectDB();
    }

    public function getProductsByCategory($categoryId = null, $page = 1, $priceRange = null, $sortOrder = null) {
        try {
            // Calculate offset for pagination
            $offset = ($page - 1) * $this->items_per_page;
            
            // Base SQL query with prepared statements
            $sql = "SELECT sp.*, dm.ten_danh_muc 
                    FROM san_phams sp 
                    INNER JOIN danh_mucs dm ON sp.danh_muc_id = dm.id 
                    WHERE sp.trang_thai = 1";
            
            $params = [];
            
            // Add category filter if categoryId is provided and valid
            if ($categoryId !== null && $categoryId > 0) {
                $sql .= " AND sp.danh_muc_id = :category_id";
                $params[':category_id'] = $categoryId;
            }

            // Add price range filter
            if ($priceRange) {
                switch($priceRange) {
                    case 'under-1m':
                        $sql .= " AND sp.gia_ban <= 1000000";
                        break;
                    case '1m-5m':
                        $sql .= " AND sp.gia_ban > 1000000 AND sp.gia_ban <= 5000000";
                        break;
                    case '5m-10m':
                        $sql .= " AND sp.gia_ban > 5000000 AND sp.gia_ban <= 10000000";
                        break;
                    case 'over-10m':
                        $sql .= " AND sp.gia_ban > 10000000";
                        break;
                }
            }

            // Add sorting
            if ($sortOrder) {
                $sql .= match($sortOrder) {
                    'price-asc' => " ORDER BY sp.gia_ban ASC",
                    'price-desc' => " ORDER BY sp.gia_ban DESC",
                    'newest' => " ORDER BY sp.ngay_nhap DESC",
                    default => " ORDER BY sp.ngay_nhap DESC"
                };
            } else {
                $sql .= " ORDER BY sp.ngay_nhap DESC";
            }

            // Add pagination
            $sql .= " LIMIT :limit OFFSET :offset";
            $params[':limit'] = $this->items_per_page;
            $params[':offset'] = $offset;
            
            // Prepare and execute statement
            $stmt = $this->conn->prepare($sql);
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value, PDO::PARAM_INT);
            }
            $stmt->execute();
            
            $products = $stmt->fetchAll();
            
            // Debug logging
            if (defined('DEBUG')) {
                error_log("SQL Query: " . $sql);
                error_log("Parameters: " . print_r($params, true));
                error_log("Results found: " . count($products));
            }
            
            return $products;
        } catch (PDOException $e) {
            error_log("Error fetching products: " . $e->getMessage());
            return [];
        }
    }

    public function getTotalProducts($categoryId = null, $priceRange = null) {
        try {
            $sql = "SELECT COUNT(*) as total FROM san_phams sp WHERE sp.trang_thai = 1";
            $params = [];
            
            if ($categoryId !== null && $categoryId > 0) {
                $sql .= " AND sp.danh_muc_id = :category_id";
                $params[':category_id'] = $categoryId;
            }

            // Add price range filter
            if ($priceRange) {
                switch($priceRange) {
                    case '0-5m':
                        $sql .= " AND sp.gia_ban <= 5000000";
                        break;
                    case '5m-10m':
                        $sql .= " AND sp.gia_ban > 5000000 AND sp.gia_ban <= 10000000";
                        break;
                    case '10m-20m':
                        $sql .= " AND sp.gia_ban > 10000000 AND sp.gia_ban <= 20000000";
                        break;
                    case '20m+':
                        $sql .= " AND sp.gia_ban > 20000000";
                        break;
                }
            }

            $stmt = $this->conn->prepare($sql);
            if ($categoryId !== null && $categoryId > 0) {
                $stmt->bindValue(':category_id', $categoryId, PDO::PARAM_INT);
            }
            $stmt->execute();
            $result = $stmt->fetch();
            return $result['total'];
        } catch (PDOException $e) {
            error_log("Error counting products: " . $e->getMessage());
            return 0;
        }
    }

    public function getCategories() {
        try {
            $sql = "SELECT * FROM danh_mucs WHERE trang_thai = 1 ORDER BY id ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error fetching categories: " . $e->getMessage());
            return [];
        }
    }
}