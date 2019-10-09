<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Illuminate\Http\Response;

class ClienteController extends Controller
{
    /**
     * Devuelve la vista con los clientes.
     *
     * @return Response
     */
    public function index()
    {
        $clientes = Cliente::get();
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
        $json = $request->input('json', null);
        $params_array = array_map('trim', json_decode($json, true));
        
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
        
        return Cliente::store($request, $validate, $params_array);
    }
    
    /**
     * Devuelve un listado completo con todas las citas.
     *
     * @return Response
     */
    public function all()
    {       
//        $clientes = DB::table('clientes')->get()->take(30);
//        return response() -> json($clientes); 
        return Cliente::listado();
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
        return Cliente::updateClient($request, $params_array);
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
    
    
    public function toexcel(Request $request){
        $params_array = $this ->conversionRequestToArray($request);
        dd($request);
    }
    
    //Conversión Request a Array.
    public function conversionRequestToArray(Request $request){
        $json = $request -> input('json', null);
        $params_array = json_decode($json, true);
        return $params_array;
    }
}
