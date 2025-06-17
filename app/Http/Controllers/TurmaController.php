<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\Professor;
use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    // Listar turmas
    public function index()
    {
        $turmas = Turma::with(['professor', 'alunos'])->get();
        return view('turmas.index', compact('turmas'));
    }

    // Exibir formulário de criação
    public function create()
    {
        $professores = Professor::all();
        $alunos = Aluno::all();
        return view('turmas.create', compact('professores', 'alunos'));
    }

    // Armazenar nova turma
    public function store(Request $request)
    {
        $request->validate([
            'cod_turma'   => 'required|string|unique:turmas,cod_turma',
            'curso'       => 'required|string',
            'periodo'     => 'required|string',
            'disciplina'  => 'required|string',
            'turno'       => 'required|string',
            'professor_id'=> 'required|exists:professores,id',
            'alunos'      => 'nullable|array',
            'alunos.*'    => 'exists:alunos,id',
        ]);

        $turma = Turma::create($request->only([
            'cod_turma', 'curso', 'periodo', 'disciplina', 'turno', 'professor_id'
        ]));

        if ($request->has('alunos')) {
            $turma->alunos()->attach($request->alunos);
        }

        return redirect()->route('turmas.index')->with('success', 'Turma criada com sucesso!');
    }

    public function edit($id)
    {
        $turma = Turma::with('alunos')->findOrFail($id);
        $professores = Professor::all();
        $alunos = Aluno::all();

        return view('turmas.edit', compact('turma', 'professores', 'alunos'));
    }

    public function update(Request $request, $id)
    {
        $turma = Turma::findOrFail($id);

        $request->validate([
            'cod_turma'   => 'required|string|unique:turmas,cod_turma,' . $turma->id,
            'curso'       => 'required|string',
            'periodo'     => 'required|string',
            'disciplina'  => 'required|string',
            'turno'       => 'required|string',
            'professor_id'=> 'required|exists:professores,id',
            'alunos'      => 'nullable|array',
            'alunos.*'    => 'exists:alunos,id',
        ]);

        $turma->update($request->only([
            'cod_turma', 'curso', 'periodo', 'disciplina', 'turno', 'professor_id'
        ]));

        $turma->alunos()->sync($request->alunos ?? []);

        return redirect()->route('turmas.index')->with('success', 'Turma atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $turma = Turma::findOrFail($id);
        $turma->alunos()->detach();
        $turma->delete();

        return redirect()->route('turmas.index')->with('success', 'Turma excluída com sucesso!');
    }
}
