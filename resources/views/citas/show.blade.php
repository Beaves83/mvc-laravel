@extends('layouts.app')

@section('title', 'Datos de una cita')

@section('content')

<div class="jumbotron w-50 mx-auto border shadow-lg p-4 mb-4 bg-white">
    <div class="jumbotron h-25 d-flex justify-content-center"><h1>Información</h1></div>    
    <p>
        <strong>Cliente:</strong>  {{ $cita->razonsocial }}<br>
        <strong>Fecha de la cita:</strong> {{ $cita->fecha }}<br>
    </p>
    <p>
        <strong>Progreso de la cita:</strong>
        <br>
        <div class="progress" style="height: 30px;">
            <div id="barraProgresoCitas" class="progress-bar" role="progressbar" style="" aria-valuenow="{{ $cita->numeroempleadosasistentes}}" aria-valuemin="0" aria-valuemax="100">25%</div>
        </div>
    </p>
<div class="row">
    <div class="col-6">
        <div class="d-flex justify-content-center"><strong>Reconocimientos reservados</strong></div>
        <div id="reservados" class="d-flex justify-content-center">{{ $cita->numeroempleadosreservados}}</div>     
    </div>
    <div class="col-6">
        <div class="d-flex justify-content-center"><strong>Reconocimientos utilizados</strong></div>
        <div id="asistentes" class="d-flex justify-content-center">{{ $cita->numeroempleadosasistentes}}</div>       
    </div>
</div>
</div>

@endsection