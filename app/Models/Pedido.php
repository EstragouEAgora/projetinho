<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    // Permite a alteração da descrição e do valor
    protected $fillable=['descricaoPedido','fotoPedido','valorPedido','status'];

    // Define relacionamento de dependência com a tabela "users"
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Define relacionamento de dependência com a tabela "servicos"
    public function servico(){
        return $this->belongsTo(Servico::class);
    }
}
