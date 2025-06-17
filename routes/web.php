<?php

use App\Http\Controllers\TurmaController;
use App\Http\Controllers\ProfessorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::get('/alunos', [AlunoController::class, 'index'])->name('alunos.index');
Route::get('/alunos/create', [AlunoController::class, 'create'])->name('alunos.create');
Route::post('/alunos', [AlunoController::class, 'store'])->name('alunos.store');
Route::delete('/alunos/{aluno}', [AlunoController::class, 'destroy'])->name('alunos.destroy');
Route::get('/alunos/{aluno}/edit', [AlunoController::class, 'edit'])->name('alunos.edit');
Route::put('/alunos/{aluno}', [AlunoController::class, 'update'])->name('alunos.update');

Route::get('/turma', [TurmaController::class, 'index'])->name('turmas.index');
Route::get('/turma/create', [TurmaController::class, 'create'])->name('turmas.create');
Route::post('/turma', [TurmaController::class, 'store'])->name('turmas.store');
Route::get('/turma/{turma}/edit', [TurmaController::class, 'edit'])->name('turmas.edit');
Route::put('/turma/{turma}', [TurmaController::class, 'update'])->name('turmas.update'); 
Route::delete('/turma/{turma}', [TurmaController::class, 'destroy'])->name('turmas.destroy');

Route::get('/professores', [ProfessorController::class, 'index'])->name('professores.index');
Route::get('/professores/create', [ProfessorController::class, 'create'])->name('professores.create');
Route::post('/professores', [ProfessorController::class, 'store'])->name('professores.store');
Route::get('/professores/{professor}/edit', [ProfessorController::class, 'edit'])->name('professores.edit');
Route::put('/professores/{professor}', [ProfessorController::class, 'update'])->name('professores.update');
Route::delete('/professores/{professor}', [ProfessorController::class, 'destroy'])->name('professores.destroy');
Route::get('/api/professores', [ProfessorController::class, 'apiList'])->name('api.professores.list');