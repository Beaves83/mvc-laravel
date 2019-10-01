@extends('layouts.app')

@section('title', 'Clientes')
@section('content')
<div class="container">
    <center>
    <h1>CLIENTES</h1>
<!--    {{$clientes}}-->
    </center>
    
    <table border="0" cellspacing="5" cellpadding="5">
        <tbody><tr>
            <td>Razón social:</td>
            <td><input type="text" id="min" name="min"></td>
        </tr>
        <tr>
            <td>Municipio</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
    </tbody></table>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Razón Social</th>
                <th>CIF</th>
                <th>Dirección</th>
                <th>Municipio</th>
                <th>Provincia</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th>Número reconocimientos</th>
                <th>Reconocimiento Completados</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{ $cliente->codigo }}</td>
                <td>{{ $cliente->razonsocial }}</td>
                <td>{{ $cliente->cif }}</td>
                <td>{{ $cliente->direccion }}</td>
                <td>{{ $cliente->municipio }}</td>
                <td>{{ $cliente->provincia }}</td>
                <td>{{ $cliente->fechainiciocontrato }}</td>
                <td>{{ $cliente->fechafincontrato }}</td>
                <td>{{ $cliente->numeroreconocimientoscontratados }}</td>
                <td>{{ $cliente->numeroreconocimientosutilizados }}</td>
                <td><p>Pencil icon: <span class="glyphicon glyphicon-pencil"></span></p>    </td>
            </tr>
            
            @endforeach
            
            
        </tbody>
       
    </table>
</div>

<script>
//$(document).ready(function() {
//    $('#example').DataTable();
//} );

</script>
@endsection