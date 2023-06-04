$(document).ready(function() {
    var table = $('#datatable_responsive').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );
} );