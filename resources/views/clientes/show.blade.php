@extends('layouts.app')

@section('title', 'Datos de un cliente')

@section('content')
<link href="{{ asset('css/clientes.css') }}" rel="stylesheet">
<div class="jumbotron w-50 mx-auto border shadow-lg p-4 mb-4 bg-white">
    <div class="jumbotron h-25 d-flex justify-content-center"><h1>Información</h1></div>
    <p>
    <h4><strong>Datos personales</strong></h4>
    <br>
    <strong>Codigo:</strong> {{ $cliente->codigo }}<br>
    <strong>Nombre:</strong> {{ $cliente->razonsocial }}<br>
    <strong>CIF/NIF:</strong> {{ $cliente->cif}}<br>
    <strong>Dirección:</strong> {{ $cliente->direccion}}<br>
    <strong>Municipio:</strong> {{ $cliente->city_name}}<br>
    <strong>Provincia:</strong> {{ $cliente->region_name}}<br>
    <p>
    <h4><strong>Contrato</strong></h4>
    <br>
    <div class="row">
        <div class="col-md-12">
            <ul class="timeline">
                <li class="timeline-item">
                    <div class="timeline-badge"><i class="fa fa-power-off"></i></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h5 class="timeline-title">Comienza</h5>
                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> {{ $cliente->fechainiciocontrato}}</small></p>
                        </div>
                        <!--                    <div class="timeline-body">
                                                <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
                                            </div>-->
                    </div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-badge"><i class="fa fa-dot-circle-o"></i></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h5 class="timeline-title">Acaba</h5>
                            <p><small class="text-muted"><i class="fa fa-clock-o"></i> {{ $cliente->fechafincontrato}}</small></p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</p>
<p>
<h4><strong>Progreso de la cita:</strong></h4>
<br>
<div class="progress" style="height: 30px;">
    <div id="barraProgresoClientes" class="progress-bar" role="progressbar" style="" aria-valuenow="{{ $cliente->numeroreconocimientosutilizados}}" aria-valuemin="0" aria-valuemax="100">25%</div>
</div>
</p>
<div class="row">
    <div class="col-6">
        <div class="d-flex justify-content-center"><strong>Reconocimientos contratados</strong></div>
        <div id="contratados" class="d-flex justify-content-center">{{ $cliente->numeroreconocimientoscontratados}}</div>     
    </div>
    <div class="col-6">
        <div class="d-flex justify-content-center"><strong>Reconocimientos realizados</strong></div>
        <div id="utilizados" class="d-flex justify-content-center">{{ $cliente->numeroreconocimientosutilizados}}</div>       
    </div>
</div>
@endsection
