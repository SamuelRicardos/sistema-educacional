<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Turma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js" defer></script>
</head>

<body class="bg-light" x-data="editTurmaForm()" x-init="init()">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Sistema Educacional</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4">Editar Turma</h1>

        <form method="POST" action="{{ route('turmas.update', $turma->id) }}"
            @submit.prevent="$refs.submitBtn.disabled = true; $el.submit();" class="bg-white p-4 rounded shadow-sm">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="cod_turma" class="form-label">Código da Turma</label>
                <input type="text" id="cod_turma" name="cod_turma" x-model="form.cod_turma" class="form-control"
                    required />
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
                <input type="string" id="periodo" name="periodo" x-model="form.periodo" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="disciplina" class="form-label">Disciplina</label>
                <input type="text" id="disciplina" name="disciplina" x-model="form.disciplina" class="form-control"
                    required />
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
                    <option value="" disabled>Selecione o professor</option>
                    <template x-for="prof in professores" :key="prof.id">
                        <option :value="prof.id" x-text="prof.nome"></option>
                    </template>
                </select>
            </div>

            <div class="mb-3">
                <label for="alunos" class="form-label">Alunos</label>
                <select id="alunos" name="alunos[]" multiple x-model="form.alunos" class="form-select" size="6">
                    <template x-for="aluno in alunos" :key="aluno.id">
                        <option :value="aluno.id" x-text="aluno.nome"></option>
                    </template>
                </select>
                <small class="form-text text-muted">Segure Ctrl (Windows) ou Cmd (Mac) para selecionar múltiplos
                    alunos.</small>
            </div>

            <button type="submit" class="btn btn-primary w-100" x-ref="submitBtn">
                <i class="bi bi-save me-2"></i> Salvar Alterações
            </button>
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
        function editTurmaForm() {
            return {
                form: {
                    cod_turma: @json($turma->cod_turma),
                    curso: @json($turma->curso),
                    periodo: @json($turma->periodo),
                    disciplina: @json($turma->disciplina),
                    turno: @json($turma->turno),
                    professor_id: @json($turma->professor_id),
                    alunos: @json($turma->alunos->pluck('id')),
                },
                professores: @json($professores),
                alunos: @json($alunos),
                successMessage: '',
                errorMessage: '',

                init() {
                }
            };
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>