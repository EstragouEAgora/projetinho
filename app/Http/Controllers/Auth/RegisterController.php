<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    /* Método construtor que determina que todo usuário 
       ainda não autenticado se encontra como visitante */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /* Onde são definidas as regras de validação para 
        preencher a tabela users */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:60'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'apelido' => ['string', 'max:60'],
            'telefone' => ['required', 'string'],
            'tipo' => ['required', 'string'],
            'fotoPerfil' => ['string'],
            'password' => ['required', 'string', 'min:6', 'same:password_confirmation'],

        ]);
    }

    /* Preenche a tabela ('users') no banco de dados com os dados 
        validados e devidamente formatados*/
    protected function create(array $data) {
        $userData = [
            'name' => ucfirst($data['name']),
            'apelido' => ucfirst($data['name']),
            'email' => $data['email'],
            'telefone' => $data['telefone'],
            'tipo' => $data['tipo'],
            /*Todo usuário cadastrado recebe
              esse valor que será tratado posteriormente
              para ter o significado de "Ainda não avaliado" */
            'avaliacao' => 6,
            'fotoPerfil' => '',
            'password' => Hash::make($data['password']),
        ];

    
    return User::create($userData);
}

}
