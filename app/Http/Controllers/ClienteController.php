<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Devuelve la vista con los clientes.
     *
     * @return Response
     */
    public function index()
    {
        $clientes = Cliente::get()->take(10);
        return view('gestionclientes', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Guarda un cliente.
     *
     * @param  Request  $request
     * @return Response
     */
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
    
    /**
     * Devuelve un listado completo con todas las citas.
     *
     * @return Response
     */
    public function all()
    {       
        $clientes = DB::table('clientes')->get()->take(30);
        return response() -> json($clientes); 
    }

    /**
     * Muestra un cliente especifico.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        return view('clientes.show', array('cliente' => $cliente));
    }

    /**
     * Devuelve una cita
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return \App\Cliente::find($id);
    }

    /**
     * Actualizamos un cliente.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $params_array = $this ->conversionRequestToArray($request);
        
        $cliente = \App\Cliente::find($params_array['id']);
       
        if(!empty($cliente)){
            Cliente::where('id', $params_array['id'])
            ->update(
                ['razonsocial' => $params_array['razonsocial'],
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    
    //ConversiÃ³n Request a Array.
    public function conversionRequestToArray(Request $request){
        $json = $request -> input('json', null);
        $params_array = json_decode($json, true);
        $params_array = array_change_key_case($params_array, CASE_LOWER);
        $params_array = array_map('trim',$params_array);
        
        return $params_array;
    }
}
