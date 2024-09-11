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
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_cpf')->constrained('users')->onDelete('cascade');
            $table->foreignId('livro_isbn')->constrained('livros')->onDelete('cascade');
            $table->date('data_emprestimo');
            $table->date('data_devolucao')->nullable();
            $table->enum('status', ['ativo', 'devolvido','atrasado']);
            $table->date('prazo_devolucao')->default(now()->addDays(30));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};
