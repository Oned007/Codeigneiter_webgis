<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description"
		content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
	<meta name="keywords"
		content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
	<meta name="author" content="PIXINVENT">
	<title>Asrama Kita - Login Page
	</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?=base_url('assets/img/Logo.png')?>">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

	<!-- BEGIN:  CSS-->
	<link href="<?=base_url('assets/css/vendors/css/vendors.min.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/bootstrap.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/bootstrap-extended.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/components.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/colors.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/themes/dark-layout.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/themes/semi-dark-layout.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/core/menu/menu-types/horizontal-menu.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/core/colors/palette-gradient.css')?>" rel="stylesheet">
	<link href="<?=base_url('assets/css/pages/authentication.css')?>" rel="stylesheet">
	<!-- END:  CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body
	class="horizontal-layout horizontal-menu 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page"
	data-open="hover" data-menu="horizontal-menu" data-col="1-column">
	<!-- BEGIN: Content-->
	<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="header-navbar-shadow"></div>
		<div class="content-wrapper">
			<div class="content-header row">
			</div>
			<div class="content-body">
				<section class="row flexbox-container">
					<div class="col-xl-8 col-11 d-flex justify-content-center">
						<div class="card bg-authentication rounded-0 mb-0">
							<div class="row m-0">
								<div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
									<img src="<?=base_url('assets/img/login.png')?>" alt="branding logo">
								</div>
								<div class="col-lg-6 col-12 p-0">
									<div class="card rounded-0 mb-0 px-2">
										<div class="card-header pb-1">
											<div class="card-title">
												<h4 class="mb-0" style="text-align: center">Asrama Kita</h4>
											</div>
										</div>

										<div class="card-content mb-2">
											<div class="card-body pt-1">
												<form action="<?=site_url('admin/auth/check')?>" class="signin-form"
													method="POST">
													<?php if($this->session->flashdata('info')): ?>
													<?= $this->session->flashdata('info'); ?>
													<?php endif; ?>
													<input type="hidden" name="username"
														>
													<fieldset
														class="form-label-group form-group position-relative has-icon-left">
														<input type="text" name="username" class="form-control "
															value="" id="username" placeholder="Username">
														<div class="form-control-position">
															<i class="feather icon-user"></i>
														</div>
														<label for="username">Username</label>
													</fieldset>

													<fieldset class="form-label-group position-relative has-icon-left">
														<input type="password" name="password" class="form-control "
															id="password" placeholder="Password">
														<div class="form-control-position">
															<i class="feather icon-lock"></i>
														</div>
														<label for="user-password">Password</label>
													</fieldset>
													<div
														class="form-group d-flex justify-content-between align-items-center">
														<div class="text-left">
															<fieldset class="checkbox">
																<div class="vs-checkbox-con vs-checkbox-primary">
																	<input type="checkbox">
																	<span class="vs-checkbox">
																		<span class="vs-checkbox--check">
																			<i class="vs-icon feather icon-check"></i>
																		</span>
																	</span>
																	<span class="">Remember me</span>
																</div>
															</fieldset>
														</div>
														<!-- Space -->
													</div>
													<button type="submit"
														class="btn btn-primary float-right btn-inline">Login</button>
												</form>
											</div>
										</div>
										<div class="login-footer">
											<div class="divider">
												<div class="divider-text"><i class="feather icon-home"></i></div>
											</div>
											<div class="footer-btn d-inline">

												<a href="<?=site_url('')?>">
													<h5 style="text-align: center">Kembali</h5>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

			</div>
		</div>
	</div>
	<!-- END: Content-->


	<!-- BEGIN: Jquery JS-->
	<script src="<?=site_url('assets/js/login/jquery.min.js')?>"></script>
	<!-- BEGIN Jquery JS-->

	<!-- BEGIN:  JS-->
	<script src="<?=site_url('assets/js/login/jquery.sticky.js')?>"></script>
	<script src="<?=site_url('assets/js/login/app-menu.js')?>"></script>
	<script src="<?=site_url('assets/js/login/app.js')?>"></script>
	<script src="<?=site_url('assets/js/login/components.js')?>"></script>
	<!-- END: JS -->
	<!-- BEGIN: Original JS -->
	<script src="<?=site_url('assets/js/login/popper.js')?>"></script>
	<script src="<?=site_url('assets/js/login/bootstrap.min.js')?>"></script>
	<script src="<?=site_url('assets/js/login/main.js')?>"></script>
	<!-- END: Original JS -->
</body>
<!-- END: Body-->

</html>