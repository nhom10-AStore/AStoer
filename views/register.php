<!doctype html>
<html lang="vi" data-layout="vertical" data-topbar="dark" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8" />
    <title>Register | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="admin/assets/images/favicon.ico">

    <!-- CSS Styles -->
    <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="admin/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="admin/assets/css/custom.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="auth-page-wrapper pt-5">
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>
            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <div class="auth-page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4 card-bg-fill">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Đăng ký ngay!</h5>
                                    <p class="text-muted">Tạo tài khoản để truy cập hệ thống.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="?act=dangky" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="mb-3">
                                                <label for="ho_ten" class="form-label">Họ tên</label>
                                                <input type="text" class="form-control" id="ho_ten" name="ho_ten" placeholder="Nhập họ tên">
                                                <span class="text-danger"><?= !empty($_SESSION['errors']['ho_ten']) ? $_SESSION['errors']['ho_ten'] : '' ?></span>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="bannerImageInput" class="form-label">Ảnh đại diện</label>
                                                    <input type="file" class="form-control" id="bannerImageInput" name="anh_dai_dien" accept="uploads/">
                                                    <span class="text-danger">
                                                        <?= !empty($_SESSION['errors']['anh_dai_dien']) ? $_SESSION['errors']['anh_dai_dien'] : '' ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="ngay_sinh" class="form-label">Ngày Sinh</label>
                                                <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh">
                                                <span class="text-danger"><?= !empty($_SESSION['errors']['ngay_sinh']) ? $_SESSION['errors']['ngay_sinh'] : '' ?></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email">
                                                <span class="text-danger"><?= !empty($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                                                <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai" placeholder="Nhập số điện thoại">
                                                <span class="text-danger"><?= !empty($_SESSION['errors']['so_dien_thoai']) ? $_SESSION['errors']['so_dien_thoai'] : '' ?></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="gioi_tinh" class="form-label">Giới tính</label>
                                                <select class="form-select" name="gioi_tinh" id="gioi_tinh">
                                                    <option value="" selected disabled>Chọn giới tính</option>
                                                    <option value="1">Nam</option>
                                                    <option value="2">Nữ</option>
                                                </select>
                                                <span class="text-danger"><?= !empty($_SESSION['errors']['gioi_tinh']) ? $_SESSION['errors']['gioi_tinh'] : '' ?></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="dia_chi" class="form-label">Địa chỉ</label>
                                                <input type="text" class="form-control" id="dia_chi" name="dia_chi" placeholder="Nhập địa chỉ">
                                                <span class="text-danger"><?= !empty($_SESSION['errors']['dia_chi']) ? $_SESSION['errors']['dia_chi'] : '' ?></span>
                                            </div>

                                            <div class="mb-3">
                                                <label for="mat_khau" class="form-label">Mật khẩu</label>
                                                <input type="password" class="form-control" id="mat_khau" name="mat_khau" placeholder="Nhập mật khẩu">
                                                <span class="text-danger"><?= !empty($_SESSION['errors']['mat_khau']) ? $_SESSION['errors']['mat_khau'] : '' ?></span>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p class="mb-0 text-muted">&copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script> AStore. All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- JS Scripts -->
    <script src="admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="admin/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="admin/assets/libs/node-waves/waves.min.js"></script>
</body>

</html>