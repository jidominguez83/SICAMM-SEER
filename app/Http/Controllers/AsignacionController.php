<?php

namespace App\Http\Controllers;

use App\Imports\AsignadoImport;
use App\Models\Proceso;
use Illuminate\Http\Request;
use App\Models\Asignacion;
use Exception;
use Maatwebsite\Excel\Facades\Excel;

class AsignacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function asignaciones(){
        $procesos = Proceso::all();

        $asignaciones = Asignacion::select('asignaciones.*', 
                                            'nombre_proceso',
                                            'COUNT(participante_id) AS num_asignados')
                                            ->join('procesos', 'proceso_id', '=', 'procesos.id')
                                            ->join('asignados', 'asignacion_id', '=', 'asignados.id')
                                            ->paginate(10);

        return view('rh.asignaciones', [
            'asignaciones' => $asignaciones,
            'procesos' => $procesos
        ]);
    }

    public function asignados($asignacion_id){
        $procesos = Proceso::all();

        return view('rh.asignados', [
            'procesos' => $procesos
        ]);
    }

    // public function cargar_asignados(Request $request){
    //     try{
    //         $upload = new GrupoAsignacion();
    //         $upload->proceso_id = $request->input('proceso');
    //         $upload->descripcion = $request->input('descripcion');
    //         $upload->folio_oficialia_mayor = $request->input('folio_oficialia_mayor');
    //         $upload->tipo_contratacion = $request->input('tipo_contratacion');
    //         $upload->created_at = date('Y-m-d');
    //         $upload->save();
    
    //         $file = $request->file('file_input');
    //         Excel::import(new AsignadoImport, $file);
    
    //         return redirect()->route('upload')->with('success', 'El archivo se ha cargado correctamente.');
    //     } catch (Exception $ex){
    //         return redirect()->route('upload')->with('error', 'Hubo un error al intentar cargar el listado: '.$ex);
    //     }
    // }    
}
