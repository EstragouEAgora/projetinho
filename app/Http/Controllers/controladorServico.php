<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
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
        $path = $request->file('arquivo')->store('imagens', 'public');
        $dados = new Servico();
        $dados-> nomeServico = $request-> input('nomeServico');
        $dados->fotoServico = $path;
        $dados -> save();
        $todos = Servico::all();
        return view('sistema.dashboard.dashboardAdm',compact('todos'))->with('success', 'Novo servico cadastrado com sucesso!');
    }

 
    /* Envia para o formulário de edição do serviço */
    public function edit(string $id)
    {
        $value = Servico::find($id);
        if(isset($value)){
            $item = Servico::select('id','nomeServico')
                            ->from('servicos')
                            ->where('id', '=', $id)->get();
            $dados = array();
            $dados['id'] = $item[0]->id;
            $dados['nomeServico'] = $item[0]->nomeServico;
            return view('sistema.servico.editServico', compact('dados'));
        } else {
            $todos = Servico::all();
            return view('sistema.dashboard.dashboardAdm', compact('todos'))->with('danger', 'Não será possível editar o serviço!');
        }
    }

    /* Atualiza o serviço no Banco de Dados */
    public function update(Request $request, $id)
    {
        $dados = Servico::find($id);
        if(isset($dados)){
            $dados -> nomeServico = $request->input('nomeServico');
            $arquivo = $request->file('fotoServico');
            if(isset($arquivo)){
                $nomeArquivo = 'imagens/'.date('YmdHi').$arquivo->getClientOriginalName();
                $arquivo-> move(public_path('storage/imagens'), $nomeArquivo);
                $dados->fotoServico = $nomeArquivo;
            } else {
                $dados->fotoServico = $dados->fotoServico;
            }
            $dados->save();
            $todos = Servico::all();
            return view('sistema.dashboard.dashboardAdm', compact('todos'))->with('success', 'Serviço alterado com sucesso');
        }else{
            $todos = Servico::all();
            return view('sistema.dashboard.dashboardAdm', compact('todos'))->with('danger', 'Erro ao editar o serviço');
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
            $todos = Servico::all();
            return view('sistema.dashboard.dashboardAdm', compact('todos'))->with('success', 'Serviço deletado com sucesso');
        }else{
            $todos = Servico::all();
            return view('sistema.dashboard.dashboardAdm', compact('todos'))->with('danger', 'Não deu pra apagar, não tem esse serviço cadastrado!!');
        }
    }
}