<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class UserController extends Controller {

    /**
     * Default page for showing all the list.
     *
     * @return a view with and the list of the clients.
     */
    public function index() {
        $usuarios = User::allUser();
        return view('usuarios.index')->with('usuarios', $usuarios);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return a view
     */
    public function create() {     
        auth()->user()->authorizeRoles(['admin']);
        return view('usuarios.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        
       auth()->user()->authorizeRoles(['admin']);  
       $rules = array(
            'name' => 'required|max:190',
            'email' => 'required|email|unique:users|max:190',
            'password' => 'required',
//            'rol' => 'required',
        );
        $validator = \Validator::make(Input::all(), $rules);
        //dd(Input::all());
        if ($validator->fails()) {
            return \Redirect::to('usuarios/create')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {

            $user = new User();
            
            $user->name = Input::get('name');
            $user->password = hash('sha256', Input::get('password'));
//            $user->rol = Input::get('rol');
            $user->email = Input::get('email');
            
            $user->save();

            \Session::flash('message', 'Usuario creado');
            return \Redirect::to('usuarios');
        }
    }

    /**
     * Show the specified resource.
     *
     * @param  int $id
     * @return a view.
     */
    public function show($id) {
        $usuario = User::find($id);
        return view('usuarios.show')->with('usuario', $usuario);
    }
    
    /**
     * Return the view of the specified resource to edit.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        auth()->user()->authorizeRoles(['admin']);  
        $usuario = User::find($id);
        return view("usuarios.edit")->with('usuario', $usuario);
    }
    
    /**
     * Update the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        auth()->user()->authorizeRoles(['admin']);  
        $rules = array(
            'name' => 'required|max:190',
            'email' => 'required|email|max:190|unique:users,email,'. $id . ',id',
//            'password' => 'required',
//            'rol' => 'required',
        );
        
        $validator = Validator(Input::all(), $rules);

        if ($validator->fails()) {
            return \Redirect::to('usuarios/' . $id . '/edit')->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            User::where('id', $id)
                    ->update(
                            [
                                'name' => Input::get('name'),
                                'email' => Input::get('email'),
//                                'password' => hash('sha256', Input::get('password')),
//                                'rol' => Input::get('rol')     
            ]);
            \Session::flash('message', 'Usuario actualizado');
            return \Redirect::to('usuarios');
        }
    }
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        auth()->user()->authorizeRoles(['admin']);  
        $usuario = User::find($id);
        $usuario->delete();

        \Session::flash('message', 'El usuario ' . $usuario->name . ' ha sido eliminado.');
        return \Redirect::to('usuarios');
    }
}
