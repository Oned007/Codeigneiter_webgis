<?php if ($this->session->userdata('power') == 'Admin') { ?>
  <!-- Sidebar untuk Admin (menu lengkap) -->
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
              <li class="nav-item mr-auto">
                  <a class="navbar-brand" href="<?= site_url('admin/admindashboard') ?>">
                      <div class="brand-logo"></div>
                      <h2 class="brand-text mb-0">Asrama Kita</h2>
                  </a>
              </li>
              <li class="nav-item nav-toggle">
                  <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                      <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                      <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary" data-ticon="icon-disc"></i>
                  </a>
              </li>
          </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <li class="<?= ($this->uri->segment(2) == 'admindashboard') ? 'active' : '' ?>">
                  <a href="<?= site_url('admin/admindashboard') ?>">
                      <i class="feather icon-home"></i>
                      <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                  </a>
              </li>
              <li class="<?= ($this->uri->segment(2) == 'asrama') ? 'has-sub sidebar-group-active open' : '' ?>">
                  <a href="<?= site_url('admin/asrama') ?>">
                      <i class="feather icon-square"></i>
                      <span class="menu-title" data-i18n="Campaign">Master Data</span>
                  </a>
                  <ul class="menu-content">
                      <li class="<?= ($this->uri->segment(2) == 'asrama' && $this->uri->segment(3) == '') ? 'active' : '' ?>">
                          <a href="<?= site_url('admin/asrama') ?>">
                              <i></i>
                              <span class="menu-item" data-i18n="Data Kamar">Data Asrama</span>
                          </a>
                      </li>
                      <li class="<?= ($this->uri->segment(2) == 'asrama' && $this->uri->segment(3) == 'form') ? 'active' : '' ?>">
                          <a href="<?= site_url('admin/asrama/form/tambah') ?>">
                              <i></i>
                              <span class="menu-item" data-i18n="Data Kamar">Tambah Data Asrama</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="<?= ($this->uri->segment(2) == 'mappoint') ? 'has-sub sidebar-group-active open' : '' ?>">
                  <a href="<?= site_url('admin/mappoint') ?>">
                      <i class="feather icon-map"></i>
                      <span class="menu-title" data-i18n="Campaign">Map</span>
                  </a>
                  <ul class="menu-content">
                      <li class="<?= ($this->uri->segment(2) == 'mappoint' && $this->uri->segment(3) == '') ? 'active' : '' ?>">
                          <a href="<?= site_url('admin/mappoint') ?>">
                              <i></i>
                              <span class="menu-item" data-i18n="Data Kamar">Lihat Map</span>
                          </a>
                      </li>
                  </ul>
              </li>
			  <li class="<?= ($this->uri->segment(2) == 'asrama'&& $this->uri->segment(3) == 'pending') ? 'active' : '' ?>">
                  <a href="<?= site_url('admin/asrama/pending') ?>">
                      <i class="ficon feather icon-bell"></i>
                      <span class="menu-title" data-i18n="Dashboard">Request Data</span>
                  </a>
              </li>
          </ul>
      </div>
  </div>
<?php } else { ?>
  <!-- Sidebar untuk non-Admin (hanya menu Data Asrama) -->
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
              <li class="nav-item mr-auto">
                  <a class="navbar-brand" href="<?= site_url('admin/asrama') ?>">
                      <div class="brand-logo"></div>
                      <h2 class="brand-text mb-0">Asrama Kita</h2>
                  </a>
              </li>
              <li class="nav-item nav-toggle">
                  <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                      <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                      <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary" data-ticon="icon-disc"></i>
                  </a>
              </li>
          </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
              <li class="<?= ($this->uri->segment(2) == 'asrama') ? 'has-sub sidebar-group-active open' : '' ?>">
                  <a href="<?= site_url('admin/asrama') ?>">
                      <i class="feather icon-square"></i>
                      <span class="menu-title" data-i18n="Campaign">Master Data</span>
                  </a>
                  <ul class="menu-content">
                      <li class="<?= ($this->uri->segment(2) == 'asrama' && $this->uri->segment(3) == '') ? 'active' : '' ?>">
                          <a href="<?= site_url('admin/asrama') ?>">
                              <i></i>
                              <span class="menu-item" data-i18n="Data Kamar">Data Asrama</span>
                          </a>
                      </li>
                  </ul>
                  <ul class="menu-content">
                      <li class="<?= ($this->uri->segment(2) == 'userasrama' && $this->uri->segment(3) == 'submit') ? 'active' : '' ?>">
                          <a href="<?= site_url('admin/userasrama/submit') ?>">
                              <i></i>
                              <span class="menu-item" data-i18n="Data Kamar">Form Ajukan Asrama</span>
                          </a>
                      </li>
                  </ul>
              </li>
          </ul>
      </div>
  </div>
<?php } ?>
