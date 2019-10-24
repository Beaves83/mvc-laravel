@extends('layouts.app')

@section('title', 'Crear una cita')

@section('content')
<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::open(array('url' => 'citas')) }}

    
    <div class="form-group">
        {{ Form::label('razonsocial', 'Cliente') }}
        {{ Form::select('clientes') }}
    </div>

    <div class="form-group">
        {{ Form::label('fecha', 'Fecha') }}
        {{ Form::date('fecha') }}
    </div>

    <div class="form-group">
        {{ Form::label('numeroempleadosreservados', 'Número de reservas') }}
        {{ Form::number('numeroempleadosreservados') }}
    </div>

    {{ Form::submit('Crear', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
@endsection