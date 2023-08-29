<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipacionProceso extends Model
{
    use HasFactory;

    public function participante(){
        return $this->belongsTo(Participante::class);
    }

    public function ciclo(){
        return $this->belongsTo(Ciclo::class);
    }

    public function valoracion(){
        return $this->belongsTo(Valoracion::class);
    }

    public function estatus(){
        return $this->belongsTo(Estatus::class);
    }
}
