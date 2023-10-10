@extends('sistema.layout.layoutDash')
@section('title', 'Candidatos | Estragou, e agora?')
@section('content')
    <div class="container">
        <p class="h1 text-start" id="titulo-da-pagina" style="margin-top: 150px"><b>Candidatos</b></p>
        <p id="subtitulo-da-pagina">Essa é a lista dos candidatos que se disponibilizaram e o preço que eles ofertaram</p>

        @if (isset($candidatos))
            @forelse ($candidatos as $item)
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <img class="h5 card-icon" src="/storage/{{ $item->user->fotoPerfil }}"
                                style="max-width: 180px; max-height: 300px">
                            <p class="h5 card-title">
                                <span style="color: #3c5bbf; font-weight: bold;">{{ $item->user->name }}</span>
                            </p>
                            @if ($item->status != 1)
                                <p class="card-text"><b>Descrição:</b>{{ $item->pedido->descricaoPedido }}</p>
                                <p class="card-text"><b>Valor Proposto:</b> R$ {{ $item->novoValor }}</p>
                            @else
                                <p class="card-text"><b>Telefone: </b>{{ $item->user->telefone }}</p>
                                <p class="card-text"><b>Email: </b>{{ $item->user->email }}</p>
                            @endif
                            @if ($item->avaliacao != 5)
                                @if ($item->avaliacao == 0)
                                    <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                    <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                    <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                    <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                    <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                    <p>Ainda não avaliado!</p>
                                @else
                                    @for ($i = 0; $i < $item->avaliacao; $i++)
                                        <img src="{{ asset('storage/imagens/star-fill.svg') }}" style="width: 2rem;">
                                    @endfor
                                    @for ($i = 0; $i < $item->resto; $i++)
                                        <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                    @endfor
                                @endif
                            @else
                                @for ($i = 0; $i < $item->avaliacao; $i++)
                                    <img src="{{ asset('storage/imagens/star-fill.svg') }}" style="width: 2rem;">
                                @endfor
                            @endif
                            @if ($item->status != 1)
                                <a href="/pedidos/aceitar/{{ $item['user_id'] }}/{{ $item['pedido_id'] }}">
                                    <button class="btn btn-secondary" id="botaozin-padrao">Aceitar</button>
                                </a>
                            @else
                                <a href="/dashboard/avaliar/{{ $item['user_id'] }}/{{$item['pedido_id']}}">
                                    <button class="btn btn-secondary" id="botaozin-padrao">
                                        Avaliar
                                    </button>
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <p id="subtitulo-da-pagina" style="color:#3c5bbf"><b>Nenhum prestador se candidatou ao seu pedido ainda...<b></p>
            @endforelse
        @endif
    </div>
@endsection
