$(document).ready( function () {
        
    //#region DateTableGenerica
    
    //$('#tablagenerica thead tr').clone(true).appendTo( '#tablagenerica thead' );
//    $('#tablagenerica thead tr:eq(1) th').each( function (i) {
//        var title = $(this).text();
//        $(this).html( '<input type="text" placeholder="Busca '+title+'" />' );
// 
//        $( 'input', this ).on( 'keyup change', function () {
//            
//            if ( tablagenerica.column(i).search() !== this.value ) {
//                tablagenerica
//                    .column(i)
//                    .search( this.value )
//                    .draw();
//            }
//        } );
//    } );
    
    var tablagenerica = $('#tablagenerica').DataTable({
       // dom: 'Bfrtip',
        //bFilter: false,
//        buttons: [
//            'copy', 'csv', 'excel', 'pdf', 'print'
//        ],
        responsive: true,
        scrollX: true,
        processing: true,
        searchHighlight: true,
        lengthMenu: [ [15, 30, 45, -1], [15, 30, 45, "All"] ],
        orderCellsTop: true,
        oLanguage: {
            "sSearch": "Buscar:",
            "sLengthMenu": "Mostrar _MENU_ entradas",
            "sZeroRecords": "No hay registros para mostrar",
            "sInfoEmpty": "No hay registros para mostrar",
            "sInfo": "Hay  _TOTAL_ entradas para mostrar (_START_ a _END_)",
            "sPrevious": "Página anterior",
            "sNext": "Página siguiente",
            "sLast": "Última página",
            "sFirst": "Primera página"
        }
        //fixedHeader: true
    } );
    
    tablagenerica.columns.adjust().draw();
    
    //#endregion

} )
