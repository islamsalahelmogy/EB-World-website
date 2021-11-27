$(function(e) {
	$('#example').DataTable();
	$('#example2').DataTable();
} );
$(function(e) {
	
	$('.data-table-example').DataTable({
        "paging":   true,
        "ordering": true,
        "info":     false,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json"
		}
    });
} );