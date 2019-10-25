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
        orderCellsTop: true,
        //fixedHeader: true
    } );
    
    //#endregion

} )
