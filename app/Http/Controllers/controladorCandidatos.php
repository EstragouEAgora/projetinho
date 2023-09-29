<?php

namespace App\Http\Controllers;

use App\Models\Candidatos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class controladorCandidatos extends Controller
{

    /* Método que adiciona o prestador de serviço
    na lista de candidatos de determinado pedido */
    public function store(Request $request, $pedido_id)
    {
        $candidatos = Candidatos::where('pedido_id', '=', $pedido_id)->get();
        $tem = false;
        foreach ($candidatos as $item) {
            if ($item->user_id == Auth::User()->id) {
                $tem = true;
                break;
            }
        }
        if ($tem != true) {
            $dados = new Candidatos();
            $dados->user_id = Auth::User()->id;
            $dados->pedido_id = $pedido_id;
            $valor = str_replace(',', '.', preg_replace('/[^0-9,]/', '', $request->input('novoValor')));
            $valor = (double) $valor;
            $dados->novoValor = $valor;
            $dados->status = 0;
            $dados->save();
            return redirect('/dashboard/pedidos')->with('success', 'Você se candidatou com sucesso!');
        } else {
            return redirect('/dashboard/pedidos')->with('danger', 'Você já se candidatou para esse pedido!');
        }

    }

    /* Método que direciona para a página de candidatos do cliente
    Ele envia um array contendo os candidatos para determinado pedido */
    public function show($pedido_id)
    {
        $candidatos = Candidatos::where('pedido_id', '=', $pedido_id)
            ->join('users', 'candidatos.user_id', '=', 'users.id')
            ->get();

        foreach ($candidatos as $item) {
            if ($item->avaliacao == 6) {
                $item->avaliacao = 0;
            }
        }
        $candidatos = $candidatos->sortByDesc('avaliacao');
        
        return view('sistema.pedido.candidatosLista', compact('candidatos'));
    }

    /* Apaga a lista de candidatos e redireciona para
    o perfil do prestador de serviço escolhido */
    public function destroy(string $id)
    {
        $lista = Candidatos::find($id);
        if (isset($lista)) {
            $lista->delete();
            return redirect('');
        }

    }
}
