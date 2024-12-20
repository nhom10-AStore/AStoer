<?php

class SanPham
{
    public $conn;

    // Kết nối cơ sở dữ liệu
    public function __construct()
    {
        $this->conn = connectDB(); // Kết nối đến CSDL thông qua hàm connectDB()
    }
    public function getSanPhamMoiNhat($limit = 8)
    {
        $sql = "SELECT * FROM san_phams ORDER BY ngay_nhap DESC, san_phams.id DESC LIMIT :limit";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    // Lấy tất cả sản phẩm cùng danh mục
    public function getAllSanPham()
    {
        try {
            $sql = 'SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams 
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }
    public function tangluotxem($id)
    {
        try {
            $sql = "UPDATE san_phams SET luot_xem = luot_xem + 1 WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
        } catch (PDOException $e) {
            error_log("Lỗi tăng lượt xem: " . $e->getMessage());
        }
    }
    
    

    // Lấy chi tiết sản phẩm
    public function getDetailSanPham($id)
    {
        try {
          // Lấy thông tin sản phẩm
        $sql =
            'SELECT san_phams.*, danh_mucs.ten_danh_muc 
        FROM san_phams
        INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
        WHERE san_phams.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    // Lấy danh sách ảnh sản phẩm
    public function getListAnhSanPham($id)
    {
        try {
            $sql = "SELECT * FROM hinh_anh_san_phams WHERE san_pham_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

 // Lấy tất cả bình luận của sản phẩm (Sắp xếp theo ngày mới nhất)
public function getAllBinhLuan($san_pham_id)
{
    try {
        // Sắp xếp các bình luận theo ngày đăng (ngày mới nhất ở đầu)
        $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten FROM binh_luans 
                INNER JOIN tai_khoans ON binh_luans.nguoi_dung_id = tai_khoans.id 
                WHERE san_pham_id = :san_pham_id 
                -- ORDER BY binh_luans.ngay_dang DESC
                 ORDER BY ngay_dang DESC, binh_luans.id DESC
                ';  // Sắp xếp theo ngày đăng (mới nhất trước)

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':san_pham_id', $san_pham_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Trả về tất cả các bình luận
    } catch (PDOException $e) {
        echo "Kết nối thất bại: " . $e->getMessage();
    }
}


  // Thêm bình luận cho sản phẩm
public function addComment($nguoi_dung_id, $san_pham_id, $noi_dung)
{
    try {
        // Kiểm tra nội dung bình luận
        if (empty($noi_dung)) {
            throw new Exception("Nội dung bình luận không được để trống.");
        }

        // Chuẩn bị câu lệnh SQL
        $sql = "INSERT INTO binh_luans (nguoi_dung_id, san_pham_id, noi_dung, ngay_dang) 
                VALUES (:nguoi_dung_id, :san_pham_id, :noi_dung, NOW())";

        // Chuẩn bị câu lệnh PDO
        $stmt = $this->conn->prepare($sql);

        // Thực thi câu lệnh với các tham số
        $stmt->execute([
            ':nguoi_dung_id' => $nguoi_dung_id, // ID người dùng
            ':san_pham_id' => $san_pham_id,     // ID sản phẩm
            ':noi_dung' => htmlspecialchars($noi_dung, ENT_QUOTES, 'UTF-8') // Đảm bảo an toàn khỏi XSS
        ]);

        return true; // Thêm bình luận thành công
    } catch (PDOException $e) {
        // Ghi log lỗi PDO
        error_log("Database Error: " . $e->getMessage());
        return false; // Thêm bình luận thất bại
    } catch (Exception $e) {
        // Xử lý lỗi khác
        error_log("Error: " . $e->getMessage());
        return false; // Thêm bình luận thất bại
    }
}
    // Kiểm tra tính hợp lệ của người dùng
    public function isValidUser($user)
    {
        try {
            $sql = 'SELECT COUNT(*) FROM tai_khoans WHERE id = :tai_khoan_id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':user', $user);
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
        } catch (PDOException $e) {
            return false;
        }
    }

    // Lấy danh sách sản phẩm cùng danh mục
    public function getListSanPhamCungDanhMuc($danh_muc_id)
    {
        try {
            $sql = "SELECT san_phams.*, danh_mucs.ten_danh_muc FROM san_phams 
                    INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id 
                    WHERE san_phams.danh_muc_id = :danh_muc_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':danh_muc_id' => $danh_muc_id]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo 'Lỗi: ' . $e->getMessage();
        }
    }

    // Lấy tất cả đánh giá
    public function getAllDanhGia()
    {
        try {
            $sql = 'SELECT danh_gias.*, tai_khoans.ho_ten FROM danh_gias
                    JOIN tai_khoans ON danh_gias.nguoi_dung_id = tai_khoans.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function searchSanPham($keyword, $page = 1, $limit = 8, $priceFilter = '', $sortBy = '')
{
    try {
        $conn = connectDB();

        // Tính offset
        $offset = ($page - 1) * $limit;

        // Base query for products and count
        $baseQuery = "
            FROM san_phams
            LEFT JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
            WHERE san_phams.ten_san_pham LIKE :keyword
            AND san_phams.trang_thai = 1
        ";

        // Price filter conditions
        $priceConditions = "";
        switch ($priceFilter) {
            case 'under-1m':
                $priceConditions = " AND COALESCE(san_phams.gia_khuyen_mai, san_phams.gia_ban) < 1000000";
                break;
            case '1m-5m':
                $priceConditions = " AND COALESCE(san_phams.gia_khuyen_mai, san_phams.gia_ban) BETWEEN 1000000 AND 5000000";
                break;
            case '5m-10m':
                $priceConditions = " AND COALESCE(san_phams.gia_khuyen_mai, san_phams.gia_ban) BETWEEN 5000000 AND 10000000";
                break;
            case 'over-10m':
                $priceConditions = " AND COALESCE(san_phams.gia_khuyen_mai, san_phams.gia_ban) > 10000000";
                break;
        }

        // Append price conditions to the base query
        $baseQuery .= $priceConditions;

        // Sorting logic
        $orderClause = " ORDER BY ";
        switch ($sortBy) {
            case 'price-asc':
                $orderClause .= "COALESCE(san_phams.gia_khuyen_mai, san_phams.gia_ban) ASC";
                break;
            case 'price-desc':
                $orderClause .= "COALESCE(san_phams.gia_khuyen_mai, san_phams.gia_ban) DESC";
                break;
            default:
                $orderClause .= "san_phams.ngay_nhap DESC"; // Default sort by newest
        }

        // Query to count total products
        $countSql = "SELECT COUNT(*) " . $baseQuery;
        $countStmt = $conn->prepare($countSql);
        $countStmt->bindValue(':keyword', "%$keyword%", PDO::PARAM_STR);
        $countStmt->execute();
        $totalProducts = $countStmt->fetchColumn();

        // Query to fetch products with pagination
        $productSql = "
            SELECT san_phams.*, danh_mucs.ten_danh_muc
            " . $baseQuery . $orderClause . "
            LIMIT :limit OFFSET :offset
        ";
        $productStmt = $conn->prepare($productSql);
        $productStmt->bindValue(':keyword', "%$keyword%", PDO::PARAM_STR);
        $productStmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $productStmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $productStmt->execute();
        $products = $productStmt->fetchAll(PDO::FETCH_ASSOC);

        return [
            'products' => $products,
            'total' => $totalProducts,
            'totalPages' => ceil($totalProducts / $limit)
        ];
    } catch (PDOException $e) {
        error_log("Search error: " . $e->getMessage());
        return [
            'products' => [],
            'total' => 0,
            'totalPages' => 0
        ];
    }
}

    public function reduceStock($san_pham_id, $so_luong)
    {
        try {
            // Cập nhật số lượng tồn kho của sản phẩm
            $sql = "UPDATE san_phams SET so_luong_ton_kho = so_luong_ton_kho - :so_luong WHERE id = :san_pham_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':so_luong' => $so_luong, ':san_pham_id' => $san_pham_id]);

            return true;
        } catch (Exception $e) {
            error_log('Lỗi cập nhật tồn kho: ' . $e->getMessage());
            return false;
        }
    }
}
