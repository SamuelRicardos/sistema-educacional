<!DOCTYPE html>
<html lang="pt-br" x-data="professorForm()" x-init="init()" >
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastrar Professor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
  <style>
    @media (max-width: 576px) {
      form > div {
        margin-bottom: 1rem;
      }
    }
  </style>
  <!-- Token CSRF para Laravel -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">Sistema Educacional</a>
  </div>
</nav>

<div class="container">
  <h1 class="mb-4">Cadastrar Professor</h1>

  <form @submit.prevent="submitForm" novalidate class="needs-validation" :class="{ 'was-validated': validated }">

    <div class="mb-3">
      <label for="nome" class="form-label">Nome do Professor</label>
      <input 
        type="text" 
        id="nome" 
        name="nome" 
        class="form-control" 
        x-model="nome" 
        placeholder="Digite o nome do professor" 
        required 
        :class="{'is-invalid': validated && !nome.trim()}"
      />
      <div class="invalid-feedback">Por favor, informe o nome do professor.</div>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email do Professor</label>
      <input 
        type="email" 
        id="email" 
        name="email" 
        class="form-control" 
        x-model="email" 
        placeholder="exemplo@email.com" 
        required
        :class="{'is-invalid': validated && !validEmail(email)}"
      />
      <div class="invalid-feedback">Por favor, informe um email válido.</div>
    </div>

    <div class="mb-3">
      <label for="cpf" class="form-label">CPF do Professor</label>
      <input 
        type="text" 
        id="cpf" 
        name="cpf" 
        class="form-control" 
        x-model="cpf" 
        placeholder="Digite o CPF (somente números)" 
        required 
        maxlength="11"
        :class="{'is-invalid': validated && !validCPF(cpf)}"
      />
      <div class="invalid-feedback">Por favor, informe um CPF válido (11 dígitos).</div>
    </div>

    <div class="mb-3">
      <label for="periodo" class="form-label">Período</label>
      <input 
        type="number" 
        id="periodo" 
        name="periodo" 
        class="form-control" 
        x-model="periodo" 
        placeholder="Digite o período (ex: Matutino, Vespertino)" 
        required
        :class="{'is-invalid': validated && !periodo.trim()}"
      />
      <div class="invalid-feedback">Por favor, informe o período.</div>
    </div>

    <div class="mb-3">
      <label for="curso" class="form-label">Curso</label>
      <input 
        type="text" 
        id="curso" 
        name="curso" 
        class="form-control" 
        x-model="curso" 
        placeholder="Digite o curso" 
        required
        :class="{'is-invalid': validated && !curso.trim()}"
      />
      <div class="invalid-feedback">Por favor, informe o curso.</div>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="/professores" class="btn btn-secondary ms-2">Cancelar</a>
  </form>
</div>

<script>
  function professorForm() {
    return {
      nome: '',
      email: '',
      cpf: '',
      periodo: '',
      curso: '',
      validated: false,

      init() {
        // pega o token CSRF do meta
        this.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      },

      validEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
      },

      validCPF(cpf) {
        return /^\d{11}$/.test(cpf);
      },

      async submitForm() {
        this.validated = true;

        if (
          this.nome.trim() &&
          this.validEmail(this.email) &&
          this.validCPF(this.cpf) &&
          this.periodo.trim() &&
          this.curso.trim()
        ) {
          // Monta o corpo da requisição
          const data = {
            nome: this.nome,
            email: this.email,
            cpf: this.cpf,
            periodo: this.periodo,
            curso: this.curso,
          };

          try {
            const response = await fetch('/professores', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': this.csrfToken,
              },
              body: JSON.stringify(data)
            });

            if (response.ok) {
              // Redireciona para a lista de professores
              window.location.href = '/professores';
            } else {
              const errorData = await response.json();
              alert('Erro ao cadastrar professor: ' + (errorData.message || 'Erro desconhecido'));
            }
          } catch (error) {
            alert('Erro na requisição: ' + error.message);
          }
        }
      }
    }
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
