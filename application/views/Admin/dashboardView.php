<section id="dashboard-analytics">
    <div class="row">
      <div class="col-xl-5 col-md-12 col-sm-12">
        <div class="card bg-analytics text-white">
          <div class="card-content">
            <div class="card-body text-center">
              <img src="<?= base_url('assets/img/decore-left.png') ?>" class="img-left" alt=" card-img-left">
              <img src="<?= base_url('assets/img/decore-right.png') ?>" class="img-right" alt=" card-img-right">
                <div class="avatar avatar-xl bg-primary shadow mt-0">
                    <div class="avatar-content">
                        <i class="feather icon-heart font-large-1"></i>
                    </div>
                </div>
                <div class="text-center">
                    <h1 class="mb-2 text-white">Welcome, Admin </h1>
                </div>
              </div>
          </div>
        </div>
      </div>
      <div class="col-xl-5 col-md-12 col-sm-12">
        <div class="card text-center">
            <div class="card-content">
                <div class="card-body">
                    <div class="avatar bg-rgba-primary p-50 m-0 mb-1">
                        <div class="avatar-content">
                            <i class="feather icon-user text-primary font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700"><?= $total_asrama ?></h2>
                    <p class="mb-0 line-ellipsis">Total Asrama</p>
                </div>
            </div>
        </div>
      </div>
      <div class="col-xl-9 col-md-6 col-12">
        <div class="card card-statistics">
            <div class="card-header">
                <h4 class="card-title">Statistics</h4>
            </div>
            <div class="card-body statistics-body">
              <div class="row">
              <?php foreach ($asrama_by_provinsi as $provinsi): ?>
                  <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                      <div class="media">
                          <div class="avatar bg-rgba-primary mr-2 p-50 m-0 mb-1">
                              <div class="avatar-content">
                                  <i class="feather icon-home" class="avatar-icon"></i>
                              </div>
                          </div>
                          <div class="media-body my-auto">
                              <h4 class="font-weight-bolder mb-0"><?= $provinsi['total'] ?></h4>
                              <p class="card-text font-small-3 mb-1"><?= $provinsi['nama_provinsi'] ?></p>
                          </div>
                      </div>
                  </div>
                  <?php endforeach ?>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
