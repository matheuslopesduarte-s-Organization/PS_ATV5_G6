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
        Schema::create('penalidades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emprestimo_id')->constrained('emprestimos')->onDelete('cascade');
            $table->date('data_inicio');
            $table->date('data_final');
            $table->char('usuario_cpf', length: 11);
            $table->timestamps();

            $table->foreign('usuario_cpf')->references('cpf')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(table: 'penalidades', callback: function (Blueprint $table) {

            $table->dropForeign(index: ['usuario_cpf']);
        });


        Schema::dropIfExists('penalidades');
    }
};
