<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-shadow navbar-brand-center">
	<div class="navbar-header d-xl-block d-none">
		<ul class="nav navbar-nav flex-row">
			<li class="nav-item">
				<a class="navbar-brand" href="/">
					<div class="brand-logo"></div>
					<a href="<?=site_url('')?>" style="color: black">
					<h2>Asrama Kita</h2>
				</a>
			</li>
		</ul>
	</div>
	<div class="navbar-wrapper">
		<div class="navbar-container content">
			<div class="navbar-collapse" id="navbar-mobile">
				<div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
					<ul class="nav navbar-nav ">
						<li class="nav-item mobile-menu d-none mr-auto"><a
								class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
									class="ficon feather icon-menu"></i></a></li>
						<li class="mr-2 d-none d-xl-block">
							<a href="<?=site_url('#asrama')?>" style="color: black"><i class="feather icon-home nav-item" data-toggle="tooltip"
									data-placement="bottom" title="Asrama"></i> Asrama</a>
						</li>
						<li class="mr-2 d-none d-xl-block">
							<a href="<?=site_url('#mapss')?>" style="color: black"><i
									class="feather icon-calendar " data-toggle="tooltip" data-placement="top"
									title="Lihat Map"></i> Lihat Map</a>
						</li>
						<li class="d-none d-xl-block nav-item">
							<a href="<?=site_url('dashboard/form/tambah')?>" style="color: black"><i
									class="feather icon-square " data-toggle="tooltip" data-placement="top"
									title="Ajukan Data Asrama"></i> Ajukan Data Asrama</a>
						</li>
						
					</ul>
				</div>
				<ul class="nav navbar-nav float-right">
					<li class="nav-item">
						<a class="nav-link nav-link-label" href="<?=site_url('dashboard/tampil')?>">
							<i class="feather icon-book"></i> <span class=" mr-2">Daftar Ajuan Asrama</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link nav-link-label" href="<?=site_url('admin/auth')?>">
							<i class="feather icon-log-in"></i> <span class=" mr-2">Masuk</span></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>