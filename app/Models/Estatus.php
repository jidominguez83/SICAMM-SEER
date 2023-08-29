<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estatus extends Model
{
    use HasFactory;

    public function participacion_procesos(){
        return $this->hasMany(ParticipacionProceso::class);
    }
}
