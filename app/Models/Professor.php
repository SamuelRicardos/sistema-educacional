<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professores';

    protected $fillable = [
        'nome',
        'cpf',
        'email',
        'matricula'
    ];

    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }
}
