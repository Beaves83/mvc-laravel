@extends('layouts.app')

@section('title', 'Crear un cliente')

@section('content')
<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::open(array('url' => 'clientes')) }}

    <div class="form-group">
        {{ Form::label('codigo', 'Código') }}
        {{ Form::text('codigo') }}
    </div>

    <div class="form-group">
        {{ Form::label('razonsocial', 'Razon social') }}
        {{ Form::text('razonsocial') }}
    </div>

    <div class="form-group">
        {{ Form::label('cif', 'CIF/NIF') }}
        {{ Form::text('cif') }}
    </div>

    <div class="form-group">
        {{ Form::label('direccion', 'Dirección') }}
        {{ Form::text('direccion') }}
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
        {{ Form::date('fechainiciocontrato') }}
    </div>

    <div class="form-group">
        {{ Form::label('fechafincontrato', 'Fecha fin de contrato') }}
        {{ Form::date('fechafincontrato') }}
    </div> 

    <div class="form-group">
        {{ Form::label('numeroreconocimientoscontratados', 'Reconocimiento a contratar') }}
        {{ Form::number('numeroreconocimientoscontratados') }}
    </div>

    {{ Form::submit('Crear', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>

@endsection