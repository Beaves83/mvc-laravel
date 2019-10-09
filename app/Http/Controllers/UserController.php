<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use App\Http\Requests\ValidacionesUsuario;


class UserController extends Controller {

    /**
     * Registro de usuario.
     *
     */
    public function register(Request $request) {

        $json = $request->input('json', null);
        //dd($json);
        $params_array = array_map('trim', json_decode($json, true));

        $validate = \Validator::make($params_array, [
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                    'password' => 'required',
        ]);

        return User::register($request, $validate, $params_array);
    }

    /**
     * Login de usuario.
     *
     */
    public function login(Request $request) {
        return User::login($request);
    }

    /**
     * Actualización de datos
     *
     */
    public function update(Request $request) {

        $params_array = $this ->conversionRequestToArray($request);
        return User::updateUser($params_array);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        echo 'Estamos en el index';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        
        $params_array = $this ->conversionRequestToArray($request);
        $validate = \Validator::make($params_array, [
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                    'password' => 'required',
        ]);
        
        
        return User::store($params_array, $validate);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $usuario = User::find($id);
        return view('usuarios.show', array('usuario' => $usuario));
    }

    /**
     * Devuelve un listado completo con todas las citas.
     *
     * @return Response
     */
    public function all() {
        $usuarios = User::all()->take(30);
        return response()->json($usuarios);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //dd($id);
        $usuario = User::find($id);
        $usuario->delete();
        return $usuario;
    }
    
    //Conversión Request a Array.
    public function conversionRequestToArray(Request $request){
        $json = $request -> input('json', null);
        $params_array = json_decode($json, true);
        $params_array = array_map('trim',$params_array);
        return $params_array;
    }

}
