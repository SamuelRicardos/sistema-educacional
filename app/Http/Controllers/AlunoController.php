<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
   public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index', compact('alunos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:alunos,email',
        ]);

        Aluno::create($request->only(['nome', 'email']));
        return redirect()->back()->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect()->back()->with('success', 'Aluno removido com sucesso!');
    }
}
