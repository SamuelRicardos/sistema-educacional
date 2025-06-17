<?php

use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::get('/alunos', [AlunoController::class, 'index'])->name('alunos.index');
Route::post('/alunos', [AlunoController::class, 'store'])->name('alunos.store');
Route::delete('/alunos/{aluno}', [AlunoController::class, 'destroy'])->name('alunos.destroy');
Route::get('/alunos/{aluno}/edit', [AlunoController::class, 'edit'])->name('alunos.edit');
Route::put('/alunos/{aluno}', [AlunoController::class, 'update'])->name('alunos.update');

Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
Route::get('/cursos/create', [CursoController::class, 'create'])->name('cursos.create');      // <-- essa é a rota que falta
Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');              // para salvar o curso
Route::get('/cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');   // editar curso
Route::put('/cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update');    // atualizar curso
Route::delete('/cursos/{curso}', [CursoController::class, 'destroy'])->name('cursos.destroy');// deletar curso

Route::get('/professores', [ProfessorController::class, 'index'])->name('professores.index');
