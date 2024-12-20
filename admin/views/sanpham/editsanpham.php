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
<style>
    .card-info {
        border: 1px solid #17a2b8;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #17a2b8;
        color: #fff;
        padding: 15px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: 600;
    }

    .card-tools .btn-tool {
        color: #fff;
        font-size: 1.2rem;
    }

    .card-body {
        padding: 20px;
    }

    .table-responsive {
        margin-top: 10px;
    }

    .table-hover {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }

    .table-hover th,
    .table-hover td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .table-hover th {
        background-color: #f1f1f1;
        font-weight: bold;
    }


    .table-hover tbody tr:hover {
        background-color: #f9f9f9;
    }

    .table-hover img {
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .badge-success,
    .badge-danger {
        border: none;
        padding: 8px 12px;
        font-size: 0.9rem;
        border-radius: 5px;
        cursor: pointer;
    }

    .badge-success {
        background-color: #28a745;
        color: #fff;
    }

    .badge-success:hover {
        background-color: #218838;
    }

    .badge-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .badge-danger:hover {
        background-color: #c82333;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .card-footer {
        background-color: #f8f9fa;
        padding: 15px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
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
                        <div class="col-md-12">
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
                        <div class="col-md-8">

                            <div class="h-100">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1" style="color: white;">Sửa thông tin sản phẩm: <?= $SanPham['ten_san_pham'] ?></h4>

                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <form action="<?= BASE_URL_ADMIN ?>?act=sua-san-pham" method="POST" enctype="multipart/form-data">
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
                                                            <br> <img " src=" <?= BASE_URL . $SanPham['anh_san_pham'] ?>" style=" width: 120px;
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
                                                            <label for="emailidInput" class="form-label">Số lượng ton kho</label>
                                                            <input type="number" class="form-control" name="so_luong_ton_kho" value="<?= $SanPham['so_luong_ton_kho'] ?>">
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['so_luong_ton_kho']) ? $_SESSION['errors']['so_luong_ton_kho'] : '' ?>

                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="form-group col-12">
                                                        <div class="mb-3">
                                                            <label for="#" class="form-label">Thông số</label>
                                                            <textarea id="#" name="thong_so" class="form-control" rows="4"><?= $SanPham['thong_so'] ?></textarea>
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
                                                            <textarea id="mo_ta" name="mo_ta" class="form-control" rows="4"><?= $SanPham['mo_ta'] ?></textarea>
                                                            <span class="text-danger">
                                                                <?= !empty($_SESSION['errors']['mo_ta']) ? $_SESSION['errors']['mo_ta'] : '' ?>

                                                            </span>

                                                        </div>
                                                    </div>
                                                    <!--end col-->

                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="editor" class="form-label">Mô tả chi tiết</label>
                                                            <textarea id="editor" class="form-control" name="mo_ta_chi_tiet"><?= $SanPham['mo_ta_chi_tiet'] ?></textarea>
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


                                        <!--end col-->

                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- /.card -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="color: white; ">Album ảnh sản phẩm</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body p-2">
                                    <div class="table-responsive">
                                        <form action="<?= BASE_URL_ADMIN . '?act=sua-album-anh-san-pham' ?>" method="post" enctype="multipart/form-data">

                                            <table id="faqs" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Ảnh</th>
                                                        <th>File</th>
                                                        <th>
                                                            <div class="text-center"><button onclick="addfaqs();" type="button"
                                                                    class="badge badge-success"><i class="fa fa-plus"></i> Thêm</button></div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <input type="hidden" name="san_pham_id" value="<?= $SanPham['id'] ?>">
                                                    <input type="hidden" id="img_delete" name="img_delete">
                                                    <?php foreach ($listAnhSanPham as $key => $value): ?>
                                                        <tr id="faqs-row-<?= $key ?>">
                                                            <input type="hidden" name="current_img_ids[]" value="<?= $value['id'] ?>">
                                                            <td><img src="<?= BASE_URL . $value['link_hinh_anh'] ?>" style="width: 50px; height: 50px" alt="">
                                                            </td>
                                                            <td><input type="file" name="img_array[]" class="form-control"></td>
                                                            <td class="mt-10"><button class="badge badge-danger" type="button"
                                                                    onclick="removeRow(<?= $key ?>, <?= $value['id'] ?>);"><i class="fa fa-trash"></i>
                                                                    Delete</button></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary">Sửa thông tin</button>
                                </div>
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>

                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
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
    var faqs_row = <?= count($listAnhSanPham) ?>;

    function addfaqs() {
        html = '<tr id="faqs-row-' + faqs_row + '">';
        html += '<td><img src="https://via.placeholder.com/100" style="width: 50px; height: 50px" alt=""></td>';
        html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
        html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(' + faqs_row + ', null);"><i class="fa fa-trash"></i> Delete</button></td>';
        html += '</tr>';

        $('#faqs tbody').append(html);

        faqs_row++;
    }

    function removeRow(rowId, imgId) {
        $('#faqs-row-' + rowId).remove();
        if (imgId !== null) {
            var imgDeleteInput = document.getElementById('img_delete');
            var currentValue = imgDeleteInput.value;
            imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
        }
    }
</script>
<script>
    ClassicEditor.create(document.querySelector('#editor')).catch(error => {
        console.error(error);
    });
</script>
<script>
    var quill = new Quill('#addtor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{
                    'header': '1'
                }, {
                    'header': '2'
                }, {
                    'font': []
                }],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }],
                ['bold', 'italic', 'underline'],
                [{
                    'align': []
                }],
                ['link', 'image']
            ]
        }
    });
</script>

</html>