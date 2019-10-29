@extends('layouts.app')

@section('title', 'Clientes')

@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="container">
    <table id="tablagenerica" class="table table-striped table-bordered display nowrap">
        <thead class="">
            <tr>
<!--                <td>Código</td>-->
                <td>Cif</td>
                <td>Razón social</td>             
<!--                <td>Dirección</td>
                <td>Municipio</td>
                <td>Provincia</td>-->
                <td>Fecha inicio contrato</td>
                <td>Fecha fin contrato</td>
                <td>R.Contratados</td>
                <td>R.Utilizados</td>     
                @if (Auth::user()->hasRole('admin') OR Auth::user()->hasRole('secretario') )
                <td></td>
                <td></td>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $key => $value)
            <tr>      
<!--                <td>{{$value->codigo}}</td>-->
                <td>{{ $value->cif }}</td>
                <td>{{ $value->razonsocial }}</td>

<!--            <td>{{ $value->direccion }}</td>
<td>{{ $value->city_name }}</td>
<td>{{ $value->region_name }}</td>-->
                <td>{{ $value->fechainiciocontrato }}</td>
                <td>{{ $value->fechafincontrato }}</td>     
                <td>{{ $value->numeroreconocimientoscontratados }}</td>
                <td>{{ $value->numeroreconocimientosutilizados }}</td>
                @if (Auth::user()->hasRole('admin') OR Auth::user()->hasRole('secretario') )
                <td>
                    <div class="btn-group-horizontal">
                        <a class="   " href="{{ URL::to('clientes/' . $value->id) }}"><i class="fa fa-info-circle"></i></a>
                        <a class="   " href="{{ URL::to('clientes/' . $value->id . '/edit') }}"><i class="fa fa-pencil-square-o"></i></a>
                    </div>
                </td>
                <td>
                    {{ Form::open(array('url' => 'clientes/' . $value->id, 'class' => '')) }}
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