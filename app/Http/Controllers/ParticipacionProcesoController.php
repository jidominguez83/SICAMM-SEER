<?php

namespace App\Http\Controllers;

use App\Imports\AdmisionImport;
use App\Models\Ciclo;
use App\Models\Proceso;
use App\Models\ParticipacionProceso;
use App\Models\Valoracion;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ParticipacionProcesoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ordenamiento($proceso_id, $ciclo_id = null, $valoracion_id = null)
    {
        $ciclos = Ciclo::all();
        $valoraciones = Valoracion::all();
        $proceso = Proceso::find($proceso_id);
        $participantes = ParticipacionProceso::select('participacion_procesos.*',
                                                        'curp',
                                                        'participantes.nombre',
                                                        'apellido_paterno',
                                                        'apellido_materno',
                                                        'participacion_procesos.participante_id AS participante_id',
                                                        'valoraciones.id AS valoracion_id',
                                                        'valoraciones.nombre AS valoracion_nombre',
                                                        'participacion_procesos.id AS participacion_id')
                                                ->join('participantes', 'participante_id', '=', 'participantes.id')
                                                ->join('valoraciones', 'valoracion_id', '=', 'valoraciones.id')
                                                ->where('estatus', 1)
                                                ->where('ciclo_id', $ciclo_id)
                                                ->where('valoraciones.id', $valoracion_id)
                                                ->where('valoraciones.proceso_id', $proceso_id)
                                                ->paginate(10);

        return view('sicamm.ordenamiento', [
            'participantes' => $participantes,
            'ciclos' => $ciclos,
            'valoraciones' => $valoraciones,
            'proceso' => $proceso,
            'ciclo_id' => $ciclo_id,
            'valoracion_id' => $valoracion_id
        ]);
    }

    public function cargar_ordenamiento(Request $request){
        $proceso_id = $request->input('proceso_id');
        $file = $request->file('file_ordenamiento');
        Excel::import(new AdmisionImport, $file);

        return redirect()->route('sicamm.ordenamiento', [
            'proceso_id' => $proceso_id,
        ])->with('success', 'El listado de ordenamiento ha sido cargado correctamente.');
    }
}
