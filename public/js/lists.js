$(document).ready( function () {
    
    // AJAX request 
//    $.ajax({
//      url: '../clientes/all',
//      type: 'get',
//      dataType: 'json',
//      success: function(clientes){
//          $('select[name="municipios"]').empty();
//            $.each(clientes, function(key, value) {
//                $('select[name="municipios"]').append('<option value="'+ value.id +'">'+ value.codigo +'</option>');
//            });
//      }
//   });
   
//   $.ajax({
//      url: '../citas/all',
//      type: 'get',
//      dataType: 'json',
//      success: function(citas){
//      }
//   });

    $.ajax({
          url: '../municipios',
          type: 'get',
          dataType: 'json',
          success: function(municipios){
              $('select[name="municipios"]').empty();
                $.each(municipios, function(key, value) {
                    $('select[name="municipios"]').append('<option value="'+ value.id +'">'+ value.city_name +'</option>');
                });
          }
       });
});

