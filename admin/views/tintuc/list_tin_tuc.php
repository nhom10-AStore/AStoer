<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Danh sách tin tức | AStore</title>
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
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                                <h4 class="mb-sm-0">Quản lý tin tức</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Danh sách tin tức</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Danh sách tin tức</h4>
                                        <form class="position-relative">
                                            <input type="text" class="" placeholder="Search..." autocomplete="off" id="search-options" value="">
                                            <span class="mdi mdi-magnify search-widget-icon"></span>
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
                                                            <th scope="col">Tên bài viết</th>
                                                            <th scope="col">Nội dung</th>
                                                            <th scope="col">Ngày đăng</th>
                                                            <th scope="col">Lượt xem</th>
                                                            <th scope="col">Trạng thái bài viết</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($tinTucs as $index => $tinTuc): ?>
                                                            <tr>
                                                                <td class="fw-medium"><?= $index + 1 ?></td>
                                                                <td class="tieu_de_bai_viet"><?= $tinTuc['tieu_de_bai_viet'] ?> </td>
                                                                <td><?= (strlen($tinTuc['noi_dung_bai_viet']) > 50) ? substr($tinTuc['noi_dung_bai_viet'], 0, 50) . "..." : $tinTuc['noi_dung_bai_viet']; ?> </td>
                                                                <td><?= $tinTuc['ngay_dang_bai'] ?> </td>
                                                                <td><?= $tinTuc['luot_xem'] ?> </td>
                                                                <td>
                                                                    <?php
                                                                    if ($tinTuc['trang_thai_bai_viet'] == 1) { ?>
                                                                        <span class="badge bg-success">Hiện</span>
                                                                    <?php
                                                                    } else { ?>
                                                                        <span class="badge bg-danger">Ẩn</span>
                                                                    <?php
                                                                    }
                                                                    ?>



                                                                </td>
                                                                <td>
                                                                    <div class="hstack gap-3 flex-wrap">
                                                                        <a href="?act=form-sua-tin-tuc&id=<?= $tinTuc['id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                                        <form action="?act=xoa-tin-tuc" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết?')">
                                                                            <input type="hidden" name="id" value="<?= $tinTuc['id'] ?>">
                                                                            <button type="submit" style="border:none; background:none; " class="link-danger fs-15"><i class="ri-delete-bin-line"></i></button>
                                                                        </form>
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
            const query = searchInput.value.toLowerCase().trim(); // Lấy giá trị nhập vào trong ô tìm kiếm
            if (query === "") {
                return; // Nếu ô tìm kiếm trống, không làm gì cả
            }

            rows.forEach(row => {
                const title = row.querySelector(".tieu_de_bai_viet").innerText.toLowerCase(); // Lấy tiêu đề bài viết

                // Kiểm tra nếu tìm kiếm tương đối (tiêu đề chứa phần từ khóa) hoặc tìm kiếm tuyệt đối (tiêu đề chính xác với từ khóa)
                if (title.includes(query)) { // Tìm kiếm tương đối
                    row.style.display = ""; // Hiển thị bài viết nếu tiêu đề chứa từ khóa
                } else {
                    row.style.display = "none"; // Ẩn bài viết nếu tiêu đề không chứa từ khóa
                }
            });

            // Hiển thị biểu tượng đóng khi có kết quả tìm kiếm
            closeIcon.classList.remove("d-none");
        });

        // Khi nhấn vào biểu tượng đóng
        closeIcon.addEventListener("click", function() {
            rows.forEach(row => {
                row.style.display = ""; // Hiển thị tất cả bài viết
            });

            // Ẩn biểu tượng đóng
            closeIcon.classList.add("d-none");

            // Xóa giá trị trong ô tìm kiếm
            searchInput.value = "";
        });
    });
</script>

</html>