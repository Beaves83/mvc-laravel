@extends('layouts.app')

@section('title', 'Clientes')

@section('content')

<div class="container">
    <center>
        <h1>Clientes</h1>
    </center>

    <table id="tablaclientes" class="table table-striped table-bordered display nowrap" >
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
                <td><button class="btn"><i class="fas fa-edit"></i></button><button class="btn"><i class="fas fa-trash"></i></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection