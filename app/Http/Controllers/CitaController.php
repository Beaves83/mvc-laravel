<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use App\Cliente;
use App\Cita;

class CitaController extends Controller {

    /**
     * Default page for showing all the list.
     *
     * @return a view with and the list of the clients.
     */
    public function index() {
        $citas = Cita::allAppointment();
        return view('citas.index')->with('citas', $citas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return a view
     */
    public function create() {
        auth()->user()->authorizeRoles(['admin','secretario']);
        return view('citas.create');
    }

    /**
     * Save the specified resource.
     *
     * @return Response
     */
    public function store() {
        auth()->user()->authorizeRoles(['admin','secretario']);
        $rules = array(
            'clientes' => 'required|numeric',
            'fecha' => 'required|date|after:today',
            'numeroempleadosreservados' => 'required|numeric'
        );
        $validator = \Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return \Redirect::to('citas/create')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {

            $cita = new Cita();

            $cita->cliente_id = Input::get('clientes');
            $cita->fecha = Input::get('fecha');
            $cita->numeroempleadosreservados = Input::get('numeroempleadosreservados');
            $cita->numeroempleadosasistentes = 0;

            $cita->save();

            \Session::flash('message', '¡Cita creada!');
            return \Redirect::to('citas');
        }
    }

    /**
     * Show the specified resource.
     *
     * @param  int $id
     * @return a view.
     */
    public function show($id) {
        $citas = Cita::getCita($id);
        return view('citas.show')->with('cita', $citas[0]);
    }

    /**
     * Return the view of the specified resource to edit.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        auth()->user()->authorizeRoles(['admin','secretario']);
        $cita = Cita::find($id);

        if ($cita->numeroempleadosasistentes > 0) {
            \Session::flash('message', 'La cita no se puede modificar porque ya ha habido asistentes a la consulta.');
            return \Redirect::to('citas');
        }
        return view("citas.edit")->with('cita', $cita);
    }

    /**
     * Actualizamos una cita.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        auth()->user()->authorizeRoles(['admin','secretario']);
        $rules = array(
//            'clientes'      => 'required|numeric',
            'fecha' => 'required|date|after:today',
            'numeroempleadosreservados' => 'required|numeric'
        );
        $validator = \Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return \Redirect::to('citas/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        } else {
            Cita::where('id', $id)
                    ->update(
                            [
//                                'cliente_id' => Input::get('clientes'),
                                'fecha' => Input::get('fecha'),
                                'numeroempleadosreservados' => Input::get('numeroempleadosreservados')
//                                'numeroempleadosasistentes' => Input::get('numeroempleadosasistentes')
            ]);

            \Session::flash('message', 'Cita actualizada');
            return \Redirect::to('citas');
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
        $cita = Cita::find($id);
        //dd($cita);
        $cita->delete();

        \Session::flash('message', 'La cita del cliente ' . $cita->razonsocial . ' ha sido eliminada.');
        return \Redirect::to('citas');
    }

    /**
     * Devuelve un listado completo con todas las citas.
     *
     * @return Response
     */
    public function all() {
        return response()->json(Cita::reservartionsWithClient());
    }

}
