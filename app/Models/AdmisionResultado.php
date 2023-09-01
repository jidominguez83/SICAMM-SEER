<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmisionResultado extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'participacion_procesos_id',
        'p_fpd',
        'promedio',
        'p_prom',
        'h_cursos',
        'p_hcursos',
        'prac_doc',
        'eje_doc',
        'p_ed',
        'constancia',
        'p_aca'
    ];

    public function participacion_proceso(){
        return $this->hasOne(ParticipacionProceso::class);
    }
}
