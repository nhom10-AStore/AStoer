<?php
class ListSanPham {
    public $conn;
    private $items_per_page = 8; // Số lượng sản phẩm mỗi trang

    public function __construct() {
        $this->conn = connectDB(); // Giả sử bạn đã định nghĩa hàm connectDB() để kết nối cơ sở dữ liệu
    }

    public function getProductsByCategory($categoryId = null, $page = 1, $priceRange = null, $sortOrder = null) {
        try {
            // Kiểm tra nếu là "Tất cả" (categoryId là null), sẽ hiển thị 8 sản phẩm trên mỗi trang, ngược lại 4 sản phẩm trên mỗi trang
            $items_per_page = ($categoryId === null) ? 8 : 4;
            $offset = ($page - 1) * $items_per_page;
            
            // Câu truy vấn SQL cơ bản
            $sql = 'SELECT sp.*, dm.ten_danh_muc 
                    FROM san_phams sp 
                    INNER JOIN danh_mucs dm ON sp.danh_muc_id = dm.id 
                    WHERE sp.trang_thai = 1';
            
            $params = [];
            
            // Thêm bộ lọc danh mục nếu có categoryId hợp lệ
            if ($categoryId !== null && $categoryId > 0) {
                $sql .= " AND sp.danh_muc_id = :category_id";
                $params[':category_id'] = $categoryId;
            }
    
            // Thêm bộ lọc giá
            if ($priceRange) {
                $this->applyPriceRange($priceRange, $sql, $params);
            }
    
            // Thêm bộ lọc sắp xếp nếu có
            if ($sortOrder) {
                switch ($sortOrder) {
                    case 'price-asc':
                        $sql .= " ORDER BY sp.gia_ban ASC";
                        break;
                    case 'price-desc':
                        $sql .= " ORDER BY sp.gia_ban DESC";
                        break;
                    case 'newest':
                        $sql .= " ORDER BY sp.ngay_nhap DESC";
                        break;
                    default:
                        // Giữ sắp xếp mặc định
                        $sql .= " ORDER BY sp.ngay_nhap DESC, sp.id DESC";
                        break;
                }
            } else {
                // Giữ sắp xếp mặc định khi không có sắp xếp cụ thể
                $sql .= " ORDER BY sp.ngay_nhap DESC, sp.id DESC";
            }
    
            // Thêm phần giới hạn và offset cho phân trang
            $sql .= " LIMIT :limit OFFSET :offset";
            $params[':limit'] = $items_per_page;
            $params[':offset'] = $offset;
    
            // Thực thi câu truy vấn với các tham số đã chuẩn bị
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':limit', $items_per_page, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            if (isset($params[':category_id'])) {
                $stmt->bindValue(':category_id', $params[':category_id'], PDO::PARAM_INT);
            }
            $stmt->execute();
    
            // Lấy kết quả sản phẩm
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $products;
        } catch (Exception $e) {
            // Xử lý lỗi nếu có
            throw new Exception("Error in fetching products: " . $e->getMessage());
        }
    }
    

    private function applyPriceRange($priceRange, &$sql, &$params) {
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
                $this->applyPriceRange($priceRange, $sql, $params);
            }
    
            // Thực thi câu truy vấn với các tham số
            $stmt = $this->conn->prepare($sql);
            if (isset($params[':category_id'])) {
                $stmt->bindValue(':category_id', $params[':category_id'], PDO::PARAM_INT);
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
