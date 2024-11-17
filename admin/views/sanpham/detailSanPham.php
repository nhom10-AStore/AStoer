<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Chi tiết sản phẩm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />

    <!-- CSS -->
    <?php
    require_once "views/layouts/libs_css.php";
    ?>

</head>
<style>
    .product-image-thumb {
        margin-right: 10px;
    }

    #image-container {
        overflow: hidden;
        white-space: nowrap;
        display: flex;
        flex-wrap: nowrap;
    }

    #image-container img {
        display: inline-block;


    }
</style>

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
                                <h4 class="mb-sm-0">Chi tiết sản phẩm</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Danh sách sản phẩm</a></li>
                                        <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Default box -->
                    <div class="card card-solid">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <!-- <div class="col-12" style="border: 1px solid gray; padding:10px;">
                                        <img style="width: 90%; height: 500px" src="<?= BASE_URL . $SanPham['anh_san_pham'] ?>" class="product-image" alt="Product Image">
                                    </div><br> -->
                                    <div class="col-12 product-image-thumbs" style="padding: 30px 50px; ">
                                        <!-- Large Image Display -->
                                        <div class="product-image-large mb-2">
                                            <img style=" padding: 10px; border:1px solid orangered;" id="largeImage" width="400px" height="400px" src="<?= BASE_URL . $listAnhSanPham[0]['link_hinh_anh'] ?>" alt="Large Product Image">
                                        </div>
                                        <!-- Thumbnails -->
                                        <div class="d-flex flex-wrap" id="image-container">
                                            <?php foreach ($listAnhSanPham as $key => $anhSP): ?>
                                                <div class="product-image-thumb <?= $key == 0 ? 'active' : '' ?>" style="flex: 0 0 auto;">
                                                    <img style=" border:1px solid orangered;" width="70px" height="70px" src="<?= BASE_URL . $anhSP['link_hinh_anh'] ?>" alt="Product Image" onclick="changeImage('<?= BASE_URL . $anhSP['link_hinh_anh'] ?>')">
                                                </div>
                                            <?php endforeach ?>
                                        </div>

                                        <!-- View More Button -->
                                        <?php if (count($listAnhSanPham) > 5): ?>
                                            <button id="view-more-btn" class="btn btn-primary mt-2">View More</button>
                                        <?php endif; ?>
                                    </div>


                                </div>
                                <div class="col-12 col-sm-6" style="padding: 30px 50px;">
                                    <h2 class="my-3" style="color: black;">Tên sản phẩm: <?= $SanPham['ten_san_pham'] ?></h2>
                                    <hr>
                                    <h5 class="mt-3">Giá tiền: <small><?= $SanPham['gia_nhap'] ?><u>đ</u></small></h5>
                                    <h5 class="mt-3">Giá khuyến mãi: <small><?= $SanPham['gia_khuyen_mai'] ?><u>đ</u></small></h5>
                                    <h5 class="mt-3">Số lượng: <small><?= $SanPham['so_luong'] ?></small></h5>
                                    <h5 class="mt-3">Lượt xem: <small><?= $SanPham['luot_xem'] ?></small></h5>
                                    <h5 class="mt-3">Ngày nhập: <small><?= $SanPham['ngay_nhap'] ?></small></h5>
                                    <h5 class="mt-3">Danh mục: <small><?= $SanPham['ten_danh_muc'] ?></small></h5>
                                    <h5 class="mt-3">Trạng thái: <small><?= $SanPham['trang_thai'] == 1 ? 'Còn Hàng' : 'Hết Hàng' ?></small></h5>
                                    <h5 class="mt-3">Mô tả: <small><?= $SanPham['mo_ta'] ?></small></h5>
                                </div>
                            </div>
                            <br>
                            <div class="col-12">
                                <h2>Bình luận</h2>
                                <div class="comment-section">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>

                                                <th>Người bình luận</th>
                                                <th>Nội dung</th>
                                                <th>Ngày bình luận</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($listBinhLuan as $binhLuan) : ?>

                                                <tr>
                                                    <td><?= $binhLuan['ho_ten'] ?></td>
                                                    <td><?= $binhLuan['noi_dung'] ?></td>
                                                    <td><?= $binhLuan['ngay_dang'] ?></td><br>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <h2>Danh sách đánh giá</h2>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>

                                            <th>Tên khách hàng</th>
                                            <th>Đánh giá</th>
                                            <th>Nội dung</th>
                                            <th>Ngày đánh giá</th>
                                            <th>Trả lời</th>
                                            <th>Phản Hồi</th>
                                        </tr>
                                    </thead>

                                    <!-- Kiểm tra nếu biến $danhGias có tồn tại và không rỗng -->

                                    <?php foreach ($danhGias as $danhGia): ?>
                                        <tr>

                                            <td><?= $danhGia['ho_ten'] ?></td>
                                            <td><?php

                                                if ($danhGia['sao'] == 1) {
                                                ?>
                                                    <span>1 sao</span>

                                                <?php
                                                } else if ($danhGia['sao'] == 2) {
                                                ?>
                                                    <span>2 sao</span>
                                                <?php
                                                } else if ($danhGia['sao'] == 3) {
                                                ?>

                                                    <span>3 sao</span>
                                                <?php
                                                } else if ($danhGia['sao'] == 4) {
                                                ?>

                                                    <span>4 sao</span>
                                                <?php
                                                } else if ($danhGia['sao'] == 5) {
                                                ?>

                                                    <span>5 sao</span>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td><?= $danhGia['noi_dung'] ?></td>
                                            <td><?= $danhGia['ngaydg'] ?></td>
                                            <td><?= $danhGia['tra_loi'] ?></td>

                                            <td><a href="?act=form-phanhoi&danh_gia_id=<?= $danhGia['id'] ?>" class="link-success fs-15"><i class="ri-edit-2-line"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>

                                </table>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

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


<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var viewMoreBtn = document.getElementById('view-more-btn');
        var imageContainer = document.getElementById('image-container');
        var images = imageContainer.querySelectorAll('.product-image-thumb');

        function toggleImages() {
            for (var i = 5; i < images.length; i++) {
                if (images[i].style.display === 'none' || images[i].style.display === '') {
                    images[i].style.display = 'inline-block';
                } else {
                    images[i].style.display = 'none';
                }
            }
            viewMoreBtn.textContent = viewMoreBtn.textContent === 'View More' ? 'View Less' : 'View More';
        }

        if (viewMoreBtn) {
            viewMoreBtn.addEventListener('click', toggleImages);

            // Initially hide images beyond the fifth one
            for (var i = 5; i < images.length; i++) {
                images[i].style.display = 'none';
            }
        }

        // Function to change the large image
        window.changeImage = function(imageUrl) {
            var largeImage = document.getElementById('largeImage');
            largeImage.src = imageUrl;

            // Remove active class from all thumbnails
            images.forEach(function(image) {
                image.classList.remove('active');
            });

            // Add active class to the clicked thumbnail
            event.currentTarget.classList.add('active');
        }
    });
</script>