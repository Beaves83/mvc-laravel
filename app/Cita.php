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
    public static function store(Request $request){
        $params_array = $this ->conversionRequestToArray($request);
         
        if(!empty($params_array)){
          
            //Validar
            $validate = \Validator::make($params_array, [
                'idcliente'       => 'required|numeric',
                'fecha'           => 'required|date',
                'numeroempleadosreservados' => 'required|numeric'
            ]);
            
            if($validate->fails()){        
                $data = array (
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'La cita no se ha creado.',
                    'errors' => $validate->errors()
                );            
            } else {
                $cita = new Cita();               
                $cita->idcliente = $params_array['idcliente'];
                $cita->fecha = $params_array['fecha'];
                $cita->numeroempleadosreservados = $params_array['numeroempleadosreservados'];      
                $cita->save();
            
                $data = array (
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'La cita se ha creado correctamente.',
                    'cita' => $cita
                );
            }
        } else {             
            $data = array (
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'Los datos enviados no son correctos.'
                );
        }
        
        //return $data;
        return response() -> json($data); 
    }
    
    public function conversionRequestToArray(Request $request){
        $json = $request -> input('json', null);
        $params_array = json_decode($json, true);
        $params_array = array_change_key_case($params_array, CASE_LOWER);
        $params_array = array_map('trim',$params_array);
        
        return $params_array;
    }
}
