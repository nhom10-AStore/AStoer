<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <?php require_once "layout/libs_css.php"; ?>
    <style>
        .container-custom {
            max-width: 1320px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Category List */
        .category-list {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            flex-wrap: wrap;
            padding: 20px 0;
            border-bottom: 1px solid #e5e5e5;
        }

        .category-button {
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
            text-decoration: none;
        }

        .category-button:hover,
        .category-button.active {
            border-color: #222;
            color: #222;
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
            /* width: 200px;
            height: 312px; */
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
            margin-bottom: 3px;
            line-height: 1.4;
            height: 40px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            width: 100%;
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
            font-weight: bold;
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
        }
    </style>
</head>

<body>
    <?php require_once "layout/header.php"; ?>

    <main style="min-height: 500px;">
        <div class="container-custom">
            <!-- Categories List -->
            <div class="category-list">
                <a href="?act=list-san-pham" class="category-button <?php echo !isset($_GET['category_id']) ? 'active' : ''; ?>">
                    Tất cả
                </a>
                <?php foreach ($categories as $category): ?>
                    <a href="?act=list-san-pham&category_id=<?php echo $category['id']; ?>"
                        class="category-button <?php echo (isset($_GET['category_id']) && $_GET['category_id'] == $category['id']) ? 'active' : ''; ?>">
                        <?php echo htmlspecialchars($category['ten_danh_muc']); ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Filters -->
            <div class="search-filters">
                <select id="price-filter" class="filter-button">
                    <option value="">Lọc theo giá</option>
                    <option value="under-1m">Dưới 1 triệu</option>
                    <option value="1m-5m">Từ 1 - 5 triệu</option>
                    <option value="5m-10m">Từ 5 - 10 triệu</option>
                    <option value="over-10m">Trên 10 triệu</option>
                </select>

                <select id="sort-by" class="filter-button">
                    <option value="">Sắp xếp</option>
                    <option value="price-asc">Giá tăng dần</option>
                    <option value="price-desc">Giá giảm dần</option>
                    <option value="newest">Mới nhất</option>
                </select>

                <button id="apply-filters" class="btn btn-success">Áp dụng</button>
            </div>

            <!-- Product Grid -->
            <div class="product-grid">
                <?php foreach ($products as $product): ?>
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
                                <span class="current-price"><?= number_format($product['gia_ban'], 0, ',', '.') ?>₫</span>
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

            <!-- Pagination -->
            <?php if ($totalPages > 1): ?>
                <div class="pagination-container">
                    <ul class="pagination justify-content-center">
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?act=list-san-pham&page=<?= ($page - 1) ?>&category_id=<?= $categoryId ?>&price_filter=<?= isset($_GET['price_filter']) ? $_GET['price_filter'] : '' ?>&sort_by=<?= isset($_GET['sort_by']) ? $_GET['sort_by'] : '' ?>">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">
                                <a class="page-link" href="?act=list-san-pham&page=<?= $i ?>&category_id=<?= $categoryId ?>&price_filter=<?= isset($_GET['price_filter']) ? $_GET['price_filter'] : '' ?>&sort_by=<?= isset($_GET['sort_by']) ? $_GET['sort_by'] : '' ?>">
                                    <?= $i ?>
                                </a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($page < $totalPages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?act=list-san-pham&page=<?= ($page + 1) ?>&category_id=<?= $categoryId ?>&price_filter=<?= isset($_GET['price_filter']) ? $_GET['price_filter'] : '' ?>&sort_by=<?= isset($_GET['sort_by']) ? $_GET['sort_by'] : '' ?>">
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
            const priceFilter = document.getElementById('price-filter').value;
            const sortBy = document.getElementById('sort-by').value;
            const currentUrl = new URL(window.location.href);

            if (priceFilter) {
                currentUrl.searchParams.set('price_filter', priceFilter);
            } else {
                currentUrl.searchParams.delete('price_filter');
            }

            if (sortBy) {
                currentUrl.searchParams.set('sort_by', sortBy);
            } else {
                currentUrl.searchParams.delete('sort_by');
            }

            window.location.href = currentUrl.toString();
        });
    </script>
</body>

</html>