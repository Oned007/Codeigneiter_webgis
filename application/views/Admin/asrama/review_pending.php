<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Review Pengajuan Asrama</h3>
                <div class="card-tools">
                    <?php if($pending->status == 'pending'): ?>
                    <div class="btn-group">
                        <button onclick="approve(<?= $pending->id_pending ?>)" 
                                class="btn btn-success">
                            <i class="fas fa-check"></i> Approve
                        </button>
                        <button onclick="reject(<?= $pending->id_pending ?>)" 
                                class="btn btn-danger">
                            <i class="fas fa-times"></i> Reject
                        </button>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <dl class="row">
                            <dt class="col-sm-4">Nama Asrama</dt>
                            <dd class="col-sm-8"><?= $pending->nama_asrama ?></dd>

                            <dt class="col-sm-4">Alamat</dt>
                            <dd class="col-sm-8"><?= $pending->alamat_asrama ?></dd>

                            <dt class="col-sm-4">Provinsi</dt>
                            <dd class="col-sm-8">
                                <?= $provinsi->nama_provinsi ?? '-' ?>
                            </dd>

                            <dt class="col-sm-4">Telepon</dt>
                            <dd class="col-sm-8"><?= $pending->telephone ?></dd>
                        </dl>
                    </div>
                    
                    <div class="col-md-6">
                        <dl class="row">
                            <dt class="col-sm-4">Harga Sewa</dt>
                            <dd class="col-sm-8">Rp <?= number_format($pending->harga_sewa,0,',','.') ?></dd>

                            <dt class="col-sm-4">Kapasitas/Kamar</dt>
                            <dd class="col-sm-8"><?= $kapasitas->jumlah_kapasitas ?? '-' ?></dd>

                            <dt class="col-sm-4">Jenis Kamar</dt>
                            <dd class="col-sm-8"><?= $jenis->nama_jenis ?? '-' ?></dd>

                            <dt class="col-sm-4">Tanggal Pengajuan</dt>
                            <dd class="col-sm-8"><?= date('d/m/Y H:i', strtotime($pending->created_at)) ?></dd>
                        </dl>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <h5>Fasilitas</h5>
                        <div class="row">
                            <?php foreach($fasilitas as $f): ?>
                            <div class="col-md-3">
                                <span class="badge bg-primary"><?= $f->nama_fasilitas ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <h5>Foto Asrama</h5>
                        <div class="row">
                            <?php foreach(explode(',', $pending->foto_asrama) as $foto): ?>
                            <div class="col-md-3 mb-3">
                                <img src="<?= base_url('uploads/pending/'.$foto) ?>" 
                                     class="img-fluid img-thumbnail"
                                     alt="Foto Asrama">
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <h5>Deskripsi Tambahan</h5>
                        <p><?= nl2br($pending->deskripsi) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function approve(id) {
    if(confirm('Approve pengajuan ini?')) {
        window.location = '<?= site_url('admin/approve-pending/') ?>' + id;
    }
}

function reject(id) {
    if(confirm('Tolak pengajuan ini?')) {
        window.location = '<?= site_url('admin/reject-pending/') ?>' + id;
    }
}
</script>