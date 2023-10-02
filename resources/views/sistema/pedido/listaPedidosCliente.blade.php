@extends('sistema.layout.layoutDash')
@section('title', 'Pedidos | Estragou, e agora?')
@section('content')
    <div class="container" style="margin-top: 150px">
        <p class="h1 text-start" id="titulo-da-pagina" style="margin-top: 150px"><b>Lista de Pedidos</b></p>
        <p id="subtitulo-da-pagina">Essa é a lista de pedidos que você enviou</p>
        @forelse ($pedidos as $item)
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            @if ($item->fotoPedido != '')
                                <img class="h5 card-icon" src="/storage/{{ $item->fotoPedido }}"
                                style="max-width: 180px; max-height: 300px">
                            @endif
                            <p class="h5 card-title">
                                <span style="color: #3c5bbf; font-weight: bold;">{{ $item->servico['nomeServico'] }}</span>
                            </p>
                            <p class="card-text"><b>Descrição:</b> {{ $item['descricaoPedido'] }}</p>
                            <p class="card-text"><b>Endereço:</b> {{ $item['endereco'] }}</p>
                            <p class="card-text"><b>Valor:</b> R$ {{ $item['valorPedido'] }}</p>
                            <a href="/dashboard/candidatos/{{ $item->id }}">
                                <button class="btn btn-secondary" id="botaozin-padrao"> Candidatos </button>
                            </a>
                            <a href="/pedidos/editar/{{ $item->id }}" id="link-sem-sublinhado">
                                <i class="bi bi-pencil-fill">
                                    <img src="{{ asset('storage/imagens/pencil-fill.svg') }}">
                                </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p id="subtitulo-da-pagina">Você ainda não fez nenhum pedido! Vá a página inicial e solicite um pedido!</p>
        @endforelse
    </div>
@endsection
