<!DOCTYPE html>
<html lang="pt-br" x-data="professorForm()" x-init="init()">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Editar Professor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
  <style>
    @media (max-width: 576px) {
      form > div {
        margin-bottom: 1rem;
      }
    }
  </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">Sistema Educacional</a>
  </div>
</nav>

<div class="container">
  <h1 class="mb-4">Editar Professor</h1>

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul class="mb-0">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form method="POST" action="{{ route('professores.update', $professor->id) }}" class="needs-validation" novalidate @submit="handleSubmit">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="nome" class="form-label">Nome do Professor</label>
      <input 
        type="text" 
        id="nome" 
        name="nome" 
        class="form-control" 
        x-model="nome" 
        value="{{ old('nome', $professor->nome) }}" 
        required
      />
      <div class="invalid-feedback">Informe o nome.</div>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input 
        type="email" 
        id="email" 
        name="email" 
        class="form-control" 
        x-model="email" 
        value="{{ old('email', $professor->email) }}" 
        required
      />
      <div class="invalid-feedback">Informe um e-mail válido.</div>
    </div>

    <div class="mb-3">
      <label for="cpf" class="form-label">CPF</label>
      <input 
        type="text" 
        id="cpf" 
        name="cpf" 
        class="form-control" 
        x-model="cpf" 
        value="{{ old('cpf', $professor->cpf) }}" 
        maxlength="11" 
        required
      />
      <div class="invalid-feedback">CPF deve conter 11 números.</div>
    </div>

    <div class="mb-3">
      <label for="matricula" class="form-label">Matrícula</label>
      <input 
        type="text" 
        id="matricula" 
        name="matricula" 
        class="form-control" 
        x-model="matricula" 
        value="{{ old('matricula', $professor->matricula) }}" 
        required
      />
      <div class="invalid-feedback">Informe a matrícula.</div>
    </div>

    <button type="submit" class="btn btn-primary">Salvar alterações</button>
    <a href="{{ route('professores.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
  </form>
</div>

<script>
  function professorForm() {
    return {
      nome: '{{ old('nome', $professor->nome) }}',
      email: '{{ old('email', $professor->email) }}',
      cpf: '{{ old('cpf', $professor->cpf) }}',
      matricula: '{{ old('matricula', $professor->matricula) }}',

      init() {
        // apenas validação no submit com Bootstrap
      },

      handleSubmit(event) {
        const form = event.target;
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }
    }
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
