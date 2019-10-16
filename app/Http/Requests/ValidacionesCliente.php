<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionesCliente extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Nos saltamos la autorizacion.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {     

        return [
            'codigo'                => 'required|alpha_num|unique:cliente|max:15',
            'razonsocial'           => 'required|unique:cliente|max:15',
            'cif'                   => 'required|alpha_num|unique:cliente|max:15',
            'direccion'             => 'required|max:100',
            'municipio'             => 'required|max:100',
            'provincia'             => 'required|max:100',
            'fechainiciocontrato'   => 'required|date',
            'fechafincontrato'      => 'required|date',
            'numeroreconocimientoscontratados'    => 'required|numeric'
        ];
    }

    public function messages() {
        return [
            'codigo.required' => 'El :attribute es obligatorio.',
            'codigo.unique' => 'El :attribute es único',
            
            'razonsocial.required' => 'El :attribute email es obligatorio',
            'razonsocial.unique' => 'El :attribute es único'
            
        ];
    }

//    public function attributes() {
//        return [
//            'codigo' => 'Código',
//            'razonsocial' => 'Razón social'
//        ];
//    }
    
}
