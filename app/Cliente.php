<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Cliente extends Model {

    protected $table = 'clientes';
    protected $fillable = [
        'codigo', 'razonsocial', 'nombre', 'cif', 'direccion', 'municipio',
        'provincia', 'fechainiciocontrato', 'fechafincontrato',
        'numeroreconocimientoscontratados'
    ];

    public static function store(Request $request, $validate, $params_array) {

        if ($validate->fails()) {
            $data = array(
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

            $data = array(
                'status' => 'success',
                'code' => 200,
                'message' => 'El cliente se ha creado correctamente.',
                'cliente' => $cliente
            );
        }

        return response()->json($data);
    }
    
    public static function updateClient(Request $request, $params_array) {

        $cliente = \App\Cliente::find($params_array['id']);
        if(!empty($cliente)){
            Cliente::where('id', $params_array['id'])
            ->update(
                [
                'razonsocial' => $params_array['razonsocial'],
                'cif' => $params_array['cif'],
                'direccion' => $params_array['direccion'],
                'municipio' => $params_array['municipio'],
                'provincia' => $params_array['provincia'],
                'fechainiciocontrato' => $params_array['fechainiciocontrato'],
                'fechafincontrato' => $params_array['fechafincontrato'],
                'numeroreconocimientoscontratados' => $params_array['numeroreconocimientoscontratados']]);
            
            return "El cliente ha sido actualizo.";
        }     
        else {
            return "El cliente no puede ser modificado.";
        } 
    }

    //Conversión Request a Array.
    public function conversionRequestToArray(Request $request) {
        $json = $request->input('json', null);
        $params_array = json_decode($json, true);
        $params_array = array_change_key_case($params_array, CASE_LOWER);
        $params_array = array_map('trim', $params_array);

        return $params_array;
    }

}
