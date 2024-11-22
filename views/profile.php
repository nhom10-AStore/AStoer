<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page 07 - Glowing - Bootstrap 5 HTML Templates</title>
    <!-- CSS -->
    <?php
    require_once "layout/libs_css.php";
    ?>

</head>

<body>
    <?php
    require_once "layout/header.php";

    // require_once "layout/siderbar.php";
    ?>
    <main id="content" class="bg-body-tertiary-01 d-flex flex-column main-content">
        <div class="dashboard-page-content" data-animated-id="1">

            <div class="row mb-9 align-items-center justify-content-between">

                <div class="col-sm-6 mb-8 mb-sm-0">
                    <h2 class="fs-4 mb-0">Thông tin cá nhân</h2>
                </div>
            </div>


            <div class="card mb-4 rounded-4 p-7">
                <div class="card-body pt-7 pb-0 px-0">
                    <div class="row mx-n8">
                        <div class="col-lg-13 px-12 ">
                            <section class="p-xl-8">
                                <form class="form-border-1" id="profileForm" action="?act=xu-ly-thay-doi-thong-tin-ca-nhan&id=<?= $_SESSION['user']['id'] ?>" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $_SESSION['user']['id'] ?>">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="row gx-9">
                                                <div class="col-6 mb-6"> <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase" for="ho_ten">Họ tên</label> <input class="form-control" type="text" value="<?= $taiKhoan['ho_ten'] ?>" id="ho_ten" name="ho_ten" readonly> </div>
                                                <div class="col-lg-6 mb-6"> <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase" for="email">Email</label> <input class="form-control" type="email" value="<?= $taiKhoan['email'] ?>" id="email" name="email" readonly> </div>
                                                <div class="col-lg-6 mb-6"> <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase" for="gioi_tinh">Giới tính</label> <select class="form-control" id="gioi_tinh" name="gioi_tinh" disabled>
                                                        <option value="1" <?= ($taiKhoan['gioi_tinh'] == 1) ? 'selected' : '' ?>>Nam</option>
                                                        <option value="2" <?= ($taiKhoan['gioi_tinh'] == 2) ? 'selected' : '' ?>>Nữ</option>
                                                    </select> </div>
                                                <div class="col-lg-6 mb-6"> <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase" for="so_dien_thoai">Số điện thoại</label> <input class="form-control" type="tel" value="<?= $taiKhoan['so_dien_thoai'] ?>" id="so_dien_thoai" name="so_dien_thoai" readonly> </div>
                                                <div class="col-lg-12 mb-6"> <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase" for="dia_chi">Địa chỉ</label> <input class="form-control" type="text" value="<?= $taiKhoan['dia_chi'] ?>" id="dia_chi" name="dia_chi" readonly> </div>
                                                <div class="col-lg-6 mb-6"> <label class="mb-5 fs-13px ls-1 fw-semibold text-uppercase" for="ngay_sinh">Ngày sinh</label> <input class="form-control" type="date" value="<?= $taiKhoan['ngay_sinh'] ?>" id="ngay_sinh" name="ngay_sinh" readonly> </div>
                                            </div>
                                        </div>
                                        <aside class="col-lg-4">
                                            <div class="text-lg-center">
                                                <div class="mx-auto"> <img class="mb-9 rounded-pill" src="<?= $taiKhoan['anh_dai_dien'] ?>" height="200" width="200" id="avatar-preview"> </div>
                                                <div class="d-none" id="changeImageContainer"> <input type="file" class="form-control" name="anh_dai_dien" id="anh_dai_dien"> </div>
                                            </div>
                                        </aside>
                                    </div> <br> <button class="btn btn-primary" type="button" id="editButton" onclick="enableEditing()">Thay đổi thông tin</button> <button class="btn btn-primary d-none" type="submit" id="saveButton">Lưu thông tin</button>
                                </form>

                                <hr class="my-8">
                                <div class="row">
                                    <div class="col-md-8">
                                        <article class="d-flex p-10 mb-10 bg-body-tertiary border rounded">
                                            <div class="col-md-10" >
                                                <h6 class="fs-14px mb-0 font-weight-500">Mật khẩu</h6>
                                                <small class="text-muted d-block" style="width: 70%">Bạn muốn thay đổi mật khẩu?</small>
                                            </div>
                                            <div>
                                                <a class="btn border btn-hover-text-light btn-hover-bg-primary btn-hover-border-primary btn-sm" href="?act=doi-mat-khau&id=<?= $_SESSION['user']['id'] ?>">Đổi mật khẩu</a>
                                            </div>

                                        </article>
                                    </div>
                                </div>

                            </section>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </main>
    <script>
        function enableEditing() {
            document.querySelectorAll('#profileForm input').forEach(input => input.removeAttribute('readonly'));
            document.querySelectorAll('#profileForm select').forEach(select => select.removeAttribute('disabled'));
            document.getElementById('changeImageContainer').classList.remove('d-none');
            document.getElementById('editButton').classList.add('d-none');
            document.getElementById('saveButton').classList.remove('d-none');
        }
    </script>
    <?php
    require_once "./views/layout/footer.php";
    require_once "layout/libs_js.php";
    
    ?>
</body>