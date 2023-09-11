<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidatos extends Model
{
    use HasFactory;

    // Define relacionamento de dependência com a tabela "users"
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Define relacionamento de dependência com a tabela "pedido"
    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }
}
