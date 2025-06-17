<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Importante para mobile -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
    <title>Gestão de Alunos</title>
</head>

<body class="bg-light">

    <!-- Navbar responsiva -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Sistema Educacional</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('alunos.index') }}">Alunos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cursos.index') }}">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('professores.index') }}">Professores</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" x-data="{ nome: '', email: '' }">

        <h1 class="mb-4 text-center text-md-start">Cadastro de Alunos</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('alunos.store') }}" class="row g-3 mb-4">
            @csrf
            <div class="col-12 col-md-6">
                <input type="text" name="nome" class="form-control" placeholder="Nome" x-model="nome" required>
            </div>
            <div class="col-12 col-md-6">
                <input type="email" name="email" class="form-control" placeholder="Email" x-model="email" required>
            </div>
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary">Adicionar Aluno</button>

            </div>
        </form>

        <h2 class="mb-3 text-center text-md-start">Lista de Alunos</h2>

        @if($alunos->count())
            <ul class="list-group mb-5">
                @foreach($alunos as $aluno)
                    <li
                        class="list-group-item d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2">
                        <span>{{ $aluno->nome }} ({{ $aluno->email }})</span>
                        <form method="POST" action="{{ route('alunos.destroy', $aluno->id) }}" class="text-end">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
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