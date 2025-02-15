<link rel="stylesheet" type="text/css" href="<?=base_url('assets/js/leaflet-search/dist/leaflet-search.min.css')?>">
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
<style type="text/css">
	.search-tip b {
		display: inline-block;
		clear: left;
		float: right;
		padding: 0 4px;
		margin-left: 4px;
	}

	/* Penyesuaian posisi control */
	.leaflet-top.leaflet-right {
		margin-top: 10px;
		/* Memberi ruang untuk panel layer */
	}

	.leaflet-bottom.leaflet-right {
		right: 270px;
		/* Menyesuaikan posisi routing control */
	}
</style>

<!-- Scripts -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
	integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHqhgVQmhdp3XAJ91LHRdXJ3YOjP1V2Gs" async defer></script>
<script src="<?=base_url('assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js')?>"></script>
<script src="<?=base_url('assets/js/leaflet.ajax.js')?>"></script>
<script src="<?=base_url('assets/js/Leaflet.GoogleMutant.js')?>"></script>
<script src="<?=base_url('assets/node_modules/leaflet-easyprint/dist/bundle.js')?>"></script>
<script src="<?=base_url('assets/js/leaflet-search/dist/leaflet-search.src.js')?>"></script>
<script src="<?=site_url('admin/api/data/provinsi')?>"></script>
<script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>

<script type="text/javascript">
	var map = L.map('map').setView([-7.8032504, 110.3748449], 13);
	var layersProvinsi = [];
	var routingControl = null;

	// Base Layer
	var Layer = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: 'Map data &copy; OpenStreetMap contributors'
	}).addTo(map);

	// Easy Print
	L.easyPrint({
		title: 'Cetak Peta',
		position: 'topleft',
		exportOnly: true,
		filename: 'WebGIS-Asrama',
		sizeModes: ['Current', 'A4Portrait', 'A4Landscape']
	}).addTo(map);

	// Base Layers
	var baseLayers = [{
			name: "OpenStreetMap",
			layer: Layer
		},
		{
			name: "Satelit Google",
			layer: L.gridLayer.googleMutant({
				type: 'satellite'
			})
		},
		{
			name: "Roadmap Google",
			layer: L.gridLayer.googleMutant({
				type: 'roadmap'
			})
		}
	];

	function popUp(f, l) {
    if (f.properties) {
        // Membuat carousel foto
        let fotoHTML = '';
        if(f.properties.foto && f.properties.foto.length > 0) {
            fotoHTML = `<div style="margin: 10px 0; height: 150px; overflow: hidden; position: relative;">
                <div style="display: flex; overflow-x: auto; scroll-snap-type: x mandatory; gap: 5px;">
                    ${f.properties.foto.map(foto => `
                        <img src="<?= base_url('admin/foto_asrama/') ?>${foto}" 
                             style="height: 140px; min-width: 200px; object-fit: cover; scroll-snap-align: start; border-radius: 5px;">
                    `).join('')}
                </div>
            </div>`;
        } else {
            fotoHTML = '<div style="height: 100px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; border-radius: 5px;">Tidak ada foto</div>';
        }

        let content = `
            <div style="width: 300px; font-family: Arial, sans-serif;">
                ${fotoHTML}
                <div style="padding: 10px;">
                    <h3 style="margin: 0 0 5px 0; font-size: 16px; color: #333;">${f.properties.name}</h3>
                    <div style="font-size: 12px; color: #666; margin-bottom: 10px;">
                        <i class="fa fa-map-marker-alt"></i> ${f.properties.lokasi}
                    </div>
                    <div style="display: flex; gap: 10px; margin-top: 10px;">
                        <button onclick="trackRoute(${f.geometry.coordinates[1]}, ${f.geometry.coordinates[0]})" 
                            style="flex: 1; padding: 8px 12px; background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 12px;">
                            <i class="fa fa-route"></i> Rute
                        </button>
                        <a href="${f.properties.link}" 
                            style="flex: 1; padding: 8px 12px; background: #28a745; color: white; text-align: center; border-radius: 5px; text-decoration: none; font-size: 12px;">
                            <i class="fa fa-info-circle"></i> Detail
                        </a>
                    </div>
                </div>
            </div>
        `;
        
        l.bindPopup(content, {
            maxWidth: 400,
            className: 'custom-popup' // Untuk custom CSS tambahan
        });
    }
}
	// Fungsi Tracking Rute
	function trackRoute(lat, lng) {
		if (routingControl) {
			map.removeControl(routingControl);
		}

		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function (position) {
				routingControl = L.Routing.control({
					waypoints: [
						L.latLng(position.coords.latitude, position.coords.longitude),
						L.latLng(lat, lng)
					],
					routeWhileDragging: true,
					showAlternatives: false,
					collapsible: true,
					position: 'bottomright', // Penempatan routing control
					lineOptions: {
						styles: [{
							color: '#007bff',
							opacity: 0.7,
							weight: 5
						}]
					}
				}).addTo(map);
			}, function (error) {
				alert('Aktifkan izin lokasi untuk menggunakan fitur ini!');
			});
		} else {
			alert('Browser tidak mendukung geolokasi');
		}
	}

	// Layer Provinsi
	for (let i = 0; i < dataProvinsi.length; i++) {
        let data = dataProvinsi[i];
        let layer = {
            name: data.nama_provinsi,
            layer: new L.GeoJSON.AJAX([`<?=site_url('admin/api/data/asrama/point')?>/${data.id_provinsi}`], {
                pointToLayer: (feature, latlng) => {
                    return L.marker(latlng); // Menggunakan icon default
                },
                onEachFeature: (feature, layer) => {
                    if (feature.properties) popUp(feature, layer);
                }
            })
        };
        layersProvinsi.push(layer);
    }
	// Panel Layer Control
	var panelLayers = new L.Control.PanelLayers(baseLayers, [{
		group: "Daftar Provinsi",
		layers: layersProvinsi
	}], {
		collapsibleGroups: true,
		collapsed: false,
		position: 'topright'
	}).addTo(map);

	// Inisialisasi Routing Error Control
	L.Routing.errorControl().addTo(map);
</script>