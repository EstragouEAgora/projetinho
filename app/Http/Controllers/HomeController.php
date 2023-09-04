<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pedido;
use App\Models\Servico;

class HomeController extends Controller
{
    // Executa o método de autenticação para que o sistema possa ser acessado...
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Identifica o tipo de usuário e direciona para seu devido dashboard.
    public function index()
    {
        if(Auth::user() -> tipo =='1'){
            return view('sistema.dashboard.dashboardClient');
        }   
        if(Auth::user() -> tipo =='2'){
            return view('sistema.dashboard.dashboardPrestador');
        }
        if(Auth::user() -> tipo =='3'){
            return view('sistema.dashboard.dashboardAdm');
        }
        
    }

    public function avaliacao()
    {
        $tudo = Auth::all();
        foreach ($tudo as $item){
            if ($item-> tipo == '2'){
                $dados = $item;
            }
        }
        return view('sistema.avaliacao.avaliacaoCliente', compact('dados'));
    }


}
