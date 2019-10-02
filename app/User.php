<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'rol'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
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
   
}
