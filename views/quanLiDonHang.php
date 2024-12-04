<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lí sản phẩm</title>




</head>

<!-- CSS -->
<?php
require_once "layout/libs_css.php";
?>
<style>
    /* Custom search styles */
    .custom-search-form {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .search-input {
        flex-grow: 1;
        max-width: 300px;
        padding: 10px;
        border: 2px solid #007bff;
        border-radius: 5px;
        outline: none;
        transition: border-color 0.3s;
    }

    .search-input:focus {
        border-color: #0056b3;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .search-button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .search-button:hover {
        background-color: #0056b3;
    }

    /* Table Styles */
    .table {
        border-collapse: collapse;
        width: 100%;
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .table thead {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
        text-transform: uppercase;
    }

    .table th,
    .table td {
        padding: 15px;
        text-align: center;
        border: 1px solid #dee2e6;
    }

    .table th {
        font-size: 16px;
        text-align: center;
    }

    .table tbody tr {
        transition: background-color 0.3s;
    }

    .table tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    .table tbody tr:hover {
        background-color: #f1f3f5;
    }

    .badge {
        font-size: 14px;
        padding: 5px 10px;
        border-radius: 12px;
    }

    .badge.bg-success {
        background-color: #28a745;
        color: #fff;
    }

    .badge.bg-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .btn {
        font-size: 14px;
        padding: 5px 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-warning {
        background-color: #ffc107;
        color: #212529;
        border: none;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .btn-success {
        background-color: #28a745;
        color: white;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    /* Responsive table */
    .table-responsive {
        overflow-x: auto;
    }

    @media (max-width: 768px) {

        .table th,
        .table td {
            padding: 10px;
        }
    }

    .table-responsive {
        width: 100%;
    }
</style>

<body>
    <!-- HEADER -->
    <?php
    require_once "layout/header.php";
    ?>

    <main style="min-height: 500px;">
        <div class="container py-5">
            <h2 class="text-center text-danger mb-5">Danh Sách Quản Lý Đơn Hàng</h2>

            <!-- Search Form -->
            <div class="custom-search-form">
                <input
                    type="text"
                    id="search-input"
                    placeholder="Tìm kiếm mã đơn hàng hoặc tên đơn hàng..."
                    class="search-input">
                <button id="search-button" class="search-button">🔍</button>
            </div>

            <!-- Orders Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="bg-primary text-white">
                        <tr class="text-uppercase">
                            <th scope="col">STT</th>
                            <th scope="col">Mã Đơn Hàng</th>
                            <th scope="col">Giá tiền</th>
                            <th scope="col">Ngày đặt</th>
                            <th scope="col">Trạng Thái Thanh Toán</th>
                            <th scope="col">Trạng Thái Đơn Hàng</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody id="orders-table-body">
                        <?php foreach ($quanliDonhang as $key => $donHang): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= htmlspecialchars($donHang['ma_don_hang']) ?></td>
                                <td><?= number_format(htmlspecialchars($donHang['thanh_toan']), 0, ',', '.') . ' ₫' ?></td>
                                <td><?= $donHang['ngay_dat'] < date('Y-m-d') ? date('Y-m-d') : $donHang['ngay_dat'] ?></td>
                                <td>
                                    <span class="badge <?= $donHang['trang_thai_thanh_toan'] == 1 ? 'bg-success' : 'bg-danger' ?>">
                                        <?= $donHang['trang_thai_thanh_toan'] == 1 ? 'Đã Thanh Toán' : 'Chưa Thanh Toán' ?>
                                    </span>
                                </td>
                                <td><?= htmlspecialchars($donHang['ten_trang_thai']) ?></td>
                                <td>
                                    <a href="?act=chi-tiet-don-hang&id_don_hang=<?= $donHang['id'] ?>" class="btn btn-warning btn-sm">Xem Chi Tiết</a>

                                    <?php if ($donHang['ten_trang_thai'] === 'Chờ xác nhận'): ?>
                                        <a href="?act=huy-don-hang&id_don_hang=<?= $donHang['id'] ?>" class="btn btn-danger btn-sm">Hủy</a>

                                        <!-- Nút "Mua Lại" -->
                                    <?php elseif ($donHang['ten_trang_thai'] === 'Đã hủy' || $donHang['ten_trang_thai'] === 'Đã hoàn thành'): ?>
                                        <a href="?act=mua-lai&id_don_hang=<?= $donHang['id'] ?>" class="btn btn-success btn-sm">Mua Lại</a>
                                    <?php endif; ?>


                                    <!-- Hiển thị nút "Xác nhận đơn hàng" nếu thanh toán chưa hoàn thành (trạng thái thanh toán = 0) -->
                                    <?php if ($donHang['trang_thai_thanh_toan'] == 2): ?>
                                        <a href="?act=xac-nhan-don-hang&id_don_hang=<?= $donHang['id'] ?>" class="btn btn-info btn-sm">Xác nhận đơn hàng</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>







                </table>
                <div class="pagination-container text-center mt-4">
                    <button id="prev-btn" class="btn btn-info">Trước</button>
                    <span id="page-info"></span>
                    <button id="next-btn" class="btn btn-info">Tiếp</button>
                </div>
            </div>
        </div>
    </main>

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layout/footer.php";
    require_once "layout/libs_js.php";
    ?>
</body>
<!-- JavaScript Tim kiem-->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const searchInput = document.getElementById("search-input");
        const searchButton = document.getElementById("search-button");
        const tableBody = document.getElementById("orders-table-body");
        const rows = Array.from(tableBody.querySelectorAll("tr"));

        // Perform search
        const performSearch = (query) => {
            const lowerQuery = query.trim().toLowerCase();

            rows.forEach((row) => {
                const orderId = row.children[1].textContent.toLowerCase();
                const orderName = row.children[2].textContent.toLowerCase();

                // Show row if matches found
                if (orderId.includes(lowerQuery) || orderName.includes(lowerQuery)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });

            // Show an alert if no matches are found
            const anyVisible = rows.some(row => row.style.display !== "none");
            if (!anyVisible) {
                alert("Không tìm thấy kết quả phù hợp!");
            }
        };

        // Handle search button click
        searchButton.addEventListener("click", (e) => {
            e.preventDefault();
            performSearch(searchInput.value);
        });

        // Handle Enter key for search
        searchInput.addEventListener("keydown", (e) => {
            if (e.key === "Enter") {
                e.preventDefault();
                performSearch(searchInput.value);
            }
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const rowsPerPage = 5; // Số dòng mỗi trang
        const tableBody = document.getElementById("orders-table-body");
        const rows = Array.from(tableBody.querySelectorAll("tr"));
        const totalRows = rows.length;
        const totalPages = Math.ceil(totalRows / rowsPerPage);
        let currentPage = 1;

        const prevBtn = document.getElementById("prev-btn");
        const nextBtn = document.getElementById("next-btn");
        const pageInfo = document.getElementById("page-info");

        function showPage(page) {
            // Ẩn tất cả các dòng
            rows.forEach((row, index) => {
                row.style.display = "none";
            });

            // Hiển thị các dòng của trang hiện tại
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            rows.slice(start, end).forEach(row => {
                row.style.display = "";
            });

            // Cập nhật trạng thái nút và thông tin trang
            pageInfo.textContent = `Trang ${page} / ${totalPages}`;
            prevBtn.disabled = page === 1;
            nextBtn.disabled = page === totalPages;
        }

        // Gắn sự kiện cho các nút
        prevBtn.addEventListener("click", function() {
            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage);
            }
        });

        nextBtn.addEventListener("click", function() {
            if (currentPage < totalPages) {
                currentPage++;
                showPage(currentPage);
            }
        });

        // Hiển thị trang đầu tiên
        showPage(currentPage);
    });
</script>

</html>