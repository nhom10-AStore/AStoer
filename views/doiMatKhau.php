<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">


<!-- Mirrored from themesbrand.com/velzon/html/master/auth-pass-change-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:32:05 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Create New Password | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="admin/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="admin/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="admin/assets/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="admin/assets/images/logo-light.png" alt="" height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">Premium Admin & Dashboard Template</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4 card-bg-fill">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Thay đổi mật khẩu</h5>

                                </div>

                                <div class="p-2">
                                    <form action="?act=xu-ly-doi-mat-khau" method="POST">
                                        <input type="hidden" name="id" value="<?= $_SESSION['user']['id'] ?>"> <?php if (isset($_SESSION['message']) && $_SESSION['message_type'] == "error"): ?> <div class="alert alert-danger"> <?= $_SESSION['message'] ?> </div> <?php unset($_SESSION['message'], $_SESSION['message_type']); ?> <?php endif; ?> <div class="mb-3"> <label class="form-label" for="mat_khau_cu">Mật khẩu cũ</label>
                                            <div class="position-relative auth-pass-inputgroup"> <input type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Enter password" id="mat_khau_cu" name="mat_khau_cu" aria-describedby="passwordInput"  required> <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="button"><i class="ri-eye-fill align-middle"></i></button> </div>
                                        </div>
                                        <div class="mb-3"> <label class="form-label" for="mat_khau_moi1">Mật khẩu mới</label>
                                            <div class="position-relative auth-pass-inputgroup"> <input type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Enter password" id="mat_khau_moi1" name="mat_khau_moi1" aria-describedby="passwordInput" required> <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="button"><i class="ri-eye-fill align-middle"></i></button> </div>
                                        </div>
                                        <div class="mb-3"> <label class="form-label" for="mat_khau_moi2">Nhập lại mật khẩu</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3"> <input type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Confirm password" id="mat_khau_moi2" name="mat_khau_moi2" required> <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="button"><i class="ri-eye-fill align-middle"></i></button> </div>
                                        </div>
                                        <div class="mt-4"> <button class="btn btn-success w-100" type="submit">Đổi mật khẩu</button> </div>
                                    </form>

                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> AStore <i class="mdi mdi-heart text-danger"></i>code by nhóm 10 dự án 1
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="admin/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="admin/assets/libs/node-waves/waves.min.js"></script>
    <script src="admin/assets/libs/feather-icons/feather.min.js"></script>
    <script src="admin/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="admin/assets/js/plugins.js"></script>

    <!-- particles js -->
    <script src="admin/assets/libs/particles.js/particles.js"></script>

    <!-- particles app js -->
    <script src="admin/assets/js/pages/particles.app.js"></script>

    <!-- password-addon init -->
    <script src="admin/assets/js/pages/passowrd-create.init.js"></script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/master/auth-pass-change-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:32:05 GMT -->

</html>