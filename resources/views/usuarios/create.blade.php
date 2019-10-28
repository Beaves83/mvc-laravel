@extends('layouts.app')

@section('title', 'Crear un usuario')

@section('content')
<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::open(array('url' => 'usuarios')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('name') }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email') }}
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Contraseña') }}
        {{ Form::password('password') }}
    </div>


    {{ Form::submit('Crear', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>

@endsection