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
        <div class="container">
            <div class="jumbotron">
                <h1>GRM</h1>
                <p>Con esta aplicación podrás gestionar tus citas para realizar reconocimientos
                méticos. Cuenta con una pefil de secretario con el cual se gestionarán las citas
                y el alta de nuevos clientes con sus contratos y por otro lado contamos con un 
                perfil médico, mediante el cual anotaremos los reconocimientos realizados.</p>
            </div>
<!--            <p>This is some text.</p>
            <p>This is another text.</p>-->
        </div>
        <div class="mask flex-center rgba-blue-strong">
            <p class="white-text"></p>
        </div>
    </center>
</div>
@endsection
