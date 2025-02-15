<script type="text/javascript">
let table=$('.dt').DataTable( {
	"ajaxSource": "<?=site_url($url)?>/datatablee",
	"columnDefs": [ {
	    "targets":  [0,5],
	    "orderable": false,
	} ],
	"order": [[ 1, "desc" ]],
} );


</script>