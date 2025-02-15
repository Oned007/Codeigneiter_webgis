<script type="text/javascript">
let table = $('.dt').DataTable({
    "ajax": {
        "url": "<?=site_url($url)?>/datatablee",
        "type": "GET"
    },
    "columns": [
        { "data": null, "render": function(data, type, row, meta) {
            return meta.row + 1;
        }},
        { "data": "nama_asrama" },
        { "data": "alamat_asrama" },
        { "data": "nama_provinsi" },
        { "data": "status" },
        { "data": null, "render": function(data, type, row) {
            return '<div class="btn-group">' +
                '<a href="<?=site_url($url)?>/form/ubah/' + row.id_input + '" class="btn btn-success" onclick="return confirm(\'Review data ini?\')"><i class="fa fa-edit"></i>Review</a>' +
                '</div>';
        }}
    ],
    "order": [[1, "desc"]]
});
</script>