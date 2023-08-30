<?php

namespace App\Imports;

use App\Models\AdmisionResultado;
use App\Models\Ciclo;
use App\Models\Email;
use App\Models\ParticipacionProceso;
use Exception;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Participante;
use App\Models\Telefono;
use App\Models\Valoracion;

class AdmisionImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        try{
            foreach ($collection as $row) 
            {
                // Verifica si existe el participante en la tabla [participantes].
                $id = Participante::select('id')->where('curp', $row['curp'])->get();
                //dd($id);
                // Si no existe entonces inserta los datos del participante.
                if(count($id) == 0){//dd($id);
                    Participante::create([
                        'curp' => $row['curp'],
                        'rfc' => $row['rfc'],
                        'nombre' => $row['nombre'],
                        'apellido_paterno' => $row['apellido_paterno'],
                        'apellido_materno' => $row['apellido_materno'],
                    ]);

                    $participanteId = Participante::latest('id')->first();
                } else {
                    // Si existe, recupera el id del participante.
                    $participanteId = $id;
                }

                // Verifica si existe el ciclo en la tabla [ciclos].
                $ciclo = Ciclo::select('id')->where('ciclo', $row['ciclo'])->get();

                if(count($ciclo) == 0){
                    // Si no existe entonces inserta los datos del ciclo.
                    Ciclo::create([
                        'ciclo' => $row['ciclo'],
                        'activo' => 1
                    ]);
                }

                // Obtiene el Id de la valoración.
                $valoracion = Valoracion::select('id')->where('nombre', $row['tipo_de_valoracion'])->get();

                // Inserta los datos de participación en el proceso del participante en [participacion_procesos].
                ParticipacionProceso::create([
                    'participante_id' => $participanteId,
                    'ciclo_id' => $ciclo,
                    'folio_federal' => $row['folio'],
                    'valoracion_id' => $valoracion,
                    'p_global' => $row['p_fin'],
                    'posicion' => $row['pos_orden'], 
                    'estatus' => 1, 
                    'motivo_baja' => null
                ]);

                // Recupera el último id insertado en [participacion_proceso].
                $participacionProcesoId = ParticipacionProceso::latest('id')->first();

                // Inserta los resultados del participante en [admision_resultados].
                AdmisionResultado::create([
                    'participacion_procesos_id' => $participacionProcesoId,
                    'p_fpd' => $row['p_fpd'],
                    'promedio' => $row['promedio'],
                    'p_prom' => $row['p_prom'],
                    'h_cursos' => $row['h_cursos'],
                    'p_hcursos' => $row['p_hcursos'],
                    'prac_doc' => $row['prac_doc'],
                    'eje_doc' => $row['eje_doc'],
                    'p_ed' => $row['p_ed'],
                    'constancia' => $row['constancia'],
                    'p_aca' => $row['p_aca']
                ]);

                // Inserta el primer email.
                Email::create([
                    'participante_id' => $participanteId,
                    'email' => $row['correo1']
                ]);

                // Inserta el segundo email.
                Email::create([
                    'participante_id' => $participanteId,
                    'email' => $row['correo2']
                ]);

                // Inserta el primer teléfono.
                Telefono::create([
                    'participante_id' => $participanteId,
                    'telefono' => $row['telefono1'],
                    'tipo' => 'Celular'
                ]);

                // Inserta el segundo teléfono.
                Telefono::create([
                    'participante_id' => $participanteId,
                    'telefono' => $row['telefono2'],
                    'tipo' => 'Celular'
                ]);                
            }
        } catch(Exception $ex) {
            dd($ex);
            return redirect()->route('sicamm.ordenamiento')->with('error', 'Ocurrió un error al subir el listado: '.$ex);
        }
    }
}
