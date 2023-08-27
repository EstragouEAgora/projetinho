<?php

namespace App\Http\Controllers;
use App\Models\Servico;

use Illuminate\Http\Request;

class controladorServico extends Controller
{


    public function index()
    {
        $servicos = Servico::all();
        return view('');
    }

    
    public function create()
    {
        return view('sistema.novoServico');
    }

    
    public function store(Request $request)
    {
        $path = $request -> file('fotoServico') -> store('imagens', 'public');
        $dados = new Servico();
        $dados->nomeServico = $request->input('nomeServico');
        $dados->fotoServico = $path;
        $dados->save();
        return redirect('/')->with('success', 'Novo servico cadastrado com sucesso!');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit(string $id)
    {
        $dados = Servico::find($id);
        if(isset($dados)){
            return view();
        } else {
            return redirect()->with('danger', 'Erro ao tentar atualizar cadastro!');
        }
    }

    
    public function update(Request $request,$id)
    {
        $path = $request -> file('fotoServico') -> store('imagens', 'public');
        $dados= Servico::findOrFail($id);
        $dados->nomeServico = $request->input('nomeServico');
        $dados->fotoServico = $path;
        $dados->save();
        return redirect()->route('', $dados->id);
    }

    
    public function destroy(string $id)
    {
        //
    }
}
