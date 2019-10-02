<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;

class Cita extends Model
{
    protected  $table = 'citas';
    
    protected $fillable = [
        'idcliente', 'fecha', 'numeroempleadosreservados', 'numeroempleadosasistentes'
    ];
    
    //Devuele un cliente
    public function cliente() {
        return $this->belongsTo('App\Cliente','cliente_id');
    }  
    
    //Nos devuelve las citas de un día especificado. Ej:Cita::fecha('2019-09-29')->get();
    public function citasDiarias($query, $fecha){
        return $query->where('fecha',$fecha);
    }
}
