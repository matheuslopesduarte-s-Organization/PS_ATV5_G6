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
        Schema::create('loans', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->date('loan_date')->nullable();
            $table->date('return_date')->nullable();
            $table->enum('status', ['active', 'returned', 'overdue', 'ready']);
            $table->date('return_deadline')->nullable();
            $table->char('users_cpf', length: 11);
            $table->string('book_isbn', 13);
            $table->timestamps();

            $table->foreign('book_isbn')->references('isbn')->on('books')->onDelete('cascade');
            $table->foreign('users_cpf')->references('cpf')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loans', function (Blueprint $table) {
            $table->dropForeign(['book_isbn']);
            $table->dropForeign(['f']);
        });

        Schema::dropIfExists('loans');
    }
};
