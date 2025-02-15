<!-- START: Banner -->
<section id="banner-search">
	<div class="row ">
		<div class="col-12 mt-2">
			<div class="card banner-bg white">
				<div class="card-content">
					<div class="card-body p-sm-4 p-2">
						<br><br>
						<br><br><br>
						<h1 class="white">Asrama Kita</h1>
						<p class="card-text mb-2">
							Sebuah Website Sistem Geografis
						</p>
						<p>
							Khusus Asrama Daerah di Yogyakarta.
						</p>
						<br><br>
						<br><br><br>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<br>
<!-- END: Banner -->
<!-- Map -->
<section id="banner-search">
	<div class="card" id="mapss">
		<div class="col-12 mt-2">
			<div class="card banner-bg black">
				<div class="card-content">
					<div id="map">
					</div>
				</div>
			</div>
		</div>
</section>
<!-- END:Map -->
<!-- Card -->
<br>
<div class="card-btn d-flex justify-content-between mt-2 " id="asrama">
	<p style="color:black; font-size:1rem; font-weight:bold">Asrama</p>
</div>
<div class="row match-height">
	<?php foreach ($datatable as $row): ?>
	<div class="col-xl-3 col-md-6 col-sm-12">
		<div class="card">
			<div class="card-content">
				<div>
					<?php 
                    // Split foto menjadi array
                    $fotos = explode(',', $row->foto_asrama);
                    $foto_pertama = !empty($fotos) ? trim($fotos[0]) : 'placeholder.jpg';
                    ?>
					<img class="card-img-top img-fluid" src="<?= base_url('admin/foto_asrama/'.$foto_pertama) ?>"
						alt="Card image cap" style="max-height: 180px">
				</div>
				<div class="card-body">
					<a href="<?= site_url('dashboard/detail/'. $row->id_asrama) ?>">
						<h5 style="min-height: 40px"><?=$row->nama_asrama; ?></h5>
					</a>
					<div class="d-flex justify-content-between">
						<a href="" class="btn gradient-light-primary btn-sm"><?=$row->nama_jenis; ?></a>
						<a href="#" class="btn btn-outline- btn-sm"></a>
					</div>
					<p class="card-text mt-1 mb-0"><i class="feather icon-map-pin"></i> <?=$row->alamat_asrama; ?></p>
					<span class="card-text" style="color: rgb(96, 93, 93);text-decoration: line-through"></span>
					<br>
					<span class="card-text" style="color: black">Rp.<?=$row->harga_sewa; ?>/ Bulan</span>
					<div class="card-btn d-flex justify-content-between mt-2">
						<a href="<?= site_url('dashboard/detail/'. $row->id_asrama) ?>"
							class="btn btn-outline-primary btn-sm">Detail</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>



