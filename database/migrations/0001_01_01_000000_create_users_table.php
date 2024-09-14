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
        Schema::create(table: 'usuarios', callback: function (Blueprint $table) {
            $table->char(column: 'cpf', length: 11)->primary();
            $table->string(column: 'nome', length: 100);
            $table->string(column: 'email', length: 100)->unique();
            $table->date(column: 'data_nascimento');
            $table->char(column: 'senha', length: 64);
            $table->enum(column: 'tipo_usuario', allowed: ['infantil', 'juvenil', 'adulto', 'admin']);
            $table->char(column: 'responsavel_cpf', length: 11)->nullable();
            $table->timestamps();

            $table->foreign(columns: 'responsavel_cpf')->references(columns: 'cpf')->on(table: 'usuarios')->onDelete(action: 'set null');
        });

        Schema::create(table: 'sessions', callback: function (Blueprint $table) {
            $table->string(column: 'id')->primary();
            $table->foreignId(column: 'user_id')->nullable()->index();
            $table->string(column: 'ip_address', length: 45)->nullable();
            $table->text(column: 'user_agent')->nullable();
            $table->longText(column: 'payload');
            $table->integer(column: 'last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(table: 'usuarios', callback: function (Blueprint $table) {

            $table->dropForeign(index: ['responsavel_cpf']);
        });

        Schema::dropIfExists(table: 'usuarios');
        Schema::dropIfExists(table: 'sessions');
    }
};
