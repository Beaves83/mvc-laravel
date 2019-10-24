@extends('layouts.app')

@section('title', 'Editar una cita')

@section('content')
<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::model($cita, array('route' => array('citas.update', $cita->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('fecha', 'Fecha') }}
        {{ Form::date('fecha') }}
    </div>

    <div class="form-group">
        {{ Form::label('numeroempleadosreservados', 'Número de reservas') }}
        {{ Form::number('numeroempleadosreservados') }}
    </div>

    {{ Form::submit('Actualizar', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>

@endsection