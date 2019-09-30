<!DOCTYPE html>
<html>
  <head>
    <title>Cliente  #{{ $cliente->id }}</title>
  </head>
  <body>
    <h1>Cliente {{ $cliente->id }}</h1>
    <ul>
      <li>Codigo: {{ $cliente->codigo }}</li>
      <li>Razón social: {{ $cliente->razonsocial}}</li>
      <li>CIF: {{ $cliente->cif }}</li>
    </ul>
  </body>
</html>
