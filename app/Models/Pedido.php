<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable=['descricaoPedido','valorPedido'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function servico(){
        return $this->belongsTo(Servico::class);
    }
}
