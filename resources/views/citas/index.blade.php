@extends('layouts.app')

@section('title', 'Citas')

@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="container">
    <table id="tablagenerica" class="table table-striped table-bordered display nowrap">
        <thead>
            <tr>
                <td>Acciones</td>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Empleados reservados</th>
                <th>Asistencias</th>                      
            </tr>
        </thead>
        <tbody>
            @foreach($citas as $key => $value)
            <tr>
                <!-- Mostrarmos los botones de mostrar, ediar y borrar -->
                <td>
                    <div class="btn-group-vertical">
                        {{ Form::open(array('url' => 'citas/' . $value->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Borrar', array('class' => 'btn btn-outline-danger btn-sm btn-block' )) }}
                        {{ Form::close() }}
                        <a class="btn btn-outline-success btn-sm btn-block" href="{{ URL::to('citas/' . $value->id) }}">Detalles</a>
                        <a class="btn btn-outline-info btn-sm btn-block" href="{{ URL::to('citas/' . $value->id . '/edit') }}">Editar</a>
                    </div>
                </td>
                <td>{{ $value->razonsocial }}</td>
                <td>{{ $value->fecha }}</td>
                <td>{{ $value->numeroempleadosreservados }}</td>
                <td>{{ $value->numeroempleadosasistentes }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection