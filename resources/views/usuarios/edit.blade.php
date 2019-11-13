@extends('layouts.app')

@section('title', 'Editar un usuario')

@section('content')
<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}
<div class="jumbotron w-100 mx-auto border shadow-lg p-4 mb-4 bg-white">
    <div class="jumbotron h-25 d-flex justify-content-center"><h1>Edición de usuarios</h1></div>
{{ Form::model($usuario, array('route' => array('usuarios.update', $usuario->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('rol', 'Rol') }}
        {{ Form::select('roles', $roles->pluck('description', 'id'), null, array('class' => 'form-control',  'placeholder' => 'Selecciona un rol...')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', null, array('class' => 'form-control')) }}
    </div>

    <div class="d-flex justify-content-center">
        {{ Form::submit('Actualizar', array('class' => 'btn btn-primary')) }}
    </div>
    

{{ Form::close() }}

</div>
</div>
@endsection