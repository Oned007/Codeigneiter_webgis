<!-- jQuery -->
<script src="<?=templates('vendors/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap -->
<script src="<?=templates('vendors/bootstrap/dist/js/bootstrap.bundle.min.js')?>"></script>
<!-- FastClick -->
<script src="<?=templates('vendors/fastclick/lib/fastclick.js')?>"></script>
<!-- NProgress -->
<script src="<?=templates('vendors/nprogress/nprogress.js')?>"></script>

<!-- JS Vendors -->
<script src="<?=base_url('assets/js/vendors/js/vendors.min.js')?>"></script>
<script src="<?=base_url('assets/js/vendors/js/forms/select/select2.full.min.js')?>"></script>
<script src="<?=base_url('assets/vendor/js/extensions/swiper.min.js')?>"></script>
<script src="<?=base_url('assets/js/vendors/js/ui/prism.min.js')?>"></script>
<script src="<?=base_url('assets/js/vendors/js/tables/datatable/datatables.min.js')?>"></script>
<script src="<?=base_url('assets/js/vendors/js/tables/datatable/datatables.bootstrap4.min.js')?>"></script>
<script src="<?=base_url('assets/js/vendors/js/charts/apexcharts.min.js')?>"></script>
<script src="<?=base_url('assets/js/vendors/js/pickers/pickadate/picker.js')?>"></script>
<script src="<?=base_url('assets/js/vendors/js/pickers/pickadate/picker.date.js')?>"></script>

<!-- Theme JS -->
<script src="<?=base_url('assets/js/core/app-menu.js')?>"></script>
<script src="<?=base_url('assets/js/core/app.js')?>"></script>
<script src="<?=base_url('assets/js/scripts/components.js')?>"></script>

<!-- Page JS -->
<script src="<?=base_url('assets/js/scripts/datatables/datatable.js')?>"></script>
<script src="<?=base_url('assets/js/scripts/pages/user-profile.js')?>"></script>
<script src="<?=base_url('assets/js/scripts/pickers/dateTime/pick-a-datetime.js')?>"></script>
<script src=" <?=base_url('assets/js/scripts/extensions/ext-component-ratings.js')?>"></script>
<script src=" <?=base_url('assets/js/vendors/js/extensions/jquery.rateyo.min.js')?>"></script>
<script src="<?=base_url('assets/js/scripts/forms/select/form-select2.js')?>"></script>
<script src="<?=base_url('assets/js/scripts/extensions/swiper.js')?>"></script>
<script src="<?=base_url('assets/js/scripts/pages/dashboard-ecommerce.js')?>"></script>
<script src="<?=base_url('assets/js/scripts/forms/select/form-select2.js')?>"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.select2').select2({
        allowClear: true,
		width: '100%'
    });
});
</script>

<!-- Custom Theme Scripts -->
<script src="<?=templates('build/js/custom.min.js')?>"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
<script type="text/javascript">
	$.extend($.fn.dataTable.defaults, {
		"bJQueryUI": false,
		"bAutoWidth": false,
		"order": [
			[2, "desc"]
		],
		"stateSave": true,
		"serverSide": true,
		"iDisplayLength": 10,
		"processing": false,
		"dom": "<'row' <'col-xs-6 col-sm-3'l><'col-xs-6 col-sm-3'><'col-xs-6 col-sm-3'C><'col-xs-6 col-sm-3'f>r>" +
			"<'row't>" +
			"<'row'<'col-md-5'i><'col-md-7'p>>",
		"aLengthMenu": [
			[5, 10, 30, 50, 100],
			[5, 10, 30, 50, 100]
		],
		"language": {
			zeroRecords: "Maaf data tidak ditemukan",
			info: "_START_ s/d _END_ dari _TOTAL_ data",
			infoEmpty: "0 sampai 0 dari 0 data",
			infoFiltered: "(disaring dari _MAX_ total data)",
			searchPlaceholder: 'Cari...',
			search: '',
			lengthMenu: '_MENU_ Item/Halaman',
			"paginate": {
				"previous": "<",
				"next": ">",

			}
		},
		responsive: true
	});
</script>