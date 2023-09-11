<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
     /* Define quais as colunas da tabela servicos no Banco de dados 
            Define também os tipos de cada coluna*/
    public function up(): void
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->string('nomeServico');
            $table->string('fotoServico');
            $table->timestamps();
        });
    }

    // Permite apagar a tabela servicos
    public function down(): void
    {
        Schema::dropIfExists('servicos');
    }
};
