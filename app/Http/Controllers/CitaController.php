<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cliente;
use App\Cita;

class CitaController extends Controller
{
    /**
     * Devuelve la vista con las citas.
     *
     * @return Response
     */
    public function index()
    {       
        $citas = Cita::reservartionsWithClient();      
        return view('gestioncitas')->with( compact('citas'));
    }

    /**
     * Muestra el formulario para crear una cita.
     *
     * @return Response
     */
    public function create()
    {
        //
    }
    
    /**
     * Guarda una cita.
     *
     * @return Response
     */
    public function store(Request $request)
    {      
        return App\Cita::store($request);
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

    /**
     * Muestra una cita especifica.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $cita = Cita::reservartionsWithClientWithFilter($id);
        return view('gestionvisitas', $cita);   
    }

    /**
     * Devuelve una cita
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return \App\Cita::find($id);
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
}
