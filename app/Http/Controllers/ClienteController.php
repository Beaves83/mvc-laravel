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
        $clientes = Cliente::get()->take(30);
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
        return Cliente::store($request);
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
    
    //Conversión Request a Array.
    public function conversionRequestToArray(Request $request){
        $json = $request -> input('json', null);
        $params_array = json_decode($json, true);
        $params_array = array_change_key_case($params_array, CASE_LOWER);
        $params_array = array_map('trim',$params_array);
        
        return $params_array;
    }
}
