@extends('layouts.app')

@section('title', 'Editar un usuario')

@section('content')
<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::model($usuario, array('route' => array('usuarios.update', $usuario->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', null, array('class' => 'form-control')) }}
    </div>

<!--    <div class="form-group">
        {{ Form::label('password', 'Contraseña') }}
        {{ Form::text('password', null, array('class' => 'form-control')) }}
    </div>-->


    {{ Form::submit('Actualizar', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>

@endsection