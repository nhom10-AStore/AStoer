<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | NN Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php require_once "layouts/libs_css.php"; ?>
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- HEADER -->
        <?php
        require_once "layouts/header.php";
        require_once "layouts/siderbar.php";
        ?>

        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- Main content -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="row mb-3 pb-1">
                                    <div class="col-12">
                                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                            <div class="flex-grow-1">
                                                <h4 class="fs-16 mb-1">Chào buổi sáng, Admin!</h4>
                                                <p class="text-muted mb-0">Đây là thống kê cửa hàng của bạn hôm nay.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Tổng doanh thu -->
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Tổng Doanh Thu</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                            <?php echo number_format($totalRevenue, 0, ',', '.') ?> đ
                                                        </h4>
                                                        <a href="#" class="text-decoration-underline">Xem chi tiết</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-success-subtle rounded fs-3">
                                                            <i class="bx bx-dollar-circle text-success"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tổng đơn hàng -->
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Tổng Đơn Hàng</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                            <?php echo number_format($totalOrders) ?>
                                                        </h4>
                                                        <a href="#" class="text-decoration-underline">Xem tất cả đơn hàng</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-info-subtle rounded fs-3">
                                                            <i class="bx bx-shopping-bag text-info"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Đơn hàng thành công -->
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Đơn Hàng Thành Công</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                            <?php echo number_format($completedOrders) ?>
                                                        </h4>
                                                        <a href="#" class="text-decoration-underline">Xem chi tiết</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                            <i class="bx bx-check-circle text-warning"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Khách hàng -->
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Khách Hàng</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                            <?php echo number_format($countUniqueBuyers ?? 0) ?>
                                                        </h4>
                                                        <a href="#" class="text-decoration-underline">Xem danh sách</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-primary-subtle rounded fs-3">
                                                            <i class="bx bx-user-circle text-primary"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6">
                                        <div class="card card-animate">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Đơn Hàng Bị Hủy</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end justify-content-between mt-4">
                                                    <div>
                                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                            <?php echo number_format($completedOrdersCancelled) ?>
                                                        </h4>
                                                        <a href="#" class="text-decoration-underline">Xem chi tiết</a>
                                                    </div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                            <i class="bx bx-check-circle text-warning"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="card">
                                            <div class="card-header align-items-center d-flex">
                                                <h4 class="card-title mb-0 flex-grow-1">Sản phẩm nổi bật</h4>
                                            </div><!-- end card header -->

                                            <div class="card-body">
                                                <div class="table-responsive table-card">
                                                    <table class="table table-hover table-centered align-middle table-nowrap mb-3">
                                                        <thead>
                                                            <tr>
                                                                <th>STT</th>
                                                                <th>Ảnh sản phẩm</th>
                                                                <th>Tên sản phẩm</th>
                                                                <th>Giá bán</th>
                                                                <th>Số lượng</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($topProducts as $index => $product): ?>
                                                                <!-- <?php var_dump($product['anh_san_pham']); ?> -->
                                                                <tr>
                                                                    <td><?= $index + 1 ?></td>
                                                                    <td>
                                                                        <img src="<?= BASE_URL .  $product['anh_san_pham'] ?>" alt="" srcset="" width="50px" height="50px">
                                                                    </td>
                                                                    <td><?= htmlspecialchars($product['ten_san_pham']) ?></td>
                                                                    <td><?= number_format($product['gia_ban'], 0, ',', '.') ?> đ</td>
                                                                    <td><?= $product['total_sold'] ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>

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
                        </script> © NN Shop
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by NN Shop
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>

    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <?php require_once "layouts/libs_js.php"; ?>
</body>

</html>