<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Servico extends Model
{
    use HasFactory;

    // Define relacionamento de dependência com a tabela "users"
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Define relacionamento de dependência com a tabela "servicos"
    public function servico(){
        return $this->belongsTo(Servico::class);
    }
}
