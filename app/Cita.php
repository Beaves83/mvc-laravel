<?php

namespace App;


use Illuminate\Http\Request;
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
    public static function citasDiarias($query, $fecha){
        return $query->where('fecha',$fecha);
    }
    
    //Asocia la tabla de clientes con la tabla de citas.
    public static function reservartionsWithClient(){
        $citas = DB::table('citas')->join('clientes', 'clientes.id', '=', 'citas.cliente_id')
                ->select('citas.*','clientes.razonsocial')
                ->get()->take(30);
        
        return $citas;
    }
    
    //Asocia la tabla de clientes con la tabla de citas y añade una restrucción
    public static function reservartionsWithClientWithFilter($id){
        $citas = DB::table('citas')->join('clientes', 'clientes.id', '=', 'citas.cliente_id')
                ->select('citas.*','clientes.razonsocial')
                ->where('citas.id', '=', $id)
                ->get()->take(1);
        
        return $data = array (
                    'cita' => $citas[0]
                );
    }
    
    //Guarda una cita.
    public static function store(Request $request, $validate, $params_array){
        if ($validate->fails()) {
            $data = array(
                'status' => 'error',
                'code' => 404,
                'message' => 'La cita no se ha creado.',
                'errors' => $validate->errors()
            );
        } else {
            $cita = new Cita();               
            $cita->cliente_id = $params_array['cliente_id'];
            $cita->fecha = $params_array['fecha'];
            $cita->numeroempleadosreservados = $params_array['numeroempleadosreservados'];  
            $cita->numeroempleadosasistentes = $params_array['numeroempleadosasistentes']; 
            $cita->save();

            $data = array(
                'status' => 'success',
                'code' => 200,
                'message' => 'La cita se ha creado correctamente.',
                'cliente' => $cita
            );
        }

        return response()->json($data); 
    }
    
    public function conversionRequestToArray(Request $request){
        $json = $request -> input('json', null);
        $params_array = json_decode($json, true);
        $params_array = array_change_key_case($params_array, CASE_LOWER);
        $params_array = array_map('trim',$params_array);
        
        return $params_array;
    }
}
