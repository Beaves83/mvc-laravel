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
        $params = json_decode($json); 
        $params_array = json_decode($json, true); 
        
        if(!empty($params) && !empty($params_array)){
            
            $params_array = array_map('trim',$params_array);

            
            $validate = \Validator::make($params_array, [
                'name'      => 'required|alpha',
                'surname'   => 'required|alpha',
                'email'     => 'required|email|unique:users',
                'password' => 'required',
            ]);

            if($validate->fails()){        
                $data = array (
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'El usuario no se ha creado.',
                    'errors' => $validate->errors()
                );            
                
            } else {    
                $pwd = hash('sha256', $params->password);

                $user = new User();
                $user->name = $params_array['name'];
                $user->surname = $params_array['surname'];
                $user->email = $params_array['email'];
                $user->password = $pwd;
                $user->role = 'ROLE_USER';

                $user->save();
              
                $data = array (
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'El usuario  se ha creado correctamente.',
                    'user' => $user
                );
            }
        } else {           
     
            $data = array (
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'Los datos enviados no son correctos.'
                );
        }
        
        return response() -> json($data, $data['code']);
    }
    
    /**
     * Login de usuario.
     *
     */
    public function login(Request $request){
        $jwtAuth = new \JwtAuth();
        
        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);
        
        //Validar esos datos
        $validate = \Validator::make($params_array, [   
                'email'     => 'required|email',
                'password' => 'required',
            ]);

        if($validate->fails()){        
            $signup = array (
                'status' => 'error',
                'code' => 404,
                'message' => 'El usuario no se ha podido loguear.',
                'errors' => $validate->errors()
            );            
        } else {
            $pwd = hash('sha256', $params -> password);
            $signup = $jwtAuth -> signup($params->email, $pwd);

           if(!empty($params->gettoken)){
              $signup =  $jwtAuth -> signup($params->email, $pwd, true);
           }  
        }
        //Finalmente devolvemos el token de usuario.
        return response()->json($signup, 200);
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
        //
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
