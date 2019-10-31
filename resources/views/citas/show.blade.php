@extends('layouts.app')

@section('title', 'Datos de una cita')

@section('content')
    
<div class="jumbotron w-50 mx-auto border shadow-lg p-4 mb-4 bg-white">
    <div class="jumbotron h-25 d-flex justify-content-center"><h1>Información</h1></div>    
        <p>
            <strong>Cliente:</strong>  {{ $cita->razonsocial }}<br>
            <strong>Fecha de la cita:</strong> {{ $cita->fecha }}<br>
            <br>         
            <strong>Reconocimientos Reservados:</strong> {{ $cita->numeroempleadosreservados}}<br>
            <strong>Reconocimientos Utilizados:</strong> {{ $cita->numeroempleadosasistentes}}<br>       
        </p>
    </div>
    
@endsection