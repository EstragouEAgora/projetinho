<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /* Depois de entrar no campo de "Esqueci minha senha" 
        Ele permite a alteração de senha */

    use ResetsPasswords;

    protected $redirectTo = RouteServiceProvider::HOME;
}
