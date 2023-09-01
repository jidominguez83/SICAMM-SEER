<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'participante_id',
        'email'
    ];

    public function participante(){
        return $this->belongsTo(Participante::class);
    }
}
