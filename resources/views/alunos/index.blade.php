<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestão de Alunos - Listagem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">Sistema Educacional</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('alunos.index') }}">Alunos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('turma.index') }}">Cursos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('professores.index') }}">Professores</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-column flex-md-row gap-3">
        <h1 class="m-0">Lista de Alunos</h1>
        <a href="{{ route('alunos.create') }}" class="btn btn-primary">
            + Adicionar Aluno
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($alunos->count())
        <ul class="list-group mb-5">
            @foreach($alunos as $aluno)
                <li class="list-group-item">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                        <div>
                            <strong>{{ $aluno->nome }}</strong> | {{ $aluno->email }}<br>
                            CPF: {{ $aluno->cpf }} | Matrícula: {{ $aluno->matricula }}<br>
                            Curso: {{ $aluno->curso }} | Turno: {{ $aluno->turno }} | Período: {{ $aluno->periodo }}<br>
                            Status: <span class="badge bg-{{ $aluno->status === 'ativo' ? 'success' : 'secondary' }}">{{ ucfirst($aluno->status) }}</span>
                        </div>
                        <div class="mt-3 mt-md-0 d-flex gap-2">
                            <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form method="POST" action="{{ route('alunos.destroy', $aluno->id) }}" onsubmit="return confirm('Confirma exclusão do aluno?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <div class="alert alert-warning mt-3">Nenhum aluno cadastrado ainda.</div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
