@extends('sistema.layout.layoutDash')
@section('title', 'Home | Estragou, e agora?')
@section('content')
    <div class="container">
        <p class="h1 text-start" id="titulo-da-pagina"><b>Serviços para você</b></p>
        <p id="subtitulo-da-pagina">Os serviços que selecionamos para você!</p>
    </div>
    @foreach ($pedidos as $item)
        <div class="row">
            <div class="d-flex mb-4">
                <div class="card text-center mx-4">
                    <p class="h5" id="card-descricao-destaque">{{ $item->servico['nomeServico'] }}</p>
                    <a href="{{ route('verPedido') }}">
                        <button class="btn btn-secondary" id="botaozin-padrao">
                            <i class="bi bi-hand-index">
                                <img src="{{ asset('storage/imagens/click.svg') }}" />
                            </i>
                            Clique para ver mais...
                        </button>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection
