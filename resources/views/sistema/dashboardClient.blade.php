@extends('sistema.layoutDash')
@section('title','Home | Estragou, e agora?')
@section('content')
        <p class="h1 text-start" id="titulo-da-pagina"><b>Serviços Disponíveis</b></p>
        <p id="subtitulo-da-pagina">Escolha um entre os serviços que deseja abaixo e clique nele. Estamos aqui para atender suas necessidades e oferecer soluções personalizadas para você!</p>

        <div style="d-flex mb-3">
            
                <div class="card" id="card-dash-cliente">
                    <a href="/pedido" id="link-sem-sublinhado">
                        <p id="txt-card-dash-cliente"><b>Encanador<b></p>
                        <img src="{{asset('storage/imagens/encanador.png')}}" class="card-img-top" alt="EncanadorExemplo">
                    </a>
                </div>
            
                <div class="card" id="card-dash-cliente">
                    <a href="/pedido" id="link-sem-sublinhado">
                        <p id="txt-card-dash-cliente"><b>Eletricista<b></p>
                        <img src="{{asset('storage/imagens/eletricista.png')}}" class="card-img-top" alt="EletricistaExemplo">
                    </a>
                </div>

                <div class="card" id="card-dash-cliente">
                    <a href="/pedido" id="link-sem-sublinhado">
                        <p style="color: #ABAEB7"><b>Jardineiro<b></p>
                        <img src="{{asset('storage/imagens/jardineiro.png')}}" class="card-img-top" alt="JardineiroExemplo">
                    </a>
                </div>
        </div>
        <div style="d-flex mb-3">
            
                <div class="card" id="card-dash-cliente">
                    <a href="/pedido" id="link-sem-sublinhado">
                        <p style="" id="txt-card-dash-cliente"><b>Limpador de Piscina<b></p>
                        <img src="{{asset('storage/imagens/limP.png')}}" class="card-img-top" alt="LimpPExemplo">
                    </a>
                </div>
            
            
                <div class="card" id="card-dash-cliente">
                    <a href="/pedido" id="link-sem-sublinhado">
                        <p id="txt-card-dash-cliente"><b>Limpador de Caixa D'água<b></p>
                        <img src="{{asset('storage/imagens/limCA.png')}}" class="card-img-top" alt="LimpCAExemplo">
                    </a>
                </div>
            
            
                <div class="card" id="card-dash-cliente">
                    <a href="/pedido" id="link-sem-sublinhado">
                        <p id="txt-card-dash-cliente"><b>Limpador de Caixa de Gordura<b></p>
                        <img src="{{asset('storage/imagens/limCG.png')}}" class="card-img-top" alt="LimpCGExemplo">
                    </a>
                </div>

            
                <div class="card" id="card-dash-cliente">
                    <a href="/pedido" id="link-sem-sublinhado">
                        <p id="txt-card-dash-cliente"><b>Pintor<b></p>
                        <img src="{{asset('storage/imagens/Pintor.png')}}" class="card-img-top" alt="PintorExemplo">
                    </a>
                </div>
            
        </div>
@endsection
