<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;


class ClienteController extends Controller {

    /**
     * Default page for showing all the list.
     *
     * @return a view with and the list of the clients.
     */
    public function index() {
        $clientes = Cliente::informacionCompleta();   
        return view('clientes.index')->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return a view
     */
    public function create() {
        return view('clientes.create');
    }

    /**
     * Save the specified resource.
     *
     * @return Response
     */
    public function store() {
        $rules = array(
            'codigo' => 'required|alpha_num|unique:clientes|max:190',
            'razonsocial' => 'required|unique:clientes|max:190',
            'cif' => 'required|alpha_num|unique:clientes|max:15',
            'direccion' => 'required|max:100',
            'municipios' => 'max:100',
            'provincias' => 'max:100',
            'fechainiciocontrato' => 'required|date',
            'fechafincontrato' => 'required|date',
            'numeroreconocimientoscontratados' => 'required|numeric'
        );
        $validator = \Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return \Redirect::to('clientes/create')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
         
            $cliente = new Cliente();

            $cliente->codigo = Input::get('codigo');
            $cliente->razonsocial = Input::get('razonsocial');
            $cliente->cif = Input::get('cif');
            $cliente->direccion = Input::get('direccion');
            $cliente->municipio = Input::get('municipios');
            $cliente->provincia = Input::get('provincias');
            $cliente->fechainiciocontrato = Input::get('fechainiciocontrato');
            $cliente->fechafincontrato = Input::get('fechafincontrato');
            $cliente->numeroreconocimientoscontratados = Input::get('numeroreconocimientoscontratados');

            $cliente->save();

            \Session::flash('message', '¡Cliente creado!');
            return \Redirect::to('clientes');
        }
    }

    /**
     * Show the specified resource.
     *
     * @param  int $id
     * @return a view.
     */
    public function show($id) {       
        $cliente = Cliente::getCliente($id);
        return view('clientes.show')->with('cliente', $cliente[0]); 
        
    }

    /**
     * Return the view of the specified resource to edit.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $cliente = Cliente::find($id);
        return view("clientes.edit")->with('cliente', $cliente);
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $rules = array(
            'codigo' => 'required|alpha_num|max:190|unique:clientes,codigo,' . $id . ',id',
            'razonsocial' => 'max:190|unique:clientes,razonsocial,' . $id . ',id',
            'cif' => 'alpha_num|max:15|unique:clientes,cif,' . $id . ',id',
            'direccion' => 'required|max:100',
            'municipios' => 'max:100',
            'provincias' => 'max:100',
            'fechainiciocontrato' => 'required|date',
            'fechafincontrato' => 'required|date',
            'numeroreconocimientoscontratados' => 'required|numeric'
        );
        
        $validator = Validator(Input::all(), $rules);

        if ($validator->fails()) {
            return \Redirect::to('clientes/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            Cliente::where('id', $id)
                    ->update(
                            [
                                'codigo' => Input::get('codigo'),
                                'razonsocial' => Input::get('razonsocial'),
                                'cif' => Input::get('cif'),
                                'direccion' => Input::get('direccion'),
//                                'municipio' => Input::get('municipios'),
//                                'provincia' => Input::get('provincias'),
                                'fechainiciocontrato' => Input::get('fechainiciocontrato'),
                                'fechafincontrato' => Input::get('fechafincontrato'),
                                'numeroreconocimientoscontratados' => Input::get('numeroreconocimientoscontratados')
            ]);
            \Session::flash('message', 'Cliente actualizado');
            return \Redirect::to('clientes');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        // delete
        $cliente = Cliente::find($id);
        $cliente->delete();

        \Session::flash('message', 'El cliente ' . $cliente->codigo . ' ha sido eliminado.');
        return \Redirect::to('clientes');
    }

}
