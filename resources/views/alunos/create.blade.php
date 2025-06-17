<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    nome: '', email: '', cpf: '', matricula: '',
    periodo: '', curso: '', turno: '', status: 'ativo'
}">
    <h1 class="mb-4 text-center text-md-start">Cadastro de Alunos</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('alunos.store') }}" class="row g-3 mb-4"
          @submit.prevent="$refs.submitBtn.disabled = true; $el.submit();">
        @csrf
        <div class="col-md-6">
            <input type="text" name="nome" class="form-control" placeholder="Nome" x-model="nome" required>
        </div>
        <div class="col-md-6">
            <input type="email" name="email" class="form-control" placeholder="Email" x-model="email" required>
        </div>
        <div class="col-md-6">
            <input type="text" name="cpf" class="form-control" placeholder="CPF (somente números)" maxlength="11" x-model="cpf" required>
        </div>
        <div class="col-md-6">
            <input type="text" name="matricula" class="form-control" placeholder="Matrícula" x-model="matricula" required>
        </div>
        <div class="col-md-6">
            <input type="text" name="periodo" class="form-control" placeholder="Período" x-model="periodo" required>
        </div>
        <div class="col-md-6">
            <select name="curso" class="form-select" x-model="curso" required>
                <option value="">Selecione o curso</option>
                <option value="Informática">Informática</option>
                <option value="Administração">Administração</option>
                <option value="Enfermagem">Enfermagem</option>
                <option value="Eletrotécnica">Eletrotécnica</option>
            </select>
        </div>
        <div class="col-md-6">
            <select name="turno" class="form-select" x-model="turno" required>
                <option value="">Selecione o turno</option>
                <option value="Matutino">Matutino</option>
                <option value="Vespertino">Vespertino</option>
                <option value="Noturno">Noturno</option>
            </select>
        </div>
        <div class="col-md-6">
            <select name="status" class="form-select" x-model="status" required>
                <option value="ativo">Ativo</option>
                <option value="inativo">Inativo</option>
            </select>
        </div>
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary" x-ref="submitBtn">Adicionar Aluno</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
