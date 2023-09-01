<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'participante_id',
        'telefono',
        'tipo'
    ];

    public function participante(){
        return $this->belongsTo(Participante::class);
    }
}
