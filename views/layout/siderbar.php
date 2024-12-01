<main id="content" class="wrapper layout-page">
<section>
<div class="slick-slider hero hero-header-07 slick-slider-dots-inside"
			data-slick-options='{&#34;arrows&#34;:false,&#34;autoplay&#34;:true,&#34;cssEase&#34;:&#34;ease-in-out&#34;,&#34;dots&#34;:false,&#34;fade&#34;:true,&#34;infinite&#34;:true,&#34;slidesToShow&#34;:1,&#34;speed&#34;:600}'>
			<?php foreach ($banners as $index => $banner) : ?>

				<div class="vh-100 d-flex align-items-center" style="width:1440px; height:300px">
					<div class="lazy-bg bg-overlay position-absolute z-index-1 w-100 h-100"    data-bg-src=" <?= BASE_URL_ADMIN . $banner['ten_banner'] ?>">
					</div>
					<div class="lazy-bg bg-overlay dark-mode-img position-absolute z-index-1 w-100 h-100" data-bg-src="<?= BASE_URL_ADMIN . $banner['ten_banner'] ?>">
					</div>
				</div>
			<?php endforeach; ?>
		</div>
</section>

<section id="feature_products_1" class="container container-xxl pt-lg-18 pt-14 pb-lg-21 pb-15">
    <h2 class="text-center mb-10 pb-3" data-animate="fadeInUp">Sản phẩm mới nhất</h2>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="skincare-tab-pane" role="tabpanel">
            <div class="row gy-50px">
                <?php if (!empty($listSanPham)): ?>
                    <?php foreach ($listSanPham as $sanPham): ?>
                        <div class="col-lg-4 col-xl-3 col-sm-6">
                            <div class="card card-product grid-1 bg-transparent border-0" data-animate="fadeInUp">
                                <figure class="card-img-top position-relative mb-7 overflow-hidden">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>" class="hover-zoom-in d-block">
                                        <img src="<?= BASE_URL . $sanPham['anh_san_pham'] ?>" alt="<?= htmlspecialchars($sanPham['ten_san_pham']) ?>" class="img-fluid lazy-image w-100">
                                    </a>
                                </figure>
                                <div class="card-body text-center p-0">
                                    <span class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">
                                        <?= number_format($sanPham['gia_ban'], 0) ?>đ
                                    </span>
                                    <h4 class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>" class="text-decoration-none text-reset">
                                            <?= htmlspecialchars($sanPham['ten_san_pham']) ?>
                                        </a>
                                    </h4>
                                    <div class="d-flex align-items-center fs-12px justify-content-center">
                                        <div class="rating">
                                            <div class="filled-stars" style="width: <?= $sanPham['danh_gia_tb'] * 20 ?>%">
                                                <span class="star">
                                                    <svg class="icon star text-primary"><use xlink:href="#star"></use></svg>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- Thay reviews bằng thông báo tồn kho -->
                                        <span class="stock-status ms-4 pt-3 fs-14px">
                                            <?php if ($sanPham['so_luong_ton_kho'] > 0): ?>
                                                <span class="text-success">Sản phẩm còn hàng</span>
                                            <?php else: ?>
                                                <span class="text-danger">Sản phẩm hết hàng</span>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center">Hiện chưa có sản phẩm mới.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>



	<section class="pt-lg-19 pt-14 pb-lg-18 pb-15">

		<div class="container container-xxl">
			<div class="mb-md-13 mb-11">
				<div class="text-center" data-animate="fadeInUp">
					<h2 class="mb-6">Tại sao nên chọn AStore?</h2>
				</div>

			</div>
			<div class="row gx-30px gy-30px">
				<div class="col-lg-4" data-animate="fadeInUp">
					<div class="">
						<div class="d-flex justify-content-center">


							<img class="lazy-image img-fluid" src="assets/images/shop/tuVan.jpg" width="150" height="150" alt="Guaranteed PURE">
						</div>
						<div class="card-body text-center pt-7 mt-3">
							<h3 class="fs-4 mb-6">Hỗ trợ 24/7</h3>
							<p class="mb-0 px-lg-6">Chuyên viên trực máy 24/7 chỉ cần bạn cần hỗ trợ, bất kể khung giờ nào chúng tôi cũng sẽ có mặt</p>
						</div>
					</div>

				</div>
				<div class="col-lg-4" data-animate="fadeInUp">
					<div class="">
						<div class="d-flex justify-content-center">


							<img class="lazy-image img-fluid" src="assets/images/shop/sale.png" width="150" height="120" alt="Completely Cruelty-Free">
						</div>
						<div class="card-body text-center pt-7 mt-3">
							<h3 class="fs-4 mb-6">Giảm giá lớn</h3>
							<p class="mb-0 px-lg-6">Đến với AStore bạn không cần phải lo về giá chúng tôi có hàng loạt voucher đang chờ bạn</p>
						</div>
					</div>

				</div>
				<div class="col-lg-4" data-animate="fadeInUp">
					<div class="">
						<div class="d-flex justify-content-center">


							<img class="lazy-image img-fluid" src="#" data-src="assets/images/shop/ut.jpg" width="140" height="140" alt="Ingredient Sourcing">
						</div>
						<div class="card-body text-center pt-7 mt-3">
							<h3 class="fs-4 mb-6">Uy tín - chất lương</h3>
							<p class="mb-0 px-lg-6">Mọi sản phẩm của chúng tôi đều được nhập từ kho của Apple, lỗi 1 đổi 1 không ưng hoàn tiền</p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<section class="pt-14 pt-lg-18 mt-3">
    <div class="container container-xxl testimonial">
        <div class="row">
            <div class="col-lg-4 d-flex flex-column justify-content-lg-between mb-12 mb-lg-0">
                <div class="mt-lg-8 text-left" data-animate="fadeInUp">
                    <h2 class="mb-6">Đánh giá từ khách hàng</h2>
                    <p class="fs-18px w-80">Những đánh giá từ khách hàng về sản phẩm của chúng tôi.</p>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="slick-slider" data-slick-options='{"arrows":true,"autoplay":true,"slidesToShow":2,"speed":600}'>
                    <?php foreach ($listDanhGia as $danhGia): ?>
                        <div class="px-6 py-0">
                            <div class="card border-0 bg-section-3 rounded p-sm-11 p-9">
                                <div class="card-body px-4">
                                    <p class="fs-5 text-primary fw-semibold mb-11"><?= htmlspecialchars($danhGia['noi_dung']) ?></p>
                                    <div class="d-flex align-items-center">
                                        <img src="assets/images/shop/avt.jpg" alt="Avatar" class="lazy-image me-7" style="width: 60px; height: 60px; border-radius:50%">
                                        <div class="author-info">
                                            <h4 class="fw-bold text-uppercase mb-1 fs-15px"><?= htmlspecialchars($danhGia['ho_ten']) ?></h4>
                                            <p class="mb-0"><?= htmlspecialchars($danhGia['ngaydg']) ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

	<br>
</main>
