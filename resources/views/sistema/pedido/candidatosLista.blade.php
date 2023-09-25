@extends('sistema.layout.layoutDash')
@section('title', 'Candidatos | Estragou, e agora?')
@section('content')
    <div class="container">
        <p class="h1 text-start" id="titulo-da-pagina"><b>Candidatos</b></p>
        <p id="subtitulo-da-pagina">Essa é a lista dos candidatos que se disponibilizaram e o preço que eles ofertaram</p>

        @if (isset($candidatos))
            @forelse ($candidatos as $item)
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <img class="h5 card-icon" src="/storage/{{ $item->user->fotoPerfil }}">
                                <p class="h5 card-title">
                                    <span
                                        style="color: #3c5bbf; font-weight: bold;">{{ $item->user->name }}</span>
                                </p>
                                <p class="card-text"><b>Descrição:</b>{{ $item->pedido->descricaoPedido }}</p>
                                <p class="card-text"><b>Valor Proposto:</b> R$ {{ $item->novoValor }}</p>
                            </div>
                            <a href="/pedidos/aceitar/{{ $item['user_id'] }}">
                                <button class="btn btn-secondary" id="botaozin-padrao">Aceitar</button>
                            </a>
                        </div>
                    </div>
                @empty
                    <p><b>Nenhum prestador se candidatou ao seu pedido ainda...<b></p>
            @endforelse
        @endif

    </div>
@endsection


<div class="row">
