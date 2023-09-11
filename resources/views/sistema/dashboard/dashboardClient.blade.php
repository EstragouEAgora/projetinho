@extends('sistema.layout.layoutDash')
@section('title', 'Home | Estragou, e agora?')
@section('content')
    <div class="container">
        <div class="card border" style="margin-top: 60px" id="esconder-card-board">
            @if (session()->get('danger'))
                <div class="alert alert-danger">
                    {{ session()->get('danger') }}
                </div><br />
            @elseif (session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br />
            @endif
        </div>
        <p class="h1 text-start" id="titulo-da-pagina"><b>Serviços Disponíveis</b></p>
        <p id="subtitulo-da-pagina">Explore nossos serviços disponíveis e selecione aquele que melhor atende às suas
            necessidades. Estamos aqui para oferecer soluções especialmente para você!</p>

        @foreach ($dados as $item)
            <div class="row" style="margin-top: 50px">
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <img src="{{$dados['fotoServico']}}" class="card-img-top" alt="{{$dados['nomeServico']}}">
                        <div class="card-body">
                            <p id="txt-card-dash-cliente"><b>{{$dados['nomeServico']}}</b></p>
                            <div class="btn-group">
                                <a href="/pedido/{{$dados['servico_id']}}" id="link-sem-sublinhado">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"
                                        id="botao-solicitar">Solicitar pedido </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
@endsection
