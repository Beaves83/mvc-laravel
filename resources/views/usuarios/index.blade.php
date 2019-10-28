@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="container">
    <table id="tablagenerica" class="table table-striped table-bordered display nowrap">
        <thead>
            <tr>
                @if (Auth::user()->hasRole('admin'))
                    <td>Acciones</td>
                @endif
                <td>Nombre</td>
                <td>Email</td>
                     
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $key => $value)
            <tr>
                <!-- Mostrarmos los botones de mostrar, ediar y borrar -->
                @if (Auth::user()->hasRole('admin'))
                <td>
                    <div class="btn-group-vertical">
                        
                        {{ Form::open(array('url' => 'usuarios/' . $value->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Borrar', array('class' => 'btn btn-outline-danger btn-sm btn-block' )) }}
                        {{ Form::close() }}
                        <a class="btn btn-outline-success btn-sm btn-block" href="{{ URL::to('usuarios/' . $value->id) }}">Detalles</a>
                        <a class="btn btn-outline-info btn-sm btn-block" href="{{ URL::to('usuarios/' . $value->id . '/edit') }}">Editar</a>
                    </div>
                </td>
                @endif
                <td>{{$value->name}}</td>
                <td>{{ $value->email }}</td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection