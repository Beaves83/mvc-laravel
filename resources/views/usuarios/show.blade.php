@extends('layouts.app')

@section('title', 'Datos de un usuario')

@section('content')
    
<div class="jumbotron w-100 mx-auto border shadow-lg p-4 mb-4 bg-white">
    <div class="jumbotron h-25 d-flex justify-content-center"><h1>Información</h1></div>
        
        <p>
            <strong>Usuario:</strong> {{ $usuario->name }}<br>
            <strong>Email:</strong> {{ $usuario->email }}<br>  
        </p>
    </div>
    
@endsection