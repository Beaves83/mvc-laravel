@extends('layouts.app')

@section('title', 'Visitas')
@section('content')
<div class="container">
    <center>
        <h1>Visita médica</h1>
    </center>
    <center>
        <div class="input-group mb-3 center-block">
            <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" type="button">Button</button>
            </div>
            <select name="fecha" id="fecha" class="form-control col-md-2" required>
                <option value="">Elige una fecha</option>                   
                <option value="fecha1">fecha1</option>
                <option value="fecha2">fecha2</option>
                <option value="fecha3">fecha3</option>
            </select>
        </div>
    </center>

    <center>
        <table id="tablavisitas" class="table table-striped col-5 mb-3 display nowrap">
            <tbody>
                <tr>
                    <td colspan="1">
                        <form class="well form-horizontal">     
                            <div class="form-group">
                                <label class="col-md-4 control-label">Fecha</label>
                                <div class="col-md-12">
                                    <div class="input-group"><input id="fecha" name="fecha" placeholder="Fecha" class="form-control" required="true" value="{{ $cita->fecha }}" type="text" disabled></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-6 control-label">Cliente</label>
                                <div class="col-md-12">
                                    <div class="input-group"><input id="razonSocial" name="razonSocial" placeholder="Razon Social" class="form-control" required="true" value="{{ $cita->razonsocial }}" type="text" disabled></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-6 control-label">Reconocimientos previstos</label>
                                <div class="col-md-12">
                                    <div class="input-group"><input id="reconocimientosPrevistos" name="reconocimientosPrevistos" placeholder="Reconocimientos previstos" class="form-control" required="true" value="{{ $cita->numeroempleadosreservados }}" type="text" disabled></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-6 control-label">Reconocimientos reales</label>
                                <div class="input-group mb-3 col-md-12">
                                    <input type="text" class="form-control" placeholder="Escriba el número de visitas" aria-label="Escriba el número de visitas" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>

                </tr>
            </tbody>
        </table>

        <table class="table table-striped col-5 mb-3">
            <tbody>
                <tr>
                    <td colspan="1">
                        <form class="well form-horizontal">     
                            <div class="form-group">
                                <label class="col-md-4 control-label">Fecha</label>
                                <div class="col-md-12">
                                    <div class="input-group"><input id="fecha" name="fecha" placeholder="Fecha" class="form-control" required="true" value="{{ $cita->fecha }}" type="text" disabled></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-6 control-label">Cliente</label>
                                <div class="col-md-12">
                                    <div class="input-group"><input id="razonSocial" name="razonSocial" placeholder="Razon Social" class="form-control" required="true" value="{{ $cita->razonsocial }}" type="text" disabled></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-6 control-label">Reconocimientos previstos</label>
                                <div class="col-md-12">
                                    <div class="input-group"><input id="reconocimientosPrevistos" name="reconocimientosPrevistos" placeholder="Reconocimientos previstos" class="form-control" required="true" value="{{ $cita->numeroempleadosreservados }}" type="text" disabled></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-6 control-label">Reconocimientos reales</label>
                                <div class="input-group mb-3 col-md-12">
                                    <input type="text" class="form-control" placeholder="Escriba el número de visitas" aria-label="Escriba el número de visitas" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>

                </tr>
            </tbody>
        </table>

        <table class="table table-striped col-5 mb-3">
            <tbody>
                <tr>
                    <td colspan="1">
                        <form class="well form-horizontal">     
                            <div class="form-group">
                                <label class="col-md-4 control-label">Fecha</label>
                                <div class="col-md-12">
                                    <div class="input-group"><input id="fecha" name="fecha" placeholder="Fecha" class="form-control" required="true" value="{{ $cita->fecha }}" type="text" disabled></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-6 control-label">Cliente</label>
                                <div class="col-md-12">
                                    <div class="input-group"><input id="razonSocial" name="razonSocial" placeholder="Razon Social" class="form-control" required="true" value="{{ $cita->razonsocial }}" type="text" disabled></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-6 control-label">Reconocimientos previstos</label>
                                <div class="col-md-12">
                                    <div class="input-group"><input id="reconocimientosPrevistos" name="reconocimientosPrevistos" placeholder="Reconocimientos previstos" class="form-control" required="true" value="{{ $cita->numeroempleadosreservados }}" type="text" disabled></div>
                                </div>
                            </div>
                           <div class="form-group">
                                <label class="col-md-6 control-label">Reconocimientos reales</label>
                                <div class="input-group mb-3 col-md-12">
                                    <input type="text" class="form-control" placeholder="Escriba el número de visitas" aria-label="Escriba el número de visitas" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>

                </tr>
            </tbody>
        </table>
    </center>


    @endsection