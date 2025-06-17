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

        <form @submit.prevent="submitForm" class="bg-white p-4 rounded shadow-sm">
            <div class="mb-3">
                <label for="cod_turma" class="form-label">Código da Turma</label>
                <input type="text" id="cod_turma" x-model="form.cod_turma" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="curso" class="form-label">Curso</label>
                <select id="curso" x-model="form.curso" class="form-select" required>
                    <option value="" disabled>Selecione o curso</option>
                    <option value="Informática">Informática</option>
                    <option value="Administração">Administração</option>
                    <option value="Enfermagem">Enfermagem</option>
                    <option value="Eletrotécnica">Eletrotécnica</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="periodo" class="form-label">Período</label>
                <input type="number" id="periodo" x-model.number="form.periodo" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="disciplina" class="form-label">Disciplina</label>
                <input type="text" id="disciplina" x-model="form.disciplina" class="form-control" required />
            </div>

            <div class="mb-3">
                <label for="turno" class="form-label">Turno</label>
                <select id="turno" x-model="form.turno" class="form-select" required>
                    <option value="" disabled>Selecione o turno</option>
                    <option value="Matutino">Matutino</option>
                    <option value="Vespertino">Vespertino</option>
                    <option value="Noturno">Noturno</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="professor" class="form-label">Professor</label>
                <select id="professor" x-model="form.professor_id" class="form-select" required>
                    <option value="Selecione um professor" disabled>Selecione o professor</option>
                    <template x-for="prof in professores" :key="prof.id">
                        <option :value="prof.id" x-text="prof.nome"></option>
                    </template>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Salvar Turma</button>
        </form>

        <!-- Debug visual -->
        <pre class="mt-3 bg-light p-3 border rounded" x-text="JSON.stringify(form, null, 1)"></pre>

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
                    professor_id: []  // <- agora é array para multiselect
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

                submitForm() {
                    this.successMessage = '';
                    this.errorMessage = '';

                    if (this.form.periodo < 1 || this.form.periodo > 6) {
                        this.errorMessage = 'O período deve ser entre 1 e 6.';
                        return;
                    }

                    if (!this.form.professor_id.length) {
                        this.errorMessage = 'Selecione pelo menos um professor.';
                        return;
                    }

                    fetch('/turmas', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(this.form)
                    })
                        .then(res => {
                            if (!res.ok) return res.json().then(data => { throw new Error(data.message || 'Erro ao salvar'); });
                            return res.json();
                        })
                        .then(() => {
                            this.successMessage = 'Turma criada com sucesso!';
                            this.form = { cod_turma: '', curso: '', periodo: null, disciplina: '', turno: '', professor_id: [] };
                        })
                        .catch(err => {
                            this.errorMessage = err.message;
                        });
                }
            };
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>