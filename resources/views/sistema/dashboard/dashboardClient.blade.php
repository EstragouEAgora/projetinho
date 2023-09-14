@extends('sistema.layout.layoutDash')
@section('title', 'Home | Estragou, e agora?')
@section('content')
    <div class="container">
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
    </div>


    <p class="h1 text-start" id="titulo-da-pagina"><b>Serviços Disponíveis</b></p>
    <p id="subtitulo-da-pagina">Explore nossos serviços disponíveis e selecione aquele que melhor atende às suas
        necessidades. Estamos aqui para oferecer soluções especialmente para você!</p>
    <div class="row">
        @if ($todos == null)
            <p style="text-align: center;">Não há Serviços cadastrados!</p>
        @else
            @foreach ($todos as $item)
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <img src="/storage/{{ $item->fotoServico }}" class="card-img-top" alt="{{ $item['nomeServico'] }}">
                        <div class="card-body">
                            <p id="txt-card-dash-cliente"><b>{{ $item['nomeServico'] }}</b></p>
                            <div class="btn-group">
                                <a href="/pedidos/{{ $item->id }}" id="link-sem-sublinhado">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"
                                        id="botao-de-cadastro">Solicitar pedido</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    </div>
@endsection
