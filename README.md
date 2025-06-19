<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# 🎓 Sistema de Gestão Educacional

Sistema completo de gerenciamento de **turmas, professores e alunos**, desenvolvido com **Laravel 12** no back-end e **Bootstrap 5 + Alpine.js** no front-end. A aplicação permite o cadastro, edição e listagem dinâmica de dados escolares, com integração direta com banco de dados MySQL.

## 🚀 Funcionalidades

- Cadastro de professores, turmas e alunos.
- Associação de alunos a turmas (many-to-many).
- Associação de professores a turmas (many-to-one).
- Interface amigável e responsiva.
- Interações dinâmicas com Alpine.js.
- Validação de dados no Laravel.
- Gerenciamento via painel web.

## 🧰 Tecnologias Utilizadas

- **PHP** (Laravel 12)
- **MySQL**
- **Bootstrap 5**
- **Alpine.js**
- **Blade (Laravel Views)**
- **Git + GitHub**

## 🗂️ Estrutura de Rotas

### Professores

| Método | Rota                | Descrição                        |
|--------|---------------------|----------------------------------|
| GET    | `/professores`      | Listar todos os professores      |
| GET    | `/professores/create` | Formulário de novo professor     |
| POST   | `/professores`      | Armazenar novo professor         |
| GET    | `/professores/{id}/edit` | Editar professor existente    |
| PUT    | `/professores/{id}` | Atualizar professor              |
| DELETE | `/professores/{id}` | Remover professor                |

### Alunos

| Método | Rota                | Descrição                        |
|--------|---------------------|----------------------------------|
| GET    | `/alunos`           | Listar todos os alunos           |
| GET    | `/alunos/create`    | Formulário de novo aluno         |
| POST   | `/alunos`           | Armazenar novo aluno             |
| GET    | `/alunos/{id}/edit` | Editar aluno existente           |
| PUT    | `/alunos/{id}`      | Atualizar aluno                  |
| DELETE | `/alunos/{id}`      | Remover aluno                    |

### Turmas

| Método | Rota                   | Descrição                          |
|--------|------------------------|------------------------------------|
| GET    | `/turmas`              | Listar todas as turmas             |
| GET    | `/turmas/create`       | Formulário de nova turma           |
| POST   | `/turmas`              | Armazenar nova turma               |
| GET    | `/turmas/{id}/edit`    | Editar turma existente             |
| PUT    | `/turmas/{id}`         | Atualizar turma                    |
| DELETE | `/turmas/{id}`         | Remover turma                      |

> 💡 **Observação**: As rotas estão definidas no `web.php` utilizando o resource controller (`Route::resource()`).

## ⚙️ Como executar

1. Clone o repositório:
   ```bash
   git clone https://github.com/SamuelRicardos/sistema-educacional.git

