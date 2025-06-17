<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
 // Listagem
    public function index()
    {
        $professores = Professor::all();
        return view('professores.index', compact('professores'));
    }

    // Formulário de criação
    public function create()
    {
        return view('professores.create');
    }

    // Armazenar novo professor
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:professores,email',
            'cpf' => 'required|string|unique:professores,cpf',
            'periodo' => 'required|string|max:50',
            'curso' => 'required|string|max:255',
        ]);

        Professor::create($request->all());

        return redirect()->route('professores.index')
                         ->with('success', 'Professor cadastrado com sucesso!');
    }

    // Formulário de edição
    public function edit($id)
    {
        $professor = Professor::findOrFail($id);
        return view('professores.edit', compact('professor'));
    }

    // Atualizar professor existente
    public function update(Request $request, $id)
    {
        $professor = Professor::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:professores,email,' . $professor->id,
            'cpf' => 'required|string|unique:professores,cpf,' . $professor->id,
            'periodo' => 'required|string|max:50',
            'curso' => 'required|string|max:255',
        ]);

        $professor->update($request->all());

        return redirect()->route('professores.index')
                         ->with('success', 'Professor atualizado com sucesso!');
    }

    // Excluir professor
    public function destroy($id)
    {
        $professor = Professor::findOrFail($id);
        $professor->delete();

        return redirect()->route('professores.index')
                         ->with('success', 'Professor excluído com sucesso!');
    }
}
