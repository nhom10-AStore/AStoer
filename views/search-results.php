<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm</title>
    <?php require_once "layout/libs_css.php"; ?>
    <style>
        .search-container {
            max-width: 1320px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .search-header {
            text-align: center;
            margin: 40px 0;
        }

        .search-title {
            font-size: 28px;
            font-weight: 500;
            color: white;
            margin-bottom: 10px;
        }

        .search-count {
            color: white;
            font-size: 15px;
            margin-bottom: 30px;
        }

        /* Filters */
        .search-filters {
            display: flex;
            justify-content: left;
            gap: 10px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .filter-button {
            padding: 8px 20px;
            border: 1px solid #e5e5e5;
            border-radius: 4px;
            color: #666;
            background: white;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .filter-button:hover,
        .filter-button.active {
            border-color: #222;
        }

        /* Product Grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            margin-bottom: 60px;
        }

        .product-card {
            position: relative;
            transition: all 0.3s ease;
        }

        .product-image {
            position: relative;
            margin: 0 auto 15px;
            overflow: hidden;
            width: 200px;
            height: 312px;
            aspect-ratio: 1;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .product-card:hover .product-image img {
            transform: scale(1.1);
        }

        .product-status {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #222;
            color: white;
            padding: 4px 12px;
            font-size: 12px;
            font-weight: 500;
            z-index: 1;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Product Info */
        .product-info {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .product-name {
            font-size: 15px;
            font-weight: 500;
            color: #222;
            margin-bottom: 3px;
            line-height: 1.4;
            height: 40px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            width: 100%;
        }

        .product-name a {
            color: inherit;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .product-name a:hover {
            color: #666;
        }

        .price-block {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin: 8px 0;
            width: 100%;
        }

        .current-price {
            font-size: 18px;
            font-weight: 600;
            color: #222;
        }

        /* Pagination */
        .pagination-container {
            margin: 40px 0 60px;
        }

        .pagination {
            gap: 5px;
        }

        .pagination .page-link {
            border: 1px solid #e5e5e5;
            color: #666;
            padding: 8px 16px;
            font-size: 14px;
            background: white;
            border-radius: 4px !important;
            transition: all 0.2s ease;
        }

        .pagination .page-item.active .page-link {
            background-color: #222;
            border-color: #222;
            color: white;
        }

        .pagination .page-link:hover {
            background-color: #222;
            border-color: #222;
            color: white;
        }

        .pagination .page-item.disabled .page-link {
            background-color: #f8f9fa;
            color: #6c757d;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .product-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 20px;
            }
        }

        @media (max-width: 768px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .search-title {
                font-size: 24px;
            }
        }

        @media (max-width: 576px) {
            .search-title {
                font-size: 20px;
            }

            .pagination .page-link {
                padding: 6px 12px;
                font-size: 13px;
            }

            .pagination {
                gap: 3px;
            }
        }

        /* Mặc định màu chữ sẽ là đen */
        body {
            color: black;
        }

        /* Khi trang ở chế độ dark mode, màu chữ sẽ là trắng */
        @media (prefers-color-scheme: dark) {
            body {
                color: white;
            }

            /* Cập nhật màu chữ trong các phần cụ thể */
            .search-title,
            .search-count,
            .product-name {
                color: white;
            }

            .filter-button {
                color: white;
                /* Chỉnh màu chữ của các nút lọc */
                background: #222;
            }

            .price-block .current-price {
                color: white;
            }

            /* Các phần khác có thể cập nhật màu tương tự như vậy */
        }

        /* Khi trang ở chế độ light mode, màu chữ sẽ là đen */
        @media (prefers-color-scheme: light) {
            body {
                color: black;
            }

            .search-title,
            .search-count,
            .product-name {
                color: black;
            }

            .filter-button {
                color: black;
                /* Chỉnh màu chữ của các nút lọc */
                background: white;
            }

            .price-block .current-price {
                color: black;
            }

            /* Các phần khác có thể cập nhật màu tương tự như vậy */
        }
    </style>
</head>

<!-- views/search-results.php -->

<body>
    <?php require_once "layout/header.php"; ?>

    <main style="min-height: 350px;">
        <div class="search-container">
            <div class="search-header">
                <h1 class="search-title">Kết quả tìm kiếm: "<?= htmlspecialchars($keyword) ?>"</h1>
                <div class="search-count"><?= $totalProducts ?> sản phẩm</div>
            </div>

            <?php if (empty($searchResults)): ?>
                <div class="search-empty">
                    <p>Không tìm thấy sản phẩm nào phù hợp với từ khóa "<?= htmlspecialchars($keyword) ?>"</p>
                </div>
            <?php else: ?>
                <div class="search-filters">
                    <?php
                    // Lấy giá trị từ URL
                    $selectedPriceFilter = $_GET['price_filter'] ?? ''; // Lọc theo giá
                    $selectedSortBy = $_GET['sort_by'] ?? '';          // Sắp xếp
                    ?>

                    <!-- Lọc theo giá -->
                    <select id="price-filter" class="filter-button">
                        <option value="" <?= $selectedPriceFilter === '' ? 'selected' : '' ?>>Lọc theo giá</option>
                        <option value="under-1m" <?= $selectedPriceFilter === 'under-1m' ? 'selected' : '' ?>>Dưới 1 triệu</option>
                        <option value="1m-5m" <?= $selectedPriceFilter === '1m-5m' ? 'selected' : '' ?>>Từ 1 - 5 triệu</option>
                        <option value="5m-10m" <?= $selectedPriceFilter === '5m-10m' ? 'selected' : '' ?>>Từ 5 - 10 triệu</option>
                        <option value="over-10m" <?= $selectedPriceFilter === 'over-10m' ? 'selected' : '' ?>>Trên 10 triệu</option>
                    </select>

                    <!-- Sắp xếp -->
                    <select id="sort-by" class="filter-button">
                        <option value="" <?= $selectedSortBy === '' ? 'selected' : '' ?>>Sắp xếp</option>
                        <option value="price-asc" <?= $selectedSortBy === 'price-asc' ? 'selected' : '' ?>>Giá tăng dần</option>
                        <option value="price-desc" <?= $selectedSortBy === 'price-desc' ? 'selected' : '' ?>>Giá giảm dần</option>
                        <option value="newest" <?= $selectedSortBy === 'newest' ? 'selected' : '' ?>>Mới nhất</option>
                    </select>

                    <!-- Nút áp dụng -->
                    <button id="apply-filters" class="filter-button">Áp dụng</button>
                </div>

                <div class="product-grid">
                    <?php foreach ($searchResults as $product): ?>
                        <div class="product-card">
                        <div class="product-image">
                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $product['id'] ?>">
                                <img src="<?= BASE_URL . $product['anh_san_pham'] ?>"
                                     alt="<?= htmlspecialchars($product['ten_san_pham']) ?>"
                                     onerror="this.src='<?= BASE_URL ?>assets/images/no-image.jpg'">
                            </a>
                        </div>
                        <div class="product-info">
                            <div class="price-block">
                                <span class="current-price" style="color: red;"><?= number_format($product['gia_ban'], 0, ',', '.') ?>₫</span>
                            </div>
                            <h3 class="product-name">
                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $product['id'] ?>">
                                    <?= htmlspecialchars($product['ten_san_pham']) ?>
                                </a>
                            </h3>
                        </div>
                        <!-- Thay reviews bằng thông báo tồn kho -->
                        <span class="stock-status ms-16 pt-3 fs-14px">
                            <?php if ($product['so_luong_ton_kho'] > 0): ?>
                                <span class="text-success"  style="text-align: center;">Sản phẩm còn hàng</span>
                            <?php else: ?>
                                <span class="text-danger"  style="text-align: center;">Sản phẩm hết hàng</span>
                            <?php endif; ?>
                        </span>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Pagination -->
            <?php if ($totalPages > 1): ?>
                <div class="pagination-container">
                    <ul class="pagination justify-content-center">
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?act=search&keyword=<?= urlencode($keyword) ?>&page=<?= ($page - 1) ?>">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php
                        $startPage = max(1, $page - 2);
                        $endPage = min($totalPages, $page + 2);

                        if ($startPage > 1) {
                            echo '<li class="page-item"><a class="page-link" href="?act=search&keyword=' . urlencode($keyword) . '&page=1">1</a></li>';
                            if ($startPage > 2) {
                                echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                            }
                        }

                        for ($i = $startPage; $i <= $endPage; $i++):
                        ?>
                            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                <a class="page-link" href="?act=search&keyword=<?= urlencode($keyword) ?>&page=<?= $i ?>">
                                    <?= $i ?>
                                </a>
                            </li>
                        <?php endfor;

                        if ($endPage < $totalPages) {
                            if ($endPage < $totalPages - 1) {
                                echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                            }
                            echo '<li class="page-item"><a class="page-link" href="?act=search&keyword=' . urlencode($keyword) . '&page=' . $totalPages . '">' . $totalPages . '</a></li>';
                        }
                        ?>

                        <?php if ($page < $totalPages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?act=search&keyword=<?= urlencode($keyword) ?>&page=<?= ($page + 1) ?>">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <?php require_once "layout/footer.php"; ?>
    <?php require_once "layout/libs_js.php"; ?>

    <script>
        document.getElementById('apply-filters').addEventListener('click', function() {
            const keyword = new URLSearchParams(window.location.search).get('keyword') || '';
            const page = 1; // Reset về trang 1 khi áp dụng bộ lọc mới
            const priceFilter = document.getElementById('price-filter').value;
            const sortBy = document.getElementById('sort-by').value;

            // Tạo URL mới với các tham số lọc và sắp xếp
            const url = new URL(window.location.href);
            url.searchParams.set('keyword', keyword);
            url.searchParams.set('page', page);
            if (priceFilter) {
                url.searchParams.set('price_filter', priceFilter);
            } else {
                url.searchParams.delete('price_filter');
            }
            if (sortBy) {
                url.searchParams.set('sort_by', sortBy);
            } else {
                url.searchParams.delete('sort_by');
            }

            // Chuyển hướng đến URL mới
            window.location.href = url.toString();
        });
    </script>
</body>


</html>