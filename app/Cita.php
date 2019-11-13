<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Cita;


class Cita extends Model {

    protected $table = 'citas';
    protected $fillable = [
        'razonsocial', 'cif', 'idcliente', 'fecha', 'numeroempleadosreservados',
        'numeroempleadosasistentes'
    ];

    //Cruzamos la tabla de clientes con municipios y provincias.
    public static function allAppointment() {
        $listado = DB::table('citas')->join('clientes', 'clientes.id', '=', 'citas.cliente_id')
                ->select('citas.*', 'clientes.razonsocial')
                ->get();

        return $listado;
    }
    
    //
    public static function onlyActives() {
        $listado = DB::table('citas')->join('clientes', 'clientes.id', '=', 'citas.cliente_id')
                ->where([
                    ['clientes.activo', '=', true],
                    ['citas.numeroempleadosasistentes', '<=', 0]
                ])
                ->select('citas.*', 'clientes.razonsocial')
                ->get();

        return $listado;
    }
    
    //Devolvemos las cabeceras para la tabla
    public static function headers() {
        $listado = array('Cliente', 'Fecha', 'Empleados reservados',
            'Asistencias');

        return $listado;
    }

    //Cruzamos la tabla de clientes con municipios y provincias y filtramos por el id.
    public static function getCita($id) {
        $listado = DB::table('citas')->join('clientes', 'clientes.id', '=', 'citas.cliente_id')
                ->where('citas.id', '=', $id)
                ->select('citas.*', 'clientes.razonsocial')
                ->get();

        return $listado;
    }

    //Devuele un cliente
    public function cliente() {
        return $this->belongsTo('App\Cliente', 'cliente_id');
    }

    //Nos devuelve las citas de un día especificado. Ej:Cita::fecha('2019-09-29')->get();
    public static function citasDiarias($query, $fecha) {
        return $query->where('fecha', $fecha);
    }
}
