<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::get('/alunos', [AlunoController::class, 'index'])->name('alunos.index');
Route::post('/alunos', [AlunoController::class, 'store'])->name('alunos.store');
Route::delete('/alunos/{aluno}', [AlunoController::class, 'destroy'])->name('alunos.destroy');
Route::get('/alunos/{aluno}/edit', [AlunoController::class, 'edit'])->name('alunos.edit');
Route::put('/alunos/{aluno}', [AlunoController::class, 'update'])->name('alunos.update');

Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
Route::get('/professores', [ProfessorController::class, 'index'])->name('professores.index');
