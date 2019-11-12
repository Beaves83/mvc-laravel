<!-- Scripts -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 

<!-- Styles -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="text-center"> <h1>Información del cliente</h1></div>  

<hr>
<br>
<br>
<strong>Código:</strong> {{ $cliente->codigo }}<br>
<strong>Nombre:</strong> {{ $cliente->razonsocial }}<br>
<strong>CIF/NIF:</strong> {{ $cliente->cif }}<br>
<strong>Dirección:</strong> {{ $cliente->direccion }}<br>
<strong>Provincia:</strong> {{ $cliente->region_name }}<br>
<strong>Municipio:</strong> {{ $cliente->city_name }}<br>
<br>
<h3>Contrato</h3>
<strong>Inicio:</strong> {{ date('d-M-y', strtotime($cliente->fechainiciocontrato)) }} <br>
<strong>Fin:</strong> {{ date('d-M-y', strtotime($cliente->fechafincontrato)) }} <br>
<strong>Reconocimientos contratos:</strong> {{ $cliente->numeroreconocimientoscontratados }}<br>
<strong>Reconocimientos usados:</strong> {{ $cliente->numeroreconocimientosutilizados }}<br>
</p>
<br>
@if( ! $cliente->activo )
<div class="text-center"><p style="color: red" ><strong>El contrato ya no está activo.</strong></p></div>
@endif 
<br>
<hr>
<div class="text-right">{{ date('d-M-y H:i:s') }}</div>