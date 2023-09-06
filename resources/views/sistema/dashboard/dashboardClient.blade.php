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


        <div class="row" style="margin-top: 50px">
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/imagens/encanador.png') }}" class="card-img-top" alt="EncanadorExemplo">
                    <div class="card-body">
                        <p id="txt-card-dash-cliente"><b>Encanador</b></p>
                        <div class="btn-group">
                            <a href="/pedido/1" id="link-sem-sublinhado">
                                <button type="button" class="btn btn-sm btn-outline-secondary"
                                    id="botao-solicitar">Solicitar pedido </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/imagens/eletricista.png') }}" class="card-img-top" alt="EletricistaExemplo">
                    <div class="card-body">
                        <p id="txt-card-dash-cliente"><b>Eletricista</b></p>
                        <div class="btn-group">
                            <a href="/pedido/2" id="link-sem-sublinhado">
                                <button type="button" class="btn btn-sm btn-outline-secondary"
                                    id="botao-solicitar">Solicitar pedido </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/imagens/jardineiro.png') }}" class="card-img-top" alt="JardineiroExemplo">
                    <div class="card-body">
                        <p id="txt-card-dash-cliente"><b>Jardineiro</b></p>
                        <div class="btn-group">
                            <a href="/pedido/3" id="link-sem-sublinhado">
                                <button type="button" class="btn btn-sm btn-outline-secondary"
                                    id="botao-solicitar">Solicitar pedido </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/imagens/limP.png') }}" class="card-img-top" alt="LimpPExemplo">
                    <div class="card-body">
                        <p style="" id="txt-card-dash-cliente"><b>Limpador de Piscina</b></p>
                        <div class="btn-group">
                            <a href="/pedido/4" id="link-sem-sublinhado">
                                <button type="button" class="btn btn-sm btn-outline-secondary"
                                    id="botao-solicitar">Solicitar pedido </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/imagens/limCA.png') }}" class="card-img-top" alt="LimpPExemplo">
                    <div class="card-body">
                        <p id="txt-card-dash-cliente"><b>Limpador de Caixa D'água</b></p>
                        <div class="btn-group">
                            <a href="/pedido/5" id="link-sem-sublinhado">
                                <button type="button" class="btn btn-sm btn-outline-secondary"
                                    id="botao-solicitar">Solicitar pedido </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/imagens/limCG.png') }}" class="card-img-top" alt="LimpCGExemplo">
                    <div class="card-body">
                        <p id="txt-card-dash-cliente"><b>Limpador de Caixa de Gordura</b></p>
                        <div class="btn-group">
                            <a href="/pedido/6" id="link-sem-sublinhado">   
                                <button type="button" class="btn btn-sm btn-outline-secondary"
                                    id="botao-solicitar">Solicitar pedido </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/imagens/Pintor.png') }}" class="card-img-top" alt="PintorExemplo">
                    <div class="card-body">
                        <p id="txt-card-dash-cliente"><b>Pintor</b></p>


                        <a href="/pedido/7" id="link-sem-sublinhado">
                            <div class="btn-group d-flex justify-content-start">
                                <button type="button" class="btn btn-sm btn-outline-secondary"
                                    id="botao-solicitar">Solicitar pedido </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
