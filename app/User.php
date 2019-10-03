<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable {

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

    public static function register(Request $request, $validate, $params_array) {

        if ($validate->fails()) {
            $data = array(
                'status' => 'error',
                'code' => 404,
                'message' => 'El usuario no se ha creado.',
                'errors' => $validate->errors()
            );
        } else {
            $pwd = hash('sha256', $params_array['password']);

            $user = new User();
            $user->name = $params_array['name'];
            $user->email = $params_array['email'];
            $user->password = $pwd;
            $user->rol = 'secretario';

            $user->save();

            $data = array(
                'status' => 'success',
                'code' => 200,
                'message' => 'El usuario  se ha creado correctamente.',
                'user' => $user
            );
        }

        return response()->json($data, $data['code']);
    }

    public function login(Request $request) {
        $jwtAuth = new \JwtAuth();

        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        //Validar esos datos
        $validate = \Validator::make($params_array, [
                    'email' => 'required|email',
                    'password' => 'required',
        ]);

        if ($validate->fails()) {
            $signup = array(
                'status' => 'error',
                'code' => 404,
                'message' => 'El usuario no se ha podido loguear.',
                'errors' => $validate->errors()
            );
        } else {
            $pwd = hash('sha256', $params->password);
            $signup = $jwtAuth->signup($params->email, $pwd);

            if (!empty($params->gettoken)) {
                $signup = $jwtAuth->signup($params->email, $pwd, true);
            }
        }
        //Finalmente devolvemos el token de usuario.
        return response()->json($signup, 200);
    }

    public static function updateUser($params_array) {
        $user = \App\User::find($params_array['id']);
        $usuarioActualizado = false;
        if (!empty($user)) {
            $user->name = $params_array['name'];
            $usuarioActualizado = $user->update();
        }


        if ($usuarioActualizado) {
            return "El usuario ha sido modificado.";
        } else {
            return "El usuario no puede ser modificado.";
        }
    }

    public static function store($params_array, $validate) {

        $usuarioSalvado = false;
        
        if (!$validate->fails()) {
            $user = new User();

            $user->password = hash('sha256', $params_array['password']);
            $user->rol = $params_array['rol'];
            $user->email = $params_array['email'];
            $user->name = $params_array['name'];
            $usuarioSalvado = $user->save();
        } 
        
        if ($usuarioSalvado) {
            return "El usuario ha sido creado.";
        } else {
            return "El usuario no se ha podido guardar.";
        }
    }

}
