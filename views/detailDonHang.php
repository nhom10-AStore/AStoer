<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chi tiết đơn hàng | AStore</title>
    <style>
        /* Thân trang */
        main.wrapper {
            padding: 20px;
         /* Nền xám nhạt */
        }

        /* Phần thông tin đơn hàng */
        .order-info {
            border: 1px solid #ddd;
            background: #fdfdfd;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Danh sách sản phẩm */
        .product-list {
            border: 1px solid #ddd;
        }

        /* Bảng sản phẩm */
        .table {
            margin: 0;
        }

        .table th,
        .table td {
            text-align: center;
            vertical-align: middle;
            padding: 10px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #fff;
        }

        .table-striped tbody tr:nth-of-type(even) {
            background-color: #fff;
        }

        /* Tiêu đề */
        h2 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        /* Margin và padding của container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Phần tiêu đề của card */
        .card-header {
            background-color: #f7f7f7;
            font-size: 1.2rem;
            font-weight: bold;
        }

        /* Tăng cường hiệu ứng cho các alert */
        .alert {
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
        }

        /* Sửa các lớp bảng */
     

        .table td {
            background-color: #fff;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
    <?php require_once "layout/libs_css.php"; ?>
</head>

<body>
    <!-- HEADER -->
    <?php require_once "layout/header.php"; ?>

    <main class="wrapper">
        <div class="container mt-4">
            <div class="row">
                <!-- Thông tin đơn hàng -->
                <div class="col-lg-9 mb-4">
                    <div class="card order-info">
                        <div class="card-header">
                            <h5 class="mb-0">Thông Tin Đơn Hàng</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Mã Đơn Hàng:</strong> <?= $donHang['ma_don_hang'] ?></p>
                            <p><strong>Ngày Đặt:</strong> <?= date('d/m/Y', strtotime($donHang['ngay_dat'])) ?></p>
                            <p><strong>Trạng Thái:</strong>
                                <?php
                                $colorAlerts = '';
                                if ($donHang['trang_thai_id'] == 1) {
                                    $colorAlerts = 'primary';
                                } elseif ($donHang['trang_thai_id'] >= 2 && $donHang['trang_thai_id'] <= 4) {
                                    $colorAlerts = 'warning';
                                } elseif ($donHang['trang_thai_id'] == 5) {
                                    $colorAlerts = 'success';
                                } else {
                                    $colorAlerts = 'danger';
                                }
                                ?>
                                <div class="alert alert-<?= $colorAlerts; ?> text-center" role="alert">
                                    <?= $donHang['ten_trang_thai'] ?>
                                </div>
                            </p>
                            <div><strong>Phương thức thanh toán:</strong> 
                                <?php
                                if ($donHang['phuong_thuc_thanh_toan'] == 1) { ?>
                                    <span>COD (Thanh toán khi nhận hàng)</span>
                                <?php } else { ?>
                                    <span>VNPay</span>
                                <?php } ?>
                            </div>
                            <div><strong>Trạng thái thanh toán:</strong>
                                <?php
                                if ($donHang['trang_thai_thanh_toan'] == 1) { ?>
                                    <span class="badge bg-success">Đã thanh toán</span>
                                <?php } else { ?>
                                    <span class="badge bg-danger">Chưa thanh toán</span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Thông tin khách hàng -->
                <div class="col-lg-3 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Thông Tin Khách Hàng</h5>
                        </div>
                        <div class="card-body text-center">
                            <img src="<?=$_SESSION['user']['anh_dai_dien']?>" alt="Avatar" class="rounded-circle mb-3" width="100">
                            <h6><?= $donHang['ten_nguoi_nhan'] ?></h6>
                            <p><i class="ri-mail-line"></i> <?= $donHang['email_nguoi_nhan'] ?></p>
                            <p><i class="ri-phone-line"></i> <?= $donHang['sdt_nguoi_nhan'] ?></p>
                            <p><i class="ri-map-pin-line"></i> <?= $donHang['dia_chi_nguoi_nhan'] ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Danh sách sản phẩm -->
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Danh Sách Sản Phẩm</h5>
                        </div>
                        <div class="card-body" >
                            <table class="table table-bordered table-striped table-hover" >
                                <thead >
                                    <tr > 
                                        <th>STT</th>
                                        <th >Sản Phẩm</th>
                                        <th>Đơn Giá</th>
                                        <th>Số Lượng</th>
                                        <th>Khuyến Mãi</th>
                                        <th>Thành Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tong_tien = 0;
                                    foreach ($sanPhamDonHang as $key => $sp):
                                        $thanh_tien = $sp['so_luong'] * ($sp['gia_ban'] - $sp['gia_ban'] * $sp['gia_tri'] / 100);
                                        $tong_tien += $thanh_tien;
                                    ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $sp['ten_san_pham'] ?></td>
                                        <td><?= number_format($sp['gia_ban'], 0, ',', '.') ?> đ</td>
                                        <td><?= $sp['so_luong'] ?></td>
                                        <td><?= isset($sp['gia_tri']) ? $sp['gia_tri'] . '%' : '0%' ?></td>
                                        <td><?= number_format($thanh_tien, 0, ',', '.') ?> đ</td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot >
                                    <tr>
                                        <td colspan="5" class="text-end fw-bold">Tổng tiền:</td>
                                        <td><?= number_format($tong_tien, 0, ',', '.') ?> đ</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-end">Phí vận chuyển:</td>
                                        <td><?= number_format($sp['phi_van_chuyen']) ?> đ</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-end fw-bold">Tổng thanh toán:</td>
                                        <td class="text-primary fw-bold">
                                            <?= number_format($tong_tien + $sp['phi_van_chuyen'], 0, ',', '.') ?> đ
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <?php require_once "layout/footer.php"; ?>

    <!-- JAVASCRIPT -->
    <?php require_once "layout/libs_js.php"; ?>
</body>

</html>

