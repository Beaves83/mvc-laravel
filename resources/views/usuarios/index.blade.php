@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="container">
    <table id="tablagenerica" class="table table-striped table-bordered display nowrap">
        <thead class="">
            <tr>
                <td>Nombre</td>
                <td>Email</td>
                <td>Rol</td>
                @if (Auth::user()->hasRole('admin'))
                <td></td>
                <td></td>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->description }}</td>
                @if (Auth::user()->hasRole('admin'))
                <td>
                    <div class="btn-group-horizontal">
                        <a class="   " href="{{ URL::to('usuarios/' . $value->id) }}"><i class="fa fa-info-circle"></i></a>
                        <a class="   " href="{{ URL::to('usuarios/' . $value->id . '/edit') }}"><i class="fa fa-pencil-square-o"></i></a>
                    </div>
                </td>
                <td>
                    {{ Form::open(array('url' => 'usuarios/' . $value->id, 'class' => '')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Borrar', array('class' => 'btn btn-outline-danger btn-sm btn-block' )) }}
<!--                           {{ Form::button('<i class="fa fa-trash  fa-2x"></i>', ['type' => 'submit', 'class' => ''] )  }}-->
                    {{ Form::close() }} 
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection