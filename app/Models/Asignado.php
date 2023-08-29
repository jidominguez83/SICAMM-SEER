<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignado extends Model
{
    use HasFactory;

    protected $fillable = [
        'upload_id',
        'clave_presupuestal',
        'nombre_titular',
        'tipo_permiso',
        'observacion',
        'fecha_inicio',
        'fecha_fin',
        'cct',
        'turno',
        'categoria',
        'funcion',
        'plaza',
        'curp',
        'rfc',
        'beneficiario',
        'ordenamiento',
        'materia',
        'grado_academico',
        'tipo_evaluacion',
        'estatus',
        'folio_nombramiento',
        'clave_presupuestal2',
        'clave_presupuestal3',
        'clave_presupuestal4',
        'clave_presupuestal5',
        'codigo_nombramiento',
        'de_la_del',
        'cct2',
        'cct3',
        'cct4',
        'cct5',
        'folio_oficialia_mayor'
    ];

    public function upload(){
        return $this->belongsTo(Upload::class);
    }

    public function ct(){
        return $this->hasOne(Ct::class);
    }

    public function participante(){
        return $this->hasOne(Participante::class);
    }
}
