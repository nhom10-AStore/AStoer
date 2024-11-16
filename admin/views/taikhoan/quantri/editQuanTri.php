<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Sửa bài viết | AStore</title>
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
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sửa thông tin tài khoản quản trị: <?=$quanTri['ho_ten'] ?></h3>
              </div>

              <form action="<?= BASE_URL_ADMIN . '?act=sua-quan-tri' ?>" method="POST" >
                <input type="hidden" name="quan_tri_id" value="<?= $quanTri['id'] ?>" >
                <div class="card-body">
                    <div class="form-group">
                    <label>Họ tên</label>
                    <input type="text" class="form-control" name="ho_ten" value="<?=$quanTri['ho_ten'] ?>" placeholder="Nhập họ tên">
                    <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                    <?php } ?>
                  </div>

                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?=$quanTri['email'] ?>" placeholder="Nhập email">
                    <?php if (isset($_SESSION['error']['email'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                    <?php } ?>
                  </div>

                  <div class="form-group">
                    <label>SĐT</label>
                    <input type="text" class="form-control" name="so_dien_thoai"value="<?=$quanTri['so_dien_thoai'] ?>" placeholder="Nhập sđt">
                    <?php if (isset($_SESSION['error']['so_dien_thoai'])) { ?>
                        <p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
                    <?php }?>
                  </div>

                  <div class="form-group">
                <label for="inputStatus">Trạng thái</label>
                <select id="inputStatus" name="trang_thai" class="form-control custom-select">
                  <option <?= $quanTri['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Hoạt động</option>
                  <option <?= $quanTri['trang_thai'] !== 1 ? 'selected' : '' ?> value="2">Không hoạt động</option>
                </select>
              </div>
                
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
                    </div>
                    </div>

    <!-- /.content -->

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