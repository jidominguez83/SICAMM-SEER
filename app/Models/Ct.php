<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ct extends Model
{
    use HasFactory;

    public function asignados(){
        return $this->hasMany(Asignado::class);
    }
}
