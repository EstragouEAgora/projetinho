@extends('sistema.layout.layoutDash')
@section('title', 'Home | Estragou, e agora?')
@section('content')
    <div class="container">
        <p class="h1 text-start" id="titulo-da-pagina"><b>Lista de Pedidos</b></p>
        <p id="subtitulo-da-pagina">Essa é a lista de pedidos que você enviou</p>

        @foreach ($pedidos as $item)
            <div class="row">
                <div class="d-flex mb-4">
                    <div class="card text-center mx-4">
                        <p class="h5" id="card-descricao-destaque">{{ $item->servico['nomeServico'] }}</p>
                        <p id="card-descricao-texto-simples">{{ $item['descricaoPedido'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
