@extends('layouts.app')

@section('title', 'Crear un usuario')

@section('content')
<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}
<div class="jumbotron w-50 mx-auto border shadow-lg p-4 mb-4 bg-white">
    <div class="jumbotron h-25 d-flex justify-content-center"><h1>Creación de usuarios</h1></div>
{{ Form::open(array('url' => 'usuarios')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Contraseña') }}
        {{ Form::password('password',  array('class' => 'form-control')) }}
    </div>

<div class="d-flex justify-content-center">
       {{ Form::submit('Crear', array('class' => 'btn btn-primary')) }}
    </div>
    

{{ Form::close() }}

</div>
</div>
@endsection