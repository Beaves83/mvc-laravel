<!DOCTYPE html>
<html>
<head>
    <title>CLIENTES</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('clientes') }}">Mensaje</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('clientes') }}">Todos los clientes</a></li>
        <li><a href="{{ URL::to('clientes/create') }}">Crear un cliente</a>
    </ul>
</nav>

<h1>Clientes</h1>

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Código</td>
            <td>Razón social</td>
            <td>Cif</td>
            <td>Dirección</td>
            <td>Municipio</td>
            <td>Provincia</td>
            <td>Fecha inicio contrato</td>
            <td>Fecha fin contrato</td>
            <td>Reconocimientos contratados</td>
            <td>Reconocimientos usados</td>           
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
    @foreach($clientes as $key => $value)
        <tr>
            <td>{{$value->codigo}}</td>
            <td>{{ $value->razonsocial }}</td>
            <td>{{ $value->cif }}</td>
            <td>{{ $value->direccion }}</td>
            <td>{{ $value->municipio }}</td>
            <td>{{ $value->provincia }}</td>
            <td>{{ $value->fechainiciocontrato }}</td>
            <td>{{ $value->fechafincontrato }}</td>     
            <td>{{ $value->numeroreconocimientoscontratados }}</td>
            <td>{{ $value->numeroreconocimientosutilizados }}</td>
            

            <!-- Mostrarmos los botones de mostrar, ediar y borrar -->
            <td>
                <a class="btn btn-small btn-danger" href="{{ URL::to('clientes/' . $value->id) }}">Eliminar</a>
                <a class="btn btn-small btn-success" href="{{ URL::to('clientes/' . $value->id) }}">Detalles</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('clientes/' . $value->id . '/edit') }}">Editar</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>