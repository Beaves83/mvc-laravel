@extends('layouts.app')

@section('title', 'Citas')
@section('content')
<div class="container">
    <center>
        <h1>CITAS</h1>
        
    </center>
    
            <br />
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select name="filter_gender" id="filter_gender" class="form-control" required>
                            <option value="">Seleccion ID</option>
                             @foreach($citas as $cita)
                            <option value="{{ $cita->id }}">{{ $cita->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="filter_country" id="filter_country" class="form-control" required>
                            <option value="">Selecciona Cliente</option>
                            @foreach($citas as $cita)
                            <option value="{{ $cita->cliente_id }}">{{ $cita->cliente_id }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group" align="center">
                        <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>

                        <button type="button" name="reset" id="reset" class="btn btn-default">Reset</button>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            <br />
   <div class="table-responsive">
    <table id="tablacitas" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>
                            </th>
                            <th>Id</th>
                            <th>Id Cliente</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                </table>
   </div>
            <br />
            <br />
</div>

<script>
$(document).ready(function(){

    fill_datatable();

    function fill_datatable(filter_gender = '', filter_country = '')
    {
        var dataTable = $('#tablacitas').DataTable({
            processing: true,
            serverSide: true,
//            ajax: {
//            url: "citas/store"
//            
//            },
            ajax:{
                url: "{{ URL::asset('citas/store') }}",
                type : 'GET',
                dataType: 'json',
                
                success :  function(result)
                {
                    console.log(result)
                    
                    data : result
                }
                //data:{filter_gender:filter_gender, filter_country:filter_country}
            },
            columns: [
                {
                    data:'id',
                    name:'id'
                },
                {
                    data:'cliente_id',
                    name:'cliente_id'
                },
               {
                    data:'fecha',
                    name:'fecha'
                },
            ]
        });
    }

    $('#filter').click(function(){
        var filter_gender = $('#filter_gender').val();
        var filter_country = $('#filter_country').val();

        if(filter_gender != '' &&  filter_gender != '')
        {
            $('#tablacitas').DataTable().destroy();
            fill_datatable(filter_gender, filter_country);
        }
        else
        {
            alert('Select Both filter option');
        }
    });

    $('#reset').click(function(){
        $('#filter_gender').val('');
        $('#filter_country').val('');
        $('#tablacitas').DataTable().destroy();
        fill_datatable();
    });

});
</script>

@endsection