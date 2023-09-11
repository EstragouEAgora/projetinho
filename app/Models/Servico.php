<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
    // Permite a alteração da descrição e do valor
    protected $fillable=['nomeServico','fotoServico'];

    // Define relacionamento múltiplo com a tabela "user_servico"
    public function user_servico(){
        return $this->hasMany(User_Servico::class);
    }

    // Define relacionamento múltiplo com a tabela "pedido"
    public function pedido(){
        return $this->hasMany(Pedido::class);
    }
}
