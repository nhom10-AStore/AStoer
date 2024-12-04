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
		<div class="main-header nav navbar bg-body navbar-light navbar-expand-xl py-6 py-xl-0">
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
						<li class="nav-item transition-all-xl-1 py-xl-11 py-0 me-xxl-11 me-xl-12 dropdown dropdown-hover dropdown-fullwidth">
							<a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-10px fs-xl-15px"
								href="<?= BASE_URL ?>" id="menu-item-home" aria-haspopup="true" aria-expanded="false">Trang chủ</a>
						</li>
						<li class="nav-item transition-all-xl-1 py-xl-11 py-0 me-xxl-12 me-xl-10 dropdown dropdown-hover">
							<a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-10px fs-xl-15px "
								href="<?= BASE_URL . '?act=list-san-pham' ?>" id="menu-item-pages" aria-haspopup="true" aria-expanded="false">Sản phẩm</a>
						</li>
						<li class="nav-item transition-all-xl-1 py-xl-11 py-0 me-xxl-12 me-xl-10">
							<a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-10px fs-xl-15px"
								href="<?= BASE_URL . '?act=tin-tucs' ?>" id="menu-item-blocks" aria-haspopup="true" aria-expanded="false">Bài viết</a>
						</li>
						<li class="nav-item transition-all-xl-1 py-xl-11 py-0 me-xxl-12 me-xl-10">
							<a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-10px fs-xl-15px"
								href="<?= BASE_URL . '?act=khuyen-mais' ?>" id="menu-item-blocks" aria-haspopup="true" aria-expanded="false">Khuyến mãi</a>
						</li>
						<li class="nav-item transition-all-xl-1 py-xl-11 py-0 me-xxl-12 me-xl-10">
							<a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-10px fs-xl-15px"
								href="<?= BASE_URL . '?act=lien-he' ?>" id="menu-item-blocks" aria-haspopup="true" aria-expanded="false">Liên hệ</a>
						</li>
					</ul>
				</div>
				<div class="icons-actions d-flex justify-content-end w-xl-50 fs-28px text-body-emphasis">
					<div class="px-xl-4 d-inline-block">
						<form action="<?= BASE_URL ?>" method="GET" class="mb-2" id="searchForm">
							<input type="hidden" name="act" value="search">
							<div class="input-group input-group-lg">
								<input
									type="text"
									name="keyword"
									class="form-control border-2"
									placeholder="Tìm kiếm sản phẩm..."
									aria-label="Search products"
									autocomplete="off">
								<button class="btn btn-primary" type="submit">
									<i class="far fa-search"></i>
								</button>
							</div>
						
						</form>

					</div>
					<div class="px-5 d-none d-xl-inline-block">
						<a href="<?= BASE_URL . '?act=quan_li_don_hang' ?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
								<path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5" />
								<path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
							</svg>

						</a>
					</div>
					<div class="px-5 d-none d-xl-inline-block">
						<a href="<?= BASE_URL . '?act=gio-hang' ?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-dash" viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="M5.5 10a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5" />
								<path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
							</svg>

						</a>
					</div>

					<div class="px-5 d-none d-xl-inline-block">
						<?php if (!isset($_SESSION['user'])): ?>
							<a class="lh-1 color-inherit text-decoration-none" href="<?= BASE_URL_ADMIN . '?act=login-admin' ?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
									<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
									<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
								</svg>
							</a>
						<?php else: ?>
							<a class="lh-1 color-inherit text-decoration-none" href="<?= BASE_URL . '?act=thong-tin-ca-nhan&id=' . $_SESSION['user']['id'] ?>">
								<img style="width: 30px; height:30px; border-radius:50%" src="<?= $_SESSION['user']['anh_dai_dien']  ?>" alt="User Avatar" class="user-avatar">
							</a>
							<a href="<?= BASE_URL ?>?act=dang-xuat" class="lh-1 color-inherit text-decoration-none" style="gap: 20px;">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
									<path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
									<path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
								</svg>
							</a>
						<?php endif; ?>
					</div>
					<!-- <div class="color-modes position-relative ps-5">
						<a class="bd-theme btn btn-link nav-link dropdown-toggle d-inline-flex align-items-center justify-content-center text-primary p-0 position-relative rounded-circle" href="#" aria-expanded="true" data-bs-toggle="dropdown" data-bs-display="static" aria-label="Toggle theme (light)">
							<svg class="bi my-1 theme-icon-active">
								<use href="#sun-fill"></use>
							</svg>
						</a>
						<ul class="dropdown-menu dropdown-menu-end fs-14px" data-bs-popper="static">
							<li>
								<button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light" aria-pressed="true">
									<svg class="bi me-4 opacity-50 theme-icon">
										<use href="#sun-fill"></use>
									</svg>
									Light
									<svg class="bi ms-auto d-none">
										<use href="#check2"></use>
									</svg>
								</button>
							</li>
							<li>
								<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
									<svg class="bi me-4 opacity-50 theme-icon">
										<use href="#moon-stars-fill"></use>
									</svg>
									Dark
									<svg class="bi ms-auto d-none">
										<use href="#check2"></use>
									</svg>
								</button>
							</li>
							<li>
								<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto" aria-pressed="false">
									<svg class="bi me-4 opacity-50 theme-icon">
										<use href="#circle-half"></use>
									</svg>
									Auto
									<svg class="bi ms-auto d-none">
										<use href="#check2"></use>
									</svg>
								</button>
							</li>
						</ul>
					</div>
				</div> -->
				</div>
			</div>
		</div>
</header>
<style>
	.input-group-lg .form-control {
    border-radius: 0.3rem;
}
.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}
.search-results {
    border: 1px solid #ddd;
    border-radius: 0.3rem;
    padding: 10px;
    background-color: #fff;
}


</style>