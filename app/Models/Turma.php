<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    //
    protected $table = 'turmas';

    protected $fillable = [
        'cod_turma',
        'curso',
        'periodo',
        'disciplina',
        'turno',
        'professor_id',
    ];

    /**
     * Alunos pertencentes à turma (Many-to-Many)
     */
    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'turma_aluno', 'turma_id', 'aluno_id');
    }

    /**
     * Professor responsável pela turma (Many-to-One)
     */
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}
