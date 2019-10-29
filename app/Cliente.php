<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cliente extends Model {

    protected $table = 'clientes';
    protected $fillable = [
        'codigo', 'razonsocial', 'nombre', 'cif', 'direccion', 'municipio',
        'provincia', 'fechainiciocontrato', 'fechafincontrato',
        'numeroreconocimientoscontratados'
    ];

    //Cruzamos la tabla de clientes con municipios y provincias.
    public static function allClient() {
        $listado = DB::table('clientes')->join('municipios', 'municipios.id', '=', 'clientes.municipio')
                ->join('provincias', 'provincias.id', '=', 'clientes.provincia')
                ->select('clientes.*', 'municipios.city_name', 'provincias.region_name')
                ->get();

        return $listado;
    }

    //Cruzamos la tabla de clientes con municipios y provincias y filtramos por el id.
    public static function getCliente($id) {

        $cliente = DB::table('clientes')->join('municipios', 'municipios.id', '=', 'clientes.municipio')
                ->join('provincias', 'provincias.id', '=', 'clientes.provincia')
                ->where('clientes.id', '=', $id)
                ->select('clientes.*', 'municipios.city_name', 'provincias.region_name')
                ->get();

        return $cliente;
    }

}
