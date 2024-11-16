<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Danh Sách đơn hàng | A Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once  "views/layouts/libs_css.php";
    ?>

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
                                <h4 class="mb-sm-0">Quản lý danh sách đơn hàng</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Danh sách đơn hàng</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col">
                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Danh sách danh sách đơn hàng</h4>
                                        <form class="position-relative">
                                            <input type="text" id="search-options" placeholder="Tìm kiếm đơn hàng..." autocomplete="off" class="">
                                            <span class="mdi mdi-magnify search-widget-icon"></span>
                                            <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                                        </form>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-nowrap align-middle mb-0" style="width: 1000px;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">STT</th>
                                                            <!-- <th scope="col">Tài khoản</th> -->
                                                            <th scope="col">Mã đơn hàng</th>
                                                            <!-- <th scope="col">Tên người nhận</th> -->
                                                            <!-- <th scope="col">Email người nhận</th>
                                                            <th scope="col">Số điện thoại người nhận</th> -->
                                                            <!-- <th scope="col">Địa chỉ người nhận</th> -->
                                                            <th scope="col">Ngày đặt</th>
                                                            <!-- <th scope="col">Mã khuyến mãi</th> -->
                                                            <th scope="col">Phương thức thanh toán</th>
                                                            <th scope="col">Trạng thái thanh toán</th>
                                                            <!-- <th scope="col">Thanh toán</th> -->
                                                            <th scope="col">Trạng thái</th>
                                                            <!-- <th>Ghi chú</th> -->
                                                            <th scope="col">Hành động</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($donHangs as $index => $donHang) : ?>
                                                            <tr>
                                                                <td class="fw-medium"><?= $index + 1 ?></td>

                                                                <td class="fw-medium"><?= $donHang['ma_don_hang'] ?></td>

                                                                <td class="fw-medium"><?= $donHang['ngay_dat'] ?></td>
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

                                                                <td class="fw-medium"><?= $donHang['ten_trang_thai'] ?></td>

                                                                <td>
                                                                    <div class="hstack gap-3 flex-wrap">

                                                                        <a href="?act=don-hangs&id=<?= $donHang['ma_don_hang'] ?>" class="link-success fs-15"><i class="bx bx-clipboard"></i></a>
                                                                        <?php if ($donHang['trang_thai_id'] == 7): ?>
                                                                            <form action="?act=xoa-don-hang" method="POST"
                                                                                onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                                                <input type="hidden" name="trang_thai_id" value="<?= $donHang['id'] ?>">
                                                                                <button type="submit" class="link-danger fs-15" style="border: none; background: none;">
                                                                                    <i class="ri-delete-bin-line"></i>
                                                                                </button>
                                                                            </form>
                                                                        <?php else: ?>
                                                                            <a href="?act=form-sua-don-hang&id=<?= $donHang['id'] ?>" class="link-warning">
                                                                                <i class="ri-settings-4-line"></i>
                                                                            </a>
                                                                        <?php endif; ?>

                                                                    </div>
                                                                </td>

                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                            </div> <!-- end .h-100-->
                        </div> <!-- end col -->
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
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

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <?php
    require_once "views/layouts/libs_js.php";
    ?>

</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("search-options");
        const searchIcon = document.querySelector(".mdi-magnify.search-widget-icon");
        const closeIcon = document.getElementById("search-close-options");
        const rows = document.querySelectorAll("tbody tr");

        // Khi nhấn vào biểu tượng kính lúp để thực hiện tìm kiếm
        searchIcon.addEventListener("click", function() {
            const query = searchInput.value.toLowerCase().trim();
            if (query === "") {
                return;
            }

            rows.forEach(row => {
                const account = row.querySelector("td:nth-child(2)").innerText.toLowerCase(); // Lấy tài khoản từ cột thứ 2
                const orderId = row.querySelector("td:nth-child(3)").innerText.toLowerCase(); // Lấy mã đơn hàng từ cột thứ 3

                // Kiểm tra nếu tìm kiếm có chứa từ khóa trong tài khoản hoặc mã đơn hàng
                if (account.includes(query) || orderId.includes(query)) {
                    row.style.display = ""; // Hiển thị dòng nếu tài khoản hoặc mã đơn hàng chứa từ khóa
                } else {
                    row.style.display = "none"; // Ẩn dòng nếu không khớp
                }
            });

            // Hiển thị biểu tượng đóng khi có kết quả tìm kiếm
            closeIcon.classList.remove("d-none");
        });

        // Khi nhấn vào biểu tượng đóng
        closeIcon.addEventListener("click", function() {
            rows.forEach(row => {
                row.style.display = ""; // Hiển thị tất cả các dòng
            });

            closeIcon.classList.add("d-none"); // Ẩn biểu tượng đóng
            searchInput.value = ""; // Xóa giá trị trong ô tìm kiếm
        });
    });
</script>


</html>