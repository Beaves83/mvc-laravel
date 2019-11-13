@extends('layouts.app')

@section('title', 'Editar un cliente')

@section('content')

{{ Html::ul($errors->all()) }}
<div class="jumbotron w-100 mx-auto border shadow-lg p-4 mb-4 bg-white">
    <div class="jumbotron h-25 d-flex justify-content-center"><h1>Edición de clientes</h1></div>
    {{ Form::model($cliente, array('route' => array('clientes.update', $cliente->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('codigo', 'Código') }}
        {{ Form::text('codigo', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('razonsocial', 'Razón social') }}
        {{ Form::text('razonsocial', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('cif', 'CIF/NIF') }}
        {{ Form::text('cif', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('direccion', 'Dirección') }}
        {{ Form::text('direccion', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('municipio', 'Municipio') }}
        {{ Form::select('municipios', $municipios->pluck('city_name', 'id'), null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('provincia', 'Provincia') }}
        {{ Form::select('provincias', $provincias->pluck('region_name', 'id'), null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('fechainiciocontrato', 'Fecha inicio de contrato') }}
        {{ Form::date('fechainiciocontrato', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('fechafincontrato', 'Fecha fin de contrato') }}
        {{ Form::date('fechafincontrato', null, array('class' => 'form-control')) }}
    </div> 

    <div class="form-group">
        {{ Form::label('numeroreconocimientoscontratados', 'Reconocimientos a contratar') }}
        {{ Form::number('numeroreconocimientoscontratados', null, array('class' => 'form-control')) }}
    </div>

    <div class="d-flex justify-content-center">
        {{ Form::submit('Actualizar', array('class' => 'btn btn-primary')) }}
    </div>

    {{ Form::close() }}

</div>
</div>
@endsection