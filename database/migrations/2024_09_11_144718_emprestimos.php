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
            $table->date('data_emprestimo');
            $table->date('data_devolucao')->nullable();
            $table->enum('status', ['ativo', 'devolvido','atrasado']);
            $table->date('prazo_devolucao')->default(now()->addDays(30));
            $table->char('usuario_cpf', length: 11);
            $table->string('livro_isbn', 13);
            $table->timestamps();
            

            $table->foreign('livro_isbn')->references('isbn')->on('livros')->onDelete('cascade');
            $table->foreign('usuario_cpf')->references('cpf')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(table: 'emprestimos', callback: function (Blueprint $table) {

            $table->dropForeign(index: ['livro_isbn']);
            $table->dropForeign(index: ['usuario_cpf']);
        });

        Schema::dropIfExists('emprestimos');
    }
};
