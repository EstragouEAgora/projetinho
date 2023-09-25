@extends('sistema.layout.layoutDash')
@section('title', 'Pedidos | Estragou, e agora?')
@section('content')
    <div class="container" style="margin-top: 150px">
        <div class="card border" style="margin-top: 60px; border: none; background-color: #28a745; ">
            @if (session()->get('danger'))
                <div class="alert alert-danger">
                    {{ session()->get('danger') }}
                </div><br />
            @elseif (session()->get('success'))
                <div class="alert alert-success"
                    style="text-align: center; padding: 5px; margin: 0; border: none; background-color: #28a745;">
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <span style="font-size: 18px; color: white;">{{ session()->get('success') }}</span>
                    </div>
                </div><br />
            @endif
        </div>

        <p class="h1 text-start" id="titulo-da-pagina"><b>Serviços para você</b></p>
        <p id="subtitulo-da-pagina">Pedidos para você! Dê uma olhada e se candidate!</p>
    </div>
    @foreach ($servicos as $item)
        @foreach ($item->servico->pedido as $value)
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <img class="card-img-top" src="/storage/{{ $item->servico->pedido->user->fotoPerfil }}">
                            <p class="h5 card-title">
                                <span style="color: #3c5bbf; font-weight: bold;">{{ $item->servico->nomeServico }}</span>
                            </p>
                            <p class="card-text"><b>Descrição:</b>{{ $value->descricaoPedido }}</p>
                            @if ($value->valorPedido == 0)
                                <p class="card-text"><b>Valor:</b> R$ {{ $value->valorPedido }} (não especificado)</p>
                            @endif
                            <p class="card-text"><b>Valor:</b> R$ {{ $value->valorPedido }}</p>
                            <!-- FORM -->
                            <form method="POST" action="/dashboard/pedidos/candidatar/{{ $value->id }}">
                                @csrf
                                <label for="novoValor" class="h4 label-align"
                                    style="margin-left: 10px; margin-right: 30px; margin-top: 30px;">Valor (R$):</label>
                                <p id="card-descricao-label-subtitulo">Sugira um novo valor para tal serviço...</p>
                                <div id="card-descricao-valor">
                                    <input id="novoValor" type="text" class="form-control valor" name="novoValor"
                                        required autocomplete="valorPedido"
                                        style="border-radius: 40px; background-color: #EFF2FB"
                                        value={{ $value->valorPedido }}>
                                </div>

                                <button class="btn btn-secondary" id="botaozin-padrao"> Candidatar-me </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
@endsection
