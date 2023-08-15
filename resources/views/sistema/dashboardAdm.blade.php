@extends('sistema.layoutDash')
@section('title','Adm | Estragou, e agora?')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <p class="h1 text-start" id="titulo-da-pagina"><b>Serviços Disponíveis</b></p>
            <p id="subtitulo-da-pagina">Estes são os serviços que estão disponíveis para os usuários...</p>
        </div>
        <div class="col-md-4">
            <button id="botaozin-padrao">
                <a id="link-sem-sublinhado" style="color: white" href="{{route('novoServico')}}"><b>  + Novo  </b></a>
            </button>
        </div>
    </div>

    <div class="row">
            <div class="col">
                <div class="card" id="card-dash-cliente">
                    <div class="row">
                        <div class="col">
                            <p id="txt-card-dash-cliente"><b>Encanador<b></p>
                        </div>
                        <div class="col">
                            <i class="bi bi-trash3-fill">
                                <img src="{{asset('storage/imagens/trash.svg')}}">
                            </i>
                        </div>
                        <img src="{{asset('storage/imagens/encanador.png')}}" class="card-img-top" alt="EncanadorExemplo">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" id="card-dash-cliente">
                        <div class="col">
                            <p id="txt-card-dash-cliente"><b>Eletricista<b></p>
                        </div>
                        <div class="col">
                            <i class="bi bi-trash3-fill">
                                <img src="{{asset('storage/imagens/trash.svg')}}">
                            </i>
                        </div>
                        <img src="{{asset('storage/imagens/eletricista.png')}}" class="card-img-top" alt="EletricistaExemplo">
                </div>
            </div>
            <div class="col">
                <div class="card" id="card-dash-cliente">
                        <div class="col">
                            <p id="txt-card-dash-cliente"><b>Jardineiro<b></p>
                        </div>
                        <div class="col">
                            <i class="bi bi-trash3-fill">
                                <img src="{{asset('storage/imagens/trash.svg')}}">
                            </i>
                        </div>
                        <img src="{{asset('storage/imagens/jardineiro.png')}}" class="card-img-top" alt="JardineiroExemplo">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card" id="card-dash-cliente">
                        <div class="col">
                            <p id="txt-card-dash-cliente"><b>Limpador de Piscina<b></p>
                        </div>
                        <div class="col">
                            <i class="bi bi-trash3-fill">
                                <img src="{{asset('storage/imagens/trash.svg')}}">
                            </i>
                        </div>
                        <img src="{{asset('storage/imagens/limP.png')}}" class="card-img-top" alt="LimpPExemplo">
                </div>
            </div>
            
            <div class="col">
                <div class="card" id="card-dash-cliente">
                        <div class="col">
                            <p id="txt-card-dash-cliente"><b>Limpador de Caixa d'Água<b></p>
                        </div>
                        <div class="col">
                            <i class="bi bi-trash3-fill">
                                <img src="{{asset('storage/imagens/trash.svg')}}">
                            </i>
                        </div>
                        <img src="{{asset('storage/imagens/limCA.png')}}" class="card-img-top" alt="LimpCAExemplo">
                </div>
            </div>
            
            <div class="col">
                <div class="card" id="card-dash-cliente">
                        <div class="col">
                            <p id="txt-card-dash-cliente"><b>Limpador de Caixa de Gordura<b></p>
                        </div>
                        <div class="col">
                            <i class="bi bi-trash3-fill">
                                <img src="{{asset('storage/imagens/trash.svg')}}">
                            </i>
                        </div>
                        <img src="{{asset('storage/imagens/limCG.png')}}" class="card-img-top" alt="LimpCGExemplo">
                </div>
            </div>
            
            <div class="col">
                <div class="card" id="card-dash-cliente">
                        <div class="col">
                            <p id="txt-card-dash-cliente"><b>Pintor<b></p>
                        </div>
                        <div class="col">
                            <i class="bi bi-trash3-fill">
                                <img src="{{asset('storage/imagens/trash.svg')}}">
                            </i>
                        </div>
                        <img src="{{asset('storage/imagens/Pintor.png')}}" class="card-img-top" alt="PintorExemplo">
                </div>
            </div>
        </div>
@endsection
