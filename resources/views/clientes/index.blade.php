@extends('layouts.app')

@section('title', 'Clientes')

@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="container">
    <table id="tablaclientes" class="table table-striped table-bordered display nowrap">
        <thead>
            <tr>
                <td>Acciones</td>
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
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $key => $value)
            <tr>
                <!-- Mostrarmos los botones de mostrar, ediar y borrar -->
                <td>
                    <div class="btn-group-vertical">
                        {{ Form::open(array('url' => 'clientes/' . $value->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Borrar', array('class' => 'btn btn-outline-danger btn-sm btn-block' )) }}
                        {{ Form::close() }}
                        <a class="btn btn-outline-success btn-sm btn-block" href="{{ URL::to('clientes/' . $value->id) }}">Detalles</a>
                        <a class="btn btn-outline-info btn-sm btn-block" href="{{ URL::to('clientes/' . $value->id . '/edit') }}">Editar</a>
                    </div>
                </td>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection