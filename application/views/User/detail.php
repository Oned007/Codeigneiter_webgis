<style>
	.swiper {
		max-height: 455px !important;
	}

	.alerts {
		display: none;
	}
	.swiper-slide {
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
    }
    .swiper-slide img {
        max-height: 400px;
        width: auto !important;
    }
</style>
<div class="row">
	<div class="col-12">
		<h4 class="card-title">
		</h4>
	</div>
	<div class="col-xl-8 col-lg-12">
		<div class="card">
			<div class="card-content">
				<div class="card-body">
					<div class="swiper-navigations swiper-container swiper">
						<div class="swiper-wrapper">
							<?php foreach ($fotos as $index => $foto_asrama):?>
							<div class="swiper-slide">
								<img class="img-fluid" src="<?= base_url('admin/foto_asrama/'.trim($foto_asrama)); ?>"
									alt="banner">
							</div>
							<?php endforeach ?>
						</div>
						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12 col-xl-4">
		<div class="card">
			<div class="card-content">
				<div class="card-body ">
					<div id="maps">
					</div>
					<button onclick="trackRoute(<?= $datatable->latt_asrama ?>, <?= $datatable->long_asrama ?>)"
						style="margin-top: 10px; padding: 8px 15px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;"
						id="routeButton">
						Dapatkan Rute dari Lokasi Anda
					</button>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-8 col-lg-12">
		<div class="card">
			<div class="card-body">
				<h3><?= $datatable -> nama_asrama;?></h3>
				<button class="btn btn-outline-black btn-sm"><span style="font-size: 12px; font-weight:bold;">Asrama
						<?= $datatable -> nama_jenis;?></span></button>
				<button class="btn btn-outline-black btn-sm"><span style="font-size: 12px; font-weight:bold;">
						<?= $datatable -> nama_provinsi;?></span></button>
				<div class="row">
					<div class="col-md-6 mt-1">
						<span style="font-weight:bold">Jumlah Kamar <span
								style="color: red; font-weight:bold"><?= $datatable -> jumlah_kamar;?></span></span>
					</div>
				</div>
				
					<h5>Fasilitas:</h5>
					<ul>
						<?php if(!empty($fasilitas)): ?>
						<?php foreach($fasilitas as $f): ?>
						<li><?= $f->nama_fasilitas ?></li>
						<?php endforeach; ?>
						<?php else: ?>
						<li>Tidak ada fasilitas</li>
						<?php endif; ?>
					</ul>

				<h5 class="mt-1" style="font-weight: bold">Telephone Asrama</h5>
				<div class="d-flex justify-content-between">
					<p style="font-size: 13px">
						<?= $datatable -> telephone;?>
					</p>
				</div>

				<h5 class="mt-2" style="font-weight: bold">Deskripsi Asrama</h5>
				<?= $datatable -> deskripsi;?>
				<h5 class="mt-1" style="font-weight: bold">Biaya Sewa</h5>
				<?= $datatable -> harga_sewa;?>
				<h5 class="mt-1" style="font-weight: bold">Lokasi</h5>
				<small style="text-decoration:underline"> <?= $datatable -> alamat_asrama;?> </small>
				<hr>
				<div class="col-12">
    		<h5 class="mt-1" style="font-weight: bold;">Terakhir Diperbarui</h5>
    		<p><?= date('d F Y H:i', strtotime($datatable->updated_at)) ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
	<!-- Maps Css -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
		integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
		crossorigin="" />
	<link rel="stylesheet" href="<?=base_url()?>assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.css" />
	<style type="text/css">
		#maps {
			height: 450px;
			/* Pastikan ada height */
			width: 100%;
			position: relative;
			/* Tambahkan ini */
			z-index: 0;
			/* Pastikan tidak tertimpa elemen lain */
		}

		.icon {
			display: inline-block;
			margin: 2px;
			height: 16px;
			width: 16px;
			background-color: #black;
		}

		.icon-bar {
			background: url('assets/js/leaflet-panel-layers-master/examples/images/icons/bar.png') center center no-repeat;
		}

		.leaflet-tooltip.no-background {
			position: absolute;
			background: white;
			border: 0;
			box-shadow: none;
			color: #fff;
			font-weight: bold;
			text-shadow: 1px 1px 1px #000, -1px 1px 1px #000, 1px -1px 1px #000, -1px -1px 1px #000;
		}
	</style>

	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/js/leaflet-search/dist/leaflet-search.min.css')?>">
	<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
	<!-- Scripts -->
	<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
		integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHqhgVQmhdp3XAJ91LHRdXJ3YOjP1V2Gs" async defer>
	</script>
	<script src="<?=base_url('assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js')?>"></script>
	<script src="<?=base_url('assets/js/leaflet.ajax.js')?>"></script>
	<script src="<?=base_url('assets/js/Leaflet.GoogleMutant.js')?>"></script>
	<script src="<?=base_url('assets/node_modules/leaflet-easyprint/dist/bundle.js')?>"></script>
	<script src="<?=base_url('assets/js/leaflet-search/dist/leaflet-search.src.js')?>"></script>
	<script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>

	<script type="text/javascript">
		var map = L.map('maps').setView([<?= $datatable->latt_asrama ?>, <?= $datatable->long_asrama ?>], 15);
		var routingControl = null;

		// Base Layer
		var Layer = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: 'Map data &copy; OpenStreetMap contributors'
		}).addTo(map);

		// Tambahkan marker untuk asrama
		var asramaMarker = L.marker([ <?= $datatable -> latt_asrama ?> , <?= $datatable -> long_asrama ?> ])
			.bindPopup("<?= $datatable->nama_asrama ?>")
			.addTo(map);

		// Fungsi Tracking Rute yang lebih lengkap
		function trackRoute(lat, lng) {
			// Hapus rute sebelumnya jika ada
			if (routingControl) {
				map.removeControl(routingControl);
				routingControl = null;
			}

			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function (position) {
					// Tambahkan marker posisi pengguna
					var userMarker = L.marker([position.coords.latitude, position.coords.longitude])
						.bindPopup("Lokasi Anda")
						.addTo(map);

					// Buat rute
					routingControl = L.Routing.control({
						waypoints: [
							L.latLng(position.coords.latitude, position.coords.longitude),
							L.latLng(lat, lng)
						],
						routeWhileDragging: true,
						showAlternatives: false,
						collapsible: true,
						addWaypoints: false,
						position: 'bottomright',
						lineOptions: {
							styles: [{
								color: '#007bff',
								opacity: 0.7,
								weight: 5
							}]
						},
						formatter: new L.Routing.Formatter({
							units: 'metric'
						})
					}).addTo(map);

					// Fit view ke seluruh rute
					var bounds = L.latLngBounds([
						[position.coords.latitude, position.coords.longitude],
						[lat, lng]
					]);
					map.fitBounds(bounds);

				}, function (error) {
					alert('Error: ' + error.message + '\nAktifkan izin lokasi untuk menggunakan fitur ini!');
				}, {
					enableHighAccuracy: true,
					timeout: 5000,
					maximumAge: 0
				});
			} else {
				alert('Browser tidak mendukung geolokasi');
			}
		}

		// Penyesuaian kontrol peta
		L.easyPrint({
			title: 'Cetak Peta',
			position: 'topleft'
		}).addTo(map);

		// Panel layer control
		var baseLayers = {
			"OpenStreetMap": Layer,
			"Google Satellite": L.gridLayer.googleMutant({
				type: 'satellite'
			}),
			"Google Roadmap": L.gridLayer.googleMutant({
				type: 'roadmap'
			})
		};
		L.control.layers(baseLayers).addTo(map);
	</script>