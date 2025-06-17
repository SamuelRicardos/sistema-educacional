<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
    <style>
        .form-container {
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Sistema Educacional</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('alunos.index') }}">Alunos</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('cursos.index') }}">Cursos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('professores.index') }}">Professores</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container form-container" x-data="{ nome: '', descricao: '', carga_horaria: '' }" x-init="
        nome = '{{ old('nome', $curso->nome) }}';
        descricao = '{{ old('descricao', $curso->descricao) }}';
        carga_horaria = '{{ old('carga_horaria', $curso->carga_horaria) }}';
     ">

        <h1 class="mb-4">Editar Curso</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('cursos.update', $curso->id) }}" class="row g-3">
            @csrf
            @method('PUT')

            <div class="col-md-6">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" value="{{ old('nome', $curso->nome) }}" name="nome" id="nome" class="form-control"
                    x-model="nome" required />
            </div>

            <div class="col-md-6">
                <label for="carga_horaria" class="form-label">Carga Horária (em horas)</label>
                <input type="number" value="{{ old('carga_horaria', $curso->carga_horaria) }}" name="carga_horaria"
                    id="carga_horaria" class="form-control" x-model="carga_horaria" required min="1" />
            </div>

            <div class="col-12">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" x-model="descricao"
                    rows="4">{{ old('descricao', $curso->descricao) }}</textarea>
            </div>

            <div class="col-12 text-end">
                <button type="submit" class="btn btn-success">Atualizar</button>
                <a href="{{ route('cursos.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>