<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('alunos.index') }}">Alunos</a>
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

    <div class="container" x-data="{
            nome: '{{ old('nome', $aluno->nome) }}',
            email: '{{ old('email', $aluno->email) }}',
            cpf: '{{ old('cpf', $aluno->cpf) }}',
            matricula: '{{ old('matricula', $aluno->matricula) }}',
            periodo: '{{ old('periodo', $aluno->periodo) }}',
            curso: '{{ old('curso', $aluno->curso) }}',
            turno: '{{ old('turno', $aluno->turno) }}',
            status: '{{ old('status', $aluno->status) }}'
         }">
        <h1 class="mb-4">Editar Aluno</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('alunos.update', $aluno->id) }}" class="row g-3"
            @submit.prevent="$refs.submitBtn.disabled = true; $el.submit();">
            @csrf
            @method('PUT')

            <div class="col-md-6">
                <input type="text" name="nome" class="form-control" placeholder="Nome"
                    value="{{ old('nome', $aluno->nome) }}" required />
            </div>

            <div class="col-md-6">
                <input type="email" name="email" class="form-control" placeholder="Email"
                    value="{{ old('email', $aluno->email) }}" required />
            </div>

            <div class="col-md-6">
                <input type="text" maxlength="11" name="cpf" class="form-control" placeholder="CPF (somente números)"
                    value="{{ old('cpf', $aluno->cpf) }}" required />
            </div>

            <div class="col-md-6">
                <input type="text" name="matricula" class="form-control" placeholder="Matrícula"
                    value="{{ old('matricula', $aluno->matricula) }}" required />
            </div>

            <div class="col-md-6">
                <input type="text" name="periodo" class="form-control" placeholder="Período"
                    value="{{ old('periodo', $aluno->periodo) }}" required />
            </div>

            <div class="col-md-6">
                <select name="curso" class="form-select" required>
                    <option value="" {{ old('curso', $aluno->curso) == '' ? 'selected' : '' }}>Selecione o curso</option>
                    <option value="Informática" {{ old('curso', $aluno->curso) == 'Informática' ? 'selected' : '' }}>
                        Informática</option>
                    <option value="Administração" {{ old('curso', $aluno->curso) == 'Administração' ? 'selected' : '' }}>
                        Administração</option>
                    <option value="Enfermagem" {{ old('curso', $aluno->curso) == 'Enfermagem' ? 'selected' : '' }}>
                        Enfermagem</option>
                    <option value="Eletrotécnica" {{ old('curso', $aluno->curso) == 'Eletrotécnica' ? 'selected' : '' }}>
                        Eletrotécnica</option>
                </select>
            </div>

            <div class="col-md-6">
                <select name="turno" class="form-select" required>
                    <option value="" {{ old('turno', $aluno->turno) == '' ? 'selected' : '' }}>Selecione o turno</option>
                    <option value="Matutino" {{ old('turno', $aluno->turno) == 'Matutino' ? 'selected' : '' }}>Matutino
                    </option>
                    <option value="Vespertino" {{ old('turno', $aluno->turno) == 'Vespertino' ? 'selected' : '' }}>
                        Vespertino</option>
                    <option value="Noturno" {{ old('turno', $aluno->turno) == 'Noturno' ? 'selected' : '' }}>Noturno
                    </option>
                </select>
            </div>

            <div class="col-md-6">
                <select name="status" class="form-select" required>
                    <option value="ativo" {{ old('status', $aluno->status) == 'ativo' ? 'selected' : '' }}>Ativo</option>
                    <option value="inativo" {{ old('status', $aluno->status) == 'inativo' ? 'selected' : '' }}>Inativo
                    </option>
                </select>
            </div>

            <div class="col-12 text-end">
                <button type="submit" class="btn btn-success" x-ref="submitBtn">Atualizar</button>
                <a href="{{ route('alunos.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>