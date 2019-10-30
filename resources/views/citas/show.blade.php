@extends('layouts.app')

@section('title', 'Datos de una cita')

@section('content')

    <h1>Cita para el cliente : {{ $cita->razonsocial }}</h1>
    
    <div class="jumbotron text-center">
        
        <p>
            <strong>Fecha:</strong> {{ $cita->fecha }}<br>
            <strong>Reconocimientos Reservados:</strong> {{ $cita->numeroempleadosreservados}}<br>
            <br>
            <strong>Reconocimientos Utilizados:</strong> {{ $cita->numeroempleadosasistentes}}<br>       
        </p>
    </div>
    
@endsection