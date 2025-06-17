<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    //
    protected $fillable = [
        'nome',
        'email',
        'periodo',
        'curso',
        'status',
        'turno',
        'matricula',
        'cpf',
    ];
}
