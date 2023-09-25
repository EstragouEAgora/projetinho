<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;
use App\Models\Servico;
use App\Models\User_Servico;

class HomeController extends Controller
{
    /* Executa o método de autenticação para acessar o sistema completo*/
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* Identifica o tipo de usuário que fez login 
        E direciona para seu devido dashboard */
    public function index()
    {
        if(Auth::user() -> tipo =='1'){
            $todos = Servico::all();
            return view('sistema.dashboard.dashboardClient', compact('todos'));
        } elseif (Auth::user() -> tipo =='2'){
            $servicos = User_Servico::where('user_id', Auth::User()->id)->get();
            return view('sistema.dashboard.dashboardPrestador', compact('servicos'));
        } elseif (Auth::user() -> tipo =='3'){
            $todos = Servico::all();
            return view('sistema.dashboard.dashboardAdm', compact('todos'));
        }
        
    }

}
