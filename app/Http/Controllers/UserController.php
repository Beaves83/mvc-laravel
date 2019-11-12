<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Barryvdh\DomPDF\Facade as PDF;

class UserController extends Controller {

    /**
     * Default page for showing all the list.
     *
     * @return a view with and the list of the clients.
     */
    public function index() {
        $usuarios = User::allUser();
        $headers = User::headers();
        return view('usuarios.index', compact(['usuarios', 'headers']));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return a view
     */
    public function create() {     
        auth()->user()->authorizeRoles(['admin']);
        $roles = Role::all('description', 'id');
        return view('usuarios.create', compact(['roles']));
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
            'roles' => 'required'
        );
        $validator = \Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return \Redirect::to('usuarios/create')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {

            $user = new User();           
            $user->name = Input::get('name');
            $user->email_verified_at = new \DateTime();
            $user->password = hash('sha256', Input::get('password'));
            $user->email = Input::get('email');         
            $user->save();

            //Añadimos entrada en el tabla que relaciona Roles con Usuarios.
            $user->roles()->attach(Role::where('id', Input::get('roles'))->first());

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
        $roles = Role::all('description', 'id');
        return view('usuarios.edit', compact(['usuario', 'roles']));
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
            'roles' => 'required',
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
                                'email' => Input::get('email') 
            ]);
            $user = User::find($id);
            
            //Añadimos entrada en el tabla que relaciona Roles con Usuarios.
            $user->roles()->detach();
            $user->roles()->attach(Role::where('id', Input::get('roles'))->first());
            
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
    
    /**
     * Create a pdf.
     *
     */  
    public function userpdf($id)
    {        
        $user = User::getUser($id)[0];
        $pdf = PDF::loadView("usuarios.pdf", compact(['user']));
        return $pdf->download("usuario".$user->name.".pdf");
    }
}
