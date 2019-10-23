$(document).ready(function () {

    $.ajax({
        url: '../municipios',
        type: 'get',
        dataType: 'json',
        success: function (municipios) {
            $('select[name="municipios"]').empty();
            $.each(municipios, function (key, value) {
                $('select[name="municipios"]').append('<option value="' + value.id + '">' + value.city_name + '</option>');
            });
        }
    });
    
    $.ajax({
        url: '../provincias',
        type: 'get',
        dataType: 'json',
        success: function (provincias) {
            $('select[name="provincias"]').empty();
            $.each(provincias, function (key, value) {
                $('select[name="provincias"]').append('<option value="' + value.id + '">' + value.region_name + '</option>');
            });
        }
    });
    
    $.ajax({
        url: '../clientslist',
        type: 'get',
        dataType: 'json',
        success: function (clientes) {
            $('select[name="clientes"]').empty();
            $.each(clientes, function (key, value) {
                $('select[name="clientes"]').append('<option value="' + value.id + '">' + value.razonsocial + '</option>');
            });
        }
    });
});

