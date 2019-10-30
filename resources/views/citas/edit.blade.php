@extends('layouts.app')

@section('title', 'Editar una cita')

@section('content')
<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}
<div class="jumbotron w-50 mx-auto border shadow-lg p-4 mb-4 bg-white">
    <div class="jumbotron h-25 d-flex justify-content-center"><h1>Edición de citas</h1></div>
{{ Form::model($cita, array('route' => array('citas.update', $cita->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('fecha', 'Fecha') }}
        {{ Form::date('fecha', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('numeroempleadosreservados', 'Reconocimientos reservados') }}
        {{ Form::number('numeroempleadosreservados', null, array('class' => 'form-control')) }}
    </div>
   
<!--    Faltarían los contratados-->

@if ( Auth::user()->hasRole('admin') OR Auth::user()->hasRole('medico') )  
    <div class="form-group">
        {{ Form::label('numeroempleadosasistentes', 'Asistientes') }}
        {{ Form::number('numeroempleadosasistentes', null, array('class' => 'form-control')) }}
    </div>

@endif
    
<div class="d-flex justify-content-center">
        {{ Form::submit('Actualizar', array('class' => 'btn btn-primary')) }}
    </div>
{{ Form::close() }}

</div>
</div>
@endsection