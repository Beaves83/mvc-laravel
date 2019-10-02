<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected  $table = 'clientes';
    
    protected $fillable = [
        'codigo', 'razonsocial', 'nombre', 'cif', 'direccion', 'municipio', 
        'provincia', 'fechainiciocontrato', 'fechafincontrato',
        'numeroreconocimientoscontratados'
    ];
   
    public function store(Request $request)
    {   
        $params_array = $this ->conversionRequestToArray($request);
        
        if(!empty($params_array)){
            //Validar
            $validate = \Validator::make($params_array, [
                'codigo'                => 'required|alpha_num|unique:cliente|max:15',
                'razonsocial'           => 'required|unique:cliente|max:15',
                'cif'                   => 'required|alpha_num|unique:cliente|max:15',
                'direccion'             => 'required|max:100',
                'municipio'             => 'required|max:100',
                'provincia'             => 'required|max:100',
                'fechainiciocontrato'   => 'required|date',
                'fechafincontrato'      => 'required|date',
                'numeroreconocimientoscontratados'    => 'required|numeric'
            ]);
            
            if($validate->fails()){        
                $data = array (
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'El cliente no se ha creado.',
                    'errors' => $validate->errors()
                );            
            } else {
                $cliente = new Cliente();               
                $cliente->codigo = $params_array['codigo'];
                $cliente->razonsocial = $params_array['razonsocial'];
                $cliente->cif = $params_array['cif'];
                $cliente->direccion = $params_array['direccion'];
                $cliente->municipio = $params_array['municipio'];
                $cliente->provincia = $params_array['provincia'];
                $cliente->fechainiciocontrato = $params_array['fechainiciocontrato'];
                $cliente->fechafincontrato = $params_array['fechafincontrato'];
                $cliente->numeroreconocimientoscontratados = $params_array['numeroreconocimientoscontratados'];
                $cliente->save();
            
                $data = array (
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'El cliente se ha creado correctamente.',
                    'cliente' => $cliente
                );
            }
        } else {             
            $data = array (
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'Los datos enviados no son correctos.'
                );
        }
        
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
