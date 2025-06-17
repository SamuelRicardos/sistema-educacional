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

        public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'turma_aluno', 'aluno_id', 'turma_id');
    }
}
