<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestão de Cursos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        .tabela-wrapper {
            overflow-x: auto;
        }

        @media (min-width: 768px) {
            .descricao-coluna {
                max-width: 400px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }

        @media (max-width: 767.98px) {
            .descricao-coluna {
                max-width: 400px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
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

    <div class="container">

        <h1 class="mb-4">Lista de Cursos</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('cursos.create') }}" class="btn btn-primary mb-3">Adicionar curso</a>

        <div class="tabela-wrapper">
            @if($cursos->count())
                <table class="table table-striped table-hover align-middle border">
                    <thead class="table-primary">
                        <tr>
                            <th class="border-end">Nome do curso</th>
                            <th class="border-end text-center">Carga Horária</th>
                            <th class="border-end">Descrição</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cursos as $curso)
                            <tr>
                                <td class="border-end">{{ $curso->nome }}</td>
                                <td class="border-end text-center">{{ $curso->carga_horaria }}h</td>
                                <td class="border-end descricao-coluna">{{ $curso->descricao }}</td>
                                <td class="border-end text-end">
                                    <div class="d-flex flex-wrap flex-md-nowrap justify-content-end gap-2">
                                        <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-sm btn-warning"
                                            title="Editar">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <form method="POST" action="{{ route('cursos.destroy', $curso->id) }}"
                                            onsubmit="return confirm('Confirmar exclusão?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Excluir">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-warning">Nenhum curso cadastrado ainda.</div>
            @endif
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>