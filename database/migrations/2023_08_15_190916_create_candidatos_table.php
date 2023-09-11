<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     /* Define quais as colunas da tabela candidatos no Banco de dados 
            Define também os tipos de cada coluna
            Como essa tabela possui id de outras tabelas, suas colunas são do tipo:
            Foreign -> chave estrangeira*/
    public function up(): void
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('pedido_id');
            $table->foreign('pedido_id')->references('id')->on('pedidos');
            $table->integer('novoValor');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    // Permite apagar a tabela candidatos
    public function down(): void
    {
        Schema::dropIfExists('candidatos');
    }
};
