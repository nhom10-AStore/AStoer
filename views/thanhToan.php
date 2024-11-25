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

    <main id="content" class="wrapper layout-page">
        <section class="container pb-14 pb-lg-19">
            <div class="text-center">
                <h2 class="mb-6">Thanh toán</h2>
            </div>

            <form class="pt-12">
                <div class="row">
                    <div class="col-lg-4 pb-lg-0 pb-14 order-lg-last">
                        <div class="card border-0 rounded-0 shadow">
                            <div class="card-header px-0 mx-10 bg-transparent py-8">
                                <h4 class="fs-4 mb-8">Sản phẩm</h4>
                                <!-- <div class="d-flex w-100 mb-7">
                                    <div class="me-6">
                                        <img src="#" data-src=../assets/images/others/single-product-03.jpg class="lazy-image" width="60" height="80" alt="Natural Coconut Cleansing Oil">
                                    </div>
                                    <div class="d-flex flex-grow-1">
                                        <div class="pe-6">
                                            <a href="#" class="">Natural Coconut Cleansing Oil<span class="text-body"> x1</span></a>
                                            <p class="fs-14px text-body-emphasis mb-0 mt-1">Size:
                                                <span class="text-body">Fullsize</span>
                                            </p>

                                        </div>
                                        <div class="ms-auto">
                                            <p class="fs-14px text-body-emphasis mb-0 fw-bold">$29.00</p>
                                        </div>
                                    </div>
                                </div> -->

                            </div>
                            <div class="card-body px-10 py-8">
                                <div class="d-flex align-items-center mb-2">
                                    <span>Tổng tiền sản phẩm</span>
                                    <span class="d-block ms-auto text-body-emphasis fw-bold">99.00đ</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span>Khuyến mãi</span>
                                    <span class="d-block ms-auto text-body-emphasis fw-bold">99.00đ</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span>Phí vận chuyển<nav></nav></span>
                                    <span class="d-block ms-auto text-body-emphasis fw-bold">0đ </span>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent py-5 px-0 mx-10">
                                <div class="d-flex align-items-center fw-bold mb-6">
                                    <span class="text-body-emphasis p-0">Tổng tiền:</span>
                                    <span class="d-block ms-auto text-body-emphasis fs-4 fw-bold">99.00đ</span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-7">
                            <label class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">Mã khuyến mãi</label>
                            <div class="row">
                                <div class="col-md-12 mb-md-0 mb-7">
                                    <button type="button" class="btn btn-primary" id="showPromoCode">Nhập mã khuyến mãi</button>
                                </div>
                            </div>
                            <div class="row d-none" id="promoCodeContainer">
                                <div class="col-md-12 mb-md-0 mb-7">
                                    <input type="text" class="form-control" id="promo-code" name="promo_code" placeholder="Nhập mã khuyến mãi">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 order-lg-first pe-xl-20 pe-lg-6">
                        <div class="checkout">


                            <h4 class="fs-4 pt-4 mb-7">Thông tin người nhận</h4>
                            <div class="mb-7">
                                <label class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">Tên người nhận</label>
                                <div class="row">
                                    <div class="col-md-12 mb-md-0 mb-7">
                                        <input type="text" class="form-control" id="first-name" name="ten_nguoi_nhan" value="<?= $_SESSION['user']['ho_ten'] ?>" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-7">
                                <div class="row">
                                    <div class="col-md-12 mb-md-0 mb-7">
                                        <label for="street-address" class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">Địa chỉ người nhận</label>
                                        <input type="text" class="form-control" id="street-address" name="dia_chi" required="" value="<?= $_SESSION['user']['dia_chi'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-7">
                                <label class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">Email người nhận</label>
                                <div class="row">
                                    <div class="col-md-12 mb-md-0 mb-7">
                                        <input type="email" class="form-control" id="email" name="email" value="<?= $_SESSION['user']['email'] ?>" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-7">
                                <label class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">Số điện thoại</label>
                                <div class="col-md-12">
                                    <input type="number" class="form-control" id="phone" name="so_dien_thoai" value="<?= $_SESSION['user']['so_dien_thoai'] ?>" required="">
                                </div>
                            </div>
                            <div class="mb-7">
                                <label class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">Ghi chú</label>
                                <div class="col-md-12 " >
                                    <textarea type="text" class="form-control" id="phone" name="ghi_chu" required="" placeholder="Nhập ghi chú của bạn" ></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="checkout mb-7">
                            <div class="mb-7">
                                <h4 class="fs-4 mb-8 mt-12 pt-lg-1">Phương thức thanh toán</h4>


                                <div class="nav nav-tabs border-0">
                                    <div class="mt-3 mb-5 form-check">
                                        <input type="radio" class="form-check-input rounded-0 me-2" name="paymentMethod" id="paymentMethodCOD">
                                        <label class="text-body-emphasis" for="paymentMethodCOD">
                                            <span class="text-body-emphasis">COD - Thanh toán khi nhận hàng</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="nav nav-tabs border-0">
                                    <div class="mt-3 mb-5 form-check">
                                        <input type="radio" class="form-check-input rounded-0 me-2" name="paymentMethod" id="paymentMethodPAY">
                                        <label class="text-body-emphasis" for="paymentMethodPAY">
                                            <span class="text-body-emphasis">PAY</span>
                                        </label>
                                    </div>
                                </div>
                                <div id="qrCodeContainer" class="d-none"> <img id="qrCodeImage" src="uploads/kKrS_q_qrcode.png" width="200px" alt="QR Code for PAY" /> </div>
                            </div>
                            <button type="submit" class="btn btn-dark btn-hover-bg-primary btn-hover-border-primary px-11 mt-md-7 mt-4">Đặt hàng</button>
                        </div>

                    </div>
                </div>
            </form>
        </section>

    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const showPromoCodeButton = document.getElementById('showPromoCode');
            const promoCodeContainer = document.getElementById('promoCodeContainer');
            showPromoCodeButton.addEventListener('click', function() {
                promoCodeContainer.classList.toggle('d-none');
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const paymentMethodPAY = document.getElementById('paymentMethodPAY');
            const qrCodeContainer = document.getElementById('qrCodeContainer');

            paymentMethodPAY.addEventListener('change', function() {
                if (this.checked) {
                    qrCodeContainer.classList.remove('d-none');
                }
            });

            const paymentMethodCOD = document.getElementById('paymentMethodCOD');
            paymentMethodCOD.addEventListener('change', function() {
                if (this.checked) {
                    qrCodeContainer.classList.add('d-none');
                }
            });
        });
    </script>



    <?php
    require_once "layout/footer.php";
    ?>

    <!-- JAVASCRIPT -->
    <?php
    require_once "layout/libs_js.php";
    ?>
</body>