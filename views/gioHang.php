<!DOCTYPE html>
<html lang="vi" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giỏ hàng</title>
    <?php require_once "layout/libs_css.php"; ?>
</head>

<body>
    <?php require_once "layout/header.php"; ?>

    <section class="container py-5">
        <div class="shopping-cart">
            <h1 class="text-center mb-4">Giỏ hàng</h1>

            <form id="cartForm" method="POST" class="table-responsive-md mb-4">
                <table class="table table-hover border">
                    <thead class="bg-body-secondary">
                        <tr class="text-uppercase">
                            <th scope="col" class="text-center">Sản phẩm</th>
                            <th scope="col" class="text-center">Số lượng</th>
                            <th scope="col" class="text-center">Đơn giá</th>
                            <th scope="col" class="text-center">Tổng tiền</th>
                            <th scope="col" class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($chiTietGioHang as $sanPham):
                            $sanPhamId = $sanPham['san_pham_id'];
                            $tenSanPham = htmlspecialchars($sanPham['ten_san_pham']);
                            $anhSanPham = htmlspecialchars(BASE_URL . $sanPham['anh_san_pham']);
                            $giaBan = number_format($sanPham['gia_ban'], 0, ',', '.');
                            // $giaKhuyenMai = number_format($sanPham['gia_khuyen_mai'], 0, ',', '.');
                            $soLuong = htmlspecialchars($sanPham['so_luong']);
                            $tongTien = number_format($sanPham['gia_ban'] * $sanPham['so_luong'], 0, ',', '.');
                        ?>
                            <tr class="cart-item" data-id="<?= $sanPhamId ?>">
                                <td class="align-middle">
                                    <div class="d-flex align-items-center">
                                        <img src="<?= $anhSanPham ?>"
                                            class="img-fluid me-3" alt="<?= $tenSanPham ?>"
                                            width="75" height="100" loading="lazy">
                                        <div>
                                            <h6 class="mb-1">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPhamId ?>" class="text-decoration-none">
                                                    <?= $tenSanPham ?>
                                                </a>
                                            </h6>
                                            <span class="fw-bold">
                                                <?= $giaBan ?> ₫
                                            </span>
                                            <!-- <span class="fw-bold">
                                            <?= $giaKhuyenMai ?> ₫
                                        </span> -->
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <div class="input-group input-group-sm mx-auto" style="max-width: 150px;">
                                        <button type="button" class="btn btn-outline-secondary quantity-decrease">-</button>
                                        <input type="number" class="form-control text-center quantity-input"
                                            name="quantity[<?= $sanPhamId ?>]"
                                            value="<?= $soLuong ?>"
                                            min="1" max="99"
                                            data-price="<?= htmlspecialchars($sanPham['gia_ban']) ?>">
                                        <button type="button" class="btn btn-outline-secondary quantity-increase">+</button>
                                    </div>
                                </td>
                                <td class="align-middle text-center">
                                    <?= $giaBan ?> ₫
                                </td>
                                <td class="align-middle text-center item-total">
                                    <?= $tongTien ?> ₫
                                </td>
                                <td class="align-middle text-center">
                                    <form action="<?= BASE_URL . '?act=xoa-gio-hang' ?>"
                                        method="POST"
                                        class="d-inline delete-form">
                                        <input type="hidden" name="san_pham_id" value="<?= $sanPhamId ?>">
                                        <button type="button" class="btn btn-link text-danger delete-btn">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </form>

            <div class="row">
                <div class="col-md-8 mb-3">
                    <a href="<?= BASE_URL ?>" class="btn btn-outline-primary">
                        <i class="fa fa-arrow-left me-2"></i>Tiếp tục mua sắm
                    </a>
                </div>
                <div class="col-md-8 mb-3">
                    <a href="#" class="btn btn-primary w-30" id="updateQuantityBtn">
                        Cập nhật số lượng
                    </a>
                  
                    <?php
                    if (isset($_SESSION['success_message'])) {
                        echo '<div class="alert alert-success w-30">' . $_SESSION['success_message'] . '</div>';
                        unset($_SESSION['success_message']);
                    }
                  
                    if (isset($_SESSION['error_message'])) {
                        echo '<div class="alert alert-danger w-30">' . $_SESSION['error_message'] . '</div>';
                        unset($_SESSION['error_message']);
                    }
                    ?>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <span>Tổng tiền hàng:</span>
                                <span class="fw-bold" id="subtotal">0 ₫</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span>Phí vận chuyển:</span>
                                <span class="fw-bold">15.000 ₫</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="fs-5">Tổng thanh toán:</span>
                                <span class="fs-5 fw-bold text-primary" id="total">0 ₫</span>
                            </div>
                            <button type="button" id="checkoutBtn" class="btn btn-primary w-100">
                                Thanh toán
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    require_once "views/layout/footer.php";
    require_once "layout/libs_js.php";
    ?>

    <script>
        (() => {
            const SHIPPING_FEE = 15000;
            const cart = {
                formatCurrency: (number) => {
                    return new Intl.NumberFormat('vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    }).format(number).replace('₫', '') + ' ₫';
                },

                calculateTotals: () => {
                    const subtotal = [...document.querySelectorAll('.cart-item')].reduce((total, row) => {
                        const quantityInput = row.querySelector('.quantity-input');
                        const price = parseInt(quantityInput.dataset.price);
                        const quantity = parseInt(quantityInput.value);
                        return total + (price * quantity);
                    }, 0);

                    const total = subtotal + SHIPPING_FEE;

                    document.getElementById('subtotal').textContent = cart.formatCurrency(subtotal);
                    document.getElementById('total').textContent = cart.formatCurrency(total);
                },

                updateItemTotal: (row) => {
                    const quantityInput = row.querySelector('.quantity-input');
                    const price = parseInt(quantityInput.dataset.price);
                    const quantity = parseInt(quantityInput.value);
                    row.querySelector('.item-total').textContent = cart.formatCurrency(price * quantity);
                    cart.calculateTotals();
                },

                handleQuantityChange: (row, change) => {
                    const input = row.querySelector('.quantity-input');
                    let value = parseInt(input.value) + change;
                    value = Math.max(1, Math.min(10000, value));
                    input.value = value;
                    cart.updateItemTotal(row);
                },

                deleteItem: (sanPhamId) => {
                    const row = document.querySelector(`.cart-item[data-id="${sanPhamId}"]`);
                    if (!row) {
                        console.error('Không tìm thấy hàng sản phẩm');
                        return;
                    }

                    const formData = new FormData();
                    formData.append('san_pham_id', sanPhamId);

                    fetch('<?= BASE_URL . '?act=xoa-gio-hang' ?>', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(result => {
                            if (result.success) {
                                row.remove();
                                cart.calculateTotals();
                                alert(result.message);
                            } else {
                                alert(result.message);
                            }
                        })
                        .catch(error => {
                            console.error('Lỗi khi xóa sản phẩm:', error);
                            alert('Đã xảy ra lỗi, vui lòng thử lại!');
                        });
                },

                updateQuantitiesAndCheckout: () => {
                    const form = document.getElementById('cartForm');
                    const updateUrl = '<?= BASE_URL . '?act=cap-nhat-gio-hang' ?>';

                    // Create a FormData object to submit quantities
                    const formData = new FormData(form);

                    fetch(updateUrl, {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => {
                            if (response.ok) {
                              
                                window.location.href = '<?= BASE_URL ?>';
                            } else {
                                throw new Error('Cập nhật giỏ hàng không thành công');
                            }
                        })
                        .catch(error => {
                            console.error('Lỗi:', error);
                            alert('Đã xảy ra lỗi khi cập nhật giỏ hàng. Vui lòng thử lại.');
                        });
                },

                initializeEventListeners: () => {
                    document.querySelectorAll('.cart-item').forEach(row => {
                        const quantityInput = row.querySelector('.quantity-input');

                        row.querySelector('.quantity-decrease').addEventListener('click', () =>
                            cart.handleQuantityChange(row, -1));

                        row.querySelector('.quantity-increase').addEventListener('click', () =>
                            cart.handleQuantityChange(row, 1));

                        quantityInput.addEventListener('change', () => {
                            quantityInput.value = Math.max(1, Math.min(10000, parseInt(quantityInput.value) || 1));
                            cart.updateItemTotal(row);
                        });
                    });
                }
            };

            document.addEventListener('DOMContentLoaded', () => {
                document.querySelectorAll('.delete-btn').forEach(btn => {
                    btn.addEventListener('click', () => {
                        const sanPhamId = btn.closest('.cart-item').dataset.id;
                        if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
                            cart.deleteItem(sanPhamId);
                        }
                    });
                });

                // Update Quantity Button
                document.getElementById('updateQuantityBtn').addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelector('#cartForm').action = '<?= BASE_URL . '?act=cap-nhat-gio-hang' ?>';
                    document.querySelector('#cartForm').submit();
                });

                // Checkout Button
                document.getElementById('checkoutBtn').addEventListener('click', function(e) {
                    e.preventDefault();

                    // Kiểm tra xem giỏ hàng có sản phẩm hay không
                    const cartItems = document.querySelectorAll('.cart-item');
                    if (cartItems.length === 0) {
                        alert('Giỏ hàng của bạn hiện tại trống. Vui lòng thêm sản phẩm vào giỏ hàng để thanh toán.');
                        return; // Dừng sự kiện nếu giỏ hàng trống
                    }

                    if (confirm('Bạn có muốn tiến hành thanh toán?')) {
                        // Điều hướng sang trang thanh toán
                        window.location.href = '<?= BASE_URL . '?act=thanh-toan' ?>';
                    }
                });

                cart.initializeEventListeners();
                cart.calculateTotals();
            });

        })();
    </script>
