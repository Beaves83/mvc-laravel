@extends('layouts.app')

@section('title', 'Gestión de Reconocimientos Médicos')



@section('content')
<div class="container">
    @if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
    <center>
<!--    <img src="http://www.acprevencion.com/wp-content/uploads/2017/12/reconocimientos-medicos-1-1.png" alt="La imagen no se ha cargado..."                   
     height="100%"  style="margin-top: 15px;"
    >-->
        Estamos como usuario invitado.
    <div class="mask flex-center rgba-blue-strong">
        <p class="white-text"></p>
    </div>
    </center>
</div>
@endsection
