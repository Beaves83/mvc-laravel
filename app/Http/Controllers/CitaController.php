<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

use App\Cita;
use App\Cliente;
use Barryvdh\DomPDF\Facade as PDF;

class CitaController extends Controller {

    /**
     * Default page for showing all the list.
     *
     * @return a view with and the list of the clients.
     */
    public function index() {
        $citas = Cita::allAppointment();
        $headers = Cita::headers();
        return view('citas.index', compact(['citas', 'headers']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return a view
     */
    public function create() {
        auth()->user()->authorizeRoles(['admin','secretario']);
        $clientes = Cliente::all('razonsocial', 'id');
        return view('citas.create', compact(['clientes']));
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
        $cita = Cita::getCita($id)[0];
        $cliente = Cliente::find($cita->cliente_id);
        return view("citas.show", compact(['cita','cliente']));
    }

    /**
     * Return the view of the specified resource to edit.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        auth()->user()->authorizeRoles(['admin','secretario', 'medico']);
        
        $cita = Cita::find($id);
        $cliente = Cliente::find($cita->cliente_id);
        $bloqueada = false;
        if ($cita->numeroempleadosasistentes > 0 or auth()->user()->roles()->get()->first()->name == 'medico' ) {
            \Session::flash('message', 'La cita no se puede modificar porque ya ha habido asistentes a la consulta.');
            $bloqueada = true;
        }
                
        return view("citas.edit", compact(['cita','cliente','bloqueada']));
    }

    /**
     * Actualizamos una cita.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        auth()->user()->authorizeRoles(['admin','secretario', 'medico']);
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
            $cita = Cita::find($id);
            $cita->fecha = Input::get('fecha');
            $cita->numeroempleadosreservados = Input::get('numeroempleadosreservados');
            if(Input::get('numeroempleadosasistentes') != null){
                $cita->numeroempleadosasistentes = Input::get('numeroempleadosasistentes');                
            }    
            $cita->update();
                  
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
    
    
    /**
     * Default page for showing the calendar.
     *
     * @return a view with and the list of the task in the calendar.
     */
    public function calendar() {
        $citas = Cita::allAppointment();
        return view('citas.calendar', compact(['citas']));
    }

    public function citapdf($id)
    {        
        $cita = Cita::getCita($id)[0];
        $cliente = Cliente::find($cita->cliente_id);
        $pdf = PDF::loadView("citas.pdf", compact(['cita','cliente']));
        return $pdf->download("cita".$cita->razonsocial."".$cita->fecha.".pdf");
    }
}
