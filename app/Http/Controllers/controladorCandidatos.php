<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidatos;
use App\Models\Pedido;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class controladorCandidatos extends Controller
{

    /* Método que adiciona o prestador de serviço 
        na lista de candidatos de determinado pedido */
    public function store(Request $request, $pedido_id)
    {
        $dados = Candidatos::where('pedido_id', $pedido_id);
        $dados->user_id = Auth::User()->id;
        $dados->novoValor = $request->input('novoValor');
        $dados->status = 0;
        $dados->save();
        return redirect();
        
    }

    /* Método que direciona para a página de candidatos do cliente
        Ele envia um array contendo os candidatos para determinado pedido */
    public function show($pedido_id)
    {
        $candidatos = Candidatos::where('pedido_id', $pedido_id);
        return view('sistema.pedido.candidatosLista', compact('candidatos'));
    }

    /* Apaga a lista de candidatos e redireciona para
        o perfil do prestador de serviço escolhido */
    public function destroy(string $id)
    {
        $lista = Candidatos::find($id);
        if(isset($lista)){
            $lista->delete();
            return redirect('');
        }
        
    }
}
