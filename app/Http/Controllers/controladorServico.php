<?php

namespace App\Http\Controllers;
use App\Models\Servico;
use App\Models\User_Servico;

use Illuminate\Http\Request;

class controladorServico extends Controller
{

    /* Método que direciona para a página 
        em que será criado um novo serviço */
    public function create()
    {
        return view('sistema.servico.novoServico');
    }

    /* Grava o novo serviço no banco de dados
        Na parte da foto, ele grava apenas o caminho (url) */
    public function store(Request $request)
    {    
        $path = $request->file('fotoServico')->store('imagens', 'public');
        $dados = new Servico() ;
        $dados-> nomeServico = $request-> input('nomeServico');
        $dados-> fotoServico = $path;
        $dados -> save();
        $todos = Servico::all();
        return redirect('sistema.dashboard.dashboardAdm', compact('todos'))->with('success', 'Novo servico cadastrado com sucesso!');
    }

 
    /* Envia para o formulário de edição do serviço */
    public function edit(string $id)
    {
        $dados = Servico::find($id);
        if(isset($dados)){
            return view('sistema.servico.editServico', compact($dados));
        } else {
            return redirect('sistema.dashboard.dashboardAdm')->with('danger', 'Não será possível editar o serviço!');
        }
    }

    /* Atualiza o serviço no Banco de Dados */
    public function update(Request $request)
    {
        $dados = Servico::find($id);
        if(isset($dados)){
            $dados -> nomeServico = $request -> input ('nomeServico');
            $arquivo = $request->file('fotoServico');
            if(isset($arquivo)){
                $nomeArquivo = 'imagens/'.date('YmdHi').$arquivo->getClientOriginalName();
                $arquivo-> move(public_path('storage/imagens'), $nomeArquivo);
                $dados->fotoServico = $nomeArquivo;
            }
            $dados->save();
            return redirect('sistema.dashboard.dashboardAdm')->with('success', 'Serviço alterado com sucesso');
        }else{
            return redirect('sistema.dashboard.dashboardAdm')->with('danger', 'Erro ao editar o serviço');
        }
    }

    /* Permite apagar um serviço */
    public function destroy(string $id)
    {
        $dados = Servico::find($id);
        if(isset($dados)){
            $fotoServico = $dados->fotoServico;    
            Storage::disk('public')->delete($fotoServico);
            $dados->delete();
            return redirect('sistema.dashboard.dashboardAdm')->with('success', 'Serviço deletado com sucesso');
        }else{
            return redirect('sistema.dashboard.dashboardAdm')->with('danger', 'Não deu pra apagar, não tem esse serviço cadastrado!!');
        }
    }
}