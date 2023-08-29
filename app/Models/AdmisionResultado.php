<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmisionResultado extends Model
{
    use HasFactory;

    public function participacion_proceso(){
        return $this->hasOne(ParticipacionProceso::class);
    }
}
