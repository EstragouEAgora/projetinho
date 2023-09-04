@extends('sistema.layout.layoutDash')
@section('title', 'Adm | Estragou, e agora?')
@section('content')
    <div class="container" style="margin-top: 150px">
        <p class="h1 text-start" id="titulo-da-pagina"><b>Serviços Disponíveis</b></p>
        <p id="subtitulo-da-pagina">Estes são os serviços que estão disponíveis para os usuários...</p>
        <button id="botaozin-padrao">
            <a id="link-sem-sublinhado" style="color: white" href="{{ route('novoServico') }}"><b> + Novo </b></a>
        </button>
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="card" id="card-dash-cliente">
                    <div class="row">
                        <div class="col">
                            <p id="txt-card-dash-cliente"><b>Encanador</b></p>
                        </div>
                        <div class="col text-end">
                            <a href="/excluir-servico/1" id="link-sem-sublinhado">
                                <i class="bi bi-pencil-fill">
                                    <img src="{{ asset('storage/imagens/pencil-fill.svg') }}">
                                </i>
                                <i class="bi bi-trash3-fill">
                                    <img src="{{ asset('storage/imagens/trash.svg') }}">
                                </i>
                            </a>
                        </div>
                        <img src="{{ asset('storage/imagens/encanador.png') }}" class="card-img-top" alt="EncanadorExemplo">
                    </div>
                </div>
            </div>




            <div class="col-md-3 mb-3">
                <div class="card" id="card-dash-cliente">
                    <div class="row">
                        <div class="col">
                            <p id="txt-card-dash-cliente"><b>Eletricista</b></p>
                        </div>
                        <div class="col text-end">
                            <a href="/excluir-servico/2" id="link-sem-sublinhado">
                                <i class="bi bi-pencil-fill">
                                    <img src="{{ asset('storage/imagens/pencil-fill.svg') }}">
                                </i>
                                <i class="bi bi-trash3-fill">
                                    <img src="{{ asset('storage/imagens/trash.svg') }}">
                                </i>
                            </a>
                        </div>
                        <img src="{{ asset('storage/imagens/eletricista.png') }}" class="card-img-top"
                            alt="EletricistaExemplo">
                    </div>
                </div>
            </div>




            <div class="col-md-3 mb-3">
                <div class="card" id="card-dash-cliente">
                    <div class="row">
                        <div class="col">
                            <p id="txt-card-dash-cliente"><b>Jardineiro</b></p>
                        </div>
                        <div class="col text-end">
                            <a href="/excluir-servico/3" id="link-sem-sublinhado">
                                <i class="bi bi-pencil-fill">
                                    <img src="{{ asset('storage/imagens/pencil-fill.svg') }}">
                                </i>
                                <i class="bi bi-trash3-fill">
                                    <img src="{{ asset('storage/imagens/trash.svg') }}">
                                </i>
                            </a>
                        </div>
                        <img src="{{ asset('storage/imagens/jardineiro.png') }}" class="card-img-top"
                            alt="JardineiroExemplo">
                    </div>
                </div>
            </div>




            <div class="col-md-3 mb-3">
                <div class="card" id="card-dash-cliente">
                    <div class="row">
                        <div class="col">
                            <p id="txt-card-dash-cliente"><b>Limpador de Piscina</b></p>
                        </div>
                        <div class="col text-end">
                            <a href="/excluir-servico/3" id="link-sem-sublinhado">
                                <i class="bi bi-pencil-fill">
                                    <img src="{{ asset('storage/imagens/pencil-fill.svg') }}">
                                </i>
                                <i class="bi bi-trash3-fill">
                                    <img src="{{ asset('storage/imagens/trash.svg') }}">
                                </i>
                            </a>
                        </div>
                        <img src="{{ asset('storage/imagens/limP.png') }}" class="card-img-top" alt="JardineiroExemplo">
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card" id="card-dash-cliente">
                    <div class="row">
                        <div class="col">
                            <p id="txt-card-dash-cliente"><b>Limpador de Caixa D'água</b></p>
                        </div>
                        <div class="col text-end">
                            <a href="/excluir-servico/3" id="link-sem-sublinhado">
                                <i class="bi bi-pencil-fill">
                                    <img src="{{ asset('storage/imagens/pencil-fill.svg') }}">
                                </i>
                                <i class="bi bi-trash3-fill">
                                    <img src="{{ asset('storage/imagens/trash.svg') }}">
                                </i>
                            </a>
                        </div>
                        <img src="{{ asset('storage/imagens/limCA.png') }}" class="card-img-top" alt="JardineiroExemplo">
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card" id="card-dash-cliente">
                    <div class="row">
                        <div class="col">
                            <p id="txt-card-dash-cliente"><b>Limpador de Caixa de Gordura</b></p>
                        </div>
                        <div class="col text-end">
                            <a href="/excluir-servico/3" id="link-sem-sublinhado">
                                <i class="bi bi-pencil-fill">
                                    <img src="{{ asset('storage/imagens/pencil-fill.svg') }}">
                                </i>
                                <i class="bi bi-trash3-fill">
                                    <img src="{{ asset('storage/imagens/trash.svg') }}">
                                </i>
                            </a>
                        </div>
                        <img src="{{ asset('storage/imagens/limCG.png') }}" class="card-img-top"
                            alt="JardineiroExemplo">
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card" id="card-dash-cliente">
                    <div class="row">
                        <div class="col">
                            <p id="txt-card-dash-cliente"><b>Pintor</b></p>
                        </div>
                        <div class="col text-end">
                            <a href="/excluir-servico/3" id="link-sem-sublinhado">
                                <i class="bi bi-pencil-fill">
                                    <img src="{{ asset('storage/imagens/pencil-fill.svg') }}">
                                </i>
                                <i class="bi bi-trash3-fill">
                                    <img src="{{ asset('storage/imagens/trash.svg') }}">
                                </i>
                            </a>
                        </div>
                        <img src="{{ asset('storage/imagens/Pintor.png') }}" class="card-img-top"
                            alt="JardineiroExemplo">
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
