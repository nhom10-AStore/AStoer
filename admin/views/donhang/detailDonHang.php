<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="dark" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Chi tiết đơn hàng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- HEADER -->
        <?php
        require_once "views/layouts/header.php";

        require_once "views/layouts/siderbar.php";
        ?>

        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý đơn hàng</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Danh sách đơn hàng</li>
                                        <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                        <!-- Order Details -->
                        <div class="col-xl-9">
                            <!-- Product List Card -->
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h5 class="card-title flex-grow-1 mb-0">
                                            <i class="ri-shopping-cart-line me-2"> Mã đơn hàng: <?= $donHang['ma_don_hang'] ?></i>
                                        </h5>
                                        <h5 class="card-title flex-grow-1 mb-0">
                                            <i class="ri-calendar-event-line me-2"> Ngày đặt: <?= $donHang['ngay_dat'] ?></i>
                                        </h5>
                                        <div>
                                            <span class="badge bg-<?= $colorAlerts ?>-subtle text-<?= $colorAlerts ?> fs-12">
                                                <?= $donHang['ten_trang_thai'] ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover align-middle mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Sản phẩm</th>

                                                    <th class="text-end" style="width: 120px;">Đơn giá</th>
                                                    <th class="text-center" style="width: 100px;">Số lượng</th>
                                                    <th class="text-center" style="width: 100px;">Khuyến mãi</th>
                                                    <th class="text-end" style="width: 120px;">Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $tong_tien = 0;
                                                foreach ($sanPhamDonHang as $key => $sanPham):
                                                    $tong_tien += $sanPham['so_luong'] * ($sanPham['gia_ban']  - $sanPham['gia_ban'] * $sanPham['gia_tri'] / 100);
                                                    // var_dump($tong_tien); die;  
                                                    // var_dump($sanPham);
                                                    // die;
                                                ?>

                                                    <tr>
                                                        <td class="text-center"><?= $key + 1 ?></td>
                                                        <td>
                                                            <h6 class="mb-0"><?= $sanPham['ten_san_pham'] ?></h6>
                                                        </td>
                                                        <td class="text-end">
                                                            <?= number_format($sanPham['gia_ban'], 0, ',', '.') ?> đ
                                                        </td>
                                                        <td class="text-center"><?= $sanPham['so_luong'] ?></td>
                                                        <td class="text-end">
                                                            <?= isset($sanPham['gia_tri']) && $sanPham['gia_tri'] ? number_format($sanPham['gia_tri']) . ' %' : '0 %' ?>
                                                        </td>

                                                        <td class="text-end">
                                                            <?= number_format($sanPham['so_luong'] * ($sanPham['gia_ban']  - $sanPham['gia_ban'] * $sanPham['gia_tri'] / 100), 0, ',', '.') ?> đ
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <!-- Summary -->
                                                <!-- <tr></tr> -->
                                                <tr class="table-light">
                                                    <td colspan="5" class="text-end fw-bold">Tổng tiền sản phẩm:</td>
                                                    <td class="text-end fw-bold">
                                                        <?= number_format($tong_tien, 0, ',', '.') ?> đ
                                                    </td>
                                                </tr>
                                                <tr class="table-light">
                                                    <td colspan="5" class="text-end">Phí vận chuyển:</td>
                                                    <td class="text-end"><?= number_format($sanPham['phi_van_chuyen']) ?></td>
                                                </tr>
                                                <tr class="table-light">
                                                    <td colspan="5" class="text-end fw-bold">Tổng thanh toán:</td>
                                                    <td class="text-end fw-bold fs-5 text-primary">
                                                        <?= number_format($tong_tien + $sanPham['phi_van_chuyen'], 0, ',', '.') ?> đ
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Order Status Card -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">
                                        <i class="ri-map-pin-time-line me-2"></i>Trạng thái đơn hàng
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if ($donHang['trang_thai_id'] == 1) {
                                        $colorAlerts = 'primary';
                                    } elseif ($donHang['trang_thai_id'] >= 2 && $donHang['trang_thai_id'] <= 4) {
                                        $colorAlerts = 'warning';
                                    } elseif ($donHang['trang_thai_id'] == 5) {
                                        $colorAlerts = 'success';
                                    } else {
                                        $colorAlerts = 'danger';
                                    }
                                    ?>
                                    <div class="alert alert-<?= $colorAlerts; ?> text-center" role="alert">
                                        <?= $donHang['ten_trang_thai'] ?>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Customer Info -->
                        <div class="col-xl-3">
                            <!-- Payment Info -->
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">
                                        <i class="ri-secure-payment-line me-2"></i>Thông tin thanh toán
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="text-muted mb-1">Phương thức thanh toán</div>
                                        <td class="fw-medium">
                                            <?php
                                            if ($donHang['phuong_thuc_thanh_toan'] == 1) { ?>
                                                <span>COD(Thanh toán khi nhận hàng)</span>
                                            <?php
                                            } else { ?>
                                                <span>VNPay</span>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                    </div>
                                    <div class="mb-3">
                                        <div class="text-muted mb-1">Trạng thái thanh toán</div>
                                        <td class="fw-medium">
                                            <?php
                                            if ($donHang['trang_thai_thanh_toan'] == 1) { ?>
                                                <span class="badge bg-success">Đã thanh toán</span>
                                            <?php
                                            } else { ?>
                                                <span class="badge bg-danger">Chưa thanh toán</span>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                    </div>
                                    <div>
                                        <div class="text-muted mb-1">Số tiền thanh toán</div>
                                        <div class="fw-medium fs-5 text-primary">
                                            <?= number_format($tong_tien + 20000, 0, ',', '.') ?> đ
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Customer Details -->
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">
                                        <i class="ri-user-3-line me-2"></i>Thông tin khách hàng
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <div class="avatar-lg mx-auto mb-2">
                                            <img src="./uploads/avt.png" alt="" srcset="" width="100" style="border-radius:50%">
                                        </div>
                                        <h5 class="mb-1"><?= $donHang['ten_nguoi_nhan'] ?></h5>
                                    </div>
                                    <ul class="list-unstyled mb-0">
                                        <li class="mb-3">
                                            <i class="ri-mail-line me-2 text-muted"></i>
                                            <span class="fw-medium"><?= $donHang['email_nguoi_nhan'] ?></span>
                                        </li>
                                        <li class="mb-3">
                                            <i class="ri-phone-line me-2 text-muted"></i>
                                            <span class="fw-medium"><?= $donHang['sdt_nguoi_nhan'] ?></span>
                                        </li>
                                        <li class="mb-3">
                                            <i class="ri-map-pin-line me-2 text-muted"></i>
                                            <span class="fw-medium"><?= $donHang['dia_chi_nguoi_nhan'] ?></span>
                                        </li>
                                        <li>
                                            <i class="ri-sticky-note-line me-2 text-muted"></i>
                                            <span class="fw-medium"><?= $donHang['ghi_chu'] ?></span>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Admin Dashboard
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Thiết kế bởi Admin
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>

</body>

</html>