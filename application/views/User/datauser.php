<!-- Container Utama -->
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Daftar Pengajuan Asrama</h4>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>Nama Asrama</th>
                            <th>Alamat Asrama</th>
                            <th>Asal Asrama</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($datauser)): ?>
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($datauser as $row): ?>
                            <tr>
                                <td><?= $row->nama_asrama ?></td>
                                <td><?= $row->alamat_asrama ?></td>
                                <td><?= $row->nama_provinsi ?></td>
                                <td>
                                    <span class="badge 
                                        <?= $row->status == 'Diterima' ? 'bg-success' : 
                                            ($row->status == 'Ditolak' ? 'bg-danger' : 
                                            'bg-warning text-dark') ?>">
                                        <?= $row->status ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if($row->status != 'diterima' && $row->status != 'ditolak'): ?>
                                        <div class="btn-group">
                                            <a href="<?= site_url('dashboard/form/ubah/'.$row->id_input) ?>" 
                                                class="btn btn-sm btn-success" 
                                                title="Review">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= site_url('dashboard/hapus/'.$row->id_input) ?>" 
                                                class="btn btn-sm btn-danger" 
                                                title="Hapus"
                                                onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <span class="text-muted">Tidak tersedia</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>