<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head><base href="../../">
		<title>DB Management</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				@include("includes.header")
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" style="" class="header align-items-stretch">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							<!--begin::Aside mobile toggle-->
							<div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
								<div class="btn btn-icon btn-active-color-white" id="kt_aside_mobile_toggle">
									<i class="bi bi-list fs-1"></i>
								</div>
							</div>
							<!--end::Aside mobile toggle-->
							<!--begin::Mobile logo-->
							<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
								<a href="../../demo13/dist/index.html" class="d-lg-none">
									<img alt="Logo" src="assets/media/logos/logo-demo13-compact.svg" class="h-25px" />
								</a>
							</div>
							<!--end::Mobile logo-->
							<!--begin::Wrapper-->
							<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
								<!--begin::Navbar-->
								<div class="d-flex align-items-stretch" id="kt_header_nav">
								</div>
								<!--end::Navbar-->
								<!--begin::Topbar-->
								<div class="d-flex align-items-stretch flex-shrink-0">
									<!--begin::Toolbar wrapper-->
									<div class="topbar d-flex align-items-stretch flex-shrink-0">
										<!--begin::User-->
										<div class="d-flex align-items-stretch" id="kt_header_user_menu_toggle">
											<!--begin::Menu wrapper-->
											<div class="topbar-item cursor-pointer symbol px-3 px-lg-5 me-n3 me-lg-n5 symbol-30px symbol-md-35px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
												<img src="assets/media/avatars/150-2.jpg" alt="metronic" />
											</div>
											<!--begin::Menu-->
											<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
												<!--begin::Menu item-->
												<div class="menu-item px-3">
													<div class="menu-content d-flex align-items-center px-3">
														<!--begin::Avatar-->
														<div class="symbol symbol-50px me-5">
															<img alt="Logo" src="assets/media/avatars/150-26.jpg" />
														</div>
														<!--end::Avatar-->
														<!--begin::Username-->
														<div class="d-flex flex-column">
															<div class="fw-bolder d-flex align-items-center fs-5">Max Smith
															<span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span></div>
															<a href="#" class="fw-bold text-muted text-hover-primary fs-7">max@kt.com</a>
														</div>
														<!--end::Username-->
													</div>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu separator-->
												<div class="separator my-2"></div>
												<!--end::Menu separator-->
												<!--begin::Menu item-->
												<div class="menu-item px-5">
													<a href="../../demo13/dist/account/overview.html" class="menu-link px-5">My Profile</a>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<div class="menu-item px-5">
													<a href="../../demo13/dist/pages/projects/list.html" class="menu-link px-5">
														<span class="menu-text">My Projects</span>
														<span class="menu-badge">
															<span class="badge badge-light-danger badge-circle fw-bolder fs-7">3</span>
														</span>
													</a>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
													<a href="#" class="menu-link px-5">
														<span class="menu-title">My Subscription</span>
														<span class="menu-arrow"></span>
													</a>
													<!--begin::Menu sub-->
													<div class="menu-sub menu-sub-dropdown w-175px py-4">
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="../../demo13/dist/account/referrals.html" class="menu-link px-5">Referrals</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="../../demo13/dist/account/billing.html" class="menu-link px-5">Billing</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="../../demo13/dist/account/statements.html" class="menu-link px-5">Payments</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="../../demo13/dist/account/statements.html" class="menu-link d-flex flex-stack px-5">Statements
															<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="View your statements"></i></a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu separator-->
														<div class="separator my-2"></div>
														<!--end::Menu separator-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<div class="menu-content px-3">
																<label class="form-check form-switch form-check-custom form-check-solid">
																	<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
																	<span class="form-check-label text-muted fs-7">Notifications</span>
																</label>
															</div>
														</div>
														<!--end::Menu item-->
													</div>
													<!--end::Menu sub-->
												</div>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<div class="menu-item px-5">
													<a href="../../demo13/dist/account/statements.html" class="menu-link px-5">My Statements</a>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu separator-->
												<div class="separator my-2"></div>
												<!--end::Menu separator-->
												<!--begin::Menu item-->
												<div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
													<a href="#" class="menu-link px-5">
														<span class="menu-title position-relative">Language
														<span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
														<img class="w-15px h-15px rounded-1 ms-2" src="assets/media/flags/united-states.svg" alt="" /></span></span>
													</a>
													<!--begin::Menu sub-->
													<div class="menu-sub menu-sub-dropdown w-175px py-4">
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="../../demo13/dist/account/settings.html" class="menu-link d-flex px-5 active">
															<span class="symbol symbol-20px me-4">
																<img class="rounded-1" src="assets/media/flags/united-states.svg" alt="" />
															</span>English</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="../../demo13/dist/account/settings.html" class="menu-link d-flex px-5">
															<span class="symbol symbol-20px me-4">
																<img class="rounded-1" src="assets/media/flags/spain.svg" alt="" />
															</span>Spanish</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="../../demo13/dist/account/settings.html" class="menu-link d-flex px-5">
															<span class="symbol symbol-20px me-4">
																<img class="rounded-1" src="assets/media/flags/germany.svg" alt="" />
															</span>German</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="../../demo13/dist/account/settings.html" class="menu-link d-flex px-5">
															<span class="symbol symbol-20px me-4">
																<img class="rounded-1" src="assets/media/flags/japan.svg" alt="" />
															</span>Japanese</a>
														</div>
														<!--end::Menu item-->
														<!--begin::Menu item-->
														<div class="menu-item px-3">
															<a href="../../demo13/dist/account/settings.html" class="menu-link d-flex px-5">
															<span class="symbol symbol-20px me-4">
																<img class="rounded-1" src="assets/media/flags/france.svg" alt="" />
															</span>French</a>
														</div>
														<!--end::Menu item-->
													</div>
													<!--end::Menu sub-->
												</div>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<div class="menu-item px-5 my-1">
													<a href="../../demo13/dist/account/settings.html" class="menu-link px-5">Account Settings</a>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<div class="menu-item px-5">
													<a href="../../demo13/dist/authentication/flows/basic/sign-in.html" class="menu-link px-5">Sign Out</a>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu separator-->
												<div class="separator my-2"></div>
												<!--end::Menu separator-->
												<!--begin::Menu item-->
												<div class="menu-item px-5">
													<div class="menu-content px-5">
														<label class="form-check form-switch form-check-custom form-check-solid pulse pulse-success" for="kt_user_menu_dark_mode_toggle">
															<input class="form-check-input w-30px h-20px" type="checkbox" value="1" name="mode" id="kt_user_menu_dark_mode_toggle" data-kt-url="../../demo13/dist/index.html" />
															<span class="pulse-ring ms-n1"></span>
															<span class="form-check-label text-gray-600 fs-7">Dark Mode</span>
														</label>
													</div>
												</div>
												<!--end::Menu item-->
											</div>
											<!--end::Menu-->
											<!--end::Menu wrapper-->
										</div>
										<!--end::User -->
										<!--begin::Heaeder menu toggle-->
										<div class="d-flex align-items-stretch d-lg-none px-3 me-n3" title="Show header menu">
											<div class="topbar-item" id="kt_header_menu_mobile_toggle">
												<i class="bi bi-text-left fs-1"></i>
											</div>
										</div>
										<!--end::Heaeder menu toggle-->
									</div>
									<!--end::Toolbar wrapper-->
								</div>
								<!--end::Topbar-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<!--begin::Container-->
							@yield('toolbar')
							<!--end::Container-->
						</div>
						<!--end::Toolbar-->
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							@yield("contents")
						</div>
						<!--end::Post-->
					</div>
					<!--end::Content-->
					@include("includes.footer")
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Scrolltop-->
		<!--end::Main-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		@yield('custom_js')
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/modals/create-app.js"></script>
		<script src="assets/js/custom/modals/upgrade-plan.js"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>