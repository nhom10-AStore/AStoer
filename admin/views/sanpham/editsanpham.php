<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Sua san pham | NN Shop</title>
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
                                <h4 class="mb-sm-0"></h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                        <li class="breadcrumb-item active">Sửa thông tin sản phẩm</li>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Sửa thông tin sản phẩm: <?= $SanPham['ten_san_pham'] ?></h4>

                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="<?=BASE_URL_ADMIN?>?act=sua-san-pham" method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <input type="hidden" name="san_pham_id" value="<?= $SanPham['id'] ?>">
                                                            <label for="compnayNameinput" class="form-label">Mã sản phẩm</label>
                                                            <input type="text" class="form-control" placeholder="" name="ma_san_pham" value="<?= $SanPham['ma_san_pham'] ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['ma_san_pham']) ? $_SESSION['errors']['ma_san_pham'] : '' ?>

                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!--end col-->

                                                    <!--end col-->
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="emailidInput" class="form-label">Tên sản phẩm</label>
                                                            <input type="text" class="form-control" placeholder="" name="ten_san_pham" value="<?= $SanPham['ten_san_pham'] ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['ten_san_pham']) ? $_SESSION['errors']['ten_san_pham'] : '' ?>

                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="emailidInput" class="form-label">Hình ảnh sản phẩm</label>
                                                            <input type="file" class="form-control" name="anh_san_pham">
                                                            <br> <img " src="<?= BASE_URL . $SanPham['anh_san_pham'] ?>" style=" width: 120px;
                                                                                                                                                    margin-left: 40%; 
                                                                                                                                                    height: 120px;" alt="">

                                                        </div>
                                                    </div>
                                                    <!--end col-->



                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="emailidInput" class="form-label">Giá nhập</label>
                                                            <input type="number" class="form-control" placeholder="" name="gia_nhap" value="<?= $SanPham['gia_nhap'] ?>">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="emailidInput" class="form-label">Giá bán </label>
                                                            <input type="number" class="form-control" name="gia_ban" value="<?= $SanPham['gia_ban'] ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['gia_ban']) ? $_SESSION['errors']['gia_ban'] : '' ?>

                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!--end col-->

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="emailidInput" class="form-label">Giá khuyến mại</label>
                                                            <input type="number" class="form-control" name="gia_khuyen_mai" value="<?= $SanPham['gia_khuyen_mai'] ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['gia_khuyen_mai']) ? $_SESSION['errors']['gia_khuyen_mai'] : '' ?>

                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!--end col-->

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="emailidInput" class="form-label">Ngày nhập</label>
                                                            <input type="date" class="form-control" name="ngay_nhap" value="<?= $SanPham['ngay_nhap'] ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['ngay_nhap']) ? $_SESSION['errors']['ngay_nhap'] : '' ?>

                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!--end col-->

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="emailidInput" class="form-label">Số lượng</label>
                                                            <input type="number" class="form-control" name="so_luong" value="<?= $SanPham['so_luong'] ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['so_luong']) ? $_SESSION['errors']['so_luong'] : '' ?>

                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!--end col-->

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="emailidInput" class="form-label">Thông số</label>
                                                            <input type="text" class="form-control" name="thong_so" value="<?= $SanPham['thong_so'] ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['thong_so']) ? $_SESSION['errors']['thong_so'] : '' ?>

                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!--end col-->

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="emailidInput" class="form-label">Trạng thái</label>
                                                            <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                                                                <option <?= $SanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Còn Hàng</option>
                                                                <option <?= $SanPham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Hết Hàng</option>
                                                            </select>
                                                            <?php if (isset($_SESSION['errors']['trang_thai'])) { ?>
                                                                <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <!--end col-->



                                                    <div class="form-group col-12">
                                                        <div class="mb-3">
                                                            <label for="emailidInput" class="form-label">Mô tả</label>
                                                            <input type="text" class="form-control" name="mo_ta" value="<?= $SanPham['mo_ta'] ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['mo_ta']) ? $_SESSION['errors']['mo_ta'] : '' ?>

                                                            </span>

                                                        </div>
                                                    </div>
                                                    <!--end col-->

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="emailidInput" class="form-label">Mô tả chi tiết</label>
                                                            <input type="text" class="form-control" name="mo_ta_chi_tiet" value="<?= $SanPham['mo_ta_chi_tiet'] ?>">

                                                        </div>
                                                    </div>


                                                    <!--end col-->

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="inputStatus">Danh mục sản phẩm</label>
                                                            <select id="inputStatus" name="danh_muc_id" class="form-control custom-select">
                                                                <?php foreach ($listDanhMuc as $danhMuc): ?>
                                                                    <option <?= $danhMuc['id'] == $SanPham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhMuc['id'] ?>">
                                                                        <?= $danhMuc['ten_danh_muc'] ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <?php if (isset($_SESSION['error']['danh_muc_id'])) { ?>
                                                                <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-12">
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->
                                            </form>
                                        </div>
                                        <br>
                                        <div class="col-md-2">
                                            <!-- /.card -->
                                            <div class="card card-info">
                                                <div class="card-header">
                                                    <h3 class="card-title text-center">Album ảnh sản phẩm</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="table-responsive">
                                                        <form action="<?= BASE_URL_ADMIN . '?act=sua-album-anh-san-pham' ?>" method="post"
                                                            enctype="multipart/form-data">
                                                            <table id="faqs" class="table table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Ảnh</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                                                    <input type="hidden" id="img_delete" name="img_delete">
                                                                    <?php foreach ($listAnhSanPham as $key => $value): ?>
                                                                        <tr id="faqs-row-<?= $key ?>">
                                                                            <input type="hidden" name="current_img_ids[]" value="<?= $value['id'] ?>">
                                                                            <td><img src="<?= BASE_URL . $value['link_hinh_anh'] ?>" style="width: 100px; height: 100px" alt="">
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                    </div>
                                                </div>

                                                </form>
                                            </div>
                                            <!-- /.card -->
                                        </div>

                                        <!--end col-->

                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                    </form>
                                </div>

                            </div>
                        </div>
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


</html>