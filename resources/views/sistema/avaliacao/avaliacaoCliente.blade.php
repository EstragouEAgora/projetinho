@extends('sistema.layout.layoutDash')
@section('title', 'Home | Estragou, e agora?')
@section('content')
    <div class="container">
        <p class="h1 text-start" id="titulo-da-pagina" style="margin-top: 50px"><b>Avaliação - Prestadores de Serviço</b></p>


        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/imagens/clientePadrao.png') }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $dados['apelido'] }}</h5>
                        <p class="card-title">{{ $dados['name'] }}</h5>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                        <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                        <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                        <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                        <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card" id="card-dash-cliente">
                        <a href="/pedido/2" id="link-sem-sublinhado">
                            <p id="txt-card-dash-cliente"><b>Eletricista</b></p>
                            <img src="{{ asset('storage/imagens/eletricista.png') }}" class="card-img-top"
                                alt="EletricistaExemplo">
                        </a>
                    </div>
                </div>


                <div class="col-md-3 mb-3">
                    <div class="card" id="card-dash-cliente">
                        <a href="/pedido/3" id="link-sem-sublinhado">
                            <p id="txt-card-dash-cliente"><b>Jardineiro</b></p>
                            <img src="{{ asset('storage/imagens/jardineiro.png') }}" class="card-img-top"
                                alt="JardineiroExemplo">
                        </a>
                    </div>
                </div>


                <div class="col-md-3 mb-3">
                    <div class="card" id="card-dash-cliente">
                        <a href="/pedido/4" id="link-sem-sublinhado">
                            <p style="" id="txt-card-dash-cliente"><b>Limpador de Piscina</b></p>
                            <img src="{{ asset('storage/imagens/limP.png') }}" class="card-img-top" alt="LimpPExemplo">
                        </a>
                    </div>
                </div>


                <div class="col-md-3 mb-3">
                    <div class="card" id="card-dash-cliente">
                        <a href="/pedido/5" id="link-sem-sublinhado">
                            <p id="txt-card-dash-cliente"><b>Limpador de Caixa D'água</b></p>
                            <img src="{{ asset('storage/imagens/limCA.png') }}" class="card-img-top" alt="LimpCAExemplo">
                        </a>
                    </div>
                </div>


                <div class="col-md-3 mb-3">
                    <div class="card" id="card-dash-cliente">
                        <a href="/pedido/6" id="link-sem-sublinhado">
                            <p id="txt-card-dash-cliente"><b>Limpador de Caixa de Gordura</b></p>
                            <img src="{{ asset('storage/imagens/limCG.png') }}" class="card-img-top" alt="LimpCGExemplo">
                        </a>
                    </div>
                </div>


                <div class="col-md-3 mb-3">
                    <div class="card" id="card-dash-cliente">
                        <a href="/pedido/7" id="link-sem-sublinhado">
                            <p id="txt-card-dash-cliente"><b>Pintor</b></p>
                            <img src="{{ asset('storage/imagens/Pintor.png') }}" class="card-img-top" alt="PintorExemplo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
