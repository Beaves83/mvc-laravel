@extends('layouts.app')

@section('title', 'Editar un cliente')

@section('content')
<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::model($cliente, array('route' => array('clientes.update', $cliente->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('codigo', 'Código') }}
        {{ Form::text('codigo', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('razonsocial', 'Razon social') }}
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
        {{ Form::select('municipios') }}
    </div>

    <div class="form-group">
        {{ Form::label('provincia', 'Provincia') }}
        {{ Form::select('provincias') }}
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
        {{ Form::label('numeroreconocimientoscontratados', 'Reconocimiento a contratar') }}
        {{ Form::number('numeroreconocimientoscontratados', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Actualizar', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>

@endsection