@extends('layouts.app')

@section('title', 'Datos de un cliente')

@section('content')

<div class="jumbotron w-50 mx-auto border shadow-lg p-4 mb-4 bg-white">
    <div class="jumbotron h-25 d-flex justify-content-center"><h1>Información</h1></div>
    <p>
        <strong>Nombre:</strong> {{ $cliente->razonsocial }}<br>
        <strong>Codigo:</strong> {{ $cliente->codigo }}<br>
        <strong>CIF/NIF:</strong> {{ $cliente->cif}}<br>
        <strong>Dirección:</strong> {{ $cliente->direccion}}<br>
        <strong>Municipio:</strong> {{ $cliente->city_name}}<br>
        <strong>Provincia:</strong> {{ $cliente->region_name}}<br>
        <strong>Inicio contrado:</strong> {{ $cliente->fechainiciocontrato}}<br>
        <strong>Fin contrato:</strong> {{ $cliente->fechafincontrato}}<br>
        <strong>Reconocimientos contratados:</strong> {{ $cliente->numeroreconocimientoscontratados}}<br>
        <strong>Reconocimientos realizados:</strong> {{ $cliente->numeroreconocimientosutilizados}}<br>
    </p>
</div>

@endsection
