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
            return view('sistema.dashboardClient');
        }   
        if(Auth::user() -> tipo =='2'){
            return view('sistema.dashboardPrestador');
        }
        if(Auth::user() -> tipo =='3'){
            return view('sistema.dashboardAdm');
        }
        
    }

    public function pedidoPersonalizado($servico_id)
    {
        $dados = Servico::find($servico_id);
        return view('sistema.pedido',compact($dados));       
        
    }
}
