<?php

namespace App\Http\Controllers;

use App\Municipio;

class MunicipioController extends Controller
{
    public function index()
    {
        $municipios = Municipio::all();
        return $municipios;
        //return view('gestionclientes', compact('clientes'));
        //return View::make('gestionclientes')->with('clientes', $clientes);
    }
}
