<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    /* Método construtor que confere se existem
        dados no banco de dados e permite logout */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
