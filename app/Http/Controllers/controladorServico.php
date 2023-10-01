<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class controladorServico extends Controller
{
    /* Contém as regras de validação */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nomeServico' => ['required', 'string', 'min:4'],
        ]);
    }

    /* Método que direciona para a página
    do dashboardAdm */
    public function index()
    {
        $todos = Servico::all();
        return view('sistema.dashboard.dashboardAdm', compact('todos'));
    }

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
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect("/servicos/novo")
                ->withErrors($validator)
                ->withInput();
        }
        $path = $request->file('arquivo')->store('imagens', 'public');
        $dados = new Servico();
        $dados->nomeServico = $request->input('nomeServico');
        $dados->fotoServico = $path;
        $dados->save();
        return redirect('/dashboard/servicos')->with('success', 'Novo servico cadastrado com sucesso!');
    }

    /* Envia para o formulário de edição do serviço */
    public function edit(string $id)
    {
        $value = Servico::find($id);
        if (isset($value)) {
            $item = Servico::select('id', 'nomeServico')
                ->from('servicos')
                ->where('id', '=', $id)->get();
            $dados = array();
            $dados['id'] = $item[0]->id;
            $dados['nomeServico'] = $item[0]->nomeServico;
            return view('sistema.servico.editServico', compact('dados'));
        } else {
            return redirect('/dashboard/servicos')->with('danger', 'Não será possível editar o serviço!');
        }
    }

    /* Atualiza o serviço no Banco de Dados */
    public function update(Request $request, $id)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect("/servico/editar/$id")
                ->withErrors($validator)
                ->withInput();
        }
        $dados = Servico::find($id);
        if (isset($dados)) {
            $dados->nomeServico = $request->input('nomeServico');
            $arquivo = $request->file('fotoServico');
            if (isset($arquivo)) {
                $nomeArquivo = 'imagens/' . date('YmdHi') . $arquivo->getClientOriginalName();
                $arquivo->move(public_path('storage/imagens'), $nomeArquivo);
                $dados->fotoServico = $nomeArquivo;
            } else {
                $dados->fotoServico = $dados->fotoServico;
            }
            $dados->save();
            return redirect('/dashboard/servicos')->with('success', 'Serviço alterado com sucesso');
        } else {
            return redirect('/dashboard/servicos')->with('danger', 'Erro ao editar o serviço');
        }
    }

    /* Permite apagar um serviço */
    public function destroy(string $id)
    {
        $dados = Servico::find($id);
        if (isset($dados)) {
            $fotoServico = $dados->fotoServico;
            Storage::disk('public')->delete($fotoServico);
            $dados->delete();
            return redirect('/dashboard/servicos')->with('success', 'Serviço deletado com sucesso');
        } else {
            return redirect('/dashboard/servicos')->with('danger', 'Não deu pra apagar, não tem esse serviço cadastrado!!');
        }
    }
}
