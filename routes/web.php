<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\ProfessorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::get('/alunos', [AlunoController::class, 'index'])->name('alunos.index');
Route::get('/alunos/create', [AlunoController::class, 'create'])->name('alunos.create');
Route::post('/alunos', [AlunoController::class, 'store'])->name('alunos.store');
Route::delete('/alunos/{aluno}', [AlunoController::class, 'destroy'])->name('alunos.destroy');
Route::get('/alunos/{aluno}/edit', [AlunoController::class, 'edit'])->name('alunos.edit');
Route::put('/alunos/{aluno}', [AlunoController::class, 'update'])->name('alunos.update');

Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
Route::get('/cursos/create', [CursoController::class, 'create'])->name('cursos.create');
Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');
Route::get('/cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');
Route::put('/cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update'); 
Route::delete('/cursos/{curso}', [CursoController::class, 'destroy'])->name('cursos.destroy');

Route::get('/professores', [ProfessorController::class, 'index'])->name('professores.index');
Route::get('/professores/create', [ProfessorController::class, 'create'])->name('professores.create');
Route::post('/professores', [CursoController::class, 'store'])->name('professores.store');
Route::get('/professores/{professor}/edit', [CursoController::class, 'edit'])->name('professores.edit');
Route::put('/professores/{professor}', [CursoController::class, 'update'])->name('professores.update');
Route::delete('/professores/{professor}', [CursoController::class, 'destroy'])->name('professores.destroy');
