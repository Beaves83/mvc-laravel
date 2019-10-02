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
        $citas = DB::table('citas')->join('clientes', 'clientes.id', '=', 'citas.cliente_id')
                ->select('citas.*','clientes.razonsocial')
                ->get()->take(30);
        
        //$citas = \App\Cita::get()->take(10);
        return view('gestioncitas', compact('citas'));
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
        $params_array = $this ->conversionRequestToArray($request);
         
        if(!empty($params_array)){
          
            //Validar
            $validate = \Validator::make($params_array, [
                'idcliente'       => 'required|numeric',
                'fecha'           => 'required|date',
                'numeroempleadosreservados' => 'required|numeric'
            ]);
            
            if($validate->fails()){        
                $data = array (
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'La cita no se ha creado.',
                    'errors' => $validate->errors()
                );            
            } else {
                $cita = new Cita();               
                $cita->idcliente = $params_array['idcliente'];
                $cita->fecha = $params_array['fecha'];
                $cita->numeroempleadosreservados = $params_array['numeroempleadosreservados'];      
                $cita->save();
            
                $data = array (
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'La cita se ha creado correctamente.',
                    'cita' => $cita
                );
            }
        } else {             
            $data = array (
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'Los datos enviados no son correctos.'
                );
        }
        
        //return $data;
        return response() -> json($data); 
    }
    
    /**
     * Devuelve un listado completo con todas las citas.
     *
     * @return Response
     */
    public function all()
    {       
//        $citas = DB::table('citas')->join('clientes', 'clientes.id', '=', 'citas.cliente_id')
//                ->select('citas.*','clientes.razonsocial')
//                ->get()->take(30);
        return response() -> json(Cita::reservesWithClient()); 
    }

    /**
     * Muestra una cita especifica.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $cita = Cita::reservesWithClientWithFilter($id);
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
    public function confirmReserve(Request $request){   
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
    
    public function conversionRequestToArray(Request $request){
        $json = $request -> input('json', null);
        $params_array = json_decode($json, true);
        $params_array = array_change_key_case($params_array, CASE_LOWER);
        $params_array = array_map('trim',$params_array);
        
        return $params_array;
    }
}
