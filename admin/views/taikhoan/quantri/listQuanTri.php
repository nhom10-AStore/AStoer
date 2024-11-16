<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

  <meta charset="utf-8" />
  <title>Quan Li San Pham| NN Shop</title>
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
                 
                      </div>
                  </ol>
                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">

              <div class="h-100">
                <div class="card">
                  <div class="card-header align-items-center d-flex card-title">
                    <h4 class="card-title mb-0 flex-grow-1">Danh sách sản phẩm </h4>
                    <a href="<?= BASE_URL_ADMIN . '?act=form-them-quan-tri' ?>">
                          <button class="btn btn-success">Thêm tài khoản</button>
                        </a>  
                  </div><!-- end card header -->

                  <div class="card-body">
                    <div class="live-preview">
                      <div class="table-responsive">
                        <table class="table table-striped table-nowrap align-middle mb-0">
                          <thead>
                            <tr>
                              <th>STT</th>
                              <th>Họ tên</th>
                              <th>Email</th>
                              <th>SĐT</th>
                              <th>Trạng thái</th>
                              <th>Thao tác</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($listQuanTri as $key => $quanTri) : ?>
                              <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $quanTri['ho_ten'] ?></td>
                                <td><?= $quanTri['email'] ?></td>
                                <td><?= $quanTri['so_dien_thoai'] ?></td>
                                <td><?= $quanTri['trang_thai'] == 1 ? 'Hoạt động' : 'Không hoạt động' ?></td>
                                <td>
                                  <a href="<?= BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri=' . $quanTri['id'] ?>">
                                    <button class="btn btn-warning">Sửa</button>
                                  </a>
                                  <a href="<?= BASE_URL_ADMIN . '?act=reset-password&id_quan_tri=' . $quanTri['id'] ?>" onclick="return confirm('Bạn có muốn reset password tài khoản này?')">
                                    <button class="btn btn-danger">Reset</button>
                                  </a>
                                </td>
                              </tr>
                            <?php endforeach ?>
                          </tbody>
                          <!-- <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                  </tr>
                  </tfoot> -->
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.container-fluid -->
              </section>
              <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

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
  ClassicEditor.create(document.querySelector('#editor')).catch(error => {
    console.error(error);
  });
</script>

</html>