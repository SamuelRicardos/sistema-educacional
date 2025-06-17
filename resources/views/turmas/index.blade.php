<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Lista de Turmas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand" href="#">Sistema Educacional</a>
  </div>
</nav>

<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Turmas Cadastradas</h1>
    <a href="{{ route('turmas.create') }}" class="btn btn-success">+ Nova Turma</a>
  </div>

  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  @if ($turmas->isEmpty())
    <div class="alert alert-warning">Nenhuma turma cadastrada.</div>
  @else
    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle">
        <thead class="table-primary">
          <tr>
            <th>Código</th>
            <th>Curso</th>
            <th>Período</th>
            <th>Disciplina</th>
            <th>Turno</th>
            <th>Professor</th>
            <th>Alunos</th>
            <th class="text-center">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($turmas as $turma)
            <tr>
              <td>{{ $turma->cod_turma }}</td>
              <td>{{ $turma->curso }}</td>
              <td>{{ $turma->periodo }}</td>
              <td>{{ $turma->disciplina }}</td>
              <td>{{ $turma->turno }}</td>
              <td>{{ $turma->professor ? $turma->professor->nome : '—' }}</td>
              <td>{{ $turma->alunos->count() }}</td>
              <td class="text-center">
                <a href="{{ route('turmas.edit', $turma->id) }}" class="btn btn-sm btn-warning" title="Editar">
                  <i class="bi bi-pencil-fill"></i>
                </a>
                <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Deseja excluir esta turma?')">
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
    </div>
  @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.js"></script>
</body>
</html>
