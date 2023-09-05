<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controladorProfile extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function mudarSenha(Request $request, string $id)
    {
        if(isset($id)){
           $senhaAtual = $request->input('senhaAtual');
           $senhaBD = Auth::user()->password;
           if(isset($senhaBD) && isset($senhaAtual)){
               $senhaAtual = Hash::$senhaAtual;
               if($senhaAtual === $senhaBD){
                   $novaSenha1 = $request->input('novaSenha');
                   $novaSenha2 = $request->input('confirmacaoSenha');
                   if(isset($novaSenha1) && isset($novaSenha2)){
                       if($novaSenha1 === $novaSenha2){
                           $hash = Hash::$novaSenha1;
                           if ($hash !== $senhaBD){
                               $dados = Auth::find($id)
                               $dados->password = $hash;
                           }
                   
               }
           }
        }
    }



}
