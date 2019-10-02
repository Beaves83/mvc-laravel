@extends('layouts.app')

@section('title', 'Citas')
@section('content')
<div class="container">
    <center>
        <h1>Citas médicas</h1>
    </center>

    <table border="0" cellspacing="5" cellpadding="5">
        <tbody>
            <tr class="col-12">
                <td>Fechas:</td>
                <td style="width:350px">
                    <select name="filter_gender" id="filter_gender" class="form-control col-md-12" required>
                        <option value="">Elige una fecha</option>
                        @foreach($citas as $cita)
                            <option value="{{ $cita->id }}">{{ $cita->fecha }}</option>
                        @endforeach
                    </select>
                </td>
                <td style="width:350px">
                    <select name="filter_gender" id="filter_gender" class="form-control col-md-12" required>
                        <option value="">Elige una fecha</option>
                        @foreach($citas as $cita)
                        <option value="{{ $cita->id }}">{{ $cita->fecha }}</option>
                        @endforeach
                    </select>
                </td >
                <td>Municipio</td>
                <td style="width:350px">
                    <select name="filter_country" id="filter_country" class="form-control" required>
                        <option value="">Selecciona un cliente</option>
                        @foreach($citas as $cita)
                        <option value="{{ $cita->cliente_id }}">{{ $cita->razonsocial }}</option>
                        @endforeach
                    </select>
                </td>
                <td style="width:100px">
                    <button class='btn btn-primary'>Filtrar</button>
                </td>
            </tr>
        </tbody>
    </table>
    
    <table id="tablacitas" class="table table-bordered table-striped">
        <thead>
            <tr>    
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Empleados reservados</th>
                <th>Asistencias</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($citas as $cita)
            <tr>
                <td>{{ $cita->razonsocial }}</td>
                <td>{{ $cita->fecha }}</td>
                <td>{{ $cita->numeroempleadosreservados }}</td>
                <td>{{ $cita->numeroempleadosasistentes }}</td>
                <td><button class="btn"><i class="fas fa-edit"></i></button><button class="btn"><i class="fas fa-trash"></i></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function () {

        //fill_datatable();

        function fill_datatable(filter_gender = '', filter_country = '')
        {
            //console.debug("filtros: "+filter_gender )
            var dataTable = $('#tablacitas').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ URL::asset('citas/all') }}",
                    type: 'GET',
                    dataType: 'json',
                    dataSrc: function (json) {
                        //console.debug(json)
                        return json;
                    },
//                success :  function(result)
//                {
//                    console.log(result)
//                    console.log(JSON.stringify(result))
//                    data: result
//                }
                    //dataSrc:{filter_gender:filter_gender, filter_country:filter_country}
                },
                columns: [
                    
                    {
                        data: 'razonsocial',
                        name: 'Cliente'
                    },
                    {
                        data: 'fecha',
                        name: 'fecha'
                    },
                    {
                        data: 'numeroempleadosreservados',
                        name: 'numeroempleadosreservados'
                    },
                    {
                        data: 'numeroempleadosasistentes',
                        name: 'numeroempleadosasistentes'
                    },
                    {
                        className:      'details-control',
                        orderable:      false,
                        data:           null,
                        defaultContent: '<button class="btn"><i class="fas fa-edit"></i></button><button class="btn"><i class="fas fa-trash"></i></button>'
                    },
                ]
            });
        }

        $('#filter').click(function () {
            var filter_gender = $('#filter_gender').val();
            var filter_country = $('#filter_country').val();

            if (filter_gender != '' && filter_gender != '')
            {
                $('#tablacitas').DataTable().destroy();
                fill_datatable(filter_gender, filter_country);
            }
            else
            {
                alert('Selecciona los filtros');
            }
        });

        $('#reset').click(function () {
            $('#filter_gender').val('');
            $('#filter_country').val('');
            $('#tablacitas').DataTable().destroy();
            fill_datatable();
        });

    });
</script>

@endsection