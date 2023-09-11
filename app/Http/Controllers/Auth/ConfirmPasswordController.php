<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class ConfirmPasswordController extends Controller
{
    use ConfirmsPasswords;

    protected $redirectTo = RouteServiceProvider::HOME;

    /* Método construtor para conferir se a senha inserida 
        bate nos dois campos (cadastro) */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
