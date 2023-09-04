<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Servico;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class controladorPedido extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::all();
        return view('');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($servico_id)
    {
        $dados = Servico::find($servico_id);
        if (isset($dados)){
            return view('sistema.pedido.pedido',compact('dados'));       
        } else {
            return view('sistema.dashboard.dashboardClient');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = new Pedido();
        $user = Auth::find($user_id);
        $dados->user_id = $user;
        $idSer = session('idSer');
        $dados->servico_id = $idSer;
        $dados->descricaoPedido = $request->input('descricaoPedido');
        $valorPedido = str_replace(',', '.', preg_replace('/[^0-9,]/', '', $request->input('valorPedido')));
        $dados->valorPedido = (double)$valorPedido;
        if(isset($dados)){
            $dados->save();
            return redirect('/dashboardCliente')->with('success');
        } else {
            return redirect('/dashboardCliente')->with('danger');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pedidos = Pedido::all();
        if($pedidos->servico_id = 3){
            $dados = array('descricao' => $pedidos->descricaoPedido, 'valor' => $pedidos->valorPedido);
        }
        return view('sistema.pedido.descricaoPedido',compact($dados));       
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
}
