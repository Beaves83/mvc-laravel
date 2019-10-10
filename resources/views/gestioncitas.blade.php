@extends('layouts.app')

@section('title', 'Citas')
@section('content')
<div class="container">
    <center>
        <h1>Citas médicas</h1>
    </center>
    
    <table id="tablacitas" class="display">
        <thead>
            <tr>    
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Empleados reservados</th>
                <th>Asistencias</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($citas as $cita)
            <tr>
                <td>{{ $cita->razonsocial }}</td>
                <td>{{ $cita->fecha }}</td>
                <td>{{ $cita->numeroempleadosreservados }}</td>
                <td>{{ $cita->numeroempleadosasistentes }}</td>
                <td><button class="btn"><i class="fas fa-edit"></i></button><button class="btn"><i class="fas fa-trash"></i></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection