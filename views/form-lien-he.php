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
    <style>
        .main-container {
            /* background-color:black; */
            padding: 30px;
            border: 1px solid gray;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .heading-text {
            font-size: 28px;
            color: #198754;
            margin-bottom: 10px;
        }

        .subheading-text {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }

        .orange-line {
            width: 560px;
            height: 4px;
            background-color: #198754;
            margin: 0 auto 20px;
        }

        .form-field label {
            font-weight: bold;
            color: #333;
        }

        .submit-button {
            background-color: #198754;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #e65c00;
        }

        .contact-info {
            margin-top: 30px;
            padding: 20px 0;
            border-top: 1px solid #eee;
        }

        .contact-block {
            text-align: center;
        }

        .contact-block h3 {
            color: #198754;
            font-size: 20px;
        }
    </style>

</head>

<body>

    <!-- HEADER -->
    <?php require_once "layout/header.php";?>


    <!-- JAVASCRIPT -->
    <main id="content" class="wrapper layout-page">
    <div class="container my-5">
        <div class="main-container">
            <!-- Header Section -->
            <div class="text-center">
                <h1 class="heading-text">Chào mừng đến với Website của chúng tôi</h1>
                <p class="subheading-text">Đăng ký để nhận các thông tin và ưu đãi mới nhất từ chúng tôi.</p>
                <div class="orange-line"></div>
            </div>

            <!-- Form Section -->
            <h2 class="text-center mb-4">Liên hệ với chúng tôi</h2>

            <?php
            if (isset($_GET['success'])) {
                echo '<p class="text-success text-center">Gửi liên hệ thành công!</p>';
            }
            if (!empty($errors)) {
                echo '<div class="alert alert-danger">';
                foreach ($errors as $error) {
                    echo "<p>$error</p>";
                }
                echo '</div>';
            }
            ?>

            <form action="?act=them-lien-he" method="POST" class="row g-3">
                <div class="col-md-6">
                    <label for="ten" class="form-label">Tên</label>
                    <input type="text" id="ten" name="ten" class="form-control"
                        value="<?= isset($_POST['ten']) ? htmlspecialchars($_POST['ten']) : '' ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control"
                        value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required>
                </div>
                <div class="col-12">
                    <label for="loi_nhan" class="form-label">Lời Nhắn</label>
                    <textarea id="loi_nhan" name="loi_nhan" rows="5" class="form-control"
                        required><?= isset($_POST['loi_nhan']) ? htmlspecialchars($_POST['loi_nhan']) : '' ?></textarea>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="submit-button">Gửi Liên Hệ</button>
                </div>
            </form>

            <!-- Contact Info -->
            <div class="contact-info d-flex justify-content-between mt-5">
                <div class="contact-block">
                    <h3>Liên hệ</h3>
                    <p>Địa chỉ: 123 Đường ABC, Thành phố XYZ</p>
                </div>
                <div class="contact-block">
                    <h3>Giờ làm việc</h3>
                    <p>Thứ Hai - Thứ Sáu: 9:00 - 18:00</p>
                </div>
            </div>
        </div>
    </div>
    </main>
    <?php require_once "layout/footer.php"; ?>
    <?php require_once "layout/libs_js.php"; ?>

</body>

</html>