@extends('layouts.app')

@section('title', 'Datos de un usuario')

@section('content')

    <h1>Usuario : {{ $usuario->name }}</h1>
    
    <div class="jumbotron text-center">
        
        <p>
            <strong>Email:</strong> {{ $usuario->email }}<br>
           
           
        </p>
    </div>
    
@endsection