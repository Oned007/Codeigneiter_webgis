<?php if ($this->session->userdata('power') == 'Admin') { ?>
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto">
                            <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                <i class="ficon feather icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <ul class="nav navbar-nav float-right">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link nav-link-expand">
                            <i class="ficon feather icon-maximize"></i>
                        </a>
                    </li>
                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up"><!-- disini banyak data yang masuk --></span></a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <div class="dropdown-header m-0 p-2">
                  <h3 class="white"><!-- disini masukkan fungsi hitung data yang masuk --></h3><span class="grey darken-2">Notifications</span>
                </div>
              </li>

              <li class="scrollable-container media-list">
                <!-- foreach data input user yang masuk -->
                <a class="d-flex" href="">
                  <div class="media d-flex align-items-start">
                    <div class="media-left">
                      <div class="">
                        <h2><i class="feather " class="avatar-icon mr-10"></i></h2>
                      </div>
                    </div>
                    <div class="media-body">
                      <p class="media-heading"><span class="font-weight-bolder">
                          <span style="color: rgb(0, 106, 255)">Data Asrama Masuk</span> <br>
                          <small class="notification-text"> </small>
                      </p>
                    </div>
                  </div>
                </a>
                <!-- endforeach data input user yang masuk -->
              </li>
            </ul>
          </li>
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" data-toggle="dropdown" aria-expanded="false">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-bold-600">Super Admin</span>
                                <span class="user-status">Super Admin</span>
                            </div>
                            <span>
                                <!-- Pastikan path gambar avatar benar -->
                                <?php
                                $avatar_path = 'assets/img/avatar.png'; // Path default avatar
                                if (isset($user_avatar) && !empty($user_avatar)) {
                                    $avatar_path = $user_avatar; // Gunakan avatar pengguna jika ada
                                }
                                ?>
                                <img class="round" src="<?= base_url($avatar_path) ?>" alt="avatar" height="50" width="50">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= site_url('admin/auth/out') ?>">
                                <i class="feather icon-power"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<?php } else { ?>
    <div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto">
                            <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                <i class="ficon feather icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link nav-link-expand">
                            <i class="ficon feather icon-maximize"></i>
                        </a>
                    </li>
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" data-toggle="dropdown" aria-expanded="false">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-bold-600">User</span>
                                <span class="user-status">User</span>
                            </div>
                            <span>
                                <!-- Pastikan path gambar avatar benar -->
                                <?php
                                $avatar_path = 'assets/img/avatar.png'; // Path default avatar
                                if (isset($user_avatar) && !empty($user_avatar)) {
                                    $avatar_path = $user_avatar; // Gunakan avatar pengguna jika ada
                                }
                                ?>
                                <img class="round" src="<?= base_url($avatar_path) ?>" alt="avatar" height="50" width="50">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= site_url('admin/auth/out') ?>">
                                <i class="feather icon-power"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<?php } ?>