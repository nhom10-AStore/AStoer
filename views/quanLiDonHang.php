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

.table th, .table td {
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
    .table th, .table td {
        padding: 10px;
    }
}

</style>
<body>
    <!-- HEADER -->
    <?php
    require_once "layout/header.php";
    ?>

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
                        <th scope="col">Tên Đơn Hàng</th>
                        <th scope="col">Trạng Thái Thanh Toán</th>
                        <th scope="col">Trạng Thái Đơn Hàng</th>
                        <th scope="col">Hành Động</th>
                    </tr>
                </thead>
				<tbody id="orders-table-body">
                    <?php foreach ($quanliDonhang as $key => $donHang): ?>
                    <tr style="color:black">
                        <td><?= $key + 1 ?></td>
                        <td><?= htmlspecialchars($donHang['ma_don_hang']) ?></td>
                        <td>
                            <?php
                            $listSanPham = $this->modelDonHang->getListSpDonHang($donHang['id']);
                            echo !empty($listSanPham) ? htmlspecialchars($listSanPham[0]['ten_san_pham']) : "Không có sản phẩm";
                            ?>
                        </td>
                        <td>
                            <span class="badge <?= $donHang['trang_thai_thanh_toan'] == 1 ? 'bg-success' : 'bg-danger' ?>">
                                <?= $donHang['trang_thai_thanh_toan'] == 1 ? 'Đã Thanh Toán' : 'Chưa Thanh Toán' ?>
                            </span>
                        </td>
                        <td><?= htmlspecialchars($donHang['ten_trang_thai']) ?></td>
                        <td>
                            <a href="?act=chi-tiet-don-hang&id_don_hang=<?= $donHang['id'] ?>" 
                                class="btn btn-warning btn-sm">
                                Xem Chi Tiết
                            </a>
                            <?php if (in_array($donHang['ten_trang_thai'], ['Đã hủy', 'Đã thất bại', 'Đã hoàn thành']) && $donHang['trang_thai_thanh_toan'] == 1): ?>
                            <a href="#" class="btn btn-success btn-sm">Mua Lại</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

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
</html>
