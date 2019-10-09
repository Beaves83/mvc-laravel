<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionesUsuario extends FormRequest {

    
    //Si falla lo redirigimos a ...
    //protected $redirectRoute = 'clientes';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {       
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'El :attribute es obligatorio.',
            'email.required' => 'El :attribute email es obligatorio',
            'email.unique' => 'El :attribute es único',
            'password.required' => 'El :attribute es obligatorio'
        ];
    }

    public function attributes() {
        return [
            'name' => 'nombre de usuario',
            'email' => 'correo electronico',
            'password' => 'contraseña',
        ];
    }
    
    public function response(array $errors)
    {
        dd('erorr');
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 422);
        }
 
        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }
}
