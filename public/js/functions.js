$(document).ready(function () {
    
    //Barra de cargado simulada.
      var current_progress = 0;
      var interval = setInterval(function() {
          current_progress += 10;
          $("#automaticBar")
          .css("width", current_progress + "%")
          .attr("aria-valuenow", current_progress)
          .text(current_progress + "% Complete");
          if (current_progress >= 100)
              clearInterval(interval);
      }, 800);
      
      
      //Barra de progreso de las citas
      var porcentaje = ( $('#asistentes').text() * 100 ) / $('#reservados').text();
      porcentaje = Math.trunc(porcentaje);
      if(porcentaje > 100){
          porcentaje = 100;
      }
      $("#barraProgresoCitas")
          .css("width", porcentaje + "%")
           .attr("aria-valuenow", porcentaje)
            .text(porcentaje + "%");
    
      if(porcentaje > 75 && porcentaje < 100){
          $("#barraProgresoCitas")
           .addClass( "bg-warning" );
      } else if (porcentaje === 100){
          $("#barraProgresoCitas")
          .addClass( "bg-danger" );
      }
      
      
      //Barra de progreso de clientes
      var porcentaje = ( $('#utilizados').text() * 100 ) / $('#contratados').text();
      porcentaje = Math.trunc(porcentaje);
      if(porcentaje > 100){
          porcentaje = 100;
      }
      $("#barraProgresoClientes")
          .css("width", porcentaje + "%")
           .attr("aria-valuenow", porcentaje)
            .text(porcentaje + "%");
    
      if(porcentaje > 75 && porcentaje < 100){
          $("#barraProgresoClientes")
           .addClass( "bg-warning" );
      } else if (porcentaje === 100){
          $("#barraProgresoClientes")
          .addClass( "bg-danger" );
      }

});

