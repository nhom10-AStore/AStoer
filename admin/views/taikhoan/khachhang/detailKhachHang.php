<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:29:52 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Sửa bài viết | AStore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

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
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý tài khoản quản trị viên</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-6">
          <img src="<?= BASE_URL . $khachHang['anh_dai_dien'] ?>" style="width: 70%;" alt=""
            onerror="this.onerror=null;this.src='https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png?20200919003010';">
        </div>
        <div class="col-6">
          <div class="container">
            <table class="table table-borderless">
              <tbody style="font-size: large">
                <tr>
                  <th>Họ tên:</th>
                  <td><?= $khachHang['ho_ten'] ?? '' ?></td>
                </tr>
                <tr>
                  <th>Ngày sinh:</th>
                  <td><?= $khachHang['ngay_sinh'] ?? '' ?></td>
                </tr>
                <tr>
                  <th>Email:</th>
                  <td><?= $khachHang['email'] ?? '' ?></td>
                </tr>
                <tr>
                  <th>Sđt:</th>
                  <td><?= $khachHang['so_dien_thoai'] ?? '' ?></td>
                </tr>
                <tr>
                  <th>Giới tính:</th>
                  <td><?= $khachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                </tr>
                <tr>
                  <th>Địa chỉ:</th>
                  <td><?= $khachHang['dia_chi'] ?? '' ?></td>
                </tr>
                <tr>
                  <th>Trạng thái:</th>
                  <td><?= $khachHang['trang_thai'] == 1 ? 'Hoạt động' : 'Không hoạt động' ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-12">
          <h2>Lịch sử mua hàng</h2>
          <div class="">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Mã đơn hàng</th>
                  <th>Tên người nhận</th>
                  <th>SĐT</th>
                  <th>Ngày đặt</th>
                  <th>Tổng tiền</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listDonHang as $key => $donHang): ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $donHang['ma_don_hang'] ?></td>
                    <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                    <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                    <td><?= $donHang['ngay_dat'] ?></td>
                    <td><?= $donHang['tong_tien'] ?></td>
                    <td><?= $donHang['ten_trang_thai'] ?></td>
                    <td>
                      <div class="btn-group">
                        <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-don-hang&id_don_hang=' . $donHang['id'] ?>">
                          <button class="btn btn-primary"><i class="fas fa-info"></i></button>
                        </a>
                        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-don-hang&id_don_hang=' . $donHang['id'] ?>">
                          <button class="btn btn-warning"><i class="fas fa-cogs"></i></button>
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="col-12">
          <h2>Lịch sử bình luận</h2>
          <div class="">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên sản phẩm</th>
                  <th>Nội dung</th>
                  <th>Ngày bình luận</th>
                  <th>Trạng thái</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($listBinhLuan as $key => $binhLuan): ?>
                  <tr>
                    <td><?= $key + 1 ?></td>
                    <td><a target="_blank"
                        href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $binhLuan['san_pham_id'] ?>"><?= $binhLuan['ten_san_pham'] ?></a>
                    </td>
                    <td><?= $binhLuan['noi_dung'] ?></td>
                    <td><?= $binhLuan['ngay_dang'] ?></td>
                    <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Ẩn' ?></td>
                    <td>
                      <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan' ?>" method="post">
                        <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                        <input type="hidden" name="name_view" value="detail_khach">
                        <input type="hidden" name="id_khach_hang" value="<?= $binhLuan['tai_khoan_id'] ?>">
                        <button onclick="return confirm('Bạn có muốn ẩn bình luận này không?')" class="btn btn-danger"><?=$binhLuan['trang_thai']==1 ?'Ẩn':'Hiện' ?></button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
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