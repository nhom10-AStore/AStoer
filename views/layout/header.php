<header id="header" class="header header-sticky header-sticky-smart disable-transition-all z-index-5">
	<div class="bg-body border-bottom">
		<div class="container-xxl container d-lg-flex d-none py-4">
			<div class="w-50">
				<ul class="list-inline mb-0 d-flex">
					<li class="list-inline-item d-flex align-items-center me-8 fs-6 fw-medium text-body-emphasis ">
						<svg class="icon me-4 d-block">
							<use xlink:href="#instagram"></use>
						</svg>
						<span>AStore</span>
					</li>
					<li class="list-inline-item d-flex align-items-center fs-6 fw-medium text-body-emphasis">
						<svg class="icon me-4">
							<use xlink:href="#facebook"></use>
						</svg>
						<span>AStore</span>
					</li>
				</ul>
			</div>
			<div class="w-100 text-center">
				<p class="mb-0 fs-16x fw-medium text-body-emphasis ">AStore
					<span class="mx-1">|</span>
					<a href="" class="border-bottom border-dark text-decoration-none">Thiên đường cho người yêu Apple</a>
				</p>
			</div>
			<div class="w-50 d-none d-lg-block">
				<div class="d-flex align-items-center justify-content-end">
					<p class="mb-0 fs-6 text-body-emphasis fw-medium me-10">
						<svg class="icon me-4">
							<use xlink:href="#location-dot"></use>
						</svg>
						<span>13-Trịnh Văn Bô-Hà Nội</span>
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="sticky-area">
		<div class="main-header nav navbar bg-body navbar-dark navbar-expand-xl py-6 py-xl-0">
			<div class="container-xxl container flex-nowrap">
				<div class="w-72px d-flex d-xl-none">
					<button class="navbar-toggler align-self-center  border-0 shadow-none px-0 canvas-toggle p-4" type="button"
						data-bs-toggle="offcanvas"
						data-bs-target="#offCanvasNavBar"
						aria-controls="offCanvasNavBar"
						aria-expanded="false"
						aria-label="Toggle Navigation">
						<span class="fs-24 toggle-icon"></span>
					</button>
				</div>

				<div class="d-none d-xl-flex w-xl-50">
					<ul class="navbar-nav">



						<li class="nav-item transition-all-xl-1 py-xl-11 py-0 me-xxl-12 me-xl-10 dropdown dropdown-hover dropdown-fullwidth">
							<a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px "
								href="<?= BASE_URL ?>" id="menu-item-home" aria-haspopup="true" aria-expanded="false">Trang chủ</a>
						</li>
						<li class="nav-item transition-all-xl-1 py-xl-11 py-0 me-xxl-12 me-xl-10 dropdown dropdown-hover">
							<a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px dropdown-toggle"
								href="#" data-bs-toggle="dropdown" id="menu-item-pages" aria-haspopup="true" aria-expanded="false">Danh mục</a>
							<ul class="dropdown-menu py-6" aria-labelledby="menu-item-pages">
								<li class="dropend " aria-haspopup="true" aria-expanded="false">
									<a class="dropdown-item pe-6  d-flex justify-content-between border-hover"
										href="#" data-bs-toggle="dropdown" id="menu-item-about-us">
										<span class="border-hover-target">
											Iphone
										</span>
									</a>
								<li class="dropend dropdown-hover" aria-haspopup="true" aria-expanded="false">
									<a class="dropdown-item pe-6  d-flex justify-content-between border-hover"
										href="#" data-bs-toggle="dropdown" id="menu-item-contact-us">
										<span class="border-hover-target">
											Ipad
										</span>
									</a>

								</li>
								<li class="dropend" aria-haspopup="true" aria-expanded="false">
									<a class="dropdown-item pe-6  d-flex justify-content-between border-hover"
										href="./dashboard/dashboard.html" data-bs-toggle="dropdown" id="menu-item-dashboard">
										<span class="border-hover-target">
											Mackbook
										</span>
									</a>
								</li>
								<li>
									<a class="dropdown-item pe-6 border-hover"
										href="./faqs.html">
										<span class="border-hover-target">
											Tai nghe
										</span>
									</a>
								</li>
								<li>
									<a class="dropdown-item pe-6 border-hover"
										href="./find-a-store.html">
										<span class="border-hover-target">
											Phụ kiện
										</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item transition-all-xl-1 py-xl-11 py-0 me-xxl-12 me-xl-10  ">
							<a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px "
								href="#" data-bs-toggle="dropdown" id="menu-item-blocks" aria-haspopup="true" aria-expanded="false">Bài viết</a>
						</li>

					</ul>
				</div>

				<a href="./" class="navbar-brand px-8 py-4 mx-auto">

					<!-- <img class="light-mode-img" src="assets/images/others/logoAStore-white.png" width="250" height="150"> -->
					<img class="dark-mode-img" src="assets/images/others/logoAStore.png" width="250" height="130"></a>

				<div class="icons-actions d-flex justify-content-end w-xl-50 fs-28px text-body-emphasis">
					<div class="px-xl-5 d-inline-block">
						<a class="lh-1 color-inherit text-decoration-none" href="#" data-bs-toggle="offcanvas"
							data-bs-target="#searchModal"
							aria-controls="searchModal"
							aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
								<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
							</svg>
						</a>
					</div>
					<div class="px-5 d-none d-xl-inline-block">
						<a class="position-relative lh-1 color-inherit text-decoration-none" href="./shop/wishlist.html">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
								<path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
							</svg>
							<span class="badge bg-dark text-white position-absolute top-0 start-100 translate-middle mt-4 rounded-circle fs-13px p-0 square" style="--square-size: 18px">3</span>
						</a>
					</div>
					<div class="px-5 d-none d-xl-inline-block">
						<a class="position-relative lh-1 color-inherit text-decoration-none" href="#" data-bs-toggle="offcanvas"
							data-bs-target="#shoppingCart"
							aria-controls="shoppingCart"
							aria-expanded="false">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-dash" viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="M5.5 10a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5" />
								<path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
							</svg>
							<span class="badge bg-dark text-white position-absolute top-0 start-100 translate-middle mt-4 rounded-circle fs-13px p-0 square" style="--square-size: 18px">3</span>
						</a>
					</div>
					<div class="px-5 d-none d-xl-inline-block">
						<?php if (!isset($_SESSION['user'])): ?>
							<a class="lh-1 color-inherit text-decoration-none" href="<?= BASE_URL_ADMIN . '?act=login-admin' ?>">
								<svg class="icon icon-user-light">
									<use xlink:href="#icon-user-light"></use>
								</svg>
							</a>
						<?php else: ?>
							<a class="lh-1 color-inherit text-decoration-none" href="<?= BASE_URL . '?act=thong-tin-ca-nhan&id='.$_SESSION['user']['id'] ?>">
								<img style="width: 30px; height:30px; border-radius:50%" src="<?= $_SESSION['user']['anh_dai_dien'] ?>" alt="User Avatar" class="user-avatar">
							</a>
							<a href="<?= BASE_URL ?>?act=dang-xuat" class="lh-1 color-inherit text-decoration-none" style="gap: 20px;">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
									<path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
									<path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
								</svg>
							</a>
						<?php endif; ?>
					</div>

				</div>
			</div>
		</div>
	</div>

</header>