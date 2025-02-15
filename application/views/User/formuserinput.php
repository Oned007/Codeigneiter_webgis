<?php
$id_asrama="";
$id_input="";
$id_provinsi="";
$nama_asrama="";
$alamat_asrama="";
$ukuran_asrama="";
$foto_asrama="";
$telephone="";
$instagram="";
$deskripsi="";
$fasilitas="";
$id_jenis="";
$id_kapasitas="";
$kapasitas_asrama="";
$jumlah_kamar="";
$harga_sewa="";
$latt_asrama="";
$long_asrama="";
if($parameter=='ubah' && $id!=''){
    $this->db->where('id_asrama',$id);
    $row=$this->Model->get()->row_array();
    if ($row) {
        extract($row);
    }
}
?>
<section id="basic-vertical-layouts">
	<div class="row match-height">
		<div class="col-md-12 col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Form Pengajuan Data Asrama</h4>
				</div>
				<div class="card-content">
					<div class="card-body">
						<form method="post" action="<?=site_url($url.'/simpan')?>" enctype="multipart/form-data">
							<?=input_hidden('id_input',$id_input)?>
							<?=input_hidden('parameter',$parameter)?>
							<div class="form-body ">
								<div class="row">
									<div class="col-sm-12">
										<label class="col-form-label">Nama Asrama</label>
										<?=input_text('nama_asrama',$nama_asrama, ['placeholder' => ' Masukkan Nama'])?>
										<small style="color: red"></small>
									</div>
									<div class="col-sm-3">
										<label class="col-form-label">Jenis Kamar</label>
										<?php
                        $op=null;
	    				$op['']='Pilih Jenis Kamar';
                        $get=$this->JenisAsramaModel->get();
	    				foreach ($get->result() as $row) {
	    					$op[$row->id_jenis]=$row->nama_jenis;
	    				}
	    			?>
										<?=select('id_jenis',$op,$id_jenis)?>
									</div>
									<div class="col-sm-3">
										<label class=" col-form-label">Jumlah Kamar</label>
										<?=input_text('jumlah_kamar',$jumlah_kamar, ['placeholder' => ' Masukkan Jumlah Kamar yang Dimiliki'])?>
									</div>
									<div class="col-sm-3">
										<label class=" col-form-label">Kapasitas Asrama</label>
										<?=input_text('kapasitas_asrama',$kapasitas_asrama, ['placeholder' => ' Masukkan Kapasitas asrama'])?>
									</div>
									<div class="col-sm-3">
										<label class="col-form-label">Harga Sewa</label>
										<?=input_text('harga_sewa',$harga_sewa, ['placeholder' => ' Masukkan Harga sewa'])?>
									</div>


									<div class="col-sm-4">
										<label class="col-form-label">Provinsi</label>
										<?php
										$op=null;
										$op['']='Pilih Provinsi';
										$get=$this->ProvinsiModel->get();
										foreach ($get->result() as $row) {
											$op[$row->id_provinsi]=$row->nama_provinsi;
										}
									?>
										<?=select('id_provinsi',$op,$id_provinsi)?>
									</div>
									<div class="col-sm-4">
										<label class="col-form-label">Kapasitas Per Kamar</label>
										<?php
										$op=null;
										$op['']='Pilih';
										$get=$this->KapasitasModel->get();
										foreach ($get->result() as $row) {
											$op[$row->id_kapasitas]=$row->jumlah_kapasitas;
										}
									?>
										<?=select('id_kapasitas',$op,$id_kapasitas)?>
									</div>
									
									<div class="col-sm-3">
										<label class="col-form-label">telephone Asrama</label>
										<?=input_text('telephone',$telephone)?>
										<small style="color: red">*Nomor telephone sebaiknya terhubung dengan
											Whatsapp</small>
									</div>
									<div class="col-sm-3">
										<label class="col-form-label">Instagram Asrama</label>
										<?=input_text('instagram',$instagram)?>
									</div>
									<div class="col-12">
										<label class="col-form-label">Alamat Lengkap Asrama</label>
										<?=textarea('alamat_asrama',$alamat_asrama, ['placeholder' => ' Masukkan Alamat Asrama'])?>
									</div>
								</div>
								<div class="col-sm-3">
										<label class="col-form-label">Lattitude Asrama</label>
										<?=input_text('latt_asrama',$latt_asrama, ['placeholder' => ' Latitude Asrama'])?>
									</div>

									<!-- Longitude Asrama -->
									<div class="col-sm-3">
										<label class="col-form-label">Longitude Asrama</label>
										<?=input_text('long_asrama',$long_asrama, ['placeholder' => ' Longtitude Asrama'])?>
									</div>
								<div class="form-group ">
									<div class="row">
										<div class="col-12">
											<label class="col-form-label">Deskripsi</label>
											<?=textarea('deskripsi',$deskripsi, ['placeholder' => ' Masukkan Deskripsi Asrama'])?>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-form-label">Fasilitas Asrama</label>
									<select name="fasilitas[]" class="form-control select2" multiple="multiple">
										<?php 
										foreach($fasilitass as $f): ?>
										<option value="<?= $f->id_fasilitas ?>"
											<?= (in_array($f->id_fasilitas, $selected_fasilitas)) ? 'selected' : '' ?>>
											<?= $f->nama_fasilitas ?>
										</option>
										<?php endforeach; ?>
									</select>
								</div>
								<span id="image">
									<div class="form-group ">
										<div class="row">
											<div class="col-lg-5 col-xl-5 col-10">
												<label class="col-form-label">Foto Asrama & Kamar</label>
												<?php if (!empty($foto_asrama)): ?>
												<div class="mb-3">
													<?php
													$foto_array = explode(',', $foto_asrama);
													foreach ($foto_array as $foto): ?>
													<img src="<?= base_url('admin/foto_asrama/' . $foto) ?>"
														alt="Foto Asrama" style="max-width: 200px; margin-right: 10px;">
													<?php endforeach; ?>
													<br>
													<small>Foto saat ini</small>
												</div>
												<?php endif; ?>
												<input type="file" name="foto_asrama[]" multiple>
												<input type="hidden" name="foto_asrama_lama"
													value="<?= $foto_asrama ?>">
											</div>
										</div>
									</div>
								</span>
								<!-- {{-- End Image --}} -->
								<div class="form-group row ">
									<div class="col-sm-10">
										<button type="submit" class="btn btn-primary">Tambah Asrama</button>
										<a href="<?=site_url($url)?>" class="btn btn-warning">Batal</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>