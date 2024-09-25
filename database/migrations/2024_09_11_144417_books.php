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
        Schema::create(table: 'books', callback: function (Blueprint $table): void {
            $table->string(column: 'isbn', length: 13)->primary();
            $table->string(column: 'title', length: 255);
            $table->string(column: 'author', length: 100);
            $table->enum(column: 'classification', allowed: ['children', 'teen', 'adult']);
            $table->mediumText(column: 'synopsis');
            $table->mediumText(column: 'cover');
            $table->integer(column: 'stock');
            $table->foreignId(column: 'genre_id')->constrained(table: 'genres')->onDelete(action: 'cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'books');
    }
};
