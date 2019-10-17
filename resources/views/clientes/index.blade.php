@extends('layouts.app')

@section('title', 'Clientes')

@section('content')

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Código</td>
            <td>Razón social</td>
            <td>Cif</td>
            <td>Dirección</td>
            <td>Municipio</td>
            <td>Provincia</td>
            <td>Fecha inicio contrato</td>
            <td>Fecha fin contrato</td>
            <td>Reconocimientos contratados</td>
            <td>Reconocimientos usados</td>           
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
    @foreach($clientes as $key => $value)
        <tr>
            <td>{{$value->codigo}}</td>
            <td>{{ $value->razonsocial }}</td>
            <td>{{ $value->cif }}</td>
            <td>{{ $value->direccion }}</td>
            <td>{{ $value->municipio }}</td>
            <td>{{ $value->provincia }}</td>
            <td>{{ $value->fechainiciocontrato }}</td>
            <td>{{ $value->fechafincontrato }}</td>     
            <td>{{ $value->numeroreconocimientoscontratados }}</td>
            <td>{{ $value->numeroreconocimientosutilizados }}</td>
            

            <!-- Mostrarmos los botones de mostrar, ediar y borrar -->
            <td>
                <a class="btn btn-small btn-danger" href="{{ URL::to('clientes/' . $value->id) }}">Eliminar</a>
                <a class="btn btn-small btn-success" href="{{ URL::to('clientes/' . $value->id) }}">Detalles</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('clientes/' . $value->id . '/edit') }}">Editar</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
@endsection