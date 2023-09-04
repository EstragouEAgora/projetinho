<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidatos;

class controladorCandidatos extends Controller
{
    
    public function index()
    {
        $dados = Candidatos::all();
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = new Candidatos();
        $dados->user_id = ;
        $dados->pedido_id = ;
        $dados->novoValor = $request->input('novoValor');
        $dados->status = 0;
        $dados->save();
        return redirect();
        
    }

    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dados = Candidados::find($id);
        if(isset($dados)){
            $dados->status = 1;
            $dados->save();
        } else {
            return redirect();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
