<?php

namespace App\Http\Controllers;
use App\Provincia;

class ProvinciaController extends Controller
{
    public function index()
    {
        $provincias = Provincia::all();
        return $provincias;
    }
}
