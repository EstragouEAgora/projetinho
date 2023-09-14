@extends('sistema.layout.layoutDash')
@section('title', 'Home | Estragou, e agora?')
@section('content')
    <div class="container">
        <p class="h1 text-start" id="titulo-da-pagina"><b>Serviços para você</b></p>
        <p id="subtitulo-da-pagina">Pedidos para você! Dê uma olhada e se candidate!</p>
    </div>
    @foreach ($servicos as $item)
        @foreach ($item->servico->pedido as $value)
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <p class="h5 card-title">
                                <span style="color: #3c5bbf; font-weight: bold;">{{ $item->servico->nomeServico }}</span>
                            </p>
                            <p class="card-text"><b>Descrição:</b>{{ $value->descricaoPedido }}</p>
                            <p class="card-text"><b>Valor:</b> R$ {{ $value->valorPedido }}</p>
                            <form method="POST" action="/dashboard/pedidos/candidatar/{{ $value->id }}">
                                <label for="novoValor" class="h4 label-align"
                                    style="margin-left: 10px; margin-right: 30px; margin-top: 30px;">Valor (R$):</label>
                                <p id="card-descricao-label-subtitulo">Sugira um novo valor para tal serviço...</p>
                                <div id="card-descricao-valor">
                                    <input id="valorPedido" type="text" class="form-control valor" name="valorPedido"
                                        required autocomplete="valorPedido"
                                        style="border-radius: 40px; background-color: #EFF2FB"
                                        value="{{ $value->valorPedido }}">
                                </div>
                                <a>
                                    <button class="btn btn-secondary" id="botaozin-padrao"> Candidatar-me </button>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
@endsection
