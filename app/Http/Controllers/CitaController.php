<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use App\Cliente;
use App\Cita;

class CitaController extends Controller
{
    /**
     * Default page for showing all the list.
     *
     * @return a view with and the list of the clients.
     */
    public function index()
    {       
        $citas = Cita::informacionCompleta();      
        return view('citas.index')->with('citas', $citas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return a view
     */
    public function create()
    {
        return view('citas.create');
    }
    
    /**
     * Save the specified resource.
     *
     * @return Response
     */
    public function store()
    {            
        $rules = array(
            'clientes'      => 'required|numeric',
            'fecha'           => 'required|date|after:today',
            'numeroempleadosreservados' => 'required|numeric'
        );
        //dd(Input::all());
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
    public function show($id)
    { 
        $citas = Cita::getCita($id);
        return view('citas.show')->with('cita', $citas[0]);
    }

    /**
     * Return the view of the specified resource to edit.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $cita = Cita::find($id);

        if($cita->numeroempleadosasistentes > 0){
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
    public function update(Request $request)
    { 
        $params_array = $this ->conversionRequestToArray($request);
      
        $cita = \App\Cita::find($params_array['id']);
       
        if(!empty($cita) & $cita->NumeroEmpleadosAsistentes == 0){
            Cita::where('id', $params_array['id'])
            ->update(
                ['numeroempleadosreservados' => $params_array['numeroempleadosreservados'],
                'fecha' => $params_array['fecha'],
                'numeroempleadosreservados' => $params_array['numeroempleadosreservados']]);
            
            return "La cita ha sido actualiza.";
        }     
        else {
            return "La cita no puede ser modificada.";
        }
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
    
    //Actualizacion realizada por el mÃ©dico.
    public function confirmReservation(Request $request){   
        $params_array = $this ->conversionRequestToArray($request);
        
        $cita = \App\Cita::find($params_array['id']);
        $cliente = \App\Cliente::find($params_array['idcliente']);
       
        if(!empty($cita) && !empty($cliente)){
            Cita::where('id', $params_array['id'])
            ->update(['numeroempleadosasistentes' => $params_array['numeroempleadosasistentes']]);
            
            $totalRevisiones = $params_array['numeroempleadosasistentes'] + $cliente->NumeroReconocimientosUtilizados;        
            $contratoActivo = true;
            if($totalRevisiones >= $cliente->NumeroReconocimientosContratados)
            {
                $contratoActivo = false;
            }
            
            Cliente::where('id', $params_array['idcliente'])
            ->update(['numeroreconocimientosutilizados' => $totalRevisiones,
                        'activo' => $contratoActivo]);
            
            return "La cita ha sido actualiza.";
        }     
        else {
            return "No se ha podido actualizar la cita";
        } 
    } 
    
    //Conversión Request a Array.
    public function conversionRequestToArray(Request $request){
        $json = $request -> input('json', null);
        $params_array = json_decode($json, true);
        $params_array = array_change_key_case($params_array, CASE_LOWER);
        $params_array = array_map('trim',$params_array);
        
        return $params_array;
    }
    
    /**
     * Devuelve un listado completo con todas las citas.
     *
     * @return Response
     */
    public function all()
    {       
        return response() -> json(Cita::reservartionsWithClient()); 
    }
}
