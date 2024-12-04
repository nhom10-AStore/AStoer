<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tin tức | AStore</title>
    <!-- CSS -->
    <?php require_once "layout/libs_css.php"; ?>
    <style>
        .news-container {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .news-item {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 10px;
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        .news-item:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: scale(1.02);
        }

        .news-image {
            flex-shrink: 0;
            width: 120px;
            height: 90px;
            border-radius: 8px;
            object-fit: cover;
        }

        .news-content {
            flex-grow: 1;
        }

        .news-title {
            font-size: 18px;
            font-weight: 600;
            margin: 0;
            color: #333;
            text-decoration: none;
        }

        .news-meta {
            margin-top: 5px;
            font-size: 14px;
            color: #555;
        }

        .news-meta span {
            margin-right: 15px;
        }
    </style>
</head>

<body>
    <?php require_once "layout/header.php"; ?>

    <main id="content" class="wrapper layout-page">
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
            <div class="news-container">
                <?php foreach ($tinTucs as $tinTuc): ?>
                    <a href="<?= BASE_URL . '?act=chi-tiet-tin-tuc&id=' . $tinTuc['id'] ?>" class="news-item">
                        <img src="<?= $tinTuc['img'] ?>" alt="News Image" class="news-image">
                        <div class="news-content">
                            <h3 class="news-title"><?= $tinTuc['tieu_de_bai_viet'] ?></h3>
                            <div class="news-meta">
                                <span>Thực hiện bởi: AStore</span>
                                <span><?= $tinTuc['ngay_dang_bai'] ?></span>
                                <span><?= $tinTuc['luot_xem'] ?> lượt xem</span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <?php require_once "layout/footer.php"; ?>
    <?php require_once "layout/libs_js.php"; ?>
</body>

</html>