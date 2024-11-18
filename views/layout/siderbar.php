<main id="content" class="wrapper layout-page">
	<section>

		<div class="slick-slider hero hero-header-07 slick-slider-dots-inside"
			data-slick-options='{&#34;arrows&#34;:false,&#34;autoplay&#34;:true,&#34;cssEase&#34;:&#34;ease-in-out&#34;,&#34;dots&#34;:false,&#34;fade&#34;:true,&#34;infinite&#34;:true,&#34;slidesToShow&#34;:1,&#34;speed&#34;:600}'>

			<div class="vh-100 d-flex align-items-center">
				<div class="z-index-2 container container-xxl py-15">
					<div data-animate="fadeInDown" class="card border-0 ps-lg-1 mx-md-0 mx-auto hero-card">
						<div class="card-body p-11">
							<h1 class="mb-7 hero-title-5 pe-lg-12">Ipone 16 mẫu sản phẩm mới nhất của Apple</h1>
							<p class="hero-desc fs-18px text-body-calculate mb-9">Made using clean, non-toxic ingredients, our products are designed for everyone.</p>
							<a href="#" class="btn btn-dark rounded btn-hover-bg-primary btn-hover-border-primary">
								Shop Now
							</a>
						</div>
					</div>

				</div>
				<div class="lazy-bg bg-overlay position-absolute z-index-1 w-100 h-100   light-mode-img" data-bg-src="./assets/images/hero-slider/hero-slider-15.jpg">
				</div>
				<div class="lazy-bg bg-overlay dark-mode-img position-absolute z-index-1 w-100 h-100" data-bg-src="./assets/images/hero-slider/hero-slider-white-15.jpg">
				</div>
			</div>

			<div class="vh-100 d-flex align-items-center">
				<div class="z-index-2 container container-xxl py-15">
					<div data-animate="fadeInDown" class="card border-0 ps-lg-1 mx-md-0 mx-auto hero-card">
						<div class="card-body p-11">
							<h1 class="mb-7 hero-title-5 pe-lg-12">Our Autumn Skincare</h1>
							<p class="hero-desc fs-18px text-body-calculate mb-9">Made using clean, non-toxic ingredients, our products are designed for everyone.</p>
							<a href="#" class="btn btn-dark rounded btn-hover-bg-primary btn-hover-border-primary">
								Shop Now
							</a>
						</div>
					</div>

				</div>
				<div class="lazy-bg bg-overlay position-absolute z-index-1 w-100 h-100   light-mode-img" data-bg-src="./assets/images/hero-slider/hero-slider-16.jpg">
				</div>
				<div class="lazy-bg bg-overlay dark-mode-img position-absolute z-index-1 w-100 h-100" data-bg-src="./assets/images/hero-slider/hero-slider-white-16.jpg">
				</div>
			</div>

			<div class="vh-100 d-flex align-items-center">
				<div class="z-index-2 container container-xxl py-15">
					<div data-animate="fadeInDown" class="card border-0 ps-lg-1 mx-md-0 mx-auto hero-card">
						<div class="card-body p-11">
							<h1 class="mb-7 hero-title-5 pe-lg-12">Love Your Skin Naturally</h1>
							<p class="hero-desc fs-18px text-body-calculate mb-9">Made using clean, non-toxic ingredients, our products are designed for everyone.</p>
							<a href="#" class="btn btn-dark rounded btn-hover-bg-primary btn-hover-border-primary">
								Shop Now
							</a>
						</div>
					</div>

				</div>
				<div class="lazy-bg bg-overlay position-absolute z-index-1 w-100 h-100   light-mode-img" data-bg-src="./assets/images/hero-slider/hero-slider-17.jpg">
				</div>
				<div class="lazy-bg bg-overlay dark-mode-img position-absolute z-index-1 w-100 h-100" data-bg-src="./assets/images/hero-slider/hero-slider-white-17.jpg">
				</div>
			</div>

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
								<figure class="card-img-top position-relative mb-7 overflow-hidden " >
									<a href="<?=BASE_URL. '?act=chi-tiet-san-pham&id-san-pham='.$sanPham['id'] ?>" class="hover-zoom-in d-block" title="Perfecting Facial Oil">
										<img src="<?= BASE_URL .  $sanPham['anh_san_pham'] ?>" xlink:src="/admin/uploads/avt.png" class="img-fluid lazy-image w-100" alt="Perfecting Facial Oil" >
									</a>

									<div style="width: 125px; height:30px;" class="position-absolute d-flex z-index-2 product-actions  horizontal"><a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm add_to_cart" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart">
											<svg style="width: 20px;" class="icon icon-shopping-bag-open-light">
												<use xlink:href="#icon-shopping-bag-open-light"></use>
											</svg>
										</a><a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm quick-view"
											href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Quick View">
											<span data-bs-toggle="modal" data-bs-target="#quickViewModal" class="d-flex align-items-center justify-content-center">
												<svg class="icon icon-eye-light">
													<use xlink:href="#icon-eye-light"></use>
												</svg>
											</span>
										</a>
										<a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm wishlist" href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Wishlist">
											<svg class="icon icon-star-light">
												<use xlink:href="#icon-star-light"></use>
											</svg>
										</a>
										<a class="text-body-emphasis bg-body bg-dark-hover text-light-hover rounded-circle square product-action shadow-sm compare" href="./shop/compare.html" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Compare">
											<svg class="icon icon-arrows-left-right-light">
												<use xlink:href="#icon-arrows-left-right-light"></use>
											</svg>
										</a>
									</div>
								</figure>
								<div class="card-body text-center p-0">
									<span class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6"><?=number_format($sanPham['gia_ban'],0,)?>đ</span>
									<h4 class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3"><a class="text-decoration-none text-reset" href="./shop/product-details-v1.html"><?=$sanPham['ten_san_pham']?></a></h4>
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
										</div><span class="reviews ms-4 pt-3 fs-14px"><?=$sanPham['luot_xem']?> reviews</span>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

			</div>

		</div>

	</section>


	<section>

		<div class="container container-xxl">
			<div class="row">
				<div class="col-lg-5 order-2 order-lg-1 py-lg-23 mt-12 mt-lg-0" data-animate="fadeInLeft">
					<div class="text-left">
						<p class="fs-15px mb-6 ls-1 text-body-emphasis fw-semibold">NEW COLLECTION</p>
						<h2 class="mb-6">Anti-aging Cream</h2>
						<p class="fs-18px mb-0">Made using clean, non-toxic ingredients, our products <br /> are designed for everyone.</p>
					</div>

					<a href="#" class="mt-10 btn btn-dark btn-hover-bg-primary btn-hover-border-primary">Explore More</a>
				</div>
				<div class="col-lg-7 order-1 order-lg-2" data-animate="fadeInRight">
					<div class="bg-image video-01 d-flex justify-content-center align-items-center h-lg-100 position-relative py-18 py-lg-0 py-md-23 lazy-bg"
						data-bg-src="./assets/images/others/video-bg.jpg">
						<div class="position-absolute start-0 d-none d-xl-block m-n14 ps-14 h-75 bg-section-2"></div>
						<a href="https://www.youtube.com/watch?v=6v2L2UGZJAM" class="view-video iframe-link video-btn d-flex justify-content-center align-items-center fs-30px lh-115px btn btn-outline-light border border-white border-2 rounded-circle transition-all-1"><svg class="icon">
								<use xlink:href="#icon-play-fill"></use>
							</svg></a>





					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="pt-lg-19 pt-14 pb-lg-18 pb-15">

		<div class="container container-xxl">
			<div class="mb-md-13 mb-11">
				<div class="text-center" data-animate="fadeInUp">
					<h2 class="mb-6">Why Shop with Glowing?</h2>
				</div>

			</div>
			<div class="row gx-30px gy-30px">
				<div class="col-lg-4" data-animate="fadeInUp">
					<div class="">
						<div class="d-flex justify-content-center">


							<img class="lazy-image img-fluid" src="#" data-src="./assets/images/image-box/image-box-16.png" width="140" height="140" alt="Guaranteed PURE">
						</div>
						<div class="card-body text-center pt-7 mt-3">
							<h3 class="fs-4 mb-6">Guaranteed PURE</h3>
							<p class="mb-0 px-lg-6">All Grace formulations adhere to strict purity standards and will never contain harsh or toxic ingredients</p>
						</div>
					</div>

				</div>
				<div class="col-lg-4" data-animate="fadeInUp">
					<div class="">
						<div class="d-flex justify-content-center">


							<img class="lazy-image img-fluid" src="#" data-src="./assets/images/image-box/image-box-19.png" width="140" height="140" alt="Completely Cruelty-Free">
						</div>
						<div class="card-body text-center pt-7 mt-3">
							<h3 class="fs-4 mb-6">Completely Cruelty-Free</h3>
							<p class="mb-0 px-lg-6">All Grace formulations adhere to strict purity standards and will never contain harsh or toxic ingredients</p>
						</div>
					</div>

				</div>
				<div class="col-lg-4" data-animate="fadeInUp">
					<div class="">
						<div class="d-flex justify-content-center">


							<img class="lazy-image img-fluid" src="#" data-src="./assets/images/image-box/image-box-20.png" width="140" height="140" alt="Ingredient Sourcing">
						</div>
						<div class="card-body text-center pt-7 mt-3">
							<h3 class="fs-4 mb-6">Ingredient Sourcing</h3>
							<p class="mb-0 px-lg-6">All Grace formulations adhere to strict purity standards and will never contain harsh or toxic ingredients</p>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<section class="bg-section-3 ">

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
	</section>


	<section class="pt-14 pt-lg-18 mt-3">

		<div class="container container-xxl testimonial">
			<div class="row">
				<div class="col-lg-4 d-flex flex-column  justify-content-lg-between mb-12 mb-lg-0">
					<div class="mt-lg-8 text-left" data-animate="fadeInUp">
						<h2 class="mb-6">Testimonials</h2>
						<p class="fs-18px w-80">Made using clean, non-toxic ingredients, our products are designed for everyone.</p>
					</div>

					<div class="d-flex mt-2 custom-arrow" data-animate="fadeInUp">
						<div class="custom-arrows-02-prev position-static slick-arrow" aria-label="Previous" style=""><i class="far fa-chevron-left"></i></div>
						<div class="custom-arrows-02-next position-static ms-7 slick-arrow" aria-label="Next" style=""><i class="far fa-chevron-right"></i></div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="slick-slider custom-arrows-02 custom-slider-04" data-slick-options='{&#34;arrows&#34;:true,&#34;autoplay&#34;:true,&#34;centerMode&#34;:false,&#34;cssEase&#34;:&#34;ease-in-out&#34;,&#34;dots&#34;:false,&#34;fade&#34;:false,&#34;infinite&#34;:true,&#34;responsive&#34;:[{&#34;breakpoint&#34;:1024,&#34;settings&#34;:{&#34;slidesToShow&#34;:2}},{&#34;breakpoint&#34;:992,&#34;settings&#34;:{&#34;slidesToShow&#34;:2}},{&#34;breakpoint&#34;:768,&#34;settings&#34;:{&#34;slidesToShow&#34;:1}}],&#34;slidesToShow&#34;:2,&#34;speed&#34;:600}'>
						<div class="px-6 py-0" data-animate="fadeInUp">
							<div class="card border-0 bg-section-3 rounded p-sm-11 p-9">
								<div class="card-body px-4">
									<div class="d-flex align-items-center fs-14px ls-0 mb-6">
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
										</div>
									</div>
									<p class="fs-5 text-primary fw-semibold mb-11">
										“ Amazing product. The results are so transformative in texture and my face feels plump and healthy. Highly recommend! “
									</p>
									<div class="d-flex align-items-center">
										<div class="d-flex justify-content-start align-items-center">
											<img src="#" data-src="./assets/images/testimonial/testimonials-05.png" alt="" class="lazy-image me-7" style="width: 60px; height: 60px">
											<div class="author-info">
												<h4 class="fw-bold text-uppercase mb-1 fs-15px fw-bold ls-1">JENNIFER C.</h4>
												<p class="mb-0">/ Orlando, FL</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="px-6 py-0" data-animate="fadeInUp">
							<div class="card border-0 bg-section-3 rounded p-sm-11 p-9">
								<div class="card-body px-4">
									<div class="d-flex align-items-center fs-14px ls-0 mb-6">
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
										</div>
									</div>
									<p class="fs-5 text-primary fw-semibold mb-11">
										“ Amazing product. The results are so transformative in texture and my face feels plump and healthy. Highly recommend! “
									</p>
									<div class="d-flex align-items-center">
										<div class="d-flex justify-content-start align-items-center">
											<img src="#" data-src="./assets/images/testimonial/testimonials-06.png" alt="" class="lazy-image me-7" style="width: 60px; height: 60px">
											<div class="author-info">
												<h4 class="fw-bold text-uppercase mb-1 fs-15px fw-bold ls-1">JENNIFER C.</h4>
												<p class="mb-0">/ Orlando, FL</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="px-6 py-0" data-animate="fadeInUp">
							<div class="card border-0 bg-section-3 rounded p-sm-11 p-9">
								<div class="card-body px-4">
									<div class="d-flex align-items-center fs-14px ls-0 mb-6">
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
										</div>
									</div>
									<p class="fs-5 text-primary fw-semibold mb-11">
										“ Amazing product. The results are so transformative in texture and my face feels plump and healthy. Highly recommend! “
									</p>
									<div class="d-flex align-items-center">
										<div class="d-flex justify-content-start align-items-center">
											<img src="#" data-src="./assets/images/testimonial/testimonials-04.png" alt="" class="lazy-image me-7" style="width: 60px; height: 60px">
											<div class="author-info">
												<h4 class="fw-bold text-uppercase mb-1 fs-15px fw-bold ls-1">JENNIFER C.</h4>
												<p class="mb-0">/ Orlando, FL</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="pt-14 pt-lg-16 pb-8 pb-md-12 pb-lg-16">

		<div class="container container-xxl">
			<div class="mb-11">
				<div class="text-center" data-animate="fadeInUp">
					<h2 class="mb-6">More to Discover</h2>
				</div>

			</div>
			<div class="row">
				<div class="col-md-4 mb-9 mb-md-0" data-animate="fadeInUp">
					<div class="card border-0 hover-zoom-in">
						<div class="image-box-4">


							<img class="lazy-image img-fluid lazy-image" src="#" data-src="./assets/images/image-box/image-box-21.jpg" width="960" height="640" alt="">
						</div>
						<div class="card-body text-body-emphasis text-center pt-9 mt-2">
							<h5 class="card-titletext-decoration-none fs-4 d-block fw-semibold"><a class="color-inherit text-decoration-none" href="#">Find a Store</a></h5>
							<a href="#" title="Shop now" class="btn btn-link fw-semibold text-body-emphasis">Our Store <i class="far fa-arrow-right fs-14px ps-2 ms-1"></i></a>
						</div>
					</div>

				</div>
				<div class="col-md-4 mb-9 mb-md-0" data-animate="fadeInUp">
					<div class="card border-0 hover-zoom-in">
						<div class="image-box-4">


							<img class="lazy-image img-fluid lazy-image" src="#" data-src="./assets/images/image-box/image-box-13.jpg" width="960" height="640" alt="">
						</div>
						<div class="card-body text-body-emphasis text-center pt-9 mt-2">
							<h5 class="card-titletext-decoration-none fs-4 d-block fw-semibold"><a class="color-inherit text-decoration-none" href="#">From Our Blog</a></h5>
							<a href="#" title="Shop now" class="btn btn-link fw-semibold text-body-emphasis">Read more <i class="far fa-arrow-right fs-14px ps-2 ms-1"></i></a>
						</div>
					</div>

				</div>
				<div class="col-md-4 mb-9 mb-md-0" data-animate="fadeInUp">
					<div class="card border-0 hover-zoom-in">
						<div class="image-box-4">


							<img class="lazy-image img-fluid lazy-image" src="#" data-src="./assets/images/image-box/image-box-14.jpg" width="960" height="640" alt="">
						</div>
						<div class="card-body text-body-emphasis text-center pt-9 mt-2">
							<h5 class="card-titletext-decoration-none fs-4 d-block fw-semibold"><a class="color-inherit text-decoration-none" href="#">Our Story</a></h5>
							<a href="#" title="Shop now" class="btn btn-link fw-semibold text-body-emphasis">View More <i class="far fa-arrow-right fs-14px ps-2 ms-1"></i></a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

</main>