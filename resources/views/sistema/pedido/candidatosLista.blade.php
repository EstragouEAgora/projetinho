@extends('sistema.layout.layoutDash')
@section('title', 'Candidatos | Estragou, e agora?')
@section('content')
    <div class="container">
        <p class="h1 text-start" id="titulo-da-pagina"><b>Candidatos</b></p>
        <p id="subtitulo-da-pagina">Essa é a lista dos candidatos que se disponibilizaram e o preço que eles ofertaram</p>

        @if (isset($candidatos))
            @foreach ($candidatos as $item)
                <div class="row">
                    <div class="d-flex mb-4">
                        <div class="card text-center mx-4">
                            <p class="h5" id="card-descricao-destaque">{{ $item->servico['nomeServico'] }}</p>
                            <p id="card-descricao-texto-simples">{{ $item['descricaoPedido'] }}</p>
                        </div>
                        <a href="/pedidos/detalhes/{{ $item['pedido_id'] }}">
                            <button class="btn btn-secondary" id="botaozin-padrao">
                                <i class="bi bi-hand-index">
                                    <img src="{{ asset('storage/imagens/click.svg') }}" />
                                </i>
                                Clique para ver mais...
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <p><b>Nenhum prestador se candidatou ao seu pedido ainda...<b></p>
        @endif

    </div>
@endsection
