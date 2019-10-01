<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cliente;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $citas = \App\Cita::get()->take(10);
        return view('gestioncitas', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //$citas = \App\Cita::get()->take(30);
        $citas = DB::table('citas')->join('clientes', 'clientes.id', '=', 'citas.cliente_id')
                ->select('citas.*','clientes.razonsocial')
                ->get();
        //$valor = $citas->clientestemporal;
        //$clientes = \App\Cliente::all();

        //return response() -> json(\App\Cita::with('cliente.razonsocial')->get()); 
        return response() -> json($citas);       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
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
}
