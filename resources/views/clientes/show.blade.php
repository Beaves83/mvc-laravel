@extends('layouts.app')

@section('title', 'Crear un cliente')

@section('content')

    <h1>Cliente: {{ $cliente->razonsocial }}</h1>
    
    <div class="jumbotron text-center">
        <h2>{{ $cliente->codigo }} - {{ $cliente->razonsocial }}</h2>
        <p>
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
