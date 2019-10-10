$(document).ready( function () {
    
    //#region TablaClientes
    
    $('#tablaclientes thead tr').clone(true).appendTo( '#tablaclientes thead' );
    $('#tablaclientes thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( tablaClientes.column(i).search() !== this.value ) {
                tablaClientes
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
    
    var tablaClientes = $('#tablaclientes').DataTable({
        dom: 'Bfrtip',
        bFilter: false,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        orderCellsTop: true,
        fixedHeader: true
    } );

    
    //#endregion
    
    //#region TablaCitas
    
    $('#tablacitas thead tr').clone(true).appendTo( '#tablacitas thead' );
    $('#tablacitas thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            
            if ( tablacitas.column(i).search() !== this.value ) {
                tablacitas
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
    
    var tablacitas = $('#tablacitas').DataTable({
        dom: 'Bfrtip',
        bFilter: false,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        orderCellsTop: true,
        fixedHeader: true
    } );
    
    //#endregion

} )
