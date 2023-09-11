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
        /* Define quais as colunas da tabela users no Banco de dados 
            Define também os tipos de cada coluna*/
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('apelido');
            $table->string('email')->unique();
            $table->string('telefone');
            $table->integer('tipo');
            $table->integer('avaliacao');
            $table->string('fotoPerfil');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    // Permite apagar a tabela users
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

