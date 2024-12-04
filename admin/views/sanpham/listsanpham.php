<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Quan Li San Pham| AStore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
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
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">quan li san pham</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chủ</a></li>
                                        <li class="breadcrumb-item active">Danh sách sản phẩm</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">

                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Danh sach san pham </h4>

                                        <form class="pri-add-circle-line align-middle me-1">
                                            <input type="text" id="search-options" placeholder="Tìm kiếm sản phẩm..." onkeyup="searchProducts()" autocomplete="off" class="">
                                            <span class="mdi mdi-magnify search-widget-icon btn btn-light"></span>
                                            <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                                        </form>



                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-nowrap align-middle mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">STT</th>

                                                            <th scope="col">Tên sản phẩm </th>
                                                            <th scope="col">Ảnh sản phẩm</th>
                                                            <th scope="col">Giá tiền</th>
                                                            <th scope="col">Ngày nhập</th>
                                                            <th scope="col">Số lượng</th>
                                                            <th scope="col">Số lượng tồn kho</th>
                                                            <th scope="col">Thông số</th>
                                                            <th scope="col">Mô tả</th>
                                                            <th scope="col">Danh mục</th>
                                                            <th scope="col">Trạng thái</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($listSanPham as $index => $sanPham) :
                                                        ?>
                                                            <tr>
                                                                <td class="fw-medium"><?= $index + 1 ?></td>
                                                                <td><?= $sanPham['ten_san_pham'] ?></td>
                                                                <td>
                                                                    <img src="<?= BASE_URL .  $sanPham['anh_san_pham'] ?>" style="width: 100px" alt=""
                                                                        onerror="this.onerror=null; this.src='https:img.pikbest.com/wp/202345/cat-dog-pet-and-pets-in-real-pictures-wallpapers_9596134.jpg!w700wp'">
                                                                </td>
                                                                <td><?= $sanPham['gia_ban'] ?></td>
                                                                <td><?= $sanPham['ngay_nhap'] ?></td>
                                                                <td><?= $sanPham['so_luong'] ?></td>
                                                                <td><?= $sanPham['so_luong_ton_kho'] ?></td>
                                                                <td><?= (strlen($sanPham['thong_so']) > 50) ? substr($sanPham['thong_so'], 0, 50) . "..." : $sanPham['thong_so']; ?> </td>
                                                                <td><?= (strlen($sanPham['mo_ta']) > 50) ? substr($sanPham['mo_ta'], 0, 50) . "..." : $sanPham['mo_ta']; ?> </td>
                                                                <td><?= $sanPham['ten_danh_muc'] ?></td>

                                                                <td>
                                                                    <?php
                                                                    if ($sanPham['trang_thai'] == 1) {
                                                                    ?>
                                                                        <span class="badge bg-success">Còn Hàng</span>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <span class="badge bg-danger">Hết Hàng</span>

                                                                    <?php
                                                                    }
                                                                    ?>

                                                                </td>
                                                                <td>
                                                                    <div class="hstack gap-3 flex-wrap">
                                                                        <a href="?act=chi_tiet_san_pham&id_san_pham=<?= $sanPham['id'] ?>"><i class="ri-eye-line"></i></a>
                                                                        <a href="?act=form-sua-san-pham&id_san_pham=<?= $sanPham['id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                                        <form action="?act=xoa-san-pham&id_san_pham=<?= $sanPham['id'] ?>" method="POST" onsubmit="return confirm('ban co dong y xoa khong')">
                                                                            <input type="hidden" name="quan_tri_id" value="<?= $sanPham['id'] ?>">
                                                                            <button type="submit" class="link-danger fs-15" style="border: none; background: none;"><i class="ri-delete-bin-line"></i></button>
                                                                        </form>
                                                                        <!-- <a href="javascript:void(0);" class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a> -->
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        <?php endforeach;  ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div><!-- end card-body -->
                                </div><!-- end card -->
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
            const query = searchInput.value.toLowerCase().trim(); // Lấy giá trị nhập vào trong ô tìm kiếm
            if (query === "") {
                return; // Nếu ô tìm kiếm trống, không làm gì cả
            }
            rows.forEach(row => {
                const name = row.querySelector("td:nth-child(2)").innerText.toLowerCase(); // Lấy tên người dùng từ cột thứ 2
                const email = row.querySelector("td:nth-child(3)").innerText.toLowerCase(); // Lấy email người dùng từ cột thứ 3

                // Kiểm tra nếu tìm kiếm có chứa từ khóa trong tên hoặc email
                if (name.includes(query) || email.includes(query)) {
                    row.style.display = ""; // Hiển thị người dùng nếu tên hoặc email chứa từ khóa
                } else {
                    row.style.display = "none"; // Ẩn người dùng nếu không khớp với từ khóa
                }
            });
            // Hiển thị biểu tượng đóng khi có kết quả tìm kiếm
            closeIcon.classList.remove("d-none");
        });

        // Khi nhấn vào biểu tượng đóng
        closeIcon.addEventListener("click", function() {
            rows.forEach(row => {
                row.style.display = ""; // Hiển thị tất cả người dùng
            });

            // Ẩn biểu tượng đóng
            closeIcon.classList.add("d-none");

            // Xóa giá trị trong ô tìm kiếm
            searchInput.value = "";
        });
    });
</script>

</html>