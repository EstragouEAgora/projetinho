<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     /* Define quais as colunas da tabela user_servicos no Banco de dados 
            Define também os tipos de cada coluna;
            Como essa tabela é uma tabela intermediária, suas colunas são do tipo:
            Foreign -> chave estrangeira*/
    public function up(): void
    {
        Schema::create('user__servicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('servico_id');
            $table->foreign('servico_id')->references('id')->on('servicos');
            $table->timestamps();
        });
    }

    // Permite apagar a tabela user__servicos
    public function down(): void
    {
        Schema::dropIfExists('user__servicos');
    }
};
