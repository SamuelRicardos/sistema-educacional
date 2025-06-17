<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->string('cod_turma')->unique();
            $table->enum('curso', ['Informática', 'Administração', 'Enfermagem', 'Eletrotécnica']);
            $table->enum('periodo', ['MATUTINO', 'VESPERTINO', 'NOTURNO']);
            $table->string('disciplina');
            $table->string('turno');
            $table->foreignId('professor_id')->constrained('professores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turmas');
    }
};
