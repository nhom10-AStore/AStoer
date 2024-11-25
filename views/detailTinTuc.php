<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tin tức | AStore</title>
    <style>
    /* Đảm bảo trang chiếm toàn bộ chiều cao của cửa sổ trình duyệt */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Đảm bảo phần chính của trang chiếm toàn bộ chiều cao */
    main {
        display: flex;
        flex-direction: column;
        min-height: 100%;
    }

    /* Tối ưu hóa cho phần breadcrumb và header */
    .breadcrumb {
        margin-bottom: 0;
    }

    /* Phần tiêu đề căn giữa */
    h2 {
        text-align: center; /* Căn giữa tiêu đề */
        padding-left: 0; /* Bỏ padding trái */
    }

    /* Đảm bảo ảnh và nội dung chiếm toàn bộ chiều rộng */
    .post-content img {
        width: 100%; /* Lấp đầy chiều rộng */
        height: auto; /* Đảm bảo tỷ lệ ảnh không bị méo */
        margin-bottom: 20px;
    }

    /* Nội dung bài viết chiếm 4/5 chiều rộng của trang */
    .content-wrapper {
        width: 80%; /* Chiếm 80% chiều rộng của trang */
        max-width: 1200px; /* Giới hạn chiều rộng tối đa */
        margin: 0 auto; /* Căn giữa nội dung */
        padding: 0 20px; /* Thêm padding vào trái và phải */
    }

    /* Đảm bảo không có khoảng trống dưới phần nội dung */
    .container {
        padding-left: 0;
        padding-right: 0;
    }

    /* Các phần tử breadcrumb, tiêu đề và bài viết lấp đầy chiều rộng */
    .container, .post-content {
        width: 100%;
        max-width: 100%;
        padding-left: 15px;
        padding-right: 15px;
    }
    h2 {
        font-size: 10rem; /* Tăng kích thước chữ */
        text-align: center; /* Căn giữa tiêu đề */
        padding-left: 0; /* Bỏ padding trái */
    }
</style>

    <?php require_once "layout/libs_css.php"; ?>
</head>

<body>

    <!-- HEADER -->
    <?php require_once "layout/header.php"; ?>

    <main id="content" class="wrapper layout-page">
        <section class="z-index-2 position-relative pb-2 mb-12">
            <div class="bg-body-secondary mb-3">
                <div class="container">
                    <nav class="py-4 lh-30px" aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center py-1 mb-0">
                            <li class="breadcrumb-item"><a title="Home" href="../index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tin Tức</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </section>

        <section class="pt-10 pb-16 pb-lg-18">
            <div class="content-wrapper">
                <div class="text-center mb-13">
                    <h1 >
                        <?=$tinTuc['tieu_de_bai_viet'] ?>
                    </h1>

                    <ul class="list-inline fs-15px fw-semibold letter-spacing-01 d-flex justify-content-center align-items-center">
                        <li class="border-end px-6 text-body-emphasis border-0 text-body">
                            Dược viết bởi <a href="#">Quản trị viên</a>
                        </li>
                        <li class="list-inline-item px-6"><?= date("M d, Y", strtotime($tinTuc['ngay_dang_bai'])) ?></li>
                        <li class="ms-5 list-style-disc"><?= $tinTuc['luot_xem'] ?> views</li>
                    </ul>

                    <div class="post-content">
                        <p class="mb-6">
                            <?= $tinTuc['noi_dung_bai_viet'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <?php require_once "layout/footer.php"; ?>

    <!-- JAVASCRIPT -->
    <?php require_once "layout/libs_js.php"; ?>

</body>

</html>
