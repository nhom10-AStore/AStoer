<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tin tức | AStore</title>
    <!-- CSS -->
    <?php
    require_once "layout/libs_css.php";
    ?>
    <style>
        .row {
            display: flex;
            flex-direction: column; /* Sắp xếp nội dung theo chiều dọc */
            gap: 20px; /* Khoảng cách giữa các mục */
        }

        .col-md-6, .col-lg-4 {
            width: 100%; /* Đảm bảo mỗi cột chiếm toàn bộ chiều rộng */
            
        }

        .card-post-grid-1 {
            display: flex; /* Sắp xếp các phần tử theo chiều ngang */
            flex-direction: row; /* Hình ảnh bên trái, văn bản bên phải */
            align-items: center; /* Canh giữa nội dung theo chiều dọc */
            gap: 10px; /* Giảm khoảng cách giữa ảnh và văn bản */
            border: 2px solid transparent; /* Khung mặc định */
            border-radius: 10px; /* Bo góc cho khung */
            transition: border-color 0.3s ease, box-shadow 0.3s ease; /* Hiệu ứng chuyển màu khung và bóng */
        }

        .card-post-grid-1:hover {
            border-color: #007bff; /* Màu khung khi di chuột vào */
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3); /* Hiệu ứng bóng khi di chuột vào */
        }

        .card-img-top {
            max-width: 270px; /* Điều chỉnh kích thước ảnh */
            width: 100%; /* Đảm bảo ảnh không vượt quá kích thước này */
            height: 120px; /* Cố định chiều cao của ảnh */
            object-fit: cover; /* Ảnh sẽ lấp đầy khung mà không bị biến dạng */
            border-radius: 40px; /* Bo góc cho ảnh nếu cần */
        }


        .card-body {
            text-align: left; /* Căn trái cho văn bản */
            padding: 0 10px; /* Giảm khoảng cách giữa văn bản và ảnh */
        }
        .card-link {
            display: block; /* Làm cho thẻ <a> chiếm toàn bộ chiều rộng */
            text-decoration: none; /* Xóa gạch dưới */
            color: inherit; /* Giữ nguyên màu chữ */
        }


    </style>

</head>

<body>

    <!-- HEADER -->
    <?php
    require_once "layout/header.php";
    ?>

    <main id="content" class="wrapper layout-page">
        <!-- Page Title and Breadcrumb -->
        <section class="page-title z-index-2 position-relative">
            <div class="bg-body-secondary">
                <div class="container">
                    <nav class="py-4 lh-30px" aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center py-1">
                            <li class="breadcrumb-item"><a href="../index.html">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tin Tức</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="text-center py-13">
                <div class="container">
                    <h2 class="mb-0">Danh sách Tin Tức</h2>
                </div>
            </div>
        </section>

        <!-- Tin tức -->
        <div class="container mb-lg-18 mb-15 pb-3">
            <div class="row gy-50px">
                <?php foreach ($tinTucs as $index => $tinTuc): ?>
                    <div class="col-md-6 col-lg-4">
    <!-- Bọc toàn bộ trong thẻ <a> để toàn bộ phần tử bài viết đều là liên kết -->
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc&id='. $tinTuc['id'] ?>" class="card-link">
                        <article class="card card-post-grid-1 bg-transparent border-0" data-animate="fadeInUp">
                            <figure class="card-img-top position-relative mb-10">
                                <img src="<?=$tinTuc['img']?>" alt="" class="img-fluid lazy-image " width="120px" height="70px">
                            </figure>
                            <div class="card-body text-center px-md-9 py-0">
                                <h4 class="card-title lh-base mb-9">
                                    <?= $tinTuc['tieu_de_bai_viet'] ?>
                                </h4>
                                <ul class="post-meta list-inline lh-1 d-flex flex-wrap justify-content-center m-0">
                                    <li class="list-inline-item border-end pe-5 me-5">Thực hiện bởi <a href="#" title="Admin">AStore</a></li>
                                    <li class="list-inline-item"><?= $tinTuc['ngay_dang_bai'] ?></li>
                                    <li class="list-inline-item"><?= $tinTuc['luot_xem'] ?> Người xem</li>
                                </ul>
                            </div>
                        </article>
                    </a>
                </div>

                <?php endforeach; ?>
            </div>
        </div>

        <!-- Pagination -->
        <nav class="d-flex mt-13 pt-3 justify-content-center" aria-label="pagination" data-animate="fadeInUp">
            <ul class="pagination m-0">
                <li class="page-item">
                    <a class="page-link rounded-circle d-flex align-items-center justify-content-center" href="#"
                        aria-label="Previous">
                        <svg class="icon">
                            <use xlink:href="#icon-angle-double-left"></use>
                        </svg>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link rounded-circle d-flex align-items-center justify-content-center" href="#"
                        aria-label="Next">
                        <svg class="icon">
                            <use xlink:href="#icon-angle-double-right"></use>
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
    </main>

    <!-- FOOTER -->
    <?php
    require_once "layout/footer.php";
    ?>

    <!-- JAVASCRIPT -->
     <!-- JAVASCRIPT -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Chọn tất cả các mục bài viết
        const cards = document.querySelectorAll('.card-post-grid-1');
        
        cards.forEach(card => {
            // Thêm hiệu ứng khi di chuột vào
            card.addEventListener('mouseenter', function() {
                card.style.borderColor = '#007bff'; // Thay đổi màu khung
                card.style.boxShadow = '0 4px 8px rgba(0, 123, 255, 0.3)'; // Thêm bóng
            });

            // Xóa hiệu ứng khi chuột ra
            card.addEventListener('mouseleave', function() {
                card.style.borderColor = 'transparent'; // Khôi phục màu khung ban đầu
                card.style.boxShadow = 'none'; // Xóa bóng
            });
        });
    });
</script>

    <?php
    require_once "layout/libs_js.php";
    ?>

</body>

</html>
