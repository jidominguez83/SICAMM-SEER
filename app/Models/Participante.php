<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    use HasFactory;

    protected $fillable = [
        'curp',
        'rfc',
        'nombre',
        'apellido_paterno',
        'apellido_materno'
    ];

    public function telefonos(){
        return $this->hasMany(Telefono::class);
    }

    public function emails(){
        return $this->hasMany(Email::class);
    }

    public function participacion_procesos(){
        return $this->hasMany(ParticipacionProceso::class);
    }
}
