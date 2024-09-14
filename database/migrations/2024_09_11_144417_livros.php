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
        Schema::create(table: 'livros', callback: function (Blueprint $table): void {
            $table->string(column: 'isbn', length: 13)->primary();
            $table->string(column: 'titulo', length: 255);
            $table->string(column: 'autor', length: 100);
            $table->enum(column: 'classificacao', allowed: ['infantil', 'juvenil', 'adulto']);
            $table->mediumText(column: 'sinopse');
            $table->mediumText(column: 'capa');
            $table->integer(column: 'estoque');
            $table->foreignId(column: 'genero_id')->constrained(table: 'generos')->onDelete(action: 'cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'livros');
    }
};
