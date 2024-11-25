<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách mã khuyến mãi | AStore</title>

    <!-- CSS -->
    <?php
    require_once "layout/libs_css.php";
    ?>
    <style>
        .copy-btn {
        position: absolute;
        top: 15px;
        right: 15px;
        background: linear-gradient(45deg, #007bff, #0056b3);
        color: white;
        padding: 8px 15px;
        font-size: 14px;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1), 0px 1px 3px rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease-in-out;
        }

        .copy-btn:hover {
            background: linear-gradient(45deg, #0056b3, #003d80);
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.15), 0px 2px 4px rgba(0, 0, 0, 0.1);
            transform: scale(1.05);
        }

        .copy-btn:active {
            background: linear-gradient(45deg, #003d80, #001f4d);
            transform: scale(0.95);
        }

        .copy-btn.copied {
            background: linear-gradient(45deg, #28a745, #1e7e34);
            color: #ffffff;
            box-shadow: 0px 4px 6px rgba(40, 167, 69, 0.4), 0px 1px 3px rgba(40, 167, 69, 0.2);
            transform: scale(1.05);
        }

        .coupon-list {
            margin-top: 20px;
        }

        .coupon-item {
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            background-color: #f8f9fa;
            position: relative;
        }

        .coupon-item h4 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }

        .coupon-item .details {
            margin-top: 5px;
            font-size: 14px;
            color: #6c757d;
        }
        .coupon-list {

        padding: 20px; /* Khoảng cách bên trong */
        border-radius: 10px; /* Bo góc cho toàn vùng */
        }

        .coupon-list .coupon-item {
            background-color: white; /* Nền xanh lá cho từng mã */
            color: #000000; /* Chữ màu đen */
            border: 1px solid #007700; /* Viền xanh lá đậm */
            border-radius: 5px; /* Bo góc */
            padding: 15px; /* Khoảng cách bên trong */
            margin-bottom: 10px; /* Khoảng cách giữa các mã */
        }

        .coupon-list .coupon-item h4, 
        .coupon-list .coupon-item .details, 
        .coupon-list .coupon-item .details strong {
            color: #000000; /* Màu chữ đen */
        }



        
    </style>
</head>

<body>

    <!-- HEADER -->
    <?php
    require_once "layout/header.php";
    ?>

    <main id="content" class="wrapper layout-page">
        <!-- Page Title -->
        <section class="page-title z-index-2 position-relative">
            <div class="bg-body-secondary">
                <div class="container text-center py-5">
                    <h2 class="mb-0">Danh sách mã khuyến mãi</h2>
                </div>
            </div>
        </section>

        <!-- Danh sách mã khuyến mãi -->
         
        <div class="container coupon-list">
            <?php foreach ($khuyenMais as $khuyenMai): ?>
                <div class="coupon-item">
                    <h4><?= $khuyenMai['ten_khuyen_mai'] ?></h4>
                    <div class="details" >
                        Mã: <strong class="coupon-code"><?= $khuyenMai['ma_khuyen_mai'] ?></strong> | 
                        Giá trị: <strong><?= $khuyenMai['gia_tri'] ?>%</strong> <br>
                        Bắt đầu: <?= $khuyenMai['ngay_bat_dau'] ?> - Kết thúc: <?= $khuyenMai['ngay_ket_thuc'] ?>
                    </div>
                    <button class="copy-btn" data-code="<?= $khuyenMai['ma_khuyen_mai'] ?>">Sao chép mã</button>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- FOOTER -->
    <?php
    require_once "layout/footer.php";
    ?>

    <!-- JAVASCRIPT -->
    <?php
    require_once "layout/libs_js.php";
    ?>
    <script>
        // Thêm chức năng copy mã khuyến mãi
        document.addEventListener('DOMContentLoaded', function () {
            const copyButtons = document.querySelectorAll('.copy-btn');
            
            copyButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const code = button.getAttribute('data-code');

                    // Copy mã vào clipboard
                    navigator.clipboard.writeText(code).then(() => {
                        // Thay đổi giao diện khi copy thành công
                        button.textContent = 'Đã sao chép!';
                        button.classList.add('copied');

                        // Reset lại nút sau 2 giây
                        setTimeout(() => {
                            button.textContent = 'Sao chép mã';
                            button.classList.remove('copied');
                        }, 10000);
                    }).catch(err => {
                        console.error('Không thể sao chép: ', err);
                    });
                });
            });
        });
    </script>
</body>

</html>
