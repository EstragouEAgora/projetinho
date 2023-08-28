<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
    protected $fillable=['nomeServico','fotoServico'];

    public function user_servico(){
        return $this->howMany(User_Servico::class);
    }

    public function pedido(){
        return $this->howMany(Pedido::class);
    }
}
