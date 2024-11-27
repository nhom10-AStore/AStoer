<main id="content" class="wrapper layout-page">
	<section>

		<div class="slick-slider hero hero-header-07 slick-slider-dots-inside"
			data-slick-options='{&#34;arrows&#34;:false,&#34;autoplay&#34;:true,&#34;cssEase&#34;:&#34;ease-in-out&#34;,&#34;dots&#34;:false,&#34;fade&#34;:true,&#34;infinite&#34;:true,&#34;slidesToShow&#34;:1,&#34;speed&#34;:600}'>
			<?php foreach ($banners as $index => $banner) : ?>

				<div class="vh-100 d-flex align-items-center" style="width:1440px; height:300px">
					<!-- <div class="lazy-bg bg-overlay position-absolute z-index-1 w-100 h-100"    data-bg-src=" <?= BASE_URL_ADMIN . $banner['ten_banner'] ?>">
					</div> -->
					<div class="lazy-bg bg-overlay dark-mode-img position-absolute z-index-1 w-100 h-100" data-bg-src="<?= BASE_URL_ADMIN . $banner['ten_banner'] ?>">
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>

	<section id="feature_products_1" class="container container-xxl pt-lg-18 pt-14 pb-lg-21 pb-15">

		<h2 class="text-center mb-10 pb-3" data-animate="fadeInUp">Sản phẩm mới nhất</h2>
		<div class="tab-content">

			<div class="tab-pane fade show active" id="skincare-tab-pane" role="tabpanel" tabindex="0">
				<div class="row gy-50px">
					<?php foreach ($listSanPham as $key => $sanPham) : ?>
						<div class="col-lg-4 col-xl-3 col-sm-6">
							<div class="card card-product grid-1 bg-transparent border-0" data-animate="fadeInUp" style="width: 200px;">
								<figure class="card-img-top position-relative mb-7 overflow-hidden ">
									<a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>" class="hover-zoom-in d-block" title="Perfecting Facial Oil">
										<img src="<?= BASE_URL .  $sanPham['anh_san_pham'] ?>" xlink:src="/admin/uploads/avt.png" class="img-fluid lazy-image w-100" alt="Perfecting Facial Oil">
									</a>
								</figure>
								<div class="card-body text-center p-0">
									<span class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6"><?= number_format($sanPham['gia_ban'], 0,) ?>đ</span>
									<h4 class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3"><a class="text-decoration-none text-reset" href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a></h4>
									<div class="d-flex align-items-center fs-12px justify-content-center">
										<div class="rating">
											<div class="empty-stars">
												<span class="star">
													<svg class="icon star-o">
														<use xlink:href="#star-o"></use>
													</svg>
												</span>
												<span class="star">
													<svg class="icon star-o">
														<use xlink:href="#star-o"></use>
													</svg>
												</span>
												<span class="star">
													<svg class="icon star-o">
														<use xlink:href="#star-o"></use>
													</svg>
												</span>
												<span class="star">
													<svg class="icon star-o">
														<use xlink:href="#star-o"></use>
													</svg>
												</span>
												<span class="star">
													<svg class="icon star-o">
														<use xlink:href="#star-o"></use>
													</svg>
												</span>
											</div>
											<div class="filled-stars"
												style="width: 100%">
												<span class="star">
													<svg class="icon star text-primary">
														<use xlink:href="#star"></use>
													</svg>
												</span>
												<span class="star">
													<svg class="icon star text-primary">
														<use xlink:href="#star"></use>
													</svg>
												</span>
												<span class="star">
													<svg class="icon star text-primary">
														<use xlink:href="#star"></use>
													</svg>
												</span>
												<span class="star">
													<svg class="icon star text-primary">
														<use xlink:href="#star"></use>
													</svg>
												</span>
												<span class="star">
													<svg class="icon star text-primary">
														<use xlink:href="#star"></use>
													</svg>
												</span>
											</div>
										</div><span class="reviews ms-4 pt-3 fs-14px"><?= $sanPham['luot_xem'] ?> reviews</span>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
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

	<!-- <section class="bg-section-3 ">

		<div class="container container-xxl">
			<div class="row align-items-center">
				<div class="col-lg-7 position-relative" data-animate="fadeInLeft">


					<img class="lazy-image img-fluid light-mode-img" src="#" data-src="./assets/images/Countdown/countdown-05.png" width="690" height="640" alt="Countdown">
					<img class="lazy-image dark-mode-img img-fluid" src="#" data-src="./assets/images/Countdown/Countdown-white-01.png" width="690" height="640" alt="Countdown">
					<div class="lable-sale-countdown-glow fw-nomal py-9 px-9 d-none fs-5 bg-primary rounded-circle d-xl-flex align-items-center justify-content-center flex-column text-white position-absolute">
						Save<span class="fs-23px fw-semibold">$19.00</span></div>
				</div>
				<div class="col-lg-5 py-lg-0 py-15" data-animate="fadeInRight">
					<div class="text-left">
						<p class="fs-15px mb-6 ls-1 text-body-emphasis fw-semibold">SPECIAL OFFER <span class="badge bg-primary fs-15px py-3 px-4 ms-4">-20%</span></p>
						<h2 class="mb-6">Intensive Glow C+ Serum</h2>
						<p class="fs-18px mb-0 me-md-25 me-lg-0 me-xl-15 text-body-calculate">Made using clean, non-toxic ingredients, our products are designed for everyone.</p>
					</div>

					<div class="d-flex countdown ms-n4 ms-md-n7" data-countdown="true" data-countdown-end="Jan 27, 2024 18:24:25">
						<div class="countdown-item text-center px-md-7 px-4 fs-1">
							<span class="day fw-semibold text-primary font-primary"></span>
						</div>

						<div class="separate fw-semibold fs-1 text-primary">:</div>

						<div class="countdown-item text-center px-md-7 px-4 fs-1">
							<span class="hour fw-semibold text-primary font-primary"></span>
						</div>

						<div class="separate fw-semibold fs-1 text-primary">:</div>

						<div class="countdown-item text-center px-md-7 px-4 fs-1">
							<span class="minute fw-semibold text-primary font-primary"></span>
						</div>

						<div class="separate fw-semibold fs-1 text-primary">:</div>

						<div class="countdown-item text-center px-md-7 px-4 fs-1">
							<span class="second fw-semibold text-primary font-primary"></span>
						</div>
					</div>

					<a href="#" class="mt-11 btn btn-white shadow-sm">Get Only $39,00</a>
				</div>
			</div>
		</div>
	</section> -->


	<section class="pt-14 pt-lg-18 mt-3">

		<div class="container container-xxl testimonial">
			<div class="row">
				<div class="col-lg-4 d-flex flex-column  justify-content-lg-between mb-12 mb-lg-0">
					<div class="mt-lg-8 text-left" data-animate="fadeInUp">
						<h2 class="mb-6">Đánh giá từ khách hàng</h2>
						<p class="fs-18px w-80">Mọi đánh giá của khách hàng về bấy kỳ sản phẩm nào của chúng tôi đều ở đây </p>
					</div>

					<div class="d-flex mt-2 custom-arrow" data-animate="fadeInUp">
						<div class="custom-arrows-02-prev position-static slick-arrow" aria-label="Previous" style=""><i class="far fa-chevron-left"></i></div>
						<div class="custom-arrows-02-next position-static ms-7 slick-arrow" aria-label="Next" style=""><i class="far fa-chevron-right"></i></div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="slick-slider custom-arrows-02 custom-slider-04" data-slick-options='{&#34;arrows&#34;:true,&#34;autoplay&#34;:true,&#34;centerMode&#34;:false,&#34;cssEase&#34;:&#34;ease-in-out&#34;,&#34;dots&#34;:false,&#34;fade&#34;:false,&#34;infinite&#34;:true,&#34;responsive&#34;:[{&#34;breakpoint&#34;:1024,&#34;settings&#34;:{&#34;slidesToShow&#34;:2}},{&#34;breakpoint&#34;:992,&#34;settings&#34;:{&#34;slidesToShow&#34;:2}},{&#34;breakpoint&#34;:768,&#34;settings&#34;:{&#34;slidesToShow&#34;:1}}],&#34;slidesToShow&#34;:2,&#34;speed&#34;:600}'>
						<?php foreach ($listDanhGia as $key => $danhGia) : ?>
							<div class="px-6 py-0" data-animate="fadeInUp">
								<div class="card border-0 bg-section-3 rounded p-sm-11 p-9">
									<div class="card-body px-4">
										<p class="fs-5 text-primary fw-semibold mb-11"><?= $danhGia['noi_dung'] ?></p>
										<div class="d-flex align-items-center">
											<div class="d-flex justify-content-start align-items-center">
												<img src="assets/images/shop/avt.jpg" alt="" class="lazy-image me-7" style="width: 60px; height: 60px; border-radius:50%">
												<div class="author-info">
													<h4 class="fw-bold text-uppercase mb-1 fs-15px fw-bold ls-1"><?= $danhGia['ho_ten'] ?></h4>
													<p class="mb-0"><?= $danhGia['ngaydg'] ?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>
				<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<br>
</main>