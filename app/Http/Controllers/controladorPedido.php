<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Servico;
use App\Models\User_Servico;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        session(['idSer' => $servico_id]);
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
        $dados->user_id = Auth::User()->id;
        $idSer = session('idSer');
        $dados->servico_id = $idSer;
        $dados->descricaoPedido = $request->input('descricaoPedido');
        $valor = str_replace(',', '.', preg_replace('/[^0-9,]/', '', $request->input('valorPedido')));
        $valor = (double) $valor;
        $dados->valorPedido = $valor;
        if(isset($dados)){
            $dados->save();
            return redirect('/dashboardCliente')->with('success','Seu pedido foi cadastrado com sucesso!');
        } else {
            return redirect('/dashboardCliente')->with('danger', 'Não foi possível cadastrar seu pedido!');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function listaPedidos()
    {
        if (Auth::User()->tipo == '1') {
            $pedidos = Pedido::where('user_id', Auth::User()->id)->with('servico')->get();
            return view('sistema.pedido.listaPedidosCliente', compact('pedidos'));
        } elseif (Auth::User()->tipo == '2') {
            $pedidos = Pedido::where('user_id', Auth::User()->id)->with('servico')->get()->whereHas('servico_id', Auth::User()->user_servico->id);
            return view('sistema.pedido.listaPedidosPres', compact('pedidos'));
    }

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
