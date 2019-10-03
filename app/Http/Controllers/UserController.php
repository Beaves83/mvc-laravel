<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class UserController extends Controller
{
    /**
     * Registro de usuario.
     *
     */
    public function register(Request $request){
        
        $json = $request -> input('json', null);       
        $params_array = array_map('trim',json_decode($json, true)); 
        
        $validate = \Validator::make($params_array, [
                'name'      => 'required',
                'email'     => 'required|email|unique:users',
                'password' => 'required',
            ]);

        return User::register($request, $validate, $params_array);        
    }
    
    /**
     * Login de usuario.
     *
     */
    public function login(Request $request){
        return User::login($request);
    }
    
    /**
     * Actualización de datos
     *
     */
    public function update(Request $request){
        
        //Comprobar si el usuario está identificado.
        $token = $request->header('Authorization');      
        $jwtAuth = new \JwtAuth();
        $checkToken = $jwtAuth->checkToken($token);
        
        //Recoger los datos por POST
        $json = $request -> input('json', null);
        $params_array = json_decode($json, true);
        
        if($checkToken && !empty($params_array)){                                         
            //Sacar usuario identificado
            $user = $jwtAuth->checkToken($token, true);
            
            //Validar los datos
            $validate = \Validator::make($params_array, [
                'name'      => 'required|alpha', //alpha -> Caracteres alfanumericos.
                'surname'   => 'required|alpha',
                'email'     => 'required|email|unique:users,'.$user->sub //Comprobar si el usuario existe ya (duplicado) exepcto el de este id.
            ]);
            
            //Quitar los campos que no quiero actualizar
            unset($params_array['id']);
            unset($params_array['role']);
            unset($params_array['password']);
            unset($params_array['created_at']);
            unset($params_array['remember_token']);
            
            //Actualizar el usuario en la BBDD
            $user_update = User::where('id', $user->sub)->update($params_array);
            
            //Devolver un array con el resultado
            $data = array(
                'code' => 200,
                'status' => 'success',
                'user' => $user,
                'changes' => $params_array
                ); 
        } else {
            $data = array(
                'code' => 406,
                'status' => 'error',
                'message' => 'El usuario no está identificado correctamente. '
                );
        }
        
        
        return response()->json($data, $data['code']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        echo 'Estamos en el index';
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $usuario = User::find($id);
        return view('usuarios.show', array('usuario' => $usuario));
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
     * Devuelve un listado completo con todas las citas.
     *
     * @return Response
     */
    public function all()
    {       
        $usuarios = User::all()->take(30);
        return response() -> json($usuarios); 
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
