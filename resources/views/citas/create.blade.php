@extends('layouts.app')

@section('title', 'Crear una cita')

@section('content')
<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}
<div class="jumbotron w-50 mx-auto border shadow-lg p-4 mb-4 bg-white">
    <div class="jumbotron h-25 d-flex justify-content-center"><h1>Creación de citas</h1></div>
    {{ Form::open(array('url' => 'citas')) }}

    <div class="form-group">
        {{ Form::label('razonsocial', 'Cliente') }}
        {{ Form::select('clientes', $clientes->pluck('razonsocial', 'id'), null, array('class' => 'form-control',  'placeholder' => 'Selecciona un cliente...')) }}
    </div>

    <div class="form-group">
        {{ Form::label('fecha', 'Fecha') }}
        {{ Form::date('fecha', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('numeroempleadosreservados', 'Número de reservas') }}
        {{ Form::number('numeroempleadosreservados', null, array('class' => 'form-control')) }}
    </div>
    
<!--    <div class="range-field">
       {{ Form::label('numeroempleadosreservados', 'Número de reservas') }}
        <input type="range" class="custom-range" name="numeroempleadosreservados" min="0" max="100">
        {{ Form::number('numeroempleadosreservados', null, array('class' => 'form-control')) }}
    </div>-->
    <div class="d-flex justify-content-center">
        {{ Form::submit('Crear', array('class' => 'btn btn-primary')) }}
    </div>

    {{ Form::close() }}
</div>
</div>
@endsection