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
        Schema::create('penalties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained('loans')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->char('user_cpf', length: 11);
            $table->timestamps();

            $table->foreign('user_cpf')->references('cpf')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penalties', function (Blueprint $table) {
            $table->dropForeign(['user_cpf']);
        });

        Schema::dropIfExists('penalties');
    }
};
