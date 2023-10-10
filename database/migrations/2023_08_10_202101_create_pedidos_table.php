<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /* Define quais as colunas da tabela pedidos no Banco de dados 
        Define também os tipos de cada coluna*/
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('servico_id');
            $table->foreign('servico_id')->references('id')->on('servicos');
            $table->string('descricaoPedido');
            $table->string('endereco');
            $table->string('fotoPedido');
            $table->float('valorPedido');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    // Permite apagar a tabela pedidos
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};