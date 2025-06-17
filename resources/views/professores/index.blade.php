<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestão de Professores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">Sistema Educacional</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('alunos.index') }}">Alunos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('turmas.index') }}">Turmas</a></li>
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('professores.index') }}">Professores</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h1 class="mb-4">Lista de Professores</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('professores.create') }}" class="btn btn-primary mb-3">Adicionar Professor</a>

    @if($professores->count())
        <table class="table table-striped table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Matrícula</th>
                    <th class="text-end">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($professores as $professor)
                    <tr>
                        <td>{{ $professor->nome }}</td>
                        <td>{{ $professor->email }}</td>
                        <td>{{ $professor->cpf }}</td>
                        <td>{{ $professor->matricula }}</td>
                        <td class="text-end">
                            <a href="{{ route('professores.edit', $professor->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form method="POST" action="{{ route('professores.destroy', $professor->id) }}" class="d-inline" onsubmit="return confirm('Deseja excluir este professor?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" title="Excluir">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">Nenhum professor cadastrado ainda.</div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>