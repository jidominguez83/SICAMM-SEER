<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlazaAsignada extends Model
{
    use HasFactory;

    protected $table = 'plazas_asignadas';

    public function asignado(){
        return $this->belongsTo(Asignado::class);
    }
}
