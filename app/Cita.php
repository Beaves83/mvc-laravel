<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Cliente;
use App\Cita;

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
    
    //Asocia la tabla de clientes con la tabla de citas.
    public static function reservesWithClient(){
        $citas = DB::table('citas')->join('clientes', 'clientes.id', '=', 'citas.cliente_id')
                ->select('citas.*','clientes.razonsocial')
                ->get()->take(30);
        
        return $citas;
    }
    
    //Asocia la tabla de clientes con la tabla de citas y añade una restrucción
    public static function reservesWithClientWithFilter($id){
        $citas = DB::table('citas')->join('clientes', 'clientes.id', '=', 'citas.cliente_id')
                ->select('citas.*','clientes.razonsocial')
                ->where('citas.id', '=', $id)
                ->get()->take(1);
        
        return $data = array (
                    'cita' => $citas[0]
                );
    }
}
