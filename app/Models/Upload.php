<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    public function asignados(){
        return $this->hasMany(Asignado::class);
    }

    public function proceso(){
        return $this->hasOne(Proceso::class);
    }  
}
