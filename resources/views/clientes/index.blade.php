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
            <td>ID</td>
            <td>Razón social</td>
            <td>Cif</td>
            <td>Dirección</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
    @foreach($clientes as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->razonsocial }}</td>
            <td>{{ $value->cif }}</td>
            <td>{{ $value->direccion }}</td>

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