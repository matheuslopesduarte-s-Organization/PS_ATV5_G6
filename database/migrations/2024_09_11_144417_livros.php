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
        Schema::create('livros', function (Blueprint $table) {
            $table->string('isbn', 13)->primary();
            $table->string('titulo', 255);
            $table->string('autor', 100);
            $table->enum('classificacao', ['infantil', 'juvenil', 'adulto']);
            $table->mediumText('sinopse');
            $table->mediumText('capa');
            $table->integer('estoque');
            $table->foreignId('genero_id')->constrained('generos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
