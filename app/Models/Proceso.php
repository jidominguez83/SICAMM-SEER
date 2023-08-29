<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    use HasFactory;

    public function asignados(){
        return $this->hasMany(Asignado::class);
    }

    public function uploads(){
        return $this->hasMany(Upload::class);
    }
}
