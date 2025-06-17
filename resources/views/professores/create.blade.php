<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastrar Professor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
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
  <h1 class="mb-4">Cadastrar Professor</h1>

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul class="mb-0">
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <form method="POST" action="{{ route('professores.store') }}" class="needs-validation" novalidate>
    @csrf

    <div class="mb-3">
      <label for="nome" class="form-label">Nome do Professor</label>
      <input 
        type="text" 
        id="nome" 
        name="nome" 
        class="form-control @error('nome') is-invalid @enderror" 
        value="{{ old('nome') }}" 
        required
      />
      <div class="invalid-feedback">Por favor, informe o nome do professor.</div>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email do Professor</label>
      <input 
        type="email" 
        id="email" 
        name="email" 
        class="form-control @error('email') is-invalid @enderror" 
        value="{{ old('email') }}" 
        required
      />
      <div class="invalid-feedback">Por favor, informe um e-mail válido.</div>
    </div>

    <div class="mb-3">
      <label for="cpf" class="form-label">CPF do Professor</label>
      <input 
        type="text" 
        id="cpf" 
        name="cpf" 
        class="form-control @error('cpf') is-invalid @enderror" 
        value="{{ old('cpf') }}" 
        maxlength="11" 
        required
      />
      <div class="invalid-feedback">Por favor, informe um CPF válido com 11 dígitos.</div>
    </div>

    <div class="mb-3">
      <label for="matricula" class="form-label">Matrícula</label>
      <input 
        type="text" 
        id="matricula" 
        name="matricula" 
        class="form-control @error('matricula') is-invalid @enderror" 
        value="{{ old('matricula') }}" 
        required
      />
      <div class="invalid-feedback">Por favor, informe a matrícula.</div>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="{{ route('professores.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
  </form>
</div>

<script>
  (() => {
    'use strict';
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  })();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
