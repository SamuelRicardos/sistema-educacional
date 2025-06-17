<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'      => 'required|string|max:255',
            'email'     => 'required|email|unique:alunos,email',
            'cpf'       => 'required|digits:11|unique:alunos,cpf',
            'matricula' => 'required|string|max:20|unique:alunos,matricula',
            'periodo'   => 'required|string|max:20',
            'curso'     => 'required|string|max:100',
            'turno'     => 'required|string|max:20',
            'status'    => 'required|in:ativo,inativo',
        ]);

        Aluno::create($request->only([
            'nome', 'email', 'cpf', 'matricula', 'periodo', 'curso', 'turno', 'status'
        ]));

        return redirect()->back()->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect()->back()->with('success', 'Aluno removido com sucesso!');
    }

    public function edit(Aluno $aluno)
    {
        return view('alunos.edit', compact('aluno'));
    }

    public function update(Request $request, Aluno $aluno)
    {
        $request->validate([
            'nome'      => 'required|string|max:255',
            'email'     => 'required|email|unique:alunos,email,' . $aluno->id,
            'cpf'       => 'required|digits:11|unique:alunos,cpf,' . $aluno->id,
            'matricula' => 'required|string|max:20|unique:alunos,matricula,' . $aluno->id,
            'periodo'   => 'required|string|max:20',
            'curso'     => 'required|string|max:100',
            'turno'     => 'required|string|max:20',
            'status'    => 'required|in:ativo,inativo',
        ]);

        $aluno->update($request->only([
            'nome', 'email', 'cpf', 'matricula', 'periodo', 'curso', 'turno', 'status'
        ]));

        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso!');
    }
}