</body>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    cart.calculateTotals();  // Đảm bảo tính lại tổng tiền khi giỏ hàng được tải lại.

    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const sanPhamId = btn.closest('.cart-item').dataset.id;
            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
                cart.deleteItem(sanPhamId);
            }
        });
    });

    // Thêm sự kiện cho việc cập nhật giỏ hàng
    document.getElementById('updateQuantityBtn').addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector('#cartForm').action = '<?= BASE_URL . '?act=cap-nhat-gio-hang' ?>';
        document.querySelector('#cartForm').submit();
    });

    // Sự kiện thanh toán
    document.getElementById('checkoutBtn').addEventListener('click', function(e) {
        e.preventDefault();

        // Kiểm tra giỏ hàng có sản phẩm không
        const cartItems = document.querySelectorAll('.cart-item');
        if (cartItems.length === 0) {
            alert('Giỏ hàng của bạn hiện tại trống. Vui lòng thêm sản phẩm vào giỏ hàng để thanh toán.');
            return; // Dừng nếu giỏ hàng trống
        }

        if (confirm('Bạn có muốn tiến hành thanh toán?')) {
            // Điều hướng tới trang thanh toán
            window.location.href = '<?= BASE_URL . '?act=thanh-toan' ?>';
        }
    });

    cart.initializeEventListeners();
    cart.calculateTotals();  // Đảm bảo tổng tiền được tính chính xác khi trang được tải
});

</script>
</html>