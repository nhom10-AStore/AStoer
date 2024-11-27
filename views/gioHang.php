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

            <form action="" id="cartForm" method="POST" class="table-responsive-md mb-4">
                <table class="table table-hover border">
                    <thead class="bg-body-secondary">
                        <tr class="text-uppercase">
                            <th scope="col" class="align-middle">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="selectAll">
                                </div>
                            </th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col" class="text-center">Số lượng</th>
                            <th scope="col" class="text-end">Đơn giá</th>
                            <th scope="col" class="text-end">Tổng tiền</th>
                            <th scope="col" class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($chiTietGioHang as $sanPham):
                            $sanPhamId = htmlspecialchars($sanPham['id']);
                            $tenSanPham = htmlspecialchars($sanPham['ten_san_pham']);
                            $anhSanPham = htmlspecialchars(BASE_URL . $sanPham['anh_san_pham']);
                            $giaBan = number_format($sanPham['gia_ban'], 0, ',');
                            $soLuong = htmlspecialchars($sanPham['so_luong']);
                            $tongTien = number_format($sanPham['gia_ban'] * $sanPham['so_luong'], 0, ',', '.');
                        ?>
                            <tr class="cart-item" data-id="<?= $sanPhamId ?>">
                                <td class="align-middle">
                                    <div class="form-check">
                                        <input class="form-check-input item-checkbox" type="checkbox"
                                            name="selected_items[]" value="<?= $sanPhamId ?>">
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center">
                                        <img src="<?= $anhSanPham ?>" class="img-fluid me-3" alt="<?= $tenSanPham ?>"
                                            width="75" height="100" loading="lazy">
                                        <div>
                                            <h6 class="mb-1">
                                                <a href="<?= $anhSanPham ?>" class="text-decoration-none">
                                                    <?= $tenSanPham ?>
                                                </a>
                                            </h6>
                                            <span class="fw-bold d-inline-flex align-items-baseline">
                                                <?= $giaBan ?> <span class="text-decoration-none" style="line-height: 1; margin-left: 2px;">₫</span>
                                            </span>
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
                                <td class="align-middle text-end">
                                    <?= $giaBan ?> ₫
                                </td>
                                <td class="align-middle text-end item-total">
                                    <?= $tongTien ?> ₫
                                </td>
                                <td class="align-middle text-center">
                                    <form action="<?= BASE_URL . '?act=xoa-don-hang&id_san_pham=' . $sanPham['id'] ?>"
                                        method="POST" class="d-inline delete-form">
                                        <input type="hidden" name="san_pham_id" value="<?= $sanPhamId ?>">
                                        <button type="submit" class="btn btn-link text-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </form>

            <form action="<?= BASE_URL . '?act=thanh-toan' ?>" id="cartForm" method="POST" class="table-responsive-md mb-4">
                <table class="table table-hover border">
                    <!-- Nội dung bảng giỏ hàng giữ nguyên -->
                </table>

                <div class="row">
                    <div class="col-md-8 mb-3">
                        <a href="<?= BASE_URL ?>" class="btn btn-outline-primary">
                            <i class="fa fa-arrow-left me-2"></i>Tiếp tục mua sắm
                        </a>
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
                                <button type="submit" id="checkoutBtn" class="btn btn-primary w-100">
                                    Thanh toán
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

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
                    value = Math.max(1, Math.min(99, value));
                    input.value = value;
                    cart.updateItemTotal(row);
                },

                deleteItem: async (form) => {
                    try {
                        if (!confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')) {
                            return false;
                        }

                        const formData = new FormData(form);
                        const response = await fetch(form.action, {
                            method: 'POST',
                            body: formData
                        });

                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }

                        const data = await response.json();
                        if (data.success) {
                            const cartItem = form.closest('.cart-item');
                            cartItem.style.opacity = '0';
                            setTimeout(() => {
                                cartItem.remove();
                                cart.calculateTotals();
                                alert(data.message || 'Đã xóa sản phẩm khỏi giỏ hàng');
                            }, 300);
                        } else {
                            throw new Error(data.message);
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        alert(error.message || 'Có lỗi xảy ra khi xóa sản phẩm');
                    }
                },

                initializeEventListeners: () => {
                    document.querySelectorAll('.cart-item').forEach(row => {
                        const quantityInput = row.querySelector('.quantity-input');

                        row.querySelector('.quantity-decrease').addEventListener('click', () =>
                            cart.handleQuantityChange(row, -1));

                        row.querySelector('.quantity-increase').addEventListener('click', () =>
                            cart.handleQuantityChange(row, 1));

                        quantityInput.addEventListener('change', () => {
                            quantityInput.value = Math.max(1, Math.min(99, parseInt(quantityInput.value) || 1));
                            cart.updateItemTotal(row);
                        });
                    });

                    document.querySelectorAll('.delete-form').forEach(form => {
                        form.addEventListener('submit', (e) => {
                            e.preventDefault();
                            cart.deleteItem(form);
                        });
                    });
                }
            };

            document.addEventListener('DOMContentLoaded', () => {
                cart.initializeEventListeners();
                cart.calculateTotals();
            });
        })();
    </script>
</body>

</html>