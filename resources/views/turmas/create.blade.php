<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Adicionar Turma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js" defer></script>
</head>

<body class="bg-light" x-data="turmaForm()" x-init="init()">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Sistema Educacional</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4">Adicionar Nova Turma</h1>

        <form method="POST" action="{{ route('turmas.store') }}" class="bg-white p-4 rounded shadow-sm">
            @csrf
            <div class="mb-3">
                <label for="cod_turma" class="form-label">Código da Turma</label>
                <input type="text" id="cod_turma" name="cod_turma" x-model="form.cod_turma" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="curso" class="form-label">Curso</label>
                <select id="curso" name="curso" x-model="form.curso" class="form-select" required>
                    <option value="" disabled>Selecione o curso</option>
                    <option value="Informática">Informática</option>
                    <option value="Administração">Administração</option>
                    <option value="Enfermagem">Enfermagem</option>
                    <option value="Eletrotécnica">Eletrotécnica</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="periodo" class="form-label">Período</label>
                <input type="number" id="periodo" name="periodo" x-model.number="form.periodo" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="disciplina" class="form-label">Disciplina</label>
                <input type="text" id="disciplina" name="disciplina" x-model="form.disciplina" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="turno" class="form-label">Turno</label>
                <select id="turno" name="turno" x-model="form.turno" class="form-select" required>
                    <option value="" disabled>Selecione o turno</option>
                    <option value="Matutino">Matutino</option>
                    <option value="Vespertino">Vespertino</option>
                    <option value="Noturno">Noturno</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="professor" class="form-label">Professor</label>
                <select id="professor" name="professor_id" x-model="form.professor_id" class="form-select" required>
                    <option value="" disabled selected>Selecione o professor</option>
                    @foreach ($professores as $prof)
                        <option value="{{ $prof->id }}">{{ $prof->nome }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100" x-ref="submitBtn">Salvar Turma</button>
        </form>

        <!-- Alertas -->
        <template x-if="successMessage">
            <div class="alert alert-success mt-3" x-text="successMessage"></div>
        </template>

        <template x-if="errorMessage">
            <div class="alert alert-danger mt-3" x-text="errorMessage"></div>
        </template>
    </div>

    <script>
        function turmaForm() {
            return {
                form: {
                    cod_turma: '',
                    curso: '',
                    periodo: null,
                    disciplina: '',
                    turno: '',
                    professor_id: ''
                },
                professores: [],
                successMessage: '',
                errorMessage: '',

                init() {
                    fetch('/api/professores')
                        .then(res => {
                            if (!res.ok) throw new Error('Erro ao buscar professores');
                            return res.json();
                        })
                        .then(data => {
                            console.log('Professores recebidos:', data);
                            this.professores = data;
                        })
                        .catch(err => {
                            console.error('Erro no fetch:', err);
                            this.errorMessage = 'Erro ao carregar professores.';
                        });
                },

            };
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
