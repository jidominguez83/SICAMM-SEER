<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'ciclo',
        'activo'
    ];

    public function participacion_procesos(){
        return $this->hasMany(ParticipacionProceso::class);
    }

    public function asignados(){
        return $this->hasMany(Asignado::class);
    }
}
