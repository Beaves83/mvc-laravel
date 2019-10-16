<!--https://laravel.com/docs/4.2/html-->
<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('clientes') }}">Alerta cliente</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('clientes') }}">Listado clientes</a></li>
        <li><a href="{{ URL::to('clientes/create') }}">Crear un cliente</a>
    </ul>
</nav>

<h1>Crear un cliente</h1>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::open(array('url' => 'clientes')) }}

    <div class="form-group">
        {{ Form::label('razonsocial', 'Razon social') }}
        {{ Form::text('razonsocial') }}
    </div>

    <div class="form-group">
        {{ Form::label('direccion', 'Dirección') }}
        {{ Form::text('direccion') }}
    </div>


    {{ Form::submit('¡Crear un cliente!') }}

{{ Form::close() }}

</div>
</body>
</html>