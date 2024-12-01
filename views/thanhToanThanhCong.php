<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thanh toán</title>
    <!-- CSS -->
    <?php
    require_once "layout/libs_css.php";
    ?>

</head>

<body>
    <?php require_once 'layout/header.php' ?>
    <main style="min-height: 350px; display: flex; justify-content: center; align-items: center; flex-direction: column; text-align: center;">
        <div style="display: flex; align-items: center; justify-content: center; gap: 15px;">
            <!-- Icon for success -->
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="green" class="bi bi-check-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
            </svg>

            <!-- Success message -->
            <h1>Bạn đã đặt hàng thành công</h1>

        </div>
        <div>
            <span>Cảm ơn quý khách đã mua hàng! Đơn hàng của quý khách đã được đặt vui lòng chọn xem chi tiết để xem đơn hàng của bạn hoặc về trang chủ để tìm kiếm thêm sản phẩm!</span>
        </div>
        <!-- Buttons for order and home -->
        <div class="mt-4">
            <a href="<?= BASE_URL . '?act=quan_li_don_hang' ?>" class="btn btn-primary mx-2">Xem đơn hàng</a>
            <a href="<?= BASE_URL ?>" class="btn btn-outline-primary mx-2">Về trang chủ</a>
        </div>
    </main>

    <?php
    require_once "views/layout/footer.php";
    require_once "layout/libs_js.php";
    ?>
</body>