<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Permite a alteração dos dados abaixo
    protected $fillable = [
        'name',
        'email',
        'apelido',
        'telefone',
        'tipo',
        'avaliacao',
        'fotoPerfil',
        'password',
    ];

    // Declara que a senha e o token de autenticação são do tipo escondidos
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /* Define o que fazer para garantir a segurança da autenticação 
        - Verificação do email de tempos em tempos (token)
        - Hash na senha para gravar no Banco de Dados*/
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Define relacionamento múltiplo com a tabela "user_servico"
    public function user_servico(){
        return $this->hasMany(User_Servico::class);
    }

    // Define relacionamento múltiplo com a tabela "pedidos"
    public function pedido(){
        return $this->hasMany(Pedido::class);
    }
}
