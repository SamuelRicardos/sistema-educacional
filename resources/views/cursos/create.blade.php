<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastrar Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
</head>

<body class="bg-light">
    <div class="container py-4" x-data="{ nome: '', descricao: '', carga_horaria: '' }">
        <h1 class="mb-4">Cadastrar Curso</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('cursos.store') }}" class="row g-3" @submit.prevent="$el.submit()">
            @csrf
            <div class="col-md-6">
                <input type="text" name="nome" placeholder="Nome do Curso" class="form-control" x-model="nome" required />
            </div>

            <div class="col-md-6">
                <input type="number" name="carga_horaria" placeholder="Carga Horária (em horas)" class="form-control" x-model="carga_horaria" required min="1" />
            </div>

            <div class="col-12">
                <textarea name="descricao" placeholder="Descrição do Curso" class="form-control" x-model="descricao" rows="4"></textarea>
            </div>

            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary" :disabled="!nome || !carga_horaria">Cadastrar Curso</button>
                <a href="{{ route('cursos.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
